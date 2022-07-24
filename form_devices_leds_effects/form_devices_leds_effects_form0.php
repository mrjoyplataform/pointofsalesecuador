<?php
class form_devices_leds_effects_form extends form_devices_leds_effects_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
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
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
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
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
 </style>
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
.css_read_off_ult_fecha_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_rfid_fecha_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_devices_leds_effects/form_devices_leds_effects_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_devices_leds_effects_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['last'] : 'off'); ?>";
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
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
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

include_once('form_devices_leds_effects_jquery.php');

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


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['link_info']['remove_border']) {
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
 include_once("form_devices_leds_effects_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php if (!isset($sc_check_excl)) {$sc_check_excl = array();} echo count($sc_check_excl); ?>; 
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
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<?php
$_SESSION['scriptcase']['error_span_title']['form_devices_leds_effects'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_devices_leds_effects'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['fast_search'][2] : "";
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
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['balterarsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['balterarsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['balterarsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['balterarsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['balterarsel'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterarsel", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "" . $buttonMacroDisabled . "", "", "");?>
 
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R")
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
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
$orderColRule = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult sc-col-title" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ((!isset($this->nmgp_cmp_hidden['cod_device_']) || $this->nmgp_cmp_hidden['cod_device_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['cod_device_'])) {
          $this->nm_new_label['cod_device_'] = "Cod Device"; } ?>
<?php
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;

        // label
        $label_labelContent = $this->nm_new_label['cod_device_'];
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
?>

    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_cod_device__label sc-col-title" id="hidden_field_label_cod_device_" style="<?php echo $sStyleHidden_cod_device_; ?>" > <?php echo $label_final ?> </TD>
   <?php $this->form_fixed_column_no++;}?>

   <?php
    $sStyleHidden_device_name_ = '';
    if (isset($this->nmgp_cmp_hidden['device_name_']) && $this->nmgp_cmp_hidden['device_name_'] == 'off') {
        $sStyleHidden_device_name_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['device_name_']) || $this->nmgp_cmp_hidden['device_name_'] == 'on') {
        if (!isset($this->nm_new_label['device_name_'])) {
            $this->nm_new_label['device_name_'] = "Device Name";
        }
        $SC_Label = "" . $this->nm_new_label['device_name_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_device_name__label sc-col-title" id="hidden_field_label_device_name_" style="<?php echo $sStyleHidden_device_name_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_ledstripe1_ = '';
    if (isset($this->nmgp_cmp_hidden['ledstripe1_']) && $this->nmgp_cmp_hidden['ledstripe1_'] == 'off') {
        $sStyleHidden_ledstripe1_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['ledstripe1_']) || $this->nmgp_cmp_hidden['ledstripe1_'] == 'on') {
        if (!isset($this->nm_new_label['ledstripe1_'])) {
            $this->nm_new_label['ledstripe1_'] = "Ledstripe 1";
        }
        $SC_Label = "" . $this->nm_new_label['ledstripe1_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_ledstripe1__label sc-col-title" id="hidden_field_label_ledstripe1_" style="<?php echo $sStyleHidden_ledstripe1_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_ledstripe2_ = '';
    if (isset($this->nmgp_cmp_hidden['ledstripe2_']) && $this->nmgp_cmp_hidden['ledstripe2_'] == 'off') {
        $sStyleHidden_ledstripe2_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['ledstripe2_']) || $this->nmgp_cmp_hidden['ledstripe2_'] == 'on') {
        if (!isset($this->nm_new_label['ledstripe2_'])) {
            $this->nm_new_label['ledstripe2_'] = "Ledstripe 2";
        }
        $SC_Label = "" . $this->nm_new_label['ledstripe2_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_ledstripe2__label sc-col-title" id="hidden_field_label_ledstripe2_" style="<?php echo $sStyleHidden_ledstripe2_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_ledstripe3_ = '';
    if (isset($this->nmgp_cmp_hidden['ledstripe3_']) && $this->nmgp_cmp_hidden['ledstripe3_'] == 'off') {
        $sStyleHidden_ledstripe3_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['ledstripe3_']) || $this->nmgp_cmp_hidden['ledstripe3_'] == 'on') {
        if (!isset($this->nm_new_label['ledstripe3_'])) {
            $this->nm_new_label['ledstripe3_'] = "Ledstripe 3";
        }
        $SC_Label = "" . $this->nm_new_label['ledstripe3_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_ledstripe3__label sc-col-title" id="hidden_field_label_ledstripe3_" style="<?php echo $sStyleHidden_ledstripe3_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_ledstripe4_ = '';
    if (isset($this->nmgp_cmp_hidden['ledstripe4_']) && $this->nmgp_cmp_hidden['ledstripe4_'] == 'off') {
        $sStyleHidden_ledstripe4_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['ledstripe4_']) || $this->nmgp_cmp_hidden['ledstripe4_'] == 'on') {
        if (!isset($this->nm_new_label['ledstripe4_'])) {
            $this->nm_new_label['ledstripe4_'] = "Ledstripe 4";
        }
        $SC_Label = "" . $this->nm_new_label['ledstripe4_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_ledstripe4__label sc-col-title" id="hidden_field_label_ledstripe4_" style="<?php echo $sStyleHidden_ledstripe4_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_color_ = '';
    if (isset($this->nmgp_cmp_hidden['color_']) && $this->nmgp_cmp_hidden['color_'] == 'off') {
        $sStyleHidden_color_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['color_']) || $this->nmgp_cmp_hidden['color_'] == 'on') {
        if (!isset($this->nm_new_label['color_'])) {
            $this->nm_new_label['color_'] = "Color";
        }
        $SC_Label = "" . $this->nm_new_label['color_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_color__label sc-col-title" id="hidden_field_label_color_" style="<?php echo $sStyleHidden_color_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     orderColRule = "<?php echo $orderColRule ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   $sc_hidden_no = 1; $sc_hidden_yes = 0;
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_devices_leds_effects);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_devices_leds_effects = $this->form_vert_form_devices_leds_effects;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_devices_leds_effects))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cod_device_']))
           {
               $this->nmgp_cmp_readonly['cod_device_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['device_name_']))
           {
               $this->nmgp_cmp_readonly['device_name_'] = 'on';
           }
   foreach ($this->form_vert_form_devices_leds_effects as $sc_seq_vert => $sc_lixo)
   {
       $this->form_fixed_column_no = 0;
       $this->loadRecordState($sc_seq_vert);
       $this->cod_activo_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_activo_'];
       $this->cod_grupo_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_grupo_'];
       $this->activa_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['activa_'];
       $this->estado_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['estado_'];
       $this->ult_rfid_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_rfid_'];
       $this->ult_fecha_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ult_fecha_'];
       $this->valor_default_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['valor_default_'];
       $this->acepta_tiempo_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['acepta_tiempo_'];
       $this->acepta_tokens_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['acepta_tokens_'];
       $this->dev_ip_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['dev_ip_'];
       $this->tipo_dev_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tipo_dev_'];
       $this->direccion_torno_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['direccion_torno_'];
       $this->timeout_rfid_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['timeout_rfid_'];
       $this->discapacitado_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['discapacitado_'];
       $this->numcaja_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['numcaja_'];
       $this->empleado_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['empleado_'];
       $this->tokens_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tokens_'];
       $this->serialrfid_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['serialrfid_'];
       $this->bidireccion_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['bidireccion_'];
       $this->cod_devicee_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_devicee_'];
       $this->url_1_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_1_'];
       $this->url_2_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_2_'];
       $this->url_3_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_3_'];
       $this->foto1_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto1_'];
       $this->foto2_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto2_'];
       $this->foto3_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['foto3_'];
       $this->pin_relay1_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['pin_relay1_'];
       $this->pin_relay2_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['pin_relay2_'];
       $this->rfid_read_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_read_'];
       $this->rfid_estado_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_estado_'];
       $this->rfid_fecha_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['rfid_fecha_'];
       $this->url_accion_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_accion_'];
       $this->url_atraccion_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_atraccion_'];
       $this->uhfip_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['uhfip_'];
       $this->url_reader_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_reader_'];
       $this->cod_rfid900_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_rfid900_'];
       $this->mensaje_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['mensaje_'];
       $this->tipolector_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['tipolector_'];
       $this->url_accion_bg_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_accion_bg_'];
       $this->url_inicio_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['url_inicio_'];
       $this->lasteffect_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['lasteffect_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['cod_device_'] = true;
           $this->nmgp_cmp_readonly['device_name_'] = true;
           $this->nmgp_cmp_readonly['ledstripe1_'] = true;
           $this->nmgp_cmp_readonly['ledstripe2_'] = true;
           $this->nmgp_cmp_readonly['ledstripe3_'] = true;
           $this->nmgp_cmp_readonly['ledstripe4_'] = true;
           $this->nmgp_cmp_readonly['color_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['cod_device_']) || $this->nmgp_cmp_readonly['cod_device_'] != "on") {$this->nmgp_cmp_readonly['cod_device_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['device_name_']) || $this->nmgp_cmp_readonly['device_name_'] != "on") {$this->nmgp_cmp_readonly['device_name_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ledstripe1_']) || $this->nmgp_cmp_readonly['ledstripe1_'] != "on") {$this->nmgp_cmp_readonly['ledstripe1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ledstripe2_']) || $this->nmgp_cmp_readonly['ledstripe2_'] != "on") {$this->nmgp_cmp_readonly['ledstripe2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ledstripe3_']) || $this->nmgp_cmp_readonly['ledstripe3_'] != "on") {$this->nmgp_cmp_readonly['ledstripe3_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ledstripe4_']) || $this->nmgp_cmp_readonly['ledstripe4_'] != "on") {$this->nmgp_cmp_readonly['ledstripe4_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['color_']) || $this->nmgp_cmp_readonly['color_'] != "on") {$this->nmgp_cmp_readonly['color_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->cod_device_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['cod_device_']; 
       $cod_device_ = $this->cod_device_; 
       $sStyleHidden_cod_device_ = '';
       if (isset($sCheckRead_cod_device_))
       {
           unset($sCheckRead_cod_device_);
       }
       if (isset($this->nmgp_cmp_readonly['cod_device_']))
       {
           $sCheckRead_cod_device_ = $this->nmgp_cmp_readonly['cod_device_'];
       }
       if (isset($this->nmgp_cmp_hidden['cod_device_']) && $this->nmgp_cmp_hidden['cod_device_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cod_device_']);
           $sStyleHidden_cod_device_ = 'display: none;';
       }
       $bTestReadOnly_cod_device_ = true;
       $sStyleReadLab_cod_device_ = 'display: none;';
       $sStyleReadInp_cod_device_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cod_device_"]) &&  $this->nmgp_cmp_readonly["cod_device_"] == "on"))
       {
           $bTestReadOnly_cod_device_ = false;
           unset($this->nmgp_cmp_readonly['cod_device_']);
           $sStyleReadLab_cod_device_ = '';
           $sStyleReadInp_cod_device_ = 'display: none;';
       }
       $this->device_name_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['device_name_']; 
       $device_name_ = $this->device_name_; 
       $sStyleHidden_device_name_ = '';
       if (isset($sCheckRead_device_name_))
       {
           unset($sCheckRead_device_name_);
       }
       if (isset($this->nmgp_cmp_readonly['device_name_']))
       {
           $sCheckRead_device_name_ = $this->nmgp_cmp_readonly['device_name_'];
       }
       if (isset($this->nmgp_cmp_hidden['device_name_']) && $this->nmgp_cmp_hidden['device_name_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['device_name_']);
           $sStyleHidden_device_name_ = 'display: none;';
       }
       $bTestReadOnly_device_name_ = true;
       $sStyleReadLab_device_name_ = 'display: none;';
       $sStyleReadInp_device_name_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["device_name_"]) &&  $this->nmgp_cmp_readonly["device_name_"] == "on"))
       {
           $bTestReadOnly_device_name_ = false;
           unset($this->nmgp_cmp_readonly['device_name_']);
           $sStyleReadLab_device_name_ = '';
           $sStyleReadInp_device_name_ = 'display: none;';
       }
       $this->ledstripe1_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe1_']; 
       $ledstripe1_ = $this->ledstripe1_; 
       $sStyleHidden_ledstripe1_ = '';
       if (isset($sCheckRead_ledstripe1_))
       {
           unset($sCheckRead_ledstripe1_);
       }
       if (isset($this->nmgp_cmp_readonly['ledstripe1_']))
       {
           $sCheckRead_ledstripe1_ = $this->nmgp_cmp_readonly['ledstripe1_'];
       }
       if (isset($this->nmgp_cmp_hidden['ledstripe1_']) && $this->nmgp_cmp_hidden['ledstripe1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ledstripe1_']);
           $sStyleHidden_ledstripe1_ = 'display: none;';
       }
       $bTestReadOnly_ledstripe1_ = true;
       $sStyleReadLab_ledstripe1_ = 'display: none;';
       $sStyleReadInp_ledstripe1_ = '';
       if (isset($this->nmgp_cmp_readonly['ledstripe1_']) && $this->nmgp_cmp_readonly['ledstripe1_'] == 'on')
       {
           $bTestReadOnly_ledstripe1_ = false;
           unset($this->nmgp_cmp_readonly['ledstripe1_']);
           $sStyleReadLab_ledstripe1_ = '';
           $sStyleReadInp_ledstripe1_ = 'display: none;';
       }
       $this->ledstripe2_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe2_']; 
       $ledstripe2_ = $this->ledstripe2_; 
       $sStyleHidden_ledstripe2_ = '';
       if (isset($sCheckRead_ledstripe2_))
       {
           unset($sCheckRead_ledstripe2_);
       }
       if (isset($this->nmgp_cmp_readonly['ledstripe2_']))
       {
           $sCheckRead_ledstripe2_ = $this->nmgp_cmp_readonly['ledstripe2_'];
       }
       if (isset($this->nmgp_cmp_hidden['ledstripe2_']) && $this->nmgp_cmp_hidden['ledstripe2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ledstripe2_']);
           $sStyleHidden_ledstripe2_ = 'display: none;';
       }
       $bTestReadOnly_ledstripe2_ = true;
       $sStyleReadLab_ledstripe2_ = 'display: none;';
       $sStyleReadInp_ledstripe2_ = '';
       if (isset($this->nmgp_cmp_readonly['ledstripe2_']) && $this->nmgp_cmp_readonly['ledstripe2_'] == 'on')
       {
           $bTestReadOnly_ledstripe2_ = false;
           unset($this->nmgp_cmp_readonly['ledstripe2_']);
           $sStyleReadLab_ledstripe2_ = '';
           $sStyleReadInp_ledstripe2_ = 'display: none;';
       }
       $this->ledstripe3_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe3_']; 
       $ledstripe3_ = $this->ledstripe3_; 
       $sStyleHidden_ledstripe3_ = '';
       if (isset($sCheckRead_ledstripe3_))
       {
           unset($sCheckRead_ledstripe3_);
       }
       if (isset($this->nmgp_cmp_readonly['ledstripe3_']))
       {
           $sCheckRead_ledstripe3_ = $this->nmgp_cmp_readonly['ledstripe3_'];
       }
       if (isset($this->nmgp_cmp_hidden['ledstripe3_']) && $this->nmgp_cmp_hidden['ledstripe3_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ledstripe3_']);
           $sStyleHidden_ledstripe3_ = 'display: none;';
       }
       $bTestReadOnly_ledstripe3_ = true;
       $sStyleReadLab_ledstripe3_ = 'display: none;';
       $sStyleReadInp_ledstripe3_ = '';
       if (isset($this->nmgp_cmp_readonly['ledstripe3_']) && $this->nmgp_cmp_readonly['ledstripe3_'] == 'on')
       {
           $bTestReadOnly_ledstripe3_ = false;
           unset($this->nmgp_cmp_readonly['ledstripe3_']);
           $sStyleReadLab_ledstripe3_ = '';
           $sStyleReadInp_ledstripe3_ = 'display: none;';
       }
       $this->ledstripe4_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['ledstripe4_']; 
       $ledstripe4_ = $this->ledstripe4_; 
       $sStyleHidden_ledstripe4_ = '';
       if (isset($sCheckRead_ledstripe4_))
       {
           unset($sCheckRead_ledstripe4_);
       }
       if (isset($this->nmgp_cmp_readonly['ledstripe4_']))
       {
           $sCheckRead_ledstripe4_ = $this->nmgp_cmp_readonly['ledstripe4_'];
       }
       if (isset($this->nmgp_cmp_hidden['ledstripe4_']) && $this->nmgp_cmp_hidden['ledstripe4_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ledstripe4_']);
           $sStyleHidden_ledstripe4_ = 'display: none;';
       }
       $bTestReadOnly_ledstripe4_ = true;
       $sStyleReadLab_ledstripe4_ = 'display: none;';
       $sStyleReadInp_ledstripe4_ = '';
       if (isset($this->nmgp_cmp_readonly['ledstripe4_']) && $this->nmgp_cmp_readonly['ledstripe4_'] == 'on')
       {
           $bTestReadOnly_ledstripe4_ = false;
           unset($this->nmgp_cmp_readonly['ledstripe4_']);
           $sStyleReadLab_ledstripe4_ = '';
           $sStyleReadInp_ledstripe4_ = 'display: none;';
       }
       $this->color_ = $this->form_vert_form_devices_leds_effects[$sc_seq_vert]['color_']; 
       $color_ = $this->color_; 
       $sStyleHidden_color_ = '';
       if (isset($sCheckRead_color_))
       {
           unset($sCheckRead_color_);
       }
       if (isset($this->nmgp_cmp_readonly['color_']))
       {
           $sCheckRead_color_ = $this->nmgp_cmp_readonly['color_'];
       }
       if (isset($this->nmgp_cmp_hidden['color_']) && $this->nmgp_cmp_hidden['color_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['color_']);
           $sStyleHidden_color_ = 'display: none;';
       }
       $bTestReadOnly_color_ = true;
       $sStyleReadLab_color_ = 'display: none;';
       $sStyleReadInp_color_ = '';
       if (isset($this->nmgp_cmp_readonly['color_']) && $this->nmgp_cmp_readonly['color_'] == 'on')
       {
           $bTestReadOnly_color_ = false;
           unset($this->nmgp_cmp_readonly['color_']);
           $sStyleReadLab_color_ = '';
           $sStyleReadInp_color_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?> class="sc-row" data-sc-row-number="<?php echo $sc_seq_vert; ?>">


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_devices_leds_effects_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_devices_leds_effects_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_devices_leds_effects_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_devices_leds_effects_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_devices_leds_effects_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_devices_leds_effects_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['cod_device_']) && $this->nmgp_cmp_hidden['cod_device_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_device_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_device_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_cod_device__line" id="hidden_field_data_cod_device_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cod_device_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cod_device__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_cod_device_<?php echo $sc_seq_vert ?>" class="css_cod_device__line" style="<?php echo $sStyleReadLab_cod_device_; ?>"><?php echo $this->form_format_readonly("cod_device_", $this->form_encode_input($this->cod_device_)); ?></span><span id="id_read_off_cod_device_<?php echo $sc_seq_vert ?>" class="css_read_off_cod_device_" style="<?php echo $sStyleReadInp_cod_device_; ?>"><input type="hidden" id="id_sc_field_cod_device_<?php echo $sc_seq_vert ?>" name="cod_device_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_device_) . "\">"?>
<span id="id_ajax_label_cod_device_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($cod_device_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_device_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_device_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['device_name_']) && $this->nmgp_cmp_hidden['device_name_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="device_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($device_name_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_device_name__line" id="hidden_field_data_device_name_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_device_name_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_device_name__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_device_name_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["device_name_"]) &&  $this->nmgp_cmp_readonly["device_name_"] == "on")) { 

 ?>
<input type="hidden" name="device_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($device_name_) . "\"><span id=\"id_ajax_label_device_name_" . $sc_seq_vert . "\">" . $device_name_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_device_name_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-device_name_<?php echo $sc_seq_vert ?> css_device_name__line" style="<?php echo $sStyleReadLab_device_name_; ?>"><?php echo $this->form_format_readonly("device_name_", $this->form_encode_input($this->device_name_)); ?></span><span id="id_read_off_device_name_<?php echo $sc_seq_vert ?>" class="css_read_off_device_name_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_device_name_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_device_name__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_device_name_<?php echo $sc_seq_vert ?>" type=text name="device_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($device_name_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_device_name_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_device_name_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ledstripe1_']) && $this->nmgp_cmp_hidden['ledstripe1_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="ledstripe1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->ledstripe1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ledstripe1__line" id="hidden_field_data_ledstripe1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ledstripe1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ledstripe1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ledstripe1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ledstripe1_"]) &&  $this->nmgp_cmp_readonly["ledstripe1_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'] = array(); 
    }

   $old_value_cod_device_ = $this->cod_device_;
   $this->nm_tira_formatacao();


   $unformatted_value_cod_device_ = $this->cod_device_;

   $nm_comando = "SELECT comando, descrip  FROM ledeffects  ORDER BY descrip";

   $this->cod_device_ = $old_value_cod_device_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $ledstripe1__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ledstripe1__1))
          {
              foreach ($this->ledstripe1__1 as $tmp_ledstripe1_)
              {
                  if (trim($tmp_ledstripe1_) === trim($cadaselect[1])) { $ledstripe1__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ledstripe1_) === trim($cadaselect[1])) { $ledstripe1__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="ledstripe1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe1_) . "\">" . $ledstripe1__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_ledstripe1_();
   $x = 0 ; 
   $ledstripe1__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->ledstripe1__1))
          {
              foreach ($this->ledstripe1__1 as $tmp_ledstripe1_)
              {
                  if (trim($tmp_ledstripe1_) === trim($cadaselect[1])) { $ledstripe1__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->ledstripe1_) === trim($cadaselect[1])) { $ledstripe1__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($ledstripe1__look))
          {
              $ledstripe1__look = $this->ledstripe1_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_ledstripe1_" . $sc_seq_vert . "\" class=\"css_ledstripe1__line\" style=\"" .  $sStyleReadLab_ledstripe1_ . "\">" . $this->form_format_readonly("ledstripe1_", $this->form_encode_input($ledstripe1__look)) . "</span><span id=\"id_read_off_ledstripe1_" . $sc_seq_vert . "\" class=\"css_read_off_ledstripe1_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_ledstripe1_ . "\">";
   echo " <span id=\"idAjaxSelect_ledstripe1_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_ledstripe1__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_ledstripe1_" . $sc_seq_vert . "\" name=\"ledstripe1_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['Lookup_ledstripe1_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->ledstripe1_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->ledstripe1_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ledstripe1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ledstripe1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ledstripe2_']) && $this->nmgp_cmp_hidden['ledstripe2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ledstripe2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ledstripe2__line" id="hidden_field_data_ledstripe2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ledstripe2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ledstripe2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ledstripe2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ledstripe2_"]) &&  $this->nmgp_cmp_readonly["ledstripe2_"] == "on") { 

 ?>
<input type="hidden" name="ledstripe2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe2_) . "\">" . $ledstripe2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ledstripe2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ledstripe2_<?php echo $sc_seq_vert ?> css_ledstripe2__line" style="<?php echo $sStyleReadLab_ledstripe2_; ?>"><?php echo $this->form_format_readonly("ledstripe2_", $this->form_encode_input($this->ledstripe2_)); ?></span><span id="id_read_off_ledstripe2_<?php echo $sc_seq_vert ?>" class="css_read_off_ledstripe2_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ledstripe2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ledstripe2__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ledstripe2_<?php echo $sc_seq_vert ?>" type=text name="ledstripe2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe2_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ledstripe2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ledstripe2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ledstripe3_']) && $this->nmgp_cmp_hidden['ledstripe3_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ledstripe3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe3_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ledstripe3__line" id="hidden_field_data_ledstripe3_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ledstripe3_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ledstripe3__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ledstripe3_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ledstripe3_"]) &&  $this->nmgp_cmp_readonly["ledstripe3_"] == "on") { 

 ?>
<input type="hidden" name="ledstripe3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe3_) . "\">" . $ledstripe3_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ledstripe3_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ledstripe3_<?php echo $sc_seq_vert ?> css_ledstripe3__line" style="<?php echo $sStyleReadLab_ledstripe3_; ?>"><?php echo $this->form_format_readonly("ledstripe3_", $this->form_encode_input($this->ledstripe3_)); ?></span><span id="id_read_off_ledstripe3_<?php echo $sc_seq_vert ?>" class="css_read_off_ledstripe3_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ledstripe3_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ledstripe3__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ledstripe3_<?php echo $sc_seq_vert ?>" type=text name="ledstripe3_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe3_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ledstripe3_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ledstripe3_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ledstripe4_']) && $this->nmgp_cmp_hidden['ledstripe4_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ledstripe4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe4_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ledstripe4__line" id="hidden_field_data_ledstripe4_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ledstripe4_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ledstripe4__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ledstripe4_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ledstripe4_"]) &&  $this->nmgp_cmp_readonly["ledstripe4_"] == "on") { 

 ?>
<input type="hidden" name="ledstripe4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe4_) . "\">" . $ledstripe4_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ledstripe4_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ledstripe4_<?php echo $sc_seq_vert ?> css_ledstripe4__line" style="<?php echo $sStyleReadLab_ledstripe4_; ?>"><?php echo $this->form_format_readonly("ledstripe4_", $this->form_encode_input($this->ledstripe4_)); ?></span><span id="id_read_off_ledstripe4_<?php echo $sc_seq_vert ?>" class="css_read_off_ledstripe4_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ledstripe4_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ledstripe4__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ledstripe4_<?php echo $sc_seq_vert ?>" type=text name="ledstripe4_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe4_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ledstripe4_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ledstripe4_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['color_']) && $this->nmgp_cmp_hidden['color_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="color_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($color_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_color__line" id="hidden_field_data_color_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_color_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_color__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_color_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["color_"]) &&  $this->nmgp_cmp_readonly["color_"] == "on") { 

 ?>
<input type="hidden" name="color_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($color_) . "\">" . $color_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_color_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-color_<?php echo $sc_seq_vert ?> css_color__line" style="<?php echo $sStyleReadLab_color_; ?>"><?php echo $this->form_format_readonly("color_", $this->form_encode_input($this->color_)); ?></span><span id="id_read_off_color_<?php echo $sc_seq_vert ?>" class="css_read_off_color_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_color_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_color__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_color_<?php echo $sc_seq_vert ?>" type=text name="color_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($color_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_color_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_color_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_cod_device_))
       {
           $this->nmgp_cmp_readonly['cod_device_'] = $sCheckRead_cod_device_;
       }
       if ('display: none;' == $sStyleHidden_cod_device_)
       {
           $this->nmgp_cmp_hidden['cod_device_'] = 'off';
       }
       if (isset($sCheckRead_device_name_))
       {
           $this->nmgp_cmp_readonly['device_name_'] = $sCheckRead_device_name_;
       }
       if ('display: none;' == $sStyleHidden_device_name_)
       {
           $this->nmgp_cmp_hidden['device_name_'] = 'off';
       }
       if (isset($sCheckRead_ledstripe1_))
       {
           $this->nmgp_cmp_readonly['ledstripe1_'] = $sCheckRead_ledstripe1_;
       }
       if ('display: none;' == $sStyleHidden_ledstripe1_)
       {
           $this->nmgp_cmp_hidden['ledstripe1_'] = 'off';
       }
       if (isset($sCheckRead_ledstripe2_))
       {
           $this->nmgp_cmp_readonly['ledstripe2_'] = $sCheckRead_ledstripe2_;
       }
       if ('display: none;' == $sStyleHidden_ledstripe2_)
       {
           $this->nmgp_cmp_hidden['ledstripe2_'] = 'off';
       }
       if (isset($sCheckRead_ledstripe3_))
       {
           $this->nmgp_cmp_readonly['ledstripe3_'] = $sCheckRead_ledstripe3_;
       }
       if ('display: none;' == $sStyleHidden_ledstripe3_)
       {
           $this->nmgp_cmp_hidden['ledstripe3_'] = 'off';
       }
       if (isset($sCheckRead_ledstripe4_))
       {
           $this->nmgp_cmp_readonly['ledstripe4_'] = $sCheckRead_ledstripe4_;
       }
       if ('display: none;' == $sStyleHidden_ledstripe4_)
       {
           $this->nmgp_cmp_hidden['ledstripe4_'] = 'off';
       }
       if (isset($sCheckRead_color_))
       {
           $this->nmgp_cmp_readonly['color_'] = $sCheckRead_color_;
       }
       if ('display: none;' == $sStyleHidden_color_)
       {
           $this->nmgp_cmp_hidden['color_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_devices_leds_effects = $guarda_form_vert_form_devices_leds_effects;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
 <div id="sc-id-fixedheaders-placeholder" style="display: none; position: fixed; top: 0; z-index: 500"></div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr> 
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['birpara'];
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
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "" . $buttonMacroDisabled . "", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

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
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_devices_leds_effects");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_devices_leds_effects");
 parent.scAjaxDetailHeight("form_devices_leds_effects", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_devices_leds_effects", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_devices_leds_effects", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['sc_modal'])
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
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-1").length && $("#sc_b_upd_t.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
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
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-5").length && $("#sc_b_ini_b.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-6").length && $("#sc_b_ret_b.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-7").length && $("#sc_b_avc_b.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-8").length && $("#sc_b_fim_b.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-8").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_leds_effects']['buttonStatus'] = $this->nmgp_botoes;
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
<?php 
 } 
} 
?> 
