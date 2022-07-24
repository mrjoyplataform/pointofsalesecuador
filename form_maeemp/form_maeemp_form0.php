<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " maeemp"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " maeemp"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
<style type="text/css">
.ui-datepicker { z-index: 6 !important }
</style>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_rp01fechastatus button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechanacimiento button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechaingreso button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechareingreso button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechahijos0 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechahijos1 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechahijos2 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechahijos3 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechahijos4 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechahijos5 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechahijos6 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechahijos7 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechahijos8 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechahijos9 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechaultvacacion button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fecmodsdosal button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fecmodficha button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rp01fechauid button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_maeemp/form_maeemp_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_maeemp_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['last'] : 'off'); ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       if ("off" == Nav_binicio_macro_disabled) { $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       if ("off" == Nav_bretorna_macro_disabled) { $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       if ("off" == Nav_bfinal_macro_disabled) { $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       if ("off" == Nav_bavanca_macro_disabled) { $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_maeemp_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>

<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys.inc.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys_setup.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<script type="text/javascript">

function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchKeyUp(sPos, e) {
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
       else
       {
           $('#SC_fast_search_submit_'+sPos).show();
       }
     }
   }
   function nm_gp_submit_qsearch(pos)
   {
        nm_move('fast_search', pos);
   }
   function nm_gp_open_qsearch_div(pos)
   {
        if (typeof nm_gp_open_qsearch_div_mobile == 'function') {
            return nm_gp_open_qsearch_div_mobile(pos);
        }
        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))
        {
            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())
            {
                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});
            }

            nm_gp_open_qsearch_div_store_temp(pos);
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');
        }
        else
        {
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
        $('#id_qs_div_' + pos).toggle();
   }

   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = "";
   function nm_gp_open_qsearch_div_store_temp(pos)
   {
        tmp_qs_arr_fields = [], tmp_qs_str_cond = "";

        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')
        {
            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();
        }
        else
        {
            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());
        }

        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();
   }

   function nm_gp_cancel_qsearch_div_store_temp(pos)
   {
        $('#fast_search_f0_' + pos).val('');
        $("#fast_search_f0_" + pos + " option").prop('selected', false);
        for(it=0; it<tmp_qs_arr_fields.length; it++)
        {
            $("#fast_search_f0_" + pos + " option[value='"+ tmp_qs_arr_fields[it] +"']").prop('selected', true);
        }
        $("#fast_search_f0_" + pos).change();
        tmp_qs_arr_fields = [];

        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);
        $('#cond_fast_search_f0_' + pos).change();
        tmp_qs_str_cond = "";

        nm_gp_open_qsearch_div(pos);
   } if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_maeemp_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_maeemp'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_maeemp'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="60%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<tr><td>
<?php
$this->displayTopToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input id='fast_search_f0_t' type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <select id='cond_fast_search_f0_t' class="scFormToolbarInput" style="vertical-align: middle;display:none;" name="nmgp_cond_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $OPC_sel = ("qp" == $OPC_arg) ? " selected" : "";
           echo "           <option value='qp'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>";
?> 
          </select>
          <span id="quicksearchph_t" class="scFormToolbarInput" style='display: inline-block; vertical-align: inherit'>
              <span>
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <img style="display: <?php echo $stateSearchIconSearch ?>; "  id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
                  <img style="display: <?php echo $stateSearchIconClose ?>; " id="SC_fast_search_close_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
          </span>  </div>
  <?php
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['rp01noemp']))
           {
               $this->nmgp_cmp_readonly['rp01noemp'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01noemp']))
    {
        $this->nm_new_label['rp01noemp'] = "Rp 0 1noemp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01noemp = $this->rp01noemp;
   $sStyleHidden_rp01noemp = '';
   if (isset($this->nmgp_cmp_hidden['rp01noemp']) && $this->nmgp_cmp_hidden['rp01noemp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01noemp']);
       $sStyleHidden_rp01noemp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01noemp = 'display: none;';
   $sStyleReadInp_rp01noemp = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["rp01noemp"]) &&  $this->nmgp_cmp_readonly["rp01noemp"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01noemp']);
       $sStyleReadLab_rp01noemp = '';
       $sStyleReadInp_rp01noemp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01noemp']) && $this->nmgp_cmp_hidden['rp01noemp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01noemp" value="<?php echo $this->form_encode_input($rp01noemp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01noemp_label" id="hidden_field_label_rp01noemp" style="<?php echo $sStyleHidden_rp01noemp; ?>"><span id="id_label_rp01noemp"><?php echo $this->nm_new_label['rp01noemp']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01noemp']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01noemp'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01noemp_line" id="hidden_field_data_rp01noemp" style="<?php echo $sStyleHidden_rp01noemp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01noemp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["rp01noemp"]) &&  $this->nmgp_cmp_readonly["rp01noemp"] == "on")) { 

 ?>
<input type="hidden" name="rp01noemp" value="<?php echo $this->form_encode_input($rp01noemp) . "\"><span id=\"id_ajax_label_rp01noemp\">" . $rp01noemp . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_rp01noemp" class="sc-ui-readonly-rp01noemp css_rp01noemp_line" style="<?php echo $sStyleReadLab_rp01noemp; ?>"><?php echo $this->form_format_readonly("rp01noemp", $this->form_encode_input($this->rp01noemp)); ?></span><span id="id_read_off_rp01noemp" class="css_read_off_rp01noemp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01noemp; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01noemp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01noemp" type=text name="rp01noemp" value="<?php echo $this->form_encode_input($rp01noemp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01noemp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01noemp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01division']))
    {
        $this->nm_new_label['rp01division'] = "Rp 0 1division";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01division = $this->rp01division;
   $sStyleHidden_rp01division = '';
   if (isset($this->nmgp_cmp_hidden['rp01division']) && $this->nmgp_cmp_hidden['rp01division'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01division']);
       $sStyleHidden_rp01division = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01division = 'display: none;';
   $sStyleReadInp_rp01division = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01division']) && $this->nmgp_cmp_readonly['rp01division'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01division']);
       $sStyleReadLab_rp01division = '';
       $sStyleReadInp_rp01division = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01division']) && $this->nmgp_cmp_hidden['rp01division'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01division" value="<?php echo $this->form_encode_input($rp01division) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01division_label" id="hidden_field_label_rp01division" style="<?php echo $sStyleHidden_rp01division; ?>"><span id="id_label_rp01division"><?php echo $this->nm_new_label['rp01division']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01division_line" id="hidden_field_data_rp01division" style="<?php echo $sStyleHidden_rp01division; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01division_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01division"]) &&  $this->nmgp_cmp_readonly["rp01division"] == "on") { 

 ?>
<input type="hidden" name="rp01division" value="<?php echo $this->form_encode_input($rp01division) . "\">" . $rp01division . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01division" class="sc-ui-readonly-rp01division css_rp01division_line" style="<?php echo $sStyleReadLab_rp01division; ?>"><?php echo $this->form_format_readonly("rp01division", $this->form_encode_input($this->rp01division)); ?></span><span id="id_read_off_rp01division" class="css_read_off_rp01division<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01division; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01division_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01division" type=text name="rp01division" value="<?php echo $this->form_encode_input($rp01division) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01division_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01division_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01depto']))
    {
        $this->nm_new_label['rp01depto'] = "Rp 0 1depto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01depto = $this->rp01depto;
   $sStyleHidden_rp01depto = '';
   if (isset($this->nmgp_cmp_hidden['rp01depto']) && $this->nmgp_cmp_hidden['rp01depto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01depto']);
       $sStyleHidden_rp01depto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01depto = 'display: none;';
   $sStyleReadInp_rp01depto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01depto']) && $this->nmgp_cmp_readonly['rp01depto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01depto']);
       $sStyleReadLab_rp01depto = '';
       $sStyleReadInp_rp01depto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01depto']) && $this->nmgp_cmp_hidden['rp01depto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01depto" value="<?php echo $this->form_encode_input($rp01depto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01depto_label" id="hidden_field_label_rp01depto" style="<?php echo $sStyleHidden_rp01depto; ?>"><span id="id_label_rp01depto"><?php echo $this->nm_new_label['rp01depto']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01depto_line" id="hidden_field_data_rp01depto" style="<?php echo $sStyleHidden_rp01depto; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01depto_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01depto"]) &&  $this->nmgp_cmp_readonly["rp01depto"] == "on") { 

 ?>
<input type="hidden" name="rp01depto" value="<?php echo $this->form_encode_input($rp01depto) . "\">" . $rp01depto . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01depto" class="sc-ui-readonly-rp01depto css_rp01depto_line" style="<?php echo $sStyleReadLab_rp01depto; ?>"><?php echo $this->form_format_readonly("rp01depto", $this->form_encode_input($this->rp01depto)); ?></span><span id="id_read_off_rp01depto" class="css_read_off_rp01depto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01depto; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01depto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01depto" type=text name="rp01depto" value="<?php echo $this->form_encode_input($rp01depto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01depto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01depto_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01seccion']))
    {
        $this->nm_new_label['rp01seccion'] = "Rp 0 1seccion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01seccion = $this->rp01seccion;
   $sStyleHidden_rp01seccion = '';
   if (isset($this->nmgp_cmp_hidden['rp01seccion']) && $this->nmgp_cmp_hidden['rp01seccion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01seccion']);
       $sStyleHidden_rp01seccion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01seccion = 'display: none;';
   $sStyleReadInp_rp01seccion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01seccion']) && $this->nmgp_cmp_readonly['rp01seccion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01seccion']);
       $sStyleReadLab_rp01seccion = '';
       $sStyleReadInp_rp01seccion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01seccion']) && $this->nmgp_cmp_hidden['rp01seccion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01seccion" value="<?php echo $this->form_encode_input($rp01seccion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01seccion_label" id="hidden_field_label_rp01seccion" style="<?php echo $sStyleHidden_rp01seccion; ?>"><span id="id_label_rp01seccion"><?php echo $this->nm_new_label['rp01seccion']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01seccion_line" id="hidden_field_data_rp01seccion" style="<?php echo $sStyleHidden_rp01seccion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01seccion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01seccion"]) &&  $this->nmgp_cmp_readonly["rp01seccion"] == "on") { 

 ?>
<input type="hidden" name="rp01seccion" value="<?php echo $this->form_encode_input($rp01seccion) . "\">" . $rp01seccion . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01seccion" class="sc-ui-readonly-rp01seccion css_rp01seccion_line" style="<?php echo $sStyleReadLab_rp01seccion; ?>"><?php echo $this->form_format_readonly("rp01seccion", $this->form_encode_input($this->rp01seccion)); ?></span><span id="id_read_off_rp01seccion" class="css_read_off_rp01seccion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01seccion; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01seccion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01seccion" type=text name="rp01seccion" value="<?php echo $this->form_encode_input($rp01seccion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01seccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01seccion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01noemp1']))
    {
        $this->nm_new_label['rp01noemp1'] = "Rp 0 1noemp 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01noemp1 = $this->rp01noemp1;
   $sStyleHidden_rp01noemp1 = '';
   if (isset($this->nmgp_cmp_hidden['rp01noemp1']) && $this->nmgp_cmp_hidden['rp01noemp1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01noemp1']);
       $sStyleHidden_rp01noemp1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01noemp1 = 'display: none;';
   $sStyleReadInp_rp01noemp1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01noemp1']) && $this->nmgp_cmp_readonly['rp01noemp1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01noemp1']);
       $sStyleReadLab_rp01noemp1 = '';
       $sStyleReadInp_rp01noemp1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01noemp1']) && $this->nmgp_cmp_hidden['rp01noemp1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01noemp1" value="<?php echo $this->form_encode_input($rp01noemp1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01noemp1_label" id="hidden_field_label_rp01noemp1" style="<?php echo $sStyleHidden_rp01noemp1; ?>"><span id="id_label_rp01noemp1"><?php echo $this->nm_new_label['rp01noemp1']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01noemp1_line" id="hidden_field_data_rp01noemp1" style="<?php echo $sStyleHidden_rp01noemp1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01noemp1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01noemp1"]) &&  $this->nmgp_cmp_readonly["rp01noemp1"] == "on") { 

 ?>
<input type="hidden" name="rp01noemp1" value="<?php echo $this->form_encode_input($rp01noemp1) . "\">" . $rp01noemp1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01noemp1" class="sc-ui-readonly-rp01noemp1 css_rp01noemp1_line" style="<?php echo $sStyleReadLab_rp01noemp1; ?>"><?php echo $this->form_format_readonly("rp01noemp1", $this->form_encode_input($this->rp01noemp1)); ?></span><span id="id_read_off_rp01noemp1" class="css_read_off_rp01noemp1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01noemp1; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01noemp1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01noemp1" type=text name="rp01noemp1" value="<?php echo $this->form_encode_input($rp01noemp1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01noemp1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01noemp1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01nombreemp']))
    {
        $this->nm_new_label['rp01nombreemp'] = "Rp 0 1nombreemp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01nombreemp = $this->rp01nombreemp;
   $sStyleHidden_rp01nombreemp = '';
   if (isset($this->nmgp_cmp_hidden['rp01nombreemp']) && $this->nmgp_cmp_hidden['rp01nombreemp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01nombreemp']);
       $sStyleHidden_rp01nombreemp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01nombreemp = 'display: none;';
   $sStyleReadInp_rp01nombreemp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01nombreemp']) && $this->nmgp_cmp_readonly['rp01nombreemp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01nombreemp']);
       $sStyleReadLab_rp01nombreemp = '';
       $sStyleReadInp_rp01nombreemp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01nombreemp']) && $this->nmgp_cmp_hidden['rp01nombreemp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01nombreemp" value="<?php echo $this->form_encode_input($rp01nombreemp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01nombreemp_label" id="hidden_field_label_rp01nombreemp" style="<?php echo $sStyleHidden_rp01nombreemp; ?>"><span id="id_label_rp01nombreemp"><?php echo $this->nm_new_label['rp01nombreemp']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01nombreemp_line" id="hidden_field_data_rp01nombreemp" style="<?php echo $sStyleHidden_rp01nombreemp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01nombreemp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01nombreemp"]) &&  $this->nmgp_cmp_readonly["rp01nombreemp"] == "on") { 

 ?>
<input type="hidden" name="rp01nombreemp" value="<?php echo $this->form_encode_input($rp01nombreemp) . "\">" . $rp01nombreemp . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01nombreemp" class="sc-ui-readonly-rp01nombreemp css_rp01nombreemp_line" style="<?php echo $sStyleReadLab_rp01nombreemp; ?>"><?php echo $this->form_format_readonly("rp01nombreemp", $this->form_encode_input($this->rp01nombreemp)); ?></span><span id="id_read_off_rp01nombreemp" class="css_read_off_rp01nombreemp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01nombreemp; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01nombreemp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01nombreemp" type=text name="rp01nombreemp" value="<?php echo $this->form_encode_input($rp01nombreemp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=40"; } ?> maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01nombreemp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01nombreemp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01categoria']))
    {
        $this->nm_new_label['rp01categoria'] = "Rp 0 1categoria";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01categoria = $this->rp01categoria;
   $sStyleHidden_rp01categoria = '';
   if (isset($this->nmgp_cmp_hidden['rp01categoria']) && $this->nmgp_cmp_hidden['rp01categoria'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01categoria']);
       $sStyleHidden_rp01categoria = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01categoria = 'display: none;';
   $sStyleReadInp_rp01categoria = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01categoria']) && $this->nmgp_cmp_readonly['rp01categoria'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01categoria']);
       $sStyleReadLab_rp01categoria = '';
       $sStyleReadInp_rp01categoria = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01categoria']) && $this->nmgp_cmp_hidden['rp01categoria'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01categoria" value="<?php echo $this->form_encode_input($rp01categoria) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01categoria_label" id="hidden_field_label_rp01categoria" style="<?php echo $sStyleHidden_rp01categoria; ?>"><span id="id_label_rp01categoria"><?php echo $this->nm_new_label['rp01categoria']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01categoria_line" id="hidden_field_data_rp01categoria" style="<?php echo $sStyleHidden_rp01categoria; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01categoria_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01categoria"]) &&  $this->nmgp_cmp_readonly["rp01categoria"] == "on") { 

 ?>
<input type="hidden" name="rp01categoria" value="<?php echo $this->form_encode_input($rp01categoria) . "\">" . $rp01categoria . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01categoria" class="sc-ui-readonly-rp01categoria css_rp01categoria_line" style="<?php echo $sStyleReadLab_rp01categoria; ?>"><?php echo $this->form_format_readonly("rp01categoria", $this->form_encode_input($this->rp01categoria)); ?></span><span id="id_read_off_rp01categoria" class="css_read_off_rp01categoria<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01categoria; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01categoria_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01categoria" type=text name="rp01categoria" value="<?php echo $this->form_encode_input($rp01categoria) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01categoria_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01categoria_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01turno']))
    {
        $this->nm_new_label['rp01turno'] = "Rp 0 1turno";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01turno = $this->rp01turno;
   $sStyleHidden_rp01turno = '';
   if (isset($this->nmgp_cmp_hidden['rp01turno']) && $this->nmgp_cmp_hidden['rp01turno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01turno']);
       $sStyleHidden_rp01turno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01turno = 'display: none;';
   $sStyleReadInp_rp01turno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01turno']) && $this->nmgp_cmp_readonly['rp01turno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01turno']);
       $sStyleReadLab_rp01turno = '';
       $sStyleReadInp_rp01turno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01turno']) && $this->nmgp_cmp_hidden['rp01turno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01turno" value="<?php echo $this->form_encode_input($rp01turno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01turno_label" id="hidden_field_label_rp01turno" style="<?php echo $sStyleHidden_rp01turno; ?>"><span id="id_label_rp01turno"><?php echo $this->nm_new_label['rp01turno']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01turno_line" id="hidden_field_data_rp01turno" style="<?php echo $sStyleHidden_rp01turno; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01turno_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01turno"]) &&  $this->nmgp_cmp_readonly["rp01turno"] == "on") { 

 ?>
<input type="hidden" name="rp01turno" value="<?php echo $this->form_encode_input($rp01turno) . "\">" . $rp01turno . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01turno" class="sc-ui-readonly-rp01turno css_rp01turno_line" style="<?php echo $sStyleReadLab_rp01turno; ?>"><?php echo $this->form_format_readonly("rp01turno", $this->form_encode_input($this->rp01turno)); ?></span><span id="id_read_off_rp01turno" class="css_read_off_rp01turno<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01turno; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01turno_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01turno" type=text name="rp01turno" value="<?php echo $this->form_encode_input($rp01turno) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01turno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01turno_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01statusemp']))
    {
        $this->nm_new_label['rp01statusemp'] = "Rp 0 1statusemp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01statusemp = $this->rp01statusemp;
   $sStyleHidden_rp01statusemp = '';
   if (isset($this->nmgp_cmp_hidden['rp01statusemp']) && $this->nmgp_cmp_hidden['rp01statusemp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01statusemp']);
       $sStyleHidden_rp01statusemp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01statusemp = 'display: none;';
   $sStyleReadInp_rp01statusemp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01statusemp']) && $this->nmgp_cmp_readonly['rp01statusemp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01statusemp']);
       $sStyleReadLab_rp01statusemp = '';
       $sStyleReadInp_rp01statusemp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01statusemp']) && $this->nmgp_cmp_hidden['rp01statusemp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01statusemp" value="<?php echo $this->form_encode_input($rp01statusemp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01statusemp_label" id="hidden_field_label_rp01statusemp" style="<?php echo $sStyleHidden_rp01statusemp; ?>"><span id="id_label_rp01statusemp"><?php echo $this->nm_new_label['rp01statusemp']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01statusemp_line" id="hidden_field_data_rp01statusemp" style="<?php echo $sStyleHidden_rp01statusemp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01statusemp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01statusemp"]) &&  $this->nmgp_cmp_readonly["rp01statusemp"] == "on") { 

 ?>
<input type="hidden" name="rp01statusemp" value="<?php echo $this->form_encode_input($rp01statusemp) . "\">" . $rp01statusemp . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01statusemp" class="sc-ui-readonly-rp01statusemp css_rp01statusemp_line" style="<?php echo $sStyleReadLab_rp01statusemp; ?>"><?php echo $this->form_format_readonly("rp01statusemp", $this->form_encode_input($this->rp01statusemp)); ?></span><span id="id_read_off_rp01statusemp" class="css_read_off_rp01statusemp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01statusemp; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01statusemp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01statusemp" type=text name="rp01statusemp" value="<?php echo $this->form_encode_input($rp01statusemp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01statusemp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01statusemp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechastatus']))
    {
        $this->nm_new_label['rp01fechastatus'] = "Rp 0 1fechastatus";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechastatus = $this->rp01fechastatus;
   $sStyleHidden_rp01fechastatus = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechastatus']) && $this->nmgp_cmp_hidden['rp01fechastatus'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechastatus']);
       $sStyleHidden_rp01fechastatus = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechastatus = 'display: none;';
   $sStyleReadInp_rp01fechastatus = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechastatus']) && $this->nmgp_cmp_readonly['rp01fechastatus'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechastatus']);
       $sStyleReadLab_rp01fechastatus = '';
       $sStyleReadInp_rp01fechastatus = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechastatus']) && $this->nmgp_cmp_hidden['rp01fechastatus'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechastatus" value="<?php echo $this->form_encode_input($rp01fechastatus) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechastatus_label" id="hidden_field_label_rp01fechastatus" style="<?php echo $sStyleHidden_rp01fechastatus; ?>"><span id="id_label_rp01fechastatus"><?php echo $this->nm_new_label['rp01fechastatus']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechastatus_line" id="hidden_field_data_rp01fechastatus" style="<?php echo $sStyleHidden_rp01fechastatus; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechastatus_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechastatus"]) &&  $this->nmgp_cmp_readonly["rp01fechastatus"] == "on") { 

 ?>
<input type="hidden" name="rp01fechastatus" value="<?php echo $this->form_encode_input($rp01fechastatus) . "\">" . $rp01fechastatus . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechastatus" class="sc-ui-readonly-rp01fechastatus css_rp01fechastatus_line" style="<?php echo $sStyleReadLab_rp01fechastatus; ?>"><?php echo $this->form_format_readonly("rp01fechastatus", $this->form_encode_input($rp01fechastatus)); ?></span><span id="id_read_off_rp01fechastatus" class="css_read_off_rp01fechastatus<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechastatus; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechastatus']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechastatus_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechastatus" type=text name="rp01fechastatus" value="<?php echo $this->form_encode_input($rp01fechastatus) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechastatus']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechastatus']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechastatus_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechastatus_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01causaretiro']))
    {
        $this->nm_new_label['rp01causaretiro'] = "Rp 0 1causaretiro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01causaretiro = $this->rp01causaretiro;
   $sStyleHidden_rp01causaretiro = '';
   if (isset($this->nmgp_cmp_hidden['rp01causaretiro']) && $this->nmgp_cmp_hidden['rp01causaretiro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01causaretiro']);
       $sStyleHidden_rp01causaretiro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01causaretiro = 'display: none;';
   $sStyleReadInp_rp01causaretiro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01causaretiro']) && $this->nmgp_cmp_readonly['rp01causaretiro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01causaretiro']);
       $sStyleReadLab_rp01causaretiro = '';
       $sStyleReadInp_rp01causaretiro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01causaretiro']) && $this->nmgp_cmp_hidden['rp01causaretiro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01causaretiro" value="<?php echo $this->form_encode_input($rp01causaretiro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01causaretiro_label" id="hidden_field_label_rp01causaretiro" style="<?php echo $sStyleHidden_rp01causaretiro; ?>"><span id="id_label_rp01causaretiro"><?php echo $this->nm_new_label['rp01causaretiro']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01causaretiro_line" id="hidden_field_data_rp01causaretiro" style="<?php echo $sStyleHidden_rp01causaretiro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01causaretiro_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01causaretiro"]) &&  $this->nmgp_cmp_readonly["rp01causaretiro"] == "on") { 

 ?>
<input type="hidden" name="rp01causaretiro" value="<?php echo $this->form_encode_input($rp01causaretiro) . "\">" . $rp01causaretiro . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01causaretiro" class="sc-ui-readonly-rp01causaretiro css_rp01causaretiro_line" style="<?php echo $sStyleReadLab_rp01causaretiro; ?>"><?php echo $this->form_format_readonly("rp01causaretiro", $this->form_encode_input($this->rp01causaretiro)); ?></span><span id="id_read_off_rp01causaretiro" class="css_read_off_rp01causaretiro<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01causaretiro; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01causaretiro_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01causaretiro" type=text name="rp01causaretiro" value="<?php echo $this->form_encode_input($rp01causaretiro) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01causaretiro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01causaretiro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01direccion']))
    {
        $this->nm_new_label['rp01direccion'] = "Rp 0 1direccion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01direccion = $this->rp01direccion;
   $sStyleHidden_rp01direccion = '';
   if (isset($this->nmgp_cmp_hidden['rp01direccion']) && $this->nmgp_cmp_hidden['rp01direccion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01direccion']);
       $sStyleHidden_rp01direccion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01direccion = 'display: none;';
   $sStyleReadInp_rp01direccion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01direccion']) && $this->nmgp_cmp_readonly['rp01direccion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01direccion']);
       $sStyleReadLab_rp01direccion = '';
       $sStyleReadInp_rp01direccion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01direccion']) && $this->nmgp_cmp_hidden['rp01direccion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01direccion" value="<?php echo $this->form_encode_input($rp01direccion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01direccion_label" id="hidden_field_label_rp01direccion" style="<?php echo $sStyleHidden_rp01direccion; ?>"><span id="id_label_rp01direccion"><?php echo $this->nm_new_label['rp01direccion']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01direccion_line" id="hidden_field_data_rp01direccion" style="<?php echo $sStyleHidden_rp01direccion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01direccion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01direccion"]) &&  $this->nmgp_cmp_readonly["rp01direccion"] == "on") { 

 ?>
<input type="hidden" name="rp01direccion" value="<?php echo $this->form_encode_input($rp01direccion) . "\">" . $rp01direccion . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01direccion" class="sc-ui-readonly-rp01direccion css_rp01direccion_line" style="<?php echo $sStyleReadLab_rp01direccion; ?>"><?php echo $this->form_format_readonly("rp01direccion", $this->form_encode_input($this->rp01direccion)); ?></span><span id="id_read_off_rp01direccion" class="css_read_off_rp01direccion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01direccion; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01direccion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01direccion" type=text name="rp01direccion" value="<?php echo $this->form_encode_input($rp01direccion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01direccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01direccion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01telefono']))
    {
        $this->nm_new_label['rp01telefono'] = "Rp 0 1telefono";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01telefono = $this->rp01telefono;
   $sStyleHidden_rp01telefono = '';
   if (isset($this->nmgp_cmp_hidden['rp01telefono']) && $this->nmgp_cmp_hidden['rp01telefono'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01telefono']);
       $sStyleHidden_rp01telefono = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01telefono = 'display: none;';
   $sStyleReadInp_rp01telefono = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01telefono']) && $this->nmgp_cmp_readonly['rp01telefono'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01telefono']);
       $sStyleReadLab_rp01telefono = '';
       $sStyleReadInp_rp01telefono = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01telefono']) && $this->nmgp_cmp_hidden['rp01telefono'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01telefono" value="<?php echo $this->form_encode_input($rp01telefono) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01telefono_label" id="hidden_field_label_rp01telefono" style="<?php echo $sStyleHidden_rp01telefono; ?>"><span id="id_label_rp01telefono"><?php echo $this->nm_new_label['rp01telefono']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01telefono_line" id="hidden_field_data_rp01telefono" style="<?php echo $sStyleHidden_rp01telefono; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01telefono_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01telefono"]) &&  $this->nmgp_cmp_readonly["rp01telefono"] == "on") { 

 ?>
<input type="hidden" name="rp01telefono" value="<?php echo $this->form_encode_input($rp01telefono) . "\">" . $rp01telefono . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01telefono" class="sc-ui-readonly-rp01telefono css_rp01telefono_line" style="<?php echo $sStyleReadLab_rp01telefono; ?>"><?php echo $this->form_format_readonly("rp01telefono", $this->form_encode_input($this->rp01telefono)); ?></span><span id="id_read_off_rp01telefono" class="css_read_off_rp01telefono<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01telefono; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01telefono_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01telefono" type=text name="rp01telefono" value="<?php echo $this->form_encode_input($rp01telefono) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=9"; } ?> maxlength=9 alt="{datatype: 'text', maxLength: 9, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01telefono_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01telefono_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01lugarnacimiento']))
    {
        $this->nm_new_label['rp01lugarnacimiento'] = "Rp 0 1lugarnacimiento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01lugarnacimiento = $this->rp01lugarnacimiento;
   $sStyleHidden_rp01lugarnacimiento = '';
   if (isset($this->nmgp_cmp_hidden['rp01lugarnacimiento']) && $this->nmgp_cmp_hidden['rp01lugarnacimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01lugarnacimiento']);
       $sStyleHidden_rp01lugarnacimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01lugarnacimiento = 'display: none;';
   $sStyleReadInp_rp01lugarnacimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01lugarnacimiento']) && $this->nmgp_cmp_readonly['rp01lugarnacimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01lugarnacimiento']);
       $sStyleReadLab_rp01lugarnacimiento = '';
       $sStyleReadInp_rp01lugarnacimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01lugarnacimiento']) && $this->nmgp_cmp_hidden['rp01lugarnacimiento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01lugarnacimiento" value="<?php echo $this->form_encode_input($rp01lugarnacimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01lugarnacimiento_label" id="hidden_field_label_rp01lugarnacimiento" style="<?php echo $sStyleHidden_rp01lugarnacimiento; ?>"><span id="id_label_rp01lugarnacimiento"><?php echo $this->nm_new_label['rp01lugarnacimiento']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01lugarnacimiento_line" id="hidden_field_data_rp01lugarnacimiento" style="<?php echo $sStyleHidden_rp01lugarnacimiento; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01lugarnacimiento_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01lugarnacimiento"]) &&  $this->nmgp_cmp_readonly["rp01lugarnacimiento"] == "on") { 

 ?>
<input type="hidden" name="rp01lugarnacimiento" value="<?php echo $this->form_encode_input($rp01lugarnacimiento) . "\">" . $rp01lugarnacimiento . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01lugarnacimiento" class="sc-ui-readonly-rp01lugarnacimiento css_rp01lugarnacimiento_line" style="<?php echo $sStyleReadLab_rp01lugarnacimiento; ?>"><?php echo $this->form_format_readonly("rp01lugarnacimiento", $this->form_encode_input($this->rp01lugarnacimiento)); ?></span><span id="id_read_off_rp01lugarnacimiento" class="css_read_off_rp01lugarnacimiento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01lugarnacimiento; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01lugarnacimiento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01lugarnacimiento" type=text name="rp01lugarnacimiento" value="<?php echo $this->form_encode_input($rp01lugarnacimiento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01lugarnacimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01lugarnacimiento_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechanacimiento']))
    {
        $this->nm_new_label['rp01fechanacimiento'] = "Rp 0 1fechanacimiento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechanacimiento = $this->rp01fechanacimiento;
   $sStyleHidden_rp01fechanacimiento = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechanacimiento']) && $this->nmgp_cmp_hidden['rp01fechanacimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechanacimiento']);
       $sStyleHidden_rp01fechanacimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechanacimiento = 'display: none;';
   $sStyleReadInp_rp01fechanacimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechanacimiento']) && $this->nmgp_cmp_readonly['rp01fechanacimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechanacimiento']);
       $sStyleReadLab_rp01fechanacimiento = '';
       $sStyleReadInp_rp01fechanacimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechanacimiento']) && $this->nmgp_cmp_hidden['rp01fechanacimiento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechanacimiento" value="<?php echo $this->form_encode_input($rp01fechanacimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechanacimiento_label" id="hidden_field_label_rp01fechanacimiento" style="<?php echo $sStyleHidden_rp01fechanacimiento; ?>"><span id="id_label_rp01fechanacimiento"><?php echo $this->nm_new_label['rp01fechanacimiento']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechanacimiento_line" id="hidden_field_data_rp01fechanacimiento" style="<?php echo $sStyleHidden_rp01fechanacimiento; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechanacimiento_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechanacimiento"]) &&  $this->nmgp_cmp_readonly["rp01fechanacimiento"] == "on") { 

 ?>
<input type="hidden" name="rp01fechanacimiento" value="<?php echo $this->form_encode_input($rp01fechanacimiento) . "\">" . $rp01fechanacimiento . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechanacimiento" class="sc-ui-readonly-rp01fechanacimiento css_rp01fechanacimiento_line" style="<?php echo $sStyleReadLab_rp01fechanacimiento; ?>"><?php echo $this->form_format_readonly("rp01fechanacimiento", $this->form_encode_input($rp01fechanacimiento)); ?></span><span id="id_read_off_rp01fechanacimiento" class="css_read_off_rp01fechanacimiento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechanacimiento; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechanacimiento']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechanacimiento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechanacimiento" type=text name="rp01fechanacimiento" value="<?php echo $this->form_encode_input($rp01fechanacimiento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechanacimiento']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechanacimiento']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechanacimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechanacimiento_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01nacionalidad']))
    {
        $this->nm_new_label['rp01nacionalidad'] = "Rp 0 1nacionalidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01nacionalidad = $this->rp01nacionalidad;
   $sStyleHidden_rp01nacionalidad = '';
   if (isset($this->nmgp_cmp_hidden['rp01nacionalidad']) && $this->nmgp_cmp_hidden['rp01nacionalidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01nacionalidad']);
       $sStyleHidden_rp01nacionalidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01nacionalidad = 'display: none;';
   $sStyleReadInp_rp01nacionalidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01nacionalidad']) && $this->nmgp_cmp_readonly['rp01nacionalidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01nacionalidad']);
       $sStyleReadLab_rp01nacionalidad = '';
       $sStyleReadInp_rp01nacionalidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01nacionalidad']) && $this->nmgp_cmp_hidden['rp01nacionalidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01nacionalidad" value="<?php echo $this->form_encode_input($rp01nacionalidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01nacionalidad_label" id="hidden_field_label_rp01nacionalidad" style="<?php echo $sStyleHidden_rp01nacionalidad; ?>"><span id="id_label_rp01nacionalidad"><?php echo $this->nm_new_label['rp01nacionalidad']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01nacionalidad_line" id="hidden_field_data_rp01nacionalidad" style="<?php echo $sStyleHidden_rp01nacionalidad; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01nacionalidad_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01nacionalidad"]) &&  $this->nmgp_cmp_readonly["rp01nacionalidad"] == "on") { 

 ?>
<input type="hidden" name="rp01nacionalidad" value="<?php echo $this->form_encode_input($rp01nacionalidad) . "\">" . $rp01nacionalidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01nacionalidad" class="sc-ui-readonly-rp01nacionalidad css_rp01nacionalidad_line" style="<?php echo $sStyleReadLab_rp01nacionalidad; ?>"><?php echo $this->form_format_readonly("rp01nacionalidad", $this->form_encode_input($this->rp01nacionalidad)); ?></span><span id="id_read_off_rp01nacionalidad" class="css_read_off_rp01nacionalidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01nacionalidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01nacionalidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01nacionalidad" type=text name="rp01nacionalidad" value="<?php echo $this->form_encode_input($rp01nacionalidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01nacionalidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01nacionalidad_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01cedula']))
    {
        $this->nm_new_label['rp01cedula'] = "Rp 0 1cedula";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01cedula = $this->rp01cedula;
   $sStyleHidden_rp01cedula = '';
   if (isset($this->nmgp_cmp_hidden['rp01cedula']) && $this->nmgp_cmp_hidden['rp01cedula'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01cedula']);
       $sStyleHidden_rp01cedula = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01cedula = 'display: none;';
   $sStyleReadInp_rp01cedula = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01cedula']) && $this->nmgp_cmp_readonly['rp01cedula'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01cedula']);
       $sStyleReadLab_rp01cedula = '';
       $sStyleReadInp_rp01cedula = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01cedula']) && $this->nmgp_cmp_hidden['rp01cedula'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01cedula" value="<?php echo $this->form_encode_input($rp01cedula) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01cedula_label" id="hidden_field_label_rp01cedula" style="<?php echo $sStyleHidden_rp01cedula; ?>"><span id="id_label_rp01cedula"><?php echo $this->nm_new_label['rp01cedula']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01cedula_line" id="hidden_field_data_rp01cedula" style="<?php echo $sStyleHidden_rp01cedula; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01cedula_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01cedula"]) &&  $this->nmgp_cmp_readonly["rp01cedula"] == "on") { 

 ?>
<input type="hidden" name="rp01cedula" value="<?php echo $this->form_encode_input($rp01cedula) . "\">" . $rp01cedula . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01cedula" class="sc-ui-readonly-rp01cedula css_rp01cedula_line" style="<?php echo $sStyleReadLab_rp01cedula; ?>"><?php echo $this->form_format_readonly("rp01cedula", $this->form_encode_input($this->rp01cedula)); ?></span><span id="id_read_off_rp01cedula" class="css_read_off_rp01cedula<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01cedula; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01cedula_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01cedula" type=text name="rp01cedula" value="<?php echo $this->form_encode_input($rp01cedula) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01cedula_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01cedula_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01noiess']))
    {
        $this->nm_new_label['rp01noiess'] = "Rp 0 1noiess";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01noiess = $this->rp01noiess;
   $sStyleHidden_rp01noiess = '';
   if (isset($this->nmgp_cmp_hidden['rp01noiess']) && $this->nmgp_cmp_hidden['rp01noiess'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01noiess']);
       $sStyleHidden_rp01noiess = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01noiess = 'display: none;';
   $sStyleReadInp_rp01noiess = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01noiess']) && $this->nmgp_cmp_readonly['rp01noiess'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01noiess']);
       $sStyleReadLab_rp01noiess = '';
       $sStyleReadInp_rp01noiess = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01noiess']) && $this->nmgp_cmp_hidden['rp01noiess'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01noiess" value="<?php echo $this->form_encode_input($rp01noiess) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01noiess_label" id="hidden_field_label_rp01noiess" style="<?php echo $sStyleHidden_rp01noiess; ?>"><span id="id_label_rp01noiess"><?php echo $this->nm_new_label['rp01noiess']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01noiess_line" id="hidden_field_data_rp01noiess" style="<?php echo $sStyleHidden_rp01noiess; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01noiess_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01noiess"]) &&  $this->nmgp_cmp_readonly["rp01noiess"] == "on") { 

 ?>
<input type="hidden" name="rp01noiess" value="<?php echo $this->form_encode_input($rp01noiess) . "\">" . $rp01noiess . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01noiess" class="sc-ui-readonly-rp01noiess css_rp01noiess_line" style="<?php echo $sStyleReadLab_rp01noiess; ?>"><?php echo $this->form_format_readonly("rp01noiess", $this->form_encode_input($this->rp01noiess)); ?></span><span id="id_read_off_rp01noiess" class="css_read_off_rp01noiess<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01noiess; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01noiess_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01noiess" type=text name="rp01noiess" value="<?php echo $this->form_encode_input($rp01noiess) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> maxlength=13 alt="{datatype: 'text', maxLength: 13, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01noiess_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01noiess_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexo']))
    {
        $this->nm_new_label['rp01sexo'] = "Rp 0 1sexo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexo = $this->rp01sexo;
   $sStyleHidden_rp01sexo = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexo']) && $this->nmgp_cmp_hidden['rp01sexo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexo']);
       $sStyleHidden_rp01sexo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexo = 'display: none;';
   $sStyleReadInp_rp01sexo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexo']) && $this->nmgp_cmp_readonly['rp01sexo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexo']);
       $sStyleReadLab_rp01sexo = '';
       $sStyleReadInp_rp01sexo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexo']) && $this->nmgp_cmp_hidden['rp01sexo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexo" value="<?php echo $this->form_encode_input($rp01sexo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexo_label" id="hidden_field_label_rp01sexo" style="<?php echo $sStyleHidden_rp01sexo; ?>"><span id="id_label_rp01sexo"><?php echo $this->nm_new_label['rp01sexo']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexo_line" id="hidden_field_data_rp01sexo" style="<?php echo $sStyleHidden_rp01sexo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexo"]) &&  $this->nmgp_cmp_readonly["rp01sexo"] == "on") { 

 ?>
<input type="hidden" name="rp01sexo" value="<?php echo $this->form_encode_input($rp01sexo) . "\">" . $rp01sexo . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexo" class="sc-ui-readonly-rp01sexo css_rp01sexo_line" style="<?php echo $sStyleReadLab_rp01sexo; ?>"><?php echo $this->form_format_readonly("rp01sexo", $this->form_encode_input($this->rp01sexo)); ?></span><span id="id_read_off_rp01sexo" class="css_read_off_rp01sexo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexo; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexo" type=text name="rp01sexo" value="<?php echo $this->form_encode_input($rp01sexo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01nolibreta']))
    {
        $this->nm_new_label['rp01nolibreta'] = "Rp 0 1nolibreta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01nolibreta = $this->rp01nolibreta;
   $sStyleHidden_rp01nolibreta = '';
   if (isset($this->nmgp_cmp_hidden['rp01nolibreta']) && $this->nmgp_cmp_hidden['rp01nolibreta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01nolibreta']);
       $sStyleHidden_rp01nolibreta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01nolibreta = 'display: none;';
   $sStyleReadInp_rp01nolibreta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01nolibreta']) && $this->nmgp_cmp_readonly['rp01nolibreta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01nolibreta']);
       $sStyleReadLab_rp01nolibreta = '';
       $sStyleReadInp_rp01nolibreta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01nolibreta']) && $this->nmgp_cmp_hidden['rp01nolibreta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01nolibreta" value="<?php echo $this->form_encode_input($rp01nolibreta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01nolibreta_label" id="hidden_field_label_rp01nolibreta" style="<?php echo $sStyleHidden_rp01nolibreta; ?>"><span id="id_label_rp01nolibreta"><?php echo $this->nm_new_label['rp01nolibreta']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01nolibreta_line" id="hidden_field_data_rp01nolibreta" style="<?php echo $sStyleHidden_rp01nolibreta; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01nolibreta_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01nolibreta"]) &&  $this->nmgp_cmp_readonly["rp01nolibreta"] == "on") { 

 ?>
<input type="hidden" name="rp01nolibreta" value="<?php echo $this->form_encode_input($rp01nolibreta) . "\">" . $rp01nolibreta . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01nolibreta" class="sc-ui-readonly-rp01nolibreta css_rp01nolibreta_line" style="<?php echo $sStyleReadLab_rp01nolibreta; ?>"><?php echo $this->form_format_readonly("rp01nolibreta", $this->form_encode_input($this->rp01nolibreta)); ?></span><span id="id_read_off_rp01nolibreta" class="css_read_off_rp01nolibreta<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01nolibreta; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01nolibreta_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01nolibreta" type=text name="rp01nolibreta" value="<?php echo $this->form_encode_input($rp01nolibreta) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01nolibreta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01nolibreta_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01profesion']))
    {
        $this->nm_new_label['rp01profesion'] = "Rp 0 1profesion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01profesion = $this->rp01profesion;
   $sStyleHidden_rp01profesion = '';
   if (isset($this->nmgp_cmp_hidden['rp01profesion']) && $this->nmgp_cmp_hidden['rp01profesion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01profesion']);
       $sStyleHidden_rp01profesion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01profesion = 'display: none;';
   $sStyleReadInp_rp01profesion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01profesion']) && $this->nmgp_cmp_readonly['rp01profesion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01profesion']);
       $sStyleReadLab_rp01profesion = '';
       $sStyleReadInp_rp01profesion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01profesion']) && $this->nmgp_cmp_hidden['rp01profesion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01profesion" value="<?php echo $this->form_encode_input($rp01profesion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01profesion_label" id="hidden_field_label_rp01profesion" style="<?php echo $sStyleHidden_rp01profesion; ?>"><span id="id_label_rp01profesion"><?php echo $this->nm_new_label['rp01profesion']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01profesion_line" id="hidden_field_data_rp01profesion" style="<?php echo $sStyleHidden_rp01profesion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01profesion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01profesion"]) &&  $this->nmgp_cmp_readonly["rp01profesion"] == "on") { 

 ?>
<input type="hidden" name="rp01profesion" value="<?php echo $this->form_encode_input($rp01profesion) . "\">" . $rp01profesion . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01profesion" class="sc-ui-readonly-rp01profesion css_rp01profesion_line" style="<?php echo $sStyleReadLab_rp01profesion; ?>"><?php echo $this->form_format_readonly("rp01profesion", $this->form_encode_input($this->rp01profesion)); ?></span><span id="id_read_off_rp01profesion" class="css_read_off_rp01profesion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01profesion; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01profesion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01profesion" type=text name="rp01profesion" value="<?php echo $this->form_encode_input($rp01profesion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01profesion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01profesion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechaingreso']))
    {
        $this->nm_new_label['rp01fechaingreso'] = "Rp 0 1fechaingreso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechaingreso = $this->rp01fechaingreso;
   $sStyleHidden_rp01fechaingreso = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechaingreso']) && $this->nmgp_cmp_hidden['rp01fechaingreso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechaingreso']);
       $sStyleHidden_rp01fechaingreso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechaingreso = 'display: none;';
   $sStyleReadInp_rp01fechaingreso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechaingreso']) && $this->nmgp_cmp_readonly['rp01fechaingreso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechaingreso']);
       $sStyleReadLab_rp01fechaingreso = '';
       $sStyleReadInp_rp01fechaingreso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechaingreso']) && $this->nmgp_cmp_hidden['rp01fechaingreso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechaingreso" value="<?php echo $this->form_encode_input($rp01fechaingreso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechaingreso_label" id="hidden_field_label_rp01fechaingreso" style="<?php echo $sStyleHidden_rp01fechaingreso; ?>"><span id="id_label_rp01fechaingreso"><?php echo $this->nm_new_label['rp01fechaingreso']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechaingreso_line" id="hidden_field_data_rp01fechaingreso" style="<?php echo $sStyleHidden_rp01fechaingreso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechaingreso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechaingreso"]) &&  $this->nmgp_cmp_readonly["rp01fechaingreso"] == "on") { 

 ?>
<input type="hidden" name="rp01fechaingreso" value="<?php echo $this->form_encode_input($rp01fechaingreso) . "\">" . $rp01fechaingreso . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechaingreso" class="sc-ui-readonly-rp01fechaingreso css_rp01fechaingreso_line" style="<?php echo $sStyleReadLab_rp01fechaingreso; ?>"><?php echo $this->form_format_readonly("rp01fechaingreso", $this->form_encode_input($rp01fechaingreso)); ?></span><span id="id_read_off_rp01fechaingreso" class="css_read_off_rp01fechaingreso<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechaingreso; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechaingreso']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechaingreso_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechaingreso" type=text name="rp01fechaingreso" value="<?php echo $this->form_encode_input($rp01fechaingreso) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechaingreso']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechaingreso']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechaingreso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechaingreso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechareingreso']))
    {
        $this->nm_new_label['rp01fechareingreso'] = "Rp 0 1fechareingreso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechareingreso = $this->rp01fechareingreso;
   $sStyleHidden_rp01fechareingreso = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechareingreso']) && $this->nmgp_cmp_hidden['rp01fechareingreso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechareingreso']);
       $sStyleHidden_rp01fechareingreso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechareingreso = 'display: none;';
   $sStyleReadInp_rp01fechareingreso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechareingreso']) && $this->nmgp_cmp_readonly['rp01fechareingreso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechareingreso']);
       $sStyleReadLab_rp01fechareingreso = '';
       $sStyleReadInp_rp01fechareingreso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechareingreso']) && $this->nmgp_cmp_hidden['rp01fechareingreso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechareingreso" value="<?php echo $this->form_encode_input($rp01fechareingreso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechareingreso_label" id="hidden_field_label_rp01fechareingreso" style="<?php echo $sStyleHidden_rp01fechareingreso; ?>"><span id="id_label_rp01fechareingreso"><?php echo $this->nm_new_label['rp01fechareingreso']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechareingreso_line" id="hidden_field_data_rp01fechareingreso" style="<?php echo $sStyleHidden_rp01fechareingreso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechareingreso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechareingreso"]) &&  $this->nmgp_cmp_readonly["rp01fechareingreso"] == "on") { 

 ?>
<input type="hidden" name="rp01fechareingreso" value="<?php echo $this->form_encode_input($rp01fechareingreso) . "\">" . $rp01fechareingreso . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechareingreso" class="sc-ui-readonly-rp01fechareingreso css_rp01fechareingreso_line" style="<?php echo $sStyleReadLab_rp01fechareingreso; ?>"><?php echo $this->form_format_readonly("rp01fechareingreso", $this->form_encode_input($rp01fechareingreso)); ?></span><span id="id_read_off_rp01fechareingreso" class="css_read_off_rp01fechareingreso<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechareingreso; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechareingreso']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechareingreso_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechareingreso" type=text name="rp01fechareingreso" value="<?php echo $this->form_encode_input($rp01fechareingreso) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechareingreso']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechareingreso']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechareingreso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechareingreso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01cargo']))
    {
        $this->nm_new_label['rp01cargo'] = "Rp 0 1cargo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01cargo = $this->rp01cargo;
   $sStyleHidden_rp01cargo = '';
   if (isset($this->nmgp_cmp_hidden['rp01cargo']) && $this->nmgp_cmp_hidden['rp01cargo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01cargo']);
       $sStyleHidden_rp01cargo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01cargo = 'display: none;';
   $sStyleReadInp_rp01cargo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01cargo']) && $this->nmgp_cmp_readonly['rp01cargo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01cargo']);
       $sStyleReadLab_rp01cargo = '';
       $sStyleReadInp_rp01cargo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01cargo']) && $this->nmgp_cmp_hidden['rp01cargo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01cargo" value="<?php echo $this->form_encode_input($rp01cargo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01cargo_label" id="hidden_field_label_rp01cargo" style="<?php echo $sStyleHidden_rp01cargo; ?>"><span id="id_label_rp01cargo"><?php echo $this->nm_new_label['rp01cargo']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01cargo_line" id="hidden_field_data_rp01cargo" style="<?php echo $sStyleHidden_rp01cargo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01cargo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01cargo"]) &&  $this->nmgp_cmp_readonly["rp01cargo"] == "on") { 

 ?>
<input type="hidden" name="rp01cargo" value="<?php echo $this->form_encode_input($rp01cargo) . "\">" . $rp01cargo . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01cargo" class="sc-ui-readonly-rp01cargo css_rp01cargo_line" style="<?php echo $sStyleReadLab_rp01cargo; ?>"><?php echo $this->form_format_readonly("rp01cargo", $this->form_encode_input($this->rp01cargo)); ?></span><span id="id_read_off_rp01cargo" class="css_read_off_rp01cargo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01cargo; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01cargo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01cargo" type=text name="rp01cargo" value="<?php echo $this->form_encode_input($rp01cargo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01cargo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01cargo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01estadocivil']))
    {
        $this->nm_new_label['rp01estadocivil'] = "Rp 0 1estadocivil";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01estadocivil = $this->rp01estadocivil;
   $sStyleHidden_rp01estadocivil = '';
   if (isset($this->nmgp_cmp_hidden['rp01estadocivil']) && $this->nmgp_cmp_hidden['rp01estadocivil'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01estadocivil']);
       $sStyleHidden_rp01estadocivil = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01estadocivil = 'display: none;';
   $sStyleReadInp_rp01estadocivil = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01estadocivil']) && $this->nmgp_cmp_readonly['rp01estadocivil'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01estadocivil']);
       $sStyleReadLab_rp01estadocivil = '';
       $sStyleReadInp_rp01estadocivil = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01estadocivil']) && $this->nmgp_cmp_hidden['rp01estadocivil'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01estadocivil" value="<?php echo $this->form_encode_input($rp01estadocivil) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01estadocivil_label" id="hidden_field_label_rp01estadocivil" style="<?php echo $sStyleHidden_rp01estadocivil; ?>"><span id="id_label_rp01estadocivil"><?php echo $this->nm_new_label['rp01estadocivil']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01estadocivil_line" id="hidden_field_data_rp01estadocivil" style="<?php echo $sStyleHidden_rp01estadocivil; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01estadocivil_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01estadocivil"]) &&  $this->nmgp_cmp_readonly["rp01estadocivil"] == "on") { 

 ?>
<input type="hidden" name="rp01estadocivil" value="<?php echo $this->form_encode_input($rp01estadocivil) . "\">" . $rp01estadocivil . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01estadocivil" class="sc-ui-readonly-rp01estadocivil css_rp01estadocivil_line" style="<?php echo $sStyleReadLab_rp01estadocivil; ?>"><?php echo $this->form_format_readonly("rp01estadocivil", $this->form_encode_input($this->rp01estadocivil)); ?></span><span id="id_read_off_rp01estadocivil" class="css_read_off_rp01estadocivil<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01estadocivil; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01estadocivil_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01estadocivil" type=text name="rp01estadocivil" value="<?php echo $this->form_encode_input($rp01estadocivil) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01estadocivil_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01estadocivil_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01rebajaxcasado']))
    {
        $this->nm_new_label['rp01rebajaxcasado'] = "Rp 0 1rebajaxcasado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01rebajaxcasado = $this->rp01rebajaxcasado;
   $sStyleHidden_rp01rebajaxcasado = '';
   if (isset($this->nmgp_cmp_hidden['rp01rebajaxcasado']) && $this->nmgp_cmp_hidden['rp01rebajaxcasado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01rebajaxcasado']);
       $sStyleHidden_rp01rebajaxcasado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01rebajaxcasado = 'display: none;';
   $sStyleReadInp_rp01rebajaxcasado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01rebajaxcasado']) && $this->nmgp_cmp_readonly['rp01rebajaxcasado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01rebajaxcasado']);
       $sStyleReadLab_rp01rebajaxcasado = '';
       $sStyleReadInp_rp01rebajaxcasado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01rebajaxcasado']) && $this->nmgp_cmp_hidden['rp01rebajaxcasado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01rebajaxcasado" value="<?php echo $this->form_encode_input($rp01rebajaxcasado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01rebajaxcasado_label" id="hidden_field_label_rp01rebajaxcasado" style="<?php echo $sStyleHidden_rp01rebajaxcasado; ?>"><span id="id_label_rp01rebajaxcasado"><?php echo $this->nm_new_label['rp01rebajaxcasado']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01rebajaxcasado_line" id="hidden_field_data_rp01rebajaxcasado" style="<?php echo $sStyleHidden_rp01rebajaxcasado; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01rebajaxcasado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01rebajaxcasado"]) &&  $this->nmgp_cmp_readonly["rp01rebajaxcasado"] == "on") { 

 ?>
<input type="hidden" name="rp01rebajaxcasado" value="<?php echo $this->form_encode_input($rp01rebajaxcasado) . "\">" . $rp01rebajaxcasado . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01rebajaxcasado" class="sc-ui-readonly-rp01rebajaxcasado css_rp01rebajaxcasado_line" style="<?php echo $sStyleReadLab_rp01rebajaxcasado; ?>"><?php echo $this->form_format_readonly("rp01rebajaxcasado", $this->form_encode_input($this->rp01rebajaxcasado)); ?></span><span id="id_read_off_rp01rebajaxcasado" class="css_read_off_rp01rebajaxcasado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01rebajaxcasado; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01rebajaxcasado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01rebajaxcasado" type=text name="rp01rebajaxcasado" value="<?php echo $this->form_encode_input($rp01rebajaxcasado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01rebajaxcasado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01rebajaxcasado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01nombreconyuge']))
    {
        $this->nm_new_label['rp01nombreconyuge'] = "Rp 0 1nombreconyuge";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01nombreconyuge = $this->rp01nombreconyuge;
   $sStyleHidden_rp01nombreconyuge = '';
   if (isset($this->nmgp_cmp_hidden['rp01nombreconyuge']) && $this->nmgp_cmp_hidden['rp01nombreconyuge'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01nombreconyuge']);
       $sStyleHidden_rp01nombreconyuge = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01nombreconyuge = 'display: none;';
   $sStyleReadInp_rp01nombreconyuge = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01nombreconyuge']) && $this->nmgp_cmp_readonly['rp01nombreconyuge'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01nombreconyuge']);
       $sStyleReadLab_rp01nombreconyuge = '';
       $sStyleReadInp_rp01nombreconyuge = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01nombreconyuge']) && $this->nmgp_cmp_hidden['rp01nombreconyuge'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01nombreconyuge" value="<?php echo $this->form_encode_input($rp01nombreconyuge) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01nombreconyuge_label" id="hidden_field_label_rp01nombreconyuge" style="<?php echo $sStyleHidden_rp01nombreconyuge; ?>"><span id="id_label_rp01nombreconyuge"><?php echo $this->nm_new_label['rp01nombreconyuge']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01nombreconyuge_line" id="hidden_field_data_rp01nombreconyuge" style="<?php echo $sStyleHidden_rp01nombreconyuge; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01nombreconyuge_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01nombreconyuge"]) &&  $this->nmgp_cmp_readonly["rp01nombreconyuge"] == "on") { 

 ?>
<input type="hidden" name="rp01nombreconyuge" value="<?php echo $this->form_encode_input($rp01nombreconyuge) . "\">" . $rp01nombreconyuge . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01nombreconyuge" class="sc-ui-readonly-rp01nombreconyuge css_rp01nombreconyuge_line" style="<?php echo $sStyleReadLab_rp01nombreconyuge; ?>"><?php echo $this->form_format_readonly("rp01nombreconyuge", $this->form_encode_input($this->rp01nombreconyuge)); ?></span><span id="id_read_off_rp01nombreconyuge" class="css_read_off_rp01nombreconyuge<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01nombreconyuge; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01nombreconyuge_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01nombreconyuge" type=text name="rp01nombreconyuge" value="<?php echo $this->form_encode_input($rp01nombreconyuge) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01nombreconyuge_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01nombreconyuge_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01nombrepadre']))
    {
        $this->nm_new_label['rp01nombrepadre'] = "Rp 0 1nombrepadre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01nombrepadre = $this->rp01nombrepadre;
   $sStyleHidden_rp01nombrepadre = '';
   if (isset($this->nmgp_cmp_hidden['rp01nombrepadre']) && $this->nmgp_cmp_hidden['rp01nombrepadre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01nombrepadre']);
       $sStyleHidden_rp01nombrepadre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01nombrepadre = 'display: none;';
   $sStyleReadInp_rp01nombrepadre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01nombrepadre']) && $this->nmgp_cmp_readonly['rp01nombrepadre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01nombrepadre']);
       $sStyleReadLab_rp01nombrepadre = '';
       $sStyleReadInp_rp01nombrepadre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01nombrepadre']) && $this->nmgp_cmp_hidden['rp01nombrepadre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01nombrepadre" value="<?php echo $this->form_encode_input($rp01nombrepadre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01nombrepadre_label" id="hidden_field_label_rp01nombrepadre" style="<?php echo $sStyleHidden_rp01nombrepadre; ?>"><span id="id_label_rp01nombrepadre"><?php echo $this->nm_new_label['rp01nombrepadre']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01nombrepadre_line" id="hidden_field_data_rp01nombrepadre" style="<?php echo $sStyleHidden_rp01nombrepadre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01nombrepadre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01nombrepadre"]) &&  $this->nmgp_cmp_readonly["rp01nombrepadre"] == "on") { 

 ?>
<input type="hidden" name="rp01nombrepadre" value="<?php echo $this->form_encode_input($rp01nombrepadre) . "\">" . $rp01nombrepadre . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01nombrepadre" class="sc-ui-readonly-rp01nombrepadre css_rp01nombrepadre_line" style="<?php echo $sStyleReadLab_rp01nombrepadre; ?>"><?php echo $this->form_format_readonly("rp01nombrepadre", $this->form_encode_input($this->rp01nombrepadre)); ?></span><span id="id_read_off_rp01nombrepadre" class="css_read_off_rp01nombrepadre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01nombrepadre; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01nombrepadre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01nombrepadre" type=text name="rp01nombrepadre" value="<?php echo $this->form_encode_input($rp01nombrepadre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01nombrepadre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01nombrepadre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01nombremadre']))
    {
        $this->nm_new_label['rp01nombremadre'] = "Rp 0 1nombremadre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01nombremadre = $this->rp01nombremadre;
   $sStyleHidden_rp01nombremadre = '';
   if (isset($this->nmgp_cmp_hidden['rp01nombremadre']) && $this->nmgp_cmp_hidden['rp01nombremadre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01nombremadre']);
       $sStyleHidden_rp01nombremadre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01nombremadre = 'display: none;';
   $sStyleReadInp_rp01nombremadre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01nombremadre']) && $this->nmgp_cmp_readonly['rp01nombremadre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01nombremadre']);
       $sStyleReadLab_rp01nombremadre = '';
       $sStyleReadInp_rp01nombremadre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01nombremadre']) && $this->nmgp_cmp_hidden['rp01nombremadre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01nombremadre" value="<?php echo $this->form_encode_input($rp01nombremadre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01nombremadre_label" id="hidden_field_label_rp01nombremadre" style="<?php echo $sStyleHidden_rp01nombremadre; ?>"><span id="id_label_rp01nombremadre"><?php echo $this->nm_new_label['rp01nombremadre']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01nombremadre_line" id="hidden_field_data_rp01nombremadre" style="<?php echo $sStyleHidden_rp01nombremadre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01nombremadre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01nombremadre"]) &&  $this->nmgp_cmp_readonly["rp01nombremadre"] == "on") { 

 ?>
<input type="hidden" name="rp01nombremadre" value="<?php echo $this->form_encode_input($rp01nombremadre) . "\">" . $rp01nombremadre . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01nombremadre" class="sc-ui-readonly-rp01nombremadre css_rp01nombremadre_line" style="<?php echo $sStyleReadLab_rp01nombremadre; ?>"><?php echo $this->form_format_readonly("rp01nombremadre", $this->form_encode_input($this->rp01nombremadre)); ?></span><span id="id_read_off_rp01nombremadre" class="css_read_off_rp01nombremadre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01nombremadre; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01nombremadre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01nombremadre" type=text name="rp01nombremadre" value="<?php echo $this->form_encode_input($rp01nombremadre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01nombremadre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01nombremadre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01nohijos']))
    {
        $this->nm_new_label['rp01nohijos'] = "Rp 0 1nohijos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01nohijos = $this->rp01nohijos;
   $sStyleHidden_rp01nohijos = '';
   if (isset($this->nmgp_cmp_hidden['rp01nohijos']) && $this->nmgp_cmp_hidden['rp01nohijos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01nohijos']);
       $sStyleHidden_rp01nohijos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01nohijos = 'display: none;';
   $sStyleReadInp_rp01nohijos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01nohijos']) && $this->nmgp_cmp_readonly['rp01nohijos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01nohijos']);
       $sStyleReadLab_rp01nohijos = '';
       $sStyleReadInp_rp01nohijos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01nohijos']) && $this->nmgp_cmp_hidden['rp01nohijos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01nohijos" value="<?php echo $this->form_encode_input($rp01nohijos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01nohijos_label" id="hidden_field_label_rp01nohijos" style="<?php echo $sStyleHidden_rp01nohijos; ?>"><span id="id_label_rp01nohijos"><?php echo $this->nm_new_label['rp01nohijos']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01nohijos_line" id="hidden_field_data_rp01nohijos" style="<?php echo $sStyleHidden_rp01nohijos; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01nohijos_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01nohijos"]) &&  $this->nmgp_cmp_readonly["rp01nohijos"] == "on") { 

 ?>
<input type="hidden" name="rp01nohijos" value="<?php echo $this->form_encode_input($rp01nohijos) . "\">" . $rp01nohijos . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01nohijos" class="sc-ui-readonly-rp01nohijos css_rp01nohijos_line" style="<?php echo $sStyleReadLab_rp01nohijos; ?>"><?php echo $this->form_format_readonly("rp01nohijos", $this->form_encode_input($this->rp01nohijos)); ?></span><span id="id_read_off_rp01nohijos" class="css_read_off_rp01nohijos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01nohijos; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01nohijos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01nohijos" type=text name="rp01nohijos" value="<?php echo $this->form_encode_input($rp01nohijos) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01nohijos']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01nohijos']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01nohijos']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01nohijos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01nohijos_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechahijos0']))
    {
        $this->nm_new_label['rp01fechahijos0'] = "Rp 0 1fechahijos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechahijos0 = $this->rp01fechahijos0;
   $sStyleHidden_rp01fechahijos0 = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechahijos0']) && $this->nmgp_cmp_hidden['rp01fechahijos0'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechahijos0']);
       $sStyleHidden_rp01fechahijos0 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechahijos0 = 'display: none;';
   $sStyleReadInp_rp01fechahijos0 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechahijos0']) && $this->nmgp_cmp_readonly['rp01fechahijos0'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechahijos0']);
       $sStyleReadLab_rp01fechahijos0 = '';
       $sStyleReadInp_rp01fechahijos0 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechahijos0']) && $this->nmgp_cmp_hidden['rp01fechahijos0'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechahijos0" value="<?php echo $this->form_encode_input($rp01fechahijos0) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechahijos0_label" id="hidden_field_label_rp01fechahijos0" style="<?php echo $sStyleHidden_rp01fechahijos0; ?>"><span id="id_label_rp01fechahijos0"><?php echo $this->nm_new_label['rp01fechahijos0']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechahijos0_line" id="hidden_field_data_rp01fechahijos0" style="<?php echo $sStyleHidden_rp01fechahijos0; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechahijos0_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechahijos0"]) &&  $this->nmgp_cmp_readonly["rp01fechahijos0"] == "on") { 

 ?>
<input type="hidden" name="rp01fechahijos0" value="<?php echo $this->form_encode_input($rp01fechahijos0) . "\">" . $rp01fechahijos0 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechahijos0" class="sc-ui-readonly-rp01fechahijos0 css_rp01fechahijos0_line" style="<?php echo $sStyleReadLab_rp01fechahijos0; ?>"><?php echo $this->form_format_readonly("rp01fechahijos0", $this->form_encode_input($rp01fechahijos0)); ?></span><span id="id_read_off_rp01fechahijos0" class="css_read_off_rp01fechahijos0<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechahijos0; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechahijos0']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechahijos0_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechahijos0" type=text name="rp01fechahijos0" value="<?php echo $this->form_encode_input($rp01fechahijos0) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechahijos0']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechahijos0']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechahijos0_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechahijos0_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexohijos0']))
    {
        $this->nm_new_label['rp01sexohijos0'] = "Rp 0 1sexohijos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexohijos0 = $this->rp01sexohijos0;
   $sStyleHidden_rp01sexohijos0 = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexohijos0']) && $this->nmgp_cmp_hidden['rp01sexohijos0'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexohijos0']);
       $sStyleHidden_rp01sexohijos0 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexohijos0 = 'display: none;';
   $sStyleReadInp_rp01sexohijos0 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexohijos0']) && $this->nmgp_cmp_readonly['rp01sexohijos0'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexohijos0']);
       $sStyleReadLab_rp01sexohijos0 = '';
       $sStyleReadInp_rp01sexohijos0 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexohijos0']) && $this->nmgp_cmp_hidden['rp01sexohijos0'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexohijos0" value="<?php echo $this->form_encode_input($rp01sexohijos0) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexohijos0_label" id="hidden_field_label_rp01sexohijos0" style="<?php echo $sStyleHidden_rp01sexohijos0; ?>"><span id="id_label_rp01sexohijos0"><?php echo $this->nm_new_label['rp01sexohijos0']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexohijos0_line" id="hidden_field_data_rp01sexohijos0" style="<?php echo $sStyleHidden_rp01sexohijos0; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexohijos0_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexohijos0"]) &&  $this->nmgp_cmp_readonly["rp01sexohijos0"] == "on") { 

 ?>
