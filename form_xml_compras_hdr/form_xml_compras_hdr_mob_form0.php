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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " xml_compras_hdr"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " xml_compras_hdr"); } ?></TITLE>
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
.css_read_off_fechaemision button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fecharegistro button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_xml_compras_hdr/form_xml_compras_hdr_mob_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_xml_compras_hdr_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_xml_compras_hdr_mob_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_xml_compras_hdr']['error_buffer']) && '' != $_SESSION['scriptcase']['form_xml_compras_hdr']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_xml_compras_hdr']['error_buffer'];
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
 include_once("form_xml_compras_hdr_mob_js0.php");
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
               action="form_xml_compras_hdr_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['insert_validation']; ?>">
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
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_xml_compras_hdr_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_xml_compras_hdr_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<?php
$this->displayAppHeader();
?>
<tr><td>
<?php
$this->displayTopToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['insert'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['bcancelar'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['update'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['delete'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['claveacceso']))
           {
               $this->nmgp_cmp_readonly['claveacceso'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['ambiente']))
           {
               $this->nmgp_cmp_readonly['ambiente'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['claveacceso']))
    {
        $this->nm_new_label['claveacceso'] = "Clave Acceso";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $claveacceso = $this->claveacceso;
   $sStyleHidden_claveacceso = '';
   if (isset($this->nmgp_cmp_hidden['claveacceso']) && $this->nmgp_cmp_hidden['claveacceso'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['claveacceso']);
       $sStyleHidden_claveacceso = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_claveacceso = 'display: none;';
   $sStyleReadInp_claveacceso = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["claveacceso"]) &&  $this->nmgp_cmp_readonly["claveacceso"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['claveacceso']);
       $sStyleReadLab_claveacceso = '';
       $sStyleReadInp_claveacceso = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['claveacceso']) && $this->nmgp_cmp_hidden['claveacceso'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="claveacceso" value="<?php echo $this->form_encode_input($claveacceso) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_claveacceso_line" id="hidden_field_data_claveacceso" style="<?php echo $sStyleHidden_claveacceso; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_claveacceso_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_claveacceso_label" style=""><span id="id_label_claveacceso"><?php echo $this->nm_new_label['claveacceso']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['php_cmp_required']['claveacceso']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['php_cmp_required']['claveacceso'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["claveacceso"]) &&  $this->nmgp_cmp_readonly["claveacceso"] == "on")) { 

 ?>
<input type="hidden" name="claveacceso" value="<?php echo $this->form_encode_input($claveacceso) . "\"><span id=\"id_ajax_label_claveacceso\">" . $claveacceso . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_claveacceso" class="sc-ui-readonly-claveacceso css_claveacceso_line" style="<?php echo $sStyleReadLab_claveacceso; ?>"><?php echo $this->form_format_readonly("claveacceso", $this->form_encode_input($this->claveacceso)); ?></span><span id="id_read_off_claveacceso" class="css_read_off_claveacceso<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_claveacceso; ?>">
 <input class="sc-js-input scFormObjectOdd css_claveacceso_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_claveacceso" type=text name="claveacceso" value="<?php echo $this->form_encode_input($claveacceso) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_claveacceso_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_claveacceso_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['tipoemision']))
           {
               $this->nmgp_cmp_readonly['tipoemision'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['ambiente']))
    {
        $this->nm_new_label['ambiente'] = "Ambiente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ambiente = $this->ambiente;
   $sStyleHidden_ambiente = '';
   if (isset($this->nmgp_cmp_hidden['ambiente']) && $this->nmgp_cmp_hidden['ambiente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ambiente']);
       $sStyleHidden_ambiente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ambiente = 'display: none;';
   $sStyleReadInp_ambiente = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["ambiente"]) &&  $this->nmgp_cmp_readonly["ambiente"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ambiente']);
       $sStyleReadLab_ambiente = '';
       $sStyleReadInp_ambiente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ambiente']) && $this->nmgp_cmp_hidden['ambiente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ambiente" value="<?php echo $this->form_encode_input($ambiente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ambiente_line" id="hidden_field_data_ambiente" style="<?php echo $sStyleHidden_ambiente; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ambiente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ambiente_label" style=""><span id="id_label_ambiente"><?php echo $this->nm_new_label['ambiente']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["ambiente"]) &&  $this->nmgp_cmp_readonly["ambiente"] == "on")) { 

 ?>
<input type="hidden" name="ambiente" value="<?php echo $this->form_encode_input($ambiente) . "\"><span id=\"id_ajax_label_ambiente\">" . $ambiente . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_ambiente" class="sc-ui-readonly-ambiente css_ambiente_line" style="<?php echo $sStyleReadLab_ambiente; ?>"><?php echo $this->form_format_readonly("ambiente", $this->form_encode_input($this->ambiente)); ?></span><span id="id_read_off_ambiente" class="css_read_off_ambiente<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ambiente; ?>">
 <input class="sc-js-input scFormObjectOdd css_ambiente_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ambiente" type=text name="ambiente" value="<?php echo $this->form_encode_input($ambiente) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ambiente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ambiente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipoemision']))
    {
        $this->nm_new_label['tipoemision'] = "Tipo Emision";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipoemision = $this->tipoemision;
   $sStyleHidden_tipoemision = '';
   if (isset($this->nmgp_cmp_hidden['tipoemision']) && $this->nmgp_cmp_hidden['tipoemision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipoemision']);
       $sStyleHidden_tipoemision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipoemision = 'display: none;';
   $sStyleReadInp_tipoemision = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["tipoemision"]) &&  $this->nmgp_cmp_readonly["tipoemision"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipoemision']);
       $sStyleReadLab_tipoemision = '';
       $sStyleReadInp_tipoemision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipoemision']) && $this->nmgp_cmp_hidden['tipoemision'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipoemision" value="<?php echo $this->form_encode_input($tipoemision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipoemision_line" id="hidden_field_data_tipoemision" style="<?php echo $sStyleHidden_tipoemision; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipoemision_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipoemision_label" style=""><span id="id_label_tipoemision"><?php echo $this->nm_new_label['tipoemision']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["tipoemision"]) &&  $this->nmgp_cmp_readonly["tipoemision"] == "on")) { 

 ?>
<input type="hidden" name="tipoemision" value="<?php echo $this->form_encode_input($tipoemision) . "\"><span id=\"id_ajax_label_tipoemision\">" . $tipoemision . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_tipoemision" class="sc-ui-readonly-tipoemision css_tipoemision_line" style="<?php echo $sStyleReadLab_tipoemision; ?>"><?php echo $this->form_format_readonly("tipoemision", $this->form_encode_input($this->tipoemision)); ?></span><span id="id_read_off_tipoemision" class="css_read_off_tipoemision<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipoemision; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipoemision_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipoemision" type=text name="tipoemision" value="<?php echo $this->form_encode_input($tipoemision) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipoemision_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipoemision_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['razonsocial']))
    {
        $this->nm_new_label['razonsocial'] = "Razon Social";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $razonsocial = $this->razonsocial;
   $sStyleHidden_razonsocial = '';
   if (isset($this->nmgp_cmp_hidden['razonsocial']) && $this->nmgp_cmp_hidden['razonsocial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['razonsocial']);
       $sStyleHidden_razonsocial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_razonsocial = 'display: none;';
   $sStyleReadInp_razonsocial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['razonsocial']) && $this->nmgp_cmp_readonly['razonsocial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['razonsocial']);
       $sStyleReadLab_razonsocial = '';
       $sStyleReadInp_razonsocial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['razonsocial']) && $this->nmgp_cmp_hidden['razonsocial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razonsocial" value="<?php echo $this->form_encode_input($razonsocial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_razonsocial_line" id="hidden_field_data_razonsocial" style="<?php echo $sStyleHidden_razonsocial; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_razonsocial_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_razonsocial_label" style=""><span id="id_label_razonsocial"><?php echo $this->nm_new_label['razonsocial']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razonsocial"]) &&  $this->nmgp_cmp_readonly["razonsocial"] == "on") { 

 ?>
<input type="hidden" name="razonsocial" value="<?php echo $this->form_encode_input($razonsocial) . "\">" . $razonsocial . ""; ?>
<?php } else { ?>
<span id="id_read_on_razonsocial" class="sc-ui-readonly-razonsocial css_razonsocial_line" style="<?php echo $sStyleReadLab_razonsocial; ?>"><?php echo $this->form_format_readonly("razonsocial", $this->form_encode_input($this->razonsocial)); ?></span><span id="id_read_off_razonsocial" class="css_read_off_razonsocial<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_razonsocial; ?>">
 <input class="sc-js-input scFormObjectOdd css_razonsocial_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_razonsocial" type=text name="razonsocial" value="<?php echo $this->form_encode_input($razonsocial) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razonsocial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razonsocial_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['ruc']))
           {
               $this->nmgp_cmp_readonly['ruc'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['nombrecomercial']))
    {
        $this->nm_new_label['nombrecomercial'] = "Nombre Comercial";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nombrecomercial = $this->nombrecomercial;
   $sStyleHidden_nombrecomercial = '';
   if (isset($this->nmgp_cmp_hidden['nombrecomercial']) && $this->nmgp_cmp_hidden['nombrecomercial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nombrecomercial']);
       $sStyleHidden_nombrecomercial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nombrecomercial = 'display: none;';
   $sStyleReadInp_nombrecomercial = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nombrecomercial']) && $this->nmgp_cmp_readonly['nombrecomercial'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nombrecomercial']);
       $sStyleReadLab_nombrecomercial = '';
       $sStyleReadInp_nombrecomercial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nombrecomercial']) && $this->nmgp_cmp_hidden['nombrecomercial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombrecomercial" value="<?php echo $this->form_encode_input($nombrecomercial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nombrecomercial_line" id="hidden_field_data_nombrecomercial" style="<?php echo $sStyleHidden_nombrecomercial; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nombrecomercial_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nombrecomercial_label" style=""><span id="id_label_nombrecomercial"><?php echo $this->nm_new_label['nombrecomercial']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombrecomercial"]) &&  $this->nmgp_cmp_readonly["nombrecomercial"] == "on") { 

 ?>
<input type="hidden" name="nombrecomercial" value="<?php echo $this->form_encode_input($nombrecomercial) . "\">" . $nombrecomercial . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombrecomercial" class="sc-ui-readonly-nombrecomercial css_nombrecomercial_line" style="<?php echo $sStyleReadLab_nombrecomercial; ?>"><?php echo $this->form_format_readonly("nombrecomercial", $this->form_encode_input($this->nombrecomercial)); ?></span><span id="id_read_off_nombrecomercial" class="css_read_off_nombrecomercial<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombrecomercial; ?>">
 <input class="sc-js-input scFormObjectOdd css_nombrecomercial_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombrecomercial" type=text name="nombrecomercial" value="<?php echo $this->form_encode_input($nombrecomercial) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombrecomercial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombrecomercial_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['coddoc']))
           {
               $this->nmgp_cmp_readonly['coddoc'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['ruc']))
    {
        $this->nm_new_label['ruc'] = "Ruc";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ruc = $this->ruc;
   $sStyleHidden_ruc = '';
   if (isset($this->nmgp_cmp_hidden['ruc']) && $this->nmgp_cmp_hidden['ruc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ruc']);
       $sStyleHidden_ruc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ruc = 'display: none;';
   $sStyleReadInp_ruc = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["ruc"]) &&  $this->nmgp_cmp_readonly["ruc"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ruc']);
       $sStyleReadLab_ruc = '';
       $sStyleReadInp_ruc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ruc']) && $this->nmgp_cmp_hidden['ruc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ruc" value="<?php echo $this->form_encode_input($ruc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ruc_line" id="hidden_field_data_ruc" style="<?php echo $sStyleHidden_ruc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ruc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ruc_label" style=""><span id="id_label_ruc"><?php echo $this->nm_new_label['ruc']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["ruc"]) &&  $this->nmgp_cmp_readonly["ruc"] == "on")) { 

 ?>
<input type="hidden" name="ruc" value="<?php echo $this->form_encode_input($ruc) . "\"><span id=\"id_ajax_label_ruc\">" . $ruc . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_ruc" class="sc-ui-readonly-ruc css_ruc_line" style="<?php echo $sStyleReadLab_ruc; ?>"><?php echo $this->form_format_readonly("ruc", $this->form_encode_input($this->ruc)); ?></span><span id="id_read_off_ruc" class="css_read_off_ruc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ruc; ?>">
 <input class="sc-js-input scFormObjectOdd css_ruc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ruc" type=text name="ruc" value="<?php echo $this->form_encode_input($ruc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ruc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ruc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['estab']))
           {
               $this->nmgp_cmp_readonly['estab'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['coddoc']))
    {
        $this->nm_new_label['coddoc'] = "Cod Doc";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $coddoc = $this->coddoc;
   $sStyleHidden_coddoc = '';
   if (isset($this->nmgp_cmp_hidden['coddoc']) && $this->nmgp_cmp_hidden['coddoc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['coddoc']);
       $sStyleHidden_coddoc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_coddoc = 'display: none;';
   $sStyleReadInp_coddoc = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["coddoc"]) &&  $this->nmgp_cmp_readonly["coddoc"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['coddoc']);
       $sStyleReadLab_coddoc = '';
       $sStyleReadInp_coddoc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['coddoc']) && $this->nmgp_cmp_hidden['coddoc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="coddoc" value="<?php echo $this->form_encode_input($coddoc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_coddoc_line" id="hidden_field_data_coddoc" style="<?php echo $sStyleHidden_coddoc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_coddoc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_coddoc_label" style=""><span id="id_label_coddoc"><?php echo $this->nm_new_label['coddoc']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["coddoc"]) &&  $this->nmgp_cmp_readonly["coddoc"] == "on")) { 

 ?>
<input type="hidden" name="coddoc" value="<?php echo $this->form_encode_input($coddoc) . "\"><span id=\"id_ajax_label_coddoc\">" . $coddoc . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_coddoc" class="sc-ui-readonly-coddoc css_coddoc_line" style="<?php echo $sStyleReadLab_coddoc; ?>"><?php echo $this->form_format_readonly("coddoc", $this->form_encode_input($this->coddoc)); ?></span><span id="id_read_off_coddoc" class="css_read_off_coddoc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_coddoc; ?>">
 <input class="sc-js-input scFormObjectOdd css_coddoc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_coddoc" type=text name="coddoc" value="<?php echo $this->form_encode_input($coddoc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_coddoc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_coddoc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['ptoemi']))
           {
               $this->nmgp_cmp_readonly['ptoemi'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['estab']))
    {
        $this->nm_new_label['estab'] = "Estab";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estab = $this->estab;
   $sStyleHidden_estab = '';
   if (isset($this->nmgp_cmp_hidden['estab']) && $this->nmgp_cmp_hidden['estab'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estab']);
       $sStyleHidden_estab = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estab = 'display: none;';
   $sStyleReadInp_estab = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["estab"]) &&  $this->nmgp_cmp_readonly["estab"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estab']);
       $sStyleReadLab_estab = '';
       $sStyleReadInp_estab = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estab']) && $this->nmgp_cmp_hidden['estab'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estab" value="<?php echo $this->form_encode_input($estab) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estab_line" id="hidden_field_data_estab" style="<?php echo $sStyleHidden_estab; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estab_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estab_label" style=""><span id="id_label_estab"><?php echo $this->nm_new_label['estab']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["estab"]) &&  $this->nmgp_cmp_readonly["estab"] == "on")) { 

 ?>
<input type="hidden" name="estab" value="<?php echo $this->form_encode_input($estab) . "\"><span id=\"id_ajax_label_estab\">" . $estab . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_estab" class="sc-ui-readonly-estab css_estab_line" style="<?php echo $sStyleReadLab_estab; ?>"><?php echo $this->form_format_readonly("estab", $this->form_encode_input($this->estab)); ?></span><span id="id_read_off_estab" class="css_read_off_estab<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estab; ?>">
 <input class="sc-js-input scFormObjectOdd css_estab_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estab" type=text name="estab" value="<?php echo $this->form_encode_input($estab) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estab_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estab_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['secuencial']))
           {
               $this->nmgp_cmp_readonly['secuencial'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['ptoemi']))
    {
        $this->nm_new_label['ptoemi'] = "Pto Emi";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ptoemi = $this->ptoemi;
   $sStyleHidden_ptoemi = '';
   if (isset($this->nmgp_cmp_hidden['ptoemi']) && $this->nmgp_cmp_hidden['ptoemi'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ptoemi']);
       $sStyleHidden_ptoemi = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ptoemi = 'display: none;';
   $sStyleReadInp_ptoemi = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["ptoemi"]) &&  $this->nmgp_cmp_readonly["ptoemi"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ptoemi']);
       $sStyleReadLab_ptoemi = '';
       $sStyleReadInp_ptoemi = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ptoemi']) && $this->nmgp_cmp_hidden['ptoemi'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ptoemi" value="<?php echo $this->form_encode_input($ptoemi) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ptoemi_line" id="hidden_field_data_ptoemi" style="<?php echo $sStyleHidden_ptoemi; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ptoemi_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ptoemi_label" style=""><span id="id_label_ptoemi"><?php echo $this->nm_new_label['ptoemi']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["ptoemi"]) &&  $this->nmgp_cmp_readonly["ptoemi"] == "on")) { 

 ?>
<input type="hidden" name="ptoemi" value="<?php echo $this->form_encode_input($ptoemi) . "\"><span id=\"id_ajax_label_ptoemi\">" . $ptoemi . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_ptoemi" class="sc-ui-readonly-ptoemi css_ptoemi_line" style="<?php echo $sStyleReadLab_ptoemi; ?>"><?php echo $this->form_format_readonly("ptoemi", $this->form_encode_input($this->ptoemi)); ?></span><span id="id_read_off_ptoemi" class="css_read_off_ptoemi<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ptoemi; ?>">
 <input class="sc-js-input scFormObjectOdd css_ptoemi_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ptoemi" type=text name="ptoemi" value="<?php echo $this->form_encode_input($ptoemi) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ptoemi_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ptoemi_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['secuencial']))
    {
        $this->nm_new_label['secuencial'] = "Secuencial";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $secuencial = $this->secuencial;
   $sStyleHidden_secuencial = '';
   if (isset($this->nmgp_cmp_hidden['secuencial']) && $this->nmgp_cmp_hidden['secuencial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['secuencial']);
       $sStyleHidden_secuencial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_secuencial = 'display: none;';
   $sStyleReadInp_secuencial = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["secuencial"]) &&  $this->nmgp_cmp_readonly["secuencial"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['secuencial']);
       $sStyleReadLab_secuencial = '';
       $sStyleReadInp_secuencial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['secuencial']) && $this->nmgp_cmp_hidden['secuencial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="secuencial" value="<?php echo $this->form_encode_input($secuencial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_secuencial_line" id="hidden_field_data_secuencial" style="<?php echo $sStyleHidden_secuencial; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_secuencial_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_secuencial_label" style=""><span id="id_label_secuencial"><?php echo $this->nm_new_label['secuencial']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["secuencial"]) &&  $this->nmgp_cmp_readonly["secuencial"] == "on")) { 

 ?>
<input type="hidden" name="secuencial" value="<?php echo $this->form_encode_input($secuencial) . "\"><span id=\"id_ajax_label_secuencial\">" . $secuencial . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_secuencial" class="sc-ui-readonly-secuencial css_secuencial_line" style="<?php echo $sStyleReadLab_secuencial; ?>"><?php echo $this->form_format_readonly("secuencial", $this->form_encode_input($this->secuencial)); ?></span><span id="id_read_off_secuencial" class="css_read_off_secuencial<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_secuencial; ?>">
 <input class="sc-js-input scFormObjectOdd css_secuencial_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_secuencial" type=text name="secuencial" value="<?php echo $this->form_encode_input($secuencial) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_secuencial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_secuencial_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dirmatriz']))
    {
        $this->nm_new_label['dirmatriz'] = "Dir Matriz";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dirmatriz = $this->dirmatriz;
   $sStyleHidden_dirmatriz = '';
   if (isset($this->nmgp_cmp_hidden['dirmatriz']) && $this->nmgp_cmp_hidden['dirmatriz'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dirmatriz']);
       $sStyleHidden_dirmatriz = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dirmatriz = 'display: none;';
   $sStyleReadInp_dirmatriz = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dirmatriz']) && $this->nmgp_cmp_readonly['dirmatriz'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dirmatriz']);
       $sStyleReadLab_dirmatriz = '';
       $sStyleReadInp_dirmatriz = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dirmatriz']) && $this->nmgp_cmp_hidden['dirmatriz'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dirmatriz" value="<?php echo $this->form_encode_input($dirmatriz) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dirmatriz_line" id="hidden_field_data_dirmatriz" style="<?php echo $sStyleHidden_dirmatriz; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dirmatriz_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dirmatriz_label" style=""><span id="id_label_dirmatriz"><?php echo $this->nm_new_label['dirmatriz']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dirmatriz"]) &&  $this->nmgp_cmp_readonly["dirmatriz"] == "on") { 

 ?>
<input type="hidden" name="dirmatriz" value="<?php echo $this->form_encode_input($dirmatriz) . "\">" . $dirmatriz . ""; ?>
<?php } else { ?>
<span id="id_read_on_dirmatriz" class="sc-ui-readonly-dirmatriz css_dirmatriz_line" style="<?php echo $sStyleReadLab_dirmatriz; ?>"><?php echo $this->form_format_readonly("dirmatriz", $this->form_encode_input($this->dirmatriz)); ?></span><span id="id_read_off_dirmatriz" class="css_read_off_dirmatriz<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dirmatriz; ?>">
 <input class="sc-js-input scFormObjectOdd css_dirmatriz_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dirmatriz" type=text name="dirmatriz" value="<?php echo $this->form_encode_input($dirmatriz) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dirmatriz_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dirmatriz_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechaemision']))
    {
        $this->nm_new_label['fechaemision'] = "Fecha Emision";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fechaemision = $this->fechaemision;
   $sStyleHidden_fechaemision = '';
   if (isset($this->nmgp_cmp_hidden['fechaemision']) && $this->nmgp_cmp_hidden['fechaemision'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechaemision']);
       $sStyleHidden_fechaemision = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechaemision = 'display: none;';
   $sStyleReadInp_fechaemision = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechaemision']) && $this->nmgp_cmp_readonly['fechaemision'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechaemision']);
       $sStyleReadLab_fechaemision = '';
       $sStyleReadInp_fechaemision = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechaemision']) && $this->nmgp_cmp_hidden['fechaemision'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechaemision" value="<?php echo $this->form_encode_input($fechaemision) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fechaemision_line" id="hidden_field_data_fechaemision" style="<?php echo $sStyleHidden_fechaemision; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechaemision_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechaemision_label" style=""><span id="id_label_fechaemision"><?php echo $this->nm_new_label['fechaemision']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechaemision"]) &&  $this->nmgp_cmp_readonly["fechaemision"] == "on") { 

 ?>
<input type="hidden" name="fechaemision" value="<?php echo $this->form_encode_input($fechaemision) . "\">" . $fechaemision . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechaemision" class="sc-ui-readonly-fechaemision css_fechaemision_line" style="<?php echo $sStyleReadLab_fechaemision; ?>"><?php echo $this->form_format_readonly("fechaemision", $this->form_encode_input($fechaemision)); ?></span><span id="id_read_off_fechaemision" class="css_read_off_fechaemision<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechaemision; ?>"><?php
$tmp_form_data = $this->field_config['fechaemision']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fechaemision_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechaemision" type=text name="fechaemision" value="<?php echo $this->form_encode_input($fechaemision) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['fechaemision']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechaemision']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechaemision_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechaemision_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipoidentificacioncomprador']))
    {
        $this->nm_new_label['tipoidentificacioncomprador'] = "Tipo Identificacion Comprador";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipoidentificacioncomprador = $this->tipoidentificacioncomprador;
   $sStyleHidden_tipoidentificacioncomprador = '';
   if (isset($this->nmgp_cmp_hidden['tipoidentificacioncomprador']) && $this->nmgp_cmp_hidden['tipoidentificacioncomprador'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipoidentificacioncomprador']);
       $sStyleHidden_tipoidentificacioncomprador = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipoidentificacioncomprador = 'display: none;';
   $sStyleReadInp_tipoidentificacioncomprador = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipoidentificacioncomprador']) && $this->nmgp_cmp_readonly['tipoidentificacioncomprador'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipoidentificacioncomprador']);
       $sStyleReadLab_tipoidentificacioncomprador = '';
       $sStyleReadInp_tipoidentificacioncomprador = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipoidentificacioncomprador']) && $this->nmgp_cmp_hidden['tipoidentificacioncomprador'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipoidentificacioncomprador" value="<?php echo $this->form_encode_input($tipoidentificacioncomprador) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipoidentificacioncomprador_line" id="hidden_field_data_tipoidentificacioncomprador" style="<?php echo $sStyleHidden_tipoidentificacioncomprador; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipoidentificacioncomprador_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipoidentificacioncomprador_label" style=""><span id="id_label_tipoidentificacioncomprador"><?php echo $this->nm_new_label['tipoidentificacioncomprador']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipoidentificacioncomprador"]) &&  $this->nmgp_cmp_readonly["tipoidentificacioncomprador"] == "on") { 

 ?>
<input type="hidden" name="tipoidentificacioncomprador" value="<?php echo $this->form_encode_input($tipoidentificacioncomprador) . "\">" . $tipoidentificacioncomprador . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipoidentificacioncomprador" class="sc-ui-readonly-tipoidentificacioncomprador css_tipoidentificacioncomprador_line" style="<?php echo $sStyleReadLab_tipoidentificacioncomprador; ?>"><?php echo $this->form_format_readonly("tipoidentificacioncomprador", $this->form_encode_input($this->tipoidentificacioncomprador)); ?></span><span id="id_read_off_tipoidentificacioncomprador" class="css_read_off_tipoidentificacioncomprador<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipoidentificacioncomprador; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipoidentificacioncomprador_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipoidentificacioncomprador" type=text name="tipoidentificacioncomprador" value="<?php echo $this->form_encode_input($tipoidentificacioncomprador) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipoidentificacioncomprador_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipoidentificacioncomprador_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['razonsocialcomprador']))
    {
        $this->nm_new_label['razonsocialcomprador'] = "Razon Social Comprador";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $razonsocialcomprador = $this->razonsocialcomprador;
   $sStyleHidden_razonsocialcomprador = '';
   if (isset($this->nmgp_cmp_hidden['razonsocialcomprador']) && $this->nmgp_cmp_hidden['razonsocialcomprador'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['razonsocialcomprador']);
       $sStyleHidden_razonsocialcomprador = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_razonsocialcomprador = 'display: none;';
   $sStyleReadInp_razonsocialcomprador = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['razonsocialcomprador']) && $this->nmgp_cmp_readonly['razonsocialcomprador'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['razonsocialcomprador']);
       $sStyleReadLab_razonsocialcomprador = '';
       $sStyleReadInp_razonsocialcomprador = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['razonsocialcomprador']) && $this->nmgp_cmp_hidden['razonsocialcomprador'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razonsocialcomprador" value="<?php echo $this->form_encode_input($razonsocialcomprador) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_razonsocialcomprador_line" id="hidden_field_data_razonsocialcomprador" style="<?php echo $sStyleHidden_razonsocialcomprador; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_razonsocialcomprador_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_razonsocialcomprador_label" style=""><span id="id_label_razonsocialcomprador"><?php echo $this->nm_new_label['razonsocialcomprador']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razonsocialcomprador"]) &&  $this->nmgp_cmp_readonly["razonsocialcomprador"] == "on") { 

 ?>
<input type="hidden" name="razonsocialcomprador" value="<?php echo $this->form_encode_input($razonsocialcomprador) . "\">" . $razonsocialcomprador . ""; ?>
<?php } else { ?>
<span id="id_read_on_razonsocialcomprador" class="sc-ui-readonly-razonsocialcomprador css_razonsocialcomprador_line" style="<?php echo $sStyleReadLab_razonsocialcomprador; ?>"><?php echo $this->form_format_readonly("razonsocialcomprador", $this->form_encode_input($this->razonsocialcomprador)); ?></span><span id="id_read_off_razonsocialcomprador" class="css_read_off_razonsocialcomprador<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_razonsocialcomprador; ?>">
 <input class="sc-js-input scFormObjectOdd css_razonsocialcomprador_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_razonsocialcomprador" type=text name="razonsocialcomprador" value="<?php echo $this->form_encode_input($razonsocialcomprador) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razonsocialcomprador_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razonsocialcomprador_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['totalsinimpuestos']))
           {
               $this->nmgp_cmp_readonly['totalsinimpuestos'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['identificacioncomprador']))
    {
        $this->nm_new_label['identificacioncomprador'] = "Identificacion Comprador";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $identificacioncomprador = $this->identificacioncomprador;
   $sStyleHidden_identificacioncomprador = '';
   if (isset($this->nmgp_cmp_hidden['identificacioncomprador']) && $this->nmgp_cmp_hidden['identificacioncomprador'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['identificacioncomprador']);
       $sStyleHidden_identificacioncomprador = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_identificacioncomprador = 'display: none;';
   $sStyleReadInp_identificacioncomprador = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['identificacioncomprador']) && $this->nmgp_cmp_readonly['identificacioncomprador'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['identificacioncomprador']);
       $sStyleReadLab_identificacioncomprador = '';
       $sStyleReadInp_identificacioncomprador = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['identificacioncomprador']) && $this->nmgp_cmp_hidden['identificacioncomprador'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="identificacioncomprador" value="<?php echo $this->form_encode_input($identificacioncomprador) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_identificacioncomprador_line" id="hidden_field_data_identificacioncomprador" style="<?php echo $sStyleHidden_identificacioncomprador; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_identificacioncomprador_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_identificacioncomprador_label" style=""><span id="id_label_identificacioncomprador"><?php echo $this->nm_new_label['identificacioncomprador']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["identificacioncomprador"]) &&  $this->nmgp_cmp_readonly["identificacioncomprador"] == "on") { 

 ?>
<input type="hidden" name="identificacioncomprador" value="<?php echo $this->form_encode_input($identificacioncomprador) . "\">" . $identificacioncomprador . ""; ?>
<?php } else { ?>
<span id="id_read_on_identificacioncomprador" class="sc-ui-readonly-identificacioncomprador css_identificacioncomprador_line" style="<?php echo $sStyleReadLab_identificacioncomprador; ?>"><?php echo $this->form_format_readonly("identificacioncomprador", $this->form_encode_input($this->identificacioncomprador)); ?></span><span id="id_read_off_identificacioncomprador" class="css_read_off_identificacioncomprador<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_identificacioncomprador; ?>">
 <input class="sc-js-input scFormObjectOdd css_identificacioncomprador_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_identificacioncomprador" type=text name="identificacioncomprador" value="<?php echo $this->form_encode_input($identificacioncomprador) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_identificacioncomprador_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_identificacioncomprador_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['totaldescuento']))
           {
               $this->nmgp_cmp_readonly['totaldescuento'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['totalsinimpuestos']))
    {
        $this->nm_new_label['totalsinimpuestos'] = "Total Sin Impuestos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totalsinimpuestos = $this->totalsinimpuestos;
   $sStyleHidden_totalsinimpuestos = '';
   if (isset($this->nmgp_cmp_hidden['totalsinimpuestos']) && $this->nmgp_cmp_hidden['totalsinimpuestos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totalsinimpuestos']);
       $sStyleHidden_totalsinimpuestos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totalsinimpuestos = 'display: none;';
   $sStyleReadInp_totalsinimpuestos = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["totalsinimpuestos"]) &&  $this->nmgp_cmp_readonly["totalsinimpuestos"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totalsinimpuestos']);
       $sStyleReadLab_totalsinimpuestos = '';
       $sStyleReadInp_totalsinimpuestos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totalsinimpuestos']) && $this->nmgp_cmp_hidden['totalsinimpuestos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totalsinimpuestos" value="<?php echo $this->form_encode_input($totalsinimpuestos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_totalsinimpuestos_line" id="hidden_field_data_totalsinimpuestos" style="<?php echo $sStyleHidden_totalsinimpuestos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totalsinimpuestos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_totalsinimpuestos_label" style=""><span id="id_label_totalsinimpuestos"><?php echo $this->nm_new_label['totalsinimpuestos']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["totalsinimpuestos"]) &&  $this->nmgp_cmp_readonly["totalsinimpuestos"] == "on")) { 

 ?>
<input type="hidden" name="totalsinimpuestos" value="<?php echo $this->form_encode_input($totalsinimpuestos) . "\"><span id=\"id_ajax_label_totalsinimpuestos\">" . $totalsinimpuestos . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_totalsinimpuestos" class="sc-ui-readonly-totalsinimpuestos css_totalsinimpuestos_line" style="<?php echo $sStyleReadLab_totalsinimpuestos; ?>"><?php echo $this->form_format_readonly("totalsinimpuestos", $this->form_encode_input($this->totalsinimpuestos)); ?></span><span id="id_read_off_totalsinimpuestos" class="css_read_off_totalsinimpuestos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_totalsinimpuestos; ?>">
 <input class="sc-js-input scFormObjectOdd css_totalsinimpuestos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_totalsinimpuestos" type=text name="totalsinimpuestos" value="<?php echo $this->form_encode_input($totalsinimpuestos) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 3, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['totalsinimpuestos']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totalsinimpuestos']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totalsinimpuestos']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totalsinimpuestos']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totalsinimpuestos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totalsinimpuestos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['totalconimpuestos']))
           {
               $this->nmgp_cmp_readonly['totalconimpuestos'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['totaldescuento']))
    {
        $this->nm_new_label['totaldescuento'] = "Total Descuento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totaldescuento = $this->totaldescuento;
   $sStyleHidden_totaldescuento = '';
   if (isset($this->nmgp_cmp_hidden['totaldescuento']) && $this->nmgp_cmp_hidden['totaldescuento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totaldescuento']);
       $sStyleHidden_totaldescuento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totaldescuento = 'display: none;';
   $sStyleReadInp_totaldescuento = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["totaldescuento"]) &&  $this->nmgp_cmp_readonly["totaldescuento"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totaldescuento']);
       $sStyleReadLab_totaldescuento = '';
       $sStyleReadInp_totaldescuento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totaldescuento']) && $this->nmgp_cmp_hidden['totaldescuento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totaldescuento" value="<?php echo $this->form_encode_input($totaldescuento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_totaldescuento_line" id="hidden_field_data_totaldescuento" style="<?php echo $sStyleHidden_totaldescuento; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totaldescuento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_totaldescuento_label" style=""><span id="id_label_totaldescuento"><?php echo $this->nm_new_label['totaldescuento']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["totaldescuento"]) &&  $this->nmgp_cmp_readonly["totaldescuento"] == "on")) { 

 ?>
<input type="hidden" name="totaldescuento" value="<?php echo $this->form_encode_input($totaldescuento) . "\"><span id=\"id_ajax_label_totaldescuento\">" . $totaldescuento . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_totaldescuento" class="sc-ui-readonly-totaldescuento css_totaldescuento_line" style="<?php echo $sStyleReadLab_totaldescuento; ?>"><?php echo $this->form_format_readonly("totaldescuento", $this->form_encode_input($this->totaldescuento)); ?></span><span id="id_read_off_totaldescuento" class="css_read_off_totaldescuento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_totaldescuento; ?>">
 <input class="sc-js-input scFormObjectOdd css_totaldescuento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_totaldescuento" type=text name="totaldescuento" value="<?php echo $this->form_encode_input($totaldescuento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 3, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['totaldescuento']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totaldescuento']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totaldescuento']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totaldescuento']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totaldescuento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totaldescuento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['propina']))
           {
               $this->nmgp_cmp_readonly['propina'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['totalconimpuestos']))
    {
        $this->nm_new_label['totalconimpuestos'] = "Total Con Impuestos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $totalconimpuestos = $this->totalconimpuestos;
   $sStyleHidden_totalconimpuestos = '';
   if (isset($this->nmgp_cmp_hidden['totalconimpuestos']) && $this->nmgp_cmp_hidden['totalconimpuestos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['totalconimpuestos']);
       $sStyleHidden_totalconimpuestos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_totalconimpuestos = 'display: none;';
   $sStyleReadInp_totalconimpuestos = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["totalconimpuestos"]) &&  $this->nmgp_cmp_readonly["totalconimpuestos"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['totalconimpuestos']);
       $sStyleReadLab_totalconimpuestos = '';
       $sStyleReadInp_totalconimpuestos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['totalconimpuestos']) && $this->nmgp_cmp_hidden['totalconimpuestos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="totalconimpuestos" value="<?php echo $this->form_encode_input($totalconimpuestos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_totalconimpuestos_line" id="hidden_field_data_totalconimpuestos" style="<?php echo $sStyleHidden_totalconimpuestos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_totalconimpuestos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_totalconimpuestos_label" style=""><span id="id_label_totalconimpuestos"><?php echo $this->nm_new_label['totalconimpuestos']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["totalconimpuestos"]) &&  $this->nmgp_cmp_readonly["totalconimpuestos"] == "on")) { 

 ?>
<input type="hidden" name="totalconimpuestos" value="<?php echo $this->form_encode_input($totalconimpuestos) . "\"><span id=\"id_ajax_label_totalconimpuestos\">" . $totalconimpuestos . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_totalconimpuestos" class="sc-ui-readonly-totalconimpuestos css_totalconimpuestos_line" style="<?php echo $sStyleReadLab_totalconimpuestos; ?>"><?php echo $this->form_format_readonly("totalconimpuestos", $this->form_encode_input($this->totalconimpuestos)); ?></span><span id="id_read_off_totalconimpuestos" class="css_read_off_totalconimpuestos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_totalconimpuestos; ?>">
 <input class="sc-js-input scFormObjectOdd css_totalconimpuestos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_totalconimpuestos" type=text name="totalconimpuestos" value="<?php echo $this->form_encode_input($totalconimpuestos) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 3, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['totalconimpuestos']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['totalconimpuestos']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['totalconimpuestos']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['totalconimpuestos']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_totalconimpuestos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_totalconimpuestos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['importetotal']))
           {
               $this->nmgp_cmp_readonly['importetotal'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['propina']))
    {
        $this->nm_new_label['propina'] = "Propina";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $propina = $this->propina;
   $sStyleHidden_propina = '';
   if (isset($this->nmgp_cmp_hidden['propina']) && $this->nmgp_cmp_hidden['propina'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['propina']);
       $sStyleHidden_propina = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_propina = 'display: none;';
   $sStyleReadInp_propina = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["propina"]) &&  $this->nmgp_cmp_readonly["propina"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['propina']);
       $sStyleReadLab_propina = '';
       $sStyleReadInp_propina = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['propina']) && $this->nmgp_cmp_hidden['propina'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="propina" value="<?php echo $this->form_encode_input($propina) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_propina_line" id="hidden_field_data_propina" style="<?php echo $sStyleHidden_propina; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_propina_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_propina_label" style=""><span id="id_label_propina"><?php echo $this->nm_new_label['propina']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["propina"]) &&  $this->nmgp_cmp_readonly["propina"] == "on")) { 

 ?>
<input type="hidden" name="propina" value="<?php echo $this->form_encode_input($propina) . "\"><span id=\"id_ajax_label_propina\">" . $propina . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_propina" class="sc-ui-readonly-propina css_propina_line" style="<?php echo $sStyleReadLab_propina; ?>"><?php echo $this->form_format_readonly("propina", $this->form_encode_input($this->propina)); ?></span><span id="id_read_off_propina" class="css_read_off_propina<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_propina; ?>">
 <input class="sc-js-input scFormObjectOdd css_propina_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_propina" type=text name="propina" value="<?php echo $this->form_encode_input($propina) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 3, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['propina']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['propina']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['propina']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['propina']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_propina_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_propina_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['importetotal']))
    {
        $this->nm_new_label['importetotal'] = "Importe Total";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $importetotal = $this->importetotal;
   $sStyleHidden_importetotal = '';
   if (isset($this->nmgp_cmp_hidden['importetotal']) && $this->nmgp_cmp_hidden['importetotal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['importetotal']);
       $sStyleHidden_importetotal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_importetotal = 'display: none;';
   $sStyleReadInp_importetotal = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["importetotal"]) &&  $this->nmgp_cmp_readonly["importetotal"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['importetotal']);
       $sStyleReadLab_importetotal = '';
       $sStyleReadInp_importetotal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['importetotal']) && $this->nmgp_cmp_hidden['importetotal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="importetotal" value="<?php echo $this->form_encode_input($importetotal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_importetotal_line" id="hidden_field_data_importetotal" style="<?php echo $sStyleHidden_importetotal; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_importetotal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_importetotal_label" style=""><span id="id_label_importetotal"><?php echo $this->nm_new_label['importetotal']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["importetotal"]) &&  $this->nmgp_cmp_readonly["importetotal"] == "on")) { 

 ?>
<input type="hidden" name="importetotal" value="<?php echo $this->form_encode_input($importetotal) . "\"><span id=\"id_ajax_label_importetotal\">" . $importetotal . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_importetotal" class="sc-ui-readonly-importetotal css_importetotal_line" style="<?php echo $sStyleReadLab_importetotal; ?>"><?php echo $this->form_format_readonly("importetotal", $this->form_encode_input($this->importetotal)); ?></span><span id="id_read_off_importetotal" class="css_read_off_importetotal<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_importetotal; ?>">
 <input class="sc-js-input scFormObjectOdd css_importetotal_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_importetotal" type=text name="importetotal" value="<?php echo $this->form_encode_input($importetotal) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 3, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['importetotal']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['importetotal']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['importetotal']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['importetotal']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_importetotal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_importetotal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fecharegistro']))
           {
               $this->nmgp_cmp_readonly['fecharegistro'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['moneda']))
    {
        $this->nm_new_label['moneda'] = "Moneda";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $moneda = $this->moneda;
   $sStyleHidden_moneda = '';
   if (isset($this->nmgp_cmp_hidden['moneda']) && $this->nmgp_cmp_hidden['moneda'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['moneda']);
       $sStyleHidden_moneda = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_moneda = 'display: none;';
   $sStyleReadInp_moneda = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['moneda']) && $this->nmgp_cmp_readonly['moneda'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['moneda']);
       $sStyleReadLab_moneda = '';
       $sStyleReadInp_moneda = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['moneda']) && $this->nmgp_cmp_hidden['moneda'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="moneda" value="<?php echo $this->form_encode_input($moneda) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_moneda_line" id="hidden_field_data_moneda" style="<?php echo $sStyleHidden_moneda; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_moneda_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_moneda_label" style=""><span id="id_label_moneda"><?php echo $this->nm_new_label['moneda']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["moneda"]) &&  $this->nmgp_cmp_readonly["moneda"] == "on") { 

 ?>
<input type="hidden" name="moneda" value="<?php echo $this->form_encode_input($moneda) . "\">" . $moneda . ""; ?>
<?php } else { ?>
<span id="id_read_on_moneda" class="sc-ui-readonly-moneda css_moneda_line" style="<?php echo $sStyleReadLab_moneda; ?>"><?php echo $this->form_format_readonly("moneda", $this->form_encode_input($this->moneda)); ?></span><span id="id_read_off_moneda" class="css_read_off_moneda<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_moneda; ?>">
 <input class="sc-js-input scFormObjectOdd css_moneda_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_moneda" type=text name="moneda" value="<?php echo $this->form_encode_input($moneda) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_moneda_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_moneda_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['estado']))
           {
               $this->nmgp_cmp_readonly['estado'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['fecharegistro']))
    {
        $this->nm_new_label['fecharegistro'] = "Fecharegistro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fecharegistro = $this->fecharegistro;
   if (strlen($this->fecharegistro_hora) > 8 ) {$this->fecharegistro_hora = substr($this->fecharegistro_hora, 0, 8);}
   $this->fecharegistro .= ' ' . $this->fecharegistro_hora;
   $this->fecharegistro  = trim($this->fecharegistro);
   $fecharegistro = $this->fecharegistro;
   $sStyleHidden_fecharegistro = '';
   if (isset($this->nmgp_cmp_hidden['fecharegistro']) && $this->nmgp_cmp_hidden['fecharegistro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fecharegistro']);
       $sStyleHidden_fecharegistro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fecharegistro = 'display: none;';
   $sStyleReadInp_fecharegistro = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fecharegistro"]) &&  $this->nmgp_cmp_readonly["fecharegistro"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fecharegistro']);
       $sStyleReadLab_fecharegistro = '';
       $sStyleReadInp_fecharegistro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fecharegistro']) && $this->nmgp_cmp_hidden['fecharegistro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fecharegistro" value="<?php echo $this->form_encode_input($fecharegistro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fecharegistro_line" id="hidden_field_data_fecharegistro" style="<?php echo $sStyleHidden_fecharegistro; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fecharegistro_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fecharegistro_label" style=""><span id="id_label_fecharegistro"><?php echo $this->nm_new_label['fecharegistro']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fecharegistro"]) &&  $this->nmgp_cmp_readonly["fecharegistro"] == "on")) { 

 ?>
<input type="hidden" name="fecharegistro" value="<?php echo $this->form_encode_input($fecharegistro) . "\"><span id=\"id_ajax_label_fecharegistro\">" . $fecharegistro . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fecharegistro" class="sc-ui-readonly-fecharegistro css_fecharegistro_line" style="<?php echo $sStyleReadLab_fecharegistro; ?>"><?php echo $this->form_format_readonly("fecharegistro", $this->form_encode_input($fecharegistro)); ?></span><span id="id_read_off_fecharegistro" class="css_read_off_fecharegistro<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fecharegistro; ?>"><?php
$tmp_form_data = $this->field_config['fecharegistro']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fecharegistro_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fecharegistro" type=text name="fecharegistro" value="<?php echo $this->form_encode_input($fecharegistro) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fecharegistro']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fecharegistro']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fecharegistro']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fecharegistro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fecharegistro_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fecharegistro = $old_dt_fecharegistro;
?>





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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["estado"]) &&  $this->nmgp_cmp_readonly["estado"] == "on"))
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
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["estado"]) &&  $this->nmgp_cmp_readonly["estado"] == "on")) { 

 ?>
<input type="hidden" name="estado" value="<?php echo $this->form_encode_input($estado) . "\"><span id=\"id_ajax_label_estado\">" . $estado . "</span>"; ?>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['birpara'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['first'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['back'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['forward'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_xml_compras_hdr_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_xml_compras_hdr_mob");
 parent.scAjaxDetailHeight("form_xml_compras_hdr_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_xml_compras_hdr_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_xml_compras_hdr_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_xml_compras_hdr_mob']['buttonStatus'] = $this->nmgp_botoes;
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
