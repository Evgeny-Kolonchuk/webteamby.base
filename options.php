<?

// !!! WEBTEAMBY_BASE - реплейсим это значение для нового модуля, включая языковые файлы и прочее

use \Bitrix\Main\Application;
use \Bitrix\Main\Config\Option;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Entity\Query;
use \Bitrix\Iblock\IblockTable;

global $USER, $APPLICATION;

include_once (__DIR__ . '/defines.php');


if (!$USER->isAdmin()) {
    $APPLICATION->authForm('Nope');
}

Loc::loadMessages(__FILE__);

$MODULE_ID = BASE_WEBTEAM_MODULE_ID;

$app = Application::getInstance();
$context = $app->getContext();
$request = $context->getRequest();

$sites = [];
$db_sites = \CSite::GetList($by = 'sort', $order = 'desc', []);
while ($_site = $db_sites->Fetch()) {
    $sites[] = $_site;
}


$ar_all_options = [
    'main' =>[
        ['body_class', Loc::getMessage('WEBTEAMBY_BASE_MAIN_BODY_CLASS'), 'select', ['select_data' => [] ] ],
    ],
    'second' => [
        ['brands_present', Loc::getMessage('WEBTEAMBY_BASE_BRANDS_PRESENT_LIST'), ['mselect'], ['select_data' => [] ] ],
    ]
];


$ar_tabs = [
    ['DIV' => 'edit1', 'TAB' => Loc::getMessage('WEBTEAMBY_BASE_TAB_1'), 'ICON' => 'ib_main_settings', 'TITLE' => Loc::getMessage('WEBTEAMBY_BASE_MAIN_TAB_TITLE_SET')],
    ['DIV' => 'edit2', 'TAB' => Loc::getMessage('WEBTEAMBY_BASE_TAB_2'), 'ICON' => 'ib_settings', 'TITLE' => Loc::getMessage('WEBTEAMBY_BASE_MARKETING_TAB_TITLE_SET')],
];

$ar_tabs = [];

