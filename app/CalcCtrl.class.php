<?php

require_once $conf->root_path.'/lib/smarty/libs/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';


class CalcCtrl
{
    private $msgs;
    private $form;
    private $result;

    public function __construct(){
        $this->msgs = new Messages();
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        }


    public function getParams(){
        $this->form->kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
        $this->form->lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
        $this->form->procent = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;
    }

    public function process(){

        $this->getParams();

        if($this->validate())
        {
            $this->form->kwota = floatval($this->form->kwota);
            $this->form->lata = intval($this->form->lata);
            $this->form->procent = floatval($this->form->procent);

            $this->result->rata = $this->form->kwota / ($this->form->lata * 12);
            $this->result->result = $this->result->rata + ($this->result->rata * ($this->form->procent / 100));
        }
        $this->generateView();
    }

    public function validate(){

        if ( ! (isset($this->form->kwota) && isset($this->form->lata) && isset($this->form->procent))) {

            return false;
        }

        if ($this->form->kwota == "") {
            $this->msgs->addError('Nie podano kwoty pożyczki');
        }
        if ($this->form->lata == "") {
            $this->msgs->addError('Nie podano lat spłacania pożyczki');
        }
        if ($this->form->procent == "") {
            $this->msgs->addError('Nie podano procentu kredytu');
        }

        if (! $this->msgs->isError()) {

            if (!is_numeric($this->form->kwota)) {
                $this->msgs->addError('Kwota nie jest liczbą całkowitą');
            }

            if (!is_numeric($this->form->lata)) {
                $this->msgs->addError('Podany okres czasu nie jest liczbą całkowitą');
            }
            if (!is_numeric($this->form->procent)) {
                $this->msgs->addError('Podane oprocentowanie nie jest liczbą całkowitą');
            }
        }
        if($this->msgs->isError()) return false;
        return true;
    }


    public function generateView(){

        global $conf;
        $smarty = new Smarty();

        $smarty->assign('conf', $conf);
        $smarty->assign('result',$this->result->result);
        $smarty->assign('result',$this->result->rata);
        $smarty->assign('msgs',$this->msgs);
        $smarty->assign('res',$this->result);
        $smarty->assign('form',$this->form);
        $smarty->assign('kwota',$this->form->kwota);
        $smarty->assign('lata',$this->form->lata);
        $smarty->assign('procent',$this->form->procent);

        $smarty->display($conf->root_path.'/app/calc.tpl');
    }

}