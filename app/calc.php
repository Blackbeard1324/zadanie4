<?php

require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

$kwota = null;
$lata = null;
$procent = null;
$result = null;
$messages = array();

getParams($kwota, $lata, $procent);
if(validate($kwota, $lata, $procent, $messages)){
    process($kwota, $lata, $procent, $messages, $result);
}
//$hide_intro = true;


//include 'calc.tpl';

function getParams(&$kwota, &$lata, &$procent){
    $kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
    $procent = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;
}

function process(&$kwota,&$lata,&$procent,&$messages,&$result){

    $kwota = floatval($kwota);
    $lata = floatval($lata);
    $procent = floatval($procent);
    $rata = $kwota / ($lata * 12);
    $result = $rata + ($rata * ($procent / 100));
}

function validate(&$kwota, &$lata, &$procent, &$messages){

    if ( ! (isset($kwota) && isset($lata) && isset($procent))) {

        return false;
    }

    if ($kwota == "") {
        $messages [] = 'Nie podano kwoty pożyczki';
    }
    if ($lata == "") {
        $messages [] = 'Nie podano lat spłacania pożyczki';
    }
    if ($procent == "") {
        $messages [] = 'Nie podano procentu kredytu';
    }

    if (empty($messages)) {

        if (!is_numeric($kwota)) {
            $messages [] = 'Kwota nie jest liczbą całkowitą';
        }

        if (!is_numeric($lata)) {
            $messages [] = 'Podany okres czasu nie jest liczbą całkowitą';
        }
        if (!is_numeric($procent)) {
            $messages [] = 'Podane oprocentowanie nie jest liczbą całkowitą';
        }

    }
    if (count ( $messages ) != 0){
        return false;
    }else {
        return true;
    }
}

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('app_root',_APP_ROOT);


$smarty->assign('kwota',$kwota);
$smarty->assign('lata',$lata);
$smarty->assign('procent',$procent);
$smarty->assign('messages',$messages);
$smarty->assign('result',$result);

$smarty->display(_ROOT_PATH.'/app/calc.tpl');