<input type="hidden" name="rp01sexohijos0" value="<?php echo $this->form_encode_input($rp01sexohijos0) . "\">" . $rp01sexohijos0 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexohijos0" class="sc-ui-readonly-rp01sexohijos0 css_rp01sexohijos0_line" style="<?php echo $sStyleReadLab_rp01sexohijos0; ?>"><?php echo $this->form_format_readonly("rp01sexohijos0", $this->form_encode_input($this->rp01sexohijos0)); ?></span><span id="id_read_off_rp01sexohijos0" class="css_read_off_rp01sexohijos0<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexohijos0; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexohijos0_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexohijos0" type=text name="rp01sexohijos0" value="<?php echo $this->form_encode_input($rp01sexohijos0) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexohijos0']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexohijos0']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexohijos0']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexohijos0_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexohijos0_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechahijos1']))
    {
        $this->nm_new_label['rp01fechahijos1'] = "Rp 0 1fechahijos 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechahijos1 = $this->rp01fechahijos1;
   $sStyleHidden_rp01fechahijos1 = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechahijos1']) && $this->nmgp_cmp_hidden['rp01fechahijos1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechahijos1']);
       $sStyleHidden_rp01fechahijos1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechahijos1 = 'display: none;';
   $sStyleReadInp_rp01fechahijos1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechahijos1']) && $this->nmgp_cmp_readonly['rp01fechahijos1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechahijos1']);
       $sStyleReadLab_rp01fechahijos1 = '';
       $sStyleReadInp_rp01fechahijos1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechahijos1']) && $this->nmgp_cmp_hidden['rp01fechahijos1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechahijos1" value="<?php echo $this->form_encode_input($rp01fechahijos1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechahijos1_label" id="hidden_field_label_rp01fechahijos1" style="<?php echo $sStyleHidden_rp01fechahijos1; ?>"><span id="id_label_rp01fechahijos1"><?php echo $this->nm_new_label['rp01fechahijos1']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechahijos1_line" id="hidden_field_data_rp01fechahijos1" style="<?php echo $sStyleHidden_rp01fechahijos1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechahijos1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechahijos1"]) &&  $this->nmgp_cmp_readonly["rp01fechahijos1"] == "on") { 

 ?>
<input type="hidden" name="rp01fechahijos1" value="<?php echo $this->form_encode_input($rp01fechahijos1) . "\">" . $rp01fechahijos1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechahijos1" class="sc-ui-readonly-rp01fechahijos1 css_rp01fechahijos1_line" style="<?php echo $sStyleReadLab_rp01fechahijos1; ?>"><?php echo $this->form_format_readonly("rp01fechahijos1", $this->form_encode_input($rp01fechahijos1)); ?></span><span id="id_read_off_rp01fechahijos1" class="css_read_off_rp01fechahijos1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechahijos1; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechahijos1']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechahijos1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechahijos1" type=text name="rp01fechahijos1" value="<?php echo $this->form_encode_input($rp01fechahijos1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechahijos1']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechahijos1']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechahijos1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechahijos1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexohijos1']))
    {
        $this->nm_new_label['rp01sexohijos1'] = "Rp 0 1sexohijos 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexohijos1 = $this->rp01sexohijos1;
   $sStyleHidden_rp01sexohijos1 = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexohijos1']) && $this->nmgp_cmp_hidden['rp01sexohijos1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexohijos1']);
       $sStyleHidden_rp01sexohijos1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexohijos1 = 'display: none;';
   $sStyleReadInp_rp01sexohijos1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexohijos1']) && $this->nmgp_cmp_readonly['rp01sexohijos1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexohijos1']);
       $sStyleReadLab_rp01sexohijos1 = '';
       $sStyleReadInp_rp01sexohijos1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexohijos1']) && $this->nmgp_cmp_hidden['rp01sexohijos1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexohijos1" value="<?php echo $this->form_encode_input($rp01sexohijos1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexohijos1_label" id="hidden_field_label_rp01sexohijos1" style="<?php echo $sStyleHidden_rp01sexohijos1; ?>"><span id="id_label_rp01sexohijos1"><?php echo $this->nm_new_label['rp01sexohijos1']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexohijos1_line" id="hidden_field_data_rp01sexohijos1" style="<?php echo $sStyleHidden_rp01sexohijos1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexohijos1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexohijos1"]) &&  $this->nmgp_cmp_readonly["rp01sexohijos1"] == "on") { 

 ?>
<input type="hidden" name="rp01sexohijos1" value="<?php echo $this->form_encode_input($rp01sexohijos1) . "\">" . $rp01sexohijos1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexohijos1" class="sc-ui-readonly-rp01sexohijos1 css_rp01sexohijos1_line" style="<?php echo $sStyleReadLab_rp01sexohijos1; ?>"><?php echo $this->form_format_readonly("rp01sexohijos1", $this->form_encode_input($this->rp01sexohijos1)); ?></span><span id="id_read_off_rp01sexohijos1" class="css_read_off_rp01sexohijos1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexohijos1; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexohijos1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexohijos1" type=text name="rp01sexohijos1" value="<?php echo $this->form_encode_input($rp01sexohijos1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexohijos1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexohijos1']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexohijos1']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexohijos1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexohijos1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechahijos2']))
    {
        $this->nm_new_label['rp01fechahijos2'] = "Rp 0 1fechahijos 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechahijos2 = $this->rp01fechahijos2;
   $sStyleHidden_rp01fechahijos2 = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechahijos2']) && $this->nmgp_cmp_hidden['rp01fechahijos2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechahijos2']);
       $sStyleHidden_rp01fechahijos2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechahijos2 = 'display: none;';
   $sStyleReadInp_rp01fechahijos2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechahijos2']) && $this->nmgp_cmp_readonly['rp01fechahijos2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechahijos2']);
       $sStyleReadLab_rp01fechahijos2 = '';
       $sStyleReadInp_rp01fechahijos2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechahijos2']) && $this->nmgp_cmp_hidden['rp01fechahijos2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechahijos2" value="<?php echo $this->form_encode_input($rp01fechahijos2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechahijos2_label" id="hidden_field_label_rp01fechahijos2" style="<?php echo $sStyleHidden_rp01fechahijos2; ?>"><span id="id_label_rp01fechahijos2"><?php echo $this->nm_new_label['rp01fechahijos2']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechahijos2_line" id="hidden_field_data_rp01fechahijos2" style="<?php echo $sStyleHidden_rp01fechahijos2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechahijos2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechahijos2"]) &&  $this->nmgp_cmp_readonly["rp01fechahijos2"] == "on") { 

 ?>
<input type="hidden" name="rp01fechahijos2" value="<?php echo $this->form_encode_input($rp01fechahijos2) . "\">" . $rp01fechahijos2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechahijos2" class="sc-ui-readonly-rp01fechahijos2 css_rp01fechahijos2_line" style="<?php echo $sStyleReadLab_rp01fechahijos2; ?>"><?php echo $this->form_format_readonly("rp01fechahijos2", $this->form_encode_input($rp01fechahijos2)); ?></span><span id="id_read_off_rp01fechahijos2" class="css_read_off_rp01fechahijos2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechahijos2; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechahijos2']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechahijos2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechahijos2" type=text name="rp01fechahijos2" value="<?php echo $this->form_encode_input($rp01fechahijos2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechahijos2']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechahijos2']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechahijos2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechahijos2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexohijos2']))
    {
        $this->nm_new_label['rp01sexohijos2'] = "Rp 0 1sexohijos 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexohijos2 = $this->rp01sexohijos2;
   $sStyleHidden_rp01sexohijos2 = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexohijos2']) && $this->nmgp_cmp_hidden['rp01sexohijos2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexohijos2']);
       $sStyleHidden_rp01sexohijos2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexohijos2 = 'display: none;';
   $sStyleReadInp_rp01sexohijos2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexohijos2']) && $this->nmgp_cmp_readonly['rp01sexohijos2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexohijos2']);
       $sStyleReadLab_rp01sexohijos2 = '';
       $sStyleReadInp_rp01sexohijos2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexohijos2']) && $this->nmgp_cmp_hidden['rp01sexohijos2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexohijos2" value="<?php echo $this->form_encode_input($rp01sexohijos2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexohijos2_label" id="hidden_field_label_rp01sexohijos2" style="<?php echo $sStyleHidden_rp01sexohijos2; ?>"><span id="id_label_rp01sexohijos2"><?php echo $this->nm_new_label['rp01sexohijos2']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexohijos2_line" id="hidden_field_data_rp01sexohijos2" style="<?php echo $sStyleHidden_rp01sexohijos2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexohijos2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexohijos2"]) &&  $this->nmgp_cmp_readonly["rp01sexohijos2"] == "on") { 

 ?>
<input type="hidden" name="rp01sexohijos2" value="<?php echo $this->form_encode_input($rp01sexohijos2) . "\">" . $rp01sexohijos2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexohijos2" class="sc-ui-readonly-rp01sexohijos2 css_rp01sexohijos2_line" style="<?php echo $sStyleReadLab_rp01sexohijos2; ?>"><?php echo $this->form_format_readonly("rp01sexohijos2", $this->form_encode_input($this->rp01sexohijos2)); ?></span><span id="id_read_off_rp01sexohijos2" class="css_read_off_rp01sexohijos2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexohijos2; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexohijos2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexohijos2" type=text name="rp01sexohijos2" value="<?php echo $this->form_encode_input($rp01sexohijos2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexohijos2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexohijos2']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexohijos2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexohijos2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexohijos2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechahijos3']))
    {
        $this->nm_new_label['rp01fechahijos3'] = "Rp 0 1fechahijos 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechahijos3 = $this->rp01fechahijos3;
   $sStyleHidden_rp01fechahijos3 = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechahijos3']) && $this->nmgp_cmp_hidden['rp01fechahijos3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechahijos3']);
       $sStyleHidden_rp01fechahijos3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechahijos3 = 'display: none;';
   $sStyleReadInp_rp01fechahijos3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechahijos3']) && $this->nmgp_cmp_readonly['rp01fechahijos3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechahijos3']);
       $sStyleReadLab_rp01fechahijos3 = '';
       $sStyleReadInp_rp01fechahijos3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechahijos3']) && $this->nmgp_cmp_hidden['rp01fechahijos3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechahijos3" value="<?php echo $this->form_encode_input($rp01fechahijos3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechahijos3_label" id="hidden_field_label_rp01fechahijos3" style="<?php echo $sStyleHidden_rp01fechahijos3; ?>"><span id="id_label_rp01fechahijos3"><?php echo $this->nm_new_label['rp01fechahijos3']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechahijos3_line" id="hidden_field_data_rp01fechahijos3" style="<?php echo $sStyleHidden_rp01fechahijos3; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechahijos3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechahijos3"]) &&  $this->nmgp_cmp_readonly["rp01fechahijos3"] == "on") { 

 ?>
<input type="hidden" name="rp01fechahijos3" value="<?php echo $this->form_encode_input($rp01fechahijos3) . "\">" . $rp01fechahijos3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechahijos3" class="sc-ui-readonly-rp01fechahijos3 css_rp01fechahijos3_line" style="<?php echo $sStyleReadLab_rp01fechahijos3; ?>"><?php echo $this->form_format_readonly("rp01fechahijos3", $this->form_encode_input($rp01fechahijos3)); ?></span><span id="id_read_off_rp01fechahijos3" class="css_read_off_rp01fechahijos3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechahijos3; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechahijos3']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechahijos3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechahijos3" type=text name="rp01fechahijos3" value="<?php echo $this->form_encode_input($rp01fechahijos3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechahijos3']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechahijos3']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechahijos3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechahijos3_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexohijos3']))
    {
        $this->nm_new_label['rp01sexohijos3'] = "Rp 0 1sexohijos 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexohijos3 = $this->rp01sexohijos3;
   $sStyleHidden_rp01sexohijos3 = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexohijos3']) && $this->nmgp_cmp_hidden['rp01sexohijos3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexohijos3']);
       $sStyleHidden_rp01sexohijos3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexohijos3 = 'display: none;';
   $sStyleReadInp_rp01sexohijos3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexohijos3']) && $this->nmgp_cmp_readonly['rp01sexohijos3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexohijos3']);
       $sStyleReadLab_rp01sexohijos3 = '';
       $sStyleReadInp_rp01sexohijos3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexohijos3']) && $this->nmgp_cmp_hidden['rp01sexohijos3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexohijos3" value="<?php echo $this->form_encode_input($rp01sexohijos3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexohijos3_label" id="hidden_field_label_rp01sexohijos3" style="<?php echo $sStyleHidden_rp01sexohijos3; ?>"><span id="id_label_rp01sexohijos3"><?php echo $this->nm_new_label['rp01sexohijos3']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexohijos3_line" id="hidden_field_data_rp01sexohijos3" style="<?php echo $sStyleHidden_rp01sexohijos3; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexohijos3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexohijos3"]) &&  $this->nmgp_cmp_readonly["rp01sexohijos3"] == "on") { 

 ?>
<input type="hidden" name="rp01sexohijos3" value="<?php echo $this->form_encode_input($rp01sexohijos3) . "\">" . $rp01sexohijos3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexohijos3" class="sc-ui-readonly-rp01sexohijos3 css_rp01sexohijos3_line" style="<?php echo $sStyleReadLab_rp01sexohijos3; ?>"><?php echo $this->form_format_readonly("rp01sexohijos3", $this->form_encode_input($this->rp01sexohijos3)); ?></span><span id="id_read_off_rp01sexohijos3" class="css_read_off_rp01sexohijos3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexohijos3; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexohijos3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexohijos3" type=text name="rp01sexohijos3" value="<?php echo $this->form_encode_input($rp01sexohijos3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexohijos3']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexohijos3']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexohijos3']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexohijos3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexohijos3_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechahijos4']))
    {
        $this->nm_new_label['rp01fechahijos4'] = "Rp 0 1fechahijos 4";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechahijos4 = $this->rp01fechahijos4;
   $sStyleHidden_rp01fechahijos4 = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechahijos4']) && $this->nmgp_cmp_hidden['rp01fechahijos4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechahijos4']);
       $sStyleHidden_rp01fechahijos4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechahijos4 = 'display: none;';
   $sStyleReadInp_rp01fechahijos4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechahijos4']) && $this->nmgp_cmp_readonly['rp01fechahijos4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechahijos4']);
       $sStyleReadLab_rp01fechahijos4 = '';
       $sStyleReadInp_rp01fechahijos4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechahijos4']) && $this->nmgp_cmp_hidden['rp01fechahijos4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechahijos4" value="<?php echo $this->form_encode_input($rp01fechahijos4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechahijos4_label" id="hidden_field_label_rp01fechahijos4" style="<?php echo $sStyleHidden_rp01fechahijos4; ?>"><span id="id_label_rp01fechahijos4"><?php echo $this->nm_new_label['rp01fechahijos4']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechahijos4_line" id="hidden_field_data_rp01fechahijos4" style="<?php echo $sStyleHidden_rp01fechahijos4; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechahijos4_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechahijos4"]) &&  $this->nmgp_cmp_readonly["rp01fechahijos4"] == "on") { 

 ?>
<input type="hidden" name="rp01fechahijos4" value="<?php echo $this->form_encode_input($rp01fechahijos4) . "\">" . $rp01fechahijos4 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechahijos4" class="sc-ui-readonly-rp01fechahijos4 css_rp01fechahijos4_line" style="<?php echo $sStyleReadLab_rp01fechahijos4; ?>"><?php echo $this->form_format_readonly("rp01fechahijos4", $this->form_encode_input($rp01fechahijos4)); ?></span><span id="id_read_off_rp01fechahijos4" class="css_read_off_rp01fechahijos4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechahijos4; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechahijos4']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechahijos4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechahijos4" type=text name="rp01fechahijos4" value="<?php echo $this->form_encode_input($rp01fechahijos4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechahijos4']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechahijos4']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechahijos4_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechahijos4_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexohijos4']))
    {
        $this->nm_new_label['rp01sexohijos4'] = "Rp 0 1sexohijos 4";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexohijos4 = $this->rp01sexohijos4;
   $sStyleHidden_rp01sexohijos4 = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexohijos4']) && $this->nmgp_cmp_hidden['rp01sexohijos4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexohijos4']);
       $sStyleHidden_rp01sexohijos4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexohijos4 = 'display: none;';
   $sStyleReadInp_rp01sexohijos4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexohijos4']) && $this->nmgp_cmp_readonly['rp01sexohijos4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexohijos4']);
       $sStyleReadLab_rp01sexohijos4 = '';
       $sStyleReadInp_rp01sexohijos4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexohijos4']) && $this->nmgp_cmp_hidden['rp01sexohijos4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexohijos4" value="<?php echo $this->form_encode_input($rp01sexohijos4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexohijos4_label" id="hidden_field_label_rp01sexohijos4" style="<?php echo $sStyleHidden_rp01sexohijos4; ?>"><span id="id_label_rp01sexohijos4"><?php echo $this->nm_new_label['rp01sexohijos4']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexohijos4_line" id="hidden_field_data_rp01sexohijos4" style="<?php echo $sStyleHidden_rp01sexohijos4; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexohijos4_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexohijos4"]) &&  $this->nmgp_cmp_readonly["rp01sexohijos4"] == "on") { 

 ?>
<input type="hidden" name="rp01sexohijos4" value="<?php echo $this->form_encode_input($rp01sexohijos4) . "\">" . $rp01sexohijos4 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexohijos4" class="sc-ui-readonly-rp01sexohijos4 css_rp01sexohijos4_line" style="<?php echo $sStyleReadLab_rp01sexohijos4; ?>"><?php echo $this->form_format_readonly("rp01sexohijos4", $this->form_encode_input($this->rp01sexohijos4)); ?></span><span id="id_read_off_rp01sexohijos4" class="css_read_off_rp01sexohijos4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexohijos4; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexohijos4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexohijos4" type=text name="rp01sexohijos4" value="<?php echo $this->form_encode_input($rp01sexohijos4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexohijos4']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexohijos4']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexohijos4']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexohijos4_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexohijos4_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechahijos5']))
    {
        $this->nm_new_label['rp01fechahijos5'] = "Rp 0 1fechahijos 5";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechahijos5 = $this->rp01fechahijos5;
   $sStyleHidden_rp01fechahijos5 = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechahijos5']) && $this->nmgp_cmp_hidden['rp01fechahijos5'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechahijos5']);
       $sStyleHidden_rp01fechahijos5 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechahijos5 = 'display: none;';
   $sStyleReadInp_rp01fechahijos5 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechahijos5']) && $this->nmgp_cmp_readonly['rp01fechahijos5'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechahijos5']);
       $sStyleReadLab_rp01fechahijos5 = '';
       $sStyleReadInp_rp01fechahijos5 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechahijos5']) && $this->nmgp_cmp_hidden['rp01fechahijos5'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechahijos5" value="<?php echo $this->form_encode_input($rp01fechahijos5) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechahijos5_label" id="hidden_field_label_rp01fechahijos5" style="<?php echo $sStyleHidden_rp01fechahijos5; ?>"><span id="id_label_rp01fechahijos5"><?php echo $this->nm_new_label['rp01fechahijos5']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechahijos5_line" id="hidden_field_data_rp01fechahijos5" style="<?php echo $sStyleHidden_rp01fechahijos5; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechahijos5_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechahijos5"]) &&  $this->nmgp_cmp_readonly["rp01fechahijos5"] == "on") { 

 ?>
