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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " maecom"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " maecom"); } ?></TITLE>
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
.css_read_off_fecfact31 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecped31 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fectrasfer31 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecdocpr31 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecvencidocpr button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecemb button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_maecom/form_maecom_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_maecom_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_maecom_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['link_info']['remove_border']) {
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
 include_once("form_maecom_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_maecom'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_maecom'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['fast_search'][2] : "";
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['insert'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['bcancelar'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['update'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['delete'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['tipodocto31']))
           {
               $this->nmgp_cmp_readonly['tipodocto31'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['nofact31']))
           {
               $this->nmgp_cmp_readonly['nofact31'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['tipodocto31']))
    {
        $this->nm_new_label['tipodocto31'] = "Tipodocto 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipodocto31 = $this->tipodocto31;
   $sStyleHidden_tipodocto31 = '';
   if (isset($this->nmgp_cmp_hidden['tipodocto31']) && $this->nmgp_cmp_hidden['tipodocto31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipodocto31']);
       $sStyleHidden_tipodocto31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipodocto31 = 'display: none;';
   $sStyleReadInp_tipodocto31 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["tipodocto31"]) &&  $this->nmgp_cmp_readonly["tipodocto31"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipodocto31']);
       $sStyleReadLab_tipodocto31 = '';
       $sStyleReadInp_tipodocto31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipodocto31']) && $this->nmgp_cmp_hidden['tipodocto31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipodocto31" value="<?php echo $this->form_encode_input($tipodocto31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipodocto31_label" id="hidden_field_label_tipodocto31" style="<?php echo $sStyleHidden_tipodocto31; ?>"><span id="id_label_tipodocto31"><?php echo $this->nm_new_label['tipodocto31']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['tipodocto31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['tipodocto31'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_tipodocto31_line" id="hidden_field_data_tipodocto31" style="<?php echo $sStyleHidden_tipodocto31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipodocto31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["tipodocto31"]) &&  $this->nmgp_cmp_readonly["tipodocto31"] == "on")) { 

 ?>
<input type="hidden" name="tipodocto31" value="<?php echo $this->form_encode_input($tipodocto31) . "\"><span id=\"id_ajax_label_tipodocto31\">" . $tipodocto31 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_tipodocto31" class="sc-ui-readonly-tipodocto31 css_tipodocto31_line" style="<?php echo $sStyleReadLab_tipodocto31; ?>"><?php echo $this->form_format_readonly("tipodocto31", $this->form_encode_input($this->tipodocto31)); ?></span><span id="id_read_off_tipodocto31" class="css_read_off_tipodocto31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipodocto31; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipodocto31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipodocto31" type=text name="tipodocto31" value="<?php echo $this->form_encode_input($tipodocto31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipodocto31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipodocto31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nofact31']))
    {
        $this->nm_new_label['nofact31'] = "Nofact 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nofact31 = $this->nofact31;
   $sStyleHidden_nofact31 = '';
   if (isset($this->nmgp_cmp_hidden['nofact31']) && $this->nmgp_cmp_hidden['nofact31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nofact31']);
       $sStyleHidden_nofact31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nofact31 = 'display: none;';
   $sStyleReadInp_nofact31 = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["nofact31"]) &&  $this->nmgp_cmp_readonly["nofact31"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nofact31']);
       $sStyleReadLab_nofact31 = '';
       $sStyleReadInp_nofact31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nofact31']) && $this->nmgp_cmp_hidden['nofact31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nofact31" value="<?php echo $this->form_encode_input($nofact31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nofact31_label" id="hidden_field_label_nofact31" style="<?php echo $sStyleHidden_nofact31; ?>"><span id="id_label_nofact31"><?php echo $this->nm_new_label['nofact31']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nofact31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nofact31'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_nofact31_line" id="hidden_field_data_nofact31" style="<?php echo $sStyleHidden_nofact31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nofact31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["nofact31"]) &&  $this->nmgp_cmp_readonly["nofact31"] == "on")) { 

 ?>
<input type="hidden" name="nofact31" value="<?php echo $this->form_encode_input($nofact31) . "\"><span id=\"id_ajax_label_nofact31\">" . $nofact31 . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_nofact31" class="sc-ui-readonly-nofact31 css_nofact31_line" style="<?php echo $sStyleReadLab_nofact31; ?>"><?php echo $this->form_format_readonly("nofact31", $this->form_encode_input($this->nofact31)); ?></span><span id="id_read_off_nofact31" class="css_read_off_nofact31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nofact31; ?>">
 <input class="sc-js-input scFormObjectOdd css_nofact31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nofact31" type=text name="nofact31" value="<?php echo $this->form_encode_input($nofact31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nofact31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nofact31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nocte31']))
    {
        $this->nm_new_label['nocte31'] = "Nocte 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nocte31 = $this->nocte31;
   $sStyleHidden_nocte31 = '';
   if (isset($this->nmgp_cmp_hidden['nocte31']) && $this->nmgp_cmp_hidden['nocte31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nocte31']);
       $sStyleHidden_nocte31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nocte31 = 'display: none;';
   $sStyleReadInp_nocte31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nocte31']) && $this->nmgp_cmp_readonly['nocte31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nocte31']);
       $sStyleReadLab_nocte31 = '';
       $sStyleReadInp_nocte31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nocte31']) && $this->nmgp_cmp_hidden['nocte31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nocte31" value="<?php echo $this->form_encode_input($nocte31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nocte31_label" id="hidden_field_label_nocte31" style="<?php echo $sStyleHidden_nocte31; ?>"><span id="id_label_nocte31"><?php echo $this->nm_new_label['nocte31']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nocte31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nocte31'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_nocte31_line" id="hidden_field_data_nocte31" style="<?php echo $sStyleHidden_nocte31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nocte31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nocte31"]) &&  $this->nmgp_cmp_readonly["nocte31"] == "on") { 

 ?>
<input type="hidden" name="nocte31" value="<?php echo $this->form_encode_input($nocte31) . "\">" . $nocte31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nocte31" class="sc-ui-readonly-nocte31 css_nocte31_line" style="<?php echo $sStyleReadLab_nocte31; ?>"><?php echo $this->form_format_readonly("nocte31", $this->form_encode_input($this->nocte31)); ?></span><span id="id_read_off_nocte31" class="css_read_off_nocte31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nocte31; ?>">
 <input class="sc-js-input scFormObjectOdd css_nocte31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nocte31" type=text name="nocte31" value="<?php echo $this->form_encode_input($nocte31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nocte31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nocte31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nomcte31']))
    {
        $this->nm_new_label['nomcte31'] = "Nomcte 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nomcte31 = $this->nomcte31;
   $sStyleHidden_nomcte31 = '';
   if (isset($this->nmgp_cmp_hidden['nomcte31']) && $this->nmgp_cmp_hidden['nomcte31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nomcte31']);
       $sStyleHidden_nomcte31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nomcte31 = 'display: none;';
   $sStyleReadInp_nomcte31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nomcte31']) && $this->nmgp_cmp_readonly['nomcte31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nomcte31']);
       $sStyleReadLab_nomcte31 = '';
       $sStyleReadInp_nomcte31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nomcte31']) && $this->nmgp_cmp_hidden['nomcte31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nomcte31" value="<?php echo $this->form_encode_input($nomcte31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nomcte31_label" id="hidden_field_label_nomcte31" style="<?php echo $sStyleHidden_nomcte31; ?>"><span id="id_label_nomcte31"><?php echo $this->nm_new_label['nomcte31']; ?></span></TD>
    <TD class="scFormDataOdd css_nomcte31_line" id="hidden_field_data_nomcte31" style="<?php echo $sStyleHidden_nomcte31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nomcte31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nomcte31"]) &&  $this->nmgp_cmp_readonly["nomcte31"] == "on") { 

 ?>
<input type="hidden" name="nomcte31" value="<?php echo $this->form_encode_input($nomcte31) . "\">" . $nomcte31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nomcte31" class="sc-ui-readonly-nomcte31 css_nomcte31_line" style="<?php echo $sStyleReadLab_nomcte31; ?>"><?php echo $this->form_format_readonly("nomcte31", $this->form_encode_input($this->nomcte31)); ?></span><span id="id_read_off_nomcte31" class="css_read_off_nomcte31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nomcte31; ?>">
 <input class="sc-js-input scFormObjectOdd css_nomcte31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nomcte31" type=text name="nomcte31" value="<?php echo $this->form_encode_input($nomcte31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nomcte31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nomcte31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['localid31']))
    {
        $this->nm_new_label['localid31'] = "Localid 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $localid31 = $this->localid31;
   $sStyleHidden_localid31 = '';
   if (isset($this->nmgp_cmp_hidden['localid31']) && $this->nmgp_cmp_hidden['localid31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['localid31']);
       $sStyleHidden_localid31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_localid31 = 'display: none;';
   $sStyleReadInp_localid31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['localid31']) && $this->nmgp_cmp_readonly['localid31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['localid31']);
       $sStyleReadLab_localid31 = '';
       $sStyleReadInp_localid31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['localid31']) && $this->nmgp_cmp_hidden['localid31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="localid31" value="<?php echo $this->form_encode_input($localid31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_localid31_label" id="hidden_field_label_localid31" style="<?php echo $sStyleHidden_localid31; ?>"><span id="id_label_localid31"><?php echo $this->nm_new_label['localid31']; ?></span></TD>
    <TD class="scFormDataOdd css_localid31_line" id="hidden_field_data_localid31" style="<?php echo $sStyleHidden_localid31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_localid31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["localid31"]) &&  $this->nmgp_cmp_readonly["localid31"] == "on") { 

 ?>
<input type="hidden" name="localid31" value="<?php echo $this->form_encode_input($localid31) . "\">" . $localid31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_localid31" class="sc-ui-readonly-localid31 css_localid31_line" style="<?php echo $sStyleReadLab_localid31; ?>"><?php echo $this->form_format_readonly("localid31", $this->form_encode_input($this->localid31)); ?></span><span id="id_read_off_localid31" class="css_read_off_localid31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_localid31; ?>">
 <input class="sc-js-input scFormObjectOdd css_localid31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_localid31" type=text name="localid31" value="<?php echo $this->form_encode_input($localid31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_localid31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_localid31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvectenegro31']))
    {
        $this->nm_new_label['cvectenegro31'] = "Cvectenegro 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvectenegro31 = $this->cvectenegro31;
   $sStyleHidden_cvectenegro31 = '';
   if (isset($this->nmgp_cmp_hidden['cvectenegro31']) && $this->nmgp_cmp_hidden['cvectenegro31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvectenegro31']);
       $sStyleHidden_cvectenegro31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvectenegro31 = 'display: none;';
   $sStyleReadInp_cvectenegro31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvectenegro31']) && $this->nmgp_cmp_readonly['cvectenegro31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvectenegro31']);
       $sStyleReadLab_cvectenegro31 = '';
       $sStyleReadInp_cvectenegro31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvectenegro31']) && $this->nmgp_cmp_hidden['cvectenegro31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvectenegro31" value="<?php echo $this->form_encode_input($cvectenegro31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvectenegro31_label" id="hidden_field_label_cvectenegro31" style="<?php echo $sStyleHidden_cvectenegro31; ?>"><span id="id_label_cvectenegro31"><?php echo $this->nm_new_label['cvectenegro31']; ?></span></TD>
    <TD class="scFormDataOdd css_cvectenegro31_line" id="hidden_field_data_cvectenegro31" style="<?php echo $sStyleHidden_cvectenegro31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvectenegro31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvectenegro31"]) &&  $this->nmgp_cmp_readonly["cvectenegro31"] == "on") { 

 ?>
<input type="hidden" name="cvectenegro31" value="<?php echo $this->form_encode_input($cvectenegro31) . "\">" . $cvectenegro31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvectenegro31" class="sc-ui-readonly-cvectenegro31 css_cvectenegro31_line" style="<?php echo $sStyleReadLab_cvectenegro31; ?>"><?php echo $this->form_format_readonly("cvectenegro31", $this->form_encode_input($this->cvectenegro31)); ?></span><span id="id_read_off_cvectenegro31" class="css_read_off_cvectenegro31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvectenegro31; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvectenegro31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvectenegro31" type=text name="cvectenegro31" value="<?php echo $this->form_encode_input($cvectenegro31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvectenegro31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvectenegro31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vtabta31']))
    {
        $this->nm_new_label['vtabta31'] = "Vtabta 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vtabta31 = $this->vtabta31;
   $sStyleHidden_vtabta31 = '';
   if (isset($this->nmgp_cmp_hidden['vtabta31']) && $this->nmgp_cmp_hidden['vtabta31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vtabta31']);
       $sStyleHidden_vtabta31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vtabta31 = 'display: none;';
   $sStyleReadInp_vtabta31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vtabta31']) && $this->nmgp_cmp_readonly['vtabta31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vtabta31']);
       $sStyleReadLab_vtabta31 = '';
       $sStyleReadInp_vtabta31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vtabta31']) && $this->nmgp_cmp_hidden['vtabta31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vtabta31" value="<?php echo $this->form_encode_input($vtabta31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vtabta31_label" id="hidden_field_label_vtabta31" style="<?php echo $sStyleHidden_vtabta31; ?>"><span id="id_label_vtabta31"><?php echo $this->nm_new_label['vtabta31']; ?></span></TD>
    <TD class="scFormDataOdd css_vtabta31_line" id="hidden_field_data_vtabta31" style="<?php echo $sStyleHidden_vtabta31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vtabta31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vtabta31"]) &&  $this->nmgp_cmp_readonly["vtabta31"] == "on") { 

 ?>
<input type="hidden" name="vtabta31" value="<?php echo $this->form_encode_input($vtabta31) . "\">" . $vtabta31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_vtabta31" class="sc-ui-readonly-vtabta31 css_vtabta31_line" style="<?php echo $sStyleReadLab_vtabta31; ?>"><?php echo $this->form_format_readonly("vtabta31", $this->form_encode_input($this->vtabta31)); ?></span><span id="id_read_off_vtabta31" class="css_read_off_vtabta31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_vtabta31; ?>">
 <input class="sc-js-input scFormObjectOdd css_vtabta31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_vtabta31" type=text name="vtabta31" value="<?php echo $this->form_encode_input($vtabta31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['vtabta31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['vtabta31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['vtabta31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['vtabta31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vtabta31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vtabta31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descto31']))
    {
        $this->nm_new_label['descto31'] = "Descto 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descto31 = $this->descto31;
   $sStyleHidden_descto31 = '';
   if (isset($this->nmgp_cmp_hidden['descto31']) && $this->nmgp_cmp_hidden['descto31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descto31']);
       $sStyleHidden_descto31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descto31 = 'display: none;';
   $sStyleReadInp_descto31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descto31']) && $this->nmgp_cmp_readonly['descto31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descto31']);
       $sStyleReadLab_descto31 = '';
       $sStyleReadInp_descto31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descto31']) && $this->nmgp_cmp_hidden['descto31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descto31" value="<?php echo $this->form_encode_input($descto31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_descto31_label" id="hidden_field_label_descto31" style="<?php echo $sStyleHidden_descto31; ?>"><span id="id_label_descto31"><?php echo $this->nm_new_label['descto31']; ?></span></TD>
    <TD class="scFormDataOdd css_descto31_line" id="hidden_field_data_descto31" style="<?php echo $sStyleHidden_descto31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_descto31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["descto31"]) &&  $this->nmgp_cmp_readonly["descto31"] == "on") { 

 ?>
<input type="hidden" name="descto31" value="<?php echo $this->form_encode_input($descto31) . "\">" . $descto31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_descto31" class="sc-ui-readonly-descto31 css_descto31_line" style="<?php echo $sStyleReadLab_descto31; ?>"><?php echo $this->form_format_readonly("descto31", $this->form_encode_input($this->descto31)); ?></span><span id="id_read_off_descto31" class="css_read_off_descto31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_descto31; ?>">
 <input class="sc-js-input scFormObjectOdd css_descto31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_descto31" type=text name="descto31" value="<?php echo $this->form_encode_input($descto31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['descto31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['descto31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['descto31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['descto31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descto31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descto31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['flete31']))
    {
        $this->nm_new_label['flete31'] = "Flete 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $flete31 = $this->flete31;
   $sStyleHidden_flete31 = '';
   if (isset($this->nmgp_cmp_hidden['flete31']) && $this->nmgp_cmp_hidden['flete31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['flete31']);
       $sStyleHidden_flete31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_flete31 = 'display: none;';
   $sStyleReadInp_flete31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['flete31']) && $this->nmgp_cmp_readonly['flete31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['flete31']);
       $sStyleReadLab_flete31 = '';
       $sStyleReadInp_flete31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['flete31']) && $this->nmgp_cmp_hidden['flete31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="flete31" value="<?php echo $this->form_encode_input($flete31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_flete31_label" id="hidden_field_label_flete31" style="<?php echo $sStyleHidden_flete31; ?>"><span id="id_label_flete31"><?php echo $this->nm_new_label['flete31']; ?></span></TD>
    <TD class="scFormDataOdd css_flete31_line" id="hidden_field_data_flete31" style="<?php echo $sStyleHidden_flete31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_flete31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["flete31"]) &&  $this->nmgp_cmp_readonly["flete31"] == "on") { 

 ?>
<input type="hidden" name="flete31" value="<?php echo $this->form_encode_input($flete31) . "\">" . $flete31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_flete31" class="sc-ui-readonly-flete31 css_flete31_line" style="<?php echo $sStyleReadLab_flete31; ?>"><?php echo $this->form_format_readonly("flete31", $this->form_encode_input($this->flete31)); ?></span><span id="id_read_off_flete31" class="css_read_off_flete31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_flete31; ?>">
 <input class="sc-js-input scFormObjectOdd css_flete31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_flete31" type=text name="flete31" value="<?php echo $this->form_encode_input($flete31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['flete31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['flete31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['flete31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['flete31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_flete31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_flete31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['itm31']))
    {
        $this->nm_new_label['itm31'] = "Itm 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $itm31 = $this->itm31;
   $sStyleHidden_itm31 = '';
   if (isset($this->nmgp_cmp_hidden['itm31']) && $this->nmgp_cmp_hidden['itm31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['itm31']);
       $sStyleHidden_itm31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_itm31 = 'display: none;';
   $sStyleReadInp_itm31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['itm31']) && $this->nmgp_cmp_readonly['itm31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['itm31']);
       $sStyleReadLab_itm31 = '';
       $sStyleReadInp_itm31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['itm31']) && $this->nmgp_cmp_hidden['itm31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="itm31" value="<?php echo $this->form_encode_input($itm31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_itm31_label" id="hidden_field_label_itm31" style="<?php echo $sStyleHidden_itm31; ?>"><span id="id_label_itm31"><?php echo $this->nm_new_label['itm31']; ?></span></TD>
    <TD class="scFormDataOdd css_itm31_line" id="hidden_field_data_itm31" style="<?php echo $sStyleHidden_itm31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_itm31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["itm31"]) &&  $this->nmgp_cmp_readonly["itm31"] == "on") { 

 ?>
<input type="hidden" name="itm31" value="<?php echo $this->form_encode_input($itm31) . "\">" . $itm31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_itm31" class="sc-ui-readonly-itm31 css_itm31_line" style="<?php echo $sStyleReadLab_itm31; ?>"><?php echo $this->form_format_readonly("itm31", $this->form_encode_input($this->itm31)); ?></span><span id="id_read_off_itm31" class="css_read_off_itm31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_itm31; ?>">
 <input class="sc-js-input scFormObjectOdd css_itm31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_itm31" type=text name="itm31" value="<?php echo $this->form_encode_input($itm31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> alt="{datatype: 'decimal', maxLength: 5, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['itm31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['itm31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['itm31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['itm31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_itm31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_itm31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['novend31']))
    {
        $this->nm_new_label['novend31'] = "Novend 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $novend31 = $this->novend31;
   $sStyleHidden_novend31 = '';
   if (isset($this->nmgp_cmp_hidden['novend31']) && $this->nmgp_cmp_hidden['novend31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['novend31']);
       $sStyleHidden_novend31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_novend31 = 'display: none;';
   $sStyleReadInp_novend31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['novend31']) && $this->nmgp_cmp_readonly['novend31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['novend31']);
       $sStyleReadLab_novend31 = '';
       $sStyleReadInp_novend31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['novend31']) && $this->nmgp_cmp_hidden['novend31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="novend31" value="<?php echo $this->form_encode_input($novend31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_novend31_label" id="hidden_field_label_novend31" style="<?php echo $sStyleHidden_novend31; ?>"><span id="id_label_novend31"><?php echo $this->nm_new_label['novend31']; ?></span></TD>
    <TD class="scFormDataOdd css_novend31_line" id="hidden_field_data_novend31" style="<?php echo $sStyleHidden_novend31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_novend31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["novend31"]) &&  $this->nmgp_cmp_readonly["novend31"] == "on") { 

 ?>
<input type="hidden" name="novend31" value="<?php echo $this->form_encode_input($novend31) . "\">" . $novend31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_novend31" class="sc-ui-readonly-novend31 css_novend31_line" style="<?php echo $sStyleReadLab_novend31; ?>"><?php echo $this->form_format_readonly("novend31", $this->form_encode_input($this->novend31)); ?></span><span id="id_read_off_novend31" class="css_read_off_novend31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_novend31; ?>">
 <input class="sc-js-input scFormObjectOdd css_novend31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_novend31" type=text name="novend31" value="<?php echo $this->form_encode_input($novend31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_novend31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_novend31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecfact31']))
    {
        $this->nm_new_label['fecfact31'] = "Fecfact 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecfact31 = $this->fecfact31;
   if (strlen($this->fecfact31_hora) > 8 ) {$this->fecfact31_hora = substr($this->fecfact31_hora, 0, 8);}
   $this->fecfact31 .= ' ' . $this->fecfact31_hora;
   $this->fecfact31  = trim($this->fecfact31);
   $fecfact31 = $this->fecfact31;
   $sStyleHidden_fecfact31 = '';
   if (isset($this->nmgp_cmp_hidden['fecfact31']) && $this->nmgp_cmp_hidden['fecfact31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecfact31']);
       $sStyleHidden_fecfact31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecfact31 = 'display: none;';
   $sStyleReadInp_fecfact31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecfact31']) && $this->nmgp_cmp_readonly['fecfact31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecfact31']);
       $sStyleReadLab_fecfact31 = '';
       $sStyleReadInp_fecfact31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecfact31']) && $this->nmgp_cmp_hidden['fecfact31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecfact31" value="<?php echo $this->form_encode_input($fecfact31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecfact31_label" id="hidden_field_label_fecfact31" style="<?php echo $sStyleHidden_fecfact31; ?>"><span id="id_label_fecfact31"><?php echo $this->nm_new_label['fecfact31']; ?></span></TD>
    <TD class="scFormDataOdd css_fecfact31_line" id="hidden_field_data_fecfact31" style="<?php echo $sStyleHidden_fecfact31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecfact31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecfact31"]) &&  $this->nmgp_cmp_readonly["fecfact31"] == "on") { 

 ?>
<input type="hidden" name="fecfact31" value="<?php echo $this->form_encode_input($fecfact31) . "\">" . $fecfact31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecfact31" class="sc-ui-readonly-fecfact31 css_fecfact31_line" style="<?php echo $sStyleReadLab_fecfact31; ?>"><?php echo $this->form_format_readonly("fecfact31", $this->form_encode_input($fecfact31)); ?></span><span id="id_read_off_fecfact31" class="css_read_off_fecfact31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecfact31; ?>"><?php
$tmp_form_data = $this->field_config['fecfact31']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecfact31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecfact31" type=text name="fecfact31" value="<?php echo $this->form_encode_input($fecfact31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecfact31']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecfact31']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecfact31']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecfact31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecfact31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecfact31 = $old_dt_fecfact31;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['condpag31']))
    {
        $this->nm_new_label['condpag31'] = "Condpag 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $condpag31 = $this->condpag31;
   $sStyleHidden_condpag31 = '';
   if (isset($this->nmgp_cmp_hidden['condpag31']) && $this->nmgp_cmp_hidden['condpag31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['condpag31']);
       $sStyleHidden_condpag31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_condpag31 = 'display: none;';
   $sStyleReadInp_condpag31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['condpag31']) && $this->nmgp_cmp_readonly['condpag31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['condpag31']);
       $sStyleReadLab_condpag31 = '';
       $sStyleReadInp_condpag31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['condpag31']) && $this->nmgp_cmp_hidden['condpag31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="condpag31" value="<?php echo $this->form_encode_input($condpag31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_condpag31_label" id="hidden_field_label_condpag31" style="<?php echo $sStyleHidden_condpag31; ?>"><span id="id_label_condpag31"><?php echo $this->nm_new_label['condpag31']; ?></span></TD>
    <TD class="scFormDataOdd css_condpag31_line" id="hidden_field_data_condpag31" style="<?php echo $sStyleHidden_condpag31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_condpag31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["condpag31"]) &&  $this->nmgp_cmp_readonly["condpag31"] == "on") { 

 ?>
<input type="hidden" name="condpag31" value="<?php echo $this->form_encode_input($condpag31) . "\">" . $condpag31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_condpag31" class="sc-ui-readonly-condpag31 css_condpag31_line" style="<?php echo $sStyleReadLab_condpag31; ?>"><?php echo $this->form_format_readonly("condpag31", $this->form_encode_input($this->condpag31)); ?></span><span id="id_read_off_condpag31" class="css_read_off_condpag31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_condpag31; ?>">
 <input class="sc-js-input scFormObjectOdd css_condpag31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_condpag31" type=text name="condpag31" value="<?php echo $this->form_encode_input($condpag31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_condpag31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_condpag31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nopagos31']))
    {
        $this->nm_new_label['nopagos31'] = "Nopagos 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nopagos31 = $this->nopagos31;
   $sStyleHidden_nopagos31 = '';
   if (isset($this->nmgp_cmp_hidden['nopagos31']) && $this->nmgp_cmp_hidden['nopagos31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nopagos31']);
       $sStyleHidden_nopagos31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nopagos31 = 'display: none;';
   $sStyleReadInp_nopagos31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nopagos31']) && $this->nmgp_cmp_readonly['nopagos31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nopagos31']);
       $sStyleReadLab_nopagos31 = '';
       $sStyleReadInp_nopagos31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nopagos31']) && $this->nmgp_cmp_hidden['nopagos31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nopagos31" value="<?php echo $this->form_encode_input($nopagos31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nopagos31_label" id="hidden_field_label_nopagos31" style="<?php echo $sStyleHidden_nopagos31; ?>"><span id="id_label_nopagos31"><?php echo $this->nm_new_label['nopagos31']; ?></span></TD>
    <TD class="scFormDataOdd css_nopagos31_line" id="hidden_field_data_nopagos31" style="<?php echo $sStyleHidden_nopagos31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nopagos31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nopagos31"]) &&  $this->nmgp_cmp_readonly["nopagos31"] == "on") { 

 ?>
<input type="hidden" name="nopagos31" value="<?php echo $this->form_encode_input($nopagos31) . "\">" . $nopagos31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nopagos31" class="sc-ui-readonly-nopagos31 css_nopagos31_line" style="<?php echo $sStyleReadLab_nopagos31; ?>"><?php echo $this->form_format_readonly("nopagos31", $this->form_encode_input($this->nopagos31)); ?></span><span id="id_read_off_nopagos31" class="css_read_off_nopagos31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nopagos31; ?>">
 <input class="sc-js-input scFormObjectOdd css_nopagos31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nopagos31" type=text name="nopagos31" value="<?php echo $this->form_encode_input($nopagos31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nopagos31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nopagos31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['formapago31']))
    {
        $this->nm_new_label['formapago31'] = "Formapago 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $formapago31 = $this->formapago31;
   $sStyleHidden_formapago31 = '';
   if (isset($this->nmgp_cmp_hidden['formapago31']) && $this->nmgp_cmp_hidden['formapago31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['formapago31']);
       $sStyleHidden_formapago31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_formapago31 = 'display: none;';
   $sStyleReadInp_formapago31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['formapago31']) && $this->nmgp_cmp_readonly['formapago31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['formapago31']);
       $sStyleReadLab_formapago31 = '';
       $sStyleReadInp_formapago31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['formapago31']) && $this->nmgp_cmp_hidden['formapago31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="formapago31" value="<?php echo $this->form_encode_input($formapago31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_formapago31_label" id="hidden_field_label_formapago31" style="<?php echo $sStyleHidden_formapago31; ?>"><span id="id_label_formapago31"><?php echo $this->nm_new_label['formapago31']; ?></span></TD>
    <TD class="scFormDataOdd css_formapago31_line" id="hidden_field_data_formapago31" style="<?php echo $sStyleHidden_formapago31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_formapago31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["formapago31"]) &&  $this->nmgp_cmp_readonly["formapago31"] == "on") { 

 ?>
<input type="hidden" name="formapago31" value="<?php echo $this->form_encode_input($formapago31) . "\">" . $formapago31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_formapago31" class="sc-ui-readonly-formapago31 css_formapago31_line" style="<?php echo $sStyleReadLab_formapago31; ?>"><?php echo $this->form_format_readonly("formapago31", $this->form_encode_input($this->formapago31)); ?></span><span id="id_read_off_formapago31" class="css_read_off_formapago31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_formapago31; ?>">
 <input class="sc-js-input scFormObjectOdd css_formapago31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_formapago31" type=text name="formapago31" value="<?php echo $this->form_encode_input($formapago31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_formapago31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_formapago31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['obra31']))
    {
        $this->nm_new_label['obra31'] = "Obra 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obra31 = $this->obra31;
   $sStyleHidden_obra31 = '';
   if (isset($this->nmgp_cmp_hidden['obra31']) && $this->nmgp_cmp_hidden['obra31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obra31']);
       $sStyleHidden_obra31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obra31 = 'display: none;';
   $sStyleReadInp_obra31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obra31']) && $this->nmgp_cmp_readonly['obra31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obra31']);
       $sStyleReadLab_obra31 = '';
       $sStyleReadInp_obra31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obra31']) && $this->nmgp_cmp_hidden['obra31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obra31" value="<?php echo $this->form_encode_input($obra31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_obra31_label" id="hidden_field_label_obra31" style="<?php echo $sStyleHidden_obra31; ?>"><span id="id_label_obra31"><?php echo $this->nm_new_label['obra31']; ?></span></TD>
    <TD class="scFormDataOdd css_obra31_line" id="hidden_field_data_obra31" style="<?php echo $sStyleHidden_obra31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obra31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obra31"]) &&  $this->nmgp_cmp_readonly["obra31"] == "on") { 

 ?>
<input type="hidden" name="obra31" value="<?php echo $this->form_encode_input($obra31) . "\">" . $obra31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_obra31" class="sc-ui-readonly-obra31 css_obra31_line" style="<?php echo $sStyleReadLab_obra31; ?>"><?php echo $this->form_format_readonly("obra31", $this->form_encode_input($this->obra31)); ?></span><span id="id_read_off_obra31" class="css_read_off_obra31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obra31; ?>">
 <input class="sc-js-input scFormObjectOdd css_obra31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_obra31" type=text name="obra31" value="<?php echo $this->form_encode_input($obra31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obra31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obra31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['orden31']))
    {
        $this->nm_new_label['orden31'] = "Orden 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $orden31 = $this->orden31;
   $sStyleHidden_orden31 = '';
   if (isset($this->nmgp_cmp_hidden['orden31']) && $this->nmgp_cmp_hidden['orden31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['orden31']);
       $sStyleHidden_orden31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_orden31 = 'display: none;';
   $sStyleReadInp_orden31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['orden31']) && $this->nmgp_cmp_readonly['orden31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['orden31']);
       $sStyleReadLab_orden31 = '';
       $sStyleReadInp_orden31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['orden31']) && $this->nmgp_cmp_hidden['orden31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="orden31" value="<?php echo $this->form_encode_input($orden31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_orden31_label" id="hidden_field_label_orden31" style="<?php echo $sStyleHidden_orden31; ?>"><span id="id_label_orden31"><?php echo $this->nm_new_label['orden31']; ?></span></TD>
    <TD class="scFormDataOdd css_orden31_line" id="hidden_field_data_orden31" style="<?php echo $sStyleHidden_orden31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_orden31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["orden31"]) &&  $this->nmgp_cmp_readonly["orden31"] == "on") { 

 ?>
<input type="hidden" name="orden31" value="<?php echo $this->form_encode_input($orden31) . "\">" . $orden31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_orden31" class="sc-ui-readonly-orden31 css_orden31_line" style="<?php echo $sStyleReadLab_orden31; ?>"><?php echo $this->form_format_readonly("orden31", $this->form_encode_input($this->orden31)); ?></span><span id="id_read_off_orden31" class="css_read_off_orden31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_orden31; ?>">
 <input class="sc-js-input scFormObjectOdd css_orden31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_orden31" type=text name="orden31" value="<?php echo $this->form_encode_input($orden31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_orden31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_orden31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvnegra31']))
    {
        $this->nm_new_label['cvnegra31'] = "Cvnegra 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvnegra31 = $this->cvnegra31;
   $sStyleHidden_cvnegra31 = '';
   if (isset($this->nmgp_cmp_hidden['cvnegra31']) && $this->nmgp_cmp_hidden['cvnegra31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvnegra31']);
       $sStyleHidden_cvnegra31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvnegra31 = 'display: none;';
   $sStyleReadInp_cvnegra31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvnegra31']) && $this->nmgp_cmp_readonly['cvnegra31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvnegra31']);
       $sStyleReadLab_cvnegra31 = '';
       $sStyleReadInp_cvnegra31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvnegra31']) && $this->nmgp_cmp_hidden['cvnegra31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvnegra31" value="<?php echo $this->form_encode_input($cvnegra31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvnegra31_label" id="hidden_field_label_cvnegra31" style="<?php echo $sStyleHidden_cvnegra31; ?>"><span id="id_label_cvnegra31"><?php echo $this->nm_new_label['cvnegra31']; ?></span></TD>
    <TD class="scFormDataOdd css_cvnegra31_line" id="hidden_field_data_cvnegra31" style="<?php echo $sStyleHidden_cvnegra31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvnegra31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvnegra31"]) &&  $this->nmgp_cmp_readonly["cvnegra31"] == "on") { 

 ?>
<input type="hidden" name="cvnegra31" value="<?php echo $this->form_encode_input($cvnegra31) . "\">" . $cvnegra31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvnegra31" class="sc-ui-readonly-cvnegra31 css_cvnegra31_line" style="<?php echo $sStyleReadLab_cvnegra31; ?>"><?php echo $this->form_format_readonly("cvnegra31", $this->form_encode_input($this->cvnegra31)); ?></span><span id="id_read_off_cvnegra31" class="css_read_off_cvnegra31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvnegra31; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvnegra31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvnegra31" type=text name="cvnegra31" value="<?php echo $this->form_encode_input($cvnegra31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvnegra31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvnegra31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['status31']))
    {
        $this->nm_new_label['status31'] = "Status 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $status31 = $this->status31;
   $sStyleHidden_status31 = '';
   if (isset($this->nmgp_cmp_hidden['status31']) && $this->nmgp_cmp_hidden['status31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['status31']);
       $sStyleHidden_status31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_status31 = 'display: none;';
   $sStyleReadInp_status31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['status31']) && $this->nmgp_cmp_readonly['status31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['status31']);
       $sStyleReadLab_status31 = '';
       $sStyleReadInp_status31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['status31']) && $this->nmgp_cmp_hidden['status31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="status31" value="<?php echo $this->form_encode_input($status31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_status31_label" id="hidden_field_label_status31" style="<?php echo $sStyleHidden_status31; ?>"><span id="id_label_status31"><?php echo $this->nm_new_label['status31']; ?></span></TD>
    <TD class="scFormDataOdd css_status31_line" id="hidden_field_data_status31" style="<?php echo $sStyleHidden_status31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_status31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["status31"]) &&  $this->nmgp_cmp_readonly["status31"] == "on") { 

 ?>
<input type="hidden" name="status31" value="<?php echo $this->form_encode_input($status31) . "\">" . $status31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_status31" class="sc-ui-readonly-status31 css_status31_line" style="<?php echo $sStyleReadLab_status31; ?>"><?php echo $this->form_format_readonly("status31", $this->form_encode_input($this->status31)); ?></span><span id="id_read_off_status31" class="css_read_off_status31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_status31; ?>">
 <input class="sc-js-input scFormObjectOdd css_status31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_status31" type=text name="status31" value="<?php echo $this->form_encode_input($status31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_status31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_status31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvimpto31']))
    {
        $this->nm_new_label['cvimpto31'] = "Cvimpto 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvimpto31 = $this->cvimpto31;
   $sStyleHidden_cvimpto31 = '';
   if (isset($this->nmgp_cmp_hidden['cvimpto31']) && $this->nmgp_cmp_hidden['cvimpto31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvimpto31']);
       $sStyleHidden_cvimpto31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvimpto31 = 'display: none;';
   $sStyleReadInp_cvimpto31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvimpto31']) && $this->nmgp_cmp_readonly['cvimpto31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvimpto31']);
       $sStyleReadLab_cvimpto31 = '';
       $sStyleReadInp_cvimpto31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvimpto31']) && $this->nmgp_cmp_hidden['cvimpto31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvimpto31" value="<?php echo $this->form_encode_input($cvimpto31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvimpto31_label" id="hidden_field_label_cvimpto31" style="<?php echo $sStyleHidden_cvimpto31; ?>"><span id="id_label_cvimpto31"><?php echo $this->nm_new_label['cvimpto31']; ?></span></TD>
    <TD class="scFormDataOdd css_cvimpto31_line" id="hidden_field_data_cvimpto31" style="<?php echo $sStyleHidden_cvimpto31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvimpto31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvimpto31"]) &&  $this->nmgp_cmp_readonly["cvimpto31"] == "on") { 

 ?>
<input type="hidden" name="cvimpto31" value="<?php echo $this->form_encode_input($cvimpto31) . "\">" . $cvimpto31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvimpto31" class="sc-ui-readonly-cvimpto31 css_cvimpto31_line" style="<?php echo $sStyleReadLab_cvimpto31; ?>"><?php echo $this->form_format_readonly("cvimpto31", $this->form_encode_input($this->cvimpto31)); ?></span><span id="id_read_off_cvimpto31" class="css_read_off_cvimpto31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvimpto31; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvimpto31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvimpto31" type=text name="cvimpto31" value="<?php echo $this->form_encode_input($cvimpto31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvimpto31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvimpto31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvanulado31']))
    {
        $this->nm_new_label['cvanulado31'] = "Cvanulado 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvanulado31 = $this->cvanulado31;
   $sStyleHidden_cvanulado31 = '';
   if (isset($this->nmgp_cmp_hidden['cvanulado31']) && $this->nmgp_cmp_hidden['cvanulado31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvanulado31']);
       $sStyleHidden_cvanulado31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvanulado31 = 'display: none;';
   $sStyleReadInp_cvanulado31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvanulado31']) && $this->nmgp_cmp_readonly['cvanulado31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvanulado31']);
       $sStyleReadLab_cvanulado31 = '';
       $sStyleReadInp_cvanulado31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvanulado31']) && $this->nmgp_cmp_hidden['cvanulado31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvanulado31" value="<?php echo $this->form_encode_input($cvanulado31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvanulado31_label" id="hidden_field_label_cvanulado31" style="<?php echo $sStyleHidden_cvanulado31; ?>"><span id="id_label_cvanulado31"><?php echo $this->nm_new_label['cvanulado31']; ?></span></TD>
    <TD class="scFormDataOdd css_cvanulado31_line" id="hidden_field_data_cvanulado31" style="<?php echo $sStyleHidden_cvanulado31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvanulado31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvanulado31"]) &&  $this->nmgp_cmp_readonly["cvanulado31"] == "on") { 

 ?>
<input type="hidden" name="cvanulado31" value="<?php echo $this->form_encode_input($cvanulado31) . "\">" . $cvanulado31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvanulado31" class="sc-ui-readonly-cvanulado31 css_cvanulado31_line" style="<?php echo $sStyleReadLab_cvanulado31; ?>"><?php echo $this->form_format_readonly("cvanulado31", $this->form_encode_input($this->cvanulado31)); ?></span><span id="id_read_off_cvanulado31" class="css_read_off_cvanulado31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvanulado31; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvanulado31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvanulado31" type=text name="cvanulado31" value="<?php echo $this->form_encode_input($cvanulado31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvanulado31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvanulado31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['efectivo31']))
    {
        $this->nm_new_label['efectivo31'] = "Efectivo 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $efectivo31 = $this->efectivo31;
   $sStyleHidden_efectivo31 = '';
   if (isset($this->nmgp_cmp_hidden['efectivo31']) && $this->nmgp_cmp_hidden['efectivo31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['efectivo31']);
       $sStyleHidden_efectivo31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_efectivo31 = 'display: none;';
   $sStyleReadInp_efectivo31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['efectivo31']) && $this->nmgp_cmp_readonly['efectivo31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['efectivo31']);
       $sStyleReadLab_efectivo31 = '';
       $sStyleReadInp_efectivo31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['efectivo31']) && $this->nmgp_cmp_hidden['efectivo31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="efectivo31" value="<?php echo $this->form_encode_input($efectivo31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_efectivo31_label" id="hidden_field_label_efectivo31" style="<?php echo $sStyleHidden_efectivo31; ?>"><span id="id_label_efectivo31"><?php echo $this->nm_new_label['efectivo31']; ?></span></TD>
    <TD class="scFormDataOdd css_efectivo31_line" id="hidden_field_data_efectivo31" style="<?php echo $sStyleHidden_efectivo31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_efectivo31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["efectivo31"]) &&  $this->nmgp_cmp_readonly["efectivo31"] == "on") { 

 ?>
<input type="hidden" name="efectivo31" value="<?php echo $this->form_encode_input($efectivo31) . "\">" . $efectivo31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_efectivo31" class="sc-ui-readonly-efectivo31 css_efectivo31_line" style="<?php echo $sStyleReadLab_efectivo31; ?>"><?php echo $this->form_format_readonly("efectivo31", $this->form_encode_input($this->efectivo31)); ?></span><span id="id_read_off_efectivo31" class="css_read_off_efectivo31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_efectivo31; ?>">
 <input class="sc-js-input scFormObjectOdd css_efectivo31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_efectivo31" type=text name="efectivo31" value="<?php echo $this->form_encode_input($efectivo31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['efectivo31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['efectivo31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['efectivo31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['efectivo31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_efectivo31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_efectivo31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cheque31']))
    {
        $this->nm_new_label['cheque31'] = "Cheque 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cheque31 = $this->cheque31;
   $sStyleHidden_cheque31 = '';
   if (isset($this->nmgp_cmp_hidden['cheque31']) && $this->nmgp_cmp_hidden['cheque31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cheque31']);
       $sStyleHidden_cheque31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cheque31 = 'display: none;';
   $sStyleReadInp_cheque31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cheque31']) && $this->nmgp_cmp_readonly['cheque31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cheque31']);
       $sStyleReadLab_cheque31 = '';
       $sStyleReadInp_cheque31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cheque31']) && $this->nmgp_cmp_hidden['cheque31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cheque31" value="<?php echo $this->form_encode_input($cheque31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cheque31_label" id="hidden_field_label_cheque31" style="<?php echo $sStyleHidden_cheque31; ?>"><span id="id_label_cheque31"><?php echo $this->nm_new_label['cheque31']; ?></span></TD>
    <TD class="scFormDataOdd css_cheque31_line" id="hidden_field_data_cheque31" style="<?php echo $sStyleHidden_cheque31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cheque31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cheque31"]) &&  $this->nmgp_cmp_readonly["cheque31"] == "on") { 

 ?>
<input type="hidden" name="cheque31" value="<?php echo $this->form_encode_input($cheque31) . "\">" . $cheque31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cheque31" class="sc-ui-readonly-cheque31 css_cheque31_line" style="<?php echo $sStyleReadLab_cheque31; ?>"><?php echo $this->form_format_readonly("cheque31", $this->form_encode_input($this->cheque31)); ?></span><span id="id_read_off_cheque31" class="css_read_off_cheque31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cheque31; ?>">
 <input class="sc-js-input scFormObjectOdd css_cheque31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cheque31" type=text name="cheque31" value="<?php echo $this->form_encode_input($cheque31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['cheque31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cheque31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cheque31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cheque31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cheque31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cheque31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarjeta31']))
    {
        $this->nm_new_label['tarjeta31'] = "Tarjeta 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarjeta31 = $this->tarjeta31;
   $sStyleHidden_tarjeta31 = '';
   if (isset($this->nmgp_cmp_hidden['tarjeta31']) && $this->nmgp_cmp_hidden['tarjeta31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarjeta31']);
       $sStyleHidden_tarjeta31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarjeta31 = 'display: none;';
   $sStyleReadInp_tarjeta31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarjeta31']) && $this->nmgp_cmp_readonly['tarjeta31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarjeta31']);
       $sStyleReadLab_tarjeta31 = '';
       $sStyleReadInp_tarjeta31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarjeta31']) && $this->nmgp_cmp_hidden['tarjeta31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarjeta31" value="<?php echo $this->form_encode_input($tarjeta31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tarjeta31_label" id="hidden_field_label_tarjeta31" style="<?php echo $sStyleHidden_tarjeta31; ?>"><span id="id_label_tarjeta31"><?php echo $this->nm_new_label['tarjeta31']; ?></span></TD>
    <TD class="scFormDataOdd css_tarjeta31_line" id="hidden_field_data_tarjeta31" style="<?php echo $sStyleHidden_tarjeta31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tarjeta31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarjeta31"]) &&  $this->nmgp_cmp_readonly["tarjeta31"] == "on") { 

 ?>
<input type="hidden" name="tarjeta31" value="<?php echo $this->form_encode_input($tarjeta31) . "\">" . $tarjeta31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_tarjeta31" class="sc-ui-readonly-tarjeta31 css_tarjeta31_line" style="<?php echo $sStyleReadLab_tarjeta31; ?>"><?php echo $this->form_format_readonly("tarjeta31", $this->form_encode_input($this->tarjeta31)); ?></span><span id="id_read_off_tarjeta31" class="css_read_off_tarjeta31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tarjeta31; ?>">
 <input class="sc-js-input scFormObjectOdd css_tarjeta31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tarjeta31" type=text name="tarjeta31" value="<?php echo $this->form_encode_input($tarjeta31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['tarjeta31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tarjeta31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tarjeta31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tarjeta31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tarjeta31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tarjeta31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['acuenta31']))
    {
        $this->nm_new_label['acuenta31'] = "Acuenta 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acuenta31 = $this->acuenta31;
   $sStyleHidden_acuenta31 = '';
   if (isset($this->nmgp_cmp_hidden['acuenta31']) && $this->nmgp_cmp_hidden['acuenta31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acuenta31']);
       $sStyleHidden_acuenta31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acuenta31 = 'display: none;';
   $sStyleReadInp_acuenta31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acuenta31']) && $this->nmgp_cmp_readonly['acuenta31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acuenta31']);
       $sStyleReadLab_acuenta31 = '';
       $sStyleReadInp_acuenta31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acuenta31']) && $this->nmgp_cmp_hidden['acuenta31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acuenta31" value="<?php echo $this->form_encode_input($acuenta31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_acuenta31_label" id="hidden_field_label_acuenta31" style="<?php echo $sStyleHidden_acuenta31; ?>"><span id="id_label_acuenta31"><?php echo $this->nm_new_label['acuenta31']; ?></span></TD>
    <TD class="scFormDataOdd css_acuenta31_line" id="hidden_field_data_acuenta31" style="<?php echo $sStyleHidden_acuenta31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acuenta31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acuenta31"]) &&  $this->nmgp_cmp_readonly["acuenta31"] == "on") { 

 ?>
<input type="hidden" name="acuenta31" value="<?php echo $this->form_encode_input($acuenta31) . "\">" . $acuenta31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_acuenta31" class="sc-ui-readonly-acuenta31 css_acuenta31_line" style="<?php echo $sStyleReadLab_acuenta31; ?>"><?php echo $this->form_format_readonly("acuenta31", $this->form_encode_input($this->acuenta31)); ?></span><span id="id_read_off_acuenta31" class="css_read_off_acuenta31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acuenta31; ?>">
 <input class="sc-js-input scFormObjectOdd css_acuenta31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acuenta31" type=text name="acuenta31" value="<?php echo $this->form_encode_input($acuenta31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['acuenta31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['acuenta31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['acuenta31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['acuenta31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acuenta31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acuenta31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nobanco31']))
    {
        $this->nm_new_label['nobanco31'] = "Nobanco 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nobanco31 = $this->nobanco31;
   $sStyleHidden_nobanco31 = '';
   if (isset($this->nmgp_cmp_hidden['nobanco31']) && $this->nmgp_cmp_hidden['nobanco31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nobanco31']);
       $sStyleHidden_nobanco31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nobanco31 = 'display: none;';
   $sStyleReadInp_nobanco31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nobanco31']) && $this->nmgp_cmp_readonly['nobanco31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nobanco31']);
       $sStyleReadLab_nobanco31 = '';
       $sStyleReadInp_nobanco31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nobanco31']) && $this->nmgp_cmp_hidden['nobanco31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nobanco31" value="<?php echo $this->form_encode_input($nobanco31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nobanco31_label" id="hidden_field_label_nobanco31" style="<?php echo $sStyleHidden_nobanco31; ?>"><span id="id_label_nobanco31"><?php echo $this->nm_new_label['nobanco31']; ?></span></TD>
    <TD class="scFormDataOdd css_nobanco31_line" id="hidden_field_data_nobanco31" style="<?php echo $sStyleHidden_nobanco31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nobanco31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nobanco31"]) &&  $this->nmgp_cmp_readonly["nobanco31"] == "on") { 

 ?>
<input type="hidden" name="nobanco31" value="<?php echo $this->form_encode_input($nobanco31) . "\">" . $nobanco31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nobanco31" class="sc-ui-readonly-nobanco31 css_nobanco31_line" style="<?php echo $sStyleReadLab_nobanco31; ?>"><?php echo $this->form_format_readonly("nobanco31", $this->form_encode_input($this->nobanco31)); ?></span><span id="id_read_off_nobanco31" class="css_read_off_nobanco31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nobanco31; ?>">
 <input class="sc-js-input scFormObjectOdd css_nobanco31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nobanco31" type=text name="nobanco31" value="<?php echo $this->form_encode_input($nobanco31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nobanco31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nobanco31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nombanco31']))
    {
        $this->nm_new_label['nombanco31'] = "Nombanco 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombanco31 = $this->nombanco31;
   $sStyleHidden_nombanco31 = '';
   if (isset($this->nmgp_cmp_hidden['nombanco31']) && $this->nmgp_cmp_hidden['nombanco31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombanco31']);
       $sStyleHidden_nombanco31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombanco31 = 'display: none;';
   $sStyleReadInp_nombanco31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombanco31']) && $this->nmgp_cmp_readonly['nombanco31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombanco31']);
       $sStyleReadLab_nombanco31 = '';
       $sStyleReadInp_nombanco31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombanco31']) && $this->nmgp_cmp_hidden['nombanco31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombanco31" value="<?php echo $this->form_encode_input($nombanco31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nombanco31_label" id="hidden_field_label_nombanco31" style="<?php echo $sStyleHidden_nombanco31; ?>"><span id="id_label_nombanco31"><?php echo $this->nm_new_label['nombanco31']; ?></span></TD>
    <TD class="scFormDataOdd css_nombanco31_line" id="hidden_field_data_nombanco31" style="<?php echo $sStyleHidden_nombanco31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombanco31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombanco31"]) &&  $this->nmgp_cmp_readonly["nombanco31"] == "on") { 

 ?>
<input type="hidden" name="nombanco31" value="<?php echo $this->form_encode_input($nombanco31) . "\">" . $nombanco31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombanco31" class="sc-ui-readonly-nombanco31 css_nombanco31_line" style="<?php echo $sStyleReadLab_nombanco31; ?>"><?php echo $this->form_format_readonly("nombanco31", $this->form_encode_input($this->nombanco31)); ?></span><span id="id_read_off_nombanco31" class="css_read_off_nombanco31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombanco31; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombanco31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombanco31" type=text name="nombanco31" value="<?php echo $this->form_encode_input($nombanco31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=40"; } ?> maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombanco31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombanco31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nocheque31']))
    {
        $this->nm_new_label['nocheque31'] = "Nocheque 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nocheque31 = $this->nocheque31;
   $sStyleHidden_nocheque31 = '';
   if (isset($this->nmgp_cmp_hidden['nocheque31']) && $this->nmgp_cmp_hidden['nocheque31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nocheque31']);
       $sStyleHidden_nocheque31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nocheque31 = 'display: none;';
   $sStyleReadInp_nocheque31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nocheque31']) && $this->nmgp_cmp_readonly['nocheque31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nocheque31']);
       $sStyleReadLab_nocheque31 = '';
       $sStyleReadInp_nocheque31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nocheque31']) && $this->nmgp_cmp_hidden['nocheque31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nocheque31" value="<?php echo $this->form_encode_input($nocheque31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nocheque31_label" id="hidden_field_label_nocheque31" style="<?php echo $sStyleHidden_nocheque31; ?>"><span id="id_label_nocheque31"><?php echo $this->nm_new_label['nocheque31']; ?></span></TD>
    <TD class="scFormDataOdd css_nocheque31_line" id="hidden_field_data_nocheque31" style="<?php echo $sStyleHidden_nocheque31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nocheque31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nocheque31"]) &&  $this->nmgp_cmp_readonly["nocheque31"] == "on") { 

 ?>
<input type="hidden" name="nocheque31" value="<?php echo $this->form_encode_input($nocheque31) . "\">" . $nocheque31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nocheque31" class="sc-ui-readonly-nocheque31 css_nocheque31_line" style="<?php echo $sStyleReadLab_nocheque31; ?>"><?php echo $this->form_format_readonly("nocheque31", $this->form_encode_input($this->nocheque31)); ?></span><span id="id_read_off_nocheque31" class="css_read_off_nocheque31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nocheque31; ?>">
 <input class="sc-js-input scFormObjectOdd css_nocheque31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nocheque31" type=text name="nocheque31" value="<?php echo $this->form_encode_input($nocheque31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nocheque31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nocheque31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['notarjeta31']))
    {
        $this->nm_new_label['notarjeta31'] = "Notarjeta 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $notarjeta31 = $this->notarjeta31;
   $sStyleHidden_notarjeta31 = '';
   if (isset($this->nmgp_cmp_hidden['notarjeta31']) && $this->nmgp_cmp_hidden['notarjeta31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['notarjeta31']);
       $sStyleHidden_notarjeta31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_notarjeta31 = 'display: none;';
   $sStyleReadInp_notarjeta31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['notarjeta31']) && $this->nmgp_cmp_readonly['notarjeta31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['notarjeta31']);
       $sStyleReadLab_notarjeta31 = '';
       $sStyleReadInp_notarjeta31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['notarjeta31']) && $this->nmgp_cmp_hidden['notarjeta31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="notarjeta31" value="<?php echo $this->form_encode_input($notarjeta31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_notarjeta31_label" id="hidden_field_label_notarjeta31" style="<?php echo $sStyleHidden_notarjeta31; ?>"><span id="id_label_notarjeta31"><?php echo $this->nm_new_label['notarjeta31']; ?></span></TD>
    <TD class="scFormDataOdd css_notarjeta31_line" id="hidden_field_data_notarjeta31" style="<?php echo $sStyleHidden_notarjeta31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_notarjeta31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["notarjeta31"]) &&  $this->nmgp_cmp_readonly["notarjeta31"] == "on") { 

 ?>
<input type="hidden" name="notarjeta31" value="<?php echo $this->form_encode_input($notarjeta31) . "\">" . $notarjeta31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_notarjeta31" class="sc-ui-readonly-notarjeta31 css_notarjeta31_line" style="<?php echo $sStyleReadLab_notarjeta31; ?>"><?php echo $this->form_format_readonly("notarjeta31", $this->form_encode_input($this->notarjeta31)); ?></span><span id="id_read_off_notarjeta31" class="css_read_off_notarjeta31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_notarjeta31; ?>">
 <input class="sc-js-input scFormObjectOdd css_notarjeta31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_notarjeta31" type=text name="notarjeta31" value="<?php echo $this->form_encode_input($notarjeta31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_notarjeta31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_notarjeta31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nomtarjeta31']))
    {
        $this->nm_new_label['nomtarjeta31'] = "Nomtarjeta 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nomtarjeta31 = $this->nomtarjeta31;
   $sStyleHidden_nomtarjeta31 = '';
   if (isset($this->nmgp_cmp_hidden['nomtarjeta31']) && $this->nmgp_cmp_hidden['nomtarjeta31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nomtarjeta31']);
       $sStyleHidden_nomtarjeta31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nomtarjeta31 = 'display: none;';
   $sStyleReadInp_nomtarjeta31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nomtarjeta31']) && $this->nmgp_cmp_readonly['nomtarjeta31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nomtarjeta31']);
       $sStyleReadLab_nomtarjeta31 = '';
       $sStyleReadInp_nomtarjeta31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nomtarjeta31']) && $this->nmgp_cmp_hidden['nomtarjeta31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nomtarjeta31" value="<?php echo $this->form_encode_input($nomtarjeta31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nomtarjeta31_label" id="hidden_field_label_nomtarjeta31" style="<?php echo $sStyleHidden_nomtarjeta31; ?>"><span id="id_label_nomtarjeta31"><?php echo $this->nm_new_label['nomtarjeta31']; ?></span></TD>
    <TD class="scFormDataOdd css_nomtarjeta31_line" id="hidden_field_data_nomtarjeta31" style="<?php echo $sStyleHidden_nomtarjeta31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nomtarjeta31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nomtarjeta31"]) &&  $this->nmgp_cmp_readonly["nomtarjeta31"] == "on") { 

 ?>
<input type="hidden" name="nomtarjeta31" value="<?php echo $this->form_encode_input($nomtarjeta31) . "\">" . $nomtarjeta31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nomtarjeta31" class="sc-ui-readonly-nomtarjeta31 css_nomtarjeta31_line" style="<?php echo $sStyleReadLab_nomtarjeta31; ?>"><?php echo $this->form_format_readonly("nomtarjeta31", $this->form_encode_input($this->nomtarjeta31)); ?></span><span id="id_read_off_nomtarjeta31" class="css_read_off_nomtarjeta31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nomtarjeta31; ?>">
 <input class="sc-js-input scFormObjectOdd css_nomtarjeta31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nomtarjeta31" type=text name="nomtarjeta31" value="<?php echo $this->form_encode_input($nomtarjeta31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=40"; } ?> maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nomtarjeta31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nomtarjeta31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvdivisa31']))
    {
        $this->nm_new_label['cvdivisa31'] = "Cvdivisa 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvdivisa31 = $this->cvdivisa31;
   $sStyleHidden_cvdivisa31 = '';
   if (isset($this->nmgp_cmp_hidden['cvdivisa31']) && $this->nmgp_cmp_hidden['cvdivisa31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvdivisa31']);
       $sStyleHidden_cvdivisa31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvdivisa31 = 'display: none;';
   $sStyleReadInp_cvdivisa31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvdivisa31']) && $this->nmgp_cmp_readonly['cvdivisa31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvdivisa31']);
       $sStyleReadLab_cvdivisa31 = '';
       $sStyleReadInp_cvdivisa31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvdivisa31']) && $this->nmgp_cmp_hidden['cvdivisa31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvdivisa31" value="<?php echo $this->form_encode_input($cvdivisa31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvdivisa31_label" id="hidden_field_label_cvdivisa31" style="<?php echo $sStyleHidden_cvdivisa31; ?>"><span id="id_label_cvdivisa31"><?php echo $this->nm_new_label['cvdivisa31']; ?></span></TD>
    <TD class="scFormDataOdd css_cvdivisa31_line" id="hidden_field_data_cvdivisa31" style="<?php echo $sStyleHidden_cvdivisa31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvdivisa31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvdivisa31"]) &&  $this->nmgp_cmp_readonly["cvdivisa31"] == "on") { 

 ?>
<input type="hidden" name="cvdivisa31" value="<?php echo $this->form_encode_input($cvdivisa31) . "\">" . $cvdivisa31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvdivisa31" class="sc-ui-readonly-cvdivisa31 css_cvdivisa31_line" style="<?php echo $sStyleReadLab_cvdivisa31; ?>"><?php echo $this->form_format_readonly("cvdivisa31", $this->form_encode_input($this->cvdivisa31)); ?></span><span id="id_read_off_cvdivisa31" class="css_read_off_cvdivisa31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvdivisa31; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvdivisa31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvdivisa31" type=text name="cvdivisa31" value="<?php echo $this->form_encode_input($cvdivisa31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvdivisa31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvdivisa31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valdivisa31']))
    {
        $this->nm_new_label['valdivisa31'] = "Valdivisa 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valdivisa31 = $this->valdivisa31;
   $sStyleHidden_valdivisa31 = '';
   if (isset($this->nmgp_cmp_hidden['valdivisa31']) && $this->nmgp_cmp_hidden['valdivisa31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valdivisa31']);
       $sStyleHidden_valdivisa31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valdivisa31 = 'display: none;';
   $sStyleReadInp_valdivisa31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valdivisa31']) && $this->nmgp_cmp_readonly['valdivisa31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valdivisa31']);
       $sStyleReadLab_valdivisa31 = '';
       $sStyleReadInp_valdivisa31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valdivisa31']) && $this->nmgp_cmp_hidden['valdivisa31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valdivisa31" value="<?php echo $this->form_encode_input($valdivisa31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_valdivisa31_label" id="hidden_field_label_valdivisa31" style="<?php echo $sStyleHidden_valdivisa31; ?>"><span id="id_label_valdivisa31"><?php echo $this->nm_new_label['valdivisa31']; ?></span></TD>
    <TD class="scFormDataOdd css_valdivisa31_line" id="hidden_field_data_valdivisa31" style="<?php echo $sStyleHidden_valdivisa31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valdivisa31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valdivisa31"]) &&  $this->nmgp_cmp_readonly["valdivisa31"] == "on") { 

 ?>
<input type="hidden" name="valdivisa31" value="<?php echo $this->form_encode_input($valdivisa31) . "\">" . $valdivisa31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_valdivisa31" class="sc-ui-readonly-valdivisa31 css_valdivisa31_line" style="<?php echo $sStyleReadLab_valdivisa31; ?>"><?php echo $this->form_format_readonly("valdivisa31", $this->form_encode_input($this->valdivisa31)); ?></span><span id="id_read_off_valdivisa31" class="css_read_off_valdivisa31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valdivisa31; ?>">
 <input class="sc-js-input scFormObjectOdd css_valdivisa31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valdivisa31" type=text name="valdivisa31" value="<?php echo $this->form_encode_input($valdivisa31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> maxlength=6 alt="{datatype: 'text', maxLength: 6, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valdivisa31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valdivisa31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lineaprod31']))
    {
        $this->nm_new_label['lineaprod31'] = "Lineaprod 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lineaprod31 = $this->lineaprod31;
   $sStyleHidden_lineaprod31 = '';
   if (isset($this->nmgp_cmp_hidden['lineaprod31']) && $this->nmgp_cmp_hidden['lineaprod31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lineaprod31']);
       $sStyleHidden_lineaprod31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lineaprod31 = 'display: none;';
   $sStyleReadInp_lineaprod31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lineaprod31']) && $this->nmgp_cmp_readonly['lineaprod31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lineaprod31']);
       $sStyleReadLab_lineaprod31 = '';
       $sStyleReadInp_lineaprod31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lineaprod31']) && $this->nmgp_cmp_hidden['lineaprod31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lineaprod31" value="<?php echo $this->form_encode_input($lineaprod31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lineaprod31_label" id="hidden_field_label_lineaprod31" style="<?php echo $sStyleHidden_lineaprod31; ?>"><span id="id_label_lineaprod31"><?php echo $this->nm_new_label['lineaprod31']; ?></span></TD>
    <TD class="scFormDataOdd css_lineaprod31_line" id="hidden_field_data_lineaprod31" style="<?php echo $sStyleHidden_lineaprod31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lineaprod31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lineaprod31"]) &&  $this->nmgp_cmp_readonly["lineaprod31"] == "on") { 

 ?>
<input type="hidden" name="lineaprod31" value="<?php echo $this->form_encode_input($lineaprod31) . "\">" . $lineaprod31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_lineaprod31" class="sc-ui-readonly-lineaprod31 css_lineaprod31_line" style="<?php echo $sStyleReadLab_lineaprod31; ?>"><?php echo $this->form_format_readonly("lineaprod31", $this->form_encode_input($this->lineaprod31)); ?></span><span id="id_read_off_lineaprod31" class="css_read_off_lineaprod31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_lineaprod31; ?>">
 <input class="sc-js-input scFormObjectOdd css_lineaprod31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_lineaprod31" type=text name="lineaprod31" value="<?php echo $this->form_encode_input($lineaprod31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lineaprod31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lineaprod31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['intereses31']))
    {
        $this->nm_new_label['intereses31'] = "Intereses 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $intereses31 = $this->intereses31;
   $sStyleHidden_intereses31 = '';
   if (isset($this->nmgp_cmp_hidden['intereses31']) && $this->nmgp_cmp_hidden['intereses31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['intereses31']);
       $sStyleHidden_intereses31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_intereses31 = 'display: none;';
   $sStyleReadInp_intereses31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['intereses31']) && $this->nmgp_cmp_readonly['intereses31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['intereses31']);
       $sStyleReadLab_intereses31 = '';
       $sStyleReadInp_intereses31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['intereses31']) && $this->nmgp_cmp_hidden['intereses31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="intereses31" value="<?php echo $this->form_encode_input($intereses31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_intereses31_label" id="hidden_field_label_intereses31" style="<?php echo $sStyleHidden_intereses31; ?>"><span id="id_label_intereses31"><?php echo $this->nm_new_label['intereses31']; ?></span></TD>
    <TD class="scFormDataOdd css_intereses31_line" id="hidden_field_data_intereses31" style="<?php echo $sStyleHidden_intereses31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_intereses31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["intereses31"]) &&  $this->nmgp_cmp_readonly["intereses31"] == "on") { 

 ?>
<input type="hidden" name="intereses31" value="<?php echo $this->form_encode_input($intereses31) . "\">" . $intereses31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_intereses31" class="sc-ui-readonly-intereses31 css_intereses31_line" style="<?php echo $sStyleReadLab_intereses31; ?>"><?php echo $this->form_format_readonly("intereses31", $this->form_encode_input($this->intereses31)); ?></span><span id="id_read_off_intereses31" class="css_read_off_intereses31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_intereses31; ?>">
 <input class="sc-js-input scFormObjectOdd css_intereses31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_intereses31" type=text name="intereses31" value="<?php echo $this->form_encode_input($intereses31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['intereses31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['intereses31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['intereses31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['intereses31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_intereses31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_intereses31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nopedido31']))
    {
        $this->nm_new_label['nopedido31'] = "Nopedido 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nopedido31 = $this->nopedido31;
   $sStyleHidden_nopedido31 = '';
   if (isset($this->nmgp_cmp_hidden['nopedido31']) && $this->nmgp_cmp_hidden['nopedido31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nopedido31']);
       $sStyleHidden_nopedido31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nopedido31 = 'display: none;';
   $sStyleReadInp_nopedido31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nopedido31']) && $this->nmgp_cmp_readonly['nopedido31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nopedido31']);
       $sStyleReadLab_nopedido31 = '';
       $sStyleReadInp_nopedido31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nopedido31']) && $this->nmgp_cmp_hidden['nopedido31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nopedido31" value="<?php echo $this->form_encode_input($nopedido31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nopedido31_label" id="hidden_field_label_nopedido31" style="<?php echo $sStyleHidden_nopedido31; ?>"><span id="id_label_nopedido31"><?php echo $this->nm_new_label['nopedido31']; ?></span></TD>
    <TD class="scFormDataOdd css_nopedido31_line" id="hidden_field_data_nopedido31" style="<?php echo $sStyleHidden_nopedido31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nopedido31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nopedido31"]) &&  $this->nmgp_cmp_readonly["nopedido31"] == "on") { 

 ?>
<input type="hidden" name="nopedido31" value="<?php echo $this->form_encode_input($nopedido31) . "\">" . $nopedido31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nopedido31" class="sc-ui-readonly-nopedido31 css_nopedido31_line" style="<?php echo $sStyleReadLab_nopedido31; ?>"><?php echo $this->form_format_readonly("nopedido31", $this->form_encode_input($this->nopedido31)); ?></span><span id="id_read_off_nopedido31" class="css_read_off_nopedido31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nopedido31; ?>">
 <input class="sc-js-input scFormObjectOdd css_nopedido31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nopedido31" type=text name="nopedido31" value="<?php echo $this->form_encode_input($nopedido31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nopedido31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nopedido31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecped31']))
    {
        $this->nm_new_label['fecped31'] = "Fecped 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecped31 = $this->fecped31;
   if (strlen($this->fecped31_hora) > 8 ) {$this->fecped31_hora = substr($this->fecped31_hora, 0, 8);}
   $this->fecped31 .= ' ' . $this->fecped31_hora;
   $this->fecped31  = trim($this->fecped31);
   $fecped31 = $this->fecped31;
   $sStyleHidden_fecped31 = '';
   if (isset($this->nmgp_cmp_hidden['fecped31']) && $this->nmgp_cmp_hidden['fecped31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecped31']);
       $sStyleHidden_fecped31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecped31 = 'display: none;';
   $sStyleReadInp_fecped31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecped31']) && $this->nmgp_cmp_readonly['fecped31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecped31']);
       $sStyleReadLab_fecped31 = '';
       $sStyleReadInp_fecped31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecped31']) && $this->nmgp_cmp_hidden['fecped31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecped31" value="<?php echo $this->form_encode_input($fecped31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecped31_label" id="hidden_field_label_fecped31" style="<?php echo $sStyleHidden_fecped31; ?>"><span id="id_label_fecped31"><?php echo $this->nm_new_label['fecped31']; ?></span></TD>
    <TD class="scFormDataOdd css_fecped31_line" id="hidden_field_data_fecped31" style="<?php echo $sStyleHidden_fecped31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecped31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecped31"]) &&  $this->nmgp_cmp_readonly["fecped31"] == "on") { 

 ?>
<input type="hidden" name="fecped31" value="<?php echo $this->form_encode_input($fecped31) . "\">" . $fecped31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecped31" class="sc-ui-readonly-fecped31 css_fecped31_line" style="<?php echo $sStyleReadLab_fecped31; ?>"><?php echo $this->form_format_readonly("fecped31", $this->form_encode_input($fecped31)); ?></span><span id="id_read_off_fecped31" class="css_read_off_fecped31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecped31; ?>"><?php
$tmp_form_data = $this->field_config['fecped31']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecped31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecped31" type=text name="fecped31" value="<?php echo $this->form_encode_input($fecped31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecped31']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecped31']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecped31']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecped31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecped31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecped31 = $old_dt_fecped31;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ruc31']))
    {
        $this->nm_new_label['ruc31'] = "Ruc 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ruc31 = $this->ruc31;
   $sStyleHidden_ruc31 = '';
   if (isset($this->nmgp_cmp_hidden['ruc31']) && $this->nmgp_cmp_hidden['ruc31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ruc31']);
       $sStyleHidden_ruc31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ruc31 = 'display: none;';
   $sStyleReadInp_ruc31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ruc31']) && $this->nmgp_cmp_readonly['ruc31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ruc31']);
       $sStyleReadLab_ruc31 = '';
       $sStyleReadInp_ruc31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ruc31']) && $this->nmgp_cmp_hidden['ruc31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ruc31" value="<?php echo $this->form_encode_input($ruc31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ruc31_label" id="hidden_field_label_ruc31" style="<?php echo $sStyleHidden_ruc31; ?>"><span id="id_label_ruc31"><?php echo $this->nm_new_label['ruc31']; ?></span></TD>
    <TD class="scFormDataOdd css_ruc31_line" id="hidden_field_data_ruc31" style="<?php echo $sStyleHidden_ruc31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ruc31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ruc31"]) &&  $this->nmgp_cmp_readonly["ruc31"] == "on") { 

 ?>
<input type="hidden" name="ruc31" value="<?php echo $this->form_encode_input($ruc31) . "\">" . $ruc31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ruc31" class="sc-ui-readonly-ruc31 css_ruc31_line" style="<?php echo $sStyleReadLab_ruc31; ?>"><?php echo $this->form_format_readonly("ruc31", $this->form_encode_input($this->ruc31)); ?></span><span id="id_read_off_ruc31" class="css_read_off_ruc31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ruc31; ?>">
 <input class="sc-js-input scFormObjectOdd css_ruc31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ruc31" type=text name="ruc31" value="<?php echo $this->form_encode_input($ruc31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ruc31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ruc31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tel31']))
    {
        $this->nm_new_label['tel31'] = "Tel 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tel31 = $this->tel31;
   $sStyleHidden_tel31 = '';
   if (isset($this->nmgp_cmp_hidden['tel31']) && $this->nmgp_cmp_hidden['tel31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tel31']);
       $sStyleHidden_tel31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tel31 = 'display: none;';
   $sStyleReadInp_tel31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tel31']) && $this->nmgp_cmp_readonly['tel31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tel31']);
       $sStyleReadLab_tel31 = '';
       $sStyleReadInp_tel31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tel31']) && $this->nmgp_cmp_hidden['tel31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tel31" value="<?php echo $this->form_encode_input($tel31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tel31_label" id="hidden_field_label_tel31" style="<?php echo $sStyleHidden_tel31; ?>"><span id="id_label_tel31"><?php echo $this->nm_new_label['tel31']; ?></span></TD>
    <TD class="scFormDataOdd css_tel31_line" id="hidden_field_data_tel31" style="<?php echo $sStyleHidden_tel31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tel31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tel31"]) &&  $this->nmgp_cmp_readonly["tel31"] == "on") { 

 ?>
<input type="hidden" name="tel31" value="<?php echo $this->form_encode_input($tel31) . "\">" . $tel31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_tel31" class="sc-ui-readonly-tel31 css_tel31_line" style="<?php echo $sStyleReadLab_tel31; ?>"><?php echo $this->form_format_readonly("tel31", $this->form_encode_input($this->tel31)); ?></span><span id="id_read_off_tel31" class="css_read_off_tel31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tel31; ?>">
 <input class="sc-js-input scFormObjectOdd css_tel31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tel31" type=text name="tel31" value="<?php echo $this->form_encode_input($tel31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> maxlength=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tel31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tel31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['transpor31']))
    {
        $this->nm_new_label['transpor31'] = "Transpor 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $transpor31 = $this->transpor31;
   $sStyleHidden_transpor31 = '';
   if (isset($this->nmgp_cmp_hidden['transpor31']) && $this->nmgp_cmp_hidden['transpor31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['transpor31']);
       $sStyleHidden_transpor31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_transpor31 = 'display: none;';
   $sStyleReadInp_transpor31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['transpor31']) && $this->nmgp_cmp_readonly['transpor31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['transpor31']);
       $sStyleReadLab_transpor31 = '';
       $sStyleReadInp_transpor31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['transpor31']) && $this->nmgp_cmp_hidden['transpor31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="transpor31" value="<?php echo $this->form_encode_input($transpor31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_transpor31_label" id="hidden_field_label_transpor31" style="<?php echo $sStyleHidden_transpor31; ?>"><span id="id_label_transpor31"><?php echo $this->nm_new_label['transpor31']; ?></span></TD>
    <TD class="scFormDataOdd css_transpor31_line" id="hidden_field_data_transpor31" style="<?php echo $sStyleHidden_transpor31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_transpor31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["transpor31"]) &&  $this->nmgp_cmp_readonly["transpor31"] == "on") { 

 ?>
<input type="hidden" name="transpor31" value="<?php echo $this->form_encode_input($transpor31) . "\">" . $transpor31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_transpor31" class="sc-ui-readonly-transpor31 css_transpor31_line" style="<?php echo $sStyleReadLab_transpor31; ?>"><?php echo $this->form_format_readonly("transpor31", $this->form_encode_input($this->transpor31)); ?></span><span id="id_read_off_transpor31" class="css_read_off_transpor31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_transpor31; ?>">
 <input class="sc-js-input scFormObjectOdd css_transpor31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_transpor31" type=text name="transpor31" value="<?php echo $this->form_encode_input($transpor31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_transpor31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_transpor31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvtransfer31']))
    {
        $this->nm_new_label['cvtransfer31'] = "Cvtransfer 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvtransfer31 = $this->cvtransfer31;
   $sStyleHidden_cvtransfer31 = '';
   if (isset($this->nmgp_cmp_hidden['cvtransfer31']) && $this->nmgp_cmp_hidden['cvtransfer31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvtransfer31']);
       $sStyleHidden_cvtransfer31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvtransfer31 = 'display: none;';
   $sStyleReadInp_cvtransfer31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvtransfer31']) && $this->nmgp_cmp_readonly['cvtransfer31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvtransfer31']);
       $sStyleReadLab_cvtransfer31 = '';
       $sStyleReadInp_cvtransfer31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvtransfer31']) && $this->nmgp_cmp_hidden['cvtransfer31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvtransfer31" value="<?php echo $this->form_encode_input($cvtransfer31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cvtransfer31_label" id="hidden_field_label_cvtransfer31" style="<?php echo $sStyleHidden_cvtransfer31; ?>"><span id="id_label_cvtransfer31"><?php echo $this->nm_new_label['cvtransfer31']; ?></span></TD>
    <TD class="scFormDataOdd css_cvtransfer31_line" id="hidden_field_data_cvtransfer31" style="<?php echo $sStyleHidden_cvtransfer31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvtransfer31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvtransfer31"]) &&  $this->nmgp_cmp_readonly["cvtransfer31"] == "on") { 

 ?>
<input type="hidden" name="cvtransfer31" value="<?php echo $this->form_encode_input($cvtransfer31) . "\">" . $cvtransfer31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvtransfer31" class="sc-ui-readonly-cvtransfer31 css_cvtransfer31_line" style="<?php echo $sStyleReadLab_cvtransfer31; ?>"><?php echo $this->form_format_readonly("cvtransfer31", $this->form_encode_input($this->cvtransfer31)); ?></span><span id="id_read_off_cvtransfer31" class="css_read_off_cvtransfer31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvtransfer31; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvtransfer31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvtransfer31" type=text name="cvtransfer31" value="<?php echo $this->form_encode_input($cvtransfer31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvtransfer31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvtransfer31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fectrasfer31']))
    {
        $this->nm_new_label['fectrasfer31'] = "Fectrasfer 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fectrasfer31 = $this->fectrasfer31;
   $sStyleHidden_fectrasfer31 = '';
   if (isset($this->nmgp_cmp_hidden['fectrasfer31']) && $this->nmgp_cmp_hidden['fectrasfer31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fectrasfer31']);
       $sStyleHidden_fectrasfer31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fectrasfer31 = 'display: none;';
   $sStyleReadInp_fectrasfer31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fectrasfer31']) && $this->nmgp_cmp_readonly['fectrasfer31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fectrasfer31']);
       $sStyleReadLab_fectrasfer31 = '';
       $sStyleReadInp_fectrasfer31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fectrasfer31']) && $this->nmgp_cmp_hidden['fectrasfer31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fectrasfer31" value="<?php echo $this->form_encode_input($fectrasfer31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fectrasfer31_label" id="hidden_field_label_fectrasfer31" style="<?php echo $sStyleHidden_fectrasfer31; ?>"><span id="id_label_fectrasfer31"><?php echo $this->nm_new_label['fectrasfer31']; ?></span></TD>
    <TD class="scFormDataOdd css_fectrasfer31_line" id="hidden_field_data_fectrasfer31" style="<?php echo $sStyleHidden_fectrasfer31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fectrasfer31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fectrasfer31"]) &&  $this->nmgp_cmp_readonly["fectrasfer31"] == "on") { 

 ?>
<input type="hidden" name="fectrasfer31" value="<?php echo $this->form_encode_input($fectrasfer31) . "\">" . $fectrasfer31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fectrasfer31" class="sc-ui-readonly-fectrasfer31 css_fectrasfer31_line" style="<?php echo $sStyleReadLab_fectrasfer31; ?>"><?php echo $this->form_format_readonly("fectrasfer31", $this->form_encode_input($fectrasfer31)); ?></span><span id="id_read_off_fectrasfer31" class="css_read_off_fectrasfer31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fectrasfer31; ?>"><?php
$tmp_form_data = $this->field_config['fectrasfer31']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fectrasfer31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fectrasfer31" type=text name="fectrasfer31" value="<?php echo $this->form_encode_input($fectrasfer31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fectrasfer31']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fectrasfer31']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fectrasfer31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fectrasfer31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['desctofp31']))
    {
        $this->nm_new_label['desctofp31'] = "Desctofp 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $desctofp31 = $this->desctofp31;
   $sStyleHidden_desctofp31 = '';
   if (isset($this->nmgp_cmp_hidden['desctofp31']) && $this->nmgp_cmp_hidden['desctofp31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['desctofp31']);
       $sStyleHidden_desctofp31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_desctofp31 = 'display: none;';
   $sStyleReadInp_desctofp31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['desctofp31']) && $this->nmgp_cmp_readonly['desctofp31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['desctofp31']);
       $sStyleReadLab_desctofp31 = '';
       $sStyleReadInp_desctofp31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['desctofp31']) && $this->nmgp_cmp_hidden['desctofp31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="desctofp31" value="<?php echo $this->form_encode_input($desctofp31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_desctofp31_label" id="hidden_field_label_desctofp31" style="<?php echo $sStyleHidden_desctofp31; ?>"><span id="id_label_desctofp31"><?php echo $this->nm_new_label['desctofp31']; ?></span></TD>
    <TD class="scFormDataOdd css_desctofp31_line" id="hidden_field_data_desctofp31" style="<?php echo $sStyleHidden_desctofp31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_desctofp31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["desctofp31"]) &&  $this->nmgp_cmp_readonly["desctofp31"] == "on") { 

 ?>
<input type="hidden" name="desctofp31" value="<?php echo $this->form_encode_input($desctofp31) . "\">" . $desctofp31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_desctofp31" class="sc-ui-readonly-desctofp31 css_desctofp31_line" style="<?php echo $sStyleReadLab_desctofp31; ?>"><?php echo $this->form_format_readonly("desctofp31", $this->form_encode_input($this->desctofp31)); ?></span><span id="id_read_off_desctofp31" class="css_read_off_desctofp31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_desctofp31; ?>">
 <input class="sc-js-input scFormObjectOdd css_desctofp31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_desctofp31" type=text name="desctofp31" value="<?php echo $this->form_encode_input($desctofp31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['desctofp31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['desctofp31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['desctofp31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['desctofp31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_desctofp31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_desctofp31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['catcte31']))
    {
        $this->nm_new_label['catcte31'] = "Catcte 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $catcte31 = $this->catcte31;
   $sStyleHidden_catcte31 = '';
   if (isset($this->nmgp_cmp_hidden['catcte31']) && $this->nmgp_cmp_hidden['catcte31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['catcte31']);
       $sStyleHidden_catcte31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_catcte31 = 'display: none;';
   $sStyleReadInp_catcte31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['catcte31']) && $this->nmgp_cmp_readonly['catcte31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['catcte31']);
       $sStyleReadLab_catcte31 = '';
       $sStyleReadInp_catcte31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['catcte31']) && $this->nmgp_cmp_hidden['catcte31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="catcte31" value="<?php echo $this->form_encode_input($catcte31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_catcte31_label" id="hidden_field_label_catcte31" style="<?php echo $sStyleHidden_catcte31; ?>"><span id="id_label_catcte31"><?php echo $this->nm_new_label['catcte31']; ?></span></TD>
    <TD class="scFormDataOdd css_catcte31_line" id="hidden_field_data_catcte31" style="<?php echo $sStyleHidden_catcte31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_catcte31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["catcte31"]) &&  $this->nmgp_cmp_readonly["catcte31"] == "on") { 

 ?>
<input type="hidden" name="catcte31" value="<?php echo $this->form_encode_input($catcte31) . "\">" . $catcte31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_catcte31" class="sc-ui-readonly-catcte31 css_catcte31_line" style="<?php echo $sStyleReadLab_catcte31; ?>"><?php echo $this->form_format_readonly("catcte31", $this->form_encode_input($this->catcte31)); ?></span><span id="id_read_off_catcte31" class="css_read_off_catcte31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_catcte31; ?>">
 <input class="sc-js-input scFormObjectOdd css_catcte31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_catcte31" type=text name="catcte31" value="<?php echo $this->form_encode_input($catcte31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_catcte31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_catcte31_text"></span></td></tr></table></td></tr></table></TD>
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
    if (!isset($this->nm_new_label['recargos31']))
    {
        $this->nm_new_label['recargos31'] = "Recargos 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $recargos31 = $this->recargos31;
   $sStyleHidden_recargos31 = '';
   if (isset($this->nmgp_cmp_hidden['recargos31']) && $this->nmgp_cmp_hidden['recargos31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['recargos31']);
       $sStyleHidden_recargos31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_recargos31 = 'display: none;';
   $sStyleReadInp_recargos31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['recargos31']) && $this->nmgp_cmp_readonly['recargos31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['recargos31']);
       $sStyleReadLab_recargos31 = '';
       $sStyleReadInp_recargos31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['recargos31']) && $this->nmgp_cmp_hidden['recargos31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="recargos31" value="<?php echo $this->form_encode_input($recargos31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_recargos31_label" id="hidden_field_label_recargos31" style="<?php echo $sStyleHidden_recargos31; ?>"><span id="id_label_recargos31"><?php echo $this->nm_new_label['recargos31']; ?></span></TD>
    <TD class="scFormDataOdd css_recargos31_line" id="hidden_field_data_recargos31" style="<?php echo $sStyleHidden_recargos31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_recargos31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["recargos31"]) &&  $this->nmgp_cmp_readonly["recargos31"] == "on") { 

 ?>
<input type="hidden" name="recargos31" value="<?php echo $this->form_encode_input($recargos31) . "\">" . $recargos31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_recargos31" class="sc-ui-readonly-recargos31 css_recargos31_line" style="<?php echo $sStyleReadLab_recargos31; ?>"><?php echo $this->form_format_readonly("recargos31", $this->form_encode_input($this->recargos31)); ?></span><span id="id_read_off_recargos31" class="css_read_off_recargos31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_recargos31; ?>">
 <input class="sc-js-input scFormObjectOdd css_recargos31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_recargos31" type=text name="recargos31" value="<?php echo $this->form_encode_input($recargos31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['recargos31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['recargos31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['recargos31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['recargos31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_recargos31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_recargos31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ice31']))
    {
        $this->nm_new_label['ice31'] = "Ice 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ice31 = $this->ice31;
   $sStyleHidden_ice31 = '';
   if (isset($this->nmgp_cmp_hidden['ice31']) && $this->nmgp_cmp_hidden['ice31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ice31']);
       $sStyleHidden_ice31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ice31 = 'display: none;';
   $sStyleReadInp_ice31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ice31']) && $this->nmgp_cmp_readonly['ice31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ice31']);
       $sStyleReadLab_ice31 = '';
       $sStyleReadInp_ice31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ice31']) && $this->nmgp_cmp_hidden['ice31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ice31" value="<?php echo $this->form_encode_input($ice31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ice31_label" id="hidden_field_label_ice31" style="<?php echo $sStyleHidden_ice31; ?>"><span id="id_label_ice31"><?php echo $this->nm_new_label['ice31']; ?></span></TD>
    <TD class="scFormDataOdd css_ice31_line" id="hidden_field_data_ice31" style="<?php echo $sStyleHidden_ice31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ice31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ice31"]) &&  $this->nmgp_cmp_readonly["ice31"] == "on") { 

 ?>
<input type="hidden" name="ice31" value="<?php echo $this->form_encode_input($ice31) . "\">" . $ice31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ice31" class="sc-ui-readonly-ice31 css_ice31_line" style="<?php echo $sStyleReadLab_ice31; ?>"><?php echo $this->form_format_readonly("ice31", $this->form_encode_input($this->ice31)); ?></span><span id="id_read_off_ice31" class="css_read_off_ice31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ice31; ?>">
 <input class="sc-js-input scFormObjectOdd css_ice31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ice31" type=text name="ice31" value="<?php echo $this->form_encode_input($ice31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['ice31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ice31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ice31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ice31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ice31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ice31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecdocpr31']))
    {
        $this->nm_new_label['fecdocpr31'] = "Fecdocpr 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecdocpr31 = $this->fecdocpr31;
   if (strlen($this->fecdocpr31_hora) > 8 ) {$this->fecdocpr31_hora = substr($this->fecdocpr31_hora, 0, 8);}
   $this->fecdocpr31 .= ' ' . $this->fecdocpr31_hora;
   $this->fecdocpr31  = trim($this->fecdocpr31);
   $fecdocpr31 = $this->fecdocpr31;
   $sStyleHidden_fecdocpr31 = '';
   if (isset($this->nmgp_cmp_hidden['fecdocpr31']) && $this->nmgp_cmp_hidden['fecdocpr31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecdocpr31']);
       $sStyleHidden_fecdocpr31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecdocpr31 = 'display: none;';
   $sStyleReadInp_fecdocpr31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecdocpr31']) && $this->nmgp_cmp_readonly['fecdocpr31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecdocpr31']);
       $sStyleReadLab_fecdocpr31 = '';
       $sStyleReadInp_fecdocpr31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecdocpr31']) && $this->nmgp_cmp_hidden['fecdocpr31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecdocpr31" value="<?php echo $this->form_encode_input($fecdocpr31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecdocpr31_label" id="hidden_field_label_fecdocpr31" style="<?php echo $sStyleHidden_fecdocpr31; ?>"><span id="id_label_fecdocpr31"><?php echo $this->nm_new_label['fecdocpr31']; ?></span></TD>
    <TD class="scFormDataOdd css_fecdocpr31_line" id="hidden_field_data_fecdocpr31" style="<?php echo $sStyleHidden_fecdocpr31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecdocpr31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecdocpr31"]) &&  $this->nmgp_cmp_readonly["fecdocpr31"] == "on") { 

 ?>
<input type="hidden" name="fecdocpr31" value="<?php echo $this->form_encode_input($fecdocpr31) . "\">" . $fecdocpr31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecdocpr31" class="sc-ui-readonly-fecdocpr31 css_fecdocpr31_line" style="<?php echo $sStyleReadLab_fecdocpr31; ?>"><?php echo $this->form_format_readonly("fecdocpr31", $this->form_encode_input($fecdocpr31)); ?></span><span id="id_read_off_fecdocpr31" class="css_read_off_fecdocpr31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecdocpr31; ?>"><?php
$tmp_form_data = $this->field_config['fecdocpr31']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecdocpr31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecdocpr31" type=text name="fecdocpr31" value="<?php echo $this->form_encode_input($fecdocpr31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecdocpr31']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecdocpr31']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecdocpr31']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecdocpr31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecdocpr31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecdocpr31 = $old_dt_fecdocpr31;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipocomp31']))
    {
        $this->nm_new_label['tipocomp31'] = "Tipocomp 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipocomp31 = $this->tipocomp31;
   $sStyleHidden_tipocomp31 = '';
   if (isset($this->nmgp_cmp_hidden['tipocomp31']) && $this->nmgp_cmp_hidden['tipocomp31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipocomp31']);
       $sStyleHidden_tipocomp31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipocomp31 = 'display: none;';
   $sStyleReadInp_tipocomp31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipocomp31']) && $this->nmgp_cmp_readonly['tipocomp31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipocomp31']);
       $sStyleReadLab_tipocomp31 = '';
       $sStyleReadInp_tipocomp31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipocomp31']) && $this->nmgp_cmp_hidden['tipocomp31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipocomp31" value="<?php echo $this->form_encode_input($tipocomp31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipocomp31_label" id="hidden_field_label_tipocomp31" style="<?php echo $sStyleHidden_tipocomp31; ?>"><span id="id_label_tipocomp31"><?php echo $this->nm_new_label['tipocomp31']; ?></span></TD>
    <TD class="scFormDataOdd css_tipocomp31_line" id="hidden_field_data_tipocomp31" style="<?php echo $sStyleHidden_tipocomp31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipocomp31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipocomp31"]) &&  $this->nmgp_cmp_readonly["tipocomp31"] == "on") { 

 ?>
<input type="hidden" name="tipocomp31" value="<?php echo $this->form_encode_input($tipocomp31) . "\">" . $tipocomp31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipocomp31" class="sc-ui-readonly-tipocomp31 css_tipocomp31_line" style="<?php echo $sStyleReadLab_tipocomp31; ?>"><?php echo $this->form_format_readonly("tipocomp31", $this->form_encode_input($this->tipocomp31)); ?></span><span id="id_read_off_tipocomp31" class="css_read_off_tipocomp31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipocomp31; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipocomp31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipocomp31" type=text name="tipocomp31" value="<?php echo $this->form_encode_input($tipocomp31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipocomp31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipocomp31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['conta31']))
    {
        $this->nm_new_label['conta31'] = "Conta 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conta31 = $this->conta31;
   $sStyleHidden_conta31 = '';
   if (isset($this->nmgp_cmp_hidden['conta31']) && $this->nmgp_cmp_hidden['conta31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conta31']);
       $sStyleHidden_conta31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conta31 = 'display: none;';
   $sStyleReadInp_conta31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conta31']) && $this->nmgp_cmp_readonly['conta31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conta31']);
       $sStyleReadLab_conta31 = '';
       $sStyleReadInp_conta31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conta31']) && $this->nmgp_cmp_hidden['conta31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="conta31" value="<?php echo $this->form_encode_input($conta31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_conta31_label" id="hidden_field_label_conta31" style="<?php echo $sStyleHidden_conta31; ?>"><span id="id_label_conta31"><?php echo $this->nm_new_label['conta31']; ?></span></TD>
    <TD class="scFormDataOdd css_conta31_line" id="hidden_field_data_conta31" style="<?php echo $sStyleHidden_conta31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_conta31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["conta31"]) &&  $this->nmgp_cmp_readonly["conta31"] == "on") { 

 ?>
<input type="hidden" name="conta31" value="<?php echo $this->form_encode_input($conta31) . "\">" . $conta31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_conta31" class="sc-ui-readonly-conta31 css_conta31_line" style="<?php echo $sStyleReadLab_conta31; ?>"><?php echo $this->form_format_readonly("conta31", $this->form_encode_input($this->conta31)); ?></span><span id="id_read_off_conta31" class="css_read_off_conta31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_conta31; ?>">
 <input class="sc-js-input scFormObjectOdd css_conta31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_conta31" type=text name="conta31" value="<?php echo $this->form_encode_input($conta31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['conta31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['conta31']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['conta31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conta31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conta31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecvencidocpr']))
    {
        $this->nm_new_label['fecvencidocpr'] = "Fecvencidocpr";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecvencidocpr = $this->fecvencidocpr;
   if (strlen($this->fecvencidocpr_hora) > 8 ) {$this->fecvencidocpr_hora = substr($this->fecvencidocpr_hora, 0, 8);}
   $this->fecvencidocpr .= ' ' . $this->fecvencidocpr_hora;
   $this->fecvencidocpr  = trim($this->fecvencidocpr);
   $fecvencidocpr = $this->fecvencidocpr;
   $sStyleHidden_fecvencidocpr = '';
   if (isset($this->nmgp_cmp_hidden['fecvencidocpr']) && $this->nmgp_cmp_hidden['fecvencidocpr'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecvencidocpr']);
       $sStyleHidden_fecvencidocpr = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecvencidocpr = 'display: none;';
   $sStyleReadInp_fecvencidocpr = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecvencidocpr']) && $this->nmgp_cmp_readonly['fecvencidocpr'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecvencidocpr']);
       $sStyleReadLab_fecvencidocpr = '';
       $sStyleReadInp_fecvencidocpr = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecvencidocpr']) && $this->nmgp_cmp_hidden['fecvencidocpr'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecvencidocpr" value="<?php echo $this->form_encode_input($fecvencidocpr) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecvencidocpr_label" id="hidden_field_label_fecvencidocpr" style="<?php echo $sStyleHidden_fecvencidocpr; ?>"><span id="id_label_fecvencidocpr"><?php echo $this->nm_new_label['fecvencidocpr']; ?></span></TD>
    <TD class="scFormDataOdd css_fecvencidocpr_line" id="hidden_field_data_fecvencidocpr" style="<?php echo $sStyleHidden_fecvencidocpr; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecvencidocpr_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecvencidocpr"]) &&  $this->nmgp_cmp_readonly["fecvencidocpr"] == "on") { 

 ?>
<input type="hidden" name="fecvencidocpr" value="<?php echo $this->form_encode_input($fecvencidocpr) . "\">" . $fecvencidocpr . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecvencidocpr" class="sc-ui-readonly-fecvencidocpr css_fecvencidocpr_line" style="<?php echo $sStyleReadLab_fecvencidocpr; ?>"><?php echo $this->form_format_readonly("fecvencidocpr", $this->form_encode_input($fecvencidocpr)); ?></span><span id="id_read_off_fecvencidocpr" class="css_read_off_fecvencidocpr<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecvencidocpr; ?>"><?php
$tmp_form_data = $this->field_config['fecvencidocpr']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecvencidocpr_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecvencidocpr" type=text name="fecvencidocpr" value="<?php echo $this->form_encode_input($fecvencidocpr) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecvencidocpr']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecvencidocpr']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecvencidocpr']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecvencidocpr_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecvencidocpr_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fecvencidocpr = $old_dt_fecvencidocpr;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['totsiniva31']))
    {
        $this->nm_new_label['totsiniva31'] = "Totsiniva 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totsiniva31 = $this->totsiniva31;
   $sStyleHidden_totsiniva31 = '';
   if (isset($this->nmgp_cmp_hidden['totsiniva31']) && $this->nmgp_cmp_hidden['totsiniva31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totsiniva31']);
       $sStyleHidden_totsiniva31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totsiniva31 = 'display: none;';
   $sStyleReadInp_totsiniva31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['totsiniva31']) && $this->nmgp_cmp_readonly['totsiniva31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totsiniva31']);
       $sStyleReadLab_totsiniva31 = '';
       $sStyleReadInp_totsiniva31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totsiniva31']) && $this->nmgp_cmp_hidden['totsiniva31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totsiniva31" value="<?php echo $this->form_encode_input($totsiniva31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_totsiniva31_label" id="hidden_field_label_totsiniva31" style="<?php echo $sStyleHidden_totsiniva31; ?>"><span id="id_label_totsiniva31"><?php echo $this->nm_new_label['totsiniva31']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['totsiniva31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['totsiniva31'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_totsiniva31_line" id="hidden_field_data_totsiniva31" style="<?php echo $sStyleHidden_totsiniva31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totsiniva31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["totsiniva31"]) &&  $this->nmgp_cmp_readonly["totsiniva31"] == "on") { 

 ?>
<input type="hidden" name="totsiniva31" value="<?php echo $this->form_encode_input($totsiniva31) . "\">" . $totsiniva31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_totsiniva31" class="sc-ui-readonly-totsiniva31 css_totsiniva31_line" style="<?php echo $sStyleReadLab_totsiniva31; ?>"><?php echo $this->form_format_readonly("totsiniva31", $this->form_encode_input($this->totsiniva31)); ?></span><span id="id_read_off_totsiniva31" class="css_read_off_totsiniva31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_totsiniva31; ?>">
 <input class="sc-js-input scFormObjectOdd css_totsiniva31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_totsiniva31" type=text name="totsiniva31" value="<?php echo $this->form_encode_input($totsiniva31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['totsiniva31']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totsiniva31']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totsiniva31']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totsiniva31']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totsiniva31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totsiniva31_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecemb']))
    {
        $this->nm_new_label['fecemb'] = "Fecemb";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecemb = $this->fecemb;
   $sStyleHidden_fecemb = '';
   if (isset($this->nmgp_cmp_hidden['fecemb']) && $this->nmgp_cmp_hidden['fecemb'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecemb']);
       $sStyleHidden_fecemb = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecemb = 'display: none;';
   $sStyleReadInp_fecemb = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecemb']) && $this->nmgp_cmp_readonly['fecemb'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecemb']);
       $sStyleReadLab_fecemb = '';
       $sStyleReadInp_fecemb = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecemb']) && $this->nmgp_cmp_hidden['fecemb'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecemb" value="<?php echo $this->form_encode_input($fecemb) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fecemb_label" id="hidden_field_label_fecemb" style="<?php echo $sStyleHidden_fecemb; ?>"><span id="id_label_fecemb"><?php echo $this->nm_new_label['fecemb']; ?></span></TD>
    <TD class="scFormDataOdd css_fecemb_line" id="hidden_field_data_fecemb" style="<?php echo $sStyleHidden_fecemb; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecemb_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecemb"]) &&  $this->nmgp_cmp_readonly["fecemb"] == "on") { 

 ?>
<input type="hidden" name="fecemb" value="<?php echo $this->form_encode_input($fecemb) . "\">" . $fecemb . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecemb" class="sc-ui-readonly-fecemb css_fecemb_line" style="<?php echo $sStyleReadLab_fecemb; ?>"><?php echo $this->form_format_readonly("fecemb", $this->form_encode_input($fecemb)); ?></span><span id="id_read_off_fecemb" class="css_read_off_fecemb<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecemb; ?>"><?php
$tmp_form_data = $this->field_config['fecemb']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecemb_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecemb" type=text name="fecemb" value="<?php echo $this->form_encode_input($fecemb) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecemb']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecemb']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecemb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecemb_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['norefrendo']))
    {
        $this->nm_new_label['norefrendo'] = "Norefrendo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $norefrendo = $this->norefrendo;
   $sStyleHidden_norefrendo = '';
   if (isset($this->nmgp_cmp_hidden['norefrendo']) && $this->nmgp_cmp_hidden['norefrendo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['norefrendo']);
       $sStyleHidden_norefrendo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_norefrendo = 'display: none;';
   $sStyleReadInp_norefrendo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['norefrendo']) && $this->nmgp_cmp_readonly['norefrendo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['norefrendo']);
       $sStyleReadLab_norefrendo = '';
       $sStyleReadInp_norefrendo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['norefrendo']) && $this->nmgp_cmp_hidden['norefrendo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="norefrendo" value="<?php echo $this->form_encode_input($norefrendo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_norefrendo_label" id="hidden_field_label_norefrendo" style="<?php echo $sStyleHidden_norefrendo; ?>"><span id="id_label_norefrendo"><?php echo $this->nm_new_label['norefrendo']; ?></span></TD>
    <TD class="scFormDataOdd css_norefrendo_line" id="hidden_field_data_norefrendo" style="<?php echo $sStyleHidden_norefrendo; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_norefrendo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["norefrendo"]) &&  $this->nmgp_cmp_readonly["norefrendo"] == "on") { 

 ?>
<input type="hidden" name="norefrendo" value="<?php echo $this->form_encode_input($norefrendo) . "\">" . $norefrendo . ""; ?>
<?php } else { ?>
<span id="id_read_on_norefrendo" class="sc-ui-readonly-norefrendo css_norefrendo_line" style="<?php echo $sStyleReadLab_norefrendo; ?>"><?php echo $this->form_format_readonly("norefrendo", $this->form_encode_input($this->norefrendo)); ?></span><span id="id_read_off_norefrendo" class="css_read_off_norefrendo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_norefrendo; ?>">
 <input class="sc-js-input scFormObjectOdd css_norefrendo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_norefrendo" type=text name="norefrendo" value="<?php echo $this->form_encode_input($norefrendo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_norefrendo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_norefrendo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['baseice']))
    {
        $this->nm_new_label['baseice'] = "Baseice";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $baseice = $this->baseice;
   $sStyleHidden_baseice = '';
   if (isset($this->nmgp_cmp_hidden['baseice']) && $this->nmgp_cmp_hidden['baseice'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['baseice']);
       $sStyleHidden_baseice = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_baseice = 'display: none;';
   $sStyleReadInp_baseice = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['baseice']) && $this->nmgp_cmp_readonly['baseice'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['baseice']);
       $sStyleReadLab_baseice = '';
       $sStyleReadInp_baseice = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['baseice']) && $this->nmgp_cmp_hidden['baseice'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="baseice" value="<?php echo $this->form_encode_input($baseice) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_baseice_label" id="hidden_field_label_baseice" style="<?php echo $sStyleHidden_baseice; ?>"><span id="id_label_baseice"><?php echo $this->nm_new_label['baseice']; ?></span></TD>
    <TD class="scFormDataOdd css_baseice_line" id="hidden_field_data_baseice" style="<?php echo $sStyleHidden_baseice; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_baseice_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["baseice"]) &&  $this->nmgp_cmp_readonly["baseice"] == "on") { 

 ?>
<input type="hidden" name="baseice" value="<?php echo $this->form_encode_input($baseice) . "\">" . $baseice . ""; ?>
<?php } else { ?>
<span id="id_read_on_baseice" class="sc-ui-readonly-baseice css_baseice_line" style="<?php echo $sStyleReadLab_baseice; ?>"><?php echo $this->form_format_readonly("baseice", $this->form_encode_input($this->baseice)); ?></span><span id="id_read_off_baseice" class="css_read_off_baseice<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_baseice; ?>">
 <input class="sc-js-input scFormObjectOdd css_baseice_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_baseice" type=text name="baseice" value="<?php echo $this->form_encode_input($baseice) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['baseice']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['baseice']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['baseice']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['baseice']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_baseice_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_baseice_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ncodret43']))
    {
        $this->nm_new_label['ncodret43'] = "Ncodret 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ncodret43 = $this->ncodret43;
   $sStyleHidden_ncodret43 = '';
   if (isset($this->nmgp_cmp_hidden['ncodret43']) && $this->nmgp_cmp_hidden['ncodret43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ncodret43']);
       $sStyleHidden_ncodret43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ncodret43 = 'display: none;';
   $sStyleReadInp_ncodret43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ncodret43']) && $this->nmgp_cmp_readonly['ncodret43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ncodret43']);
       $sStyleReadLab_ncodret43 = '';
       $sStyleReadInp_ncodret43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ncodret43']) && $this->nmgp_cmp_hidden['ncodret43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ncodret43" value="<?php echo $this->form_encode_input($ncodret43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ncodret43_label" id="hidden_field_label_ncodret43" style="<?php echo $sStyleHidden_ncodret43; ?>"><span id="id_label_ncodret43"><?php echo $this->nm_new_label['ncodret43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['ncodret43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['ncodret43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_ncodret43_line" id="hidden_field_data_ncodret43" style="<?php echo $sStyleHidden_ncodret43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ncodret43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ncodret43"]) &&  $this->nmgp_cmp_readonly["ncodret43"] == "on") { 

 ?>
<input type="hidden" name="ncodret43" value="<?php echo $this->form_encode_input($ncodret43) . "\">" . $ncodret43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ncodret43" class="sc-ui-readonly-ncodret43 css_ncodret43_line" style="<?php echo $sStyleReadLab_ncodret43; ?>"><?php echo $this->form_format_readonly("ncodret43", $this->form_encode_input($this->ncodret43)); ?></span><span id="id_read_off_ncodret43" class="css_read_off_ncodret43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ncodret43; ?>">
 <input class="sc-js-input scFormObjectOdd css_ncodret43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ncodret43" type=text name="ncodret43" value="<?php echo $this->form_encode_input($ncodret43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ncodret43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ncodret43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nbaseret43']))
    {
        $this->nm_new_label['nbaseret43'] = "Nbaseret 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nbaseret43 = $this->nbaseret43;
   $sStyleHidden_nbaseret43 = '';
   if (isset($this->nmgp_cmp_hidden['nbaseret43']) && $this->nmgp_cmp_hidden['nbaseret43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nbaseret43']);
       $sStyleHidden_nbaseret43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nbaseret43 = 'display: none;';
   $sStyleReadInp_nbaseret43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nbaseret43']) && $this->nmgp_cmp_readonly['nbaseret43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nbaseret43']);
       $sStyleReadLab_nbaseret43 = '';
       $sStyleReadInp_nbaseret43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nbaseret43']) && $this->nmgp_cmp_hidden['nbaseret43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nbaseret43" value="<?php echo $this->form_encode_input($nbaseret43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nbaseret43_label" id="hidden_field_label_nbaseret43" style="<?php echo $sStyleHidden_nbaseret43; ?>"><span id="id_label_nbaseret43"><?php echo $this->nm_new_label['nbaseret43']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nbaseret43']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['nbaseret43'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_nbaseret43_line" id="hidden_field_data_nbaseret43" style="<?php echo $sStyleHidden_nbaseret43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nbaseret43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nbaseret43"]) &&  $this->nmgp_cmp_readonly["nbaseret43"] == "on") { 

 ?>
<input type="hidden" name="nbaseret43" value="<?php echo $this->form_encode_input($nbaseret43) . "\">" . $nbaseret43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nbaseret43" class="sc-ui-readonly-nbaseret43 css_nbaseret43_line" style="<?php echo $sStyleReadLab_nbaseret43; ?>"><?php echo $this->form_format_readonly("nbaseret43", $this->form_encode_input($this->nbaseret43)); ?></span><span id="id_read_off_nbaseret43" class="css_read_off_nbaseret43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nbaseret43; ?>">
 <input class="sc-js-input scFormObjectOdd css_nbaseret43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nbaseret43" type=text name="nbaseret43" value="<?php echo $this->form_encode_input($nbaseret43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['nbaseret43']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['nbaseret43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['nbaseret43']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['nbaseret43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nbaseret43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nbaseret43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['npctjeret43']))
    {
        $this->nm_new_label['npctjeret43'] = "Npctjeret 43";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $npctjeret43 = $this->npctjeret43;
   $sStyleHidden_npctjeret43 = '';
   if (isset($this->nmgp_cmp_hidden['npctjeret43']) && $this->nmgp_cmp_hidden['npctjeret43'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['npctjeret43']);
       $sStyleHidden_npctjeret43 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_npctjeret43 = 'display: none;';
   $sStyleReadInp_npctjeret43 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['npctjeret43']) && $this->nmgp_cmp_readonly['npctjeret43'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['npctjeret43']);
       $sStyleReadLab_npctjeret43 = '';
       $sStyleReadInp_npctjeret43 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['npctjeret43']) && $this->nmgp_cmp_hidden['npctjeret43'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="npctjeret43" value="<?php echo $this->form_encode_input($npctjeret43) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_npctjeret43_label" id="hidden_field_label_npctjeret43" style="<?php echo $sStyleHidden_npctjeret43; ?>"><span id="id_label_npctjeret43"><?php echo $this->nm_new_label['npctjeret43']; ?></span></TD>
    <TD class="scFormDataOdd css_npctjeret43_line" id="hidden_field_data_npctjeret43" style="<?php echo $sStyleHidden_npctjeret43; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_npctjeret43_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["npctjeret43"]) &&  $this->nmgp_cmp_readonly["npctjeret43"] == "on") { 

 ?>
<input type="hidden" name="npctjeret43" value="<?php echo $this->form_encode_input($npctjeret43) . "\">" . $npctjeret43 . ""; ?>
<?php } else { ?>
<span id="id_read_on_npctjeret43" class="sc-ui-readonly-npctjeret43 css_npctjeret43_line" style="<?php echo $sStyleReadLab_npctjeret43; ?>"><?php echo $this->form_format_readonly("npctjeret43", $this->form_encode_input($this->npctjeret43)); ?></span><span id="id_read_off_npctjeret43" class="css_read_off_npctjeret43<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_npctjeret43; ?>">
 <input class="sc-js-input scFormObjectOdd css_npctjeret43_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_npctjeret43" type=text name="npctjeret43" value="<?php echo $this->form_encode_input($npctjeret43) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['npctjeret43']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['npctjeret43']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['npctjeret43']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['npctjeret43']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_npctjeret43_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_npctjeret43_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contrato']))
    {
        $this->nm_new_label['contrato'] = "Contrato";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contrato = $this->contrato;
   $sStyleHidden_contrato = '';
   if (isset($this->nmgp_cmp_hidden['contrato']) && $this->nmgp_cmp_hidden['contrato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contrato']);
       $sStyleHidden_contrato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contrato = 'display: none;';
   $sStyleReadInp_contrato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contrato']) && $this->nmgp_cmp_readonly['contrato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contrato']);
       $sStyleReadLab_contrato = '';
       $sStyleReadInp_contrato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contrato']) && $this->nmgp_cmp_hidden['contrato'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contrato" value="<?php echo $this->form_encode_input($contrato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_contrato_label" id="hidden_field_label_contrato" style="<?php echo $sStyleHidden_contrato; ?>"><span id="id_label_contrato"><?php echo $this->nm_new_label['contrato']; ?></span></TD>
    <TD class="scFormDataOdd css_contrato_line" id="hidden_field_data_contrato" style="<?php echo $sStyleHidden_contrato; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contrato_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contrato"]) &&  $this->nmgp_cmp_readonly["contrato"] == "on") { 

 ?>
<input type="hidden" name="contrato" value="<?php echo $this->form_encode_input($contrato) . "\">" . $contrato . ""; ?>
<?php } else { ?>
<span id="id_read_on_contrato" class="sc-ui-readonly-contrato css_contrato_line" style="<?php echo $sStyleReadLab_contrato; ?>"><?php echo $this->form_format_readonly("contrato", $this->form_encode_input($this->contrato)); ?></span><span id="id_read_off_contrato" class="css_read_off_contrato<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contrato; ?>">
 <input class="sc-js-input scFormObjectOdd css_contrato_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_contrato" type=text name="contrato" value="<?php echo $this->form_encode_input($contrato) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contrato_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contrato_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['compra_general']))
    {
        $this->nm_new_label['compra_general'] = "Compra General";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $compra_general = $this->compra_general;
   $sStyleHidden_compra_general = '';
   if (isset($this->nmgp_cmp_hidden['compra_general']) && $this->nmgp_cmp_hidden['compra_general'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['compra_general']);
       $sStyleHidden_compra_general = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_compra_general = 'display: none;';
   $sStyleReadInp_compra_general = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['compra_general']) && $this->nmgp_cmp_readonly['compra_general'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['compra_general']);
       $sStyleReadLab_compra_general = '';
       $sStyleReadInp_compra_general = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['compra_general']) && $this->nmgp_cmp_hidden['compra_general'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="compra_general" value="<?php echo $this->form_encode_input($compra_general) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_compra_general_label" id="hidden_field_label_compra_general" style="<?php echo $sStyleHidden_compra_general; ?>"><span id="id_label_compra_general"><?php echo $this->nm_new_label['compra_general']; ?></span></TD>
    <TD class="scFormDataOdd css_compra_general_line" id="hidden_field_data_compra_general" style="<?php echo $sStyleHidden_compra_general; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_compra_general_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["compra_general"]) &&  $this->nmgp_cmp_readonly["compra_general"] == "on") { 

 ?>
<input type="hidden" name="compra_general" value="<?php echo $this->form_encode_input($compra_general) . "\">" . $compra_general . ""; ?>
<?php } else { ?>
<span id="id_read_on_compra_general" class="sc-ui-readonly-compra_general css_compra_general_line" style="<?php echo $sStyleReadLab_compra_general; ?>"><?php echo $this->form_format_readonly("compra_general", $this->form_encode_input($this->compra_general)); ?></span><span id="id_read_off_compra_general" class="css_read_off_compra_general<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_compra_general; ?>">
 <input class="sc-js-input scFormObjectOdd css_compra_general_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_compra_general" type=text name="compra_general" value="<?php echo $this->form_encode_input($compra_general) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_compra_general_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_compra_general_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['distribucion_rubros']))
    {
        $this->nm_new_label['distribucion_rubros'] = "Distribucion Rubros";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $distribucion_rubros = $this->distribucion_rubros;
   $sStyleHidden_distribucion_rubros = '';
   if (isset($this->nmgp_cmp_hidden['distribucion_rubros']) && $this->nmgp_cmp_hidden['distribucion_rubros'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['distribucion_rubros']);
       $sStyleHidden_distribucion_rubros = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_distribucion_rubros = 'display: none;';
   $sStyleReadInp_distribucion_rubros = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['distribucion_rubros']) && $this->nmgp_cmp_readonly['distribucion_rubros'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['distribucion_rubros']);
       $sStyleReadLab_distribucion_rubros = '';
       $sStyleReadInp_distribucion_rubros = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['distribucion_rubros']) && $this->nmgp_cmp_hidden['distribucion_rubros'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="distribucion_rubros" value="<?php echo $this->form_encode_input($distribucion_rubros) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_distribucion_rubros_label" id="hidden_field_label_distribucion_rubros" style="<?php echo $sStyleHidden_distribucion_rubros; ?>"><span id="id_label_distribucion_rubros"><?php echo $this->nm_new_label['distribucion_rubros']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['distribucion_rubros']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['distribucion_rubros'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_distribucion_rubros_line" id="hidden_field_data_distribucion_rubros" style="<?php echo $sStyleHidden_distribucion_rubros; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_distribucion_rubros_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["distribucion_rubros"]) &&  $this->nmgp_cmp_readonly["distribucion_rubros"] == "on") { 

 ?>
<input type="hidden" name="distribucion_rubros" value="<?php echo $this->form_encode_input($distribucion_rubros) . "\">" . $distribucion_rubros . ""; ?>
<?php } else { ?>
<span id="id_read_on_distribucion_rubros" class="sc-ui-readonly-distribucion_rubros css_distribucion_rubros_line" style="<?php echo $sStyleReadLab_distribucion_rubros; ?>"><?php echo $this->form_format_readonly("distribucion_rubros", $this->form_encode_input($this->distribucion_rubros)); ?></span><span id="id_read_off_distribucion_rubros" class="css_read_off_distribucion_rubros<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_distribucion_rubros; ?>">
 <input class="sc-js-input scFormObjectOdd css_distribucion_rubros_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_distribucion_rubros" type=text name="distribucion_rubros" value="<?php echo $this->form_encode_input($distribucion_rubros) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_distribucion_rubros_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_distribucion_rubros_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dstoley']))
    {
        $this->nm_new_label['dstoley'] = "Dsto Ley";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dstoley = $this->dstoley;
   $sStyleHidden_dstoley = '';
   if (isset($this->nmgp_cmp_hidden['dstoley']) && $this->nmgp_cmp_hidden['dstoley'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dstoley']);
       $sStyleHidden_dstoley = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dstoley = 'display: none;';
   $sStyleReadInp_dstoley = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dstoley']) && $this->nmgp_cmp_readonly['dstoley'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dstoley']);
       $sStyleReadLab_dstoley = '';
       $sStyleReadInp_dstoley = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dstoley']) && $this->nmgp_cmp_hidden['dstoley'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dstoley" value="<?php echo $this->form_encode_input($dstoley) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dstoley_label" id="hidden_field_label_dstoley" style="<?php echo $sStyleHidden_dstoley; ?>"><span id="id_label_dstoley"><?php echo $this->nm_new_label['dstoley']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['dstoley']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['dstoley'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_dstoley_line" id="hidden_field_data_dstoley" style="<?php echo $sStyleHidden_dstoley; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dstoley_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dstoley"]) &&  $this->nmgp_cmp_readonly["dstoley"] == "on") { 

 ?>
<input type="hidden" name="dstoley" value="<?php echo $this->form_encode_input($dstoley) . "\">" . $dstoley . ""; ?>
<?php } else { ?>
<span id="id_read_on_dstoley" class="sc-ui-readonly-dstoley css_dstoley_line" style="<?php echo $sStyleReadLab_dstoley; ?>"><?php echo $this->form_format_readonly("dstoley", $this->form_encode_input($this->dstoley)); ?></span><span id="id_read_off_dstoley" class="css_read_off_dstoley<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dstoley; ?>">
 <input class="sc-js-input scFormObjectOdd css_dstoley_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dstoley" type=text name="dstoley" value="<?php echo $this->form_encode_input($dstoley) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=16"; } ?> alt="{datatype: 'decimal', maxLength: 16, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['dstoley']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['dstoley']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['dstoley']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['dstoley']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dstoley_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dstoley_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['remgas31']))
    {
        $this->nm_new_label['remgas31'] = "Rem Gas 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $remgas31 = $this->remgas31;
   $sStyleHidden_remgas31 = '';
   if (isset($this->nmgp_cmp_hidden['remgas31']) && $this->nmgp_cmp_hidden['remgas31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['remgas31']);
       $sStyleHidden_remgas31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_remgas31 = 'display: none;';
   $sStyleReadInp_remgas31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['remgas31']) && $this->nmgp_cmp_readonly['remgas31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['remgas31']);
       $sStyleReadLab_remgas31 = '';
       $sStyleReadInp_remgas31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['remgas31']) && $this->nmgp_cmp_hidden['remgas31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="remgas31" value="<?php echo $this->form_encode_input($remgas31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_remgas31_label" id="hidden_field_label_remgas31" style="<?php echo $sStyleHidden_remgas31; ?>"><span id="id_label_remgas31"><?php echo $this->nm_new_label['remgas31']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['remgas31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['remgas31'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_remgas31_line" id="hidden_field_data_remgas31" style="<?php echo $sStyleHidden_remgas31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_remgas31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["remgas31"]) &&  $this->nmgp_cmp_readonly["remgas31"] == "on") { 

 ?>
<input type="hidden" name="remgas31" value="<?php echo $this->form_encode_input($remgas31) . "\">" . $remgas31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_remgas31" class="sc-ui-readonly-remgas31 css_remgas31_line" style="<?php echo $sStyleReadLab_remgas31; ?>"><?php echo $this->form_format_readonly("remgas31", $this->form_encode_input($this->remgas31)); ?></span><span id="id_read_off_remgas31" class="css_read_off_remgas31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_remgas31; ?>">
 <input class="sc-js-input scFormObjectOdd css_remgas31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_remgas31" type=text name="remgas31" value="<?php echo $this->form_encode_input($remgas31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_remgas31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_remgas31_text"></span></td></tr></table></td></tr></table></TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_estado_electronico_label" id="hidden_field_label_estado_electronico" style="<?php echo $sStyleHidden_estado_electronico; ?>"><span id="id_label_estado_electronico"><?php echo $this->nm_new_label['estado_electronico']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['estado_electronico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['estado_electronico'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
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

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['coddest31']))
    {
        $this->nm_new_label['coddest31'] = "Coddest 31";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $coddest31 = $this->coddest31;
   $sStyleHidden_coddest31 = '';
   if (isset($this->nmgp_cmp_hidden['coddest31']) && $this->nmgp_cmp_hidden['coddest31'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['coddest31']);
       $sStyleHidden_coddest31 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_coddest31 = 'display: none;';
   $sStyleReadInp_coddest31 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['coddest31']) && $this->nmgp_cmp_readonly['coddest31'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['coddest31']);
       $sStyleReadLab_coddest31 = '';
       $sStyleReadInp_coddest31 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['coddest31']) && $this->nmgp_cmp_hidden['coddest31'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="coddest31" value="<?php echo $this->form_encode_input($coddest31) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_coddest31_label" id="hidden_field_label_coddest31" style="<?php echo $sStyleHidden_coddest31; ?>"><span id="id_label_coddest31"><?php echo $this->nm_new_label['coddest31']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['coddest31']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['php_cmp_required']['coddest31'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></TD>
    <TD class="scFormDataOdd css_coddest31_line" id="hidden_field_data_coddest31" style="<?php echo $sStyleHidden_coddest31; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_coddest31_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["coddest31"]) &&  $this->nmgp_cmp_readonly["coddest31"] == "on") { 

 ?>
<input type="hidden" name="coddest31" value="<?php echo $this->form_encode_input($coddest31) . "\">" . $coddest31 . ""; ?>
<?php } else { ?>
<span id="id_read_on_coddest31" class="sc-ui-readonly-coddest31 css_coddest31_line" style="<?php echo $sStyleReadLab_coddest31; ?>"><?php echo $this->form_format_readonly("coddest31", $this->form_encode_input($this->coddest31)); ?></span><span id="id_read_off_coddest31" class="css_read_off_coddest31<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_coddest31; ?>">
 <input class="sc-js-input scFormObjectOdd css_coddest31_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_coddest31" type=text name="coddest31" value="<?php echo $this->form_encode_input($coddest31) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_coddest31_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_coddest31_text"></span></td></tr></table></td></tr></table></TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['birpara'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['first'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['back'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['forward'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_maecom");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_maecom");
 parent.scAjaxDetailHeight("form_maecom", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_maecom", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_maecom", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_maecom']['buttonStatus'] = $this->nmgp_botoes;
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
