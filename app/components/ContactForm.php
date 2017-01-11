<?php namespace LFI\App\Components;

use Backend\Facades\Backend;
use Cms\Classes\ComponentBase;
use LFI\App\Models\ContactFormSettings as Settings;
use LFI\App\Models\ContactForm as contactFormModel;
use October\Rain\Support\Facades\Flash;
use Validator;
use AjaxException;
use Mail;
use Redirect;

class ContactForm extends ComponentBase
{
   
    public function componentDetails()
    {
        return [
            'name'        => 'lfi.app::lang.plugin.name',
            'description' => 'lfi.app::lang.contactformcomponent.description',

        ];
    }

    public function defineProperties()
    {
        return [
            'nameTitle' => [
                'title' => 'lfi.app::lang.contactformcomponent.name_title',
                'description' => 'lfi.app::lang.contactformcomponent.name_description',
                'default' => 'Full Name',
                'type' => 'string',
                'required' => true,
                'validationMessage' => 'Title label required'
            ],
            'emailTitle' => [
                'title' => 'lfi.app::lang.contactformcomponent.email_title',
                'description' => 'lfi.app::lang.contactformcomponent.email_description',
                'default' => 'Email',
                'type' => 'string',
                'required' => true,
                'validationMessage' => 'Email label required'
            ],
            'phoneTitle' => [
                'title' => 'lfi.app::lang.contactformcomponent.phone_title',
                'description' => 'lfi.app::lang.contactformcomponent.phone_description',
                'default' => 'Phone',
                'type' => 'string'

            ],
            'subjectTitle' => [
                'title' => 'lfi.app::lang.contactformcomponent.subject_title',
                'description' => 'lfi.app::lang.contactformcomponent.subject_description',
                'default' => 'Subject',
                'type' => 'string',
                'required' => true,
                'validationMessage' => 'Subject label required'

            ],
            'functionTitle' => [
                'title' => 'lfi.app::lang.contactformcomponent.function_title',
                'description' => 'lfi.app::lang.contactformcomponent.function_description',
                'default' => 'Function',
                'type' => 'string',
                'required' => true,
                'validationMessage' => 'Function label required'

            ],
            'messageTitle' => [
                'title' => 'lfi.app::lang.contactformcomponent.message_title',
                'description' => 'lfi.app::lang.contactformcomponent.message_description',
                'default' => 'Message',
                'type' => 'string',
                'required' => true,
                'validationMessage' => 'Message label required'

            ],
            'buttonText' => [
                'title' => 'lfi.app::lang.contactformcomponent.button_text',
                'description' => 'lfi.app::lang.contactformcomponent.button_description',
                'default' => 'Submit',
                'type' => 'string',
                'required' => true,
                'validationMessage' => 'Button text required'

            ],
            'displayPhone' => [
                'title' => 'lfi.app::lang.contactformcomponent.display_phone_field',
                'description' => 'lfi.app::lang.contactformcomponent.display_phone_field_description',
                'default' => true,
                'type' => 'checkbox',
            ],
            'detailedErrors' => [
                'title'       => 'lfi.app::lang.contactformcomponent.detailed_errors_field',
                'description' => 'lfi.app::lang.contactformcomponent.detailed_errors_field_description',
                'default'     => false,
                'type'        => 'checkbox',
            ],
        ];
    }

    public function properties(){
        return [
            'nameLabel' => $this->property('nameTitle','Full Name'),
            'emailLabel' => $this->property('emailTitle','Email'),
            'phoneLabel' => $this->property('phoneTitle','Phone No.'),
            'subjectLabel' => $this->property('subjectTitle','Subject'),
            'functionLabel' => $this->property('functionTitle','Function'),
            'messageLabel' => $this->property('messageTitle','Message'),
            'phoneEnabled' => $this->property('displayPhone',false),
            'buttonText' => $this->property('buttonText','Submit'),
            'detailedErrors' => $this->property('detailedErrors',false),
        ];
    }