<input type="hidden" name="rp01fechahijos5" value="<?php echo $this->form_encode_input($rp01fechahijos5) . "\">" . $rp01fechahijos5 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechahijos5" class="sc-ui-readonly-rp01fechahijos5 css_rp01fechahijos5_line" style="<?php echo $sStyleReadLab_rp01fechahijos5; ?>"><?php echo $this->form_format_readonly("rp01fechahijos5", $this->form_encode_input($rp01fechahijos5)); ?></span><span id="id_read_off_rp01fechahijos5" class="css_read_off_rp01fechahijos5<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechahijos5; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechahijos5']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechahijos5_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechahijos5" type=text name="rp01fechahijos5" value="<?php echo $this->form_encode_input($rp01fechahijos5) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechahijos5']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechahijos5']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechahijos5_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechahijos5_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexohijos5']))
    {
        $this->nm_new_label['rp01sexohijos5'] = "Rp 0 1sexohijos 5";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexohijos5 = $this->rp01sexohijos5;
   $sStyleHidden_rp01sexohijos5 = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexohijos5']) && $this->nmgp_cmp_hidden['rp01sexohijos5'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexohijos5']);
       $sStyleHidden_rp01sexohijos5 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexohijos5 = 'display: none;';
   $sStyleReadInp_rp01sexohijos5 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexohijos5']) && $this->nmgp_cmp_readonly['rp01sexohijos5'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexohijos5']);
       $sStyleReadLab_rp01sexohijos5 = '';
       $sStyleReadInp_rp01sexohijos5 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexohijos5']) && $this->nmgp_cmp_hidden['rp01sexohijos5'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexohijos5" value="<?php echo $this->form_encode_input($rp01sexohijos5) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexohijos5_label" id="hidden_field_label_rp01sexohijos5" style="<?php echo $sStyleHidden_rp01sexohijos5; ?>"><span id="id_label_rp01sexohijos5"><?php echo $this->nm_new_label['rp01sexohijos5']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexohijos5_line" id="hidden_field_data_rp01sexohijos5" style="<?php echo $sStyleHidden_rp01sexohijos5; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexohijos5_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexohijos5"]) &&  $this->nmgp_cmp_readonly["rp01sexohijos5"] == "on") { 

 ?>
<input type="hidden" name="rp01sexohijos5" value="<?php echo $this->form_encode_input($rp01sexohijos5) . "\">" . $rp01sexohijos5 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexohijos5" class="sc-ui-readonly-rp01sexohijos5 css_rp01sexohijos5_line" style="<?php echo $sStyleReadLab_rp01sexohijos5; ?>"><?php echo $this->form_format_readonly("rp01sexohijos5", $this->form_encode_input($this->rp01sexohijos5)); ?></span><span id="id_read_off_rp01sexohijos5" class="css_read_off_rp01sexohijos5<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexohijos5; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexohijos5_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexohijos5" type=text name="rp01sexohijos5" value="<?php echo $this->form_encode_input($rp01sexohijos5) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexohijos5']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexohijos5']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexohijos5']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexohijos5_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexohijos5_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechahijos6']))
    {
        $this->nm_new_label['rp01fechahijos6'] = "Rp 0 1fechahijos 6";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechahijos6 = $this->rp01fechahijos6;
   $sStyleHidden_rp01fechahijos6 = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechahijos6']) && $this->nmgp_cmp_hidden['rp01fechahijos6'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechahijos6']);
       $sStyleHidden_rp01fechahijos6 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechahijos6 = 'display: none;';
   $sStyleReadInp_rp01fechahijos6 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechahijos6']) && $this->nmgp_cmp_readonly['rp01fechahijos6'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechahijos6']);
       $sStyleReadLab_rp01fechahijos6 = '';
       $sStyleReadInp_rp01fechahijos6 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechahijos6']) && $this->nmgp_cmp_hidden['rp01fechahijos6'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechahijos6" value="<?php echo $this->form_encode_input($rp01fechahijos6) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechahijos6_label" id="hidden_field_label_rp01fechahijos6" style="<?php echo $sStyleHidden_rp01fechahijos6; ?>"><span id="id_label_rp01fechahijos6"><?php echo $this->nm_new_label['rp01fechahijos6']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechahijos6_line" id="hidden_field_data_rp01fechahijos6" style="<?php echo $sStyleHidden_rp01fechahijos6; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechahijos6_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechahijos6"]) &&  $this->nmgp_cmp_readonly["rp01fechahijos6"] == "on") { 

 ?>
<input type="hidden" name="rp01fechahijos6" value="<?php echo $this->form_encode_input($rp01fechahijos6) . "\">" . $rp01fechahijos6 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechahijos6" class="sc-ui-readonly-rp01fechahijos6 css_rp01fechahijos6_line" style="<?php echo $sStyleReadLab_rp01fechahijos6; ?>"><?php echo $this->form_format_readonly("rp01fechahijos6", $this->form_encode_input($rp01fechahijos6)); ?></span><span id="id_read_off_rp01fechahijos6" class="css_read_off_rp01fechahijos6<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechahijos6; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechahijos6']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechahijos6_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechahijos6" type=text name="rp01fechahijos6" value="<?php echo $this->form_encode_input($rp01fechahijos6) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechahijos6']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechahijos6']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechahijos6_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechahijos6_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexohijos6']))
    {
        $this->nm_new_label['rp01sexohijos6'] = "Rp 0 1sexohijos 6";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexohijos6 = $this->rp01sexohijos6;
   $sStyleHidden_rp01sexohijos6 = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexohijos6']) && $this->nmgp_cmp_hidden['rp01sexohijos6'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexohijos6']);
       $sStyleHidden_rp01sexohijos6 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexohijos6 = 'display: none;';
   $sStyleReadInp_rp01sexohijos6 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexohijos6']) && $this->nmgp_cmp_readonly['rp01sexohijos6'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexohijos6']);
       $sStyleReadLab_rp01sexohijos6 = '';
       $sStyleReadInp_rp01sexohijos6 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexohijos6']) && $this->nmgp_cmp_hidden['rp01sexohijos6'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexohijos6" value="<?php echo $this->form_encode_input($rp01sexohijos6) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexohijos6_label" id="hidden_field_label_rp01sexohijos6" style="<?php echo $sStyleHidden_rp01sexohijos6; ?>"><span id="id_label_rp01sexohijos6"><?php echo $this->nm_new_label['rp01sexohijos6']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexohijos6_line" id="hidden_field_data_rp01sexohijos6" style="<?php echo $sStyleHidden_rp01sexohijos6; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexohijos6_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexohijos6"]) &&  $this->nmgp_cmp_readonly["rp01sexohijos6"] == "on") { 

 ?>
<input type="hidden" name="rp01sexohijos6" value="<?php echo $this->form_encode_input($rp01sexohijos6) . "\">" . $rp01sexohijos6 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexohijos6" class="sc-ui-readonly-rp01sexohijos6 css_rp01sexohijos6_line" style="<?php echo $sStyleReadLab_rp01sexohijos6; ?>"><?php echo $this->form_format_readonly("rp01sexohijos6", $this->form_encode_input($this->rp01sexohijos6)); ?></span><span id="id_read_off_rp01sexohijos6" class="css_read_off_rp01sexohijos6<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexohijos6; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexohijos6_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexohijos6" type=text name="rp01sexohijos6" value="<?php echo $this->form_encode_input($rp01sexohijos6) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexohijos6']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexohijos6']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexohijos6']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexohijos6_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexohijos6_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechahijos7']))
    {
        $this->nm_new_label['rp01fechahijos7'] = "Rp 0 1fechahijos 7";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechahijos7 = $this->rp01fechahijos7;
   $sStyleHidden_rp01fechahijos7 = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechahijos7']) && $this->nmgp_cmp_hidden['rp01fechahijos7'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechahijos7']);
       $sStyleHidden_rp01fechahijos7 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechahijos7 = 'display: none;';
   $sStyleReadInp_rp01fechahijos7 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechahijos7']) && $this->nmgp_cmp_readonly['rp01fechahijos7'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechahijos7']);
       $sStyleReadLab_rp01fechahijos7 = '';
       $sStyleReadInp_rp01fechahijos7 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechahijos7']) && $this->nmgp_cmp_hidden['rp01fechahijos7'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechahijos7" value="<?php echo $this->form_encode_input($rp01fechahijos7) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechahijos7_label" id="hidden_field_label_rp01fechahijos7" style="<?php echo $sStyleHidden_rp01fechahijos7; ?>"><span id="id_label_rp01fechahijos7"><?php echo $this->nm_new_label['rp01fechahijos7']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechahijos7_line" id="hidden_field_data_rp01fechahijos7" style="<?php echo $sStyleHidden_rp01fechahijos7; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechahijos7_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechahijos7"]) &&  $this->nmgp_cmp_readonly["rp01fechahijos7"] == "on") { 

 ?>
<input type="hidden" name="rp01fechahijos7" value="<?php echo $this->form_encode_input($rp01fechahijos7) . "\">" . $rp01fechahijos7 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechahijos7" class="sc-ui-readonly-rp01fechahijos7 css_rp01fechahijos7_line" style="<?php echo $sStyleReadLab_rp01fechahijos7; ?>"><?php echo $this->form_format_readonly("rp01fechahijos7", $this->form_encode_input($rp01fechahijos7)); ?></span><span id="id_read_off_rp01fechahijos7" class="css_read_off_rp01fechahijos7<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechahijos7; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechahijos7']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechahijos7_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechahijos7" type=text name="rp01fechahijos7" value="<?php echo $this->form_encode_input($rp01fechahijos7) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechahijos7']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechahijos7']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechahijos7_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechahijos7_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexohijos7']))
    {
        $this->nm_new_label['rp01sexohijos7'] = "Rp 0 1sexohijos 7";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexohijos7 = $this->rp01sexohijos7;
   $sStyleHidden_rp01sexohijos7 = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexohijos7']) && $this->nmgp_cmp_hidden['rp01sexohijos7'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexohijos7']);
       $sStyleHidden_rp01sexohijos7 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexohijos7 = 'display: none;';
   $sStyleReadInp_rp01sexohijos7 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexohijos7']) && $this->nmgp_cmp_readonly['rp01sexohijos7'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexohijos7']);
       $sStyleReadLab_rp01sexohijos7 = '';
       $sStyleReadInp_rp01sexohijos7 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexohijos7']) && $this->nmgp_cmp_hidden['rp01sexohijos7'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexohijos7" value="<?php echo $this->form_encode_input($rp01sexohijos7) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexohijos7_label" id="hidden_field_label_rp01sexohijos7" style="<?php echo $sStyleHidden_rp01sexohijos7; ?>"><span id="id_label_rp01sexohijos7"><?php echo $this->nm_new_label['rp01sexohijos7']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexohijos7_line" id="hidden_field_data_rp01sexohijos7" style="<?php echo $sStyleHidden_rp01sexohijos7; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexohijos7_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexohijos7"]) &&  $this->nmgp_cmp_readonly["rp01sexohijos7"] == "on") { 

 ?>
<input type="hidden" name="rp01sexohijos7" value="<?php echo $this->form_encode_input($rp01sexohijos7) . "\">" . $rp01sexohijos7 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexohijos7" class="sc-ui-readonly-rp01sexohijos7 css_rp01sexohijos7_line" style="<?php echo $sStyleReadLab_rp01sexohijos7; ?>"><?php echo $this->form_format_readonly("rp01sexohijos7", $this->form_encode_input($this->rp01sexohijos7)); ?></span><span id="id_read_off_rp01sexohijos7" class="css_read_off_rp01sexohijos7<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexohijos7; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexohijos7_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexohijos7" type=text name="rp01sexohijos7" value="<?php echo $this->form_encode_input($rp01sexohijos7) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexohijos7']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexohijos7']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexohijos7']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexohijos7_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexohijos7_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechahijos8']))
    {
        $this->nm_new_label['rp01fechahijos8'] = "Rp 0 1fechahijos 8";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechahijos8 = $this->rp01fechahijos8;
   $sStyleHidden_rp01fechahijos8 = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechahijos8']) && $this->nmgp_cmp_hidden['rp01fechahijos8'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechahijos8']);
       $sStyleHidden_rp01fechahijos8 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechahijos8 = 'display: none;';
   $sStyleReadInp_rp01fechahijos8 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechahijos8']) && $this->nmgp_cmp_readonly['rp01fechahijos8'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechahijos8']);
       $sStyleReadLab_rp01fechahijos8 = '';
       $sStyleReadInp_rp01fechahijos8 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechahijos8']) && $this->nmgp_cmp_hidden['rp01fechahijos8'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechahijos8" value="<?php echo $this->form_encode_input($rp01fechahijos8) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechahijos8_label" id="hidden_field_label_rp01fechahijos8" style="<?php echo $sStyleHidden_rp01fechahijos8; ?>"><span id="id_label_rp01fechahijos8"><?php echo $this->nm_new_label['rp01fechahijos8']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechahijos8_line" id="hidden_field_data_rp01fechahijos8" style="<?php echo $sStyleHidden_rp01fechahijos8; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechahijos8_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechahijos8"]) &&  $this->nmgp_cmp_readonly["rp01fechahijos8"] == "on") { 

 ?>
<input type="hidden" name="rp01fechahijos8" value="<?php echo $this->form_encode_input($rp01fechahijos8) . "\">" . $rp01fechahijos8 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechahijos8" class="sc-ui-readonly-rp01fechahijos8 css_rp01fechahijos8_line" style="<?php echo $sStyleReadLab_rp01fechahijos8; ?>"><?php echo $this->form_format_readonly("rp01fechahijos8", $this->form_encode_input($rp01fechahijos8)); ?></span><span id="id_read_off_rp01fechahijos8" class="css_read_off_rp01fechahijos8<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechahijos8; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechahijos8']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechahijos8_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechahijos8" type=text name="rp01fechahijos8" value="<?php echo $this->form_encode_input($rp01fechahijos8) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechahijos8']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechahijos8']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechahijos8_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechahijos8_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexohijos8']))
    {
        $this->nm_new_label['rp01sexohijos8'] = "Rp 0 1sexohijos 8";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexohijos8 = $this->rp01sexohijos8;
   $sStyleHidden_rp01sexohijos8 = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexohijos8']) && $this->nmgp_cmp_hidden['rp01sexohijos8'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexohijos8']);
       $sStyleHidden_rp01sexohijos8 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexohijos8 = 'display: none;';
   $sStyleReadInp_rp01sexohijos8 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexohijos8']) && $this->nmgp_cmp_readonly['rp01sexohijos8'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexohijos8']);
       $sStyleReadLab_rp01sexohijos8 = '';
       $sStyleReadInp_rp01sexohijos8 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexohijos8']) && $this->nmgp_cmp_hidden['rp01sexohijos8'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexohijos8" value="<?php echo $this->form_encode_input($rp01sexohijos8) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexohijos8_label" id="hidden_field_label_rp01sexohijos8" style="<?php echo $sStyleHidden_rp01sexohijos8; ?>"><span id="id_label_rp01sexohijos8"><?php echo $this->nm_new_label['rp01sexohijos8']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexohijos8_line" id="hidden_field_data_rp01sexohijos8" style="<?php echo $sStyleHidden_rp01sexohijos8; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexohijos8_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexohijos8"]) &&  $this->nmgp_cmp_readonly["rp01sexohijos8"] == "on") { 

 ?>
<input type="hidden" name="rp01sexohijos8" value="<?php echo $this->form_encode_input($rp01sexohijos8) . "\">" . $rp01sexohijos8 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexohijos8" class="sc-ui-readonly-rp01sexohijos8 css_rp01sexohijos8_line" style="<?php echo $sStyleReadLab_rp01sexohijos8; ?>"><?php echo $this->form_format_readonly("rp01sexohijos8", $this->form_encode_input($this->rp01sexohijos8)); ?></span><span id="id_read_off_rp01sexohijos8" class="css_read_off_rp01sexohijos8<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexohijos8; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexohijos8_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexohijos8" type=text name="rp01sexohijos8" value="<?php echo $this->form_encode_input($rp01sexohijos8) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexohijos8']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexohijos8']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexohijos8']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexohijos8_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexohijos8_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechahijos9']))
    {
        $this->nm_new_label['rp01fechahijos9'] = "Rp 0 1fechahijos 9";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechahijos9 = $this->rp01fechahijos9;
   $sStyleHidden_rp01fechahijos9 = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechahijos9']) && $this->nmgp_cmp_hidden['rp01fechahijos9'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechahijos9']);
       $sStyleHidden_rp01fechahijos9 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechahijos9 = 'display: none;';
   $sStyleReadInp_rp01fechahijos9 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechahijos9']) && $this->nmgp_cmp_readonly['rp01fechahijos9'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechahijos9']);
       $sStyleReadLab_rp01fechahijos9 = '';
       $sStyleReadInp_rp01fechahijos9 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechahijos9']) && $this->nmgp_cmp_hidden['rp01fechahijos9'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechahijos9" value="<?php echo $this->form_encode_input($rp01fechahijos9) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechahijos9_label" id="hidden_field_label_rp01fechahijos9" style="<?php echo $sStyleHidden_rp01fechahijos9; ?>"><span id="id_label_rp01fechahijos9"><?php echo $this->nm_new_label['rp01fechahijos9']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechahijos9_line" id="hidden_field_data_rp01fechahijos9" style="<?php echo $sStyleHidden_rp01fechahijos9; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechahijos9_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechahijos9"]) &&  $this->nmgp_cmp_readonly["rp01fechahijos9"] == "on") { 

 ?>
