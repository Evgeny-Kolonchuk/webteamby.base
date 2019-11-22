<?
IncludeModuleLangFile(__FILE__);
include_once (__DIR__ . '/defines.php');
/** @global string $DBType */
global $DBType;

$ar_classes = [];

if(is_array($ar_classes) && count($ar_classes) > 0){
    \Bitrix\Main\Loader::registerAutoLoadClasses('webteamby.calendar', $ar_classes);
}