    public function settings(){
        return [
            'recaptcha_enabled' => Settings::get('recaptcha_enabled', false),
            'recaptcha_site_key' => Settings::get('site_key', ''),
            'text_top_form' => Settings::get('text_top_form', ''),

        ];

    }


    /**
     * Injecting Assets
     */
    public function onRun()
    {
        $this->addJs('/plugins/lfi/app/assets/js/simpleContact-frontend.js');
        if(Settings::get('recaptcha_enabled', false))
            $this->addJs('https://www.google.com/recaptcha/api.js');
    }

    /**
     * AJAX form fubmit handler
     */
    public function onFormSubmit(){

        /**
         * Form validation
         */
        $customValidationMessages = [
            'name.required' => e(trans('lfi.app::validation.custom.name.required')),
            'email.required' => e(trans('lfi.app::validation.custom.email.required')),
            'email.email' => e(trans('lfi.app::validation.custom.email.email')),
            'subject.required' => e(trans('lfi.app::validation.custom.subject.required')),
            'function.required' => e(trans('lfi.app::validation.custom.function.required')),
            'message.required' => e(trans('lfi.app::validation.custom.message.required'))
        ];
        $formValidationRules = [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'function' => 'required',
            'message' => 'required'
        ];

        $validator = Validator::make(post(), $formValidationRules,$customValidationMessages);

        if ($validator->fails()) {

            $messages = $validator->messages();
            Flash::error($messages->first());

            throw new AjaxException(['#simple_contact_flash_message' => $this->renderPartial('@flashMessage.htm',[
                'errors' => $messages->all()
            ])]);
        }

        /**
         * Validating reCaptcha
         */
        if (Settings::get('recaptcha_enabled', false)){

            $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".Settings::get('secret_key')."&response=".post('g-recaptcha-response')."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            if($response['success'] == false)
            {
                Flash::error(e(trans('lfi.app::validation.custom.reCAPTCHA.required')));

                throw new AjaxException(['#simple_contact_flash_message' => $this->renderPartial('@flashMessage.htm')]);
            }

        }


        /**
         * At this point all validations succeded
         * further processing form
         */

         $this->submitForm();



        if(Settings::get('redirect_to_page',false) && !empty(Settings::get('redirect_to_url','')))
            return Redirect::to(Settings::get('redirect_to_url'));
        else{
            Flash::success(Settings::get('success_message','Thankyou for contacting us'));
            return ['#simple_contact_flash_message' => $this->renderPartial('@flashMessage.htm')];
        }


    }

    protected function submitForm(){

        $model = new contactFormModel;

        $model->name = post('name');
        $model->email = post('email');
        $model->phone = post('phone');
        $model->subject = post('subject');
        $model->function = post('function');
        $model->message = post('message');

        $model->save();

        if(Settings::get('recieve_notification',false) && !empty(Settings::get('notification_email_address','')))
            $this->sendNotificationMail($model->id);

        if(Settings::get('auto_reply',false))
            $this->sendAutoReply();




    }

    /**
     * Send notification email
     */
    protected function sendNotificationMail($message_id){
        $url_message = Backend::url('lfi/app/contactform/view/'.$message_id);
        $vars = [
            'url_message' => $url_message,
            'name' => post('name'),
            'email' => post('email'),
            'phone' => post('phone'),
            'subject' => post('subject'),
            'function' => post('function'),
            'message_body' => post('message')
        ];

        Mail::send('lfi.app::mail.notification', $vars, function($message) use ($vars) {
             $message->to(Settings::get('notification_email_address'));
             $message->replyTo($vars['email'], $vars['name']);
        });
    }

    /**
     * send auto reply
     */
    protected function sendAutoReply(){

        $vars = [
            'name' => post('name'),
            'email' => post('email'),
            'phone' => post('phone'),
            'subject' => post('subject'),
            'function' => post('function'),
            'message_body' => post('message')
        ];

        Mail::send('lfi.app::mail.auto-response', $vars, function($message) {

            $message->to(post('email'), post('name'));

        });

    }
}
