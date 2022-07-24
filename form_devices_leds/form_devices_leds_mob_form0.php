<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: unsafe-url");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " devices"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " devices"); } ?></TITLE>
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
.css_read_off_ult_fecha button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rfid_fecha button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_devices_leds/form_devices_leds_mob_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_devices_leds_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_devices_leds_mob_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_devices_leds']['error_buffer']) && '' != $_SESSION['scriptcase']['form_devices_leds']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_devices_leds']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("form_devices_leds_mob_js0.php");
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
<form  name="F1" method="post" enctype="multipart/form-data" 
               action="form_devices_leds_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['insert_validation']; ?>">
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_devices_leds_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_devices_leds_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['fast_search'][2] : "";
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
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['new'];
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
        $buttonMacroDisabled = 'sc-unique-btn-16';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['insert'];
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
        $buttonMacroDisabled = 'sc-unique-btn-17';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['bcancelar'];
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
        $buttonMacroDisabled = 'sc-unique-btn-18';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['update'];
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
        $buttonMacroDisabled = 'sc-unique-btn-19';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['delete'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><input type="hidden" name="foto1_ul_name" id="id_sc_field_foto1_ul_name" value="<?php echo $this->form_encode_input($this->foto1_ul_name);?>">
<input type="hidden" name="foto1_ul_type" id="id_sc_field_foto1_ul_type" value="<?php echo $this->form_encode_input($this->foto1_ul_type);?>">
<input type="hidden" name="foto2_ul_name" id="id_sc_field_foto2_ul_name" value="<?php echo $this->form_encode_input($this->foto2_ul_name);?>">
<input type="hidden" name="foto2_ul_type" id="id_sc_field_foto2_ul_type" value="<?php echo $this->form_encode_input($this->foto2_ul_type);?>">
<input type="hidden" name="foto3_ul_name" id="id_sc_field_foto3_ul_name" value="<?php echo $this->form_encode_input($this->foto3_ul_name);?>">
<input type="hidden" name="foto3_ul_type" id="id_sc_field_foto3_ul_type" value="<?php echo $this->form_encode_input($this->foto3_ul_type);?>">
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cod_device']))
           {
               $this->nmgp_cmp_readonly['cod_device'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_device']))
    {
        $this->nm_new_label['cod_device'] = "Cod Device";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_device = $this->cod_device;
   $sStyleHidden_cod_device = '';
   if (isset($this->nmgp_cmp_hidden['cod_device']) && $this->nmgp_cmp_hidden['cod_device'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_device']);
       $sStyleHidden_cod_device = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_device = 'display: none;';
   $sStyleReadInp_cod_device = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cod_device"]) &&  $this->nmgp_cmp_readonly["cod_device"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_device']);
       $sStyleReadLab_cod_device = '';
       $sStyleReadInp_cod_device = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_device']) && $this->nmgp_cmp_hidden['cod_device'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_device" value="<?php echo $this->form_encode_input($cod_device) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_cod_device_line" id="hidden_field_data_cod_device" style="<?php echo $sStyleHidden_cod_device; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_device_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cod_device_label" style=""><span id="id_label_cod_device"><?php echo $this->nm_new_label['cod_device']; ?></span></span><br><span id="id_read_on_cod_device" class="css_cod_device_line" style="<?php echo $sStyleReadLab_cod_device; ?>"><?php echo $this->form_format_readonly("cod_device", $this->form_encode_input($this->cod_device)); ?></span><span id="id_read_off_cod_device" class="css_read_off_cod_device" style="<?php echo $sStyleReadInp_cod_device; ?>"><input type="hidden" name="cod_device" value="<?php echo $this->form_encode_input($cod_device) . "\">"?><span id="id_ajax_label_cod_device"><?php echo nl2br($cod_device); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_device_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_device_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_activo']))
    {
        $this->nm_new_label['cod_activo'] = "Cod Activo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_activo = $this->cod_activo;
   $sStyleHidden_cod_activo = '';
   if (isset($this->nmgp_cmp_hidden['cod_activo']) && $this->nmgp_cmp_hidden['cod_activo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_activo']);
       $sStyleHidden_cod_activo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_activo = 'display: none;';
   $sStyleReadInp_cod_activo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cod_activo']) && $this->nmgp_cmp_readonly['cod_activo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_activo']);
       $sStyleReadLab_cod_activo = '';
       $sStyleReadInp_cod_activo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_activo']) && $this->nmgp_cmp_hidden['cod_activo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_activo" value="<?php echo $this->form_encode_input($cod_activo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cod_activo_line" id="hidden_field_data_cod_activo" style="<?php echo $sStyleHidden_cod_activo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_activo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cod_activo_label" style=""><span id="id_label_cod_activo"><?php echo $this->nm_new_label['cod_activo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_activo"]) &&  $this->nmgp_cmp_readonly["cod_activo"] == "on") { 

 ?>
<input type="hidden" name="cod_activo" value="<?php echo $this->form_encode_input($cod_activo) . "\">" . $cod_activo . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_activo" class="sc-ui-readonly-cod_activo css_cod_activo_line" style="<?php echo $sStyleReadLab_cod_activo; ?>"><?php echo $this->form_format_readonly("cod_activo", $this->form_encode_input($this->cod_activo)); ?></span><span id="id_read_off_cod_activo" class="css_read_off_cod_activo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_activo; ?>">
 <input class="sc-js-input scFormObjectOdd css_cod_activo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_activo" type=text name="cod_activo" value="<?php echo $this->form_encode_input($cod_activo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_activo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_activo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_grupo']))
    {
        $this->nm_new_label['cod_grupo'] = "Cod Grupo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_grupo = $this->cod_grupo;
   $sStyleHidden_cod_grupo = '';
   if (isset($this->nmgp_cmp_hidden['cod_grupo']) && $this->nmgp_cmp_hidden['cod_grupo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_grupo']);
       $sStyleHidden_cod_grupo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_grupo = 'display: none;';
   $sStyleReadInp_cod_grupo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cod_grupo']) && $this->nmgp_cmp_readonly['cod_grupo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_grupo']);
       $sStyleReadLab_cod_grupo = '';
       $sStyleReadInp_cod_grupo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_grupo']) && $this->nmgp_cmp_hidden['cod_grupo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_grupo" value="<?php echo $this->form_encode_input($cod_grupo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cod_grupo_line" id="hidden_field_data_cod_grupo" style="<?php echo $sStyleHidden_cod_grupo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_grupo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cod_grupo_label" style=""><span id="id_label_cod_grupo"><?php echo $this->nm_new_label['cod_grupo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_grupo"]) &&  $this->nmgp_cmp_readonly["cod_grupo"] == "on") { 

 ?>
<input type="hidden" name="cod_grupo" value="<?php echo $this->form_encode_input($cod_grupo) . "\">" . $cod_grupo . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_grupo" class="sc-ui-readonly-cod_grupo css_cod_grupo_line" style="<?php echo $sStyleReadLab_cod_grupo; ?>"><?php echo $this->form_format_readonly("cod_grupo", $this->form_encode_input($this->cod_grupo)); ?></span><span id="id_read_off_cod_grupo" class="css_read_off_cod_grupo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_grupo; ?>">
 <input class="sc-js-input scFormObjectOdd css_cod_grupo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_grupo" type=text name="cod_grupo" value="<?php echo $this->form_encode_input($cod_grupo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_grupo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_grupo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['device_name']))
    {
        $this->nm_new_label['device_name'] = "Device Name";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $device_name = $this->device_name;
   $sStyleHidden_device_name = '';
   if (isset($this->nmgp_cmp_hidden['device_name']) && $this->nmgp_cmp_hidden['device_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['device_name']);
       $sStyleHidden_device_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_device_name = 'display: none;';
   $sStyleReadInp_device_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['device_name']) && $this->nmgp_cmp_readonly['device_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['device_name']);
       $sStyleReadLab_device_name = '';
       $sStyleReadInp_device_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['device_name']) && $this->nmgp_cmp_hidden['device_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="device_name" value="<?php echo $this->form_encode_input($device_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_device_name_line" id="hidden_field_data_device_name" style="<?php echo $sStyleHidden_device_name; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_device_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_device_name_label" style=""><span id="id_label_device_name"><?php echo $this->nm_new_label['device_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["device_name"]) &&  $this->nmgp_cmp_readonly["device_name"] == "on") { 

 ?>
<input type="hidden" name="device_name" value="<?php echo $this->form_encode_input($device_name) . "\">" . $device_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_device_name" class="sc-ui-readonly-device_name css_device_name_line" style="<?php echo $sStyleReadLab_device_name; ?>"><?php echo $this->form_format_readonly("device_name", $this->form_encode_input($this->device_name)); ?></span><span id="id_read_off_device_name" class="css_read_off_device_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_device_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_device_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_device_name" type=text name="device_name" value="<?php echo $this->form_encode_input($device_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_device_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_device_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['activa']))
    {
        $this->nm_new_label['activa'] = "Activa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $activa = $this->activa;
   $sStyleHidden_activa = '';
   if (isset($this->nmgp_cmp_hidden['activa']) && $this->nmgp_cmp_hidden['activa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['activa']);
       $sStyleHidden_activa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_activa = 'display: none;';
   $sStyleReadInp_activa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['activa']) && $this->nmgp_cmp_readonly['activa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['activa']);
       $sStyleReadLab_activa = '';
       $sStyleReadInp_activa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['activa']) && $this->nmgp_cmp_hidden['activa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="activa" value="<?php echo $this->form_encode_input($activa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_activa_line" id="hidden_field_data_activa" style="<?php echo $sStyleHidden_activa; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_activa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_activa_label" style=""><span id="id_label_activa"><?php echo $this->nm_new_label['activa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["activa"]) &&  $this->nmgp_cmp_readonly["activa"] == "on") { 

 ?>
<input type="hidden" name="activa" value="<?php echo $this->form_encode_input($activa) . "\">" . $activa . ""; ?>
<?php } else { ?>
<span id="id_read_on_activa" class="sc-ui-readonly-activa css_activa_line" style="<?php echo $sStyleReadLab_activa; ?>"><?php echo $this->form_format_readonly("activa", $this->form_encode_input($this->activa)); ?></span><span id="id_read_off_activa" class="css_read_off_activa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_activa; ?>">
 <input class="sc-js-input scFormObjectOdd css_activa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_activa" type=text name="activa" value="<?php echo $this->form_encode_input($activa) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['activa']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['activa']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['activa']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estado']))
    {
        $this->nm_new_label['estado'] = "Estado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado = $this->estado;
   $sStyleHidden_estado = '';
   if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado']);
       $sStyleHidden_estado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado = 'display: none;';
   $sStyleReadInp_estado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estado']) && $this->nmgp_cmp_readonly['estado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado']);
       $sStyleReadLab_estado = '';
       $sStyleReadInp_estado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado']) && $this->nmgp_cmp_hidden['estado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estado" value="<?php echo $this->form_encode_input($estado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estado_line" id="hidden_field_data_estado" style="<?php echo $sStyleHidden_estado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estado_label" style=""><span id="id_label_estado"><?php echo $this->nm_new_label['estado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado"]) &&  $this->nmgp_cmp_readonly["estado"] == "on") { 

 ?>
<input type="hidden" name="estado" value="<?php echo $this->form_encode_input($estado) . "\">" . $estado . ""; ?>
<?php } else { ?>
<span id="id_read_on_estado" class="sc-ui-readonly-estado css_estado_line" style="<?php echo $sStyleReadLab_estado; ?>"><?php echo $this->form_format_readonly("estado", $this->form_encode_input($this->estado)); ?></span><span id="id_read_off_estado" class="css_read_off_estado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estado; ?>">
 <input class="sc-js-input scFormObjectOdd css_estado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estado" type=text name="estado" value="<?php echo $this->form_encode_input($estado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['estado']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['estado']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['estado']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ult_rfid']))
    {
        $this->nm_new_label['ult_rfid'] = "Ult Rfid";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ult_rfid = $this->ult_rfid;
   $sStyleHidden_ult_rfid = '';
   if (isset($this->nmgp_cmp_hidden['ult_rfid']) && $this->nmgp_cmp_hidden['ult_rfid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ult_rfid']);
       $sStyleHidden_ult_rfid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ult_rfid = 'display: none;';
   $sStyleReadInp_ult_rfid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ult_rfid']) && $this->nmgp_cmp_readonly['ult_rfid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ult_rfid']);
       $sStyleReadLab_ult_rfid = '';
       $sStyleReadInp_ult_rfid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ult_rfid']) && $this->nmgp_cmp_hidden['ult_rfid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ult_rfid" value="<?php echo $this->form_encode_input($ult_rfid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ult_rfid_line" id="hidden_field_data_ult_rfid" style="<?php echo $sStyleHidden_ult_rfid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ult_rfid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ult_rfid_label" style=""><span id="id_label_ult_rfid"><?php echo $this->nm_new_label['ult_rfid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ult_rfid"]) &&  $this->nmgp_cmp_readonly["ult_rfid"] == "on") { 

 ?>
<input type="hidden" name="ult_rfid" value="<?php echo $this->form_encode_input($ult_rfid) . "\">" . $ult_rfid . ""; ?>
<?php } else { ?>
<span id="id_read_on_ult_rfid" class="sc-ui-readonly-ult_rfid css_ult_rfid_line" style="<?php echo $sStyleReadLab_ult_rfid; ?>"><?php echo $this->form_format_readonly("ult_rfid", $this->form_encode_input($this->ult_rfid)); ?></span><span id="id_read_off_ult_rfid" class="css_read_off_ult_rfid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ult_rfid; ?>">
 <input class="sc-js-input scFormObjectOdd css_ult_rfid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ult_rfid" type=text name="ult_rfid" value="<?php echo $this->form_encode_input($ult_rfid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ult_rfid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ult_rfid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ult_fecha']))
    {
        $this->nm_new_label['ult_fecha'] = "Ult Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_ult_fecha = $this->ult_fecha;
   if (strlen($this->ult_fecha_hora) > 8 ) {$this->ult_fecha_hora = substr($this->ult_fecha_hora, 0, 8);}
   $this->ult_fecha .= ' ' . $this->ult_fecha_hora;
   $this->ult_fecha  = trim($this->ult_fecha);
   $ult_fecha = $this->ult_fecha;
   $sStyleHidden_ult_fecha = '';
   if (isset($this->nmgp_cmp_hidden['ult_fecha']) && $this->nmgp_cmp_hidden['ult_fecha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ult_fecha']);
       $sStyleHidden_ult_fecha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ult_fecha = 'display: none;';
   $sStyleReadInp_ult_fecha = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ult_fecha']) && $this->nmgp_cmp_readonly['ult_fecha'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ult_fecha']);
       $sStyleReadLab_ult_fecha = '';
       $sStyleReadInp_ult_fecha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ult_fecha']) && $this->nmgp_cmp_hidden['ult_fecha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ult_fecha" value="<?php echo $this->form_encode_input($ult_fecha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ult_fecha_line" id="hidden_field_data_ult_fecha" style="<?php echo $sStyleHidden_ult_fecha; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ult_fecha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ult_fecha_label" style=""><span id="id_label_ult_fecha"><?php echo $this->nm_new_label['ult_fecha']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ult_fecha"]) &&  $this->nmgp_cmp_readonly["ult_fecha"] == "on") { 

 ?>
<input type="hidden" name="ult_fecha" value="<?php echo $this->form_encode_input($ult_fecha) . "\">" . $ult_fecha . ""; ?>
<?php } else { ?>
<span id="id_read_on_ult_fecha" class="sc-ui-readonly-ult_fecha css_ult_fecha_line" style="<?php echo $sStyleReadLab_ult_fecha; ?>"><?php echo $this->form_format_readonly("ult_fecha", $this->form_encode_input($ult_fecha)); ?></span><span id="id_read_off_ult_fecha" class="css_read_off_ult_fecha<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ult_fecha; ?>"><?php
$tmp_form_data = $this->field_config['ult_fecha']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_ult_fecha_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ult_fecha" type=text name="ult_fecha" value="<?php echo $this->form_encode_input($ult_fecha) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['ult_fecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['ult_fecha']['date_format']; ?>', timeSep: '<?php echo $this->field_config['ult_fecha']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ult_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ult_fecha_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->ult_fecha = $old_dt_ult_fecha;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valor_default']))
    {
        $this->nm_new_label['valor_default'] = "Valor Default";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valor_default = $this->valor_default;
   $sStyleHidden_valor_default = '';
   if (isset($this->nmgp_cmp_hidden['valor_default']) && $this->nmgp_cmp_hidden['valor_default'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valor_default']);
       $sStyleHidden_valor_default = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valor_default = 'display: none;';
   $sStyleReadInp_valor_default = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valor_default']) && $this->nmgp_cmp_readonly['valor_default'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valor_default']);
       $sStyleReadLab_valor_default = '';
       $sStyleReadInp_valor_default = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valor_default']) && $this->nmgp_cmp_hidden['valor_default'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valor_default" value="<?php echo $this->form_encode_input($valor_default) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valor_default_line" id="hidden_field_data_valor_default" style="<?php echo $sStyleHidden_valor_default; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valor_default_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valor_default_label" style=""><span id="id_label_valor_default"><?php echo $this->nm_new_label['valor_default']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valor_default"]) &&  $this->nmgp_cmp_readonly["valor_default"] == "on") { 

 ?>
<input type="hidden" name="valor_default" value="<?php echo $this->form_encode_input($valor_default) . "\">" . $valor_default . ""; ?>
<?php } else { ?>
<span id="id_read_on_valor_default" class="sc-ui-readonly-valor_default css_valor_default_line" style="<?php echo $sStyleReadLab_valor_default; ?>"><?php echo $this->form_format_readonly("valor_default", $this->form_encode_input($this->valor_default)); ?></span><span id="id_read_off_valor_default" class="css_read_off_valor_default<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valor_default; ?>">
 <input class="sc-js-input scFormObjectOdd css_valor_default_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valor_default" type=text name="valor_default" value="<?php echo $this->form_encode_input($valor_default) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_default']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valor_default']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valor_default']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valor_default']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valor_default_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valor_default_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['acepta_tiempo']))
    {
        $this->nm_new_label['acepta_tiempo'] = "Acepta Tiempo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acepta_tiempo = $this->acepta_tiempo;
   $sStyleHidden_acepta_tiempo = '';
   if (isset($this->nmgp_cmp_hidden['acepta_tiempo']) && $this->nmgp_cmp_hidden['acepta_tiempo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acepta_tiempo']);
       $sStyleHidden_acepta_tiempo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acepta_tiempo = 'display: none;';
   $sStyleReadInp_acepta_tiempo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acepta_tiempo']) && $this->nmgp_cmp_readonly['acepta_tiempo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acepta_tiempo']);
       $sStyleReadLab_acepta_tiempo = '';
       $sStyleReadInp_acepta_tiempo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acepta_tiempo']) && $this->nmgp_cmp_hidden['acepta_tiempo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acepta_tiempo" value="<?php echo $this->form_encode_input($acepta_tiempo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_acepta_tiempo_line" id="hidden_field_data_acepta_tiempo" style="<?php echo $sStyleHidden_acepta_tiempo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acepta_tiempo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_acepta_tiempo_label" style=""><span id="id_label_acepta_tiempo"><?php echo $this->nm_new_label['acepta_tiempo']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acepta_tiempo"]) &&  $this->nmgp_cmp_readonly["acepta_tiempo"] == "on") { 

 ?>
<input type="hidden" name="acepta_tiempo" value="<?php echo $this->form_encode_input($acepta_tiempo) . "\">" . $acepta_tiempo . ""; ?>
<?php } else { ?>
<span id="id_read_on_acepta_tiempo" class="sc-ui-readonly-acepta_tiempo css_acepta_tiempo_line" style="<?php echo $sStyleReadLab_acepta_tiempo; ?>"><?php echo $this->form_format_readonly("acepta_tiempo", $this->form_encode_input($this->acepta_tiempo)); ?></span><span id="id_read_off_acepta_tiempo" class="css_read_off_acepta_tiempo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acepta_tiempo; ?>">
 <input class="sc-js-input scFormObjectOdd css_acepta_tiempo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acepta_tiempo" type=text name="acepta_tiempo" value="<?php echo $this->form_encode_input($acepta_tiempo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['acepta_tiempo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['acepta_tiempo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['acepta_tiempo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acepta_tiempo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acepta_tiempo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['acepta_tokens']))
    {
        $this->nm_new_label['acepta_tokens'] = "Acepta Tokens";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acepta_tokens = $this->acepta_tokens;
   $sStyleHidden_acepta_tokens = '';
   if (isset($this->nmgp_cmp_hidden['acepta_tokens']) && $this->nmgp_cmp_hidden['acepta_tokens'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acepta_tokens']);
       $sStyleHidden_acepta_tokens = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acepta_tokens = 'display: none;';
   $sStyleReadInp_acepta_tokens = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acepta_tokens']) && $this->nmgp_cmp_readonly['acepta_tokens'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acepta_tokens']);
       $sStyleReadLab_acepta_tokens = '';
       $sStyleReadInp_acepta_tokens = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acepta_tokens']) && $this->nmgp_cmp_hidden['acepta_tokens'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acepta_tokens" value="<?php echo $this->form_encode_input($acepta_tokens) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_acepta_tokens_line" id="hidden_field_data_acepta_tokens" style="<?php echo $sStyleHidden_acepta_tokens; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acepta_tokens_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_acepta_tokens_label" style=""><span id="id_label_acepta_tokens"><?php echo $this->nm_new_label['acepta_tokens']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acepta_tokens"]) &&  $this->nmgp_cmp_readonly["acepta_tokens"] == "on") { 

 ?>
<input type="hidden" name="acepta_tokens" value="<?php echo $this->form_encode_input($acepta_tokens) . "\">" . $acepta_tokens . ""; ?>
<?php } else { ?>
<span id="id_read_on_acepta_tokens" class="sc-ui-readonly-acepta_tokens css_acepta_tokens_line" style="<?php echo $sStyleReadLab_acepta_tokens; ?>"><?php echo $this->form_format_readonly("acepta_tokens", $this->form_encode_input($this->acepta_tokens)); ?></span><span id="id_read_off_acepta_tokens" class="css_read_off_acepta_tokens<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acepta_tokens; ?>">
 <input class="sc-js-input scFormObjectOdd css_acepta_tokens_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acepta_tokens" type=text name="acepta_tokens" value="<?php echo $this->form_encode_input($acepta_tokens) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['acepta_tokens']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['acepta_tokens']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['acepta_tokens']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acepta_tokens_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acepta_tokens_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dev_ip']))
    {
        $this->nm_new_label['dev_ip'] = "Dev Ip";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dev_ip = $this->dev_ip;
   $sStyleHidden_dev_ip = '';
   if (isset($this->nmgp_cmp_hidden['dev_ip']) && $this->nmgp_cmp_hidden['dev_ip'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dev_ip']);
       $sStyleHidden_dev_ip = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dev_ip = 'display: none;';
   $sStyleReadInp_dev_ip = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dev_ip']) && $this->nmgp_cmp_readonly['dev_ip'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dev_ip']);
       $sStyleReadLab_dev_ip = '';
       $sStyleReadInp_dev_ip = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dev_ip']) && $this->nmgp_cmp_hidden['dev_ip'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dev_ip" value="<?php echo $this->form_encode_input($dev_ip) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dev_ip_line" id="hidden_field_data_dev_ip" style="<?php echo $sStyleHidden_dev_ip; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dev_ip_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dev_ip_label" style=""><span id="id_label_dev_ip"><?php echo $this->nm_new_label['dev_ip']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dev_ip"]) &&  $this->nmgp_cmp_readonly["dev_ip"] == "on") { 

 ?>
<input type="hidden" name="dev_ip" value="<?php echo $this->form_encode_input($dev_ip) . "\">" . $dev_ip . ""; ?>
<?php } else { ?>
<span id="id_read_on_dev_ip" class="sc-ui-readonly-dev_ip css_dev_ip_line" style="<?php echo $sStyleReadLab_dev_ip; ?>"><?php echo $this->form_format_readonly("dev_ip", $this->form_encode_input($this->dev_ip)); ?></span><span id="id_read_off_dev_ip" class="css_read_off_dev_ip<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dev_ip; ?>">
 <input class="sc-js-input scFormObjectOdd css_dev_ip_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dev_ip" type=text name="dev_ip" value="<?php echo $this->form_encode_input($dev_ip) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dev_ip_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dev_ip_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipo_dev']))
    {
        $this->nm_new_label['tipo_dev'] = "Tipo Dev";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_dev = $this->tipo_dev;
   $sStyleHidden_tipo_dev = '';
   if (isset($this->nmgp_cmp_hidden['tipo_dev']) && $this->nmgp_cmp_hidden['tipo_dev'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_dev']);
       $sStyleHidden_tipo_dev = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_dev = 'display: none;';
   $sStyleReadInp_tipo_dev = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_dev']) && $this->nmgp_cmp_readonly['tipo_dev'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_dev']);
       $sStyleReadLab_tipo_dev = '';
       $sStyleReadInp_tipo_dev = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_dev']) && $this->nmgp_cmp_hidden['tipo_dev'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo_dev" value="<?php echo $this->form_encode_input($tipo_dev) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_dev_line" id="hidden_field_data_tipo_dev" style="<?php echo $sStyleHidden_tipo_dev; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_dev_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_dev_label" style=""><span id="id_label_tipo_dev"><?php echo $this->nm_new_label['tipo_dev']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_dev"]) &&  $this->nmgp_cmp_readonly["tipo_dev"] == "on") { 

 ?>
<input type="hidden" name="tipo_dev" value="<?php echo $this->form_encode_input($tipo_dev) . "\">" . $tipo_dev . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipo_dev" class="sc-ui-readonly-tipo_dev css_tipo_dev_line" style="<?php echo $sStyleReadLab_tipo_dev; ?>"><?php echo $this->form_format_readonly("tipo_dev", $this->form_encode_input($this->tipo_dev)); ?></span><span id="id_read_off_tipo_dev" class="css_read_off_tipo_dev<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipo_dev; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipo_dev_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_dev" type=text name="tipo_dev" value="<?php echo $this->form_encode_input($tipo_dev) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tipo_dev']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tipo_dev']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tipo_dev']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_dev_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_dev_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['direccion_torno']))
    {
        $this->nm_new_label['direccion_torno'] = "Direccion Torno";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $direccion_torno = $this->direccion_torno;
   $sStyleHidden_direccion_torno = '';
   if (isset($this->nmgp_cmp_hidden['direccion_torno']) && $this->nmgp_cmp_hidden['direccion_torno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['direccion_torno']);
       $sStyleHidden_direccion_torno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_direccion_torno = 'display: none;';
   $sStyleReadInp_direccion_torno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['direccion_torno']) && $this->nmgp_cmp_readonly['direccion_torno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['direccion_torno']);
       $sStyleReadLab_direccion_torno = '';
       $sStyleReadInp_direccion_torno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['direccion_torno']) && $this->nmgp_cmp_hidden['direccion_torno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="direccion_torno" value="<?php echo $this->form_encode_input($direccion_torno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_direccion_torno_line" id="hidden_field_data_direccion_torno" style="<?php echo $sStyleHidden_direccion_torno; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_direccion_torno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_direccion_torno_label" style=""><span id="id_label_direccion_torno"><?php echo $this->nm_new_label['direccion_torno']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direccion_torno"]) &&  $this->nmgp_cmp_readonly["direccion_torno"] == "on") { 

 ?>
<input type="hidden" name="direccion_torno" value="<?php echo $this->form_encode_input($direccion_torno) . "\">" . $direccion_torno . ""; ?>
<?php } else { ?>
<span id="id_read_on_direccion_torno" class="sc-ui-readonly-direccion_torno css_direccion_torno_line" style="<?php echo $sStyleReadLab_direccion_torno; ?>"><?php echo $this->form_format_readonly("direccion_torno", $this->form_encode_input($this->direccion_torno)); ?></span><span id="id_read_off_direccion_torno" class="css_read_off_direccion_torno<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direccion_torno; ?>">
 <input class="sc-js-input scFormObjectOdd css_direccion_torno_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_direccion_torno" type=text name="direccion_torno" value="<?php echo $this->form_encode_input($direccion_torno) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['direccion_torno']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['direccion_torno']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['direccion_torno']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direccion_torno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direccion_torno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['timeout_rfid']))
    {
        $this->nm_new_label['timeout_rfid'] = "Timeout Rfid";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $timeout_rfid = $this->timeout_rfid;
   $sStyleHidden_timeout_rfid = '';
   if (isset($this->nmgp_cmp_hidden['timeout_rfid']) && $this->nmgp_cmp_hidden['timeout_rfid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['timeout_rfid']);
       $sStyleHidden_timeout_rfid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_timeout_rfid = 'display: none;';
   $sStyleReadInp_timeout_rfid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['timeout_rfid']) && $this->nmgp_cmp_readonly['timeout_rfid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['timeout_rfid']);
       $sStyleReadLab_timeout_rfid = '';
       $sStyleReadInp_timeout_rfid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['timeout_rfid']) && $this->nmgp_cmp_hidden['timeout_rfid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="timeout_rfid" value="<?php echo $this->form_encode_input($timeout_rfid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_timeout_rfid_line" id="hidden_field_data_timeout_rfid" style="<?php echo $sStyleHidden_timeout_rfid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_timeout_rfid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_timeout_rfid_label" style=""><span id="id_label_timeout_rfid"><?php echo $this->nm_new_label['timeout_rfid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["timeout_rfid"]) &&  $this->nmgp_cmp_readonly["timeout_rfid"] == "on") { 

 ?>
<input type="hidden" name="timeout_rfid" value="<?php echo $this->form_encode_input($timeout_rfid) . "\">" . $timeout_rfid . ""; ?>
<?php } else { ?>
<span id="id_read_on_timeout_rfid" class="sc-ui-readonly-timeout_rfid css_timeout_rfid_line" style="<?php echo $sStyleReadLab_timeout_rfid; ?>"><?php echo $this->form_format_readonly("timeout_rfid", $this->form_encode_input($this->timeout_rfid)); ?></span><span id="id_read_off_timeout_rfid" class="css_read_off_timeout_rfid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_timeout_rfid; ?>">
 <input class="sc-js-input scFormObjectOdd css_timeout_rfid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_timeout_rfid" type=text name="timeout_rfid" value="<?php echo $this->form_encode_input($timeout_rfid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['timeout_rfid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['timeout_rfid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['timeout_rfid']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_timeout_rfid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_timeout_rfid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['discapacitado']))
    {
        $this->nm_new_label['discapacitado'] = "Discapacitado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $discapacitado = $this->discapacitado;
   $sStyleHidden_discapacitado = '';
   if (isset($this->nmgp_cmp_hidden['discapacitado']) && $this->nmgp_cmp_hidden['discapacitado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['discapacitado']);
       $sStyleHidden_discapacitado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_discapacitado = 'display: none;';
   $sStyleReadInp_discapacitado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['discapacitado']) && $this->nmgp_cmp_readonly['discapacitado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['discapacitado']);
       $sStyleReadLab_discapacitado = '';
       $sStyleReadInp_discapacitado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['discapacitado']) && $this->nmgp_cmp_hidden['discapacitado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="discapacitado" value="<?php echo $this->form_encode_input($discapacitado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_discapacitado_line" id="hidden_field_data_discapacitado" style="<?php echo $sStyleHidden_discapacitado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_discapacitado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_discapacitado_label" style=""><span id="id_label_discapacitado"><?php echo $this->nm_new_label['discapacitado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["discapacitado"]) &&  $this->nmgp_cmp_readonly["discapacitado"] == "on") { 

 ?>
<input type="hidden" name="discapacitado" value="<?php echo $this->form_encode_input($discapacitado) . "\">" . $discapacitado . ""; ?>
<?php } else { ?>
<span id="id_read_on_discapacitado" class="sc-ui-readonly-discapacitado css_discapacitado_line" style="<?php echo $sStyleReadLab_discapacitado; ?>"><?php echo $this->form_format_readonly("discapacitado", $this->form_encode_input($this->discapacitado)); ?></span><span id="id_read_off_discapacitado" class="css_read_off_discapacitado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_discapacitado; ?>">
 <input class="sc-js-input scFormObjectOdd css_discapacitado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_discapacitado" type=text name="discapacitado" value="<?php echo $this->form_encode_input($discapacitado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['discapacitado']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['discapacitado']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['discapacitado']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_discapacitado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_discapacitado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numcaja']))
    {
        $this->nm_new_label['numcaja'] = "Numcaja";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numcaja = $this->numcaja;
   $sStyleHidden_numcaja = '';
   if (isset($this->nmgp_cmp_hidden['numcaja']) && $this->nmgp_cmp_hidden['numcaja'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numcaja']);
       $sStyleHidden_numcaja = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numcaja = 'display: none;';
   $sStyleReadInp_numcaja = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numcaja']) && $this->nmgp_cmp_readonly['numcaja'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numcaja']);
       $sStyleReadLab_numcaja = '';
       $sStyleReadInp_numcaja = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numcaja']) && $this->nmgp_cmp_hidden['numcaja'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numcaja" value="<?php echo $this->form_encode_input($numcaja) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numcaja_line" id="hidden_field_data_numcaja" style="<?php echo $sStyleHidden_numcaja; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numcaja_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numcaja_label" style=""><span id="id_label_numcaja"><?php echo $this->nm_new_label['numcaja']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numcaja"]) &&  $this->nmgp_cmp_readonly["numcaja"] == "on") { 

 ?>
<input type="hidden" name="numcaja" value="<?php echo $this->form_encode_input($numcaja) . "\">" . $numcaja . ""; ?>
<?php } else { ?>
<span id="id_read_on_numcaja" class="sc-ui-readonly-numcaja css_numcaja_line" style="<?php echo $sStyleReadLab_numcaja; ?>"><?php echo $this->form_format_readonly("numcaja", $this->form_encode_input($this->numcaja)); ?></span><span id="id_read_off_numcaja" class="css_read_off_numcaja<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numcaja; ?>">
 <input class="sc-js-input scFormObjectOdd css_numcaja_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numcaja" type=text name="numcaja" value="<?php echo $this->form_encode_input($numcaja) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['numcaja']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['numcaja']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numcaja']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numcaja_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numcaja_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['empleado']))
    {
        $this->nm_new_label['empleado'] = "Empleado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $empleado = $this->empleado;
   $sStyleHidden_empleado = '';
   if (isset($this->nmgp_cmp_hidden['empleado']) && $this->nmgp_cmp_hidden['empleado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['empleado']);
       $sStyleHidden_empleado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_empleado = 'display: none;';
   $sStyleReadInp_empleado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['empleado']) && $this->nmgp_cmp_readonly['empleado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['empleado']);
       $sStyleReadLab_empleado = '';
       $sStyleReadInp_empleado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['empleado']) && $this->nmgp_cmp_hidden['empleado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="empleado" value="<?php echo $this->form_encode_input($empleado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_empleado_line" id="hidden_field_data_empleado" style="<?php echo $sStyleHidden_empleado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_empleado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_empleado_label" style=""><span id="id_label_empleado"><?php echo $this->nm_new_label['empleado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["empleado"]) &&  $this->nmgp_cmp_readonly["empleado"] == "on") { 

 ?>
<input type="hidden" name="empleado" value="<?php echo $this->form_encode_input($empleado) . "\">" . $empleado . ""; ?>
<?php } else { ?>
<span id="id_read_on_empleado" class="sc-ui-readonly-empleado css_empleado_line" style="<?php echo $sStyleReadLab_empleado; ?>"><?php echo $this->form_format_readonly("empleado", $this->form_encode_input($this->empleado)); ?></span><span id="id_read_off_empleado" class="css_read_off_empleado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_empleado; ?>">
 <input class="sc-js-input scFormObjectOdd css_empleado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_empleado" type=text name="empleado" value="<?php echo $this->form_encode_input($empleado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['empleado']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['empleado']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['empleado']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_empleado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_empleado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tokens']))
    {
        $this->nm_new_label['tokens'] = "Tokens";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tokens = $this->tokens;
   $sStyleHidden_tokens = '';
   if (isset($this->nmgp_cmp_hidden['tokens']) && $this->nmgp_cmp_hidden['tokens'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tokens']);
       $sStyleHidden_tokens = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tokens = 'display: none;';
   $sStyleReadInp_tokens = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tokens']) && $this->nmgp_cmp_readonly['tokens'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tokens']);
       $sStyleReadLab_tokens = '';
       $sStyleReadInp_tokens = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tokens']) && $this->nmgp_cmp_hidden['tokens'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tokens" value="<?php echo $this->form_encode_input($tokens) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tokens_line" id="hidden_field_data_tokens" style="<?php echo $sStyleHidden_tokens; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tokens_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tokens_label" style=""><span id="id_label_tokens"><?php echo $this->nm_new_label['tokens']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tokens"]) &&  $this->nmgp_cmp_readonly["tokens"] == "on") { 

 ?>
<input type="hidden" name="tokens" value="<?php echo $this->form_encode_input($tokens) . "\">" . $tokens . ""; ?>
<?php } else { ?>
<span id="id_read_on_tokens" class="sc-ui-readonly-tokens css_tokens_line" style="<?php echo $sStyleReadLab_tokens; ?>"><?php echo $this->form_format_readonly("tokens", $this->form_encode_input($this->tokens)); ?></span><span id="id_read_off_tokens" class="css_read_off_tokens<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tokens; ?>">
 <input class="sc-js-input scFormObjectOdd css_tokens_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tokens" type=text name="tokens" value="<?php echo $this->form_encode_input($tokens) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['tokens']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tokens']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tokens']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tokens']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tokens_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tokens_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['serialrfid']))
    {
        $this->nm_new_label['serialrfid'] = "Serialrfid";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $serialrfid = $this->serialrfid;
   $sStyleHidden_serialrfid = '';
   if (isset($this->nmgp_cmp_hidden['serialrfid']) && $this->nmgp_cmp_hidden['serialrfid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['serialrfid']);
       $sStyleHidden_serialrfid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_serialrfid = 'display: none;';
   $sStyleReadInp_serialrfid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['serialrfid']) && $this->nmgp_cmp_readonly['serialrfid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['serialrfid']);
       $sStyleReadLab_serialrfid = '';
       $sStyleReadInp_serialrfid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['serialrfid']) && $this->nmgp_cmp_hidden['serialrfid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="serialrfid" value="<?php echo $this->form_encode_input($serialrfid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_serialrfid_line" id="hidden_field_data_serialrfid" style="<?php echo $sStyleHidden_serialrfid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_serialrfid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_serialrfid_label" style=""><span id="id_label_serialrfid"><?php echo $this->nm_new_label['serialrfid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["serialrfid"]) &&  $this->nmgp_cmp_readonly["serialrfid"] == "on") { 

 ?>
<input type="hidden" name="serialrfid" value="<?php echo $this->form_encode_input($serialrfid) . "\">" . $serialrfid . ""; ?>
<?php } else { ?>
<span id="id_read_on_serialrfid" class="sc-ui-readonly-serialrfid css_serialrfid_line" style="<?php echo $sStyleReadLab_serialrfid; ?>"><?php echo $this->form_format_readonly("serialrfid", $this->form_encode_input($this->serialrfid)); ?></span><span id="id_read_off_serialrfid" class="css_read_off_serialrfid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_serialrfid; ?>">
 <input class="sc-js-input scFormObjectOdd css_serialrfid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_serialrfid" type=text name="serialrfid" value="<?php echo $this->form_encode_input($serialrfid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_serialrfid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_serialrfid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bidireccion']))
    {
        $this->nm_new_label['bidireccion'] = "Bidireccion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bidireccion = $this->bidireccion;
   $sStyleHidden_bidireccion = '';
   if (isset($this->nmgp_cmp_hidden['bidireccion']) && $this->nmgp_cmp_hidden['bidireccion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bidireccion']);
       $sStyleHidden_bidireccion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bidireccion = 'display: none;';
   $sStyleReadInp_bidireccion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bidireccion']) && $this->nmgp_cmp_readonly['bidireccion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bidireccion']);
       $sStyleReadLab_bidireccion = '';
       $sStyleReadInp_bidireccion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bidireccion']) && $this->nmgp_cmp_hidden['bidireccion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bidireccion" value="<?php echo $this->form_encode_input($bidireccion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bidireccion_line" id="hidden_field_data_bidireccion" style="<?php echo $sStyleHidden_bidireccion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bidireccion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bidireccion_label" style=""><span id="id_label_bidireccion"><?php echo $this->nm_new_label['bidireccion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bidireccion"]) &&  $this->nmgp_cmp_readonly["bidireccion"] == "on") { 

 ?>
<input type="hidden" name="bidireccion" value="<?php echo $this->form_encode_input($bidireccion) . "\">" . $bidireccion . ""; ?>
<?php } else { ?>
<span id="id_read_on_bidireccion" class="sc-ui-readonly-bidireccion css_bidireccion_line" style="<?php echo $sStyleReadLab_bidireccion; ?>"><?php echo $this->form_format_readonly("bidireccion", $this->form_encode_input($this->bidireccion)); ?></span><span id="id_read_off_bidireccion" class="css_read_off_bidireccion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_bidireccion; ?>">
 <input class="sc-js-input scFormObjectOdd css_bidireccion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_bidireccion" type=text name="bidireccion" value="<?php echo $this->form_encode_input($bidireccion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['bidireccion']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['bidireccion']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['bidireccion']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bidireccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bidireccion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_devicee']))
    {
        $this->nm_new_label['cod_devicee'] = "Cod Device E";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_devicee = $this->cod_devicee;
   $sStyleHidden_cod_devicee = '';
   if (isset($this->nmgp_cmp_hidden['cod_devicee']) && $this->nmgp_cmp_hidden['cod_devicee'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_devicee']);
       $sStyleHidden_cod_devicee = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_devicee = 'display: none;';
   $sStyleReadInp_cod_devicee = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cod_devicee']) && $this->nmgp_cmp_readonly['cod_devicee'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_devicee']);
       $sStyleReadLab_cod_devicee = '';
       $sStyleReadInp_cod_devicee = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_devicee']) && $this->nmgp_cmp_hidden['cod_devicee'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_devicee" value="<?php echo $this->form_encode_input($cod_devicee) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cod_devicee_line" id="hidden_field_data_cod_devicee" style="<?php echo $sStyleHidden_cod_devicee; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_devicee_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cod_devicee_label" style=""><span id="id_label_cod_devicee"><?php echo $this->nm_new_label['cod_devicee']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_devicee"]) &&  $this->nmgp_cmp_readonly["cod_devicee"] == "on") { 

 ?>
<input type="hidden" name="cod_devicee" value="<?php echo $this->form_encode_input($cod_devicee) . "\">" . $cod_devicee . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_devicee" class="sc-ui-readonly-cod_devicee css_cod_devicee_line" style="<?php echo $sStyleReadLab_cod_devicee; ?>"><?php echo $this->form_format_readonly("cod_devicee", $this->form_encode_input($this->cod_devicee)); ?></span><span id="id_read_off_cod_devicee" class="css_read_off_cod_devicee<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_devicee; ?>">
 <input class="sc-js-input scFormObjectOdd css_cod_devicee_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_devicee" type=text name="cod_devicee" value="<?php echo $this->form_encode_input($cod_devicee) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cod_devicee']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cod_devicee']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cod_devicee']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_devicee_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_devicee_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_1']))
    {
        $this->nm_new_label['url_1'] = "Url 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_1 = $this->url_1;
   $sStyleHidden_url_1 = '';
   if (isset($this->nmgp_cmp_hidden['url_1']) && $this->nmgp_cmp_hidden['url_1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_1']);
       $sStyleHidden_url_1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_1 = 'display: none;';
   $sStyleReadInp_url_1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_1']) && $this->nmgp_cmp_readonly['url_1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_1']);
       $sStyleReadLab_url_1 = '';
       $sStyleReadInp_url_1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_1']) && $this->nmgp_cmp_hidden['url_1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_1" value="<?php echo $this->form_encode_input($url_1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_1_line" id="hidden_field_data_url_1" style="<?php echo $sStyleHidden_url_1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_1_label" style=""><span id="id_label_url_1"><?php echo $this->nm_new_label['url_1']; ?></span></span><br>
<?php
$url_1_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($url_1));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_1"]) &&  $this->nmgp_cmp_readonly["url_1"] == "on") { 

 ?>
<input type="hidden" name="url_1" value="<?php echo $this->form_encode_input($url_1) . "\">" . $url_1_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_1" class="sc-ui-readonly-url_1 css_url_1_line" style="<?php echo $sStyleReadLab_url_1; ?>"><?php echo $this->form_format_readonly("url_1", $this->form_encode_input($url_1_val)); ?></span><span id="id_read_off_url_1" class="css_read_off_url_1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_1; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_url_1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_1" id="id_sc_field_url_1" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_1; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_2']))
    {
        $this->nm_new_label['url_2'] = "Url 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_2 = $this->url_2;
   $sStyleHidden_url_2 = '';
   if (isset($this->nmgp_cmp_hidden['url_2']) && $this->nmgp_cmp_hidden['url_2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_2']);
       $sStyleHidden_url_2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_2 = 'display: none;';
   $sStyleReadInp_url_2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_2']) && $this->nmgp_cmp_readonly['url_2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_2']);
       $sStyleReadLab_url_2 = '';
       $sStyleReadInp_url_2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_2']) && $this->nmgp_cmp_hidden['url_2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_2" value="<?php echo $this->form_encode_input($url_2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_2_line" id="hidden_field_data_url_2" style="<?php echo $sStyleHidden_url_2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_2_label" style=""><span id="id_label_url_2"><?php echo $this->nm_new_label['url_2']; ?></span></span><br>
<?php
$url_2_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($url_2));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_2"]) &&  $this->nmgp_cmp_readonly["url_2"] == "on") { 

 ?>
<input type="hidden" name="url_2" value="<?php echo $this->form_encode_input($url_2) . "\">" . $url_2_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_2" class="sc-ui-readonly-url_2 css_url_2_line" style="<?php echo $sStyleReadLab_url_2; ?>"><?php echo $this->form_format_readonly("url_2", $this->form_encode_input($url_2_val)); ?></span><span id="id_read_off_url_2" class="css_read_off_url_2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_2; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_url_2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_2" id="id_sc_field_url_2" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_2; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_3']))
    {
        $this->nm_new_label['url_3'] = "Url 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_3 = $this->url_3;
   $sStyleHidden_url_3 = '';
   if (isset($this->nmgp_cmp_hidden['url_3']) && $this->nmgp_cmp_hidden['url_3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_3']);
       $sStyleHidden_url_3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_3 = 'display: none;';
   $sStyleReadInp_url_3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_3']) && $this->nmgp_cmp_readonly['url_3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_3']);
       $sStyleReadLab_url_3 = '';
       $sStyleReadInp_url_3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_3']) && $this->nmgp_cmp_hidden['url_3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_3" value="<?php echo $this->form_encode_input($url_3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_3_line" id="hidden_field_data_url_3" style="<?php echo $sStyleHidden_url_3; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_3_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_3_label" style=""><span id="id_label_url_3"><?php echo $this->nm_new_label['url_3']; ?></span></span><br>
<?php
$url_3_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($url_3));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_3"]) &&  $this->nmgp_cmp_readonly["url_3"] == "on") { 

 ?>
<input type="hidden" name="url_3" value="<?php echo $this->form_encode_input($url_3) . "\">" . $url_3_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_3" class="sc-ui-readonly-url_3 css_url_3_line" style="<?php echo $sStyleReadLab_url_3; ?>"><?php echo $this->form_format_readonly("url_3", $this->form_encode_input($url_3_val)); ?></span><span id="id_read_off_url_3" class="css_read_off_url_3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_3; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_url_3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_3" id="id_sc_field_url_3" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_3; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['foto1']))
    {
        $this->nm_new_label['foto1'] = "Foto 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foto1 = $this->foto1;
   $sStyleHidden_foto1 = '';
   if (isset($this->nmgp_cmp_hidden['foto1']) && $this->nmgp_cmp_hidden['foto1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foto1']);
       $sStyleHidden_foto1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foto1 = 'display: none;';
   $sStyleReadInp_foto1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foto1']) && $this->nmgp_cmp_readonly['foto1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foto1']);
       $sStyleReadLab_foto1 = '';
       $sStyleReadInp_foto1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foto1']) && $this->nmgp_cmp_hidden['foto1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foto1" value="<?php echo $this->form_encode_input($foto1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_foto1_line" id="hidden_field_data_foto1" style="<?php echo $sStyleHidden_foto1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_foto1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_foto1_label" style=""><span id="id_label_foto1"><?php echo $this->nm_new_label['foto1']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_foto1" => $out_foto1); ?><script>var var_ajax_img_foto1 = '<?php echo $out_foto1; ?>';</script><input type="hidden" name="temp_out_foto1" value="<?php echo $this->form_encode_input($out_foto1); ?>" /><?php if (!empty($out_foto1)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_foto1, '" . $this->nmgp_return_img['foto1'][0] . "', '" . $this->nmgp_return_img['foto1'][1] . "')\"><img id=\"id_ajax_img_foto1\"  border=\"0\" src=\"$out_foto1\"></a>"; } else {  echo "<img id=\"id_ajax_img_foto1\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foto1"]) &&  $this->nmgp_cmp_readonly["foto1"] == "on") { 

 ?>
<img id=\"foto1_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="foto1" value="<?php echo $this->form_encode_input($foto1) . "\">" . $foto1 . ""; ?>
<?php } else { ?>
<span id="id_read_off_foto1" class="css_read_off_foto1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foto1; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-foto1" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_foto1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="foto1[]" id="id_sc_field_foto1" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_foto1"<?php if ($this->nmgp_opcao == "novo" || empty($foto1)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="foto1_limpa" value="<?php echo $foto1_limpa . '" '; if ($foto1_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="foto1_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_foto1" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_foto1" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foto1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foto1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['foto2']))
    {
        $this->nm_new_label['foto2'] = "Foto 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foto2 = $this->foto2;
   $sStyleHidden_foto2 = '';
   if (isset($this->nmgp_cmp_hidden['foto2']) && $this->nmgp_cmp_hidden['foto2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foto2']);
       $sStyleHidden_foto2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foto2 = 'display: none;';
   $sStyleReadInp_foto2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foto2']) && $this->nmgp_cmp_readonly['foto2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foto2']);
       $sStyleReadLab_foto2 = '';
       $sStyleReadInp_foto2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foto2']) && $this->nmgp_cmp_hidden['foto2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foto2" value="<?php echo $this->form_encode_input($foto2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_foto2_line" id="hidden_field_data_foto2" style="<?php echo $sStyleHidden_foto2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_foto2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_foto2_label" style=""><span id="id_label_foto2"><?php echo $this->nm_new_label['foto2']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_foto2" => $out_foto2); ?><script>var var_ajax_img_foto2 = '<?php echo $out_foto2; ?>';</script><input type="hidden" name="temp_out_foto2" value="<?php echo $this->form_encode_input($out_foto2); ?>" /><?php if (!empty($out_foto2)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_foto2, '" . $this->nmgp_return_img['foto2'][0] . "', '" . $this->nmgp_return_img['foto2'][1] . "')\"><img id=\"id_ajax_img_foto2\"  border=\"0\" src=\"$out_foto2\"></a>"; } else {  echo "<img id=\"id_ajax_img_foto2\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foto2"]) &&  $this->nmgp_cmp_readonly["foto2"] == "on") { 

 ?>
<img id=\"foto2_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="foto2" value="<?php echo $this->form_encode_input($foto2) . "\">" . $foto2 . ""; ?>
<?php } else { ?>
<span id="id_read_off_foto2" class="css_read_off_foto2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foto2; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-foto2" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_foto2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="foto2[]" id="id_sc_field_foto2" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_foto2"<?php if ($this->nmgp_opcao == "novo" || empty($foto2)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="foto2_limpa" value="<?php echo $foto2_limpa . '" '; if ($foto2_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="foto2_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_foto2" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_foto2" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foto2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foto2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['foto3']))
    {
        $this->nm_new_label['foto3'] = "Foto 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foto3 = $this->foto3;
   $sStyleHidden_foto3 = '';
   if (isset($this->nmgp_cmp_hidden['foto3']) && $this->nmgp_cmp_hidden['foto3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foto3']);
       $sStyleHidden_foto3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foto3 = 'display: none;';
   $sStyleReadInp_foto3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foto3']) && $this->nmgp_cmp_readonly['foto3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foto3']);
       $sStyleReadLab_foto3 = '';
       $sStyleReadInp_foto3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foto3']) && $this->nmgp_cmp_hidden['foto3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foto3" value="<?php echo $this->form_encode_input($foto3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_foto3_line" id="hidden_field_data_foto3" style="<?php echo $sStyleHidden_foto3; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_foto3_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_foto3_label" style=""><span id="id_label_foto3"><?php echo $this->nm_new_label['foto3']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_foto3" => $out_foto3); ?><script>var var_ajax_img_foto3 = '<?php echo $out_foto3; ?>';</script><input type="hidden" name="temp_out_foto3" value="<?php echo $this->form_encode_input($out_foto3); ?>" /><?php if (!empty($out_foto3)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_foto3, '" . $this->nmgp_return_img['foto3'][0] . "', '" . $this->nmgp_return_img['foto3'][1] . "')\"><img id=\"id_ajax_img_foto3\"  border=\"0\" src=\"$out_foto3\"></a>"; } else {  echo "<img id=\"id_ajax_img_foto3\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foto3"]) &&  $this->nmgp_cmp_readonly["foto3"] == "on") { 

 ?>
<img id=\"foto3_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="foto3" value="<?php echo $this->form_encode_input($foto3) . "\">" . $foto3 . ""; ?>
<?php } else { ?>
<span id="id_read_off_foto3" class="css_read_off_foto3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foto3; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-foto3" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_foto3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="foto3[]" id="id_sc_field_foto3" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_foto3"<?php if ($this->nmgp_opcao == "novo" || empty($foto3)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="foto3_limpa" value="<?php echo $foto3_limpa . '" '; if ($foto3_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="foto3_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_foto3" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_foto3" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foto3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foto3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pin_relay1']))
    {
        $this->nm_new_label['pin_relay1'] = "Pin Relay 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pin_relay1 = $this->pin_relay1;
   $sStyleHidden_pin_relay1 = '';
   if (isset($this->nmgp_cmp_hidden['pin_relay1']) && $this->nmgp_cmp_hidden['pin_relay1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pin_relay1']);
       $sStyleHidden_pin_relay1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pin_relay1 = 'display: none;';
   $sStyleReadInp_pin_relay1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pin_relay1']) && $this->nmgp_cmp_readonly['pin_relay1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pin_relay1']);
       $sStyleReadLab_pin_relay1 = '';
       $sStyleReadInp_pin_relay1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pin_relay1']) && $this->nmgp_cmp_hidden['pin_relay1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pin_relay1" value="<?php echo $this->form_encode_input($pin_relay1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pin_relay1_line" id="hidden_field_data_pin_relay1" style="<?php echo $sStyleHidden_pin_relay1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pin_relay1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pin_relay1_label" style=""><span id="id_label_pin_relay1"><?php echo $this->nm_new_label['pin_relay1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pin_relay1"]) &&  $this->nmgp_cmp_readonly["pin_relay1"] == "on") { 

 ?>
<input type="hidden" name="pin_relay1" value="<?php echo $this->form_encode_input($pin_relay1) . "\">" . $pin_relay1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_pin_relay1" class="sc-ui-readonly-pin_relay1 css_pin_relay1_line" style="<?php echo $sStyleReadLab_pin_relay1; ?>"><?php echo $this->form_format_readonly("pin_relay1", $this->form_encode_input($this->pin_relay1)); ?></span><span id="id_read_off_pin_relay1" class="css_read_off_pin_relay1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pin_relay1; ?>">
 <input class="sc-js-input scFormObjectOdd css_pin_relay1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pin_relay1" type=text name="pin_relay1" value="<?php echo $this->form_encode_input($pin_relay1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pin_relay1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pin_relay1']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['pin_relay1']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pin_relay1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pin_relay1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pin_relay2']))
    {
        $this->nm_new_label['pin_relay2'] = "Pin Relay 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pin_relay2 = $this->pin_relay2;
   $sStyleHidden_pin_relay2 = '';
   if (isset($this->nmgp_cmp_hidden['pin_relay2']) && $this->nmgp_cmp_hidden['pin_relay2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pin_relay2']);
       $sStyleHidden_pin_relay2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pin_relay2 = 'display: none;';
   $sStyleReadInp_pin_relay2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pin_relay2']) && $this->nmgp_cmp_readonly['pin_relay2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pin_relay2']);
       $sStyleReadLab_pin_relay2 = '';
       $sStyleReadInp_pin_relay2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pin_relay2']) && $this->nmgp_cmp_hidden['pin_relay2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pin_relay2" value="<?php echo $this->form_encode_input($pin_relay2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pin_relay2_line" id="hidden_field_data_pin_relay2" style="<?php echo $sStyleHidden_pin_relay2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pin_relay2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pin_relay2_label" style=""><span id="id_label_pin_relay2"><?php echo $this->nm_new_label['pin_relay2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pin_relay2"]) &&  $this->nmgp_cmp_readonly["pin_relay2"] == "on") { 

 ?>
<input type="hidden" name="pin_relay2" value="<?php echo $this->form_encode_input($pin_relay2) . "\">" . $pin_relay2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_pin_relay2" class="sc-ui-readonly-pin_relay2 css_pin_relay2_line" style="<?php echo $sStyleReadLab_pin_relay2; ?>"><?php echo $this->form_format_readonly("pin_relay2", $this->form_encode_input($this->pin_relay2)); ?></span><span id="id_read_off_pin_relay2" class="css_read_off_pin_relay2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pin_relay2; ?>">
 <input class="sc-js-input scFormObjectOdd css_pin_relay2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pin_relay2" type=text name="pin_relay2" value="<?php echo $this->form_encode_input($pin_relay2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pin_relay2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pin_relay2']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['pin_relay2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pin_relay2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pin_relay2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rfid_read']))
    {
        $this->nm_new_label['rfid_read'] = "Rfid Read";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rfid_read = $this->rfid_read;
   $sStyleHidden_rfid_read = '';
   if (isset($this->nmgp_cmp_hidden['rfid_read']) && $this->nmgp_cmp_hidden['rfid_read'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rfid_read']);
       $sStyleHidden_rfid_read = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rfid_read = 'display: none;';
   $sStyleReadInp_rfid_read = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rfid_read']) && $this->nmgp_cmp_readonly['rfid_read'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rfid_read']);
       $sStyleReadLab_rfid_read = '';
       $sStyleReadInp_rfid_read = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rfid_read']) && $this->nmgp_cmp_hidden['rfid_read'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rfid_read" value="<?php echo $this->form_encode_input($rfid_read) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_rfid_read_line" id="hidden_field_data_rfid_read" style="<?php echo $sStyleHidden_rfid_read; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rfid_read_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_rfid_read_label" style=""><span id="id_label_rfid_read"><?php echo $this->nm_new_label['rfid_read']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rfid_read"]) &&  $this->nmgp_cmp_readonly["rfid_read"] == "on") { 

 ?>
<input type="hidden" name="rfid_read" value="<?php echo $this->form_encode_input($rfid_read) . "\">" . $rfid_read . ""; ?>
<?php } else { ?>
<span id="id_read_on_rfid_read" class="sc-ui-readonly-rfid_read css_rfid_read_line" style="<?php echo $sStyleReadLab_rfid_read; ?>"><?php echo $this->form_format_readonly("rfid_read", $this->form_encode_input($this->rfid_read)); ?></span><span id="id_read_off_rfid_read" class="css_read_off_rfid_read<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rfid_read; ?>">
 <input class="sc-js-input scFormObjectOdd css_rfid_read_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rfid_read" type=text name="rfid_read" value="<?php echo $this->form_encode_input($rfid_read) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rfid_read_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rfid_read_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rfid_estado']))
    {
        $this->nm_new_label['rfid_estado'] = "Rfid Estado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rfid_estado = $this->rfid_estado;
   $sStyleHidden_rfid_estado = '';
   if (isset($this->nmgp_cmp_hidden['rfid_estado']) && $this->nmgp_cmp_hidden['rfid_estado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rfid_estado']);
       $sStyleHidden_rfid_estado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rfid_estado = 'display: none;';
   $sStyleReadInp_rfid_estado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rfid_estado']) && $this->nmgp_cmp_readonly['rfid_estado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rfid_estado']);
       $sStyleReadLab_rfid_estado = '';
       $sStyleReadInp_rfid_estado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rfid_estado']) && $this->nmgp_cmp_hidden['rfid_estado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rfid_estado" value="<?php echo $this->form_encode_input($rfid_estado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_rfid_estado_line" id="hidden_field_data_rfid_estado" style="<?php echo $sStyleHidden_rfid_estado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rfid_estado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_rfid_estado_label" style=""><span id="id_label_rfid_estado"><?php echo $this->nm_new_label['rfid_estado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rfid_estado"]) &&  $this->nmgp_cmp_readonly["rfid_estado"] == "on") { 

 ?>
<input type="hidden" name="rfid_estado" value="<?php echo $this->form_encode_input($rfid_estado) . "\">" . $rfid_estado . ""; ?>
<?php } else { ?>
<span id="id_read_on_rfid_estado" class="sc-ui-readonly-rfid_estado css_rfid_estado_line" style="<?php echo $sStyleReadLab_rfid_estado; ?>"><?php echo $this->form_format_readonly("rfid_estado", $this->form_encode_input($this->rfid_estado)); ?></span><span id="id_read_off_rfid_estado" class="css_read_off_rfid_estado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rfid_estado; ?>">
 <input class="sc-js-input scFormObjectOdd css_rfid_estado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rfid_estado" type=text name="rfid_estado" value="<?php echo $this->form_encode_input($rfid_estado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rfid_estado']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rfid_estado']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rfid_estado']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rfid_estado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rfid_estado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rfid_fecha']))
    {
        $this->nm_new_label['rfid_fecha'] = "Rfid Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_rfid_fecha = $this->rfid_fecha;
   if (strlen($this->rfid_fecha_hora) > 8 ) {$this->rfid_fecha_hora = substr($this->rfid_fecha_hora, 0, 8);}
   $this->rfid_fecha .= ' ' . $this->rfid_fecha_hora;
   $this->rfid_fecha  = trim($this->rfid_fecha);
   $rfid_fecha = $this->rfid_fecha;
   $sStyleHidden_rfid_fecha = '';
   if (isset($this->nmgp_cmp_hidden['rfid_fecha']) && $this->nmgp_cmp_hidden['rfid_fecha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rfid_fecha']);
       $sStyleHidden_rfid_fecha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rfid_fecha = 'display: none;';
   $sStyleReadInp_rfid_fecha = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rfid_fecha']) && $this->nmgp_cmp_readonly['rfid_fecha'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rfid_fecha']);
       $sStyleReadLab_rfid_fecha = '';
       $sStyleReadInp_rfid_fecha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rfid_fecha']) && $this->nmgp_cmp_hidden['rfid_fecha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rfid_fecha" value="<?php echo $this->form_encode_input($rfid_fecha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_rfid_fecha_line" id="hidden_field_data_rfid_fecha" style="<?php echo $sStyleHidden_rfid_fecha; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rfid_fecha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_rfid_fecha_label" style=""><span id="id_label_rfid_fecha"><?php echo $this->nm_new_label['rfid_fecha']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rfid_fecha"]) &&  $this->nmgp_cmp_readonly["rfid_fecha"] == "on") { 

 ?>
<input type="hidden" name="rfid_fecha" value="<?php echo $this->form_encode_input($rfid_fecha) . "\">" . $rfid_fecha . ""; ?>
<?php } else { ?>
<span id="id_read_on_rfid_fecha" class="sc-ui-readonly-rfid_fecha css_rfid_fecha_line" style="<?php echo $sStyleReadLab_rfid_fecha; ?>"><?php echo $this->form_format_readonly("rfid_fecha", $this->form_encode_input($rfid_fecha)); ?></span><span id="id_read_off_rfid_fecha" class="css_read_off_rfid_fecha<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rfid_fecha; ?>"><?php
$tmp_form_data = $this->field_config['rfid_fecha']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_rfid_fecha_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rfid_fecha" type=text name="rfid_fecha" value="<?php echo $this->form_encode_input($rfid_fecha) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['rfid_fecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rfid_fecha']['date_format']; ?>', timeSep: '<?php echo $this->field_config['rfid_fecha']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rfid_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rfid_fecha_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->rfid_fecha = $old_dt_rfid_fecha;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_accion']))
    {
        $this->nm_new_label['url_accion'] = "Url Accion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_accion = $this->url_accion;
   $sStyleHidden_url_accion = '';
   if (isset($this->nmgp_cmp_hidden['url_accion']) && $this->nmgp_cmp_hidden['url_accion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_accion']);
       $sStyleHidden_url_accion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_accion = 'display: none;';
   $sStyleReadInp_url_accion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_accion']) && $this->nmgp_cmp_readonly['url_accion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_accion']);
       $sStyleReadLab_url_accion = '';
       $sStyleReadInp_url_accion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_accion']) && $this->nmgp_cmp_hidden['url_accion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_accion" value="<?php echo $this->form_encode_input($url_accion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_accion_line" id="hidden_field_data_url_accion" style="<?php echo $sStyleHidden_url_accion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_accion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_accion_label" style=""><span id="id_label_url_accion"><?php echo $this->nm_new_label['url_accion']; ?></span></span><br>
<?php
$url_accion_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($url_accion));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_accion"]) &&  $this->nmgp_cmp_readonly["url_accion"] == "on") { 

 ?>
<input type="hidden" name="url_accion" value="<?php echo $this->form_encode_input($url_accion) . "\">" . $url_accion_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_accion" class="sc-ui-readonly-url_accion css_url_accion_line" style="<?php echo $sStyleReadLab_url_accion; ?>"><?php echo $this->form_format_readonly("url_accion", $this->form_encode_input($url_accion_val)); ?></span><span id="id_read_off_url_accion" class="css_read_off_url_accion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_accion; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_url_accion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_accion" id="id_sc_field_url_accion" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_accion; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_accion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_accion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_atraccion']))
    {
        $this->nm_new_label['url_atraccion'] = "Url Atraccion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_atraccion = $this->url_atraccion;
   $sStyleHidden_url_atraccion = '';
   if (isset($this->nmgp_cmp_hidden['url_atraccion']) && $this->nmgp_cmp_hidden['url_atraccion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_atraccion']);
       $sStyleHidden_url_atraccion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_atraccion = 'display: none;';
   $sStyleReadInp_url_atraccion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_atraccion']) && $this->nmgp_cmp_readonly['url_atraccion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_atraccion']);
       $sStyleReadLab_url_atraccion = '';
       $sStyleReadInp_url_atraccion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_atraccion']) && $this->nmgp_cmp_hidden['url_atraccion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_atraccion" value="<?php echo $this->form_encode_input($url_atraccion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_atraccion_line" id="hidden_field_data_url_atraccion" style="<?php echo $sStyleHidden_url_atraccion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_atraccion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_atraccion_label" style=""><span id="id_label_url_atraccion"><?php echo $this->nm_new_label['url_atraccion']; ?></span></span><br>
<?php
$url_atraccion_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($url_atraccion));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_atraccion"]) &&  $this->nmgp_cmp_readonly["url_atraccion"] == "on") { 

 ?>
<input type="hidden" name="url_atraccion" value="<?php echo $this->form_encode_input($url_atraccion) . "\">" . $url_atraccion_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_atraccion" class="sc-ui-readonly-url_atraccion css_url_atraccion_line" style="<?php echo $sStyleReadLab_url_atraccion; ?>"><?php echo $this->form_format_readonly("url_atraccion", $this->form_encode_input($url_atraccion_val)); ?></span><span id="id_read_off_url_atraccion" class="css_read_off_url_atraccion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_atraccion; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_url_atraccion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_atraccion" id="id_sc_field_url_atraccion" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_atraccion; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_atraccion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_atraccion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['uhfip']))
    {
        $this->nm_new_label['uhfip'] = "Uhfip";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $uhfip = $this->uhfip;
   $sStyleHidden_uhfip = '';
   if (isset($this->nmgp_cmp_hidden['uhfip']) && $this->nmgp_cmp_hidden['uhfip'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['uhfip']);
       $sStyleHidden_uhfip = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_uhfip = 'display: none;';
   $sStyleReadInp_uhfip = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['uhfip']) && $this->nmgp_cmp_readonly['uhfip'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['uhfip']);
       $sStyleReadLab_uhfip = '';
       $sStyleReadInp_uhfip = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['uhfip']) && $this->nmgp_cmp_hidden['uhfip'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="uhfip" value="<?php echo $this->form_encode_input($uhfip) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_uhfip_line" id="hidden_field_data_uhfip" style="<?php echo $sStyleHidden_uhfip; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_uhfip_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_uhfip_label" style=""><span id="id_label_uhfip"><?php echo $this->nm_new_label['uhfip']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["uhfip"]) &&  $this->nmgp_cmp_readonly["uhfip"] == "on") { 

 ?>
<input type="hidden" name="uhfip" value="<?php echo $this->form_encode_input($uhfip) . "\">" . $uhfip . ""; ?>
<?php } else { ?>
<span id="id_read_on_uhfip" class="sc-ui-readonly-uhfip css_uhfip_line" style="<?php echo $sStyleReadLab_uhfip; ?>"><?php echo $this->form_format_readonly("uhfip", $this->form_encode_input($this->uhfip)); ?></span><span id="id_read_off_uhfip" class="css_read_off_uhfip<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_uhfip; ?>">
 <input class="sc-js-input scFormObjectOdd css_uhfip_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_uhfip" type=text name="uhfip" value="<?php echo $this->form_encode_input($uhfip) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_uhfip_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_uhfip_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_reader']))
    {
        $this->nm_new_label['url_reader'] = "Url Reader";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_reader = $this->url_reader;
   $sStyleHidden_url_reader = '';
   if (isset($this->nmgp_cmp_hidden['url_reader']) && $this->nmgp_cmp_hidden['url_reader'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_reader']);
       $sStyleHidden_url_reader = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_reader = 'display: none;';
   $sStyleReadInp_url_reader = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_reader']) && $this->nmgp_cmp_readonly['url_reader'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_reader']);
       $sStyleReadLab_url_reader = '';
       $sStyleReadInp_url_reader = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_reader']) && $this->nmgp_cmp_hidden['url_reader'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_reader" value="<?php echo $this->form_encode_input($url_reader) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_reader_line" id="hidden_field_data_url_reader" style="<?php echo $sStyleHidden_url_reader; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_reader_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_reader_label" style=""><span id="id_label_url_reader"><?php echo $this->nm_new_label['url_reader']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_reader"]) &&  $this->nmgp_cmp_readonly["url_reader"] == "on") { 

 ?>
<input type="hidden" name="url_reader" value="<?php echo $this->form_encode_input($url_reader) . "\">" . $url_reader . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_reader" class="sc-ui-readonly-url_reader css_url_reader_line" style="<?php echo $sStyleReadLab_url_reader; ?>"><?php echo $this->form_format_readonly("url_reader", $this->form_encode_input($this->url_reader)); ?></span><span id="id_read_off_url_reader" class="css_read_off_url_reader<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_reader; ?>">
 <input class="sc-js-input scFormObjectOdd css_url_reader_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_url_reader" type=text name="url_reader" value="<?php echo $this->form_encode_input($url_reader) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_reader_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_reader_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cod_rfid900']))
    {
        $this->nm_new_label['cod_rfid900'] = "Cod Rfid 900";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cod_rfid900 = $this->cod_rfid900;
   $sStyleHidden_cod_rfid900 = '';
   if (isset($this->nmgp_cmp_hidden['cod_rfid900']) && $this->nmgp_cmp_hidden['cod_rfid900'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cod_rfid900']);
       $sStyleHidden_cod_rfid900 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cod_rfid900 = 'display: none;';
   $sStyleReadInp_cod_rfid900 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cod_rfid900']) && $this->nmgp_cmp_readonly['cod_rfid900'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cod_rfid900']);
       $sStyleReadLab_cod_rfid900 = '';
       $sStyleReadInp_cod_rfid900 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cod_rfid900']) && $this->nmgp_cmp_hidden['cod_rfid900'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_rfid900" value="<?php echo $this->form_encode_input($cod_rfid900) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cod_rfid900_line" id="hidden_field_data_cod_rfid900" style="<?php echo $sStyleHidden_cod_rfid900; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cod_rfid900_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cod_rfid900_label" style=""><span id="id_label_cod_rfid900"><?php echo $this->nm_new_label['cod_rfid900']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_rfid900"]) &&  $this->nmgp_cmp_readonly["cod_rfid900"] == "on") { 

 ?>
<input type="hidden" name="cod_rfid900" value="<?php echo $this->form_encode_input($cod_rfid900) . "\">" . $cod_rfid900 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_rfid900" class="sc-ui-readonly-cod_rfid900 css_cod_rfid900_line" style="<?php echo $sStyleReadLab_cod_rfid900; ?>"><?php echo $this->form_format_readonly("cod_rfid900", $this->form_encode_input($this->cod_rfid900)); ?></span><span id="id_read_off_cod_rfid900" class="css_read_off_cod_rfid900<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_rfid900; ?>">
 <input class="sc-js-input scFormObjectOdd css_cod_rfid900_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_rfid900" type=text name="cod_rfid900" value="<?php echo $this->form_encode_input($cod_rfid900) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_rfid900_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_rfid900_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['mensaje']))
    {
        $this->nm_new_label['mensaje'] = "Mensaje";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mensaje = $this->mensaje;
   $sStyleHidden_mensaje = '';
   if (isset($this->nmgp_cmp_hidden['mensaje']) && $this->nmgp_cmp_hidden['mensaje'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mensaje']);
       $sStyleHidden_mensaje = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mensaje = 'display: none;';
   $sStyleReadInp_mensaje = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mensaje']) && $this->nmgp_cmp_readonly['mensaje'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mensaje']);
       $sStyleReadLab_mensaje = '';
       $sStyleReadInp_mensaje = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mensaje']) && $this->nmgp_cmp_hidden['mensaje'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mensaje" value="<?php echo $this->form_encode_input($mensaje) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_mensaje_line" id="hidden_field_data_mensaje" style="<?php echo $sStyleHidden_mensaje; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mensaje_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_mensaje_label" style=""><span id="id_label_mensaje"><?php echo $this->nm_new_label['mensaje']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mensaje"]) &&  $this->nmgp_cmp_readonly["mensaje"] == "on") { 

 ?>
<input type="hidden" name="mensaje" value="<?php echo $this->form_encode_input($mensaje) . "\">" . $mensaje . ""; ?>
<?php } else { ?>
<span id="id_read_on_mensaje" class="sc-ui-readonly-mensaje css_mensaje_line" style="<?php echo $sStyleReadLab_mensaje; ?>"><?php echo $this->form_format_readonly("mensaje", $this->form_encode_input($this->mensaje)); ?></span><span id="id_read_off_mensaje" class="css_read_off_mensaje<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_mensaje; ?>">
 <input class="sc-js-input scFormObjectOdd css_mensaje_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_mensaje" type=text name="mensaje" value="<?php echo $this->form_encode_input($mensaje) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mensaje_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mensaje_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipolector']))
    {
        $this->nm_new_label['tipolector'] = "Tipolector";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipolector = $this->tipolector;
   $sStyleHidden_tipolector = '';
   if (isset($this->nmgp_cmp_hidden['tipolector']) && $this->nmgp_cmp_hidden['tipolector'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipolector']);
       $sStyleHidden_tipolector = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipolector = 'display: none;';
   $sStyleReadInp_tipolector = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipolector']) && $this->nmgp_cmp_readonly['tipolector'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipolector']);
       $sStyleReadLab_tipolector = '';
       $sStyleReadInp_tipolector = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipolector']) && $this->nmgp_cmp_hidden['tipolector'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipolector" value="<?php echo $this->form_encode_input($tipolector) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipolector_line" id="hidden_field_data_tipolector" style="<?php echo $sStyleHidden_tipolector; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipolector_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipolector_label" style=""><span id="id_label_tipolector"><?php echo $this->nm_new_label['tipolector']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipolector"]) &&  $this->nmgp_cmp_readonly["tipolector"] == "on") { 

 ?>
<input type="hidden" name="tipolector" value="<?php echo $this->form_encode_input($tipolector) . "\">" . $tipolector . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipolector" class="sc-ui-readonly-tipolector css_tipolector_line" style="<?php echo $sStyleReadLab_tipolector; ?>"><?php echo $this->form_format_readonly("tipolector", $this->form_encode_input($this->tipolector)); ?></span><span id="id_read_off_tipolector" class="css_read_off_tipolector<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipolector; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipolector_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipolector" type=text name="tipolector" value="<?php echo $this->form_encode_input($tipolector) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipolector_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipolector_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_accion_bg']))
    {
        $this->nm_new_label['url_accion_bg'] = "Url Accion Bg";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_accion_bg = $this->url_accion_bg;
   $sStyleHidden_url_accion_bg = '';
   if (isset($this->nmgp_cmp_hidden['url_accion_bg']) && $this->nmgp_cmp_hidden['url_accion_bg'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_accion_bg']);
       $sStyleHidden_url_accion_bg = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_accion_bg = 'display: none;';
   $sStyleReadInp_url_accion_bg = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_accion_bg']) && $this->nmgp_cmp_readonly['url_accion_bg'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_accion_bg']);
       $sStyleReadLab_url_accion_bg = '';
       $sStyleReadInp_url_accion_bg = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_accion_bg']) && $this->nmgp_cmp_hidden['url_accion_bg'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_accion_bg" value="<?php echo $this->form_encode_input($url_accion_bg) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_accion_bg_line" id="hidden_field_data_url_accion_bg" style="<?php echo $sStyleHidden_url_accion_bg; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_accion_bg_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_accion_bg_label" style=""><span id="id_label_url_accion_bg"><?php echo $this->nm_new_label['url_accion_bg']; ?></span></span><br>
<?php
$url_accion_bg_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($url_accion_bg));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_accion_bg"]) &&  $this->nmgp_cmp_readonly["url_accion_bg"] == "on") { 

 ?>
<input type="hidden" name="url_accion_bg" value="<?php echo $this->form_encode_input($url_accion_bg) . "\">" . $url_accion_bg_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_accion_bg" class="sc-ui-readonly-url_accion_bg css_url_accion_bg_line" style="<?php echo $sStyleReadLab_url_accion_bg; ?>"><?php echo $this->form_format_readonly("url_accion_bg", $this->form_encode_input($url_accion_bg_val)); ?></span><span id="id_read_off_url_accion_bg" class="css_read_off_url_accion_bg<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_accion_bg; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_url_accion_bg_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_accion_bg" id="id_sc_field_url_accion_bg" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_accion_bg; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_accion_bg_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_accion_bg_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['url_inicio']))
    {
        $this->nm_new_label['url_inicio'] = "Url Inicio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $url_inicio = $this->url_inicio;
   $sStyleHidden_url_inicio = '';
   if (isset($this->nmgp_cmp_hidden['url_inicio']) && $this->nmgp_cmp_hidden['url_inicio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['url_inicio']);
       $sStyleHidden_url_inicio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_url_inicio = 'display: none;';
   $sStyleReadInp_url_inicio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['url_inicio']) && $this->nmgp_cmp_readonly['url_inicio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['url_inicio']);
       $sStyleReadLab_url_inicio = '';
       $sStyleReadInp_url_inicio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['url_inicio']) && $this->nmgp_cmp_hidden['url_inicio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_inicio" value="<?php echo $this->form_encode_input($url_inicio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_url_inicio_line" id="hidden_field_data_url_inicio" style="<?php echo $sStyleHidden_url_inicio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_url_inicio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_url_inicio_label" style=""><span id="id_label_url_inicio"><?php echo $this->nm_new_label['url_inicio']; ?></span></span><br>
<?php
$url_inicio_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($url_inicio));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_inicio"]) &&  $this->nmgp_cmp_readonly["url_inicio"] == "on") { 

 ?>
<input type="hidden" name="url_inicio" value="<?php echo $this->form_encode_input($url_inicio) . "\">" . $url_inicio_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_inicio" class="sc-ui-readonly-url_inicio css_url_inicio_line" style="<?php echo $sStyleReadLab_url_inicio; ?>"><?php echo $this->form_format_readonly("url_inicio", $this->form_encode_input($url_inicio_val)); ?></span><span id="id_read_off_url_inicio" class="css_read_off_url_inicio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_inicio; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_url_inicio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_inicio" id="id_sc_field_url_inicio" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_inicio; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_inicio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_inicio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ledstripe1']))
    {
        $this->nm_new_label['ledstripe1'] = "Ledstripe 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ledstripe1 = $this->ledstripe1;
   $sStyleHidden_ledstripe1 = '';
   if (isset($this->nmgp_cmp_hidden['ledstripe1']) && $this->nmgp_cmp_hidden['ledstripe1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ledstripe1']);
       $sStyleHidden_ledstripe1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ledstripe1 = 'display: none;';
   $sStyleReadInp_ledstripe1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ledstripe1']) && $this->nmgp_cmp_readonly['ledstripe1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ledstripe1']);
       $sStyleReadLab_ledstripe1 = '';
       $sStyleReadInp_ledstripe1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ledstripe1']) && $this->nmgp_cmp_hidden['ledstripe1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ledstripe1" value="<?php echo $this->form_encode_input($ledstripe1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ledstripe1_line" id="hidden_field_data_ledstripe1" style="<?php echo $sStyleHidden_ledstripe1; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ledstripe1_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ledstripe1_label" style=""><span id="id_label_ledstripe1"><?php echo $this->nm_new_label['ledstripe1']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ledstripe1"]) &&  $this->nmgp_cmp_readonly["ledstripe1"] == "on") { 

 ?>
<input type="hidden" name="ledstripe1" value="<?php echo $this->form_encode_input($ledstripe1) . "\">" . $ledstripe1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ledstripe1" class="sc-ui-readonly-ledstripe1 css_ledstripe1_line" style="<?php echo $sStyleReadLab_ledstripe1; ?>"><?php echo $this->form_format_readonly("ledstripe1", $this->form_encode_input($this->ledstripe1)); ?></span><span id="id_read_off_ledstripe1" class="css_read_off_ledstripe1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ledstripe1; ?>">
 <input class="sc-js-input scFormObjectOdd css_ledstripe1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ledstripe1" type=text name="ledstripe1" value="<?php echo $this->form_encode_input($ledstripe1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ledstripe1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ledstripe1_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ledstripe2']))
    {
        $this->nm_new_label['ledstripe2'] = "Ledstripe 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ledstripe2 = $this->ledstripe2;
   $sStyleHidden_ledstripe2 = '';
   if (isset($this->nmgp_cmp_hidden['ledstripe2']) && $this->nmgp_cmp_hidden['ledstripe2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ledstripe2']);
       $sStyleHidden_ledstripe2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ledstripe2 = 'display: none;';
   $sStyleReadInp_ledstripe2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ledstripe2']) && $this->nmgp_cmp_readonly['ledstripe2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ledstripe2']);
       $sStyleReadLab_ledstripe2 = '';
       $sStyleReadInp_ledstripe2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ledstripe2']) && $this->nmgp_cmp_hidden['ledstripe2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ledstripe2" value="<?php echo $this->form_encode_input($ledstripe2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ledstripe2_line" id="hidden_field_data_ledstripe2" style="<?php echo $sStyleHidden_ledstripe2; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ledstripe2_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ledstripe2_label" style=""><span id="id_label_ledstripe2"><?php echo $this->nm_new_label['ledstripe2']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ledstripe2"]) &&  $this->nmgp_cmp_readonly["ledstripe2"] == "on") { 

 ?>
<input type="hidden" name="ledstripe2" value="<?php echo $this->form_encode_input($ledstripe2) . "\">" . $ledstripe2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ledstripe2" class="sc-ui-readonly-ledstripe2 css_ledstripe2_line" style="<?php echo $sStyleReadLab_ledstripe2; ?>"><?php echo $this->form_format_readonly("ledstripe2", $this->form_encode_input($this->ledstripe2)); ?></span><span id="id_read_off_ledstripe2" class="css_read_off_ledstripe2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ledstripe2; ?>">
 <input class="sc-js-input scFormObjectOdd css_ledstripe2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ledstripe2" type=text name="ledstripe2" value="<?php echo $this->form_encode_input($ledstripe2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ledstripe2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ledstripe2_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ledstripe3']))
    {
        $this->nm_new_label['ledstripe3'] = "Ledstripe 3";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ledstripe3 = $this->ledstripe3;
   $sStyleHidden_ledstripe3 = '';
   if (isset($this->nmgp_cmp_hidden['ledstripe3']) && $this->nmgp_cmp_hidden['ledstripe3'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ledstripe3']);
       $sStyleHidden_ledstripe3 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ledstripe3 = 'display: none;';
   $sStyleReadInp_ledstripe3 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ledstripe3']) && $this->nmgp_cmp_readonly['ledstripe3'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ledstripe3']);
       $sStyleReadLab_ledstripe3 = '';
       $sStyleReadInp_ledstripe3 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ledstripe3']) && $this->nmgp_cmp_hidden['ledstripe3'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ledstripe3" value="<?php echo $this->form_encode_input($ledstripe3) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ledstripe3_line" id="hidden_field_data_ledstripe3" style="<?php echo $sStyleHidden_ledstripe3; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ledstripe3_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ledstripe3_label" style=""><span id="id_label_ledstripe3"><?php echo $this->nm_new_label['ledstripe3']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ledstripe3"]) &&  $this->nmgp_cmp_readonly["ledstripe3"] == "on") { 

 ?>
<input type="hidden" name="ledstripe3" value="<?php echo $this->form_encode_input($ledstripe3) . "\">" . $ledstripe3 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ledstripe3" class="sc-ui-readonly-ledstripe3 css_ledstripe3_line" style="<?php echo $sStyleReadLab_ledstripe3; ?>"><?php echo $this->form_format_readonly("ledstripe3", $this->form_encode_input($this->ledstripe3)); ?></span><span id="id_read_off_ledstripe3" class="css_read_off_ledstripe3<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ledstripe3; ?>">
 <input class="sc-js-input scFormObjectOdd css_ledstripe3_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ledstripe3" type=text name="ledstripe3" value="<?php echo $this->form_encode_input($ledstripe3) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ledstripe3_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ledstripe3_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ledstripe4']))
    {
        $this->nm_new_label['ledstripe4'] = "Ledstripe 4";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ledstripe4 = $this->ledstripe4;
   $sStyleHidden_ledstripe4 = '';
   if (isset($this->nmgp_cmp_hidden['ledstripe4']) && $this->nmgp_cmp_hidden['ledstripe4'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ledstripe4']);
       $sStyleHidden_ledstripe4 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ledstripe4 = 'display: none;';
   $sStyleReadInp_ledstripe4 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ledstripe4']) && $this->nmgp_cmp_readonly['ledstripe4'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ledstripe4']);
       $sStyleReadLab_ledstripe4 = '';
       $sStyleReadInp_ledstripe4 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ledstripe4']) && $this->nmgp_cmp_hidden['ledstripe4'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ledstripe4" value="<?php echo $this->form_encode_input($ledstripe4) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ledstripe4_line" id="hidden_field_data_ledstripe4" style="<?php echo $sStyleHidden_ledstripe4; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ledstripe4_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ledstripe4_label" style=""><span id="id_label_ledstripe4"><?php echo $this->nm_new_label['ledstripe4']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ledstripe4"]) &&  $this->nmgp_cmp_readonly["ledstripe4"] == "on") { 

 ?>
<input type="hidden" name="ledstripe4" value="<?php echo $this->form_encode_input($ledstripe4) . "\">" . $ledstripe4 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ledstripe4" class="sc-ui-readonly-ledstripe4 css_ledstripe4_line" style="<?php echo $sStyleReadLab_ledstripe4; ?>"><?php echo $this->form_format_readonly("ledstripe4", $this->form_encode_input($this->ledstripe4)); ?></span><span id="id_read_off_ledstripe4" class="css_read_off_ledstripe4<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ledstripe4; ?>">
 <input class="sc-js-input scFormObjectOdd css_ledstripe4_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ledstripe4" type=text name="ledstripe4" value="<?php echo $this->form_encode_input($ledstripe4) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ledstripe4_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ledstripe4_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lasteffect']))
    {
        $this->nm_new_label['lasteffect'] = "Lasteffect";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lasteffect = $this->lasteffect;
   $sStyleHidden_lasteffect = '';
   if (isset($this->nmgp_cmp_hidden['lasteffect']) && $this->nmgp_cmp_hidden['lasteffect'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lasteffect']);
       $sStyleHidden_lasteffect = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lasteffect = 'display: none;';
   $sStyleReadInp_lasteffect = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lasteffect']) && $this->nmgp_cmp_readonly['lasteffect'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lasteffect']);
       $sStyleReadLab_lasteffect = '';
       $sStyleReadInp_lasteffect = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lasteffect']) && $this->nmgp_cmp_hidden['lasteffect'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lasteffect" value="<?php echo $this->form_encode_input($lasteffect) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_lasteffect_line" id="hidden_field_data_lasteffect" style="<?php echo $sStyleHidden_lasteffect; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lasteffect_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lasteffect_label" style=""><span id="id_label_lasteffect"><?php echo $this->nm_new_label['lasteffect']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lasteffect"]) &&  $this->nmgp_cmp_readonly["lasteffect"] == "on") { 

 ?>
<input type="hidden" name="lasteffect" value="<?php echo $this->form_encode_input($lasteffect) . "\">" . $lasteffect . ""; ?>
<?php } else { ?>
<span id="id_read_on_lasteffect" class="sc-ui-readonly-lasteffect css_lasteffect_line" style="<?php echo $sStyleReadLab_lasteffect; ?>"><?php echo $this->form_format_readonly("lasteffect", $this->form_encode_input($this->lasteffect)); ?></span><span id="id_read_off_lasteffect" class="css_read_off_lasteffect<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_lasteffect; ?>">
 <input class="sc-js-input scFormObjectOdd css_lasteffect_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_lasteffect" type=text name="lasteffect" value="<?php echo $this->form_encode_input($lasteffect) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lasteffect_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lasteffect_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['color']))
    {
        $this->nm_new_label['color'] = "Color";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $color = $this->color;
   $sStyleHidden_color = '';
   if (isset($this->nmgp_cmp_hidden['color']) && $this->nmgp_cmp_hidden['color'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['color']);
       $sStyleHidden_color = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_color = 'display: none;';
   $sStyleReadInp_color = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['color']) && $this->nmgp_cmp_readonly['color'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['color']);
       $sStyleReadLab_color = '';
       $sStyleReadInp_color = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['color']) && $this->nmgp_cmp_hidden['color'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="color" value="<?php echo $this->form_encode_input($color) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_color_line" id="hidden_field_data_color" style="<?php echo $sStyleHidden_color; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_color_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_color_label" style=""><span id="id_label_color"><?php echo $this->nm_new_label['color']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["color"]) &&  $this->nmgp_cmp_readonly["color"] == "on") { 

 ?>
<input type="hidden" name="color" value="<?php echo $this->form_encode_input($color) . "\">" . $color . ""; ?>
<?php } else { ?>
<span id="id_read_on_color" class="sc-ui-readonly-color css_color_line" style="<?php echo $sStyleReadLab_color; ?>"><?php echo $this->form_format_readonly("color", $this->form_encode_input($this->color)); ?></span><span id="id_read_off_color" class="css_read_off_color<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_color; ?>">
 <input class="sc-js-input scFormObjectOdd css_color_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_color" type=text name="color" value="<?php echo $this->form_encode_input($color) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_color_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_color_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '1') ? " selected" : "";
?> 
           <option value="1" <?php echo $obj_sel ?>>1</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
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
        $buttonMacroDisabled = 'sc-unique-btn-25';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['first'];
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
        $buttonMacroDisabled = 'sc-unique-btn-26';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['back'];
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
        $buttonMacroDisabled = 'sc-unique-btn-27';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['forward'];
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
        $buttonMacroDisabled = 'sc-unique-btn-28';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage({title: '', message: "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", isModal: false, timeout: 0, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: true, showBodyIcon: false, isToast: false, toastPos: ""});
</script> 
<?php
      }
?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_devices_leds_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_devices_leds_mob");
 parent.scAjaxDetailHeight("form_devices_leds_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_devices_leds_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_devices_leds_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['sc_modal'])
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
		if ($("#sc_b_new_t.sc-unique-btn-15").length && $("#sc_b_new_t.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-16").length && $("#sc_b_ins_t.sc-unique-btn-16").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-16").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-17").length && $("#sc_b_sai_t.sc-unique-btn-17").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-17").hasClass("disabled")) {
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
		if ($("#sc_b_upd_t.sc-unique-btn-18").length && $("#sc_b_upd_t.sc-unique-btn-18").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-18").hasClass("disabled")) {
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
		if ($("#sc_b_del_t.sc-unique-btn-19").length && $("#sc_b_del_t.sc-unique-btn-19").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-19").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-20").length && $("#sc_b_sai_t.sc-unique-btn-20").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-20").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-21").length && $("#sc_b_sai_t.sc-unique-btn-21").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-21").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-22").length && $("#sc_b_sai_t.sc-unique-btn-22").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-22").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-23").length && $("#sc_b_sai_t.sc-unique-btn-23").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-23").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-24").length && $("#sc_b_sai_t.sc-unique-btn-24").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-24").hasClass("disabled")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-25").length && $("#sc_b_ini_b.sc-unique-btn-25").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-25").hasClass("disabled")) {
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
		if ($("#sc_b_ret_b.sc-unique-btn-26").length && $("#sc_b_ret_b.sc-unique-btn-26").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-26").hasClass("disabled")) {
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
		if ($("#sc_b_avc_b.sc-unique-btn-27").length && $("#sc_b_avc_b.sc-unique-btn-27").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-27").hasClass("disabled")) {
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
		if ($("#sc_b_fim_b.sc-unique-btn-28").length && $("#sc_b_fim_b.sc-unique-btn-28").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-28").hasClass("disabled")) {
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_mob']['buttonStatus'] = $this->nmgp_botoes;
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