$tabs_config = [
        [
                'TITLE' => 'Таб 1',
                'SET' => 'TAB_1',
                'DIV' => 'TAB_1_#SITE_ID#',
                'TAB' => 'TAB_1',
                'ONSELECT' => "document.forms['bitlate_settings'].setTabControl_active_tab.value='TAB_1_#SITE_ID#'",
                'config' => [
                        'sections' => [
                                [
                                        'section_title' => 'Секция 1',
                                        'config' => [
                                            [
                                                    'param_1',
                                                    Loc::getMessage('WEBTEAMBY_BASE_PARAM_1_NAME'),
                                                    'select',
                                                    [
                                                            'select_data' => [
                                                                'reference_id' => [
                                                                    0 => 0,
                                                                    1 => 1,
                                                                    2 => 2,
                                                                    3 => 3,
                                                                    4 => 4
                                                                ],
                                                                'reference' => [
                                                                    0 => 'ноль',
                                                                    1 => 'один',
                                                                    2 => 'два',
                                                                    3 => 'три',
                                                                    4 => 'четыре'
                                                                ]
                                                            ],
                                                            'default' => [],
                                                            'size' => 0,
                                                            'rows' => 0,
                                                            'cols' => 0,
                                                    ]
                                            ],
                                            [
                                                    'param_2',
                                                    Loc::getMessage('WEBTEAMBY_BASE_PARAM_2_NAME'),
                                                    'checkbox',
                                                    [
                                                        'default' => '',
                                                        'size' => 0,
                                                        'rows' => 0,
                                                        'cols' => 0,
                                                    ]
                                            ],
                                            [
                                                'param_3',
                                                Loc::getMessage('WEBTEAMBY_BASE_PARAM_3_NAME'),
                                                'mselect',
                                                [
                                                    'select_data' => [
                                                        'reference_id' => [
                                                            0 => 0,
                                                            1 => 1,
                                                            2 => 2,
                                                            3 => 3,
                                                            4 => 4
                                                        ],
                                                        'reference' => [
                                                            0 => 'ноль',
                                                            1 => 'один',
                                                            2 => 'два',
                                                            3 => 'три',
                                                            4 => 'четыре'
                                                        ]
                                                    ],
                                                    'default' => [],
                                                    'size' => 0,
                                                    'rows' => 0,
                                                    'cols' => 0,
                                                ]
                                            ],
                                            [
                                                'param_4',
                                                Loc::getMessage('WEBTEAMBY_BASE_PARAM_4_NAME'),
                                                'text',
                                                [
                                                    'default' => '',
                                                    'size' => 35,
                                                    'rows' => 3,
                                                    'cols' => 15,
                                                ]
                                            ],
                                            [
                                                'param_5',
                                                Loc::getMessage('WEBTEAMBY_BASE_PARAM_5_NAME'),
                                                'textarea',
                                                [
                                                    'default' => '',
                                                    'size' => 0,
                                                    'rows' => 3,
                                                    'cols' => 15,
                                                ]
                                            ],
                                        ]
                                ]
                        ]
                ]
        ],
        [
                'TITLE' => 'Таб 2',
                'SET' => 'TAB_2',
                'DIV' => 'TAB_2_#SITE_ID#',
                'TAB' => 'TAB_2',
                'ONSELECT' => "document.forms['bitlate_settings'].setTabControl_active_tab.value='TAB_2_#SITE_ID#'",
                'config' => [
                        'sections' => [
                                [
                                        'section_title' => 'Секция 21',
                                        'config' => [
                                            [
                                                    'param_21',
                                                    Loc::getMessage('WEBTEAMBY_BASE_PARAM_21_NAME'),
                                                    'select',
                                                    [
                                                            'select_data' => [
                                                                'reference_id' => [
                                                                    0 => 0,
                                                                    1 => 1,
                                                                    2 => 2,
                                                                    3 => 3,
                                                                    4 => 4
                                                                ],
                                                                'reference' => [
                                                                    0 => 'ноль',
                                                                    1 => 'один',
                                                                    2 => 'два',
                                                                    3 => 'три',
                                                                    4 => 'четыре'
                                                                ]
                                                            ],
                                                            'default' => [],
                                                            'size' => 0,
                                                            'rows' => 0,
                                                            'cols' => 0,
                                                    ]
                                            ],
                                            [
                                                    'param_22',
                                                    Loc::getMessage('WEBTEAMBY_BASE_PARAM_22_NAME'),
                                                    'checkbox',
                                                    [
                                                        'default' => '',
                                                        'size' => 0,
                                                        'rows' => 0,
                                                        'cols' => 0,
                                                    ]
                                            ],
                                            [
                                                'param_23',
                                                Loc::getMessage('WEBTEAMBY_BASE_PARAM_23_NAME'),
                                                'mselect',
                                                [
                                                    'select_data' => [
                                                        'reference_id' => [
                                                            0 => 0,
                                                            1 => 1,
                                                            2 => 2,
                                                            3 => 3,
                                                            4 => 4
                                                        ],
                                                        'reference' => [
                                                            0 => 'ноль',
                                                            1 => 'один',
                                                            2 => 'два',
                                                            3 => 'три',
                                                            4 => 'четыре'
                                                        ]
                                                    ],
                                                    'default' => [],
                                                    'size' => 0,
                                                    'rows' => 0,
                                                    'cols' => 0,
                                                ]
                                            ],
                                            [
                                                'param_24',
                                                Loc::getMessage('WEBTEAMBY_BASE_PARAM_24_NAME'),
                                                'text',
                                                [
                                                    'default' => '',
                                                    'size' => 50,
                                                    'rows' => 0,
                                                    'cols' => 0,
                                                ]
                                            ],
                                            [
                                                'param_25',
                                                Loc::getMessage('WEBTEAMBY_BASE_PARAM_25_NAME'),
                                                'textarea',
                                                [
                                                    'default' => '',
                                                    'size' => '',
                                                    'rows' => 4,
                                                    'cols' => 20,
                                                ]
                                            ],
                                        ]
                                ]
                        ]
                ]
        ],

];

if(is_array($sites) && count($sites) > 0){
    foreach ($sites as $_site){
        $ar_tabs[] = [
                'DIV' => 'edit' . $_site['LID'],
                'TAB' => "{$_site['NAME']} ({$_site['LID']})",
                'ICON' => 'settings',
                'SITE_ID' => $_site['LID'],
                'TITLE' => Loc::getMessage('WEBTEAMBY_BASE_OPTIONS_FOR_SITE', ['#SITE_ID#' => $_site['LID']]),
        ];
    }
}?>

