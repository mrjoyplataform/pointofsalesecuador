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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " maepro"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " maepro"); } ?></TITLE>
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
.css_read_off_fecape01 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecult01 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecvta01 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_ultimoacceso button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_maepro/form_maepro_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_maepro_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_maepro_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['link_info']['remove_border']) {
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
 include_once("form_maepro_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_maepro'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_maepro'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['fast_search'][2] : "";
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['insert'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['bcancelar'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['update'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['delete'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['codprod01']))
           {
               $this->nmgp_cmp_readonly['codprod01'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codprod01']))
    {
        $this->nm_new_label['codprod01'] = "Codprod 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codprod01 = $this->codprod01;
   $sStyleHidden_codprod01 = '';
   if (isset($this->nmgp_cmp_hidden['codprod01']) && $this->nmgp_cmp_hidden['codprod01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codprod01']);
       $sStyleHidden_codprod01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codprod01 = 'display: none;';
   $sStyleReadInp_codprod01 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["codprod01"]) &&  $this->nmgp_cmp_readonly["codprod01"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codprod01']);
       $sStyleReadLab_codprod01 = '';
       $sStyleReadInp_codprod01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codprod01']) && $this->nmgp_cmp_hidden['codprod01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codprod01" value="<?php echo $this->form_encode_input($codprod01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codprod01_label" id="hidden_field_label_codprod01" style="<?php echo $sStyleHidden_codprod01; ?>"><span id="id_label_codprod01"><?php echo $this->nm_new_label['codprod01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['codprod01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['codprod01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_codprod01_line" id="hidden_field_data_codprod01" style="<?php echo $sStyleHidden_codprod01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codprod01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["codprod01"]) &&  $this->nmgp_cmp_readonly["codprod01"] == "on")) { 

 ?>
<input type="hidden" name="codprod01" value="<?php echo $this->form_encode_input($codprod01) . "\"><span id=\"id_ajax_label_codprod01\">" . $codprod01 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_codprod01" class="sc-ui-readonly-codprod01 css_codprod01_line" style="<?php echo $sStyleReadLab_codprod01; ?>"><?php echo $this->form_format_readonly("codprod01", $this->form_encode_input($this->codprod01)); ?></span><span id="id_read_off_codprod01" class="css_read_off_codprod01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codprod01; ?>">
 <input class="sc-js-input scFormObjectOdd css_codprod01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codprod01" type=text name="codprod01" value="<?php echo $this->form_encode_input($codprod01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codprod01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codprod01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['desprod01']))
    {
        $this->nm_new_label['desprod01'] = "Desprod 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $desprod01 = $this->desprod01;
   $sStyleHidden_desprod01 = '';
   if (isset($this->nmgp_cmp_hidden['desprod01']) && $this->nmgp_cmp_hidden['desprod01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['desprod01']);
       $sStyleHidden_desprod01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_desprod01 = 'display: none;';
   $sStyleReadInp_desprod01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['desprod01']) && $this->nmgp_cmp_readonly['desprod01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['desprod01']);
       $sStyleReadLab_desprod01 = '';
       $sStyleReadInp_desprod01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['desprod01']) && $this->nmgp_cmp_hidden['desprod01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="desprod01" value="<?php echo $this->form_encode_input($desprod01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_desprod01_label" id="hidden_field_label_desprod01" style="<?php echo $sStyleHidden_desprod01; ?>"><span id="id_label_desprod01"><?php echo $this->nm_new_label['desprod01']; ?></span></TD>
    <TD class="scFormDataOdd css_desprod01_line" id="hidden_field_data_desprod01" style="<?php echo $sStyleHidden_desprod01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_desprod01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["desprod01"]) &&  $this->nmgp_cmp_readonly["desprod01"] == "on") { 

 ?>
<input type="hidden" name="desprod01" value="<?php echo $this->form_encode_input($desprod01) . "\">" . $desprod01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_desprod01" class="sc-ui-readonly-desprod01 css_desprod01_line" style="<?php echo $sStyleReadLab_desprod01; ?>"><?php echo $this->form_format_readonly("desprod01", $this->form_encode_input($this->desprod01)); ?></span><span id="id_read_off_desprod01" class="css_read_off_desprod01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_desprod01; ?>">
 <input class="sc-js-input scFormObjectOdd css_desprod01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_desprod01" type=text name="desprod01" value="<?php echo $this->form_encode_input($desprod01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_desprod01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_desprod01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cve101']))
    {
        $this->nm_new_label['cve101'] = "Cve 101";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cve101 = $this->cve101;
   $sStyleHidden_cve101 = '';
   if (isset($this->nmgp_cmp_hidden['cve101']) && $this->nmgp_cmp_hidden['cve101'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cve101']);
       $sStyleHidden_cve101 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cve101 = 'display: none;';
   $sStyleReadInp_cve101 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cve101']) && $this->nmgp_cmp_readonly['cve101'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cve101']);
       $sStyleReadLab_cve101 = '';
       $sStyleReadInp_cve101 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cve101']) && $this->nmgp_cmp_hidden['cve101'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cve101" value="<?php echo $this->form_encode_input($cve101) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cve101_label" id="hidden_field_label_cve101" style="<?php echo $sStyleHidden_cve101; ?>"><span id="id_label_cve101"><?php echo $this->nm_new_label['cve101']; ?></span></TD>
    <TD class="scFormDataOdd css_cve101_line" id="hidden_field_data_cve101" style="<?php echo $sStyleHidden_cve101; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cve101_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cve101"]) &&  $this->nmgp_cmp_readonly["cve101"] == "on") { 

 ?>
<input type="hidden" name="cve101" value="<?php echo $this->form_encode_input($cve101) . "\">" . $cve101 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cve101" class="sc-ui-readonly-cve101 css_cve101_line" style="<?php echo $sStyleReadLab_cve101; ?>"><?php echo $this->form_format_readonly("cve101", $this->form_encode_input($this->cve101)); ?></span><span id="id_read_off_cve101" class="css_read_off_cve101<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cve101; ?>">
 <input class="sc-js-input scFormObjectOdd css_cve101_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cve101" type=text name="cve101" value="<?php echo $this->form_encode_input($cve101) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cve101_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cve101_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cve201']))
    {
        $this->nm_new_label['cve201'] = "Cve 201";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cve201 = $this->cve201;
   $sStyleHidden_cve201 = '';
   if (isset($this->nmgp_cmp_hidden['cve201']) && $this->nmgp_cmp_hidden['cve201'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cve201']);
       $sStyleHidden_cve201 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cve201 = 'display: none;';
   $sStyleReadInp_cve201 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cve201']) && $this->nmgp_cmp_readonly['cve201'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cve201']);
       $sStyleReadLab_cve201 = '';
       $sStyleReadInp_cve201 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cve201']) && $this->nmgp_cmp_hidden['cve201'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cve201" value="<?php echo $this->form_encode_input($cve201) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cve201_label" id="hidden_field_label_cve201" style="<?php echo $sStyleHidden_cve201; ?>"><span id="id_label_cve201"><?php echo $this->nm_new_label['cve201']; ?></span></TD>
    <TD class="scFormDataOdd css_cve201_line" id="hidden_field_data_cve201" style="<?php echo $sStyleHidden_cve201; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cve201_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cve201"]) &&  $this->nmgp_cmp_readonly["cve201"] == "on") { 

 ?>
<input type="hidden" name="cve201" value="<?php echo $this->form_encode_input($cve201) . "\">" . $cve201 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cve201" class="sc-ui-readonly-cve201 css_cve201_line" style="<?php echo $sStyleReadLab_cve201; ?>"><?php echo $this->form_format_readonly("cve201", $this->form_encode_input($this->cve201)); ?></span><span id="id_read_off_cve201" class="css_read_off_cve201<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cve201; ?>">
 <input class="sc-js-input scFormObjectOdd css_cve201_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cve201" type=text name="cve201" value="<?php echo $this->form_encode_input($cve201) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cve201_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cve201_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['unidmed01']))
    {
        $this->nm_new_label['unidmed01'] = "Unidmed 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unidmed01 = $this->unidmed01;
   $sStyleHidden_unidmed01 = '';
   if (isset($this->nmgp_cmp_hidden['unidmed01']) && $this->nmgp_cmp_hidden['unidmed01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unidmed01']);
       $sStyleHidden_unidmed01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unidmed01 = 'display: none;';
   $sStyleReadInp_unidmed01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unidmed01']) && $this->nmgp_cmp_readonly['unidmed01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unidmed01']);
       $sStyleReadLab_unidmed01 = '';
       $sStyleReadInp_unidmed01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unidmed01']) && $this->nmgp_cmp_hidden['unidmed01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unidmed01" value="<?php echo $this->form_encode_input($unidmed01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_unidmed01_label" id="hidden_field_label_unidmed01" style="<?php echo $sStyleHidden_unidmed01; ?>"><span id="id_label_unidmed01"><?php echo $this->nm_new_label['unidmed01']; ?></span></TD>
    <TD class="scFormDataOdd css_unidmed01_line" id="hidden_field_data_unidmed01" style="<?php echo $sStyleHidden_unidmed01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unidmed01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unidmed01"]) &&  $this->nmgp_cmp_readonly["unidmed01"] == "on") { 

 ?>
<input type="hidden" name="unidmed01" value="<?php echo $this->form_encode_input($unidmed01) . "\">" . $unidmed01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_unidmed01" class="sc-ui-readonly-unidmed01 css_unidmed01_line" style="<?php echo $sStyleReadLab_unidmed01; ?>"><?php echo $this->form_format_readonly("unidmed01", $this->form_encode_input($this->unidmed01)); ?></span><span id="id_read_off_unidmed01" class="css_read_off_unidmed01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unidmed01; ?>">
 <input class="sc-js-input scFormObjectOdd css_unidmed01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unidmed01" type=text name="unidmed01" value="<?php echo $this->form_encode_input($unidmed01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidmed01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidmed01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cantmin01']))
    {
        $this->nm_new_label['cantmin01'] = "Cantmin 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantmin01 = $this->cantmin01;
   $sStyleHidden_cantmin01 = '';
   if (isset($this->nmgp_cmp_hidden['cantmin01']) && $this->nmgp_cmp_hidden['cantmin01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantmin01']);
       $sStyleHidden_cantmin01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantmin01 = 'display: none;';
   $sStyleReadInp_cantmin01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantmin01']) && $this->nmgp_cmp_readonly['cantmin01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantmin01']);
       $sStyleReadLab_cantmin01 = '';
       $sStyleReadInp_cantmin01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantmin01']) && $this->nmgp_cmp_hidden['cantmin01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantmin01" value="<?php echo $this->form_encode_input($cantmin01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cantmin01_label" id="hidden_field_label_cantmin01" style="<?php echo $sStyleHidden_cantmin01; ?>"><span id="id_label_cantmin01"><?php echo $this->nm_new_label['cantmin01']; ?></span></TD>
    <TD class="scFormDataOdd css_cantmin01_line" id="hidden_field_data_cantmin01" style="<?php echo $sStyleHidden_cantmin01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantmin01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantmin01"]) &&  $this->nmgp_cmp_readonly["cantmin01"] == "on") { 

 ?>
<input type="hidden" name="cantmin01" value="<?php echo $this->form_encode_input($cantmin01) . "\">" . $cantmin01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantmin01" class="sc-ui-readonly-cantmin01 css_cantmin01_line" style="<?php echo $sStyleReadLab_cantmin01; ?>"><?php echo $this->form_format_readonly("cantmin01", $this->form_encode_input($this->cantmin01)); ?></span><span id="id_read_off_cantmin01" class="css_read_off_cantmin01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantmin01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantmin01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantmin01" type=text name="cantmin01" value="<?php echo $this->form_encode_input($cantmin01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> alt="{datatype: 'decimal', maxLength: 13, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cantmin01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantmin01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantmin01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantmin01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantmin01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantmin01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cantact01']))
    {
        $this->nm_new_label['cantact01'] = "Cantact 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cantact01 = $this->cantact01;
   $sStyleHidden_cantact01 = '';
   if (isset($this->nmgp_cmp_hidden['cantact01']) && $this->nmgp_cmp_hidden['cantact01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cantact01']);
       $sStyleHidden_cantact01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cantact01 = 'display: none;';
   $sStyleReadInp_cantact01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cantact01']) && $this->nmgp_cmp_readonly['cantact01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cantact01']);
       $sStyleReadLab_cantact01 = '';
       $sStyleReadInp_cantact01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cantact01']) && $this->nmgp_cmp_hidden['cantact01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cantact01" value="<?php echo $this->form_encode_input($cantact01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cantact01_label" id="hidden_field_label_cantact01" style="<?php echo $sStyleHidden_cantact01; ?>"><span id="id_label_cantact01"><?php echo $this->nm_new_label['cantact01']; ?></span></TD>
    <TD class="scFormDataOdd css_cantact01_line" id="hidden_field_data_cantact01" style="<?php echo $sStyleHidden_cantact01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cantact01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cantact01"]) &&  $this->nmgp_cmp_readonly["cantact01"] == "on") { 

 ?>
<input type="hidden" name="cantact01" value="<?php echo $this->form_encode_input($cantact01) . "\">" . $cantact01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cantact01" class="sc-ui-readonly-cantact01 css_cantact01_line" style="<?php echo $sStyleReadLab_cantact01; ?>"><?php echo $this->form_format_readonly("cantact01", $this->form_encode_input($this->cantact01)); ?></span><span id="id_read_off_cantact01" class="css_read_off_cantact01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cantact01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cantact01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cantact01" type=text name="cantact01" value="<?php echo $this->form_encode_input($cantact01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> alt="{datatype: 'decimal', maxLength: 13, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cantact01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cantact01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cantact01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cantact01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cantact01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cantact01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valact01']))
    {
        $this->nm_new_label['valact01'] = "Valact 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valact01 = $this->valact01;
   $sStyleHidden_valact01 = '';
   if (isset($this->nmgp_cmp_hidden['valact01']) && $this->nmgp_cmp_hidden['valact01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valact01']);
       $sStyleHidden_valact01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valact01 = 'display: none;';
   $sStyleReadInp_valact01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valact01']) && $this->nmgp_cmp_readonly['valact01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valact01']);
       $sStyleReadLab_valact01 = '';
       $sStyleReadInp_valact01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valact01']) && $this->nmgp_cmp_hidden['valact01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valact01" value="<?php echo $this->form_encode_input($valact01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valact01_label" id="hidden_field_label_valact01" style="<?php echo $sStyleHidden_valact01; ?>"><span id="id_label_valact01"><?php echo $this->nm_new_label['valact01']; ?></span></TD>
    <TD class="scFormDataOdd css_valact01_line" id="hidden_field_data_valact01" style="<?php echo $sStyleHidden_valact01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valact01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valact01"]) &&  $this->nmgp_cmp_readonly["valact01"] == "on") { 

 ?>
<input type="hidden" name="valact01" value="<?php echo $this->form_encode_input($valact01) . "\">" . $valact01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valact01" class="sc-ui-readonly-valact01 css_valact01_line" style="<?php echo $sStyleReadLab_valact01; ?>"><?php echo $this->form_format_readonly("valact01", $this->form_encode_input($this->valact01)); ?></span><span id="id_read_off_valact01" class="css_read_off_valact01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valact01; ?>">
 <input class="sc-js-input scFormObjectOdd css_valact01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valact01" type=text name="valact01" value="<?php echo $this->form_encode_input($valact01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valact01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valact01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valact01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valact01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valact01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valact01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['exipromo01']))
    {
        $this->nm_new_label['exipromo01'] = "Exipromo 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $exipromo01 = $this->exipromo01;
   $sStyleHidden_exipromo01 = '';
   if (isset($this->nmgp_cmp_hidden['exipromo01']) && $this->nmgp_cmp_hidden['exipromo01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['exipromo01']);
       $sStyleHidden_exipromo01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_exipromo01 = 'display: none;';
   $sStyleReadInp_exipromo01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['exipromo01']) && $this->nmgp_cmp_readonly['exipromo01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['exipromo01']);
       $sStyleReadLab_exipromo01 = '';
       $sStyleReadInp_exipromo01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['exipromo01']) && $this->nmgp_cmp_hidden['exipromo01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="exipromo01" value="<?php echo $this->form_encode_input($exipromo01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_exipromo01_label" id="hidden_field_label_exipromo01" style="<?php echo $sStyleHidden_exipromo01; ?>"><span id="id_label_exipromo01"><?php echo $this->nm_new_label['exipromo01']; ?></span></TD>
    <TD class="scFormDataOdd css_exipromo01_line" id="hidden_field_data_exipromo01" style="<?php echo $sStyleHidden_exipromo01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_exipromo01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["exipromo01"]) &&  $this->nmgp_cmp_readonly["exipromo01"] == "on") { 

 ?>
<input type="hidden" name="exipromo01" value="<?php echo $this->form_encode_input($exipromo01) . "\">" . $exipromo01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_exipromo01" class="sc-ui-readonly-exipromo01 css_exipromo01_line" style="<?php echo $sStyleReadLab_exipromo01; ?>"><?php echo $this->form_format_readonly("exipromo01", $this->form_encode_input($this->exipromo01)); ?></span><span id="id_read_off_exipromo01" class="css_read_off_exipromo01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_exipromo01; ?>">
 <input class="sc-js-input scFormObjectOdd css_exipromo01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_exipromo01" type=text name="exipromo01" value="<?php echo $this->form_encode_input($exipromo01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> alt="{datatype: 'decimal', maxLength: 13, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['exipromo01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['exipromo01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['exipromo01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['exipromo01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_exipromo01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_exipromo01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precuni01']))
    {
        $this->nm_new_label['precuni01'] = "Precuni 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precuni01 = $this->precuni01;
   $sStyleHidden_precuni01 = '';
   if (isset($this->nmgp_cmp_hidden['precuni01']) && $this->nmgp_cmp_hidden['precuni01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precuni01']);
       $sStyleHidden_precuni01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precuni01 = 'display: none;';
   $sStyleReadInp_precuni01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precuni01']) && $this->nmgp_cmp_readonly['precuni01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precuni01']);
       $sStyleReadLab_precuni01 = '';
       $sStyleReadInp_precuni01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precuni01']) && $this->nmgp_cmp_hidden['precuni01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precuni01" value="<?php echo $this->form_encode_input($precuni01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precuni01_label" id="hidden_field_label_precuni01" style="<?php echo $sStyleHidden_precuni01; ?>"><span id="id_label_precuni01"><?php echo $this->nm_new_label['precuni01']; ?></span></TD>
    <TD class="scFormDataOdd css_precuni01_line" id="hidden_field_data_precuni01" style="<?php echo $sStyleHidden_precuni01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precuni01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precuni01"]) &&  $this->nmgp_cmp_readonly["precuni01"] == "on") { 

 ?>
<input type="hidden" name="precuni01" value="<?php echo $this->form_encode_input($precuni01) . "\">" . $precuni01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precuni01" class="sc-ui-readonly-precuni01 css_precuni01_line" style="<?php echo $sStyleReadLab_precuni01; ?>"><?php echo $this->form_format_readonly("precuni01", $this->form_encode_input($this->precuni01)); ?></span><span id="id_read_off_precuni01" class="css_read_off_precuni01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precuni01; ?>">
 <input class="sc-js-input scFormObjectOdd css_precuni01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precuni01" type=text name="precuni01" value="<?php echo $this->form_encode_input($precuni01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precuni01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precuni01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precuni01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precuni01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precuni01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precuni01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pedpend01']))
    {
        $this->nm_new_label['pedpend01'] = "Pedpend 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pedpend01 = $this->pedpend01;
   $sStyleHidden_pedpend01 = '';
   if (isset($this->nmgp_cmp_hidden['pedpend01']) && $this->nmgp_cmp_hidden['pedpend01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pedpend01']);
       $sStyleHidden_pedpend01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pedpend01 = 'display: none;';
   $sStyleReadInp_pedpend01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pedpend01']) && $this->nmgp_cmp_readonly['pedpend01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pedpend01']);
       $sStyleReadLab_pedpend01 = '';
       $sStyleReadInp_pedpend01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pedpend01']) && $this->nmgp_cmp_hidden['pedpend01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pedpend01" value="<?php echo $this->form_encode_input($pedpend01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pedpend01_label" id="hidden_field_label_pedpend01" style="<?php echo $sStyleHidden_pedpend01; ?>"><span id="id_label_pedpend01"><?php echo $this->nm_new_label['pedpend01']; ?></span></TD>
    <TD class="scFormDataOdd css_pedpend01_line" id="hidden_field_data_pedpend01" style="<?php echo $sStyleHidden_pedpend01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pedpend01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pedpend01"]) &&  $this->nmgp_cmp_readonly["pedpend01"] == "on") { 

 ?>
<input type="hidden" name="pedpend01" value="<?php echo $this->form_encode_input($pedpend01) . "\">" . $pedpend01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_pedpend01" class="sc-ui-readonly-pedpend01 css_pedpend01_line" style="<?php echo $sStyleReadLab_pedpend01; ?>"><?php echo $this->form_format_readonly("pedpend01", $this->form_encode_input($this->pedpend01)); ?></span><span id="id_read_off_pedpend01" class="css_read_off_pedpend01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pedpend01; ?>">
 <input class="sc-js-input scFormObjectOdd css_pedpend01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pedpend01" type=text name="pedpend01" value="<?php echo $this->form_encode_input($pedpend01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> alt="{datatype: 'decimal', maxLength: 13, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['pedpend01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pedpend01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pedpend01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['pedpend01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pedpend01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pedpend01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['orden01']))
    {
        $this->nm_new_label['orden01'] = "Orden 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $orden01 = $this->orden01;
   $sStyleHidden_orden01 = '';
   if (isset($this->nmgp_cmp_hidden['orden01']) && $this->nmgp_cmp_hidden['orden01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['orden01']);
       $sStyleHidden_orden01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_orden01 = 'display: none;';
   $sStyleReadInp_orden01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['orden01']) && $this->nmgp_cmp_readonly['orden01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['orden01']);
       $sStyleReadLab_orden01 = '';
       $sStyleReadInp_orden01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['orden01']) && $this->nmgp_cmp_hidden['orden01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="orden01" value="<?php echo $this->form_encode_input($orden01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_orden01_label" id="hidden_field_label_orden01" style="<?php echo $sStyleHidden_orden01; ?>"><span id="id_label_orden01"><?php echo $this->nm_new_label['orden01']; ?></span></TD>
    <TD class="scFormDataOdd css_orden01_line" id="hidden_field_data_orden01" style="<?php echo $sStyleHidden_orden01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_orden01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["orden01"]) &&  $this->nmgp_cmp_readonly["orden01"] == "on") { 

 ?>
<input type="hidden" name="orden01" value="<?php echo $this->form_encode_input($orden01) . "\">" . $orden01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_orden01" class="sc-ui-readonly-orden01 css_orden01_line" style="<?php echo $sStyleReadLab_orden01; ?>"><?php echo $this->form_format_readonly("orden01", $this->form_encode_input($this->orden01)); ?></span><span id="id_read_off_orden01" class="css_read_off_orden01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_orden01; ?>">
 <input class="sc-js-input scFormObjectOdd css_orden01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_orden01" type=text name="orden01" value="<?php echo $this->form_encode_input($orden01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_orden01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_orden01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['refer01']))
    {
        $this->nm_new_label['refer01'] = "Refer 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $refer01 = $this->refer01;
   $sStyleHidden_refer01 = '';
   if (isset($this->nmgp_cmp_hidden['refer01']) && $this->nmgp_cmp_hidden['refer01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['refer01']);
       $sStyleHidden_refer01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_refer01 = 'display: none;';
   $sStyleReadInp_refer01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['refer01']) && $this->nmgp_cmp_readonly['refer01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['refer01']);
       $sStyleReadLab_refer01 = '';
       $sStyleReadInp_refer01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['refer01']) && $this->nmgp_cmp_hidden['refer01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="refer01" value="<?php echo $this->form_encode_input($refer01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_refer01_label" id="hidden_field_label_refer01" style="<?php echo $sStyleHidden_refer01; ?>"><span id="id_label_refer01"><?php echo $this->nm_new_label['refer01']; ?></span></TD>
    <TD class="scFormDataOdd css_refer01_line" id="hidden_field_data_refer01" style="<?php echo $sStyleHidden_refer01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_refer01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["refer01"]) &&  $this->nmgp_cmp_readonly["refer01"] == "on") { 

 ?>
<input type="hidden" name="refer01" value="<?php echo $this->form_encode_input($refer01) . "\">" . $refer01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_refer01" class="sc-ui-readonly-refer01 css_refer01_line" style="<?php echo $sStyleReadLab_refer01; ?>"><?php echo $this->form_format_readonly("refer01", $this->form_encode_input($this->refer01)); ?></span><span id="id_read_off_refer01" class="css_read_off_refer01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_refer01; ?>">
 <input class="sc-js-input scFormObjectOdd css_refer01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_refer01" type=text name="refer01" value="<?php echo $this->form_encode_input($refer01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=80 alt="{datatype: 'text', maxLength: 80, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_refer01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_refer01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['canentm01']))
    {
        $this->nm_new_label['canentm01'] = "Canentm 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $canentm01 = $this->canentm01;
   $sStyleHidden_canentm01 = '';
   if (isset($this->nmgp_cmp_hidden['canentm01']) && $this->nmgp_cmp_hidden['canentm01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['canentm01']);
       $sStyleHidden_canentm01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_canentm01 = 'display: none;';
   $sStyleReadInp_canentm01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['canentm01']) && $this->nmgp_cmp_readonly['canentm01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['canentm01']);
       $sStyleReadLab_canentm01 = '';
       $sStyleReadInp_canentm01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['canentm01']) && $this->nmgp_cmp_hidden['canentm01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="canentm01" value="<?php echo $this->form_encode_input($canentm01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_canentm01_label" id="hidden_field_label_canentm01" style="<?php echo $sStyleHidden_canentm01; ?>"><span id="id_label_canentm01"><?php echo $this->nm_new_label['canentm01']; ?></span></TD>
    <TD class="scFormDataOdd css_canentm01_line" id="hidden_field_data_canentm01" style="<?php echo $sStyleHidden_canentm01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_canentm01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["canentm01"]) &&  $this->nmgp_cmp_readonly["canentm01"] == "on") { 

 ?>
<input type="hidden" name="canentm01" value="<?php echo $this->form_encode_input($canentm01) . "\">" . $canentm01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_canentm01" class="sc-ui-readonly-canentm01 css_canentm01_line" style="<?php echo $sStyleReadLab_canentm01; ?>"><?php echo $this->form_format_readonly("canentm01", $this->form_encode_input($this->canentm01)); ?></span><span id="id_read_off_canentm01" class="css_read_off_canentm01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_canentm01; ?>">
 <input class="sc-js-input scFormObjectOdd css_canentm01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_canentm01" type=text name="canentm01" value="<?php echo $this->form_encode_input($canentm01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> alt="{datatype: 'decimal', maxLength: 13, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['canentm01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['canentm01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['canentm01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['canentm01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_canentm01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_canentm01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valentm01']))
    {
        $this->nm_new_label['valentm01'] = "Valentm 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valentm01 = $this->valentm01;
   $sStyleHidden_valentm01 = '';
   if (isset($this->nmgp_cmp_hidden['valentm01']) && $this->nmgp_cmp_hidden['valentm01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valentm01']);
       $sStyleHidden_valentm01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valentm01 = 'display: none;';
   $sStyleReadInp_valentm01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valentm01']) && $this->nmgp_cmp_readonly['valentm01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valentm01']);
       $sStyleReadLab_valentm01 = '';
       $sStyleReadInp_valentm01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valentm01']) && $this->nmgp_cmp_hidden['valentm01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valentm01" value="<?php echo $this->form_encode_input($valentm01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valentm01_label" id="hidden_field_label_valentm01" style="<?php echo $sStyleHidden_valentm01; ?>"><span id="id_label_valentm01"><?php echo $this->nm_new_label['valentm01']; ?></span></TD>
    <TD class="scFormDataOdd css_valentm01_line" id="hidden_field_data_valentm01" style="<?php echo $sStyleHidden_valentm01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valentm01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valentm01"]) &&  $this->nmgp_cmp_readonly["valentm01"] == "on") { 

 ?>
<input type="hidden" name="valentm01" value="<?php echo $this->form_encode_input($valentm01) . "\">" . $valentm01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valentm01" class="sc-ui-readonly-valentm01 css_valentm01_line" style="<?php echo $sStyleReadLab_valentm01; ?>"><?php echo $this->form_format_readonly("valentm01", $this->form_encode_input($this->valentm01)); ?></span><span id="id_read_off_valentm01" class="css_read_off_valentm01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valentm01; ?>">
 <input class="sc-js-input scFormObjectOdd css_valentm01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valentm01" type=text name="valentm01" value="<?php echo $this->form_encode_input($valentm01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valentm01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valentm01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valentm01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valentm01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valentm01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valentm01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cansalm01']))
    {
        $this->nm_new_label['cansalm01'] = "Cansalm 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cansalm01 = $this->cansalm01;
   $sStyleHidden_cansalm01 = '';
   if (isset($this->nmgp_cmp_hidden['cansalm01']) && $this->nmgp_cmp_hidden['cansalm01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cansalm01']);
       $sStyleHidden_cansalm01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cansalm01 = 'display: none;';
   $sStyleReadInp_cansalm01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cansalm01']) && $this->nmgp_cmp_readonly['cansalm01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cansalm01']);
       $sStyleReadLab_cansalm01 = '';
       $sStyleReadInp_cansalm01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cansalm01']) && $this->nmgp_cmp_hidden['cansalm01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cansalm01" value="<?php echo $this->form_encode_input($cansalm01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cansalm01_label" id="hidden_field_label_cansalm01" style="<?php echo $sStyleHidden_cansalm01; ?>"><span id="id_label_cansalm01"><?php echo $this->nm_new_label['cansalm01']; ?></span></TD>
    <TD class="scFormDataOdd css_cansalm01_line" id="hidden_field_data_cansalm01" style="<?php echo $sStyleHidden_cansalm01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cansalm01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cansalm01"]) &&  $this->nmgp_cmp_readonly["cansalm01"] == "on") { 

 ?>
<input type="hidden" name="cansalm01" value="<?php echo $this->form_encode_input($cansalm01) . "\">" . $cansalm01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cansalm01" class="sc-ui-readonly-cansalm01 css_cansalm01_line" style="<?php echo $sStyleReadLab_cansalm01; ?>"><?php echo $this->form_format_readonly("cansalm01", $this->form_encode_input($this->cansalm01)); ?></span><span id="id_read_off_cansalm01" class="css_read_off_cansalm01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cansalm01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cansalm01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cansalm01" type=text name="cansalm01" value="<?php echo $this->form_encode_input($cansalm01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> alt="{datatype: 'decimal', maxLength: 13, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cansalm01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cansalm01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cansalm01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cansalm01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cansalm01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cansalm01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valsalm01']))
    {
        $this->nm_new_label['valsalm01'] = "Valsalm 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valsalm01 = $this->valsalm01;
   $sStyleHidden_valsalm01 = '';
   if (isset($this->nmgp_cmp_hidden['valsalm01']) && $this->nmgp_cmp_hidden['valsalm01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valsalm01']);
       $sStyleHidden_valsalm01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valsalm01 = 'display: none;';
   $sStyleReadInp_valsalm01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valsalm01']) && $this->nmgp_cmp_readonly['valsalm01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valsalm01']);
       $sStyleReadLab_valsalm01 = '';
       $sStyleReadInp_valsalm01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valsalm01']) && $this->nmgp_cmp_hidden['valsalm01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valsalm01" value="<?php echo $this->form_encode_input($valsalm01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valsalm01_label" id="hidden_field_label_valsalm01" style="<?php echo $sStyleHidden_valsalm01; ?>"><span id="id_label_valsalm01"><?php echo $this->nm_new_label['valsalm01']; ?></span></TD>
    <TD class="scFormDataOdd css_valsalm01_line" id="hidden_field_data_valsalm01" style="<?php echo $sStyleHidden_valsalm01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valsalm01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valsalm01"]) &&  $this->nmgp_cmp_readonly["valsalm01"] == "on") { 

 ?>
<input type="hidden" name="valsalm01" value="<?php echo $this->form_encode_input($valsalm01) . "\">" . $valsalm01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valsalm01" class="sc-ui-readonly-valsalm01 css_valsalm01_line" style="<?php echo $sStyleReadLab_valsalm01; ?>"><?php echo $this->form_format_readonly("valsalm01", $this->form_encode_input($this->valsalm01)); ?></span><span id="id_read_off_valsalm01" class="css_read_off_valsalm01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valsalm01; ?>">
 <input class="sc-js-input scFormObjectOdd css_valsalm01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valsalm01" type=text name="valsalm01" value="<?php echo $this->form_encode_input($valsalm01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valsalm01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valsalm01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valsalm01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valsalm01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valsalm01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valsalm01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['canenta01']))
    {
        $this->nm_new_label['canenta01'] = "Canenta 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $canenta01 = $this->canenta01;
   $sStyleHidden_canenta01 = '';
   if (isset($this->nmgp_cmp_hidden['canenta01']) && $this->nmgp_cmp_hidden['canenta01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['canenta01']);
       $sStyleHidden_canenta01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_canenta01 = 'display: none;';
   $sStyleReadInp_canenta01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['canenta01']) && $this->nmgp_cmp_readonly['canenta01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['canenta01']);
       $sStyleReadLab_canenta01 = '';
       $sStyleReadInp_canenta01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['canenta01']) && $this->nmgp_cmp_hidden['canenta01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="canenta01" value="<?php echo $this->form_encode_input($canenta01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_canenta01_label" id="hidden_field_label_canenta01" style="<?php echo $sStyleHidden_canenta01; ?>"><span id="id_label_canenta01"><?php echo $this->nm_new_label['canenta01']; ?></span></TD>
    <TD class="scFormDataOdd css_canenta01_line" id="hidden_field_data_canenta01" style="<?php echo $sStyleHidden_canenta01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_canenta01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["canenta01"]) &&  $this->nmgp_cmp_readonly["canenta01"] == "on") { 

 ?>
<input type="hidden" name="canenta01" value="<?php echo $this->form_encode_input($canenta01) . "\">" . $canenta01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_canenta01" class="sc-ui-readonly-canenta01 css_canenta01_line" style="<?php echo $sStyleReadLab_canenta01; ?>"><?php echo $this->form_format_readonly("canenta01", $this->form_encode_input($this->canenta01)); ?></span><span id="id_read_off_canenta01" class="css_read_off_canenta01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_canenta01; ?>">
 <input class="sc-js-input scFormObjectOdd css_canenta01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_canenta01" type=text name="canenta01" value="<?php echo $this->form_encode_input($canenta01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> alt="{datatype: 'decimal', maxLength: 13, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['canenta01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['canenta01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['canenta01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['canenta01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_canenta01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_canenta01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valenta01']))
    {
        $this->nm_new_label['valenta01'] = "Valenta 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valenta01 = $this->valenta01;
   $sStyleHidden_valenta01 = '';
   if (isset($this->nmgp_cmp_hidden['valenta01']) && $this->nmgp_cmp_hidden['valenta01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valenta01']);
       $sStyleHidden_valenta01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valenta01 = 'display: none;';
   $sStyleReadInp_valenta01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valenta01']) && $this->nmgp_cmp_readonly['valenta01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valenta01']);
       $sStyleReadLab_valenta01 = '';
       $sStyleReadInp_valenta01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valenta01']) && $this->nmgp_cmp_hidden['valenta01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valenta01" value="<?php echo $this->form_encode_input($valenta01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valenta01_label" id="hidden_field_label_valenta01" style="<?php echo $sStyleHidden_valenta01; ?>"><span id="id_label_valenta01"><?php echo $this->nm_new_label['valenta01']; ?></span></TD>
    <TD class="scFormDataOdd css_valenta01_line" id="hidden_field_data_valenta01" style="<?php echo $sStyleHidden_valenta01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valenta01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valenta01"]) &&  $this->nmgp_cmp_readonly["valenta01"] == "on") { 

 ?>
<input type="hidden" name="valenta01" value="<?php echo $this->form_encode_input($valenta01) . "\">" . $valenta01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valenta01" class="sc-ui-readonly-valenta01 css_valenta01_line" style="<?php echo $sStyleReadLab_valenta01; ?>"><?php echo $this->form_format_readonly("valenta01", $this->form_encode_input($this->valenta01)); ?></span><span id="id_read_off_valenta01" class="css_read_off_valenta01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valenta01; ?>">
 <input class="sc-js-input scFormObjectOdd css_valenta01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valenta01" type=text name="valenta01" value="<?php echo $this->form_encode_input($valenta01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valenta01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valenta01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valenta01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valenta01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valenta01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valenta01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cansala01']))
    {
        $this->nm_new_label['cansala01'] = "Cansala 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cansala01 = $this->cansala01;
   $sStyleHidden_cansala01 = '';
   if (isset($this->nmgp_cmp_hidden['cansala01']) && $this->nmgp_cmp_hidden['cansala01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cansala01']);
       $sStyleHidden_cansala01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cansala01 = 'display: none;';
   $sStyleReadInp_cansala01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cansala01']) && $this->nmgp_cmp_readonly['cansala01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cansala01']);
       $sStyleReadLab_cansala01 = '';
       $sStyleReadInp_cansala01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cansala01']) && $this->nmgp_cmp_hidden['cansala01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cansala01" value="<?php echo $this->form_encode_input($cansala01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cansala01_label" id="hidden_field_label_cansala01" style="<?php echo $sStyleHidden_cansala01; ?>"><span id="id_label_cansala01"><?php echo $this->nm_new_label['cansala01']; ?></span></TD>
    <TD class="scFormDataOdd css_cansala01_line" id="hidden_field_data_cansala01" style="<?php echo $sStyleHidden_cansala01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cansala01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cansala01"]) &&  $this->nmgp_cmp_readonly["cansala01"] == "on") { 

 ?>
<input type="hidden" name="cansala01" value="<?php echo $this->form_encode_input($cansala01) . "\">" . $cansala01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cansala01" class="sc-ui-readonly-cansala01 css_cansala01_line" style="<?php echo $sStyleReadLab_cansala01; ?>"><?php echo $this->form_format_readonly("cansala01", $this->form_encode_input($this->cansala01)); ?></span><span id="id_read_off_cansala01" class="css_read_off_cansala01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cansala01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cansala01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cansala01" type=text name="cansala01" value="<?php echo $this->form_encode_input($cansala01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> alt="{datatype: 'decimal', maxLength: 13, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cansala01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cansala01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cansala01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cansala01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cansala01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cansala01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valsala01']))
    {
        $this->nm_new_label['valsala01'] = "Valsala 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valsala01 = $this->valsala01;
   $sStyleHidden_valsala01 = '';
   if (isset($this->nmgp_cmp_hidden['valsala01']) && $this->nmgp_cmp_hidden['valsala01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valsala01']);
       $sStyleHidden_valsala01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valsala01 = 'display: none;';
   $sStyleReadInp_valsala01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valsala01']) && $this->nmgp_cmp_readonly['valsala01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valsala01']);
       $sStyleReadLab_valsala01 = '';
       $sStyleReadInp_valsala01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valsala01']) && $this->nmgp_cmp_hidden['valsala01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valsala01" value="<?php echo $this->form_encode_input($valsala01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valsala01_label" id="hidden_field_label_valsala01" style="<?php echo $sStyleHidden_valsala01; ?>"><span id="id_label_valsala01"><?php echo $this->nm_new_label['valsala01']; ?></span></TD>
    <TD class="scFormDataOdd css_valsala01_line" id="hidden_field_data_valsala01" style="<?php echo $sStyleHidden_valsala01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valsala01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valsala01"]) &&  $this->nmgp_cmp_readonly["valsala01"] == "on") { 

 ?>
<input type="hidden" name="valsala01" value="<?php echo $this->form_encode_input($valsala01) . "\">" . $valsala01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valsala01" class="sc-ui-readonly-valsala01 css_valsala01_line" style="<?php echo $sStyleReadLab_valsala01; ?>"><?php echo $this->form_format_readonly("valsala01", $this->form_encode_input($this->valsala01)); ?></span><span id="id_read_off_valsala01" class="css_read_off_valsala01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valsala01; ?>">
 <input class="sc-js-input scFormObjectOdd css_valsala01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valsala01" type=text name="valsala01" value="<?php echo $this->form_encode_input($valsala01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valsala01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valsala01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valsala01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valsala01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valsala01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valsala01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecape01']))
    {
        $this->nm_new_label['fecape01'] = "Fecape 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecape01 = $this->fecape01;
   if (strlen($this->fecape01_hora) > 8 ) {$this->fecape01_hora = substr($this->fecape01_hora, 0, 8);}
   $this->fecape01 .= ' ' . $this->fecape01_hora;
   $this->fecape01  = trim($this->fecape01);
   $fecape01 = $this->fecape01;
   $sStyleHidden_fecape01 = '';
   if (isset($this->nmgp_cmp_hidden['fecape01']) && $this->nmgp_cmp_hidden['fecape01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecape01']);
       $sStyleHidden_fecape01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecape01 = 'display: none;';
   $sStyleReadInp_fecape01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecape01']) && $this->nmgp_cmp_readonly['fecape01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecape01']);
       $sStyleReadLab_fecape01 = '';
       $sStyleReadInp_fecape01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecape01']) && $this->nmgp_cmp_hidden['fecape01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecape01" value="<?php echo $this->form_encode_input($fecape01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecape01_label" id="hidden_field_label_fecape01" style="<?php echo $sStyleHidden_fecape01; ?>"><span id="id_label_fecape01"><?php echo $this->nm_new_label['fecape01']; ?></span></TD>
    <TD class="scFormDataOdd css_fecape01_line" id="hidden_field_data_fecape01" style="<?php echo $sStyleHidden_fecape01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecape01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecape01"]) &&  $this->nmgp_cmp_readonly["fecape01"] == "on") { 

 ?>
<input type="hidden" name="fecape01" value="<?php echo $this->form_encode_input($fecape01) . "\">" . $fecape01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecape01" class="sc-ui-readonly-fecape01 css_fecape01_line" style="<?php echo $sStyleReadLab_fecape01; ?>"><?php echo $this->form_format_readonly("fecape01", $this->form_encode_input($fecape01)); ?></span><span id="id_read_off_fecape01" class="css_read_off_fecape01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecape01; ?>"><?php
$tmp_form_data = $this->field_config['fecape01']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecape01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecape01" type=text name="fecape01" value="<?php echo $this->form_encode_input($fecape01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecape01']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecape01']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecape01']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecape01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecape01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecape01 = $old_dt_fecape01;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecult01']))
    {
        $this->nm_new_label['fecult01'] = "Fecult 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecult01 = $this->fecult01;
   if (strlen($this->fecult01_hora) > 8 ) {$this->fecult01_hora = substr($this->fecult01_hora, 0, 8);}
   $this->fecult01 .= ' ' . $this->fecult01_hora;
   $this->fecult01  = trim($this->fecult01);
   $fecult01 = $this->fecult01;
   $sStyleHidden_fecult01 = '';
   if (isset($this->nmgp_cmp_hidden['fecult01']) && $this->nmgp_cmp_hidden['fecult01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecult01']);
       $sStyleHidden_fecult01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecult01 = 'display: none;';
   $sStyleReadInp_fecult01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecult01']) && $this->nmgp_cmp_readonly['fecult01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecult01']);
       $sStyleReadLab_fecult01 = '';
       $sStyleReadInp_fecult01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecult01']) && $this->nmgp_cmp_hidden['fecult01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecult01" value="<?php echo $this->form_encode_input($fecult01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecult01_label" id="hidden_field_label_fecult01" style="<?php echo $sStyleHidden_fecult01; ?>"><span id="id_label_fecult01"><?php echo $this->nm_new_label['fecult01']; ?></span></TD>
    <TD class="scFormDataOdd css_fecult01_line" id="hidden_field_data_fecult01" style="<?php echo $sStyleHidden_fecult01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecult01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecult01"]) &&  $this->nmgp_cmp_readonly["fecult01"] == "on") { 

 ?>
<input type="hidden" name="fecult01" value="<?php echo $this->form_encode_input($fecult01) . "\">" . $fecult01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecult01" class="sc-ui-readonly-fecult01 css_fecult01_line" style="<?php echo $sStyleReadLab_fecult01; ?>"><?php echo $this->form_format_readonly("fecult01", $this->form_encode_input($fecult01)); ?></span><span id="id_read_off_fecult01" class="css_read_off_fecult01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecult01; ?>"><?php
$tmp_form_data = $this->field_config['fecult01']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecult01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecult01" type=text name="fecult01" value="<?php echo $this->form_encode_input($fecult01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecult01']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecult01']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecult01']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecult01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecult01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecult01 = $old_dt_fecult01;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecvta01']))
    {
        $this->nm_new_label['fecvta01'] = "Fecvta 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecvta01 = $this->fecvta01;
   if (strlen($this->fecvta01_hora) > 8 ) {$this->fecvta01_hora = substr($this->fecvta01_hora, 0, 8);}
   $this->fecvta01 .= ' ' . $this->fecvta01_hora;
   $this->fecvta01  = trim($this->fecvta01);
   $fecvta01 = $this->fecvta01;
   $sStyleHidden_fecvta01 = '';
   if (isset($this->nmgp_cmp_hidden['fecvta01']) && $this->nmgp_cmp_hidden['fecvta01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecvta01']);
       $sStyleHidden_fecvta01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecvta01 = 'display: none;';
   $sStyleReadInp_fecvta01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecvta01']) && $this->nmgp_cmp_readonly['fecvta01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecvta01']);
       $sStyleReadLab_fecvta01 = '';
       $sStyleReadInp_fecvta01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecvta01']) && $this->nmgp_cmp_hidden['fecvta01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecvta01" value="<?php echo $this->form_encode_input($fecvta01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecvta01_label" id="hidden_field_label_fecvta01" style="<?php echo $sStyleHidden_fecvta01; ?>"><span id="id_label_fecvta01"><?php echo $this->nm_new_label['fecvta01']; ?></span></TD>
    <TD class="scFormDataOdd css_fecvta01_line" id="hidden_field_data_fecvta01" style="<?php echo $sStyleHidden_fecvta01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecvta01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecvta01"]) &&  $this->nmgp_cmp_readonly["fecvta01"] == "on") { 

 ?>
<input type="hidden" name="fecvta01" value="<?php echo $this->form_encode_input($fecvta01) . "\">" . $fecvta01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecvta01" class="sc-ui-readonly-fecvta01 css_fecvta01_line" style="<?php echo $sStyleReadLab_fecvta01; ?>"><?php echo $this->form_format_readonly("fecvta01", $this->form_encode_input($fecvta01)); ?></span><span id="id_read_off_fecvta01" class="css_read_off_fecvta01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecvta01; ?>"><?php
$tmp_form_data = $this->field_config['fecvta01']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecvta01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecvta01" type=text name="fecvta01" value="<?php echo $this->form_encode_input($fecvta01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecvta01']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecvta01']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecvta01']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecvta01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecvta01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecvta01 = $old_dt_fecvta01;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ubic01']))
    {
        $this->nm_new_label['ubic01'] = "Ubic 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ubic01 = $this->ubic01;
   $sStyleHidden_ubic01 = '';
   if (isset($this->nmgp_cmp_hidden['ubic01']) && $this->nmgp_cmp_hidden['ubic01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ubic01']);
       $sStyleHidden_ubic01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ubic01 = 'display: none;';
   $sStyleReadInp_ubic01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ubic01']) && $this->nmgp_cmp_readonly['ubic01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ubic01']);
       $sStyleReadLab_ubic01 = '';
       $sStyleReadInp_ubic01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ubic01']) && $this->nmgp_cmp_hidden['ubic01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ubic01" value="<?php echo $this->form_encode_input($ubic01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ubic01_label" id="hidden_field_label_ubic01" style="<?php echo $sStyleHidden_ubic01; ?>"><span id="id_label_ubic01"><?php echo $this->nm_new_label['ubic01']; ?></span></TD>
    <TD class="scFormDataOdd css_ubic01_line" id="hidden_field_data_ubic01" style="<?php echo $sStyleHidden_ubic01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ubic01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ubic01"]) &&  $this->nmgp_cmp_readonly["ubic01"] == "on") { 

 ?>
<input type="hidden" name="ubic01" value="<?php echo $this->form_encode_input($ubic01) . "\">" . $ubic01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ubic01" class="sc-ui-readonly-ubic01 css_ubic01_line" style="<?php echo $sStyleReadLab_ubic01; ?>"><?php echo $this->form_format_readonly("ubic01", $this->form_encode_input($this->ubic01)); ?></span><span id="id_read_off_ubic01" class="css_read_off_ubic01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ubic01; ?>">
 <input class="sc-js-input scFormObjectOdd css_ubic01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ubic01" type=text name="ubic01" value="<?php echo $this->form_encode_input($ubic01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ubic01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ubic01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precvta01']))
    {
        $this->nm_new_label['precvta01'] = "Precvta 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precvta01 = $this->precvta01;
   $sStyleHidden_precvta01 = '';
   if (isset($this->nmgp_cmp_hidden['precvta01']) && $this->nmgp_cmp_hidden['precvta01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precvta01']);
       $sStyleHidden_precvta01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precvta01 = 'display: none;';
   $sStyleReadInp_precvta01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precvta01']) && $this->nmgp_cmp_readonly['precvta01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precvta01']);
       $sStyleReadLab_precvta01 = '';
       $sStyleReadInp_precvta01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precvta01']) && $this->nmgp_cmp_hidden['precvta01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precvta01" value="<?php echo $this->form_encode_input($precvta01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precvta01_label" id="hidden_field_label_precvta01" style="<?php echo $sStyleHidden_precvta01; ?>"><span id="id_label_precvta01"><?php echo $this->nm_new_label['precvta01']; ?></span></TD>
    <TD class="scFormDataOdd css_precvta01_line" id="hidden_field_data_precvta01" style="<?php echo $sStyleHidden_precvta01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precvta01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precvta01"]) &&  $this->nmgp_cmp_readonly["precvta01"] == "on") { 

 ?>
<input type="hidden" name="precvta01" value="<?php echo $this->form_encode_input($precvta01) . "\">" . $precvta01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precvta01" class="sc-ui-readonly-precvta01 css_precvta01_line" style="<?php echo $sStyleReadLab_precvta01; ?>"><?php echo $this->form_format_readonly("precvta01", $this->form_encode_input($this->precvta01)); ?></span><span id="id_read_off_precvta01" class="css_read_off_precvta01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precvta01; ?>">
 <input class="sc-js-input scFormObjectOdd css_precvta01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precvta01" type=text name="precvta01" value="<?php echo $this->form_encode_input($precvta01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precvta01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precvta01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precvta01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precvta01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precvta01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precvta01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto101']))
    {
        $this->nm_new_label['descto101'] = "Descto 101";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto101 = $this->descto101;
   $sStyleHidden_descto101 = '';
   if (isset($this->nmgp_cmp_hidden['descto101']) && $this->nmgp_cmp_hidden['descto101'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto101']);
       $sStyleHidden_descto101 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto101 = 'display: none;';
   $sStyleReadInp_descto101 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto101']) && $this->nmgp_cmp_readonly['descto101'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto101']);
       $sStyleReadLab_descto101 = '';
       $sStyleReadInp_descto101 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto101']) && $this->nmgp_cmp_hidden['descto101'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto101" value="<?php echo $this->form_encode_input($descto101) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto101_label" id="hidden_field_label_descto101" style="<?php echo $sStyleHidden_descto101; ?>"><span id="id_label_descto101"><?php echo $this->nm_new_label['descto101']; ?></span></TD>
    <TD class="scFormDataOdd css_descto101_line" id="hidden_field_data_descto101" style="<?php echo $sStyleHidden_descto101; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto101_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto101"]) &&  $this->nmgp_cmp_readonly["descto101"] == "on") { 

 ?>
<input type="hidden" name="descto101" value="<?php echo $this->form_encode_input($descto101) . "\">" . $descto101 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto101" class="sc-ui-readonly-descto101 css_descto101_line" style="<?php echo $sStyleReadLab_descto101; ?>"><?php echo $this->form_format_readonly("descto101", $this->form_encode_input($this->descto101)); ?></span><span id="id_read_off_descto101" class="css_read_off_descto101<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto101; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto101_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto101" type=text name="descto101" value="<?php echo $this->form_encode_input($descto101) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto101']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto101']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto101']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto101']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto101_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto101_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio201']))
    {
        $this->nm_new_label['precio201'] = "Precio 201";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio201 = $this->precio201;
   $sStyleHidden_precio201 = '';
   if (isset($this->nmgp_cmp_hidden['precio201']) && $this->nmgp_cmp_hidden['precio201'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio201']);
       $sStyleHidden_precio201 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio201 = 'display: none;';
   $sStyleReadInp_precio201 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio201']) && $this->nmgp_cmp_readonly['precio201'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio201']);
       $sStyleReadLab_precio201 = '';
       $sStyleReadInp_precio201 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio201']) && $this->nmgp_cmp_hidden['precio201'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio201" value="<?php echo $this->form_encode_input($precio201) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio201_label" id="hidden_field_label_precio201" style="<?php echo $sStyleHidden_precio201; ?>"><span id="id_label_precio201"><?php echo $this->nm_new_label['precio201']; ?></span></TD>
    <TD class="scFormDataOdd css_precio201_line" id="hidden_field_data_precio201" style="<?php echo $sStyleHidden_precio201; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio201_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio201"]) &&  $this->nmgp_cmp_readonly["precio201"] == "on") { 

 ?>
<input type="hidden" name="precio201" value="<?php echo $this->form_encode_input($precio201) . "\">" . $precio201 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio201" class="sc-ui-readonly-precio201 css_precio201_line" style="<?php echo $sStyleReadLab_precio201; ?>"><?php echo $this->form_format_readonly("precio201", $this->form_encode_input($this->precio201)); ?></span><span id="id_read_off_precio201" class="css_read_off_precio201<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio201; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio201_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio201" type=text name="precio201" value="<?php echo $this->form_encode_input($precio201) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio201']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio201']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio201']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio201']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio201_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio201_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto201']))
    {
        $this->nm_new_label['descto201'] = "Descto 201";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto201 = $this->descto201;
   $sStyleHidden_descto201 = '';
   if (isset($this->nmgp_cmp_hidden['descto201']) && $this->nmgp_cmp_hidden['descto201'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto201']);
       $sStyleHidden_descto201 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto201 = 'display: none;';
   $sStyleReadInp_descto201 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto201']) && $this->nmgp_cmp_readonly['descto201'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto201']);
       $sStyleReadLab_descto201 = '';
       $sStyleReadInp_descto201 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto201']) && $this->nmgp_cmp_hidden['descto201'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto201" value="<?php echo $this->form_encode_input($descto201) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto201_label" id="hidden_field_label_descto201" style="<?php echo $sStyleHidden_descto201; ?>"><span id="id_label_descto201"><?php echo $this->nm_new_label['descto201']; ?></span></TD>
    <TD class="scFormDataOdd css_descto201_line" id="hidden_field_data_descto201" style="<?php echo $sStyleHidden_descto201; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto201_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto201"]) &&  $this->nmgp_cmp_readonly["descto201"] == "on") { 

 ?>
<input type="hidden" name="descto201" value="<?php echo $this->form_encode_input($descto201) . "\">" . $descto201 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto201" class="sc-ui-readonly-descto201 css_descto201_line" style="<?php echo $sStyleReadLab_descto201; ?>"><?php echo $this->form_format_readonly("descto201", $this->form_encode_input($this->descto201)); ?></span><span id="id_read_off_descto201" class="css_read_off_descto201<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto201; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto201_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto201" type=text name="descto201" value="<?php echo $this->form_encode_input($descto201) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto201']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto201']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto201']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto201']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto201_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto201_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio301']))
    {
        $this->nm_new_label['precio301'] = "Precio 301";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio301 = $this->precio301;
   $sStyleHidden_precio301 = '';
   if (isset($this->nmgp_cmp_hidden['precio301']) && $this->nmgp_cmp_hidden['precio301'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio301']);
       $sStyleHidden_precio301 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio301 = 'display: none;';
   $sStyleReadInp_precio301 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio301']) && $this->nmgp_cmp_readonly['precio301'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio301']);
       $sStyleReadLab_precio301 = '';
       $sStyleReadInp_precio301 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio301']) && $this->nmgp_cmp_hidden['precio301'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio301" value="<?php echo $this->form_encode_input($precio301) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio301_label" id="hidden_field_label_precio301" style="<?php echo $sStyleHidden_precio301; ?>"><span id="id_label_precio301"><?php echo $this->nm_new_label['precio301']; ?></span></TD>
    <TD class="scFormDataOdd css_precio301_line" id="hidden_field_data_precio301" style="<?php echo $sStyleHidden_precio301; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio301_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio301"]) &&  $this->nmgp_cmp_readonly["precio301"] == "on") { 

 ?>
<input type="hidden" name="precio301" value="<?php echo $this->form_encode_input($precio301) . "\">" . $precio301 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio301" class="sc-ui-readonly-precio301 css_precio301_line" style="<?php echo $sStyleReadLab_precio301; ?>"><?php echo $this->form_format_readonly("precio301", $this->form_encode_input($this->precio301)); ?></span><span id="id_read_off_precio301" class="css_read_off_precio301<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio301; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio301_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio301" type=text name="precio301" value="<?php echo $this->form_encode_input($precio301) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio301']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio301']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio301']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio301']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio301_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio301_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto301']))
    {
        $this->nm_new_label['descto301'] = "Descto 301";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto301 = $this->descto301;
   $sStyleHidden_descto301 = '';
   if (isset($this->nmgp_cmp_hidden['descto301']) && $this->nmgp_cmp_hidden['descto301'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto301']);
       $sStyleHidden_descto301 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto301 = 'display: none;';
   $sStyleReadInp_descto301 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto301']) && $this->nmgp_cmp_readonly['descto301'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto301']);
       $sStyleReadLab_descto301 = '';
       $sStyleReadInp_descto301 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto301']) && $this->nmgp_cmp_hidden['descto301'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto301" value="<?php echo $this->form_encode_input($descto301) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto301_label" id="hidden_field_label_descto301" style="<?php echo $sStyleHidden_descto301; ?>"><span id="id_label_descto301"><?php echo $this->nm_new_label['descto301']; ?></span></TD>
    <TD class="scFormDataOdd css_descto301_line" id="hidden_field_data_descto301" style="<?php echo $sStyleHidden_descto301; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto301_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto301"]) &&  $this->nmgp_cmp_readonly["descto301"] == "on") { 

 ?>
<input type="hidden" name="descto301" value="<?php echo $this->form_encode_input($descto301) . "\">" . $descto301 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto301" class="sc-ui-readonly-descto301 css_descto301_line" style="<?php echo $sStyleReadLab_descto301; ?>"><?php echo $this->form_format_readonly("descto301", $this->form_encode_input($this->descto301)); ?></span><span id="id_read_off_descto301" class="css_read_off_descto301<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto301; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto301_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto301" type=text name="descto301" value="<?php echo $this->form_encode_input($descto301) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto301']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto301']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto301']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto301']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto301_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto301_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['canvtam01']))
    {
        $this->nm_new_label['canvtam01'] = "Canvtam 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $canvtam01 = $this->canvtam01;
   $sStyleHidden_canvtam01 = '';
   if (isset($this->nmgp_cmp_hidden['canvtam01']) && $this->nmgp_cmp_hidden['canvtam01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['canvtam01']);
       $sStyleHidden_canvtam01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_canvtam01 = 'display: none;';
   $sStyleReadInp_canvtam01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['canvtam01']) && $this->nmgp_cmp_readonly['canvtam01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['canvtam01']);
       $sStyleReadLab_canvtam01 = '';
       $sStyleReadInp_canvtam01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['canvtam01']) && $this->nmgp_cmp_hidden['canvtam01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="canvtam01" value="<?php echo $this->form_encode_input($canvtam01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_canvtam01_label" id="hidden_field_label_canvtam01" style="<?php echo $sStyleHidden_canvtam01; ?>"><span id="id_label_canvtam01"><?php echo $this->nm_new_label['canvtam01']; ?></span></TD>
    <TD class="scFormDataOdd css_canvtam01_line" id="hidden_field_data_canvtam01" style="<?php echo $sStyleHidden_canvtam01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_canvtam01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["canvtam01"]) &&  $this->nmgp_cmp_readonly["canvtam01"] == "on") { 

 ?>
<input type="hidden" name="canvtam01" value="<?php echo $this->form_encode_input($canvtam01) . "\">" . $canvtam01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_canvtam01" class="sc-ui-readonly-canvtam01 css_canvtam01_line" style="<?php echo $sStyleReadLab_canvtam01; ?>"><?php echo $this->form_format_readonly("canvtam01", $this->form_encode_input($this->canvtam01)); ?></span><span id="id_read_off_canvtam01" class="css_read_off_canvtam01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_canvtam01; ?>">
 <input class="sc-js-input scFormObjectOdd css_canvtam01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_canvtam01" type=text name="canvtam01" value="<?php echo $this->form_encode_input($canvtam01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> alt="{datatype: 'decimal', maxLength: 13, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['canvtam01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['canvtam01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['canvtam01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['canvtam01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_canvtam01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_canvtam01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valvtam01']))
    {
        $this->nm_new_label['valvtam01'] = "Valvtam 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valvtam01 = $this->valvtam01;
   $sStyleHidden_valvtam01 = '';
   if (isset($this->nmgp_cmp_hidden['valvtam01']) && $this->nmgp_cmp_hidden['valvtam01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valvtam01']);
       $sStyleHidden_valvtam01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valvtam01 = 'display: none;';
   $sStyleReadInp_valvtam01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valvtam01']) && $this->nmgp_cmp_readonly['valvtam01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valvtam01']);
       $sStyleReadLab_valvtam01 = '';
       $sStyleReadInp_valvtam01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valvtam01']) && $this->nmgp_cmp_hidden['valvtam01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valvtam01" value="<?php echo $this->form_encode_input($valvtam01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valvtam01_label" id="hidden_field_label_valvtam01" style="<?php echo $sStyleHidden_valvtam01; ?>"><span id="id_label_valvtam01"><?php echo $this->nm_new_label['valvtam01']; ?></span></TD>
    <TD class="scFormDataOdd css_valvtam01_line" id="hidden_field_data_valvtam01" style="<?php echo $sStyleHidden_valvtam01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valvtam01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valvtam01"]) &&  $this->nmgp_cmp_readonly["valvtam01"] == "on") { 

 ?>
<input type="hidden" name="valvtam01" value="<?php echo $this->form_encode_input($valvtam01) . "\">" . $valvtam01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valvtam01" class="sc-ui-readonly-valvtam01 css_valvtam01_line" style="<?php echo $sStyleReadLab_valvtam01; ?>"><?php echo $this->form_format_readonly("valvtam01", $this->form_encode_input($this->valvtam01)); ?></span><span id="id_read_off_valvtam01" class="css_read_off_valvtam01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valvtam01; ?>">
 <input class="sc-js-input scFormObjectOdd css_valvtam01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valvtam01" type=text name="valvtam01" value="<?php echo $this->form_encode_input($valvtam01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valvtam01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valvtam01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valvtam01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valvtam01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valvtam01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valvtam01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cosvtam01']))
    {
        $this->nm_new_label['cosvtam01'] = "Cosvtam 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cosvtam01 = $this->cosvtam01;
   $sStyleHidden_cosvtam01 = '';
   if (isset($this->nmgp_cmp_hidden['cosvtam01']) && $this->nmgp_cmp_hidden['cosvtam01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cosvtam01']);
       $sStyleHidden_cosvtam01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cosvtam01 = 'display: none;';
   $sStyleReadInp_cosvtam01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cosvtam01']) && $this->nmgp_cmp_readonly['cosvtam01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cosvtam01']);
       $sStyleReadLab_cosvtam01 = '';
       $sStyleReadInp_cosvtam01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cosvtam01']) && $this->nmgp_cmp_hidden['cosvtam01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cosvtam01" value="<?php echo $this->form_encode_input($cosvtam01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cosvtam01_label" id="hidden_field_label_cosvtam01" style="<?php echo $sStyleHidden_cosvtam01; ?>"><span id="id_label_cosvtam01"><?php echo $this->nm_new_label['cosvtam01']; ?></span></TD>
    <TD class="scFormDataOdd css_cosvtam01_line" id="hidden_field_data_cosvtam01" style="<?php echo $sStyleHidden_cosvtam01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cosvtam01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cosvtam01"]) &&  $this->nmgp_cmp_readonly["cosvtam01"] == "on") { 

 ?>
<input type="hidden" name="cosvtam01" value="<?php echo $this->form_encode_input($cosvtam01) . "\">" . $cosvtam01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cosvtam01" class="sc-ui-readonly-cosvtam01 css_cosvtam01_line" style="<?php echo $sStyleReadLab_cosvtam01; ?>"><?php echo $this->form_format_readonly("cosvtam01", $this->form_encode_input($this->cosvtam01)); ?></span><span id="id_read_off_cosvtam01" class="css_read_off_cosvtam01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cosvtam01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cosvtam01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cosvtam01" type=text name="cosvtam01" value="<?php echo $this->form_encode_input($cosvtam01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cosvtam01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cosvtam01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cosvtam01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cosvtam01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cosvtam01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cosvtam01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['canvtaa01']))
    {
        $this->nm_new_label['canvtaa01'] = "Canvtaa 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $canvtaa01 = $this->canvtaa01;
   $sStyleHidden_canvtaa01 = '';
   if (isset($this->nmgp_cmp_hidden['canvtaa01']) && $this->nmgp_cmp_hidden['canvtaa01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['canvtaa01']);
       $sStyleHidden_canvtaa01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_canvtaa01 = 'display: none;';
   $sStyleReadInp_canvtaa01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['canvtaa01']) && $this->nmgp_cmp_readonly['canvtaa01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['canvtaa01']);
       $sStyleReadLab_canvtaa01 = '';
       $sStyleReadInp_canvtaa01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['canvtaa01']) && $this->nmgp_cmp_hidden['canvtaa01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="canvtaa01" value="<?php echo $this->form_encode_input($canvtaa01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_canvtaa01_label" id="hidden_field_label_canvtaa01" style="<?php echo $sStyleHidden_canvtaa01; ?>"><span id="id_label_canvtaa01"><?php echo $this->nm_new_label['canvtaa01']; ?></span></TD>
    <TD class="scFormDataOdd css_canvtaa01_line" id="hidden_field_data_canvtaa01" style="<?php echo $sStyleHidden_canvtaa01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_canvtaa01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["canvtaa01"]) &&  $this->nmgp_cmp_readonly["canvtaa01"] == "on") { 

 ?>
<input type="hidden" name="canvtaa01" value="<?php echo $this->form_encode_input($canvtaa01) . "\">" . $canvtaa01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_canvtaa01" class="sc-ui-readonly-canvtaa01 css_canvtaa01_line" style="<?php echo $sStyleReadLab_canvtaa01; ?>"><?php echo $this->form_format_readonly("canvtaa01", $this->form_encode_input($this->canvtaa01)); ?></span><span id="id_read_off_canvtaa01" class="css_read_off_canvtaa01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_canvtaa01; ?>">
 <input class="sc-js-input scFormObjectOdd css_canvtaa01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_canvtaa01" type=text name="canvtaa01" value="<?php echo $this->form_encode_input($canvtaa01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=13"; } ?> alt="{datatype: 'decimal', maxLength: 13, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['canvtaa01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['canvtaa01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['canvtaa01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['canvtaa01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_canvtaa01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_canvtaa01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valvtaa01']))
    {
        $this->nm_new_label['valvtaa01'] = "Valvtaa 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valvtaa01 = $this->valvtaa01;
   $sStyleHidden_valvtaa01 = '';
   if (isset($this->nmgp_cmp_hidden['valvtaa01']) && $this->nmgp_cmp_hidden['valvtaa01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valvtaa01']);
       $sStyleHidden_valvtaa01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valvtaa01 = 'display: none;';
   $sStyleReadInp_valvtaa01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valvtaa01']) && $this->nmgp_cmp_readonly['valvtaa01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valvtaa01']);
       $sStyleReadLab_valvtaa01 = '';
       $sStyleReadInp_valvtaa01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valvtaa01']) && $this->nmgp_cmp_hidden['valvtaa01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valvtaa01" value="<?php echo $this->form_encode_input($valvtaa01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valvtaa01_label" id="hidden_field_label_valvtaa01" style="<?php echo $sStyleHidden_valvtaa01; ?>"><span id="id_label_valvtaa01"><?php echo $this->nm_new_label['valvtaa01']; ?></span></TD>
    <TD class="scFormDataOdd css_valvtaa01_line" id="hidden_field_data_valvtaa01" style="<?php echo $sStyleHidden_valvtaa01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valvtaa01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valvtaa01"]) &&  $this->nmgp_cmp_readonly["valvtaa01"] == "on") { 

 ?>
<input type="hidden" name="valvtaa01" value="<?php echo $this->form_encode_input($valvtaa01) . "\">" . $valvtaa01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valvtaa01" class="sc-ui-readonly-valvtaa01 css_valvtaa01_line" style="<?php echo $sStyleReadLab_valvtaa01; ?>"><?php echo $this->form_format_readonly("valvtaa01", $this->form_encode_input($this->valvtaa01)); ?></span><span id="id_read_off_valvtaa01" class="css_read_off_valvtaa01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valvtaa01; ?>">
 <input class="sc-js-input scFormObjectOdd css_valvtaa01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valvtaa01" type=text name="valvtaa01" value="<?php echo $this->form_encode_input($valvtaa01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valvtaa01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valvtaa01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valvtaa01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valvtaa01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valvtaa01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valvtaa01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cosvtaa01']))
    {
        $this->nm_new_label['cosvtaa01'] = "Cosvtaa 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cosvtaa01 = $this->cosvtaa01;
   $sStyleHidden_cosvtaa01 = '';
   if (isset($this->nmgp_cmp_hidden['cosvtaa01']) && $this->nmgp_cmp_hidden['cosvtaa01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cosvtaa01']);
       $sStyleHidden_cosvtaa01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cosvtaa01 = 'display: none;';
   $sStyleReadInp_cosvtaa01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cosvtaa01']) && $this->nmgp_cmp_readonly['cosvtaa01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cosvtaa01']);
       $sStyleReadLab_cosvtaa01 = '';
       $sStyleReadInp_cosvtaa01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cosvtaa01']) && $this->nmgp_cmp_hidden['cosvtaa01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cosvtaa01" value="<?php echo $this->form_encode_input($cosvtaa01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cosvtaa01_label" id="hidden_field_label_cosvtaa01" style="<?php echo $sStyleHidden_cosvtaa01; ?>"><span id="id_label_cosvtaa01"><?php echo $this->nm_new_label['cosvtaa01']; ?></span></TD>
    <TD class="scFormDataOdd css_cosvtaa01_line" id="hidden_field_data_cosvtaa01" style="<?php echo $sStyleHidden_cosvtaa01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cosvtaa01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cosvtaa01"]) &&  $this->nmgp_cmp_readonly["cosvtaa01"] == "on") { 

 ?>
<input type="hidden" name="cosvtaa01" value="<?php echo $this->form_encode_input($cosvtaa01) . "\">" . $cosvtaa01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cosvtaa01" class="sc-ui-readonly-cosvtaa01 css_cosvtaa01_line" style="<?php echo $sStyleReadLab_cosvtaa01; ?>"><?php echo $this->form_format_readonly("cosvtaa01", $this->form_encode_input($this->cosvtaa01)); ?></span><span id="id_read_off_cosvtaa01" class="css_read_off_cosvtaa01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cosvtaa01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cosvtaa01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cosvtaa01" type=text name="cosvtaa01" value="<?php echo $this->form_encode_input($cosvtaa01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cosvtaa01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cosvtaa01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cosvtaa01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cosvtaa01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cosvtaa01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cosvtaa01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['prod1alt01']))
    {
        $this->nm_new_label['prod1alt01'] = "Prod 1alt 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prod1alt01 = $this->prod1alt01;
   $sStyleHidden_prod1alt01 = '';
   if (isset($this->nmgp_cmp_hidden['prod1alt01']) && $this->nmgp_cmp_hidden['prod1alt01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prod1alt01']);
       $sStyleHidden_prod1alt01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prod1alt01 = 'display: none;';
   $sStyleReadInp_prod1alt01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prod1alt01']) && $this->nmgp_cmp_readonly['prod1alt01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prod1alt01']);
       $sStyleReadLab_prod1alt01 = '';
       $sStyleReadInp_prod1alt01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prod1alt01']) && $this->nmgp_cmp_hidden['prod1alt01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prod1alt01" value="<?php echo $this->form_encode_input($prod1alt01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_prod1alt01_label" id="hidden_field_label_prod1alt01" style="<?php echo $sStyleHidden_prod1alt01; ?>"><span id="id_label_prod1alt01"><?php echo $this->nm_new_label['prod1alt01']; ?></span></TD>
    <TD class="scFormDataOdd css_prod1alt01_line" id="hidden_field_data_prod1alt01" style="<?php echo $sStyleHidden_prod1alt01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prod1alt01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prod1alt01"]) &&  $this->nmgp_cmp_readonly["prod1alt01"] == "on") { 

 ?>
<input type="hidden" name="prod1alt01" value="<?php echo $this->form_encode_input($prod1alt01) . "\">" . $prod1alt01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_prod1alt01" class="sc-ui-readonly-prod1alt01 css_prod1alt01_line" style="<?php echo $sStyleReadLab_prod1alt01; ?>"><?php echo $this->form_format_readonly("prod1alt01", $this->form_encode_input($this->prod1alt01)); ?></span><span id="id_read_off_prod1alt01" class="css_read_off_prod1alt01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_prod1alt01; ?>">
 <input class="sc-js-input scFormObjectOdd css_prod1alt01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_prod1alt01" type=text name="prod1alt01" value="<?php echo $this->form_encode_input($prod1alt01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prod1alt01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prod1alt01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['prod2alt01']))
    {
        $this->nm_new_label['prod2alt01'] = "Prod 2alt 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prod2alt01 = $this->prod2alt01;
   $sStyleHidden_prod2alt01 = '';
   if (isset($this->nmgp_cmp_hidden['prod2alt01']) && $this->nmgp_cmp_hidden['prod2alt01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prod2alt01']);
       $sStyleHidden_prod2alt01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prod2alt01 = 'display: none;';
   $sStyleReadInp_prod2alt01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prod2alt01']) && $this->nmgp_cmp_readonly['prod2alt01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prod2alt01']);
       $sStyleReadLab_prod2alt01 = '';
       $sStyleReadInp_prod2alt01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prod2alt01']) && $this->nmgp_cmp_hidden['prod2alt01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prod2alt01" value="<?php echo $this->form_encode_input($prod2alt01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_prod2alt01_label" id="hidden_field_label_prod2alt01" style="<?php echo $sStyleHidden_prod2alt01; ?>"><span id="id_label_prod2alt01"><?php echo $this->nm_new_label['prod2alt01']; ?></span></TD>
    <TD class="scFormDataOdd css_prod2alt01_line" id="hidden_field_data_prod2alt01" style="<?php echo $sStyleHidden_prod2alt01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prod2alt01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prod2alt01"]) &&  $this->nmgp_cmp_readonly["prod2alt01"] == "on") { 

 ?>
<input type="hidden" name="prod2alt01" value="<?php echo $this->form_encode_input($prod2alt01) . "\">" . $prod2alt01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_prod2alt01" class="sc-ui-readonly-prod2alt01 css_prod2alt01_line" style="<?php echo $sStyleReadLab_prod2alt01; ?>"><?php echo $this->form_format_readonly("prod2alt01", $this->form_encode_input($this->prod2alt01)); ?></span><span id="id_read_off_prod2alt01" class="css_read_off_prod2alt01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_prod2alt01; ?>">
 <input class="sc-js-input scFormObjectOdd css_prod2alt01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_prod2alt01" type=text name="prod2alt01" value="<?php echo $this->form_encode_input($prod2alt01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prod2alt01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prod2alt01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['proved101']))
    {
        $this->nm_new_label['proved101'] = "Proved 101";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proved101 = $this->proved101;
   $sStyleHidden_proved101 = '';
   if (isset($this->nmgp_cmp_hidden['proved101']) && $this->nmgp_cmp_hidden['proved101'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proved101']);
       $sStyleHidden_proved101 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proved101 = 'display: none;';
   $sStyleReadInp_proved101 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proved101']) && $this->nmgp_cmp_readonly['proved101'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proved101']);
       $sStyleReadLab_proved101 = '';
       $sStyleReadInp_proved101 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proved101']) && $this->nmgp_cmp_hidden['proved101'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="proved101" value="<?php echo $this->form_encode_input($proved101) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_proved101_label" id="hidden_field_label_proved101" style="<?php echo $sStyleHidden_proved101; ?>"><span id="id_label_proved101"><?php echo $this->nm_new_label['proved101']; ?></span></TD>
    <TD class="scFormDataOdd css_proved101_line" id="hidden_field_data_proved101" style="<?php echo $sStyleHidden_proved101; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proved101_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proved101"]) &&  $this->nmgp_cmp_readonly["proved101"] == "on") { 

 ?>
<input type="hidden" name="proved101" value="<?php echo $this->form_encode_input($proved101) . "\">" . $proved101 . ""; ?>
<?php } else { ?>
<span id="id_read_on_proved101" class="sc-ui-readonly-proved101 css_proved101_line" style="<?php echo $sStyleReadLab_proved101; ?>"><?php echo $this->form_format_readonly("proved101", $this->form_encode_input($this->proved101)); ?></span><span id="id_read_off_proved101" class="css_read_off_proved101<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_proved101; ?>">
 <input class="sc-js-input scFormObjectOdd css_proved101_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_proved101" type=text name="proved101" value="<?php echo $this->form_encode_input($proved101) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proved101_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proved101_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['proved201']))
    {
        $this->nm_new_label['proved201'] = "Proved 201";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $proved201 = $this->proved201;
   $sStyleHidden_proved201 = '';
   if (isset($this->nmgp_cmp_hidden['proved201']) && $this->nmgp_cmp_hidden['proved201'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['proved201']);
       $sStyleHidden_proved201 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_proved201 = 'display: none;';
   $sStyleReadInp_proved201 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['proved201']) && $this->nmgp_cmp_readonly['proved201'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['proved201']);
       $sStyleReadLab_proved201 = '';
       $sStyleReadInp_proved201 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['proved201']) && $this->nmgp_cmp_hidden['proved201'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="proved201" value="<?php echo $this->form_encode_input($proved201) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_proved201_label" id="hidden_field_label_proved201" style="<?php echo $sStyleHidden_proved201; ?>"><span id="id_label_proved201"><?php echo $this->nm_new_label['proved201']; ?></span></TD>
    <TD class="scFormDataOdd css_proved201_line" id="hidden_field_data_proved201" style="<?php echo $sStyleHidden_proved201; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_proved201_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["proved201"]) &&  $this->nmgp_cmp_readonly["proved201"] == "on") { 

 ?>
<input type="hidden" name="proved201" value="<?php echo $this->form_encode_input($proved201) . "\">" . $proved201 . ""; ?>
<?php } else { ?>
<span id="id_read_on_proved201" class="sc-ui-readonly-proved201 css_proved201_line" style="<?php echo $sStyleReadLab_proved201; ?>"><?php echo $this->form_format_readonly("proved201", $this->form_encode_input($this->proved201)); ?></span><span id="id_read_off_proved201" class="css_read_off_proved201<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_proved201; ?>">
 <input class="sc-js-input scFormObjectOdd css_proved201_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_proved201" type=text name="proved201" value="<?php echo $this->form_encode_input($proved201) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_proved201_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_proved201_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['med101']))
    {
        $this->nm_new_label['med101'] = "Med 101";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $med101 = $this->med101;
   $sStyleHidden_med101 = '';
   if (isset($this->nmgp_cmp_hidden['med101']) && $this->nmgp_cmp_hidden['med101'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['med101']);
       $sStyleHidden_med101 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_med101 = 'display: none;';
   $sStyleReadInp_med101 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['med101']) && $this->nmgp_cmp_readonly['med101'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['med101']);
       $sStyleReadLab_med101 = '';
       $sStyleReadInp_med101 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['med101']) && $this->nmgp_cmp_hidden['med101'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="med101" value="<?php echo $this->form_encode_input($med101) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_med101_label" id="hidden_field_label_med101" style="<?php echo $sStyleHidden_med101; ?>"><span id="id_label_med101"><?php echo $this->nm_new_label['med101']; ?></span></TD>
    <TD class="scFormDataOdd css_med101_line" id="hidden_field_data_med101" style="<?php echo $sStyleHidden_med101; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_med101_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["med101"]) &&  $this->nmgp_cmp_readonly["med101"] == "on") { 

 ?>
<input type="hidden" name="med101" value="<?php echo $this->form_encode_input($med101) . "\">" . $med101 . ""; ?>
<?php } else { ?>
<span id="id_read_on_med101" class="sc-ui-readonly-med101 css_med101_line" style="<?php echo $sStyleReadLab_med101; ?>"><?php echo $this->form_format_readonly("med101", $this->form_encode_input($this->med101)); ?></span><span id="id_read_off_med101" class="css_read_off_med101<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_med101; ?>">
 <input class="sc-js-input scFormObjectOdd css_med101_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_med101" type=text name="med101" value="<?php echo $this->form_encode_input($med101) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 5, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['med101']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['med101']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['med101']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['med101']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_med101_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_med101_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['med201']))
    {
        $this->nm_new_label['med201'] = "Med 201";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $med201 = $this->med201;
   $sStyleHidden_med201 = '';
   if (isset($this->nmgp_cmp_hidden['med201']) && $this->nmgp_cmp_hidden['med201'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['med201']);
       $sStyleHidden_med201 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_med201 = 'display: none;';
   $sStyleReadInp_med201 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['med201']) && $this->nmgp_cmp_readonly['med201'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['med201']);
       $sStyleReadLab_med201 = '';
       $sStyleReadInp_med201 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['med201']) && $this->nmgp_cmp_hidden['med201'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="med201" value="<?php echo $this->form_encode_input($med201) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_med201_label" id="hidden_field_label_med201" style="<?php echo $sStyleHidden_med201; ?>"><span id="id_label_med201"><?php echo $this->nm_new_label['med201']; ?></span></TD>
    <TD class="scFormDataOdd css_med201_line" id="hidden_field_data_med201" style="<?php echo $sStyleHidden_med201; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_med201_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["med201"]) &&  $this->nmgp_cmp_readonly["med201"] == "on") { 

 ?>
<input type="hidden" name="med201" value="<?php echo $this->form_encode_input($med201) . "\">" . $med201 . ""; ?>
<?php } else { ?>
<span id="id_read_on_med201" class="sc-ui-readonly-med201 css_med201_line" style="<?php echo $sStyleReadLab_med201; ?>"><?php echo $this->form_format_readonly("med201", $this->form_encode_input($this->med201)); ?></span><span id="id_read_off_med201" class="css_read_off_med201<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_med201; ?>">
 <input class="sc-js-input scFormObjectOdd css_med201_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_med201" type=text name="med201" value="<?php echo $this->form_encode_input($med201) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 5, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['med201']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['med201']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['med201']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['med201']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_med201_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_med201_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['med301']))
    {
        $this->nm_new_label['med301'] = "Med 301";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $med301 = $this->med301;
   $sStyleHidden_med301 = '';
   if (isset($this->nmgp_cmp_hidden['med301']) && $this->nmgp_cmp_hidden['med301'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['med301']);
       $sStyleHidden_med301 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_med301 = 'display: none;';
   $sStyleReadInp_med301 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['med301']) && $this->nmgp_cmp_readonly['med301'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['med301']);
       $sStyleReadLab_med301 = '';
       $sStyleReadInp_med301 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['med301']) && $this->nmgp_cmp_hidden['med301'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="med301" value="<?php echo $this->form_encode_input($med301) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_med301_label" id="hidden_field_label_med301" style="<?php echo $sStyleHidden_med301; ?>"><span id="id_label_med301"><?php echo $this->nm_new_label['med301']; ?></span></TD>
    <TD class="scFormDataOdd css_med301_line" id="hidden_field_data_med301" style="<?php echo $sStyleHidden_med301; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_med301_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["med301"]) &&  $this->nmgp_cmp_readonly["med301"] == "on") { 

 ?>
<input type="hidden" name="med301" value="<?php echo $this->form_encode_input($med301) . "\">" . $med301 . ""; ?>
<?php } else { ?>
<span id="id_read_on_med301" class="sc-ui-readonly-med301 css_med301_line" style="<?php echo $sStyleReadLab_med301; ?>"><?php echo $this->form_format_readonly("med301", $this->form_encode_input($this->med301)); ?></span><span id="id_read_off_med301" class="css_read_off_med301<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_med301; ?>">
 <input class="sc-js-input scFormObjectOdd css_med301_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_med301" type=text name="med301" value="<?php echo $this->form_encode_input($med301) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 5, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['med301']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['med301']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['med301']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['med301']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_med301_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_med301_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['factor01']))
    {
        $this->nm_new_label['factor01'] = "Factor 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $factor01 = $this->factor01;
   $sStyleHidden_factor01 = '';
   if (isset($this->nmgp_cmp_hidden['factor01']) && $this->nmgp_cmp_hidden['factor01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['factor01']);
       $sStyleHidden_factor01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_factor01 = 'display: none;';
   $sStyleReadInp_factor01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['factor01']) && $this->nmgp_cmp_readonly['factor01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['factor01']);
       $sStyleReadLab_factor01 = '';
       $sStyleReadInp_factor01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['factor01']) && $this->nmgp_cmp_hidden['factor01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="factor01" value="<?php echo $this->form_encode_input($factor01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_factor01_label" id="hidden_field_label_factor01" style="<?php echo $sStyleHidden_factor01; ?>"><span id="id_label_factor01"><?php echo $this->nm_new_label['factor01']; ?></span></TD>
    <TD class="scFormDataOdd css_factor01_line" id="hidden_field_data_factor01" style="<?php echo $sStyleHidden_factor01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_factor01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["factor01"]) &&  $this->nmgp_cmp_readonly["factor01"] == "on") { 

 ?>
<input type="hidden" name="factor01" value="<?php echo $this->form_encode_input($factor01) . "\">" . $factor01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_factor01" class="sc-ui-readonly-factor01 css_factor01_line" style="<?php echo $sStyleReadLab_factor01; ?>"><?php echo $this->form_format_readonly("factor01", $this->form_encode_input($this->factor01)); ?></span><span id="id_read_off_factor01" class="css_read_off_factor01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_factor01; ?>">
 <input class="sc-js-input scFormObjectOdd css_factor01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_factor01" type=text name="factor01" value="<?php echo $this->form_encode_input($factor01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=7"; } ?> alt="{datatype: 'decimal', maxLength: 7, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['factor01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['factor01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['factor01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['factor01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_factor01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_factor01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvserie01']))
    {
        $this->nm_new_label['cvserie01'] = "Cvserie 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvserie01 = $this->cvserie01;
   $sStyleHidden_cvserie01 = '';
   if (isset($this->nmgp_cmp_hidden['cvserie01']) && $this->nmgp_cmp_hidden['cvserie01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvserie01']);
       $sStyleHidden_cvserie01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvserie01 = 'display: none;';
   $sStyleReadInp_cvserie01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvserie01']) && $this->nmgp_cmp_readonly['cvserie01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvserie01']);
       $sStyleReadLab_cvserie01 = '';
       $sStyleReadInp_cvserie01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvserie01']) && $this->nmgp_cmp_hidden['cvserie01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvserie01" value="<?php echo $this->form_encode_input($cvserie01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvserie01_label" id="hidden_field_label_cvserie01" style="<?php echo $sStyleHidden_cvserie01; ?>"><span id="id_label_cvserie01"><?php echo $this->nm_new_label['cvserie01']; ?></span></TD>
    <TD class="scFormDataOdd css_cvserie01_line" id="hidden_field_data_cvserie01" style="<?php echo $sStyleHidden_cvserie01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvserie01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvserie01"]) &&  $this->nmgp_cmp_readonly["cvserie01"] == "on") { 

 ?>
<input type="hidden" name="cvserie01" value="<?php echo $this->form_encode_input($cvserie01) . "\">" . $cvserie01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvserie01" class="sc-ui-readonly-cvserie01 css_cvserie01_line" style="<?php echo $sStyleReadLab_cvserie01; ?>"><?php echo $this->form_format_readonly("cvserie01", $this->form_encode_input($this->cvserie01)); ?></span><span id="id_read_off_cvserie01" class="css_read_off_cvserie01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvserie01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvserie01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvserie01" type=text name="cvserie01" value="<?php echo $this->form_encode_input($cvserie01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvserie01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvserie01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ctain101']))
    {
        $this->nm_new_label['ctain101'] = "Ctain 101";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ctain101 = $this->ctain101;
   $sStyleHidden_ctain101 = '';
   if (isset($this->nmgp_cmp_hidden['ctain101']) && $this->nmgp_cmp_hidden['ctain101'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ctain101']);
       $sStyleHidden_ctain101 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ctain101 = 'display: none;';
   $sStyleReadInp_ctain101 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ctain101']) && $this->nmgp_cmp_readonly['ctain101'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ctain101']);
       $sStyleReadLab_ctain101 = '';
       $sStyleReadInp_ctain101 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ctain101']) && $this->nmgp_cmp_hidden['ctain101'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ctain101" value="<?php echo $this->form_encode_input($ctain101) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ctain101_label" id="hidden_field_label_ctain101" style="<?php echo $sStyleHidden_ctain101; ?>"><span id="id_label_ctain101"><?php echo $this->nm_new_label['ctain101']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ctain101']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ctain101'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ctain101_line" id="hidden_field_data_ctain101" style="<?php echo $sStyleHidden_ctain101; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ctain101_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ctain101"]) &&  $this->nmgp_cmp_readonly["ctain101"] == "on") { 

 ?>
<input type="hidden" name="ctain101" value="<?php echo $this->form_encode_input($ctain101) . "\">" . $ctain101 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ctain101" class="sc-ui-readonly-ctain101 css_ctain101_line" style="<?php echo $sStyleReadLab_ctain101; ?>"><?php echo $this->form_format_readonly("ctain101", $this->form_encode_input($this->ctain101)); ?></span><span id="id_read_off_ctain101" class="css_read_off_ctain101<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ctain101; ?>">
 <input class="sc-js-input scFormObjectOdd css_ctain101_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ctain101" type=text name="ctain101" value="<?php echo $this->form_encode_input($ctain101) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ctain101_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ctain101_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ctain201']))
    {
        $this->nm_new_label['ctain201'] = "Ctain 201";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ctain201 = $this->ctain201;
   $sStyleHidden_ctain201 = '';
   if (isset($this->nmgp_cmp_hidden['ctain201']) && $this->nmgp_cmp_hidden['ctain201'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ctain201']);
       $sStyleHidden_ctain201 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ctain201 = 'display: none;';
   $sStyleReadInp_ctain201 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ctain201']) && $this->nmgp_cmp_readonly['ctain201'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ctain201']);
       $sStyleReadLab_ctain201 = '';
       $sStyleReadInp_ctain201 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ctain201']) && $this->nmgp_cmp_hidden['ctain201'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ctain201" value="<?php echo $this->form_encode_input($ctain201) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ctain201_label" id="hidden_field_label_ctain201" style="<?php echo $sStyleHidden_ctain201; ?>"><span id="id_label_ctain201"><?php echo $this->nm_new_label['ctain201']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ctain201']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ctain201'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ctain201_line" id="hidden_field_data_ctain201" style="<?php echo $sStyleHidden_ctain201; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ctain201_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ctain201"]) &&  $this->nmgp_cmp_readonly["ctain201"] == "on") { 

 ?>
<input type="hidden" name="ctain201" value="<?php echo $this->form_encode_input($ctain201) . "\">" . $ctain201 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ctain201" class="sc-ui-readonly-ctain201 css_ctain201_line" style="<?php echo $sStyleReadLab_ctain201; ?>"><?php echo $this->form_format_readonly("ctain201", $this->form_encode_input($this->ctain201)); ?></span><span id="id_read_off_ctain201" class="css_read_off_ctain201<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ctain201; ?>">
 <input class="sc-js-input scFormObjectOdd css_ctain201_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ctain201" type=text name="ctain201" value="<?php echo $this->form_encode_input($ctain201) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ctain201_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ctain201_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ctain301']))
    {
        $this->nm_new_label['ctain301'] = "Ctain 301";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ctain301 = $this->ctain301;
   $sStyleHidden_ctain301 = '';
   if (isset($this->nmgp_cmp_hidden['ctain301']) && $this->nmgp_cmp_hidden['ctain301'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ctain301']);
       $sStyleHidden_ctain301 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ctain301 = 'display: none;';
   $sStyleReadInp_ctain301 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ctain301']) && $this->nmgp_cmp_readonly['ctain301'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ctain301']);
       $sStyleReadLab_ctain301 = '';
       $sStyleReadInp_ctain301 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ctain301']) && $this->nmgp_cmp_hidden['ctain301'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ctain301" value="<?php echo $this->form_encode_input($ctain301) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ctain301_label" id="hidden_field_label_ctain301" style="<?php echo $sStyleHidden_ctain301; ?>"><span id="id_label_ctain301"><?php echo $this->nm_new_label['ctain301']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ctain301']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ctain301'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ctain301_line" id="hidden_field_data_ctain301" style="<?php echo $sStyleHidden_ctain301; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ctain301_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ctain301"]) &&  $this->nmgp_cmp_readonly["ctain301"] == "on") { 

 ?>
<input type="hidden" name="ctain301" value="<?php echo $this->form_encode_input($ctain301) . "\">" . $ctain301 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ctain301" class="sc-ui-readonly-ctain301 css_ctain301_line" style="<?php echo $sStyleReadLab_ctain301; ?>"><?php echo $this->form_format_readonly("ctain301", $this->form_encode_input($this->ctain301)); ?></span><span id="id_read_off_ctain301" class="css_read_off_ctain301<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ctain301; ?>">
 <input class="sc-js-input scFormObjectOdd css_ctain301_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ctain301" type=text name="ctain301" value="<?php echo $this->form_encode_input($ctain301) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ctain301_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ctain301_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porciva01']))
    {
        $this->nm_new_label['porciva01'] = "Porciva 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porciva01 = $this->porciva01;
   $sStyleHidden_porciva01 = '';
   if (isset($this->nmgp_cmp_hidden['porciva01']) && $this->nmgp_cmp_hidden['porciva01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porciva01']);
       $sStyleHidden_porciva01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porciva01 = 'display: none;';
   $sStyleReadInp_porciva01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porciva01']) && $this->nmgp_cmp_readonly['porciva01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porciva01']);
       $sStyleReadLab_porciva01 = '';
       $sStyleReadInp_porciva01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porciva01']) && $this->nmgp_cmp_hidden['porciva01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porciva01" value="<?php echo $this->form_encode_input($porciva01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porciva01_label" id="hidden_field_label_porciva01" style="<?php echo $sStyleHidden_porciva01; ?>"><span id="id_label_porciva01"><?php echo $this->nm_new_label['porciva01']; ?></span></TD>
    <TD class="scFormDataOdd css_porciva01_line" id="hidden_field_data_porciva01" style="<?php echo $sStyleHidden_porciva01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porciva01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porciva01"]) &&  $this->nmgp_cmp_readonly["porciva01"] == "on") { 

 ?>
<input type="hidden" name="porciva01" value="<?php echo $this->form_encode_input($porciva01) . "\">" . $porciva01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_porciva01" class="sc-ui-readonly-porciva01 css_porciva01_line" style="<?php echo $sStyleReadLab_porciva01; ?>"><?php echo $this->form_format_readonly("porciva01", $this->form_encode_input($this->porciva01)); ?></span><span id="id_read_off_porciva01" class="css_read_off_porciva01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porciva01; ?>">
 <input class="sc-js-input scFormObjectOdd css_porciva01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porciva01" type=text name="porciva01" value="<?php echo $this->form_encode_input($porciva01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porciva01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porciva01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porciva01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porciva01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porciva01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porciva01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['prodsinsdo01']))
    {
        $this->nm_new_label['prodsinsdo01'] = "Prodsinsdo 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prodsinsdo01 = $this->prodsinsdo01;
   $sStyleHidden_prodsinsdo01 = '';
   if (isset($this->nmgp_cmp_hidden['prodsinsdo01']) && $this->nmgp_cmp_hidden['prodsinsdo01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prodsinsdo01']);
       $sStyleHidden_prodsinsdo01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prodsinsdo01 = 'display: none;';
   $sStyleReadInp_prodsinsdo01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prodsinsdo01']) && $this->nmgp_cmp_readonly['prodsinsdo01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prodsinsdo01']);
       $sStyleReadLab_prodsinsdo01 = '';
       $sStyleReadInp_prodsinsdo01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prodsinsdo01']) && $this->nmgp_cmp_hidden['prodsinsdo01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prodsinsdo01" value="<?php echo $this->form_encode_input($prodsinsdo01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_prodsinsdo01_label" id="hidden_field_label_prodsinsdo01" style="<?php echo $sStyleHidden_prodsinsdo01; ?>"><span id="id_label_prodsinsdo01"><?php echo $this->nm_new_label['prodsinsdo01']; ?></span></TD>
    <TD class="scFormDataOdd css_prodsinsdo01_line" id="hidden_field_data_prodsinsdo01" style="<?php echo $sStyleHidden_prodsinsdo01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prodsinsdo01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prodsinsdo01"]) &&  $this->nmgp_cmp_readonly["prodsinsdo01"] == "on") { 

 ?>
<input type="hidden" name="prodsinsdo01" value="<?php echo $this->form_encode_input($prodsinsdo01) . "\">" . $prodsinsdo01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_prodsinsdo01" class="sc-ui-readonly-prodsinsdo01 css_prodsinsdo01_line" style="<?php echo $sStyleReadLab_prodsinsdo01; ?>"><?php echo $this->form_format_readonly("prodsinsdo01", $this->form_encode_input($this->prodsinsdo01)); ?></span><span id="id_read_off_prodsinsdo01" class="css_read_off_prodsinsdo01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_prodsinsdo01; ?>">
 <input class="sc-js-input scFormObjectOdd css_prodsinsdo01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_prodsinsdo01" type=text name="prodsinsdo01" value="<?php echo $this->form_encode_input($prodsinsdo01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prodsinsdo01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prodsinsdo01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sinprec01']))
    {
        $this->nm_new_label['sinprec01'] = "Sinprec 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sinprec01 = $this->sinprec01;
   $sStyleHidden_sinprec01 = '';
   if (isset($this->nmgp_cmp_hidden['sinprec01']) && $this->nmgp_cmp_hidden['sinprec01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sinprec01']);
       $sStyleHidden_sinprec01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sinprec01 = 'display: none;';
   $sStyleReadInp_sinprec01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sinprec01']) && $this->nmgp_cmp_readonly['sinprec01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sinprec01']);
       $sStyleReadLab_sinprec01 = '';
       $sStyleReadInp_sinprec01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sinprec01']) && $this->nmgp_cmp_hidden['sinprec01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sinprec01" value="<?php echo $this->form_encode_input($sinprec01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sinprec01_label" id="hidden_field_label_sinprec01" style="<?php echo $sStyleHidden_sinprec01; ?>"><span id="id_label_sinprec01"><?php echo $this->nm_new_label['sinprec01']; ?></span></TD>
    <TD class="scFormDataOdd css_sinprec01_line" id="hidden_field_data_sinprec01" style="<?php echo $sStyleHidden_sinprec01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sinprec01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sinprec01"]) &&  $this->nmgp_cmp_readonly["sinprec01"] == "on") { 

 ?>
<input type="hidden" name="sinprec01" value="<?php echo $this->form_encode_input($sinprec01) . "\">" . $sinprec01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_sinprec01" class="sc-ui-readonly-sinprec01 css_sinprec01_line" style="<?php echo $sStyleReadLab_sinprec01; ?>"><?php echo $this->form_format_readonly("sinprec01", $this->form_encode_input($this->sinprec01)); ?></span><span id="id_read_off_sinprec01" class="css_read_off_sinprec01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sinprec01; ?>">
 <input class="sc-js-input scFormObjectOdd css_sinprec01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sinprec01" type=text name="sinprec01" value="<?php echo $this->form_encode_input($sinprec01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sinprec01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sinprec01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fotoprod01']))
    {
        $this->nm_new_label['fotoprod01'] = "Fotoprod 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fotoprod01 = $this->fotoprod01;
   $sStyleHidden_fotoprod01 = '';
   if (isset($this->nmgp_cmp_hidden['fotoprod01']) && $this->nmgp_cmp_hidden['fotoprod01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fotoprod01']);
       $sStyleHidden_fotoprod01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fotoprod01 = 'display: none;';
   $sStyleReadInp_fotoprod01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fotoprod01']) && $this->nmgp_cmp_readonly['fotoprod01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fotoprod01']);
       $sStyleReadLab_fotoprod01 = '';
       $sStyleReadInp_fotoprod01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fotoprod01']) && $this->nmgp_cmp_hidden['fotoprod01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fotoprod01" value="<?php echo $this->form_encode_input($fotoprod01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fotoprod01_label" id="hidden_field_label_fotoprod01" style="<?php echo $sStyleHidden_fotoprod01; ?>"><span id="id_label_fotoprod01"><?php echo $this->nm_new_label['fotoprod01']; ?></span></TD>
    <TD class="scFormDataOdd css_fotoprod01_line" id="hidden_field_data_fotoprod01" style="<?php echo $sStyleHidden_fotoprod01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fotoprod01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fotoprod01"]) &&  $this->nmgp_cmp_readonly["fotoprod01"] == "on") { 

 ?>
<input type="hidden" name="fotoprod01" value="<?php echo $this->form_encode_input($fotoprod01) . "\">" . $fotoprod01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fotoprod01" class="sc-ui-readonly-fotoprod01 css_fotoprod01_line" style="<?php echo $sStyleReadLab_fotoprod01; ?>"><?php echo $this->form_format_readonly("fotoprod01", $this->form_encode_input($this->fotoprod01)); ?></span><span id="id_read_off_fotoprod01" class="css_read_off_fotoprod01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fotoprod01; ?>">
 <input class="sc-js-input scFormObjectOdd css_fotoprod01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fotoprod01" type=text name="fotoprod01" value="<?php echo $this->form_encode_input($fotoprod01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fotoprod01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fotoprod01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detprod01']))
    {
        $this->nm_new_label['detprod01'] = "Detprod 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detprod01 = $this->detprod01;
   $sStyleHidden_detprod01 = '';
   if (isset($this->nmgp_cmp_hidden['detprod01']) && $this->nmgp_cmp_hidden['detprod01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detprod01']);
       $sStyleHidden_detprod01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detprod01 = 'display: none;';
   $sStyleReadInp_detprod01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detprod01']) && $this->nmgp_cmp_readonly['detprod01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detprod01']);
       $sStyleReadLab_detprod01 = '';
       $sStyleReadInp_detprod01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detprod01']) && $this->nmgp_cmp_hidden['detprod01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detprod01" value="<?php echo $this->form_encode_input($detprod01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_detprod01_label" id="hidden_field_label_detprod01" style="<?php echo $sStyleHidden_detprod01; ?>"><span id="id_label_detprod01"><?php echo $this->nm_new_label['detprod01']; ?></span></TD>
    <TD class="scFormDataOdd css_detprod01_line" id="hidden_field_data_detprod01" style="<?php echo $sStyleHidden_detprod01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_detprod01_line" style="vertical-align: top;padding: 0px">
<?php
$detprod01_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($detprod01));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["detprod01"]) &&  $this->nmgp_cmp_readonly["detprod01"] == "on") { 

 ?>
<input type="hidden" name="detprod01" value="<?php echo $this->form_encode_input($detprod01) . "\">" . $detprod01_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_detprod01" class="sc-ui-readonly-detprod01 css_detprod01_line" style="<?php echo $sStyleReadLab_detprod01; ?>"><?php echo $this->form_format_readonly("detprod01", $this->form_encode_input($detprod01_val)); ?></span><span id="id_read_off_detprod01" class="css_read_off_detprod01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_detprod01; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_detprod01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="detprod01" id="id_sc_field_detprod01" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $detprod01; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detprod01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detprod01_text"></span></td></tr></table></td></tr></table></TD>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_block_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_block_text"></span></td></tr></table></td></tr></table></TD>
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
    if (!isset($this->nm_new_label['ultimoacceso']))
    {
        $this->nm_new_label['ultimoacceso'] = "Ultimoacceso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_ultimoacceso = $this->ultimoacceso;
   if (strlen($this->ultimoacceso_hora) > 8 ) {$this->ultimoacceso_hora = substr($this->ultimoacceso_hora, 0, 8);}
   $this->ultimoacceso .= ' ' . $this->ultimoacceso_hora;
   $this->ultimoacceso  = trim($this->ultimoacceso);
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ultimoacceso_label" id="hidden_field_label_ultimoacceso" style="<?php echo $sStyleHidden_ultimoacceso; ?>"><span id="id_label_ultimoacceso"><?php echo $this->nm_new_label['ultimoacceso']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ultimoacceso']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ultimoacceso'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ultimoacceso_line" id="hidden_field_data_ultimoacceso" style="<?php echo $sStyleHidden_ultimoacceso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ultimoacceso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ultimoacceso"]) &&  $this->nmgp_cmp_readonly["ultimoacceso"] == "on") { 

 ?>
<input type="hidden" name="ultimoacceso" value="<?php echo $this->form_encode_input($ultimoacceso) . "\">" . $ultimoacceso . ""; ?>
<?php } else { ?>
<span id="id_read_on_ultimoacceso" class="sc-ui-readonly-ultimoacceso css_ultimoacceso_line" style="<?php echo $sStyleReadLab_ultimoacceso; ?>"><?php echo $this->form_format_readonly("ultimoacceso", $this->form_encode_input($ultimoacceso)); ?></span><span id="id_read_off_ultimoacceso" class="css_read_off_ultimoacceso<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ultimoacceso; ?>"><?php
$tmp_form_data = $this->field_config['ultimoacceso']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_ultimoacceso_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ultimoacceso" type=text name="ultimoacceso" value="<?php echo $this->form_encode_input($ultimoacceso) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['ultimoacceso']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['ultimoacceso']['date_format']; ?>', timeSep: '<?php echo $this->field_config['ultimoacceso']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ultimoacceso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ultimoacceso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->ultimoacceso = $old_dt_ultimoacceso;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idpro']))
    {
        $this->nm_new_label['idpro'] = "Idpro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpro = $this->idpro;
   $sStyleHidden_idpro = '';
   if (isset($this->nmgp_cmp_hidden['idpro']) && $this->nmgp_cmp_hidden['idpro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpro']);
       $sStyleHidden_idpro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpro = 'display: none;';
   $sStyleReadInp_idpro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idpro']) && $this->nmgp_cmp_readonly['idpro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpro']);
       $sStyleReadLab_idpro = '';
       $sStyleReadInp_idpro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpro']) && $this->nmgp_cmp_hidden['idpro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpro" value="<?php echo $this->form_encode_input($idpro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_idpro_label" id="hidden_field_label_idpro" style="<?php echo $sStyleHidden_idpro; ?>"><span id="id_label_idpro"><?php echo $this->nm_new_label['idpro']; ?></span></TD>
    <TD class="scFormDataOdd css_idpro_line" id="hidden_field_data_idpro" style="<?php echo $sStyleHidden_idpro; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpro_line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idpro" class="css_idpro_line" style="<?php echo $sStyleReadLab_idpro; ?>"><?php echo $this->form_format_readonly("idpro", $this->form_encode_input($this->idpro)); ?></span><span id="id_read_off_idpro" class="css_read_off_idpro" style="<?php echo $sStyleReadInp_idpro; ?>"><input type="hidden" name="idpro" value="<?php echo $this->form_encode_input($idpro) . "\">"?><span id="id_ajax_label_idpro"><?php echo nl2br($idpro); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpro_text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['catprod01']))
    {
        $this->nm_new_label['catprod01'] = "Catprod 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $catprod01 = $this->catprod01;
   $sStyleHidden_catprod01 = '';
   if (isset($this->nmgp_cmp_hidden['catprod01']) && $this->nmgp_cmp_hidden['catprod01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['catprod01']);
       $sStyleHidden_catprod01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_catprod01 = 'display: none;';
   $sStyleReadInp_catprod01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['catprod01']) && $this->nmgp_cmp_readonly['catprod01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['catprod01']);
       $sStyleReadLab_catprod01 = '';
       $sStyleReadInp_catprod01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['catprod01']) && $this->nmgp_cmp_hidden['catprod01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="catprod01" value="<?php echo $this->form_encode_input($catprod01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_catprod01_label" id="hidden_field_label_catprod01" style="<?php echo $sStyleHidden_catprod01; ?>"><span id="id_label_catprod01"><?php echo $this->nm_new_label['catprod01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['catprod01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['catprod01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_catprod01_line" id="hidden_field_data_catprod01" style="<?php echo $sStyleHidden_catprod01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_catprod01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["catprod01"]) &&  $this->nmgp_cmp_readonly["catprod01"] == "on") { 

 ?>
<input type="hidden" name="catprod01" value="<?php echo $this->form_encode_input($catprod01) . "\">" . $catprod01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_catprod01" class="sc-ui-readonly-catprod01 css_catprod01_line" style="<?php echo $sStyleReadLab_catprod01; ?>"><?php echo $this->form_format_readonly("catprod01", $this->form_encode_input($this->catprod01)); ?></span><span id="id_read_off_catprod01" class="css_read_off_catprod01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_catprod01; ?>">
 <input class="sc-js-input scFormObjectOdd css_catprod01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_catprod01" type=text name="catprod01" value="<?php echo $this->form_encode_input($catprod01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_catprod01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_catprod01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['med401']))
    {
        $this->nm_new_label['med401'] = "Med 401";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $med401 = $this->med401;
   $sStyleHidden_med401 = '';
   if (isset($this->nmgp_cmp_hidden['med401']) && $this->nmgp_cmp_hidden['med401'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['med401']);
       $sStyleHidden_med401 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_med401 = 'display: none;';
   $sStyleReadInp_med401 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['med401']) && $this->nmgp_cmp_readonly['med401'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['med401']);
       $sStyleReadLab_med401 = '';
       $sStyleReadInp_med401 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['med401']) && $this->nmgp_cmp_hidden['med401'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="med401" value="<?php echo $this->form_encode_input($med401) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_med401_label" id="hidden_field_label_med401" style="<?php echo $sStyleHidden_med401; ?>"><span id="id_label_med401"><?php echo $this->nm_new_label['med401']; ?></span></TD>
    <TD class="scFormDataOdd css_med401_line" id="hidden_field_data_med401" style="<?php echo $sStyleHidden_med401; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_med401_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["med401"]) &&  $this->nmgp_cmp_readonly["med401"] == "on") { 

 ?>
<input type="hidden" name="med401" value="<?php echo $this->form_encode_input($med401) . "\">" . $med401 . ""; ?>
<?php } else { ?>
<span id="id_read_on_med401" class="sc-ui-readonly-med401 css_med401_line" style="<?php echo $sStyleReadLab_med401; ?>"><?php echo $this->form_format_readonly("med401", $this->form_encode_input($this->med401)); ?></span><span id="id_read_off_med401" class="css_read_off_med401<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_med401; ?>">
 <input class="sc-js-input scFormObjectOdd css_med401_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_med401" type=text name="med401" value="<?php echo $this->form_encode_input($med401) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 5, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['med401']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['med401']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['med401']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['med401']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_med401_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_med401_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['med501']))
    {
        $this->nm_new_label['med501'] = "Med 501";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $med501 = $this->med501;
   $sStyleHidden_med501 = '';
   if (isset($this->nmgp_cmp_hidden['med501']) && $this->nmgp_cmp_hidden['med501'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['med501']);
       $sStyleHidden_med501 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_med501 = 'display: none;';
   $sStyleReadInp_med501 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['med501']) && $this->nmgp_cmp_readonly['med501'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['med501']);
       $sStyleReadLab_med501 = '';
       $sStyleReadInp_med501 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['med501']) && $this->nmgp_cmp_hidden['med501'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="med501" value="<?php echo $this->form_encode_input($med501) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_med501_label" id="hidden_field_label_med501" style="<?php echo $sStyleHidden_med501; ?>"><span id="id_label_med501"><?php echo $this->nm_new_label['med501']; ?></span></TD>
    <TD class="scFormDataOdd css_med501_line" id="hidden_field_data_med501" style="<?php echo $sStyleHidden_med501; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_med501_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["med501"]) &&  $this->nmgp_cmp_readonly["med501"] == "on") { 

 ?>
<input type="hidden" name="med501" value="<?php echo $this->form_encode_input($med501) . "\">" . $med501 . ""; ?>
<?php } else { ?>
<span id="id_read_on_med501" class="sc-ui-readonly-med501 css_med501_line" style="<?php echo $sStyleReadLab_med501; ?>"><?php echo $this->form_format_readonly("med501", $this->form_encode_input($this->med501)); ?></span><span id="id_read_off_med501" class="css_read_off_med501<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_med501; ?>">
 <input class="sc-js-input scFormObjectOdd css_med501_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_med501" type=text name="med501" value="<?php echo $this->form_encode_input($med501) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 5, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['med501']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['med501']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['med501']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['med501']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_med501_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_med501_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['prodconmed01']))
    {
        $this->nm_new_label['prodconmed01'] = "Prodconmed 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prodconmed01 = $this->prodconmed01;
   $sStyleHidden_prodconmed01 = '';
   if (isset($this->nmgp_cmp_hidden['prodconmed01']) && $this->nmgp_cmp_hidden['prodconmed01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prodconmed01']);
       $sStyleHidden_prodconmed01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prodconmed01 = 'display: none;';
   $sStyleReadInp_prodconmed01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prodconmed01']) && $this->nmgp_cmp_readonly['prodconmed01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prodconmed01']);
       $sStyleReadLab_prodconmed01 = '';
       $sStyleReadInp_prodconmed01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prodconmed01']) && $this->nmgp_cmp_hidden['prodconmed01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prodconmed01" value="<?php echo $this->form_encode_input($prodconmed01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_prodconmed01_label" id="hidden_field_label_prodconmed01" style="<?php echo $sStyleHidden_prodconmed01; ?>"><span id="id_label_prodconmed01"><?php echo $this->nm_new_label['prodconmed01']; ?></span></TD>
    <TD class="scFormDataOdd css_prodconmed01_line" id="hidden_field_data_prodconmed01" style="<?php echo $sStyleHidden_prodconmed01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prodconmed01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prodconmed01"]) &&  $this->nmgp_cmp_readonly["prodconmed01"] == "on") { 

 ?>
<input type="hidden" name="prodconmed01" value="<?php echo $this->form_encode_input($prodconmed01) . "\">" . $prodconmed01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_prodconmed01" class="sc-ui-readonly-prodconmed01 css_prodconmed01_line" style="<?php echo $sStyleReadLab_prodconmed01; ?>"><?php echo $this->form_format_readonly("prodconmed01", $this->form_encode_input($this->prodconmed01)); ?></span><span id="id_read_off_prodconmed01" class="css_read_off_prodconmed01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_prodconmed01; ?>">
 <input class="sc-js-input scFormObjectOdd css_prodconmed01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_prodconmed01" type=text name="prodconmed01" value="<?php echo $this->form_encode_input($prodconmed01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prodconmed01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prodconmed01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['factorpeso01']))
    {
        $this->nm_new_label['factorpeso01'] = "Factorpeso 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $factorpeso01 = $this->factorpeso01;
   $sStyleHidden_factorpeso01 = '';
   if (isset($this->nmgp_cmp_hidden['factorpeso01']) && $this->nmgp_cmp_hidden['factorpeso01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['factorpeso01']);
       $sStyleHidden_factorpeso01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_factorpeso01 = 'display: none;';
   $sStyleReadInp_factorpeso01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['factorpeso01']) && $this->nmgp_cmp_readonly['factorpeso01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['factorpeso01']);
       $sStyleReadLab_factorpeso01 = '';
       $sStyleReadInp_factorpeso01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['factorpeso01']) && $this->nmgp_cmp_hidden['factorpeso01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="factorpeso01" value="<?php echo $this->form_encode_input($factorpeso01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_factorpeso01_label" id="hidden_field_label_factorpeso01" style="<?php echo $sStyleHidden_factorpeso01; ?>"><span id="id_label_factorpeso01"><?php echo $this->nm_new_label['factorpeso01']; ?></span></TD>
    <TD class="scFormDataOdd css_factorpeso01_line" id="hidden_field_data_factorpeso01" style="<?php echo $sStyleHidden_factorpeso01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_factorpeso01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["factorpeso01"]) &&  $this->nmgp_cmp_readonly["factorpeso01"] == "on") { 

 ?>
<input type="hidden" name="factorpeso01" value="<?php echo $this->form_encode_input($factorpeso01) . "\">" . $factorpeso01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_factorpeso01" class="sc-ui-readonly-factorpeso01 css_factorpeso01_line" style="<?php echo $sStyleReadLab_factorpeso01; ?>"><?php echo $this->form_format_readonly("factorpeso01", $this->form_encode_input($this->factorpeso01)); ?></span><span id="id_read_off_factorpeso01" class="css_read_off_factorpeso01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_factorpeso01; ?>">
 <input class="sc-js-input scFormObjectOdd css_factorpeso01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_factorpeso01" type=text name="factorpeso01" value="<?php echo $this->form_encode_input($factorpeso01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_factorpeso01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_factorpeso01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codbar01']))
    {
        $this->nm_new_label['codbar01'] = "Codbar 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codbar01 = $this->codbar01;
   $sStyleHidden_codbar01 = '';
   if (isset($this->nmgp_cmp_hidden['codbar01']) && $this->nmgp_cmp_hidden['codbar01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codbar01']);
       $sStyleHidden_codbar01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codbar01 = 'display: none;';
   $sStyleReadInp_codbar01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codbar01']) && $this->nmgp_cmp_readonly['codbar01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codbar01']);
       $sStyleReadLab_codbar01 = '';
       $sStyleReadInp_codbar01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codbar01']) && $this->nmgp_cmp_hidden['codbar01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codbar01" value="<?php echo $this->form_encode_input($codbar01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codbar01_label" id="hidden_field_label_codbar01" style="<?php echo $sStyleHidden_codbar01; ?>"><span id="id_label_codbar01"><?php echo $this->nm_new_label['codbar01']; ?></span></TD>
    <TD class="scFormDataOdd css_codbar01_line" id="hidden_field_data_codbar01" style="<?php echo $sStyleHidden_codbar01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codbar01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codbar01"]) &&  $this->nmgp_cmp_readonly["codbar01"] == "on") { 

 ?>
<input type="hidden" name="codbar01" value="<?php echo $this->form_encode_input($codbar01) . "\">" . $codbar01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_codbar01" class="sc-ui-readonly-codbar01 css_codbar01_line" style="<?php echo $sStyleReadLab_codbar01; ?>"><?php echo $this->form_format_readonly("codbar01", $this->form_encode_input($this->codbar01)); ?></span><span id="id_read_off_codbar01" class="css_read_off_codbar01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codbar01; ?>">
 <input class="sc-js-input scFormObjectOdd css_codbar01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codbar01" type=text name="codbar01" value="<?php echo $this->form_encode_input($codbar01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codbar01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codbar01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['unifrac01']))
    {
        $this->nm_new_label['unifrac01'] = "Unifrac 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unifrac01 = $this->unifrac01;
   $sStyleHidden_unifrac01 = '';
   if (isset($this->nmgp_cmp_hidden['unifrac01']) && $this->nmgp_cmp_hidden['unifrac01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unifrac01']);
       $sStyleHidden_unifrac01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unifrac01 = 'display: none;';
   $sStyleReadInp_unifrac01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unifrac01']) && $this->nmgp_cmp_readonly['unifrac01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unifrac01']);
       $sStyleReadLab_unifrac01 = '';
       $sStyleReadInp_unifrac01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unifrac01']) && $this->nmgp_cmp_hidden['unifrac01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unifrac01" value="<?php echo $this->form_encode_input($unifrac01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_unifrac01_label" id="hidden_field_label_unifrac01" style="<?php echo $sStyleHidden_unifrac01; ?>"><span id="id_label_unifrac01"><?php echo $this->nm_new_label['unifrac01']; ?></span></TD>
    <TD class="scFormDataOdd css_unifrac01_line" id="hidden_field_data_unifrac01" style="<?php echo $sStyleHidden_unifrac01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unifrac01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unifrac01"]) &&  $this->nmgp_cmp_readonly["unifrac01"] == "on") { 

 ?>
<input type="hidden" name="unifrac01" value="<?php echo $this->form_encode_input($unifrac01) . "\">" . $unifrac01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_unifrac01" class="sc-ui-readonly-unifrac01 css_unifrac01_line" style="<?php echo $sStyleReadLab_unifrac01; ?>"><?php echo $this->form_format_readonly("unifrac01", $this->form_encode_input($this->unifrac01)); ?></span><span id="id_read_off_unifrac01" class="css_read_off_unifrac01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unifrac01; ?>">
 <input class="sc-js-input scFormObjectOdd css_unifrac01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unifrac01" type=text name="unifrac01" value="<?php echo $this->form_encode_input($unifrac01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unifrac01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unifrac01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['calidad01']))
    {
        $this->nm_new_label['calidad01'] = "Calidad 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $calidad01 = $this->calidad01;
   $sStyleHidden_calidad01 = '';
   if (isset($this->nmgp_cmp_hidden['calidad01']) && $this->nmgp_cmp_hidden['calidad01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['calidad01']);
       $sStyleHidden_calidad01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_calidad01 = 'display: none;';
   $sStyleReadInp_calidad01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['calidad01']) && $this->nmgp_cmp_readonly['calidad01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['calidad01']);
       $sStyleReadLab_calidad01 = '';
       $sStyleReadInp_calidad01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['calidad01']) && $this->nmgp_cmp_hidden['calidad01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="calidad01" value="<?php echo $this->form_encode_input($calidad01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_calidad01_label" id="hidden_field_label_calidad01" style="<?php echo $sStyleHidden_calidad01; ?>"><span id="id_label_calidad01"><?php echo $this->nm_new_label['calidad01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['calidad01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['calidad01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_calidad01_line" id="hidden_field_data_calidad01" style="<?php echo $sStyleHidden_calidad01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_calidad01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["calidad01"]) &&  $this->nmgp_cmp_readonly["calidad01"] == "on") { 

 ?>
<input type="hidden" name="calidad01" value="<?php echo $this->form_encode_input($calidad01) . "\">" . $calidad01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_calidad01" class="sc-ui-readonly-calidad01 css_calidad01_line" style="<?php echo $sStyleReadLab_calidad01; ?>"><?php echo $this->form_format_readonly("calidad01", $this->form_encode_input($this->calidad01)); ?></span><span id="id_read_off_calidad01" class="css_read_off_calidad01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_calidad01; ?>">
 <input class="sc-js-input scFormObjectOdd css_calidad01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_calidad01" type=text name="calidad01" value="<?php echo $this->form_encode_input($calidad01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_calidad01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_calidad01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['color01']))
    {
        $this->nm_new_label['color01'] = "Color 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $color01 = $this->color01;
   $sStyleHidden_color01 = '';
   if (isset($this->nmgp_cmp_hidden['color01']) && $this->nmgp_cmp_hidden['color01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['color01']);
       $sStyleHidden_color01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_color01 = 'display: none;';
   $sStyleReadInp_color01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['color01']) && $this->nmgp_cmp_readonly['color01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['color01']);
       $sStyleReadLab_color01 = '';
       $sStyleReadInp_color01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['color01']) && $this->nmgp_cmp_hidden['color01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="color01" value="<?php echo $this->form_encode_input($color01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_color01_label" id="hidden_field_label_color01" style="<?php echo $sStyleHidden_color01; ?>"><span id="id_label_color01"><?php echo $this->nm_new_label['color01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['color01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['color01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_color01_line" id="hidden_field_data_color01" style="<?php echo $sStyleHidden_color01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_color01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["color01"]) &&  $this->nmgp_cmp_readonly["color01"] == "on") { 

 ?>
<input type="hidden" name="color01" value="<?php echo $this->form_encode_input($color01) . "\">" . $color01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_color01" class="sc-ui-readonly-color01 css_color01_line" style="<?php echo $sStyleReadLab_color01; ?>"><?php echo $this->form_format_readonly("color01", $this->form_encode_input($this->color01)); ?></span><span id="id_read_off_color01" class="css_read_off_color01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_color01; ?>">
 <input class="sc-js-input scFormObjectOdd css_color01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_color01" type=text name="color01" value="<?php echo $this->form_encode_input($color01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_color01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_color01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['material01']))
    {
        $this->nm_new_label['material01'] = "Material 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $material01 = $this->material01;
   $sStyleHidden_material01 = '';
   if (isset($this->nmgp_cmp_hidden['material01']) && $this->nmgp_cmp_hidden['material01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['material01']);
       $sStyleHidden_material01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_material01 = 'display: none;';
   $sStyleReadInp_material01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['material01']) && $this->nmgp_cmp_readonly['material01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['material01']);
       $sStyleReadLab_material01 = '';
       $sStyleReadInp_material01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['material01']) && $this->nmgp_cmp_hidden['material01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="material01" value="<?php echo $this->form_encode_input($material01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_material01_label" id="hidden_field_label_material01" style="<?php echo $sStyleHidden_material01; ?>"><span id="id_label_material01"><?php echo $this->nm_new_label['material01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['material01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['material01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_material01_line" id="hidden_field_data_material01" style="<?php echo $sStyleHidden_material01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_material01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["material01"]) &&  $this->nmgp_cmp_readonly["material01"] == "on") { 

 ?>
<input type="hidden" name="material01" value="<?php echo $this->form_encode_input($material01) . "\">" . $material01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_material01" class="sc-ui-readonly-material01 css_material01_line" style="<?php echo $sStyleReadLab_material01; ?>"><?php echo $this->form_format_readonly("material01", $this->form_encode_input($this->material01)); ?></span><span id="id_read_off_material01" class="css_read_off_material01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_material01; ?>">
 <input class="sc-js-input scFormObjectOdd css_material01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_material01" type=text name="material01" value="<?php echo $this->form_encode_input($material01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_material01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_material01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['talla01']))
    {
        $this->nm_new_label['talla01'] = "Talla 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $talla01 = $this->talla01;
   $sStyleHidden_talla01 = '';
   if (isset($this->nmgp_cmp_hidden['talla01']) && $this->nmgp_cmp_hidden['talla01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['talla01']);
       $sStyleHidden_talla01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_talla01 = 'display: none;';
   $sStyleReadInp_talla01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['talla01']) && $this->nmgp_cmp_readonly['talla01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['talla01']);
       $sStyleReadLab_talla01 = '';
       $sStyleReadInp_talla01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['talla01']) && $this->nmgp_cmp_hidden['talla01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="talla01" value="<?php echo $this->form_encode_input($talla01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_talla01_label" id="hidden_field_label_talla01" style="<?php echo $sStyleHidden_talla01; ?>"><span id="id_label_talla01"><?php echo $this->nm_new_label['talla01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['talla01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['talla01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_talla01_line" id="hidden_field_data_talla01" style="<?php echo $sStyleHidden_talla01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_talla01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["talla01"]) &&  $this->nmgp_cmp_readonly["talla01"] == "on") { 

 ?>
<input type="hidden" name="talla01" value="<?php echo $this->form_encode_input($talla01) . "\">" . $talla01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_talla01" class="sc-ui-readonly-talla01 css_talla01_line" style="<?php echo $sStyleReadLab_talla01; ?>"><?php echo $this->form_format_readonly("talla01", $this->form_encode_input($this->talla01)); ?></span><span id="id_read_off_talla01" class="css_read_off_talla01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_talla01; ?>">
 <input class="sc-js-input scFormObjectOdd css_talla01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_talla01" type=text name="talla01" value="<?php echo $this->form_encode_input($talla01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_talla01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_talla01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['compuesto01']))
    {
        $this->nm_new_label['compuesto01'] = "Compuesto 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $compuesto01 = $this->compuesto01;
   $sStyleHidden_compuesto01 = '';
   if (isset($this->nmgp_cmp_hidden['compuesto01']) && $this->nmgp_cmp_hidden['compuesto01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['compuesto01']);
       $sStyleHidden_compuesto01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_compuesto01 = 'display: none;';
   $sStyleReadInp_compuesto01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['compuesto01']) && $this->nmgp_cmp_readonly['compuesto01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['compuesto01']);
       $sStyleReadLab_compuesto01 = '';
       $sStyleReadInp_compuesto01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['compuesto01']) && $this->nmgp_cmp_hidden['compuesto01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="compuesto01" value="<?php echo $this->form_encode_input($compuesto01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_compuesto01_label" id="hidden_field_label_compuesto01" style="<?php echo $sStyleHidden_compuesto01; ?>"><span id="id_label_compuesto01"><?php echo $this->nm_new_label['compuesto01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['compuesto01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['compuesto01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_compuesto01_line" id="hidden_field_data_compuesto01" style="<?php echo $sStyleHidden_compuesto01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_compuesto01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["compuesto01"]) &&  $this->nmgp_cmp_readonly["compuesto01"] == "on") { 

 ?>
<input type="hidden" name="compuesto01" value="<?php echo $this->form_encode_input($compuesto01) . "\">" . $compuesto01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_compuesto01" class="sc-ui-readonly-compuesto01 css_compuesto01_line" style="<?php echo $sStyleReadLab_compuesto01; ?>"><?php echo $this->form_format_readonly("compuesto01", $this->form_encode_input($this->compuesto01)); ?></span><span id="id_read_off_compuesto01" class="css_read_off_compuesto01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_compuesto01; ?>">
 <input class="sc-js-input scFormObjectOdd css_compuesto01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_compuesto01" type=text name="compuesto01" value="<?php echo $this->form_encode_input($compuesto01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_compuesto01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_compuesto01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['catalt01']))
    {
        $this->nm_new_label['catalt01'] = "Catalt 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $catalt01 = $this->catalt01;
   $sStyleHidden_catalt01 = '';
   if (isset($this->nmgp_cmp_hidden['catalt01']) && $this->nmgp_cmp_hidden['catalt01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['catalt01']);
       $sStyleHidden_catalt01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_catalt01 = 'display: none;';
   $sStyleReadInp_catalt01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['catalt01']) && $this->nmgp_cmp_readonly['catalt01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['catalt01']);
       $sStyleReadLab_catalt01 = '';
       $sStyleReadInp_catalt01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['catalt01']) && $this->nmgp_cmp_hidden['catalt01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="catalt01" value="<?php echo $this->form_encode_input($catalt01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_catalt01_label" id="hidden_field_label_catalt01" style="<?php echo $sStyleHidden_catalt01; ?>"><span id="id_label_catalt01"><?php echo $this->nm_new_label['catalt01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['catalt01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['catalt01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_catalt01_line" id="hidden_field_data_catalt01" style="<?php echo $sStyleHidden_catalt01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_catalt01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["catalt01"]) &&  $this->nmgp_cmp_readonly["catalt01"] == "on") { 

 ?>
<input type="hidden" name="catalt01" value="<?php echo $this->form_encode_input($catalt01) . "\">" . $catalt01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_catalt01" class="sc-ui-readonly-catalt01 css_catalt01_line" style="<?php echo $sStyleReadLab_catalt01; ?>"><?php echo $this->form_format_readonly("catalt01", $this->form_encode_input($this->catalt01)); ?></span><span id="id_read_off_catalt01" class="css_read_off_catalt01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_catalt01; ?>">
 <input class="sc-js-input scFormObjectOdd css_catalt01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_catalt01" type=text name="catalt01" value="<?php echo $this->form_encode_input($catalt01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_catalt01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_catalt01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precfob01']))
    {
        $this->nm_new_label['precfob01'] = "Precfob 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precfob01 = $this->precfob01;
   $sStyleHidden_precfob01 = '';
   if (isset($this->nmgp_cmp_hidden['precfob01']) && $this->nmgp_cmp_hidden['precfob01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precfob01']);
       $sStyleHidden_precfob01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precfob01 = 'display: none;';
   $sStyleReadInp_precfob01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precfob01']) && $this->nmgp_cmp_readonly['precfob01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precfob01']);
       $sStyleReadLab_precfob01 = '';
       $sStyleReadInp_precfob01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precfob01']) && $this->nmgp_cmp_hidden['precfob01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precfob01" value="<?php echo $this->form_encode_input($precfob01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precfob01_label" id="hidden_field_label_precfob01" style="<?php echo $sStyleHidden_precfob01; ?>"><span id="id_label_precfob01"><?php echo $this->nm_new_label['precfob01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['precfob01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['precfob01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_precfob01_line" id="hidden_field_data_precfob01" style="<?php echo $sStyleHidden_precfob01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precfob01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precfob01"]) &&  $this->nmgp_cmp_readonly["precfob01"] == "on") { 

 ?>
<input type="hidden" name="precfob01" value="<?php echo $this->form_encode_input($precfob01) . "\">" . $precfob01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precfob01" class="sc-ui-readonly-precfob01 css_precfob01_line" style="<?php echo $sStyleReadLab_precfob01; ?>"><?php echo $this->form_format_readonly("precfob01", $this->form_encode_input($this->precfob01)); ?></span><span id="id_read_off_precfob01" class="css_read_off_precfob01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precfob01; ?>">
 <input class="sc-js-input scFormObjectOdd css_precfob01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precfob01" type=text name="precfob01" value="<?php echo $this->form_encode_input($precfob01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precfob01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precfob01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precfob01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precfob01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precfob01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precfob01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio401']))
    {
        $this->nm_new_label['precio401'] = "Precio 401";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio401 = $this->precio401;
   $sStyleHidden_precio401 = '';
   if (isset($this->nmgp_cmp_hidden['precio401']) && $this->nmgp_cmp_hidden['precio401'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio401']);
       $sStyleHidden_precio401 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio401 = 'display: none;';
   $sStyleReadInp_precio401 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio401']) && $this->nmgp_cmp_readonly['precio401'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio401']);
       $sStyleReadLab_precio401 = '';
       $sStyleReadInp_precio401 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio401']) && $this->nmgp_cmp_hidden['precio401'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio401" value="<?php echo $this->form_encode_input($precio401) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio401_label" id="hidden_field_label_precio401" style="<?php echo $sStyleHidden_precio401; ?>"><span id="id_label_precio401"><?php echo $this->nm_new_label['precio401']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['precio401']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['precio401'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_precio401_line" id="hidden_field_data_precio401" style="<?php echo $sStyleHidden_precio401; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio401_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio401"]) &&  $this->nmgp_cmp_readonly["precio401"] == "on") { 

 ?>
<input type="hidden" name="precio401" value="<?php echo $this->form_encode_input($precio401) . "\">" . $precio401 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio401" class="sc-ui-readonly-precio401 css_precio401_line" style="<?php echo $sStyleReadLab_precio401; ?>"><?php echo $this->form_format_readonly("precio401", $this->form_encode_input($this->precio401)); ?></span><span id="id_read_off_precio401" class="css_read_off_precio401<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio401; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio401_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio401" type=text name="precio401" value="<?php echo $this->form_encode_input($precio401) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio401']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio401']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio401']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio401']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio401_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio401_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto401']))
    {
        $this->nm_new_label['descto401'] = "Descto 401";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto401 = $this->descto401;
   $sStyleHidden_descto401 = '';
   if (isset($this->nmgp_cmp_hidden['descto401']) && $this->nmgp_cmp_hidden['descto401'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto401']);
       $sStyleHidden_descto401 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto401 = 'display: none;';
   $sStyleReadInp_descto401 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto401']) && $this->nmgp_cmp_readonly['descto401'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto401']);
       $sStyleReadLab_descto401 = '';
       $sStyleReadInp_descto401 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto401']) && $this->nmgp_cmp_hidden['descto401'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto401" value="<?php echo $this->form_encode_input($descto401) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto401_label" id="hidden_field_label_descto401" style="<?php echo $sStyleHidden_descto401; ?>"><span id="id_label_descto401"><?php echo $this->nm_new_label['descto401']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto401']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto401'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_descto401_line" id="hidden_field_data_descto401" style="<?php echo $sStyleHidden_descto401; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto401_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto401"]) &&  $this->nmgp_cmp_readonly["descto401"] == "on") { 

 ?>
<input type="hidden" name="descto401" value="<?php echo $this->form_encode_input($descto401) . "\">" . $descto401 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto401" class="sc-ui-readonly-descto401 css_descto401_line" style="<?php echo $sStyleReadLab_descto401; ?>"><?php echo $this->form_format_readonly("descto401", $this->form_encode_input($this->descto401)); ?></span><span id="id_read_off_descto401" class="css_read_off_descto401<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto401; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto401_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto401" type=text name="descto401" value="<?php echo $this->form_encode_input($descto401) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto401']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto401']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto401']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto401']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto401_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto401_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porigen01']))
    {
        $this->nm_new_label['porigen01'] = "Porigen 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porigen01 = $this->porigen01;
   $sStyleHidden_porigen01 = '';
   if (isset($this->nmgp_cmp_hidden['porigen01']) && $this->nmgp_cmp_hidden['porigen01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porigen01']);
       $sStyleHidden_porigen01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porigen01 = 'display: none;';
   $sStyleReadInp_porigen01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porigen01']) && $this->nmgp_cmp_readonly['porigen01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porigen01']);
       $sStyleReadLab_porigen01 = '';
       $sStyleReadInp_porigen01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porigen01']) && $this->nmgp_cmp_hidden['porigen01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porigen01" value="<?php echo $this->form_encode_input($porigen01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porigen01_label" id="hidden_field_label_porigen01" style="<?php echo $sStyleHidden_porigen01; ?>"><span id="id_label_porigen01"><?php echo $this->nm_new_label['porigen01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['porigen01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['porigen01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_porigen01_line" id="hidden_field_data_porigen01" style="<?php echo $sStyleHidden_porigen01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porigen01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porigen01"]) &&  $this->nmgp_cmp_readonly["porigen01"] == "on") { 

 ?>
<input type="hidden" name="porigen01" value="<?php echo $this->form_encode_input($porigen01) . "\">" . $porigen01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_porigen01" class="sc-ui-readonly-porigen01 css_porigen01_line" style="<?php echo $sStyleReadLab_porigen01; ?>"><?php echo $this->form_format_readonly("porigen01", $this->form_encode_input($this->porigen01)); ?></span><span id="id_read_off_porigen01" class="css_read_off_porigen01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porigen01; ?>">
 <input class="sc-js-input scFormObjectOdd css_porigen01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porigen01" type=text name="porigen01" value="<?php echo $this->form_encode_input($porigen01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porigen01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porigen01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rin01']))
    {
        $this->nm_new_label['rin01'] = "Rin 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rin01 = $this->rin01;
   $sStyleHidden_rin01 = '';
   if (isset($this->nmgp_cmp_hidden['rin01']) && $this->nmgp_cmp_hidden['rin01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rin01']);
       $sStyleHidden_rin01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rin01 = 'display: none;';
   $sStyleReadInp_rin01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rin01']) && $this->nmgp_cmp_readonly['rin01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rin01']);
       $sStyleReadLab_rin01 = '';
       $sStyleReadInp_rin01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rin01']) && $this->nmgp_cmp_hidden['rin01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rin01" value="<?php echo $this->form_encode_input($rin01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rin01_label" id="hidden_field_label_rin01" style="<?php echo $sStyleHidden_rin01; ?>"><span id="id_label_rin01"><?php echo $this->nm_new_label['rin01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['rin01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['rin01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_rin01_line" id="hidden_field_data_rin01" style="<?php echo $sStyleHidden_rin01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rin01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rin01"]) &&  $this->nmgp_cmp_readonly["rin01"] == "on") { 

 ?>
<input type="hidden" name="rin01" value="<?php echo $this->form_encode_input($rin01) . "\">" . $rin01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_rin01" class="sc-ui-readonly-rin01 css_rin01_line" style="<?php echo $sStyleReadLab_rin01; ?>"><?php echo $this->form_format_readonly("rin01", $this->form_encode_input($this->rin01)); ?></span><span id="id_read_off_rin01" class="css_read_off_rin01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rin01; ?>">
 <input class="sc-js-input scFormObjectOdd css_rin01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rin01" type=text name="rin01" value="<?php echo $this->form_encode_input($rin01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rin01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rin01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['marca01']))
    {
        $this->nm_new_label['marca01'] = "Marca 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $marca01 = $this->marca01;
   $sStyleHidden_marca01 = '';
   if (isset($this->nmgp_cmp_hidden['marca01']) && $this->nmgp_cmp_hidden['marca01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['marca01']);
       $sStyleHidden_marca01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_marca01 = 'display: none;';
   $sStyleReadInp_marca01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['marca01']) && $this->nmgp_cmp_readonly['marca01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['marca01']);
       $sStyleReadLab_marca01 = '';
       $sStyleReadInp_marca01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['marca01']) && $this->nmgp_cmp_hidden['marca01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="marca01" value="<?php echo $this->form_encode_input($marca01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_marca01_label" id="hidden_field_label_marca01" style="<?php echo $sStyleHidden_marca01; ?>"><span id="id_label_marca01"><?php echo $this->nm_new_label['marca01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['marca01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['marca01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_marca01_line" id="hidden_field_data_marca01" style="<?php echo $sStyleHidden_marca01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_marca01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["marca01"]) &&  $this->nmgp_cmp_readonly["marca01"] == "on") { 

 ?>
<input type="hidden" name="marca01" value="<?php echo $this->form_encode_input($marca01) . "\">" . $marca01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_marca01" class="sc-ui-readonly-marca01 css_marca01_line" style="<?php echo $sStyleReadLab_marca01; ?>"><?php echo $this->form_format_readonly("marca01", $this->form_encode_input($this->marca01)); ?></span><span id="id_read_off_marca01" class="css_read_off_marca01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_marca01; ?>">
 <input class="sc-js-input scFormObjectOdd css_marca01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_marca01" type=text name="marca01" value="<?php echo $this->form_encode_input($marca01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_marca01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_marca01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['alto01']))
    {
        $this->nm_new_label['alto01'] = "Alto 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $alto01 = $this->alto01;
   $sStyleHidden_alto01 = '';
   if (isset($this->nmgp_cmp_hidden['alto01']) && $this->nmgp_cmp_hidden['alto01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['alto01']);
       $sStyleHidden_alto01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_alto01 = 'display: none;';
   $sStyleReadInp_alto01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['alto01']) && $this->nmgp_cmp_readonly['alto01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['alto01']);
       $sStyleReadLab_alto01 = '';
       $sStyleReadInp_alto01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['alto01']) && $this->nmgp_cmp_hidden['alto01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="alto01" value="<?php echo $this->form_encode_input($alto01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_alto01_label" id="hidden_field_label_alto01" style="<?php echo $sStyleHidden_alto01; ?>"><span id="id_label_alto01"><?php echo $this->nm_new_label['alto01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['alto01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['alto01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_alto01_line" id="hidden_field_data_alto01" style="<?php echo $sStyleHidden_alto01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_alto01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["alto01"]) &&  $this->nmgp_cmp_readonly["alto01"] == "on") { 

 ?>
<input type="hidden" name="alto01" value="<?php echo $this->form_encode_input($alto01) . "\">" . $alto01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_alto01" class="sc-ui-readonly-alto01 css_alto01_line" style="<?php echo $sStyleReadLab_alto01; ?>"><?php echo $this->form_format_readonly("alto01", $this->form_encode_input($this->alto01)); ?></span><span id="id_read_off_alto01" class="css_read_off_alto01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_alto01; ?>">
 <input class="sc-js-input scFormObjectOdd css_alto01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_alto01" type=text name="alto01" value="<?php echo $this->form_encode_input($alto01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alto01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alto01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ancho01']))
    {
        $this->nm_new_label['ancho01'] = "Ancho 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ancho01 = $this->ancho01;
   $sStyleHidden_ancho01 = '';
   if (isset($this->nmgp_cmp_hidden['ancho01']) && $this->nmgp_cmp_hidden['ancho01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ancho01']);
       $sStyleHidden_ancho01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ancho01 = 'display: none;';
   $sStyleReadInp_ancho01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ancho01']) && $this->nmgp_cmp_readonly['ancho01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ancho01']);
       $sStyleReadLab_ancho01 = '';
       $sStyleReadInp_ancho01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ancho01']) && $this->nmgp_cmp_hidden['ancho01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ancho01" value="<?php echo $this->form_encode_input($ancho01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ancho01_label" id="hidden_field_label_ancho01" style="<?php echo $sStyleHidden_ancho01; ?>"><span id="id_label_ancho01"><?php echo $this->nm_new_label['ancho01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ancho01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ancho01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ancho01_line" id="hidden_field_data_ancho01" style="<?php echo $sStyleHidden_ancho01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ancho01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ancho01"]) &&  $this->nmgp_cmp_readonly["ancho01"] == "on") { 

 ?>
<input type="hidden" name="ancho01" value="<?php echo $this->form_encode_input($ancho01) . "\">" . $ancho01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ancho01" class="sc-ui-readonly-ancho01 css_ancho01_line" style="<?php echo $sStyleReadLab_ancho01; ?>"><?php echo $this->form_format_readonly("ancho01", $this->form_encode_input($this->ancho01)); ?></span><span id="id_read_off_ancho01" class="css_read_off_ancho01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ancho01; ?>">
 <input class="sc-js-input scFormObjectOdd css_ancho01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ancho01" type=text name="ancho01" value="<?php echo $this->form_encode_input($ancho01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ancho01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ancho01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipoletra01']))
    {
        $this->nm_new_label['tipoletra01'] = "Tipoletra 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipoletra01 = $this->tipoletra01;
   $sStyleHidden_tipoletra01 = '';
   if (isset($this->nmgp_cmp_hidden['tipoletra01']) && $this->nmgp_cmp_hidden['tipoletra01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipoletra01']);
       $sStyleHidden_tipoletra01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipoletra01 = 'display: none;';
   $sStyleReadInp_tipoletra01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipoletra01']) && $this->nmgp_cmp_readonly['tipoletra01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipoletra01']);
       $sStyleReadLab_tipoletra01 = '';
       $sStyleReadInp_tipoletra01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipoletra01']) && $this->nmgp_cmp_hidden['tipoletra01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipoletra01" value="<?php echo $this->form_encode_input($tipoletra01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipoletra01_label" id="hidden_field_label_tipoletra01" style="<?php echo $sStyleHidden_tipoletra01; ?>"><span id="id_label_tipoletra01"><?php echo $this->nm_new_label['tipoletra01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['tipoletra01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['tipoletra01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tipoletra01_line" id="hidden_field_data_tipoletra01" style="<?php echo $sStyleHidden_tipoletra01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipoletra01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipoletra01"]) &&  $this->nmgp_cmp_readonly["tipoletra01"] == "on") { 

 ?>
<input type="hidden" name="tipoletra01" value="<?php echo $this->form_encode_input($tipoletra01) . "\">" . $tipoletra01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipoletra01" class="sc-ui-readonly-tipoletra01 css_tipoletra01_line" style="<?php echo $sStyleReadLab_tipoletra01; ?>"><?php echo $this->form_format_readonly("tipoletra01", $this->form_encode_input($this->tipoletra01)); ?></span><span id="id_read_off_tipoletra01" class="css_read_off_tipoletra01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipoletra01; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipoletra01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipoletra01" type=text name="tipoletra01" value="<?php echo $this->form_encode_input($tipoletra01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipoletra01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipoletra01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['indcarga01']))
    {
        $this->nm_new_label['indcarga01'] = "Indcarga 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $indcarga01 = $this->indcarga01;
   $sStyleHidden_indcarga01 = '';
   if (isset($this->nmgp_cmp_hidden['indcarga01']) && $this->nmgp_cmp_hidden['indcarga01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['indcarga01']);
       $sStyleHidden_indcarga01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_indcarga01 = 'display: none;';
   $sStyleReadInp_indcarga01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['indcarga01']) && $this->nmgp_cmp_readonly['indcarga01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['indcarga01']);
       $sStyleReadLab_indcarga01 = '';
       $sStyleReadInp_indcarga01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['indcarga01']) && $this->nmgp_cmp_hidden['indcarga01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="indcarga01" value="<?php echo $this->form_encode_input($indcarga01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_indcarga01_label" id="hidden_field_label_indcarga01" style="<?php echo $sStyleHidden_indcarga01; ?>"><span id="id_label_indcarga01"><?php echo $this->nm_new_label['indcarga01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['indcarga01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['indcarga01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_indcarga01_line" id="hidden_field_data_indcarga01" style="<?php echo $sStyleHidden_indcarga01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_indcarga01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["indcarga01"]) &&  $this->nmgp_cmp_readonly["indcarga01"] == "on") { 

 ?>
<input type="hidden" name="indcarga01" value="<?php echo $this->form_encode_input($indcarga01) . "\">" . $indcarga01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_indcarga01" class="sc-ui-readonly-indcarga01 css_indcarga01_line" style="<?php echo $sStyleReadLab_indcarga01; ?>"><?php echo $this->form_format_readonly("indcarga01", $this->form_encode_input($this->indcarga01)); ?></span><span id="id_read_off_indcarga01" class="css_read_off_indcarga01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_indcarga01; ?>">
 <input class="sc-js-input scFormObjectOdd css_indcarga01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_indcarga01" type=text name="indcarga01" value="<?php echo $this->form_encode_input($indcarga01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_indcarga01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_indcarga01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['indveloc01']))
    {
        $this->nm_new_label['indveloc01'] = "Indveloc 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $indveloc01 = $this->indveloc01;
   $sStyleHidden_indveloc01 = '';
   if (isset($this->nmgp_cmp_hidden['indveloc01']) && $this->nmgp_cmp_hidden['indveloc01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['indveloc01']);
       $sStyleHidden_indveloc01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_indveloc01 = 'display: none;';
   $sStyleReadInp_indveloc01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['indveloc01']) && $this->nmgp_cmp_readonly['indveloc01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['indveloc01']);
       $sStyleReadLab_indveloc01 = '';
       $sStyleReadInp_indveloc01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['indveloc01']) && $this->nmgp_cmp_hidden['indveloc01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="indveloc01" value="<?php echo $this->form_encode_input($indveloc01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_indveloc01_label" id="hidden_field_label_indveloc01" style="<?php echo $sStyleHidden_indveloc01; ?>"><span id="id_label_indveloc01"><?php echo $this->nm_new_label['indveloc01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['indveloc01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['indveloc01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_indveloc01_line" id="hidden_field_data_indveloc01" style="<?php echo $sStyleHidden_indveloc01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_indveloc01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["indveloc01"]) &&  $this->nmgp_cmp_readonly["indveloc01"] == "on") { 

 ?>
<input type="hidden" name="indveloc01" value="<?php echo $this->form_encode_input($indveloc01) . "\">" . $indveloc01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_indveloc01" class="sc-ui-readonly-indveloc01 css_indveloc01_line" style="<?php echo $sStyleReadLab_indveloc01; ?>"><?php echo $this->form_format_readonly("indveloc01", $this->form_encode_input($this->indveloc01)); ?></span><span id="id_read_off_indveloc01" class="css_read_off_indveloc01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_indveloc01; ?>">
 <input class="sc-js-input scFormObjectOdd css_indveloc01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_indveloc01" type=text name="indveloc01" value="<?php echo $this->form_encode_input($indveloc01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_indveloc01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_indveloc01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pr01']))
    {
        $this->nm_new_label['pr01'] = "Pr 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pr01 = $this->pr01;
   $sStyleHidden_pr01 = '';
   if (isset($this->nmgp_cmp_hidden['pr01']) && $this->nmgp_cmp_hidden['pr01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pr01']);
       $sStyleHidden_pr01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pr01 = 'display: none;';
   $sStyleReadInp_pr01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pr01']) && $this->nmgp_cmp_readonly['pr01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pr01']);
       $sStyleReadLab_pr01 = '';
       $sStyleReadInp_pr01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pr01']) && $this->nmgp_cmp_hidden['pr01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pr01" value="<?php echo $this->form_encode_input($pr01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pr01_label" id="hidden_field_label_pr01" style="<?php echo $sStyleHidden_pr01; ?>"><span id="id_label_pr01"><?php echo $this->nm_new_label['pr01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['pr01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['pr01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_pr01_line" id="hidden_field_data_pr01" style="<?php echo $sStyleHidden_pr01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pr01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pr01"]) &&  $this->nmgp_cmp_readonly["pr01"] == "on") { 

 ?>
<input type="hidden" name="pr01" value="<?php echo $this->form_encode_input($pr01) . "\">" . $pr01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_pr01" class="sc-ui-readonly-pr01 css_pr01_line" style="<?php echo $sStyleReadLab_pr01; ?>"><?php echo $this->form_format_readonly("pr01", $this->form_encode_input($this->pr01)); ?></span><span id="id_read_off_pr01" class="css_read_off_pr01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pr01; ?>">
 <input class="sc-js-input scFormObjectOdd css_pr01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pr01" type=text name="pr01" value="<?php echo $this->form_encode_input($pr01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pr01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pr01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dis01']))
    {
        $this->nm_new_label['dis01'] = "Dis 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dis01 = $this->dis01;
   $sStyleHidden_dis01 = '';
   if (isset($this->nmgp_cmp_hidden['dis01']) && $this->nmgp_cmp_hidden['dis01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dis01']);
       $sStyleHidden_dis01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dis01 = 'display: none;';
   $sStyleReadInp_dis01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dis01']) && $this->nmgp_cmp_readonly['dis01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dis01']);
       $sStyleReadLab_dis01 = '';
       $sStyleReadInp_dis01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dis01']) && $this->nmgp_cmp_hidden['dis01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dis01" value="<?php echo $this->form_encode_input($dis01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dis01_label" id="hidden_field_label_dis01" style="<?php echo $sStyleHidden_dis01; ?>"><span id="id_label_dis01"><?php echo $this->nm_new_label['dis01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['dis01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['dis01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_dis01_line" id="hidden_field_data_dis01" style="<?php echo $sStyleHidden_dis01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dis01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dis01"]) &&  $this->nmgp_cmp_readonly["dis01"] == "on") { 

 ?>
<input type="hidden" name="dis01" value="<?php echo $this->form_encode_input($dis01) . "\">" . $dis01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_dis01" class="sc-ui-readonly-dis01 css_dis01_line" style="<?php echo $sStyleReadLab_dis01; ?>"><?php echo $this->form_format_readonly("dis01", $this->form_encode_input($this->dis01)); ?></span><span id="id_read_off_dis01" class="css_read_off_dis01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dis01; ?>">
 <input class="sc-js-input scFormObjectOdd css_dis01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dis01" type=text name="dis01" value="<?php echo $this->form_encode_input($dis01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dis01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dis01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipocons01']))
    {
        $this->nm_new_label['tipocons01'] = "Tipocons 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipocons01 = $this->tipocons01;
   $sStyleHidden_tipocons01 = '';
   if (isset($this->nmgp_cmp_hidden['tipocons01']) && $this->nmgp_cmp_hidden['tipocons01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipocons01']);
       $sStyleHidden_tipocons01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipocons01 = 'display: none;';
   $sStyleReadInp_tipocons01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipocons01']) && $this->nmgp_cmp_readonly['tipocons01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipocons01']);
       $sStyleReadLab_tipocons01 = '';
       $sStyleReadInp_tipocons01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipocons01']) && $this->nmgp_cmp_hidden['tipocons01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipocons01" value="<?php echo $this->form_encode_input($tipocons01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipocons01_label" id="hidden_field_label_tipocons01" style="<?php echo $sStyleHidden_tipocons01; ?>"><span id="id_label_tipocons01"><?php echo $this->nm_new_label['tipocons01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['tipocons01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['tipocons01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tipocons01_line" id="hidden_field_data_tipocons01" style="<?php echo $sStyleHidden_tipocons01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipocons01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipocons01"]) &&  $this->nmgp_cmp_readonly["tipocons01"] == "on") { 

 ?>
<input type="hidden" name="tipocons01" value="<?php echo $this->form_encode_input($tipocons01) . "\">" . $tipocons01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipocons01" class="sc-ui-readonly-tipocons01 css_tipocons01_line" style="<?php echo $sStyleReadLab_tipocons01; ?>"><?php echo $this->form_format_readonly("tipocons01", $this->form_encode_input($this->tipocons01)); ?></span><span id="id_read_off_tipocons01" class="css_read_off_tipocons01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipocons01; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipocons01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipocons01" type=text name="tipocons01" value="<?php echo $this->form_encode_input($tipocons01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipocons01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipocons01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precateg01']))
    {
        $this->nm_new_label['precateg01'] = "Precateg 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precateg01 = $this->precateg01;
   $sStyleHidden_precateg01 = '';
   if (isset($this->nmgp_cmp_hidden['precateg01']) && $this->nmgp_cmp_hidden['precateg01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precateg01']);
       $sStyleHidden_precateg01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precateg01 = 'display: none;';
   $sStyleReadInp_precateg01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precateg01']) && $this->nmgp_cmp_readonly['precateg01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precateg01']);
       $sStyleReadLab_precateg01 = '';
       $sStyleReadInp_precateg01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precateg01']) && $this->nmgp_cmp_hidden['precateg01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precateg01" value="<?php echo $this->form_encode_input($precateg01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precateg01_label" id="hidden_field_label_precateg01" style="<?php echo $sStyleHidden_precateg01; ?>"><span id="id_label_precateg01"><?php echo $this->nm_new_label['precateg01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['precateg01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['precateg01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_precateg01_line" id="hidden_field_data_precateg01" style="<?php echo $sStyleHidden_precateg01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precateg01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precateg01"]) &&  $this->nmgp_cmp_readonly["precateg01"] == "on") { 

 ?>
<input type="hidden" name="precateg01" value="<?php echo $this->form_encode_input($precateg01) . "\">" . $precateg01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precateg01" class="sc-ui-readonly-precateg01 css_precateg01_line" style="<?php echo $sStyleReadLab_precateg01; ?>"><?php echo $this->form_format_readonly("precateg01", $this->form_encode_input($this->precateg01)); ?></span><span id="id_read_off_precateg01" class="css_read_off_precateg01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precateg01; ?>">
 <input class="sc-js-input scFormObjectOdd css_precateg01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precateg01" type=text name="precateg01" value="<?php echo $this->form_encode_input($precateg01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precateg01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precateg01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipprod01']))
    {
        $this->nm_new_label['tipprod01'] = "Tipprod 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipprod01 = $this->tipprod01;
   $sStyleHidden_tipprod01 = '';
   if (isset($this->nmgp_cmp_hidden['tipprod01']) && $this->nmgp_cmp_hidden['tipprod01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipprod01']);
       $sStyleHidden_tipprod01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipprod01 = 'display: none;';
   $sStyleReadInp_tipprod01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipprod01']) && $this->nmgp_cmp_readonly['tipprod01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipprod01']);
       $sStyleReadLab_tipprod01 = '';
       $sStyleReadInp_tipprod01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipprod01']) && $this->nmgp_cmp_hidden['tipprod01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipprod01" value="<?php echo $this->form_encode_input($tipprod01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipprod01_label" id="hidden_field_label_tipprod01" style="<?php echo $sStyleHidden_tipprod01; ?>"><span id="id_label_tipprod01"><?php echo $this->nm_new_label['tipprod01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['tipprod01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['tipprod01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tipprod01_line" id="hidden_field_data_tipprod01" style="<?php echo $sStyleHidden_tipprod01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipprod01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipprod01"]) &&  $this->nmgp_cmp_readonly["tipprod01"] == "on") { 

 ?>
<input type="hidden" name="tipprod01" value="<?php echo $this->form_encode_input($tipprod01) . "\">" . $tipprod01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipprod01" class="sc-ui-readonly-tipprod01 css_tipprod01_line" style="<?php echo $sStyleReadLab_tipprod01; ?>"><?php echo $this->form_format_readonly("tipprod01", $this->form_encode_input($this->tipprod01)); ?></span><span id="id_read_off_tipprod01" class="css_read_off_tipprod01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipprod01; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipprod01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipprod01" type=text name="tipprod01" value="<?php echo $this->form_encode_input($tipprod01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipprod01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipprod01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['conversion01']))
    {
        $this->nm_new_label['conversion01'] = "Conversion 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conversion01 = $this->conversion01;
   $sStyleHidden_conversion01 = '';
   if (isset($this->nmgp_cmp_hidden['conversion01']) && $this->nmgp_cmp_hidden['conversion01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conversion01']);
       $sStyleHidden_conversion01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conversion01 = 'display: none;';
   $sStyleReadInp_conversion01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conversion01']) && $this->nmgp_cmp_readonly['conversion01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conversion01']);
       $sStyleReadLab_conversion01 = '';
       $sStyleReadInp_conversion01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conversion01']) && $this->nmgp_cmp_hidden['conversion01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="conversion01" value="<?php echo $this->form_encode_input($conversion01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_conversion01_label" id="hidden_field_label_conversion01" style="<?php echo $sStyleHidden_conversion01; ?>"><span id="id_label_conversion01"><?php echo $this->nm_new_label['conversion01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['conversion01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['conversion01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_conversion01_line" id="hidden_field_data_conversion01" style="<?php echo $sStyleHidden_conversion01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_conversion01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["conversion01"]) &&  $this->nmgp_cmp_readonly["conversion01"] == "on") { 

 ?>
<input type="hidden" name="conversion01" value="<?php echo $this->form_encode_input($conversion01) . "\">" . $conversion01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_conversion01" class="sc-ui-readonly-conversion01 css_conversion01_line" style="<?php echo $sStyleReadLab_conversion01; ?>"><?php echo $this->form_format_readonly("conversion01", $this->form_encode_input($this->conversion01)); ?></span><span id="id_read_off_conversion01" class="css_read_off_conversion01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_conversion01; ?>">
 <input class="sc-js-input scFormObjectOdd css_conversion01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_conversion01" type=text name="conversion01" value="<?php echo $this->form_encode_input($conversion01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['conversion01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['conversion01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['conversion01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['conversion01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conversion01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conversion01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valhom01']))
    {
        $this->nm_new_label['valhom01'] = "Valhom 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valhom01 = $this->valhom01;
   $sStyleHidden_valhom01 = '';
   if (isset($this->nmgp_cmp_hidden['valhom01']) && $this->nmgp_cmp_hidden['valhom01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valhom01']);
       $sStyleHidden_valhom01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valhom01 = 'display: none;';
   $sStyleReadInp_valhom01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valhom01']) && $this->nmgp_cmp_readonly['valhom01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valhom01']);
       $sStyleReadLab_valhom01 = '';
       $sStyleReadInp_valhom01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valhom01']) && $this->nmgp_cmp_hidden['valhom01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valhom01" value="<?php echo $this->form_encode_input($valhom01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valhom01_label" id="hidden_field_label_valhom01" style="<?php echo $sStyleHidden_valhom01; ?>"><span id="id_label_valhom01"><?php echo $this->nm_new_label['valhom01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['valhom01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['valhom01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_valhom01_line" id="hidden_field_data_valhom01" style="<?php echo $sStyleHidden_valhom01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valhom01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valhom01"]) &&  $this->nmgp_cmp_readonly["valhom01"] == "on") { 

 ?>
<input type="hidden" name="valhom01" value="<?php echo $this->form_encode_input($valhom01) . "\">" . $valhom01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valhom01" class="sc-ui-readonly-valhom01 css_valhom01_line" style="<?php echo $sStyleReadLab_valhom01; ?>"><?php echo $this->form_format_readonly("valhom01", $this->form_encode_input($this->valhom01)); ?></span><span id="id_read_off_valhom01" class="css_read_off_valhom01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valhom01; ?>">
 <input class="sc-js-input scFormObjectOdd css_valhom01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valhom01" type=text name="valhom01" value="<?php echo $this->form_encode_input($valhom01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valhom01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valhom01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valhom01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valhom01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valhom01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valhom01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ctain401']))
    {
        $this->nm_new_label['ctain401'] = "Ctain 401";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ctain401 = $this->ctain401;
   $sStyleHidden_ctain401 = '';
   if (isset($this->nmgp_cmp_hidden['ctain401']) && $this->nmgp_cmp_hidden['ctain401'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ctain401']);
       $sStyleHidden_ctain401 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ctain401 = 'display: none;';
   $sStyleReadInp_ctain401 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ctain401']) && $this->nmgp_cmp_readonly['ctain401'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ctain401']);
       $sStyleReadLab_ctain401 = '';
       $sStyleReadInp_ctain401 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ctain401']) && $this->nmgp_cmp_hidden['ctain401'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ctain401" value="<?php echo $this->form_encode_input($ctain401) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ctain401_label" id="hidden_field_label_ctain401" style="<?php echo $sStyleHidden_ctain401; ?>"><span id="id_label_ctain401"><?php echo $this->nm_new_label['ctain401']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ctain401']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['ctain401'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ctain401_line" id="hidden_field_data_ctain401" style="<?php echo $sStyleHidden_ctain401; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ctain401_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ctain401"]) &&  $this->nmgp_cmp_readonly["ctain401"] == "on") { 

 ?>
<input type="hidden" name="ctain401" value="<?php echo $this->form_encode_input($ctain401) . "\">" . $ctain401 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ctain401" class="sc-ui-readonly-ctain401 css_ctain401_line" style="<?php echo $sStyleReadLab_ctain401; ?>"><?php echo $this->form_format_readonly("ctain401", $this->form_encode_input($this->ctain401)); ?></span><span id="id_read_off_ctain401" class="css_read_off_ctain401<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ctain401; ?>">
 <input class="sc-js-input scFormObjectOdd css_ctain401_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ctain401" type=text name="ctain401" value="<?php echo $this->form_encode_input($ctain401) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ctain401_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ctain401_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valhom02']))
    {
        $this->nm_new_label['valhom02'] = "Valhom 02";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valhom02 = $this->valhom02;
   $sStyleHidden_valhom02 = '';
   if (isset($this->nmgp_cmp_hidden['valhom02']) && $this->nmgp_cmp_hidden['valhom02'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valhom02']);
       $sStyleHidden_valhom02 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valhom02 = 'display: none;';
   $sStyleReadInp_valhom02 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valhom02']) && $this->nmgp_cmp_readonly['valhom02'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valhom02']);
       $sStyleReadLab_valhom02 = '';
       $sStyleReadInp_valhom02 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valhom02']) && $this->nmgp_cmp_hidden['valhom02'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valhom02" value="<?php echo $this->form_encode_input($valhom02) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valhom02_label" id="hidden_field_label_valhom02" style="<?php echo $sStyleHidden_valhom02; ?>"><span id="id_label_valhom02"><?php echo $this->nm_new_label['valhom02']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['valhom02']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['valhom02'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_valhom02_line" id="hidden_field_data_valhom02" style="<?php echo $sStyleHidden_valhom02; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valhom02_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valhom02"]) &&  $this->nmgp_cmp_readonly["valhom02"] == "on") { 

 ?>
<input type="hidden" name="valhom02" value="<?php echo $this->form_encode_input($valhom02) . "\">" . $valhom02 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valhom02" class="sc-ui-readonly-valhom02 css_valhom02_line" style="<?php echo $sStyleReadLab_valhom02; ?>"><?php echo $this->form_format_readonly("valhom02", $this->form_encode_input($this->valhom02)); ?></span><span id="id_read_off_valhom02" class="css_read_off_valhom02<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valhom02; ?>">
 <input class="sc-js-input scFormObjectOdd css_valhom02_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valhom02" type=text name="valhom02" value="<?php echo $this->form_encode_input($valhom02) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valhom02']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valhom02']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valhom02']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valhom02']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valhom02_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valhom02_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valhom03']))
    {
        $this->nm_new_label['valhom03'] = "Valhom 03";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valhom03 = $this->valhom03;
   $sStyleHidden_valhom03 = '';
   if (isset($this->nmgp_cmp_hidden['valhom03']) && $this->nmgp_cmp_hidden['valhom03'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valhom03']);
       $sStyleHidden_valhom03 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valhom03 = 'display: none;';
   $sStyleReadInp_valhom03 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valhom03']) && $this->nmgp_cmp_readonly['valhom03'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valhom03']);
       $sStyleReadLab_valhom03 = '';
       $sStyleReadInp_valhom03 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valhom03']) && $this->nmgp_cmp_hidden['valhom03'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valhom03" value="<?php echo $this->form_encode_input($valhom03) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valhom03_label" id="hidden_field_label_valhom03" style="<?php echo $sStyleHidden_valhom03; ?>"><span id="id_label_valhom03"><?php echo $this->nm_new_label['valhom03']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['valhom03']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['valhom03'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_valhom03_line" id="hidden_field_data_valhom03" style="<?php echo $sStyleHidden_valhom03; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valhom03_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valhom03"]) &&  $this->nmgp_cmp_readonly["valhom03"] == "on") { 

 ?>
<input type="hidden" name="valhom03" value="<?php echo $this->form_encode_input($valhom03) . "\">" . $valhom03 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valhom03" class="sc-ui-readonly-valhom03 css_valhom03_line" style="<?php echo $sStyleReadLab_valhom03; ?>"><?php echo $this->form_format_readonly("valhom03", $this->form_encode_input($this->valhom03)); ?></span><span id="id_read_off_valhom03" class="css_read_off_valhom03<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valhom03; ?>">
 <input class="sc-js-input scFormObjectOdd css_valhom03_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valhom03" type=text name="valhom03" value="<?php echo $this->form_encode_input($valhom03) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valhom03']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valhom03']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valhom03']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valhom03']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valhom03_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valhom03_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valhom04']))
    {
        $this->nm_new_label['valhom04'] = "Valhom 04";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valhom04 = $this->valhom04;
   $sStyleHidden_valhom04 = '';
   if (isset($this->nmgp_cmp_hidden['valhom04']) && $this->nmgp_cmp_hidden['valhom04'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valhom04']);
       $sStyleHidden_valhom04 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valhom04 = 'display: none;';
   $sStyleReadInp_valhom04 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valhom04']) && $this->nmgp_cmp_readonly['valhom04'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valhom04']);
       $sStyleReadLab_valhom04 = '';
       $sStyleReadInp_valhom04 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valhom04']) && $this->nmgp_cmp_hidden['valhom04'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valhom04" value="<?php echo $this->form_encode_input($valhom04) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valhom04_label" id="hidden_field_label_valhom04" style="<?php echo $sStyleHidden_valhom04; ?>"><span id="id_label_valhom04"><?php echo $this->nm_new_label['valhom04']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['valhom04']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['valhom04'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_valhom04_line" id="hidden_field_data_valhom04" style="<?php echo $sStyleHidden_valhom04; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valhom04_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valhom04"]) &&  $this->nmgp_cmp_readonly["valhom04"] == "on") { 

 ?>
<input type="hidden" name="valhom04" value="<?php echo $this->form_encode_input($valhom04) . "\">" . $valhom04 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valhom04" class="sc-ui-readonly-valhom04 css_valhom04_line" style="<?php echo $sStyleReadLab_valhom04; ?>"><?php echo $this->form_format_readonly("valhom04", $this->form_encode_input($this->valhom04)); ?></span><span id="id_read_off_valhom04" class="css_read_off_valhom04<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valhom04; ?>">
 <input class="sc-js-input scFormObjectOdd css_valhom04_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valhom04" type=text name="valhom04" value="<?php echo $this->form_encode_input($valhom04) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valhom04']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valhom04']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valhom04']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valhom04']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valhom04_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valhom04_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['statuspro01']))
    {
        $this->nm_new_label['statuspro01'] = "Statuspro 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $statuspro01 = $this->statuspro01;
   $sStyleHidden_statuspro01 = '';
   if (isset($this->nmgp_cmp_hidden['statuspro01']) && $this->nmgp_cmp_hidden['statuspro01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['statuspro01']);
       $sStyleHidden_statuspro01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_statuspro01 = 'display: none;';
   $sStyleReadInp_statuspro01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['statuspro01']) && $this->nmgp_cmp_readonly['statuspro01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['statuspro01']);
       $sStyleReadLab_statuspro01 = '';
       $sStyleReadInp_statuspro01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['statuspro01']) && $this->nmgp_cmp_hidden['statuspro01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="statuspro01" value="<?php echo $this->form_encode_input($statuspro01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_statuspro01_label" id="hidden_field_label_statuspro01" style="<?php echo $sStyleHidden_statuspro01; ?>"><span id="id_label_statuspro01"><?php echo $this->nm_new_label['statuspro01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['statuspro01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['statuspro01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_statuspro01_line" id="hidden_field_data_statuspro01" style="<?php echo $sStyleHidden_statuspro01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_statuspro01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["statuspro01"]) &&  $this->nmgp_cmp_readonly["statuspro01"] == "on") { 

 ?>
<input type="hidden" name="statuspro01" value="<?php echo $this->form_encode_input($statuspro01) . "\">" . $statuspro01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_statuspro01" class="sc-ui-readonly-statuspro01 css_statuspro01_line" style="<?php echo $sStyleReadLab_statuspro01; ?>"><?php echo $this->form_format_readonly("statuspro01", $this->form_encode_input($this->statuspro01)); ?></span><span id="id_read_off_statuspro01" class="css_read_off_statuspro01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_statuspro01; ?>">
 <input class="sc-js-input scFormObjectOdd css_statuspro01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_statuspro01" type=text name="statuspro01" value="<?php echo $this->form_encode_input($statuspro01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_statuspro01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_statuspro01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['parara01']))
    {
        $this->nm_new_label['parara01'] = "Parara 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $parara01 = $this->parara01;
   $sStyleHidden_parara01 = '';
   if (isset($this->nmgp_cmp_hidden['parara01']) && $this->nmgp_cmp_hidden['parara01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['parara01']);
       $sStyleHidden_parara01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_parara01 = 'display: none;';
   $sStyleReadInp_parara01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['parara01']) && $this->nmgp_cmp_readonly['parara01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['parara01']);
       $sStyleReadLab_parara01 = '';
       $sStyleReadInp_parara01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['parara01']) && $this->nmgp_cmp_hidden['parara01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="parara01" value="<?php echo $this->form_encode_input($parara01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_parara01_label" id="hidden_field_label_parara01" style="<?php echo $sStyleHidden_parara01; ?>"><span id="id_label_parara01"><?php echo $this->nm_new_label['parara01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['parara01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['parara01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_parara01_line" id="hidden_field_data_parara01" style="<?php echo $sStyleHidden_parara01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_parara01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["parara01"]) &&  $this->nmgp_cmp_readonly["parara01"] == "on") { 

 ?>
<input type="hidden" name="parara01" value="<?php echo $this->form_encode_input($parara01) . "\">" . $parara01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_parara01" class="sc-ui-readonly-parara01 css_parara01_line" style="<?php echo $sStyleReadLab_parara01; ?>"><?php echo $this->form_format_readonly("parara01", $this->form_encode_input($this->parara01)); ?></span><span id="id_read_off_parara01" class="css_read_off_parara01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_parara01; ?>">
 <input class="sc-js-input scFormObjectOdd css_parara01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_parara01" type=text name="parara01" value="<?php echo $this->form_encode_input($parara01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_parara01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_parara01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['prodequiv01']))
    {
        $this->nm_new_label['prodequiv01'] = "Prodequiv 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prodequiv01 = $this->prodequiv01;
   $sStyleHidden_prodequiv01 = '';
   if (isset($this->nmgp_cmp_hidden['prodequiv01']) && $this->nmgp_cmp_hidden['prodequiv01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prodequiv01']);
       $sStyleHidden_prodequiv01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prodequiv01 = 'display: none;';
   $sStyleReadInp_prodequiv01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prodequiv01']) && $this->nmgp_cmp_readonly['prodequiv01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prodequiv01']);
       $sStyleReadLab_prodequiv01 = '';
       $sStyleReadInp_prodequiv01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prodequiv01']) && $this->nmgp_cmp_hidden['prodequiv01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prodequiv01" value="<?php echo $this->form_encode_input($prodequiv01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_prodequiv01_label" id="hidden_field_label_prodequiv01" style="<?php echo $sStyleHidden_prodequiv01; ?>"><span id="id_label_prodequiv01"><?php echo $this->nm_new_label['prodequiv01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['prodequiv01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['prodequiv01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_prodequiv01_line" id="hidden_field_data_prodequiv01" style="<?php echo $sStyleHidden_prodequiv01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prodequiv01_line" style="vertical-align: top;padding: 0px">
<?php
$prodequiv01_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($prodequiv01));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prodequiv01"]) &&  $this->nmgp_cmp_readonly["prodequiv01"] == "on") { 

 ?>
<input type="hidden" name="prodequiv01" value="<?php echo $this->form_encode_input($prodequiv01) . "\">" . $prodequiv01_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_prodequiv01" class="sc-ui-readonly-prodequiv01 css_prodequiv01_line" style="<?php echo $sStyleReadLab_prodequiv01; ?>"><?php echo $this->form_format_readonly("prodequiv01", $this->form_encode_input($prodequiv01_val)); ?></span><span id="id_read_off_prodequiv01" class="css_read_off_prodequiv01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_prodequiv01; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_prodequiv01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="prodequiv01" id="id_sc_field_prodequiv01" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $prodequiv01; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prodequiv01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prodequiv01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['regalia01']))
    {
        $this->nm_new_label['regalia01'] = "Regalia 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $regalia01 = $this->regalia01;
   $sStyleHidden_regalia01 = '';
   if (isset($this->nmgp_cmp_hidden['regalia01']) && $this->nmgp_cmp_hidden['regalia01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['regalia01']);
       $sStyleHidden_regalia01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_regalia01 = 'display: none;';
   $sStyleReadInp_regalia01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['regalia01']) && $this->nmgp_cmp_readonly['regalia01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['regalia01']);
       $sStyleReadLab_regalia01 = '';
       $sStyleReadInp_regalia01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['regalia01']) && $this->nmgp_cmp_hidden['regalia01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="regalia01" value="<?php echo $this->form_encode_input($regalia01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_regalia01_label" id="hidden_field_label_regalia01" style="<?php echo $sStyleHidden_regalia01; ?>"><span id="id_label_regalia01"><?php echo $this->nm_new_label['regalia01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['regalia01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['regalia01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_regalia01_line" id="hidden_field_data_regalia01" style="<?php echo $sStyleHidden_regalia01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_regalia01_line" style="vertical-align: top;padding: 0px">
<?php
$regalia01_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($regalia01));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["regalia01"]) &&  $this->nmgp_cmp_readonly["regalia01"] == "on") { 

 ?>
<input type="hidden" name="regalia01" value="<?php echo $this->form_encode_input($regalia01) . "\">" . $regalia01_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_regalia01" class="sc-ui-readonly-regalia01 css_regalia01_line" style="<?php echo $sStyleReadLab_regalia01; ?>"><?php echo $this->form_format_readonly("regalia01", $this->form_encode_input($regalia01_val)); ?></span><span id="id_read_off_regalia01" class="css_read_off_regalia01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_regalia01; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_regalia01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="regalia01" id="id_sc_field_regalia01" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $regalia01; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_regalia01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_regalia01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio501']))
    {
        $this->nm_new_label['precio501'] = "Precio 501";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio501 = $this->precio501;
   $sStyleHidden_precio501 = '';
   if (isset($this->nmgp_cmp_hidden['precio501']) && $this->nmgp_cmp_hidden['precio501'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio501']);
       $sStyleHidden_precio501 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio501 = 'display: none;';
   $sStyleReadInp_precio501 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio501']) && $this->nmgp_cmp_readonly['precio501'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio501']);
       $sStyleReadLab_precio501 = '';
       $sStyleReadInp_precio501 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio501']) && $this->nmgp_cmp_hidden['precio501'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio501" value="<?php echo $this->form_encode_input($precio501) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio501_label" id="hidden_field_label_precio501" style="<?php echo $sStyleHidden_precio501; ?>"><span id="id_label_precio501"><?php echo $this->nm_new_label['precio501']; ?></span></TD>
    <TD class="scFormDataOdd css_precio501_line" id="hidden_field_data_precio501" style="<?php echo $sStyleHidden_precio501; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio501_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio501"]) &&  $this->nmgp_cmp_readonly["precio501"] == "on") { 

 ?>
<input type="hidden" name="precio501" value="<?php echo $this->form_encode_input($precio501) . "\">" . $precio501 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio501" class="sc-ui-readonly-precio501 css_precio501_line" style="<?php echo $sStyleReadLab_precio501; ?>"><?php echo $this->form_format_readonly("precio501", $this->form_encode_input($this->precio501)); ?></span><span id="id_read_off_precio501" class="css_read_off_precio501<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio501; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio501_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio501" type=text name="precio501" value="<?php echo $this->form_encode_input($precio501) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio501']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio501']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio501']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio501']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio501_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio501_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto501']))
    {
        $this->nm_new_label['descto501'] = "Descto 501";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto501 = $this->descto501;
   $sStyleHidden_descto501 = '';
   if (isset($this->nmgp_cmp_hidden['descto501']) && $this->nmgp_cmp_hidden['descto501'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto501']);
       $sStyleHidden_descto501 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto501 = 'display: none;';
   $sStyleReadInp_descto501 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto501']) && $this->nmgp_cmp_readonly['descto501'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto501']);
       $sStyleReadLab_descto501 = '';
       $sStyleReadInp_descto501 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto501']) && $this->nmgp_cmp_hidden['descto501'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto501" value="<?php echo $this->form_encode_input($descto501) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto501_label" id="hidden_field_label_descto501" style="<?php echo $sStyleHidden_descto501; ?>"><span id="id_label_descto501"><?php echo $this->nm_new_label['descto501']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto501']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto501'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_descto501_line" id="hidden_field_data_descto501" style="<?php echo $sStyleHidden_descto501; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto501_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto501"]) &&  $this->nmgp_cmp_readonly["descto501"] == "on") { 

 ?>
<input type="hidden" name="descto501" value="<?php echo $this->form_encode_input($descto501) . "\">" . $descto501 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto501" class="sc-ui-readonly-descto501 css_descto501_line" style="<?php echo $sStyleReadLab_descto501; ?>"><?php echo $this->form_format_readonly("descto501", $this->form_encode_input($this->descto501)); ?></span><span id="id_read_off_descto501" class="css_read_off_descto501<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto501; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto501_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto501" type=text name="descto501" value="<?php echo $this->form_encode_input($descto501) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto501']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto501']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto501']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto501']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto501_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto501_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio601']))
    {
        $this->nm_new_label['precio601'] = "Precio 601";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio601 = $this->precio601;
   $sStyleHidden_precio601 = '';
   if (isset($this->nmgp_cmp_hidden['precio601']) && $this->nmgp_cmp_hidden['precio601'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio601']);
       $sStyleHidden_precio601 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio601 = 'display: none;';
   $sStyleReadInp_precio601 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio601']) && $this->nmgp_cmp_readonly['precio601'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio601']);
       $sStyleReadLab_precio601 = '';
       $sStyleReadInp_precio601 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio601']) && $this->nmgp_cmp_hidden['precio601'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio601" value="<?php echo $this->form_encode_input($precio601) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio601_label" id="hidden_field_label_precio601" style="<?php echo $sStyleHidden_precio601; ?>"><span id="id_label_precio601"><?php echo $this->nm_new_label['precio601']; ?></span></TD>
    <TD class="scFormDataOdd css_precio601_line" id="hidden_field_data_precio601" style="<?php echo $sStyleHidden_precio601; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio601_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio601"]) &&  $this->nmgp_cmp_readonly["precio601"] == "on") { 

 ?>
<input type="hidden" name="precio601" value="<?php echo $this->form_encode_input($precio601) . "\">" . $precio601 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio601" class="sc-ui-readonly-precio601 css_precio601_line" style="<?php echo $sStyleReadLab_precio601; ?>"><?php echo $this->form_format_readonly("precio601", $this->form_encode_input($this->precio601)); ?></span><span id="id_read_off_precio601" class="css_read_off_precio601<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio601; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio601_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio601" type=text name="precio601" value="<?php echo $this->form_encode_input($precio601) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio601']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio601']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio601']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio601']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio601_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio601_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto601']))
    {
        $this->nm_new_label['descto601'] = "Descto 601";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto601 = $this->descto601;
   $sStyleHidden_descto601 = '';
   if (isset($this->nmgp_cmp_hidden['descto601']) && $this->nmgp_cmp_hidden['descto601'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto601']);
       $sStyleHidden_descto601 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto601 = 'display: none;';
   $sStyleReadInp_descto601 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto601']) && $this->nmgp_cmp_readonly['descto601'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto601']);
       $sStyleReadLab_descto601 = '';
       $sStyleReadInp_descto601 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto601']) && $this->nmgp_cmp_hidden['descto601'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto601" value="<?php echo $this->form_encode_input($descto601) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto601_label" id="hidden_field_label_descto601" style="<?php echo $sStyleHidden_descto601; ?>"><span id="id_label_descto601"><?php echo $this->nm_new_label['descto601']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto601']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto601'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_descto601_line" id="hidden_field_data_descto601" style="<?php echo $sStyleHidden_descto601; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto601_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto601"]) &&  $this->nmgp_cmp_readonly["descto601"] == "on") { 

 ?>
<input type="hidden" name="descto601" value="<?php echo $this->form_encode_input($descto601) . "\">" . $descto601 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto601" class="sc-ui-readonly-descto601 css_descto601_line" style="<?php echo $sStyleReadLab_descto601; ?>"><?php echo $this->form_format_readonly("descto601", $this->form_encode_input($this->descto601)); ?></span><span id="id_read_off_descto601" class="css_read_off_descto601<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto601; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto601_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto601" type=text name="descto601" value="<?php echo $this->form_encode_input($descto601) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto601']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto601']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto601']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto601']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto601_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto601_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio701']))
    {
        $this->nm_new_label['precio701'] = "Precio 701";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio701 = $this->precio701;
   $sStyleHidden_precio701 = '';
   if (isset($this->nmgp_cmp_hidden['precio701']) && $this->nmgp_cmp_hidden['precio701'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio701']);
       $sStyleHidden_precio701 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio701 = 'display: none;';
   $sStyleReadInp_precio701 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio701']) && $this->nmgp_cmp_readonly['precio701'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio701']);
       $sStyleReadLab_precio701 = '';
       $sStyleReadInp_precio701 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio701']) && $this->nmgp_cmp_hidden['precio701'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio701" value="<?php echo $this->form_encode_input($precio701) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio701_label" id="hidden_field_label_precio701" style="<?php echo $sStyleHidden_precio701; ?>"><span id="id_label_precio701"><?php echo $this->nm_new_label['precio701']; ?></span></TD>
    <TD class="scFormDataOdd css_precio701_line" id="hidden_field_data_precio701" style="<?php echo $sStyleHidden_precio701; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio701_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio701"]) &&  $this->nmgp_cmp_readonly["precio701"] == "on") { 

 ?>
<input type="hidden" name="precio701" value="<?php echo $this->form_encode_input($precio701) . "\">" . $precio701 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio701" class="sc-ui-readonly-precio701 css_precio701_line" style="<?php echo $sStyleReadLab_precio701; ?>"><?php echo $this->form_format_readonly("precio701", $this->form_encode_input($this->precio701)); ?></span><span id="id_read_off_precio701" class="css_read_off_precio701<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio701; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio701_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio701" type=text name="precio701" value="<?php echo $this->form_encode_input($precio701) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio701']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio701']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio701']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio701']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio701_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio701_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto701']))
    {
        $this->nm_new_label['descto701'] = "Descto 701";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto701 = $this->descto701;
   $sStyleHidden_descto701 = '';
   if (isset($this->nmgp_cmp_hidden['descto701']) && $this->nmgp_cmp_hidden['descto701'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto701']);
       $sStyleHidden_descto701 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto701 = 'display: none;';
   $sStyleReadInp_descto701 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto701']) && $this->nmgp_cmp_readonly['descto701'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto701']);
       $sStyleReadLab_descto701 = '';
       $sStyleReadInp_descto701 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto701']) && $this->nmgp_cmp_hidden['descto701'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto701" value="<?php echo $this->form_encode_input($descto701) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto701_label" id="hidden_field_label_descto701" style="<?php echo $sStyleHidden_descto701; ?>"><span id="id_label_descto701"><?php echo $this->nm_new_label['descto701']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto701']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto701'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_descto701_line" id="hidden_field_data_descto701" style="<?php echo $sStyleHidden_descto701; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto701_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto701"]) &&  $this->nmgp_cmp_readonly["descto701"] == "on") { 

 ?>
<input type="hidden" name="descto701" value="<?php echo $this->form_encode_input($descto701) . "\">" . $descto701 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto701" class="sc-ui-readonly-descto701 css_descto701_line" style="<?php echo $sStyleReadLab_descto701; ?>"><?php echo $this->form_format_readonly("descto701", $this->form_encode_input($this->descto701)); ?></span><span id="id_read_off_descto701" class="css_read_off_descto701<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto701; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto701_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto701" type=text name="descto701" value="<?php echo $this->form_encode_input($descto701) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto701']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto701']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto701']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto701']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto701_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto701_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio801']))
    {
        $this->nm_new_label['precio801'] = "Precio 801";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio801 = $this->precio801;
   $sStyleHidden_precio801 = '';
   if (isset($this->nmgp_cmp_hidden['precio801']) && $this->nmgp_cmp_hidden['precio801'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio801']);
       $sStyleHidden_precio801 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio801 = 'display: none;';
   $sStyleReadInp_precio801 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio801']) && $this->nmgp_cmp_readonly['precio801'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio801']);
       $sStyleReadLab_precio801 = '';
       $sStyleReadInp_precio801 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio801']) && $this->nmgp_cmp_hidden['precio801'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio801" value="<?php echo $this->form_encode_input($precio801) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio801_label" id="hidden_field_label_precio801" style="<?php echo $sStyleHidden_precio801; ?>"><span id="id_label_precio801"><?php echo $this->nm_new_label['precio801']; ?></span></TD>
    <TD class="scFormDataOdd css_precio801_line" id="hidden_field_data_precio801" style="<?php echo $sStyleHidden_precio801; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio801_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio801"]) &&  $this->nmgp_cmp_readonly["precio801"] == "on") { 

 ?>
<input type="hidden" name="precio801" value="<?php echo $this->form_encode_input($precio801) . "\">" . $precio801 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio801" class="sc-ui-readonly-precio801 css_precio801_line" style="<?php echo $sStyleReadLab_precio801; ?>"><?php echo $this->form_format_readonly("precio801", $this->form_encode_input($this->precio801)); ?></span><span id="id_read_off_precio801" class="css_read_off_precio801<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio801; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio801_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio801" type=text name="precio801" value="<?php echo $this->form_encode_input($precio801) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio801']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio801']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio801']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio801']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio801_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio801_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto801']))
    {
        $this->nm_new_label['descto801'] = "Descto 801";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto801 = $this->descto801;
   $sStyleHidden_descto801 = '';
   if (isset($this->nmgp_cmp_hidden['descto801']) && $this->nmgp_cmp_hidden['descto801'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto801']);
       $sStyleHidden_descto801 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto801 = 'display: none;';
   $sStyleReadInp_descto801 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto801']) && $this->nmgp_cmp_readonly['descto801'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto801']);
       $sStyleReadLab_descto801 = '';
       $sStyleReadInp_descto801 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto801']) && $this->nmgp_cmp_hidden['descto801'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto801" value="<?php echo $this->form_encode_input($descto801) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto801_label" id="hidden_field_label_descto801" style="<?php echo $sStyleHidden_descto801; ?>"><span id="id_label_descto801"><?php echo $this->nm_new_label['descto801']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto801']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto801'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_descto801_line" id="hidden_field_data_descto801" style="<?php echo $sStyleHidden_descto801; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto801_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto801"]) &&  $this->nmgp_cmp_readonly["descto801"] == "on") { 

 ?>
<input type="hidden" name="descto801" value="<?php echo $this->form_encode_input($descto801) . "\">" . $descto801 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto801" class="sc-ui-readonly-descto801 css_descto801_line" style="<?php echo $sStyleReadLab_descto801; ?>"><?php echo $this->form_format_readonly("descto801", $this->form_encode_input($this->descto801)); ?></span><span id="id_read_off_descto801" class="css_read_off_descto801<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto801; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto801_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto801" type=text name="descto801" value="<?php echo $this->form_encode_input($descto801) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto801']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto801']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto801']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto801']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto801_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto801_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio901']))
    {
        $this->nm_new_label['precio901'] = "Precio 901";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio901 = $this->precio901;
   $sStyleHidden_precio901 = '';
   if (isset($this->nmgp_cmp_hidden['precio901']) && $this->nmgp_cmp_hidden['precio901'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio901']);
       $sStyleHidden_precio901 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio901 = 'display: none;';
   $sStyleReadInp_precio901 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio901']) && $this->nmgp_cmp_readonly['precio901'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio901']);
       $sStyleReadLab_precio901 = '';
       $sStyleReadInp_precio901 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio901']) && $this->nmgp_cmp_hidden['precio901'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio901" value="<?php echo $this->form_encode_input($precio901) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio901_label" id="hidden_field_label_precio901" style="<?php echo $sStyleHidden_precio901; ?>"><span id="id_label_precio901"><?php echo $this->nm_new_label['precio901']; ?></span></TD>
    <TD class="scFormDataOdd css_precio901_line" id="hidden_field_data_precio901" style="<?php echo $sStyleHidden_precio901; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio901_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio901"]) &&  $this->nmgp_cmp_readonly["precio901"] == "on") { 

 ?>
<input type="hidden" name="precio901" value="<?php echo $this->form_encode_input($precio901) . "\">" . $precio901 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio901" class="sc-ui-readonly-precio901 css_precio901_line" style="<?php echo $sStyleReadLab_precio901; ?>"><?php echo $this->form_format_readonly("precio901", $this->form_encode_input($this->precio901)); ?></span><span id="id_read_off_precio901" class="css_read_off_precio901<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio901; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio901_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio901" type=text name="precio901" value="<?php echo $this->form_encode_input($precio901) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio901']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio901']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio901']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio901']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio901_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio901_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto901']))
    {
        $this->nm_new_label['descto901'] = "Descto 901";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto901 = $this->descto901;
   $sStyleHidden_descto901 = '';
   if (isset($this->nmgp_cmp_hidden['descto901']) && $this->nmgp_cmp_hidden['descto901'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto901']);
       $sStyleHidden_descto901 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto901 = 'display: none;';
   $sStyleReadInp_descto901 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto901']) && $this->nmgp_cmp_readonly['descto901'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto901']);
       $sStyleReadLab_descto901 = '';
       $sStyleReadInp_descto901 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto901']) && $this->nmgp_cmp_hidden['descto901'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto901" value="<?php echo $this->form_encode_input($descto901) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto901_label" id="hidden_field_label_descto901" style="<?php echo $sStyleHidden_descto901; ?>"><span id="id_label_descto901"><?php echo $this->nm_new_label['descto901']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto901']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto901'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_descto901_line" id="hidden_field_data_descto901" style="<?php echo $sStyleHidden_descto901; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto901_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto901"]) &&  $this->nmgp_cmp_readonly["descto901"] == "on") { 

 ?>
<input type="hidden" name="descto901" value="<?php echo $this->form_encode_input($descto901) . "\">" . $descto901 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto901" class="sc-ui-readonly-descto901 css_descto901_line" style="<?php echo $sStyleReadLab_descto901; ?>"><?php echo $this->form_format_readonly("descto901", $this->form_encode_input($this->descto901)); ?></span><span id="id_read_off_descto901" class="css_read_off_descto901<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto901; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto901_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto901" type=text name="descto901" value="<?php echo $this->form_encode_input($descto901) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto901']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto901']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto901']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto901']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto901_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto901_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio1001']))
    {
        $this->nm_new_label['precio1001'] = "Precio 1001";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio1001 = $this->precio1001;
   $sStyleHidden_precio1001 = '';
   if (isset($this->nmgp_cmp_hidden['precio1001']) && $this->nmgp_cmp_hidden['precio1001'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio1001']);
       $sStyleHidden_precio1001 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio1001 = 'display: none;';
   $sStyleReadInp_precio1001 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio1001']) && $this->nmgp_cmp_readonly['precio1001'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio1001']);
       $sStyleReadLab_precio1001 = '';
       $sStyleReadInp_precio1001 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio1001']) && $this->nmgp_cmp_hidden['precio1001'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio1001" value="<?php echo $this->form_encode_input($precio1001) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio1001_label" id="hidden_field_label_precio1001" style="<?php echo $sStyleHidden_precio1001; ?>"><span id="id_label_precio1001"><?php echo $this->nm_new_label['precio1001']; ?></span></TD>
    <TD class="scFormDataOdd css_precio1001_line" id="hidden_field_data_precio1001" style="<?php echo $sStyleHidden_precio1001; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio1001_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio1001"]) &&  $this->nmgp_cmp_readonly["precio1001"] == "on") { 

 ?>
<input type="hidden" name="precio1001" value="<?php echo $this->form_encode_input($precio1001) . "\">" . $precio1001 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio1001" class="sc-ui-readonly-precio1001 css_precio1001_line" style="<?php echo $sStyleReadLab_precio1001; ?>"><?php echo $this->form_format_readonly("precio1001", $this->form_encode_input($this->precio1001)); ?></span><span id="id_read_off_precio1001" class="css_read_off_precio1001<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio1001; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio1001_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio1001" type=text name="precio1001" value="<?php echo $this->form_encode_input($precio1001) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio1001']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio1001']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio1001']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio1001']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio1001_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio1001_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto1001']))
    {
        $this->nm_new_label['descto1001'] = "Descto 1001";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto1001 = $this->descto1001;
   $sStyleHidden_descto1001 = '';
   if (isset($this->nmgp_cmp_hidden['descto1001']) && $this->nmgp_cmp_hidden['descto1001'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto1001']);
       $sStyleHidden_descto1001 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto1001 = 'display: none;';
   $sStyleReadInp_descto1001 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto1001']) && $this->nmgp_cmp_readonly['descto1001'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto1001']);
       $sStyleReadLab_descto1001 = '';
       $sStyleReadInp_descto1001 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto1001']) && $this->nmgp_cmp_hidden['descto1001'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto1001" value="<?php echo $this->form_encode_input($descto1001) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto1001_label" id="hidden_field_label_descto1001" style="<?php echo $sStyleHidden_descto1001; ?>"><span id="id_label_descto1001"><?php echo $this->nm_new_label['descto1001']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto1001']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto1001'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_descto1001_line" id="hidden_field_data_descto1001" style="<?php echo $sStyleHidden_descto1001; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto1001_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto1001"]) &&  $this->nmgp_cmp_readonly["descto1001"] == "on") { 

 ?>
<input type="hidden" name="descto1001" value="<?php echo $this->form_encode_input($descto1001) . "\">" . $descto1001 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto1001" class="sc-ui-readonly-descto1001 css_descto1001_line" style="<?php echo $sStyleReadLab_descto1001; ?>"><?php echo $this->form_format_readonly("descto1001", $this->form_encode_input($this->descto1001)); ?></span><span id="id_read_off_descto1001" class="css_read_off_descto1001<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto1001; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto1001_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto1001" type=text name="descto1001" value="<?php echo $this->form_encode_input($descto1001) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto1001']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto1001']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto1001']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto1001']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto1001_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto1001_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio1101']))
    {
        $this->nm_new_label['precio1101'] = "Precio 1101";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio1101 = $this->precio1101;
   $sStyleHidden_precio1101 = '';
   if (isset($this->nmgp_cmp_hidden['precio1101']) && $this->nmgp_cmp_hidden['precio1101'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio1101']);
       $sStyleHidden_precio1101 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio1101 = 'display: none;';
   $sStyleReadInp_precio1101 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio1101']) && $this->nmgp_cmp_readonly['precio1101'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio1101']);
       $sStyleReadLab_precio1101 = '';
       $sStyleReadInp_precio1101 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio1101']) && $this->nmgp_cmp_hidden['precio1101'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio1101" value="<?php echo $this->form_encode_input($precio1101) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio1101_label" id="hidden_field_label_precio1101" style="<?php echo $sStyleHidden_precio1101; ?>"><span id="id_label_precio1101"><?php echo $this->nm_new_label['precio1101']; ?></span></TD>
    <TD class="scFormDataOdd css_precio1101_line" id="hidden_field_data_precio1101" style="<?php echo $sStyleHidden_precio1101; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio1101_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio1101"]) &&  $this->nmgp_cmp_readonly["precio1101"] == "on") { 

 ?>
<input type="hidden" name="precio1101" value="<?php echo $this->form_encode_input($precio1101) . "\">" . $precio1101 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio1101" class="sc-ui-readonly-precio1101 css_precio1101_line" style="<?php echo $sStyleReadLab_precio1101; ?>"><?php echo $this->form_format_readonly("precio1101", $this->form_encode_input($this->precio1101)); ?></span><span id="id_read_off_precio1101" class="css_read_off_precio1101<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio1101; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio1101_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio1101" type=text name="precio1101" value="<?php echo $this->form_encode_input($precio1101) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio1101']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio1101']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio1101']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio1101']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio1101_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio1101_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto1101']))
    {
        $this->nm_new_label['descto1101'] = "Descto 1101";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto1101 = $this->descto1101;
   $sStyleHidden_descto1101 = '';
   if (isset($this->nmgp_cmp_hidden['descto1101']) && $this->nmgp_cmp_hidden['descto1101'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto1101']);
       $sStyleHidden_descto1101 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto1101 = 'display: none;';
   $sStyleReadInp_descto1101 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto1101']) && $this->nmgp_cmp_readonly['descto1101'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto1101']);
       $sStyleReadLab_descto1101 = '';
       $sStyleReadInp_descto1101 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto1101']) && $this->nmgp_cmp_hidden['descto1101'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto1101" value="<?php echo $this->form_encode_input($descto1101) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto1101_label" id="hidden_field_label_descto1101" style="<?php echo $sStyleHidden_descto1101; ?>"><span id="id_label_descto1101"><?php echo $this->nm_new_label['descto1101']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto1101']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto1101'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_descto1101_line" id="hidden_field_data_descto1101" style="<?php echo $sStyleHidden_descto1101; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto1101_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto1101"]) &&  $this->nmgp_cmp_readonly["descto1101"] == "on") { 

 ?>
<input type="hidden" name="descto1101" value="<?php echo $this->form_encode_input($descto1101) . "\">" . $descto1101 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto1101" class="sc-ui-readonly-descto1101 css_descto1101_line" style="<?php echo $sStyleReadLab_descto1101; ?>"><?php echo $this->form_format_readonly("descto1101", $this->form_encode_input($this->descto1101)); ?></span><span id="id_read_off_descto1101" class="css_read_off_descto1101<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto1101; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto1101_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto1101" type=text name="descto1101" value="<?php echo $this->form_encode_input($descto1101) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto1101']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto1101']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto1101']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto1101']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto1101_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto1101_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio1201']))
    {
        $this->nm_new_label['precio1201'] = "Precio 1201";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio1201 = $this->precio1201;
   $sStyleHidden_precio1201 = '';
   if (isset($this->nmgp_cmp_hidden['precio1201']) && $this->nmgp_cmp_hidden['precio1201'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio1201']);
       $sStyleHidden_precio1201 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio1201 = 'display: none;';
   $sStyleReadInp_precio1201 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio1201']) && $this->nmgp_cmp_readonly['precio1201'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio1201']);
       $sStyleReadLab_precio1201 = '';
       $sStyleReadInp_precio1201 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio1201']) && $this->nmgp_cmp_hidden['precio1201'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio1201" value="<?php echo $this->form_encode_input($precio1201) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_precio1201_label" id="hidden_field_label_precio1201" style="<?php echo $sStyleHidden_precio1201; ?>"><span id="id_label_precio1201"><?php echo $this->nm_new_label['precio1201']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['precio1201']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['precio1201'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_precio1201_line" id="hidden_field_data_precio1201" style="<?php echo $sStyleHidden_precio1201; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precio1201_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio1201"]) &&  $this->nmgp_cmp_readonly["precio1201"] == "on") { 

 ?>
<input type="hidden" name="precio1201" value="<?php echo $this->form_encode_input($precio1201) . "\">" . $precio1201 . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio1201" class="sc-ui-readonly-precio1201 css_precio1201_line" style="<?php echo $sStyleReadLab_precio1201; ?>"><?php echo $this->form_format_readonly("precio1201", $this->form_encode_input($this->precio1201)); ?></span><span id="id_read_off_precio1201" class="css_read_off_precio1201<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precio1201; ?>">
 <input class="sc-js-input scFormObjectOdd css_precio1201_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precio1201" type=text name="precio1201" value="<?php echo $this->form_encode_input($precio1201) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precio1201']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precio1201']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precio1201']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precio1201']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio1201_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio1201_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto1201']))
    {
        $this->nm_new_label['descto1201'] = "Descto 1201";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto1201 = $this->descto1201;
   $sStyleHidden_descto1201 = '';
   if (isset($this->nmgp_cmp_hidden['descto1201']) && $this->nmgp_cmp_hidden['descto1201'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto1201']);
       $sStyleHidden_descto1201 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto1201 = 'display: none;';
   $sStyleReadInp_descto1201 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto1201']) && $this->nmgp_cmp_readonly['descto1201'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto1201']);
       $sStyleReadLab_descto1201 = '';
       $sStyleReadInp_descto1201 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto1201']) && $this->nmgp_cmp_hidden['descto1201'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto1201" value="<?php echo $this->form_encode_input($descto1201) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto1201_label" id="hidden_field_label_descto1201" style="<?php echo $sStyleHidden_descto1201; ?>"><span id="id_label_descto1201"><?php echo $this->nm_new_label['descto1201']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto1201']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['descto1201'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_descto1201_line" id="hidden_field_data_descto1201" style="<?php echo $sStyleHidden_descto1201; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto1201_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto1201"]) &&  $this->nmgp_cmp_readonly["descto1201"] == "on") { 

 ?>
<input type="hidden" name="descto1201" value="<?php echo $this->form_encode_input($descto1201) . "\">" . $descto1201 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto1201" class="sc-ui-readonly-descto1201 css_descto1201_line" style="<?php echo $sStyleReadLab_descto1201; ?>"><?php echo $this->form_format_readonly("descto1201", $this->form_encode_input($this->descto1201)); ?></span><span id="id_read_off_descto1201" class="css_read_off_descto1201<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto1201; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto1201_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto1201" type=text name="descto1201" value="<?php echo $this->form_encode_input($descto1201) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto1201']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto1201']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto1201']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto1201']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto1201_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto1201_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['submarca01']))
    {
        $this->nm_new_label['submarca01'] = "Submarca 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $submarca01 = $this->submarca01;
   $sStyleHidden_submarca01 = '';
   if (isset($this->nmgp_cmp_hidden['submarca01']) && $this->nmgp_cmp_hidden['submarca01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['submarca01']);
       $sStyleHidden_submarca01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_submarca01 = 'display: none;';
   $sStyleReadInp_submarca01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['submarca01']) && $this->nmgp_cmp_readonly['submarca01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['submarca01']);
       $sStyleReadLab_submarca01 = '';
       $sStyleReadInp_submarca01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['submarca01']) && $this->nmgp_cmp_hidden['submarca01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="submarca01" value="<?php echo $this->form_encode_input($submarca01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_submarca01_label" id="hidden_field_label_submarca01" style="<?php echo $sStyleHidden_submarca01; ?>"><span id="id_label_submarca01"><?php echo $this->nm_new_label['submarca01']; ?></span></TD>
    <TD class="scFormDataOdd css_submarca01_line" id="hidden_field_data_submarca01" style="<?php echo $sStyleHidden_submarca01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_submarca01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["submarca01"]) &&  $this->nmgp_cmp_readonly["submarca01"] == "on") { 

 ?>
<input type="hidden" name="submarca01" value="<?php echo $this->form_encode_input($submarca01) . "\">" . $submarca01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_submarca01" class="sc-ui-readonly-submarca01 css_submarca01_line" style="<?php echo $sStyleReadLab_submarca01; ?>"><?php echo $this->form_format_readonly("submarca01", $this->form_encode_input($this->submarca01)); ?></span><span id="id_read_off_submarca01" class="css_read_off_submarca01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_submarca01; ?>">
 <input class="sc-js-input scFormObjectOdd css_submarca01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_submarca01" type=text name="submarca01" value="<?php echo $this->form_encode_input($submarca01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_submarca01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_submarca01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['modelo01']))
    {
        $this->nm_new_label['modelo01'] = "Modelo 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $modelo01 = $this->modelo01;
   $sStyleHidden_modelo01 = '';
   if (isset($this->nmgp_cmp_hidden['modelo01']) && $this->nmgp_cmp_hidden['modelo01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['modelo01']);
       $sStyleHidden_modelo01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_modelo01 = 'display: none;';
   $sStyleReadInp_modelo01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['modelo01']) && $this->nmgp_cmp_readonly['modelo01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['modelo01']);
       $sStyleReadLab_modelo01 = '';
       $sStyleReadInp_modelo01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['modelo01']) && $this->nmgp_cmp_hidden['modelo01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="modelo01" value="<?php echo $this->form_encode_input($modelo01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_modelo01_label" id="hidden_field_label_modelo01" style="<?php echo $sStyleHidden_modelo01; ?>"><span id="id_label_modelo01"><?php echo $this->nm_new_label['modelo01']; ?></span></TD>
    <TD class="scFormDataOdd css_modelo01_line" id="hidden_field_data_modelo01" style="<?php echo $sStyleHidden_modelo01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_modelo01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["modelo01"]) &&  $this->nmgp_cmp_readonly["modelo01"] == "on") { 

 ?>
<input type="hidden" name="modelo01" value="<?php echo $this->form_encode_input($modelo01) . "\">" . $modelo01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_modelo01" class="sc-ui-readonly-modelo01 css_modelo01_line" style="<?php echo $sStyleReadLab_modelo01; ?>"><?php echo $this->form_format_readonly("modelo01", $this->form_encode_input($this->modelo01)); ?></span><span id="id_read_off_modelo01" class="css_read_off_modelo01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_modelo01; ?>">
 <input class="sc-js-input scFormObjectOdd css_modelo01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_modelo01" type=text name="modelo01" value="<?php echo $this->form_encode_input($modelo01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modelo01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modelo01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['clasific01']))
    {
        $this->nm_new_label['clasific01'] = "Clasific 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $clasific01 = $this->clasific01;
   $sStyleHidden_clasific01 = '';
   if (isset($this->nmgp_cmp_hidden['clasific01']) && $this->nmgp_cmp_hidden['clasific01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['clasific01']);
       $sStyleHidden_clasific01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_clasific01 = 'display: none;';
   $sStyleReadInp_clasific01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['clasific01']) && $this->nmgp_cmp_readonly['clasific01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['clasific01']);
       $sStyleReadLab_clasific01 = '';
       $sStyleReadInp_clasific01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['clasific01']) && $this->nmgp_cmp_hidden['clasific01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="clasific01" value="<?php echo $this->form_encode_input($clasific01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_clasific01_label" id="hidden_field_label_clasific01" style="<?php echo $sStyleHidden_clasific01; ?>"><span id="id_label_clasific01"><?php echo $this->nm_new_label['clasific01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['clasific01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['clasific01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_clasific01_line" id="hidden_field_data_clasific01" style="<?php echo $sStyleHidden_clasific01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_clasific01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["clasific01"]) &&  $this->nmgp_cmp_readonly["clasific01"] == "on") { 

 ?>
<input type="hidden" name="clasific01" value="<?php echo $this->form_encode_input($clasific01) . "\">" . $clasific01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_clasific01" class="sc-ui-readonly-clasific01 css_clasific01_line" style="<?php echo $sStyleReadLab_clasific01; ?>"><?php echo $this->form_format_readonly("clasific01", $this->form_encode_input($this->clasific01)); ?></span><span id="id_read_off_clasific01" class="css_read_off_clasific01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_clasific01; ?>">
 <input class="sc-js-input scFormObjectOdd css_clasific01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_clasific01" type=text name="clasific01" value="<?php echo $this->form_encode_input($clasific01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_clasific01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_clasific01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codbarempaque01']))
    {
        $this->nm_new_label['codbarempaque01'] = "Codbarempaque 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codbarempaque01 = $this->codbarempaque01;
   $sStyleHidden_codbarempaque01 = '';
   if (isset($this->nmgp_cmp_hidden['codbarempaque01']) && $this->nmgp_cmp_hidden['codbarempaque01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codbarempaque01']);
       $sStyleHidden_codbarempaque01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codbarempaque01 = 'display: none;';
   $sStyleReadInp_codbarempaque01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codbarempaque01']) && $this->nmgp_cmp_readonly['codbarempaque01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codbarempaque01']);
       $sStyleReadLab_codbarempaque01 = '';
       $sStyleReadInp_codbarempaque01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codbarempaque01']) && $this->nmgp_cmp_hidden['codbarempaque01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codbarempaque01" value="<?php echo $this->form_encode_input($codbarempaque01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_codbarempaque01_label" id="hidden_field_label_codbarempaque01" style="<?php echo $sStyleHidden_codbarempaque01; ?>"><span id="id_label_codbarempaque01"><?php echo $this->nm_new_label['codbarempaque01']; ?></span></TD>
    <TD class="scFormDataOdd css_codbarempaque01_line" id="hidden_field_data_codbarempaque01" style="<?php echo $sStyleHidden_codbarempaque01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codbarempaque01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codbarempaque01"]) &&  $this->nmgp_cmp_readonly["codbarempaque01"] == "on") { 

 ?>
<input type="hidden" name="codbarempaque01" value="<?php echo $this->form_encode_input($codbarempaque01) . "\">" . $codbarempaque01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_codbarempaque01" class="sc-ui-readonly-codbarempaque01 css_codbarempaque01_line" style="<?php echo $sStyleReadLab_codbarempaque01; ?>"><?php echo $this->form_format_readonly("codbarempaque01", $this->form_encode_input($this->codbarempaque01)); ?></span><span id="id_read_off_codbarempaque01" class="css_read_off_codbarempaque01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codbarempaque01; ?>">
 <input class="sc-js-input scFormObjectOdd css_codbarempaque01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codbarempaque01" type=text name="codbarempaque01" value="<?php echo $this->form_encode_input($codbarempaque01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codbarempaque01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codbarempaque01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['unidadempaque01']))
    {
        $this->nm_new_label['unidadempaque01'] = "Unidadempaque 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unidadempaque01 = $this->unidadempaque01;
   $sStyleHidden_unidadempaque01 = '';
   if (isset($this->nmgp_cmp_hidden['unidadempaque01']) && $this->nmgp_cmp_hidden['unidadempaque01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unidadempaque01']);
       $sStyleHidden_unidadempaque01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unidadempaque01 = 'display: none;';
   $sStyleReadInp_unidadempaque01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unidadempaque01']) && $this->nmgp_cmp_readonly['unidadempaque01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unidadempaque01']);
       $sStyleReadLab_unidadempaque01 = '';
       $sStyleReadInp_unidadempaque01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unidadempaque01']) && $this->nmgp_cmp_hidden['unidadempaque01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unidadempaque01" value="<?php echo $this->form_encode_input($unidadempaque01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_unidadempaque01_label" id="hidden_field_label_unidadempaque01" style="<?php echo $sStyleHidden_unidadempaque01; ?>"><span id="id_label_unidadempaque01"><?php echo $this->nm_new_label['unidadempaque01']; ?></span></TD>
    <TD class="scFormDataOdd css_unidadempaque01_line" id="hidden_field_data_unidadempaque01" style="<?php echo $sStyleHidden_unidadempaque01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unidadempaque01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unidadempaque01"]) &&  $this->nmgp_cmp_readonly["unidadempaque01"] == "on") { 

 ?>
<input type="hidden" name="unidadempaque01" value="<?php echo $this->form_encode_input($unidadempaque01) . "\">" . $unidadempaque01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_unidadempaque01" class="sc-ui-readonly-unidadempaque01 css_unidadempaque01_line" style="<?php echo $sStyleReadLab_unidadempaque01; ?>"><?php echo $this->form_format_readonly("unidadempaque01", $this->form_encode_input($this->unidadempaque01)); ?></span><span id="id_read_off_unidadempaque01" class="css_read_off_unidadempaque01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unidadempaque01; ?>">
 <input class="sc-js-input scFormObjectOdd css_unidadempaque01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unidadempaque01" type=text name="unidadempaque01" value="<?php echo $this->form_encode_input($unidadempaque01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidadempaque01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidadempaque01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dimensionempaque01']))
    {
        $this->nm_new_label['dimensionempaque01'] = "Dimensionempaque 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dimensionempaque01 = $this->dimensionempaque01;
   $sStyleHidden_dimensionempaque01 = '';
   if (isset($this->nmgp_cmp_hidden['dimensionempaque01']) && $this->nmgp_cmp_hidden['dimensionempaque01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dimensionempaque01']);
       $sStyleHidden_dimensionempaque01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dimensionempaque01 = 'display: none;';
   $sStyleReadInp_dimensionempaque01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dimensionempaque01']) && $this->nmgp_cmp_readonly['dimensionempaque01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dimensionempaque01']);
       $sStyleReadLab_dimensionempaque01 = '';
       $sStyleReadInp_dimensionempaque01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dimensionempaque01']) && $this->nmgp_cmp_hidden['dimensionempaque01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dimensionempaque01" value="<?php echo $this->form_encode_input($dimensionempaque01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dimensionempaque01_label" id="hidden_field_label_dimensionempaque01" style="<?php echo $sStyleHidden_dimensionempaque01; ?>"><span id="id_label_dimensionempaque01"><?php echo $this->nm_new_label['dimensionempaque01']; ?></span></TD>
    <TD class="scFormDataOdd css_dimensionempaque01_line" id="hidden_field_data_dimensionempaque01" style="<?php echo $sStyleHidden_dimensionempaque01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dimensionempaque01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dimensionempaque01"]) &&  $this->nmgp_cmp_readonly["dimensionempaque01"] == "on") { 

 ?>
<input type="hidden" name="dimensionempaque01" value="<?php echo $this->form_encode_input($dimensionempaque01) . "\">" . $dimensionempaque01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_dimensionempaque01" class="sc-ui-readonly-dimensionempaque01 css_dimensionempaque01_line" style="<?php echo $sStyleReadLab_dimensionempaque01; ?>"><?php echo $this->form_format_readonly("dimensionempaque01", $this->form_encode_input($this->dimensionempaque01)); ?></span><span id="id_read_off_dimensionempaque01" class="css_read_off_dimensionempaque01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dimensionempaque01; ?>">
 <input class="sc-js-input scFormObjectOdd css_dimensionempaque01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dimensionempaque01" type=text name="dimensionempaque01" value="<?php echo $this->form_encode_input($dimensionempaque01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dimensionempaque01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dimensionempaque01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['link01']))
    {
        $this->nm_new_label['link01'] = "Link 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $link01 = $this->link01;
   $sStyleHidden_link01 = '';
   if (isset($this->nmgp_cmp_hidden['link01']) && $this->nmgp_cmp_hidden['link01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['link01']);
       $sStyleHidden_link01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_link01 = 'display: none;';
   $sStyleReadInp_link01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['link01']) && $this->nmgp_cmp_readonly['link01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['link01']);
       $sStyleReadLab_link01 = '';
       $sStyleReadInp_link01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['link01']) && $this->nmgp_cmp_hidden['link01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="link01" value="<?php echo $this->form_encode_input($link01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_link01_label" id="hidden_field_label_link01" style="<?php echo $sStyleHidden_link01; ?>"><span id="id_label_link01"><?php echo $this->nm_new_label['link01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['link01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['link01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_link01_line" id="hidden_field_data_link01" style="<?php echo $sStyleHidden_link01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_link01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["link01"]) &&  $this->nmgp_cmp_readonly["link01"] == "on") { 

 ?>
<input type="hidden" name="link01" value="<?php echo $this->form_encode_input($link01) . "\">" . $link01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_link01" class="sc-ui-readonly-link01 css_link01_line" style="<?php echo $sStyleReadLab_link01; ?>"><?php echo $this->form_format_readonly("link01", $this->form_encode_input($this->link01)); ?></span><span id="id_read_off_link01" class="css_read_off_link01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_link01; ?>">
 <input class="sc-js-input scFormObjectOdd css_link01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_link01" type=text name="link01" value="<?php echo $this->form_encode_input($link01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_link01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_link01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['desprod201']))
    {
        $this->nm_new_label['desprod201'] = "Desprod 201";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $desprod201 = $this->desprod201;
   $sStyleHidden_desprod201 = '';
   if (isset($this->nmgp_cmp_hidden['desprod201']) && $this->nmgp_cmp_hidden['desprod201'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['desprod201']);
       $sStyleHidden_desprod201 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_desprod201 = 'display: none;';
   $sStyleReadInp_desprod201 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['desprod201']) && $this->nmgp_cmp_readonly['desprod201'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['desprod201']);
       $sStyleReadLab_desprod201 = '';
       $sStyleReadInp_desprod201 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['desprod201']) && $this->nmgp_cmp_hidden['desprod201'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="desprod201" value="<?php echo $this->form_encode_input($desprod201) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_desprod201_label" id="hidden_field_label_desprod201" style="<?php echo $sStyleHidden_desprod201; ?>"><span id="id_label_desprod201"><?php echo $this->nm_new_label['desprod201']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['desprod201']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['desprod201'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_desprod201_line" id="hidden_field_data_desprod201" style="<?php echo $sStyleHidden_desprod201; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_desprod201_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["desprod201"]) &&  $this->nmgp_cmp_readonly["desprod201"] == "on") { 

 ?>
<input type="hidden" name="desprod201" value="<?php echo $this->form_encode_input($desprod201) . "\">" . $desprod201 . ""; ?>
<?php } else { ?>
<span id="id_read_on_desprod201" class="sc-ui-readonly-desprod201 css_desprod201_line" style="<?php echo $sStyleReadLab_desprod201; ?>"><?php echo $this->form_format_readonly("desprod201", $this->form_encode_input($this->desprod201)); ?></span><span id="id_read_off_desprod201" class="css_read_off_desprod201<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_desprod201; ?>">
 <input class="sc-js-input scFormObjectOdd css_desprod201_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_desprod201" type=text name="desprod201" value="<?php echo $this->form_encode_input($desprod201) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_desprod201_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_desprod201_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['desprod301']))
    {
        $this->nm_new_label['desprod301'] = "Desprod 301";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $desprod301 = $this->desprod301;
   $sStyleHidden_desprod301 = '';
   if (isset($this->nmgp_cmp_hidden['desprod301']) && $this->nmgp_cmp_hidden['desprod301'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['desprod301']);
       $sStyleHidden_desprod301 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_desprod301 = 'display: none;';
   $sStyleReadInp_desprod301 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['desprod301']) && $this->nmgp_cmp_readonly['desprod301'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['desprod301']);
       $sStyleReadLab_desprod301 = '';
       $sStyleReadInp_desprod301 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['desprod301']) && $this->nmgp_cmp_hidden['desprod301'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="desprod301" value="<?php echo $this->form_encode_input($desprod301) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_desprod301_label" id="hidden_field_label_desprod301" style="<?php echo $sStyleHidden_desprod301; ?>"><span id="id_label_desprod301"><?php echo $this->nm_new_label['desprod301']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['desprod301']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['desprod301'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_desprod301_line" id="hidden_field_data_desprod301" style="<?php echo $sStyleHidden_desprod301; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_desprod301_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["desprod301"]) &&  $this->nmgp_cmp_readonly["desprod301"] == "on") { 

 ?>
<input type="hidden" name="desprod301" value="<?php echo $this->form_encode_input($desprod301) . "\">" . $desprod301 . ""; ?>
<?php } else { ?>
<span id="id_read_on_desprod301" class="sc-ui-readonly-desprod301 css_desprod301_line" style="<?php echo $sStyleReadLab_desprod301; ?>"><?php echo $this->form_format_readonly("desprod301", $this->form_encode_input($this->desprod301)); ?></span><span id="id_read_off_desprod301" class="css_read_off_desprod301<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_desprod301; ?>">
 <input class="sc-js-input scFormObjectOdd css_desprod301_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_desprod301" type=text name="desprod301" value="<?php echo $this->form_encode_input($desprod301) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_desprod301_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_desprod301_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['coefprd01']))
    {
        $this->nm_new_label['coefprd01'] = "Coefprd 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $coefprd01 = $this->coefprd01;
   $sStyleHidden_coefprd01 = '';
   if (isset($this->nmgp_cmp_hidden['coefprd01']) && $this->nmgp_cmp_hidden['coefprd01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['coefprd01']);
       $sStyleHidden_coefprd01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_coefprd01 = 'display: none;';
   $sStyleReadInp_coefprd01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['coefprd01']) && $this->nmgp_cmp_readonly['coefprd01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['coefprd01']);
       $sStyleReadLab_coefprd01 = '';
       $sStyleReadInp_coefprd01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['coefprd01']) && $this->nmgp_cmp_hidden['coefprd01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="coefprd01" value="<?php echo $this->form_encode_input($coefprd01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_coefprd01_label" id="hidden_field_label_coefprd01" style="<?php echo $sStyleHidden_coefprd01; ?>"><span id="id_label_coefprd01"><?php echo $this->nm_new_label['coefprd01']; ?></span></TD>
    <TD class="scFormDataOdd css_coefprd01_line" id="hidden_field_data_coefprd01" style="<?php echo $sStyleHidden_coefprd01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_coefprd01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["coefprd01"]) &&  $this->nmgp_cmp_readonly["coefprd01"] == "on") { 

 ?>
<input type="hidden" name="coefprd01" value="<?php echo $this->form_encode_input($coefprd01) . "\">" . $coefprd01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_coefprd01" class="sc-ui-readonly-coefprd01 css_coefprd01_line" style="<?php echo $sStyleReadLab_coefprd01; ?>"><?php echo $this->form_format_readonly("coefprd01", $this->form_encode_input($this->coefprd01)); ?></span><span id="id_read_off_coefprd01" class="css_read_off_coefprd01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_coefprd01; ?>">
 <input class="sc-js-input scFormObjectOdd css_coefprd01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_coefprd01" type=text name="coefprd01" value="<?php echo $this->form_encode_input($coefprd01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['coefprd01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['coefprd01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['coefprd01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['coefprd01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_coefprd01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_coefprd01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['infor01']))
    {
        $this->nm_new_label['infor01'] = "Infor 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $infor01 = $this->infor01;
   $sStyleHidden_infor01 = '';
   if (isset($this->nmgp_cmp_hidden['infor01']) && $this->nmgp_cmp_hidden['infor01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['infor01']);
       $sStyleHidden_infor01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_infor01 = 'display: none;';
   $sStyleReadInp_infor01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['infor01']) && $this->nmgp_cmp_readonly['infor01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['infor01']);
       $sStyleReadLab_infor01 = '';
       $sStyleReadInp_infor01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['infor01']) && $this->nmgp_cmp_hidden['infor01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="infor01" value="<?php echo $this->form_encode_input($infor01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_infor01_label" id="hidden_field_label_infor01" style="<?php echo $sStyleHidden_infor01; ?>"><span id="id_label_infor01"><?php echo $this->nm_new_label['infor01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_infor01_line" id="hidden_field_data_infor01" style="<?php echo $sStyleHidden_infor01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_infor01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["infor01"]) &&  $this->nmgp_cmp_readonly["infor01"] == "on") { 

 ?>
<input type="hidden" name="infor01" value="<?php echo $this->form_encode_input($infor01) . "\">" . $infor01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_infor01" class="sc-ui-readonly-infor01 css_infor01_line" style="<?php echo $sStyleReadLab_infor01; ?>"><?php echo $this->form_format_readonly("infor01", $this->form_encode_input($this->infor01)); ?></span><span id="id_read_off_infor01" class="css_read_off_infor01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_infor01; ?>">
 <input class="sc-js-input scFormObjectOdd css_infor01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_infor01" type=text name="infor01" value="<?php echo $this->form_encode_input($infor01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_infor01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_infor01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['infor03']))
    {
        $this->nm_new_label['infor03'] = "Infor 03";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $infor03 = $this->infor03;
   $sStyleHidden_infor03 = '';
   if (isset($this->nmgp_cmp_hidden['infor03']) && $this->nmgp_cmp_hidden['infor03'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['infor03']);
       $sStyleHidden_infor03 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_infor03 = 'display: none;';
   $sStyleReadInp_infor03 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['infor03']) && $this->nmgp_cmp_readonly['infor03'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['infor03']);
       $sStyleReadLab_infor03 = '';
       $sStyleReadInp_infor03 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['infor03']) && $this->nmgp_cmp_hidden['infor03'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="infor03" value="<?php echo $this->form_encode_input($infor03) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_infor03_label" id="hidden_field_label_infor03" style="<?php echo $sStyleHidden_infor03; ?>"><span id="id_label_infor03"><?php echo $this->nm_new_label['infor03']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor03']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor03'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_infor03_line" id="hidden_field_data_infor03" style="<?php echo $sStyleHidden_infor03; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_infor03_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["infor03"]) &&  $this->nmgp_cmp_readonly["infor03"] == "on") { 

 ?>
<input type="hidden" name="infor03" value="<?php echo $this->form_encode_input($infor03) . "\">" . $infor03 . ""; ?>
<?php } else { ?>
<span id="id_read_on_infor03" class="sc-ui-readonly-infor03 css_infor03_line" style="<?php echo $sStyleReadLab_infor03; ?>"><?php echo $this->form_format_readonly("infor03", $this->form_encode_input($this->infor03)); ?></span><span id="id_read_off_infor03" class="css_read_off_infor03<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_infor03; ?>">
 <input class="sc-js-input scFormObjectOdd css_infor03_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_infor03" type=text name="infor03" value="<?php echo $this->form_encode_input($infor03) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_infor03_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_infor03_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['infor05']))
    {
        $this->nm_new_label['infor05'] = "Infor 05";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $infor05 = $this->infor05;
   $sStyleHidden_infor05 = '';
   if (isset($this->nmgp_cmp_hidden['infor05']) && $this->nmgp_cmp_hidden['infor05'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['infor05']);
       $sStyleHidden_infor05 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_infor05 = 'display: none;';
   $sStyleReadInp_infor05 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['infor05']) && $this->nmgp_cmp_readonly['infor05'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['infor05']);
       $sStyleReadLab_infor05 = '';
       $sStyleReadInp_infor05 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['infor05']) && $this->nmgp_cmp_hidden['infor05'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="infor05" value="<?php echo $this->form_encode_input($infor05) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_infor05_label" id="hidden_field_label_infor05" style="<?php echo $sStyleHidden_infor05; ?>"><span id="id_label_infor05"><?php echo $this->nm_new_label['infor05']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor05']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor05'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_infor05_line" id="hidden_field_data_infor05" style="<?php echo $sStyleHidden_infor05; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_infor05_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["infor05"]) &&  $this->nmgp_cmp_readonly["infor05"] == "on") { 

 ?>
<input type="hidden" name="infor05" value="<?php echo $this->form_encode_input($infor05) . "\">" . $infor05 . ""; ?>
<?php } else { ?>
<span id="id_read_on_infor05" class="sc-ui-readonly-infor05 css_infor05_line" style="<?php echo $sStyleReadLab_infor05; ?>"><?php echo $this->form_format_readonly("infor05", $this->form_encode_input($this->infor05)); ?></span><span id="id_read_off_infor05" class="css_read_off_infor05<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_infor05; ?>">
 <input class="sc-js-input scFormObjectOdd css_infor05_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_infor05" type=text name="infor05" value="<?php echo $this->form_encode_input($infor05) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_infor05_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_infor05_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['infor07']))
    {
        $this->nm_new_label['infor07'] = "Infor 07";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $infor07 = $this->infor07;
   $sStyleHidden_infor07 = '';
   if (isset($this->nmgp_cmp_hidden['infor07']) && $this->nmgp_cmp_hidden['infor07'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['infor07']);
       $sStyleHidden_infor07 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_infor07 = 'display: none;';
   $sStyleReadInp_infor07 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['infor07']) && $this->nmgp_cmp_readonly['infor07'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['infor07']);
       $sStyleReadLab_infor07 = '';
       $sStyleReadInp_infor07 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['infor07']) && $this->nmgp_cmp_hidden['infor07'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="infor07" value="<?php echo $this->form_encode_input($infor07) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_infor07_label" id="hidden_field_label_infor07" style="<?php echo $sStyleHidden_infor07; ?>"><span id="id_label_infor07"><?php echo $this->nm_new_label['infor07']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor07']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor07'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_infor07_line" id="hidden_field_data_infor07" style="<?php echo $sStyleHidden_infor07; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_infor07_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["infor07"]) &&  $this->nmgp_cmp_readonly["infor07"] == "on") { 

 ?>
<input type="hidden" name="infor07" value="<?php echo $this->form_encode_input($infor07) . "\">" . $infor07 . ""; ?>
<?php } else { ?>
<span id="id_read_on_infor07" class="sc-ui-readonly-infor07 css_infor07_line" style="<?php echo $sStyleReadLab_infor07; ?>"><?php echo $this->form_format_readonly("infor07", $this->form_encode_input($this->infor07)); ?></span><span id="id_read_off_infor07" class="css_read_off_infor07<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_infor07; ?>">
 <input class="sc-js-input scFormObjectOdd css_infor07_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_infor07" type=text name="infor07" value="<?php echo $this->form_encode_input($infor07) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_infor07_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_infor07_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porcenrenta']))
    {
        $this->nm_new_label['porcenrenta'] = "Porcenrenta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porcenrenta = $this->porcenrenta;
   $sStyleHidden_porcenrenta = '';
   if (isset($this->nmgp_cmp_hidden['porcenrenta']) && $this->nmgp_cmp_hidden['porcenrenta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porcenrenta']);
       $sStyleHidden_porcenrenta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porcenrenta = 'display: none;';
   $sStyleReadInp_porcenrenta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porcenrenta']) && $this->nmgp_cmp_readonly['porcenrenta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porcenrenta']);
       $sStyleReadLab_porcenrenta = '';
       $sStyleReadInp_porcenrenta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porcenrenta']) && $this->nmgp_cmp_hidden['porcenrenta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcenrenta" value="<?php echo $this->form_encode_input($porcenrenta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porcenrenta_label" id="hidden_field_label_porcenrenta" style="<?php echo $sStyleHidden_porcenrenta; ?>"><span id="id_label_porcenrenta"><?php echo $this->nm_new_label['porcenrenta']; ?></span></TD>
    <TD class="scFormDataOdd css_porcenrenta_line" id="hidden_field_data_porcenrenta" style="<?php echo $sStyleHidden_porcenrenta; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porcenrenta_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcenrenta"]) &&  $this->nmgp_cmp_readonly["porcenrenta"] == "on") { 

 ?>
<input type="hidden" name="porcenrenta" value="<?php echo $this->form_encode_input($porcenrenta) . "\">" . $porcenrenta . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcenrenta" class="sc-ui-readonly-porcenrenta css_porcenrenta_line" style="<?php echo $sStyleReadLab_porcenrenta; ?>"><?php echo $this->form_format_readonly("porcenrenta", $this->form_encode_input($this->porcenrenta)); ?></span><span id="id_read_off_porcenrenta" class="css_read_off_porcenrenta<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcenrenta; ?>">
 <input class="sc-js-input scFormObjectOdd css_porcenrenta_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porcenrenta" type=text name="porcenrenta" value="<?php echo $this->form_encode_input($porcenrenta) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcenrenta']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcenrenta']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porcenrenta']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcenrenta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcenrenta_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['peso']))
    {
        $this->nm_new_label['peso'] = "Peso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $peso = $this->peso;
   $sStyleHidden_peso = '';
   if (isset($this->nmgp_cmp_hidden['peso']) && $this->nmgp_cmp_hidden['peso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['peso']);
       $sStyleHidden_peso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_peso = 'display: none;';
   $sStyleReadInp_peso = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['peso']) && $this->nmgp_cmp_readonly['peso'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['peso']);
       $sStyleReadLab_peso = '';
       $sStyleReadInp_peso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['peso']) && $this->nmgp_cmp_hidden['peso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="peso" value="<?php echo $this->form_encode_input($peso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_peso_label" id="hidden_field_label_peso" style="<?php echo $sStyleHidden_peso; ?>"><span id="id_label_peso"><?php echo $this->nm_new_label['peso']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['peso']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['peso'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_peso_line" id="hidden_field_data_peso" style="<?php echo $sStyleHidden_peso; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_peso_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["peso"]) &&  $this->nmgp_cmp_readonly["peso"] == "on") { 

 ?>
<input type="hidden" name="peso" value="<?php echo $this->form_encode_input($peso) . "\">" . $peso . ""; ?>
<?php } else { ?>
<span id="id_read_on_peso" class="sc-ui-readonly-peso css_peso_line" style="<?php echo $sStyleReadLab_peso; ?>"><?php echo $this->form_format_readonly("peso", $this->form_encode_input($this->peso)); ?></span><span id="id_read_off_peso" class="css_read_off_peso<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_peso; ?>">
 <input class="sc-js-input scFormObjectOdd css_peso_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_peso" type=text name="peso" value="<?php echo $this->form_encode_input($peso) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_peso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_peso_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['consignado']))
    {
        $this->nm_new_label['consignado'] = "Consignado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $consignado = $this->consignado;
   $sStyleHidden_consignado = '';
   if (isset($this->nmgp_cmp_hidden['consignado']) && $this->nmgp_cmp_hidden['consignado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['consignado']);
       $sStyleHidden_consignado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_consignado = 'display: none;';
   $sStyleReadInp_consignado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['consignado']) && $this->nmgp_cmp_readonly['consignado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['consignado']);
       $sStyleReadLab_consignado = '';
       $sStyleReadInp_consignado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['consignado']) && $this->nmgp_cmp_hidden['consignado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consignado" value="<?php echo $this->form_encode_input($consignado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_consignado_label" id="hidden_field_label_consignado" style="<?php echo $sStyleHidden_consignado; ?>"><span id="id_label_consignado"><?php echo $this->nm_new_label['consignado']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['consignado']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['consignado'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_consignado_line" id="hidden_field_data_consignado" style="<?php echo $sStyleHidden_consignado; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_consignado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["consignado"]) &&  $this->nmgp_cmp_readonly["consignado"] == "on") { 

 ?>
<input type="hidden" name="consignado" value="<?php echo $this->form_encode_input($consignado) . "\">" . $consignado . ""; ?>
<?php } else { ?>
<span id="id_read_on_consignado" class="sc-ui-readonly-consignado css_consignado_line" style="<?php echo $sStyleReadLab_consignado; ?>"><?php echo $this->form_format_readonly("consignado", $this->form_encode_input($this->consignado)); ?></span><span id="id_read_off_consignado" class="css_read_off_consignado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_consignado; ?>">
 <input class="sc-js-input scFormObjectOdd css_consignado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_consignado" type=text name="consignado" value="<?php echo $this->form_encode_input($consignado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_consignado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_consignado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cant_consignado']))
    {
        $this->nm_new_label['cant_consignado'] = "Cant Consignado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cant_consignado = $this->cant_consignado;
   $sStyleHidden_cant_consignado = '';
   if (isset($this->nmgp_cmp_hidden['cant_consignado']) && $this->nmgp_cmp_hidden['cant_consignado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cant_consignado']);
       $sStyleHidden_cant_consignado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cant_consignado = 'display: none;';
   $sStyleReadInp_cant_consignado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cant_consignado']) && $this->nmgp_cmp_readonly['cant_consignado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cant_consignado']);
       $sStyleReadLab_cant_consignado = '';
       $sStyleReadInp_cant_consignado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cant_consignado']) && $this->nmgp_cmp_hidden['cant_consignado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cant_consignado" value="<?php echo $this->form_encode_input($cant_consignado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cant_consignado_label" id="hidden_field_label_cant_consignado" style="<?php echo $sStyleHidden_cant_consignado; ?>"><span id="id_label_cant_consignado"><?php echo $this->nm_new_label['cant_consignado']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['cant_consignado']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['cant_consignado'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_cant_consignado_line" id="hidden_field_data_cant_consignado" style="<?php echo $sStyleHidden_cant_consignado; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cant_consignado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cant_consignado"]) &&  $this->nmgp_cmp_readonly["cant_consignado"] == "on") { 

 ?>
<input type="hidden" name="cant_consignado" value="<?php echo $this->form_encode_input($cant_consignado) . "\">" . $cant_consignado . ""; ?>
<?php } else { ?>
<span id="id_read_on_cant_consignado" class="sc-ui-readonly-cant_consignado css_cant_consignado_line" style="<?php echo $sStyleReadLab_cant_consignado; ?>"><?php echo $this->form_format_readonly("cant_consignado", $this->form_encode_input($this->cant_consignado)); ?></span><span id="id_read_off_cant_consignado" class="css_read_off_cant_consignado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cant_consignado; ?>">
 <input class="sc-js-input scFormObjectOdd css_cant_consignado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cant_consignado" type=text name="cant_consignado" value="<?php echo $this->form_encode_input($cant_consignado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cant_consignado']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cant_consignado']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cant_consignado']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cant_consignado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cant_consignado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['baseimpexe01']))
    {
        $this->nm_new_label['baseimpexe01'] = "Base Imp Exe 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $baseimpexe01 = $this->baseimpexe01;
   $sStyleHidden_baseimpexe01 = '';
   if (isset($this->nmgp_cmp_hidden['baseimpexe01']) && $this->nmgp_cmp_hidden['baseimpexe01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['baseimpexe01']);
       $sStyleHidden_baseimpexe01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_baseimpexe01 = 'display: none;';
   $sStyleReadInp_baseimpexe01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['baseimpexe01']) && $this->nmgp_cmp_readonly['baseimpexe01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['baseimpexe01']);
       $sStyleReadLab_baseimpexe01 = '';
       $sStyleReadInp_baseimpexe01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['baseimpexe01']) && $this->nmgp_cmp_hidden['baseimpexe01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="baseimpexe01" value="<?php echo $this->form_encode_input($baseimpexe01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_baseimpexe01_label" id="hidden_field_label_baseimpexe01" style="<?php echo $sStyleHidden_baseimpexe01; ?>"><span id="id_label_baseimpexe01"><?php echo $this->nm_new_label['baseimpexe01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['baseimpexe01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['baseimpexe01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_baseimpexe01_line" id="hidden_field_data_baseimpexe01" style="<?php echo $sStyleHidden_baseimpexe01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_baseimpexe01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["baseimpexe01"]) &&  $this->nmgp_cmp_readonly["baseimpexe01"] == "on") { 

 ?>
<input type="hidden" name="baseimpexe01" value="<?php echo $this->form_encode_input($baseimpexe01) . "\">" . $baseimpexe01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_baseimpexe01" class="sc-ui-readonly-baseimpexe01 css_baseimpexe01_line" style="<?php echo $sStyleReadLab_baseimpexe01; ?>"><?php echo $this->form_format_readonly("baseimpexe01", $this->form_encode_input($this->baseimpexe01)); ?></span><span id="id_read_off_baseimpexe01" class="css_read_off_baseimpexe01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_baseimpexe01; ?>">
 <input class="sc-js-input scFormObjectOdd css_baseimpexe01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_baseimpexe01" type=text name="baseimpexe01" value="<?php echo $this->form_encode_input($baseimpexe01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_baseimpexe01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_baseimpexe01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['peso01']))
    {
        $this->nm_new_label['peso01'] = "Peso 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $peso01 = $this->peso01;
   $sStyleHidden_peso01 = '';
   if (isset($this->nmgp_cmp_hidden['peso01']) && $this->nmgp_cmp_hidden['peso01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['peso01']);
       $sStyleHidden_peso01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_peso01 = 'display: none;';
   $sStyleReadInp_peso01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['peso01']) && $this->nmgp_cmp_readonly['peso01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['peso01']);
       $sStyleReadLab_peso01 = '';
       $sStyleReadInp_peso01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['peso01']) && $this->nmgp_cmp_hidden['peso01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="peso01" value="<?php echo $this->form_encode_input($peso01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_peso01_label" id="hidden_field_label_peso01" style="<?php echo $sStyleHidden_peso01; ?>"><span id="id_label_peso01"><?php echo $this->nm_new_label['peso01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['peso01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['peso01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_peso01_line" id="hidden_field_data_peso01" style="<?php echo $sStyleHidden_peso01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_peso01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["peso01"]) &&  $this->nmgp_cmp_readonly["peso01"] == "on") { 

 ?>
<input type="hidden" name="peso01" value="<?php echo $this->form_encode_input($peso01) . "\">" . $peso01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_peso01" class="sc-ui-readonly-peso01 css_peso01_line" style="<?php echo $sStyleReadLab_peso01; ?>"><?php echo $this->form_format_readonly("peso01", $this->form_encode_input($this->peso01)); ?></span><span id="id_read_off_peso01" class="css_read_off_peso01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_peso01; ?>">
 <input class="sc-js-input scFormObjectOdd css_peso01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_peso01" type=text name="peso01" value="<?php echo $this->form_encode_input($peso01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 6, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['peso01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['peso01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['peso01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['peso01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_peso01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_peso01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['prodrel01']))
    {
        $this->nm_new_label['prodrel01'] = "Prodrel 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $prodrel01 = $this->prodrel01;
   $sStyleHidden_prodrel01 = '';
   if (isset($this->nmgp_cmp_hidden['prodrel01']) && $this->nmgp_cmp_hidden['prodrel01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['prodrel01']);
       $sStyleHidden_prodrel01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_prodrel01 = 'display: none;';
   $sStyleReadInp_prodrel01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['prodrel01']) && $this->nmgp_cmp_readonly['prodrel01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['prodrel01']);
       $sStyleReadLab_prodrel01 = '';
       $sStyleReadInp_prodrel01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['prodrel01']) && $this->nmgp_cmp_hidden['prodrel01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prodrel01" value="<?php echo $this->form_encode_input($prodrel01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_prodrel01_label" id="hidden_field_label_prodrel01" style="<?php echo $sStyleHidden_prodrel01; ?>"><span id="id_label_prodrel01"><?php echo $this->nm_new_label['prodrel01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['prodrel01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['prodrel01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_prodrel01_line" id="hidden_field_data_prodrel01" style="<?php echo $sStyleHidden_prodrel01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_prodrel01_line" style="vertical-align: top;padding: 0px">
<?php
$prodrel01_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($prodrel01));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prodrel01"]) &&  $this->nmgp_cmp_readonly["prodrel01"] == "on") { 

 ?>
<input type="hidden" name="prodrel01" value="<?php echo $this->form_encode_input($prodrel01) . "\">" . $prodrel01_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_prodrel01" class="sc-ui-readonly-prodrel01 css_prodrel01_line" style="<?php echo $sStyleReadLab_prodrel01; ?>"><?php echo $this->form_format_readonly("prodrel01", $this->form_encode_input($prodrel01_val)); ?></span><span id="id_read_off_prodrel01" class="css_read_off_prodrel01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_prodrel01; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_prodrel01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="prodrel01" id="id_sc_field_prodrel01" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $prodrel01; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prodrel01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prodrel01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['infor02']))
    {
        $this->nm_new_label['infor02'] = "Infor 02";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $infor02 = $this->infor02;
   $sStyleHidden_infor02 = '';
   if (isset($this->nmgp_cmp_hidden['infor02']) && $this->nmgp_cmp_hidden['infor02'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['infor02']);
       $sStyleHidden_infor02 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_infor02 = 'display: none;';
   $sStyleReadInp_infor02 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['infor02']) && $this->nmgp_cmp_readonly['infor02'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['infor02']);
       $sStyleReadLab_infor02 = '';
       $sStyleReadInp_infor02 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['infor02']) && $this->nmgp_cmp_hidden['infor02'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="infor02" value="<?php echo $this->form_encode_input($infor02) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_infor02_label" id="hidden_field_label_infor02" style="<?php echo $sStyleHidden_infor02; ?>"><span id="id_label_infor02"><?php echo $this->nm_new_label['infor02']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor02']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor02'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_infor02_line" id="hidden_field_data_infor02" style="<?php echo $sStyleHidden_infor02; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_infor02_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["infor02"]) &&  $this->nmgp_cmp_readonly["infor02"] == "on") { 

 ?>
<input type="hidden" name="infor02" value="<?php echo $this->form_encode_input($infor02) . "\">" . $infor02 . ""; ?>
<?php } else { ?>
<span id="id_read_on_infor02" class="sc-ui-readonly-infor02 css_infor02_line" style="<?php echo $sStyleReadLab_infor02; ?>"><?php echo $this->form_format_readonly("infor02", $this->form_encode_input($this->infor02)); ?></span><span id="id_read_off_infor02" class="css_read_off_infor02<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_infor02; ?>">
 <input class="sc-js-input scFormObjectOdd css_infor02_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_infor02" type=text name="infor02" value="<?php echo $this->form_encode_input($infor02) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_infor02_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_infor02_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['infor04']))
    {
        $this->nm_new_label['infor04'] = "Infor 04";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $infor04 = $this->infor04;
   $sStyleHidden_infor04 = '';
   if (isset($this->nmgp_cmp_hidden['infor04']) && $this->nmgp_cmp_hidden['infor04'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['infor04']);
       $sStyleHidden_infor04 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_infor04 = 'display: none;';
   $sStyleReadInp_infor04 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['infor04']) && $this->nmgp_cmp_readonly['infor04'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['infor04']);
       $sStyleReadLab_infor04 = '';
       $sStyleReadInp_infor04 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['infor04']) && $this->nmgp_cmp_hidden['infor04'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="infor04" value="<?php echo $this->form_encode_input($infor04) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_infor04_label" id="hidden_field_label_infor04" style="<?php echo $sStyleHidden_infor04; ?>"><span id="id_label_infor04"><?php echo $this->nm_new_label['infor04']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor04']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor04'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_infor04_line" id="hidden_field_data_infor04" style="<?php echo $sStyleHidden_infor04; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_infor04_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["infor04"]) &&  $this->nmgp_cmp_readonly["infor04"] == "on") { 

 ?>
<input type="hidden" name="infor04" value="<?php echo $this->form_encode_input($infor04) . "\">" . $infor04 . ""; ?>
<?php } else { ?>
<span id="id_read_on_infor04" class="sc-ui-readonly-infor04 css_infor04_line" style="<?php echo $sStyleReadLab_infor04; ?>"><?php echo $this->form_format_readonly("infor04", $this->form_encode_input($this->infor04)); ?></span><span id="id_read_off_infor04" class="css_read_off_infor04<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_infor04; ?>">
 <input class="sc-js-input scFormObjectOdd css_infor04_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_infor04" type=text name="infor04" value="<?php echo $this->form_encode_input($infor04) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_infor04_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_infor04_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['infor06']))
    {
        $this->nm_new_label['infor06'] = "Infor 06";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $infor06 = $this->infor06;
   $sStyleHidden_infor06 = '';
   if (isset($this->nmgp_cmp_hidden['infor06']) && $this->nmgp_cmp_hidden['infor06'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['infor06']);
       $sStyleHidden_infor06 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_infor06 = 'display: none;';
   $sStyleReadInp_infor06 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['infor06']) && $this->nmgp_cmp_readonly['infor06'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['infor06']);
       $sStyleReadLab_infor06 = '';
       $sStyleReadInp_infor06 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['infor06']) && $this->nmgp_cmp_hidden['infor06'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="infor06" value="<?php echo $this->form_encode_input($infor06) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_infor06_label" id="hidden_field_label_infor06" style="<?php echo $sStyleHidden_infor06; ?>"><span id="id_label_infor06"><?php echo $this->nm_new_label['infor06']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor06']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor06'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_infor06_line" id="hidden_field_data_infor06" style="<?php echo $sStyleHidden_infor06; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_infor06_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["infor06"]) &&  $this->nmgp_cmp_readonly["infor06"] == "on") { 

 ?>
<input type="hidden" name="infor06" value="<?php echo $this->form_encode_input($infor06) . "\">" . $infor06 . ""; ?>
<?php } else { ?>
<span id="id_read_on_infor06" class="sc-ui-readonly-infor06 css_infor06_line" style="<?php echo $sStyleReadLab_infor06; ?>"><?php echo $this->form_format_readonly("infor06", $this->form_encode_input($this->infor06)); ?></span><span id="id_read_off_infor06" class="css_read_off_infor06<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_infor06; ?>">
 <input class="sc-js-input scFormObjectOdd css_infor06_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_infor06" type=text name="infor06" value="<?php echo $this->form_encode_input($infor06) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_infor06_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_infor06_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['infor08']))
    {
        $this->nm_new_label['infor08'] = "Infor 08";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $infor08 = $this->infor08;
   $sStyleHidden_infor08 = '';
   if (isset($this->nmgp_cmp_hidden['infor08']) && $this->nmgp_cmp_hidden['infor08'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['infor08']);
       $sStyleHidden_infor08 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_infor08 = 'display: none;';
   $sStyleReadInp_infor08 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['infor08']) && $this->nmgp_cmp_readonly['infor08'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['infor08']);
       $sStyleReadLab_infor08 = '';
       $sStyleReadInp_infor08 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['infor08']) && $this->nmgp_cmp_hidden['infor08'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="infor08" value="<?php echo $this->form_encode_input($infor08) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_infor08_label" id="hidden_field_label_infor08" style="<?php echo $sStyleHidden_infor08; ?>"><span id="id_label_infor08"><?php echo $this->nm_new_label['infor08']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor08']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['php_cmp_required']['infor08'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_infor08_line" id="hidden_field_data_infor08" style="<?php echo $sStyleHidden_infor08; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_infor08_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["infor08"]) &&  $this->nmgp_cmp_readonly["infor08"] == "on") { 

 ?>
<input type="hidden" name="infor08" value="<?php echo $this->form_encode_input($infor08) . "\">" . $infor08 . ""; ?>
<?php } else { ?>
<span id="id_read_on_infor08" class="sc-ui-readonly-infor08 css_infor08_line" style="<?php echo $sStyleReadLab_infor08; ?>"><?php echo $this->form_format_readonly("infor08", $this->form_encode_input($this->infor08)); ?></span><span id="id_read_off_infor08" class="css_read_off_infor08<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_infor08; ?>">
 <input class="sc-js-input scFormObjectOdd css_infor08_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_infor08" type=text name="infor08" value="<?php echo $this->form_encode_input($infor08) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_infor08_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_infor08_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porcicevta01']))
    {
        $this->nm_new_label['porcicevta01'] = "Porcicevta 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porcicevta01 = $this->porcicevta01;
   $sStyleHidden_porcicevta01 = '';
   if (isset($this->nmgp_cmp_hidden['porcicevta01']) && $this->nmgp_cmp_hidden['porcicevta01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porcicevta01']);
       $sStyleHidden_porcicevta01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porcicevta01 = 'display: none;';
   $sStyleReadInp_porcicevta01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porcicevta01']) && $this->nmgp_cmp_readonly['porcicevta01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porcicevta01']);
       $sStyleReadLab_porcicevta01 = '';
       $sStyleReadInp_porcicevta01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porcicevta01']) && $this->nmgp_cmp_hidden['porcicevta01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcicevta01" value="<?php echo $this->form_encode_input($porcicevta01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porcicevta01_label" id="hidden_field_label_porcicevta01" style="<?php echo $sStyleHidden_porcicevta01; ?>"><span id="id_label_porcicevta01"><?php echo $this->nm_new_label['porcicevta01']; ?></span></TD>
    <TD class="scFormDataOdd css_porcicevta01_line" id="hidden_field_data_porcicevta01" style="<?php echo $sStyleHidden_porcicevta01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porcicevta01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcicevta01"]) &&  $this->nmgp_cmp_readonly["porcicevta01"] == "on") { 

 ?>
<input type="hidden" name="porcicevta01" value="<?php echo $this->form_encode_input($porcicevta01) . "\">" . $porcicevta01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcicevta01" class="sc-ui-readonly-porcicevta01 css_porcicevta01_line" style="<?php echo $sStyleReadLab_porcicevta01; ?>"><?php echo $this->form_format_readonly("porcicevta01", $this->form_encode_input($this->porcicevta01)); ?></span><span id="id_read_off_porcicevta01" class="css_read_off_porcicevta01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcicevta01; ?>">
 <input class="sc-js-input scFormObjectOdd css_porcicevta01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porcicevta01" type=text name="porcicevta01" value="<?php echo $this->form_encode_input($porcicevta01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porcicevta01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcicevta01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcicevta01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porcicevta01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcicevta01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcicevta01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porcicecpra01']))
    {
        $this->nm_new_label['porcicecpra01'] = "Porcicecpra 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porcicecpra01 = $this->porcicecpra01;
   $sStyleHidden_porcicecpra01 = '';
   if (isset($this->nmgp_cmp_hidden['porcicecpra01']) && $this->nmgp_cmp_hidden['porcicecpra01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porcicecpra01']);
       $sStyleHidden_porcicecpra01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porcicecpra01 = 'display: none;';
   $sStyleReadInp_porcicecpra01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porcicecpra01']) && $this->nmgp_cmp_readonly['porcicecpra01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porcicecpra01']);
       $sStyleReadLab_porcicecpra01 = '';
       $sStyleReadInp_porcicecpra01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porcicecpra01']) && $this->nmgp_cmp_hidden['porcicecpra01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcicecpra01" value="<?php echo $this->form_encode_input($porcicecpra01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porcicecpra01_label" id="hidden_field_label_porcicecpra01" style="<?php echo $sStyleHidden_porcicecpra01; ?>"><span id="id_label_porcicecpra01"><?php echo $this->nm_new_label['porcicecpra01']; ?></span></TD>
    <TD class="scFormDataOdd css_porcicecpra01_line" id="hidden_field_data_porcicecpra01" style="<?php echo $sStyleHidden_porcicecpra01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porcicecpra01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcicecpra01"]) &&  $this->nmgp_cmp_readonly["porcicecpra01"] == "on") { 

 ?>
<input type="hidden" name="porcicecpra01" value="<?php echo $this->form_encode_input($porcicecpra01) . "\">" . $porcicecpra01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcicecpra01" class="sc-ui-readonly-porcicecpra01 css_porcicecpra01_line" style="<?php echo $sStyleReadLab_porcicecpra01; ?>"><?php echo $this->form_format_readonly("porcicecpra01", $this->form_encode_input($this->porcicecpra01)); ?></span><span id="id_read_off_porcicecpra01" class="css_read_off_porcicecpra01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcicecpra01; ?>">
 <input class="sc-js-input scFormObjectOdd css_porcicecpra01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porcicecpra01" type=text name="porcicecpra01" value="<?php echo $this->form_encode_input($porcicecpra01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porcicecpra01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcicecpra01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcicecpra01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porcicecpra01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcicecpra01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcicecpra01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['porcptdaranc01']))
    {
        $this->nm_new_label['porcptdaranc01'] = "Porcptdaranc 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $porcptdaranc01 = $this->porcptdaranc01;
   $sStyleHidden_porcptdaranc01 = '';
   if (isset($this->nmgp_cmp_hidden['porcptdaranc01']) && $this->nmgp_cmp_hidden['porcptdaranc01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['porcptdaranc01']);
       $sStyleHidden_porcptdaranc01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_porcptdaranc01 = 'display: none;';
   $sStyleReadInp_porcptdaranc01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['porcptdaranc01']) && $this->nmgp_cmp_readonly['porcptdaranc01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['porcptdaranc01']);
       $sStyleReadLab_porcptdaranc01 = '';
       $sStyleReadInp_porcptdaranc01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['porcptdaranc01']) && $this->nmgp_cmp_hidden['porcptdaranc01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="porcptdaranc01" value="<?php echo $this->form_encode_input($porcptdaranc01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_porcptdaranc01_label" id="hidden_field_label_porcptdaranc01" style="<?php echo $sStyleHidden_porcptdaranc01; ?>"><span id="id_label_porcptdaranc01"><?php echo $this->nm_new_label['porcptdaranc01']; ?></span></TD>
    <TD class="scFormDataOdd css_porcptdaranc01_line" id="hidden_field_data_porcptdaranc01" style="<?php echo $sStyleHidden_porcptdaranc01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_porcptdaranc01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["porcptdaranc01"]) &&  $this->nmgp_cmp_readonly["porcptdaranc01"] == "on") { 

 ?>
<input type="hidden" name="porcptdaranc01" value="<?php echo $this->form_encode_input($porcptdaranc01) . "\">" . $porcptdaranc01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_porcptdaranc01" class="sc-ui-readonly-porcptdaranc01 css_porcptdaranc01_line" style="<?php echo $sStyleReadLab_porcptdaranc01; ?>"><?php echo $this->form_format_readonly("porcptdaranc01", $this->form_encode_input($this->porcptdaranc01)); ?></span><span id="id_read_off_porcptdaranc01" class="css_read_off_porcptdaranc01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_porcptdaranc01; ?>">
 <input class="sc-js-input scFormObjectOdd css_porcptdaranc01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_porcptdaranc01" type=text name="porcptdaranc01" value="<?php echo $this->form_encode_input($porcptdaranc01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['porcptdaranc01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['porcptdaranc01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['porcptdaranc01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['porcptdaranc01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_porcptdaranc01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_porcptdaranc01_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ordimp01']))
    {
        $this->nm_new_label['ordimp01'] = "Ordimp 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ordimp01 = $this->ordimp01;
   $sStyleHidden_ordimp01 = '';
   if (isset($this->nmgp_cmp_hidden['ordimp01']) && $this->nmgp_cmp_hidden['ordimp01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ordimp01']);
       $sStyleHidden_ordimp01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ordimp01 = 'display: none;';
   $sStyleReadInp_ordimp01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ordimp01']) && $this->nmgp_cmp_readonly['ordimp01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ordimp01']);
       $sStyleReadLab_ordimp01 = '';
       $sStyleReadInp_ordimp01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ordimp01']) && $this->nmgp_cmp_hidden['ordimp01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ordimp01" value="<?php echo $this->form_encode_input($ordimp01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ordimp01_label" id="hidden_field_label_ordimp01" style="<?php echo $sStyleHidden_ordimp01; ?>"><span id="id_label_ordimp01"><?php echo $this->nm_new_label['ordimp01']; ?></span></TD>
    <TD class="scFormDataOdd css_ordimp01_line" id="hidden_field_data_ordimp01" style="<?php echo $sStyleHidden_ordimp01; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ordimp01_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ordimp01"]) &&  $this->nmgp_cmp_readonly["ordimp01"] == "on") { 

 ?>
<input type="hidden" name="ordimp01" value="<?php echo $this->form_encode_input($ordimp01) . "\">" . $ordimp01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ordimp01" class="sc-ui-readonly-ordimp01 css_ordimp01_line" style="<?php echo $sStyleReadLab_ordimp01; ?>"><?php echo $this->form_format_readonly("ordimp01", $this->form_encode_input($this->ordimp01)); ?></span><span id="id_read_off_ordimp01" class="css_read_off_ordimp01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ordimp01; ?>">
 <input class="sc-js-input scFormObjectOdd css_ordimp01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ordimp01" type=text name="ordimp01" value="<?php echo $this->form_encode_input($ordimp01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ordimp01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ordimp01_text"></span></td></tr></table></td></tr></table></TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['birpara'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['first'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['back'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['forward'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_maepro");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_maepro");
 parent.scAjaxDetailHeight("form_maepro", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_maepro", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_maepro", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepro']['buttonStatus'] = $this->nmgp_botoes;
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
