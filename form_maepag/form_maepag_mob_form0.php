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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " maepag"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " maepag"); } ?></TITLE>
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
.css_read_off_fecing01 button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecvencdoc01 button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_maepag/form_maepag_mob_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_maepag_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_maepag_mob_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_maepag']['error_buffer']) && '' != $_SESSION['scriptcase']['form_maepag']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_maepag']['error_buffer'];
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
 include_once("form_maepag_mob_js0.php");
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
               action="form_maepag_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_maepag_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_maepag_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['fast_search'][2] : "";
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['insert'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['bcancelar'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['update'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['delete'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['empty_filter'] = true;
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
    if (!isset($this->nm_new_label['codcte01']))
    {
        $this->nm_new_label['codcte01'] = "Codcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codcte01 = $this->codcte01;
   $sStyleHidden_codcte01 = '';
   if (isset($this->nmgp_cmp_hidden['codcte01']) && $this->nmgp_cmp_hidden['codcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codcte01']);
       $sStyleHidden_codcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codcte01 = 'display: none;';
   $sStyleReadInp_codcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codcte01']) && $this->nmgp_cmp_readonly['codcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codcte01']);
       $sStyleReadLab_codcte01 = '';
       $sStyleReadInp_codcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codcte01']) && $this->nmgp_cmp_hidden['codcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codcte01" value="<?php echo $this->form_encode_input($codcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codcte01_line" id="hidden_field_data_codcte01" style="<?php echo $sStyleHidden_codcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codcte01_label" style=""><span id="id_label_codcte01"><?php echo $this->nm_new_label['codcte01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['codcte01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['codcte01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codcte01"]) &&  $this->nmgp_cmp_readonly["codcte01"] == "on") { 

 ?>
<input type="hidden" name="codcte01" value="<?php echo $this->form_encode_input($codcte01) . "\">" . $codcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_codcte01" class="sc-ui-readonly-codcte01 css_codcte01_line" style="<?php echo $sStyleReadLab_codcte01; ?>"><?php echo $this->form_format_readonly("codcte01", $this->form_encode_input($this->codcte01)); ?></span><span id="id_read_off_codcte01" class="css_read_off_codcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_codcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codcte01" type=text name="codcte01" value="<?php echo $this->form_encode_input($codcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nomcte01']))
    {
        $this->nm_new_label['nomcte01'] = "Nomcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nomcte01 = $this->nomcte01;
   $sStyleHidden_nomcte01 = '';
   if (isset($this->nmgp_cmp_hidden['nomcte01']) && $this->nmgp_cmp_hidden['nomcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nomcte01']);
       $sStyleHidden_nomcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nomcte01 = 'display: none;';
   $sStyleReadInp_nomcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nomcte01']) && $this->nmgp_cmp_readonly['nomcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nomcte01']);
       $sStyleReadLab_nomcte01 = '';
       $sStyleReadInp_nomcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nomcte01']) && $this->nmgp_cmp_hidden['nomcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nomcte01" value="<?php echo $this->form_encode_input($nomcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nomcte01_line" id="hidden_field_data_nomcte01" style="<?php echo $sStyleHidden_nomcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nomcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nomcte01_label" style=""><span id="id_label_nomcte01"><?php echo $this->nm_new_label['nomcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nomcte01"]) &&  $this->nmgp_cmp_readonly["nomcte01"] == "on") { 

 ?>
<input type="hidden" name="nomcte01" value="<?php echo $this->form_encode_input($nomcte01) . "\">" . $nomcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_nomcte01" class="sc-ui-readonly-nomcte01 css_nomcte01_line" style="<?php echo $sStyleReadLab_nomcte01; ?>"><?php echo $this->form_format_readonly("nomcte01", $this->form_encode_input($this->nomcte01)); ?></span><span id="id_read_off_nomcte01" class="css_read_off_nomcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nomcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_nomcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nomcte01" type=text name="nomcte01" value="<?php echo $this->form_encode_input($nomcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=80 alt="{datatype: 'text', maxLength: 80, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nomcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nomcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cv1cte01']))
    {
        $this->nm_new_label['cv1cte01'] = "Cv 1cte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cv1cte01 = $this->cv1cte01;
   $sStyleHidden_cv1cte01 = '';
   if (isset($this->nmgp_cmp_hidden['cv1cte01']) && $this->nmgp_cmp_hidden['cv1cte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cv1cte01']);
       $sStyleHidden_cv1cte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cv1cte01 = 'display: none;';
   $sStyleReadInp_cv1cte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cv1cte01']) && $this->nmgp_cmp_readonly['cv1cte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cv1cte01']);
       $sStyleReadLab_cv1cte01 = '';
       $sStyleReadInp_cv1cte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cv1cte01']) && $this->nmgp_cmp_hidden['cv1cte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cv1cte01" value="<?php echo $this->form_encode_input($cv1cte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cv1cte01_line" id="hidden_field_data_cv1cte01" style="<?php echo $sStyleHidden_cv1cte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cv1cte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cv1cte01_label" style=""><span id="id_label_cv1cte01"><?php echo $this->nm_new_label['cv1cte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cv1cte01"]) &&  $this->nmgp_cmp_readonly["cv1cte01"] == "on") { 

 ?>
<input type="hidden" name="cv1cte01" value="<?php echo $this->form_encode_input($cv1cte01) . "\">" . $cv1cte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cv1cte01" class="sc-ui-readonly-cv1cte01 css_cv1cte01_line" style="<?php echo $sStyleReadLab_cv1cte01; ?>"><?php echo $this->form_format_readonly("cv1cte01", $this->form_encode_input($this->cv1cte01)); ?></span><span id="id_read_off_cv1cte01" class="css_read_off_cv1cte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cv1cte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cv1cte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cv1cte01" type=text name="cv1cte01" value="<?php echo $this->form_encode_input($cv1cte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cv1cte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cv1cte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cv2cte01']))
    {
        $this->nm_new_label['cv2cte01'] = "Cv 2cte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cv2cte01 = $this->cv2cte01;
   $sStyleHidden_cv2cte01 = '';
   if (isset($this->nmgp_cmp_hidden['cv2cte01']) && $this->nmgp_cmp_hidden['cv2cte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cv2cte01']);
       $sStyleHidden_cv2cte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cv2cte01 = 'display: none;';
   $sStyleReadInp_cv2cte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cv2cte01']) && $this->nmgp_cmp_readonly['cv2cte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cv2cte01']);
       $sStyleReadLab_cv2cte01 = '';
       $sStyleReadInp_cv2cte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cv2cte01']) && $this->nmgp_cmp_hidden['cv2cte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cv2cte01" value="<?php echo $this->form_encode_input($cv2cte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cv2cte01_line" id="hidden_field_data_cv2cte01" style="<?php echo $sStyleHidden_cv2cte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cv2cte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cv2cte01_label" style=""><span id="id_label_cv2cte01"><?php echo $this->nm_new_label['cv2cte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cv2cte01"]) &&  $this->nmgp_cmp_readonly["cv2cte01"] == "on") { 

 ?>
<input type="hidden" name="cv2cte01" value="<?php echo $this->form_encode_input($cv2cte01) . "\">" . $cv2cte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cv2cte01" class="sc-ui-readonly-cv2cte01 css_cv2cte01_line" style="<?php echo $sStyleReadLab_cv2cte01; ?>"><?php echo $this->form_format_readonly("cv2cte01", $this->form_encode_input($this->cv2cte01)); ?></span><span id="id_read_off_cv2cte01" class="css_read_off_cv2cte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cv2cte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cv2cte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cv2cte01" type=text name="cv2cte01" value="<?php echo $this->form_encode_input($cv2cte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cv2cte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cv2cte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipcte01']))
    {
        $this->nm_new_label['tipcte01'] = "Tipcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipcte01 = $this->tipcte01;
   $sStyleHidden_tipcte01 = '';
   if (isset($this->nmgp_cmp_hidden['tipcte01']) && $this->nmgp_cmp_hidden['tipcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipcte01']);
       $sStyleHidden_tipcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipcte01 = 'display: none;';
   $sStyleReadInp_tipcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipcte01']) && $this->nmgp_cmp_readonly['tipcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipcte01']);
       $sStyleReadLab_tipcte01 = '';
       $sStyleReadInp_tipcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipcte01']) && $this->nmgp_cmp_hidden['tipcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipcte01" value="<?php echo $this->form_encode_input($tipcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipcte01_line" id="hidden_field_data_tipcte01" style="<?php echo $sStyleHidden_tipcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipcte01_label" style=""><span id="id_label_tipcte01"><?php echo $this->nm_new_label['tipcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipcte01"]) &&  $this->nmgp_cmp_readonly["tipcte01"] == "on") { 

 ?>
<input type="hidden" name="tipcte01" value="<?php echo $this->form_encode_input($tipcte01) . "\">" . $tipcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipcte01" class="sc-ui-readonly-tipcte01 css_tipcte01_line" style="<?php echo $sStyleReadLab_tipcte01; ?>"><?php echo $this->form_format_readonly("tipcte01", $this->form_encode_input($this->tipcte01)); ?></span><span id="id_read_off_tipcte01" class="css_read_off_tipcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipcte01" type=text name="tipcte01" value="<?php echo $this->form_encode_input($tipcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ofienccte01']))
    {
        $this->nm_new_label['ofienccte01'] = "Ofienccte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ofienccte01 = $this->ofienccte01;
   $sStyleHidden_ofienccte01 = '';
   if (isset($this->nmgp_cmp_hidden['ofienccte01']) && $this->nmgp_cmp_hidden['ofienccte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ofienccte01']);
       $sStyleHidden_ofienccte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ofienccte01 = 'display: none;';
   $sStyleReadInp_ofienccte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ofienccte01']) && $this->nmgp_cmp_readonly['ofienccte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ofienccte01']);
       $sStyleReadLab_ofienccte01 = '';
       $sStyleReadInp_ofienccte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ofienccte01']) && $this->nmgp_cmp_hidden['ofienccte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ofienccte01" value="<?php echo $this->form_encode_input($ofienccte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ofienccte01_line" id="hidden_field_data_ofienccte01" style="<?php echo $sStyleHidden_ofienccte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ofienccte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ofienccte01_label" style=""><span id="id_label_ofienccte01"><?php echo $this->nm_new_label['ofienccte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ofienccte01"]) &&  $this->nmgp_cmp_readonly["ofienccte01"] == "on") { 

 ?>
<input type="hidden" name="ofienccte01" value="<?php echo $this->form_encode_input($ofienccte01) . "\">" . $ofienccte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ofienccte01" class="sc-ui-readonly-ofienccte01 css_ofienccte01_line" style="<?php echo $sStyleReadLab_ofienccte01; ?>"><?php echo $this->form_format_readonly("ofienccte01", $this->form_encode_input($this->ofienccte01)); ?></span><span id="id_read_off_ofienccte01" class="css_read_off_ofienccte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ofienccte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_ofienccte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ofienccte01" type=text name="ofienccte01" value="<?php echo $this->form_encode_input($ofienccte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ofienccte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ofienccte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vendcte01']))
    {
        $this->nm_new_label['vendcte01'] = "Vendcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vendcte01 = $this->vendcte01;
   $sStyleHidden_vendcte01 = '';
   if (isset($this->nmgp_cmp_hidden['vendcte01']) && $this->nmgp_cmp_hidden['vendcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vendcte01']);
       $sStyleHidden_vendcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vendcte01 = 'display: none;';
   $sStyleReadInp_vendcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vendcte01']) && $this->nmgp_cmp_readonly['vendcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vendcte01']);
       $sStyleReadLab_vendcte01 = '';
       $sStyleReadInp_vendcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vendcte01']) && $this->nmgp_cmp_hidden['vendcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vendcte01" value="<?php echo $this->form_encode_input($vendcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_vendcte01_line" id="hidden_field_data_vendcte01" style="<?php echo $sStyleHidden_vendcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vendcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_vendcte01_label" style=""><span id="id_label_vendcte01"><?php echo $this->nm_new_label['vendcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vendcte01"]) &&  $this->nmgp_cmp_readonly["vendcte01"] == "on") { 

 ?>
<input type="hidden" name="vendcte01" value="<?php echo $this->form_encode_input($vendcte01) . "\">" . $vendcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_vendcte01" class="sc-ui-readonly-vendcte01 css_vendcte01_line" style="<?php echo $sStyleReadLab_vendcte01; ?>"><?php echo $this->form_format_readonly("vendcte01", $this->form_encode_input($this->vendcte01)); ?></span><span id="id_read_off_vendcte01" class="css_read_off_vendcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_vendcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_vendcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_vendcte01" type=text name="vendcte01" value="<?php echo $this->form_encode_input($vendcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vendcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vendcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cobrcte01']))
    {
        $this->nm_new_label['cobrcte01'] = "Cobrcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cobrcte01 = $this->cobrcte01;
   $sStyleHidden_cobrcte01 = '';
   if (isset($this->nmgp_cmp_hidden['cobrcte01']) && $this->nmgp_cmp_hidden['cobrcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cobrcte01']);
       $sStyleHidden_cobrcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cobrcte01 = 'display: none;';
   $sStyleReadInp_cobrcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cobrcte01']) && $this->nmgp_cmp_readonly['cobrcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cobrcte01']);
       $sStyleReadLab_cobrcte01 = '';
       $sStyleReadInp_cobrcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cobrcte01']) && $this->nmgp_cmp_hidden['cobrcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cobrcte01" value="<?php echo $this->form_encode_input($cobrcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cobrcte01_line" id="hidden_field_data_cobrcte01" style="<?php echo $sStyleHidden_cobrcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cobrcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cobrcte01_label" style=""><span id="id_label_cobrcte01"><?php echo $this->nm_new_label['cobrcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cobrcte01"]) &&  $this->nmgp_cmp_readonly["cobrcte01"] == "on") { 

 ?>
<input type="hidden" name="cobrcte01" value="<?php echo $this->form_encode_input($cobrcte01) . "\">" . $cobrcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cobrcte01" class="sc-ui-readonly-cobrcte01 css_cobrcte01_line" style="<?php echo $sStyleReadLab_cobrcte01; ?>"><?php echo $this->form_format_readonly("cobrcte01", $this->form_encode_input($this->cobrcte01)); ?></span><span id="id_read_off_cobrcte01" class="css_read_off_cobrcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cobrcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cobrcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cobrcte01" type=text name="cobrcte01" value="<?php echo $this->form_encode_input($cobrcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cobrcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cobrcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['loccte01']))
    {
        $this->nm_new_label['loccte01'] = "Loccte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $loccte01 = $this->loccte01;
   $sStyleHidden_loccte01 = '';
   if (isset($this->nmgp_cmp_hidden['loccte01']) && $this->nmgp_cmp_hidden['loccte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['loccte01']);
       $sStyleHidden_loccte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_loccte01 = 'display: none;';
   $sStyleReadInp_loccte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['loccte01']) && $this->nmgp_cmp_readonly['loccte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['loccte01']);
       $sStyleReadLab_loccte01 = '';
       $sStyleReadInp_loccte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['loccte01']) && $this->nmgp_cmp_hidden['loccte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="loccte01" value="<?php echo $this->form_encode_input($loccte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_loccte01_line" id="hidden_field_data_loccte01" style="<?php echo $sStyleHidden_loccte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_loccte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_loccte01_label" style=""><span id="id_label_loccte01"><?php echo $this->nm_new_label['loccte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["loccte01"]) &&  $this->nmgp_cmp_readonly["loccte01"] == "on") { 

 ?>
<input type="hidden" name="loccte01" value="<?php echo $this->form_encode_input($loccte01) . "\">" . $loccte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_loccte01" class="sc-ui-readonly-loccte01 css_loccte01_line" style="<?php echo $sStyleReadLab_loccte01; ?>"><?php echo $this->form_format_readonly("loccte01", $this->form_encode_input($this->loccte01)); ?></span><span id="id_read_off_loccte01" class="css_read_off_loccte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_loccte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_loccte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_loccte01" type=text name="loccte01" value="<?php echo $this->form_encode_input($loccte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_loccte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_loccte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dircte01']))
    {
        $this->nm_new_label['dircte01'] = "Dircte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dircte01 = $this->dircte01;
   $sStyleHidden_dircte01 = '';
   if (isset($this->nmgp_cmp_hidden['dircte01']) && $this->nmgp_cmp_hidden['dircte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dircte01']);
       $sStyleHidden_dircte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dircte01 = 'display: none;';
   $sStyleReadInp_dircte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dircte01']) && $this->nmgp_cmp_readonly['dircte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dircte01']);
       $sStyleReadLab_dircte01 = '';
       $sStyleReadInp_dircte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dircte01']) && $this->nmgp_cmp_hidden['dircte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dircte01" value="<?php echo $this->form_encode_input($dircte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dircte01_line" id="hidden_field_data_dircte01" style="<?php echo $sStyleHidden_dircte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dircte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dircte01_label" style=""><span id="id_label_dircte01"><?php echo $this->nm_new_label['dircte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dircte01"]) &&  $this->nmgp_cmp_readonly["dircte01"] == "on") { 

 ?>
<input type="hidden" name="dircte01" value="<?php echo $this->form_encode_input($dircte01) . "\">" . $dircte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_dircte01" class="sc-ui-readonly-dircte01 css_dircte01_line" style="<?php echo $sStyleReadLab_dircte01; ?>"><?php echo $this->form_format_readonly("dircte01", $this->form_encode_input($this->dircte01)); ?></span><span id="id_read_off_dircte01" class="css_read_off_dircte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dircte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_dircte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dircte01" type=text name="dircte01" value="<?php echo $this->form_encode_input($dircte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=40"; } ?> maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dircte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dircte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telcte01']))
    {
        $this->nm_new_label['telcte01'] = "Telcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telcte01 = $this->telcte01;
   $sStyleHidden_telcte01 = '';
   if (isset($this->nmgp_cmp_hidden['telcte01']) && $this->nmgp_cmp_hidden['telcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telcte01']);
       $sStyleHidden_telcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telcte01 = 'display: none;';
   $sStyleReadInp_telcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telcte01']) && $this->nmgp_cmp_readonly['telcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telcte01']);
       $sStyleReadLab_telcte01 = '';
       $sStyleReadInp_telcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telcte01']) && $this->nmgp_cmp_hidden['telcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telcte01" value="<?php echo $this->form_encode_input($telcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_telcte01_line" id="hidden_field_data_telcte01" style="<?php echo $sStyleHidden_telcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_telcte01_label" style=""><span id="id_label_telcte01"><?php echo $this->nm_new_label['telcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telcte01"]) &&  $this->nmgp_cmp_readonly["telcte01"] == "on") { 

 ?>
<input type="hidden" name="telcte01" value="<?php echo $this->form_encode_input($telcte01) . "\">" . $telcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_telcte01" class="sc-ui-readonly-telcte01 css_telcte01_line" style="<?php echo $sStyleReadLab_telcte01; ?>"><?php echo $this->form_format_readonly("telcte01", $this->form_encode_input($this->telcte01)); ?></span><span id="id_read_off_telcte01" class="css_read_off_telcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_telcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_telcte01" type=text name="telcte01" value="<?php echo $this->form_encode_input($telcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> maxlength=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cascte01']))
    {
        $this->nm_new_label['cascte01'] = "Cascte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cascte01 = $this->cascte01;
   $sStyleHidden_cascte01 = '';
   if (isset($this->nmgp_cmp_hidden['cascte01']) && $this->nmgp_cmp_hidden['cascte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cascte01']);
       $sStyleHidden_cascte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cascte01 = 'display: none;';
   $sStyleReadInp_cascte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cascte01']) && $this->nmgp_cmp_readonly['cascte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cascte01']);
       $sStyleReadLab_cascte01 = '';
       $sStyleReadInp_cascte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cascte01']) && $this->nmgp_cmp_hidden['cascte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cascte01" value="<?php echo $this->form_encode_input($cascte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cascte01_line" id="hidden_field_data_cascte01" style="<?php echo $sStyleHidden_cascte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cascte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cascte01_label" style=""><span id="id_label_cascte01"><?php echo $this->nm_new_label['cascte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cascte01"]) &&  $this->nmgp_cmp_readonly["cascte01"] == "on") { 

 ?>
<input type="hidden" name="cascte01" value="<?php echo $this->form_encode_input($cascte01) . "\">" . $cascte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cascte01" class="sc-ui-readonly-cascte01 css_cascte01_line" style="<?php echo $sStyleReadLab_cascte01; ?>"><?php echo $this->form_format_readonly("cascte01", $this->form_encode_input($this->cascte01)); ?></span><span id="id_read_off_cascte01" class="css_read_off_cascte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cascte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cascte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cascte01" type=text name="cascte01" value="<?php echo $this->form_encode_input($cascte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cascte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cascte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecing01']))
    {
        $this->nm_new_label['fecing01'] = "Fecing 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecing01 = $this->fecing01;
   if (strlen($this->fecing01_hora) > 8 ) {$this->fecing01_hora = substr($this->fecing01_hora, 0, 8);}
   $this->fecing01 .= ' ' . $this->fecing01_hora;
   $this->fecing01  = trim($this->fecing01);
   $fecing01 = $this->fecing01;
   $sStyleHidden_fecing01 = '';
   if (isset($this->nmgp_cmp_hidden['fecing01']) && $this->nmgp_cmp_hidden['fecing01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecing01']);
       $sStyleHidden_fecing01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecing01 = 'display: none;';
   $sStyleReadInp_fecing01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecing01']) && $this->nmgp_cmp_readonly['fecing01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecing01']);
       $sStyleReadLab_fecing01 = '';
       $sStyleReadInp_fecing01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecing01']) && $this->nmgp_cmp_hidden['fecing01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecing01" value="<?php echo $this->form_encode_input($fecing01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecing01_line" id="hidden_field_data_fecing01" style="<?php echo $sStyleHidden_fecing01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecing01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecing01_label" style=""><span id="id_label_fecing01"><?php echo $this->nm_new_label['fecing01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecing01"]) &&  $this->nmgp_cmp_readonly["fecing01"] == "on") { 

 ?>
<input type="hidden" name="fecing01" value="<?php echo $this->form_encode_input($fecing01) . "\">" . $fecing01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecing01" class="sc-ui-readonly-fecing01 css_fecing01_line" style="<?php echo $sStyleReadLab_fecing01; ?>"><?php echo $this->form_format_readonly("fecing01", $this->form_encode_input($fecing01)); ?></span><span id="id_read_off_fecing01" class="css_read_off_fecing01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecing01; ?>"><?php
$tmp_form_data = $this->field_config['fecing01']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecing01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecing01" type=text name="fecing01" value="<?php echo $this->form_encode_input($fecing01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecing01']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecing01']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecing01']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecing01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecing01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fecing01 = $old_dt_fecing01;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['condpag01']))
    {
        $this->nm_new_label['condpag01'] = "Condpag 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $condpag01 = $this->condpag01;
   $sStyleHidden_condpag01 = '';
   if (isset($this->nmgp_cmp_hidden['condpag01']) && $this->nmgp_cmp_hidden['condpag01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['condpag01']);
       $sStyleHidden_condpag01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_condpag01 = 'display: none;';
   $sStyleReadInp_condpag01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['condpag01']) && $this->nmgp_cmp_readonly['condpag01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['condpag01']);
       $sStyleReadLab_condpag01 = '';
       $sStyleReadInp_condpag01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['condpag01']) && $this->nmgp_cmp_hidden['condpag01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="condpag01" value="<?php echo $this->form_encode_input($condpag01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_condpag01_line" id="hidden_field_data_condpag01" style="<?php echo $sStyleHidden_condpag01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_condpag01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_condpag01_label" style=""><span id="id_label_condpag01"><?php echo $this->nm_new_label['condpag01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["condpag01"]) &&  $this->nmgp_cmp_readonly["condpag01"] == "on") { 

 ?>
<input type="hidden" name="condpag01" value="<?php echo $this->form_encode_input($condpag01) . "\">" . $condpag01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_condpag01" class="sc-ui-readonly-condpag01 css_condpag01_line" style="<?php echo $sStyleReadLab_condpag01; ?>"><?php echo $this->form_format_readonly("condpag01", $this->form_encode_input($this->condpag01)); ?></span><span id="id_read_off_condpag01" class="css_read_off_condpag01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_condpag01; ?>">
 <input class="sc-js-input scFormObjectOdd css_condpag01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_condpag01" type=text name="condpag01" value="<?php echo $this->form_encode_input($condpag01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_condpag01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_condpag01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['desctocte01']))
    {
        $this->nm_new_label['desctocte01'] = "Desctocte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $desctocte01 = $this->desctocte01;
   $sStyleHidden_desctocte01 = '';
   if (isset($this->nmgp_cmp_hidden['desctocte01']) && $this->nmgp_cmp_hidden['desctocte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['desctocte01']);
       $sStyleHidden_desctocte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_desctocte01 = 'display: none;';
   $sStyleReadInp_desctocte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['desctocte01']) && $this->nmgp_cmp_readonly['desctocte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['desctocte01']);
       $sStyleReadLab_desctocte01 = '';
       $sStyleReadInp_desctocte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['desctocte01']) && $this->nmgp_cmp_hidden['desctocte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="desctocte01" value="<?php echo $this->form_encode_input($desctocte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_desctocte01_line" id="hidden_field_data_desctocte01" style="<?php echo $sStyleHidden_desctocte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_desctocte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_desctocte01_label" style=""><span id="id_label_desctocte01"><?php echo $this->nm_new_label['desctocte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["desctocte01"]) &&  $this->nmgp_cmp_readonly["desctocte01"] == "on") { 

 ?>
<input type="hidden" name="desctocte01" value="<?php echo $this->form_encode_input($desctocte01) . "\">" . $desctocte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_desctocte01" class="sc-ui-readonly-desctocte01 css_desctocte01_line" style="<?php echo $sStyleReadLab_desctocte01; ?>"><?php echo $this->form_format_readonly("desctocte01", $this->form_encode_input($this->desctocte01)); ?></span><span id="id_read_off_desctocte01" class="css_read_off_desctocte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_desctocte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_desctocte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_desctocte01" type=text name="desctocte01" value="<?php echo $this->form_encode_input($desctocte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=6"; } ?> alt="{datatype: 'decimal', maxLength: 6, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['desctocte01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['desctocte01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['desctocte01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['desctocte01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_desctocte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_desctocte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['limcred01']))
    {
        $this->nm_new_label['limcred01'] = "Limcred 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $limcred01 = $this->limcred01;
   $sStyleHidden_limcred01 = '';
   if (isset($this->nmgp_cmp_hidden['limcred01']) && $this->nmgp_cmp_hidden['limcred01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['limcred01']);
       $sStyleHidden_limcred01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_limcred01 = 'display: none;';
   $sStyleReadInp_limcred01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['limcred01']) && $this->nmgp_cmp_readonly['limcred01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['limcred01']);
       $sStyleReadLab_limcred01 = '';
       $sStyleReadInp_limcred01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['limcred01']) && $this->nmgp_cmp_hidden['limcred01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="limcred01" value="<?php echo $this->form_encode_input($limcred01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_limcred01_line" id="hidden_field_data_limcred01" style="<?php echo $sStyleHidden_limcred01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_limcred01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_limcred01_label" style=""><span id="id_label_limcred01"><?php echo $this->nm_new_label['limcred01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["limcred01"]) &&  $this->nmgp_cmp_readonly["limcred01"] == "on") { 

 ?>
<input type="hidden" name="limcred01" value="<?php echo $this->form_encode_input($limcred01) . "\">" . $limcred01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_limcred01" class="sc-ui-readonly-limcred01 css_limcred01_line" style="<?php echo $sStyleReadLab_limcred01; ?>"><?php echo $this->form_format_readonly("limcred01", $this->form_encode_input($this->limcred01)); ?></span><span id="id_read_off_limcred01" class="css_read_off_limcred01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_limcred01; ?>">
 <input class="sc-js-input scFormObjectOdd css_limcred01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_limcred01" type=text name="limcred01" value="<?php echo $this->form_encode_input($limcred01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['limcred01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['limcred01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['limcred01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['limcred01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_limcred01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_limcred01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['desppar01']))
    {
        $this->nm_new_label['desppar01'] = "Desppar 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $desppar01 = $this->desppar01;
   $sStyleHidden_desppar01 = '';
   if (isset($this->nmgp_cmp_hidden['desppar01']) && $this->nmgp_cmp_hidden['desppar01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['desppar01']);
       $sStyleHidden_desppar01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_desppar01 = 'display: none;';
   $sStyleReadInp_desppar01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['desppar01']) && $this->nmgp_cmp_readonly['desppar01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['desppar01']);
       $sStyleReadLab_desppar01 = '';
       $sStyleReadInp_desppar01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['desppar01']) && $this->nmgp_cmp_hidden['desppar01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="desppar01" value="<?php echo $this->form_encode_input($desppar01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_desppar01_line" id="hidden_field_data_desppar01" style="<?php echo $sStyleHidden_desppar01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_desppar01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_desppar01_label" style=""><span id="id_label_desppar01"><?php echo $this->nm_new_label['desppar01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["desppar01"]) &&  $this->nmgp_cmp_readonly["desppar01"] == "on") { 

 ?>
<input type="hidden" name="desppar01" value="<?php echo $this->form_encode_input($desppar01) . "\">" . $desppar01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_desppar01" class="sc-ui-readonly-desppar01 css_desppar01_line" style="<?php echo $sStyleReadLab_desppar01; ?>"><?php echo $this->form_format_readonly("desppar01", $this->form_encode_input($this->desppar01)); ?></span><span id="id_read_off_desppar01" class="css_read_off_desppar01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_desppar01; ?>">
 <input class="sc-js-input scFormObjectOdd css_desppar01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_desppar01" type=text name="desppar01" value="<?php echo $this->form_encode_input($desppar01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_desppar01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_desppar01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cheqpro01']))
    {
        $this->nm_new_label['cheqpro01'] = "Cheqpro 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cheqpro01 = $this->cheqpro01;
   $sStyleHidden_cheqpro01 = '';
   if (isset($this->nmgp_cmp_hidden['cheqpro01']) && $this->nmgp_cmp_hidden['cheqpro01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cheqpro01']);
       $sStyleHidden_cheqpro01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cheqpro01 = 'display: none;';
   $sStyleReadInp_cheqpro01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cheqpro01']) && $this->nmgp_cmp_readonly['cheqpro01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cheqpro01']);
       $sStyleReadLab_cheqpro01 = '';
       $sStyleReadInp_cheqpro01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cheqpro01']) && $this->nmgp_cmp_hidden['cheqpro01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cheqpro01" value="<?php echo $this->form_encode_input($cheqpro01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cheqpro01_line" id="hidden_field_data_cheqpro01" style="<?php echo $sStyleHidden_cheqpro01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cheqpro01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cheqpro01_label" style=""><span id="id_label_cheqpro01"><?php echo $this->nm_new_label['cheqpro01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cheqpro01"]) &&  $this->nmgp_cmp_readonly["cheqpro01"] == "on") { 

 ?>
<input type="hidden" name="cheqpro01" value="<?php echo $this->form_encode_input($cheqpro01) . "\">" . $cheqpro01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cheqpro01" class="sc-ui-readonly-cheqpro01 css_cheqpro01_line" style="<?php echo $sStyleReadLab_cheqpro01; ?>"><?php echo $this->form_format_readonly("cheqpro01", $this->form_encode_input($this->cheqpro01)); ?></span><span id="id_read_off_cheqpro01" class="css_read_off_cheqpro01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cheqpro01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cheqpro01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cheqpro01" type=text name="cheqpro01" value="<?php echo $this->form_encode_input($cheqpro01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cheqpro01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cheqpro01']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cheqpro01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cheqpro01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cheqpro01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sdoeje01']))
    {
        $this->nm_new_label['sdoeje01'] = "Sdoeje 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sdoeje01 = $this->sdoeje01;
   $sStyleHidden_sdoeje01 = '';
   if (isset($this->nmgp_cmp_hidden['sdoeje01']) && $this->nmgp_cmp_hidden['sdoeje01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sdoeje01']);
       $sStyleHidden_sdoeje01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sdoeje01 = 'display: none;';
   $sStyleReadInp_sdoeje01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sdoeje01']) && $this->nmgp_cmp_readonly['sdoeje01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sdoeje01']);
       $sStyleReadLab_sdoeje01 = '';
       $sStyleReadInp_sdoeje01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sdoeje01']) && $this->nmgp_cmp_hidden['sdoeje01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sdoeje01" value="<?php echo $this->form_encode_input($sdoeje01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sdoeje01_line" id="hidden_field_data_sdoeje01" style="<?php echo $sStyleHidden_sdoeje01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sdoeje01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sdoeje01_label" style=""><span id="id_label_sdoeje01"><?php echo $this->nm_new_label['sdoeje01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sdoeje01"]) &&  $this->nmgp_cmp_readonly["sdoeje01"] == "on") { 

 ?>
<input type="hidden" name="sdoeje01" value="<?php echo $this->form_encode_input($sdoeje01) . "\">" . $sdoeje01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_sdoeje01" class="sc-ui-readonly-sdoeje01 css_sdoeje01_line" style="<?php echo $sStyleReadLab_sdoeje01; ?>"><?php echo $this->form_format_readonly("sdoeje01", $this->form_encode_input($this->sdoeje01)); ?></span><span id="id_read_off_sdoeje01" class="css_read_off_sdoeje01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sdoeje01; ?>">
 <input class="sc-js-input scFormObjectOdd css_sdoeje01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sdoeje01" type=text name="sdoeje01" value="<?php echo $this->form_encode_input($sdoeje01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['sdoeje01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['sdoeje01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['sdoeje01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sdoeje01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sdoeje01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sdoeje01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sdoant01']))
    {
        $this->nm_new_label['sdoant01'] = "Sdoant 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sdoant01 = $this->sdoant01;
   $sStyleHidden_sdoant01 = '';
   if (isset($this->nmgp_cmp_hidden['sdoant01']) && $this->nmgp_cmp_hidden['sdoant01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sdoant01']);
       $sStyleHidden_sdoant01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sdoant01 = 'display: none;';
   $sStyleReadInp_sdoant01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sdoant01']) && $this->nmgp_cmp_readonly['sdoant01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sdoant01']);
       $sStyleReadLab_sdoant01 = '';
       $sStyleReadInp_sdoant01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sdoant01']) && $this->nmgp_cmp_hidden['sdoant01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sdoant01" value="<?php echo $this->form_encode_input($sdoant01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sdoant01_line" id="hidden_field_data_sdoant01" style="<?php echo $sStyleHidden_sdoant01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sdoant01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sdoant01_label" style=""><span id="id_label_sdoant01"><?php echo $this->nm_new_label['sdoant01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sdoant01"]) &&  $this->nmgp_cmp_readonly["sdoant01"] == "on") { 

 ?>
<input type="hidden" name="sdoant01" value="<?php echo $this->form_encode_input($sdoant01) . "\">" . $sdoant01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_sdoant01" class="sc-ui-readonly-sdoant01 css_sdoant01_line" style="<?php echo $sStyleReadLab_sdoant01; ?>"><?php echo $this->form_format_readonly("sdoant01", $this->form_encode_input($this->sdoant01)); ?></span><span id="id_read_off_sdoant01" class="css_read_off_sdoant01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sdoant01; ?>">
 <input class="sc-js-input scFormObjectOdd css_sdoant01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sdoant01" type=text name="sdoant01" value="<?php echo $this->form_encode_input($sdoant01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['sdoant01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['sdoant01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['sdoant01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sdoant01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sdoant01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sdoant01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sdoact01']))
    {
        $this->nm_new_label['sdoact01'] = "Sdoact 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sdoact01 = $this->sdoact01;
   $sStyleHidden_sdoact01 = '';
   if (isset($this->nmgp_cmp_hidden['sdoact01']) && $this->nmgp_cmp_hidden['sdoact01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sdoact01']);
       $sStyleHidden_sdoact01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sdoact01 = 'display: none;';
   $sStyleReadInp_sdoact01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sdoact01']) && $this->nmgp_cmp_readonly['sdoact01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sdoact01']);
       $sStyleReadLab_sdoact01 = '';
       $sStyleReadInp_sdoact01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sdoact01']) && $this->nmgp_cmp_hidden['sdoact01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sdoact01" value="<?php echo $this->form_encode_input($sdoact01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sdoact01_line" id="hidden_field_data_sdoact01" style="<?php echo $sStyleHidden_sdoact01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sdoact01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sdoact01_label" style=""><span id="id_label_sdoact01"><?php echo $this->nm_new_label['sdoact01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sdoact01"]) &&  $this->nmgp_cmp_readonly["sdoact01"] == "on") { 

 ?>
<input type="hidden" name="sdoact01" value="<?php echo $this->form_encode_input($sdoact01) . "\">" . $sdoact01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_sdoact01" class="sc-ui-readonly-sdoact01 css_sdoact01_line" style="<?php echo $sStyleReadLab_sdoact01; ?>"><?php echo $this->form_format_readonly("sdoact01", $this->form_encode_input($this->sdoact01)); ?></span><span id="id_read_off_sdoact01" class="css_read_off_sdoact01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sdoact01; ?>">
 <input class="sc-js-input scFormObjectOdd css_sdoact01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sdoact01" type=text name="sdoact01" value="<?php echo $this->form_encode_input($sdoact01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['sdoact01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['sdoact01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['sdoact01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sdoact01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sdoact01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sdoact01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['acudbm01']))
    {
        $this->nm_new_label['acudbm01'] = "Acudbm 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acudbm01 = $this->acudbm01;
   $sStyleHidden_acudbm01 = '';
   if (isset($this->nmgp_cmp_hidden['acudbm01']) && $this->nmgp_cmp_hidden['acudbm01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acudbm01']);
       $sStyleHidden_acudbm01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acudbm01 = 'display: none;';
   $sStyleReadInp_acudbm01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acudbm01']) && $this->nmgp_cmp_readonly['acudbm01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acudbm01']);
       $sStyleReadLab_acudbm01 = '';
       $sStyleReadInp_acudbm01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acudbm01']) && $this->nmgp_cmp_hidden['acudbm01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acudbm01" value="<?php echo $this->form_encode_input($acudbm01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_acudbm01_line" id="hidden_field_data_acudbm01" style="<?php echo $sStyleHidden_acudbm01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acudbm01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_acudbm01_label" style=""><span id="id_label_acudbm01"><?php echo $this->nm_new_label['acudbm01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acudbm01"]) &&  $this->nmgp_cmp_readonly["acudbm01"] == "on") { 

 ?>
<input type="hidden" name="acudbm01" value="<?php echo $this->form_encode_input($acudbm01) . "\">" . $acudbm01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_acudbm01" class="sc-ui-readonly-acudbm01 css_acudbm01_line" style="<?php echo $sStyleReadLab_acudbm01; ?>"><?php echo $this->form_format_readonly("acudbm01", $this->form_encode_input($this->acudbm01)); ?></span><span id="id_read_off_acudbm01" class="css_read_off_acudbm01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acudbm01; ?>">
 <input class="sc-js-input scFormObjectOdd css_acudbm01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acudbm01" type=text name="acudbm01" value="<?php echo $this->form_encode_input($acudbm01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['acudbm01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['acudbm01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['acudbm01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['acudbm01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acudbm01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acudbm01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['acucrm01']))
    {
        $this->nm_new_label['acucrm01'] = "Acucrm 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acucrm01 = $this->acucrm01;
   $sStyleHidden_acucrm01 = '';
   if (isset($this->nmgp_cmp_hidden['acucrm01']) && $this->nmgp_cmp_hidden['acucrm01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acucrm01']);
       $sStyleHidden_acucrm01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acucrm01 = 'display: none;';
   $sStyleReadInp_acucrm01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acucrm01']) && $this->nmgp_cmp_readonly['acucrm01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acucrm01']);
       $sStyleReadLab_acucrm01 = '';
       $sStyleReadInp_acucrm01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acucrm01']) && $this->nmgp_cmp_hidden['acucrm01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acucrm01" value="<?php echo $this->form_encode_input($acucrm01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_acucrm01_line" id="hidden_field_data_acucrm01" style="<?php echo $sStyleHidden_acucrm01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acucrm01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_acucrm01_label" style=""><span id="id_label_acucrm01"><?php echo $this->nm_new_label['acucrm01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acucrm01"]) &&  $this->nmgp_cmp_readonly["acucrm01"] == "on") { 

 ?>
<input type="hidden" name="acucrm01" value="<?php echo $this->form_encode_input($acucrm01) . "\">" . $acucrm01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_acucrm01" class="sc-ui-readonly-acucrm01 css_acucrm01_line" style="<?php echo $sStyleReadLab_acucrm01; ?>"><?php echo $this->form_format_readonly("acucrm01", $this->form_encode_input($this->acucrm01)); ?></span><span id="id_read_off_acucrm01" class="css_read_off_acucrm01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acucrm01; ?>">
 <input class="sc-js-input scFormObjectOdd css_acucrm01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acucrm01" type=text name="acucrm01" value="<?php echo $this->form_encode_input($acucrm01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['acucrm01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['acucrm01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['acucrm01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['acucrm01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acucrm01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acucrm01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['acudbe01']))
    {
        $this->nm_new_label['acudbe01'] = "Acudbe 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acudbe01 = $this->acudbe01;
   $sStyleHidden_acudbe01 = '';
   if (isset($this->nmgp_cmp_hidden['acudbe01']) && $this->nmgp_cmp_hidden['acudbe01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acudbe01']);
       $sStyleHidden_acudbe01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acudbe01 = 'display: none;';
   $sStyleReadInp_acudbe01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acudbe01']) && $this->nmgp_cmp_readonly['acudbe01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acudbe01']);
       $sStyleReadLab_acudbe01 = '';
       $sStyleReadInp_acudbe01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acudbe01']) && $this->nmgp_cmp_hidden['acudbe01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acudbe01" value="<?php echo $this->form_encode_input($acudbe01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_acudbe01_line" id="hidden_field_data_acudbe01" style="<?php echo $sStyleHidden_acudbe01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acudbe01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_acudbe01_label" style=""><span id="id_label_acudbe01"><?php echo $this->nm_new_label['acudbe01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acudbe01"]) &&  $this->nmgp_cmp_readonly["acudbe01"] == "on") { 

 ?>
<input type="hidden" name="acudbe01" value="<?php echo $this->form_encode_input($acudbe01) . "\">" . $acudbe01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_acudbe01" class="sc-ui-readonly-acudbe01 css_acudbe01_line" style="<?php echo $sStyleReadLab_acudbe01; ?>"><?php echo $this->form_format_readonly("acudbe01", $this->form_encode_input($this->acudbe01)); ?></span><span id="id_read_off_acudbe01" class="css_read_off_acudbe01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acudbe01; ?>">
 <input class="sc-js-input scFormObjectOdd css_acudbe01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acudbe01" type=text name="acudbe01" value="<?php echo $this->form_encode_input($acudbe01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['acudbe01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['acudbe01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['acudbe01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['acudbe01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acudbe01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acudbe01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['acucre01']))
    {
        $this->nm_new_label['acucre01'] = "Acucre 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $acucre01 = $this->acucre01;
   $sStyleHidden_acucre01 = '';
   if (isset($this->nmgp_cmp_hidden['acucre01']) && $this->nmgp_cmp_hidden['acucre01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['acucre01']);
       $sStyleHidden_acucre01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_acucre01 = 'display: none;';
   $sStyleReadInp_acucre01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['acucre01']) && $this->nmgp_cmp_readonly['acucre01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['acucre01']);
       $sStyleReadLab_acucre01 = '';
       $sStyleReadInp_acucre01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['acucre01']) && $this->nmgp_cmp_hidden['acucre01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acucre01" value="<?php echo $this->form_encode_input($acucre01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_acucre01_line" id="hidden_field_data_acucre01" style="<?php echo $sStyleHidden_acucre01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_acucre01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_acucre01_label" style=""><span id="id_label_acucre01"><?php echo $this->nm_new_label['acucre01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acucre01"]) &&  $this->nmgp_cmp_readonly["acucre01"] == "on") { 

 ?>
<input type="hidden" name="acucre01" value="<?php echo $this->form_encode_input($acucre01) . "\">" . $acucre01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_acucre01" class="sc-ui-readonly-acucre01 css_acucre01_line" style="<?php echo $sStyleReadLab_acucre01; ?>"><?php echo $this->form_format_readonly("acucre01", $this->form_encode_input($this->acucre01)); ?></span><span id="id_read_off_acucre01" class="css_read_off_acucre01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acucre01; ?>">
 <input class="sc-js-input scFormObjectOdd css_acucre01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acucre01" type=text name="acucre01" value="<?php echo $this->form_encode_input($acucre01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['acucre01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['acucre01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['acucre01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['acucre01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acucre01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acucre01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['comentcte01']))
    {
        $this->nm_new_label['comentcte01'] = "Comentcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $comentcte01 = $this->comentcte01;
   $sStyleHidden_comentcte01 = '';
   if (isset($this->nmgp_cmp_hidden['comentcte01']) && $this->nmgp_cmp_hidden['comentcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['comentcte01']);
       $sStyleHidden_comentcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_comentcte01 = 'display: none;';
   $sStyleReadInp_comentcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['comentcte01']) && $this->nmgp_cmp_readonly['comentcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['comentcte01']);
       $sStyleReadLab_comentcte01 = '';
       $sStyleReadInp_comentcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['comentcte01']) && $this->nmgp_cmp_hidden['comentcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="comentcte01" value="<?php echo $this->form_encode_input($comentcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_comentcte01_line" id="hidden_field_data_comentcte01" style="<?php echo $sStyleHidden_comentcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_comentcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_comentcte01_label" style=""><span id="id_label_comentcte01"><?php echo $this->nm_new_label['comentcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["comentcte01"]) &&  $this->nmgp_cmp_readonly["comentcte01"] == "on") { 

 ?>
<input type="hidden" name="comentcte01" value="<?php echo $this->form_encode_input($comentcte01) . "\">" . $comentcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_comentcte01" class="sc-ui-readonly-comentcte01 css_comentcte01_line" style="<?php echo $sStyleReadLab_comentcte01; ?>"><?php echo $this->form_format_readonly("comentcte01", $this->form_encode_input($this->comentcte01)); ?></span><span id="id_read_off_comentcte01" class="css_read_off_comentcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_comentcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_comentcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_comentcte01" type=text name="comentcte01" value="<?php echo $this->form_encode_input($comentcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_comentcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_comentcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['statuscte01']))
    {
        $this->nm_new_label['statuscte01'] = "Statuscte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $statuscte01 = $this->statuscte01;
   $sStyleHidden_statuscte01 = '';
   if (isset($this->nmgp_cmp_hidden['statuscte01']) && $this->nmgp_cmp_hidden['statuscte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['statuscte01']);
       $sStyleHidden_statuscte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_statuscte01 = 'display: none;';
   $sStyleReadInp_statuscte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['statuscte01']) && $this->nmgp_cmp_readonly['statuscte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['statuscte01']);
       $sStyleReadLab_statuscte01 = '';
       $sStyleReadInp_statuscte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['statuscte01']) && $this->nmgp_cmp_hidden['statuscte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="statuscte01" value="<?php echo $this->form_encode_input($statuscte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_statuscte01_line" id="hidden_field_data_statuscte01" style="<?php echo $sStyleHidden_statuscte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_statuscte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_statuscte01_label" style=""><span id="id_label_statuscte01"><?php echo $this->nm_new_label['statuscte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["statuscte01"]) &&  $this->nmgp_cmp_readonly["statuscte01"] == "on") { 

 ?>
<input type="hidden" name="statuscte01" value="<?php echo $this->form_encode_input($statuscte01) . "\">" . $statuscte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_statuscte01" class="sc-ui-readonly-statuscte01 css_statuscte01_line" style="<?php echo $sStyleReadLab_statuscte01; ?>"><?php echo $this->form_format_readonly("statuscte01", $this->form_encode_input($this->statuscte01)); ?></span><span id="id_read_off_statuscte01" class="css_read_off_statuscte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_statuscte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_statuscte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_statuscte01" type=text name="statuscte01" value="<?php echo $this->form_encode_input($statuscte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_statuscte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_statuscte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['identcte01']))
    {
        $this->nm_new_label['identcte01'] = "Identcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $identcte01 = $this->identcte01;
   $sStyleHidden_identcte01 = '';
   if (isset($this->nmgp_cmp_hidden['identcte01']) && $this->nmgp_cmp_hidden['identcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['identcte01']);
       $sStyleHidden_identcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_identcte01 = 'display: none;';
   $sStyleReadInp_identcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['identcte01']) && $this->nmgp_cmp_readonly['identcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['identcte01']);
       $sStyleReadLab_identcte01 = '';
       $sStyleReadInp_identcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['identcte01']) && $this->nmgp_cmp_hidden['identcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="identcte01" value="<?php echo $this->form_encode_input($identcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_identcte01_line" id="hidden_field_data_identcte01" style="<?php echo $sStyleHidden_identcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_identcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_identcte01_label" style=""><span id="id_label_identcte01"><?php echo $this->nm_new_label['identcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["identcte01"]) &&  $this->nmgp_cmp_readonly["identcte01"] == "on") { 

 ?>
<input type="hidden" name="identcte01" value="<?php echo $this->form_encode_input($identcte01) . "\">" . $identcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_identcte01" class="sc-ui-readonly-identcte01 css_identcte01_line" style="<?php echo $sStyleReadLab_identcte01; ?>"><?php echo $this->form_format_readonly("identcte01", $this->form_encode_input($this->identcte01)); ?></span><span id="id_read_off_identcte01" class="css_read_off_identcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_identcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_identcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_identcte01" type=text name="identcte01" value="<?php echo $this->form_encode_input($identcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_identcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_identcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cordcte01']))
    {
        $this->nm_new_label['cordcte01'] = "Cordcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cordcte01 = $this->cordcte01;
   $sStyleHidden_cordcte01 = '';
   if (isset($this->nmgp_cmp_hidden['cordcte01']) && $this->nmgp_cmp_hidden['cordcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cordcte01']);
       $sStyleHidden_cordcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cordcte01 = 'display: none;';
   $sStyleReadInp_cordcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cordcte01']) && $this->nmgp_cmp_readonly['cordcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cordcte01']);
       $sStyleReadLab_cordcte01 = '';
       $sStyleReadInp_cordcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cordcte01']) && $this->nmgp_cmp_hidden['cordcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cordcte01" value="<?php echo $this->form_encode_input($cordcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cordcte01_line" id="hidden_field_data_cordcte01" style="<?php echo $sStyleHidden_cordcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cordcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cordcte01_label" style=""><span id="id_label_cordcte01"><?php echo $this->nm_new_label['cordcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cordcte01"]) &&  $this->nmgp_cmp_readonly["cordcte01"] == "on") { 

 ?>
<input type="hidden" name="cordcte01" value="<?php echo $this->form_encode_input($cordcte01) . "\">" . $cordcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cordcte01" class="sc-ui-readonly-cordcte01 css_cordcte01_line" style="<?php echo $sStyleReadLab_cordcte01; ?>"><?php echo $this->form_format_readonly("cordcte01", $this->form_encode_input($this->cordcte01)); ?></span><span id="id_read_off_cordcte01" class="css_read_off_cordcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cordcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cordcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cordcte01" type=text name="cordcte01" value="<?php echo $this->form_encode_input($cordcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cordcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cordcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['limcant01']))
    {
        $this->nm_new_label['limcant01'] = "Limcant 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $limcant01 = $this->limcant01;
   $sStyleHidden_limcant01 = '';
   if (isset($this->nmgp_cmp_hidden['limcant01']) && $this->nmgp_cmp_hidden['limcant01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['limcant01']);
       $sStyleHidden_limcant01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_limcant01 = 'display: none;';
   $sStyleReadInp_limcant01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['limcant01']) && $this->nmgp_cmp_readonly['limcant01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['limcant01']);
       $sStyleReadLab_limcant01 = '';
       $sStyleReadInp_limcant01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['limcant01']) && $this->nmgp_cmp_hidden['limcant01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="limcant01" value="<?php echo $this->form_encode_input($limcant01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_limcant01_line" id="hidden_field_data_limcant01" style="<?php echo $sStyleHidden_limcant01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_limcant01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_limcant01_label" style=""><span id="id_label_limcant01"><?php echo $this->nm_new_label['limcant01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["limcant01"]) &&  $this->nmgp_cmp_readonly["limcant01"] == "on") { 

 ?>
<input type="hidden" name="limcant01" value="<?php echo $this->form_encode_input($limcant01) . "\">" . $limcant01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_limcant01" class="sc-ui-readonly-limcant01 css_limcant01_line" style="<?php echo $sStyleReadLab_limcant01; ?>"><?php echo $this->form_format_readonly("limcant01", $this->form_encode_input($this->limcant01)); ?></span><span id="id_read_off_limcant01" class="css_read_off_limcant01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_limcant01; ?>">
 <input class="sc-js-input scFormObjectOdd css_limcant01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_limcant01" type=text name="limcant01" value="<?php echo $this->form_encode_input($limcant01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_limcant01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_limcant01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pagleg01']))
    {
        $this->nm_new_label['pagleg01'] = "Pagleg 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pagleg01 = $this->pagleg01;
   $sStyleHidden_pagleg01 = '';
   if (isset($this->nmgp_cmp_hidden['pagleg01']) && $this->nmgp_cmp_hidden['pagleg01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pagleg01']);
       $sStyleHidden_pagleg01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pagleg01 = 'display: none;';
   $sStyleReadInp_pagleg01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pagleg01']) && $this->nmgp_cmp_readonly['pagleg01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pagleg01']);
       $sStyleReadLab_pagleg01 = '';
       $sStyleReadInp_pagleg01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pagleg01']) && $this->nmgp_cmp_hidden['pagleg01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pagleg01" value="<?php echo $this->form_encode_input($pagleg01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pagleg01_line" id="hidden_field_data_pagleg01" style="<?php echo $sStyleHidden_pagleg01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pagleg01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pagleg01_label" style=""><span id="id_label_pagleg01"><?php echo $this->nm_new_label['pagleg01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pagleg01"]) &&  $this->nmgp_cmp_readonly["pagleg01"] == "on") { 

 ?>
<input type="hidden" name="pagleg01" value="<?php echo $this->form_encode_input($pagleg01) . "\">" . $pagleg01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_pagleg01" class="sc-ui-readonly-pagleg01 css_pagleg01_line" style="<?php echo $sStyleReadLab_pagleg01; ?>"><?php echo $this->form_format_readonly("pagleg01", $this->form_encode_input($this->pagleg01)); ?></span><span id="id_read_off_pagleg01" class="css_read_off_pagleg01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pagleg01; ?>">
 <input class="sc-js-input scFormObjectOdd css_pagleg01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pagleg01" type=text name="pagleg01" value="<?php echo $this->form_encode_input($pagleg01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=30"; } ?> maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pagleg01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pagleg01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telcte01b']))
    {
        $this->nm_new_label['telcte01b'] = "Telcte 0 1b";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telcte01b = $this->telcte01b;
   $sStyleHidden_telcte01b = '';
   if (isset($this->nmgp_cmp_hidden['telcte01b']) && $this->nmgp_cmp_hidden['telcte01b'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telcte01b']);
       $sStyleHidden_telcte01b = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telcte01b = 'display: none;';
   $sStyleReadInp_telcte01b = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telcte01b']) && $this->nmgp_cmp_readonly['telcte01b'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telcte01b']);
       $sStyleReadLab_telcte01b = '';
       $sStyleReadInp_telcte01b = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telcte01b']) && $this->nmgp_cmp_hidden['telcte01b'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telcte01b" value="<?php echo $this->form_encode_input($telcte01b) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_telcte01b_line" id="hidden_field_data_telcte01b" style="<?php echo $sStyleHidden_telcte01b; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telcte01b_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_telcte01b_label" style=""><span id="id_label_telcte01b"><?php echo $this->nm_new_label['telcte01b']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telcte01b"]) &&  $this->nmgp_cmp_readonly["telcte01b"] == "on") { 

 ?>
<input type="hidden" name="telcte01b" value="<?php echo $this->form_encode_input($telcte01b) . "\">" . $telcte01b . ""; ?>
<?php } else { ?>
<span id="id_read_on_telcte01b" class="sc-ui-readonly-telcte01b css_telcte01b_line" style="<?php echo $sStyleReadLab_telcte01b; ?>"><?php echo $this->form_format_readonly("telcte01b", $this->form_encode_input($this->telcte01b)); ?></span><span id="id_read_off_telcte01b" class="css_read_off_telcte01b<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telcte01b; ?>">
 <input class="sc-js-input scFormObjectOdd css_telcte01b_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_telcte01b" type=text name="telcte01b" value="<?php echo $this->form_encode_input($telcte01b) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> maxlength=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telcte01b_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telcte01b_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telcte01c']))
    {
        $this->nm_new_label['telcte01c'] = "Telcte 0 1c";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telcte01c = $this->telcte01c;
   $sStyleHidden_telcte01c = '';
   if (isset($this->nmgp_cmp_hidden['telcte01c']) && $this->nmgp_cmp_hidden['telcte01c'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telcte01c']);
       $sStyleHidden_telcte01c = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telcte01c = 'display: none;';
   $sStyleReadInp_telcte01c = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telcte01c']) && $this->nmgp_cmp_readonly['telcte01c'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telcte01c']);
       $sStyleReadLab_telcte01c = '';
       $sStyleReadInp_telcte01c = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telcte01c']) && $this->nmgp_cmp_hidden['telcte01c'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telcte01c" value="<?php echo $this->form_encode_input($telcte01c) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_telcte01c_line" id="hidden_field_data_telcte01c" style="<?php echo $sStyleHidden_telcte01c; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telcte01c_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_telcte01c_label" style=""><span id="id_label_telcte01c"><?php echo $this->nm_new_label['telcte01c']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telcte01c"]) &&  $this->nmgp_cmp_readonly["telcte01c"] == "on") { 

 ?>
<input type="hidden" name="telcte01c" value="<?php echo $this->form_encode_input($telcte01c) . "\">" . $telcte01c . ""; ?>
<?php } else { ?>
<span id="id_read_on_telcte01c" class="sc-ui-readonly-telcte01c css_telcte01c_line" style="<?php echo $sStyleReadLab_telcte01c; ?>"><?php echo $this->form_format_readonly("telcte01c", $this->form_encode_input($this->telcte01c)); ?></span><span id="id_read_off_telcte01c" class="css_read_off_telcte01c<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telcte01c; ?>">
 <input class="sc-js-input scFormObjectOdd css_telcte01c_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_telcte01c" type=text name="telcte01c" value="<?php echo $this->form_encode_input($telcte01c) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> maxlength=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telcte01c_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telcte01c_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emailcte01']))
    {
        $this->nm_new_label['emailcte01'] = "Emailcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emailcte01 = $this->emailcte01;
   $sStyleHidden_emailcte01 = '';
   if (isset($this->nmgp_cmp_hidden['emailcte01']) && $this->nmgp_cmp_hidden['emailcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emailcte01']);
       $sStyleHidden_emailcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emailcte01 = 'display: none;';
   $sStyleReadInp_emailcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emailcte01']) && $this->nmgp_cmp_readonly['emailcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emailcte01']);
       $sStyleReadLab_emailcte01 = '';
       $sStyleReadInp_emailcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emailcte01']) && $this->nmgp_cmp_hidden['emailcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emailcte01" value="<?php echo $this->form_encode_input($emailcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_emailcte01_line" id="hidden_field_data_emailcte01" style="<?php echo $sStyleHidden_emailcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emailcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_emailcte01_label" style=""><span id="id_label_emailcte01"><?php echo $this->nm_new_label['emailcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emailcte01"]) &&  $this->nmgp_cmp_readonly["emailcte01"] == "on") { 

 ?>
<input type="hidden" name="emailcte01" value="<?php echo $this->form_encode_input($emailcte01) . "\">" . $emailcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_emailcte01" class="sc-ui-readonly-emailcte01 css_emailcte01_line" style="<?php echo $sStyleReadLab_emailcte01; ?>"><?php echo $this->form_format_readonly("emailcte01", $this->form_encode_input($this->emailcte01)); ?></span><span id="id_read_off_emailcte01" class="css_read_off_emailcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_emailcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_emailcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_emailcte01" type=text name="emailcte01" value="<?php echo $this->form_encode_input($emailcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emailcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emailcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ctacgcte01']))
    {
        $this->nm_new_label['ctacgcte01'] = "Ctacgcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ctacgcte01 = $this->ctacgcte01;
   $sStyleHidden_ctacgcte01 = '';
   if (isset($this->nmgp_cmp_hidden['ctacgcte01']) && $this->nmgp_cmp_hidden['ctacgcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ctacgcte01']);
       $sStyleHidden_ctacgcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ctacgcte01 = 'display: none;';
   $sStyleReadInp_ctacgcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ctacgcte01']) && $this->nmgp_cmp_readonly['ctacgcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ctacgcte01']);
       $sStyleReadLab_ctacgcte01 = '';
       $sStyleReadInp_ctacgcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ctacgcte01']) && $this->nmgp_cmp_hidden['ctacgcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ctacgcte01" value="<?php echo $this->form_encode_input($ctacgcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ctacgcte01_line" id="hidden_field_data_ctacgcte01" style="<?php echo $sStyleHidden_ctacgcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ctacgcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ctacgcte01_label" style=""><span id="id_label_ctacgcte01"><?php echo $this->nm_new_label['ctacgcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ctacgcte01"]) &&  $this->nmgp_cmp_readonly["ctacgcte01"] == "on") { 

 ?>
<input type="hidden" name="ctacgcte01" value="<?php echo $this->form_encode_input($ctacgcte01) . "\">" . $ctacgcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ctacgcte01" class="sc-ui-readonly-ctacgcte01 css_ctacgcte01_line" style="<?php echo $sStyleReadLab_ctacgcte01; ?>"><?php echo $this->form_format_readonly("ctacgcte01", $this->form_encode_input($this->ctacgcte01)); ?></span><span id="id_read_off_ctacgcte01" class="css_read_off_ctacgcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ctacgcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_ctacgcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ctacgcte01" type=text name="ctacgcte01" value="<?php echo $this->form_encode_input($ctacgcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ctacgcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ctacgcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['obsercte01']))
    {
        $this->nm_new_label['obsercte01'] = "Obsercte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obsercte01 = $this->obsercte01;
   $sStyleHidden_obsercte01 = '';
   if (isset($this->nmgp_cmp_hidden['obsercte01']) && $this->nmgp_cmp_hidden['obsercte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obsercte01']);
       $sStyleHidden_obsercte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obsercte01 = 'display: none;';
   $sStyleReadInp_obsercte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obsercte01']) && $this->nmgp_cmp_readonly['obsercte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obsercte01']);
       $sStyleReadLab_obsercte01 = '';
       $sStyleReadInp_obsercte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obsercte01']) && $this->nmgp_cmp_hidden['obsercte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obsercte01" value="<?php echo $this->form_encode_input($obsercte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_obsercte01_line" id="hidden_field_data_obsercte01" style="<?php echo $sStyleHidden_obsercte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obsercte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_obsercte01_label" style=""><span id="id_label_obsercte01"><?php echo $this->nm_new_label['obsercte01']; ?></span></span><br>
<?php
$obsercte01_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obsercte01));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obsercte01"]) &&  $this->nmgp_cmp_readonly["obsercte01"] == "on") { 

 ?>
<input type="hidden" name="obsercte01" value="<?php echo $this->form_encode_input($obsercte01) . "\">" . $obsercte01_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obsercte01" class="sc-ui-readonly-obsercte01 css_obsercte01_line" style="<?php echo $sStyleReadLab_obsercte01; ?>"><?php echo $this->form_format_readonly("obsercte01", $this->form_encode_input($obsercte01_val)); ?></span><span id="id_read_off_obsercte01" class="css_read_off_obsercte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obsercte01; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_obsercte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="obsercte01" id="id_sc_field_obsercte01" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $obsercte01; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obsercte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obsercte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['totexceso01']))
    {
        $this->nm_new_label['totexceso01'] = "Totexceso 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totexceso01 = $this->totexceso01;
   $sStyleHidden_totexceso01 = '';
   if (isset($this->nmgp_cmp_hidden['totexceso01']) && $this->nmgp_cmp_hidden['totexceso01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totexceso01']);
       $sStyleHidden_totexceso01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totexceso01 = 'display: none;';
   $sStyleReadInp_totexceso01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['totexceso01']) && $this->nmgp_cmp_readonly['totexceso01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totexceso01']);
       $sStyleReadLab_totexceso01 = '';
       $sStyleReadInp_totexceso01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totexceso01']) && $this->nmgp_cmp_hidden['totexceso01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totexceso01" value="<?php echo $this->form_encode_input($totexceso01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_totexceso01_line" id="hidden_field_data_totexceso01" style="<?php echo $sStyleHidden_totexceso01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totexceso01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_totexceso01_label" style=""><span id="id_label_totexceso01"><?php echo $this->nm_new_label['totexceso01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["totexceso01"]) &&  $this->nmgp_cmp_readonly["totexceso01"] == "on") { 

 ?>
<input type="hidden" name="totexceso01" value="<?php echo $this->form_encode_input($totexceso01) . "\">" . $totexceso01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_totexceso01" class="sc-ui-readonly-totexceso01 css_totexceso01_line" style="<?php echo $sStyleReadLab_totexceso01; ?>"><?php echo $this->form_format_readonly("totexceso01", $this->form_encode_input($this->totexceso01)); ?></span><span id="id_read_off_totexceso01" class="css_read_off_totexceso01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_totexceso01; ?>">
 <input class="sc-js-input scFormObjectOdd css_totexceso01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_totexceso01" type=text name="totexceso01" value="<?php echo $this->form_encode_input($totexceso01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['totexceso01']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totexceso01']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totexceso01']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totexceso01']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totexceso01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totexceso01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['imagencte01']))
    {
        $this->nm_new_label['imagencte01'] = "Imagencte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $imagencte01 = $this->imagencte01;
   $sStyleHidden_imagencte01 = '';
   if (isset($this->nmgp_cmp_hidden['imagencte01']) && $this->nmgp_cmp_hidden['imagencte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['imagencte01']);
       $sStyleHidden_imagencte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_imagencte01 = 'display: none;';
   $sStyleReadInp_imagencte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['imagencte01']) && $this->nmgp_cmp_readonly['imagencte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['imagencte01']);
       $sStyleReadLab_imagencte01 = '';
       $sStyleReadInp_imagencte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['imagencte01']) && $this->nmgp_cmp_hidden['imagencte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="imagencte01" value="<?php echo $this->form_encode_input($imagencte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_imagencte01_line" id="hidden_field_data_imagencte01" style="<?php echo $sStyleHidden_imagencte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_imagencte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_imagencte01_label" style=""><span id="id_label_imagencte01"><?php echo $this->nm_new_label['imagencte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["imagencte01"]) &&  $this->nmgp_cmp_readonly["imagencte01"] == "on") { 

 ?>
<input type="hidden" name="imagencte01" value="<?php echo $this->form_encode_input($imagencte01) . "\">" . $imagencte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_imagencte01" class="sc-ui-readonly-imagencte01 css_imagencte01_line" style="<?php echo $sStyleReadLab_imagencte01; ?>"><?php echo $this->form_format_readonly("imagencte01", $this->form_encode_input($this->imagencte01)); ?></span><span id="id_read_off_imagencte01" class="css_read_off_imagencte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_imagencte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_imagencte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_imagencte01" type=text name="imagencte01" value="<?php echo $this->form_encode_input($imagencte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_imagencte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_imagencte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_block_line" id="hidden_field_data_block" style="<?php echo $sStyleHidden_block; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_block_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_block_label" style=""><span id="id_label_block"><?php echo $this->nm_new_label['block']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["block"]) &&  $this->nmgp_cmp_readonly["block"] == "on") { 

 ?>
<input type="hidden" name="block" value="<?php echo $this->form_encode_input($block) . "\">" . $block . ""; ?>
<?php } else { ?>
<span id="id_read_on_block" class="sc-ui-readonly-block css_block_line" style="<?php echo $sStyleReadLab_block; ?>"><?php echo $this->form_format_readonly("block", $this->form_encode_input($this->block)); ?></span><span id="id_read_off_block" class="css_read_off_block<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_block; ?>">
 <input class="sc-js-input scFormObjectOdd css_block_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_block" type=text name="block" value="<?php echo $this->form_encode_input($block) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_block_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_block_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_uid_line" id="hidden_field_data_uid" style="<?php echo $sStyleHidden_uid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_uid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_uid_label" style=""><span id="id_label_uid"><?php echo $this->nm_new_label['uid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["uid"]) &&  $this->nmgp_cmp_readonly["uid"] == "on") { 

 ?>
<input type="hidden" name="uid" value="<?php echo $this->form_encode_input($uid) . "\">" . $uid . ""; ?>
<?php } else { ?>
<span id="id_read_on_uid" class="sc-ui-readonly-uid css_uid_line" style="<?php echo $sStyleReadLab_uid; ?>"><?php echo $this->form_format_readonly("uid", $this->form_encode_input($this->uid)); ?></span><span id="id_read_off_uid" class="css_read_off_uid<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_uid; ?>">
 <input class="sc-js-input scFormObjectOdd css_uid_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_uid" type=text name="uid" value="<?php echo $this->form_encode_input($uid) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_uid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_uid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idcli']))
           {
               $this->nmgp_cmp_readonly['idcli'] = 'on';
           }
?>


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

    <TD class="scFormDataOdd css_ultimoacceso_line" id="hidden_field_data_ultimoacceso" style="<?php echo $sStyleHidden_ultimoacceso; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ultimoacceso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ultimoacceso_label" style=""><span id="id_label_ultimoacceso"><?php echo $this->nm_new_label['ultimoacceso']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ultimoacceso"]) &&  $this->nmgp_cmp_readonly["ultimoacceso"] == "on") { 

 ?>
<input type="hidden" name="ultimoacceso" value="<?php echo $this->form_encode_input($ultimoacceso) . "\">" . $ultimoacceso . ""; ?>
<?php } else { ?>
<span id="id_read_on_ultimoacceso" class="sc-ui-readonly-ultimoacceso css_ultimoacceso_line" style="<?php echo $sStyleReadLab_ultimoacceso; ?>"><?php echo $this->form_format_readonly("ultimoacceso", $this->form_encode_input($this->ultimoacceso)); ?></span><span id="id_read_off_ultimoacceso" class="css_read_off_ultimoacceso<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ultimoacceso; ?>">
 <input class="sc-js-input scFormObjectOdd css_ultimoacceso_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ultimoacceso" type=text name="ultimoacceso" value="<?php echo $this->form_encode_input($ultimoacceso) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'integer', maxLength: 19, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['ultimoacceso']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['ultimoacceso']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['ultimoacceso']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ultimoacceso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ultimoacceso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idcli']))
    {
        $this->nm_new_label['idcli'] = "Idcli";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcli = $this->idcli;
   $sStyleHidden_idcli = '';
   if (isset($this->nmgp_cmp_hidden['idcli']) && $this->nmgp_cmp_hidden['idcli'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcli']);
       $sStyleHidden_idcli = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcli = 'display: none;';
   $sStyleReadInp_idcli = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idcli"]) &&  $this->nmgp_cmp_readonly["idcli"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcli']);
       $sStyleReadLab_idcli = '';
       $sStyleReadInp_idcli = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcli']) && $this->nmgp_cmp_hidden['idcli'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcli" value="<?php echo $this->form_encode_input($idcli) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_idcli_line" id="hidden_field_data_idcli" style="<?php echo $sStyleHidden_idcli; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcli_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idcli_label" style=""><span id="id_label_idcli"><?php echo $this->nm_new_label['idcli']; ?></span></span><br><span id="id_read_on_idcli" class="css_idcli_line" style="<?php echo $sStyleReadLab_idcli; ?>"><?php echo $this->form_format_readonly("idcli", $this->form_encode_input($this->idcli)); ?></span><span id="id_read_off_idcli" class="css_read_off_idcli" style="<?php echo $sStyleReadInp_idcli; ?>"><input type="hidden" name="idcli" value="<?php echo $this->form_encode_input($idcli) . "\">"?><span id="id_ajax_label_idcli"><?php echo nl2br($idcli); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcli_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcli_text"></span></td></tr></table></td></tr></table> </TD>
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
    if (!isset($this->nm_new_label['catcte01']))
    {
        $this->nm_new_label['catcte01'] = "Catcte 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $catcte01 = $this->catcte01;
   $sStyleHidden_catcte01 = '';
   if (isset($this->nmgp_cmp_hidden['catcte01']) && $this->nmgp_cmp_hidden['catcte01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['catcte01']);
       $sStyleHidden_catcte01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_catcte01 = 'display: none;';
   $sStyleReadInp_catcte01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['catcte01']) && $this->nmgp_cmp_readonly['catcte01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['catcte01']);
       $sStyleReadLab_catcte01 = '';
       $sStyleReadInp_catcte01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['catcte01']) && $this->nmgp_cmp_hidden['catcte01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="catcte01" value="<?php echo $this->form_encode_input($catcte01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_catcte01_line" id="hidden_field_data_catcte01" style="<?php echo $sStyleHidden_catcte01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_catcte01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_catcte01_label" style=""><span id="id_label_catcte01"><?php echo $this->nm_new_label['catcte01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["catcte01"]) &&  $this->nmgp_cmp_readonly["catcte01"] == "on") { 

 ?>
<input type="hidden" name="catcte01" value="<?php echo $this->form_encode_input($catcte01) . "\">" . $catcte01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_catcte01" class="sc-ui-readonly-catcte01 css_catcte01_line" style="<?php echo $sStyleReadLab_catcte01; ?>"><?php echo $this->form_format_readonly("catcte01", $this->form_encode_input($this->catcte01)); ?></span><span id="id_read_off_catcte01" class="css_read_off_catcte01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_catcte01; ?>">
 <input class="sc-js-input scFormObjectOdd css_catcte01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_catcte01" type=text name="catcte01" value="<?php echo $this->form_encode_input($catcte01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_catcte01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_catcte01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numautosri01']))
    {
        $this->nm_new_label['numautosri01'] = "Numautosri 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numautosri01 = $this->numautosri01;
   $sStyleHidden_numautosri01 = '';
   if (isset($this->nmgp_cmp_hidden['numautosri01']) && $this->nmgp_cmp_hidden['numautosri01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numautosri01']);
       $sStyleHidden_numautosri01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numautosri01 = 'display: none;';
   $sStyleReadInp_numautosri01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numautosri01']) && $this->nmgp_cmp_readonly['numautosri01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numautosri01']);
       $sStyleReadLab_numautosri01 = '';
       $sStyleReadInp_numautosri01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numautosri01']) && $this->nmgp_cmp_hidden['numautosri01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numautosri01" value="<?php echo $this->form_encode_input($numautosri01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numautosri01_line" id="hidden_field_data_numautosri01" style="<?php echo $sStyleHidden_numautosri01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numautosri01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numautosri01_label" style=""><span id="id_label_numautosri01"><?php echo $this->nm_new_label['numautosri01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numautosri01"]) &&  $this->nmgp_cmp_readonly["numautosri01"] == "on") { 

 ?>
<input type="hidden" name="numautosri01" value="<?php echo $this->form_encode_input($numautosri01) . "\">" . $numautosri01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_numautosri01" class="sc-ui-readonly-numautosri01 css_numautosri01_line" style="<?php echo $sStyleReadLab_numautosri01; ?>"><?php echo $this->form_format_readonly("numautosri01", $this->form_encode_input($this->numautosri01)); ?></span><span id="id_read_off_numautosri01" class="css_read_off_numautosri01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numautosri01; ?>">
 <input class="sc-js-input scFormObjectOdd css_numautosri01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numautosri01" type=text name="numautosri01" value="<?php echo $this->form_encode_input($numautosri01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numautosri01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numautosri01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['seriedoc01']))
    {
        $this->nm_new_label['seriedoc01'] = "Seriedoc 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $seriedoc01 = $this->seriedoc01;
   $sStyleHidden_seriedoc01 = '';
   if (isset($this->nmgp_cmp_hidden['seriedoc01']) && $this->nmgp_cmp_hidden['seriedoc01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['seriedoc01']);
       $sStyleHidden_seriedoc01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_seriedoc01 = 'display: none;';
   $sStyleReadInp_seriedoc01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['seriedoc01']) && $this->nmgp_cmp_readonly['seriedoc01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['seriedoc01']);
       $sStyleReadLab_seriedoc01 = '';
       $sStyleReadInp_seriedoc01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['seriedoc01']) && $this->nmgp_cmp_hidden['seriedoc01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="seriedoc01" value="<?php echo $this->form_encode_input($seriedoc01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_seriedoc01_line" id="hidden_field_data_seriedoc01" style="<?php echo $sStyleHidden_seriedoc01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_seriedoc01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_seriedoc01_label" style=""><span id="id_label_seriedoc01"><?php echo $this->nm_new_label['seriedoc01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["seriedoc01"]) &&  $this->nmgp_cmp_readonly["seriedoc01"] == "on") { 

 ?>
<input type="hidden" name="seriedoc01" value="<?php echo $this->form_encode_input($seriedoc01) . "\">" . $seriedoc01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_seriedoc01" class="sc-ui-readonly-seriedoc01 css_seriedoc01_line" style="<?php echo $sStyleReadLab_seriedoc01; ?>"><?php echo $this->form_format_readonly("seriedoc01", $this->form_encode_input($this->seriedoc01)); ?></span><span id="id_read_off_seriedoc01" class="css_read_off_seriedoc01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_seriedoc01; ?>">
 <input class="sc-js-input scFormObjectOdd css_seriedoc01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_seriedoc01" type=text name="seriedoc01" value="<?php echo $this->form_encode_input($seriedoc01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_seriedoc01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_seriedoc01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fecvencdoc01']))
    {
        $this->nm_new_label['fecvencdoc01'] = "Fecvencdoc 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fecvencdoc01 = $this->fecvencdoc01;
   $sStyleHidden_fecvencdoc01 = '';
   if (isset($this->nmgp_cmp_hidden['fecvencdoc01']) && $this->nmgp_cmp_hidden['fecvencdoc01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecvencdoc01']);
       $sStyleHidden_fecvencdoc01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecvencdoc01 = 'display: none;';
   $sStyleReadInp_fecvencdoc01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fecvencdoc01']) && $this->nmgp_cmp_readonly['fecvencdoc01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecvencdoc01']);
       $sStyleReadLab_fecvencdoc01 = '';
       $sStyleReadInp_fecvencdoc01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecvencdoc01']) && $this->nmgp_cmp_hidden['fecvencdoc01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecvencdoc01" value="<?php echo $this->form_encode_input($fecvencdoc01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecvencdoc01_line" id="hidden_field_data_fecvencdoc01" style="<?php echo $sStyleHidden_fecvencdoc01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecvencdoc01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecvencdoc01_label" style=""><span id="id_label_fecvencdoc01"><?php echo $this->nm_new_label['fecvencdoc01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fecvencdoc01"]) &&  $this->nmgp_cmp_readonly["fecvencdoc01"] == "on") { 

 ?>
<input type="hidden" name="fecvencdoc01" value="<?php echo $this->form_encode_input($fecvencdoc01) . "\">" . $fecvencdoc01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_fecvencdoc01" class="sc-ui-readonly-fecvencdoc01 css_fecvencdoc01_line" style="<?php echo $sStyleReadLab_fecvencdoc01; ?>"><?php echo $this->form_format_readonly("fecvencdoc01", $this->form_encode_input($fecvencdoc01)); ?></span><span id="id_read_off_fecvencdoc01" class="css_read_off_fecvencdoc01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecvencdoc01; ?>"><?php
$tmp_form_data = $this->field_config['fecvencdoc01']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecvencdoc01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecvencdoc01" type=text name="fecvencdoc01" value="<?php echo $this->form_encode_input($fecvencdoc01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fecvencdoc01']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecvencdoc01']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecvencdoc01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecvencdoc01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['repleg01']))
    {
        $this->nm_new_label['repleg01'] = "Repleg 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $repleg01 = $this->repleg01;
   $sStyleHidden_repleg01 = '';
   if (isset($this->nmgp_cmp_hidden['repleg01']) && $this->nmgp_cmp_hidden['repleg01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['repleg01']);
       $sStyleHidden_repleg01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_repleg01 = 'display: none;';
   $sStyleReadInp_repleg01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['repleg01']) && $this->nmgp_cmp_readonly['repleg01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['repleg01']);
       $sStyleReadLab_repleg01 = '';
       $sStyleReadInp_repleg01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['repleg01']) && $this->nmgp_cmp_hidden['repleg01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="repleg01" value="<?php echo $this->form_encode_input($repleg01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_repleg01_line" id="hidden_field_data_repleg01" style="<?php echo $sStyleHidden_repleg01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_repleg01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_repleg01_label" style=""><span id="id_label_repleg01"><?php echo $this->nm_new_label['repleg01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["repleg01"]) &&  $this->nmgp_cmp_readonly["repleg01"] == "on") { 

 ?>
<input type="hidden" name="repleg01" value="<?php echo $this->form_encode_input($repleg01) . "\">" . $repleg01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_repleg01" class="sc-ui-readonly-repleg01 css_repleg01_line" style="<?php echo $sStyleReadLab_repleg01; ?>"><?php echo $this->form_format_readonly("repleg01", $this->form_encode_input($this->repleg01)); ?></span><span id="id_read_off_repleg01" class="css_read_off_repleg01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_repleg01; ?>">
 <input class="sc-js-input scFormObjectOdd css_repleg01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_repleg01" type=text name="repleg01" value="<?php echo $this->form_encode_input($repleg01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_repleg01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_repleg01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['coddest01']))
    {
        $this->nm_new_label['coddest01'] = "Coddest 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $coddest01 = $this->coddest01;
   $sStyleHidden_coddest01 = '';
   if (isset($this->nmgp_cmp_hidden['coddest01']) && $this->nmgp_cmp_hidden['coddest01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['coddest01']);
       $sStyleHidden_coddest01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_coddest01 = 'display: none;';
   $sStyleReadInp_coddest01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['coddest01']) && $this->nmgp_cmp_readonly['coddest01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['coddest01']);
       $sStyleReadLab_coddest01 = '';
       $sStyleReadInp_coddest01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['coddest01']) && $this->nmgp_cmp_hidden['coddest01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="coddest01" value="<?php echo $this->form_encode_input($coddest01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_coddest01_line" id="hidden_field_data_coddest01" style="<?php echo $sStyleHidden_coddest01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_coddest01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_coddest01_label" style=""><span id="id_label_coddest01"><?php echo $this->nm_new_label['coddest01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["coddest01"]) &&  $this->nmgp_cmp_readonly["coddest01"] == "on") { 

 ?>
<input type="hidden" name="coddest01" value="<?php echo $this->form_encode_input($coddest01) . "\">" . $coddest01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_coddest01" class="sc-ui-readonly-coddest01 css_coddest01_line" style="<?php echo $sStyleReadLab_coddest01; ?>"><?php echo $this->form_format_readonly("coddest01", $this->form_encode_input($this->coddest01)); ?></span><span id="id_read_off_coddest01" class="css_read_off_coddest01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_coddest01; ?>">
 <input class="sc-js-input scFormObjectOdd css_coddest01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_coddest01" type=text name="coddest01" value="<?php echo $this->form_encode_input($coddest01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_coddest01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_coddest01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['longitud01']))
    {
        $this->nm_new_label['longitud01'] = "Longitud 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $longitud01 = $this->longitud01;
   $sStyleHidden_longitud01 = '';
   if (isset($this->nmgp_cmp_hidden['longitud01']) && $this->nmgp_cmp_hidden['longitud01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['longitud01']);
       $sStyleHidden_longitud01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_longitud01 = 'display: none;';
   $sStyleReadInp_longitud01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['longitud01']) && $this->nmgp_cmp_readonly['longitud01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['longitud01']);
       $sStyleReadLab_longitud01 = '';
       $sStyleReadInp_longitud01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['longitud01']) && $this->nmgp_cmp_hidden['longitud01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="longitud01" value="<?php echo $this->form_encode_input($longitud01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_longitud01_line" id="hidden_field_data_longitud01" style="<?php echo $sStyleHidden_longitud01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_longitud01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_longitud01_label" style=""><span id="id_label_longitud01"><?php echo $this->nm_new_label['longitud01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["longitud01"]) &&  $this->nmgp_cmp_readonly["longitud01"] == "on") { 

 ?>
<input type="hidden" name="longitud01" value="<?php echo $this->form_encode_input($longitud01) . "\">" . $longitud01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_longitud01" class="sc-ui-readonly-longitud01 css_longitud01_line" style="<?php echo $sStyleReadLab_longitud01; ?>"><?php echo $this->form_format_readonly("longitud01", $this->form_encode_input($this->longitud01)); ?></span><span id="id_read_off_longitud01" class="css_read_off_longitud01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_longitud01; ?>">
 <input class="sc-js-input scFormObjectOdd css_longitud01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_longitud01" type=text name="longitud01" value="<?php echo $this->form_encode_input($longitud01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_longitud01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_longitud01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['latitud01']))
    {
        $this->nm_new_label['latitud01'] = "Latitud 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $latitud01 = $this->latitud01;
   $sStyleHidden_latitud01 = '';
   if (isset($this->nmgp_cmp_hidden['latitud01']) && $this->nmgp_cmp_hidden['latitud01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['latitud01']);
       $sStyleHidden_latitud01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_latitud01 = 'display: none;';
   $sStyleReadInp_latitud01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['latitud01']) && $this->nmgp_cmp_readonly['latitud01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['latitud01']);
       $sStyleReadLab_latitud01 = '';
       $sStyleReadInp_latitud01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['latitud01']) && $this->nmgp_cmp_hidden['latitud01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="latitud01" value="<?php echo $this->form_encode_input($latitud01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_latitud01_line" id="hidden_field_data_latitud01" style="<?php echo $sStyleHidden_latitud01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_latitud01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_latitud01_label" style=""><span id="id_label_latitud01"><?php echo $this->nm_new_label['latitud01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["latitud01"]) &&  $this->nmgp_cmp_readonly["latitud01"] == "on") { 

 ?>
<input type="hidden" name="latitud01" value="<?php echo $this->form_encode_input($latitud01) . "\">" . $latitud01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_latitud01" class="sc-ui-readonly-latitud01 css_latitud01_line" style="<?php echo $sStyleReadLab_latitud01; ?>"><?php echo $this->form_format_readonly("latitud01", $this->form_encode_input($this->latitud01)); ?></span><span id="id_read_off_latitud01" class="css_read_off_latitud01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_latitud01; ?>">
 <input class="sc-js-input scFormObjectOdd css_latitud01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_latitud01" type=text name="latitud01" value="<?php echo $this->form_encode_input($latitud01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_latitud01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_latitud01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['zoom01']))
    {
        $this->nm_new_label['zoom01'] = "Zoom 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $zoom01 = $this->zoom01;
   $sStyleHidden_zoom01 = '';
   if (isset($this->nmgp_cmp_hidden['zoom01']) && $this->nmgp_cmp_hidden['zoom01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['zoom01']);
       $sStyleHidden_zoom01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_zoom01 = 'display: none;';
   $sStyleReadInp_zoom01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['zoom01']) && $this->nmgp_cmp_readonly['zoom01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['zoom01']);
       $sStyleReadLab_zoom01 = '';
       $sStyleReadInp_zoom01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['zoom01']) && $this->nmgp_cmp_hidden['zoom01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="zoom01" value="<?php echo $this->form_encode_input($zoom01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_zoom01_line" id="hidden_field_data_zoom01" style="<?php echo $sStyleHidden_zoom01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_zoom01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_zoom01_label" style=""><span id="id_label_zoom01"><?php echo $this->nm_new_label['zoom01']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["zoom01"]) &&  $this->nmgp_cmp_readonly["zoom01"] == "on") { 

 ?>
<input type="hidden" name="zoom01" value="<?php echo $this->form_encode_input($zoom01) . "\">" . $zoom01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_zoom01" class="sc-ui-readonly-zoom01 css_zoom01_line" style="<?php echo $sStyleReadLab_zoom01; ?>"><?php echo $this->form_format_readonly("zoom01", $this->form_encode_input($this->zoom01)); ?></span><span id="id_read_off_zoom01" class="css_read_off_zoom01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_zoom01; ?>">
 <input class="sc-js-input scFormObjectOdd css_zoom01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_zoom01" type=text name="zoom01" value="<?php echo $this->form_encode_input($zoom01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_zoom01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_zoom01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['coniva01']))
    {
        $this->nm_new_label['coniva01'] = "Coniva 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $coniva01 = $this->coniva01;
   $sStyleHidden_coniva01 = '';
   if (isset($this->nmgp_cmp_hidden['coniva01']) && $this->nmgp_cmp_hidden['coniva01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['coniva01']);
       $sStyleHidden_coniva01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_coniva01 = 'display: none;';
   $sStyleReadInp_coniva01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['coniva01']) && $this->nmgp_cmp_readonly['coniva01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['coniva01']);
       $sStyleReadLab_coniva01 = '';
       $sStyleReadInp_coniva01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['coniva01']) && $this->nmgp_cmp_hidden['coniva01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="coniva01" value="<?php echo $this->form_encode_input($coniva01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_coniva01_line" id="hidden_field_data_coniva01" style="<?php echo $sStyleHidden_coniva01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_coniva01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_coniva01_label" style=""><span id="id_label_coniva01"><?php echo $this->nm_new_label['coniva01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['coniva01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['coniva01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["coniva01"]) &&  $this->nmgp_cmp_readonly["coniva01"] == "on") { 

 ?>
<input type="hidden" name="coniva01" value="<?php echo $this->form_encode_input($coniva01) . "\">" . $coniva01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_coniva01" class="sc-ui-readonly-coniva01 css_coniva01_line" style="<?php echo $sStyleReadLab_coniva01; ?>"><?php echo $this->form_format_readonly("coniva01", $this->form_encode_input($this->coniva01)); ?></span><span id="id_read_off_coniva01" class="css_read_off_coniva01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_coniva01; ?>">
 <input class="sc-js-input scFormObjectOdd css_coniva01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_coniva01" type=text name="coniva01" value="<?php echo $this->form_encode_input($coniva01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_coniva01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_coniva01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['conret01']))
    {
        $this->nm_new_label['conret01'] = "Conret 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conret01 = $this->conret01;
   $sStyleHidden_conret01 = '';
   if (isset($this->nmgp_cmp_hidden['conret01']) && $this->nmgp_cmp_hidden['conret01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conret01']);
       $sStyleHidden_conret01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conret01 = 'display: none;';
   $sStyleReadInp_conret01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conret01']) && $this->nmgp_cmp_readonly['conret01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conret01']);
       $sStyleReadLab_conret01 = '';
       $sStyleReadInp_conret01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conret01']) && $this->nmgp_cmp_hidden['conret01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="conret01" value="<?php echo $this->form_encode_input($conret01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_conret01_line" id="hidden_field_data_conret01" style="<?php echo $sStyleHidden_conret01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_conret01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_conret01_label" style=""><span id="id_label_conret01"><?php echo $this->nm_new_label['conret01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['conret01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['conret01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["conret01"]) &&  $this->nmgp_cmp_readonly["conret01"] == "on") { 

 ?>
<input type="hidden" name="conret01" value="<?php echo $this->form_encode_input($conret01) . "\">" . $conret01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_conret01" class="sc-ui-readonly-conret01 css_conret01_line" style="<?php echo $sStyleReadLab_conret01; ?>"><?php echo $this->form_format_readonly("conret01", $this->form_encode_input($this->conret01)); ?></span><span id="id_read_off_conret01" class="css_read_off_conret01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_conret01; ?>">
 <input class="sc-js-input scFormObjectOdd css_conret01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_conret01" type=text name="conret01" value="<?php echo $this->form_encode_input($conret01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conret01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conret01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipo_identificacion']))
    {
        $this->nm_new_label['tipo_identificacion'] = "Tipo Identificacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_identificacion = $this->tipo_identificacion;
   $sStyleHidden_tipo_identificacion = '';
   if (isset($this->nmgp_cmp_hidden['tipo_identificacion']) && $this->nmgp_cmp_hidden['tipo_identificacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_identificacion']);
       $sStyleHidden_tipo_identificacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_identificacion = 'display: none;';
   $sStyleReadInp_tipo_identificacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_identificacion']) && $this->nmgp_cmp_readonly['tipo_identificacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_identificacion']);
       $sStyleReadLab_tipo_identificacion = '';
       $sStyleReadInp_tipo_identificacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_identificacion']) && $this->nmgp_cmp_hidden['tipo_identificacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo_identificacion" value="<?php echo $this->form_encode_input($tipo_identificacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_identificacion_line" id="hidden_field_data_tipo_identificacion" style="<?php echo $sStyleHidden_tipo_identificacion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_identificacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_identificacion_label" style=""><span id="id_label_tipo_identificacion"><?php echo $this->nm_new_label['tipo_identificacion']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['tipo_identificacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['tipo_identificacion'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_identificacion"]) &&  $this->nmgp_cmp_readonly["tipo_identificacion"] == "on") { 

 ?>
<input type="hidden" name="tipo_identificacion" value="<?php echo $this->form_encode_input($tipo_identificacion) . "\">" . $tipo_identificacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipo_identificacion" class="sc-ui-readonly-tipo_identificacion css_tipo_identificacion_line" style="<?php echo $sStyleReadLab_tipo_identificacion; ?>"><?php echo $this->form_format_readonly("tipo_identificacion", $this->form_encode_input($this->tipo_identificacion)); ?></span><span id="id_read_off_tipo_identificacion" class="css_read_off_tipo_identificacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipo_identificacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipo_identificacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_identificacion" type=text name="tipo_identificacion" value="<?php echo $this->form_encode_input($tipo_identificacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_identificacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_identificacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['es_padre']))
    {
        $this->nm_new_label['es_padre'] = "Es Padre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $es_padre = $this->es_padre;
   $sStyleHidden_es_padre = '';
   if (isset($this->nmgp_cmp_hidden['es_padre']) && $this->nmgp_cmp_hidden['es_padre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['es_padre']);
       $sStyleHidden_es_padre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_es_padre = 'display: none;';
   $sStyleReadInp_es_padre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['es_padre']) && $this->nmgp_cmp_readonly['es_padre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['es_padre']);
       $sStyleReadLab_es_padre = '';
       $sStyleReadInp_es_padre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['es_padre']) && $this->nmgp_cmp_hidden['es_padre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="es_padre" value="<?php echo $this->form_encode_input($es_padre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_es_padre_line" id="hidden_field_data_es_padre" style="<?php echo $sStyleHidden_es_padre; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_es_padre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_es_padre_label" style=""><span id="id_label_es_padre"><?php echo $this->nm_new_label['es_padre']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["es_padre"]) &&  $this->nmgp_cmp_readonly["es_padre"] == "on") { 

 ?>
<input type="hidden" name="es_padre" value="<?php echo $this->form_encode_input($es_padre) . "\">" . $es_padre . ""; ?>
<?php } else { ?>
<span id="id_read_on_es_padre" class="sc-ui-readonly-es_padre css_es_padre_line" style="<?php echo $sStyleReadLab_es_padre; ?>"><?php echo $this->form_format_readonly("es_padre", $this->form_encode_input($this->es_padre)); ?></span><span id="id_read_off_es_padre" class="css_read_off_es_padre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_es_padre; ?>">
 <input class="sc-js-input scFormObjectOdd css_es_padre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_es_padre" type=text name="es_padre" value="<?php echo $this->form_encode_input($es_padre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=3"; } ?> alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['es_padre']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['es_padre']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['es_padre']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_es_padre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_es_padre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bonos']))
    {
        $this->nm_new_label['bonos'] = "Bonos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bonos = $this->bonos;
   $sStyleHidden_bonos = '';
   if (isset($this->nmgp_cmp_hidden['bonos']) && $this->nmgp_cmp_hidden['bonos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bonos']);
       $sStyleHidden_bonos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bonos = 'display: none;';
   $sStyleReadInp_bonos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bonos']) && $this->nmgp_cmp_readonly['bonos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bonos']);
       $sStyleReadLab_bonos = '';
       $sStyleReadInp_bonos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bonos']) && $this->nmgp_cmp_hidden['bonos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bonos" value="<?php echo $this->form_encode_input($bonos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bonos_line" id="hidden_field_data_bonos" style="<?php echo $sStyleHidden_bonos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bonos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bonos_label" style=""><span id="id_label_bonos"><?php echo $this->nm_new_label['bonos']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['bonos']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['bonos'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bonos"]) &&  $this->nmgp_cmp_readonly["bonos"] == "on") { 

 ?>
<input type="hidden" name="bonos" value="<?php echo $this->form_encode_input($bonos) . "\">" . $bonos . ""; ?>
<?php } else { ?>
<span id="id_read_on_bonos" class="sc-ui-readonly-bonos css_bonos_line" style="<?php echo $sStyleReadLab_bonos; ?>"><?php echo $this->form_format_readonly("bonos", $this->form_encode_input($this->bonos)); ?></span><span id="id_read_off_bonos" class="css_read_off_bonos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_bonos; ?>">
 <input class="sc-js-input scFormObjectOdd css_bonos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_bonos" type=text name="bonos" value="<?php echo $this->form_encode_input($bonos) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bonos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bonos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rendimiento']))
    {
        $this->nm_new_label['rendimiento'] = "Rendimiento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rendimiento = $this->rendimiento;
   $sStyleHidden_rendimiento = '';
   if (isset($this->nmgp_cmp_hidden['rendimiento']) && $this->nmgp_cmp_hidden['rendimiento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rendimiento']);
       $sStyleHidden_rendimiento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rendimiento = 'display: none;';
   $sStyleReadInp_rendimiento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rendimiento']) && $this->nmgp_cmp_readonly['rendimiento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rendimiento']);
       $sStyleReadLab_rendimiento = '';
       $sStyleReadInp_rendimiento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rendimiento']) && $this->nmgp_cmp_hidden['rendimiento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rendimiento" value="<?php echo $this->form_encode_input($rendimiento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_rendimiento_line" id="hidden_field_data_rendimiento" style="<?php echo $sStyleHidden_rendimiento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rendimiento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_rendimiento_label" style=""><span id="id_label_rendimiento"><?php echo $this->nm_new_label['rendimiento']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['rendimiento']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['rendimiento'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rendimiento"]) &&  $this->nmgp_cmp_readonly["rendimiento"] == "on") { 

 ?>
<input type="hidden" name="rendimiento" value="<?php echo $this->form_encode_input($rendimiento) . "\">" . $rendimiento . ""; ?>
<?php } else { ?>
<span id="id_read_on_rendimiento" class="sc-ui-readonly-rendimiento css_rendimiento_line" style="<?php echo $sStyleReadLab_rendimiento; ?>"><?php echo $this->form_format_readonly("rendimiento", $this->form_encode_input($this->rendimiento)); ?></span><span id="id_read_off_rendimiento" class="css_read_off_rendimiento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rendimiento; ?>">
 <input class="sc-js-input scFormObjectOdd css_rendimiento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rendimiento" type=text name="rendimiento" value="<?php echo $this->form_encode_input($rendimiento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rendimiento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rendimiento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['parterel01']))
    {
        $this->nm_new_label['parterel01'] = "Parte Rel 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $parterel01 = $this->parterel01;
   $sStyleHidden_parterel01 = '';
   if (isset($this->nmgp_cmp_hidden['parterel01']) && $this->nmgp_cmp_hidden['parterel01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['parterel01']);
       $sStyleHidden_parterel01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_parterel01 = 'display: none;';
   $sStyleReadInp_parterel01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['parterel01']) && $this->nmgp_cmp_readonly['parterel01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['parterel01']);
       $sStyleReadLab_parterel01 = '';
       $sStyleReadInp_parterel01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['parterel01']) && $this->nmgp_cmp_hidden['parterel01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="parterel01" value="<?php echo $this->form_encode_input($parterel01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_parterel01_line" id="hidden_field_data_parterel01" style="<?php echo $sStyleHidden_parterel01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_parterel01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_parterel01_label" style=""><span id="id_label_parterel01"><?php echo $this->nm_new_label['parterel01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['parterel01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['parterel01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["parterel01"]) &&  $this->nmgp_cmp_readonly["parterel01"] == "on") { 

 ?>
<input type="hidden" name="parterel01" value="<?php echo $this->form_encode_input($parterel01) . "\">" . $parterel01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_parterel01" class="sc-ui-readonly-parterel01 css_parterel01_line" style="<?php echo $sStyleReadLab_parterel01; ?>"><?php echo $this->form_format_readonly("parterel01", $this->form_encode_input($this->parterel01)); ?></span><span id="id_read_off_parterel01" class="css_read_off_parterel01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_parterel01; ?>">
 <input class="sc-js-input scFormObjectOdd css_parterel01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_parterel01" type=text name="parterel01" value="<?php echo $this->form_encode_input($parterel01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_parterel01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_parterel01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['clase_contribuyente']))
    {
        $this->nm_new_label['clase_contribuyente'] = "Clase Contribuyente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $clase_contribuyente = $this->clase_contribuyente;
   $sStyleHidden_clase_contribuyente = '';
   if (isset($this->nmgp_cmp_hidden['clase_contribuyente']) && $this->nmgp_cmp_hidden['clase_contribuyente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['clase_contribuyente']);
       $sStyleHidden_clase_contribuyente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_clase_contribuyente = 'display: none;';
   $sStyleReadInp_clase_contribuyente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['clase_contribuyente']) && $this->nmgp_cmp_readonly['clase_contribuyente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['clase_contribuyente']);
       $sStyleReadLab_clase_contribuyente = '';
       $sStyleReadInp_clase_contribuyente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['clase_contribuyente']) && $this->nmgp_cmp_hidden['clase_contribuyente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="clase_contribuyente" value="<?php echo $this->form_encode_input($clase_contribuyente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_clase_contribuyente_line" id="hidden_field_data_clase_contribuyente" style="<?php echo $sStyleHidden_clase_contribuyente; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_clase_contribuyente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_clase_contribuyente_label" style=""><span id="id_label_clase_contribuyente"><?php echo $this->nm_new_label['clase_contribuyente']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['clase_contribuyente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['clase_contribuyente'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["clase_contribuyente"]) &&  $this->nmgp_cmp_readonly["clase_contribuyente"] == "on") { 

 ?>
<input type="hidden" name="clase_contribuyente" value="<?php echo $this->form_encode_input($clase_contribuyente) . "\">" . $clase_contribuyente . ""; ?>
<?php } else { ?>
<span id="id_read_on_clase_contribuyente" class="sc-ui-readonly-clase_contribuyente css_clase_contribuyente_line" style="<?php echo $sStyleReadLab_clase_contribuyente; ?>"><?php echo $this->form_format_readonly("clase_contribuyente", $this->form_encode_input($this->clase_contribuyente)); ?></span><span id="id_read_off_clase_contribuyente" class="css_read_off_clase_contribuyente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_clase_contribuyente; ?>">
 <input class="sc-js-input scFormObjectOdd css_clase_contribuyente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_clase_contribuyente" type=text name="clase_contribuyente" value="<?php echo $this->form_encode_input($clase_contribuyente) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_clase_contribuyente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_clase_contribuyente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipo_contribuyente']))
    {
        $this->nm_new_label['tipo_contribuyente'] = "Tipo Contribuyente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_contribuyente = $this->tipo_contribuyente;
   $sStyleHidden_tipo_contribuyente = '';
   if (isset($this->nmgp_cmp_hidden['tipo_contribuyente']) && $this->nmgp_cmp_hidden['tipo_contribuyente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_contribuyente']);
       $sStyleHidden_tipo_contribuyente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_contribuyente = 'display: none;';
   $sStyleReadInp_tipo_contribuyente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_contribuyente']) && $this->nmgp_cmp_readonly['tipo_contribuyente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_contribuyente']);
       $sStyleReadLab_tipo_contribuyente = '';
       $sStyleReadInp_tipo_contribuyente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_contribuyente']) && $this->nmgp_cmp_hidden['tipo_contribuyente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo_contribuyente" value="<?php echo $this->form_encode_input($tipo_contribuyente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_contribuyente_line" id="hidden_field_data_tipo_contribuyente" style="<?php echo $sStyleHidden_tipo_contribuyente; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_contribuyente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_contribuyente_label" style=""><span id="id_label_tipo_contribuyente"><?php echo $this->nm_new_label['tipo_contribuyente']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['tipo_contribuyente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['tipo_contribuyente'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_contribuyente"]) &&  $this->nmgp_cmp_readonly["tipo_contribuyente"] == "on") { 

 ?>
<input type="hidden" name="tipo_contribuyente" value="<?php echo $this->form_encode_input($tipo_contribuyente) . "\">" . $tipo_contribuyente . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipo_contribuyente" class="sc-ui-readonly-tipo_contribuyente css_tipo_contribuyente_line" style="<?php echo $sStyleReadLab_tipo_contribuyente; ?>"><?php echo $this->form_format_readonly("tipo_contribuyente", $this->form_encode_input($this->tipo_contribuyente)); ?></span><span id="id_read_off_tipo_contribuyente" class="css_read_off_tipo_contribuyente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipo_contribuyente; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipo_contribuyente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_contribuyente" type=text name="tipo_contribuyente" value="<?php echo $this->form_encode_input($tipo_contribuyente) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_contribuyente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_contribuyente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lleva_contabilidad']))
    {
        $this->nm_new_label['lleva_contabilidad'] = "Lleva Contabilidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lleva_contabilidad = $this->lleva_contabilidad;
   $sStyleHidden_lleva_contabilidad = '';
   if (isset($this->nmgp_cmp_hidden['lleva_contabilidad']) && $this->nmgp_cmp_hidden['lleva_contabilidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lleva_contabilidad']);
       $sStyleHidden_lleva_contabilidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lleva_contabilidad = 'display: none;';
   $sStyleReadInp_lleva_contabilidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lleva_contabilidad']) && $this->nmgp_cmp_readonly['lleva_contabilidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lleva_contabilidad']);
       $sStyleReadLab_lleva_contabilidad = '';
       $sStyleReadInp_lleva_contabilidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lleva_contabilidad']) && $this->nmgp_cmp_hidden['lleva_contabilidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lleva_contabilidad" value="<?php echo $this->form_encode_input($lleva_contabilidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_lleva_contabilidad_line" id="hidden_field_data_lleva_contabilidad" style="<?php echo $sStyleHidden_lleva_contabilidad; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lleva_contabilidad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lleva_contabilidad_label" style=""><span id="id_label_lleva_contabilidad"><?php echo $this->nm_new_label['lleva_contabilidad']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['lleva_contabilidad']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['lleva_contabilidad'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lleva_contabilidad"]) &&  $this->nmgp_cmp_readonly["lleva_contabilidad"] == "on") { 

 ?>
<input type="hidden" name="lleva_contabilidad" value="<?php echo $this->form_encode_input($lleva_contabilidad) . "\">" . $lleva_contabilidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_lleva_contabilidad" class="sc-ui-readonly-lleva_contabilidad css_lleva_contabilidad_line" style="<?php echo $sStyleReadLab_lleva_contabilidad; ?>"><?php echo $this->form_format_readonly("lleva_contabilidad", $this->form_encode_input($this->lleva_contabilidad)); ?></span><span id="id_read_off_lleva_contabilidad" class="css_read_off_lleva_contabilidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_lleva_contabilidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_lleva_contabilidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_lleva_contabilidad" type=text name="lleva_contabilidad" value="<?php echo $this->form_encode_input($lleva_contabilidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lleva_contabilidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lleva_contabilidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ctacgant01']))
    {
        $this->nm_new_label['ctacgant01'] = "Ctacgant 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ctacgant01 = $this->ctacgant01;
   $sStyleHidden_ctacgant01 = '';
   if (isset($this->nmgp_cmp_hidden['ctacgant01']) && $this->nmgp_cmp_hidden['ctacgant01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ctacgant01']);
       $sStyleHidden_ctacgant01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ctacgant01 = 'display: none;';
   $sStyleReadInp_ctacgant01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ctacgant01']) && $this->nmgp_cmp_readonly['ctacgant01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ctacgant01']);
       $sStyleReadLab_ctacgant01 = '';
       $sStyleReadInp_ctacgant01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ctacgant01']) && $this->nmgp_cmp_hidden['ctacgant01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ctacgant01" value="<?php echo $this->form_encode_input($ctacgant01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ctacgant01_line" id="hidden_field_data_ctacgant01" style="<?php echo $sStyleHidden_ctacgant01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ctacgant01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ctacgant01_label" style=""><span id="id_label_ctacgant01"><?php echo $this->nm_new_label['ctacgant01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['ctacgant01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['ctacgant01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ctacgant01"]) &&  $this->nmgp_cmp_readonly["ctacgant01"] == "on") { 

 ?>
<input type="hidden" name="ctacgant01" value="<?php echo $this->form_encode_input($ctacgant01) . "\">" . $ctacgant01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_ctacgant01" class="sc-ui-readonly-ctacgant01 css_ctacgant01_line" style="<?php echo $sStyleReadLab_ctacgant01; ?>"><?php echo $this->form_format_readonly("ctacgant01", $this->form_encode_input($this->ctacgant01)); ?></span><span id="id_read_off_ctacgant01" class="css_read_off_ctacgant01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ctacgant01; ?>">
 <input class="sc-js-input scFormObjectOdd css_ctacgant01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ctacgant01" type=text name="ctacgant01" value="<?php echo $this->form_encode_input($ctacgant01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ctacgant01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ctacgant01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['residentefiscal01']))
    {
        $this->nm_new_label['residentefiscal01'] = "Residente Fiscal 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $residentefiscal01 = $this->residentefiscal01;
   $sStyleHidden_residentefiscal01 = '';
   if (isset($this->nmgp_cmp_hidden['residentefiscal01']) && $this->nmgp_cmp_hidden['residentefiscal01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['residentefiscal01']);
       $sStyleHidden_residentefiscal01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_residentefiscal01 = 'display: none;';
   $sStyleReadInp_residentefiscal01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['residentefiscal01']) && $this->nmgp_cmp_readonly['residentefiscal01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['residentefiscal01']);
       $sStyleReadLab_residentefiscal01 = '';
       $sStyleReadInp_residentefiscal01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['residentefiscal01']) && $this->nmgp_cmp_hidden['residentefiscal01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="residentefiscal01" value="<?php echo $this->form_encode_input($residentefiscal01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_residentefiscal01_line" id="hidden_field_data_residentefiscal01" style="<?php echo $sStyleHidden_residentefiscal01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_residentefiscal01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_residentefiscal01_label" style=""><span id="id_label_residentefiscal01"><?php echo $this->nm_new_label['residentefiscal01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['residentefiscal01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['residentefiscal01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["residentefiscal01"]) &&  $this->nmgp_cmp_readonly["residentefiscal01"] == "on") { 

 ?>
<input type="hidden" name="residentefiscal01" value="<?php echo $this->form_encode_input($residentefiscal01) . "\">" . $residentefiscal01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_residentefiscal01" class="sc-ui-readonly-residentefiscal01 css_residentefiscal01_line" style="<?php echo $sStyleReadLab_residentefiscal01; ?>"><?php echo $this->form_format_readonly("residentefiscal01", $this->form_encode_input($this->residentefiscal01)); ?></span><span id="id_read_off_residentefiscal01" class="css_read_off_residentefiscal01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_residentefiscal01; ?>">
 <input class="sc-js-input scFormObjectOdd css_residentefiscal01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_residentefiscal01" type=text name="residentefiscal01" value="<?php echo $this->form_encode_input($residentefiscal01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_residentefiscal01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_residentefiscal01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['es_cliente']))
    {
        $this->nm_new_label['es_cliente'] = "Es Cliente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $es_cliente = $this->es_cliente;
   $sStyleHidden_es_cliente = '';
   if (isset($this->nmgp_cmp_hidden['es_cliente']) && $this->nmgp_cmp_hidden['es_cliente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['es_cliente']);
       $sStyleHidden_es_cliente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_es_cliente = 'display: none;';
   $sStyleReadInp_es_cliente = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['es_cliente']) && $this->nmgp_cmp_readonly['es_cliente'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['es_cliente']);
       $sStyleReadLab_es_cliente = '';
       $sStyleReadInp_es_cliente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['es_cliente']) && $this->nmgp_cmp_hidden['es_cliente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="es_cliente" value="<?php echo $this->form_encode_input($es_cliente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_es_cliente_line" id="hidden_field_data_es_cliente" style="<?php echo $sStyleHidden_es_cliente; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_es_cliente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_es_cliente_label" style=""><span id="id_label_es_cliente"><?php echo $this->nm_new_label['es_cliente']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['es_cliente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['es_cliente'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["es_cliente"]) &&  $this->nmgp_cmp_readonly["es_cliente"] == "on") { 

 ?>
<input type="hidden" name="es_cliente" value="<?php echo $this->form_encode_input($es_cliente) . "\">" . $es_cliente . ""; ?>
<?php } else { ?>
<span id="id_read_on_es_cliente" class="sc-ui-readonly-es_cliente css_es_cliente_line" style="<?php echo $sStyleReadLab_es_cliente; ?>"><?php echo $this->form_format_readonly("es_cliente", $this->form_encode_input($this->es_cliente)); ?></span><span id="id_read_off_es_cliente" class="css_read_off_es_cliente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_es_cliente; ?>">
 <input class="sc-js-input scFormObjectOdd css_es_cliente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_es_cliente" type=text name="es_cliente" value="<?php echo $this->form_encode_input($es_cliente) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_es_cliente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_es_cliente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['grupos']))
    {
        $this->nm_new_label['grupos'] = "Grupos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $grupos = $this->grupos;
   $sStyleHidden_grupos = '';
   if (isset($this->nmgp_cmp_hidden['grupos']) && $this->nmgp_cmp_hidden['grupos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['grupos']);
       $sStyleHidden_grupos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_grupos = 'display: none;';
   $sStyleReadInp_grupos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['grupos']) && $this->nmgp_cmp_readonly['grupos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['grupos']);
       $sStyleReadLab_grupos = '';
       $sStyleReadInp_grupos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['grupos']) && $this->nmgp_cmp_hidden['grupos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="grupos" value="<?php echo $this->form_encode_input($grupos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_grupos_line" id="hidden_field_data_grupos" style="<?php echo $sStyleHidden_grupos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_grupos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_grupos_label" style=""><span id="id_label_grupos"><?php echo $this->nm_new_label['grupos']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['grupos']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['grupos'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["grupos"]) &&  $this->nmgp_cmp_readonly["grupos"] == "on") { 

 ?>
<input type="hidden" name="grupos" value="<?php echo $this->form_encode_input($grupos) . "\">" . $grupos . ""; ?>
<?php } else { ?>
<span id="id_read_on_grupos" class="sc-ui-readonly-grupos css_grupos_line" style="<?php echo $sStyleReadLab_grupos; ?>"><?php echo $this->form_format_readonly("grupos", $this->form_encode_input($this->grupos)); ?></span><span id="id_read_off_grupos" class="css_read_off_grupos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_grupos; ?>">
 <input class="sc-js-input scFormObjectOdd css_grupos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_grupos" type=text name="grupos" value="<?php echo $this->form_encode_input($grupos) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_grupos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_grupos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codigo_banco']))
    {
        $this->nm_new_label['codigo_banco'] = "Codigo Banco";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codigo_banco = $this->codigo_banco;
   $sStyleHidden_codigo_banco = '';
   if (isset($this->nmgp_cmp_hidden['codigo_banco']) && $this->nmgp_cmp_hidden['codigo_banco'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codigo_banco']);
       $sStyleHidden_codigo_banco = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codigo_banco = 'display: none;';
   $sStyleReadInp_codigo_banco = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codigo_banco']) && $this->nmgp_cmp_readonly['codigo_banco'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codigo_banco']);
       $sStyleReadLab_codigo_banco = '';
       $sStyleReadInp_codigo_banco = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codigo_banco']) && $this->nmgp_cmp_hidden['codigo_banco'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codigo_banco" value="<?php echo $this->form_encode_input($codigo_banco) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codigo_banco_line" id="hidden_field_data_codigo_banco" style="<?php echo $sStyleHidden_codigo_banco; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codigo_banco_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codigo_banco_label" style=""><span id="id_label_codigo_banco"><?php echo $this->nm_new_label['codigo_banco']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codigo_banco"]) &&  $this->nmgp_cmp_readonly["codigo_banco"] == "on") { 

 ?>
<input type="hidden" name="codigo_banco" value="<?php echo $this->form_encode_input($codigo_banco) . "\">" . $codigo_banco . ""; ?>
<?php } else { ?>
<span id="id_read_on_codigo_banco" class="sc-ui-readonly-codigo_banco css_codigo_banco_line" style="<?php echo $sStyleReadLab_codigo_banco; ?>"><?php echo $this->form_format_readonly("codigo_banco", $this->form_encode_input($this->codigo_banco)); ?></span><span id="id_read_off_codigo_banco" class="css_read_off_codigo_banco<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codigo_banco; ?>">
 <input class="sc-js-input scFormObjectOdd css_codigo_banco_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codigo_banco" type=text name="codigo_banco" value="<?php echo $this->form_encode_input($codigo_banco) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codigo_banco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codigo_banco_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipo_cuenta_banco']))
    {
        $this->nm_new_label['tipo_cuenta_banco'] = "Tipo Cuenta Banco";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_cuenta_banco = $this->tipo_cuenta_banco;
   $sStyleHidden_tipo_cuenta_banco = '';
   if (isset($this->nmgp_cmp_hidden['tipo_cuenta_banco']) && $this->nmgp_cmp_hidden['tipo_cuenta_banco'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_cuenta_banco']);
       $sStyleHidden_tipo_cuenta_banco = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_cuenta_banco = 'display: none;';
   $sStyleReadInp_tipo_cuenta_banco = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_cuenta_banco']) && $this->nmgp_cmp_readonly['tipo_cuenta_banco'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_cuenta_banco']);
       $sStyleReadLab_tipo_cuenta_banco = '';
       $sStyleReadInp_tipo_cuenta_banco = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_cuenta_banco']) && $this->nmgp_cmp_hidden['tipo_cuenta_banco'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo_cuenta_banco" value="<?php echo $this->form_encode_input($tipo_cuenta_banco) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_cuenta_banco_line" id="hidden_field_data_tipo_cuenta_banco" style="<?php echo $sStyleHidden_tipo_cuenta_banco; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_cuenta_banco_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_cuenta_banco_label" style=""><span id="id_label_tipo_cuenta_banco"><?php echo $this->nm_new_label['tipo_cuenta_banco']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_cuenta_banco"]) &&  $this->nmgp_cmp_readonly["tipo_cuenta_banco"] == "on") { 

 ?>
<input type="hidden" name="tipo_cuenta_banco" value="<?php echo $this->form_encode_input($tipo_cuenta_banco) . "\">" . $tipo_cuenta_banco . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipo_cuenta_banco" class="sc-ui-readonly-tipo_cuenta_banco css_tipo_cuenta_banco_line" style="<?php echo $sStyleReadLab_tipo_cuenta_banco; ?>"><?php echo $this->form_format_readonly("tipo_cuenta_banco", $this->form_encode_input($this->tipo_cuenta_banco)); ?></span><span id="id_read_off_tipo_cuenta_banco" class="css_read_off_tipo_cuenta_banco<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipo_cuenta_banco; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipo_cuenta_banco_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_cuenta_banco" type=text name="tipo_cuenta_banco" value="<?php echo $this->form_encode_input($tipo_cuenta_banco) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_cuenta_banco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_cuenta_banco_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nro_cuenta_banco']))
    {
        $this->nm_new_label['nro_cuenta_banco'] = "Nro Cuenta Banco";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nro_cuenta_banco = $this->nro_cuenta_banco;
   $sStyleHidden_nro_cuenta_banco = '';
   if (isset($this->nmgp_cmp_hidden['nro_cuenta_banco']) && $this->nmgp_cmp_hidden['nro_cuenta_banco'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nro_cuenta_banco']);
       $sStyleHidden_nro_cuenta_banco = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nro_cuenta_banco = 'display: none;';
   $sStyleReadInp_nro_cuenta_banco = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nro_cuenta_banco']) && $this->nmgp_cmp_readonly['nro_cuenta_banco'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nro_cuenta_banco']);
       $sStyleReadLab_nro_cuenta_banco = '';
       $sStyleReadInp_nro_cuenta_banco = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nro_cuenta_banco']) && $this->nmgp_cmp_hidden['nro_cuenta_banco'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nro_cuenta_banco" value="<?php echo $this->form_encode_input($nro_cuenta_banco) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nro_cuenta_banco_line" id="hidden_field_data_nro_cuenta_banco" style="<?php echo $sStyleHidden_nro_cuenta_banco; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nro_cuenta_banco_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nro_cuenta_banco_label" style=""><span id="id_label_nro_cuenta_banco"><?php echo $this->nm_new_label['nro_cuenta_banco']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nro_cuenta_banco"]) &&  $this->nmgp_cmp_readonly["nro_cuenta_banco"] == "on") { 

 ?>
<input type="hidden" name="nro_cuenta_banco" value="<?php echo $this->form_encode_input($nro_cuenta_banco) . "\">" . $nro_cuenta_banco . ""; ?>
<?php } else { ?>
<span id="id_read_on_nro_cuenta_banco" class="sc-ui-readonly-nro_cuenta_banco css_nro_cuenta_banco_line" style="<?php echo $sStyleReadLab_nro_cuenta_banco; ?>"><?php echo $this->form_format_readonly("nro_cuenta_banco", $this->form_encode_input($this->nro_cuenta_banco)); ?></span><span id="id_read_off_nro_cuenta_banco" class="css_read_off_nro_cuenta_banco<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nro_cuenta_banco; ?>">
 <input class="sc-js-input scFormObjectOdd css_nro_cuenta_banco_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nro_cuenta_banco" type=text name="nro_cuenta_banco" value="<?php echo $this->form_encode_input($nro_cuenta_banco) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nro_cuenta_banco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nro_cuenta_banco_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pago_transferencia']))
    {
        $this->nm_new_label['pago_transferencia'] = "Pago Transferencia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pago_transferencia = $this->pago_transferencia;
   $sStyleHidden_pago_transferencia = '';
   if (isset($this->nmgp_cmp_hidden['pago_transferencia']) && $this->nmgp_cmp_hidden['pago_transferencia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pago_transferencia']);
       $sStyleHidden_pago_transferencia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pago_transferencia = 'display: none;';
   $sStyleReadInp_pago_transferencia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pago_transferencia']) && $this->nmgp_cmp_readonly['pago_transferencia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pago_transferencia']);
       $sStyleReadLab_pago_transferencia = '';
       $sStyleReadInp_pago_transferencia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pago_transferencia']) && $this->nmgp_cmp_hidden['pago_transferencia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pago_transferencia" value="<?php echo $this->form_encode_input($pago_transferencia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pago_transferencia_line" id="hidden_field_data_pago_transferencia" style="<?php echo $sStyleHidden_pago_transferencia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pago_transferencia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pago_transferencia_label" style=""><span id="id_label_pago_transferencia"><?php echo $this->nm_new_label['pago_transferencia']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['pago_transferencia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['php_cmp_required']['pago_transferencia'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pago_transferencia"]) &&  $this->nmgp_cmp_readonly["pago_transferencia"] == "on") { 

 ?>
<input type="hidden" name="pago_transferencia" value="<?php echo $this->form_encode_input($pago_transferencia) . "\">" . $pago_transferencia . ""; ?>
<?php } else { ?>
<span id="id_read_on_pago_transferencia" class="sc-ui-readonly-pago_transferencia css_pago_transferencia_line" style="<?php echo $sStyleReadLab_pago_transferencia; ?>"><?php echo $this->form_format_readonly("pago_transferencia", $this->form_encode_input($this->pago_transferencia)); ?></span><span id="id_read_off_pago_transferencia" class="css_read_off_pago_transferencia<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pago_transferencia; ?>">
 <input class="sc-js-input scFormObjectOdd css_pago_transferencia_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pago_transferencia" type=text name="pago_transferencia" value="<?php echo $this->form_encode_input($pago_transferencia) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pago_transferencia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pago_transferencia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['birpara'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['first'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['back'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['forward'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_maepag_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_maepag_mob");
 parent.scAjaxDetailHeight("form_maepag_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_maepag_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_maepag_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_maepag_mob']['buttonStatus'] = $this->nmgp_botoes;
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
