<?php namespace Lfi\Formations\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Config;
use Lfi\Formations\Models\Program;

class ProgramBox extends FormWidgetBase
{
    public function widgetDetails()
    {
        return [
            'name' => 'Programbox',
            'description' => 'Field for adding programs'
        ];
    }

    public function render(){

        $this->prepareVars();
        dump($this->vars['selectedValues']);
        //dump($this->vars['selectedValues']);

        return $this->makePartial('widget');
    }

    public function prepareVars(){
        $this->vars['id'] = $this->model->id;
        // REMONTE L'information en back voulue
        $this->vars['programms'] = Program::all()->lists('full_name','id');

        $this->vars['name'] = $this->formField->getName().'[]';

        if(!empty($this->getLoadValue())){
            $this->vars['selectedValues'] = $this->getLoadValue();
        } else {
            $this->vars['selectedValues'] = [];
        }

    }

    public function loadAssets()
    {
        $this->addCss('css/select2.css');
        $this->addJs('js/select2.js');
    }
}
