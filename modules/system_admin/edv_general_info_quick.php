<?php

require './roots.php';
require $root_path . 'include/inc_environment_global.php';
/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * elpidio@care2x.org,
 *
 * See the file "copy_notice.txt" for the licence notice
 */
$lang_tables[] = 'startframe.php';
define('LANG_FILE', 'edp.php');
$local_user = 'ck_edv_user';
require_once $root_path . 'include/inc_front_chain_lang.php';

$breakfile = 'edv-system-admi-welcome.php' . URL_APPEND;
$thisfile = basename($_SERVER['PHP_SELF']);

$GLOBAL_CONFIG = array();
require_once $root_path . 'include/care_api_classes/class_globalconfig.php';
# Create object linking our global config array to the object
$glob_obj = new GlobalConfig($GLOBAL_CONFIG);

# Save data if save mode
if (isset($mode) && $mode == 'save') {

	$filter = 'main_info_'; # The index filter
	$numeric = FALSE; # Values are not strictly numeric
	$addslash = TRUE; # Slashes should be added to the stored values
	# Save the configuration
	$glob_obj->saveConfigArray($_POST, $filter, $numeric, '', $addslash);

	# Loop back to self to get the newly stored values
	header("location:$thisfile" . URL_REDIRECT_APPEND . "&save_ok=1");
	exit;

# Else get current global data
} else {
	$glob_obj->getConfig('main_info%');
}

# Start Smarty templating here
/**
 * LOAD Smarty
 */
# Note: it is advisable to load this after the inc_front_chain_lang.php so
# that the smarty script can use the user configured template theme

require_once $root_path . 'gui/smarty_template/smarty_care.class.php';
$smarty = new smarty_care('system_admin');

# Title in toolbar
$smarty->assign('sToolbarTitle', $LDQuickInformer);

# href for help button
$smarty->assign('pbHelp', "javascript:gethelp('quickinfo.php')");

# href for close button
$smarty->assign('breakfile', $breakfile);

# Window bar title
$smarty->assign('sWindowTitle', $LDQuickInformer);

# Assign prompt if saved
if (isset($save_ok) && $save_ok) {
	$smarty->assign('sMascotImg', '<img ' . createMascot($root_path, 'mascot1_r.gif', '0', 'absmiddle') . '>');
	$smarty->assign('LDDataSaved', $LDDataSaved);
}

# Assign prompt
$smarty->assign('LDEnterInfo', $LDEnterInfo);

# Assign form elements
$smarty->assign('LDPhonePolice', $LDPhonePolice);
$smarty->assign('LDPhoneFire', $LDPhoneFire);
$smarty->assign('LDAmbulance', $LDAmbulance);
$smarty->assign('LDPhone', $LDPhone);
$smarty->assign('LDFax', $LDFax);
$smarty->assign('LDName', $LDName);
$smarty->assign('LDLogo', $LDLogo);
$smarty->assign('LDAddress', $LDAddress);
$smarty->assign('LDEmail', $LDEmail);

# Assign input values
$main_info_police_nr = $glob_obj->getConfigValue('main_info_police_nr');
$main_info_fire_dept_nr = $glob_obj->getConfigValue('main_info_fire_dept_nr');
$main_info_emgcy_nr = $glob_obj->getConfigValue('main_info_emgcy_nr');
$main_info_phone = $glob_obj->getConfigValue('main_info_phone');
$main_info_fax = $glob_obj->getConfigValue('main_info_fax');
$main_info_name = $glob_obj->getConfigValue('main_info_name');
$main_info_logo = $glob_obj->getConfigValue('main_info_logo');
$main_info_address = $glob_obj->getConfigValue('main_info_address');
$main_info_email = $glob_obj->getConfigValue('main_info_email');

$smarty->assign('main_info_police_nr', $main_info_police_nr);
$smarty->assign('main_info_fire_dept_nr', $main_info_fire_dept_nr);
$smarty->assign('main_info_emgcy_nr', $main_info_emgcy_nr);
$smarty->assign('main_info_phone', $main_info_phone);
$smarty->assign('main_info_fax', $main_info_fax);
$smarty->assign('main_info_name', $main_info_name);
$smarty->assign('main_info_logo', $main_info_logo);
$smarty->assign('main_info_address', $main_info_address);
$smarty->assign('main_info_email', $main_info_email);

# Create and assign save button
$smarty->assign('sSave', '<input type="image" ' . createLDImgSrc($root_path, 'savedisc.gif', '0') . '>
	<input type="hidden" name="sid" value="' . $sid . '">
	<input type="hidden" name="lang" value="' . $lang . '">
	<input type="hidden" name="mode" value="save">');

# Cancel button
$smarty->assign('sCancel', '<a href="' . $breakfile . '"><img ' . createLDImgSrc($root_path, 'cancel.gif', '0') . '></a>');

# Assign template as include file to the mainframe template

$smarty->assign('sMainBlockIncludeFile', 'system_admin/quick_informer.tpl');
/**
 * show Template
 */

$smarty->assign('closeSysAdmin', TRUE);

$smarty->display('common/mainframe.tpl');
?>