<?if(is_array($ar_tabs) && count($ar_tabs) > 0){?>
    <?$tab_control = new \CAdminTabControl('tabControl', $ar_tabs);?>
    <?$tab_control->Begin();?>
    <?if($REQUEST_METHOD == 'POST' && strlen($update.$apply.$restore_defaults) > 0 && check_bitrix_sessid()) {
        if(strlen($restore_defaults) > 0) {
            Option::delete($MODULE_ID);
            CAdminMessage::showMessage([
                'MESSAGE' => Loc::getMessage('WEBTEAMBY_BASE_OPTIONS_RESTORED'),
                'TYPE' => 'OK',
            ]);
        } else {
            foreach ($ar_tabs as $_tab){ // уровень сайтов
                if(is_array($tabs_config) && count($tabs_config) > 0){ // уровень табов для сайта
                    foreach ($tabs_config as $_tab_config){
                        if(is_array($_tab_config['config']) && count($_tab_config['config']) > 0){
                            foreach ($_tab_config['config'] as $_sections){ // уровень секций
                                if(is_array($_sections) && count($_sections) > 0){
                                    foreach ($_sections as $_section){ // уровень секции
                                        if(is_array($_section['config']) && count($_section['config']) > 0){
                                            foreach ($_section['config'] as $_param){ // уровень параметра (секция, таб, сайт)
                                                $name = $_param[0] . '_' . $_tab['SITE_ID'];
                                                $val = $request->getPost($name);
                                                if($_param[2] == 'checkbox' && $val != 'Y'){
                                                    $val = 'N';
                                                }elseif ($_param[2] == 'mselect'){
                                                    if(!is_array($val) || empty($val)){
                                                        $val = [];
                                                    }
                                                    $val = serialize($val);
                                                }
                                                Option::set($MODULE_ID, $_param[0], $val, $_tab['SITE_ID']);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if(strlen($update) > 0 && strlen($_REQUEST['back_url_settings']) > 0){
            LocalRedirect($_REQUEST['back_url_settings']);
        } else{
            LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".urlencode(LANGUAGE_ID)."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tab_control->ActiveTabParam());
        }
    }?>
    <form method="post" action="<?= $APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?= LANGUAGE_ID?>">
        <?foreach ($ar_tabs as $_tab){?>
            <?$tab_control->BeginNextTab();?>
            <tr><td colspan="2">
            <?$sections_config = []?>
            <?foreach ($tabs_config as $_config){?>
                <?$sections_config[] = [
                    'SET' => str_replace('#SITE_ID#', $_tab['SITE_ID'], $_config['SET']),
                    'DIV' => str_replace('#SITE_ID#', $_tab['SITE_ID'], $_config['DIV']),
                    'TAB' => str_replace('#SITE_ID#', $_tab['SITE_ID'], $_config['TAB']),
                    'TITLE' => str_replace('#SITE_ID#', $_tab['SITE_ID'], $_config['TITLE'])
                ]?>
            <?}?>
            <?if(is_array($sections_config) && count($sections_config) > 0){?>
                <?$set_tab_control = new CAdminViewTabControl('setTabControl_' . $_tab['SITE_ID'], $sections_config)?>
                <?$set_tab_control->Begin();?>
                <?foreach ($tabs_config as $_config){?>
                    <?$cur_tab = $_config['DIV'];?>
                    <?$suffix = ($cur_tab <> ''? '_bx_set_' . $cur_tab : '');?>
                    <?$set_tab_control->BeginNextTab();?>
                    <table cellpadding="0" cellspacing="0" border="0" class="edit-table" width="100%" id="site_settings<?= $suffix?>">
                        <?if(is_array($_config['config']['sections']) && count($_config['config']['sections']) > 0){?>
                            <?foreach ($_config['config']['sections'] as $_section){?>
                                <?if(!empty($_section['section_title'])){?>
                                    <tr class="heading">
                                        <td colspan="2"><b><?= $_section['section_title']?></b></td>
                                    </tr>
                                <?}?>
                                <?if(is_array($_section['config']) && count($_section['config']) > 0){?>
                                    <?// начало прорисовки свойств секции?>
                                    <?foreach ($_section['config'] as $_param){?>
                                        <?
                                        $val = Option::get($MODULE_ID, $_param[0], $_param[3]['default'], $_tab['SITE_ID']);
                                        if($_param[2] == 'mselect'){
                                            $val = unserialize($val);
                                        }
                                        $_param[0] = $_param[0] . '_' . $_tab['SITE_ID'];
                                        ?>
                                        <tr>
                                            <td width="30%" nowrap <?if($_param[2] == 'textarea'){?>class="adm-detail-valign-top"<?}?> >
                                                <label for="<?= htmlspecialcharsbx($_param[0])?>"><?= $_param[1]?>:</label>
                                            <td width="70%">
                                                <?if($_param[2] == 'checkbox'){?>
                                                    <input type="checkbox" id="<?= htmlspecialcharsbx($_param[0])?>" name="<?= htmlspecialcharsbx($_param[0])?>" value="Y" <?if($val == 'Y'){?>checked<?}?> >
                                                <?}elseif($_param[2] == 'text'){?>
                                                    <input type="text" size="<?= $_param[3]['size']?>" maxlength="255" value="<?= htmlspecialcharsbx($val)?>" name="<?= htmlspecialcharsbx($_param[0])?>">
                                                <?}elseif($_param[2] == 'textarea'){?>
                                                    <textarea rows="<?= $_param[3]['rows']?>" cols="<?= $_param[3]['cols']?>" name="<?= htmlspecialcharsbx($_param[0])?>"><?= htmlspecialcharsbx($val)?></textarea>
                                                <?}elseif($_param[2] == 'select'){?>
                                                    <?= SelectBoxFromArray($_param[0], ['reference_id' => $_param[3]['select_data']['reference_id'], 'reference' => $_param[3]['select_data']['reference']], $val);?>
                                                <?}elseif($_param[2] == 'mselect'){?>
                                                    <?= SelectBoxMFromArray($_param[0].'[]', ['reference_id' => $_param[3]['select_data']['reference_id'], 'reference' => $_param[3]['select_data']['reference']], $val);?>
                                                <?}?>
                                            </td>
                                        </tr>
                                    <?}?>
                                <?}?>
                            <?}?>
                        <?}?>
                    </table>
                <?}?>
                <?$set_tab_control->End();?>
            <?}?>
            <?//echo '<pre>'.print_r($_section, true).'</pre>';?>
        <?}?>
        </td></tr>
        <?$tab_control->Buttons();?>
        <input type="submit" name="update" value="<?= Loc::getMessage('WEBTEAMBY_BASE_MAIN_SAVE')?>" title="<?= Loc::getMessage('WEBTEAMBY_BASE_MAIN_SAVE')?>" class="adm-btn-save">
        <input type="submit" name="apply" value="<?= Loc::getMessage('WEBTEAMBY_BASE_MAIN_APPLY')?>" title="<?= Loc::getMessage('WEBTEAMBY_BASE_MAIN_APPLY')?>">
        <?if(isset($_REQUEST['back_url_settings']) && strlen($_REQUEST['back_url_settings']) > 0){?>
            <input type="button" name="cancel" value="<?= Loc::getMessage('MAIN_OPT_CANCEL')?>" title="<?=Loc::getMessage('MAIN_OPT_CANCEL_TITLE')?>" onclick="window.location='<?= htmlspecialcharsbx(CUtil::addslashes($_REQUEST['back_url_settings']))?>'">
            <input type="hidden" name="back_url_settings" value="<?= htmlspecialcharsbx($_REQUEST['back_url_settings'])?>">
        <?}?>
        <input type="submit" name="restore_defaults" title="<?= Loc::getMessage('WEBTEAMBY_BASE_MAIN_HINT_RESTORE_DEFAULTS')?>" onclick="return confirm('<?= AddSlashes(Loc::getMessage('MAIN_HINT_RESTORE_DEFAULTS_WARNING'))?>')" value="<?= Loc::getMessage('WEBTEAMBY_BASE_MAIN_HINT_RESTORE_DEFAULTS')?>">
        <?=bitrix_sessid_post();?>
        <?$tab_control->End();?>
    </form>
<?}?>