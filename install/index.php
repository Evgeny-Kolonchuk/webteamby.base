<?
include_once (__DIR__ . '/../defines.php');
use \Bitrix\Main\Application;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\ModuleManager;


Loc::loadMessages(__FILE__);

class webteamby_base extends CModule{

    const MODULE_NAME_SPASE = '\Webteamby\Base';
    const MODULE_ID = 'webteamby.base';

    public function __construct(){

        $arModuleVersion = array();
        
        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_ID = self::MODULE_ID;
        $this->MODULE_NAME = Loc::getMessage('WEBTEAMBY_BASE_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('WEBTEAMBY_BASE_MODULE_DESCRIPTION');
        $this->MODULE_GROUP_RIGHTS = 'N';
        $this->PARTNER_NAME = Loc::getMessage('WEBTEAMBY_BASE_MODULE_PARTNER_NAME');
        $this->PARTNER_URI = 'https://webteam.by';
    }

    function get_path($notDocumentRoot = false){
        if($notDocumentRoot){
            return str_ireplace(Application::getDocumentRoot(),'',dirname(__DIR__));
        }else{
            return dirname(__DIR__);
        }
    }

    public function doInstall(){
		global $DOCUMENT_ROOT, $APPLICATION;
        ModuleManager::registerModule($this->MODULE_ID);
		$this->install_files();
		$this->install_agents();
		$this->install_events();
    }

    public function doUninstall(){
		global $DOCUMENT_ROOT, $APPLICATION;
		$this->uninstall_files();
		$this->uninstall_agents();
		$this->uninstall_events();
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    function install_agents(){
        //CAgent::AddAgent( 'Webteam\Exchange\Agents\agents_exchange_it4profit::exchange_run();', $this->MODULE_ID, 'Y', 86400);
    }

    function uninstall_agents(){
        //CAgent::RemoveAgent('Webteam\Exchange\Agents\agents_exchange_it4profit::exchange_run();', $this->MODULE_ID);
    }

    function install_files(){
        //CopyDirFiles($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/' . $this->MODULE_ID. '/install/admin', $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin', true, true);
    }

    function uninstall_files(){

    }

    function install_events(){
        //RegisterModuleDependences(
        //    'sale',
        //    'OnSaleOrderSaved',
        //    self::MODULE_ID,
        //    self::MODULE_NAME_SPASE.'\Events\order_events',
        //    'on_basket_order',
        //    150
        //);
        return true;
    }

    function uninstall_events(){
        //UnRegisterModuleDependences(
        //    'sale',
        //    'OnSaleOrderSaved',
        //    self::MODULE_ID,
        //    self::MODULE_NAME_SPASE.'\Events\order_events',
        //    'on_basket_order'
        //);
        return true;
    }
}
