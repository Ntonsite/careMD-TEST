<?php
require './roots.php';

require $root_path . 'include/inc_environment_global.php';
require $root_path . 'language/en/lang_en_reporting.php_original';
/**
 * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2005 Robert Meggle based on the development of Elpidio Latorilla (2002,2003,2004,2005)
 * elpidio@care2x.org, meggle@merotech.de
 *
 * See the file "copy_notice.txt" for the licence notice
 */
$lang_tables[] = 'pharmacy.php';
//define('NO_2LEVEL_CHK',1);
require $root_path . 'include/inc_front_chain_lang.php';

?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<HTML>
    <HEAD>
        <TITLE><?php echo $LDReportingModule; ?></TITLE>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta name="Author" content="Robert Meggle">
        <meta name="Generator" content="various: Quanta, AceHTML 4 Freeware, NuSphere, PHP Coder">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <script language="javascript" >
<!--
            function gethelp(x, s, x1, x2, x3, x4)
            {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php?sid=<?php echo sid; ?>&lang=$lang&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }
// -->

        </script>
        <link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
        <script language="javascript" src="../../js/hilitebu.js"></script>

        <STYLE TYPE="text/css">
            A:link  {color: #000066;}
            A:hover {color: #cc0033;}
            A:active {color: #cc0000;}
            A:visited {color: #000066;}
            A:visited:active {color: #cc0000;}
            A:visited:hover {color: #cc0033;}

        tr.spaceUp>td {
          padding-top: 3em;
        }

        tr.spaceMd>td {
          padding-top: 0.5em;
          padding-bottom: 0.5em;
        }

        tr.spaceBtm>td {
          padding-bottom: 3em;
          padding-top: .5em;
        }

        tr.spaceTp>td {
          padding-top: 2em;
        }



        </style>
        <script language="JavaScript">
<!--

            function popPic(pid, nm) {

                if (pid != "")
                    regpicwindow = window.open("../../main/pop_reg_pic.php?sid=<?php echo sid; ?>&lang=$lang&pid=" + pid + "&nm=" + nm, "regpicwin", "toolbar=no,scrollbars,width=180,height=250");

            }
            function getARV(path) {
                urlholder = "<?php echo $root_path ?>" + path + "<?php echo URL_REDIRECT_APPEND; ?>";
                patientwin = window.open(urlholder, "arv", "menubar=no,resizable=yes,scrollbars=yes");
                patientwin.resizeTo(screen.availWidth, screen.availHeight);
                patientwin.focus();
            }



            // -->
            function checkloc(){
                var substore=document.getElementById("substore").value;
                if(substore==''){
                    alert("PLEASE SELECT PHARMACY");
                    return false;

                }


            }
        </script>


    </HEAD>
    <?php
require_once $root_path . 'main_theme/inc_reporting_permission.php';

require_once $root_path . 'main_theme/head.inc.php';
require_once $root_path . 'main_theme/header.inc.php';
require_once $root_path . 'main_theme/topHeader.inc.php';
?>
    <BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066  >

        <!-- START HEAD OF HTML CONTENT --->

        <table width=100% border=0 cellspacing=0 height=100%>
            <tr>
                <td  valign="top" height="35">
                    <table cellspacing="0"  class="titlebar" border=0>
                        <tr valign=top  class="titlebar" >
                            <td width="202" bgcolor="#99ccff" >
                                &nbsp;&nbsp;<font color="#330066"><?php echo $LDPharmacyReports; ?></font></td>
                            <td width="408" align=right bgcolor="#99ccff">
                                <a href="javascript: history.back();"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)" ></a>
                                <a href="javascript:gethelp('reporting_overview.php','Reporting :: Overview')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                                <a href="javascript:history.back()" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                            </td>
                        </tr>
                    </table>

                    <!-- END OF HEAD OF HTML CONTENT--->
                    <?php
$data = array();
$sql_subtore = "SELECT loccode, locationname FROM locations WHERE locationname like '%pharmacy%'";
$substore_result = $db->Execute($sql_subtore);
while ($r = $substore_result->FetchRow()) {
	$data['subtore'][] = $r;
}
?>
                    <form name="form1" method="GET" action="pharmacy_tz.php" onsubmit="return checkloc()">
                        <p>&nbsp;</p>
                        <table width="746"  bgcolor="#CCCCCC" border="0" style="margin-left: 20px;">
                            <tr class="spaceTp">
                                <td width="19" ><img src="../../gui/img/common/default/icontopdf.gif"></td>
                                <td width="150">
                                    <select name="substore" id="substore">
                                        <option value=""></option>
                                    <?php
while (list($x, $v) = each($data['subtore'])) {
	?>
                                            <option value="<?php echo $v['loccode']; ?>"><?php echo $v['locationname']; ?></option>
                                            <?php
}
?>

                                    </select>
                                </td>
                                <td width="19"><img src="../../gui/img/common/default/l-arrowgrnlrg.gif"></td>
                                <td><?php echo $LDSelectsubstore; ?></td>
                            </tr>

                            <tr class="spaceBtm">
                                <td>&nbsp;</td>
                                <td><input type="image" name="submit" value="SUBMIT" src="../../gui/img/control/default/en/en_continue.gif" value="submit"></td>
                                <td colspan="2">&nbsp;<?php echo $LDStoreListTxt; ?></td>
                            </tr>

                            <tr  height=1>
                                <td colSpan=4  class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></td>
                            </tr>

                            <?php if ($showProductCatalog): ?>
                            <tr class="spaceMd">
                                <td style="margin-top: 200px;"><img src="../../gui/img/common/default/templates.gif" border=0 width="16" height="17"></td>
                                <td><nobr><a href="pharmacy_tz_product_catalog.php"><?php echo $LDMyProductCatalog; ?></a></nobr></td>
                                <td colspan="2"><?php echo $LDCreateEditUpdateRemove; ?></td>
                            </tr>
                            <?php endif?>

                            <tr  height=1>
                                <td colSpan=4  class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></td>
                            </tr>

                            <tr class="spaceMd">
                                <td align=center><img src="../../gui/img/common/default/documents.gif" border=0 width="16" height="17"></td>
                                <td class="submenu_item"><nobr><a href="./magage_pricelist.php"><?php echo $LDManagePriceList; ?></a></nobr></td>
                                <td colspan="2"><?php echo $LDManagePriceList_description; ?></td>
                            </tr>
                        </table>
                        <p>&nbsp;</p>
                    </form>

<?php
//echo $_POST['substore'];
?>
<?php require_once $root_path . 'main_theme/footer.inc.php';?>




