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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " movcte2"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " movcte2"); } ?></TITLE>
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
.css_read_off_fecdoc43 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fedoc43 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_feccobro43 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fectransfer43 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecvendoc43 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecvenret43 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_creacion_del_65 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecha_adicional button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_movcte2/form_movcte2_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_movcte2_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_movcte2_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['link_info']['remove_border']) {
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
 include_once("form_movcte2_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_movcte2'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_movcte2'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['fast_search'][2] : "";
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['insert'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['bcancelar'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['update'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['delete'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['tipodoc43']))
           {
               $this->nmgp_cmp_readonly['tipodoc43'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['codcte43']))
    {
        $this->nm_new_label['codcte43'] = "Codcte 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codcte43 = $this->codcte43;
   $sStyleHidden_codcte43 = '';
   if (isset($this->nmgp_cmp_hidden['codcte43']) && $this->nmgp_cmp_hidden['codcte43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codcte43']);
       $sStyleHidden_codcte43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codcte43 = 'display: none;';
   $sStyleReadInp_codcte43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codcte43']) && $this->nmgp_cmp_readonly['codcte43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codcte43']);
       $sStyleReadLab_codcte43 = '';
       $sStyleReadInp_codcte43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codcte43']) && $this->nmgp_cmp_hidden['codcte43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codcte43" value="<?php echo $this->form_encode_input($codcte43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codcte43_label" id="hidden_field_label_codcte43" style="<?php echo $sStyleHidden_codcte43; ?>"><span id="id_label_codcte43"><?php echo $this->nm_new_label['codcte43']; ?></span></TD>
    <TD class="scFormDataOdd css_codcte43_line" id="hidden_field_data_codcte43" style="<?php echo $sStyleHidden_codcte43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codcte43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codcte43"]) &&  $this->nmgp_cmp_readonly["codcte43"] == "on") { 

 ?>
<input type="hidden" name="codcte43" value="<?php echo $this->form_encode_input($codcte43) . "\">" . $codcte43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_codcte43" class="sc-ui-readonly-codcte43 css_codcte43_line" style="<?php echo $sStyleReadLab_codcte43; ?>"><?php echo $this->form_format_readonly("codcte43", $this->form_encode_input($this->codcte43)); ?></span><span id="id_read_off_codcte43" class="css_read_off_codcte43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codcte43; ?>">
 <input class="sc-js-input scFormObjectOdd css_codcte43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codcte43" type=text name="codcte43" value="<?php echo $this->form_encode_input($codcte43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codcte43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codcte43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['numdoc43']))
           {
               $this->nmgp_cmp_readonly['numdoc43'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['tipodoc43']))
    {
        $this->nm_new_label['tipodoc43'] = "Tipodoc 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipodoc43 = $this->tipodoc43;
   $sStyleHidden_tipodoc43 = '';
   if (isset($this->nmgp_cmp_hidden['tipodoc43']) && $this->nmgp_cmp_hidden['tipodoc43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipodoc43']);
       $sStyleHidden_tipodoc43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipodoc43 = 'display: none;';
   $sStyleReadInp_tipodoc43 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["tipodoc43"]) &&  $this->nmgp_cmp_readonly["tipodoc43"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipodoc43']);
       $sStyleReadLab_tipodoc43 = '';
       $sStyleReadInp_tipodoc43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipodoc43']) && $this->nmgp_cmp_hidden['tipodoc43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipodoc43" value="<?php echo $this->form_encode_input($tipodoc43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipodoc43_label" id="hidden_field_label_tipodoc43" style="<?php echo $sStyleHidden_tipodoc43; ?>"><span id="id_label_tipodoc43"><?php echo $this->nm_new_label['tipodoc43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['tipodoc43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['tipodoc43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tipodoc43_line" id="hidden_field_data_tipodoc43" style="<?php echo $sStyleHidden_tipodoc43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipodoc43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["tipodoc43"]) &&  $this->nmgp_cmp_readonly["tipodoc43"] == "on")) { 

 ?>
<input type="hidden" name="tipodoc43" value="<?php echo $this->form_encode_input($tipodoc43) . "\"><span id=\"id_ajax_label_tipodoc43\">" . $tipodoc43 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_tipodoc43" class="sc-ui-readonly-tipodoc43 css_tipodoc43_line" style="<?php echo $sStyleReadLab_tipodoc43; ?>"><?php echo $this->form_format_readonly("tipodoc43", $this->form_encode_input($this->tipodoc43)); ?></span><span id="id_read_off_tipodoc43" class="css_read_off_tipodoc43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipodoc43; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipodoc43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipodoc43" type=text name="tipodoc43" value="<?php echo $this->form_encode_input($tipodoc43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipodoc43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipodoc43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['ocurren43']))
           {
               $this->nmgp_cmp_readonly['ocurren43'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['numdoc43']))
    {
        $this->nm_new_label['numdoc43'] = "Numdoc 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numdoc43 = $this->numdoc43;
   $sStyleHidden_numdoc43 = '';
   if (isset($this->nmgp_cmp_hidden['numdoc43']) && $this->nmgp_cmp_hidden['numdoc43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numdoc43']);
       $sStyleHidden_numdoc43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numdoc43 = 'display: none;';
   $sStyleReadInp_numdoc43 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["numdoc43"]) &&  $this->nmgp_cmp_readonly["numdoc43"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numdoc43']);
       $sStyleReadLab_numdoc43 = '';
       $sStyleReadInp_numdoc43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numdoc43']) && $this->nmgp_cmp_hidden['numdoc43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numdoc43" value="<?php echo $this->form_encode_input($numdoc43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numdoc43_label" id="hidden_field_label_numdoc43" style="<?php echo $sStyleHidden_numdoc43; ?>"><span id="id_label_numdoc43"><?php echo $this->nm_new_label['numdoc43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['numdoc43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['numdoc43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_numdoc43_line" id="hidden_field_data_numdoc43" style="<?php echo $sStyleHidden_numdoc43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numdoc43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["numdoc43"]) &&  $this->nmgp_cmp_readonly["numdoc43"] == "on")) { 

 ?>
<input type="hidden" name="numdoc43" value="<?php echo $this->form_encode_input($numdoc43) . "\"><span id=\"id_ajax_label_numdoc43\">" . $numdoc43 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_numdoc43" class="sc-ui-readonly-numdoc43 css_numdoc43_line" style="<?php echo $sStyleReadLab_numdoc43; ?>"><?php echo $this->form_format_readonly("numdoc43", $this->form_encode_input($this->numdoc43)); ?></span><span id="id_read_off_numdoc43" class="css_read_off_numdoc43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numdoc43; ?>">
 <input class="sc-js-input scFormObjectOdd css_numdoc43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numdoc43" type=text name="numdoc43" value="<?php echo $this->form_encode_input($numdoc43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numdoc43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numdoc43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ocurren43']))
    {
        $this->nm_new_label['ocurren43'] = "Ocurren 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ocurren43 = $this->ocurren43;
   $sStyleHidden_ocurren43 = '';
   if (isset($this->nmgp_cmp_hidden['ocurren43']) && $this->nmgp_cmp_hidden['ocurren43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ocurren43']);
       $sStyleHidden_ocurren43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ocurren43 = 'display: none;';
   $sStyleReadInp_ocurren43 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["ocurren43"]) &&  $this->nmgp_cmp_readonly["ocurren43"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ocurren43']);
       $sStyleReadLab_ocurren43 = '';
       $sStyleReadInp_ocurren43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ocurren43']) && $this->nmgp_cmp_hidden['ocurren43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ocurren43" value="<?php echo $this->form_encode_input($ocurren43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ocurren43_label" id="hidden_field_label_ocurren43" style="<?php echo $sStyleHidden_ocurren43; ?>"><span id="id_label_ocurren43"><?php echo $this->nm_new_label['ocurren43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['ocurren43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['ocurren43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ocurren43_line" id="hidden_field_data_ocurren43" style="<?php echo $sStyleHidden_ocurren43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ocurren43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["ocurren43"]) &&  $this->nmgp_cmp_readonly["ocurren43"] == "on")) { 

 ?>
<input type="hidden" name="ocurren43" value="<?php echo $this->form_encode_input($ocurren43) . "\"><span id=\"id_ajax_label_ocurren43\">" . $ocurren43 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_ocurren43" class="sc-ui-readonly-ocurren43 css_ocurren43_line" style="<?php echo $sStyleReadLab_ocurren43; ?>"><?php echo $this->form_format_readonly("ocurren43", $this->form_encode_input($this->ocurren43)); ?></span><span id="id_read_off_ocurren43" class="css_read_off_ocurren43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ocurren43; ?>">
 <input class="sc-js-input scFormObjectOdd css_ocurren43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ocurren43" type=text name="ocurren43" value="<?php echo $this->form_encode_input($ocurren43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ocurren43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ocurren43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cocte43']))
    {
        $this->nm_new_label['cocte43'] = "Cocte 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cocte43 = $this->cocte43;
   $sStyleHidden_cocte43 = '';
   if (isset($this->nmgp_cmp_hidden['cocte43']) && $this->nmgp_cmp_hidden['cocte43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cocte43']);
       $sStyleHidden_cocte43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cocte43 = 'display: none;';
   $sStyleReadInp_cocte43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cocte43']) && $this->nmgp_cmp_readonly['cocte43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cocte43']);
       $sStyleReadLab_cocte43 = '';
       $sStyleReadInp_cocte43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cocte43']) && $this->nmgp_cmp_hidden['cocte43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cocte43" value="<?php echo $this->form_encode_input($cocte43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cocte43_label" id="hidden_field_label_cocte43" style="<?php echo $sStyleHidden_cocte43; ?>"><span id="id_label_cocte43"><?php echo $this->nm_new_label['cocte43']; ?></span></TD>
    <TD class="scFormDataOdd css_cocte43_line" id="hidden_field_data_cocte43" style="<?php echo $sStyleHidden_cocte43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cocte43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cocte43"]) &&  $this->nmgp_cmp_readonly["cocte43"] == "on") { 

 ?>
<input type="hidden" name="cocte43" value="<?php echo $this->form_encode_input($cocte43) . "\">" . $cocte43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cocte43" class="sc-ui-readonly-cocte43 css_cocte43_line" style="<?php echo $sStyleReadLab_cocte43; ?>"><?php echo $this->form_format_readonly("cocte43", $this->form_encode_input($this->cocte43)); ?></span><span id="id_read_off_cocte43" class="css_read_off_cocte43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cocte43; ?>">
 <input class="sc-js-input scFormObjectOdd css_cocte43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cocte43" type=text name="cocte43" value="<?php echo $this->form_encode_input($cocte43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cocte43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cocte43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecdoc43']))
    {
        $this->nm_new_label['fecdoc43'] = "Fecdoc 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecdoc43 = $this->fecdoc43;
   if (strlen($this->fecdoc43_hora) > 8 ) {$this->fecdoc43_hora = substr($this->fecdoc43_hora, 0, 8);}
   $this->fecdoc43 .= ' ' . $this->fecdoc43_hora;
   $this->fecdoc43  = trim($this->fecdoc43);
   $fecdoc43 = $this->fecdoc43;
   $sStyleHidden_fecdoc43 = '';
   if (isset($this->nmgp_cmp_hidden['fecdoc43']) && $this->nmgp_cmp_hidden['fecdoc43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecdoc43']);
       $sStyleHidden_fecdoc43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecdoc43 = 'display: none;';
   $sStyleReadInp_fecdoc43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecdoc43']) && $this->nmgp_cmp_readonly['fecdoc43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecdoc43']);
       $sStyleReadLab_fecdoc43 = '';
       $sStyleReadInp_fecdoc43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecdoc43']) && $this->nmgp_cmp_hidden['fecdoc43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecdoc43" value="<?php echo $this->form_encode_input($fecdoc43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecdoc43_label" id="hidden_field_label_fecdoc43" style="<?php echo $sStyleHidden_fecdoc43; ?>"><span id="id_label_fecdoc43"><?php echo $this->nm_new_label['fecdoc43']; ?></span></TD>
    <TD class="scFormDataOdd css_fecdoc43_line" id="hidden_field_data_fecdoc43" style="<?php echo $sStyleHidden_fecdoc43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecdoc43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecdoc43"]) &&  $this->nmgp_cmp_readonly["fecdoc43"] == "on") { 

 ?>
<input type="hidden" name="fecdoc43" value="<?php echo $this->form_encode_input($fecdoc43) . "\">" . $fecdoc43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecdoc43" class="sc-ui-readonly-fecdoc43 css_fecdoc43_line" style="<?php echo $sStyleReadLab_fecdoc43; ?>"><?php echo $this->form_format_readonly("fecdoc43", $this->form_encode_input($fecdoc43)); ?></span><span id="id_read_off_fecdoc43" class="css_read_off_fecdoc43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecdoc43; ?>"><?php
$tmp_form_data = $this->field_config['fecdoc43']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecdoc43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecdoc43" type=text name="fecdoc43" value="<?php echo $this->form_encode_input($fecdoc43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecdoc43']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecdoc43']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecdoc43']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecdoc43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecdoc43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecdoc43 = $old_dt_fecdoc43;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipdoc43']))
    {
        $this->nm_new_label['tipdoc43'] = "Tipdoc 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipdoc43 = $this->tipdoc43;
   $sStyleHidden_tipdoc43 = '';
   if (isset($this->nmgp_cmp_hidden['tipdoc43']) && $this->nmgp_cmp_hidden['tipdoc43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipdoc43']);
       $sStyleHidden_tipdoc43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipdoc43 = 'display: none;';
   $sStyleReadInp_tipdoc43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipdoc43']) && $this->nmgp_cmp_readonly['tipdoc43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipdoc43']);
       $sStyleReadLab_tipdoc43 = '';
       $sStyleReadInp_tipdoc43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipdoc43']) && $this->nmgp_cmp_hidden['tipdoc43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipdoc43" value="<?php echo $this->form_encode_input($tipdoc43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipdoc43_label" id="hidden_field_label_tipdoc43" style="<?php echo $sStyleHidden_tipdoc43; ?>"><span id="id_label_tipdoc43"><?php echo $this->nm_new_label['tipdoc43']; ?></span></TD>
    <TD class="scFormDataOdd css_tipdoc43_line" id="hidden_field_data_tipdoc43" style="<?php echo $sStyleHidden_tipdoc43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipdoc43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipdoc43"]) &&  $this->nmgp_cmp_readonly["tipdoc43"] == "on") { 

 ?>
<input type="hidden" name="tipdoc43" value="<?php echo $this->form_encode_input($tipdoc43) . "\">" . $tipdoc43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipdoc43" class="sc-ui-readonly-tipdoc43 css_tipdoc43_line" style="<?php echo $sStyleReadLab_tipdoc43; ?>"><?php echo $this->form_format_readonly("tipdoc43", $this->form_encode_input($this->tipdoc43)); ?></span><span id="id_read_off_tipdoc43" class="css_read_off_tipdoc43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipdoc43; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipdoc43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipdoc43" type=text name="tipdoc43" value="<?php echo $this->form_encode_input($tipdoc43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipdoc43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipdoc43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numvencob43']))
    {
        $this->nm_new_label['numvencob43'] = "Numvencob 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numvencob43 = $this->numvencob43;
   $sStyleHidden_numvencob43 = '';
   if (isset($this->nmgp_cmp_hidden['numvencob43']) && $this->nmgp_cmp_hidden['numvencob43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numvencob43']);
       $sStyleHidden_numvencob43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numvencob43 = 'display: none;';
   $sStyleReadInp_numvencob43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numvencob43']) && $this->nmgp_cmp_readonly['numvencob43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numvencob43']);
       $sStyleReadLab_numvencob43 = '';
       $sStyleReadInp_numvencob43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numvencob43']) && $this->nmgp_cmp_hidden['numvencob43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numvencob43" value="<?php echo $this->form_encode_input($numvencob43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numvencob43_label" id="hidden_field_label_numvencob43" style="<?php echo $sStyleHidden_numvencob43; ?>"><span id="id_label_numvencob43"><?php echo $this->nm_new_label['numvencob43']; ?></span></TD>
    <TD class="scFormDataOdd css_numvencob43_line" id="hidden_field_data_numvencob43" style="<?php echo $sStyleHidden_numvencob43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numvencob43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numvencob43"]) &&  $this->nmgp_cmp_readonly["numvencob43"] == "on") { 

 ?>
<input type="hidden" name="numvencob43" value="<?php echo $this->form_encode_input($numvencob43) . "\">" . $numvencob43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_numvencob43" class="sc-ui-readonly-numvencob43 css_numvencob43_line" style="<?php echo $sStyleReadLab_numvencob43; ?>"><?php echo $this->form_format_readonly("numvencob43", $this->form_encode_input($this->numvencob43)); ?></span><span id="id_read_off_numvencob43" class="css_read_off_numvencob43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numvencob43; ?>">
 <input class="sc-js-input scFormObjectOdd css_numvencob43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numvencob43" type=text name="numvencob43" value="<?php echo $this->form_encode_input($numvencob43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numvencob43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numvencob43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fedoc43']))
    {
        $this->nm_new_label['fedoc43'] = "Fedoc 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fedoc43 = $this->fedoc43;
   if (strlen($this->fedoc43_hora) > 8 ) {$this->fedoc43_hora = substr($this->fedoc43_hora, 0, 8);}
   $this->fedoc43 .= ' ' . $this->fedoc43_hora;
   $this->fedoc43  = trim($this->fedoc43);
   $fedoc43 = $this->fedoc43;
   $sStyleHidden_fedoc43 = '';
   if (isset($this->nmgp_cmp_hidden['fedoc43']) && $this->nmgp_cmp_hidden['fedoc43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fedoc43']);
       $sStyleHidden_fedoc43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fedoc43 = 'display: none;';
   $sStyleReadInp_fedoc43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fedoc43']) && $this->nmgp_cmp_readonly['fedoc43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fedoc43']);
       $sStyleReadLab_fedoc43 = '';
       $sStyleReadInp_fedoc43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fedoc43']) && $this->nmgp_cmp_hidden['fedoc43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fedoc43" value="<?php echo $this->form_encode_input($fedoc43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fedoc43_label" id="hidden_field_label_fedoc43" style="<?php echo $sStyleHidden_fedoc43; ?>"><span id="id_label_fedoc43"><?php echo $this->nm_new_label['fedoc43']; ?></span></TD>
    <TD class="scFormDataOdd css_fedoc43_line" id="hidden_field_data_fedoc43" style="<?php echo $sStyleHidden_fedoc43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fedoc43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fedoc43"]) &&  $this->nmgp_cmp_readonly["fedoc43"] == "on") { 

 ?>
<input type="hidden" name="fedoc43" value="<?php echo $this->form_encode_input($fedoc43) . "\">" . $fedoc43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fedoc43" class="sc-ui-readonly-fedoc43 css_fedoc43_line" style="<?php echo $sStyleReadLab_fedoc43; ?>"><?php echo $this->form_format_readonly("fedoc43", $this->form_encode_input($fedoc43)); ?></span><span id="id_read_off_fedoc43" class="css_read_off_fedoc43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fedoc43; ?>"><?php
$tmp_form_data = $this->field_config['fedoc43']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fedoc43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fedoc43" type=text name="fedoc43" value="<?php echo $this->form_encode_input($fedoc43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fedoc43']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fedoc43']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fedoc43']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fedoc43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fedoc43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fedoc43 = $old_dt_fedoc43;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['totdoc43']))
    {
        $this->nm_new_label['totdoc43'] = "Totdoc 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totdoc43 = $this->totdoc43;
   $sStyleHidden_totdoc43 = '';
   if (isset($this->nmgp_cmp_hidden['totdoc43']) && $this->nmgp_cmp_hidden['totdoc43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totdoc43']);
       $sStyleHidden_totdoc43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totdoc43 = 'display: none;';
   $sStyleReadInp_totdoc43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['totdoc43']) && $this->nmgp_cmp_readonly['totdoc43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totdoc43']);
       $sStyleReadLab_totdoc43 = '';
       $sStyleReadInp_totdoc43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totdoc43']) && $this->nmgp_cmp_hidden['totdoc43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totdoc43" value="<?php echo $this->form_encode_input($totdoc43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_totdoc43_label" id="hidden_field_label_totdoc43" style="<?php echo $sStyleHidden_totdoc43; ?>"><span id="id_label_totdoc43"><?php echo $this->nm_new_label['totdoc43']; ?></span></TD>
    <TD class="scFormDataOdd css_totdoc43_line" id="hidden_field_data_totdoc43" style="<?php echo $sStyleHidden_totdoc43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totdoc43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["totdoc43"]) &&  $this->nmgp_cmp_readonly["totdoc43"] == "on") { 

 ?>
<input type="hidden" name="totdoc43" value="<?php echo $this->form_encode_input($totdoc43) . "\">" . $totdoc43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_totdoc43" class="sc-ui-readonly-totdoc43 css_totdoc43_line" style="<?php echo $sStyleReadLab_totdoc43; ?>"><?php echo $this->form_format_readonly("totdoc43", $this->form_encode_input($this->totdoc43)); ?></span><span id="id_read_off_totdoc43" class="css_read_off_totdoc43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_totdoc43; ?>">
 <input class="sc-js-input scFormObjectOdd css_totdoc43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_totdoc43" type=text name="totdoc43" value="<?php echo $this->form_encode_input($totdoc43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['totdoc43']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totdoc43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totdoc43']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totdoc43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totdoc43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totdoc43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detalle43']))
    {
        $this->nm_new_label['detalle43'] = "Detalle 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle43 = $this->detalle43;
   $sStyleHidden_detalle43 = '';
   if (isset($this->nmgp_cmp_hidden['detalle43']) && $this->nmgp_cmp_hidden['detalle43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle43']);
       $sStyleHidden_detalle43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle43 = 'display: none;';
   $sStyleReadInp_detalle43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle43']) && $this->nmgp_cmp_readonly['detalle43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle43']);
       $sStyleReadLab_detalle43 = '';
       $sStyleReadInp_detalle43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle43']) && $this->nmgp_cmp_hidden['detalle43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle43" value="<?php echo $this->form_encode_input($detalle43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_detalle43_label" id="hidden_field_label_detalle43" style="<?php echo $sStyleHidden_detalle43; ?>"><span id="id_label_detalle43"><?php echo $this->nm_new_label['detalle43']; ?></span></TD>
    <TD class="scFormDataOdd css_detalle43_line" id="hidden_field_data_detalle43" style="<?php echo $sStyleHidden_detalle43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_detalle43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["detalle43"]) &&  $this->nmgp_cmp_readonly["detalle43"] == "on") { 

 ?>
<input type="hidden" name="detalle43" value="<?php echo $this->form_encode_input($detalle43) . "\">" . $detalle43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_detalle43" class="sc-ui-readonly-detalle43 css_detalle43_line" style="<?php echo $sStyleReadLab_detalle43; ?>"><?php echo $this->form_format_readonly("detalle43", $this->form_encode_input($this->detalle43)); ?></span><span id="id_read_off_detalle43" class="css_read_off_detalle43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_detalle43; ?>">
 <input class="sc-js-input scFormObjectOdd css_detalle43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_detalle43" type=text name="detalle43" value="<?php echo $this->form_encode_input($detalle43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvanioant43']))
    {
        $this->nm_new_label['cvanioant43'] = "Cvanioant 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvanioant43 = $this->cvanioant43;
   $sStyleHidden_cvanioant43 = '';
   if (isset($this->nmgp_cmp_hidden['cvanioant43']) && $this->nmgp_cmp_hidden['cvanioant43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvanioant43']);
       $sStyleHidden_cvanioant43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvanioant43 = 'display: none;';
   $sStyleReadInp_cvanioant43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvanioant43']) && $this->nmgp_cmp_readonly['cvanioant43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvanioant43']);
       $sStyleReadLab_cvanioant43 = '';
       $sStyleReadInp_cvanioant43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvanioant43']) && $this->nmgp_cmp_hidden['cvanioant43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvanioant43" value="<?php echo $this->form_encode_input($cvanioant43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvanioant43_label" id="hidden_field_label_cvanioant43" style="<?php echo $sStyleHidden_cvanioant43; ?>"><span id="id_label_cvanioant43"><?php echo $this->nm_new_label['cvanioant43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['cvanioant43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['cvanioant43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_cvanioant43_line" id="hidden_field_data_cvanioant43" style="<?php echo $sStyleHidden_cvanioant43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvanioant43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvanioant43"]) &&  $this->nmgp_cmp_readonly["cvanioant43"] == "on") { 

 ?>
<input type="hidden" name="cvanioant43" value="<?php echo $this->form_encode_input($cvanioant43) . "\">" . $cvanioant43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvanioant43" class="sc-ui-readonly-cvanioant43 css_cvanioant43_line" style="<?php echo $sStyleReadLab_cvanioant43; ?>"><?php echo $this->form_format_readonly("cvanioant43", $this->form_encode_input($this->cvanioant43)); ?></span><span id="id_read_off_cvanioant43" class="css_read_off_cvanioant43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvanioant43; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvanioant43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvanioant43" type=text name="cvanioant43" value="<?php echo $this->form_encode_input($cvanioant43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvanioant43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvanioant43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvdivisa43']))
    {
        $this->nm_new_label['cvdivisa43'] = "Cvdivisa 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvdivisa43 = $this->cvdivisa43;
   $sStyleHidden_cvdivisa43 = '';
   if (isset($this->nmgp_cmp_hidden['cvdivisa43']) && $this->nmgp_cmp_hidden['cvdivisa43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvdivisa43']);
       $sStyleHidden_cvdivisa43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvdivisa43 = 'display: none;';
   $sStyleReadInp_cvdivisa43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvdivisa43']) && $this->nmgp_cmp_readonly['cvdivisa43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvdivisa43']);
       $sStyleReadLab_cvdivisa43 = '';
       $sStyleReadInp_cvdivisa43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvdivisa43']) && $this->nmgp_cmp_hidden['cvdivisa43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvdivisa43" value="<?php echo $this->form_encode_input($cvdivisa43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvdivisa43_label" id="hidden_field_label_cvdivisa43" style="<?php echo $sStyleHidden_cvdivisa43; ?>"><span id="id_label_cvdivisa43"><?php echo $this->nm_new_label['cvdivisa43']; ?></span></TD>
    <TD class="scFormDataOdd css_cvdivisa43_line" id="hidden_field_data_cvdivisa43" style="<?php echo $sStyleHidden_cvdivisa43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvdivisa43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvdivisa43"]) &&  $this->nmgp_cmp_readonly["cvdivisa43"] == "on") { 

 ?>
<input type="hidden" name="cvdivisa43" value="<?php echo $this->form_encode_input($cvdivisa43) . "\">" . $cvdivisa43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvdivisa43" class="sc-ui-readonly-cvdivisa43 css_cvdivisa43_line" style="<?php echo $sStyleReadLab_cvdivisa43; ?>"><?php echo $this->form_format_readonly("cvdivisa43", $this->form_encode_input($this->cvdivisa43)); ?></span><span id="id_read_off_cvdivisa43" class="css_read_off_cvdivisa43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvdivisa43; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvdivisa43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvdivisa43" type=text name="cvdivisa43" value="<?php echo $this->form_encode_input($cvdivisa43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvdivisa43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvdivisa43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valdivisa43']))
    {
        $this->nm_new_label['valdivisa43'] = "Valdivisa 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valdivisa43 = $this->valdivisa43;
   $sStyleHidden_valdivisa43 = '';
   if (isset($this->nmgp_cmp_hidden['valdivisa43']) && $this->nmgp_cmp_hidden['valdivisa43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valdivisa43']);
       $sStyleHidden_valdivisa43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valdivisa43 = 'display: none;';
   $sStyleReadInp_valdivisa43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valdivisa43']) && $this->nmgp_cmp_readonly['valdivisa43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valdivisa43']);
       $sStyleReadLab_valdivisa43 = '';
       $sStyleReadInp_valdivisa43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valdivisa43']) && $this->nmgp_cmp_hidden['valdivisa43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valdivisa43" value="<?php echo $this->form_encode_input($valdivisa43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valdivisa43_label" id="hidden_field_label_valdivisa43" style="<?php echo $sStyleHidden_valdivisa43; ?>"><span id="id_label_valdivisa43"><?php echo $this->nm_new_label['valdivisa43']; ?></span></TD>
    <TD class="scFormDataOdd css_valdivisa43_line" id="hidden_field_data_valdivisa43" style="<?php echo $sStyleHidden_valdivisa43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valdivisa43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valdivisa43"]) &&  $this->nmgp_cmp_readonly["valdivisa43"] == "on") { 

 ?>
<input type="hidden" name="valdivisa43" value="<?php echo $this->form_encode_input($valdivisa43) . "\">" . $valdivisa43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valdivisa43" class="sc-ui-readonly-valdivisa43 css_valdivisa43_line" style="<?php echo $sStyleReadLab_valdivisa43; ?>"><?php echo $this->form_format_readonly("valdivisa43", $this->form_encode_input($this->valdivisa43)); ?></span><span id="id_read_off_valdivisa43" class="css_read_off_valdivisa43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valdivisa43; ?>">
 <input class="sc-js-input scFormObjectOdd css_valdivisa43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valdivisa43" type=text name="valdivisa43" value="<?php echo $this->form_encode_input($valdivisa43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valdivisa43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valdivisa43']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valdivisa43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valdivisa43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valdivisa43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valdivisaori43']))
    {
        $this->nm_new_label['valdivisaori43'] = "Valdivisaori 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valdivisaori43 = $this->valdivisaori43;
   $sStyleHidden_valdivisaori43 = '';
   if (isset($this->nmgp_cmp_hidden['valdivisaori43']) && $this->nmgp_cmp_hidden['valdivisaori43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valdivisaori43']);
       $sStyleHidden_valdivisaori43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valdivisaori43 = 'display: none;';
   $sStyleReadInp_valdivisaori43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valdivisaori43']) && $this->nmgp_cmp_readonly['valdivisaori43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valdivisaori43']);
       $sStyleReadLab_valdivisaori43 = '';
       $sStyleReadInp_valdivisaori43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valdivisaori43']) && $this->nmgp_cmp_hidden['valdivisaori43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valdivisaori43" value="<?php echo $this->form_encode_input($valdivisaori43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valdivisaori43_label" id="hidden_field_label_valdivisaori43" style="<?php echo $sStyleHidden_valdivisaori43; ?>"><span id="id_label_valdivisaori43"><?php echo $this->nm_new_label['valdivisaori43']; ?></span></TD>
    <TD class="scFormDataOdd css_valdivisaori43_line" id="hidden_field_data_valdivisaori43" style="<?php echo $sStyleHidden_valdivisaori43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valdivisaori43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valdivisaori43"]) &&  $this->nmgp_cmp_readonly["valdivisaori43"] == "on") { 

 ?>
<input type="hidden" name="valdivisaori43" value="<?php echo $this->form_encode_input($valdivisaori43) . "\">" . $valdivisaori43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valdivisaori43" class="sc-ui-readonly-valdivisaori43 css_valdivisaori43_line" style="<?php echo $sStyleReadLab_valdivisaori43; ?>"><?php echo $this->form_format_readonly("valdivisaori43", $this->form_encode_input($this->valdivisaori43)); ?></span><span id="id_read_off_valdivisaori43" class="css_read_off_valdivisaori43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valdivisaori43; ?>">
 <input class="sc-js-input scFormObjectOdd css_valdivisaori43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valdivisaori43" type=text name="valdivisaori43" value="<?php echo $this->form_encode_input($valdivisaori43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valdivisaori43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valdivisaori43']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valdivisaori43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valdivisaori43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valdivisaori43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['factcompra43']))
    {
        $this->nm_new_label['factcompra43'] = "Factcompra 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $factcompra43 = $this->factcompra43;
   $sStyleHidden_factcompra43 = '';
   if (isset($this->nmgp_cmp_hidden['factcompra43']) && $this->nmgp_cmp_hidden['factcompra43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['factcompra43']);
       $sStyleHidden_factcompra43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_factcompra43 = 'display: none;';
   $sStyleReadInp_factcompra43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['factcompra43']) && $this->nmgp_cmp_readonly['factcompra43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['factcompra43']);
       $sStyleReadLab_factcompra43 = '';
       $sStyleReadInp_factcompra43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['factcompra43']) && $this->nmgp_cmp_hidden['factcompra43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="factcompra43" value="<?php echo $this->form_encode_input($factcompra43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_factcompra43_label" id="hidden_field_label_factcompra43" style="<?php echo $sStyleHidden_factcompra43; ?>"><span id="id_label_factcompra43"><?php echo $this->nm_new_label['factcompra43']; ?></span></TD>
    <TD class="scFormDataOdd css_factcompra43_line" id="hidden_field_data_factcompra43" style="<?php echo $sStyleHidden_factcompra43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_factcompra43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["factcompra43"]) &&  $this->nmgp_cmp_readonly["factcompra43"] == "on") { 

 ?>
<input type="hidden" name="factcompra43" value="<?php echo $this->form_encode_input($factcompra43) . "\">" . $factcompra43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_factcompra43" class="sc-ui-readonly-factcompra43 css_factcompra43_line" style="<?php echo $sStyleReadLab_factcompra43; ?>"><?php echo $this->form_format_readonly("factcompra43", $this->form_encode_input($this->factcompra43)); ?></span><span id="id_read_off_factcompra43" class="css_read_off_factcompra43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_factcompra43; ?>">
 <input class="sc-js-input scFormObjectOdd css_factcompra43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_factcompra43" type=text name="factcompra43" value="<?php echo $this->form_encode_input($factcompra43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_factcompra43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_factcompra43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['seriecompra43']))
    {
        $this->nm_new_label['seriecompra43'] = "Seriecompra 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $seriecompra43 = $this->seriecompra43;
   $sStyleHidden_seriecompra43 = '';
   if (isset($this->nmgp_cmp_hidden['seriecompra43']) && $this->nmgp_cmp_hidden['seriecompra43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['seriecompra43']);
       $sStyleHidden_seriecompra43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_seriecompra43 = 'display: none;';
   $sStyleReadInp_seriecompra43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['seriecompra43']) && $this->nmgp_cmp_readonly['seriecompra43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['seriecompra43']);
       $sStyleReadLab_seriecompra43 = '';
       $sStyleReadInp_seriecompra43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['seriecompra43']) && $this->nmgp_cmp_hidden['seriecompra43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="seriecompra43" value="<?php echo $this->form_encode_input($seriecompra43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_seriecompra43_label" id="hidden_field_label_seriecompra43" style="<?php echo $sStyleHidden_seriecompra43; ?>"><span id="id_label_seriecompra43"><?php echo $this->nm_new_label['seriecompra43']; ?></span></TD>
    <TD class="scFormDataOdd css_seriecompra43_line" id="hidden_field_data_seriecompra43" style="<?php echo $sStyleHidden_seriecompra43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_seriecompra43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["seriecompra43"]) &&  $this->nmgp_cmp_readonly["seriecompra43"] == "on") { 

 ?>
<input type="hidden" name="seriecompra43" value="<?php echo $this->form_encode_input($seriecompra43) . "\">" . $seriecompra43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_seriecompra43" class="sc-ui-readonly-seriecompra43 css_seriecompra43_line" style="<?php echo $sStyleReadLab_seriecompra43; ?>"><?php echo $this->form_format_readonly("seriecompra43", $this->form_encode_input($this->seriecompra43)); ?></span><span id="id_read_off_seriecompra43" class="css_read_off_seriecompra43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_seriecompra43; ?>">
 <input class="sc-js-input scFormObjectOdd css_seriecompra43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_seriecompra43" type=text name="seriecompra43" value="<?php echo $this->form_encode_input($seriecompra43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> maxlength=6 alt="{datatype: 'text', maxLength: 6, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_seriecompra43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_seriecompra43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['autocompra43']))
    {
        $this->nm_new_label['autocompra43'] = "Autocompra 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $autocompra43 = $this->autocompra43;
   $sStyleHidden_autocompra43 = '';
   if (isset($this->nmgp_cmp_hidden['autocompra43']) && $this->nmgp_cmp_hidden['autocompra43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['autocompra43']);
       $sStyleHidden_autocompra43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_autocompra43 = 'display: none;';
   $sStyleReadInp_autocompra43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['autocompra43']) && $this->nmgp_cmp_readonly['autocompra43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['autocompra43']);
       $sStyleReadLab_autocompra43 = '';
       $sStyleReadInp_autocompra43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['autocompra43']) && $this->nmgp_cmp_hidden['autocompra43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="autocompra43" value="<?php echo $this->form_encode_input($autocompra43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_autocompra43_label" id="hidden_field_label_autocompra43" style="<?php echo $sStyleHidden_autocompra43; ?>"><span id="id_label_autocompra43"><?php echo $this->nm_new_label['autocompra43']; ?></span></TD>
    <TD class="scFormDataOdd css_autocompra43_line" id="hidden_field_data_autocompra43" style="<?php echo $sStyleHidden_autocompra43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_autocompra43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["autocompra43"]) &&  $this->nmgp_cmp_readonly["autocompra43"] == "on") { 

 ?>
<input type="hidden" name="autocompra43" value="<?php echo $this->form_encode_input($autocompra43) . "\">" . $autocompra43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_autocompra43" class="sc-ui-readonly-autocompra43 css_autocompra43_line" style="<?php echo $sStyleReadLab_autocompra43; ?>"><?php echo $this->form_format_readonly("autocompra43", $this->form_encode_input($this->autocompra43)); ?></span><span id="id_read_off_autocompra43" class="css_read_off_autocompra43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_autocompra43; ?>">
 <input class="sc-js-input scFormObjectOdd css_autocompra43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_autocompra43" type=text name="autocompra43" value="<?php echo $this->form_encode_input($autocompra43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=40"; } ?> maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_autocompra43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_autocompra43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codret43']))
    {
        $this->nm_new_label['codret43'] = "Codret 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codret43 = $this->codret43;
   $sStyleHidden_codret43 = '';
   if (isset($this->nmgp_cmp_hidden['codret43']) && $this->nmgp_cmp_hidden['codret43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codret43']);
       $sStyleHidden_codret43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codret43 = 'display: none;';
   $sStyleReadInp_codret43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codret43']) && $this->nmgp_cmp_readonly['codret43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codret43']);
       $sStyleReadLab_codret43 = '';
       $sStyleReadInp_codret43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codret43']) && $this->nmgp_cmp_hidden['codret43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codret43" value="<?php echo $this->form_encode_input($codret43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codret43_label" id="hidden_field_label_codret43" style="<?php echo $sStyleHidden_codret43; ?>"><span id="id_label_codret43"><?php echo $this->nm_new_label['codret43']; ?></span></TD>
    <TD class="scFormDataOdd css_codret43_line" id="hidden_field_data_codret43" style="<?php echo $sStyleHidden_codret43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codret43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codret43"]) &&  $this->nmgp_cmp_readonly["codret43"] == "on") { 

 ?>
<input type="hidden" name="codret43" value="<?php echo $this->form_encode_input($codret43) . "\">" . $codret43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_codret43" class="sc-ui-readonly-codret43 css_codret43_line" style="<?php echo $sStyleReadLab_codret43; ?>"><?php echo $this->form_format_readonly("codret43", $this->form_encode_input($this->codret43)); ?></span><span id="id_read_off_codret43" class="css_read_off_codret43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codret43; ?>">
 <input class="sc-js-input scFormObjectOdd css_codret43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codret43" type=text name="codret43" value="<?php echo $this->form_encode_input($codret43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codret43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codret43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valini43']))
    {
        $this->nm_new_label['valini43'] = "Valini 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valini43 = $this->valini43;
   $sStyleHidden_valini43 = '';
   if (isset($this->nmgp_cmp_hidden['valini43']) && $this->nmgp_cmp_hidden['valini43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valini43']);
       $sStyleHidden_valini43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valini43 = 'display: none;';
   $sStyleReadInp_valini43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valini43']) && $this->nmgp_cmp_readonly['valini43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valini43']);
       $sStyleReadLab_valini43 = '';
       $sStyleReadInp_valini43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valini43']) && $this->nmgp_cmp_hidden['valini43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valini43" value="<?php echo $this->form_encode_input($valini43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valini43_label" id="hidden_field_label_valini43" style="<?php echo $sStyleHidden_valini43; ?>"><span id="id_label_valini43"><?php echo $this->nm_new_label['valini43']; ?></span></TD>
    <TD class="scFormDataOdd css_valini43_line" id="hidden_field_data_valini43" style="<?php echo $sStyleHidden_valini43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valini43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valini43"]) &&  $this->nmgp_cmp_readonly["valini43"] == "on") { 

 ?>
<input type="hidden" name="valini43" value="<?php echo $this->form_encode_input($valini43) . "\">" . $valini43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valini43" class="sc-ui-readonly-valini43 css_valini43_line" style="<?php echo $sStyleReadLab_valini43; ?>"><?php echo $this->form_format_readonly("valini43", $this->form_encode_input($this->valini43)); ?></span><span id="id_read_off_valini43" class="css_read_off_valini43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valini43; ?>">
 <input class="sc-js-input scFormObjectOdd css_valini43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valini43" type=text name="valini43" value="<?php echo $this->form_encode_input($valini43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valini43']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valini43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valini43']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valini43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valini43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valini43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numcuotasord43']))
    {
        $this->nm_new_label['numcuotasord43'] = "Numcuotasord 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numcuotasord43 = $this->numcuotasord43;
   $sStyleHidden_numcuotasord43 = '';
   if (isset($this->nmgp_cmp_hidden['numcuotasord43']) && $this->nmgp_cmp_hidden['numcuotasord43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numcuotasord43']);
       $sStyleHidden_numcuotasord43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numcuotasord43 = 'display: none;';
   $sStyleReadInp_numcuotasord43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numcuotasord43']) && $this->nmgp_cmp_readonly['numcuotasord43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numcuotasord43']);
       $sStyleReadLab_numcuotasord43 = '';
       $sStyleReadInp_numcuotasord43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numcuotasord43']) && $this->nmgp_cmp_hidden['numcuotasord43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numcuotasord43" value="<?php echo $this->form_encode_input($numcuotasord43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numcuotasord43_label" id="hidden_field_label_numcuotasord43" style="<?php echo $sStyleHidden_numcuotasord43; ?>"><span id="id_label_numcuotasord43"><?php echo $this->nm_new_label['numcuotasord43']; ?></span></TD>
    <TD class="scFormDataOdd css_numcuotasord43_line" id="hidden_field_data_numcuotasord43" style="<?php echo $sStyleHidden_numcuotasord43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numcuotasord43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numcuotasord43"]) &&  $this->nmgp_cmp_readonly["numcuotasord43"] == "on") { 

 ?>
<input type="hidden" name="numcuotasord43" value="<?php echo $this->form_encode_input($numcuotasord43) . "\">" . $numcuotasord43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_numcuotasord43" class="sc-ui-readonly-numcuotasord43 css_numcuotasord43_line" style="<?php echo $sStyleReadLab_numcuotasord43; ?>"><?php echo $this->form_format_readonly("numcuotasord43", $this->form_encode_input($this->numcuotasord43)); ?></span><span id="id_read_off_numcuotasord43" class="css_read_off_numcuotasord43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numcuotasord43; ?>">
 <input class="sc-js-input scFormObjectOdd css_numcuotasord43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numcuotasord43" type=text name="numcuotasord43" value="<?php echo $this->form_encode_input($numcuotasord43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numcuotasord43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numcuotasord43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valormov43']))
    {
        $this->nm_new_label['valormov43'] = "Valormov 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valormov43 = $this->valormov43;
   $sStyleHidden_valormov43 = '';
   if (isset($this->nmgp_cmp_hidden['valormov43']) && $this->nmgp_cmp_hidden['valormov43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valormov43']);
       $sStyleHidden_valormov43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valormov43 = 'display: none;';
   $sStyleReadInp_valormov43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valormov43']) && $this->nmgp_cmp_readonly['valormov43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valormov43']);
       $sStyleReadLab_valormov43 = '';
       $sStyleReadInp_valormov43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valormov43']) && $this->nmgp_cmp_hidden['valormov43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valormov43" value="<?php echo $this->form_encode_input($valormov43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valormov43_label" id="hidden_field_label_valormov43" style="<?php echo $sStyleHidden_valormov43; ?>"><span id="id_label_valormov43"><?php echo $this->nm_new_label['valormov43']; ?></span></TD>
    <TD class="scFormDataOdd css_valormov43_line" id="hidden_field_data_valormov43" style="<?php echo $sStyleHidden_valormov43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valormov43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valormov43"]) &&  $this->nmgp_cmp_readonly["valormov43"] == "on") { 

 ?>
<input type="hidden" name="valormov43" value="<?php echo $this->form_encode_input($valormov43) . "\">" . $valormov43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valormov43" class="sc-ui-readonly-valormov43 css_valormov43_line" style="<?php echo $sStyleReadLab_valormov43; ?>"><?php echo $this->form_format_readonly("valormov43", $this->form_encode_input($this->valormov43)); ?></span><span id="id_read_off_valormov43" class="css_read_off_valormov43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valormov43; ?>">
 <input class="sc-js-input scFormObjectOdd css_valormov43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valormov43" type=text name="valormov43" value="<?php echo $this->form_encode_input($valormov43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valormov43']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valormov43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valormov43']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valormov43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valormov43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valormov43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['saldoregmov43']))
    {
        $this->nm_new_label['saldoregmov43'] = "Saldoregmov 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldoregmov43 = $this->saldoregmov43;
   $sStyleHidden_saldoregmov43 = '';
   if (isset($this->nmgp_cmp_hidden['saldoregmov43']) && $this->nmgp_cmp_hidden['saldoregmov43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldoregmov43']);
       $sStyleHidden_saldoregmov43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldoregmov43 = 'display: none;';
   $sStyleReadInp_saldoregmov43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldoregmov43']) && $this->nmgp_cmp_readonly['saldoregmov43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldoregmov43']);
       $sStyleReadLab_saldoregmov43 = '';
       $sStyleReadInp_saldoregmov43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldoregmov43']) && $this->nmgp_cmp_hidden['saldoregmov43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldoregmov43" value="<?php echo $this->form_encode_input($saldoregmov43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_saldoregmov43_label" id="hidden_field_label_saldoregmov43" style="<?php echo $sStyleHidden_saldoregmov43; ?>"><span id="id_label_saldoregmov43"><?php echo $this->nm_new_label['saldoregmov43']; ?></span></TD>
    <TD class="scFormDataOdd css_saldoregmov43_line" id="hidden_field_data_saldoregmov43" style="<?php echo $sStyleHidden_saldoregmov43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldoregmov43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["saldoregmov43"]) &&  $this->nmgp_cmp_readonly["saldoregmov43"] == "on") { 

 ?>
<input type="hidden" name="saldoregmov43" value="<?php echo $this->form_encode_input($saldoregmov43) . "\">" . $saldoregmov43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_saldoregmov43" class="sc-ui-readonly-saldoregmov43 css_saldoregmov43_line" style="<?php echo $sStyleReadLab_saldoregmov43; ?>"><?php echo $this->form_format_readonly("saldoregmov43", $this->form_encode_input($this->saldoregmov43)); ?></span><span id="id_read_off_saldoregmov43" class="css_read_off_saldoregmov43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_saldoregmov43; ?>">
 <input class="sc-js-input scFormObjectOdd css_saldoregmov43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_saldoregmov43" type=text name="saldoregmov43" value="<?php echo $this->form_encode_input($saldoregmov43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['saldoregmov43']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['saldoregmov43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['saldoregmov43']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['saldoregmov43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldoregmov43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldoregmov43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['feccobro43']))
    {
        $this->nm_new_label['feccobro43'] = "Feccobro 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $feccobro43 = $this->feccobro43;
   $sStyleHidden_feccobro43 = '';
   if (isset($this->nmgp_cmp_hidden['feccobro43']) && $this->nmgp_cmp_hidden['feccobro43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['feccobro43']);
       $sStyleHidden_feccobro43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_feccobro43 = 'display: none;';
   $sStyleReadInp_feccobro43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['feccobro43']) && $this->nmgp_cmp_readonly['feccobro43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['feccobro43']);
       $sStyleReadLab_feccobro43 = '';
       $sStyleReadInp_feccobro43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['feccobro43']) && $this->nmgp_cmp_hidden['feccobro43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="feccobro43" value="<?php echo $this->form_encode_input($feccobro43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_feccobro43_label" id="hidden_field_label_feccobro43" style="<?php echo $sStyleHidden_feccobro43; ?>"><span id="id_label_feccobro43"><?php echo $this->nm_new_label['feccobro43']; ?></span></TD>
    <TD class="scFormDataOdd css_feccobro43_line" id="hidden_field_data_feccobro43" style="<?php echo $sStyleHidden_feccobro43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_feccobro43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["feccobro43"]) &&  $this->nmgp_cmp_readonly["feccobro43"] == "on") { 

 ?>
<input type="hidden" name="feccobro43" value="<?php echo $this->form_encode_input($feccobro43) . "\">" . $feccobro43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_feccobro43" class="sc-ui-readonly-feccobro43 css_feccobro43_line" style="<?php echo $sStyleReadLab_feccobro43; ?>"><?php echo $this->form_format_readonly("feccobro43", $this->form_encode_input($feccobro43)); ?></span><span id="id_read_off_feccobro43" class="css_read_off_feccobro43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_feccobro43; ?>"><?php
$tmp_form_data = $this->field_config['feccobro43']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_feccobro43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_feccobro43" type=text name="feccobro43" value="<?php echo $this->form_encode_input($feccobro43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['feccobro43']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['feccobro43']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_feccobro43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_feccobro43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codpagounif43']))
    {
        $this->nm_new_label['codpagounif43'] = "Codpagounif 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codpagounif43 = $this->codpagounif43;
   $sStyleHidden_codpagounif43 = '';
   if (isset($this->nmgp_cmp_hidden['codpagounif43']) && $this->nmgp_cmp_hidden['codpagounif43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codpagounif43']);
       $sStyleHidden_codpagounif43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codpagounif43 = 'display: none;';
   $sStyleReadInp_codpagounif43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codpagounif43']) && $this->nmgp_cmp_readonly['codpagounif43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codpagounif43']);
       $sStyleReadLab_codpagounif43 = '';
       $sStyleReadInp_codpagounif43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codpagounif43']) && $this->nmgp_cmp_hidden['codpagounif43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codpagounif43" value="<?php echo $this->form_encode_input($codpagounif43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codpagounif43_label" id="hidden_field_label_codpagounif43" style="<?php echo $sStyleHidden_codpagounif43; ?>"><span id="id_label_codpagounif43"><?php echo $this->nm_new_label['codpagounif43']; ?></span></TD>
    <TD class="scFormDataOdd css_codpagounif43_line" id="hidden_field_data_codpagounif43" style="<?php echo $sStyleHidden_codpagounif43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codpagounif43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codpagounif43"]) &&  $this->nmgp_cmp_readonly["codpagounif43"] == "on") { 

 ?>
<input type="hidden" name="codpagounif43" value="<?php echo $this->form_encode_input($codpagounif43) . "\">" . $codpagounif43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_codpagounif43" class="sc-ui-readonly-codpagounif43 css_codpagounif43_line" style="<?php echo $sStyleReadLab_codpagounif43; ?>"><?php echo $this->form_format_readonly("codpagounif43", $this->form_encode_input($this->codpagounif43)); ?></span><span id="id_read_off_codpagounif43" class="css_read_off_codpagounif43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codpagounif43; ?>">
 <input class="sc-js-input scFormObjectOdd css_codpagounif43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codpagounif43" type=text name="codpagounif43" value="<?php echo $this->form_encode_input($codpagounif43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codpagounif43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codpagounif43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipodocdb43']))
    {
        $this->nm_new_label['tipodocdb43'] = "Tipodocdb 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipodocdb43 = $this->tipodocdb43;
   $sStyleHidden_tipodocdb43 = '';
   if (isset($this->nmgp_cmp_hidden['tipodocdb43']) && $this->nmgp_cmp_hidden['tipodocdb43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipodocdb43']);
       $sStyleHidden_tipodocdb43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipodocdb43 = 'display: none;';
   $sStyleReadInp_tipodocdb43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipodocdb43']) && $this->nmgp_cmp_readonly['tipodocdb43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipodocdb43']);
       $sStyleReadLab_tipodocdb43 = '';
       $sStyleReadInp_tipodocdb43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipodocdb43']) && $this->nmgp_cmp_hidden['tipodocdb43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipodocdb43" value="<?php echo $this->form_encode_input($tipodocdb43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipodocdb43_label" id="hidden_field_label_tipodocdb43" style="<?php echo $sStyleHidden_tipodocdb43; ?>"><span id="id_label_tipodocdb43"><?php echo $this->nm_new_label['tipodocdb43']; ?></span></TD>
    <TD class="scFormDataOdd css_tipodocdb43_line" id="hidden_field_data_tipodocdb43" style="<?php echo $sStyleHidden_tipodocdb43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipodocdb43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipodocdb43"]) &&  $this->nmgp_cmp_readonly["tipodocdb43"] == "on") { 

 ?>
<input type="hidden" name="tipodocdb43" value="<?php echo $this->form_encode_input($tipodocdb43) . "\">" . $tipodocdb43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipodocdb43" class="sc-ui-readonly-tipodocdb43 css_tipodocdb43_line" style="<?php echo $sStyleReadLab_tipodocdb43; ?>"><?php echo $this->form_format_readonly("tipodocdb43", $this->form_encode_input($this->tipodocdb43)); ?></span><span id="id_read_off_tipodocdb43" class="css_read_off_tipodocdb43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipodocdb43; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipodocdb43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipodocdb43" type=text name="tipodocdb43" value="<?php echo $this->form_encode_input($tipodocdb43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipodocdb43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipodocdb43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numdocdb43']))
    {
        $this->nm_new_label['numdocdb43'] = "Numdocdb 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numdocdb43 = $this->numdocdb43;
   $sStyleHidden_numdocdb43 = '';
   if (isset($this->nmgp_cmp_hidden['numdocdb43']) && $this->nmgp_cmp_hidden['numdocdb43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numdocdb43']);
       $sStyleHidden_numdocdb43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numdocdb43 = 'display: none;';
   $sStyleReadInp_numdocdb43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numdocdb43']) && $this->nmgp_cmp_readonly['numdocdb43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numdocdb43']);
       $sStyleReadLab_numdocdb43 = '';
       $sStyleReadInp_numdocdb43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numdocdb43']) && $this->nmgp_cmp_hidden['numdocdb43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numdocdb43" value="<?php echo $this->form_encode_input($numdocdb43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numdocdb43_label" id="hidden_field_label_numdocdb43" style="<?php echo $sStyleHidden_numdocdb43; ?>"><span id="id_label_numdocdb43"><?php echo $this->nm_new_label['numdocdb43']; ?></span></TD>
    <TD class="scFormDataOdd css_numdocdb43_line" id="hidden_field_data_numdocdb43" style="<?php echo $sStyleHidden_numdocdb43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numdocdb43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numdocdb43"]) &&  $this->nmgp_cmp_readonly["numdocdb43"] == "on") { 

 ?>
<input type="hidden" name="numdocdb43" value="<?php echo $this->form_encode_input($numdocdb43) . "\">" . $numdocdb43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_numdocdb43" class="sc-ui-readonly-numdocdb43 css_numdocdb43_line" style="<?php echo $sStyleReadLab_numdocdb43; ?>"><?php echo $this->form_format_readonly("numdocdb43", $this->form_encode_input($this->numdocdb43)); ?></span><span id="id_read_off_numdocdb43" class="css_read_off_numdocdb43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numdocdb43; ?>">
 <input class="sc-js-input scFormObjectOdd css_numdocdb43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numdocdb43" type=text name="numdocdb43" value="<?php echo $this->form_encode_input($numdocdb43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numdocdb43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numdocdb43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ocurrecdocdb43']))
    {
        $this->nm_new_label['ocurrecdocdb43'] = "Ocurrecdocdb 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ocurrecdocdb43 = $this->ocurrecdocdb43;
   $sStyleHidden_ocurrecdocdb43 = '';
   if (isset($this->nmgp_cmp_hidden['ocurrecdocdb43']) && $this->nmgp_cmp_hidden['ocurrecdocdb43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ocurrecdocdb43']);
       $sStyleHidden_ocurrecdocdb43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ocurrecdocdb43 = 'display: none;';
   $sStyleReadInp_ocurrecdocdb43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ocurrecdocdb43']) && $this->nmgp_cmp_readonly['ocurrecdocdb43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ocurrecdocdb43']);
       $sStyleReadLab_ocurrecdocdb43 = '';
       $sStyleReadInp_ocurrecdocdb43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ocurrecdocdb43']) && $this->nmgp_cmp_hidden['ocurrecdocdb43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ocurrecdocdb43" value="<?php echo $this->form_encode_input($ocurrecdocdb43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ocurrecdocdb43_label" id="hidden_field_label_ocurrecdocdb43" style="<?php echo $sStyleHidden_ocurrecdocdb43; ?>"><span id="id_label_ocurrecdocdb43"><?php echo $this->nm_new_label['ocurrecdocdb43']; ?></span></TD>
    <TD class="scFormDataOdd css_ocurrecdocdb43_line" id="hidden_field_data_ocurrecdocdb43" style="<?php echo $sStyleHidden_ocurrecdocdb43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ocurrecdocdb43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ocurrecdocdb43"]) &&  $this->nmgp_cmp_readonly["ocurrecdocdb43"] == "on") { 

 ?>
<input type="hidden" name="ocurrecdocdb43" value="<?php echo $this->form_encode_input($ocurrecdocdb43) . "\">" . $ocurrecdocdb43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ocurrecdocdb43" class="sc-ui-readonly-ocurrecdocdb43 css_ocurrecdocdb43_line" style="<?php echo $sStyleReadLab_ocurrecdocdb43; ?>"><?php echo $this->form_format_readonly("ocurrecdocdb43", $this->form_encode_input($this->ocurrecdocdb43)); ?></span><span id="id_read_off_ocurrecdocdb43" class="css_read_off_ocurrecdocdb43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ocurrecdocdb43; ?>">
 <input class="sc-js-input scFormObjectOdd css_ocurrecdocdb43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ocurrecdocdb43" type=text name="ocurrecdocdb43" value="<?php echo $this->form_encode_input($ocurrecdocdb43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ocurrecdocdb43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ocurrecdocdb43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numrecibo43']))
    {
        $this->nm_new_label['numrecibo43'] = "Numrecibo 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numrecibo43 = $this->numrecibo43;
   $sStyleHidden_numrecibo43 = '';
   if (isset($this->nmgp_cmp_hidden['numrecibo43']) && $this->nmgp_cmp_hidden['numrecibo43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numrecibo43']);
       $sStyleHidden_numrecibo43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numrecibo43 = 'display: none;';
   $sStyleReadInp_numrecibo43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numrecibo43']) && $this->nmgp_cmp_readonly['numrecibo43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numrecibo43']);
       $sStyleReadLab_numrecibo43 = '';
       $sStyleReadInp_numrecibo43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numrecibo43']) && $this->nmgp_cmp_hidden['numrecibo43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numrecibo43" value="<?php echo $this->form_encode_input($numrecibo43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numrecibo43_label" id="hidden_field_label_numrecibo43" style="<?php echo $sStyleHidden_numrecibo43; ?>"><span id="id_label_numrecibo43"><?php echo $this->nm_new_label['numrecibo43']; ?></span></TD>
    <TD class="scFormDataOdd css_numrecibo43_line" id="hidden_field_data_numrecibo43" style="<?php echo $sStyleHidden_numrecibo43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numrecibo43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numrecibo43"]) &&  $this->nmgp_cmp_readonly["numrecibo43"] == "on") { 

 ?>
<input type="hidden" name="numrecibo43" value="<?php echo $this->form_encode_input($numrecibo43) . "\">" . $numrecibo43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_numrecibo43" class="sc-ui-readonly-numrecibo43 css_numrecibo43_line" style="<?php echo $sStyleReadLab_numrecibo43; ?>"><?php echo $this->form_format_readonly("numrecibo43", $this->form_encode_input($this->numrecibo43)); ?></span><span id="id_read_off_numrecibo43" class="css_read_off_numrecibo43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numrecibo43; ?>">
 <input class="sc-js-input scFormObjectOdd css_numrecibo43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numrecibo43" type=text name="numrecibo43" value="<?php echo $this->form_encode_input($numrecibo43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numrecibo43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numrecibo43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valorabono43']))
    {
        $this->nm_new_label['valorabono43'] = "Valorabono 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valorabono43 = $this->valorabono43;
   $sStyleHidden_valorabono43 = '';
   if (isset($this->nmgp_cmp_hidden['valorabono43']) && $this->nmgp_cmp_hidden['valorabono43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valorabono43']);
       $sStyleHidden_valorabono43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valorabono43 = 'display: none;';
   $sStyleReadInp_valorabono43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valorabono43']) && $this->nmgp_cmp_readonly['valorabono43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valorabono43']);
       $sStyleReadLab_valorabono43 = '';
       $sStyleReadInp_valorabono43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valorabono43']) && $this->nmgp_cmp_hidden['valorabono43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valorabono43" value="<?php echo $this->form_encode_input($valorabono43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valorabono43_label" id="hidden_field_label_valorabono43" style="<?php echo $sStyleHidden_valorabono43; ?>"><span id="id_label_valorabono43"><?php echo $this->nm_new_label['valorabono43']; ?></span></TD>
    <TD class="scFormDataOdd css_valorabono43_line" id="hidden_field_data_valorabono43" style="<?php echo $sStyleHidden_valorabono43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valorabono43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valorabono43"]) &&  $this->nmgp_cmp_readonly["valorabono43"] == "on") { 

 ?>
<input type="hidden" name="valorabono43" value="<?php echo $this->form_encode_input($valorabono43) . "\">" . $valorabono43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valorabono43" class="sc-ui-readonly-valorabono43 css_valorabono43_line" style="<?php echo $sStyleReadLab_valorabono43; ?>"><?php echo $this->form_format_readonly("valorabono43", $this->form_encode_input($this->valorabono43)); ?></span><span id="id_read_off_valorabono43" class="css_read_off_valorabono43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valorabono43; ?>">
 <input class="sc-js-input scFormObjectOdd css_valorabono43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valorabono43" type=text name="valorabono43" value="<?php echo $this->form_encode_input($valorabono43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valorabono43']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valorabono43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valorabono43']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valorabono43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorabono43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorabono43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['efectcheque43']))
    {
        $this->nm_new_label['efectcheque43'] = "Efectcheque 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $efectcheque43 = $this->efectcheque43;
   $sStyleHidden_efectcheque43 = '';
   if (isset($this->nmgp_cmp_hidden['efectcheque43']) && $this->nmgp_cmp_hidden['efectcheque43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['efectcheque43']);
       $sStyleHidden_efectcheque43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_efectcheque43 = 'display: none;';
   $sStyleReadInp_efectcheque43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['efectcheque43']) && $this->nmgp_cmp_readonly['efectcheque43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['efectcheque43']);
       $sStyleReadLab_efectcheque43 = '';
       $sStyleReadInp_efectcheque43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['efectcheque43']) && $this->nmgp_cmp_hidden['efectcheque43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="efectcheque43" value="<?php echo $this->form_encode_input($efectcheque43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_efectcheque43_label" id="hidden_field_label_efectcheque43" style="<?php echo $sStyleHidden_efectcheque43; ?>"><span id="id_label_efectcheque43"><?php echo $this->nm_new_label['efectcheque43']; ?></span></TD>
    <TD class="scFormDataOdd css_efectcheque43_line" id="hidden_field_data_efectcheque43" style="<?php echo $sStyleHidden_efectcheque43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_efectcheque43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["efectcheque43"]) &&  $this->nmgp_cmp_readonly["efectcheque43"] == "on") { 

 ?>
<input type="hidden" name="efectcheque43" value="<?php echo $this->form_encode_input($efectcheque43) . "\">" . $efectcheque43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_efectcheque43" class="sc-ui-readonly-efectcheque43 css_efectcheque43_line" style="<?php echo $sStyleReadLab_efectcheque43; ?>"><?php echo $this->form_format_readonly("efectcheque43", $this->form_encode_input($this->efectcheque43)); ?></span><span id="id_read_off_efectcheque43" class="css_read_off_efectcheque43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_efectcheque43; ?>">
 <input class="sc-js-input scFormObjectOdd css_efectcheque43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_efectcheque43" type=text name="efectcheque43" value="<?php echo $this->form_encode_input($efectcheque43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_efectcheque43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_efectcheque43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['saldoexceso43']))
    {
        $this->nm_new_label['saldoexceso43'] = "Saldoexceso 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldoexceso43 = $this->saldoexceso43;
   $sStyleHidden_saldoexceso43 = '';
   if (isset($this->nmgp_cmp_hidden['saldoexceso43']) && $this->nmgp_cmp_hidden['saldoexceso43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldoexceso43']);
       $sStyleHidden_saldoexceso43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldoexceso43 = 'display: none;';
   $sStyleReadInp_saldoexceso43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldoexceso43']) && $this->nmgp_cmp_readonly['saldoexceso43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldoexceso43']);
       $sStyleReadLab_saldoexceso43 = '';
       $sStyleReadInp_saldoexceso43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldoexceso43']) && $this->nmgp_cmp_hidden['saldoexceso43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldoexceso43" value="<?php echo $this->form_encode_input($saldoexceso43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_saldoexceso43_label" id="hidden_field_label_saldoexceso43" style="<?php echo $sStyleHidden_saldoexceso43; ?>"><span id="id_label_saldoexceso43"><?php echo $this->nm_new_label['saldoexceso43']; ?></span></TD>
    <TD class="scFormDataOdd css_saldoexceso43_line" id="hidden_field_data_saldoexceso43" style="<?php echo $sStyleHidden_saldoexceso43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldoexceso43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["saldoexceso43"]) &&  $this->nmgp_cmp_readonly["saldoexceso43"] == "on") { 

 ?>
<input type="hidden" name="saldoexceso43" value="<?php echo $this->form_encode_input($saldoexceso43) . "\">" . $saldoexceso43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_saldoexceso43" class="sc-ui-readonly-saldoexceso43 css_saldoexceso43_line" style="<?php echo $sStyleReadLab_saldoexceso43; ?>"><?php echo $this->form_format_readonly("saldoexceso43", $this->form_encode_input($this->saldoexceso43)); ?></span><span id="id_read_off_saldoexceso43" class="css_read_off_saldoexceso43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_saldoexceso43; ?>">
 <input class="sc-js-input scFormObjectOdd css_saldoexceso43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_saldoexceso43" type=text name="saldoexceso43" value="<?php echo $this->form_encode_input($saldoexceso43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['saldoexceso43']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['saldoexceso43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['saldoexceso43']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['saldoexceso43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldoexceso43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldoexceso43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['saldocte43']))
    {
        $this->nm_new_label['saldocte43'] = "Saldocte 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $saldocte43 = $this->saldocte43;
   $sStyleHidden_saldocte43 = '';
   if (isset($this->nmgp_cmp_hidden['saldocte43']) && $this->nmgp_cmp_hidden['saldocte43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['saldocte43']);
       $sStyleHidden_saldocte43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_saldocte43 = 'display: none;';
   $sStyleReadInp_saldocte43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['saldocte43']) && $this->nmgp_cmp_readonly['saldocte43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['saldocte43']);
       $sStyleReadLab_saldocte43 = '';
       $sStyleReadInp_saldocte43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['saldocte43']) && $this->nmgp_cmp_hidden['saldocte43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="saldocte43" value="<?php echo $this->form_encode_input($saldocte43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_saldocte43_label" id="hidden_field_label_saldocte43" style="<?php echo $sStyleHidden_saldocte43; ?>"><span id="id_label_saldocte43"><?php echo $this->nm_new_label['saldocte43']; ?></span></TD>
    <TD class="scFormDataOdd css_saldocte43_line" id="hidden_field_data_saldocte43" style="<?php echo $sStyleHidden_saldocte43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_saldocte43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["saldocte43"]) &&  $this->nmgp_cmp_readonly["saldocte43"] == "on") { 

 ?>
<input type="hidden" name="saldocte43" value="<?php echo $this->form_encode_input($saldocte43) . "\">" . $saldocte43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_saldocte43" class="sc-ui-readonly-saldocte43 css_saldocte43_line" style="<?php echo $sStyleReadLab_saldocte43; ?>"><?php echo $this->form_format_readonly("saldocte43", $this->form_encode_input($this->saldocte43)); ?></span><span id="id_read_off_saldocte43" class="css_read_off_saldocte43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_saldocte43; ?>">
 <input class="sc-js-input scFormObjectOdd css_saldocte43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_saldocte43" type=text name="saldocte43" value="<?php echo $this->form_encode_input($saldocte43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['saldocte43']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['saldocte43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['saldocte43']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['saldocte43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_saldocte43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_saldocte43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codpago43']))
    {
        $this->nm_new_label['codpago43'] = "Codpago 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codpago43 = $this->codpago43;
   $sStyleHidden_codpago43 = '';
   if (isset($this->nmgp_cmp_hidden['codpago43']) && $this->nmgp_cmp_hidden['codpago43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codpago43']);
       $sStyleHidden_codpago43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codpago43 = 'display: none;';
   $sStyleReadInp_codpago43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codpago43']) && $this->nmgp_cmp_readonly['codpago43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codpago43']);
       $sStyleReadLab_codpago43 = '';
       $sStyleReadInp_codpago43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codpago43']) && $this->nmgp_cmp_hidden['codpago43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codpago43" value="<?php echo $this->form_encode_input($codpago43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codpago43_label" id="hidden_field_label_codpago43" style="<?php echo $sStyleHidden_codpago43; ?>"><span id="id_label_codpago43"><?php echo $this->nm_new_label['codpago43']; ?></span></TD>
    <TD class="scFormDataOdd css_codpago43_line" id="hidden_field_data_codpago43" style="<?php echo $sStyleHidden_codpago43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codpago43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codpago43"]) &&  $this->nmgp_cmp_readonly["codpago43"] == "on") { 

 ?>
<input type="hidden" name="codpago43" value="<?php echo $this->form_encode_input($codpago43) . "\">" . $codpago43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_codpago43" class="sc-ui-readonly-codpago43 css_codpago43_line" style="<?php echo $sStyleReadLab_codpago43; ?>"><?php echo $this->form_format_readonly("codpago43", $this->form_encode_input($this->codpago43)); ?></span><span id="id_read_off_codpago43" class="css_read_off_codpago43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codpago43; ?>">
 <input class="sc-js-input scFormObjectOdd css_codpago43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codpago43" type=text name="codpago43" value="<?php echo $this->form_encode_input($codpago43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codpago43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codpago43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numdocpago43']))
    {
        $this->nm_new_label['numdocpago43'] = "Numdocpago 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numdocpago43 = $this->numdocpago43;
   $sStyleHidden_numdocpago43 = '';
   if (isset($this->nmgp_cmp_hidden['numdocpago43']) && $this->nmgp_cmp_hidden['numdocpago43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numdocpago43']);
       $sStyleHidden_numdocpago43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numdocpago43 = 'display: none;';
   $sStyleReadInp_numdocpago43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numdocpago43']) && $this->nmgp_cmp_readonly['numdocpago43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numdocpago43']);
       $sStyleReadLab_numdocpago43 = '';
       $sStyleReadInp_numdocpago43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numdocpago43']) && $this->nmgp_cmp_hidden['numdocpago43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numdocpago43" value="<?php echo $this->form_encode_input($numdocpago43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numdocpago43_label" id="hidden_field_label_numdocpago43" style="<?php echo $sStyleHidden_numdocpago43; ?>"><span id="id_label_numdocpago43"><?php echo $this->nm_new_label['numdocpago43']; ?></span></TD>
    <TD class="scFormDataOdd css_numdocpago43_line" id="hidden_field_data_numdocpago43" style="<?php echo $sStyleHidden_numdocpago43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numdocpago43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numdocpago43"]) &&  $this->nmgp_cmp_readonly["numdocpago43"] == "on") { 

 ?>
<input type="hidden" name="numdocpago43" value="<?php echo $this->form_encode_input($numdocpago43) . "\">" . $numdocpago43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_numdocpago43" class="sc-ui-readonly-numdocpago43 css_numdocpago43_line" style="<?php echo $sStyleReadLab_numdocpago43; ?>"><?php echo $this->form_format_readonly("numdocpago43", $this->form_encode_input($this->numdocpago43)); ?></span><span id="id_read_off_numdocpago43" class="css_read_off_numdocpago43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numdocpago43; ?>">
 <input class="sc-js-input scFormObjectOdd css_numdocpago43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numdocpago43" type=text name="numdocpago43" value="<?php echo $this->form_encode_input($numdocpago43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numdocpago43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numdocpago43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['obsdocpago43']))
    {
        $this->nm_new_label['obsdocpago43'] = "Obsdocpago 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obsdocpago43 = $this->obsdocpago43;
   $sStyleHidden_obsdocpago43 = '';
   if (isset($this->nmgp_cmp_hidden['obsdocpago43']) && $this->nmgp_cmp_hidden['obsdocpago43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obsdocpago43']);
       $sStyleHidden_obsdocpago43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obsdocpago43 = 'display: none;';
   $sStyleReadInp_obsdocpago43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obsdocpago43']) && $this->nmgp_cmp_readonly['obsdocpago43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obsdocpago43']);
       $sStyleReadLab_obsdocpago43 = '';
       $sStyleReadInp_obsdocpago43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obsdocpago43']) && $this->nmgp_cmp_hidden['obsdocpago43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obsdocpago43" value="<?php echo $this->form_encode_input($obsdocpago43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_obsdocpago43_label" id="hidden_field_label_obsdocpago43" style="<?php echo $sStyleHidden_obsdocpago43; ?>"><span id="id_label_obsdocpago43"><?php echo $this->nm_new_label['obsdocpago43']; ?></span></TD>
    <TD class="scFormDataOdd css_obsdocpago43_line" id="hidden_field_data_obsdocpago43" style="<?php echo $sStyleHidden_obsdocpago43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obsdocpago43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obsdocpago43"]) &&  $this->nmgp_cmp_readonly["obsdocpago43"] == "on") { 

 ?>
<input type="hidden" name="obsdocpago43" value="<?php echo $this->form_encode_input($obsdocpago43) . "\">" . $obsdocpago43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_obsdocpago43" class="sc-ui-readonly-obsdocpago43 css_obsdocpago43_line" style="<?php echo $sStyleReadLab_obsdocpago43; ?>"><?php echo $this->form_format_readonly("obsdocpago43", $this->form_encode_input($this->obsdocpago43)); ?></span><span id="id_read_off_obsdocpago43" class="css_read_off_obsdocpago43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obsdocpago43; ?>">
 <input class="sc-js-input scFormObjectOdd css_obsdocpago43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_obsdocpago43" type=text name="obsdocpago43" value="<?php echo $this->form_encode_input($obsdocpago43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obsdocpago43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obsdocpago43_text"></span></td></tr></table></td></tr></table></TD>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_uid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_uid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvtransfer43']))
    {
        $this->nm_new_label['cvtransfer43'] = "Cvtransfer 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvtransfer43 = $this->cvtransfer43;
   $sStyleHidden_cvtransfer43 = '';
   if (isset($this->nmgp_cmp_hidden['cvtransfer43']) && $this->nmgp_cmp_hidden['cvtransfer43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvtransfer43']);
       $sStyleHidden_cvtransfer43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvtransfer43 = 'display: none;';
   $sStyleReadInp_cvtransfer43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvtransfer43']) && $this->nmgp_cmp_readonly['cvtransfer43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvtransfer43']);
       $sStyleReadLab_cvtransfer43 = '';
       $sStyleReadInp_cvtransfer43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvtransfer43']) && $this->nmgp_cmp_hidden['cvtransfer43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvtransfer43" value="<?php echo $this->form_encode_input($cvtransfer43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvtransfer43_label" id="hidden_field_label_cvtransfer43" style="<?php echo $sStyleHidden_cvtransfer43; ?>"><span id="id_label_cvtransfer43"><?php echo $this->nm_new_label['cvtransfer43']; ?></span></TD>
    <TD class="scFormDataOdd css_cvtransfer43_line" id="hidden_field_data_cvtransfer43" style="<?php echo $sStyleHidden_cvtransfer43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvtransfer43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvtransfer43"]) &&  $this->nmgp_cmp_readonly["cvtransfer43"] == "on") { 

 ?>
<input type="hidden" name="cvtransfer43" value="<?php echo $this->form_encode_input($cvtransfer43) . "\">" . $cvtransfer43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvtransfer43" class="sc-ui-readonly-cvtransfer43 css_cvtransfer43_line" style="<?php echo $sStyleReadLab_cvtransfer43; ?>"><?php echo $this->form_format_readonly("cvtransfer43", $this->form_encode_input($this->cvtransfer43)); ?></span><span id="id_read_off_cvtransfer43" class="css_read_off_cvtransfer43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvtransfer43; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvtransfer43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvtransfer43" type=text name="cvtransfer43" value="<?php echo $this->form_encode_input($cvtransfer43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvtransfer43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvtransfer43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fectransfer43']))
    {
        $this->nm_new_label['fectransfer43'] = "Fectransfer 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fectransfer43 = $this->fectransfer43;
   $sStyleHidden_fectransfer43 = '';
   if (isset($this->nmgp_cmp_hidden['fectransfer43']) && $this->nmgp_cmp_hidden['fectransfer43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fectransfer43']);
       $sStyleHidden_fectransfer43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fectransfer43 = 'display: none;';
   $sStyleReadInp_fectransfer43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fectransfer43']) && $this->nmgp_cmp_readonly['fectransfer43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fectransfer43']);
       $sStyleReadLab_fectransfer43 = '';
       $sStyleReadInp_fectransfer43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fectransfer43']) && $this->nmgp_cmp_hidden['fectransfer43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fectransfer43" value="<?php echo $this->form_encode_input($fectransfer43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fectransfer43_label" id="hidden_field_label_fectransfer43" style="<?php echo $sStyleHidden_fectransfer43; ?>"><span id="id_label_fectransfer43"><?php echo $this->nm_new_label['fectransfer43']; ?></span></TD>
    <TD class="scFormDataOdd css_fectransfer43_line" id="hidden_field_data_fectransfer43" style="<?php echo $sStyleHidden_fectransfer43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fectransfer43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fectransfer43"]) &&  $this->nmgp_cmp_readonly["fectransfer43"] == "on") { 

 ?>
<input type="hidden" name="fectransfer43" value="<?php echo $this->form_encode_input($fectransfer43) . "\">" . $fectransfer43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fectransfer43" class="sc-ui-readonly-fectransfer43 css_fectransfer43_line" style="<?php echo $sStyleReadLab_fectransfer43; ?>"><?php echo $this->form_format_readonly("fectransfer43", $this->form_encode_input($fectransfer43)); ?></span><span id="id_read_off_fectransfer43" class="css_read_off_fectransfer43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fectransfer43; ?>"><?php
$tmp_form_data = $this->field_config['fectransfer43']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fectransfer43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fectransfer43" type=text name="fectransfer43" value="<?php echo $this->form_encode_input($fectransfer43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fectransfer43']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fectransfer43']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fectransfer43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fectransfer43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecvendoc43']))
    {
        $this->nm_new_label['fecvendoc43'] = "Fecvendoc 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecvendoc43 = $this->fecvendoc43;
   $sStyleHidden_fecvendoc43 = '';
   if (isset($this->nmgp_cmp_hidden['fecvendoc43']) && $this->nmgp_cmp_hidden['fecvendoc43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecvendoc43']);
       $sStyleHidden_fecvendoc43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecvendoc43 = 'display: none;';
   $sStyleReadInp_fecvendoc43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecvendoc43']) && $this->nmgp_cmp_readonly['fecvendoc43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecvendoc43']);
       $sStyleReadLab_fecvendoc43 = '';
       $sStyleReadInp_fecvendoc43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecvendoc43']) && $this->nmgp_cmp_hidden['fecvendoc43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecvendoc43" value="<?php echo $this->form_encode_input($fecvendoc43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecvendoc43_label" id="hidden_field_label_fecvendoc43" style="<?php echo $sStyleHidden_fecvendoc43; ?>"><span id="id_label_fecvendoc43"><?php echo $this->nm_new_label['fecvendoc43']; ?></span></TD>
    <TD class="scFormDataOdd css_fecvendoc43_line" id="hidden_field_data_fecvendoc43" style="<?php echo $sStyleHidden_fecvendoc43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecvendoc43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecvendoc43"]) &&  $this->nmgp_cmp_readonly["fecvendoc43"] == "on") { 

 ?>
<input type="hidden" name="fecvendoc43" value="<?php echo $this->form_encode_input($fecvendoc43) . "\">" . $fecvendoc43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecvendoc43" class="sc-ui-readonly-fecvendoc43 css_fecvendoc43_line" style="<?php echo $sStyleReadLab_fecvendoc43; ?>"><?php echo $this->form_format_readonly("fecvendoc43", $this->form_encode_input($fecvendoc43)); ?></span><span id="id_read_off_fecvendoc43" class="css_read_off_fecvendoc43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecvendoc43; ?>"><?php
$tmp_form_data = $this->field_config['fecvendoc43']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecvendoc43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecvendoc43" type=text name="fecvendoc43" value="<?php echo $this->form_encode_input($fecvendoc43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecvendoc43']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecvendoc43']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecvendoc43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecvendoc43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecvenret43']))
    {
        $this->nm_new_label['fecvenret43'] = "Fecvenret 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecvenret43 = $this->fecvenret43;
   $sStyleHidden_fecvenret43 = '';
   if (isset($this->nmgp_cmp_hidden['fecvenret43']) && $this->nmgp_cmp_hidden['fecvenret43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecvenret43']);
       $sStyleHidden_fecvenret43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecvenret43 = 'display: none;';
   $sStyleReadInp_fecvenret43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecvenret43']) && $this->nmgp_cmp_readonly['fecvenret43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecvenret43']);
       $sStyleReadLab_fecvenret43 = '';
       $sStyleReadInp_fecvenret43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecvenret43']) && $this->nmgp_cmp_hidden['fecvenret43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecvenret43" value="<?php echo $this->form_encode_input($fecvenret43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecvenret43_label" id="hidden_field_label_fecvenret43" style="<?php echo $sStyleHidden_fecvenret43; ?>"><span id="id_label_fecvenret43"><?php echo $this->nm_new_label['fecvenret43']; ?></span></TD>
    <TD class="scFormDataOdd css_fecvenret43_line" id="hidden_field_data_fecvenret43" style="<?php echo $sStyleHidden_fecvenret43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecvenret43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecvenret43"]) &&  $this->nmgp_cmp_readonly["fecvenret43"] == "on") { 

 ?>
<input type="hidden" name="fecvenret43" value="<?php echo $this->form_encode_input($fecvenret43) . "\">" . $fecvenret43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecvenret43" class="sc-ui-readonly-fecvenret43 css_fecvenret43_line" style="<?php echo $sStyleReadLab_fecvenret43; ?>"><?php echo $this->form_format_readonly("fecvenret43", $this->form_encode_input($fecvenret43)); ?></span><span id="id_read_off_fecvenret43" class="css_read_off_fecvenret43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecvenret43; ?>"><?php
$tmp_form_data = $this->field_config['fecvenret43']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecvenret43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecvenret43" type=text name="fecvenret43" value="<?php echo $this->form_encode_input($fecvenret43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecvenret43']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecvenret43']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecvenret43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecvenret43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numautoret43']))
    {
        $this->nm_new_label['numautoret43'] = "Numautoret 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numautoret43 = $this->numautoret43;
   $sStyleHidden_numautoret43 = '';
   if (isset($this->nmgp_cmp_hidden['numautoret43']) && $this->nmgp_cmp_hidden['numautoret43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numautoret43']);
       $sStyleHidden_numautoret43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numautoret43 = 'display: none;';
   $sStyleReadInp_numautoret43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numautoret43']) && $this->nmgp_cmp_readonly['numautoret43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numautoret43']);
       $sStyleReadLab_numautoret43 = '';
       $sStyleReadInp_numautoret43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numautoret43']) && $this->nmgp_cmp_hidden['numautoret43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numautoret43" value="<?php echo $this->form_encode_input($numautoret43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numautoret43_label" id="hidden_field_label_numautoret43" style="<?php echo $sStyleHidden_numautoret43; ?>"><span id="id_label_numautoret43"><?php echo $this->nm_new_label['numautoret43']; ?></span></TD>
    <TD class="scFormDataOdd css_numautoret43_line" id="hidden_field_data_numautoret43" style="<?php echo $sStyleHidden_numautoret43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numautoret43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numautoret43"]) &&  $this->nmgp_cmp_readonly["numautoret43"] == "on") { 

 ?>
<input type="hidden" name="numautoret43" value="<?php echo $this->form_encode_input($numautoret43) . "\">" . $numautoret43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_numautoret43" class="sc-ui-readonly-numautoret43 css_numautoret43_line" style="<?php echo $sStyleReadLab_numautoret43; ?>"><?php echo $this->form_format_readonly("numautoret43", $this->form_encode_input($this->numautoret43)); ?></span><span id="id_read_off_numautoret43" class="css_read_off_numautoret43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numautoret43; ?>">
 <input class="sc-js-input scFormObjectOdd css_numautoret43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numautoret43" type=text name="numautoret43" value="<?php echo $this->form_encode_input($numautoret43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numautoret43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numautoret43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvanulado43']))
    {
        $this->nm_new_label['cvanulado43'] = "Cvanulado 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvanulado43 = $this->cvanulado43;
   $sStyleHidden_cvanulado43 = '';
   if (isset($this->nmgp_cmp_hidden['cvanulado43']) && $this->nmgp_cmp_hidden['cvanulado43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvanulado43']);
       $sStyleHidden_cvanulado43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvanulado43 = 'display: none;';
   $sStyleReadInp_cvanulado43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvanulado43']) && $this->nmgp_cmp_readonly['cvanulado43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvanulado43']);
       $sStyleReadLab_cvanulado43 = '';
       $sStyleReadInp_cvanulado43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvanulado43']) && $this->nmgp_cmp_hidden['cvanulado43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvanulado43" value="<?php echo $this->form_encode_input($cvanulado43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvanulado43_label" id="hidden_field_label_cvanulado43" style="<?php echo $sStyleHidden_cvanulado43; ?>"><span id="id_label_cvanulado43"><?php echo $this->nm_new_label['cvanulado43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['cvanulado43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['cvanulado43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_cvanulado43_line" id="hidden_field_data_cvanulado43" style="<?php echo $sStyleHidden_cvanulado43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvanulado43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvanulado43"]) &&  $this->nmgp_cmp_readonly["cvanulado43"] == "on") { 

 ?>
<input type="hidden" name="cvanulado43" value="<?php echo $this->form_encode_input($cvanulado43) . "\">" . $cvanulado43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvanulado43" class="sc-ui-readonly-cvanulado43 css_cvanulado43_line" style="<?php echo $sStyleReadLab_cvanulado43; ?>"><?php echo $this->form_format_readonly("cvanulado43", $this->form_encode_input($this->cvanulado43)); ?></span><span id="id_read_off_cvanulado43" class="css_read_off_cvanulado43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvanulado43; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvanulado43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvanulado43" type=text name="cvanulado43" value="<?php echo $this->form_encode_input($cvanulado43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvanulado43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvanulado43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['conta43']))
    {
        $this->nm_new_label['conta43'] = "Conta 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conta43 = $this->conta43;
   $sStyleHidden_conta43 = '';
   if (isset($this->nmgp_cmp_hidden['conta43']) && $this->nmgp_cmp_hidden['conta43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conta43']);
       $sStyleHidden_conta43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conta43 = 'display: none;';
   $sStyleReadInp_conta43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conta43']) && $this->nmgp_cmp_readonly['conta43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conta43']);
       $sStyleReadLab_conta43 = '';
       $sStyleReadInp_conta43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conta43']) && $this->nmgp_cmp_hidden['conta43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="conta43" value="<?php echo $this->form_encode_input($conta43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_conta43_label" id="hidden_field_label_conta43" style="<?php echo $sStyleHidden_conta43; ?>"><span id="id_label_conta43"><?php echo $this->nm_new_label['conta43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['conta43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['conta43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_conta43_line" id="hidden_field_data_conta43" style="<?php echo $sStyleHidden_conta43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_conta43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["conta43"]) &&  $this->nmgp_cmp_readonly["conta43"] == "on") { 

 ?>
<input type="hidden" name="conta43" value="<?php echo $this->form_encode_input($conta43) . "\">" . $conta43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_conta43" class="sc-ui-readonly-conta43 css_conta43_line" style="<?php echo $sStyleReadLab_conta43; ?>"><?php echo $this->form_format_readonly("conta43", $this->form_encode_input($this->conta43)); ?></span><span id="id_read_off_conta43" class="css_read_off_conta43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_conta43; ?>">
 <input class="sc-js-input scFormObjectOdd css_conta43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_conta43" type=text name="conta43" value="<?php echo $this->form_encode_input($conta43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conta43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conta43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['relacioncob43']))
    {
        $this->nm_new_label['relacioncob43'] = "Relacioncob 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $relacioncob43 = $this->relacioncob43;
   $sStyleHidden_relacioncob43 = '';
   if (isset($this->nmgp_cmp_hidden['relacioncob43']) && $this->nmgp_cmp_hidden['relacioncob43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['relacioncob43']);
       $sStyleHidden_relacioncob43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_relacioncob43 = 'display: none;';
   $sStyleReadInp_relacioncob43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['relacioncob43']) && $this->nmgp_cmp_readonly['relacioncob43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['relacioncob43']);
       $sStyleReadLab_relacioncob43 = '';
       $sStyleReadInp_relacioncob43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['relacioncob43']) && $this->nmgp_cmp_hidden['relacioncob43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="relacioncob43" value="<?php echo $this->form_encode_input($relacioncob43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_relacioncob43_label" id="hidden_field_label_relacioncob43" style="<?php echo $sStyleHidden_relacioncob43; ?>"><span id="id_label_relacioncob43"><?php echo $this->nm_new_label['relacioncob43']; ?></span></TD>
    <TD class="scFormDataOdd css_relacioncob43_line" id="hidden_field_data_relacioncob43" style="<?php echo $sStyleHidden_relacioncob43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_relacioncob43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["relacioncob43"]) &&  $this->nmgp_cmp_readonly["relacioncob43"] == "on") { 

 ?>
<input type="hidden" name="relacioncob43" value="<?php echo $this->form_encode_input($relacioncob43) . "\">" . $relacioncob43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_relacioncob43" class="sc-ui-readonly-relacioncob43 css_relacioncob43_line" style="<?php echo $sStyleReadLab_relacioncob43; ?>"><?php echo $this->form_format_readonly("relacioncob43", $this->form_encode_input($this->relacioncob43)); ?></span><span id="id_read_off_relacioncob43" class="css_read_off_relacioncob43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_relacioncob43; ?>">
 <input class="sc-js-input scFormObjectOdd css_relacioncob43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_relacioncob43" type=text name="relacioncob43" value="<?php echo $this->form_encode_input($relacioncob43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_relacioncob43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_relacioncob43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estadocob43']))
    {
        $this->nm_new_label['estadocob43'] = "Estadocob 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estadocob43 = $this->estadocob43;
   $sStyleHidden_estadocob43 = '';
   if (isset($this->nmgp_cmp_hidden['estadocob43']) && $this->nmgp_cmp_hidden['estadocob43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estadocob43']);
       $sStyleHidden_estadocob43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estadocob43 = 'display: none;';
   $sStyleReadInp_estadocob43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estadocob43']) && $this->nmgp_cmp_readonly['estadocob43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estadocob43']);
       $sStyleReadLab_estadocob43 = '';
       $sStyleReadInp_estadocob43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estadocob43']) && $this->nmgp_cmp_hidden['estadocob43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estadocob43" value="<?php echo $this->form_encode_input($estadocob43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_estadocob43_label" id="hidden_field_label_estadocob43" style="<?php echo $sStyleHidden_estadocob43; ?>"><span id="id_label_estadocob43"><?php echo $this->nm_new_label['estadocob43']; ?></span></TD>
    <TD class="scFormDataOdd css_estadocob43_line" id="hidden_field_data_estadocob43" style="<?php echo $sStyleHidden_estadocob43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estadocob43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estadocob43"]) &&  $this->nmgp_cmp_readonly["estadocob43"] == "on") { 

 ?>
<input type="hidden" name="estadocob43" value="<?php echo $this->form_encode_input($estadocob43) . "\">" . $estadocob43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_estadocob43" class="sc-ui-readonly-estadocob43 css_estadocob43_line" style="<?php echo $sStyleReadLab_estadocob43; ?>"><?php echo $this->form_format_readonly("estadocob43", $this->form_encode_input($this->estadocob43)); ?></span><span id="id_read_off_estadocob43" class="css_read_off_estadocob43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estadocob43; ?>">
 <input class="sc-js-input scFormObjectOdd css_estadocob43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estadocob43" type=text name="estadocob43" value="<?php echo $this->form_encode_input($estadocob43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estadocob43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estadocob43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nuevocodpago43']))
    {
        $this->nm_new_label['nuevocodpago43'] = "Nuevocodpago 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nuevocodpago43 = $this->nuevocodpago43;
   $sStyleHidden_nuevocodpago43 = '';
   if (isset($this->nmgp_cmp_hidden['nuevocodpago43']) && $this->nmgp_cmp_hidden['nuevocodpago43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nuevocodpago43']);
       $sStyleHidden_nuevocodpago43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nuevocodpago43 = 'display: none;';
   $sStyleReadInp_nuevocodpago43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nuevocodpago43']) && $this->nmgp_cmp_readonly['nuevocodpago43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nuevocodpago43']);
       $sStyleReadLab_nuevocodpago43 = '';
       $sStyleReadInp_nuevocodpago43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nuevocodpago43']) && $this->nmgp_cmp_hidden['nuevocodpago43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nuevocodpago43" value="<?php echo $this->form_encode_input($nuevocodpago43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nuevocodpago43_label" id="hidden_field_label_nuevocodpago43" style="<?php echo $sStyleHidden_nuevocodpago43; ?>"><span id="id_label_nuevocodpago43"><?php echo $this->nm_new_label['nuevocodpago43']; ?></span></TD>
    <TD class="scFormDataOdd css_nuevocodpago43_line" id="hidden_field_data_nuevocodpago43" style="<?php echo $sStyleHidden_nuevocodpago43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nuevocodpago43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nuevocodpago43"]) &&  $this->nmgp_cmp_readonly["nuevocodpago43"] == "on") { 

 ?>
<input type="hidden" name="nuevocodpago43" value="<?php echo $this->form_encode_input($nuevocodpago43) . "\">" . $nuevocodpago43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nuevocodpago43" class="sc-ui-readonly-nuevocodpago43 css_nuevocodpago43_line" style="<?php echo $sStyleReadLab_nuevocodpago43; ?>"><?php echo $this->form_format_readonly("nuevocodpago43", $this->form_encode_input($this->nuevocodpago43)); ?></span><span id="id_read_off_nuevocodpago43" class="css_read_off_nuevocodpago43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nuevocodpago43; ?>">
 <input class="sc-js-input scFormObjectOdd css_nuevocodpago43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nuevocodpago43" type=text name="nuevocodpago43" value="<?php echo $this->form_encode_input($nuevocodpago43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nuevocodpago43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nuevocodpago43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porccomision1']))
    {
        $this->nm_new_label['porccomision1'] = "Porccomision 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porccomision1 = $this->porccomision1;
   $sStyleHidden_porccomision1 = '';
   if (isset($this->nmgp_cmp_hidden['porccomision1']) && $this->nmgp_cmp_hidden['porccomision1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porccomision1']);
       $sStyleHidden_porccomision1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porccomision1 = 'display: none;';
   $sStyleReadInp_porccomision1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porccomision1']) && $this->nmgp_cmp_readonly['porccomision1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porccomision1']);
       $sStyleReadLab_porccomision1 = '';
       $sStyleReadInp_porccomision1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porccomision1']) && $this->nmgp_cmp_hidden['porccomision1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porccomision1" value="<?php echo $this->form_encode_input($porccomision1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porccomision1_label" id="hidden_field_label_porccomision1" style="<?php echo $sStyleHidden_porccomision1; ?>"><span id="id_label_porccomision1"><?php echo $this->nm_new_label['porccomision1']; ?></span></TD>
    <TD class="scFormDataOdd css_porccomision1_line" id="hidden_field_data_porccomision1" style="<?php echo $sStyleHidden_porccomision1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porccomision1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porccomision1"]) &&  $this->nmgp_cmp_readonly["porccomision1"] == "on") { 

 ?>
<input type="hidden" name="porccomision1" value="<?php echo $this->form_encode_input($porccomision1) . "\">" . $porccomision1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_porccomision1" class="sc-ui-readonly-porccomision1 css_porccomision1_line" style="<?php echo $sStyleReadLab_porccomision1; ?>"><?php echo $this->form_format_readonly("porccomision1", $this->form_encode_input($this->porccomision1)); ?></span><span id="id_read_off_porccomision1" class="css_read_off_porccomision1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porccomision1; ?>">
 <input class="sc-js-input scFormObjectOdd css_porccomision1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porccomision1" type=text name="porccomision1" value="<?php echo $this->form_encode_input($porccomision1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porccomision1']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porccomision1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porccomision1']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porccomision1']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porccomision1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porccomision1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porccomision2']))
    {
        $this->nm_new_label['porccomision2'] = "Porccomision 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porccomision2 = $this->porccomision2;
   $sStyleHidden_porccomision2 = '';
   if (isset($this->nmgp_cmp_hidden['porccomision2']) && $this->nmgp_cmp_hidden['porccomision2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porccomision2']);
       $sStyleHidden_porccomision2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porccomision2 = 'display: none;';
   $sStyleReadInp_porccomision2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porccomision2']) && $this->nmgp_cmp_readonly['porccomision2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porccomision2']);
       $sStyleReadLab_porccomision2 = '';
       $sStyleReadInp_porccomision2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porccomision2']) && $this->nmgp_cmp_hidden['porccomision2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porccomision2" value="<?php echo $this->form_encode_input($porccomision2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porccomision2_label" id="hidden_field_label_porccomision2" style="<?php echo $sStyleHidden_porccomision2; ?>"><span id="id_label_porccomision2"><?php echo $this->nm_new_label['porccomision2']; ?></span></TD>
    <TD class="scFormDataOdd css_porccomision2_line" id="hidden_field_data_porccomision2" style="<?php echo $sStyleHidden_porccomision2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porccomision2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porccomision2"]) &&  $this->nmgp_cmp_readonly["porccomision2"] == "on") { 

 ?>
<input type="hidden" name="porccomision2" value="<?php echo $this->form_encode_input($porccomision2) . "\">" . $porccomision2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_porccomision2" class="sc-ui-readonly-porccomision2 css_porccomision2_line" style="<?php echo $sStyleReadLab_porccomision2; ?>"><?php echo $this->form_format_readonly("porccomision2", $this->form_encode_input($this->porccomision2)); ?></span><span id="id_read_off_porccomision2" class="css_read_off_porccomision2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porccomision2; ?>">
 <input class="sc-js-input scFormObjectOdd css_porccomision2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porccomision2" type=text name="porccomision2" value="<?php echo $this->form_encode_input($porccomision2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porccomision2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porccomision2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porccomision2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porccomision2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porccomision2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porccomision2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porcdesctocomision1']))
    {
        $this->nm_new_label['porcdesctocomision1'] = "Porcdesctocomision 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porcdesctocomision1 = $this->porcdesctocomision1;
   $sStyleHidden_porcdesctocomision1 = '';
   if (isset($this->nmgp_cmp_hidden['porcdesctocomision1']) && $this->nmgp_cmp_hidden['porcdesctocomision1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porcdesctocomision1']);
       $sStyleHidden_porcdesctocomision1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porcdesctocomision1 = 'display: none;';
   $sStyleReadInp_porcdesctocomision1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porcdesctocomision1']) && $this->nmgp_cmp_readonly['porcdesctocomision1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porcdesctocomision1']);
       $sStyleReadLab_porcdesctocomision1 = '';
       $sStyleReadInp_porcdesctocomision1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porcdesctocomision1']) && $this->nmgp_cmp_hidden['porcdesctocomision1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcdesctocomision1" value="<?php echo $this->form_encode_input($porcdesctocomision1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porcdesctocomision1_label" id="hidden_field_label_porcdesctocomision1" style="<?php echo $sStyleHidden_porcdesctocomision1; ?>"><span id="id_label_porcdesctocomision1"><?php echo $this->nm_new_label['porcdesctocomision1']; ?></span></TD>
    <TD class="scFormDataOdd css_porcdesctocomision1_line" id="hidden_field_data_porcdesctocomision1" style="<?php echo $sStyleHidden_porcdesctocomision1; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porcdesctocomision1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcdesctocomision1"]) &&  $this->nmgp_cmp_readonly["porcdesctocomision1"] == "on") { 

 ?>
<input type="hidden" name="porcdesctocomision1" value="<?php echo $this->form_encode_input($porcdesctocomision1) . "\">" . $porcdesctocomision1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcdesctocomision1" class="sc-ui-readonly-porcdesctocomision1 css_porcdesctocomision1_line" style="<?php echo $sStyleReadLab_porcdesctocomision1; ?>"><?php echo $this->form_format_readonly("porcdesctocomision1", $this->form_encode_input($this->porcdesctocomision1)); ?></span><span id="id_read_off_porcdesctocomision1" class="css_read_off_porcdesctocomision1<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcdesctocomision1; ?>">
 <input class="sc-js-input scFormObjectOdd css_porcdesctocomision1_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porcdesctocomision1" type=text name="porcdesctocomision1" value="<?php echo $this->form_encode_input($porcdesctocomision1) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porcdesctocomision1']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcdesctocomision1']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcdesctocomision1']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porcdesctocomision1']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcdesctocomision1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcdesctocomision1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porcdesctocomision2']))
    {
        $this->nm_new_label['porcdesctocomision2'] = "Porcdesctocomision 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porcdesctocomision2 = $this->porcdesctocomision2;
   $sStyleHidden_porcdesctocomision2 = '';
   if (isset($this->nmgp_cmp_hidden['porcdesctocomision2']) && $this->nmgp_cmp_hidden['porcdesctocomision2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porcdesctocomision2']);
       $sStyleHidden_porcdesctocomision2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porcdesctocomision2 = 'display: none;';
   $sStyleReadInp_porcdesctocomision2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porcdesctocomision2']) && $this->nmgp_cmp_readonly['porcdesctocomision2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porcdesctocomision2']);
       $sStyleReadLab_porcdesctocomision2 = '';
       $sStyleReadInp_porcdesctocomision2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porcdesctocomision2']) && $this->nmgp_cmp_hidden['porcdesctocomision2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcdesctocomision2" value="<?php echo $this->form_encode_input($porcdesctocomision2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porcdesctocomision2_label" id="hidden_field_label_porcdesctocomision2" style="<?php echo $sStyleHidden_porcdesctocomision2; ?>"><span id="id_label_porcdesctocomision2"><?php echo $this->nm_new_label['porcdesctocomision2']; ?></span></TD>
    <TD class="scFormDataOdd css_porcdesctocomision2_line" id="hidden_field_data_porcdesctocomision2" style="<?php echo $sStyleHidden_porcdesctocomision2; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porcdesctocomision2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcdesctocomision2"]) &&  $this->nmgp_cmp_readonly["porcdesctocomision2"] == "on") { 

 ?>
<input type="hidden" name="porcdesctocomision2" value="<?php echo $this->form_encode_input($porcdesctocomision2) . "\">" . $porcdesctocomision2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcdesctocomision2" class="sc-ui-readonly-porcdesctocomision2 css_porcdesctocomision2_line" style="<?php echo $sStyleReadLab_porcdesctocomision2; ?>"><?php echo $this->form_format_readonly("porcdesctocomision2", $this->form_encode_input($this->porcdesctocomision2)); ?></span><span id="id_read_off_porcdesctocomision2" class="css_read_off_porcdesctocomision2<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcdesctocomision2; ?>">
 <input class="sc-js-input scFormObjectOdd css_porcdesctocomision2_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porcdesctocomision2" type=text name="porcdesctocomision2" value="<?php echo $this->form_encode_input($porcdesctocomision2) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porcdesctocomision2']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcdesctocomision2']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcdesctocomision2']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porcdesctocomision2']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcdesctocomision2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcdesctocomision2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ope43']))
    {
        $this->nm_new_label['ope43'] = "Ope 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ope43 = $this->ope43;
   $sStyleHidden_ope43 = '';
   if (isset($this->nmgp_cmp_hidden['ope43']) && $this->nmgp_cmp_hidden['ope43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ope43']);
       $sStyleHidden_ope43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ope43 = 'display: none;';
   $sStyleReadInp_ope43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ope43']) && $this->nmgp_cmp_readonly['ope43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ope43']);
       $sStyleReadLab_ope43 = '';
       $sStyleReadInp_ope43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ope43']) && $this->nmgp_cmp_hidden['ope43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ope43" value="<?php echo $this->form_encode_input($ope43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ope43_label" id="hidden_field_label_ope43" style="<?php echo $sStyleHidden_ope43; ?>"><span id="id_label_ope43"><?php echo $this->nm_new_label['ope43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['ope43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['ope43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ope43_line" id="hidden_field_data_ope43" style="<?php echo $sStyleHidden_ope43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ope43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ope43"]) &&  $this->nmgp_cmp_readonly["ope43"] == "on") { 

 ?>
<input type="hidden" name="ope43" value="<?php echo $this->form_encode_input($ope43) . "\">" . $ope43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ope43" class="sc-ui-readonly-ope43 css_ope43_line" style="<?php echo $sStyleReadLab_ope43; ?>"><?php echo $this->form_format_readonly("ope43", $this->form_encode_input($this->ope43)); ?></span><span id="id_read_off_ope43" class="css_read_off_ope43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ope43; ?>">
 <input class="sc-js-input scFormObjectOdd css_ope43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ope43" type=text name="ope43" value="<?php echo $this->form_encode_input($ope43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ope43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ope43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tfin43']))
    {
        $this->nm_new_label['tfin43'] = "Tfin 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tfin43 = $this->tfin43;
   $sStyleHidden_tfin43 = '';
   if (isset($this->nmgp_cmp_hidden['tfin43']) && $this->nmgp_cmp_hidden['tfin43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tfin43']);
       $sStyleHidden_tfin43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tfin43 = 'display: none;';
   $sStyleReadInp_tfin43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tfin43']) && $this->nmgp_cmp_readonly['tfin43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tfin43']);
       $sStyleReadLab_tfin43 = '';
       $sStyleReadInp_tfin43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tfin43']) && $this->nmgp_cmp_hidden['tfin43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tfin43" value="<?php echo $this->form_encode_input($tfin43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tfin43_label" id="hidden_field_label_tfin43" style="<?php echo $sStyleHidden_tfin43; ?>"><span id="id_label_tfin43"><?php echo $this->nm_new_label['tfin43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['tfin43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['tfin43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tfin43_line" id="hidden_field_data_tfin43" style="<?php echo $sStyleHidden_tfin43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tfin43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tfin43"]) &&  $this->nmgp_cmp_readonly["tfin43"] == "on") { 

 ?>
<input type="hidden" name="tfin43" value="<?php echo $this->form_encode_input($tfin43) . "\">" . $tfin43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_tfin43" class="sc-ui-readonly-tfin43 css_tfin43_line" style="<?php echo $sStyleReadLab_tfin43; ?>"><?php echo $this->form_format_readonly("tfin43", $this->form_encode_input($this->tfin43)); ?></span><span id="id_read_off_tfin43" class="css_read_off_tfin43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tfin43; ?>">
 <input class="sc-js-input scFormObjectOdd css_tfin43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tfin43" type=text name="tfin43" value="<?php echo $this->form_encode_input($tfin43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tfin43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tfin43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fin43']))
    {
        $this->nm_new_label['fin43'] = "Fin 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fin43 = $this->fin43;
   $sStyleHidden_fin43 = '';
   if (isset($this->nmgp_cmp_hidden['fin43']) && $this->nmgp_cmp_hidden['fin43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fin43']);
       $sStyleHidden_fin43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fin43 = 'display: none;';
   $sStyleReadInp_fin43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fin43']) && $this->nmgp_cmp_readonly['fin43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fin43']);
       $sStyleReadLab_fin43 = '';
       $sStyleReadInp_fin43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fin43']) && $this->nmgp_cmp_hidden['fin43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fin43" value="<?php echo $this->form_encode_input($fin43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fin43_label" id="hidden_field_label_fin43" style="<?php echo $sStyleHidden_fin43; ?>"><span id="id_label_fin43"><?php echo $this->nm_new_label['fin43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['fin43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['fin43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_fin43_line" id="hidden_field_data_fin43" style="<?php echo $sStyleHidden_fin43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fin43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fin43"]) &&  $this->nmgp_cmp_readonly["fin43"] == "on") { 

 ?>
<input type="hidden" name="fin43" value="<?php echo $this->form_encode_input($fin43) . "\">" . $fin43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fin43" class="sc-ui-readonly-fin43 css_fin43_line" style="<?php echo $sStyleReadLab_fin43; ?>"><?php echo $this->form_format_readonly("fin43", $this->form_encode_input($this->fin43)); ?></span><span id="id_read_off_fin43" class="css_read_off_fin43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fin43; ?>">
 <input class="sc-js-input scFormObjectOdd css_fin43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fin43" type=text name="fin43" value="<?php echo $this->form_encode_input($fin43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fin43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fin43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ban43']))
    {
        $this->nm_new_label['ban43'] = "Ban 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ban43 = $this->ban43;
   $sStyleHidden_ban43 = '';
   if (isset($this->nmgp_cmp_hidden['ban43']) && $this->nmgp_cmp_hidden['ban43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ban43']);
       $sStyleHidden_ban43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ban43 = 'display: none;';
   $sStyleReadInp_ban43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ban43']) && $this->nmgp_cmp_readonly['ban43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ban43']);
       $sStyleReadLab_ban43 = '';
       $sStyleReadInp_ban43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ban43']) && $this->nmgp_cmp_hidden['ban43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ban43" value="<?php echo $this->form_encode_input($ban43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ban43_label" id="hidden_field_label_ban43" style="<?php echo $sStyleHidden_ban43; ?>"><span id="id_label_ban43"><?php echo $this->nm_new_label['ban43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['ban43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['ban43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ban43_line" id="hidden_field_data_ban43" style="<?php echo $sStyleHidden_ban43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ban43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ban43"]) &&  $this->nmgp_cmp_readonly["ban43"] == "on") { 

 ?>
<input type="hidden" name="ban43" value="<?php echo $this->form_encode_input($ban43) . "\">" . $ban43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ban43" class="sc-ui-readonly-ban43 css_ban43_line" style="<?php echo $sStyleReadLab_ban43; ?>"><?php echo $this->form_format_readonly("ban43", $this->form_encode_input($this->ban43)); ?></span><span id="id_read_off_ban43" class="css_read_off_ban43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ban43; ?>">
 <input class="sc-js-input scFormObjectOdd css_ban43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ban43" type=text name="ban43" value="<?php echo $this->form_encode_input($ban43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ban43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ban43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cobrador43']))
    {
        $this->nm_new_label['cobrador43'] = "Cobrador 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobrador43 = $this->cobrador43;
   $sStyleHidden_cobrador43 = '';
   if (isset($this->nmgp_cmp_hidden['cobrador43']) && $this->nmgp_cmp_hidden['cobrador43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobrador43']);
       $sStyleHidden_cobrador43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobrador43 = 'display: none;';
   $sStyleReadInp_cobrador43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cobrador43']) && $this->nmgp_cmp_readonly['cobrador43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobrador43']);
       $sStyleReadLab_cobrador43 = '';
       $sStyleReadInp_cobrador43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobrador43']) && $this->nmgp_cmp_hidden['cobrador43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobrador43" value="<?php echo $this->form_encode_input($cobrador43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cobrador43_label" id="hidden_field_label_cobrador43" style="<?php echo $sStyleHidden_cobrador43; ?>"><span id="id_label_cobrador43"><?php echo $this->nm_new_label['cobrador43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['cobrador43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['cobrador43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_cobrador43_line" id="hidden_field_data_cobrador43" style="<?php echo $sStyleHidden_cobrador43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobrador43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cobrador43"]) &&  $this->nmgp_cmp_readonly["cobrador43"] == "on") { 

 ?>
<input type="hidden" name="cobrador43" value="<?php echo $this->form_encode_input($cobrador43) . "\">" . $cobrador43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cobrador43" class="sc-ui-readonly-cobrador43 css_cobrador43_line" style="<?php echo $sStyleReadLab_cobrador43; ?>"><?php echo $this->form_format_readonly("cobrador43", $this->form_encode_input($this->cobrador43)); ?></span><span id="id_read_off_cobrador43" class="css_read_off_cobrador43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cobrador43; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobrador43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cobrador43" type=text name="cobrador43" value="<?php echo $this->form_encode_input($cobrador43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobrador43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobrador43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['coordinador43']))
    {
        $this->nm_new_label['coordinador43'] = "Coordinador 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $coordinador43 = $this->coordinador43;
   $sStyleHidden_coordinador43 = '';
   if (isset($this->nmgp_cmp_hidden['coordinador43']) && $this->nmgp_cmp_hidden['coordinador43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['coordinador43']);
       $sStyleHidden_coordinador43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_coordinador43 = 'display: none;';
   $sStyleReadInp_coordinador43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['coordinador43']) && $this->nmgp_cmp_readonly['coordinador43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['coordinador43']);
       $sStyleReadLab_coordinador43 = '';
       $sStyleReadInp_coordinador43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['coordinador43']) && $this->nmgp_cmp_hidden['coordinador43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="coordinador43" value="<?php echo $this->form_encode_input($coordinador43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_coordinador43_label" id="hidden_field_label_coordinador43" style="<?php echo $sStyleHidden_coordinador43; ?>"><span id="id_label_coordinador43"><?php echo $this->nm_new_label['coordinador43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['coordinador43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['coordinador43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_coordinador43_line" id="hidden_field_data_coordinador43" style="<?php echo $sStyleHidden_coordinador43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_coordinador43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["coordinador43"]) &&  $this->nmgp_cmp_readonly["coordinador43"] == "on") { 

 ?>
<input type="hidden" name="coordinador43" value="<?php echo $this->form_encode_input($coordinador43) . "\">" . $coordinador43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_coordinador43" class="sc-ui-readonly-coordinador43 css_coordinador43_line" style="<?php echo $sStyleReadLab_coordinador43; ?>"><?php echo $this->form_format_readonly("coordinador43", $this->form_encode_input($this->coordinador43)); ?></span><span id="id_read_off_coordinador43" class="css_read_off_coordinador43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_coordinador43; ?>">
 <input class="sc-js-input scFormObjectOdd css_coordinador43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_coordinador43" type=text name="coordinador43" value="<?php echo $this->form_encode_input($coordinador43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_coordinador43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_coordinador43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cierre']))
    {
        $this->nm_new_label['cierre'] = "Cierre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cierre = $this->cierre;
   $sStyleHidden_cierre = '';
   if (isset($this->nmgp_cmp_hidden['cierre']) && $this->nmgp_cmp_hidden['cierre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cierre']);
       $sStyleHidden_cierre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cierre = 'display: none;';
   $sStyleReadInp_cierre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cierre']) && $this->nmgp_cmp_readonly['cierre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cierre']);
       $sStyleReadLab_cierre = '';
       $sStyleReadInp_cierre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cierre']) && $this->nmgp_cmp_hidden['cierre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cierre" value="<?php echo $this->form_encode_input($cierre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cierre_label" id="hidden_field_label_cierre" style="<?php echo $sStyleHidden_cierre; ?>"><span id="id_label_cierre"><?php echo $this->nm_new_label['cierre']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['cierre']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['cierre'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_cierre_line" id="hidden_field_data_cierre" style="<?php echo $sStyleHidden_cierre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cierre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cierre"]) &&  $this->nmgp_cmp_readonly["cierre"] == "on") { 

 ?>
<input type="hidden" name="cierre" value="<?php echo $this->form_encode_input($cierre) . "\">" . $cierre . ""; ?>
<?php } else { ?>
<span id="id_read_on_cierre" class="sc-ui-readonly-cierre css_cierre_line" style="<?php echo $sStyleReadLab_cierre; ?>"><?php echo $this->form_format_readonly("cierre", $this->form_encode_input($this->cierre)); ?></span><span id="id_read_off_cierre" class="css_read_off_cierre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cierre; ?>">
 <input class="sc-js-input scFormObjectOdd css_cierre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cierre" type=text name="cierre" value="<?php echo $this->form_encode_input($cierre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cierre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cierre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idcierre']))
    {
        $this->nm_new_label['idcierre'] = "Idcierre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcierre = $this->idcierre;
   $sStyleHidden_idcierre = '';
   if (isset($this->nmgp_cmp_hidden['idcierre']) && $this->nmgp_cmp_hidden['idcierre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcierre']);
       $sStyleHidden_idcierre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcierre = 'display: none;';
   $sStyleReadInp_idcierre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idcierre']) && $this->nmgp_cmp_readonly['idcierre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcierre']);
       $sStyleReadLab_idcierre = '';
       $sStyleReadInp_idcierre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcierre']) && $this->nmgp_cmp_hidden['idcierre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcierre" value="<?php echo $this->form_encode_input($idcierre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idcierre_label" id="hidden_field_label_idcierre" style="<?php echo $sStyleHidden_idcierre; ?>"><span id="id_label_idcierre"><?php echo $this->nm_new_label['idcierre']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['idcierre']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['idcierre'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_idcierre_line" id="hidden_field_data_idcierre" style="<?php echo $sStyleHidden_idcierre; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcierre_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcierre"]) &&  $this->nmgp_cmp_readonly["idcierre"] == "on") { 

 ?>
<input type="hidden" name="idcierre" value="<?php echo $this->form_encode_input($idcierre) . "\">" . $idcierre . ""; ?>
<?php } else { ?>
<span id="id_read_on_idcierre" class="sc-ui-readonly-idcierre css_idcierre_line" style="<?php echo $sStyleReadLab_idcierre; ?>"><?php echo $this->form_format_readonly("idcierre", $this->form_encode_input($this->idcierre)); ?></span><span id="id_read_off_idcierre" class="css_read_off_idcierre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idcierre; ?>">
 <input class="sc-js-input scFormObjectOdd css_idcierre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idcierre" type=text name="idcierre" value="<?php echo $this->form_encode_input($idcierre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=21"; } ?> maxlength=21 alt="{datatype: 'text', maxLength: 21, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcierre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcierre_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['num_bco_dep']))
    {
        $this->nm_new_label['num_bco_dep'] = "Num Bco Dep";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $num_bco_dep = $this->num_bco_dep;
   $sStyleHidden_num_bco_dep = '';
   if (isset($this->nmgp_cmp_hidden['num_bco_dep']) && $this->nmgp_cmp_hidden['num_bco_dep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['num_bco_dep']);
       $sStyleHidden_num_bco_dep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_num_bco_dep = 'display: none;';
   $sStyleReadInp_num_bco_dep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['num_bco_dep']) && $this->nmgp_cmp_readonly['num_bco_dep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['num_bco_dep']);
       $sStyleReadLab_num_bco_dep = '';
       $sStyleReadInp_num_bco_dep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['num_bco_dep']) && $this->nmgp_cmp_hidden['num_bco_dep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="num_bco_dep" value="<?php echo $this->form_encode_input($num_bco_dep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_num_bco_dep_label" id="hidden_field_label_num_bco_dep" style="<?php echo $sStyleHidden_num_bco_dep; ?>"><span id="id_label_num_bco_dep"><?php echo $this->nm_new_label['num_bco_dep']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['num_bco_dep']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['num_bco_dep'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_num_bco_dep_line" id="hidden_field_data_num_bco_dep" style="<?php echo $sStyleHidden_num_bco_dep; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_num_bco_dep_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["num_bco_dep"]) &&  $this->nmgp_cmp_readonly["num_bco_dep"] == "on") { 

 ?>
<input type="hidden" name="num_bco_dep" value="<?php echo $this->form_encode_input($num_bco_dep) . "\">" . $num_bco_dep . ""; ?>
<?php } else { ?>
<span id="id_read_on_num_bco_dep" class="sc-ui-readonly-num_bco_dep css_num_bco_dep_line" style="<?php echo $sStyleReadLab_num_bco_dep; ?>"><?php echo $this->form_format_readonly("num_bco_dep", $this->form_encode_input($this->num_bco_dep)); ?></span><span id="id_read_off_num_bco_dep" class="css_read_off_num_bco_dep<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_num_bco_dep; ?>">
 <input class="sc-js-input scFormObjectOdd css_num_bco_dep_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_num_bco_dep" type=text name="num_bco_dep" value="<?php echo $this->form_encode_input($num_bco_dep) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_num_bco_dep_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_num_bco_dep_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['num_deposito']))
    {
        $this->nm_new_label['num_deposito'] = "Num Deposito";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $num_deposito = $this->num_deposito;
   $sStyleHidden_num_deposito = '';
   if (isset($this->nmgp_cmp_hidden['num_deposito']) && $this->nmgp_cmp_hidden['num_deposito'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['num_deposito']);
       $sStyleHidden_num_deposito = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_num_deposito = 'display: none;';
   $sStyleReadInp_num_deposito = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['num_deposito']) && $this->nmgp_cmp_readonly['num_deposito'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['num_deposito']);
       $sStyleReadLab_num_deposito = '';
       $sStyleReadInp_num_deposito = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['num_deposito']) && $this->nmgp_cmp_hidden['num_deposito'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="num_deposito" value="<?php echo $this->form_encode_input($num_deposito) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_num_deposito_label" id="hidden_field_label_num_deposito" style="<?php echo $sStyleHidden_num_deposito; ?>"><span id="id_label_num_deposito"><?php echo $this->nm_new_label['num_deposito']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['num_deposito']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['num_deposito'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_num_deposito_line" id="hidden_field_data_num_deposito" style="<?php echo $sStyleHidden_num_deposito; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_num_deposito_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["num_deposito"]) &&  $this->nmgp_cmp_readonly["num_deposito"] == "on") { 

 ?>
<input type="hidden" name="num_deposito" value="<?php echo $this->form_encode_input($num_deposito) . "\">" . $num_deposito . ""; ?>
<?php } else { ?>
<span id="id_read_on_num_deposito" class="sc-ui-readonly-num_deposito css_num_deposito_line" style="<?php echo $sStyleReadLab_num_deposito; ?>"><?php echo $this->form_format_readonly("num_deposito", $this->form_encode_input($this->num_deposito)); ?></span><span id="id_read_off_num_deposito" class="css_read_off_num_deposito<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_num_deposito; ?>">
 <input class="sc-js-input scFormObjectOdd css_num_deposito_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_num_deposito" type=text name="num_deposito" value="<?php echo $this->form_encode_input($num_deposito) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_num_deposito_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_num_deposito_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['num_doc_cont']))
    {
        $this->nm_new_label['num_doc_cont'] = "Num Doc Cont";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $num_doc_cont = $this->num_doc_cont;
   $sStyleHidden_num_doc_cont = '';
   if (isset($this->nmgp_cmp_hidden['num_doc_cont']) && $this->nmgp_cmp_hidden['num_doc_cont'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['num_doc_cont']);
       $sStyleHidden_num_doc_cont = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_num_doc_cont = 'display: none;';
   $sStyleReadInp_num_doc_cont = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['num_doc_cont']) && $this->nmgp_cmp_readonly['num_doc_cont'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['num_doc_cont']);
       $sStyleReadLab_num_doc_cont = '';
       $sStyleReadInp_num_doc_cont = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['num_doc_cont']) && $this->nmgp_cmp_hidden['num_doc_cont'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="num_doc_cont" value="<?php echo $this->form_encode_input($num_doc_cont) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_num_doc_cont_label" id="hidden_field_label_num_doc_cont" style="<?php echo $sStyleHidden_num_doc_cont; ?>"><span id="id_label_num_doc_cont"><?php echo $this->nm_new_label['num_doc_cont']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['num_doc_cont']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['num_doc_cont'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_num_doc_cont_line" id="hidden_field_data_num_doc_cont" style="<?php echo $sStyleHidden_num_doc_cont; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_num_doc_cont_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["num_doc_cont"]) &&  $this->nmgp_cmp_readonly["num_doc_cont"] == "on") { 

 ?>
<input type="hidden" name="num_doc_cont" value="<?php echo $this->form_encode_input($num_doc_cont) . "\">" . $num_doc_cont . ""; ?>
<?php } else { ?>
<span id="id_read_on_num_doc_cont" class="sc-ui-readonly-num_doc_cont css_num_doc_cont_line" style="<?php echo $sStyleReadLab_num_doc_cont; ?>"><?php echo $this->form_format_readonly("num_doc_cont", $this->form_encode_input($this->num_doc_cont)); ?></span><span id="id_read_off_num_doc_cont" class="css_read_off_num_doc_cont<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_num_doc_cont; ?>">
 <input class="sc-js-input scFormObjectOdd css_num_doc_cont_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_num_doc_cont" type=text name="num_doc_cont" value="<?php echo $this->form_encode_input($num_doc_cont) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_num_doc_cont_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_num_doc_cont_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tip_doc_cont']))
    {
        $this->nm_new_label['tip_doc_cont'] = "Tip Doc Cont";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tip_doc_cont = $this->tip_doc_cont;
   $sStyleHidden_tip_doc_cont = '';
   if (isset($this->nmgp_cmp_hidden['tip_doc_cont']) && $this->nmgp_cmp_hidden['tip_doc_cont'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tip_doc_cont']);
       $sStyleHidden_tip_doc_cont = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tip_doc_cont = 'display: none;';
   $sStyleReadInp_tip_doc_cont = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tip_doc_cont']) && $this->nmgp_cmp_readonly['tip_doc_cont'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tip_doc_cont']);
       $sStyleReadLab_tip_doc_cont = '';
       $sStyleReadInp_tip_doc_cont = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tip_doc_cont']) && $this->nmgp_cmp_hidden['tip_doc_cont'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tip_doc_cont" value="<?php echo $this->form_encode_input($tip_doc_cont) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tip_doc_cont_label" id="hidden_field_label_tip_doc_cont" style="<?php echo $sStyleHidden_tip_doc_cont; ?>"><span id="id_label_tip_doc_cont"><?php echo $this->nm_new_label['tip_doc_cont']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['tip_doc_cont']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['tip_doc_cont'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tip_doc_cont_line" id="hidden_field_data_tip_doc_cont" style="<?php echo $sStyleHidden_tip_doc_cont; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tip_doc_cont_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tip_doc_cont"]) &&  $this->nmgp_cmp_readonly["tip_doc_cont"] == "on") { 

 ?>
<input type="hidden" name="tip_doc_cont" value="<?php echo $this->form_encode_input($tip_doc_cont) . "\">" . $tip_doc_cont . ""; ?>
<?php } else { ?>
<span id="id_read_on_tip_doc_cont" class="sc-ui-readonly-tip_doc_cont css_tip_doc_cont_line" style="<?php echo $sStyleReadLab_tip_doc_cont; ?>"><?php echo $this->form_format_readonly("tip_doc_cont", $this->form_encode_input($this->tip_doc_cont)); ?></span><span id="id_read_off_tip_doc_cont" class="css_read_off_tip_doc_cont<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tip_doc_cont; ?>">
 <input class="sc-js-input scFormObjectOdd css_tip_doc_cont_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tip_doc_cont" type=text name="tip_doc_cont" value="<?php echo $this->form_encode_input($tip_doc_cont) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tip_doc_cont_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tip_doc_cont_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idb']))
    {
        $this->nm_new_label['idb'] = "IDB";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idb = $this->idb;
   $sStyleHidden_idb = '';
   if (isset($this->nmgp_cmp_hidden['idb']) && $this->nmgp_cmp_hidden['idb'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idb']);
       $sStyleHidden_idb = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idb = 'display: none;';
   $sStyleReadInp_idb = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idb']) && $this->nmgp_cmp_readonly['idb'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idb']);
       $sStyleReadLab_idb = '';
       $sStyleReadInp_idb = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idb']) && $this->nmgp_cmp_hidden['idb'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idb" value="<?php echo $this->form_encode_input($idb) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idb_label" id="hidden_field_label_idb" style="<?php echo $sStyleHidden_idb; ?>"><span id="id_label_idb"><?php echo $this->nm_new_label['idb']; ?></span></TD>
    <TD class="scFormDataOdd css_idb_line" id="hidden_field_data_idb" style="<?php echo $sStyleHidden_idb; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idb_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idb"]) &&  $this->nmgp_cmp_readonly["idb"] == "on") { 

 ?>
<input type="hidden" name="idb" value="<?php echo $this->form_encode_input($idb) . "\">" . $idb . ""; ?>
<?php } else { ?>
<span id="id_read_on_idb" class="sc-ui-readonly-idb css_idb_line" style="<?php echo $sStyleReadLab_idb; ?>"><?php echo $this->form_format_readonly("idb", $this->form_encode_input($this->idb)); ?></span><span id="id_read_off_idb" class="css_read_off_idb<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idb; ?>">
 <input class="sc-js-input scFormObjectOdd css_idb_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idb" type=text name="idb" value="<?php echo $this->form_encode_input($idb) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idb_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipocomptehis']))
    {
        $this->nm_new_label['tipocomptehis'] = "Tipocomptehis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipocomptehis = $this->tipocomptehis;
   $sStyleHidden_tipocomptehis = '';
   if (isset($this->nmgp_cmp_hidden['tipocomptehis']) && $this->nmgp_cmp_hidden['tipocomptehis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipocomptehis']);
       $sStyleHidden_tipocomptehis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipocomptehis = 'display: none;';
   $sStyleReadInp_tipocomptehis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipocomptehis']) && $this->nmgp_cmp_readonly['tipocomptehis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipocomptehis']);
       $sStyleReadLab_tipocomptehis = '';
       $sStyleReadInp_tipocomptehis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipocomptehis']) && $this->nmgp_cmp_hidden['tipocomptehis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipocomptehis" value="<?php echo $this->form_encode_input($tipocomptehis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipocomptehis_label" id="hidden_field_label_tipocomptehis" style="<?php echo $sStyleHidden_tipocomptehis; ?>"><span id="id_label_tipocomptehis"><?php echo $this->nm_new_label['tipocomptehis']; ?></span></TD>
    <TD class="scFormDataOdd css_tipocomptehis_line" id="hidden_field_data_tipocomptehis" style="<?php echo $sStyleHidden_tipocomptehis; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipocomptehis_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipocomptehis"]) &&  $this->nmgp_cmp_readonly["tipocomptehis"] == "on") { 

 ?>
<input type="hidden" name="tipocomptehis" value="<?php echo $this->form_encode_input($tipocomptehis) . "\">" . $tipocomptehis . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipocomptehis" class="sc-ui-readonly-tipocomptehis css_tipocomptehis_line" style="<?php echo $sStyleReadLab_tipocomptehis; ?>"><?php echo $this->form_format_readonly("tipocomptehis", $this->form_encode_input($this->tipocomptehis)); ?></span><span id="id_read_off_tipocomptehis" class="css_read_off_tipocomptehis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipocomptehis; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipocomptehis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipocomptehis" type=text name="tipocomptehis" value="<?php echo $this->form_encode_input($tipocomptehis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipocomptehis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipocomptehis_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['datosretcliente']))
    {
        $this->nm_new_label['datosretcliente'] = "Datos Ret Cliente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $datosretcliente = $this->datosretcliente;
   $sStyleHidden_datosretcliente = '';
   if (isset($this->nmgp_cmp_hidden['datosretcliente']) && $this->nmgp_cmp_hidden['datosretcliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['datosretcliente']);
       $sStyleHidden_datosretcliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_datosretcliente = 'display: none;';
   $sStyleReadInp_datosretcliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['datosretcliente']) && $this->nmgp_cmp_readonly['datosretcliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['datosretcliente']);
       $sStyleReadLab_datosretcliente = '';
       $sStyleReadInp_datosretcliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['datosretcliente']) && $this->nmgp_cmp_hidden['datosretcliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="datosretcliente" value="<?php echo $this->form_encode_input($datosretcliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_datosretcliente_label" id="hidden_field_label_datosretcliente" style="<?php echo $sStyleHidden_datosretcliente; ?>"><span id="id_label_datosretcliente"><?php echo $this->nm_new_label['datosretcliente']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['datosretcliente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['datosretcliente'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_datosretcliente_line" id="hidden_field_data_datosretcliente" style="<?php echo $sStyleHidden_datosretcliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_datosretcliente_line" style="vertical-align: top;padding: 0px">
<?php
$datosretcliente_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($datosretcliente));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["datosretcliente"]) &&  $this->nmgp_cmp_readonly["datosretcliente"] == "on") { 

 ?>
<input type="hidden" name="datosretcliente" value="<?php echo $this->form_encode_input($datosretcliente) . "\">" . $datosretcliente_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_datosretcliente" class="sc-ui-readonly-datosretcliente css_datosretcliente_line" style="<?php echo $sStyleReadLab_datosretcliente; ?>"><?php echo $this->form_format_readonly("datosretcliente", $this->form_encode_input($datosretcliente_val)); ?></span><span id="id_read_off_datosretcliente" class="css_read_off_datosretcliente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_datosretcliente; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_datosretcliente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="datosretcliente" id="id_sc_field_datosretcliente" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $datosretcliente; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_datosretcliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_datosretcliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valoresretcliente']))
    {
        $this->nm_new_label['valoresretcliente'] = "Valores Ret Cliente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valoresretcliente = $this->valoresretcliente;
   $sStyleHidden_valoresretcliente = '';
   if (isset($this->nmgp_cmp_hidden['valoresretcliente']) && $this->nmgp_cmp_hidden['valoresretcliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valoresretcliente']);
       $sStyleHidden_valoresretcliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valoresretcliente = 'display: none;';
   $sStyleReadInp_valoresretcliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valoresretcliente']) && $this->nmgp_cmp_readonly['valoresretcliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valoresretcliente']);
       $sStyleReadLab_valoresretcliente = '';
       $sStyleReadInp_valoresretcliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valoresretcliente']) && $this->nmgp_cmp_hidden['valoresretcliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valoresretcliente" value="<?php echo $this->form_encode_input($valoresretcliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valoresretcliente_label" id="hidden_field_label_valoresretcliente" style="<?php echo $sStyleHidden_valoresretcliente; ?>"><span id="id_label_valoresretcliente"><?php echo $this->nm_new_label['valoresretcliente']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['valoresretcliente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['valoresretcliente'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_valoresretcliente_line" id="hidden_field_data_valoresretcliente" style="<?php echo $sStyleHidden_valoresretcliente; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valoresretcliente_line" style="vertical-align: top;padding: 0px">
<?php
$valoresretcliente_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($valoresretcliente));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valoresretcliente"]) &&  $this->nmgp_cmp_readonly["valoresretcliente"] == "on") { 

 ?>
<input type="hidden" name="valoresretcliente" value="<?php echo $this->form_encode_input($valoresretcliente) . "\">" . $valoresretcliente_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_valoresretcliente" class="sc-ui-readonly-valoresretcliente css_valoresretcliente_line" style="<?php echo $sStyleReadLab_valoresretcliente; ?>"><?php echo $this->form_format_readonly("valoresretcliente", $this->form_encode_input($valoresretcliente_val)); ?></span><span id="id_read_off_valoresretcliente" class="css_read_off_valoresretcliente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valoresretcliente; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_valoresretcliente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="valoresretcliente" id="id_sc_field_valoresretcliente" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $valoresretcliente; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valoresretcliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valoresretcliente_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['beneficiario43']))
    {
        $this->nm_new_label['beneficiario43'] = "Beneficiario 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $beneficiario43 = $this->beneficiario43;
   $sStyleHidden_beneficiario43 = '';
   if (isset($this->nmgp_cmp_hidden['beneficiario43']) && $this->nmgp_cmp_hidden['beneficiario43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['beneficiario43']);
       $sStyleHidden_beneficiario43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_beneficiario43 = 'display: none;';
   $sStyleReadInp_beneficiario43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['beneficiario43']) && $this->nmgp_cmp_readonly['beneficiario43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['beneficiario43']);
       $sStyleReadLab_beneficiario43 = '';
       $sStyleReadInp_beneficiario43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['beneficiario43']) && $this->nmgp_cmp_hidden['beneficiario43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="beneficiario43" value="<?php echo $this->form_encode_input($beneficiario43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_beneficiario43_label" id="hidden_field_label_beneficiario43" style="<?php echo $sStyleHidden_beneficiario43; ?>"><span id="id_label_beneficiario43"><?php echo $this->nm_new_label['beneficiario43']; ?></span></TD>
    <TD class="scFormDataOdd css_beneficiario43_line" id="hidden_field_data_beneficiario43" style="<?php echo $sStyleHidden_beneficiario43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_beneficiario43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["beneficiario43"]) &&  $this->nmgp_cmp_readonly["beneficiario43"] == "on") { 

 ?>
<input type="hidden" name="beneficiario43" value="<?php echo $this->form_encode_input($beneficiario43) . "\">" . $beneficiario43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_beneficiario43" class="sc-ui-readonly-beneficiario43 css_beneficiario43_line" style="<?php echo $sStyleReadLab_beneficiario43; ?>"><?php echo $this->form_format_readonly("beneficiario43", $this->form_encode_input($this->beneficiario43)); ?></span><span id="id_read_off_beneficiario43" class="css_read_off_beneficiario43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_beneficiario43; ?>">
 <input class="sc-js-input scFormObjectOdd css_beneficiario43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_beneficiario43" type=text name="beneficiario43" value="<?php echo $this->form_encode_input($beneficiario43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_beneficiario43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_beneficiario43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero_cuenta']))
    {
        $this->nm_new_label['numero_cuenta'] = "Numero Cuenta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_cuenta = $this->numero_cuenta;
   $sStyleHidden_numero_cuenta = '';
   if (isset($this->nmgp_cmp_hidden['numero_cuenta']) && $this->nmgp_cmp_hidden['numero_cuenta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_cuenta']);
       $sStyleHidden_numero_cuenta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_cuenta = 'display: none;';
   $sStyleReadInp_numero_cuenta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_cuenta']) && $this->nmgp_cmp_readonly['numero_cuenta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_cuenta']);
       $sStyleReadLab_numero_cuenta = '';
       $sStyleReadInp_numero_cuenta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_cuenta']) && $this->nmgp_cmp_hidden['numero_cuenta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_cuenta" value="<?php echo $this->form_encode_input($numero_cuenta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numero_cuenta_label" id="hidden_field_label_numero_cuenta" style="<?php echo $sStyleHidden_numero_cuenta; ?>"><span id="id_label_numero_cuenta"><?php echo $this->nm_new_label['numero_cuenta']; ?></span></TD>
    <TD class="scFormDataOdd css_numero_cuenta_line" id="hidden_field_data_numero_cuenta" style="<?php echo $sStyleHidden_numero_cuenta; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_cuenta_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_cuenta"]) &&  $this->nmgp_cmp_readonly["numero_cuenta"] == "on") { 

 ?>
<input type="hidden" name="numero_cuenta" value="<?php echo $this->form_encode_input($numero_cuenta) . "\">" . $numero_cuenta . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_cuenta" class="sc-ui-readonly-numero_cuenta css_numero_cuenta_line" style="<?php echo $sStyleReadLab_numero_cuenta; ?>"><?php echo $this->form_format_readonly("numero_cuenta", $this->form_encode_input($this->numero_cuenta)); ?></span><span id="id_read_off_numero_cuenta" class="css_read_off_numero_cuenta<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_cuenta; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_cuenta_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numero_cuenta" type=text name="numero_cuenta" value="<?php echo $this->form_encode_input($numero_cuenta) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_cuenta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_cuenta_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha_creacion_del_65']))
    {
        $this->nm_new_label['fecha_creacion_del_65'] = "Fecha Creacion Del 65";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecha_creacion_del_65 = $this->fecha_creacion_del_65;
   if (strlen($this->fecha_creacion_del_65_hora) > 8 ) {$this->fecha_creacion_del_65_hora = substr($this->fecha_creacion_del_65_hora, 0, 8);}
   $this->fecha_creacion_del_65 .= ' ' . $this->fecha_creacion_del_65_hora;
   $this->fecha_creacion_del_65  = trim($this->fecha_creacion_del_65);
   $fecha_creacion_del_65 = $this->fecha_creacion_del_65;
   $sStyleHidden_fecha_creacion_del_65 = '';
   if (isset($this->nmgp_cmp_hidden['fecha_creacion_del_65']) && $this->nmgp_cmp_hidden['fecha_creacion_del_65'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_creacion_del_65']);
       $sStyleHidden_fecha_creacion_del_65 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_creacion_del_65 = 'display: none;';
   $sStyleReadInp_fecha_creacion_del_65 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_creacion_del_65']) && $this->nmgp_cmp_readonly['fecha_creacion_del_65'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_creacion_del_65']);
       $sStyleReadLab_fecha_creacion_del_65 = '';
       $sStyleReadInp_fecha_creacion_del_65 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_creacion_del_65']) && $this->nmgp_cmp_hidden['fecha_creacion_del_65'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_creacion_del_65" value="<?php echo $this->form_encode_input($fecha_creacion_del_65) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecha_creacion_del_65_label" id="hidden_field_label_fecha_creacion_del_65" style="<?php echo $sStyleHidden_fecha_creacion_del_65; ?>"><span id="id_label_fecha_creacion_del_65"><?php echo $this->nm_new_label['fecha_creacion_del_65']; ?></span></TD>
    <TD class="scFormDataOdd css_fecha_creacion_del_65_line" id="hidden_field_data_fecha_creacion_del_65" style="<?php echo $sStyleHidden_fecha_creacion_del_65; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_creacion_del_65_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_creacion_del_65"]) &&  $this->nmgp_cmp_readonly["fecha_creacion_del_65"] == "on") { 

 ?>
<input type="hidden" name="fecha_creacion_del_65" value="<?php echo $this->form_encode_input($fecha_creacion_del_65) . "\">" . $fecha_creacion_del_65 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_creacion_del_65" class="sc-ui-readonly-fecha_creacion_del_65 css_fecha_creacion_del_65_line" style="<?php echo $sStyleReadLab_fecha_creacion_del_65; ?>"><?php echo $this->form_format_readonly("fecha_creacion_del_65", $this->form_encode_input($fecha_creacion_del_65)); ?></span><span id="id_read_off_fecha_creacion_del_65" class="css_read_off_fecha_creacion_del_65<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_creacion_del_65; ?>"><?php
$tmp_form_data = $this->field_config['fecha_creacion_del_65']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecha_creacion_del_65_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha_creacion_del_65" type=text name="fecha_creacion_del_65" value="<?php echo $this->form_encode_input($fecha_creacion_del_65) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecha_creacion_del_65']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_creacion_del_65']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecha_creacion_del_65']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_creacion_del_65_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_creacion_del_65_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecha_creacion_del_65 = $old_dt_fecha_creacion_del_65;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['adicional']))
    {
        $this->nm_new_label['adicional'] = "Adicional";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $adicional = $this->adicional;
   $sStyleHidden_adicional = '';
   if (isset($this->nmgp_cmp_hidden['adicional']) && $this->nmgp_cmp_hidden['adicional'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['adicional']);
       $sStyleHidden_adicional = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_adicional = 'display: none;';
   $sStyleReadInp_adicional = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['adicional']) && $this->nmgp_cmp_readonly['adicional'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['adicional']);
       $sStyleReadLab_adicional = '';
       $sStyleReadInp_adicional = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['adicional']) && $this->nmgp_cmp_hidden['adicional'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="adicional" value="<?php echo $this->form_encode_input($adicional) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_adicional_label" id="hidden_field_label_adicional" style="<?php echo $sStyleHidden_adicional; ?>"><span id="id_label_adicional"><?php echo $this->nm_new_label['adicional']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['adicional']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['adicional'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_adicional_line" id="hidden_field_data_adicional" style="<?php echo $sStyleHidden_adicional; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_adicional_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["adicional"]) &&  $this->nmgp_cmp_readonly["adicional"] == "on") { 

 ?>
<input type="hidden" name="adicional" value="<?php echo $this->form_encode_input($adicional) . "\">" . $adicional . ""; ?>
<?php } else { ?>
<span id="id_read_on_adicional" class="sc-ui-readonly-adicional css_adicional_line" style="<?php echo $sStyleReadLab_adicional; ?>"><?php echo $this->form_format_readonly("adicional", $this->form_encode_input($this->adicional)); ?></span><span id="id_read_off_adicional" class="css_read_off_adicional<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_adicional; ?>">
 <input class="sc-js-input scFormObjectOdd css_adicional_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_adicional" type=text name="adicional" value="<?php echo $this->form_encode_input($adicional) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_adicional_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_adicional_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecha_adicional']))
    {
        $this->nm_new_label['fecha_adicional'] = "Fecha Adicional";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecha_adicional = $this->fecha_adicional;
   $sStyleHidden_fecha_adicional = '';
   if (isset($this->nmgp_cmp_hidden['fecha_adicional']) && $this->nmgp_cmp_hidden['fecha_adicional'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecha_adicional']);
       $sStyleHidden_fecha_adicional = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecha_adicional = 'display: none;';
   $sStyleReadInp_fecha_adicional = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecha_adicional']) && $this->nmgp_cmp_readonly['fecha_adicional'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecha_adicional']);
       $sStyleReadLab_fecha_adicional = '';
       $sStyleReadInp_fecha_adicional = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecha_adicional']) && $this->nmgp_cmp_hidden['fecha_adicional'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecha_adicional" value="<?php echo $this->form_encode_input($fecha_adicional) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecha_adicional_label" id="hidden_field_label_fecha_adicional" style="<?php echo $sStyleHidden_fecha_adicional; ?>"><span id="id_label_fecha_adicional"><?php echo $this->nm_new_label['fecha_adicional']; ?></span></TD>
    <TD class="scFormDataOdd css_fecha_adicional_line" id="hidden_field_data_fecha_adicional" style="<?php echo $sStyleHidden_fecha_adicional; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecha_adicional_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecha_adicional"]) &&  $this->nmgp_cmp_readonly["fecha_adicional"] == "on") { 

 ?>
<input type="hidden" name="fecha_adicional" value="<?php echo $this->form_encode_input($fecha_adicional) . "\">" . $fecha_adicional . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecha_adicional" class="sc-ui-readonly-fecha_adicional css_fecha_adicional_line" style="<?php echo $sStyleReadLab_fecha_adicional; ?>"><?php echo $this->form_format_readonly("fecha_adicional", $this->form_encode_input($fecha_adicional)); ?></span><span id="id_read_off_fecha_adicional" class="css_read_off_fecha_adicional<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecha_adicional; ?>"><?php
$tmp_form_data = $this->field_config['fecha_adicional']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecha_adicional_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecha_adicional" type=text name="fecha_adicional" value="<?php echo $this->form_encode_input($fecha_adicional) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecha_adicional']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecha_adicional']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecha_adicional_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecha_adicional_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_cotizacion']))
    {
        $this->nm_new_label['id_cotizacion'] = "Id Cotizacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_cotizacion = $this->id_cotizacion;
   $sStyleHidden_id_cotizacion = '';
   if (isset($this->nmgp_cmp_hidden['id_cotizacion']) && $this->nmgp_cmp_hidden['id_cotizacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_cotizacion']);
       $sStyleHidden_id_cotizacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_cotizacion = 'display: none;';
   $sStyleReadInp_id_cotizacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_cotizacion']) && $this->nmgp_cmp_readonly['id_cotizacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_cotizacion']);
       $sStyleReadLab_id_cotizacion = '';
       $sStyleReadInp_id_cotizacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_cotizacion']) && $this->nmgp_cmp_hidden['id_cotizacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_cotizacion" value="<?php echo $this->form_encode_input($id_cotizacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_cotizacion_label" id="hidden_field_label_id_cotizacion" style="<?php echo $sStyleHidden_id_cotizacion; ?>"><span id="id_label_id_cotizacion"><?php echo $this->nm_new_label['id_cotizacion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['id_cotizacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['id_cotizacion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_id_cotizacion_line" id="hidden_field_data_id_cotizacion" style="<?php echo $sStyleHidden_id_cotizacion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_cotizacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_cotizacion"]) &&  $this->nmgp_cmp_readonly["id_cotizacion"] == "on") { 

 ?>
<input type="hidden" name="id_cotizacion" value="<?php echo $this->form_encode_input($id_cotizacion) . "\">" . $id_cotizacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_cotizacion" class="sc-ui-readonly-id_cotizacion css_id_cotizacion_line" style="<?php echo $sStyleReadLab_id_cotizacion; ?>"><?php echo $this->form_format_readonly("id_cotizacion", $this->form_encode_input($this->id_cotizacion)); ?></span><span id="id_read_off_id_cotizacion" class="css_read_off_id_cotizacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_cotizacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_cotizacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_id_cotizacion" type=text name="id_cotizacion" value="<?php echo $this->form_encode_input($id_cotizacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_cotizacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_cotizacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_cuotas_tabla_pagos']))
    {
        $this->nm_new_label['id_cuotas_tabla_pagos'] = "Id Cuotas Tabla Pagos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_cuotas_tabla_pagos = $this->id_cuotas_tabla_pagos;
   $sStyleHidden_id_cuotas_tabla_pagos = '';
   if (isset($this->nmgp_cmp_hidden['id_cuotas_tabla_pagos']) && $this->nmgp_cmp_hidden['id_cuotas_tabla_pagos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_cuotas_tabla_pagos']);
       $sStyleHidden_id_cuotas_tabla_pagos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_cuotas_tabla_pagos = 'display: none;';
   $sStyleReadInp_id_cuotas_tabla_pagos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_cuotas_tabla_pagos']) && $this->nmgp_cmp_readonly['id_cuotas_tabla_pagos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_cuotas_tabla_pagos']);
       $sStyleReadLab_id_cuotas_tabla_pagos = '';
       $sStyleReadInp_id_cuotas_tabla_pagos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_cuotas_tabla_pagos']) && $this->nmgp_cmp_hidden['id_cuotas_tabla_pagos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_cuotas_tabla_pagos" value="<?php echo $this->form_encode_input($id_cuotas_tabla_pagos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id_cuotas_tabla_pagos_label" id="hidden_field_label_id_cuotas_tabla_pagos" style="<?php echo $sStyleHidden_id_cuotas_tabla_pagos; ?>"><span id="id_label_id_cuotas_tabla_pagos"><?php echo $this->nm_new_label['id_cuotas_tabla_pagos']; ?></span></TD>
    <TD class="scFormDataOdd css_id_cuotas_tabla_pagos_line" id="hidden_field_data_id_cuotas_tabla_pagos" style="<?php echo $sStyleHidden_id_cuotas_tabla_pagos; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_cuotas_tabla_pagos_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_cuotas_tabla_pagos"]) &&  $this->nmgp_cmp_readonly["id_cuotas_tabla_pagos"] == "on") { 

 ?>
<input type="hidden" name="id_cuotas_tabla_pagos" value="<?php echo $this->form_encode_input($id_cuotas_tabla_pagos) . "\">" . $id_cuotas_tabla_pagos . ""; ?>
<?php } else { ?>
<span id="id_read_on_id_cuotas_tabla_pagos" class="sc-ui-readonly-id_cuotas_tabla_pagos css_id_cuotas_tabla_pagos_line" style="<?php echo $sStyleReadLab_id_cuotas_tabla_pagos; ?>"><?php echo $this->form_format_readonly("id_cuotas_tabla_pagos", $this->form_encode_input($this->id_cuotas_tabla_pagos)); ?></span><span id="id_read_off_id_cuotas_tabla_pagos" class="css_read_off_id_cuotas_tabla_pagos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_id_cuotas_tabla_pagos; ?>">
 <input class="sc-js-input scFormObjectOdd css_id_cuotas_tabla_pagos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_id_cuotas_tabla_pagos" type=text name="id_cuotas_tabla_pagos" value="<?php echo $this->form_encode_input($id_cuotas_tabla_pagos) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['id_cuotas_tabla_pagos']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['id_cuotas_tabla_pagos']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['id_cuotas_tabla_pagos']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_cuotas_tabla_pagos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_cuotas_tabla_pagos_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['institucion']))
    {
        $this->nm_new_label['institucion'] = "Institucion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $institucion = $this->institucion;
   $sStyleHidden_institucion = '';
   if (isset($this->nmgp_cmp_hidden['institucion']) && $this->nmgp_cmp_hidden['institucion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['institucion']);
       $sStyleHidden_institucion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_institucion = 'display: none;';
   $sStyleReadInp_institucion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['institucion']) && $this->nmgp_cmp_readonly['institucion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['institucion']);
       $sStyleReadLab_institucion = '';
       $sStyleReadInp_institucion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['institucion']) && $this->nmgp_cmp_hidden['institucion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="institucion" value="<?php echo $this->form_encode_input($institucion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_institucion_label" id="hidden_field_label_institucion" style="<?php echo $sStyleHidden_institucion; ?>"><span id="id_label_institucion"><?php echo $this->nm_new_label['institucion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['institucion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['institucion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_institucion_line" id="hidden_field_data_institucion" style="<?php echo $sStyleHidden_institucion; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_institucion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["institucion"]) &&  $this->nmgp_cmp_readonly["institucion"] == "on") { 

 ?>
<input type="hidden" name="institucion" value="<?php echo $this->form_encode_input($institucion) . "\">" . $institucion . ""; ?>
<?php } else { ?>
<span id="id_read_on_institucion" class="sc-ui-readonly-institucion css_institucion_line" style="<?php echo $sStyleReadLab_institucion; ?>"><?php echo $this->form_format_readonly("institucion", $this->form_encode_input($this->institucion)); ?></span><span id="id_read_off_institucion" class="css_read_off_institucion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_institucion; ?>">
 <input class="sc-js-input scFormObjectOdd css_institucion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_institucion" type=text name="institucion" value="<?php echo $this->form_encode_input($institucion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['institucion']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['institucion']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['institucion']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_institucion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_institucion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estado_electronico']))
    {
        $this->nm_new_label['estado_electronico'] = "Estado Electronico";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado_electronico = $this->estado_electronico;
   $sStyleHidden_estado_electronico = '';
   if (isset($this->nmgp_cmp_hidden['estado_electronico']) && $this->nmgp_cmp_hidden['estado_electronico'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado_electronico']);
       $sStyleHidden_estado_electronico = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado_electronico = 'display: none;';
   $sStyleReadInp_estado_electronico = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estado_electronico']) && $this->nmgp_cmp_readonly['estado_electronico'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado_electronico']);
       $sStyleReadLab_estado_electronico = '';
       $sStyleReadInp_estado_electronico = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado_electronico']) && $this->nmgp_cmp_hidden['estado_electronico'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estado_electronico" value="<?php echo $this->form_encode_input($estado_electronico) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_estado_electronico_label" id="hidden_field_label_estado_electronico" style="<?php echo $sStyleHidden_estado_electronico; ?>"><span id="id_label_estado_electronico"><?php echo $this->nm_new_label['estado_electronico']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['estado_electronico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['php_cmp_required']['estado_electronico'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_estado_electronico_line" id="hidden_field_data_estado_electronico" style="<?php echo $sStyleHidden_estado_electronico; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado_electronico_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado_electronico"]) &&  $this->nmgp_cmp_readonly["estado_electronico"] == "on") { 

 ?>
<input type="hidden" name="estado_electronico" value="<?php echo $this->form_encode_input($estado_electronico) . "\">" . $estado_electronico . ""; ?>
<?php } else { ?>
<span id="id_read_on_estado_electronico" class="sc-ui-readonly-estado_electronico css_estado_electronico_line" style="<?php echo $sStyleReadLab_estado_electronico; ?>"><?php echo $this->form_format_readonly("estado_electronico", $this->form_encode_input($this->estado_electronico)); ?></span><span id="id_read_off_estado_electronico" class="css_read_off_estado_electronico<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estado_electronico; ?>">
 <input class="sc-js-input scFormObjectOdd css_estado_electronico_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estado_electronico" type=text name="estado_electronico" value="<?php echo $this->form_encode_input($estado_electronico) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['estado_electronico']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['estado_electronico']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['estado_electronico']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_electronico_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_electronico_text"></span></td></tr></table></td></tr></table></TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['birpara'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['first'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['back'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['forward'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_movcte2");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_movcte2");
 parent.scAjaxDetailHeight("form_movcte2", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_movcte2", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_movcte2", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcte2']['buttonStatus'] = $this->nmgp_botoes;
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
