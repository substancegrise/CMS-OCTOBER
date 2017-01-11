<?php namespace  LFI\App\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Backend\Facades\Backend;
use LFI\App\Models\ContactForm as ContactFormModel;
use October\Rain\Support\Facades\Flash;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Validator;
use ValidationException;
use System\Classes\SettingsManager;
class ContactForm extends Controller
{
    public $requiredPermissions = ['lfi.app.inbox'];
    
    public $implement = ['Backend\Behaviors\ListController'];

    public $listConfig = 'config_list.yaml';

    

    public function __construct()
    {
        parent::__construct();
        
        BackendMenu::setContext('LFI.App', 'app', 'contacts');

        SettingsManager::setContext('LFI.App', 'contactform');
    }


    /**
     * Injecting css class 'new' to list row if its new record
     *
     * @param $record
     * @param null $definition
     * @return string
     */
    public function listInjectRowClass($record, $definition = null)
    {
        if ($record->is_new) {
            return 'new';
        }
    }

    /**
     * count unread messages to show
     * counter on the side menu
     */
    public static function countUnreadMessages()
    {
        $counter = ContactFormModel::where('is_new', true)->count();

        if ($counter > 0)
            return $counter;
        else
            return null;

    }


    /**
     * (AJAX Call)
     * Delete items from the list.
     *
     */
    public function onDelete()
    {
        /** Check if this is even set **/
        

        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            ContactFormModel::whereIn('id',$checkedIds)->delete();

        }

        $counter = ContactFormModel::where('is_new', true)->count();

        return [
            'counter' => $counter,
            'list' => $this->listRefresh()
            ];
    }


    /**
     * (AJAX Call)
     * Delete single message
     *
     * @return mixed
     */
    public function onDeleteSingle(){
        $id = post('id' );
        $record = ContactFormModel::find($id);

        if($record){

            $record->delete();
            Flash::success(e(trans('lfi.app::lang.contactform.message_delete_success')));
        }
        else{
            Flash::error(e(trans('lfi.app::lang.contactform.message_delete_error')));
        }


        return Redirect::to(Backend::url('lfi/app/contactform'));
    }

    /**
     * send message reply
     */
    public function onReplyMessage(){


        $formValidationRules = [
            'subject' => ['required'],
            'message' => ['required']
        ];

        $validator = Validator::make(post(), $formValidationRules);
        // Validate
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $record = ContactFormModel::find(post('id'));

        if($record){

            $vars = [
                'message_body' => nl2br(post('message'))
            ];

            Mail::send('lfi.app::mail.reply', $vars, function($message) {

                $message->to(post('email_to'), post('name_to'));
                $message->subject(post('subject'));

            });

            $record->is_replied = true;
            $record->save();

            Flash::success(e(trans('lfi.app::lang.contactform.message_reply_success')));
        }
        else {
            Flash::error(e(trans('lfi.app::lang.contactform.message_reply_error')));
        }

    }


    /**
     * view single message details
     *
     * @param $id
     */
    public function view($id){
        $message = ContactFormModel::find($id);
        if($message){
            $message->is_new = false;
            $message->save();

            $this->addCss("/plugins/lfi/app/assets/css/backend-custom.css", "1.0.0");
            $this->addCss("/plugins/lfi/app/assets/css/print-message.css", "media=\"print\"");
            $this->addJs("/plugins/lfi/app/assets/js/printThis.js");
            $this->addJs("/plugins/lfi/app/assets/js/simpleContact.js");

            $this->pageTitle = "Message";
            $this->vars['message'] = $message;
        }
        else{
            Flash::error(e(trans('lfi.app::lang.contactform.message_not_found_error')));
            return Redirect::to(Backend::url('lfi/app/contactform'));
        }

    }

    /**
     * view single message details
     *
     * @param $id
     */
    public function index(){

            $this->addCss("/plugins/lfi/app/assets/css/backend-custom.css", "1.0.0");

            $this->pageTitle = "KIKI IS IN DA PLACE";

            // Call the ListController behavior index() method
            $this->asExtension('ListController')->index();

    }



}
