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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " movcon"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " movcon"); } ?></TITLE>
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
.css_read_off_fechahis button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechconciliado button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_fechcerrado button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_movcon/form_movcon_mob_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_movcon_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_movcon_mob_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_movcon']['error_buffer']) && '' != $_SESSION['scriptcase']['form_movcon']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_movcon']['error_buffer'];
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
 include_once("form_movcon_mob_js0.php");
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
               action="form_movcon_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_movcon_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_movcon_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['fast_search'][2] : "";
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['insert'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['bcancelar'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['update'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['delete'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['ctahiscon']))
           {
               $this->nmgp_cmp_readonly['ctahiscon'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['fechahis']))
           {
               $this->nmgp_cmp_readonly['fechahis'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['ctahiscon']))
    {
        $this->nm_new_label['ctahiscon'] = "Ctahiscon";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ctahiscon = $this->ctahiscon;
   $sStyleHidden_ctahiscon = '';
   if (isset($this->nmgp_cmp_hidden['ctahiscon']) && $this->nmgp_cmp_hidden['ctahiscon'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ctahiscon']);
       $sStyleHidden_ctahiscon = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ctahiscon = 'display: none;';
   $sStyleReadInp_ctahiscon = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["ctahiscon"]) &&  $this->nmgp_cmp_readonly["ctahiscon"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ctahiscon']);
       $sStyleReadLab_ctahiscon = '';
       $sStyleReadInp_ctahiscon = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ctahiscon']) && $this->nmgp_cmp_hidden['ctahiscon'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ctahiscon" value="<?php echo $this->form_encode_input($ctahiscon) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ctahiscon_line" id="hidden_field_data_ctahiscon" style="<?php echo $sStyleHidden_ctahiscon; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ctahiscon_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ctahiscon_label" style=""><span id="id_label_ctahiscon"><?php echo $this->nm_new_label['ctahiscon']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['ctahiscon']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['ctahiscon'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["ctahiscon"]) &&  $this->nmgp_cmp_readonly["ctahiscon"] == "on")) { 

 ?>
<input type="hidden" name="ctahiscon" value="<?php echo $this->form_encode_input($ctahiscon) . "\"><span id=\"id_ajax_label_ctahiscon\">" . $ctahiscon . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_ctahiscon" class="sc-ui-readonly-ctahiscon css_ctahiscon_line" style="<?php echo $sStyleReadLab_ctahiscon; ?>"><?php echo $this->form_format_readonly("ctahiscon", $this->form_encode_input($this->ctahiscon)); ?></span><span id="id_read_off_ctahiscon" class="css_read_off_ctahiscon<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ctahiscon; ?>">
 <input class="sc-js-input scFormObjectOdd css_ctahiscon_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ctahiscon" type=text name="ctahiscon" value="<?php echo $this->form_encode_input($ctahiscon) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=25"; } ?> maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ctahiscon_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ctahiscon_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['tipocomptehis']))
           {
               $this->nmgp_cmp_readonly['tipocomptehis'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['fechahis']))
    {
        $this->nm_new_label['fechahis'] = "Fechahis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fechahis = $this->fechahis;
   if (strlen($this->fechahis_hora) > 8 ) {$this->fechahis_hora = substr($this->fechahis_hora, 0, 8);}
   $this->fechahis .= ' ' . $this->fechahis_hora;
   $this->fechahis  = trim($this->fechahis);
   $fechahis = $this->fechahis;
   $sStyleHidden_fechahis = '';
   if (isset($this->nmgp_cmp_hidden['fechahis']) && $this->nmgp_cmp_hidden['fechahis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechahis']);
       $sStyleHidden_fechahis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechahis = 'display: none;';
   $sStyleReadInp_fechahis = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["fechahis"]) &&  $this->nmgp_cmp_readonly["fechahis"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechahis']);
       $sStyleReadLab_fechahis = '';
       $sStyleReadInp_fechahis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechahis']) && $this->nmgp_cmp_hidden['fechahis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechahis" value="<?php echo $this->form_encode_input($fechahis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fechahis_line" id="hidden_field_data_fechahis" style="<?php echo $sStyleHidden_fechahis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechahis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechahis_label" style=""><span id="id_label_fechahis"><?php echo $this->nm_new_label['fechahis']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['fechahis']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['fechahis'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["fechahis"]) &&  $this->nmgp_cmp_readonly["fechahis"] == "on")) { 

 ?>
<input type="hidden" name="fechahis" value="<?php echo $this->form_encode_input($fechahis) . "\"><span id=\"id_ajax_label_fechahis\">" . $fechahis . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_fechahis" class="sc-ui-readonly-fechahis css_fechahis_line" style="<?php echo $sStyleReadLab_fechahis; ?>"><?php echo $this->form_format_readonly("fechahis", $this->form_encode_input($fechahis)); ?></span><span id="id_read_off_fechahis" class="css_read_off_fechahis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechahis; ?>"><?php
$tmp_form_data = $this->field_config['fechahis']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fechahis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechahis" type=text name="fechahis" value="<?php echo $this->form_encode_input($fechahis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fechahis']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechahis']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fechahis']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechahis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechahis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fechahis = $old_dt_fechahis;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['numcomptehis']))
           {
               $this->nmgp_cmp_readonly['numcomptehis'] = 'on';
           }
?>


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
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["tipocomptehis"]) &&  $this->nmgp_cmp_readonly["tipocomptehis"] == "on"))
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

    <TD class="scFormDataOdd css_tipocomptehis_line" id="hidden_field_data_tipocomptehis" style="<?php echo $sStyleHidden_tipocomptehis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipocomptehis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipocomptehis_label" style=""><span id="id_label_tipocomptehis"><?php echo $this->nm_new_label['tipocomptehis']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['tipocomptehis']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['tipocomptehis'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["tipocomptehis"]) &&  $this->nmgp_cmp_readonly["tipocomptehis"] == "on")) { 

 ?>
<input type="hidden" name="tipocomptehis" value="<?php echo $this->form_encode_input($tipocomptehis) . "\"><span id=\"id_ajax_label_tipocomptehis\">" . $tipocomptehis . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_tipocomptehis" class="sc-ui-readonly-tipocomptehis css_tipocomptehis_line" style="<?php echo $sStyleReadLab_tipocomptehis; ?>"><?php echo $this->form_format_readonly("tipocomptehis", $this->form_encode_input($this->tipocomptehis)); ?></span><span id="id_read_off_tipocomptehis" class="css_read_off_tipocomptehis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipocomptehis; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipocomptehis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipocomptehis" type=text name="tipocomptehis" value="<?php echo $this->form_encode_input($tipocomptehis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipocomptehis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipocomptehis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['ocurrenciahis']))
           {
               $this->nmgp_cmp_readonly['ocurrenciahis'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['numcomptehis']))
    {
        $this->nm_new_label['numcomptehis'] = "Numcomptehis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numcomptehis = $this->numcomptehis;
   $sStyleHidden_numcomptehis = '';
   if (isset($this->nmgp_cmp_hidden['numcomptehis']) && $this->nmgp_cmp_hidden['numcomptehis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numcomptehis']);
       $sStyleHidden_numcomptehis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numcomptehis = 'display: none;';
   $sStyleReadInp_numcomptehis = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["numcomptehis"]) &&  $this->nmgp_cmp_readonly["numcomptehis"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numcomptehis']);
       $sStyleReadLab_numcomptehis = '';
       $sStyleReadInp_numcomptehis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numcomptehis']) && $this->nmgp_cmp_hidden['numcomptehis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numcomptehis" value="<?php echo $this->form_encode_input($numcomptehis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numcomptehis_line" id="hidden_field_data_numcomptehis" style="<?php echo $sStyleHidden_numcomptehis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numcomptehis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numcomptehis_label" style=""><span id="id_label_numcomptehis"><?php echo $this->nm_new_label['numcomptehis']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['numcomptehis']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['numcomptehis'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["numcomptehis"]) &&  $this->nmgp_cmp_readonly["numcomptehis"] == "on")) { 

 ?>
<input type="hidden" name="numcomptehis" value="<?php echo $this->form_encode_input($numcomptehis) . "\"><span id=\"id_ajax_label_numcomptehis\">" . $numcomptehis . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_numcomptehis" class="sc-ui-readonly-numcomptehis css_numcomptehis_line" style="<?php echo $sStyleReadLab_numcomptehis; ?>"><?php echo $this->form_format_readonly("numcomptehis", $this->form_encode_input($this->numcomptehis)); ?></span><span id="id_read_off_numcomptehis" class="css_read_off_numcomptehis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numcomptehis; ?>">
 <input class="sc-js-input scFormObjectOdd css_numcomptehis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numcomptehis" type=text name="numcomptehis" value="<?php echo $this->form_encode_input($numcomptehis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numcomptehis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numcomptehis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ocurrenciahis']))
    {
        $this->nm_new_label['ocurrenciahis'] = "Ocurrenciahis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ocurrenciahis = $this->ocurrenciahis;
   $sStyleHidden_ocurrenciahis = '';
   if (isset($this->nmgp_cmp_hidden['ocurrenciahis']) && $this->nmgp_cmp_hidden['ocurrenciahis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ocurrenciahis']);
       $sStyleHidden_ocurrenciahis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ocurrenciahis = 'display: none;';
   $sStyleReadInp_ocurrenciahis = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["ocurrenciahis"]) &&  $this->nmgp_cmp_readonly["ocurrenciahis"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ocurrenciahis']);
       $sStyleReadLab_ocurrenciahis = '';
       $sStyleReadInp_ocurrenciahis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ocurrenciahis']) && $this->nmgp_cmp_hidden['ocurrenciahis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ocurrenciahis" value="<?php echo $this->form_encode_input($ocurrenciahis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ocurrenciahis_line" id="hidden_field_data_ocurrenciahis" style="<?php echo $sStyleHidden_ocurrenciahis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ocurrenciahis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ocurrenciahis_label" style=""><span id="id_label_ocurrenciahis"><?php echo $this->nm_new_label['ocurrenciahis']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['ocurrenciahis']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['ocurrenciahis'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["ocurrenciahis"]) &&  $this->nmgp_cmp_readonly["ocurrenciahis"] == "on")) { 

 ?>
<input type="hidden" name="ocurrenciahis" value="<?php echo $this->form_encode_input($ocurrenciahis) . "\"><span id=\"id_ajax_label_ocurrenciahis\">" . $ocurrenciahis . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_ocurrenciahis" class="sc-ui-readonly-ocurrenciahis css_ocurrenciahis_line" style="<?php echo $sStyleReadLab_ocurrenciahis; ?>"><?php echo $this->form_format_readonly("ocurrenciahis", $this->form_encode_input($this->ocurrenciahis)); ?></span><span id="id_read_off_ocurrenciahis" class="css_read_off_ocurrenciahis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ocurrenciahis; ?>">
 <input class="sc-js-input scFormObjectOdd css_ocurrenciahis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ocurrenciahis" type=text name="ocurrenciahis" value="<?php echo $this->form_encode_input($ocurrenciahis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ocurrenciahis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ocurrenciahis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nochequehis']))
    {
        $this->nm_new_label['nochequehis'] = "Nochequehis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nochequehis = $this->nochequehis;
   $sStyleHidden_nochequehis = '';
   if (isset($this->nmgp_cmp_hidden['nochequehis']) && $this->nmgp_cmp_hidden['nochequehis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nochequehis']);
       $sStyleHidden_nochequehis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nochequehis = 'display: none;';
   $sStyleReadInp_nochequehis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nochequehis']) && $this->nmgp_cmp_readonly['nochequehis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nochequehis']);
       $sStyleReadLab_nochequehis = '';
       $sStyleReadInp_nochequehis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nochequehis']) && $this->nmgp_cmp_hidden['nochequehis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nochequehis" value="<?php echo $this->form_encode_input($nochequehis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nochequehis_line" id="hidden_field_data_nochequehis" style="<?php echo $sStyleHidden_nochequehis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nochequehis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nochequehis_label" style=""><span id="id_label_nochequehis"><?php echo $this->nm_new_label['nochequehis']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nochequehis"]) &&  $this->nmgp_cmp_readonly["nochequehis"] == "on") { 

 ?>
<input type="hidden" name="nochequehis" value="<?php echo $this->form_encode_input($nochequehis) . "\">" . $nochequehis . ""; ?>
<?php } else { ?>
<span id="id_read_on_nochequehis" class="sc-ui-readonly-nochequehis css_nochequehis_line" style="<?php echo $sStyleReadLab_nochequehis; ?>"><?php echo $this->form_format_readonly("nochequehis", $this->form_encode_input($this->nochequehis)); ?></span><span id="id_read_off_nochequehis" class="css_read_off_nochequehis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nochequehis; ?>">
 <input class="sc-js-input scFormObjectOdd css_nochequehis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nochequehis" type=text name="nochequehis" value="<?php echo $this->form_encode_input($nochequehis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nochequehis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nochequehis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dethis']))
    {
        $this->nm_new_label['dethis'] = "Dethis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $dethis = $this->dethis;
   $sStyleHidden_dethis = '';
   if (isset($this->nmgp_cmp_hidden['dethis']) && $this->nmgp_cmp_hidden['dethis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dethis']);
       $sStyleHidden_dethis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dethis = 'display: none;';
   $sStyleReadInp_dethis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dethis']) && $this->nmgp_cmp_readonly['dethis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dethis']);
       $sStyleReadLab_dethis = '';
       $sStyleReadInp_dethis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dethis']) && $this->nmgp_cmp_hidden['dethis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dethis" value="<?php echo $this->form_encode_input($dethis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dethis_line" id="hidden_field_data_dethis" style="<?php echo $sStyleHidden_dethis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dethis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dethis_label" style=""><span id="id_label_dethis"><?php echo $this->nm_new_label['dethis']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dethis"]) &&  $this->nmgp_cmp_readonly["dethis"] == "on") { 

 ?>
<input type="hidden" name="dethis" value="<?php echo $this->form_encode_input($dethis) . "\">" . $dethis . ""; ?>
<?php } else { ?>
<span id="id_read_on_dethis" class="sc-ui-readonly-dethis css_dethis_line" style="<?php echo $sStyleReadLab_dethis; ?>"><?php echo $this->form_format_readonly("dethis", $this->form_encode_input($this->dethis)); ?></span><span id="id_read_off_dethis" class="css_read_off_dethis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dethis; ?>">
 <input class="sc-js-input scFormObjectOdd css_dethis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dethis" type=text name="dethis" value="<?php echo $this->form_encode_input($dethis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=999 alt="{datatype: 'text', maxLength: 999, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dethis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dethis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['db1cr2his']))
    {
        $this->nm_new_label['db1cr2his'] = "Db 1cr 2his";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $db1cr2his = $this->db1cr2his;
   $sStyleHidden_db1cr2his = '';
   if (isset($this->nmgp_cmp_hidden['db1cr2his']) && $this->nmgp_cmp_hidden['db1cr2his'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['db1cr2his']);
       $sStyleHidden_db1cr2his = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_db1cr2his = 'display: none;';
   $sStyleReadInp_db1cr2his = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['db1cr2his']) && $this->nmgp_cmp_readonly['db1cr2his'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['db1cr2his']);
       $sStyleReadLab_db1cr2his = '';
       $sStyleReadInp_db1cr2his = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['db1cr2his']) && $this->nmgp_cmp_hidden['db1cr2his'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="db1cr2his" value="<?php echo $this->form_encode_input($db1cr2his) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_db1cr2his_line" id="hidden_field_data_db1cr2his" style="<?php echo $sStyleHidden_db1cr2his; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_db1cr2his_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_db1cr2his_label" style=""><span id="id_label_db1cr2his"><?php echo $this->nm_new_label['db1cr2his']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["db1cr2his"]) &&  $this->nmgp_cmp_readonly["db1cr2his"] == "on") { 

 ?>
<input type="hidden" name="db1cr2his" value="<?php echo $this->form_encode_input($db1cr2his) . "\">" . $db1cr2his . ""; ?>
<?php } else { ?>
<span id="id_read_on_db1cr2his" class="sc-ui-readonly-db1cr2his css_db1cr2his_line" style="<?php echo $sStyleReadLab_db1cr2his; ?>"><?php echo $this->form_format_readonly("db1cr2his", $this->form_encode_input($this->db1cr2his)); ?></span><span id="id_read_off_db1cr2his" class="css_read_off_db1cr2his<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_db1cr2his; ?>">
 <input class="sc-js-input scFormObjectOdd css_db1cr2his_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_db1cr2his" type=text name="db1cr2his" value="<?php echo $this->form_encode_input($db1cr2his) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_db1cr2his_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_db1cr2his_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['valorhis']))
    {
        $this->nm_new_label['valorhis'] = "Valorhis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $valorhis = $this->valorhis;
   $sStyleHidden_valorhis = '';
   if (isset($this->nmgp_cmp_hidden['valorhis']) && $this->nmgp_cmp_hidden['valorhis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['valorhis']);
       $sStyleHidden_valorhis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_valorhis = 'display: none;';
   $sStyleReadInp_valorhis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['valorhis']) && $this->nmgp_cmp_readonly['valorhis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['valorhis']);
       $sStyleReadLab_valorhis = '';
       $sStyleReadInp_valorhis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['valorhis']) && $this->nmgp_cmp_hidden['valorhis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="valorhis" value="<?php echo $this->form_encode_input($valorhis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_valorhis_line" id="hidden_field_data_valorhis" style="<?php echo $sStyleHidden_valorhis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_valorhis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_valorhis_label" style=""><span id="id_label_valorhis"><?php echo $this->nm_new_label['valorhis']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["valorhis"]) &&  $this->nmgp_cmp_readonly["valorhis"] == "on") { 

 ?>
<input type="hidden" name="valorhis" value="<?php echo $this->form_encode_input($valorhis) . "\">" . $valorhis . ""; ?>
<?php } else { ?>
<span id="id_read_on_valorhis" class="sc-ui-readonly-valorhis css_valorhis_line" style="<?php echo $sStyleReadLab_valorhis; ?>"><?php echo $this->form_format_readonly("valorhis", $this->form_encode_input($this->valorhis)); ?></span><span id="id_read_off_valorhis" class="css_read_off_valorhis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_valorhis; ?>">
 <input class="sc-js-input scFormObjectOdd css_valorhis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_valorhis" type=text name="valorhis" value="<?php echo $this->form_encode_input($valorhis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['valorhis']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['valorhis']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['valorhis']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['valorhis']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_valorhis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_valorhis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sdoctahis']))
    {
        $this->nm_new_label['sdoctahis'] = "Sdoctahis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sdoctahis = $this->sdoctahis;
   $sStyleHidden_sdoctahis = '';
   if (isset($this->nmgp_cmp_hidden['sdoctahis']) && $this->nmgp_cmp_hidden['sdoctahis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sdoctahis']);
       $sStyleHidden_sdoctahis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sdoctahis = 'display: none;';
   $sStyleReadInp_sdoctahis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sdoctahis']) && $this->nmgp_cmp_readonly['sdoctahis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sdoctahis']);
       $sStyleReadLab_sdoctahis = '';
       $sStyleReadInp_sdoctahis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sdoctahis']) && $this->nmgp_cmp_hidden['sdoctahis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sdoctahis" value="<?php echo $this->form_encode_input($sdoctahis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sdoctahis_line" id="hidden_field_data_sdoctahis" style="<?php echo $sStyleHidden_sdoctahis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sdoctahis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_sdoctahis_label" style=""><span id="id_label_sdoctahis"><?php echo $this->nm_new_label['sdoctahis']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sdoctahis"]) &&  $this->nmgp_cmp_readonly["sdoctahis"] == "on") { 

 ?>
<input type="hidden" name="sdoctahis" value="<?php echo $this->form_encode_input($sdoctahis) . "\">" . $sdoctahis . ""; ?>
<?php } else { ?>
<span id="id_read_on_sdoctahis" class="sc-ui-readonly-sdoctahis css_sdoctahis_line" style="<?php echo $sStyleReadLab_sdoctahis; ?>"><?php echo $this->form_format_readonly("sdoctahis", $this->form_encode_input($this->sdoctahis)); ?></span><span id="id_read_off_sdoctahis" class="css_read_off_sdoctahis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sdoctahis; ?>">
 <input class="sc-js-input scFormObjectOdd css_sdoctahis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sdoctahis" type=text name="sdoctahis" value="<?php echo $this->form_encode_input($sdoctahis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['sdoctahis']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['sdoctahis']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['sdoctahis']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['sdoctahis']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sdoctahis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sdoctahis_text"></span></td></tr></table></td></tr></table> </TD>
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

    <TD class="scFormDataOdd css_estado_line" id="hidden_field_data_estado" style="<?php echo $sStyleHidden_estado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estado_label" style=""><span id="id_label_estado"><?php echo $this->nm_new_label['estado']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['estado']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['estado'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado"]) &&  $this->nmgp_cmp_readonly["estado"] == "on") { 

 ?>
<input type="hidden" name="estado" value="<?php echo $this->form_encode_input($estado) . "\">" . $estado . ""; ?>
<?php } else { ?>
<span id="id_read_on_estado" class="sc-ui-readonly-estado css_estado_line" style="<?php echo $sStyleReadLab_estado; ?>"><?php echo $this->form_format_readonly("estado", $this->form_encode_input($this->estado)); ?></span><span id="id_read_off_estado" class="css_read_off_estado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estado; ?>">
 <input class="sc-js-input scFormObjectOdd css_estado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estado" type=text name="estado" value="<?php echo $this->form_encode_input($estado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvtransferhis']))
    {
        $this->nm_new_label['cvtransferhis'] = "Cvtransferhis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvtransferhis = $this->cvtransferhis;
   $sStyleHidden_cvtransferhis = '';
   if (isset($this->nmgp_cmp_hidden['cvtransferhis']) && $this->nmgp_cmp_hidden['cvtransferhis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvtransferhis']);
       $sStyleHidden_cvtransferhis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvtransferhis = 'display: none;';
   $sStyleReadInp_cvtransferhis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvtransferhis']) && $this->nmgp_cmp_readonly['cvtransferhis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvtransferhis']);
       $sStyleReadLab_cvtransferhis = '';
       $sStyleReadInp_cvtransferhis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvtransferhis']) && $this->nmgp_cmp_hidden['cvtransferhis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvtransferhis" value="<?php echo $this->form_encode_input($cvtransferhis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cvtransferhis_line" id="hidden_field_data_cvtransferhis" style="<?php echo $sStyleHidden_cvtransferhis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvtransferhis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cvtransferhis_label" style=""><span id="id_label_cvtransferhis"><?php echo $this->nm_new_label['cvtransferhis']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cvtransferhis']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cvtransferhis'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvtransferhis"]) &&  $this->nmgp_cmp_readonly["cvtransferhis"] == "on") { 

 ?>
<input type="hidden" name="cvtransferhis" value="<?php echo $this->form_encode_input($cvtransferhis) . "\">" . $cvtransferhis . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvtransferhis" class="sc-ui-readonly-cvtransferhis css_cvtransferhis_line" style="<?php echo $sStyleReadLab_cvtransferhis; ?>"><?php echo $this->form_format_readonly("cvtransferhis", $this->form_encode_input($this->cvtransferhis)); ?></span><span id="id_read_off_cvtransferhis" class="css_read_off_cvtransferhis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvtransferhis; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvtransferhis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvtransferhis" type=text name="cvtransferhis" value="<?php echo $this->form_encode_input($cvtransferhis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvtransferhis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvtransferhis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ctamodulo']))
    {
        $this->nm_new_label['ctamodulo'] = "Ctamodulo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ctamodulo = $this->ctamodulo;
   $sStyleHidden_ctamodulo = '';
   if (isset($this->nmgp_cmp_hidden['ctamodulo']) && $this->nmgp_cmp_hidden['ctamodulo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ctamodulo']);
       $sStyleHidden_ctamodulo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ctamodulo = 'display: none;';
   $sStyleReadInp_ctamodulo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ctamodulo']) && $this->nmgp_cmp_readonly['ctamodulo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ctamodulo']);
       $sStyleReadLab_ctamodulo = '';
       $sStyleReadInp_ctamodulo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ctamodulo']) && $this->nmgp_cmp_hidden['ctamodulo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ctamodulo" value="<?php echo $this->form_encode_input($ctamodulo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ctamodulo_line" id="hidden_field_data_ctamodulo" style="<?php echo $sStyleHidden_ctamodulo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ctamodulo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_ctamodulo_label" style=""><span id="id_label_ctamodulo"><?php echo $this->nm_new_label['ctamodulo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['ctamodulo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['ctamodulo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ctamodulo"]) &&  $this->nmgp_cmp_readonly["ctamodulo"] == "on") { 

 ?>
<input type="hidden" name="ctamodulo" value="<?php echo $this->form_encode_input($ctamodulo) . "\">" . $ctamodulo . ""; ?>
<?php } else { ?>
<span id="id_read_on_ctamodulo" class="sc-ui-readonly-ctamodulo css_ctamodulo_line" style="<?php echo $sStyleReadLab_ctamodulo; ?>"><?php echo $this->form_format_readonly("ctamodulo", $this->form_encode_input($this->ctamodulo)); ?></span><span id="id_read_off_ctamodulo" class="css_read_off_ctamodulo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ctamodulo; ?>">
 <input class="sc-js-input scFormObjectOdd css_ctamodulo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ctamodulo" type=text name="ctamodulo" value="<?php echo $this->form_encode_input($ctamodulo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ctamodulo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ctamodulo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['doccons']))
    {
        $this->nm_new_label['doccons'] = "Doccons";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doccons = $this->doccons;
   $sStyleHidden_doccons = '';
   if (isset($this->nmgp_cmp_hidden['doccons']) && $this->nmgp_cmp_hidden['doccons'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doccons']);
       $sStyleHidden_doccons = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doccons = 'display: none;';
   $sStyleReadInp_doccons = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doccons']) && $this->nmgp_cmp_readonly['doccons'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doccons']);
       $sStyleReadLab_doccons = '';
       $sStyleReadInp_doccons = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doccons']) && $this->nmgp_cmp_hidden['doccons'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="doccons" value="<?php echo $this->form_encode_input($doccons) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_doccons_line" id="hidden_field_data_doccons" style="<?php echo $sStyleHidden_doccons; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doccons_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_doccons_label" style=""><span id="id_label_doccons"><?php echo $this->nm_new_label['doccons']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doccons"]) &&  $this->nmgp_cmp_readonly["doccons"] == "on") { 

 ?>
<input type="hidden" name="doccons" value="<?php echo $this->form_encode_input($doccons) . "\">" . $doccons . ""; ?>
<?php } else { ?>
<span id="id_read_on_doccons" class="sc-ui-readonly-doccons css_doccons_line" style="<?php echo $sStyleReadLab_doccons; ?>"><?php echo $this->form_format_readonly("doccons", $this->form_encode_input($this->doccons)); ?></span><span id="id_read_off_doccons" class="css_read_off_doccons<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_doccons; ?>">
 <input class="sc-js-input scFormObjectOdd css_doccons_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_doccons" type=text name="doccons" value="<?php echo $this->form_encode_input($doccons) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doccons_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doccons_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['beneficiario']))
    {
        $this->nm_new_label['beneficiario'] = "Beneficiario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $beneficiario = $this->beneficiario;
   $sStyleHidden_beneficiario = '';
   if (isset($this->nmgp_cmp_hidden['beneficiario']) && $this->nmgp_cmp_hidden['beneficiario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['beneficiario']);
       $sStyleHidden_beneficiario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_beneficiario = 'display: none;';
   $sStyleReadInp_beneficiario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['beneficiario']) && $this->nmgp_cmp_readonly['beneficiario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['beneficiario']);
       $sStyleReadLab_beneficiario = '';
       $sStyleReadInp_beneficiario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['beneficiario']) && $this->nmgp_cmp_hidden['beneficiario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="beneficiario" value="<?php echo $this->form_encode_input($beneficiario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_beneficiario_line" id="hidden_field_data_beneficiario" style="<?php echo $sStyleHidden_beneficiario; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_beneficiario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_beneficiario_label" style=""><span id="id_label_beneficiario"><?php echo $this->nm_new_label['beneficiario']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['beneficiario']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['beneficiario'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["beneficiario"]) &&  $this->nmgp_cmp_readonly["beneficiario"] == "on") { 

 ?>
<input type="hidden" name="beneficiario" value="<?php echo $this->form_encode_input($beneficiario) . "\">" . $beneficiario . ""; ?>
<?php } else { ?>
<span id="id_read_on_beneficiario" class="sc-ui-readonly-beneficiario css_beneficiario_line" style="<?php echo $sStyleReadLab_beneficiario; ?>"><?php echo $this->form_format_readonly("beneficiario", $this->form_encode_input($this->beneficiario)); ?></span><span id="id_read_off_beneficiario" class="css_read_off_beneficiario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_beneficiario; ?>">
 <input class="sc-js-input scFormObjectOdd css_beneficiario_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_beneficiario" type=text name="beneficiario" value="<?php echo $this->form_encode_input($beneficiario) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_beneficiario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_beneficiario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['conciliado']))
    {
        $this->nm_new_label['conciliado'] = "Conciliado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conciliado = $this->conciliado;
   $sStyleHidden_conciliado = '';
   if (isset($this->nmgp_cmp_hidden['conciliado']) && $this->nmgp_cmp_hidden['conciliado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conciliado']);
       $sStyleHidden_conciliado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conciliado = 'display: none;';
   $sStyleReadInp_conciliado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conciliado']) && $this->nmgp_cmp_readonly['conciliado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conciliado']);
       $sStyleReadLab_conciliado = '';
       $sStyleReadInp_conciliado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conciliado']) && $this->nmgp_cmp_hidden['conciliado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="conciliado" value="<?php echo $this->form_encode_input($conciliado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_conciliado_line" id="hidden_field_data_conciliado" style="<?php echo $sStyleHidden_conciliado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_conciliado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_conciliado_label" style=""><span id="id_label_conciliado"><?php echo $this->nm_new_label['conciliado']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['conciliado']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['conciliado'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["conciliado"]) &&  $this->nmgp_cmp_readonly["conciliado"] == "on") { 

 ?>
<input type="hidden" name="conciliado" value="<?php echo $this->form_encode_input($conciliado) . "\">" . $conciliado . ""; ?>
<?php } else { ?>
<span id="id_read_on_conciliado" class="sc-ui-readonly-conciliado css_conciliado_line" style="<?php echo $sStyleReadLab_conciliado; ?>"><?php echo $this->form_format_readonly("conciliado", $this->form_encode_input($this->conciliado)); ?></span><span id="id_read_off_conciliado" class="css_read_off_conciliado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_conciliado; ?>">
 <input class="sc-js-input scFormObjectOdd css_conciliado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_conciliado" type=text name="conciliado" value="<?php echo $this->form_encode_input($conciliado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conciliado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conciliado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codcons']))
    {
        $this->nm_new_label['codcons'] = "Codcons";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codcons = $this->codcons;
   $sStyleHidden_codcons = '';
   if (isset($this->nmgp_cmp_hidden['codcons']) && $this->nmgp_cmp_hidden['codcons'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codcons']);
       $sStyleHidden_codcons = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codcons = 'display: none;';
   $sStyleReadInp_codcons = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['codcons']) && $this->nmgp_cmp_readonly['codcons'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codcons']);
       $sStyleReadLab_codcons = '';
       $sStyleReadInp_codcons = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codcons']) && $this->nmgp_cmp_hidden['codcons'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codcons" value="<?php echo $this->form_encode_input($codcons) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_codcons_line" id="hidden_field_data_codcons" style="<?php echo $sStyleHidden_codcons; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_codcons_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_codcons_label" style=""><span id="id_label_codcons"><?php echo $this->nm_new_label['codcons']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["codcons"]) &&  $this->nmgp_cmp_readonly["codcons"] == "on") { 

 ?>
<input type="hidden" name="codcons" value="<?php echo $this->form_encode_input($codcons) . "\">" . $codcons . ""; ?>
<?php } else { ?>
<span id="id_read_on_codcons" class="sc-ui-readonly-codcons css_codcons_line" style="<?php echo $sStyleReadLab_codcons; ?>"><?php echo $this->form_format_readonly("codcons", $this->form_encode_input($this->codcons)); ?></span><span id="id_read_off_codcons" class="css_read_off_codcons<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_codcons; ?>">
 <input class="sc-js-input scFormObjectOdd css_codcons_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_codcons" type=text name="codcons" value="<?php echo $this->form_encode_input($codcons) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codcons_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codcons_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['manualcons']))
    {
        $this->nm_new_label['manualcons'] = "Manualcons";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $manualcons = $this->manualcons;
   $sStyleHidden_manualcons = '';
   if (isset($this->nmgp_cmp_hidden['manualcons']) && $this->nmgp_cmp_hidden['manualcons'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['manualcons']);
       $sStyleHidden_manualcons = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_manualcons = 'display: none;';
   $sStyleReadInp_manualcons = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['manualcons']) && $this->nmgp_cmp_readonly['manualcons'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['manualcons']);
       $sStyleReadLab_manualcons = '';
       $sStyleReadInp_manualcons = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['manualcons']) && $this->nmgp_cmp_hidden['manualcons'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="manualcons" value="<?php echo $this->form_encode_input($manualcons) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_manualcons_line" id="hidden_field_data_manualcons" style="<?php echo $sStyleHidden_manualcons; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_manualcons_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_manualcons_label" style=""><span id="id_label_manualcons"><?php echo $this->nm_new_label['manualcons']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["manualcons"]) &&  $this->nmgp_cmp_readonly["manualcons"] == "on") { 

 ?>
<input type="hidden" name="manualcons" value="<?php echo $this->form_encode_input($manualcons) . "\">" . $manualcons . ""; ?>
<?php } else { ?>
<span id="id_read_on_manualcons" class="sc-ui-readonly-manualcons css_manualcons_line" style="<?php echo $sStyleReadLab_manualcons; ?>"><?php echo $this->form_format_readonly("manualcons", $this->form_encode_input($this->manualcons)); ?></span><span id="id_read_off_manualcons" class="css_read_off_manualcons<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_manualcons; ?>">
 <input class="sc-js-input scFormObjectOdd css_manualcons_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_manualcons" type=text name="manualcons" value="<?php echo $this->form_encode_input($manualcons) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=1"; } ?> maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_manualcons_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_manualcons_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cerradocons']))
    {
        $this->nm_new_label['cerradocons'] = "Cerradocons";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cerradocons = $this->cerradocons;
   $sStyleHidden_cerradocons = '';
   if (isset($this->nmgp_cmp_hidden['cerradocons']) && $this->nmgp_cmp_hidden['cerradocons'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cerradocons']);
       $sStyleHidden_cerradocons = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cerradocons = 'display: none;';
   $sStyleReadInp_cerradocons = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cerradocons']) && $this->nmgp_cmp_readonly['cerradocons'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cerradocons']);
       $sStyleReadLab_cerradocons = '';
       $sStyleReadInp_cerradocons = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cerradocons']) && $this->nmgp_cmp_hidden['cerradocons'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cerradocons" value="<?php echo $this->form_encode_input($cerradocons) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cerradocons_line" id="hidden_field_data_cerradocons" style="<?php echo $sStyleHidden_cerradocons; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cerradocons_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cerradocons_label" style=""><span id="id_label_cerradocons"><?php echo $this->nm_new_label['cerradocons']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cerradocons"]) &&  $this->nmgp_cmp_readonly["cerradocons"] == "on") { 

 ?>
<input type="hidden" name="cerradocons" value="<?php echo $this->form_encode_input($cerradocons) . "\">" . $cerradocons . ""; ?>
<?php } else { ?>
<span id="id_read_on_cerradocons" class="sc-ui-readonly-cerradocons css_cerradocons_line" style="<?php echo $sStyleReadLab_cerradocons; ?>"><?php echo $this->form_format_readonly("cerradocons", $this->form_encode_input($this->cerradocons)); ?></span><span id="id_read_off_cerradocons" class="css_read_off_cerradocons<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cerradocons; ?>">
 <input class="sc-js-input scFormObjectOdd css_cerradocons_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cerradocons" type=text name="cerradocons" value="<?php echo $this->form_encode_input($cerradocons) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cerradocons']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cerradocons']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cerradocons']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cerradocons_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cerradocons_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechconciliado']))
    {
        $this->nm_new_label['fechconciliado'] = "Fechconciliado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fechconciliado = $this->fechconciliado;
   if (strlen($this->fechconciliado_hora) > 8 ) {$this->fechconciliado_hora = substr($this->fechconciliado_hora, 0, 8);}
   $this->fechconciliado .= ' ' . $this->fechconciliado_hora;
   $this->fechconciliado  = trim($this->fechconciliado);
   $fechconciliado = $this->fechconciliado;
   $sStyleHidden_fechconciliado = '';
   if (isset($this->nmgp_cmp_hidden['fechconciliado']) && $this->nmgp_cmp_hidden['fechconciliado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechconciliado']);
       $sStyleHidden_fechconciliado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechconciliado = 'display: none;';
   $sStyleReadInp_fechconciliado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechconciliado']) && $this->nmgp_cmp_readonly['fechconciliado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechconciliado']);
       $sStyleReadLab_fechconciliado = '';
       $sStyleReadInp_fechconciliado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechconciliado']) && $this->nmgp_cmp_hidden['fechconciliado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechconciliado" value="<?php echo $this->form_encode_input($fechconciliado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fechconciliado_line" id="hidden_field_data_fechconciliado" style="<?php echo $sStyleHidden_fechconciliado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechconciliado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechconciliado_label" style=""><span id="id_label_fechconciliado"><?php echo $this->nm_new_label['fechconciliado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechconciliado"]) &&  $this->nmgp_cmp_readonly["fechconciliado"] == "on") { 

 ?>
<input type="hidden" name="fechconciliado" value="<?php echo $this->form_encode_input($fechconciliado) . "\">" . $fechconciliado . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechconciliado" class="sc-ui-readonly-fechconciliado css_fechconciliado_line" style="<?php echo $sStyleReadLab_fechconciliado; ?>"><?php echo $this->form_format_readonly("fechconciliado", $this->form_encode_input($fechconciliado)); ?></span><span id="id_read_off_fechconciliado" class="css_read_off_fechconciliado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechconciliado; ?>"><?php
$tmp_form_data = $this->field_config['fechconciliado']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fechconciliado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechconciliado" type=text name="fechconciliado" value="<?php echo $this->form_encode_input($fechconciliado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fechconciliado']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechconciliado']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fechconciliado']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechconciliado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechconciliado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fechconciliado = $old_dt_fechconciliado;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fechcerrado']))
    {
        $this->nm_new_label['fechcerrado'] = "Fechcerrado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fechcerrado = $this->fechcerrado;
   if (strlen($this->fechcerrado_hora) > 8 ) {$this->fechcerrado_hora = substr($this->fechcerrado_hora, 0, 8);}
   $this->fechcerrado .= ' ' . $this->fechcerrado_hora;
   $this->fechcerrado  = trim($this->fechcerrado);
   $fechcerrado = $this->fechcerrado;
   $sStyleHidden_fechcerrado = '';
   if (isset($this->nmgp_cmp_hidden['fechcerrado']) && $this->nmgp_cmp_hidden['fechcerrado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fechcerrado']);
       $sStyleHidden_fechcerrado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fechcerrado = 'display: none;';
   $sStyleReadInp_fechcerrado = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fechcerrado']) && $this->nmgp_cmp_readonly['fechcerrado'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fechcerrado']);
       $sStyleReadLab_fechcerrado = '';
       $sStyleReadInp_fechcerrado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fechcerrado']) && $this->nmgp_cmp_hidden['fechcerrado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fechcerrado" value="<?php echo $this->form_encode_input($fechcerrado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_fechcerrado_line" id="hidden_field_data_fechcerrado" style="<?php echo $sStyleHidden_fechcerrado; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fechcerrado_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_fechcerrado_label" style=""><span id="id_label_fechcerrado"><?php echo $this->nm_new_label['fechcerrado']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fechcerrado"]) &&  $this->nmgp_cmp_readonly["fechcerrado"] == "on") { 

 ?>
<input type="hidden" name="fechcerrado" value="<?php echo $this->form_encode_input($fechcerrado) . "\">" . $fechcerrado . ""; ?>
<?php } else { ?>
<span id="id_read_on_fechcerrado" class="sc-ui-readonly-fechcerrado css_fechcerrado_line" style="<?php echo $sStyleReadLab_fechcerrado; ?>"><?php echo $this->form_format_readonly("fechcerrado", $this->form_encode_input($fechcerrado)); ?></span><span id="id_read_off_fechcerrado" class="css_read_off_fechcerrado<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fechcerrado; ?>"><?php
$tmp_form_data = $this->field_config['fechcerrado']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_fechcerrado_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_fechcerrado" type=text name="fechcerrado" value="<?php echo $this->form_encode_input($fechcerrado) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fechcerrado']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fechcerrado']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fechcerrado']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fechcerrado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fechcerrado_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fechcerrado = $old_dt_fechcerrado;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipocomptehis_cierre']))
    {
        $this->nm_new_label['tipocomptehis_cierre'] = "Tipocomptehis Cierre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipocomptehis_cierre = $this->tipocomptehis_cierre;
   $sStyleHidden_tipocomptehis_cierre = '';
   if (isset($this->nmgp_cmp_hidden['tipocomptehis_cierre']) && $this->nmgp_cmp_hidden['tipocomptehis_cierre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipocomptehis_cierre']);
       $sStyleHidden_tipocomptehis_cierre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipocomptehis_cierre = 'display: none;';
   $sStyleReadInp_tipocomptehis_cierre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipocomptehis_cierre']) && $this->nmgp_cmp_readonly['tipocomptehis_cierre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipocomptehis_cierre']);
       $sStyleReadLab_tipocomptehis_cierre = '';
       $sStyleReadInp_tipocomptehis_cierre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipocomptehis_cierre']) && $this->nmgp_cmp_hidden['tipocomptehis_cierre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipocomptehis_cierre" value="<?php echo $this->form_encode_input($tipocomptehis_cierre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipocomptehis_cierre_line" id="hidden_field_data_tipocomptehis_cierre" style="<?php echo $sStyleHidden_tipocomptehis_cierre; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipocomptehis_cierre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipocomptehis_cierre_label" style=""><span id="id_label_tipocomptehis_cierre"><?php echo $this->nm_new_label['tipocomptehis_cierre']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['tipocomptehis_cierre']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['tipocomptehis_cierre'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipocomptehis_cierre"]) &&  $this->nmgp_cmp_readonly["tipocomptehis_cierre"] == "on") { 

 ?>
<input type="hidden" name="tipocomptehis_cierre" value="<?php echo $this->form_encode_input($tipocomptehis_cierre) . "\">" . $tipocomptehis_cierre . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipocomptehis_cierre" class="sc-ui-readonly-tipocomptehis_cierre css_tipocomptehis_cierre_line" style="<?php echo $sStyleReadLab_tipocomptehis_cierre; ?>"><?php echo $this->form_format_readonly("tipocomptehis_cierre", $this->form_encode_input($this->tipocomptehis_cierre)); ?></span><span id="id_read_off_tipocomptehis_cierre" class="css_read_off_tipocomptehis_cierre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipocomptehis_cierre; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipocomptehis_cierre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipocomptehis_cierre" type=text name="tipocomptehis_cierre" value="<?php echo $this->form_encode_input($tipocomptehis_cierre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipocomptehis_cierre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipocomptehis_cierre_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cc01']))
    {
        $this->nm_new_label['cc01'] = "Cc 01";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cc01 = $this->cc01;
   $sStyleHidden_cc01 = '';
   if (isset($this->nmgp_cmp_hidden['cc01']) && $this->nmgp_cmp_hidden['cc01'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cc01']);
       $sStyleHidden_cc01 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cc01 = 'display: none;';
   $sStyleReadInp_cc01 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cc01']) && $this->nmgp_cmp_readonly['cc01'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cc01']);
       $sStyleReadLab_cc01 = '';
       $sStyleReadInp_cc01 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cc01']) && $this->nmgp_cmp_hidden['cc01'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cc01" value="<?php echo $this->form_encode_input($cc01) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cc01_line" id="hidden_field_data_cc01" style="<?php echo $sStyleHidden_cc01; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cc01_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cc01_label" style=""><span id="id_label_cc01"><?php echo $this->nm_new_label['cc01']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cc01']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cc01'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cc01"]) &&  $this->nmgp_cmp_readonly["cc01"] == "on") { 

 ?>
<input type="hidden" name="cc01" value="<?php echo $this->form_encode_input($cc01) . "\">" . $cc01 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cc01" class="sc-ui-readonly-cc01 css_cc01_line" style="<?php echo $sStyleReadLab_cc01; ?>"><?php echo $this->form_format_readonly("cc01", $this->form_encode_input($this->cc01)); ?></span><span id="id_read_off_cc01" class="css_read_off_cc01<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cc01; ?>">
 <input class="sc-js-input scFormObjectOdd css_cc01_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cc01" type=text name="cc01" value="<?php echo $this->form_encode_input($cc01) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cc01_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cc01_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cc02']))
    {
        $this->nm_new_label['cc02'] = "Cc 02";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cc02 = $this->cc02;
   $sStyleHidden_cc02 = '';
   if (isset($this->nmgp_cmp_hidden['cc02']) && $this->nmgp_cmp_hidden['cc02'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cc02']);
       $sStyleHidden_cc02 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cc02 = 'display: none;';
   $sStyleReadInp_cc02 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cc02']) && $this->nmgp_cmp_readonly['cc02'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cc02']);
       $sStyleReadLab_cc02 = '';
       $sStyleReadInp_cc02 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cc02']) && $this->nmgp_cmp_hidden['cc02'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cc02" value="<?php echo $this->form_encode_input($cc02) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cc02_line" id="hidden_field_data_cc02" style="<?php echo $sStyleHidden_cc02; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cc02_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cc02_label" style=""><span id="id_label_cc02"><?php echo $this->nm_new_label['cc02']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cc02']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cc02'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cc02"]) &&  $this->nmgp_cmp_readonly["cc02"] == "on") { 

 ?>
<input type="hidden" name="cc02" value="<?php echo $this->form_encode_input($cc02) . "\">" . $cc02 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cc02" class="sc-ui-readonly-cc02 css_cc02_line" style="<?php echo $sStyleReadLab_cc02; ?>"><?php echo $this->form_format_readonly("cc02", $this->form_encode_input($this->cc02)); ?></span><span id="id_read_off_cc02" class="css_read_off_cc02<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cc02; ?>">
 <input class="sc-js-input scFormObjectOdd css_cc02_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cc02" type=text name="cc02" value="<?php echo $this->form_encode_input($cc02) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cc02_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cc02_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cc03']))
    {
        $this->nm_new_label['cc03'] = "Cc 03";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cc03 = $this->cc03;
   $sStyleHidden_cc03 = '';
   if (isset($this->nmgp_cmp_hidden['cc03']) && $this->nmgp_cmp_hidden['cc03'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cc03']);
       $sStyleHidden_cc03 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cc03 = 'display: none;';
   $sStyleReadInp_cc03 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cc03']) && $this->nmgp_cmp_readonly['cc03'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cc03']);
       $sStyleReadLab_cc03 = '';
       $sStyleReadInp_cc03 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cc03']) && $this->nmgp_cmp_hidden['cc03'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cc03" value="<?php echo $this->form_encode_input($cc03) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cc03_line" id="hidden_field_data_cc03" style="<?php echo $sStyleHidden_cc03; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cc03_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cc03_label" style=""><span id="id_label_cc03"><?php echo $this->nm_new_label['cc03']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cc03']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cc03'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cc03"]) &&  $this->nmgp_cmp_readonly["cc03"] == "on") { 

 ?>
<input type="hidden" name="cc03" value="<?php echo $this->form_encode_input($cc03) . "\">" . $cc03 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cc03" class="sc-ui-readonly-cc03 css_cc03_line" style="<?php echo $sStyleReadLab_cc03; ?>"><?php echo $this->form_format_readonly("cc03", $this->form_encode_input($this->cc03)); ?></span><span id="id_read_off_cc03" class="css_read_off_cc03<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cc03; ?>">
 <input class="sc-js-input scFormObjectOdd css_cc03_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cc03" type=text name="cc03" value="<?php echo $this->form_encode_input($cc03) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cc03_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cc03_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cc04']))
    {
        $this->nm_new_label['cc04'] = "Cc 04";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cc04 = $this->cc04;
   $sStyleHidden_cc04 = '';
   if (isset($this->nmgp_cmp_hidden['cc04']) && $this->nmgp_cmp_hidden['cc04'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cc04']);
       $sStyleHidden_cc04 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cc04 = 'display: none;';
   $sStyleReadInp_cc04 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cc04']) && $this->nmgp_cmp_readonly['cc04'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cc04']);
       $sStyleReadLab_cc04 = '';
       $sStyleReadInp_cc04 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cc04']) && $this->nmgp_cmp_hidden['cc04'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cc04" value="<?php echo $this->form_encode_input($cc04) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cc04_line" id="hidden_field_data_cc04" style="<?php echo $sStyleHidden_cc04; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cc04_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cc04_label" style=""><span id="id_label_cc04"><?php echo $this->nm_new_label['cc04']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cc04']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cc04'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cc04"]) &&  $this->nmgp_cmp_readonly["cc04"] == "on") { 

 ?>
<input type="hidden" name="cc04" value="<?php echo $this->form_encode_input($cc04) . "\">" . $cc04 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cc04" class="sc-ui-readonly-cc04 css_cc04_line" style="<?php echo $sStyleReadLab_cc04; ?>"><?php echo $this->form_format_readonly("cc04", $this->form_encode_input($this->cc04)); ?></span><span id="id_read_off_cc04" class="css_read_off_cc04<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cc04; ?>">
 <input class="sc-js-input scFormObjectOdd css_cc04_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cc04" type=text name="cc04" value="<?php echo $this->form_encode_input($cc04) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cc04_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cc04_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cc05']))
    {
        $this->nm_new_label['cc05'] = "Cc 05";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cc05 = $this->cc05;
   $sStyleHidden_cc05 = '';
   if (isset($this->nmgp_cmp_hidden['cc05']) && $this->nmgp_cmp_hidden['cc05'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cc05']);
       $sStyleHidden_cc05 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cc05 = 'display: none;';
   $sStyleReadInp_cc05 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cc05']) && $this->nmgp_cmp_readonly['cc05'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cc05']);
       $sStyleReadLab_cc05 = '';
       $sStyleReadInp_cc05 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cc05']) && $this->nmgp_cmp_hidden['cc05'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cc05" value="<?php echo $this->form_encode_input($cc05) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cc05_line" id="hidden_field_data_cc05" style="<?php echo $sStyleHidden_cc05; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cc05_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cc05_label" style=""><span id="id_label_cc05"><?php echo $this->nm_new_label['cc05']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cc05']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cc05'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cc05"]) &&  $this->nmgp_cmp_readonly["cc05"] == "on") { 

 ?>
<input type="hidden" name="cc05" value="<?php echo $this->form_encode_input($cc05) . "\">" . $cc05 . ""; ?>
<?php } else { ?>
<span id="id_read_on_cc05" class="sc-ui-readonly-cc05 css_cc05_line" style="<?php echo $sStyleReadLab_cc05; ?>"><?php echo $this->form_format_readonly("cc05", $this->form_encode_input($this->cc05)); ?></span><span id="id_read_off_cc05" class="css_read_off_cc05<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cc05; ?>">
 <input class="sc-js-input scFormObjectOdd css_cc05_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cc05" type=text name="cc05" value="<?php echo $this->form_encode_input($cc05) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cc05_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cc05_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pord']))
    {
        $this->nm_new_label['pord'] = "Pord";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pord = $this->pord;
   $sStyleHidden_pord = '';
   if (isset($this->nmgp_cmp_hidden['pord']) && $this->nmgp_cmp_hidden['pord'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pord']);
       $sStyleHidden_pord = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pord = 'display: none;';
   $sStyleReadInp_pord = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pord']) && $this->nmgp_cmp_readonly['pord'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pord']);
       $sStyleReadLab_pord = '';
       $sStyleReadInp_pord = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pord']) && $this->nmgp_cmp_hidden['pord'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pord" value="<?php echo $this->form_encode_input($pord) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pord_line" id="hidden_field_data_pord" style="<?php echo $sStyleHidden_pord; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pord_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pord_label" style=""><span id="id_label_pord"><?php echo $this->nm_new_label['pord']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['pord']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['pord'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pord"]) &&  $this->nmgp_cmp_readonly["pord"] == "on") { 

 ?>
<input type="hidden" name="pord" value="<?php echo $this->form_encode_input($pord) . "\">" . $pord . ""; ?>
<?php } else { ?>
<span id="id_read_on_pord" class="sc-ui-readonly-pord css_pord_line" style="<?php echo $sStyleReadLab_pord; ?>"><?php echo $this->form_format_readonly("pord", $this->form_encode_input($this->pord)); ?></span><span id="id_read_off_pord" class="css_read_off_pord<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pord; ?>">
 <input class="sc-js-input scFormObjectOdd css_pord_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pord" type=text name="pord" value="<?php echo $this->form_encode_input($pord) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['pord']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pord']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pord']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['pord']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pord_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pord_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




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

    <TD class="scFormDataOdd css_idb_line" id="hidden_field_data_idb" style="<?php echo $sStyleHidden_idb; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idb_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idb_label" style=""><span id="id_label_idb"><?php echo $this->nm_new_label['idb']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['idb']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['idb'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idb"]) &&  $this->nmgp_cmp_readonly["idb"] == "on") { 

 ?>
<input type="hidden" name="idb" value="<?php echo $this->form_encode_input($idb) . "\">" . $idb . ""; ?>
<?php } else { ?>
<span id="id_read_on_idb" class="sc-ui-readonly-idb css_idb_line" style="<?php echo $sStyleReadLab_idb; ?>"><?php echo $this->form_format_readonly("idb", $this->form_encode_input($this->idb)); ?></span><span id="id_read_off_idb" class="css_read_off_idb<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idb; ?>">
 <input class="sc-js-input scFormObjectOdd css_idb_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idb" type=text name="idb" value="<?php echo $this->form_encode_input($idb) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idb_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idb_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipodoc']))
    {
        $this->nm_new_label['tipodoc'] = "Tipodoc";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipodoc = $this->tipodoc;
   $sStyleHidden_tipodoc = '';
   if (isset($this->nmgp_cmp_hidden['tipodoc']) && $this->nmgp_cmp_hidden['tipodoc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipodoc']);
       $sStyleHidden_tipodoc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipodoc = 'display: none;';
   $sStyleReadInp_tipodoc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipodoc']) && $this->nmgp_cmp_readonly['tipodoc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipodoc']);
       $sStyleReadLab_tipodoc = '';
       $sStyleReadInp_tipodoc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipodoc']) && $this->nmgp_cmp_hidden['tipodoc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipodoc" value="<?php echo $this->form_encode_input($tipodoc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipodoc_line" id="hidden_field_data_tipodoc" style="<?php echo $sStyleHidden_tipodoc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipodoc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipodoc_label" style=""><span id="id_label_tipodoc"><?php echo $this->nm_new_label['tipodoc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['tipodoc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['tipodoc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipodoc"]) &&  $this->nmgp_cmp_readonly["tipodoc"] == "on") { 

 ?>
<input type="hidden" name="tipodoc" value="<?php echo $this->form_encode_input($tipodoc) . "\">" . $tipodoc . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipodoc" class="sc-ui-readonly-tipodoc css_tipodoc_line" style="<?php echo $sStyleReadLab_tipodoc; ?>"><?php echo $this->form_format_readonly("tipodoc", $this->form_encode_input($this->tipodoc)); ?></span><span id="id_read_off_tipodoc" class="css_read_off_tipodoc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipodoc; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipodoc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipodoc" type=text name="tipodoc" value="<?php echo $this->form_encode_input($tipodoc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipodoc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipodoc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numdoc']))
    {
        $this->nm_new_label['numdoc'] = "Numdoc";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numdoc = $this->numdoc;
   $sStyleHidden_numdoc = '';
   if (isset($this->nmgp_cmp_hidden['numdoc']) && $this->nmgp_cmp_hidden['numdoc'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numdoc']);
       $sStyleHidden_numdoc = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numdoc = 'display: none;';
   $sStyleReadInp_numdoc = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numdoc']) && $this->nmgp_cmp_readonly['numdoc'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numdoc']);
       $sStyleReadLab_numdoc = '';
       $sStyleReadInp_numdoc = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numdoc']) && $this->nmgp_cmp_hidden['numdoc'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numdoc" value="<?php echo $this->form_encode_input($numdoc) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numdoc_line" id="hidden_field_data_numdoc" style="<?php echo $sStyleHidden_numdoc; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numdoc_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numdoc_label" style=""><span id="id_label_numdoc"><?php echo $this->nm_new_label['numdoc']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['numdoc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['numdoc'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numdoc"]) &&  $this->nmgp_cmp_readonly["numdoc"] == "on") { 

 ?>
<input type="hidden" name="numdoc" value="<?php echo $this->form_encode_input($numdoc) . "\">" . $numdoc . ""; ?>
<?php } else { ?>
<span id="id_read_on_numdoc" class="sc-ui-readonly-numdoc css_numdoc_line" style="<?php echo $sStyleReadLab_numdoc; ?>"><?php echo $this->form_format_readonly("numdoc", $this->form_encode_input($this->numdoc)); ?></span><span id="id_read_off_numdoc" class="css_read_off_numdoc<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numdoc; ?>">
 <input class="sc-js-input scFormObjectOdd css_numdoc_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numdoc" type=text name="numdoc" value="<?php echo $this->form_encode_input($numdoc) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numdoc_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numdoc_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['modulo']))
    {
        $this->nm_new_label['modulo'] = "Modulo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $modulo = $this->modulo;
   $sStyleHidden_modulo = '';
   if (isset($this->nmgp_cmp_hidden['modulo']) && $this->nmgp_cmp_hidden['modulo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['modulo']);
       $sStyleHidden_modulo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_modulo = 'display: none;';
   $sStyleReadInp_modulo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['modulo']) && $this->nmgp_cmp_readonly['modulo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['modulo']);
       $sStyleReadLab_modulo = '';
       $sStyleReadInp_modulo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['modulo']) && $this->nmgp_cmp_hidden['modulo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="modulo" value="<?php echo $this->form_encode_input($modulo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_modulo_line" id="hidden_field_data_modulo" style="<?php echo $sStyleHidden_modulo; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_modulo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_modulo_label" style=""><span id="id_label_modulo"><?php echo $this->nm_new_label['modulo']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['modulo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['modulo'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["modulo"]) &&  $this->nmgp_cmp_readonly["modulo"] == "on") { 

 ?>
<input type="hidden" name="modulo" value="<?php echo $this->form_encode_input($modulo) . "\">" . $modulo . ""; ?>
<?php } else { ?>
<span id="id_read_on_modulo" class="sc-ui-readonly-modulo css_modulo_line" style="<?php echo $sStyleReadLab_modulo; ?>"><?php echo $this->form_format_readonly("modulo", $this->form_encode_input($this->modulo)); ?></span><span id="id_read_off_modulo" class="css_read_off_modulo<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_modulo; ?>">
 <input class="sc-js-input scFormObjectOdd css_modulo_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_modulo" type=text name="modulo" value="<?php echo $this->form_encode_input($modulo) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_modulo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_modulo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cvanuladohis']))
    {
        $this->nm_new_label['cvanuladohis'] = "Cvanuladohis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cvanuladohis = $this->cvanuladohis;
   $sStyleHidden_cvanuladohis = '';
   if (isset($this->nmgp_cmp_hidden['cvanuladohis']) && $this->nmgp_cmp_hidden['cvanuladohis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cvanuladohis']);
       $sStyleHidden_cvanuladohis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cvanuladohis = 'display: none;';
   $sStyleReadInp_cvanuladohis = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cvanuladohis']) && $this->nmgp_cmp_readonly['cvanuladohis'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cvanuladohis']);
       $sStyleReadLab_cvanuladohis = '';
       $sStyleReadInp_cvanuladohis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cvanuladohis']) && $this->nmgp_cmp_hidden['cvanuladohis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cvanuladohis" value="<?php echo $this->form_encode_input($cvanuladohis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cvanuladohis_line" id="hidden_field_data_cvanuladohis" style="<?php echo $sStyleHidden_cvanuladohis; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cvanuladohis_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cvanuladohis_label" style=""><span id="id_label_cvanuladohis"><?php echo $this->nm_new_label['cvanuladohis']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cvanuladohis']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['cvanuladohis'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cvanuladohis"]) &&  $this->nmgp_cmp_readonly["cvanuladohis"] == "on") { 

 ?>
<input type="hidden" name="cvanuladohis" value="<?php echo $this->form_encode_input($cvanuladohis) . "\">" . $cvanuladohis . ""; ?>
<?php } else { ?>
<span id="id_read_on_cvanuladohis" class="sc-ui-readonly-cvanuladohis css_cvanuladohis_line" style="<?php echo $sStyleReadLab_cvanuladohis; ?>"><?php echo $this->form_format_readonly("cvanuladohis", $this->form_encode_input($this->cvanuladohis)); ?></span><span id="id_read_off_cvanuladohis" class="css_read_off_cvanuladohis<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cvanuladohis; ?>">
 <input class="sc-js-input scFormObjectOdd css_cvanuladohis_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cvanuladohis" type=text name="cvanuladohis" value="<?php echo $this->form_encode_input($cvanuladohis) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cvanuladohis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cvanuladohis_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['identificacion']))
    {
        $this->nm_new_label['identificacion'] = "Identificacion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $identificacion = $this->identificacion;
   $sStyleHidden_identificacion = '';
   if (isset($this->nmgp_cmp_hidden['identificacion']) && $this->nmgp_cmp_hidden['identificacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['identificacion']);
       $sStyleHidden_identificacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_identificacion = 'display: none;';
   $sStyleReadInp_identificacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['identificacion']) && $this->nmgp_cmp_readonly['identificacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['identificacion']);
       $sStyleReadLab_identificacion = '';
       $sStyleReadInp_identificacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['identificacion']) && $this->nmgp_cmp_hidden['identificacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="identificacion" value="<?php echo $this->form_encode_input($identificacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_identificacion_line" id="hidden_field_data_identificacion" style="<?php echo $sStyleHidden_identificacion; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_identificacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_identificacion_label" style=""><span id="id_label_identificacion"><?php echo $this->nm_new_label['identificacion']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["identificacion"]) &&  $this->nmgp_cmp_readonly["identificacion"] == "on") { 

 ?>
<input type="hidden" name="identificacion" value="<?php echo $this->form_encode_input($identificacion) . "\">" . $identificacion . ""; ?>
<?php } else { ?>
<span id="id_read_on_identificacion" class="sc-ui-readonly-identificacion css_identificacion_line" style="<?php echo $sStyleReadLab_identificacion; ?>"><?php echo $this->form_format_readonly("identificacion", $this->form_encode_input($this->identificacion)); ?></span><span id="id_read_off_identificacion" class="css_read_off_identificacion<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_identificacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_identificacion_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_identificacion" type=text name="identificacion" value="<?php echo $this->form_encode_input($identificacion) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=15"; } ?> maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_identificacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_identificacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estado_anio']))
    {
        $this->nm_new_label['estado_anio'] = "Estado Anio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado_anio = $this->estado_anio;
   $sStyleHidden_estado_anio = '';
   if (isset($this->nmgp_cmp_hidden['estado_anio']) && $this->nmgp_cmp_hidden['estado_anio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado_anio']);
       $sStyleHidden_estado_anio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado_anio = 'display: none;';
   $sStyleReadInp_estado_anio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estado_anio']) && $this->nmgp_cmp_readonly['estado_anio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado_anio']);
       $sStyleReadLab_estado_anio = '';
       $sStyleReadInp_estado_anio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado_anio']) && $this->nmgp_cmp_hidden['estado_anio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estado_anio" value="<?php echo $this->form_encode_input($estado_anio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_estado_anio_line" id="hidden_field_data_estado_anio" style="<?php echo $sStyleHidden_estado_anio; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado_anio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_estado_anio_label" style=""><span id="id_label_estado_anio"><?php echo $this->nm_new_label['estado_anio']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['estado_anio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['estado_anio'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado_anio"]) &&  $this->nmgp_cmp_readonly["estado_anio"] == "on") { 

 ?>
<input type="hidden" name="estado_anio" value="<?php echo $this->form_encode_input($estado_anio) . "\">" . $estado_anio . ""; ?>
<?php } else { ?>
<span id="id_read_on_estado_anio" class="sc-ui-readonly-estado_anio css_estado_anio_line" style="<?php echo $sStyleReadLab_estado_anio; ?>"><?php echo $this->form_format_readonly("estado_anio", $this->form_encode_input($this->estado_anio)); ?></span><span id="id_read_off_estado_anio" class="css_read_off_estado_anio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estado_anio; ?>">
 <input class="sc-js-input scFormObjectOdd css_estado_anio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estado_anio" type=text name="estado_anio" value="<?php echo $this->form_encode_input($estado_anio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_anio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_anio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numcomptehis_cierre']))
    {
        $this->nm_new_label['numcomptehis_cierre'] = "Numcomptehis Cierre";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numcomptehis_cierre = $this->numcomptehis_cierre;
   $sStyleHidden_numcomptehis_cierre = '';
   if (isset($this->nmgp_cmp_hidden['numcomptehis_cierre']) && $this->nmgp_cmp_hidden['numcomptehis_cierre'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numcomptehis_cierre']);
       $sStyleHidden_numcomptehis_cierre = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numcomptehis_cierre = 'display: none;';
   $sStyleReadInp_numcomptehis_cierre = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numcomptehis_cierre']) && $this->nmgp_cmp_readonly['numcomptehis_cierre'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numcomptehis_cierre']);
       $sStyleReadLab_numcomptehis_cierre = '';
       $sStyleReadInp_numcomptehis_cierre = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numcomptehis_cierre']) && $this->nmgp_cmp_hidden['numcomptehis_cierre'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numcomptehis_cierre" value="<?php echo $this->form_encode_input($numcomptehis_cierre) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numcomptehis_cierre_line" id="hidden_field_data_numcomptehis_cierre" style="<?php echo $sStyleHidden_numcomptehis_cierre; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numcomptehis_cierre_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numcomptehis_cierre_label" style=""><span id="id_label_numcomptehis_cierre"><?php echo $this->nm_new_label['numcomptehis_cierre']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['numcomptehis_cierre']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['php_cmp_required']['numcomptehis_cierre'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numcomptehis_cierre"]) &&  $this->nmgp_cmp_readonly["numcomptehis_cierre"] == "on") { 

 ?>
<input type="hidden" name="numcomptehis_cierre" value="<?php echo $this->form_encode_input($numcomptehis_cierre) . "\">" . $numcomptehis_cierre . ""; ?>
<?php } else { ?>
<span id="id_read_on_numcomptehis_cierre" class="sc-ui-readonly-numcomptehis_cierre css_numcomptehis_cierre_line" style="<?php echo $sStyleReadLab_numcomptehis_cierre; ?>"><?php echo $this->form_format_readonly("numcomptehis_cierre", $this->form_encode_input($this->numcomptehis_cierre)); ?></span><span id="id_read_off_numcomptehis_cierre" class="css_read_off_numcomptehis_cierre<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numcomptehis_cierre; ?>">
 <input class="sc-js-input scFormObjectOdd css_numcomptehis_cierre_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numcomptehis_cierre" type=text name="numcomptehis_cierre" value="<?php echo $this->form_encode_input($numcomptehis_cierre) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numcomptehis_cierre_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numcomptehis_cierre_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['birpara'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['first'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['back'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['forward'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_movcon_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_movcon_mob");
 parent.scAjaxDetailHeight("form_movcon_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_movcon_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_movcon_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['sc_modal'])
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_movcon_mob']['buttonStatus'] = $this->nmgp_botoes;
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