<input type="hidden" name="rp01fechahijos9" value="<?php echo $this->form_encode_input($rp01fechahijos9) . "\">" . $rp01fechahijos9 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechahijos9" class="sc-ui-readonly-rp01fechahijos9 css_rp01fechahijos9_line" style="<?php echo $sStyleReadLab_rp01fechahijos9; ?>"><?php echo $this->form_format_readonly("rp01fechahijos9", $this->form_encode_input($rp01fechahijos9)); ?></span><span id="id_read_off_rp01fechahijos9" class="css_read_off_rp01fechahijos9<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechahijos9; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechahijos9']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechahijos9_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechahijos9" type=text name="rp01fechahijos9" value="<?php echo $this->form_encode_input($rp01fechahijos9) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechahijos9']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechahijos9']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechahijos9_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechahijos9_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sexohijos9']))
    {
        $this->nm_new_label['rp01sexohijos9'] = "Rp 0 1sexohijos 9";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sexohijos9 = $this->rp01sexohijos9;
   $sStyleHidden_rp01sexohijos9 = '';
   if (isset($this->nmgp_cmp_hidden['rp01sexohijos9']) && $this->nmgp_cmp_hidden['rp01sexohijos9'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sexohijos9']);
       $sStyleHidden_rp01sexohijos9 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sexohijos9 = 'display: none;';
   $sStyleReadInp_rp01sexohijos9 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sexohijos9']) && $this->nmgp_cmp_readonly['rp01sexohijos9'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sexohijos9']);
       $sStyleReadLab_rp01sexohijos9 = '';
       $sStyleReadInp_rp01sexohijos9 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sexohijos9']) && $this->nmgp_cmp_hidden['rp01sexohijos9'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sexohijos9" value="<?php echo $this->form_encode_input($rp01sexohijos9) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sexohijos9_label" id="hidden_field_label_rp01sexohijos9" style="<?php echo $sStyleHidden_rp01sexohijos9; ?>"><span id="id_label_rp01sexohijos9"><?php echo $this->nm_new_label['rp01sexohijos9']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sexohijos9_line" id="hidden_field_data_rp01sexohijos9" style="<?php echo $sStyleHidden_rp01sexohijos9; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sexohijos9_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sexohijos9"]) &&  $this->nmgp_cmp_readonly["rp01sexohijos9"] == "on") { 

 ?>
<input type="hidden" name="rp01sexohijos9" value="<?php echo $this->form_encode_input($rp01sexohijos9) . "\">" . $rp01sexohijos9 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sexohijos9" class="sc-ui-readonly-rp01sexohijos9 css_rp01sexohijos9_line" style="<?php echo $sStyleReadLab_rp01sexohijos9; ?>"><?php echo $this->form_format_readonly("rp01sexohijos9", $this->form_encode_input($this->rp01sexohijos9)); ?></span><span id="id_read_off_rp01sexohijos9" class="css_read_off_rp01sexohijos9<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sexohijos9; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sexohijos9_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sexohijos9" type=text name="rp01sexohijos9" value="<?php echo $this->form_encode_input($rp01sexohijos9) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sexohijos9']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sexohijos9']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sexohijos9']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sexohijos9_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sexohijos9_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01cargaspadres']))
    {
        $this->nm_new_label['rp01cargaspadres'] = "Rp 0 1cargaspadres";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01cargaspadres = $this->rp01cargaspadres;
   $sStyleHidden_rp01cargaspadres = '';
   if (isset($this->nmgp_cmp_hidden['rp01cargaspadres']) && $this->nmgp_cmp_hidden['rp01cargaspadres'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01cargaspadres']);
       $sStyleHidden_rp01cargaspadres = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01cargaspadres = 'display: none;';
   $sStyleReadInp_rp01cargaspadres = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01cargaspadres']) && $this->nmgp_cmp_readonly['rp01cargaspadres'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01cargaspadres']);
       $sStyleReadLab_rp01cargaspadres = '';
       $sStyleReadInp_rp01cargaspadres = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01cargaspadres']) && $this->nmgp_cmp_hidden['rp01cargaspadres'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01cargaspadres" value="<?php echo $this->form_encode_input($rp01cargaspadres) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01cargaspadres_label" id="hidden_field_label_rp01cargaspadres" style="<?php echo $sStyleHidden_rp01cargaspadres; ?>"><span id="id_label_rp01cargaspadres"><?php echo $this->nm_new_label['rp01cargaspadres']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01cargaspadres_line" id="hidden_field_data_rp01cargaspadres" style="<?php echo $sStyleHidden_rp01cargaspadres; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01cargaspadres_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01cargaspadres"]) &&  $this->nmgp_cmp_readonly["rp01cargaspadres"] == "on") { 

 ?>
<input type="hidden" name="rp01cargaspadres" value="<?php echo $this->form_encode_input($rp01cargaspadres) . "\">" . $rp01cargaspadres . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01cargaspadres" class="sc-ui-readonly-rp01cargaspadres css_rp01cargaspadres_line" style="<?php echo $sStyleReadLab_rp01cargaspadres; ?>"><?php echo $this->form_format_readonly("rp01cargaspadres", $this->form_encode_input($this->rp01cargaspadres)); ?></span><span id="id_read_off_rp01cargaspadres" class="css_read_off_rp01cargaspadres<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01cargaspadres; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01cargaspadres_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01cargaspadres" type=text name="rp01cargaspadres" value="<?php echo $this->form_encode_input($rp01cargaspadres) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01cargaspadres_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01cargaspadres_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01otrascargas']))
    {
        $this->nm_new_label['rp01otrascargas'] = "Rp 0 1otrascargas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01otrascargas = $this->rp01otrascargas;
   $sStyleHidden_rp01otrascargas = '';
   if (isset($this->nmgp_cmp_hidden['rp01otrascargas']) && $this->nmgp_cmp_hidden['rp01otrascargas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01otrascargas']);
       $sStyleHidden_rp01otrascargas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01otrascargas = 'display: none;';
   $sStyleReadInp_rp01otrascargas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01otrascargas']) && $this->nmgp_cmp_readonly['rp01otrascargas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01otrascargas']);
       $sStyleReadLab_rp01otrascargas = '';
       $sStyleReadInp_rp01otrascargas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01otrascargas']) && $this->nmgp_cmp_hidden['rp01otrascargas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01otrascargas" value="<?php echo $this->form_encode_input($rp01otrascargas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01otrascargas_label" id="hidden_field_label_rp01otrascargas" style="<?php echo $sStyleHidden_rp01otrascargas; ?>"><span id="id_label_rp01otrascargas"><?php echo $this->nm_new_label['rp01otrascargas']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01otrascargas_line" id="hidden_field_data_rp01otrascargas" style="<?php echo $sStyleHidden_rp01otrascargas; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01otrascargas_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01otrascargas"]) &&  $this->nmgp_cmp_readonly["rp01otrascargas"] == "on") { 

 ?>
<input type="hidden" name="rp01otrascargas" value="<?php echo $this->form_encode_input($rp01otrascargas) . "\">" . $rp01otrascargas . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01otrascargas" class="sc-ui-readonly-rp01otrascargas css_rp01otrascargas_line" style="<?php echo $sStyleReadLab_rp01otrascargas; ?>"><?php echo $this->form_format_readonly("rp01otrascargas", $this->form_encode_input($this->rp01otrascargas)); ?></span><span id="id_read_off_rp01otrascargas" class="css_read_off_rp01otrascargas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01otrascargas; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01otrascargas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01otrascargas" type=text name="rp01otrascargas" value="<?php echo $this->form_encode_input($rp01otrascargas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01otrascargas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01otrascargas_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01formapago']))
    {
        $this->nm_new_label['rp01formapago'] = "Rp 0 1formapago";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01formapago = $this->rp01formapago;
   $sStyleHidden_rp01formapago = '';
   if (isset($this->nmgp_cmp_hidden['rp01formapago']) && $this->nmgp_cmp_hidden['rp01formapago'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01formapago']);
       $sStyleHidden_rp01formapago = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01formapago = 'display: none;';
   $sStyleReadInp_rp01formapago = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01formapago']) && $this->nmgp_cmp_readonly['rp01formapago'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01formapago']);
       $sStyleReadLab_rp01formapago = '';
       $sStyleReadInp_rp01formapago = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01formapago']) && $this->nmgp_cmp_hidden['rp01formapago'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01formapago" value="<?php echo $this->form_encode_input($rp01formapago) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01formapago_label" id="hidden_field_label_rp01formapago" style="<?php echo $sStyleHidden_rp01formapago; ?>"><span id="id_label_rp01formapago"><?php echo $this->nm_new_label['rp01formapago']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01formapago_line" id="hidden_field_data_rp01formapago" style="<?php echo $sStyleHidden_rp01formapago; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01formapago_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01formapago"]) &&  $this->nmgp_cmp_readonly["rp01formapago"] == "on") { 

 ?>
<input type="hidden" name="rp01formapago" value="<?php echo $this->form_encode_input($rp01formapago) . "\">" . $rp01formapago . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01formapago" class="sc-ui-readonly-rp01formapago css_rp01formapago_line" style="<?php echo $sStyleReadLab_rp01formapago; ?>"><?php echo $this->form_format_readonly("rp01formapago", $this->form_encode_input($this->rp01formapago)); ?></span><span id="id_read_off_rp01formapago" class="css_read_off_rp01formapago<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01formapago; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01formapago_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01formapago" type=text name="rp01formapago" value="<?php echo $this->form_encode_input($rp01formapago) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01formapago_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01formapago_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01nobancoemp']))
    {
        $this->nm_new_label['rp01nobancoemp'] = "Rp 0 1nobancoemp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01nobancoemp = $this->rp01nobancoemp;
   $sStyleHidden_rp01nobancoemp = '';
   if (isset($this->nmgp_cmp_hidden['rp01nobancoemp']) && $this->nmgp_cmp_hidden['rp01nobancoemp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01nobancoemp']);
       $sStyleHidden_rp01nobancoemp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01nobancoemp = 'display: none;';
   $sStyleReadInp_rp01nobancoemp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01nobancoemp']) && $this->nmgp_cmp_readonly['rp01nobancoemp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01nobancoemp']);
       $sStyleReadLab_rp01nobancoemp = '';
       $sStyleReadInp_rp01nobancoemp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01nobancoemp']) && $this->nmgp_cmp_hidden['rp01nobancoemp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01nobancoemp" value="<?php echo $this->form_encode_input($rp01nobancoemp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01nobancoemp_label" id="hidden_field_label_rp01nobancoemp" style="<?php echo $sStyleHidden_rp01nobancoemp; ?>"><span id="id_label_rp01nobancoemp"><?php echo $this->nm_new_label['rp01nobancoemp']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01nobancoemp_line" id="hidden_field_data_rp01nobancoemp" style="<?php echo $sStyleHidden_rp01nobancoemp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01nobancoemp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01nobancoemp"]) &&  $this->nmgp_cmp_readonly["rp01nobancoemp"] == "on") { 

 ?>
<input type="hidden" name="rp01nobancoemp" value="<?php echo $this->form_encode_input($rp01nobancoemp) . "\">" . $rp01nobancoemp . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01nobancoemp" class="sc-ui-readonly-rp01nobancoemp css_rp01nobancoemp_line" style="<?php echo $sStyleReadLab_rp01nobancoemp; ?>"><?php echo $this->form_format_readonly("rp01nobancoemp", $this->form_encode_input($this->rp01nobancoemp)); ?></span><span id="id_read_off_rp01nobancoemp" class="css_read_off_rp01nobancoemp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01nobancoemp; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01nobancoemp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01nobancoemp" type=text name="rp01nobancoemp" value="<?php echo $this->form_encode_input($rp01nobancoemp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01nobancoemp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01nobancoemp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01ctabancoemp']))
    {
        $this->nm_new_label['rp01ctabancoemp'] = "Rp 0 1ctabancoemp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01ctabancoemp = $this->rp01ctabancoemp;
   $sStyleHidden_rp01ctabancoemp = '';
   if (isset($this->nmgp_cmp_hidden['rp01ctabancoemp']) && $this->nmgp_cmp_hidden['rp01ctabancoemp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01ctabancoemp']);
       $sStyleHidden_rp01ctabancoemp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01ctabancoemp = 'display: none;';
   $sStyleReadInp_rp01ctabancoemp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01ctabancoemp']) && $this->nmgp_cmp_readonly['rp01ctabancoemp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01ctabancoemp']);
       $sStyleReadLab_rp01ctabancoemp = '';
       $sStyleReadInp_rp01ctabancoemp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01ctabancoemp']) && $this->nmgp_cmp_hidden['rp01ctabancoemp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01ctabancoemp" value="<?php echo $this->form_encode_input($rp01ctabancoemp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01ctabancoemp_label" id="hidden_field_label_rp01ctabancoemp" style="<?php echo $sStyleHidden_rp01ctabancoemp; ?>"><span id="id_label_rp01ctabancoemp"><?php echo $this->nm_new_label['rp01ctabancoemp']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01ctabancoemp_line" id="hidden_field_data_rp01ctabancoemp" style="<?php echo $sStyleHidden_rp01ctabancoemp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01ctabancoemp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01ctabancoemp"]) &&  $this->nmgp_cmp_readonly["rp01ctabancoemp"] == "on") { 

 ?>
<input type="hidden" name="rp01ctabancoemp" value="<?php echo $this->form_encode_input($rp01ctabancoemp) . "\">" . $rp01ctabancoemp . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01ctabancoemp" class="sc-ui-readonly-rp01ctabancoemp css_rp01ctabancoemp_line" style="<?php echo $sStyleReadLab_rp01ctabancoemp; ?>"><?php echo $this->form_format_readonly("rp01ctabancoemp", $this->form_encode_input($this->rp01ctabancoemp)); ?></span><span id="id_read_off_rp01ctabancoemp" class="css_read_off_rp01ctabancoemp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01ctabancoemp; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01ctabancoemp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01ctabancoemp" type=text name="rp01ctabancoemp" value="<?php echo $this->form_encode_input($rp01ctabancoemp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01ctabancoemp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01ctabancoemp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01tipoctabco']))
    {
        $this->nm_new_label['rp01tipoctabco'] = "Rp 0 1tipoctabco";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01tipoctabco = $this->rp01tipoctabco;
   $sStyleHidden_rp01tipoctabco = '';
   if (isset($this->nmgp_cmp_hidden['rp01tipoctabco']) && $this->nmgp_cmp_hidden['rp01tipoctabco'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01tipoctabco']);
       $sStyleHidden_rp01tipoctabco = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01tipoctabco = 'display: none;';
   $sStyleReadInp_rp01tipoctabco = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01tipoctabco']) && $this->nmgp_cmp_readonly['rp01tipoctabco'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01tipoctabco']);
       $sStyleReadLab_rp01tipoctabco = '';
       $sStyleReadInp_rp01tipoctabco = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01tipoctabco']) && $this->nmgp_cmp_hidden['rp01tipoctabco'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01tipoctabco" value="<?php echo $this->form_encode_input($rp01tipoctabco) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01tipoctabco_label" id="hidden_field_label_rp01tipoctabco" style="<?php echo $sStyleHidden_rp01tipoctabco; ?>"><span id="id_label_rp01tipoctabco"><?php echo $this->nm_new_label['rp01tipoctabco']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01tipoctabco']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01tipoctabco'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01tipoctabco_line" id="hidden_field_data_rp01tipoctabco" style="<?php echo $sStyleHidden_rp01tipoctabco; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01tipoctabco_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01tipoctabco"]) &&  $this->nmgp_cmp_readonly["rp01tipoctabco"] == "on") { 

 ?>
<input type="hidden" name="rp01tipoctabco" value="<?php echo $this->form_encode_input($rp01tipoctabco) . "\">" . $rp01tipoctabco . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01tipoctabco" class="sc-ui-readonly-rp01tipoctabco css_rp01tipoctabco_line" style="<?php echo $sStyleReadLab_rp01tipoctabco; ?>"><?php echo $this->form_format_readonly("rp01tipoctabco", $this->form_encode_input($this->rp01tipoctabco)); ?></span><span id="id_read_off_rp01tipoctabco" class="css_read_off_rp01tipoctabco<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01tipoctabco; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01tipoctabco_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01tipoctabco" type=text name="rp01tipoctabco" value="<?php echo $this->form_encode_input($rp01tipoctabco) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01tipoctabco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01tipoctabco_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechaultvacacion']))
    {
        $this->nm_new_label['rp01fechaultvacacion'] = "Rp 0 1fechaultvacacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fechaultvacacion = $this->rp01fechaultvacacion;
   $sStyleHidden_rp01fechaultvacacion = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechaultvacacion']) && $this->nmgp_cmp_hidden['rp01fechaultvacacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechaultvacacion']);
       $sStyleHidden_rp01fechaultvacacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechaultvacacion = 'display: none;';
   $sStyleReadInp_rp01fechaultvacacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechaultvacacion']) && $this->nmgp_cmp_readonly['rp01fechaultvacacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechaultvacacion']);
       $sStyleReadLab_rp01fechaultvacacion = '';
       $sStyleReadInp_rp01fechaultvacacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechaultvacacion']) && $this->nmgp_cmp_hidden['rp01fechaultvacacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechaultvacacion" value="<?php echo $this->form_encode_input($rp01fechaultvacacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechaultvacacion_label" id="hidden_field_label_rp01fechaultvacacion" style="<?php echo $sStyleHidden_rp01fechaultvacacion; ?>"><span id="id_label_rp01fechaultvacacion"><?php echo $this->nm_new_label['rp01fechaultvacacion']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechaultvacacion_line" id="hidden_field_data_rp01fechaultvacacion" style="<?php echo $sStyleHidden_rp01fechaultvacacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechaultvacacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechaultvacacion"]) &&  $this->nmgp_cmp_readonly["rp01fechaultvacacion"] == "on") { 

 ?>
<input type="hidden" name="rp01fechaultvacacion" value="<?php echo $this->form_encode_input($rp01fechaultvacacion) . "\">" . $rp01fechaultvacacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechaultvacacion" class="sc-ui-readonly-rp01fechaultvacacion css_rp01fechaultvacacion_line" style="<?php echo $sStyleReadLab_rp01fechaultvacacion; ?>"><?php echo $this->form_format_readonly("rp01fechaultvacacion", $this->form_encode_input($rp01fechaultvacacion)); ?></span><span id="id_read_off_rp01fechaultvacacion" class="css_read_off_rp01fechaultvacacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechaultvacacion; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechaultvacacion']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechaultvacacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechaultvacacion" type=text name="rp01fechaultvacacion" value="<?php echo $this->form_encode_input($rp01fechaultvacacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fechaultvacacion']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechaultvacacion']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechaultvacacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechaultvacacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01aporte']))
    {
        $this->nm_new_label['rp01aporte'] = "Rp 0 1aporte";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01aporte = $this->rp01aporte;
   $sStyleHidden_rp01aporte = '';
   if (isset($this->nmgp_cmp_hidden['rp01aporte']) && $this->nmgp_cmp_hidden['rp01aporte'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01aporte']);
       $sStyleHidden_rp01aporte = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01aporte = 'display: none;';
   $sStyleReadInp_rp01aporte = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01aporte']) && $this->nmgp_cmp_readonly['rp01aporte'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01aporte']);
       $sStyleReadLab_rp01aporte = '';
       $sStyleReadInp_rp01aporte = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01aporte']) && $this->nmgp_cmp_hidden['rp01aporte'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01aporte" value="<?php echo $this->form_encode_input($rp01aporte) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01aporte_label" id="hidden_field_label_rp01aporte" style="<?php echo $sStyleHidden_rp01aporte; ?>"><span id="id_label_rp01aporte"><?php echo $this->nm_new_label['rp01aporte']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01aporte_line" id="hidden_field_data_rp01aporte" style="<?php echo $sStyleHidden_rp01aporte; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01aporte_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01aporte"]) &&  $this->nmgp_cmp_readonly["rp01aporte"] == "on") { 

 ?>
<input type="hidden" name="rp01aporte" value="<?php echo $this->form_encode_input($rp01aporte) . "\">" . $rp01aporte . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01aporte" class="sc-ui-readonly-rp01aporte css_rp01aporte_line" style="<?php echo $sStyleReadLab_rp01aporte; ?>"><?php echo $this->form_format_readonly("rp01aporte", $this->form_encode_input($this->rp01aporte)); ?></span><span id="id_read_off_rp01aporte" class="css_read_off_rp01aporte<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01aporte; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01aporte_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01aporte" type=text name="rp01aporte" value="<?php echo $this->form_encode_input($rp01aporte) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01aporte_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01aporte_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01socio']))
    {
        $this->nm_new_label['rp01socio'] = "Rp 0 1socio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01socio = $this->rp01socio;
   $sStyleHidden_rp01socio = '';
   if (isset($this->nmgp_cmp_hidden['rp01socio']) && $this->nmgp_cmp_hidden['rp01socio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01socio']);
       $sStyleHidden_rp01socio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01socio = 'display: none;';
   $sStyleReadInp_rp01socio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01socio']) && $this->nmgp_cmp_readonly['rp01socio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01socio']);
       $sStyleReadLab_rp01socio = '';
       $sStyleReadInp_rp01socio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01socio']) && $this->nmgp_cmp_hidden['rp01socio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01socio" value="<?php echo $this->form_encode_input($rp01socio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01socio_label" id="hidden_field_label_rp01socio" style="<?php echo $sStyleHidden_rp01socio; ?>"><span id="id_label_rp01socio"><?php echo $this->nm_new_label['rp01socio']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01socio_line" id="hidden_field_data_rp01socio" style="<?php echo $sStyleHidden_rp01socio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01socio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01socio"]) &&  $this->nmgp_cmp_readonly["rp01socio"] == "on") { 

 ?>
<input type="hidden" name="rp01socio" value="<?php echo $this->form_encode_input($rp01socio) . "\">" . $rp01socio . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01socio" class="sc-ui-readonly-rp01socio css_rp01socio_line" style="<?php echo $sStyleReadLab_rp01socio; ?>"><?php echo $this->form_format_readonly("rp01socio", $this->form_encode_input($this->rp01socio)); ?></span><span id="id_read_off_rp01socio" class="css_read_off_rp01socio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01socio; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01socio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01socio" type=text name="rp01socio" value="<?php echo $this->form_encode_input($rp01socio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01socio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01socio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01transporte']))
    {
        $this->nm_new_label['rp01transporte'] = "Rp 0 1transporte";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01transporte = $this->rp01transporte;
   $sStyleHidden_rp01transporte = '';
   if (isset($this->nmgp_cmp_hidden['rp01transporte']) && $this->nmgp_cmp_hidden['rp01transporte'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01transporte']);
       $sStyleHidden_rp01transporte = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01transporte = 'display: none;';
   $sStyleReadInp_rp01transporte = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01transporte']) && $this->nmgp_cmp_readonly['rp01transporte'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01transporte']);
       $sStyleReadLab_rp01transporte = '';
       $sStyleReadInp_rp01transporte = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01transporte']) && $this->nmgp_cmp_hidden['rp01transporte'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01transporte" value="<?php echo $this->form_encode_input($rp01transporte) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01transporte_label" id="hidden_field_label_rp01transporte" style="<?php echo $sStyleHidden_rp01transporte; ?>"><span id="id_label_rp01transporte"><?php echo $this->nm_new_label['rp01transporte']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01transporte_line" id="hidden_field_data_rp01transporte" style="<?php echo $sStyleHidden_rp01transporte; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01transporte_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01transporte"]) &&  $this->nmgp_cmp_readonly["rp01transporte"] == "on") { 

 ?>
<input type="hidden" name="rp01transporte" value="<?php echo $this->form_encode_input($rp01transporte) . "\">" . $rp01transporte . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01transporte" class="sc-ui-readonly-rp01transporte css_rp01transporte_line" style="<?php echo $sStyleReadLab_rp01transporte; ?>"><?php echo $this->form_format_readonly("rp01transporte", $this->form_encode_input($this->rp01transporte)); ?></span><span id="id_read_off_rp01transporte" class="css_read_off_rp01transporte<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01transporte; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01transporte_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01transporte" type=text name="rp01transporte" value="<?php echo $this->form_encode_input($rp01transporte) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01transporte_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01transporte_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01recibeporc']))
    {
        $this->nm_new_label['rp01recibeporc'] = "Rp 0 1recibeporc";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01recibeporc = $this->rp01recibeporc;
   $sStyleHidden_rp01recibeporc = '';
   if (isset($this->nmgp_cmp_hidden['rp01recibeporc']) && $this->nmgp_cmp_hidden['rp01recibeporc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01recibeporc']);
       $sStyleHidden_rp01recibeporc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01recibeporc = 'display: none;';
   $sStyleReadInp_rp01recibeporc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01recibeporc']) && $this->nmgp_cmp_readonly['rp01recibeporc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01recibeporc']);
       $sStyleReadLab_rp01recibeporc = '';
       $sStyleReadInp_rp01recibeporc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01recibeporc']) && $this->nmgp_cmp_hidden['rp01recibeporc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01recibeporc" value="<?php echo $this->form_encode_input($rp01recibeporc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01recibeporc_label" id="hidden_field_label_rp01recibeporc" style="<?php echo $sStyleHidden_rp01recibeporc; ?>"><span id="id_label_rp01recibeporc"><?php echo $this->nm_new_label['rp01recibeporc']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01recibeporc_line" id="hidden_field_data_rp01recibeporc" style="<?php echo $sStyleHidden_rp01recibeporc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01recibeporc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01recibeporc"]) &&  $this->nmgp_cmp_readonly["rp01recibeporc"] == "on") { 

 ?>
<input type="hidden" name="rp01recibeporc" value="<?php echo $this->form_encode_input($rp01recibeporc) . "\">" . $rp01recibeporc . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01recibeporc" class="sc-ui-readonly-rp01recibeporc css_rp01recibeporc_line" style="<?php echo $sStyleReadLab_rp01recibeporc; ?>"><?php echo $this->form_format_readonly("rp01recibeporc", $this->form_encode_input($this->rp01recibeporc)); ?></span><span id="id_read_off_rp01recibeporc" class="css_read_off_rp01recibeporc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01recibeporc; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01recibeporc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01recibeporc" type=text name="rp01recibeporc" value="<?php echo $this->form_encode_input($rp01recibeporc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01recibeporc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01recibeporc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sueldoanterior']))
    {
        $this->nm_new_label['rp01sueldoanterior'] = "Rp 0 1sueldoanterior";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sueldoanterior = $this->rp01sueldoanterior;
   $sStyleHidden_rp01sueldoanterior = '';
   if (isset($this->nmgp_cmp_hidden['rp01sueldoanterior']) && $this->nmgp_cmp_hidden['rp01sueldoanterior'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sueldoanterior']);
       $sStyleHidden_rp01sueldoanterior = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sueldoanterior = 'display: none;';
   $sStyleReadInp_rp01sueldoanterior = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sueldoanterior']) && $this->nmgp_cmp_readonly['rp01sueldoanterior'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sueldoanterior']);
       $sStyleReadLab_rp01sueldoanterior = '';
       $sStyleReadInp_rp01sueldoanterior = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sueldoanterior']) && $this->nmgp_cmp_hidden['rp01sueldoanterior'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sueldoanterior" value="<?php echo $this->form_encode_input($rp01sueldoanterior) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sueldoanterior_label" id="hidden_field_label_rp01sueldoanterior" style="<?php echo $sStyleHidden_rp01sueldoanterior; ?>"><span id="id_label_rp01sueldoanterior"><?php echo $this->nm_new_label['rp01sueldoanterior']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sueldoanterior_line" id="hidden_field_data_rp01sueldoanterior" style="<?php echo $sStyleHidden_rp01sueldoanterior; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sueldoanterior_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sueldoanterior"]) &&  $this->nmgp_cmp_readonly["rp01sueldoanterior"] == "on") { 

 ?>
<input type="hidden" name="rp01sueldoanterior" value="<?php echo $this->form_encode_input($rp01sueldoanterior) . "\">" . $rp01sueldoanterior . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sueldoanterior" class="sc-ui-readonly-rp01sueldoanterior css_rp01sueldoanterior_line" style="<?php echo $sStyleReadLab_rp01sueldoanterior; ?>"><?php echo $this->form_format_readonly("rp01sueldoanterior", $this->form_encode_input($this->rp01sueldoanterior)); ?></span><span id="id_read_off_rp01sueldoanterior" class="css_read_off_rp01sueldoanterior<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sueldoanterior; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sueldoanterior_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sueldoanterior" type=text name="rp01sueldoanterior" value="<?php echo $this->form_encode_input($rp01sueldoanterior) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sueldoanterior']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sueldoanterior']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sueldoanterior']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sueldoanterior']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sueldoanterior_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sueldoanterior_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sueldosalario']))
    {
        $this->nm_new_label['rp01sueldosalario'] = "Rp 0 1sueldosalario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sueldosalario = $this->rp01sueldosalario;
   $sStyleHidden_rp01sueldosalario = '';
   if (isset($this->nmgp_cmp_hidden['rp01sueldosalario']) && $this->nmgp_cmp_hidden['rp01sueldosalario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sueldosalario']);
       $sStyleHidden_rp01sueldosalario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sueldosalario = 'display: none;';
   $sStyleReadInp_rp01sueldosalario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sueldosalario']) && $this->nmgp_cmp_readonly['rp01sueldosalario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sueldosalario']);
       $sStyleReadLab_rp01sueldosalario = '';
       $sStyleReadInp_rp01sueldosalario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sueldosalario']) && $this->nmgp_cmp_hidden['rp01sueldosalario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sueldosalario" value="<?php echo $this->form_encode_input($rp01sueldosalario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sueldosalario_label" id="hidden_field_label_rp01sueldosalario" style="<?php echo $sStyleHidden_rp01sueldosalario; ?>"><span id="id_label_rp01sueldosalario"><?php echo $this->nm_new_label['rp01sueldosalario']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sueldosalario_line" id="hidden_field_data_rp01sueldosalario" style="<?php echo $sStyleHidden_rp01sueldosalario; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sueldosalario_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sueldosalario"]) &&  $this->nmgp_cmp_readonly["rp01sueldosalario"] == "on") { 

 ?>
<input type="hidden" name="rp01sueldosalario" value="<?php echo $this->form_encode_input($rp01sueldosalario) . "\">" . $rp01sueldosalario . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sueldosalario" class="sc-ui-readonly-rp01sueldosalario css_rp01sueldosalario_line" style="<?php echo $sStyleReadLab_rp01sueldosalario; ?>"><?php echo $this->form_format_readonly("rp01sueldosalario", $this->form_encode_input($this->rp01sueldosalario)); ?></span><span id="id_read_off_rp01sueldosalario" class="css_read_off_rp01sueldosalario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sueldosalario; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sueldosalario_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sueldosalario" type=text name="rp01sueldosalario" value="<?php echo $this->form_encode_input($rp01sueldosalario) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sueldosalario']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sueldosalario']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sueldosalario']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sueldosalario']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sueldosalario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sueldosalario_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fecmodsdosal']))
    {
        $this->nm_new_label['rp01fecmodsdosal'] = "Rp 0 1fecmodsdosal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fecmodsdosal = $this->rp01fecmodsdosal;
   $sStyleHidden_rp01fecmodsdosal = '';
   if (isset($this->nmgp_cmp_hidden['rp01fecmodsdosal']) && $this->nmgp_cmp_hidden['rp01fecmodsdosal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fecmodsdosal']);
       $sStyleHidden_rp01fecmodsdosal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fecmodsdosal = 'display: none;';
   $sStyleReadInp_rp01fecmodsdosal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fecmodsdosal']) && $this->nmgp_cmp_readonly['rp01fecmodsdosal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fecmodsdosal']);
       $sStyleReadLab_rp01fecmodsdosal = '';
       $sStyleReadInp_rp01fecmodsdosal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fecmodsdosal']) && $this->nmgp_cmp_hidden['rp01fecmodsdosal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fecmodsdosal" value="<?php echo $this->form_encode_input($rp01fecmodsdosal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fecmodsdosal_label" id="hidden_field_label_rp01fecmodsdosal" style="<?php echo $sStyleHidden_rp01fecmodsdosal; ?>"><span id="id_label_rp01fecmodsdosal"><?php echo $this->nm_new_label['rp01fecmodsdosal']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fecmodsdosal_line" id="hidden_field_data_rp01fecmodsdosal" style="<?php echo $sStyleHidden_rp01fecmodsdosal; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fecmodsdosal_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fecmodsdosal"]) &&  $this->nmgp_cmp_readonly["rp01fecmodsdosal"] == "on") { 

 ?>
<input type="hidden" name="rp01fecmodsdosal" value="<?php echo $this->form_encode_input($rp01fecmodsdosal) . "\">" . $rp01fecmodsdosal . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fecmodsdosal" class="sc-ui-readonly-rp01fecmodsdosal css_rp01fecmodsdosal_line" style="<?php echo $sStyleReadLab_rp01fecmodsdosal; ?>"><?php echo $this->form_format_readonly("rp01fecmodsdosal", $this->form_encode_input($rp01fecmodsdosal)); ?></span><span id="id_read_off_rp01fecmodsdosal" class="css_read_off_rp01fecmodsdosal<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fecmodsdosal; ?>"><?php
$tmp_form_data = $this->field_config['rp01fecmodsdosal']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fecmodsdosal_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fecmodsdosal" type=text name="rp01fecmodsdosal" value="<?php echo $this->form_encode_input($rp01fecmodsdosal) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fecmodsdosal']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fecmodsdosal']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fecmodsdosal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fecmodsdosal_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fecmodficha']))
    {
        $this->nm_new_label['rp01fecmodficha'] = "Rp 0 1fecmodficha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01fecmodficha = $this->rp01fecmodficha;
   $sStyleHidden_rp01fecmodficha = '';
   if (isset($this->nmgp_cmp_hidden['rp01fecmodficha']) && $this->nmgp_cmp_hidden['rp01fecmodficha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fecmodficha']);
       $sStyleHidden_rp01fecmodficha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fecmodficha = 'display: none;';
   $sStyleReadInp_rp01fecmodficha = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fecmodficha']) && $this->nmgp_cmp_readonly['rp01fecmodficha'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fecmodficha']);
       $sStyleReadLab_rp01fecmodficha = '';
       $sStyleReadInp_rp01fecmodficha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fecmodficha']) && $this->nmgp_cmp_hidden['rp01fecmodficha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fecmodficha" value="<?php echo $this->form_encode_input($rp01fecmodficha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fecmodficha_label" id="hidden_field_label_rp01fecmodficha" style="<?php echo $sStyleHidden_rp01fecmodficha; ?>"><span id="id_label_rp01fecmodficha"><?php echo $this->nm_new_label['rp01fecmodficha']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fecmodficha_line" id="hidden_field_data_rp01fecmodficha" style="<?php echo $sStyleHidden_rp01fecmodficha; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fecmodficha_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fecmodficha"]) &&  $this->nmgp_cmp_readonly["rp01fecmodficha"] == "on") { 

 ?>
<input type="hidden" name="rp01fecmodficha" value="<?php echo $this->form_encode_input($rp01fecmodficha) . "\">" . $rp01fecmodficha . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fecmodficha" class="sc-ui-readonly-rp01fecmodficha css_rp01fecmodficha_line" style="<?php echo $sStyleReadLab_rp01fecmodficha; ?>"><?php echo $this->form_format_readonly("rp01fecmodficha", $this->form_encode_input($rp01fecmodficha)); ?></span><span id="id_read_off_rp01fecmodficha" class="css_read_off_rp01fecmodficha<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fecmodficha; ?>"><?php
$tmp_form_data = $this->field_config['rp01fecmodficha']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fecmodficha_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fecmodficha" type=text name="rp01fecmodficha" value="<?php echo $this->form_encode_input($rp01fecmodficha) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['rp01fecmodficha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fecmodficha']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fecmodficha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fecmodficha_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01faltasinjust']))
    {
        $this->nm_new_label['rp01faltasinjust'] = "Rp 0 1faltasinjust";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01faltasinjust = $this->rp01faltasinjust;
   $sStyleHidden_rp01faltasinjust = '';
   if (isset($this->nmgp_cmp_hidden['rp01faltasinjust']) && $this->nmgp_cmp_hidden['rp01faltasinjust'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01faltasinjust']);
       $sStyleHidden_rp01faltasinjust = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01faltasinjust = 'display: none;';
   $sStyleReadInp_rp01faltasinjust = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01faltasinjust']) && $this->nmgp_cmp_readonly['rp01faltasinjust'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01faltasinjust']);
       $sStyleReadLab_rp01faltasinjust = '';
       $sStyleReadInp_rp01faltasinjust = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01faltasinjust']) && $this->nmgp_cmp_hidden['rp01faltasinjust'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01faltasinjust" value="<?php echo $this->form_encode_input($rp01faltasinjust) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01faltasinjust_label" id="hidden_field_label_rp01faltasinjust" style="<?php echo $sStyleHidden_rp01faltasinjust; ?>"><span id="id_label_rp01faltasinjust"><?php echo $this->nm_new_label['rp01faltasinjust']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01faltasinjust_line" id="hidden_field_data_rp01faltasinjust" style="<?php echo $sStyleHidden_rp01faltasinjust; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01faltasinjust_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01faltasinjust"]) &&  $this->nmgp_cmp_readonly["rp01faltasinjust"] == "on") { 

 ?>
<input type="hidden" name="rp01faltasinjust" value="<?php echo $this->form_encode_input($rp01faltasinjust) . "\">" . $rp01faltasinjust . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01faltasinjust" class="sc-ui-readonly-rp01faltasinjust css_rp01faltasinjust_line" style="<?php echo $sStyleReadLab_rp01faltasinjust; ?>"><?php echo $this->form_format_readonly("rp01faltasinjust", $this->form_encode_input($this->rp01faltasinjust)); ?></span><span id="id_read_off_rp01faltasinjust" class="css_read_off_rp01faltasinjust<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01faltasinjust; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01faltasinjust_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01faltasinjust" type=text name="rp01faltasinjust" value="<?php echo $this->form_encode_input($rp01faltasinjust) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=7"; } ?> alt="{datatype: 'decimal', maxLength: 7, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01faltasinjust']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01faltasinjust']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01faltasinjust']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01faltasinjust']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01faltasinjust_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01faltasinjust_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01ingresos1er']))
    {
        $this->nm_new_label['rp01ingresos1er'] = "Rp 0 1ingresos 1er";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01ingresos1er = $this->rp01ingresos1er;
   $sStyleHidden_rp01ingresos1er = '';
   if (isset($this->nmgp_cmp_hidden['rp01ingresos1er']) && $this->nmgp_cmp_hidden['rp01ingresos1er'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01ingresos1er']);
       $sStyleHidden_rp01ingresos1er = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01ingresos1er = 'display: none;';
   $sStyleReadInp_rp01ingresos1er = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01ingresos1er']) && $this->nmgp_cmp_readonly['rp01ingresos1er'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01ingresos1er']);
       $sStyleReadLab_rp01ingresos1er = '';
       $sStyleReadInp_rp01ingresos1er = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01ingresos1er']) && $this->nmgp_cmp_hidden['rp01ingresos1er'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01ingresos1er" value="<?php echo $this->form_encode_input($rp01ingresos1er) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01ingresos1er_label" id="hidden_field_label_rp01ingresos1er" style="<?php echo $sStyleHidden_rp01ingresos1er; ?>"><span id="id_label_rp01ingresos1er"><?php echo $this->nm_new_label['rp01ingresos1er']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01ingresos1er_line" id="hidden_field_data_rp01ingresos1er" style="<?php echo $sStyleHidden_rp01ingresos1er; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01ingresos1er_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01ingresos1er"]) &&  $this->nmgp_cmp_readonly["rp01ingresos1er"] == "on") { 

 ?>
<input type="hidden" name="rp01ingresos1er" value="<?php echo $this->form_encode_input($rp01ingresos1er) . "\">" . $rp01ingresos1er . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01ingresos1er" class="sc-ui-readonly-rp01ingresos1er css_rp01ingresos1er_line" style="<?php echo $sStyleReadLab_rp01ingresos1er; ?>"><?php echo $this->form_format_readonly("rp01ingresos1er", $this->form_encode_input($this->rp01ingresos1er)); ?></span><span id="id_read_off_rp01ingresos1er" class="css_read_off_rp01ingresos1er<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01ingresos1er; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01ingresos1er_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01ingresos1er" type=text name="rp01ingresos1er" value="<?php echo $this->form_encode_input($rp01ingresos1er) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01ingresos1er']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01ingresos1er']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01ingresos1er']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01ingresos1er']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01ingresos1er_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01ingresos1er_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01basesocialvalor']))
    {
        $this->nm_new_label['rp01basesocialvalor'] = "Rp 0 1basesocialvalor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01basesocialvalor = $this->rp01basesocialvalor;
   $sStyleHidden_rp01basesocialvalor = '';
   if (isset($this->nmgp_cmp_hidden['rp01basesocialvalor']) && $this->nmgp_cmp_hidden['rp01basesocialvalor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01basesocialvalor']);
       $sStyleHidden_rp01basesocialvalor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01basesocialvalor = 'display: none;';
   $sStyleReadInp_rp01basesocialvalor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01basesocialvalor']) && $this->nmgp_cmp_readonly['rp01basesocialvalor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01basesocialvalor']);
       $sStyleReadLab_rp01basesocialvalor = '';
       $sStyleReadInp_rp01basesocialvalor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01basesocialvalor']) && $this->nmgp_cmp_hidden['rp01basesocialvalor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01basesocialvalor" value="<?php echo $this->form_encode_input($rp01basesocialvalor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01basesocialvalor_label" id="hidden_field_label_rp01basesocialvalor" style="<?php echo $sStyleHidden_rp01basesocialvalor; ?>"><span id="id_label_rp01basesocialvalor"><?php echo $this->nm_new_label['rp01basesocialvalor']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01basesocialvalor_line" id="hidden_field_data_rp01basesocialvalor" style="<?php echo $sStyleHidden_rp01basesocialvalor; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01basesocialvalor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01basesocialvalor"]) &&  $this->nmgp_cmp_readonly["rp01basesocialvalor"] == "on") { 

 ?>
<input type="hidden" name="rp01basesocialvalor" value="<?php echo $this->form_encode_input($rp01basesocialvalor) . "\">" . $rp01basesocialvalor . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01basesocialvalor" class="sc-ui-readonly-rp01basesocialvalor css_rp01basesocialvalor_line" style="<?php echo $sStyleReadLab_rp01basesocialvalor; ?>"><?php echo $this->form_format_readonly("rp01basesocialvalor", $this->form_encode_input($this->rp01basesocialvalor)); ?></span><span id="id_read_off_rp01basesocialvalor" class="css_read_off_rp01basesocialvalor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01basesocialvalor; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01basesocialvalor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01basesocialvalor" type=text name="rp01basesocialvalor" value="<?php echo $this->form_encode_input($rp01basesocialvalor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01basesocialvalor']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01basesocialvalor']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01basesocialvalor']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01basesocialvalor']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01basesocialvalor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01basesocialvalor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01basesocialtiempo']))
    {
        $this->nm_new_label['rp01basesocialtiempo'] = "Rp 0 1basesocialtiempo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01basesocialtiempo = $this->rp01basesocialtiempo;
   $sStyleHidden_rp01basesocialtiempo = '';
   if (isset($this->nmgp_cmp_hidden['rp01basesocialtiempo']) && $this->nmgp_cmp_hidden['rp01basesocialtiempo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01basesocialtiempo']);
       $sStyleHidden_rp01basesocialtiempo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01basesocialtiempo = 'display: none;';
   $sStyleReadInp_rp01basesocialtiempo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01basesocialtiempo']) && $this->nmgp_cmp_readonly['rp01basesocialtiempo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01basesocialtiempo']);
       $sStyleReadLab_rp01basesocialtiempo = '';
       $sStyleReadInp_rp01basesocialtiempo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01basesocialtiempo']) && $this->nmgp_cmp_hidden['rp01basesocialtiempo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01basesocialtiempo" value="<?php echo $this->form_encode_input($rp01basesocialtiempo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01basesocialtiempo_label" id="hidden_field_label_rp01basesocialtiempo" style="<?php echo $sStyleHidden_rp01basesocialtiempo; ?>"><span id="id_label_rp01basesocialtiempo"><?php echo $this->nm_new_label['rp01basesocialtiempo']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01basesocialtiempo_line" id="hidden_field_data_rp01basesocialtiempo" style="<?php echo $sStyleHidden_rp01basesocialtiempo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01basesocialtiempo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01basesocialtiempo"]) &&  $this->nmgp_cmp_readonly["rp01basesocialtiempo"] == "on") { 

 ?>
<input type="hidden" name="rp01basesocialtiempo" value="<?php echo $this->form_encode_input($rp01basesocialtiempo) . "\">" . $rp01basesocialtiempo . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01basesocialtiempo" class="sc-ui-readonly-rp01basesocialtiempo css_rp01basesocialtiempo_line" style="<?php echo $sStyleReadLab_rp01basesocialtiempo; ?>"><?php echo $this->form_format_readonly("rp01basesocialtiempo", $this->form_encode_input($this->rp01basesocialtiempo)); ?></span><span id="id_read_off_rp01basesocialtiempo" class="css_read_off_rp01basesocialtiempo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01basesocialtiempo; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01basesocialtiempo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01basesocialtiempo" type=text name="rp01basesocialtiempo" value="<?php echo $this->form_encode_input($rp01basesocialtiempo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=7"; } ?> alt="{datatype: 'decimal', maxLength: 7, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01basesocialtiempo']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01basesocialtiempo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01basesocialtiempo']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01basesocialtiempo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01basesocialtiempo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01basesocialtiempo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp0114vopagoacum']))
    {
        $this->nm_new_label['rp0114vopagoacum'] = "Rp 011 4vopagoacum";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp0114vopagoacum = $this->rp0114vopagoacum;
   $sStyleHidden_rp0114vopagoacum = '';
   if (isset($this->nmgp_cmp_hidden['rp0114vopagoacum']) && $this->nmgp_cmp_hidden['rp0114vopagoacum'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp0114vopagoacum']);
       $sStyleHidden_rp0114vopagoacum = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp0114vopagoacum = 'display: none;';
   $sStyleReadInp_rp0114vopagoacum = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp0114vopagoacum']) && $this->nmgp_cmp_readonly['rp0114vopagoacum'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp0114vopagoacum']);
       $sStyleReadLab_rp0114vopagoacum = '';
       $sStyleReadInp_rp0114vopagoacum = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp0114vopagoacum']) && $this->nmgp_cmp_hidden['rp0114vopagoacum'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp0114vopagoacum" value="<?php echo $this->form_encode_input($rp0114vopagoacum) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp0114vopagoacum_label" id="hidden_field_label_rp0114vopagoacum" style="<?php echo $sStyleHidden_rp0114vopagoacum; ?>"><span id="id_label_rp0114vopagoacum"><?php echo $this->nm_new_label['rp0114vopagoacum']; ?></span></TD>
    <TD class="scFormDataOdd css_rp0114vopagoacum_line" id="hidden_field_data_rp0114vopagoacum" style="<?php echo $sStyleHidden_rp0114vopagoacum; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp0114vopagoacum_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp0114vopagoacum"]) &&  $this->nmgp_cmp_readonly["rp0114vopagoacum"] == "on") { 

 ?>
<input type="hidden" name="rp0114vopagoacum" value="<?php echo $this->form_encode_input($rp0114vopagoacum) . "\">" . $rp0114vopagoacum . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp0114vopagoacum" class="sc-ui-readonly-rp0114vopagoacum css_rp0114vopagoacum_line" style="<?php echo $sStyleReadLab_rp0114vopagoacum; ?>"><?php echo $this->form_format_readonly("rp0114vopagoacum", $this->form_encode_input($this->rp0114vopagoacum)); ?></span><span id="id_read_off_rp0114vopagoacum" class="css_read_off_rp0114vopagoacum<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp0114vopagoacum; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp0114vopagoacum_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp0114vopagoacum" type=text name="rp0114vopagoacum" value="<?php echo $this->form_encode_input($rp0114vopagoacum) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rp0114vopagoacum']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp0114vopagoacum']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp0114vopagoacum']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp0114vopagoacum']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp0114vopagoacum_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp0114vopagoacum_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp0115vopagoacum']))
    {
        $this->nm_new_label['rp0115vopagoacum'] = "Rp 011 5vopagoacum";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp0115vopagoacum = $this->rp0115vopagoacum;
   $sStyleHidden_rp0115vopagoacum = '';
   if (isset($this->nmgp_cmp_hidden['rp0115vopagoacum']) && $this->nmgp_cmp_hidden['rp0115vopagoacum'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp0115vopagoacum']);
       $sStyleHidden_rp0115vopagoacum = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp0115vopagoacum = 'display: none;';
   $sStyleReadInp_rp0115vopagoacum = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp0115vopagoacum']) && $this->nmgp_cmp_readonly['rp0115vopagoacum'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp0115vopagoacum']);
       $sStyleReadLab_rp0115vopagoacum = '';
       $sStyleReadInp_rp0115vopagoacum = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp0115vopagoacum']) && $this->nmgp_cmp_hidden['rp0115vopagoacum'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp0115vopagoacum" value="<?php echo $this->form_encode_input($rp0115vopagoacum) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp0115vopagoacum_label" id="hidden_field_label_rp0115vopagoacum" style="<?php echo $sStyleHidden_rp0115vopagoacum; ?>"><span id="id_label_rp0115vopagoacum"><?php echo $this->nm_new_label['rp0115vopagoacum']; ?></span></TD>
    <TD class="scFormDataOdd css_rp0115vopagoacum_line" id="hidden_field_data_rp0115vopagoacum" style="<?php echo $sStyleHidden_rp0115vopagoacum; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp0115vopagoacum_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp0115vopagoacum"]) &&  $this->nmgp_cmp_readonly["rp0115vopagoacum"] == "on") { 

 ?>
<input type="hidden" name="rp0115vopagoacum" value="<?php echo $this->form_encode_input($rp0115vopagoacum) . "\">" . $rp0115vopagoacum . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp0115vopagoacum" class="sc-ui-readonly-rp0115vopagoacum css_rp0115vopagoacum_line" style="<?php echo $sStyleReadLab_rp0115vopagoacum; ?>"><?php echo $this->form_format_readonly("rp0115vopagoacum", $this->form_encode_input($this->rp0115vopagoacum)); ?></span><span id="id_read_off_rp0115vopagoacum" class="css_read_off_rp0115vopagoacum<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp0115vopagoacum; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp0115vopagoacum_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp0115vopagoacum" type=text name="rp0115vopagoacum" value="<?php echo $this->form_encode_input($rp0115vopagoacum) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rp0115vopagoacum']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp0115vopagoacum']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp0115vopagoacum']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp0115vopagoacum']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp0115vopagoacum_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp0115vopagoacum_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01cverrorliq']))
    {
        $this->nm_new_label['rp01cverrorliq'] = "Rp 0 1cverrorliq";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01cverrorliq = $this->rp01cverrorliq;
   $sStyleHidden_rp01cverrorliq = '';
   if (isset($this->nmgp_cmp_hidden['rp01cverrorliq']) && $this->nmgp_cmp_hidden['rp01cverrorliq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01cverrorliq']);
       $sStyleHidden_rp01cverrorliq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01cverrorliq = 'display: none;';
   $sStyleReadInp_rp01cverrorliq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01cverrorliq']) && $this->nmgp_cmp_readonly['rp01cverrorliq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01cverrorliq']);
       $sStyleReadLab_rp01cverrorliq = '';
       $sStyleReadInp_rp01cverrorliq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01cverrorliq']) && $this->nmgp_cmp_hidden['rp01cverrorliq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01cverrorliq" value="<?php echo $this->form_encode_input($rp01cverrorliq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01cverrorliq_label" id="hidden_field_label_rp01cverrorliq" style="<?php echo $sStyleHidden_rp01cverrorliq; ?>"><span id="id_label_rp01cverrorliq"><?php echo $this->nm_new_label['rp01cverrorliq']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01cverrorliq_line" id="hidden_field_data_rp01cverrorliq" style="<?php echo $sStyleHidden_rp01cverrorliq; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01cverrorliq_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01cverrorliq"]) &&  $this->nmgp_cmp_readonly["rp01cverrorliq"] == "on") { 

 ?>
<input type="hidden" name="rp01cverrorliq" value="<?php echo $this->form_encode_input($rp01cverrorliq) . "\">" . $rp01cverrorliq . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01cverrorliq" class="sc-ui-readonly-rp01cverrorliq css_rp01cverrorliq_line" style="<?php echo $sStyleReadLab_rp01cverrorliq; ?>"><?php echo $this->form_format_readonly("rp01cverrorliq", $this->form_encode_input($this->rp01cverrorliq)); ?></span><span id="id_read_off_rp01cverrorliq" class="css_read_off_rp01cverrorliq<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01cverrorliq; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01cverrorliq_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01cverrorliq" type=text name="rp01cverrorliq" value="<?php echo $this->form_encode_input($rp01cverrorliq) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01cverrorliq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01cverrorliq_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01porcentliq']))
    {
        $this->nm_new_label['rp01porcentliq'] = "Rp 0 1porcentliq";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01porcentliq = $this->rp01porcentliq;
   $sStyleHidden_rp01porcentliq = '';
   if (isset($this->nmgp_cmp_hidden['rp01porcentliq']) && $this->nmgp_cmp_hidden['rp01porcentliq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01porcentliq']);
       $sStyleHidden_rp01porcentliq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01porcentliq = 'display: none;';
   $sStyleReadInp_rp01porcentliq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01porcentliq']) && $this->nmgp_cmp_readonly['rp01porcentliq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01porcentliq']);
       $sStyleReadLab_rp01porcentliq = '';
       $sStyleReadInp_rp01porcentliq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01porcentliq']) && $this->nmgp_cmp_hidden['rp01porcentliq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01porcentliq" value="<?php echo $this->form_encode_input($rp01porcentliq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01porcentliq_label" id="hidden_field_label_rp01porcentliq" style="<?php echo $sStyleHidden_rp01porcentliq; ?>"><span id="id_label_rp01porcentliq"><?php echo $this->nm_new_label['rp01porcentliq']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01porcentliq_line" id="hidden_field_data_rp01porcentliq" style="<?php echo $sStyleHidden_rp01porcentliq; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01porcentliq_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01porcentliq"]) &&  $this->nmgp_cmp_readonly["rp01porcentliq"] == "on") { 

 ?>
<input type="hidden" name="rp01porcentliq" value="<?php echo $this->form_encode_input($rp01porcentliq) . "\">" . $rp01porcentliq . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01porcentliq" class="sc-ui-readonly-rp01porcentliq css_rp01porcentliq_line" style="<?php echo $sStyleReadLab_rp01porcentliq; ?>"><?php echo $this->form_format_readonly("rp01porcentliq", $this->form_encode_input($this->rp01porcentliq)); ?></span><span id="id_read_off_rp01porcentliq" class="css_read_off_rp01porcentliq<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01porcentliq; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01porcentliq_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01porcentliq" type=text name="rp01porcentliq" value="<?php echo $this->form_encode_input($rp01porcentliq) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01porcentliq']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01porcentliq']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01porcentliq']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01porcentliq']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01porcentliq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01porcentliq_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01tiposangre']))
    {
        $this->nm_new_label['rp01tiposangre'] = "Rp 0 1tiposangre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01tiposangre = $this->rp01tiposangre;
   $sStyleHidden_rp01tiposangre = '';
   if (isset($this->nmgp_cmp_hidden['rp01tiposangre']) && $this->nmgp_cmp_hidden['rp01tiposangre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01tiposangre']);
       $sStyleHidden_rp01tiposangre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01tiposangre = 'display: none;';
   $sStyleReadInp_rp01tiposangre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01tiposangre']) && $this->nmgp_cmp_readonly['rp01tiposangre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01tiposangre']);
       $sStyleReadLab_rp01tiposangre = '';
       $sStyleReadInp_rp01tiposangre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01tiposangre']) && $this->nmgp_cmp_hidden['rp01tiposangre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01tiposangre" value="<?php echo $this->form_encode_input($rp01tiposangre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01tiposangre_label" id="hidden_field_label_rp01tiposangre" style="<?php echo $sStyleHidden_rp01tiposangre; ?>"><span id="id_label_rp01tiposangre"><?php echo $this->nm_new_label['rp01tiposangre']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01tiposangre_line" id="hidden_field_data_rp01tiposangre" style="<?php echo $sStyleHidden_rp01tiposangre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01tiposangre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01tiposangre"]) &&  $this->nmgp_cmp_readonly["rp01tiposangre"] == "on") { 

 ?>
<input type="hidden" name="rp01tiposangre" value="<?php echo $this->form_encode_input($rp01tiposangre) . "\">" . $rp01tiposangre . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01tiposangre" class="sc-ui-readonly-rp01tiposangre css_rp01tiposangre_line" style="<?php echo $sStyleReadLab_rp01tiposangre; ?>"><?php echo $this->form_format_readonly("rp01tiposangre", $this->form_encode_input($this->rp01tiposangre)); ?></span><span id="id_read_off_rp01tiposangre" class="css_read_off_rp01tiposangre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01tiposangre; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01tiposangre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01tiposangre" type=text name="rp01tiposangre" value="<?php echo $this->form_encode_input($rp01tiposangre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01tiposangre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01tiposangre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01ingresos2do']))
    {
        $this->nm_new_label['rp01ingresos2do'] = "Rp 0 1ingresos 2do";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01ingresos2do = $this->rp01ingresos2do;
   $sStyleHidden_rp01ingresos2do = '';
   if (isset($this->nmgp_cmp_hidden['rp01ingresos2do']) && $this->nmgp_cmp_hidden['rp01ingresos2do'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01ingresos2do']);
       $sStyleHidden_rp01ingresos2do = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01ingresos2do = 'display: none;';
   $sStyleReadInp_rp01ingresos2do = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01ingresos2do']) && $this->nmgp_cmp_readonly['rp01ingresos2do'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01ingresos2do']);
       $sStyleReadLab_rp01ingresos2do = '';
       $sStyleReadInp_rp01ingresos2do = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01ingresos2do']) && $this->nmgp_cmp_hidden['rp01ingresos2do'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01ingresos2do" value="<?php echo $this->form_encode_input($rp01ingresos2do) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01ingresos2do_label" id="hidden_field_label_rp01ingresos2do" style="<?php echo $sStyleHidden_rp01ingresos2do; ?>"><span id="id_label_rp01ingresos2do"><?php echo $this->nm_new_label['rp01ingresos2do']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01ingresos2do_line" id="hidden_field_data_rp01ingresos2do" style="<?php echo $sStyleHidden_rp01ingresos2do; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01ingresos2do_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01ingresos2do"]) &&  $this->nmgp_cmp_readonly["rp01ingresos2do"] == "on") { 

 ?>
<input type="hidden" name="rp01ingresos2do" value="<?php echo $this->form_encode_input($rp01ingresos2do) . "\">" . $rp01ingresos2do . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01ingresos2do" class="sc-ui-readonly-rp01ingresos2do css_rp01ingresos2do_line" style="<?php echo $sStyleReadLab_rp01ingresos2do; ?>"><?php echo $this->form_format_readonly("rp01ingresos2do", $this->form_encode_input($this->rp01ingresos2do)); ?></span><span id="id_read_off_rp01ingresos2do" class="css_read_off_rp01ingresos2do<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01ingresos2do; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01ingresos2do_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01ingresos2do" type=text name="rp01ingresos2do" value="<?php echo $this->form_encode_input($rp01ingresos2do) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01ingresos2do']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01ingresos2do']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01ingresos2do']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01ingresos2do']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01ingresos2do_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01ingresos2do_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01provdiremp']))
    {
        $this->nm_new_label['rp01provdiremp'] = "Rp 0 1provdiremp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01provdiremp = $this->rp01provdiremp;
   $sStyleHidden_rp01provdiremp = '';
   if (isset($this->nmgp_cmp_hidden['rp01provdiremp']) && $this->nmgp_cmp_hidden['rp01provdiremp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01provdiremp']);
       $sStyleHidden_rp01provdiremp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01provdiremp = 'display: none;';
   $sStyleReadInp_rp01provdiremp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01provdiremp']) && $this->nmgp_cmp_readonly['rp01provdiremp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01provdiremp']);
       $sStyleReadLab_rp01provdiremp = '';
       $sStyleReadInp_rp01provdiremp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01provdiremp']) && $this->nmgp_cmp_hidden['rp01provdiremp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01provdiremp" value="<?php echo $this->form_encode_input($rp01provdiremp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01provdiremp_label" id="hidden_field_label_rp01provdiremp" style="<?php echo $sStyleHidden_rp01provdiremp; ?>"><span id="id_label_rp01provdiremp"><?php echo $this->nm_new_label['rp01provdiremp']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01provdiremp_line" id="hidden_field_data_rp01provdiremp" style="<?php echo $sStyleHidden_rp01provdiremp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01provdiremp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01provdiremp"]) &&  $this->nmgp_cmp_readonly["rp01provdiremp"] == "on") { 

 ?>
<input type="hidden" name="rp01provdiremp" value="<?php echo $this->form_encode_input($rp01provdiremp) . "\">" . $rp01provdiremp . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01provdiremp" class="sc-ui-readonly-rp01provdiremp css_rp01provdiremp_line" style="<?php echo $sStyleReadLab_rp01provdiremp; ?>"><?php echo $this->form_format_readonly("rp01provdiremp", $this->form_encode_input($this->rp01provdiremp)); ?></span><span id="id_read_off_rp01provdiremp" class="css_read_off_rp01provdiremp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01provdiremp; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01provdiremp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01provdiremp" type=text name="rp01provdiremp" value="<?php echo $this->form_encode_input($rp01provdiremp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01provdiremp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01provdiremp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01cantondiremp']))
    {
        $this->nm_new_label['rp01cantondiremp'] = "Rp 0 1cantondiremp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01cantondiremp = $this->rp01cantondiremp;
   $sStyleHidden_rp01cantondiremp = '';
   if (isset($this->nmgp_cmp_hidden['rp01cantondiremp']) && $this->nmgp_cmp_hidden['rp01cantondiremp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01cantondiremp']);
       $sStyleHidden_rp01cantondiremp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01cantondiremp = 'display: none;';
   $sStyleReadInp_rp01cantondiremp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01cantondiremp']) && $this->nmgp_cmp_readonly['rp01cantondiremp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01cantondiremp']);
       $sStyleReadLab_rp01cantondiremp = '';
       $sStyleReadInp_rp01cantondiremp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01cantondiremp']) && $this->nmgp_cmp_hidden['rp01cantondiremp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01cantondiremp" value="<?php echo $this->form_encode_input($rp01cantondiremp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01cantondiremp_label" id="hidden_field_label_rp01cantondiremp" style="<?php echo $sStyleHidden_rp01cantondiremp; ?>"><span id="id_label_rp01cantondiremp"><?php echo $this->nm_new_label['rp01cantondiremp']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01cantondiremp_line" id="hidden_field_data_rp01cantondiremp" style="<?php echo $sStyleHidden_rp01cantondiremp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01cantondiremp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01cantondiremp"]) &&  $this->nmgp_cmp_readonly["rp01cantondiremp"] == "on") { 

 ?>
<input type="hidden" name="rp01cantondiremp" value="<?php echo $this->form_encode_input($rp01cantondiremp) . "\">" . $rp01cantondiremp . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01cantondiremp" class="sc-ui-readonly-rp01cantondiremp css_rp01cantondiremp_line" style="<?php echo $sStyleReadLab_rp01cantondiremp; ?>"><?php echo $this->form_format_readonly("rp01cantondiremp", $this->form_encode_input($this->rp01cantondiremp)); ?></span><span id="id_read_off_rp01cantondiremp" class="css_read_off_rp01cantondiremp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01cantondiremp; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01cantondiremp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01cantondiremp" type=text name="rp01cantondiremp" value="<?php echo $this->form_encode_input($rp01cantondiremp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01cantondiremp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01cantondiremp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01ciudaddiremp']))
    {
        $this->nm_new_label['rp01ciudaddiremp'] = "Rp 0 1ciudaddiremp";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01ciudaddiremp = $this->rp01ciudaddiremp;
   $sStyleHidden_rp01ciudaddiremp = '';
   if (isset($this->nmgp_cmp_hidden['rp01ciudaddiremp']) && $this->nmgp_cmp_hidden['rp01ciudaddiremp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01ciudaddiremp']);
       $sStyleHidden_rp01ciudaddiremp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01ciudaddiremp = 'display: none;';
   $sStyleReadInp_rp01ciudaddiremp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01ciudaddiremp']) && $this->nmgp_cmp_readonly['rp01ciudaddiremp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01ciudaddiremp']);
       $sStyleReadLab_rp01ciudaddiremp = '';
       $sStyleReadInp_rp01ciudaddiremp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01ciudaddiremp']) && $this->nmgp_cmp_hidden['rp01ciudaddiremp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01ciudaddiremp" value="<?php echo $this->form_encode_input($rp01ciudaddiremp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01ciudaddiremp_label" id="hidden_field_label_rp01ciudaddiremp" style="<?php echo $sStyleHidden_rp01ciudaddiremp; ?>"><span id="id_label_rp01ciudaddiremp"><?php echo $this->nm_new_label['rp01ciudaddiremp']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01ciudaddiremp_line" id="hidden_field_data_rp01ciudaddiremp" style="<?php echo $sStyleHidden_rp01ciudaddiremp; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01ciudaddiremp_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01ciudaddiremp"]) &&  $this->nmgp_cmp_readonly["rp01ciudaddiremp"] == "on") { 

 ?>
<input type="hidden" name="rp01ciudaddiremp" value="<?php echo $this->form_encode_input($rp01ciudaddiremp) . "\">" . $rp01ciudaddiremp . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01ciudaddiremp" class="sc-ui-readonly-rp01ciudaddiremp css_rp01ciudaddiremp_line" style="<?php echo $sStyleReadLab_rp01ciudaddiremp; ?>"><?php echo $this->form_format_readonly("rp01ciudaddiremp", $this->form_encode_input($this->rp01ciudaddiremp)); ?></span><span id="id_read_off_rp01ciudaddiremp" class="css_read_off_rp01ciudaddiremp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01ciudaddiremp; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01ciudaddiremp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01ciudaddiremp" type=text name="rp01ciudaddiremp" value="<?php echo $this->form_encode_input($rp01ciudaddiremp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01ciudaddiremp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01ciudaddiremp_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01codocupacion']))
    {
        $this->nm_new_label['rp01codocupacion'] = "Rp 0 1codocupacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01codocupacion = $this->rp01codocupacion;
   $sStyleHidden_rp01codocupacion = '';
   if (isset($this->nmgp_cmp_hidden['rp01codocupacion']) && $this->nmgp_cmp_hidden['rp01codocupacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01codocupacion']);
       $sStyleHidden_rp01codocupacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01codocupacion = 'display: none;';
   $sStyleReadInp_rp01codocupacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01codocupacion']) && $this->nmgp_cmp_readonly['rp01codocupacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01codocupacion']);
       $sStyleReadLab_rp01codocupacion = '';
       $sStyleReadInp_rp01codocupacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01codocupacion']) && $this->nmgp_cmp_hidden['rp01codocupacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01codocupacion" value="<?php echo $this->form_encode_input($rp01codocupacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01codocupacion_label" id="hidden_field_label_rp01codocupacion" style="<?php echo $sStyleHidden_rp01codocupacion; ?>"><span id="id_label_rp01codocupacion"><?php echo $this->nm_new_label['rp01codocupacion']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01codocupacion_line" id="hidden_field_data_rp01codocupacion" style="<?php echo $sStyleHidden_rp01codocupacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01codocupacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01codocupacion"]) &&  $this->nmgp_cmp_readonly["rp01codocupacion"] == "on") { 

 ?>
<input type="hidden" name="rp01codocupacion" value="<?php echo $this->form_encode_input($rp01codocupacion) . "\">" . $rp01codocupacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01codocupacion" class="sc-ui-readonly-rp01codocupacion css_rp01codocupacion_line" style="<?php echo $sStyleReadLab_rp01codocupacion; ?>"><?php echo $this->form_format_readonly("rp01codocupacion", $this->form_encode_input($this->rp01codocupacion)); ?></span><span id="id_read_off_rp01codocupacion" class="css_read_off_rp01codocupacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01codocupacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01codocupacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01codocupacion" type=text name="rp01codocupacion" value="<?php echo $this->form_encode_input($rp01codocupacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01codocupacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01codocupacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['uid']))
    {
        $this->nm_new_label['uid'] = "UID";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $uid = $this->uid;
   $sStyleHidden_uid = '';
   if (isset($this->nmgp_cmp_hidden['uid']) && $this->nmgp_cmp_hidden['uid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['uid']);
       $sStyleHidden_uid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_uid = 'display: none;';
   $sStyleReadInp_uid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['uid']) && $this->nmgp_cmp_readonly['uid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['uid']);
       $sStyleReadLab_uid = '';
       $sStyleReadInp_uid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['uid']) && $this->nmgp_cmp_hidden['uid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="uid" value="<?php echo $this->form_encode_input($uid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_uid_label" id="hidden_field_label_uid" style="<?php echo $sStyleHidden_uid; ?>"><span id="id_label_uid"><?php echo $this->nm_new_label['uid']; ?></span></TD>
    <TD class="scFormDataOdd css_uid_line" id="hidden_field_data_uid" style="<?php echo $sStyleHidden_uid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_uid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["uid"]) &&  $this->nmgp_cmp_readonly["uid"] == "on") { 

 ?>
<input type="hidden" name="uid" value="<?php echo $this->form_encode_input($uid) . "\">" . $uid . ""; ?>
<?php } else { ?>
<span id="id_read_on_uid" class="sc-ui-readonly-uid css_uid_line" style="<?php echo $sStyleReadLab_uid; ?>"><?php echo $this->form_format_readonly("uid", $this->form_encode_input($this->uid)); ?></span><span id="id_read_off_uid" class="css_read_off_uid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_uid; ?>">
 <input class="sc-js-input scFormObjectOdd css_uid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_uid" type=text name="uid" value="<?php echo $this->form_encode_input($uid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['uid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['uid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['uid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_uid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_uid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['block']))
    {
        $this->nm_new_label['block'] = "Block";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $block = $this->block;
   $sStyleHidden_block = '';
   if (isset($this->nmgp_cmp_hidden['block']) && $this->nmgp_cmp_hidden['block'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['block']);
       $sStyleHidden_block = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_block = 'display: none;';
   $sStyleReadInp_block = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['block']) && $this->nmgp_cmp_readonly['block'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['block']);
       $sStyleReadLab_block = '';
       $sStyleReadInp_block = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['block']) && $this->nmgp_cmp_hidden['block'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="block" value="<?php echo $this->form_encode_input($block) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_block_label" id="hidden_field_label_block" style="<?php echo $sStyleHidden_block; ?>"><span id="id_label_block"><?php echo $this->nm_new_label['block']; ?></span></TD>
    <TD class="scFormDataOdd css_block_line" id="hidden_field_data_block" style="<?php echo $sStyleHidden_block; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_block_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["block"]) &&  $this->nmgp_cmp_readonly["block"] == "on") { 

 ?>
<input type="hidden" name="block" value="<?php echo $this->form_encode_input($block) . "\">" . $block . ""; ?>
<?php } else { ?>
<span id="id_read_on_block" class="sc-ui-readonly-block css_block_line" style="<?php echo $sStyleReadLab_block; ?>"><?php echo $this->form_format_readonly("block", $this->form_encode_input($this->block)); ?></span><span id="id_read_off_block" class="css_read_off_block<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_block; ?>">
 <input class="sc-js-input scFormObjectOdd css_block_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_block" type=text name="block" value="<?php echo $this->form_encode_input($block) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['block']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['block']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['block']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_block_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_block_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ultimoacceso']))
    {
        $this->nm_new_label['ultimoacceso'] = "Ultimoacceso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ultimoacceso = $this->ultimoacceso;
   $sStyleHidden_ultimoacceso = '';
   if (isset($this->nmgp_cmp_hidden['ultimoacceso']) && $this->nmgp_cmp_hidden['ultimoacceso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ultimoacceso']);
       $sStyleHidden_ultimoacceso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ultimoacceso = 'display: none;';
   $sStyleReadInp_ultimoacceso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ultimoacceso']) && $this->nmgp_cmp_readonly['ultimoacceso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ultimoacceso']);
       $sStyleReadLab_ultimoacceso = '';
       $sStyleReadInp_ultimoacceso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ultimoacceso']) && $this->nmgp_cmp_hidden['ultimoacceso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ultimoacceso" value="<?php echo $this->form_encode_input($ultimoacceso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ultimoacceso_label" id="hidden_field_label_ultimoacceso" style="<?php echo $sStyleHidden_ultimoacceso; ?>"><span id="id_label_ultimoacceso"><?php echo $this->nm_new_label['ultimoacceso']; ?></span></TD>
    <TD class="scFormDataOdd css_ultimoacceso_line" id="hidden_field_data_ultimoacceso" style="<?php echo $sStyleHidden_ultimoacceso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ultimoacceso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ultimoacceso"]) &&  $this->nmgp_cmp_readonly["ultimoacceso"] == "on") { 

 ?>
<input type="hidden" name="ultimoacceso" value="<?php echo $this->form_encode_input($ultimoacceso) . "\">" . $ultimoacceso . ""; ?>
<?php } else { ?>
<span id="id_read_on_ultimoacceso" class="sc-ui-readonly-ultimoacceso css_ultimoacceso_line" style="<?php echo $sStyleReadLab_ultimoacceso; ?>"><?php echo $this->form_format_readonly("ultimoacceso", $this->form_encode_input($this->ultimoacceso)); ?></span><span id="id_read_off_ultimoacceso" class="css_read_off_ultimoacceso<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ultimoacceso; ?>">
 <input class="sc-js-input scFormObjectOdd css_ultimoacceso_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ultimoacceso" type=text name="ultimoacceso" value="<?php echo $this->form_encode_input($ultimoacceso) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ultimoacceso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ultimoacceso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01foto']))
    {
        $this->nm_new_label['rp01foto'] = "Rp 0 1foto";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01foto = $this->rp01foto;
   $sStyleHidden_rp01foto = '';
   if (isset($this->nmgp_cmp_hidden['rp01foto']) && $this->nmgp_cmp_hidden['rp01foto'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01foto']);
       $sStyleHidden_rp01foto = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01foto = 'display: none;';
   $sStyleReadInp_rp01foto = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01foto']) && $this->nmgp_cmp_readonly['rp01foto'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01foto']);
       $sStyleReadLab_rp01foto = '';
       $sStyleReadInp_rp01foto = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01foto']) && $this->nmgp_cmp_hidden['rp01foto'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01foto" value="<?php echo $this->form_encode_input($rp01foto) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01foto_label" id="hidden_field_label_rp01foto" style="<?php echo $sStyleHidden_rp01foto; ?>"><span id="id_label_rp01foto"><?php echo $this->nm_new_label['rp01foto']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01foto']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01foto'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01foto_line" id="hidden_field_data_rp01foto" style="<?php echo $sStyleHidden_rp01foto; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01foto_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01foto"]) &&  $this->nmgp_cmp_readonly["rp01foto"] == "on") { 

 ?>
<input type="hidden" name="rp01foto" value="<?php echo $this->form_encode_input($rp01foto) . "\">" . $rp01foto . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01foto" class="sc-ui-readonly-rp01foto css_rp01foto_line" style="<?php echo $sStyleReadLab_rp01foto; ?>"><?php echo $this->form_format_readonly("rp01foto", $this->form_encode_input($this->rp01foto)); ?></span><span id="id_read_off_rp01foto" class="css_read_off_rp01foto<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01foto; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01foto_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01foto" type=text name="rp01foto" value="<?php echo $this->form_encode_input($rp01foto) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01foto_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01foto_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01ctacontable']))
    {
        $this->nm_new_label['rp01ctacontable'] = "Rp 0 1ctacontable";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01ctacontable = $this->rp01ctacontable;
   $sStyleHidden_rp01ctacontable = '';
   if (isset($this->nmgp_cmp_hidden['rp01ctacontable']) && $this->nmgp_cmp_hidden['rp01ctacontable'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01ctacontable']);
       $sStyleHidden_rp01ctacontable = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01ctacontable = 'display: none;';
   $sStyleReadInp_rp01ctacontable = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01ctacontable']) && $this->nmgp_cmp_readonly['rp01ctacontable'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01ctacontable']);
       $sStyleReadLab_rp01ctacontable = '';
       $sStyleReadInp_rp01ctacontable = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01ctacontable']) && $this->nmgp_cmp_hidden['rp01ctacontable'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01ctacontable" value="<?php echo $this->form_encode_input($rp01ctacontable) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01ctacontable_label" id="hidden_field_label_rp01ctacontable" style="<?php echo $sStyleHidden_rp01ctacontable; ?>"><span id="id_label_rp01ctacontable"><?php echo $this->nm_new_label['rp01ctacontable']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01ctacontable']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01ctacontable'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01ctacontable_line" id="hidden_field_data_rp01ctacontable" style="<?php echo $sStyleHidden_rp01ctacontable; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01ctacontable_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01ctacontable"]) &&  $this->nmgp_cmp_readonly["rp01ctacontable"] == "on") { 

 ?>
<input type="hidden" name="rp01ctacontable" value="<?php echo $this->form_encode_input($rp01ctacontable) . "\">" . $rp01ctacontable . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01ctacontable" class="sc-ui-readonly-rp01ctacontable css_rp01ctacontable_line" style="<?php echo $sStyleReadLab_rp01ctacontable; ?>"><?php echo $this->form_format_readonly("rp01ctacontable", $this->form_encode_input($this->rp01ctacontable)); ?></span><span id="id_read_off_rp01ctacontable" class="css_read_off_rp01ctacontable<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01ctacontable; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01ctacontable_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01ctacontable" type=text name="rp01ctacontable" value="<?php echo $this->form_encode_input($rp01ctacontable) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01ctacontable_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01ctacontable_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01email']))
    {
        $this->nm_new_label['rp01email'] = "Rp 0 1email";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01email = $this->rp01email;
   $sStyleHidden_rp01email = '';
   if (isset($this->nmgp_cmp_hidden['rp01email']) && $this->nmgp_cmp_hidden['rp01email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01email']);
       $sStyleHidden_rp01email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01email = 'display: none;';
   $sStyleReadInp_rp01email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01email']) && $this->nmgp_cmp_readonly['rp01email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01email']);
       $sStyleReadLab_rp01email = '';
       $sStyleReadInp_rp01email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01email']) && $this->nmgp_cmp_hidden['rp01email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01email" value="<?php echo $this->form_encode_input($rp01email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01email_label" id="hidden_field_label_rp01email" style="<?php echo $sStyleHidden_rp01email; ?>"><span id="id_label_rp01email"><?php echo $this->nm_new_label['rp01email']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01email']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01email'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01email_line" id="hidden_field_data_rp01email" style="<?php echo $sStyleHidden_rp01email; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01email_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01email"]) &&  $this->nmgp_cmp_readonly["rp01email"] == "on") { 

 ?>
<input type="hidden" name="rp01email" value="<?php echo $this->form_encode_input($rp01email) . "\">" . $rp01email . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01email" class="sc-ui-readonly-rp01email css_rp01email_line" style="<?php echo $sStyleReadLab_rp01email; ?>"><?php echo $this->form_format_readonly("rp01email", $this->form_encode_input($this->rp01email)); ?></span><span id="id_read_off_rp01email" class="css_read_off_rp01email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01email; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01email" type=text name="rp01email" value="<?php echo $this->form_encode_input($rp01email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01email_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01passwd']))
    {
        $this->nm_new_label['rp01passwd'] = "Rp 0 1passwd";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01passwd = $this->rp01passwd;
   $sStyleHidden_rp01passwd = '';
   if (isset($this->nmgp_cmp_hidden['rp01passwd']) && $this->nmgp_cmp_hidden['rp01passwd'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01passwd']);
       $sStyleHidden_rp01passwd = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01passwd = 'display: none;';
   $sStyleReadInp_rp01passwd = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01passwd']) && $this->nmgp_cmp_readonly['rp01passwd'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01passwd']);
       $sStyleReadLab_rp01passwd = '';
       $sStyleReadInp_rp01passwd = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01passwd']) && $this->nmgp_cmp_hidden['rp01passwd'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01passwd" value="<?php echo $this->form_encode_input($rp01passwd) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01passwd_label" id="hidden_field_label_rp01passwd" style="<?php echo $sStyleHidden_rp01passwd; ?>"><span id="id_label_rp01passwd"><?php echo $this->nm_new_label['rp01passwd']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01passwd']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01passwd'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01passwd_line" id="hidden_field_data_rp01passwd" style="<?php echo $sStyleHidden_rp01passwd; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01passwd_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01passwd"]) &&  $this->nmgp_cmp_readonly["rp01passwd"] == "on") { 

 ?>
<input type="hidden" name="rp01passwd" value="<?php echo $this->form_encode_input($rp01passwd) . "\">" . $rp01passwd . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01passwd" class="sc-ui-readonly-rp01passwd css_rp01passwd_line" style="<?php echo $sStyleReadLab_rp01passwd; ?>"><?php echo $this->form_format_readonly("rp01passwd", $this->form_encode_input($this->rp01passwd)); ?></span><span id="id_read_off_rp01passwd" class="css_read_off_rp01passwd<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01passwd; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01passwd_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01passwd" type=text name="rp01passwd" value="<?php echo $this->form_encode_input($rp01passwd) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=32"; } ?> maxlength=32 alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01passwd_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01passwd_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01huella']))
    {
        $this->nm_new_label['rp01huella'] = "Rp 0 1huella";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01huella = $this->rp01huella;
   $sStyleHidden_rp01huella = '';
   if (isset($this->nmgp_cmp_hidden['rp01huella']) && $this->nmgp_cmp_hidden['rp01huella'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01huella']);
       $sStyleHidden_rp01huella = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01huella = 'display: none;';
   $sStyleReadInp_rp01huella = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01huella']) && $this->nmgp_cmp_readonly['rp01huella'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01huella']);
       $sStyleReadLab_rp01huella = '';
       $sStyleReadInp_rp01huella = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01huella']) && $this->nmgp_cmp_hidden['rp01huella'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01huella" value="<?php echo $this->form_encode_input($rp01huella) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01huella_label" id="hidden_field_label_rp01huella" style="<?php echo $sStyleHidden_rp01huella; ?>"><span id="id_label_rp01huella"><?php echo $this->nm_new_label['rp01huella']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01huella']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01huella'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01huella_line" id="hidden_field_data_rp01huella" style="<?php echo $sStyleHidden_rp01huella; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01huella_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01huella"]) &&  $this->nmgp_cmp_readonly["rp01huella"] == "on") { 

 ?>
<input type="hidden" name="rp01huella" value="<?php echo $this->form_encode_input($rp01huella) . "\">" . $rp01huella . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01huella" class="sc-ui-readonly-rp01huella css_rp01huella_line" style="<?php echo $sStyleReadLab_rp01huella; ?>"><?php echo $this->form_format_readonly("rp01huella", $this->form_encode_input($this->rp01huella)); ?></span><span id="id_read_off_rp01huella" class="css_read_off_rp01huella<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01huella; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01huella_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01huella" type=text name="rp01huella" value="<?php echo $this->form_encode_input($rp01huella) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01huella_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01huella_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01recibefr']))
    {
        $this->nm_new_label['rp01recibefr'] = "Rp 0 1recibefr";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01recibefr = $this->rp01recibefr;
   $sStyleHidden_rp01recibefr = '';
   if (isset($this->nmgp_cmp_hidden['rp01recibefr']) && $this->nmgp_cmp_hidden['rp01recibefr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01recibefr']);
       $sStyleHidden_rp01recibefr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01recibefr = 'display: none;';
   $sStyleReadInp_rp01recibefr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01recibefr']) && $this->nmgp_cmp_readonly['rp01recibefr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01recibefr']);
       $sStyleReadLab_rp01recibefr = '';
       $sStyleReadInp_rp01recibefr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01recibefr']) && $this->nmgp_cmp_hidden['rp01recibefr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01recibefr" value="<?php echo $this->form_encode_input($rp01recibefr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01recibefr_label" id="hidden_field_label_rp01recibefr" style="<?php echo $sStyleHidden_rp01recibefr; ?>"><span id="id_label_rp01recibefr"><?php echo $this->nm_new_label['rp01recibefr']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01recibefr']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01recibefr'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01recibefr_line" id="hidden_field_data_rp01recibefr" style="<?php echo $sStyleHidden_rp01recibefr; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01recibefr_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01recibefr"]) &&  $this->nmgp_cmp_readonly["rp01recibefr"] == "on") { 

 ?>
<input type="hidden" name="rp01recibefr" value="<?php echo $this->form_encode_input($rp01recibefr) . "\">" . $rp01recibefr . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01recibefr" class="sc-ui-readonly-rp01recibefr css_rp01recibefr_line" style="<?php echo $sStyleReadLab_rp01recibefr; ?>"><?php echo $this->form_format_readonly("rp01recibefr", $this->form_encode_input($this->rp01recibefr)); ?></span><span id="id_read_off_rp01recibefr" class="css_read_off_rp01recibefr<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01recibefr; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01recibefr_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01recibefr" type=text name="rp01recibefr" value="<?php echo $this->form_encode_input($rp01recibefr) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01recibefr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01recibefr_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01recibedt']))
    {
        $this->nm_new_label['rp01recibedt'] = "Rp 0 1recibedt";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01recibedt = $this->rp01recibedt;
   $sStyleHidden_rp01recibedt = '';
   if (isset($this->nmgp_cmp_hidden['rp01recibedt']) && $this->nmgp_cmp_hidden['rp01recibedt'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01recibedt']);
       $sStyleHidden_rp01recibedt = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01recibedt = 'display: none;';
   $sStyleReadInp_rp01recibedt = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01recibedt']) && $this->nmgp_cmp_readonly['rp01recibedt'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01recibedt']);
       $sStyleReadLab_rp01recibedt = '';
       $sStyleReadInp_rp01recibedt = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01recibedt']) && $this->nmgp_cmp_hidden['rp01recibedt'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01recibedt" value="<?php echo $this->form_encode_input($rp01recibedt) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01recibedt_label" id="hidden_field_label_rp01recibedt" style="<?php echo $sStyleHidden_rp01recibedt; ?>"><span id="id_label_rp01recibedt"><?php echo $this->nm_new_label['rp01recibedt']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01recibedt_line" id="hidden_field_data_rp01recibedt" style="<?php echo $sStyleHidden_rp01recibedt; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01recibedt_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01recibedt"]) &&  $this->nmgp_cmp_readonly["rp01recibedt"] == "on") { 

 ?>
<input type="hidden" name="rp01recibedt" value="<?php echo $this->form_encode_input($rp01recibedt) . "\">" . $rp01recibedt . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01recibedt" class="sc-ui-readonly-rp01recibedt css_rp01recibedt_line" style="<?php echo $sStyleReadLab_rp01recibedt; ?>"><?php echo $this->form_format_readonly("rp01recibedt", $this->form_encode_input($this->rp01recibedt)); ?></span><span id="id_read_off_rp01recibedt" class="css_read_off_rp01recibedt<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01recibedt; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01recibedt_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01recibedt" type=text name="rp01recibedt" value="<?php echo $this->form_encode_input($rp01recibedt) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01recibedt_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01recibedt_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01recibedc']))
    {
        $this->nm_new_label['rp01recibedc'] = "Rp 0 1recibedc";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01recibedc = $this->rp01recibedc;
   $sStyleHidden_rp01recibedc = '';
   if (isset($this->nmgp_cmp_hidden['rp01recibedc']) && $this->nmgp_cmp_hidden['rp01recibedc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01recibedc']);
       $sStyleHidden_rp01recibedc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01recibedc = 'display: none;';
   $sStyleReadInp_rp01recibedc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01recibedc']) && $this->nmgp_cmp_readonly['rp01recibedc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01recibedc']);
       $sStyleReadLab_rp01recibedc = '';
       $sStyleReadInp_rp01recibedc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01recibedc']) && $this->nmgp_cmp_hidden['rp01recibedc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01recibedc" value="<?php echo $this->form_encode_input($rp01recibedc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01recibedc_label" id="hidden_field_label_rp01recibedc" style="<?php echo $sStyleHidden_rp01recibedc; ?>"><span id="id_label_rp01recibedc"><?php echo $this->nm_new_label['rp01recibedc']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01recibedc_line" id="hidden_field_data_rp01recibedc" style="<?php echo $sStyleHidden_rp01recibedc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01recibedc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01recibedc"]) &&  $this->nmgp_cmp_readonly["rp01recibedc"] == "on") { 

 ?>
<input type="hidden" name="rp01recibedc" value="<?php echo $this->form_encode_input($rp01recibedc) . "\">" . $rp01recibedc . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01recibedc" class="sc-ui-readonly-rp01recibedc css_rp01recibedc_line" style="<?php echo $sStyleReadLab_rp01recibedc; ?>"><?php echo $this->form_format_readonly("rp01recibedc", $this->form_encode_input($this->rp01recibedc)); ?></span><span id="id_read_off_rp01recibedc" class="css_read_off_rp01recibedc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01recibedc; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01recibedc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01recibedc" type=text name="rp01recibedc" value="<?php echo $this->form_encode_input($rp01recibedc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01recibedc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01recibedc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01uid']))
    {
        $this->nm_new_label['rp01uid'] = "Rp 01UID";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01uid = $this->rp01uid;
   $sStyleHidden_rp01uid = '';
   if (isset($this->nmgp_cmp_hidden['rp01uid']) && $this->nmgp_cmp_hidden['rp01uid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01uid']);
       $sStyleHidden_rp01uid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01uid = 'display: none;';
   $sStyleReadInp_rp01uid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01uid']) && $this->nmgp_cmp_readonly['rp01uid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01uid']);
       $sStyleReadLab_rp01uid = '';
       $sStyleReadInp_rp01uid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01uid']) && $this->nmgp_cmp_hidden['rp01uid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01uid" value="<?php echo $this->form_encode_input($rp01uid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01uid_label" id="hidden_field_label_rp01uid" style="<?php echo $sStyleHidden_rp01uid; ?>"><span id="id_label_rp01uid"><?php echo $this->nm_new_label['rp01uid']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01uid_line" id="hidden_field_data_rp01uid" style="<?php echo $sStyleHidden_rp01uid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01uid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01uid"]) &&  $this->nmgp_cmp_readonly["rp01uid"] == "on") { 

 ?>
<input type="hidden" name="rp01uid" value="<?php echo $this->form_encode_input($rp01uid) . "\">" . $rp01uid . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01uid" class="sc-ui-readonly-rp01uid css_rp01uid_line" style="<?php echo $sStyleReadLab_rp01uid; ?>"><?php echo $this->form_format_readonly("rp01uid", $this->form_encode_input($this->rp01uid)); ?></span><span id="id_read_off_rp01uid" class="css_read_off_rp01uid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01uid; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01uid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01uid" type=text name="rp01uid" value="<?php echo $this->form_encode_input($rp01uid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01uid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01uid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01uid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01uid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01uid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01fechauid']))
    {
        $this->nm_new_label['rp01fechauid'] = "Rp 0 1fecha UID";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_rp01fechauid = $this->rp01fechauid;
   if (strlen($this->rp01fechauid_hora) > 8 ) {$this->rp01fechauid_hora = substr($this->rp01fechauid_hora, 0, 8);}
   $this->rp01fechauid .= ' ' . $this->rp01fechauid_hora;
   $this->rp01fechauid  = trim($this->rp01fechauid);
   $rp01fechauid = $this->rp01fechauid;
   $sStyleHidden_rp01fechauid = '';
   if (isset($this->nmgp_cmp_hidden['rp01fechauid']) && $this->nmgp_cmp_hidden['rp01fechauid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01fechauid']);
       $sStyleHidden_rp01fechauid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01fechauid = 'display: none;';
   $sStyleReadInp_rp01fechauid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01fechauid']) && $this->nmgp_cmp_readonly['rp01fechauid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01fechauid']);
       $sStyleReadLab_rp01fechauid = '';
       $sStyleReadInp_rp01fechauid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01fechauid']) && $this->nmgp_cmp_hidden['rp01fechauid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01fechauid" value="<?php echo $this->form_encode_input($rp01fechauid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01fechauid_label" id="hidden_field_label_rp01fechauid" style="<?php echo $sStyleHidden_rp01fechauid; ?>"><span id="id_label_rp01fechauid"><?php echo $this->nm_new_label['rp01fechauid']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01fechauid_line" id="hidden_field_data_rp01fechauid" style="<?php echo $sStyleHidden_rp01fechauid; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01fechauid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01fechauid"]) &&  $this->nmgp_cmp_readonly["rp01fechauid"] == "on") { 

 ?>
<input type="hidden" name="rp01fechauid" value="<?php echo $this->form_encode_input($rp01fechauid) . "\">" . $rp01fechauid . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01fechauid" class="sc-ui-readonly-rp01fechauid css_rp01fechauid_line" style="<?php echo $sStyleReadLab_rp01fechauid; ?>"><?php echo $this->form_format_readonly("rp01fechauid", $this->form_encode_input($rp01fechauid)); ?></span><span id="id_read_off_rp01fechauid" class="css_read_off_rp01fechauid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01fechauid; ?>"><?php
$tmp_form_data = $this->field_config['rp01fechauid']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_rp01fechauid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01fechauid" type=text name="rp01fechauid" value="<?php echo $this->form_encode_input($rp01fechauid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['rp01fechauid']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rp01fechauid']['date_format']; ?>', timeSep: '<?php echo $this->field_config['rp01fechauid']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01fechauid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01fechauid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->rp01fechauid = $old_dt_rp01fechauid;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01obs']))
    {
        $this->nm_new_label['rp01obs'] = "Rp 0 1obs";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01obs = $this->rp01obs;
   $sStyleHidden_rp01obs = '';
   if (isset($this->nmgp_cmp_hidden['rp01obs']) && $this->nmgp_cmp_hidden['rp01obs'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01obs']);
       $sStyleHidden_rp01obs = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01obs = 'display: none;';
   $sStyleReadInp_rp01obs = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01obs']) && $this->nmgp_cmp_readonly['rp01obs'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01obs']);
       $sStyleReadLab_rp01obs = '';
       $sStyleReadInp_rp01obs = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01obs']) && $this->nmgp_cmp_hidden['rp01obs'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01obs" value="<?php echo $this->form_encode_input($rp01obs) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01obs_label" id="hidden_field_label_rp01obs" style="<?php echo $sStyleHidden_rp01obs; ?>"><span id="id_label_rp01obs"><?php echo $this->nm_new_label['rp01obs']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01obs']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01obs'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01obs_line" id="hidden_field_data_rp01obs" style="<?php echo $sStyleHidden_rp01obs; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01obs_line" style="vertical-align: top;padding: 0px">
<?php
$rp01obs_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($rp01obs));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01obs"]) &&  $this->nmgp_cmp_readonly["rp01obs"] == "on") { 

 ?>
<input type="hidden" name="rp01obs" value="<?php echo $this->form_encode_input($rp01obs) . "\">" . $rp01obs_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01obs" class="sc-ui-readonly-rp01obs css_rp01obs_line" style="<?php echo $sStyleReadLab_rp01obs; ?>"><?php echo $this->form_format_readonly("rp01obs", $this->form_encode_input($rp01obs_val)); ?></span><span id="id_read_off_rp01obs" class="css_read_off_rp01obs<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01obs; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_rp01obs_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="rp01obs" id="id_sc_field_rp01obs" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $rp01obs; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01obs_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01obs_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01cauliq']))
    {
        $this->nm_new_label['rp01cauliq'] = "Rp 0 1cauliq";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01cauliq = $this->rp01cauliq;
   $sStyleHidden_rp01cauliq = '';
   if (isset($this->nmgp_cmp_hidden['rp01cauliq']) && $this->nmgp_cmp_hidden['rp01cauliq'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01cauliq']);
       $sStyleHidden_rp01cauliq = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01cauliq = 'display: none;';
   $sStyleReadInp_rp01cauliq = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01cauliq']) && $this->nmgp_cmp_readonly['rp01cauliq'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01cauliq']);
       $sStyleReadLab_rp01cauliq = '';
       $sStyleReadInp_rp01cauliq = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01cauliq']) && $this->nmgp_cmp_hidden['rp01cauliq'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01cauliq" value="<?php echo $this->form_encode_input($rp01cauliq) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01cauliq_label" id="hidden_field_label_rp01cauliq" style="<?php echo $sStyleHidden_rp01cauliq; ?>"><span id="id_label_rp01cauliq"><?php echo $this->nm_new_label['rp01cauliq']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01cauliq']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01cauliq'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01cauliq_line" id="hidden_field_data_rp01cauliq" style="<?php echo $sStyleHidden_rp01cauliq; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01cauliq_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01cauliq"]) &&  $this->nmgp_cmp_readonly["rp01cauliq"] == "on") { 

 ?>
<input type="hidden" name="rp01cauliq" value="<?php echo $this->form_encode_input($rp01cauliq) . "\">" . $rp01cauliq . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01cauliq" class="sc-ui-readonly-rp01cauliq css_rp01cauliq_line" style="<?php echo $sStyleReadLab_rp01cauliq; ?>"><?php echo $this->form_format_readonly("rp01cauliq", $this->form_encode_input($this->rp01cauliq)); ?></span><span id="id_read_off_rp01cauliq" class="css_read_off_rp01cauliq<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01cauliq; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01cauliq_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01cauliq" type=text name="rp01cauliq" value="<?php echo $this->form_encode_input($rp01cauliq) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01cauliq_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01cauliq_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01discapacidad']))
    {
        $this->nm_new_label['rp01discapacidad'] = "Rp 0 1discapacidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01discapacidad = $this->rp01discapacidad;
   $sStyleHidden_rp01discapacidad = '';
   if (isset($this->nmgp_cmp_hidden['rp01discapacidad']) && $this->nmgp_cmp_hidden['rp01discapacidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01discapacidad']);
       $sStyleHidden_rp01discapacidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01discapacidad = 'display: none;';
   $sStyleReadInp_rp01discapacidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01discapacidad']) && $this->nmgp_cmp_readonly['rp01discapacidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01discapacidad']);
       $sStyleReadLab_rp01discapacidad = '';
       $sStyleReadInp_rp01discapacidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01discapacidad']) && $this->nmgp_cmp_hidden['rp01discapacidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01discapacidad" value="<?php echo $this->form_encode_input($rp01discapacidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01discapacidad_label" id="hidden_field_label_rp01discapacidad" style="<?php echo $sStyleHidden_rp01discapacidad; ?>"><span id="id_label_rp01discapacidad"><?php echo $this->nm_new_label['rp01discapacidad']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01discapacidad']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01discapacidad'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01discapacidad_line" id="hidden_field_data_rp01discapacidad" style="<?php echo $sStyleHidden_rp01discapacidad; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01discapacidad_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01discapacidad"]) &&  $this->nmgp_cmp_readonly["rp01discapacidad"] == "on") { 

 ?>
<input type="hidden" name="rp01discapacidad" value="<?php echo $this->form_encode_input($rp01discapacidad) . "\">" . $rp01discapacidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01discapacidad" class="sc-ui-readonly-rp01discapacidad css_rp01discapacidad_line" style="<?php echo $sStyleReadLab_rp01discapacidad; ?>"><?php echo $this->form_format_readonly("rp01discapacidad", $this->form_encode_input($this->rp01discapacidad)); ?></span><span id="id_read_off_rp01discapacidad" class="css_read_off_rp01discapacidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01discapacidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01discapacidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01discapacidad" type=text name="rp01discapacidad" value="<?php echo $this->form_encode_input($rp01discapacidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01discapacidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01discapacidad_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01conadis']))
    {
        $this->nm_new_label['rp01conadis'] = "Rp 0 1conadis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01conadis = $this->rp01conadis;
   $sStyleHidden_rp01conadis = '';
   if (isset($this->nmgp_cmp_hidden['rp01conadis']) && $this->nmgp_cmp_hidden['rp01conadis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01conadis']);
       $sStyleHidden_rp01conadis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01conadis = 'display: none;';
   $sStyleReadInp_rp01conadis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01conadis']) && $this->nmgp_cmp_readonly['rp01conadis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01conadis']);
       $sStyleReadLab_rp01conadis = '';
       $sStyleReadInp_rp01conadis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01conadis']) && $this->nmgp_cmp_hidden['rp01conadis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01conadis" value="<?php echo $this->form_encode_input($rp01conadis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01conadis_label" id="hidden_field_label_rp01conadis" style="<?php echo $sStyleHidden_rp01conadis; ?>"><span id="id_label_rp01conadis"><?php echo $this->nm_new_label['rp01conadis']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01conadis']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01conadis'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01conadis_line" id="hidden_field_data_rp01conadis" style="<?php echo $sStyleHidden_rp01conadis; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01conadis_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01conadis"]) &&  $this->nmgp_cmp_readonly["rp01conadis"] == "on") { 

 ?>
<input type="hidden" name="rp01conadis" value="<?php echo $this->form_encode_input($rp01conadis) . "\">" . $rp01conadis . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01conadis" class="sc-ui-readonly-rp01conadis css_rp01conadis_line" style="<?php echo $sStyleReadLab_rp01conadis; ?>"><?php echo $this->form_format_readonly("rp01conadis", $this->form_encode_input($this->rp01conadis)); ?></span><span id="id_read_off_rp01conadis" class="css_read_off_rp01conadis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01conadis; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01conadis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01conadis" type=text name="rp01conadis" value="<?php echo $this->form_encode_input($rp01conadis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01conadis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01conadis_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01tpdiscapacidad']))
    {
        $this->nm_new_label['rp01tpdiscapacidad'] = "Rp 0 1tpdiscapacidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01tpdiscapacidad = $this->rp01tpdiscapacidad;
   $sStyleHidden_rp01tpdiscapacidad = '';
   if (isset($this->nmgp_cmp_hidden['rp01tpdiscapacidad']) && $this->nmgp_cmp_hidden['rp01tpdiscapacidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01tpdiscapacidad']);
       $sStyleHidden_rp01tpdiscapacidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01tpdiscapacidad = 'display: none;';
   $sStyleReadInp_rp01tpdiscapacidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01tpdiscapacidad']) && $this->nmgp_cmp_readonly['rp01tpdiscapacidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01tpdiscapacidad']);
       $sStyleReadLab_rp01tpdiscapacidad = '';
       $sStyleReadInp_rp01tpdiscapacidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01tpdiscapacidad']) && $this->nmgp_cmp_hidden['rp01tpdiscapacidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01tpdiscapacidad" value="<?php echo $this->form_encode_input($rp01tpdiscapacidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01tpdiscapacidad_label" id="hidden_field_label_rp01tpdiscapacidad" style="<?php echo $sStyleHidden_rp01tpdiscapacidad; ?>"><span id="id_label_rp01tpdiscapacidad"><?php echo $this->nm_new_label['rp01tpdiscapacidad']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01tpdiscapacidad']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01tpdiscapacidad'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01tpdiscapacidad_line" id="hidden_field_data_rp01tpdiscapacidad" style="<?php echo $sStyleHidden_rp01tpdiscapacidad; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01tpdiscapacidad_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01tpdiscapacidad"]) &&  $this->nmgp_cmp_readonly["rp01tpdiscapacidad"] == "on") { 

 ?>
<input type="hidden" name="rp01tpdiscapacidad" value="<?php echo $this->form_encode_input($rp01tpdiscapacidad) . "\">" . $rp01tpdiscapacidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01tpdiscapacidad" class="sc-ui-readonly-rp01tpdiscapacidad css_rp01tpdiscapacidad_line" style="<?php echo $sStyleReadLab_rp01tpdiscapacidad; ?>"><?php echo $this->form_format_readonly("rp01tpdiscapacidad", $this->form_encode_input($this->rp01tpdiscapacidad)); ?></span><span id="id_read_off_rp01tpdiscapacidad" class="css_read_off_rp01tpdiscapacidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01tpdiscapacidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01tpdiscapacidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01tpdiscapacidad" type=text name="rp01tpdiscapacidad" value="<?php echo $this->form_encode_input($rp01tpdiscapacidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01tpdiscapacidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01tpdiscapacidad_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01prdiscapacidad']))
    {
        $this->nm_new_label['rp01prdiscapacidad'] = "Rp 0 1prdiscapacidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01prdiscapacidad = $this->rp01prdiscapacidad;
   $sStyleHidden_rp01prdiscapacidad = '';
   if (isset($this->nmgp_cmp_hidden['rp01prdiscapacidad']) && $this->nmgp_cmp_hidden['rp01prdiscapacidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01prdiscapacidad']);
       $sStyleHidden_rp01prdiscapacidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01prdiscapacidad = 'display: none;';
   $sStyleReadInp_rp01prdiscapacidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01prdiscapacidad']) && $this->nmgp_cmp_readonly['rp01prdiscapacidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01prdiscapacidad']);
       $sStyleReadLab_rp01prdiscapacidad = '';
       $sStyleReadInp_rp01prdiscapacidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01prdiscapacidad']) && $this->nmgp_cmp_hidden['rp01prdiscapacidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01prdiscapacidad" value="<?php echo $this->form_encode_input($rp01prdiscapacidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01prdiscapacidad_label" id="hidden_field_label_rp01prdiscapacidad" style="<?php echo $sStyleHidden_rp01prdiscapacidad; ?>"><span id="id_label_rp01prdiscapacidad"><?php echo $this->nm_new_label['rp01prdiscapacidad']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01prdiscapacidad']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01prdiscapacidad'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01prdiscapacidad_line" id="hidden_field_data_rp01prdiscapacidad" style="<?php echo $sStyleHidden_rp01prdiscapacidad; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01prdiscapacidad_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01prdiscapacidad"]) &&  $this->nmgp_cmp_readonly["rp01prdiscapacidad"] == "on") { 

 ?>
<input type="hidden" name="rp01prdiscapacidad" value="<?php echo $this->form_encode_input($rp01prdiscapacidad) . "\">" . $rp01prdiscapacidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01prdiscapacidad" class="sc-ui-readonly-rp01prdiscapacidad css_rp01prdiscapacidad_line" style="<?php echo $sStyleReadLab_rp01prdiscapacidad; ?>"><?php echo $this->form_format_readonly("rp01prdiscapacidad", $this->form_encode_input($this->rp01prdiscapacidad)); ?></span><span id="id_read_off_rp01prdiscapacidad" class="css_read_off_rp01prdiscapacidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01prdiscapacidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01prdiscapacidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01prdiscapacidad" type=text name="rp01prdiscapacidad" value="<?php echo $this->form_encode_input($rp01prdiscapacidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01prdiscapacidad']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01prdiscapacidad']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01prdiscapacidad']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01prdiscapacidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01prdiscapacidad_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01freserva']))
    {
        $this->nm_new_label['rp01freserva'] = "Rp 0 1freserva";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01freserva = $this->rp01freserva;
   $sStyleHidden_rp01freserva = '';
   if (isset($this->nmgp_cmp_hidden['rp01freserva']) && $this->nmgp_cmp_hidden['rp01freserva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01freserva']);
       $sStyleHidden_rp01freserva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01freserva = 'display: none;';
   $sStyleReadInp_rp01freserva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01freserva']) && $this->nmgp_cmp_readonly['rp01freserva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01freserva']);
       $sStyleReadLab_rp01freserva = '';
       $sStyleReadInp_rp01freserva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01freserva']) && $this->nmgp_cmp_hidden['rp01freserva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01freserva" value="<?php echo $this->form_encode_input($rp01freserva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01freserva_label" id="hidden_field_label_rp01freserva" style="<?php echo $sStyleHidden_rp01freserva; ?>"><span id="id_label_rp01freserva"><?php echo $this->nm_new_label['rp01freserva']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01freserva']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01freserva'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01freserva_line" id="hidden_field_data_rp01freserva" style="<?php echo $sStyleHidden_rp01freserva; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01freserva_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01freserva"]) &&  $this->nmgp_cmp_readonly["rp01freserva"] == "on") { 

 ?>
<input type="hidden" name="rp01freserva" value="<?php echo $this->form_encode_input($rp01freserva) . "\">" . $rp01freserva . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01freserva" class="sc-ui-readonly-rp01freserva css_rp01freserva_line" style="<?php echo $sStyleReadLab_rp01freserva; ?>"><?php echo $this->form_format_readonly("rp01freserva", $this->form_encode_input($this->rp01freserva)); ?></span><span id="id_read_off_rp01freserva" class="css_read_off_rp01freserva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01freserva; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01freserva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01freserva" type=text name="rp01freserva" value="<?php echo $this->form_encode_input($rp01freserva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01freserva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01freserva_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01codsectorial']))
    {
        $this->nm_new_label['rp01codsectorial'] = "Rp 0 1codsectorial";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01codsectorial = $this->rp01codsectorial;
   $sStyleHidden_rp01codsectorial = '';
   if (isset($this->nmgp_cmp_hidden['rp01codsectorial']) && $this->nmgp_cmp_hidden['rp01codsectorial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01codsectorial']);
       $sStyleHidden_rp01codsectorial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01codsectorial = 'display: none;';
   $sStyleReadInp_rp01codsectorial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01codsectorial']) && $this->nmgp_cmp_readonly['rp01codsectorial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01codsectorial']);
       $sStyleReadLab_rp01codsectorial = '';
       $sStyleReadInp_rp01codsectorial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01codsectorial']) && $this->nmgp_cmp_hidden['rp01codsectorial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01codsectorial" value="<?php echo $this->form_encode_input($rp01codsectorial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01codsectorial_label" id="hidden_field_label_rp01codsectorial" style="<?php echo $sStyleHidden_rp01codsectorial; ?>"><span id="id_label_rp01codsectorial"><?php echo $this->nm_new_label['rp01codsectorial']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01codsectorial']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01codsectorial'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01codsectorial_line" id="hidden_field_data_rp01codsectorial" style="<?php echo $sStyleHidden_rp01codsectorial; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01codsectorial_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01codsectorial"]) &&  $this->nmgp_cmp_readonly["rp01codsectorial"] == "on") { 

 ?>
<input type="hidden" name="rp01codsectorial" value="<?php echo $this->form_encode_input($rp01codsectorial) . "\">" . $rp01codsectorial . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01codsectorial" class="sc-ui-readonly-rp01codsectorial css_rp01codsectorial_line" style="<?php echo $sStyleReadLab_rp01codsectorial; ?>"><?php echo $this->form_format_readonly("rp01codsectorial", $this->form_encode_input($this->rp01codsectorial)); ?></span><span id="id_read_off_rp01codsectorial" class="css_read_off_rp01codsectorial<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01codsectorial; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01codsectorial_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01codsectorial" type=text name="rp01codsectorial" value="<?php echo $this->form_encode_input($rp01codsectorial) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01codsectorial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01codsectorial_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anticipoporvalor']))
    {
        $this->nm_new_label['anticipoporvalor'] = "Anticipoporvalor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anticipoporvalor = $this->anticipoporvalor;
   $sStyleHidden_anticipoporvalor = '';
   if (isset($this->nmgp_cmp_hidden['anticipoporvalor']) && $this->nmgp_cmp_hidden['anticipoporvalor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anticipoporvalor']);
       $sStyleHidden_anticipoporvalor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anticipoporvalor = 'display: none;';
   $sStyleReadInp_anticipoporvalor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anticipoporvalor']) && $this->nmgp_cmp_readonly['anticipoporvalor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anticipoporvalor']);
       $sStyleReadLab_anticipoporvalor = '';
       $sStyleReadInp_anticipoporvalor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anticipoporvalor']) && $this->nmgp_cmp_hidden['anticipoporvalor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anticipoporvalor" value="<?php echo $this->form_encode_input($anticipoporvalor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_anticipoporvalor_label" id="hidden_field_label_anticipoporvalor" style="<?php echo $sStyleHidden_anticipoporvalor; ?>"><span id="id_label_anticipoporvalor"><?php echo $this->nm_new_label['anticipoporvalor']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['anticipoporvalor']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['anticipoporvalor'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_anticipoporvalor_line" id="hidden_field_data_anticipoporvalor" style="<?php echo $sStyleHidden_anticipoporvalor; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anticipoporvalor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anticipoporvalor"]) &&  $this->nmgp_cmp_readonly["anticipoporvalor"] == "on") { 

 ?>
<input type="hidden" name="anticipoporvalor" value="<?php echo $this->form_encode_input($anticipoporvalor) . "\">" . $anticipoporvalor . ""; ?>
<?php } else { ?>
<span id="id_read_on_anticipoporvalor" class="sc-ui-readonly-anticipoporvalor css_anticipoporvalor_line" style="<?php echo $sStyleReadLab_anticipoporvalor; ?>"><?php echo $this->form_format_readonly("anticipoporvalor", $this->form_encode_input($this->anticipoporvalor)); ?></span><span id="id_read_off_anticipoporvalor" class="css_read_off_anticipoporvalor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anticipoporvalor; ?>">
 <input class="sc-js-input scFormObjectOdd css_anticipoporvalor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anticipoporvalor" type=text name="anticipoporvalor" value="<?php echo $this->form_encode_input($anticipoporvalor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anticipoporvalor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anticipoporvalor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipidret']))
    {
        $this->nm_new_label['tipidret'] = "Tip Id Ret";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipidret = $this->tipidret;
   $sStyleHidden_tipidret = '';
   if (isset($this->nmgp_cmp_hidden['tipidret']) && $this->nmgp_cmp_hidden['tipidret'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipidret']);
       $sStyleHidden_tipidret = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipidret = 'display: none;';
   $sStyleReadInp_tipidret = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipidret']) && $this->nmgp_cmp_readonly['tipidret'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipidret']);
       $sStyleReadLab_tipidret = '';
       $sStyleReadInp_tipidret = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipidret']) && $this->nmgp_cmp_hidden['tipidret'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipidret" value="<?php echo $this->form_encode_input($tipidret) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipidret_label" id="hidden_field_label_tipidret" style="<?php echo $sStyleHidden_tipidret; ?>"><span id="id_label_tipidret"><?php echo $this->nm_new_label['tipidret']; ?></span></TD>
    <TD class="scFormDataOdd css_tipidret_line" id="hidden_field_data_tipidret" style="<?php echo $sStyleHidden_tipidret; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipidret_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipidret"]) &&  $this->nmgp_cmp_readonly["tipidret"] == "on") { 

 ?>
<input type="hidden" name="tipidret" value="<?php echo $this->form_encode_input($tipidret) . "\">" . $tipidret . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipidret" class="sc-ui-readonly-tipidret css_tipidret_line" style="<?php echo $sStyleReadLab_tipidret; ?>"><?php echo $this->form_format_readonly("tipidret", $this->form_encode_input($this->tipidret)); ?></span><span id="id_read_off_tipidret" class="css_read_off_tipidret<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipidret; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipidret_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipidret" type=text name="tipidret" value="<?php echo $this->form_encode_input($tipidret) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipidret_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipidret_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['residenciatrab']))
    {
        $this->nm_new_label['residenciatrab'] = "Residencia Trab";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $residenciatrab = $this->residenciatrab;
   $sStyleHidden_residenciatrab = '';
   if (isset($this->nmgp_cmp_hidden['residenciatrab']) && $this->nmgp_cmp_hidden['residenciatrab'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['residenciatrab']);
       $sStyleHidden_residenciatrab = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_residenciatrab = 'display: none;';
   $sStyleReadInp_residenciatrab = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['residenciatrab']) && $this->nmgp_cmp_readonly['residenciatrab'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['residenciatrab']);
       $sStyleReadLab_residenciatrab = '';
       $sStyleReadInp_residenciatrab = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['residenciatrab']) && $this->nmgp_cmp_hidden['residenciatrab'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="residenciatrab" value="<?php echo $this->form_encode_input($residenciatrab) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_residenciatrab_label" id="hidden_field_label_residenciatrab" style="<?php echo $sStyleHidden_residenciatrab; ?>"><span id="id_label_residenciatrab"><?php echo $this->nm_new_label['residenciatrab']; ?></span></TD>
    <TD class="scFormDataOdd css_residenciatrab_line" id="hidden_field_data_residenciatrab" style="<?php echo $sStyleHidden_residenciatrab; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_residenciatrab_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["residenciatrab"]) &&  $this->nmgp_cmp_readonly["residenciatrab"] == "on") { 

 ?>
<input type="hidden" name="residenciatrab" value="<?php echo $this->form_encode_input($residenciatrab) . "\">" . $residenciatrab . ""; ?>
<?php } else { ?>
<span id="id_read_on_residenciatrab" class="sc-ui-readonly-residenciatrab css_residenciatrab_line" style="<?php echo $sStyleReadLab_residenciatrab; ?>"><?php echo $this->form_format_readonly("residenciatrab", $this->form_encode_input($this->residenciatrab)); ?></span><span id="id_read_off_residenciatrab" class="css_read_off_residenciatrab<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_residenciatrab; ?>">
 <input class="sc-js-input scFormObjectOdd css_residenciatrab_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_residenciatrab" type=text name="residenciatrab" value="<?php echo $this->form_encode_input($residenciatrab) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_residenciatrab_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_residenciatrab_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['paisresidencia']))
    {
        $this->nm_new_label['paisresidencia'] = "Pais Residencia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $paisresidencia = $this->paisresidencia;
   $sStyleHidden_paisresidencia = '';
   if (isset($this->nmgp_cmp_hidden['paisresidencia']) && $this->nmgp_cmp_hidden['paisresidencia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['paisresidencia']);
       $sStyleHidden_paisresidencia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_paisresidencia = 'display: none;';
   $sStyleReadInp_paisresidencia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['paisresidencia']) && $this->nmgp_cmp_readonly['paisresidencia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['paisresidencia']);
       $sStyleReadLab_paisresidencia = '';
       $sStyleReadInp_paisresidencia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['paisresidencia']) && $this->nmgp_cmp_hidden['paisresidencia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="paisresidencia" value="<?php echo $this->form_encode_input($paisresidencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_paisresidencia_label" id="hidden_field_label_paisresidencia" style="<?php echo $sStyleHidden_paisresidencia; ?>"><span id="id_label_paisresidencia"><?php echo $this->nm_new_label['paisresidencia']; ?></span></TD>
    <TD class="scFormDataOdd css_paisresidencia_line" id="hidden_field_data_paisresidencia" style="<?php echo $sStyleHidden_paisresidencia; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_paisresidencia_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["paisresidencia"]) &&  $this->nmgp_cmp_readonly["paisresidencia"] == "on") { 

 ?>
<input type="hidden" name="paisresidencia" value="<?php echo $this->form_encode_input($paisresidencia) . "\">" . $paisresidencia . ""; ?>
<?php } else { ?>
<span id="id_read_on_paisresidencia" class="sc-ui-readonly-paisresidencia css_paisresidencia_line" style="<?php echo $sStyleReadLab_paisresidencia; ?>"><?php echo $this->form_format_readonly("paisresidencia", $this->form_encode_input($this->paisresidencia)); ?></span><span id="id_read_off_paisresidencia" class="css_read_off_paisresidencia<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_paisresidencia; ?>">
 <input class="sc-js-input scFormObjectOdd css_paisresidencia_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_paisresidencia" type=text name="paisresidencia" value="<?php echo $this->form_encode_input($paisresidencia) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_paisresidencia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_paisresidencia_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['aplicaconvenio']))
    {
        $this->nm_new_label['aplicaconvenio'] = "Aplica Convenio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $aplicaconvenio = $this->aplicaconvenio;
   $sStyleHidden_aplicaconvenio = '';
   if (isset($this->nmgp_cmp_hidden['aplicaconvenio']) && $this->nmgp_cmp_hidden['aplicaconvenio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['aplicaconvenio']);
       $sStyleHidden_aplicaconvenio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_aplicaconvenio = 'display: none;';
   $sStyleReadInp_aplicaconvenio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['aplicaconvenio']) && $this->nmgp_cmp_readonly['aplicaconvenio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['aplicaconvenio']);
       $sStyleReadLab_aplicaconvenio = '';
       $sStyleReadInp_aplicaconvenio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['aplicaconvenio']) && $this->nmgp_cmp_hidden['aplicaconvenio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aplicaconvenio" value="<?php echo $this->form_encode_input($aplicaconvenio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_aplicaconvenio_label" id="hidden_field_label_aplicaconvenio" style="<?php echo $sStyleHidden_aplicaconvenio; ?>"><span id="id_label_aplicaconvenio"><?php echo $this->nm_new_label['aplicaconvenio']; ?></span></TD>
    <TD class="scFormDataOdd css_aplicaconvenio_line" id="hidden_field_data_aplicaconvenio" style="<?php echo $sStyleHidden_aplicaconvenio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_aplicaconvenio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["aplicaconvenio"]) &&  $this->nmgp_cmp_readonly["aplicaconvenio"] == "on") { 

 ?>
<input type="hidden" name="aplicaconvenio" value="<?php echo $this->form_encode_input($aplicaconvenio) . "\">" . $aplicaconvenio . ""; ?>
<?php } else { ?>
<span id="id_read_on_aplicaconvenio" class="sc-ui-readonly-aplicaconvenio css_aplicaconvenio_line" style="<?php echo $sStyleReadLab_aplicaconvenio; ?>"><?php echo $this->form_format_readonly("aplicaconvenio", $this->form_encode_input($this->aplicaconvenio)); ?></span><span id="id_read_off_aplicaconvenio" class="css_read_off_aplicaconvenio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_aplicaconvenio; ?>">
 <input class="sc-js-input scFormObjectOdd css_aplicaconvenio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_aplicaconvenio" type=text name="aplicaconvenio" value="<?php echo $this->form_encode_input($aplicaconvenio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aplicaconvenio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aplicaconvenio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipotrabajdiscap']))
    {
        $this->nm_new_label['tipotrabajdiscap'] = "Tipo Trabaj Discap";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipotrabajdiscap = $this->tipotrabajdiscap;
   $sStyleHidden_tipotrabajdiscap = '';
   if (isset($this->nmgp_cmp_hidden['tipotrabajdiscap']) && $this->nmgp_cmp_hidden['tipotrabajdiscap'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipotrabajdiscap']);
       $sStyleHidden_tipotrabajdiscap = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipotrabajdiscap = 'display: none;';
   $sStyleReadInp_tipotrabajdiscap = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipotrabajdiscap']) && $this->nmgp_cmp_readonly['tipotrabajdiscap'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipotrabajdiscap']);
       $sStyleReadLab_tipotrabajdiscap = '';
       $sStyleReadInp_tipotrabajdiscap = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipotrabajdiscap']) && $this->nmgp_cmp_hidden['tipotrabajdiscap'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipotrabajdiscap" value="<?php echo $this->form_encode_input($tipotrabajdiscap) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipotrabajdiscap_label" id="hidden_field_label_tipotrabajdiscap" style="<?php echo $sStyleHidden_tipotrabajdiscap; ?>"><span id="id_label_tipotrabajdiscap"><?php echo $this->nm_new_label['tipotrabajdiscap']; ?></span></TD>
    <TD class="scFormDataOdd css_tipotrabajdiscap_line" id="hidden_field_data_tipotrabajdiscap" style="<?php echo $sStyleHidden_tipotrabajdiscap; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipotrabajdiscap_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipotrabajdiscap"]) &&  $this->nmgp_cmp_readonly["tipotrabajdiscap"] == "on") { 

 ?>
<input type="hidden" name="tipotrabajdiscap" value="<?php echo $this->form_encode_input($tipotrabajdiscap) . "\">" . $tipotrabajdiscap . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipotrabajdiscap" class="sc-ui-readonly-tipotrabajdiscap css_tipotrabajdiscap_line" style="<?php echo $sStyleReadLab_tipotrabajdiscap; ?>"><?php echo $this->form_format_readonly("tipotrabajdiscap", $this->form_encode_input($this->tipotrabajdiscap)); ?></span><span id="id_read_off_tipotrabajdiscap" class="css_read_off_tipotrabajdiscap<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipotrabajdiscap; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipotrabajdiscap_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipotrabajdiscap" type=text name="tipotrabajdiscap" value="<?php echo $this->form_encode_input($tipotrabajdiscap) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipotrabajdiscap_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipotrabajdiscap_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porcentajediscap']))
    {
        $this->nm_new_label['porcentajediscap'] = "Porcentaje Discap";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porcentajediscap = $this->porcentajediscap;
   $sStyleHidden_porcentajediscap = '';
   if (isset($this->nmgp_cmp_hidden['porcentajediscap']) && $this->nmgp_cmp_hidden['porcentajediscap'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porcentajediscap']);
       $sStyleHidden_porcentajediscap = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porcentajediscap = 'display: none;';
   $sStyleReadInp_porcentajediscap = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porcentajediscap']) && $this->nmgp_cmp_readonly['porcentajediscap'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porcentajediscap']);
       $sStyleReadLab_porcentajediscap = '';
       $sStyleReadInp_porcentajediscap = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porcentajediscap']) && $this->nmgp_cmp_hidden['porcentajediscap'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcentajediscap" value="<?php echo $this->form_encode_input($porcentajediscap) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porcentajediscap_label" id="hidden_field_label_porcentajediscap" style="<?php echo $sStyleHidden_porcentajediscap; ?>"><span id="id_label_porcentajediscap"><?php echo $this->nm_new_label['porcentajediscap']; ?></span></TD>
    <TD class="scFormDataOdd css_porcentajediscap_line" id="hidden_field_data_porcentajediscap" style="<?php echo $sStyleHidden_porcentajediscap; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porcentajediscap_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcentajediscap"]) &&  $this->nmgp_cmp_readonly["porcentajediscap"] == "on") { 

 ?>
<input type="hidden" name="porcentajediscap" value="<?php echo $this->form_encode_input($porcentajediscap) . "\">" . $porcentajediscap . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcentajediscap" class="sc-ui-readonly-porcentajediscap css_porcentajediscap_line" style="<?php echo $sStyleReadLab_porcentajediscap; ?>"><?php echo $this->form_format_readonly("porcentajediscap", $this->form_encode_input($this->porcentajediscap)); ?></span><span id="id_read_off_porcentajediscap" class="css_read_off_porcentajediscap<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcentajediscap; ?>">
 <input class="sc-js-input scFormObjectOdd css_porcentajediscap_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porcentajediscap" type=text name="porcentajediscap" value="<?php echo $this->form_encode_input($porcentajediscap) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcentajediscap_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcentajediscap_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipiddiscap']))
    {
        $this->nm_new_label['tipiddiscap'] = "Tip Id Discap";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipiddiscap = $this->tipiddiscap;
   $sStyleHidden_tipiddiscap = '';
   if (isset($this->nmgp_cmp_hidden['tipiddiscap']) && $this->nmgp_cmp_hidden['tipiddiscap'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipiddiscap']);
       $sStyleHidden_tipiddiscap = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipiddiscap = 'display: none;';
   $sStyleReadInp_tipiddiscap = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipiddiscap']) && $this->nmgp_cmp_readonly['tipiddiscap'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipiddiscap']);
       $sStyleReadLab_tipiddiscap = '';
       $sStyleReadInp_tipiddiscap = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipiddiscap']) && $this->nmgp_cmp_hidden['tipiddiscap'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipiddiscap" value="<?php echo $this->form_encode_input($tipiddiscap) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipiddiscap_label" id="hidden_field_label_tipiddiscap" style="<?php echo $sStyleHidden_tipiddiscap; ?>"><span id="id_label_tipiddiscap"><?php echo $this->nm_new_label['tipiddiscap']; ?></span></TD>
    <TD class="scFormDataOdd css_tipiddiscap_line" id="hidden_field_data_tipiddiscap" style="<?php echo $sStyleHidden_tipiddiscap; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipiddiscap_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipiddiscap"]) &&  $this->nmgp_cmp_readonly["tipiddiscap"] == "on") { 

 ?>
<input type="hidden" name="tipiddiscap" value="<?php echo $this->form_encode_input($tipiddiscap) . "\">" . $tipiddiscap . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipiddiscap" class="sc-ui-readonly-tipiddiscap css_tipiddiscap_line" style="<?php echo $sStyleReadLab_tipiddiscap; ?>"><?php echo $this->form_format_readonly("tipiddiscap", $this->form_encode_input($this->tipiddiscap)); ?></span><span id="id_read_off_tipiddiscap" class="css_read_off_tipiddiscap<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipiddiscap; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipiddiscap_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipiddiscap" type=text name="tipiddiscap" value="<?php echo $this->form_encode_input($tipiddiscap) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipiddiscap_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipiddiscap_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['iddiscap']))
    {
        $this->nm_new_label['iddiscap'] = "Id Discap";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $iddiscap = $this->iddiscap;
   $sStyleHidden_iddiscap = '';
   if (isset($this->nmgp_cmp_hidden['iddiscap']) && $this->nmgp_cmp_hidden['iddiscap'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['iddiscap']);
       $sStyleHidden_iddiscap = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_iddiscap = 'display: none;';
   $sStyleReadInp_iddiscap = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['iddiscap']) && $this->nmgp_cmp_readonly['iddiscap'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['iddiscap']);
       $sStyleReadLab_iddiscap = '';
       $sStyleReadInp_iddiscap = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['iddiscap']) && $this->nmgp_cmp_hidden['iddiscap'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="iddiscap" value="<?php echo $this->form_encode_input($iddiscap) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_iddiscap_label" id="hidden_field_label_iddiscap" style="<?php echo $sStyleHidden_iddiscap; ?>"><span id="id_label_iddiscap"><?php echo $this->nm_new_label['iddiscap']; ?></span></TD>
    <TD class="scFormDataOdd css_iddiscap_line" id="hidden_field_data_iddiscap" style="<?php echo $sStyleHidden_iddiscap; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_iddiscap_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["iddiscap"]) &&  $this->nmgp_cmp_readonly["iddiscap"] == "on") { 

 ?>
<input type="hidden" name="iddiscap" value="<?php echo $this->form_encode_input($iddiscap) . "\">" . $iddiscap . ""; ?>
<?php } else { ?>
<span id="id_read_on_iddiscap" class="sc-ui-readonly-iddiscap css_iddiscap_line" style="<?php echo $sStyleReadLab_iddiscap; ?>"><?php echo $this->form_format_readonly("iddiscap", $this->form_encode_input($this->iddiscap)); ?></span><span id="id_read_off_iddiscap" class="css_read_off_iddiscap<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_iddiscap; ?>">
 <input class="sc-js-input scFormObjectOdd css_iddiscap_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_iddiscap" type=text name="iddiscap" value="<?php echo $this->form_encode_input($iddiscap) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> maxlength=13 alt="{datatype: 'text', maxLength: 13, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_iddiscap_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_iddiscap_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01varias_secciones']))
    {
        $this->nm_new_label['rp01varias_secciones'] = "Rp 0 1varias Secciones";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01varias_secciones = $this->rp01varias_secciones;
   $sStyleHidden_rp01varias_secciones = '';
   if (isset($this->nmgp_cmp_hidden['rp01varias_secciones']) && $this->nmgp_cmp_hidden['rp01varias_secciones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01varias_secciones']);
       $sStyleHidden_rp01varias_secciones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01varias_secciones = 'display: none;';
   $sStyleReadInp_rp01varias_secciones = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01varias_secciones']) && $this->nmgp_cmp_readonly['rp01varias_secciones'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01varias_secciones']);
       $sStyleReadLab_rp01varias_secciones = '';
       $sStyleReadInp_rp01varias_secciones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01varias_secciones']) && $this->nmgp_cmp_hidden['rp01varias_secciones'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01varias_secciones" value="<?php echo $this->form_encode_input($rp01varias_secciones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01varias_secciones_label" id="hidden_field_label_rp01varias_secciones" style="<?php echo $sStyleHidden_rp01varias_secciones; ?>"><span id="id_label_rp01varias_secciones"><?php echo $this->nm_new_label['rp01varias_secciones']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01varias_secciones_line" id="hidden_field_data_rp01varias_secciones" style="<?php echo $sStyleHidden_rp01varias_secciones; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01varias_secciones_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01varias_secciones"]) &&  $this->nmgp_cmp_readonly["rp01varias_secciones"] == "on") { 

 ?>
<input type="hidden" name="rp01varias_secciones" value="<?php echo $this->form_encode_input($rp01varias_secciones) . "\">" . $rp01varias_secciones . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01varias_secciones" class="sc-ui-readonly-rp01varias_secciones css_rp01varias_secciones_line" style="<?php echo $sStyleReadLab_rp01varias_secciones; ?>"><?php echo $this->form_format_readonly("rp01varias_secciones", $this->form_encode_input($this->rp01varias_secciones)); ?></span><span id="id_read_off_rp01varias_secciones" class="css_read_off_rp01varias_secciones<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01varias_secciones; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01varias_secciones_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01varias_secciones" type=text name="rp01varias_secciones" value="<?php echo $this->form_encode_input($rp01varias_secciones) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01varias_secciones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01varias_secciones_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01cc']))
    {
        $this->nm_new_label['rp01cc'] = "Rp 0 1cc";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01cc = $this->rp01cc;
   $sStyleHidden_rp01cc = '';
   if (isset($this->nmgp_cmp_hidden['rp01cc']) && $this->nmgp_cmp_hidden['rp01cc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01cc']);
       $sStyleHidden_rp01cc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01cc = 'display: none;';
   $sStyleReadInp_rp01cc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01cc']) && $this->nmgp_cmp_readonly['rp01cc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01cc']);
       $sStyleReadLab_rp01cc = '';
       $sStyleReadInp_rp01cc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01cc']) && $this->nmgp_cmp_hidden['rp01cc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01cc" value="<?php echo $this->form_encode_input($rp01cc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01cc_label" id="hidden_field_label_rp01cc" style="<?php echo $sStyleHidden_rp01cc; ?>"><span id="id_label_rp01cc"><?php echo $this->nm_new_label['rp01cc']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01cc_line" id="hidden_field_data_rp01cc" style="<?php echo $sStyleHidden_rp01cc; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01cc_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01cc"]) &&  $this->nmgp_cmp_readonly["rp01cc"] == "on") { 

 ?>
<input type="hidden" name="rp01cc" value="<?php echo $this->form_encode_input($rp01cc) . "\">" . $rp01cc . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01cc" class="sc-ui-readonly-rp01cc css_rp01cc_line" style="<?php echo $sStyleReadLab_rp01cc; ?>"><?php echo $this->form_format_readonly("rp01cc", $this->form_encode_input($this->rp01cc)); ?></span><span id="id_read_off_rp01cc" class="css_read_off_rp01cc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01cc; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01cc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01cc" type=text name="rp01cc" value="<?php echo $this->form_encode_input($rp01cc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01cc']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01cc']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01cc']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01cc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01cc_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01observacion']))
    {
        $this->nm_new_label['rp01observacion'] = "Rp 0 1observacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01observacion = $this->rp01observacion;
   $sStyleHidden_rp01observacion = '';
   if (isset($this->nmgp_cmp_hidden['rp01observacion']) && $this->nmgp_cmp_hidden['rp01observacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01observacion']);
       $sStyleHidden_rp01observacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01observacion = 'display: none;';
   $sStyleReadInp_rp01observacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01observacion']) && $this->nmgp_cmp_readonly['rp01observacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01observacion']);
       $sStyleReadLab_rp01observacion = '';
       $sStyleReadInp_rp01observacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01observacion']) && $this->nmgp_cmp_hidden['rp01observacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01observacion" value="<?php echo $this->form_encode_input($rp01observacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01observacion_label" id="hidden_field_label_rp01observacion" style="<?php echo $sStyleHidden_rp01observacion; ?>"><span id="id_label_rp01observacion"><?php echo $this->nm_new_label['rp01observacion']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01observacion_line" id="hidden_field_data_rp01observacion" style="<?php echo $sStyleHidden_rp01observacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01observacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01observacion"]) &&  $this->nmgp_cmp_readonly["rp01observacion"] == "on") { 

 ?>
<input type="hidden" name="rp01observacion" value="<?php echo $this->form_encode_input($rp01observacion) . "\">" . $rp01observacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01observacion" class="sc-ui-readonly-rp01observacion css_rp01observacion_line" style="<?php echo $sStyleReadLab_rp01observacion; ?>"><?php echo $this->form_format_readonly("rp01observacion", $this->form_encode_input($this->rp01observacion)); ?></span><span id="id_read_off_rp01observacion" class="css_read_off_rp01observacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01observacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01observacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01observacion" type=text name="rp01observacion" value="<?php echo $this->form_encode_input($rp01observacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01observacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01observacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01iessconyugue']))
    {
        $this->nm_new_label['rp01iessconyugue'] = "Rp 0 1iessconyugue";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01iessconyugue = $this->rp01iessconyugue;
   $sStyleHidden_rp01iessconyugue = '';
   if (isset($this->nmgp_cmp_hidden['rp01iessconyugue']) && $this->nmgp_cmp_hidden['rp01iessconyugue'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01iessconyugue']);
       $sStyleHidden_rp01iessconyugue = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01iessconyugue = 'display: none;';
   $sStyleReadInp_rp01iessconyugue = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01iessconyugue']) && $this->nmgp_cmp_readonly['rp01iessconyugue'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01iessconyugue']);
       $sStyleReadLab_rp01iessconyugue = '';
       $sStyleReadInp_rp01iessconyugue = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01iessconyugue']) && $this->nmgp_cmp_hidden['rp01iessconyugue'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01iessconyugue" value="<?php echo $this->form_encode_input($rp01iessconyugue) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01iessconyugue_label" id="hidden_field_label_rp01iessconyugue" style="<?php echo $sStyleHidden_rp01iessconyugue; ?>"><span id="id_label_rp01iessconyugue"><?php echo $this->nm_new_label['rp01iessconyugue']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01iessconyugue_line" id="hidden_field_data_rp01iessconyugue" style="<?php echo $sStyleHidden_rp01iessconyugue; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01iessconyugue_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01iessconyugue"]) &&  $this->nmgp_cmp_readonly["rp01iessconyugue"] == "on") { 

 ?>
<input type="hidden" name="rp01iessconyugue" value="<?php echo $this->form_encode_input($rp01iessconyugue) . "\">" . $rp01iessconyugue . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01iessconyugue" class="sc-ui-readonly-rp01iessconyugue css_rp01iessconyugue_line" style="<?php echo $sStyleReadLab_rp01iessconyugue; ?>"><?php echo $this->form_format_readonly("rp01iessconyugue", $this->form_encode_input($this->rp01iessconyugue)); ?></span><span id="id_read_off_rp01iessconyugue" class="css_read_off_rp01iessconyugue<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01iessconyugue; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01iessconyugue_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01iessconyugue" type=text name="rp01iessconyugue" value="<?php echo $this->form_encode_input($rp01iessconyugue) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01iessconyugue_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01iessconyugue_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01tiporefrigerio']))
    {
        $this->nm_new_label['rp01tiporefrigerio'] = "Rp 0 1tiporefrigerio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01tiporefrigerio = $this->rp01tiporefrigerio;
   $sStyleHidden_rp01tiporefrigerio = '';
   if (isset($this->nmgp_cmp_hidden['rp01tiporefrigerio']) && $this->nmgp_cmp_hidden['rp01tiporefrigerio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01tiporefrigerio']);
       $sStyleHidden_rp01tiporefrigerio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01tiporefrigerio = 'display: none;';
   $sStyleReadInp_rp01tiporefrigerio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01tiporefrigerio']) && $this->nmgp_cmp_readonly['rp01tiporefrigerio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01tiporefrigerio']);
       $sStyleReadLab_rp01tiporefrigerio = '';
       $sStyleReadInp_rp01tiporefrigerio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01tiporefrigerio']) && $this->nmgp_cmp_hidden['rp01tiporefrigerio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01tiporefrigerio" value="<?php echo $this->form_encode_input($rp01tiporefrigerio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01tiporefrigerio_label" id="hidden_field_label_rp01tiporefrigerio" style="<?php echo $sStyleHidden_rp01tiporefrigerio; ?>"><span id="id_label_rp01tiporefrigerio"><?php echo $this->nm_new_label['rp01tiporefrigerio']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01tiporefrigerio_line" id="hidden_field_data_rp01tiporefrigerio" style="<?php echo $sStyleHidden_rp01tiporefrigerio; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01tiporefrigerio_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01tiporefrigerio"]) &&  $this->nmgp_cmp_readonly["rp01tiporefrigerio"] == "on") { 

 ?>
<input type="hidden" name="rp01tiporefrigerio" value="<?php echo $this->form_encode_input($rp01tiporefrigerio) . "\">" . $rp01tiporefrigerio . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01tiporefrigerio" class="sc-ui-readonly-rp01tiporefrigerio css_rp01tiporefrigerio_line" style="<?php echo $sStyleReadLab_rp01tiporefrigerio; ?>"><?php echo $this->form_format_readonly("rp01tiporefrigerio", $this->form_encode_input($this->rp01tiporefrigerio)); ?></span><span id="id_read_off_rp01tiporefrigerio" class="css_read_off_rp01tiporefrigerio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01tiporefrigerio; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01tiporefrigerio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01tiporefrigerio" type=text name="rp01tiporefrigerio" value="<?php echo $this->form_encode_input($rp01tiporefrigerio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01tiporefrigerio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01tiporefrigerio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idiomas']))
    {
        $this->nm_new_label['idiomas'] = "Idiomas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idiomas = $this->idiomas;
   $sStyleHidden_idiomas = '';
   if (isset($this->nmgp_cmp_hidden['idiomas']) && $this->nmgp_cmp_hidden['idiomas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idiomas']);
       $sStyleHidden_idiomas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idiomas = 'display: none;';
   $sStyleReadInp_idiomas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idiomas']) && $this->nmgp_cmp_readonly['idiomas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idiomas']);
       $sStyleReadLab_idiomas = '';
       $sStyleReadInp_idiomas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idiomas']) && $this->nmgp_cmp_hidden['idiomas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idiomas" value="<?php echo $this->form_encode_input($idiomas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idiomas_label" id="hidden_field_label_idiomas" style="<?php echo $sStyleHidden_idiomas; ?>"><span id="id_label_idiomas"><?php echo $this->nm_new_label['idiomas']; ?></span></TD>
    <TD class="scFormDataOdd css_idiomas_line" id="hidden_field_data_idiomas" style="<?php echo $sStyleHidden_idiomas; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idiomas_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idiomas"]) &&  $this->nmgp_cmp_readonly["idiomas"] == "on") { 

 ?>
<input type="hidden" name="idiomas" value="<?php echo $this->form_encode_input($idiomas) . "\">" . $idiomas . ""; ?>
<?php } else { ?>
<span id="id_read_on_idiomas" class="sc-ui-readonly-idiomas css_idiomas_line" style="<?php echo $sStyleReadLab_idiomas; ?>"><?php echo $this->form_format_readonly("idiomas", $this->form_encode_input($this->idiomas)); ?></span><span id="id_read_off_idiomas" class="css_read_off_idiomas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idiomas; ?>">
 <input class="sc-js-input scFormObjectOdd css_idiomas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idiomas" type=text name="idiomas" value="<?php echo $this->form_encode_input($idiomas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idiomas']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idiomas']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idiomas']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idiomas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idiomas_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emergencias']))
    {
        $this->nm_new_label['emergencias'] = "Emergencias";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emergencias = $this->emergencias;
   $sStyleHidden_emergencias = '';
   if (isset($this->nmgp_cmp_hidden['emergencias']) && $this->nmgp_cmp_hidden['emergencias'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emergencias']);
       $sStyleHidden_emergencias = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emergencias = 'display: none;';
   $sStyleReadInp_emergencias = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emergencias']) && $this->nmgp_cmp_readonly['emergencias'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emergencias']);
       $sStyleReadLab_emergencias = '';
       $sStyleReadInp_emergencias = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emergencias']) && $this->nmgp_cmp_hidden['emergencias'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emergencias" value="<?php echo $this->form_encode_input($emergencias) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_emergencias_label" id="hidden_field_label_emergencias" style="<?php echo $sStyleHidden_emergencias; ?>"><span id="id_label_emergencias"><?php echo $this->nm_new_label['emergencias']; ?></span></TD>
    <TD class="scFormDataOdd css_emergencias_line" id="hidden_field_data_emergencias" style="<?php echo $sStyleHidden_emergencias; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emergencias_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emergencias"]) &&  $this->nmgp_cmp_readonly["emergencias"] == "on") { 

 ?>
<input type="hidden" name="emergencias" value="<?php echo $this->form_encode_input($emergencias) . "\">" . $emergencias . ""; ?>
<?php } else { ?>
<span id="id_read_on_emergencias" class="sc-ui-readonly-emergencias css_emergencias_line" style="<?php echo $sStyleReadLab_emergencias; ?>"><?php echo $this->form_format_readonly("emergencias", $this->form_encode_input($this->emergencias)); ?></span><span id="id_read_off_emergencias" class="css_read_off_emergencias<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_emergencias; ?>">
 <input class="sc-js-input scFormObjectOdd css_emergencias_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_emergencias" type=text name="emergencias" value="<?php echo $this->form_encode_input($emergencias) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['emergencias']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['emergencias']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['emergencias']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emergencias_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emergencias_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01tipojornada']))
    {
        $this->nm_new_label['rp01tipojornada'] = "Rp 0 1tipojornada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01tipojornada = $this->rp01tipojornada;
   $sStyleHidden_rp01tipojornada = '';
   if (isset($this->nmgp_cmp_hidden['rp01tipojornada']) && $this->nmgp_cmp_hidden['rp01tipojornada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01tipojornada']);
       $sStyleHidden_rp01tipojornada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01tipojornada = 'display: none;';
   $sStyleReadInp_rp01tipojornada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01tipojornada']) && $this->nmgp_cmp_readonly['rp01tipojornada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01tipojornada']);
       $sStyleReadLab_rp01tipojornada = '';
       $sStyleReadInp_rp01tipojornada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01tipojornada']) && $this->nmgp_cmp_hidden['rp01tipojornada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01tipojornada" value="<?php echo $this->form_encode_input($rp01tipojornada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01tipojornada_label" id="hidden_field_label_rp01tipojornada" style="<?php echo $sStyleHidden_rp01tipojornada; ?>"><span id="id_label_rp01tipojornada"><?php echo $this->nm_new_label['rp01tipojornada']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01tipojornada']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['php_cmp_required']['rp01tipojornada'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rp01tipojornada_line" id="hidden_field_data_rp01tipojornada" style="<?php echo $sStyleHidden_rp01tipojornada; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01tipojornada_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01tipojornada"]) &&  $this->nmgp_cmp_readonly["rp01tipojornada"] == "on") { 

 ?>
<input type="hidden" name="rp01tipojornada" value="<?php echo $this->form_encode_input($rp01tipojornada) . "\">" . $rp01tipojornada . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01tipojornada" class="sc-ui-readonly-rp01tipojornada css_rp01tipojornada_line" style="<?php echo $sStyleReadLab_rp01tipojornada; ?>"><?php echo $this->form_format_readonly("rp01tipojornada", $this->form_encode_input($this->rp01tipojornada)); ?></span><span id="id_read_off_rp01tipojornada" class="css_read_off_rp01tipojornada<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01tipojornada; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01tipojornada_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01tipojornada" type=text name="rp01tipojornada" value="<?php echo $this->form_encode_input($rp01tipojornada) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01tipojornada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01tipojornada_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01numero_horas']))
    {
        $this->nm_new_label['rp01numero_horas'] = "Rp 0 1numero Horas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01numero_horas = $this->rp01numero_horas;
   $sStyleHidden_rp01numero_horas = '';
   if (isset($this->nmgp_cmp_hidden['rp01numero_horas']) && $this->nmgp_cmp_hidden['rp01numero_horas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01numero_horas']);
       $sStyleHidden_rp01numero_horas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01numero_horas = 'display: none;';
   $sStyleReadInp_rp01numero_horas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01numero_horas']) && $this->nmgp_cmp_readonly['rp01numero_horas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01numero_horas']);
       $sStyleReadLab_rp01numero_horas = '';
       $sStyleReadInp_rp01numero_horas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01numero_horas']) && $this->nmgp_cmp_hidden['rp01numero_horas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01numero_horas" value="<?php echo $this->form_encode_input($rp01numero_horas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01numero_horas_label" id="hidden_field_label_rp01numero_horas" style="<?php echo $sStyleHidden_rp01numero_horas; ?>"><span id="id_label_rp01numero_horas"><?php echo $this->nm_new_label['rp01numero_horas']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01numero_horas_line" id="hidden_field_data_rp01numero_horas" style="<?php echo $sStyleHidden_rp01numero_horas; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01numero_horas_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01numero_horas"]) &&  $this->nmgp_cmp_readonly["rp01numero_horas"] == "on") { 

 ?>
<input type="hidden" name="rp01numero_horas" value="<?php echo $this->form_encode_input($rp01numero_horas) . "\">" . $rp01numero_horas . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01numero_horas" class="sc-ui-readonly-rp01numero_horas css_rp01numero_horas_line" style="<?php echo $sStyleReadLab_rp01numero_horas; ?>"><?php echo $this->form_format_readonly("rp01numero_horas", $this->form_encode_input($this->rp01numero_horas)); ?></span><span id="id_read_off_rp01numero_horas" class="css_read_off_rp01numero_horas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01numero_horas; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01numero_horas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01numero_horas" type=text name="rp01numero_horas" value="<?php echo $this->form_encode_input($rp01numero_horas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01numero_horas']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01numero_horas']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01numero_horas']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01numero_horas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01numero_horas_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01emailpersonal']))
    {
        $this->nm_new_label['rp01emailpersonal'] = "Rp 0 1emailpersonal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01emailpersonal = $this->rp01emailpersonal;
   $sStyleHidden_rp01emailpersonal = '';
   if (isset($this->nmgp_cmp_hidden['rp01emailpersonal']) && $this->nmgp_cmp_hidden['rp01emailpersonal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01emailpersonal']);
       $sStyleHidden_rp01emailpersonal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01emailpersonal = 'display: none;';
   $sStyleReadInp_rp01emailpersonal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01emailpersonal']) && $this->nmgp_cmp_readonly['rp01emailpersonal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01emailpersonal']);
       $sStyleReadLab_rp01emailpersonal = '';
       $sStyleReadInp_rp01emailpersonal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01emailpersonal']) && $this->nmgp_cmp_hidden['rp01emailpersonal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01emailpersonal" value="<?php echo $this->form_encode_input($rp01emailpersonal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01emailpersonal_label" id="hidden_field_label_rp01emailpersonal" style="<?php echo $sStyleHidden_rp01emailpersonal; ?>"><span id="id_label_rp01emailpersonal"><?php echo $this->nm_new_label['rp01emailpersonal']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01emailpersonal_line" id="hidden_field_data_rp01emailpersonal" style="<?php echo $sStyleHidden_rp01emailpersonal; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01emailpersonal_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01emailpersonal"]) &&  $this->nmgp_cmp_readonly["rp01emailpersonal"] == "on") { 

 ?>
<input type="hidden" name="rp01emailpersonal" value="<?php echo $this->form_encode_input($rp01emailpersonal) . "\">" . $rp01emailpersonal . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01emailpersonal" class="sc-ui-readonly-rp01emailpersonal css_rp01emailpersonal_line" style="<?php echo $sStyleReadLab_rp01emailpersonal; ?>"><?php echo $this->form_format_readonly("rp01emailpersonal", $this->form_encode_input($this->rp01emailpersonal)); ?></span><span id="id_read_off_rp01emailpersonal" class="css_read_off_rp01emailpersonal<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01emailpersonal; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01emailpersonal_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01emailpersonal" type=text name="rp01emailpersonal" value="<?php echo $this->form_encode_input($rp01emailpersonal) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01emailpersonal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01emailpersonal_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01supervisadopor']))
    {
        $this->nm_new_label['rp01supervisadopor'] = "Rp 0 1supervisadopor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01supervisadopor = $this->rp01supervisadopor;
   $sStyleHidden_rp01supervisadopor = '';
   if (isset($this->nmgp_cmp_hidden['rp01supervisadopor']) && $this->nmgp_cmp_hidden['rp01supervisadopor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01supervisadopor']);
       $sStyleHidden_rp01supervisadopor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01supervisadopor = 'display: none;';
   $sStyleReadInp_rp01supervisadopor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01supervisadopor']) && $this->nmgp_cmp_readonly['rp01supervisadopor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01supervisadopor']);
       $sStyleReadLab_rp01supervisadopor = '';
       $sStyleReadInp_rp01supervisadopor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01supervisadopor']) && $this->nmgp_cmp_hidden['rp01supervisadopor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01supervisadopor" value="<?php echo $this->form_encode_input($rp01supervisadopor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01supervisadopor_label" id="hidden_field_label_rp01supervisadopor" style="<?php echo $sStyleHidden_rp01supervisadopor; ?>"><span id="id_label_rp01supervisadopor"><?php echo $this->nm_new_label['rp01supervisadopor']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01supervisadopor_line" id="hidden_field_data_rp01supervisadopor" style="<?php echo $sStyleHidden_rp01supervisadopor; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01supervisadopor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01supervisadopor"]) &&  $this->nmgp_cmp_readonly["rp01supervisadopor"] == "on") { 

 ?>
<input type="hidden" name="rp01supervisadopor" value="<?php echo $this->form_encode_input($rp01supervisadopor) . "\">" . $rp01supervisadopor . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01supervisadopor" class="sc-ui-readonly-rp01supervisadopor css_rp01supervisadopor_line" style="<?php echo $sStyleReadLab_rp01supervisadopor; ?>"><?php echo $this->form_format_readonly("rp01supervisadopor", $this->form_encode_input($this->rp01supervisadopor)); ?></span><span id="id_read_off_rp01supervisadopor" class="css_read_off_rp01supervisadopor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01supervisadopor; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01supervisadopor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01supervisadopor" type=text name="rp01supervisadopor" value="<?php echo $this->form_encode_input($rp01supervisadopor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01supervisadopor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01supervisadopor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01zonaderiesgo']))
    {
        $this->nm_new_label['rp01zonaderiesgo'] = "Rp 0 1zonaderiesgo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01zonaderiesgo = $this->rp01zonaderiesgo;
   $sStyleHidden_rp01zonaderiesgo = '';
   if (isset($this->nmgp_cmp_hidden['rp01zonaderiesgo']) && $this->nmgp_cmp_hidden['rp01zonaderiesgo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01zonaderiesgo']);
       $sStyleHidden_rp01zonaderiesgo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01zonaderiesgo = 'display: none;';
   $sStyleReadInp_rp01zonaderiesgo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01zonaderiesgo']) && $this->nmgp_cmp_readonly['rp01zonaderiesgo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01zonaderiesgo']);
       $sStyleReadLab_rp01zonaderiesgo = '';
       $sStyleReadInp_rp01zonaderiesgo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01zonaderiesgo']) && $this->nmgp_cmp_hidden['rp01zonaderiesgo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01zonaderiesgo" value="<?php echo $this->form_encode_input($rp01zonaderiesgo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01zonaderiesgo_label" id="hidden_field_label_rp01zonaderiesgo" style="<?php echo $sStyleHidden_rp01zonaderiesgo; ?>"><span id="id_label_rp01zonaderiesgo"><?php echo $this->nm_new_label['rp01zonaderiesgo']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01zonaderiesgo_line" id="hidden_field_data_rp01zonaderiesgo" style="<?php echo $sStyleHidden_rp01zonaderiesgo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01zonaderiesgo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01zonaderiesgo"]) &&  $this->nmgp_cmp_readonly["rp01zonaderiesgo"] == "on") { 

 ?>
<input type="hidden" name="rp01zonaderiesgo" value="<?php echo $this->form_encode_input($rp01zonaderiesgo) . "\">" . $rp01zonaderiesgo . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01zonaderiesgo" class="sc-ui-readonly-rp01zonaderiesgo css_rp01zonaderiesgo_line" style="<?php echo $sStyleReadLab_rp01zonaderiesgo; ?>"><?php echo $this->form_format_readonly("rp01zonaderiesgo", $this->form_encode_input($this->rp01zonaderiesgo)); ?></span><span id="id_read_off_rp01zonaderiesgo" class="css_read_off_rp01zonaderiesgo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01zonaderiesgo; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01zonaderiesgo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01zonaderiesgo" type=text name="rp01zonaderiesgo" value="<?php echo $this->form_encode_input($rp01zonaderiesgo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01zonaderiesgo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01zonaderiesgo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01refpersnom1']))
    {
        $this->nm_new_label['rp01refpersnom1'] = "Rp 0 1refpersnom 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01refpersnom1 = $this->rp01refpersnom1;
   $sStyleHidden_rp01refpersnom1 = '';
   if (isset($this->nmgp_cmp_hidden['rp01refpersnom1']) && $this->nmgp_cmp_hidden['rp01refpersnom1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01refpersnom1']);
       $sStyleHidden_rp01refpersnom1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01refpersnom1 = 'display: none;';
   $sStyleReadInp_rp01refpersnom1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01refpersnom1']) && $this->nmgp_cmp_readonly['rp01refpersnom1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01refpersnom1']);
       $sStyleReadLab_rp01refpersnom1 = '';
       $sStyleReadInp_rp01refpersnom1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01refpersnom1']) && $this->nmgp_cmp_hidden['rp01refpersnom1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01refpersnom1" value="<?php echo $this->form_encode_input($rp01refpersnom1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01refpersnom1_label" id="hidden_field_label_rp01refpersnom1" style="<?php echo $sStyleHidden_rp01refpersnom1; ?>"><span id="id_label_rp01refpersnom1"><?php echo $this->nm_new_label['rp01refpersnom1']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01refpersnom1_line" id="hidden_field_data_rp01refpersnom1" style="<?php echo $sStyleHidden_rp01refpersnom1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01refpersnom1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01refpersnom1"]) &&  $this->nmgp_cmp_readonly["rp01refpersnom1"] == "on") { 

 ?>
<input type="hidden" name="rp01refpersnom1" value="<?php echo $this->form_encode_input($rp01refpersnom1) . "\">" . $rp01refpersnom1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01refpersnom1" class="sc-ui-readonly-rp01refpersnom1 css_rp01refpersnom1_line" style="<?php echo $sStyleReadLab_rp01refpersnom1; ?>"><?php echo $this->form_format_readonly("rp01refpersnom1", $this->form_encode_input($this->rp01refpersnom1)); ?></span><span id="id_read_off_rp01refpersnom1" class="css_read_off_rp01refpersnom1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01refpersnom1; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01refpersnom1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01refpersnom1" type=text name="rp01refpersnom1" value="<?php echo $this->form_encode_input($rp01refpersnom1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01refpersnom1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01refpersnom1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01refpersparen1']))
    {
        $this->nm_new_label['rp01refpersparen1'] = "Rp 0 1refpersparen 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01refpersparen1 = $this->rp01refpersparen1;
   $sStyleHidden_rp01refpersparen1 = '';
   if (isset($this->nmgp_cmp_hidden['rp01refpersparen1']) && $this->nmgp_cmp_hidden['rp01refpersparen1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01refpersparen1']);
       $sStyleHidden_rp01refpersparen1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01refpersparen1 = 'display: none;';
   $sStyleReadInp_rp01refpersparen1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01refpersparen1']) && $this->nmgp_cmp_readonly['rp01refpersparen1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01refpersparen1']);
       $sStyleReadLab_rp01refpersparen1 = '';
       $sStyleReadInp_rp01refpersparen1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01refpersparen1']) && $this->nmgp_cmp_hidden['rp01refpersparen1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01refpersparen1" value="<?php echo $this->form_encode_input($rp01refpersparen1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01refpersparen1_label" id="hidden_field_label_rp01refpersparen1" style="<?php echo $sStyleHidden_rp01refpersparen1; ?>"><span id="id_label_rp01refpersparen1"><?php echo $this->nm_new_label['rp01refpersparen1']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01refpersparen1_line" id="hidden_field_data_rp01refpersparen1" style="<?php echo $sStyleHidden_rp01refpersparen1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01refpersparen1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01refpersparen1"]) &&  $this->nmgp_cmp_readonly["rp01refpersparen1"] == "on") { 

 ?>
<input type="hidden" name="rp01refpersparen1" value="<?php echo $this->form_encode_input($rp01refpersparen1) . "\">" . $rp01refpersparen1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01refpersparen1" class="sc-ui-readonly-rp01refpersparen1 css_rp01refpersparen1_line" style="<?php echo $sStyleReadLab_rp01refpersparen1; ?>"><?php echo $this->form_format_readonly("rp01refpersparen1", $this->form_encode_input($this->rp01refpersparen1)); ?></span><span id="id_read_off_rp01refpersparen1" class="css_read_off_rp01refpersparen1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01refpersparen1; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01refpersparen1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01refpersparen1" type=text name="rp01refpersparen1" value="<?php echo $this->form_encode_input($rp01refpersparen1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01refpersparen1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01refpersparen1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01refperstel1']))
    {
        $this->nm_new_label['rp01refperstel1'] = "Rp 0 1refperstel 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01refperstel1 = $this->rp01refperstel1;
   $sStyleHidden_rp01refperstel1 = '';
   if (isset($this->nmgp_cmp_hidden['rp01refperstel1']) && $this->nmgp_cmp_hidden['rp01refperstel1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01refperstel1']);
       $sStyleHidden_rp01refperstel1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01refperstel1 = 'display: none;';
   $sStyleReadInp_rp01refperstel1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01refperstel1']) && $this->nmgp_cmp_readonly['rp01refperstel1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01refperstel1']);
       $sStyleReadLab_rp01refperstel1 = '';
       $sStyleReadInp_rp01refperstel1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01refperstel1']) && $this->nmgp_cmp_hidden['rp01refperstel1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01refperstel1" value="<?php echo $this->form_encode_input($rp01refperstel1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01refperstel1_label" id="hidden_field_label_rp01refperstel1" style="<?php echo $sStyleHidden_rp01refperstel1; ?>"><span id="id_label_rp01refperstel1"><?php echo $this->nm_new_label['rp01refperstel1']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01refperstel1_line" id="hidden_field_data_rp01refperstel1" style="<?php echo $sStyleHidden_rp01refperstel1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01refperstel1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01refperstel1"]) &&  $this->nmgp_cmp_readonly["rp01refperstel1"] == "on") { 

 ?>
<input type="hidden" name="rp01refperstel1" value="<?php echo $this->form_encode_input($rp01refperstel1) . "\">" . $rp01refperstel1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01refperstel1" class="sc-ui-readonly-rp01refperstel1 css_rp01refperstel1_line" style="<?php echo $sStyleReadLab_rp01refperstel1; ?>"><?php echo $this->form_format_readonly("rp01refperstel1", $this->form_encode_input($this->rp01refperstel1)); ?></span><span id="id_read_off_rp01refperstel1" class="css_read_off_rp01refperstel1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01refperstel1; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01refperstel1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01refperstel1" type=text name="rp01refperstel1" value="<?php echo $this->form_encode_input($rp01refperstel1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01refperstel1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01refperstel1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01refpersnom2']))
    {
        $this->nm_new_label['rp01refpersnom2'] = "Rp 0 1refpersnom 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01refpersnom2 = $this->rp01refpersnom2;
   $sStyleHidden_rp01refpersnom2 = '';
   if (isset($this->nmgp_cmp_hidden['rp01refpersnom2']) && $this->nmgp_cmp_hidden['rp01refpersnom2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01refpersnom2']);
       $sStyleHidden_rp01refpersnom2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01refpersnom2 = 'display: none;';
   $sStyleReadInp_rp01refpersnom2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01refpersnom2']) && $this->nmgp_cmp_readonly['rp01refpersnom2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01refpersnom2']);
       $sStyleReadLab_rp01refpersnom2 = '';
       $sStyleReadInp_rp01refpersnom2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01refpersnom2']) && $this->nmgp_cmp_hidden['rp01refpersnom2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01refpersnom2" value="<?php echo $this->form_encode_input($rp01refpersnom2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01refpersnom2_label" id="hidden_field_label_rp01refpersnom2" style="<?php echo $sStyleHidden_rp01refpersnom2; ?>"><span id="id_label_rp01refpersnom2"><?php echo $this->nm_new_label['rp01refpersnom2']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01refpersnom2_line" id="hidden_field_data_rp01refpersnom2" style="<?php echo $sStyleHidden_rp01refpersnom2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01refpersnom2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01refpersnom2"]) &&  $this->nmgp_cmp_readonly["rp01refpersnom2"] == "on") { 

 ?>
<input type="hidden" name="rp01refpersnom2" value="<?php echo $this->form_encode_input($rp01refpersnom2) . "\">" . $rp01refpersnom2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01refpersnom2" class="sc-ui-readonly-rp01refpersnom2 css_rp01refpersnom2_line" style="<?php echo $sStyleReadLab_rp01refpersnom2; ?>"><?php echo $this->form_format_readonly("rp01refpersnom2", $this->form_encode_input($this->rp01refpersnom2)); ?></span><span id="id_read_off_rp01refpersnom2" class="css_read_off_rp01refpersnom2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01refpersnom2; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01refpersnom2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01refpersnom2" type=text name="rp01refpersnom2" value="<?php echo $this->form_encode_input($rp01refpersnom2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01refpersnom2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01refpersnom2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01refpersparen2']))
    {
        $this->nm_new_label['rp01refpersparen2'] = "Rp 0 1refpersparen 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01refpersparen2 = $this->rp01refpersparen2;
   $sStyleHidden_rp01refpersparen2 = '';
   if (isset($this->nmgp_cmp_hidden['rp01refpersparen2']) && $this->nmgp_cmp_hidden['rp01refpersparen2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01refpersparen2']);
       $sStyleHidden_rp01refpersparen2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01refpersparen2 = 'display: none;';
   $sStyleReadInp_rp01refpersparen2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01refpersparen2']) && $this->nmgp_cmp_readonly['rp01refpersparen2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01refpersparen2']);
       $sStyleReadLab_rp01refpersparen2 = '';
       $sStyleReadInp_rp01refpersparen2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01refpersparen2']) && $this->nmgp_cmp_hidden['rp01refpersparen2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01refpersparen2" value="<?php echo $this->form_encode_input($rp01refpersparen2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01refpersparen2_label" id="hidden_field_label_rp01refpersparen2" style="<?php echo $sStyleHidden_rp01refpersparen2; ?>"><span id="id_label_rp01refpersparen2"><?php echo $this->nm_new_label['rp01refpersparen2']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01refpersparen2_line" id="hidden_field_data_rp01refpersparen2" style="<?php echo $sStyleHidden_rp01refpersparen2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01refpersparen2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01refpersparen2"]) &&  $this->nmgp_cmp_readonly["rp01refpersparen2"] == "on") { 

 ?>
<input type="hidden" name="rp01refpersparen2" value="<?php echo $this->form_encode_input($rp01refpersparen2) . "\">" . $rp01refpersparen2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01refpersparen2" class="sc-ui-readonly-rp01refpersparen2 css_rp01refpersparen2_line" style="<?php echo $sStyleReadLab_rp01refpersparen2; ?>"><?php echo $this->form_format_readonly("rp01refpersparen2", $this->form_encode_input($this->rp01refpersparen2)); ?></span><span id="id_read_off_rp01refpersparen2" class="css_read_off_rp01refpersparen2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01refpersparen2; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01refpersparen2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01refpersparen2" type=text name="rp01refpersparen2" value="<?php echo $this->form_encode_input($rp01refpersparen2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01refpersparen2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01refpersparen2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01refperstel2']))
    {
        $this->nm_new_label['rp01refperstel2'] = "Rp 0 1refperstel 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01refperstel2 = $this->rp01refperstel2;
   $sStyleHidden_rp01refperstel2 = '';
   if (isset($this->nmgp_cmp_hidden['rp01refperstel2']) && $this->nmgp_cmp_hidden['rp01refperstel2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01refperstel2']);
       $sStyleHidden_rp01refperstel2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01refperstel2 = 'display: none;';
   $sStyleReadInp_rp01refperstel2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01refperstel2']) && $this->nmgp_cmp_readonly['rp01refperstel2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01refperstel2']);
       $sStyleReadLab_rp01refperstel2 = '';
       $sStyleReadInp_rp01refperstel2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01refperstel2']) && $this->nmgp_cmp_hidden['rp01refperstel2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01refperstel2" value="<?php echo $this->form_encode_input($rp01refperstel2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01refperstel2_label" id="hidden_field_label_rp01refperstel2" style="<?php echo $sStyleHidden_rp01refperstel2; ?>"><span id="id_label_rp01refperstel2"><?php echo $this->nm_new_label['rp01refperstel2']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01refperstel2_line" id="hidden_field_data_rp01refperstel2" style="<?php echo $sStyleHidden_rp01refperstel2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01refperstel2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01refperstel2"]) &&  $this->nmgp_cmp_readonly["rp01refperstel2"] == "on") { 

 ?>
<input type="hidden" name="rp01refperstel2" value="<?php echo $this->form_encode_input($rp01refperstel2) . "\">" . $rp01refperstel2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01refperstel2" class="sc-ui-readonly-rp01refperstel2 css_rp01refperstel2_line" style="<?php echo $sStyleReadLab_rp01refperstel2; ?>"><?php echo $this->form_format_readonly("rp01refperstel2", $this->form_encode_input($this->rp01refperstel2)); ?></span><span id="id_read_off_rp01refperstel2" class="css_read_off_rp01refperstel2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01refperstel2; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01refperstel2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01refperstel2" type=text name="rp01refperstel2" value="<?php echo $this->form_encode_input($rp01refperstel2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01refperstel2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01refperstel2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01tipovivienda']))
    {
        $this->nm_new_label['rp01tipovivienda'] = "Rp 0 1tipovivienda";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01tipovivienda = $this->rp01tipovivienda;
   $sStyleHidden_rp01tipovivienda = '';
   if (isset($this->nmgp_cmp_hidden['rp01tipovivienda']) && $this->nmgp_cmp_hidden['rp01tipovivienda'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01tipovivienda']);
       $sStyleHidden_rp01tipovivienda = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01tipovivienda = 'display: none;';
   $sStyleReadInp_rp01tipovivienda = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01tipovivienda']) && $this->nmgp_cmp_readonly['rp01tipovivienda'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01tipovivienda']);
       $sStyleReadLab_rp01tipovivienda = '';
       $sStyleReadInp_rp01tipovivienda = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01tipovivienda']) && $this->nmgp_cmp_hidden['rp01tipovivienda'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01tipovivienda" value="<?php echo $this->form_encode_input($rp01tipovivienda) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01tipovivienda_label" id="hidden_field_label_rp01tipovivienda" style="<?php echo $sStyleHidden_rp01tipovivienda; ?>"><span id="id_label_rp01tipovivienda"><?php echo $this->nm_new_label['rp01tipovivienda']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01tipovivienda_line" id="hidden_field_data_rp01tipovivienda" style="<?php echo $sStyleHidden_rp01tipovivienda; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01tipovivienda_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01tipovivienda"]) &&  $this->nmgp_cmp_readonly["rp01tipovivienda"] == "on") { 

 ?>
<input type="hidden" name="rp01tipovivienda" value="<?php echo $this->form_encode_input($rp01tipovivienda) . "\">" . $rp01tipovivienda . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01tipovivienda" class="sc-ui-readonly-rp01tipovivienda css_rp01tipovivienda_line" style="<?php echo $sStyleReadLab_rp01tipovivienda; ?>"><?php echo $this->form_format_readonly("rp01tipovivienda", $this->form_encode_input($this->rp01tipovivienda)); ?></span><span id="id_read_off_rp01tipovivienda" class="css_read_off_rp01tipovivienda<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01tipovivienda; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01tipovivienda_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01tipovivienda" type=text name="rp01tipovivienda" value="<?php echo $this->form_encode_input($rp01tipovivienda) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01tipovivienda_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01tipovivienda_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01serviciosbasicos']))
    {
        $this->nm_new_label['rp01serviciosbasicos'] = "Rp 0 1serviciosbasicos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01serviciosbasicos = $this->rp01serviciosbasicos;
   $sStyleHidden_rp01serviciosbasicos = '';
   if (isset($this->nmgp_cmp_hidden['rp01serviciosbasicos']) && $this->nmgp_cmp_hidden['rp01serviciosbasicos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01serviciosbasicos']);
       $sStyleHidden_rp01serviciosbasicos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01serviciosbasicos = 'display: none;';
   $sStyleReadInp_rp01serviciosbasicos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01serviciosbasicos']) && $this->nmgp_cmp_readonly['rp01serviciosbasicos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01serviciosbasicos']);
       $sStyleReadLab_rp01serviciosbasicos = '';
       $sStyleReadInp_rp01serviciosbasicos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01serviciosbasicos']) && $this->nmgp_cmp_hidden['rp01serviciosbasicos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01serviciosbasicos" value="<?php echo $this->form_encode_input($rp01serviciosbasicos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01serviciosbasicos_label" id="hidden_field_label_rp01serviciosbasicos" style="<?php echo $sStyleHidden_rp01serviciosbasicos; ?>"><span id="id_label_rp01serviciosbasicos"><?php echo $this->nm_new_label['rp01serviciosbasicos']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01serviciosbasicos_line" id="hidden_field_data_rp01serviciosbasicos" style="<?php echo $sStyleHidden_rp01serviciosbasicos; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01serviciosbasicos_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01serviciosbasicos"]) &&  $this->nmgp_cmp_readonly["rp01serviciosbasicos"] == "on") { 

 ?>
<input type="hidden" name="rp01serviciosbasicos" value="<?php echo $this->form_encode_input($rp01serviciosbasicos) . "\">" . $rp01serviciosbasicos . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01serviciosbasicos" class="sc-ui-readonly-rp01serviciosbasicos css_rp01serviciosbasicos_line" style="<?php echo $sStyleReadLab_rp01serviciosbasicos; ?>"><?php echo $this->form_format_readonly("rp01serviciosbasicos", $this->form_encode_input($this->rp01serviciosbasicos)); ?></span><span id="id_read_off_rp01serviciosbasicos" class="css_read_off_rp01serviciosbasicos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01serviciosbasicos; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01serviciosbasicos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01serviciosbasicos" type=text name="rp01serviciosbasicos" value="<?php echo $this->form_encode_input($rp01serviciosbasicos) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01serviciosbasicos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01serviciosbasicos_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01viviendadetalle']))
    {
        $this->nm_new_label['rp01viviendadetalle'] = "Rp 0 1viviendadetalle";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01viviendadetalle = $this->rp01viviendadetalle;
   $sStyleHidden_rp01viviendadetalle = '';
   if (isset($this->nmgp_cmp_hidden['rp01viviendadetalle']) && $this->nmgp_cmp_hidden['rp01viviendadetalle'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01viviendadetalle']);
       $sStyleHidden_rp01viviendadetalle = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01viviendadetalle = 'display: none;';
   $sStyleReadInp_rp01viviendadetalle = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01viviendadetalle']) && $this->nmgp_cmp_readonly['rp01viviendadetalle'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01viviendadetalle']);
       $sStyleReadLab_rp01viviendadetalle = '';
       $sStyleReadInp_rp01viviendadetalle = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01viviendadetalle']) && $this->nmgp_cmp_hidden['rp01viviendadetalle'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01viviendadetalle" value="<?php echo $this->form_encode_input($rp01viviendadetalle) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01viviendadetalle_label" id="hidden_field_label_rp01viviendadetalle" style="<?php echo $sStyleHidden_rp01viviendadetalle; ?>"><span id="id_label_rp01viviendadetalle"><?php echo $this->nm_new_label['rp01viviendadetalle']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01viviendadetalle_line" id="hidden_field_data_rp01viviendadetalle" style="<?php echo $sStyleHidden_rp01viviendadetalle; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01viviendadetalle_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01viviendadetalle"]) &&  $this->nmgp_cmp_readonly["rp01viviendadetalle"] == "on") { 

 ?>
<input type="hidden" name="rp01viviendadetalle" value="<?php echo $this->form_encode_input($rp01viviendadetalle) . "\">" . $rp01viviendadetalle . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01viviendadetalle" class="sc-ui-readonly-rp01viviendadetalle css_rp01viviendadetalle_line" style="<?php echo $sStyleReadLab_rp01viviendadetalle; ?>"><?php echo $this->form_format_readonly("rp01viviendadetalle", $this->form_encode_input($this->rp01viviendadetalle)); ?></span><span id="id_read_off_rp01viviendadetalle" class="css_read_off_rp01viviendadetalle<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01viviendadetalle; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01viviendadetalle_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01viviendadetalle" type=text name="rp01viviendadetalle" value="<?php echo $this->form_encode_input($rp01viviendadetalle) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01viviendadetalle_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01viviendadetalle_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01dormitorios']))
    {
        $this->nm_new_label['rp01dormitorios'] = "Rp 0 1dormitorios";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01dormitorios = $this->rp01dormitorios;
   $sStyleHidden_rp01dormitorios = '';
   if (isset($this->nmgp_cmp_hidden['rp01dormitorios']) && $this->nmgp_cmp_hidden['rp01dormitorios'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01dormitorios']);
       $sStyleHidden_rp01dormitorios = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01dormitorios = 'display: none;';
   $sStyleReadInp_rp01dormitorios = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01dormitorios']) && $this->nmgp_cmp_readonly['rp01dormitorios'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01dormitorios']);
       $sStyleReadLab_rp01dormitorios = '';
       $sStyleReadInp_rp01dormitorios = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01dormitorios']) && $this->nmgp_cmp_hidden['rp01dormitorios'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01dormitorios" value="<?php echo $this->form_encode_input($rp01dormitorios) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01dormitorios_label" id="hidden_field_label_rp01dormitorios" style="<?php echo $sStyleHidden_rp01dormitorios; ?>"><span id="id_label_rp01dormitorios"><?php echo $this->nm_new_label['rp01dormitorios']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01dormitorios_line" id="hidden_field_data_rp01dormitorios" style="<?php echo $sStyleHidden_rp01dormitorios; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01dormitorios_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01dormitorios"]) &&  $this->nmgp_cmp_readonly["rp01dormitorios"] == "on") { 

 ?>
<input type="hidden" name="rp01dormitorios" value="<?php echo $this->form_encode_input($rp01dormitorios) . "\">" . $rp01dormitorios . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01dormitorios" class="sc-ui-readonly-rp01dormitorios css_rp01dormitorios_line" style="<?php echo $sStyleReadLab_rp01dormitorios; ?>"><?php echo $this->form_format_readonly("rp01dormitorios", $this->form_encode_input($this->rp01dormitorios)); ?></span><span id="id_read_off_rp01dormitorios" class="css_read_off_rp01dormitorios<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01dormitorios; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01dormitorios_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01dormitorios" type=text name="rp01dormitorios" value="<?php echo $this->form_encode_input($rp01dormitorios) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01dormitorios']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01dormitorios']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01dormitorios']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01dormitorios_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01dormitorios_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01sala']))
    {
        $this->nm_new_label['rp01sala'] = "Rp 0 1sala";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01sala = $this->rp01sala;
   $sStyleHidden_rp01sala = '';
   if (isset($this->nmgp_cmp_hidden['rp01sala']) && $this->nmgp_cmp_hidden['rp01sala'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01sala']);
       $sStyleHidden_rp01sala = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01sala = 'display: none;';
   $sStyleReadInp_rp01sala = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01sala']) && $this->nmgp_cmp_readonly['rp01sala'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01sala']);
       $sStyleReadLab_rp01sala = '';
       $sStyleReadInp_rp01sala = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01sala']) && $this->nmgp_cmp_hidden['rp01sala'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01sala" value="<?php echo $this->form_encode_input($rp01sala) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01sala_label" id="hidden_field_label_rp01sala" style="<?php echo $sStyleHidden_rp01sala; ?>"><span id="id_label_rp01sala"><?php echo $this->nm_new_label['rp01sala']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01sala_line" id="hidden_field_data_rp01sala" style="<?php echo $sStyleHidden_rp01sala; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01sala_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01sala"]) &&  $this->nmgp_cmp_readonly["rp01sala"] == "on") { 

 ?>
<input type="hidden" name="rp01sala" value="<?php echo $this->form_encode_input($rp01sala) . "\">" . $rp01sala . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01sala" class="sc-ui-readonly-rp01sala css_rp01sala_line" style="<?php echo $sStyleReadLab_rp01sala; ?>"><?php echo $this->form_format_readonly("rp01sala", $this->form_encode_input($this->rp01sala)); ?></span><span id="id_read_off_rp01sala" class="css_read_off_rp01sala<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01sala; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01sala_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01sala" type=text name="rp01sala" value="<?php echo $this->form_encode_input($rp01sala) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01sala']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01sala']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01sala']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01sala_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01sala_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01comedor']))
    {
        $this->nm_new_label['rp01comedor'] = "Rp 0 1comedor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01comedor = $this->rp01comedor;
   $sStyleHidden_rp01comedor = '';
   if (isset($this->nmgp_cmp_hidden['rp01comedor']) && $this->nmgp_cmp_hidden['rp01comedor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01comedor']);
       $sStyleHidden_rp01comedor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01comedor = 'display: none;';
   $sStyleReadInp_rp01comedor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01comedor']) && $this->nmgp_cmp_readonly['rp01comedor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01comedor']);
       $sStyleReadLab_rp01comedor = '';
       $sStyleReadInp_rp01comedor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01comedor']) && $this->nmgp_cmp_hidden['rp01comedor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01comedor" value="<?php echo $this->form_encode_input($rp01comedor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01comedor_label" id="hidden_field_label_rp01comedor" style="<?php echo $sStyleHidden_rp01comedor; ?>"><span id="id_label_rp01comedor"><?php echo $this->nm_new_label['rp01comedor']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01comedor_line" id="hidden_field_data_rp01comedor" style="<?php echo $sStyleHidden_rp01comedor; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01comedor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01comedor"]) &&  $this->nmgp_cmp_readonly["rp01comedor"] == "on") { 

 ?>
<input type="hidden" name="rp01comedor" value="<?php echo $this->form_encode_input($rp01comedor) . "\">" . $rp01comedor . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01comedor" class="sc-ui-readonly-rp01comedor css_rp01comedor_line" style="<?php echo $sStyleReadLab_rp01comedor; ?>"><?php echo $this->form_format_readonly("rp01comedor", $this->form_encode_input($this->rp01comedor)); ?></span><span id="id_read_off_rp01comedor" class="css_read_off_rp01comedor<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01comedor; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01comedor_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01comedor" type=text name="rp01comedor" value="<?php echo $this->form_encode_input($rp01comedor) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01comedor']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01comedor']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01comedor']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01comedor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01comedor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01banos']))
    {
        $this->nm_new_label['rp01banos'] = "Rp 0 1banos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01banos = $this->rp01banos;
   $sStyleHidden_rp01banos = '';
   if (isset($this->nmgp_cmp_hidden['rp01banos']) && $this->nmgp_cmp_hidden['rp01banos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01banos']);
       $sStyleHidden_rp01banos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01banos = 'display: none;';
   $sStyleReadInp_rp01banos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01banos']) && $this->nmgp_cmp_readonly['rp01banos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01banos']);
       $sStyleReadLab_rp01banos = '';
       $sStyleReadInp_rp01banos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01banos']) && $this->nmgp_cmp_hidden['rp01banos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01banos" value="<?php echo $this->form_encode_input($rp01banos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01banos_label" id="hidden_field_label_rp01banos" style="<?php echo $sStyleHidden_rp01banos; ?>"><span id="id_label_rp01banos"><?php echo $this->nm_new_label['rp01banos']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01banos_line" id="hidden_field_data_rp01banos" style="<?php echo $sStyleHidden_rp01banos; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01banos_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01banos"]) &&  $this->nmgp_cmp_readonly["rp01banos"] == "on") { 

 ?>
<input type="hidden" name="rp01banos" value="<?php echo $this->form_encode_input($rp01banos) . "\">" . $rp01banos . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01banos" class="sc-ui-readonly-rp01banos css_rp01banos_line" style="<?php echo $sStyleReadLab_rp01banos; ?>"><?php echo $this->form_format_readonly("rp01banos", $this->form_encode_input($this->rp01banos)); ?></span><span id="id_read_off_rp01banos" class="css_read_off_rp01banos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01banos; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01banos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01banos" type=text name="rp01banos" value="<?php echo $this->form_encode_input($rp01banos) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rp01banos']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rp01banos']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rp01banos']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01banos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01banos_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01estudiosrealizados']))
    {
        $this->nm_new_label['rp01estudiosrealizados'] = "Rp 0 1estudiosrealizados";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01estudiosrealizados = $this->rp01estudiosrealizados;
   $sStyleHidden_rp01estudiosrealizados = '';
   if (isset($this->nmgp_cmp_hidden['rp01estudiosrealizados']) && $this->nmgp_cmp_hidden['rp01estudiosrealizados'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01estudiosrealizados']);
       $sStyleHidden_rp01estudiosrealizados = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01estudiosrealizados = 'display: none;';
   $sStyleReadInp_rp01estudiosrealizados = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01estudiosrealizados']) && $this->nmgp_cmp_readonly['rp01estudiosrealizados'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01estudiosrealizados']);
       $sStyleReadLab_rp01estudiosrealizados = '';
       $sStyleReadInp_rp01estudiosrealizados = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01estudiosrealizados']) && $this->nmgp_cmp_hidden['rp01estudiosrealizados'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01estudiosrealizados" value="<?php echo $this->form_encode_input($rp01estudiosrealizados) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01estudiosrealizados_label" id="hidden_field_label_rp01estudiosrealizados" style="<?php echo $sStyleHidden_rp01estudiosrealizados; ?>"><span id="id_label_rp01estudiosrealizados"><?php echo $this->nm_new_label['rp01estudiosrealizados']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01estudiosrealizados_line" id="hidden_field_data_rp01estudiosrealizados" style="<?php echo $sStyleHidden_rp01estudiosrealizados; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01estudiosrealizados_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01estudiosrealizados"]) &&  $this->nmgp_cmp_readonly["rp01estudiosrealizados"] == "on") { 

 ?>
<input type="hidden" name="rp01estudiosrealizados" value="<?php echo $this->form_encode_input($rp01estudiosrealizados) . "\">" . $rp01estudiosrealizados . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01estudiosrealizados" class="sc-ui-readonly-rp01estudiosrealizados css_rp01estudiosrealizados_line" style="<?php echo $sStyleReadLab_rp01estudiosrealizados; ?>"><?php echo $this->form_format_readonly("rp01estudiosrealizados", $this->form_encode_input($this->rp01estudiosrealizados)); ?></span><span id="id_read_off_rp01estudiosrealizados" class="css_read_off_rp01estudiosrealizados<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01estudiosrealizados; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01estudiosrealizados_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01estudiosrealizados" type=text name="rp01estudiosrealizados" value="<?php echo $this->form_encode_input($rp01estudiosrealizados) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01estudiosrealizados_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01estudiosrealizados_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01ruta1']))
    {
        $this->nm_new_label['rp01ruta1'] = "Rp 0 1ruta 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01ruta1 = $this->rp01ruta1;
   $sStyleHidden_rp01ruta1 = '';
   if (isset($this->nmgp_cmp_hidden['rp01ruta1']) && $this->nmgp_cmp_hidden['rp01ruta1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01ruta1']);
       $sStyleHidden_rp01ruta1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01ruta1 = 'display: none;';
   $sStyleReadInp_rp01ruta1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01ruta1']) && $this->nmgp_cmp_readonly['rp01ruta1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01ruta1']);
       $sStyleReadLab_rp01ruta1 = '';
       $sStyleReadInp_rp01ruta1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01ruta1']) && $this->nmgp_cmp_hidden['rp01ruta1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01ruta1" value="<?php echo $this->form_encode_input($rp01ruta1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01ruta1_label" id="hidden_field_label_rp01ruta1" style="<?php echo $sStyleHidden_rp01ruta1; ?>"><span id="id_label_rp01ruta1"><?php echo $this->nm_new_label['rp01ruta1']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01ruta1_line" id="hidden_field_data_rp01ruta1" style="<?php echo $sStyleHidden_rp01ruta1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01ruta1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01ruta1"]) &&  $this->nmgp_cmp_readonly["rp01ruta1"] == "on") { 

 ?>
<input type="hidden" name="rp01ruta1" value="<?php echo $this->form_encode_input($rp01ruta1) . "\">" . $rp01ruta1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01ruta1" class="sc-ui-readonly-rp01ruta1 css_rp01ruta1_line" style="<?php echo $sStyleReadLab_rp01ruta1; ?>"><?php echo $this->form_format_readonly("rp01ruta1", $this->form_encode_input($this->rp01ruta1)); ?></span><span id="id_read_off_rp01ruta1" class="css_read_off_rp01ruta1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01ruta1; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01ruta1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01ruta1" type=text name="rp01ruta1" value="<?php echo $this->form_encode_input($rp01ruta1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01ruta1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01ruta1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01ruta2']))
    {
        $this->nm_new_label['rp01ruta2'] = "Rp 0 1ruta 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01ruta2 = $this->rp01ruta2;
   $sStyleHidden_rp01ruta2 = '';
   if (isset($this->nmgp_cmp_hidden['rp01ruta2']) && $this->nmgp_cmp_hidden['rp01ruta2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01ruta2']);
       $sStyleHidden_rp01ruta2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01ruta2 = 'display: none;';
   $sStyleReadInp_rp01ruta2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01ruta2']) && $this->nmgp_cmp_readonly['rp01ruta2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01ruta2']);
       $sStyleReadLab_rp01ruta2 = '';
       $sStyleReadInp_rp01ruta2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01ruta2']) && $this->nmgp_cmp_hidden['rp01ruta2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01ruta2" value="<?php echo $this->form_encode_input($rp01ruta2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01ruta2_label" id="hidden_field_label_rp01ruta2" style="<?php echo $sStyleHidden_rp01ruta2; ?>"><span id="id_label_rp01ruta2"><?php echo $this->nm_new_label['rp01ruta2']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01ruta2_line" id="hidden_field_data_rp01ruta2" style="<?php echo $sStyleHidden_rp01ruta2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01ruta2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01ruta2"]) &&  $this->nmgp_cmp_readonly["rp01ruta2"] == "on") { 

 ?>
<input type="hidden" name="rp01ruta2" value="<?php echo $this->form_encode_input($rp01ruta2) . "\">" . $rp01ruta2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01ruta2" class="sc-ui-readonly-rp01ruta2 css_rp01ruta2_line" style="<?php echo $sStyleReadLab_rp01ruta2; ?>"><?php echo $this->form_format_readonly("rp01ruta2", $this->form_encode_input($this->rp01ruta2)); ?></span><span id="id_read_off_rp01ruta2" class="css_read_off_rp01ruta2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01ruta2; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01ruta2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01ruta2" type=text name="rp01ruta2" value="<?php echo $this->form_encode_input($rp01ruta2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01ruta2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01ruta2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01ruta3']))
    {
        $this->nm_new_label['rp01ruta3'] = "Rp 0 1ruta 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01ruta3 = $this->rp01ruta3;
   $sStyleHidden_rp01ruta3 = '';
   if (isset($this->nmgp_cmp_hidden['rp01ruta3']) && $this->nmgp_cmp_hidden['rp01ruta3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01ruta3']);
       $sStyleHidden_rp01ruta3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01ruta3 = 'display: none;';
   $sStyleReadInp_rp01ruta3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01ruta3']) && $this->nmgp_cmp_readonly['rp01ruta3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01ruta3']);
       $sStyleReadLab_rp01ruta3 = '';
       $sStyleReadInp_rp01ruta3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01ruta3']) && $this->nmgp_cmp_hidden['rp01ruta3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01ruta3" value="<?php echo $this->form_encode_input($rp01ruta3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01ruta3_label" id="hidden_field_label_rp01ruta3" style="<?php echo $sStyleHidden_rp01ruta3; ?>"><span id="id_label_rp01ruta3"><?php echo $this->nm_new_label['rp01ruta3']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01ruta3_line" id="hidden_field_data_rp01ruta3" style="<?php echo $sStyleHidden_rp01ruta3; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01ruta3_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01ruta3"]) &&  $this->nmgp_cmp_readonly["rp01ruta3"] == "on") { 

 ?>
<input type="hidden" name="rp01ruta3" value="<?php echo $this->form_encode_input($rp01ruta3) . "\">" . $rp01ruta3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01ruta3" class="sc-ui-readonly-rp01ruta3 css_rp01ruta3_line" style="<?php echo $sStyleReadLab_rp01ruta3; ?>"><?php echo $this->form_format_readonly("rp01ruta3", $this->form_encode_input($this->rp01ruta3)); ?></span><span id="id_read_off_rp01ruta3" class="css_read_off_rp01ruta3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01ruta3; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01ruta3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01ruta3" type=text name="rp01ruta3" value="<?php echo $this->form_encode_input($rp01ruta3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01ruta3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01ruta3_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rp01actividadesextras']))
    {
        $this->nm_new_label['rp01actividadesextras'] = "Rp 0 1actividadesextras";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rp01actividadesextras = $this->rp01actividadesextras;
   $sStyleHidden_rp01actividadesextras = '';
   if (isset($this->nmgp_cmp_hidden['rp01actividadesextras']) && $this->nmgp_cmp_hidden['rp01actividadesextras'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rp01actividadesextras']);
       $sStyleHidden_rp01actividadesextras = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rp01actividadesextras = 'display: none;';
   $sStyleReadInp_rp01actividadesextras = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rp01actividadesextras']) && $this->nmgp_cmp_readonly['rp01actividadesextras'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rp01actividadesextras']);
       $sStyleReadLab_rp01actividadesextras = '';
       $sStyleReadInp_rp01actividadesextras = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rp01actividadesextras']) && $this->nmgp_cmp_hidden['rp01actividadesextras'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rp01actividadesextras" value="<?php echo $this->form_encode_input($rp01actividadesextras) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rp01actividadesextras_label" id="hidden_field_label_rp01actividadesextras" style="<?php echo $sStyleHidden_rp01actividadesextras; ?>"><span id="id_label_rp01actividadesextras"><?php echo $this->nm_new_label['rp01actividadesextras']; ?></span></TD>
    <TD class="scFormDataOdd css_rp01actividadesextras_line" id="hidden_field_data_rp01actividadesextras" style="<?php echo $sStyleHidden_rp01actividadesextras; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rp01actividadesextras_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rp01actividadesextras"]) &&  $this->nmgp_cmp_readonly["rp01actividadesextras"] == "on") { 

 ?>
<input type="hidden" name="rp01actividadesextras" value="<?php echo $this->form_encode_input($rp01actividadesextras) . "\">" . $rp01actividadesextras . ""; ?>
<?php } else { ?>
<span id="id_read_on_rp01actividadesextras" class="sc-ui-readonly-rp01actividadesextras css_rp01actividadesextras_line" style="<?php echo $sStyleReadLab_rp01actividadesextras; ?>"><?php echo $this->form_format_readonly("rp01actividadesextras", $this->form_encode_input($this->rp01actividadesextras)); ?></span><span id="id_read_off_rp01actividadesextras" class="css_read_off_rp01actividadesextras<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rp01actividadesextras; ?>">
 <input class="sc-js-input scFormObjectOdd css_rp01actividadesextras_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rp01actividadesextras" type=text name="rp01actividadesextras" value="<?php echo $this->form_encode_input($rp01actividadesextras) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rp01actividadesextras_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rp01actividadesextras_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_maeemp");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_maeemp");
 parent.scAjaxDetailHeight("form_maeemp", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_maeemp", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_maeemp", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
		    if ($("#sc_b_hlp_t").hasClass("disabled")) {
		        return;
		    }
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-8").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-9").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-10").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
		    if ($("#brec_b").hasClass("disabled")) {
		        return;
		    }
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-11").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-12").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-13").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-14").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_maeemp']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
