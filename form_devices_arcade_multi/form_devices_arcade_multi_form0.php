<?php
class form_devices_arcade_multi_form extends form_devices_arcade_multi_apl
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_devices_arcade_multi/form_devices_arcade_multi_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_devices_arcade_multi_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_devices_arcade_multi_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['link_info']['remove_border']) {
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
 include_once("form_devices_arcade_multi_js0.php");
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
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_devices_arcade_multi'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_devices_arcade_multi'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['fast_search'][2] : "";
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
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['empty_filter'] = true;
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


       if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult sc-col-title" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
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
    $sStyleHidden_cod_activo_ = '';
    if (isset($this->nmgp_cmp_hidden['cod_activo_']) && $this->nmgp_cmp_hidden['cod_activo_'] == 'off') {
        $sStyleHidden_cod_activo_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['cod_activo_']) || $this->nmgp_cmp_hidden['cod_activo_'] == 'on') {
        if (!isset($this->nm_new_label['cod_activo_'])) {
            $this->nm_new_label['cod_activo_'] = "Cod Activo";
        }
        $SC_Label = "" . $this->nm_new_label['cod_activo_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_cod_activo__label sc-col-title" id="hidden_field_label_cod_activo_" style="<?php echo $sStyleHidden_cod_activo_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

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
    $sStyleHidden_activa_ = '';
    if (isset($this->nmgp_cmp_hidden['activa_']) && $this->nmgp_cmp_hidden['activa_'] == 'off') {
        $sStyleHidden_activa_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['activa_']) || $this->nmgp_cmp_hidden['activa_'] == 'on') {
        if (!isset($this->nm_new_label['activa_'])) {
            $this->nm_new_label['activa_'] = "Activa";
        }
        $SC_Label = "" . $this->nm_new_label['activa_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_activa__label sc-col-title" id="hidden_field_label_activa_" style="<?php echo $sStyleHidden_activa_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_estado_ = '';
    if (isset($this->nmgp_cmp_hidden['estado_']) && $this->nmgp_cmp_hidden['estado_'] == 'off') {
        $sStyleHidden_estado_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['estado_']) || $this->nmgp_cmp_hidden['estado_'] == 'on') {
        if (!isset($this->nm_new_label['estado_'])) {
            $this->nm_new_label['estado_'] = "Estado";
        }
        $SC_Label = "" . $this->nm_new_label['estado_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_estado__label sc-col-title" id="hidden_field_label_estado_" style="<?php echo $sStyleHidden_estado_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_ult_rfid_ = '';
    if (isset($this->nmgp_cmp_hidden['ult_rfid_']) && $this->nmgp_cmp_hidden['ult_rfid_'] == 'off') {
        $sStyleHidden_ult_rfid_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['ult_rfid_']) || $this->nmgp_cmp_hidden['ult_rfid_'] == 'on') {
        if (!isset($this->nm_new_label['ult_rfid_'])) {
            $this->nm_new_label['ult_rfid_'] = "Ult Rfid";
        }
        $SC_Label = "" . $this->nm_new_label['ult_rfid_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_ult_rfid__label sc-col-title" id="hidden_field_label_ult_rfid_" style="<?php echo $sStyleHidden_ult_rfid_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_ult_fecha_ = '';
    if (isset($this->nmgp_cmp_hidden['ult_fecha_']) && $this->nmgp_cmp_hidden['ult_fecha_'] == 'off') {
        $sStyleHidden_ult_fecha_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['ult_fecha_']) || $this->nmgp_cmp_hidden['ult_fecha_'] == 'on') {
        if (!isset($this->nm_new_label['ult_fecha_'])) {
            $this->nm_new_label['ult_fecha_'] = "Ult Fecha";
        }
        $SC_Label = "" . $this->nm_new_label['ult_fecha_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_ult_fecha__label sc-col-title" id="hidden_field_label_ult_fecha_" style="<?php echo $sStyleHidden_ult_fecha_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_timeout_rfid_ = '';
    if (isset($this->nmgp_cmp_hidden['timeout_rfid_']) && $this->nmgp_cmp_hidden['timeout_rfid_'] == 'off') {
        $sStyleHidden_timeout_rfid_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['timeout_rfid_']) || $this->nmgp_cmp_hidden['timeout_rfid_'] == 'on') {
        if (!isset($this->nm_new_label['timeout_rfid_'])) {
            $this->nm_new_label['timeout_rfid_'] = "Timeout Rfid";
        }
        $SC_Label = "" . $this->nm_new_label['timeout_rfid_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_timeout_rfid__label sc-col-title" id="hidden_field_label_timeout_rfid_" style="<?php echo $sStyleHidden_timeout_rfid_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_acepta_tokens_ = '';
    if (isset($this->nmgp_cmp_hidden['acepta_tokens_']) && $this->nmgp_cmp_hidden['acepta_tokens_'] == 'off') {
        $sStyleHidden_acepta_tokens_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['acepta_tokens_']) || $this->nmgp_cmp_hidden['acepta_tokens_'] == 'on') {
        if (!isset($this->nm_new_label['acepta_tokens_'])) {
            $this->nm_new_label['acepta_tokens_'] = "Acepta Tokens";
        }
        $SC_Label = "" . $this->nm_new_label['acepta_tokens_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_acepta_tokens__label sc-col-title" id="hidden_field_label_acepta_tokens_" style="<?php echo $sStyleHidden_acepta_tokens_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_tokens_ = '';
    if (isset($this->nmgp_cmp_hidden['tokens_']) && $this->nmgp_cmp_hidden['tokens_'] == 'off') {
        $sStyleHidden_tokens_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['tokens_']) || $this->nmgp_cmp_hidden['tokens_'] == 'on') {
        if (!isset($this->nm_new_label['tokens_'])) {
            $this->nm_new_label['tokens_'] = "Tokens";
        }
        $SC_Label = "" . $this->nm_new_label['tokens_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_tokens__label sc-col-title" id="hidden_field_label_tokens_" style="<?php echo $sStyleHidden_tokens_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_serialrfid_ = '';
    if (isset($this->nmgp_cmp_hidden['serialrfid_']) && $this->nmgp_cmp_hidden['serialrfid_'] == 'off') {
        $sStyleHidden_serialrfid_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['serialrfid_']) || $this->nmgp_cmp_hidden['serialrfid_'] == 'on') {
        if (!isset($this->nm_new_label['serialrfid_'])) {
            $this->nm_new_label['serialrfid_'] = "Serialrfid";
        }
        $SC_Label = "" . $this->nm_new_label['serialrfid_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_serialrfid__label sc-col-title" id="hidden_field_label_serialrfid_" style="<?php echo $sStyleHidden_serialrfid_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_bidireccion_ = '';
    if (isset($this->nmgp_cmp_hidden['bidireccion_']) && $this->nmgp_cmp_hidden['bidireccion_'] == 'off') {
        $sStyleHidden_bidireccion_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['bidireccion_']) || $this->nmgp_cmp_hidden['bidireccion_'] == 'on') {
        if (!isset($this->nm_new_label['bidireccion_'])) {
            $this->nm_new_label['bidireccion_'] = "Bidireccion";
        }
        $SC_Label = "" . $this->nm_new_label['bidireccion_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_bidireccion__label sc-col-title" id="hidden_field_label_bidireccion_" style="<?php echo $sStyleHidden_bidireccion_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_cod_devicee_ = '';
    if (isset($this->nmgp_cmp_hidden['cod_devicee_']) && $this->nmgp_cmp_hidden['cod_devicee_'] == 'off') {
        $sStyleHidden_cod_devicee_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['cod_devicee_']) || $this->nmgp_cmp_hidden['cod_devicee_'] == 'on') {
        if (!isset($this->nm_new_label['cod_devicee_'])) {
            $this->nm_new_label['cod_devicee_'] = "Cod Device E";
        }
        $SC_Label = "" . $this->nm_new_label['cod_devicee_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_cod_devicee__label sc-col-title" id="hidden_field_label_cod_devicee_" style="<?php echo $sStyleHidden_cod_devicee_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_pin_relay1_ = '';
    if (isset($this->nmgp_cmp_hidden['pin_relay1_']) && $this->nmgp_cmp_hidden['pin_relay1_'] == 'off') {
        $sStyleHidden_pin_relay1_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['pin_relay1_']) || $this->nmgp_cmp_hidden['pin_relay1_'] == 'on') {
        if (!isset($this->nm_new_label['pin_relay1_'])) {
            $this->nm_new_label['pin_relay1_'] = "Pin Relay 1";
        }
        $SC_Label = "" . $this->nm_new_label['pin_relay1_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_pin_relay1__label sc-col-title" id="hidden_field_label_pin_relay1_" style="<?php echo $sStyleHidden_pin_relay1_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_pin_relay2_ = '';
    if (isset($this->nmgp_cmp_hidden['pin_relay2_']) && $this->nmgp_cmp_hidden['pin_relay2_'] == 'off') {
        $sStyleHidden_pin_relay2_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['pin_relay2_']) || $this->nmgp_cmp_hidden['pin_relay2_'] == 'on') {
        if (!isset($this->nm_new_label['pin_relay2_'])) {
            $this->nm_new_label['pin_relay2_'] = "Pin Relay 2";
        }
        $SC_Label = "" . $this->nm_new_label['pin_relay2_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_pin_relay2__label sc-col-title" id="hidden_field_label_pin_relay2_" style="<?php echo $sStyleHidden_pin_relay2_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_url_accion_ = '';
    if (isset($this->nmgp_cmp_hidden['url_accion_']) && $this->nmgp_cmp_hidden['url_accion_'] == 'off') {
        $sStyleHidden_url_accion_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['url_accion_']) || $this->nmgp_cmp_hidden['url_accion_'] == 'on') {
        if (!isset($this->nm_new_label['url_accion_'])) {
            $this->nm_new_label['url_accion_'] = "Url Accion";
        }
        $SC_Label = "" . $this->nm_new_label['url_accion_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_url_accion__label sc-col-title" id="hidden_field_label_url_accion_" style="<?php echo $sStyleHidden_url_accion_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_url_atraccion_ = '';
    if (isset($this->nmgp_cmp_hidden['url_atraccion_']) && $this->nmgp_cmp_hidden['url_atraccion_'] == 'off') {
        $sStyleHidden_url_atraccion_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['url_atraccion_']) || $this->nmgp_cmp_hidden['url_atraccion_'] == 'on') {
        if (!isset($this->nm_new_label['url_atraccion_'])) {
            $this->nm_new_label['url_atraccion_'] = "Url Atraccion";
        }
        $SC_Label = "" . $this->nm_new_label['url_atraccion_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_url_atraccion__label sc-col-title" id="hidden_field_label_url_atraccion_" style="<?php echo $sStyleHidden_url_atraccion_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_uhfip_ = '';
    if (isset($this->nmgp_cmp_hidden['uhfip_']) && $this->nmgp_cmp_hidden['uhfip_'] == 'off') {
        $sStyleHidden_uhfip_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['uhfip_']) || $this->nmgp_cmp_hidden['uhfip_'] == 'on') {
        if (!isset($this->nm_new_label['uhfip_'])) {
            $this->nm_new_label['uhfip_'] = "Uhfip";
        }
        $SC_Label = "" . $this->nm_new_label['uhfip_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_uhfip__label sc-col-title" id="hidden_field_label_uhfip_" style="<?php echo $sStyleHidden_uhfip_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_url_reader_ = '';
    if (isset($this->nmgp_cmp_hidden['url_reader_']) && $this->nmgp_cmp_hidden['url_reader_'] == 'off') {
        $sStyleHidden_url_reader_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['url_reader_']) || $this->nmgp_cmp_hidden['url_reader_'] == 'on') {
        if (!isset($this->nm_new_label['url_reader_'])) {
            $this->nm_new_label['url_reader_'] = "Url Reader";
        }
        $SC_Label = "" . $this->nm_new_label['url_reader_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_url_reader__label sc-col-title" id="hidden_field_label_url_reader_" style="<?php echo $sStyleHidden_url_reader_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_cod_rfid900_ = '';
    if (isset($this->nmgp_cmp_hidden['cod_rfid900_']) && $this->nmgp_cmp_hidden['cod_rfid900_'] == 'off') {
        $sStyleHidden_cod_rfid900_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['cod_rfid900_']) || $this->nmgp_cmp_hidden['cod_rfid900_'] == 'on') {
        if (!isset($this->nm_new_label['cod_rfid900_'])) {
            $this->nm_new_label['cod_rfid900_'] = "Cod Rfid 900";
        }
        $SC_Label = "" . $this->nm_new_label['cod_rfid900_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_cod_rfid900__label sc-col-title" id="hidden_field_label_cod_rfid900_" style="<?php echo $sStyleHidden_cod_rfid900_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_mensaje_ = '';
    if (isset($this->nmgp_cmp_hidden['mensaje_']) && $this->nmgp_cmp_hidden['mensaje_'] == 'off') {
        $sStyleHidden_mensaje_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['mensaje_']) || $this->nmgp_cmp_hidden['mensaje_'] == 'on') {
        if (!isset($this->nm_new_label['mensaje_'])) {
            $this->nm_new_label['mensaje_'] = "Mensaje";
        }
        $SC_Label = "" . $this->nm_new_label['mensaje_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_mensaje__label sc-col-title" id="hidden_field_label_mensaje_" style="<?php echo $sStyleHidden_mensaje_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_tipolector_ = '';
    if (isset($this->nmgp_cmp_hidden['tipolector_']) && $this->nmgp_cmp_hidden['tipolector_'] == 'off') {
        $sStyleHidden_tipolector_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['tipolector_']) || $this->nmgp_cmp_hidden['tipolector_'] == 'on') {
        if (!isset($this->nm_new_label['tipolector_'])) {
            $this->nm_new_label['tipolector_'] = "Tipolector";
        }
        $SC_Label = "" . $this->nm_new_label['tipolector_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_tipolector__label sc-col-title" id="hidden_field_label_tipolector_" style="<?php echo $sStyleHidden_tipolector_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_url_accion_bg_ = '';
    if (isset($this->nmgp_cmp_hidden['url_accion_bg_']) && $this->nmgp_cmp_hidden['url_accion_bg_'] == 'off') {
        $sStyleHidden_url_accion_bg_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['url_accion_bg_']) || $this->nmgp_cmp_hidden['url_accion_bg_'] == 'on') {
        if (!isset($this->nm_new_label['url_accion_bg_'])) {
            $this->nm_new_label['url_accion_bg_'] = "Url Accion Bg";
        }
        $SC_Label = "" . $this->nm_new_label['url_accion_bg_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_url_accion_bg__label sc-col-title" id="hidden_field_label_url_accion_bg_" style="<?php echo $sStyleHidden_url_accion_bg_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_url_inicio_ = '';
    if (isset($this->nmgp_cmp_hidden['url_inicio_']) && $this->nmgp_cmp_hidden['url_inicio_'] == 'off') {
        $sStyleHidden_url_inicio_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['url_inicio_']) || $this->nmgp_cmp_hidden['url_inicio_'] == 'on') {
        if (!isset($this->nm_new_label['url_inicio_'])) {
            $this->nm_new_label['url_inicio_'] = "Url Inicio";
        }
        $SC_Label = "" . $this->nm_new_label['url_inicio_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_url_inicio__label sc-col-title" id="hidden_field_label_url_inicio_" style="<?php echo $sStyleHidden_url_inicio_; ?>" > <?php echo $label_final ?> </TD>
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
    $sStyleHidden_lasteffect_ = '';
    if (isset($this->nmgp_cmp_hidden['lasteffect_']) && $this->nmgp_cmp_hidden['lasteffect_'] == 'off') {
        $sStyleHidden_lasteffect_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['lasteffect_']) || $this->nmgp_cmp_hidden['lasteffect_'] == 'on') {
        if (!isset($this->nm_new_label['lasteffect_'])) {
            $this->nm_new_label['lasteffect_'] = "Lasteffect";
        }
        $SC_Label = "" . $this->nm_new_label['lasteffect_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_lasteffect__label sc-col-title" id="hidden_field_label_lasteffect_" style="<?php echo $sStyleHidden_lasteffect_; ?>" > <?php echo $label_final ?> </TD>
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

   <?php
    $sStyleHidden_sound_ = '';
    if (isset($this->nmgp_cmp_hidden['sound_']) && $this->nmgp_cmp_hidden['sound_'] == 'off') {
        $sStyleHidden_sound_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['sound_']) || $this->nmgp_cmp_hidden['sound_'] == 'on') {
        if (!isset($this->nm_new_label['sound_'])) {
            $this->nm_new_label['sound_'] = "Sound";
        }
        $SC_Label = "" . $this->nm_new_label['sound_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_sound__label sc-col-title" id="hidden_field_label_sound_" style="<?php echo $sStyleHidden_sound_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_points_ = '';
    if (isset($this->nmgp_cmp_hidden['points_']) && $this->nmgp_cmp_hidden['points_'] == 'off') {
        $sStyleHidden_points_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['points_']) || $this->nmgp_cmp_hidden['points_'] == 'on') {
        if (!isset($this->nm_new_label['points_'])) {
            $this->nm_new_label['points_'] = "Points";
        }
        $SC_Label = "" . $this->nm_new_label['points_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_points__label sc-col-title" id="hidden_field_label_points_" style="<?php echo $sStyleHidden_points_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_speak_ = '';
    if (isset($this->nmgp_cmp_hidden['speak_']) && $this->nmgp_cmp_hidden['speak_'] == 'off') {
        $sStyleHidden_speak_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['speak_']) || $this->nmgp_cmp_hidden['speak_'] == 'on') {
        if (!isset($this->nm_new_label['speak_'])) {
            $this->nm_new_label['speak_'] = "Speak";
        }
        $SC_Label = "" . $this->nm_new_label['speak_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_speak__label sc-col-title" id="hidden_field_label_speak_" style="<?php echo $sStyleHidden_speak_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_typereader_ = '';
    if (isset($this->nmgp_cmp_hidden['typereader_']) && $this->nmgp_cmp_hidden['typereader_'] == 'off') {
        $sStyleHidden_typereader_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['typereader_']) || $this->nmgp_cmp_hidden['typereader_'] == 'on') {
        if (!isset($this->nm_new_label['typereader_'])) {
            $this->nm_new_label['typereader_'] = "Typereader";
        }
        $SC_Label = "" . $this->nm_new_label['typereader_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_typereader__label sc-col-title" id="hidden_field_label_typereader_" style="<?php echo $sStyleHidden_typereader_; ?>" > <?php echo $label_final ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_devices_arcade_multi);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_devices_arcade_multi = $this->form_vert_form_devices_arcade_multi;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_devices_arcade_multi))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cod_device_']))
           {
               $this->nmgp_cmp_readonly['cod_device_'] = 'on';
           }
   foreach ($this->form_vert_form_devices_arcade_multi as $sc_seq_vert => $sc_lixo)
   {
       $this->form_fixed_column_no = 0;
       $this->loadRecordState($sc_seq_vert);
       $this->cod_grupo_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['cod_grupo_'];
       $this->valor_default_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['valor_default_'];
       $this->acepta_tiempo_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['acepta_tiempo_'];
       $this->dev_ip_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['dev_ip_'];
       $this->tipo_dev_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['tipo_dev_'];
       $this->direccion_torno_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['direccion_torno_'];
       $this->discapacitado_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['discapacitado_'];
       $this->numcaja_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['numcaja_'];
       $this->empleado_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['empleado_'];
       $this->url_1_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['url_1_'];
       $this->url_2_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['url_2_'];
       $this->url_3_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['url_3_'];
       $this->foto1_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['foto1_'];
       $this->foto2_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['foto2_'];
       $this->foto3_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['foto3_'];
       $this->rfid_read_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['rfid_read_'];
       $this->rfid_estado_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['rfid_estado_'];
       $this->rfid_fecha_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['rfid_fecha_'];
       $this->ledstripe3_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['ledstripe3_'];
       $this->ledstripe4_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['ledstripe4_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['cod_device_'] = true;
           $this->nmgp_cmp_readonly['cod_activo_'] = true;
           $this->nmgp_cmp_readonly['device_name_'] = true;
           $this->nmgp_cmp_readonly['activa_'] = true;
           $this->nmgp_cmp_readonly['estado_'] = true;
           $this->nmgp_cmp_readonly['ult_rfid_'] = true;
           $this->nmgp_cmp_readonly['ult_fecha_'] = true;
           $this->nmgp_cmp_readonly['timeout_rfid_'] = true;
           $this->nmgp_cmp_readonly['acepta_tokens_'] = true;
           $this->nmgp_cmp_readonly['tokens_'] = true;
           $this->nmgp_cmp_readonly['serialrfid_'] = true;
           $this->nmgp_cmp_readonly['bidireccion_'] = true;
           $this->nmgp_cmp_readonly['cod_devicee_'] = true;
           $this->nmgp_cmp_readonly['pin_relay1_'] = true;
           $this->nmgp_cmp_readonly['pin_relay2_'] = true;
           $this->nmgp_cmp_readonly['url_accion_'] = true;
           $this->nmgp_cmp_readonly['url_atraccion_'] = true;
           $this->nmgp_cmp_readonly['uhfip_'] = true;
           $this->nmgp_cmp_readonly['url_reader_'] = true;
           $this->nmgp_cmp_readonly['cod_rfid900_'] = true;
           $this->nmgp_cmp_readonly['mensaje_'] = true;
           $this->nmgp_cmp_readonly['tipolector_'] = true;
           $this->nmgp_cmp_readonly['url_accion_bg_'] = true;
           $this->nmgp_cmp_readonly['url_inicio_'] = true;
           $this->nmgp_cmp_readonly['ledstripe1_'] = true;
           $this->nmgp_cmp_readonly['ledstripe2_'] = true;
           $this->nmgp_cmp_readonly['lasteffect_'] = true;
           $this->nmgp_cmp_readonly['color_'] = true;
           $this->nmgp_cmp_readonly['sound_'] = true;
           $this->nmgp_cmp_readonly['points_'] = true;
           $this->nmgp_cmp_readonly['speak_'] = true;
           $this->nmgp_cmp_readonly['typereader_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['cod_device_']) || $this->nmgp_cmp_readonly['cod_device_'] != "on") {$this->nmgp_cmp_readonly['cod_device_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cod_activo_']) || $this->nmgp_cmp_readonly['cod_activo_'] != "on") {$this->nmgp_cmp_readonly['cod_activo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['device_name_']) || $this->nmgp_cmp_readonly['device_name_'] != "on") {$this->nmgp_cmp_readonly['device_name_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['activa_']) || $this->nmgp_cmp_readonly['activa_'] != "on") {$this->nmgp_cmp_readonly['activa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['estado_']) || $this->nmgp_cmp_readonly['estado_'] != "on") {$this->nmgp_cmp_readonly['estado_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ult_rfid_']) || $this->nmgp_cmp_readonly['ult_rfid_'] != "on") {$this->nmgp_cmp_readonly['ult_rfid_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ult_fecha_']) || $this->nmgp_cmp_readonly['ult_fecha_'] != "on") {$this->nmgp_cmp_readonly['ult_fecha_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['timeout_rfid_']) || $this->nmgp_cmp_readonly['timeout_rfid_'] != "on") {$this->nmgp_cmp_readonly['timeout_rfid_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['acepta_tokens_']) || $this->nmgp_cmp_readonly['acepta_tokens_'] != "on") {$this->nmgp_cmp_readonly['acepta_tokens_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tokens_']) || $this->nmgp_cmp_readonly['tokens_'] != "on") {$this->nmgp_cmp_readonly['tokens_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['serialrfid_']) || $this->nmgp_cmp_readonly['serialrfid_'] != "on") {$this->nmgp_cmp_readonly['serialrfid_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['bidireccion_']) || $this->nmgp_cmp_readonly['bidireccion_'] != "on") {$this->nmgp_cmp_readonly['bidireccion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cod_devicee_']) || $this->nmgp_cmp_readonly['cod_devicee_'] != "on") {$this->nmgp_cmp_readonly['cod_devicee_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pin_relay1_']) || $this->nmgp_cmp_readonly['pin_relay1_'] != "on") {$this->nmgp_cmp_readonly['pin_relay1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['pin_relay2_']) || $this->nmgp_cmp_readonly['pin_relay2_'] != "on") {$this->nmgp_cmp_readonly['pin_relay2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['url_accion_']) || $this->nmgp_cmp_readonly['url_accion_'] != "on") {$this->nmgp_cmp_readonly['url_accion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['url_atraccion_']) || $this->nmgp_cmp_readonly['url_atraccion_'] != "on") {$this->nmgp_cmp_readonly['url_atraccion_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['uhfip_']) || $this->nmgp_cmp_readonly['uhfip_'] != "on") {$this->nmgp_cmp_readonly['uhfip_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['url_reader_']) || $this->nmgp_cmp_readonly['url_reader_'] != "on") {$this->nmgp_cmp_readonly['url_reader_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cod_rfid900_']) || $this->nmgp_cmp_readonly['cod_rfid900_'] != "on") {$this->nmgp_cmp_readonly['cod_rfid900_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['mensaje_']) || $this->nmgp_cmp_readonly['mensaje_'] != "on") {$this->nmgp_cmp_readonly['mensaje_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipolector_']) || $this->nmgp_cmp_readonly['tipolector_'] != "on") {$this->nmgp_cmp_readonly['tipolector_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['url_accion_bg_']) || $this->nmgp_cmp_readonly['url_accion_bg_'] != "on") {$this->nmgp_cmp_readonly['url_accion_bg_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['url_inicio_']) || $this->nmgp_cmp_readonly['url_inicio_'] != "on") {$this->nmgp_cmp_readonly['url_inicio_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ledstripe1_']) || $this->nmgp_cmp_readonly['ledstripe1_'] != "on") {$this->nmgp_cmp_readonly['ledstripe1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ledstripe2_']) || $this->nmgp_cmp_readonly['ledstripe2_'] != "on") {$this->nmgp_cmp_readonly['ledstripe2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['lasteffect_']) || $this->nmgp_cmp_readonly['lasteffect_'] != "on") {$this->nmgp_cmp_readonly['lasteffect_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['color_']) || $this->nmgp_cmp_readonly['color_'] != "on") {$this->nmgp_cmp_readonly['color_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sound_']) || $this->nmgp_cmp_readonly['sound_'] != "on") {$this->nmgp_cmp_readonly['sound_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['points_']) || $this->nmgp_cmp_readonly['points_'] != "on") {$this->nmgp_cmp_readonly['points_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['speak_']) || $this->nmgp_cmp_readonly['speak_'] != "on") {$this->nmgp_cmp_readonly['speak_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['typereader_']) || $this->nmgp_cmp_readonly['typereader_'] != "on") {$this->nmgp_cmp_readonly['typereader_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->cod_device_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['cod_device_']; 
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
       $this->cod_activo_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['cod_activo_']; 
       $cod_activo_ = $this->cod_activo_; 
       $sStyleHidden_cod_activo_ = '';
       if (isset($sCheckRead_cod_activo_))
       {
           unset($sCheckRead_cod_activo_);
       }
       if (isset($this->nmgp_cmp_readonly['cod_activo_']))
       {
           $sCheckRead_cod_activo_ = $this->nmgp_cmp_readonly['cod_activo_'];
       }
       if (isset($this->nmgp_cmp_hidden['cod_activo_']) && $this->nmgp_cmp_hidden['cod_activo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cod_activo_']);
           $sStyleHidden_cod_activo_ = 'display: none;';
       }
       $bTestReadOnly_cod_activo_ = true;
       $sStyleReadLab_cod_activo_ = 'display: none;';
       $sStyleReadInp_cod_activo_ = '';
       if (isset($this->nmgp_cmp_readonly['cod_activo_']) && $this->nmgp_cmp_readonly['cod_activo_'] == 'on')
       {
           $bTestReadOnly_cod_activo_ = false;
           unset($this->nmgp_cmp_readonly['cod_activo_']);
           $sStyleReadLab_cod_activo_ = '';
           $sStyleReadInp_cod_activo_ = 'display: none;';
       }
       $this->device_name_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['device_name_']; 
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
       if (isset($this->nmgp_cmp_readonly['device_name_']) && $this->nmgp_cmp_readonly['device_name_'] == 'on')
       {
           $bTestReadOnly_device_name_ = false;
           unset($this->nmgp_cmp_readonly['device_name_']);
           $sStyleReadLab_device_name_ = '';
           $sStyleReadInp_device_name_ = 'display: none;';
       }
       $this->activa_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['activa_']; 
       $activa_ = $this->activa_; 
       $sStyleHidden_activa_ = '';
       if (isset($sCheckRead_activa_))
       {
           unset($sCheckRead_activa_);
       }
       if (isset($this->nmgp_cmp_readonly['activa_']))
       {
           $sCheckRead_activa_ = $this->nmgp_cmp_readonly['activa_'];
       }
       if (isset($this->nmgp_cmp_hidden['activa_']) && $this->nmgp_cmp_hidden['activa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['activa_']);
           $sStyleHidden_activa_ = 'display: none;';
       }
       $bTestReadOnly_activa_ = true;
       $sStyleReadLab_activa_ = 'display: none;';
       $sStyleReadInp_activa_ = '';
       if (isset($this->nmgp_cmp_readonly['activa_']) && $this->nmgp_cmp_readonly['activa_'] == 'on')
       {
           $bTestReadOnly_activa_ = false;
           unset($this->nmgp_cmp_readonly['activa_']);
           $sStyleReadLab_activa_ = '';
           $sStyleReadInp_activa_ = 'display: none;';
       }
       $this->estado_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['estado_']; 
       $estado_ = $this->estado_; 
       $sStyleHidden_estado_ = '';
       if (isset($sCheckRead_estado_))
       {
           unset($sCheckRead_estado_);
       }
       if (isset($this->nmgp_cmp_readonly['estado_']))
       {
           $sCheckRead_estado_ = $this->nmgp_cmp_readonly['estado_'];
       }
       if (isset($this->nmgp_cmp_hidden['estado_']) && $this->nmgp_cmp_hidden['estado_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['estado_']);
           $sStyleHidden_estado_ = 'display: none;';
       }
       $bTestReadOnly_estado_ = true;
       $sStyleReadLab_estado_ = 'display: none;';
       $sStyleReadInp_estado_ = '';
       if (isset($this->nmgp_cmp_readonly['estado_']) && $this->nmgp_cmp_readonly['estado_'] == 'on')
       {
           $bTestReadOnly_estado_ = false;
           unset($this->nmgp_cmp_readonly['estado_']);
           $sStyleReadLab_estado_ = '';
           $sStyleReadInp_estado_ = 'display: none;';
       }
       $this->ult_rfid_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['ult_rfid_']; 
       $ult_rfid_ = $this->ult_rfid_; 
       $sStyleHidden_ult_rfid_ = '';
       if (isset($sCheckRead_ult_rfid_))
       {
           unset($sCheckRead_ult_rfid_);
       }
       if (isset($this->nmgp_cmp_readonly['ult_rfid_']))
       {
           $sCheckRead_ult_rfid_ = $this->nmgp_cmp_readonly['ult_rfid_'];
       }
       if (isset($this->nmgp_cmp_hidden['ult_rfid_']) && $this->nmgp_cmp_hidden['ult_rfid_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ult_rfid_']);
           $sStyleHidden_ult_rfid_ = 'display: none;';
       }
       $bTestReadOnly_ult_rfid_ = true;
       $sStyleReadLab_ult_rfid_ = 'display: none;';
       $sStyleReadInp_ult_rfid_ = '';
       if (isset($this->nmgp_cmp_readonly['ult_rfid_']) && $this->nmgp_cmp_readonly['ult_rfid_'] == 'on')
       {
           $bTestReadOnly_ult_rfid_ = false;
           unset($this->nmgp_cmp_readonly['ult_rfid_']);
           $sStyleReadLab_ult_rfid_ = '';
           $sStyleReadInp_ult_rfid_ = 'display: none;';
       }
       $this->ult_fecha_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['ult_fecha_'] . ' ' . $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['ult_fecha__hora']; 
       $ult_fecha_ = $this->ult_fecha_; 
       $sStyleHidden_ult_fecha_ = '';
       if (isset($sCheckRead_ult_fecha_))
       {
           unset($sCheckRead_ult_fecha_);
       }
       if (isset($this->nmgp_cmp_readonly['ult_fecha_']))
       {
           $sCheckRead_ult_fecha_ = $this->nmgp_cmp_readonly['ult_fecha_'];
       }
       if (isset($this->nmgp_cmp_hidden['ult_fecha_']) && $this->nmgp_cmp_hidden['ult_fecha_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ult_fecha_']);
           $sStyleHidden_ult_fecha_ = 'display: none;';
       }
       $bTestReadOnly_ult_fecha_ = true;
       $sStyleReadLab_ult_fecha_ = 'display: none;';
       $sStyleReadInp_ult_fecha_ = '';
       if (isset($this->nmgp_cmp_readonly['ult_fecha_']) && $this->nmgp_cmp_readonly['ult_fecha_'] == 'on')
       {
           $bTestReadOnly_ult_fecha_ = false;
           unset($this->nmgp_cmp_readonly['ult_fecha_']);
           $sStyleReadLab_ult_fecha_ = '';
           $sStyleReadInp_ult_fecha_ = 'display: none;';
       }
       $this->timeout_rfid_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['timeout_rfid_']; 
       $timeout_rfid_ = $this->timeout_rfid_; 
       $sStyleHidden_timeout_rfid_ = '';
       if (isset($sCheckRead_timeout_rfid_))
       {
           unset($sCheckRead_timeout_rfid_);
       }
       if (isset($this->nmgp_cmp_readonly['timeout_rfid_']))
       {
           $sCheckRead_timeout_rfid_ = $this->nmgp_cmp_readonly['timeout_rfid_'];
       }
       if (isset($this->nmgp_cmp_hidden['timeout_rfid_']) && $this->nmgp_cmp_hidden['timeout_rfid_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['timeout_rfid_']);
           $sStyleHidden_timeout_rfid_ = 'display: none;';
       }
       $bTestReadOnly_timeout_rfid_ = true;
       $sStyleReadLab_timeout_rfid_ = 'display: none;';
       $sStyleReadInp_timeout_rfid_ = '';
       if (isset($this->nmgp_cmp_readonly['timeout_rfid_']) && $this->nmgp_cmp_readonly['timeout_rfid_'] == 'on')
       {
           $bTestReadOnly_timeout_rfid_ = false;
           unset($this->nmgp_cmp_readonly['timeout_rfid_']);
           $sStyleReadLab_timeout_rfid_ = '';
           $sStyleReadInp_timeout_rfid_ = 'display: none;';
       }
       $this->acepta_tokens_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['acepta_tokens_']; 
       $acepta_tokens_ = $this->acepta_tokens_; 
       $sStyleHidden_acepta_tokens_ = '';
       if (isset($sCheckRead_acepta_tokens_))
       {
           unset($sCheckRead_acepta_tokens_);
       }
       if (isset($this->nmgp_cmp_readonly['acepta_tokens_']))
       {
           $sCheckRead_acepta_tokens_ = $this->nmgp_cmp_readonly['acepta_tokens_'];
       }
       if (isset($this->nmgp_cmp_hidden['acepta_tokens_']) && $this->nmgp_cmp_hidden['acepta_tokens_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['acepta_tokens_']);
           $sStyleHidden_acepta_tokens_ = 'display: none;';
       }
       $bTestReadOnly_acepta_tokens_ = true;
       $sStyleReadLab_acepta_tokens_ = 'display: none;';
       $sStyleReadInp_acepta_tokens_ = '';
       if (isset($this->nmgp_cmp_readonly['acepta_tokens_']) && $this->nmgp_cmp_readonly['acepta_tokens_'] == 'on')
       {
           $bTestReadOnly_acepta_tokens_ = false;
           unset($this->nmgp_cmp_readonly['acepta_tokens_']);
           $sStyleReadLab_acepta_tokens_ = '';
           $sStyleReadInp_acepta_tokens_ = 'display: none;';
       }
       $this->tokens_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['tokens_']; 
       $tokens_ = $this->tokens_; 
       $sStyleHidden_tokens_ = '';
       if (isset($sCheckRead_tokens_))
       {
           unset($sCheckRead_tokens_);
       }
       if (isset($this->nmgp_cmp_readonly['tokens_']))
       {
           $sCheckRead_tokens_ = $this->nmgp_cmp_readonly['tokens_'];
       }
       if (isset($this->nmgp_cmp_hidden['tokens_']) && $this->nmgp_cmp_hidden['tokens_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tokens_']);
           $sStyleHidden_tokens_ = 'display: none;';
       }
       $bTestReadOnly_tokens_ = true;
       $sStyleReadLab_tokens_ = 'display: none;';
       $sStyleReadInp_tokens_ = '';
       if (isset($this->nmgp_cmp_readonly['tokens_']) && $this->nmgp_cmp_readonly['tokens_'] == 'on')
       {
           $bTestReadOnly_tokens_ = false;
           unset($this->nmgp_cmp_readonly['tokens_']);
           $sStyleReadLab_tokens_ = '';
           $sStyleReadInp_tokens_ = 'display: none;';
       }
       $this->serialrfid_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['serialrfid_']; 
       $serialrfid_ = $this->serialrfid_; 
       $sStyleHidden_serialrfid_ = '';
       if (isset($sCheckRead_serialrfid_))
       {
           unset($sCheckRead_serialrfid_);
       }
       if (isset($this->nmgp_cmp_readonly['serialrfid_']))
       {
           $sCheckRead_serialrfid_ = $this->nmgp_cmp_readonly['serialrfid_'];
       }
       if (isset($this->nmgp_cmp_hidden['serialrfid_']) && $this->nmgp_cmp_hidden['serialrfid_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['serialrfid_']);
           $sStyleHidden_serialrfid_ = 'display: none;';
       }
       $bTestReadOnly_serialrfid_ = true;
       $sStyleReadLab_serialrfid_ = 'display: none;';
       $sStyleReadInp_serialrfid_ = '';
       if (isset($this->nmgp_cmp_readonly['serialrfid_']) && $this->nmgp_cmp_readonly['serialrfid_'] == 'on')
       {
           $bTestReadOnly_serialrfid_ = false;
           unset($this->nmgp_cmp_readonly['serialrfid_']);
           $sStyleReadLab_serialrfid_ = '';
           $sStyleReadInp_serialrfid_ = 'display: none;';
       }
       $this->bidireccion_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['bidireccion_']; 
       $bidireccion_ = $this->bidireccion_; 
       $sStyleHidden_bidireccion_ = '';
       if (isset($sCheckRead_bidireccion_))
       {
           unset($sCheckRead_bidireccion_);
       }
       if (isset($this->nmgp_cmp_readonly['bidireccion_']))
       {
           $sCheckRead_bidireccion_ = $this->nmgp_cmp_readonly['bidireccion_'];
       }
       if (isset($this->nmgp_cmp_hidden['bidireccion_']) && $this->nmgp_cmp_hidden['bidireccion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['bidireccion_']);
           $sStyleHidden_bidireccion_ = 'display: none;';
       }
       $bTestReadOnly_bidireccion_ = true;
       $sStyleReadLab_bidireccion_ = 'display: none;';
       $sStyleReadInp_bidireccion_ = '';
       if (isset($this->nmgp_cmp_readonly['bidireccion_']) && $this->nmgp_cmp_readonly['bidireccion_'] == 'on')
       {
           $bTestReadOnly_bidireccion_ = false;
           unset($this->nmgp_cmp_readonly['bidireccion_']);
           $sStyleReadLab_bidireccion_ = '';
           $sStyleReadInp_bidireccion_ = 'display: none;';
       }
       $this->cod_devicee_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['cod_devicee_']; 
       $cod_devicee_ = $this->cod_devicee_; 
       $sStyleHidden_cod_devicee_ = '';
       if (isset($sCheckRead_cod_devicee_))
       {
           unset($sCheckRead_cod_devicee_);
       }
       if (isset($this->nmgp_cmp_readonly['cod_devicee_']))
       {
           $sCheckRead_cod_devicee_ = $this->nmgp_cmp_readonly['cod_devicee_'];
       }
       if (isset($this->nmgp_cmp_hidden['cod_devicee_']) && $this->nmgp_cmp_hidden['cod_devicee_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cod_devicee_']);
           $sStyleHidden_cod_devicee_ = 'display: none;';
       }
       $bTestReadOnly_cod_devicee_ = true;
       $sStyleReadLab_cod_devicee_ = 'display: none;';
       $sStyleReadInp_cod_devicee_ = '';
       if (isset($this->nmgp_cmp_readonly['cod_devicee_']) && $this->nmgp_cmp_readonly['cod_devicee_'] == 'on')
       {
           $bTestReadOnly_cod_devicee_ = false;
           unset($this->nmgp_cmp_readonly['cod_devicee_']);
           $sStyleReadLab_cod_devicee_ = '';
           $sStyleReadInp_cod_devicee_ = 'display: none;';
       }
       $this->pin_relay1_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['pin_relay1_']; 
       $pin_relay1_ = $this->pin_relay1_; 
       $sStyleHidden_pin_relay1_ = '';
       if (isset($sCheckRead_pin_relay1_))
       {
           unset($sCheckRead_pin_relay1_);
       }
       if (isset($this->nmgp_cmp_readonly['pin_relay1_']))
       {
           $sCheckRead_pin_relay1_ = $this->nmgp_cmp_readonly['pin_relay1_'];
       }
       if (isset($this->nmgp_cmp_hidden['pin_relay1_']) && $this->nmgp_cmp_hidden['pin_relay1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pin_relay1_']);
           $sStyleHidden_pin_relay1_ = 'display: none;';
       }
       $bTestReadOnly_pin_relay1_ = true;
       $sStyleReadLab_pin_relay1_ = 'display: none;';
       $sStyleReadInp_pin_relay1_ = '';
       if (isset($this->nmgp_cmp_readonly['pin_relay1_']) && $this->nmgp_cmp_readonly['pin_relay1_'] == 'on')
       {
           $bTestReadOnly_pin_relay1_ = false;
           unset($this->nmgp_cmp_readonly['pin_relay1_']);
           $sStyleReadLab_pin_relay1_ = '';
           $sStyleReadInp_pin_relay1_ = 'display: none;';
       }
       $this->pin_relay2_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['pin_relay2_']; 
       $pin_relay2_ = $this->pin_relay2_; 
       $sStyleHidden_pin_relay2_ = '';
       if (isset($sCheckRead_pin_relay2_))
       {
           unset($sCheckRead_pin_relay2_);
       }
       if (isset($this->nmgp_cmp_readonly['pin_relay2_']))
       {
           $sCheckRead_pin_relay2_ = $this->nmgp_cmp_readonly['pin_relay2_'];
       }
       if (isset($this->nmgp_cmp_hidden['pin_relay2_']) && $this->nmgp_cmp_hidden['pin_relay2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['pin_relay2_']);
           $sStyleHidden_pin_relay2_ = 'display: none;';
       }
       $bTestReadOnly_pin_relay2_ = true;
       $sStyleReadLab_pin_relay2_ = 'display: none;';
       $sStyleReadInp_pin_relay2_ = '';
       if (isset($this->nmgp_cmp_readonly['pin_relay2_']) && $this->nmgp_cmp_readonly['pin_relay2_'] == 'on')
       {
           $bTestReadOnly_pin_relay2_ = false;
           unset($this->nmgp_cmp_readonly['pin_relay2_']);
           $sStyleReadLab_pin_relay2_ = '';
           $sStyleReadInp_pin_relay2_ = 'display: none;';
       }
       $this->url_accion_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['url_accion_']; 
       $url_accion_ = $this->url_accion_; 
       $url_accion__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $url_accion_);
       $url_accion__val = $url_accion__tmp;
       $sStyleHidden_url_accion_ = '';
       if (isset($sCheckRead_url_accion_))
       {
           unset($sCheckRead_url_accion_);
       }
       if (isset($this->nmgp_cmp_readonly['url_accion_']))
       {
           $sCheckRead_url_accion_ = $this->nmgp_cmp_readonly['url_accion_'];
       }
       if (isset($this->nmgp_cmp_hidden['url_accion_']) && $this->nmgp_cmp_hidden['url_accion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['url_accion_']);
           $sStyleHidden_url_accion_ = 'display: none;';
       }
       $bTestReadOnly_url_accion_ = true;
       $sStyleReadLab_url_accion_ = 'display: none;';
       $sStyleReadInp_url_accion_ = '';
       if (isset($this->nmgp_cmp_readonly['url_accion_']) && $this->nmgp_cmp_readonly['url_accion_'] == 'on')
       {
           $bTestReadOnly_url_accion_ = false;
           unset($this->nmgp_cmp_readonly['url_accion_']);
           $sStyleReadLab_url_accion_ = '';
           $sStyleReadInp_url_accion_ = 'display: none;';
       }
       $this->url_atraccion_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['url_atraccion_']; 
       $url_atraccion_ = $this->url_atraccion_; 
       $url_atraccion__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $url_atraccion_);
       $url_atraccion__val = $url_atraccion__tmp;
       $sStyleHidden_url_atraccion_ = '';
       if (isset($sCheckRead_url_atraccion_))
       {
           unset($sCheckRead_url_atraccion_);
       }
       if (isset($this->nmgp_cmp_readonly['url_atraccion_']))
       {
           $sCheckRead_url_atraccion_ = $this->nmgp_cmp_readonly['url_atraccion_'];
       }
       if (isset($this->nmgp_cmp_hidden['url_atraccion_']) && $this->nmgp_cmp_hidden['url_atraccion_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['url_atraccion_']);
           $sStyleHidden_url_atraccion_ = 'display: none;';
       }
       $bTestReadOnly_url_atraccion_ = true;
       $sStyleReadLab_url_atraccion_ = 'display: none;';
       $sStyleReadInp_url_atraccion_ = '';
       if (isset($this->nmgp_cmp_readonly['url_atraccion_']) && $this->nmgp_cmp_readonly['url_atraccion_'] == 'on')
       {
           $bTestReadOnly_url_atraccion_ = false;
           unset($this->nmgp_cmp_readonly['url_atraccion_']);
           $sStyleReadLab_url_atraccion_ = '';
           $sStyleReadInp_url_atraccion_ = 'display: none;';
       }
       $this->uhfip_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['uhfip_']; 
       $uhfip_ = $this->uhfip_; 
       $sStyleHidden_uhfip_ = '';
       if (isset($sCheckRead_uhfip_))
       {
           unset($sCheckRead_uhfip_);
       }
       if (isset($this->nmgp_cmp_readonly['uhfip_']))
       {
           $sCheckRead_uhfip_ = $this->nmgp_cmp_readonly['uhfip_'];
       }
       if (isset($this->nmgp_cmp_hidden['uhfip_']) && $this->nmgp_cmp_hidden['uhfip_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['uhfip_']);
           $sStyleHidden_uhfip_ = 'display: none;';
       }
       $bTestReadOnly_uhfip_ = true;
       $sStyleReadLab_uhfip_ = 'display: none;';
       $sStyleReadInp_uhfip_ = '';
       if (isset($this->nmgp_cmp_readonly['uhfip_']) && $this->nmgp_cmp_readonly['uhfip_'] == 'on')
       {
           $bTestReadOnly_uhfip_ = false;
           unset($this->nmgp_cmp_readonly['uhfip_']);
           $sStyleReadLab_uhfip_ = '';
           $sStyleReadInp_uhfip_ = 'display: none;';
       }
       $this->url_reader_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['url_reader_']; 
       $url_reader_ = $this->url_reader_; 
       $sStyleHidden_url_reader_ = '';
       if (isset($sCheckRead_url_reader_))
       {
           unset($sCheckRead_url_reader_);
       }
       if (isset($this->nmgp_cmp_readonly['url_reader_']))
       {
           $sCheckRead_url_reader_ = $this->nmgp_cmp_readonly['url_reader_'];
       }
       if (isset($this->nmgp_cmp_hidden['url_reader_']) && $this->nmgp_cmp_hidden['url_reader_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['url_reader_']);
           $sStyleHidden_url_reader_ = 'display: none;';
       }
       $bTestReadOnly_url_reader_ = true;
       $sStyleReadLab_url_reader_ = 'display: none;';
       $sStyleReadInp_url_reader_ = '';
       if (isset($this->nmgp_cmp_readonly['url_reader_']) && $this->nmgp_cmp_readonly['url_reader_'] == 'on')
       {
           $bTestReadOnly_url_reader_ = false;
           unset($this->nmgp_cmp_readonly['url_reader_']);
           $sStyleReadLab_url_reader_ = '';
           $sStyleReadInp_url_reader_ = 'display: none;';
       }
       $this->cod_rfid900_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['cod_rfid900_']; 
       $cod_rfid900_ = $this->cod_rfid900_; 
       $sStyleHidden_cod_rfid900_ = '';
       if (isset($sCheckRead_cod_rfid900_))
       {
           unset($sCheckRead_cod_rfid900_);
       }
       if (isset($this->nmgp_cmp_readonly['cod_rfid900_']))
       {
           $sCheckRead_cod_rfid900_ = $this->nmgp_cmp_readonly['cod_rfid900_'];
       }
       if (isset($this->nmgp_cmp_hidden['cod_rfid900_']) && $this->nmgp_cmp_hidden['cod_rfid900_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cod_rfid900_']);
           $sStyleHidden_cod_rfid900_ = 'display: none;';
       }
       $bTestReadOnly_cod_rfid900_ = true;
       $sStyleReadLab_cod_rfid900_ = 'display: none;';
       $sStyleReadInp_cod_rfid900_ = '';
       if (isset($this->nmgp_cmp_readonly['cod_rfid900_']) && $this->nmgp_cmp_readonly['cod_rfid900_'] == 'on')
       {
           $bTestReadOnly_cod_rfid900_ = false;
           unset($this->nmgp_cmp_readonly['cod_rfid900_']);
           $sStyleReadLab_cod_rfid900_ = '';
           $sStyleReadInp_cod_rfid900_ = 'display: none;';
       }
       $this->mensaje_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['mensaje_']; 
       $mensaje_ = $this->mensaje_; 
       $sStyleHidden_mensaje_ = '';
       if (isset($sCheckRead_mensaje_))
       {
           unset($sCheckRead_mensaje_);
       }
       if (isset($this->nmgp_cmp_readonly['mensaje_']))
       {
           $sCheckRead_mensaje_ = $this->nmgp_cmp_readonly['mensaje_'];
       }
       if (isset($this->nmgp_cmp_hidden['mensaje_']) && $this->nmgp_cmp_hidden['mensaje_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['mensaje_']);
           $sStyleHidden_mensaje_ = 'display: none;';
       }
       $bTestReadOnly_mensaje_ = true;
       $sStyleReadLab_mensaje_ = 'display: none;';
       $sStyleReadInp_mensaje_ = '';
       if (isset($this->nmgp_cmp_readonly['mensaje_']) && $this->nmgp_cmp_readonly['mensaje_'] == 'on')
       {
           $bTestReadOnly_mensaje_ = false;
           unset($this->nmgp_cmp_readonly['mensaje_']);
           $sStyleReadLab_mensaje_ = '';
           $sStyleReadInp_mensaje_ = 'display: none;';
       }
       $this->tipolector_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['tipolector_']; 
       $tipolector_ = $this->tipolector_; 
       $sStyleHidden_tipolector_ = '';
       if (isset($sCheckRead_tipolector_))
       {
           unset($sCheckRead_tipolector_);
       }
       if (isset($this->nmgp_cmp_readonly['tipolector_']))
       {
           $sCheckRead_tipolector_ = $this->nmgp_cmp_readonly['tipolector_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipolector_']) && $this->nmgp_cmp_hidden['tipolector_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipolector_']);
           $sStyleHidden_tipolector_ = 'display: none;';
       }
       $bTestReadOnly_tipolector_ = true;
       $sStyleReadLab_tipolector_ = 'display: none;';
       $sStyleReadInp_tipolector_ = '';
       if (isset($this->nmgp_cmp_readonly['tipolector_']) && $this->nmgp_cmp_readonly['tipolector_'] == 'on')
       {
           $bTestReadOnly_tipolector_ = false;
           unset($this->nmgp_cmp_readonly['tipolector_']);
           $sStyleReadLab_tipolector_ = '';
           $sStyleReadInp_tipolector_ = 'display: none;';
       }
       $this->url_accion_bg_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['url_accion_bg_']; 
       $url_accion_bg_ = $this->url_accion_bg_; 
       $url_accion_bg__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $url_accion_bg_);
       $url_accion_bg__val = $url_accion_bg__tmp;
       $sStyleHidden_url_accion_bg_ = '';
       if (isset($sCheckRead_url_accion_bg_))
       {
           unset($sCheckRead_url_accion_bg_);
       }
       if (isset($this->nmgp_cmp_readonly['url_accion_bg_']))
       {
           $sCheckRead_url_accion_bg_ = $this->nmgp_cmp_readonly['url_accion_bg_'];
       }
       if (isset($this->nmgp_cmp_hidden['url_accion_bg_']) && $this->nmgp_cmp_hidden['url_accion_bg_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['url_accion_bg_']);
           $sStyleHidden_url_accion_bg_ = 'display: none;';
       }
       $bTestReadOnly_url_accion_bg_ = true;
       $sStyleReadLab_url_accion_bg_ = 'display: none;';
       $sStyleReadInp_url_accion_bg_ = '';
       if (isset($this->nmgp_cmp_readonly['url_accion_bg_']) && $this->nmgp_cmp_readonly['url_accion_bg_'] == 'on')
       {
           $bTestReadOnly_url_accion_bg_ = false;
           unset($this->nmgp_cmp_readonly['url_accion_bg_']);
           $sStyleReadLab_url_accion_bg_ = '';
           $sStyleReadInp_url_accion_bg_ = 'display: none;';
       }
       $this->url_inicio_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['url_inicio_']; 
       $url_inicio_ = $this->url_inicio_; 
       $url_inicio__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $url_inicio_);
       $url_inicio__val = $url_inicio__tmp;
       $sStyleHidden_url_inicio_ = '';
       if (isset($sCheckRead_url_inicio_))
       {
           unset($sCheckRead_url_inicio_);
       }
       if (isset($this->nmgp_cmp_readonly['url_inicio_']))
       {
           $sCheckRead_url_inicio_ = $this->nmgp_cmp_readonly['url_inicio_'];
       }
       if (isset($this->nmgp_cmp_hidden['url_inicio_']) && $this->nmgp_cmp_hidden['url_inicio_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['url_inicio_']);
           $sStyleHidden_url_inicio_ = 'display: none;';
       }
       $bTestReadOnly_url_inicio_ = true;
       $sStyleReadLab_url_inicio_ = 'display: none;';
       $sStyleReadInp_url_inicio_ = '';
       if (isset($this->nmgp_cmp_readonly['url_inicio_']) && $this->nmgp_cmp_readonly['url_inicio_'] == 'on')
       {
           $bTestReadOnly_url_inicio_ = false;
           unset($this->nmgp_cmp_readonly['url_inicio_']);
           $sStyleReadLab_url_inicio_ = '';
           $sStyleReadInp_url_inicio_ = 'display: none;';
       }
       $this->ledstripe1_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['ledstripe1_']; 
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
       $this->ledstripe2_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['ledstripe2_']; 
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
       $this->lasteffect_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['lasteffect_']; 
       $lasteffect_ = $this->lasteffect_; 
       $sStyleHidden_lasteffect_ = '';
       if (isset($sCheckRead_lasteffect_))
       {
           unset($sCheckRead_lasteffect_);
       }
       if (isset($this->nmgp_cmp_readonly['lasteffect_']))
       {
           $sCheckRead_lasteffect_ = $this->nmgp_cmp_readonly['lasteffect_'];
       }
       if (isset($this->nmgp_cmp_hidden['lasteffect_']) && $this->nmgp_cmp_hidden['lasteffect_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['lasteffect_']);
           $sStyleHidden_lasteffect_ = 'display: none;';
       }
       $bTestReadOnly_lasteffect_ = true;
       $sStyleReadLab_lasteffect_ = 'display: none;';
       $sStyleReadInp_lasteffect_ = '';
       if (isset($this->nmgp_cmp_readonly['lasteffect_']) && $this->nmgp_cmp_readonly['lasteffect_'] == 'on')
       {
           $bTestReadOnly_lasteffect_ = false;
           unset($this->nmgp_cmp_readonly['lasteffect_']);
           $sStyleReadLab_lasteffect_ = '';
           $sStyleReadInp_lasteffect_ = 'display: none;';
       }
       $this->color_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['color_']; 
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
       $this->sound_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['sound_']; 
       $sound_ = $this->sound_; 
       $sStyleHidden_sound_ = '';
       if (isset($sCheckRead_sound_))
       {
           unset($sCheckRead_sound_);
       }
       if (isset($this->nmgp_cmp_readonly['sound_']))
       {
           $sCheckRead_sound_ = $this->nmgp_cmp_readonly['sound_'];
       }
       if (isset($this->nmgp_cmp_hidden['sound_']) && $this->nmgp_cmp_hidden['sound_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sound_']);
           $sStyleHidden_sound_ = 'display: none;';
       }
       $bTestReadOnly_sound_ = true;
       $sStyleReadLab_sound_ = 'display: none;';
       $sStyleReadInp_sound_ = '';
       if (isset($this->nmgp_cmp_readonly['sound_']) && $this->nmgp_cmp_readonly['sound_'] == 'on')
       {
           $bTestReadOnly_sound_ = false;
           unset($this->nmgp_cmp_readonly['sound_']);
           $sStyleReadLab_sound_ = '';
           $sStyleReadInp_sound_ = 'display: none;';
       }
       $this->points_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['points_']; 
       $points_ = $this->points_; 
       $sStyleHidden_points_ = '';
       if (isset($sCheckRead_points_))
       {
           unset($sCheckRead_points_);
       }
       if (isset($this->nmgp_cmp_readonly['points_']))
       {
           $sCheckRead_points_ = $this->nmgp_cmp_readonly['points_'];
       }
       if (isset($this->nmgp_cmp_hidden['points_']) && $this->nmgp_cmp_hidden['points_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['points_']);
           $sStyleHidden_points_ = 'display: none;';
       }
       $bTestReadOnly_points_ = true;
       $sStyleReadLab_points_ = 'display: none;';
       $sStyleReadInp_points_ = '';
       if (isset($this->nmgp_cmp_readonly['points_']) && $this->nmgp_cmp_readonly['points_'] == 'on')
       {
           $bTestReadOnly_points_ = false;
           unset($this->nmgp_cmp_readonly['points_']);
           $sStyleReadLab_points_ = '';
           $sStyleReadInp_points_ = 'display: none;';
       }
       $this->speak_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['speak_']; 
       $speak_ = $this->speak_; 
       $speak__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $speak_);
       $speak__val = $speak__tmp;
       $sStyleHidden_speak_ = '';
       if (isset($sCheckRead_speak_))
       {
           unset($sCheckRead_speak_);
       }
       if (isset($this->nmgp_cmp_readonly['speak_']))
       {
           $sCheckRead_speak_ = $this->nmgp_cmp_readonly['speak_'];
       }
       if (isset($this->nmgp_cmp_hidden['speak_']) && $this->nmgp_cmp_hidden['speak_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['speak_']);
           $sStyleHidden_speak_ = 'display: none;';
       }
       $bTestReadOnly_speak_ = true;
       $sStyleReadLab_speak_ = 'display: none;';
       $sStyleReadInp_speak_ = '';
       if (isset($this->nmgp_cmp_readonly['speak_']) && $this->nmgp_cmp_readonly['speak_'] == 'on')
       {
           $bTestReadOnly_speak_ = false;
           unset($this->nmgp_cmp_readonly['speak_']);
           $sStyleReadLab_speak_ = '';
           $sStyleReadInp_speak_ = 'display: none;';
       }
       $this->typereader_ = $this->form_vert_form_devices_arcade_multi[$sc_seq_vert]['typereader_']; 
       $typereader_ = $this->typereader_; 
       $sStyleHidden_typereader_ = '';
       if (isset($sCheckRead_typereader_))
       {
           unset($sCheckRead_typereader_);
       }
       if (isset($this->nmgp_cmp_readonly['typereader_']))
       {
           $sCheckRead_typereader_ = $this->nmgp_cmp_readonly['typereader_'];
       }
       if (isset($this->nmgp_cmp_hidden['typereader_']) && $this->nmgp_cmp_hidden['typereader_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['typereader_']);
           $sStyleHidden_typereader_ = 'display: none;';
       }
       $bTestReadOnly_typereader_ = true;
       $sStyleReadLab_typereader_ = 'display: none;';
       $sStyleReadInp_typereader_ = '';
       if (isset($this->nmgp_cmp_readonly['typereader_']) && $this->nmgp_cmp_readonly['typereader_'] == 'on')
       {
           $bTestReadOnly_typereader_ = false;
           unset($this->nmgp_cmp_readonly['typereader_']);
           $sStyleReadLab_typereader_ = '';
           $sStyleReadInp_typereader_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?> class="sc-row" data-sc-row-number="<?php echo $sc_seq_vert; ?>">


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_devices_arcade_multi_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_devices_arcade_multi_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_devices_arcade_multi_add_new_line('S', " . $sc_seq_vert . ")", "do_ajax_form_devices_arcade_multi_add_new_line('S', " . $sc_seq_vert . ")", "sc_clone_line_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_devices_arcade_multi_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_devices_arcade_multi_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_devices_arcade_multi_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_devices_arcade_multi_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
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

   <?php if (isset($this->nmgp_cmp_hidden['cod_activo_']) && $this->nmgp_cmp_hidden['cod_activo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_activo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_activo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cod_activo__line" id="hidden_field_data_cod_activo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cod_activo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cod_activo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cod_activo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_activo_"]) &&  $this->nmgp_cmp_readonly["cod_activo_"] == "on") { 

 ?>
<input type="hidden" name="cod_activo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_activo_) . "\">" . $cod_activo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_activo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cod_activo_<?php echo $sc_seq_vert ?> css_cod_activo__line" style="<?php echo $sStyleReadLab_cod_activo_; ?>"><?php echo $this->form_format_readonly("cod_activo_", $this->form_encode_input($this->cod_activo_)); ?></span><span id="id_read_off_cod_activo_<?php echo $sc_seq_vert ?>" class="css_read_off_cod_activo_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_activo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cod_activo__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_activo_<?php echo $sc_seq_vert ?>" type=text name="cod_activo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_activo_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_activo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_activo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['device_name_']) && $this->nmgp_cmp_hidden['device_name_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="device_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($device_name_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_device_name__line" id="hidden_field_data_device_name_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_device_name_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_device_name__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_device_name_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["device_name_"]) &&  $this->nmgp_cmp_readonly["device_name_"] == "on") { 

 ?>
<input type="hidden" name="device_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($device_name_) . "\">" . $device_name_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_device_name_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-device_name_<?php echo $sc_seq_vert ?> css_device_name__line" style="<?php echo $sStyleReadLab_device_name_; ?>"><?php echo $this->form_format_readonly("device_name_", $this->form_encode_input($this->device_name_)); ?></span><span id="id_read_off_device_name_<?php echo $sc_seq_vert ?>" class="css_read_off_device_name_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_device_name_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_device_name__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_device_name_<?php echo $sc_seq_vert ?>" type=text name="device_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($device_name_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_device_name_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_device_name_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['activa_']) && $this->nmgp_cmp_hidden['activa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="activa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($activa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_activa__line" id="hidden_field_data_activa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_activa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_activa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_activa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["activa_"]) &&  $this->nmgp_cmp_readonly["activa_"] == "on") { 

 ?>
<input type="hidden" name="activa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($activa_) . "\">" . $activa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_activa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-activa_<?php echo $sc_seq_vert ?> css_activa__line" style="<?php echo $sStyleReadLab_activa_; ?>"><?php echo $this->form_format_readonly("activa_", $this->form_encode_input($this->activa_)); ?></span><span id="id_read_off_activa_<?php echo $sc_seq_vert ?>" class="css_read_off_activa_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_activa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_activa__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_activa_<?php echo $sc_seq_vert ?>" type=text name="activa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($activa_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['activa_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['activa_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['activa_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_activa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_activa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['estado_']) && $this->nmgp_cmp_hidden['estado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_estado__line" id="hidden_field_data_estado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_estado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_estado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_estado_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado_"]) &&  $this->nmgp_cmp_readonly["estado_"] == "on") { 

 ?>
<input type="hidden" name="estado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estado_) . "\">" . $estado_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_estado_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-estado_<?php echo $sc_seq_vert ?> css_estado__line" style="<?php echo $sStyleReadLab_estado_; ?>"><?php echo $this->form_format_readonly("estado_", $this->form_encode_input($this->estado_)); ?></span><span id="id_read_off_estado_<?php echo $sc_seq_vert ?>" class="css_read_off_estado_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estado_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_estado__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estado_<?php echo $sc_seq_vert ?>" type=text name="estado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estado_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['estado_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['estado_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['estado_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ult_rfid_']) && $this->nmgp_cmp_hidden['ult_rfid_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ult_rfid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ult_rfid_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ult_rfid__line" id="hidden_field_data_ult_rfid_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ult_rfid_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ult_rfid__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ult_rfid_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ult_rfid_"]) &&  $this->nmgp_cmp_readonly["ult_rfid_"] == "on") { 

 ?>
<input type="hidden" name="ult_rfid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ult_rfid_) . "\">" . $ult_rfid_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ult_rfid_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ult_rfid_<?php echo $sc_seq_vert ?> css_ult_rfid__line" style="<?php echo $sStyleReadLab_ult_rfid_; ?>"><?php echo $this->form_format_readonly("ult_rfid_", $this->form_encode_input($this->ult_rfid_)); ?></span><span id="id_read_off_ult_rfid_<?php echo $sc_seq_vert ?>" class="css_read_off_ult_rfid_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ult_rfid_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ult_rfid__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ult_rfid_<?php echo $sc_seq_vert ?>" type=text name="ult_rfid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ult_rfid_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ult_rfid_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ult_rfid_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ult_fecha_']) && $this->nmgp_cmp_hidden['ult_fecha_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ult_fecha_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ult_fecha_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ult_fecha__line" id="hidden_field_data_ult_fecha_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ult_fecha_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ult_fecha__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ult_fecha_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ult_fecha_"]) &&  $this->nmgp_cmp_readonly["ult_fecha_"] == "on") { 

 ?>
<input type="hidden" name="ult_fecha_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ult_fecha_) . "\">" . $ult_fecha_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ult_fecha_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ult_fecha_<?php echo $sc_seq_vert ?> css_ult_fecha__line" style="<?php echo $sStyleReadLab_ult_fecha_; ?>"><?php echo $this->form_format_readonly("ult_fecha_", $this->form_encode_input($ult_fecha_)); ?></span><span id="id_read_off_ult_fecha_<?php echo $sc_seq_vert ?>" class="css_read_off_ult_fecha_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ult_fecha_; ?>"><?php
$tmp_form_data = $this->field_config['ult_fecha_']['date_format'];
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

 <input class="sc-js-input scFormObjectOddMult css_ult_fecha__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ult_fecha_<?php echo $sc_seq_vert ?>" type=text name="ult_fecha_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ult_fecha_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['ult_fecha_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['ult_fecha_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['ult_fecha_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ult_fecha_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ult_fecha_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->ult_fecha_ = $old_dt_ult_fecha_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['timeout_rfid_']) && $this->nmgp_cmp_hidden['timeout_rfid_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="timeout_rfid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($timeout_rfid_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_timeout_rfid__line" id="hidden_field_data_timeout_rfid_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_timeout_rfid_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_timeout_rfid__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_timeout_rfid_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["timeout_rfid_"]) &&  $this->nmgp_cmp_readonly["timeout_rfid_"] == "on") { 

 ?>
<input type="hidden" name="timeout_rfid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($timeout_rfid_) . "\">" . $timeout_rfid_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_timeout_rfid_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-timeout_rfid_<?php echo $sc_seq_vert ?> css_timeout_rfid__line" style="<?php echo $sStyleReadLab_timeout_rfid_; ?>"><?php echo $this->form_format_readonly("timeout_rfid_", $this->form_encode_input($this->timeout_rfid_)); ?></span><span id="id_read_off_timeout_rfid_<?php echo $sc_seq_vert ?>" class="css_read_off_timeout_rfid_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_timeout_rfid_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_timeout_rfid__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_timeout_rfid_<?php echo $sc_seq_vert ?>" type=text name="timeout_rfid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($timeout_rfid_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['timeout_rfid_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['timeout_rfid_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['timeout_rfid_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_timeout_rfid_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_timeout_rfid_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['acepta_tokens_']) && $this->nmgp_cmp_hidden['acepta_tokens_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="acepta_tokens_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($acepta_tokens_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_acepta_tokens__line" id="hidden_field_data_acepta_tokens_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_acepta_tokens_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_acepta_tokens__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_acepta_tokens_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acepta_tokens_"]) &&  $this->nmgp_cmp_readonly["acepta_tokens_"] == "on") { 

 ?>
<input type="hidden" name="acepta_tokens_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($acepta_tokens_) . "\">" . $acepta_tokens_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_acepta_tokens_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-acepta_tokens_<?php echo $sc_seq_vert ?> css_acepta_tokens__line" style="<?php echo $sStyleReadLab_acepta_tokens_; ?>"><?php echo $this->form_format_readonly("acepta_tokens_", $this->form_encode_input($this->acepta_tokens_)); ?></span><span id="id_read_off_acepta_tokens_<?php echo $sc_seq_vert ?>" class="css_read_off_acepta_tokens_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_acepta_tokens_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_acepta_tokens__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_acepta_tokens_<?php echo $sc_seq_vert ?>" type=text name="acepta_tokens_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($acepta_tokens_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['acepta_tokens_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['acepta_tokens_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['acepta_tokens_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acepta_tokens_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acepta_tokens_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tokens_']) && $this->nmgp_cmp_hidden['tokens_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tokens_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tokens_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tokens__line" id="hidden_field_data_tokens_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tokens_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tokens__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tokens_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tokens_"]) &&  $this->nmgp_cmp_readonly["tokens_"] == "on") { 

 ?>
<input type="hidden" name="tokens_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tokens_) . "\">" . $tokens_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tokens_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tokens_<?php echo $sc_seq_vert ?> css_tokens__line" style="<?php echo $sStyleReadLab_tokens_; ?>"><?php echo $this->form_format_readonly("tokens_", $this->form_encode_input($this->tokens_)); ?></span><span id="id_read_off_tokens_<?php echo $sc_seq_vert ?>" class="css_read_off_tokens_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tokens_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tokens__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tokens_<?php echo $sc_seq_vert ?>" type=text name="tokens_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tokens_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['tokens_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tokens_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tokens_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tokens_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tokens_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tokens_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['serialrfid_']) && $this->nmgp_cmp_hidden['serialrfid_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="serialrfid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($serialrfid_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_serialrfid__line" id="hidden_field_data_serialrfid_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_serialrfid_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_serialrfid__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_serialrfid_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["serialrfid_"]) &&  $this->nmgp_cmp_readonly["serialrfid_"] == "on") { 

 ?>
<input type="hidden" name="serialrfid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($serialrfid_) . "\">" . $serialrfid_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_serialrfid_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-serialrfid_<?php echo $sc_seq_vert ?> css_serialrfid__line" style="<?php echo $sStyleReadLab_serialrfid_; ?>"><?php echo $this->form_format_readonly("serialrfid_", $this->form_encode_input($this->serialrfid_)); ?></span><span id="id_read_off_serialrfid_<?php echo $sc_seq_vert ?>" class="css_read_off_serialrfid_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_serialrfid_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_serialrfid__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_serialrfid_<?php echo $sc_seq_vert ?>" type=text name="serialrfid_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($serialrfid_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=20"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_serialrfid_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_serialrfid_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['bidireccion_']) && $this->nmgp_cmp_hidden['bidireccion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bidireccion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bidireccion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_bidireccion__line" id="hidden_field_data_bidireccion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_bidireccion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_bidireccion__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_bidireccion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bidireccion_"]) &&  $this->nmgp_cmp_readonly["bidireccion_"] == "on") { 

 ?>
<input type="hidden" name="bidireccion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bidireccion_) . "\">" . $bidireccion_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_bidireccion_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-bidireccion_<?php echo $sc_seq_vert ?> css_bidireccion__line" style="<?php echo $sStyleReadLab_bidireccion_; ?>"><?php echo $this->form_format_readonly("bidireccion_", $this->form_encode_input($this->bidireccion_)); ?></span><span id="id_read_off_bidireccion_<?php echo $sc_seq_vert ?>" class="css_read_off_bidireccion_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_bidireccion_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_bidireccion__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_bidireccion_<?php echo $sc_seq_vert ?>" type=text name="bidireccion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bidireccion_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['bidireccion_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['bidireccion_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['bidireccion_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bidireccion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bidireccion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cod_devicee_']) && $this->nmgp_cmp_hidden['cod_devicee_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_devicee_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_devicee_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cod_devicee__line" id="hidden_field_data_cod_devicee_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cod_devicee_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cod_devicee__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cod_devicee_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_devicee_"]) &&  $this->nmgp_cmp_readonly["cod_devicee_"] == "on") { 

 ?>
<input type="hidden" name="cod_devicee_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_devicee_) . "\">" . $cod_devicee_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_devicee_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cod_devicee_<?php echo $sc_seq_vert ?> css_cod_devicee__line" style="<?php echo $sStyleReadLab_cod_devicee_; ?>"><?php echo $this->form_format_readonly("cod_devicee_", $this->form_encode_input($this->cod_devicee_)); ?></span><span id="id_read_off_cod_devicee_<?php echo $sc_seq_vert ?>" class="css_read_off_cod_devicee_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_devicee_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cod_devicee__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_devicee_<?php echo $sc_seq_vert ?>" type=text name="cod_devicee_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_devicee_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['cod_devicee_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['cod_devicee_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['cod_devicee_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_devicee_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_devicee_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pin_relay1_']) && $this->nmgp_cmp_hidden['pin_relay1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pin_relay1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pin_relay1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pin_relay1__line" id="hidden_field_data_pin_relay1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pin_relay1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pin_relay1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pin_relay1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pin_relay1_"]) &&  $this->nmgp_cmp_readonly["pin_relay1_"] == "on") { 

 ?>
<input type="hidden" name="pin_relay1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pin_relay1_) . "\">" . $pin_relay1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pin_relay1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pin_relay1_<?php echo $sc_seq_vert ?> css_pin_relay1__line" style="<?php echo $sStyleReadLab_pin_relay1_; ?>"><?php echo $this->form_format_readonly("pin_relay1_", $this->form_encode_input($this->pin_relay1_)); ?></span><span id="id_read_off_pin_relay1_<?php echo $sc_seq_vert ?>" class="css_read_off_pin_relay1_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pin_relay1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pin_relay1__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pin_relay1_<?php echo $sc_seq_vert ?>" type=text name="pin_relay1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pin_relay1_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pin_relay1_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pin_relay1_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['pin_relay1_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pin_relay1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pin_relay1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['pin_relay2_']) && $this->nmgp_cmp_hidden['pin_relay2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pin_relay2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pin_relay2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_pin_relay2__line" id="hidden_field_data_pin_relay2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_pin_relay2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_pin_relay2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_pin_relay2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pin_relay2_"]) &&  $this->nmgp_cmp_readonly["pin_relay2_"] == "on") { 

 ?>
<input type="hidden" name="pin_relay2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pin_relay2_) . "\">" . $pin_relay2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_pin_relay2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-pin_relay2_<?php echo $sc_seq_vert ?> css_pin_relay2__line" style="<?php echo $sStyleReadLab_pin_relay2_; ?>"><?php echo $this->form_format_readonly("pin_relay2_", $this->form_encode_input($this->pin_relay2_)); ?></span><span id="id_read_off_pin_relay2_<?php echo $sc_seq_vert ?>" class="css_read_off_pin_relay2_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pin_relay2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_pin_relay2__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pin_relay2_<?php echo $sc_seq_vert ?>" type=text name="pin_relay2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($pin_relay2_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pin_relay2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pin_relay2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['pin_relay2_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pin_relay2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pin_relay2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['url_accion_']) && $this->nmgp_cmp_hidden['url_accion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_accion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_accion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_url_accion__line" id="hidden_field_data_url_accion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_url_accion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_url_accion__line" style="vertical-align: top;padding: 0px">
<?php
$url_accion__val = nl2br($url_accion_);

?>

<?php if ($bTestReadOnly_url_accion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_accion_"]) &&  $this->nmgp_cmp_readonly["url_accion_"] == "on") { 

 ?>
<input type="hidden" name="url_accion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_accion_) . "\">" . $url_accion__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_accion_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-url_accion_<?php echo $sc_seq_vert ?> css_url_accion__line" style="<?php echo $sStyleReadLab_url_accion_; ?>"><?php echo $this->form_format_readonly("url_accion_", $this->form_encode_input($url_accion__val)); ?></span><span id="id_read_off_url_accion_<?php echo $sc_seq_vert ?>" class="css_read_off_url_accion_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_accion_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_url_accion__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_accion_<?php echo $sc_seq_vert ?>" id="id_sc_field_url_accion_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_accion_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_accion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_accion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['url_atraccion_']) && $this->nmgp_cmp_hidden['url_atraccion_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_atraccion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_atraccion_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_url_atraccion__line" id="hidden_field_data_url_atraccion_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_url_atraccion_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_url_atraccion__line" style="vertical-align: top;padding: 0px">
<?php
$url_atraccion__val = nl2br($url_atraccion_);

?>

<?php if ($bTestReadOnly_url_atraccion_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_atraccion_"]) &&  $this->nmgp_cmp_readonly["url_atraccion_"] == "on") { 

 ?>
<input type="hidden" name="url_atraccion_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_atraccion_) . "\">" . $url_atraccion__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_atraccion_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-url_atraccion_<?php echo $sc_seq_vert ?> css_url_atraccion__line" style="<?php echo $sStyleReadLab_url_atraccion_; ?>"><?php echo $this->form_format_readonly("url_atraccion_", $this->form_encode_input($url_atraccion__val)); ?></span><span id="id_read_off_url_atraccion_<?php echo $sc_seq_vert ?>" class="css_read_off_url_atraccion_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_atraccion_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_url_atraccion__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_atraccion_<?php echo $sc_seq_vert ?>" id="id_sc_field_url_atraccion_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_atraccion_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_atraccion_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_atraccion_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['uhfip_']) && $this->nmgp_cmp_hidden['uhfip_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="uhfip_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($uhfip_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_uhfip__line" id="hidden_field_data_uhfip_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_uhfip_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_uhfip__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_uhfip_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["uhfip_"]) &&  $this->nmgp_cmp_readonly["uhfip_"] == "on") { 

 ?>
<input type="hidden" name="uhfip_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($uhfip_) . "\">" . $uhfip_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_uhfip_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-uhfip_<?php echo $sc_seq_vert ?> css_uhfip__line" style="<?php echo $sStyleReadLab_uhfip_; ?>"><?php echo $this->form_format_readonly("uhfip_", $this->form_encode_input($this->uhfip_)); ?></span><span id="id_read_off_uhfip_<?php echo $sc_seq_vert ?>" class="css_read_off_uhfip_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_uhfip_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_uhfip__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_uhfip_<?php echo $sc_seq_vert ?>" type=text name="uhfip_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($uhfip_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_uhfip_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_uhfip_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['url_reader_']) && $this->nmgp_cmp_hidden['url_reader_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_reader_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_reader_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_url_reader__line" id="hidden_field_data_url_reader_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_url_reader_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_url_reader__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_url_reader_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_reader_"]) &&  $this->nmgp_cmp_readonly["url_reader_"] == "on") { 

 ?>
<input type="hidden" name="url_reader_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_reader_) . "\">" . $url_reader_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_reader_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-url_reader_<?php echo $sc_seq_vert ?> css_url_reader__line" style="<?php echo $sStyleReadLab_url_reader_; ?>"><?php echo $this->form_format_readonly("url_reader_", $this->form_encode_input($this->url_reader_)); ?></span><span id="id_read_off_url_reader_<?php echo $sc_seq_vert ?>" class="css_read_off_url_reader_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_reader_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_url_reader__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_url_reader_<?php echo $sc_seq_vert ?>" type=text name="url_reader_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_reader_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_reader_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_reader_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cod_rfid900_']) && $this->nmgp_cmp_hidden['cod_rfid900_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cod_rfid900_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_rfid900_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cod_rfid900__line" id="hidden_field_data_cod_rfid900_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cod_rfid900_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cod_rfid900__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cod_rfid900_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cod_rfid900_"]) &&  $this->nmgp_cmp_readonly["cod_rfid900_"] == "on") { 

 ?>
<input type="hidden" name="cod_rfid900_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_rfid900_) . "\">" . $cod_rfid900_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cod_rfid900_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cod_rfid900_<?php echo $sc_seq_vert ?> css_cod_rfid900__line" style="<?php echo $sStyleReadLab_cod_rfid900_; ?>"><?php echo $this->form_format_readonly("cod_rfid900_", $this->form_encode_input($this->cod_rfid900_)); ?></span><span id="id_read_off_cod_rfid900_<?php echo $sc_seq_vert ?>" class="css_read_off_cod_rfid900_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cod_rfid900_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cod_rfid900__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cod_rfid900_<?php echo $sc_seq_vert ?>" type=text name="cod_rfid900_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cod_rfid900_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cod_rfid900_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cod_rfid900_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['mensaje_']) && $this->nmgp_cmp_hidden['mensaje_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mensaje_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($mensaje_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_mensaje__line" id="hidden_field_data_mensaje_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_mensaje_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_mensaje__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_mensaje_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mensaje_"]) &&  $this->nmgp_cmp_readonly["mensaje_"] == "on") { 

 ?>
<input type="hidden" name="mensaje_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($mensaje_) . "\">" . $mensaje_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_mensaje_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-mensaje_<?php echo $sc_seq_vert ?> css_mensaje__line" style="<?php echo $sStyleReadLab_mensaje_; ?>"><?php echo $this->form_format_readonly("mensaje_", $this->form_encode_input($this->mensaje_)); ?></span><span id="id_read_off_mensaje_<?php echo $sc_seq_vert ?>" class="css_read_off_mensaje_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_mensaje_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_mensaje__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_mensaje_<?php echo $sc_seq_vert ?>" type=text name="mensaje_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($mensaje_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mensaje_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mensaje_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipolector_']) && $this->nmgp_cmp_hidden['tipolector_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipolector_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipolector_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipolector__line" id="hidden_field_data_tipolector_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipolector_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipolector__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipolector_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipolector_"]) &&  $this->nmgp_cmp_readonly["tipolector_"] == "on") { 

 ?>
<input type="hidden" name="tipolector_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipolector_) . "\">" . $tipolector_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipolector_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tipolector_<?php echo $sc_seq_vert ?> css_tipolector__line" style="<?php echo $sStyleReadLab_tipolector_; ?>"><?php echo $this->form_format_readonly("tipolector_", $this->form_encode_input($this->tipolector_)); ?></span><span id="id_read_off_tipolector_<?php echo $sc_seq_vert ?>" class="css_read_off_tipolector_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipolector_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tipolector__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipolector_<?php echo $sc_seq_vert ?>" type=text name="tipolector_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipolector_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipolector_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipolector_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['url_accion_bg_']) && $this->nmgp_cmp_hidden['url_accion_bg_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_accion_bg_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_accion_bg_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_url_accion_bg__line" id="hidden_field_data_url_accion_bg_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_url_accion_bg_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_url_accion_bg__line" style="vertical-align: top;padding: 0px">
<?php
$url_accion_bg__val = nl2br($url_accion_bg_);

?>

<?php if ($bTestReadOnly_url_accion_bg_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_accion_bg_"]) &&  $this->nmgp_cmp_readonly["url_accion_bg_"] == "on") { 

 ?>
<input type="hidden" name="url_accion_bg_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_accion_bg_) . "\">" . $url_accion_bg__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_accion_bg_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-url_accion_bg_<?php echo $sc_seq_vert ?> css_url_accion_bg__line" style="<?php echo $sStyleReadLab_url_accion_bg_; ?>"><?php echo $this->form_format_readonly("url_accion_bg_", $this->form_encode_input($url_accion_bg__val)); ?></span><span id="id_read_off_url_accion_bg_<?php echo $sc_seq_vert ?>" class="css_read_off_url_accion_bg_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_accion_bg_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_url_accion_bg__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_accion_bg_<?php echo $sc_seq_vert ?>" id="id_sc_field_url_accion_bg_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_accion_bg_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_accion_bg_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_accion_bg_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['url_inicio_']) && $this->nmgp_cmp_hidden['url_inicio_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="url_inicio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_inicio_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_url_inicio__line" id="hidden_field_data_url_inicio_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_url_inicio_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_url_inicio__line" style="vertical-align: top;padding: 0px">
<?php
$url_inicio__val = nl2br($url_inicio_);

?>

<?php if ($bTestReadOnly_url_inicio_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["url_inicio_"]) &&  $this->nmgp_cmp_readonly["url_inicio_"] == "on") { 

 ?>
<input type="hidden" name="url_inicio_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($url_inicio_) . "\">" . $url_inicio__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_url_inicio_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-url_inicio_<?php echo $sc_seq_vert ?> css_url_inicio__line" style="<?php echo $sStyleReadLab_url_inicio_; ?>"><?php echo $this->form_format_readonly("url_inicio_", $this->form_encode_input($url_inicio__val)); ?></span><span id="id_read_off_url_inicio_<?php echo $sc_seq_vert ?>" class="css_read_off_url_inicio_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_url_inicio_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_url_inicio__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="url_inicio_<?php echo $sc_seq_vert ?>" id="id_sc_field_url_inicio_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $url_inicio_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_url_inicio_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_url_inicio_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ledstripe1_']) && $this->nmgp_cmp_hidden['ledstripe1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ledstripe1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ledstripe1__line" id="hidden_field_data_ledstripe1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ledstripe1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ledstripe1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ledstripe1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ledstripe1_"]) &&  $this->nmgp_cmp_readonly["ledstripe1_"] == "on") { 

 ?>
<input type="hidden" name="ledstripe1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe1_) . "\">" . $ledstripe1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ledstripe1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ledstripe1_<?php echo $sc_seq_vert ?> css_ledstripe1__line" style="<?php echo $sStyleReadLab_ledstripe1_; ?>"><?php echo $this->form_format_readonly("ledstripe1_", $this->form_encode_input($this->ledstripe1_)); ?></span><span id="id_read_off_ledstripe1_<?php echo $sc_seq_vert ?>" class="css_read_off_ledstripe1_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ledstripe1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ledstripe1__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ledstripe1_<?php echo $sc_seq_vert ?>" type=text name="ledstripe1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ledstripe1_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
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

   <?php if (isset($this->nmgp_cmp_hidden['lasteffect_']) && $this->nmgp_cmp_hidden['lasteffect_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lasteffect_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lasteffect_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_lasteffect__line" id="hidden_field_data_lasteffect_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_lasteffect_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_lasteffect__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_lasteffect_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lasteffect_"]) &&  $this->nmgp_cmp_readonly["lasteffect_"] == "on") { 

 ?>
<input type="hidden" name="lasteffect_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lasteffect_) . "\">" . $lasteffect_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_lasteffect_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-lasteffect_<?php echo $sc_seq_vert ?> css_lasteffect__line" style="<?php echo $sStyleReadLab_lasteffect_; ?>"><?php echo $this->form_format_readonly("lasteffect_", $this->form_encode_input($this->lasteffect_)); ?></span><span id="id_read_off_lasteffect_<?php echo $sc_seq_vert ?>" class="css_read_off_lasteffect_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_lasteffect_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_lasteffect__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_lasteffect_<?php echo $sc_seq_vert ?>" type=text name="lasteffect_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lasteffect_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lasteffect_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lasteffect_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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

   <?php if (isset($this->nmgp_cmp_hidden['sound_']) && $this->nmgp_cmp_hidden['sound_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sound_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sound_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sound__line" id="hidden_field_data_sound_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sound_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sound__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sound_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sound_"]) &&  $this->nmgp_cmp_readonly["sound_"] == "on") { 

 ?>
<input type="hidden" name="sound_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sound_) . "\">" . $sound_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sound_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sound_<?php echo $sc_seq_vert ?> css_sound__line" style="<?php echo $sStyleReadLab_sound_; ?>"><?php echo $this->form_format_readonly("sound_", $this->form_encode_input($this->sound_)); ?></span><span id="id_read_off_sound_<?php echo $sc_seq_vert ?>" class="css_read_off_sound_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sound_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sound__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_sound_<?php echo $sc_seq_vert ?>" type=text name="sound_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sound_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=145 alt="{datatype: 'text', maxLength: 145, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sound_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sound_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['points_']) && $this->nmgp_cmp_hidden['points_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="points_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($points_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_points__line" id="hidden_field_data_points_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_points_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_points__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_points_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["points_"]) &&  $this->nmgp_cmp_readonly["points_"] == "on") { 

 ?>
<input type="hidden" name="points_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($points_) . "\">" . $points_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_points_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-points_<?php echo $sc_seq_vert ?> css_points__line" style="<?php echo $sStyleReadLab_points_; ?>"><?php echo $this->form_format_readonly("points_", $this->form_encode_input($this->points_)); ?></span><span id="id_read_off_points_<?php echo $sc_seq_vert ?>" class="css_read_off_points_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_points_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_points__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_points_<?php echo $sc_seq_vert ?>" type=text name="points_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($points_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['points_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['points_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['points_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_points_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_points_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['speak_']) && $this->nmgp_cmp_hidden['speak_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="speak_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($speak_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_speak__line" id="hidden_field_data_speak_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_speak_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_speak__line" style="vertical-align: top;padding: 0px">
<?php
$speak__val = nl2br($speak_);

?>

<?php if ($bTestReadOnly_speak_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["speak_"]) &&  $this->nmgp_cmp_readonly["speak_"] == "on") { 

 ?>
<input type="hidden" name="speak_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($speak_) . "\">" . $speak__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_speak_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-speak_<?php echo $sc_seq_vert ?> css_speak__line" style="<?php echo $sStyleReadLab_speak_; ?>"><?php echo $this->form_format_readonly("speak_", $this->form_encode_input($speak__val)); ?></span><span id="id_read_off_speak_<?php echo $sc_seq_vert ?>" class="css_read_off_speak_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_speak_; ?>">
 <textarea class="sc-js-input scFormObjectOddMult css_speak__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;" name="speak_<?php echo $sc_seq_vert ?>" id="id_sc_field_speak_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $speak_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_speak_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_speak_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['typereader_']) && $this->nmgp_cmp_hidden['typereader_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="typereader_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($typereader_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_typereader__line" id="hidden_field_data_typereader_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_typereader_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_typereader__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_typereader_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["typereader_"]) &&  $this->nmgp_cmp_readonly["typereader_"] == "on") { 

 ?>
<input type="hidden" name="typereader_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($typereader_) . "\">" . $typereader_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_typereader_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-typereader_<?php echo $sc_seq_vert ?> css_typereader__line" style="<?php echo $sStyleReadLab_typereader_; ?>"><?php echo $this->form_format_readonly("typereader_", $this->form_encode_input($this->typereader_)); ?></span><span id="id_read_off_typereader_<?php echo $sc_seq_vert ?>" class="css_read_off_typereader_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_typereader_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_typereader__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_typereader_<?php echo $sc_seq_vert ?>" type=text name="typereader_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($typereader_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_typereader_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_typereader_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
       if (isset($sCheckRead_cod_activo_))
       {
           $this->nmgp_cmp_readonly['cod_activo_'] = $sCheckRead_cod_activo_;
       }
       if ('display: none;' == $sStyleHidden_cod_activo_)
       {
           $this->nmgp_cmp_hidden['cod_activo_'] = 'off';
       }
       if (isset($sCheckRead_device_name_))
       {
           $this->nmgp_cmp_readonly['device_name_'] = $sCheckRead_device_name_;
       }
       if ('display: none;' == $sStyleHidden_device_name_)
       {
           $this->nmgp_cmp_hidden['device_name_'] = 'off';
       }
       if (isset($sCheckRead_activa_))
       {
           $this->nmgp_cmp_readonly['activa_'] = $sCheckRead_activa_;
       }
       if ('display: none;' == $sStyleHidden_activa_)
       {
           $this->nmgp_cmp_hidden['activa_'] = 'off';
       }
       if (isset($sCheckRead_estado_))
       {
           $this->nmgp_cmp_readonly['estado_'] = $sCheckRead_estado_;
       }
       if ('display: none;' == $sStyleHidden_estado_)
       {
           $this->nmgp_cmp_hidden['estado_'] = 'off';
       }
       if (isset($sCheckRead_ult_rfid_))
       {
           $this->nmgp_cmp_readonly['ult_rfid_'] = $sCheckRead_ult_rfid_;
       }
       if ('display: none;' == $sStyleHidden_ult_rfid_)
       {
           $this->nmgp_cmp_hidden['ult_rfid_'] = 'off';
       }
       if (isset($sCheckRead_ult_fecha_))
       {
           $this->nmgp_cmp_readonly['ult_fecha_'] = $sCheckRead_ult_fecha_;
       }
       if ('display: none;' == $sStyleHidden_ult_fecha_)
       {
           $this->nmgp_cmp_hidden['ult_fecha_'] = 'off';
       }
       if (isset($sCheckRead_timeout_rfid_))
       {
           $this->nmgp_cmp_readonly['timeout_rfid_'] = $sCheckRead_timeout_rfid_;
       }
       if ('display: none;' == $sStyleHidden_timeout_rfid_)
       {
           $this->nmgp_cmp_hidden['timeout_rfid_'] = 'off';
       }
       if (isset($sCheckRead_acepta_tokens_))
       {
           $this->nmgp_cmp_readonly['acepta_tokens_'] = $sCheckRead_acepta_tokens_;
       }
       if ('display: none;' == $sStyleHidden_acepta_tokens_)
       {
           $this->nmgp_cmp_hidden['acepta_tokens_'] = 'off';
       }
       if (isset($sCheckRead_tokens_))
       {
           $this->nmgp_cmp_readonly['tokens_'] = $sCheckRead_tokens_;
       }
       if ('display: none;' == $sStyleHidden_tokens_)
       {
           $this->nmgp_cmp_hidden['tokens_'] = 'off';
       }
       if (isset($sCheckRead_serialrfid_))
       {
           $this->nmgp_cmp_readonly['serialrfid_'] = $sCheckRead_serialrfid_;
       }
       if ('display: none;' == $sStyleHidden_serialrfid_)
       {
           $this->nmgp_cmp_hidden['serialrfid_'] = 'off';
       }
       if (isset($sCheckRead_bidireccion_))
       {
           $this->nmgp_cmp_readonly['bidireccion_'] = $sCheckRead_bidireccion_;
       }
       if ('display: none;' == $sStyleHidden_bidireccion_)
       {
           $this->nmgp_cmp_hidden['bidireccion_'] = 'off';
       }
       if (isset($sCheckRead_cod_devicee_))
       {
           $this->nmgp_cmp_readonly['cod_devicee_'] = $sCheckRead_cod_devicee_;
       }
       if ('display: none;' == $sStyleHidden_cod_devicee_)
       {
           $this->nmgp_cmp_hidden['cod_devicee_'] = 'off';
       }
       if (isset($sCheckRead_pin_relay1_))
       {
           $this->nmgp_cmp_readonly['pin_relay1_'] = $sCheckRead_pin_relay1_;
       }
       if ('display: none;' == $sStyleHidden_pin_relay1_)
       {
           $this->nmgp_cmp_hidden['pin_relay1_'] = 'off';
       }
       if (isset($sCheckRead_pin_relay2_))
       {
           $this->nmgp_cmp_readonly['pin_relay2_'] = $sCheckRead_pin_relay2_;
       }
       if ('display: none;' == $sStyleHidden_pin_relay2_)
       {
           $this->nmgp_cmp_hidden['pin_relay2_'] = 'off';
       }
       if (isset($sCheckRead_url_accion_))
       {
           $this->nmgp_cmp_readonly['url_accion_'] = $sCheckRead_url_accion_;
       }
       if ('display: none;' == $sStyleHidden_url_accion_)
       {
           $this->nmgp_cmp_hidden['url_accion_'] = 'off';
       }
       if (isset($sCheckRead_url_atraccion_))
       {
           $this->nmgp_cmp_readonly['url_atraccion_'] = $sCheckRead_url_atraccion_;
       }
       if ('display: none;' == $sStyleHidden_url_atraccion_)
       {
           $this->nmgp_cmp_hidden['url_atraccion_'] = 'off';
       }
       if (isset($sCheckRead_uhfip_))
       {
           $this->nmgp_cmp_readonly['uhfip_'] = $sCheckRead_uhfip_;
       }
       if ('display: none;' == $sStyleHidden_uhfip_)
       {
           $this->nmgp_cmp_hidden['uhfip_'] = 'off';
       }
       if (isset($sCheckRead_url_reader_))
       {
           $this->nmgp_cmp_readonly['url_reader_'] = $sCheckRead_url_reader_;
       }
       if ('display: none;' == $sStyleHidden_url_reader_)
       {
           $this->nmgp_cmp_hidden['url_reader_'] = 'off';
       }
       if (isset($sCheckRead_cod_rfid900_))
       {
           $this->nmgp_cmp_readonly['cod_rfid900_'] = $sCheckRead_cod_rfid900_;
       }
       if ('display: none;' == $sStyleHidden_cod_rfid900_)
       {
           $this->nmgp_cmp_hidden['cod_rfid900_'] = 'off';
       }
       if (isset($sCheckRead_mensaje_))
       {
           $this->nmgp_cmp_readonly['mensaje_'] = $sCheckRead_mensaje_;
       }
       if ('display: none;' == $sStyleHidden_mensaje_)
       {
           $this->nmgp_cmp_hidden['mensaje_'] = 'off';
       }
       if (isset($sCheckRead_tipolector_))
       {
           $this->nmgp_cmp_readonly['tipolector_'] = $sCheckRead_tipolector_;
       }
       if ('display: none;' == $sStyleHidden_tipolector_)
       {
           $this->nmgp_cmp_hidden['tipolector_'] = 'off';
       }
       if (isset($sCheckRead_url_accion_bg_))
       {
           $this->nmgp_cmp_readonly['url_accion_bg_'] = $sCheckRead_url_accion_bg_;
       }
       if ('display: none;' == $sStyleHidden_url_accion_bg_)
       {
           $this->nmgp_cmp_hidden['url_accion_bg_'] = 'off';
       }
       if (isset($sCheckRead_url_inicio_))
       {
           $this->nmgp_cmp_readonly['url_inicio_'] = $sCheckRead_url_inicio_;
       }
       if ('display: none;' == $sStyleHidden_url_inicio_)
       {
           $this->nmgp_cmp_hidden['url_inicio_'] = 'off';
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
       if (isset($sCheckRead_lasteffect_))
       {
           $this->nmgp_cmp_readonly['lasteffect_'] = $sCheckRead_lasteffect_;
       }
       if ('display: none;' == $sStyleHidden_lasteffect_)
       {
           $this->nmgp_cmp_hidden['lasteffect_'] = 'off';
       }
       if (isset($sCheckRead_color_))
       {
           $this->nmgp_cmp_readonly['color_'] = $sCheckRead_color_;
       }
       if ('display: none;' == $sStyleHidden_color_)
       {
           $this->nmgp_cmp_hidden['color_'] = 'off';
       }
       if (isset($sCheckRead_sound_))
       {
           $this->nmgp_cmp_readonly['sound_'] = $sCheckRead_sound_;
       }
       if ('display: none;' == $sStyleHidden_sound_)
       {
           $this->nmgp_cmp_hidden['sound_'] = 'off';
       }
       if (isset($sCheckRead_points_))
       {
           $this->nmgp_cmp_readonly['points_'] = $sCheckRead_points_;
       }
       if ('display: none;' == $sStyleHidden_points_)
       {
           $this->nmgp_cmp_hidden['points_'] = 'off';
       }
       if (isset($sCheckRead_speak_))
       {
           $this->nmgp_cmp_readonly['speak_'] = $sCheckRead_speak_;
       }
       if ('display: none;' == $sStyleHidden_speak_)
       {
           $this->nmgp_cmp_hidden['speak_'] = 'off';
       }
       if (isset($sCheckRead_typereader_))
       {
           $this->nmgp_cmp_readonly['typereader_'] = $sCheckRead_typereader_;
       }
       if ('display: none;' == $sStyleHidden_typereader_)
       {
           $this->nmgp_cmp_hidden['typereader_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_devices_arcade_multi = $guarda_form_vert_form_devices_arcade_multi;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['birpara'];
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
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['first'];
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
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['back'];
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
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['forward'];
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
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_devices_arcade_multi");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_devices_arcade_multi");
 parent.scAjaxDetailHeight("form_devices_arcade_multi", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_devices_arcade_multi", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_devices_arcade_multi", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['sc_modal'])
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
			do_ajax_form_devices_arcade_multi_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-5").hasClass("disabled")) {
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
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_devices_arcade_multi']['buttonStatus'] = $this->nmgp_botoes;
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
