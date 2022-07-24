<?php
class form_product_edit_masivo_form extends form_product_edit_masivo_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " " . $this->Ini->Nm_lang['lang_tbl_product'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " " . $this->Ini->Nm_lang['lang_tbl_product'] . ""); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_redir_atualiz'] == 'ok')
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
.css_read_off_dateproduct_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_product_edit_masivo/form_product_edit_masivo_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_product_edit_masivo_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_product_edit_masivo_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['link_info']['remove_border']) {
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
 include_once("form_product_edit_masivo_js0.php");
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
<form  name="F1" method="post" enctype="multipart/form-data" 
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="upload_file_row" value="">
<?php
$_SESSION['scriptcase']['error_span_title']['form_product_edit_masivo'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_product_edit_masivo'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['fast_search'][2] : "";
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
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['insert'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['bcancelar'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['balterarsel']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['balterarsel']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['balterarsel']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['balterarsel']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['balterarsel'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="50%" height="">
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
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult sc-col-title" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult sc-col-title"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php
    $sStyleHidden_product_name_ = '';
    if (isset($this->nmgp_cmp_hidden['product_name_']) && $this->nmgp_cmp_hidden['product_name_'] == 'off') {
        $sStyleHidden_product_name_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['product_name_']) || $this->nmgp_cmp_hidden['product_name_'] == 'on') {
        if (!isset($this->nm_new_label['product_name_'])) {
            $this->nm_new_label['product_name_'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_name'] . "";
        }
        $SC_Label = "" . $this->nm_new_label['product_name_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_product_name__label sc-col-title" id="hidden_field_label_product_name_" style="<?php echo $sStyleHidden_product_name_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_id_category_ = '';
    if (isset($this->nmgp_cmp_hidden['id_category_']) && $this->nmgp_cmp_hidden['id_category_'] == 'off') {
        $sStyleHidden_id_category_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['id_category_']) || $this->nmgp_cmp_hidden['id_category_'] == 'on') {
        if (!isset($this->nm_new_label['id_category_'])) {
            $this->nm_new_label['id_category_'] = "" . $this->Ini->Nm_lang['lang_product_fld_id_category'] . "";
        }
        $SC_Label = "" . $this->nm_new_label['id_category_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_id_category__label sc-col-title" id="hidden_field_label_id_category_" style="<?php echo $sStyleHidden_id_category_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_product_code_ = '';
    if (isset($this->nmgp_cmp_hidden['product_code_']) && $this->nmgp_cmp_hidden['product_code_'] == 'off') {
        $sStyleHidden_product_code_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['product_code_']) || $this->nmgp_cmp_hidden['product_code_'] == 'on') {
        if (!isset($this->nm_new_label['product_code_'])) {
            $this->nm_new_label['product_code_'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_code'] . "";
        }
        $SC_Label = "" . $this->nm_new_label['product_code_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_product_code__label sc-col-title" id="hidden_field_label_product_code_" style="<?php echo $sStyleHidden_product_code_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_dateproduct_ = '';
    if (isset($this->nmgp_cmp_hidden['dateproduct_']) && $this->nmgp_cmp_hidden['dateproduct_'] == 'off') {
        $sStyleHidden_dateproduct_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['dateproduct_']) || $this->nmgp_cmp_hidden['dateproduct_'] == 'on') {
        if (!isset($this->nm_new_label['dateproduct_'])) {
            $this->nm_new_label['dateproduct_'] = "" . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . "";
        }
        $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['dateproduct_']['date_format']));
        $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
        $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
        $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
        $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
        $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
        $SC_Label = "" . $this->nm_new_label['dateproduct_']  . "";
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
        $label_final .= "<div><span class=\"scFormDataHelpOddMult\">$date_format_show</span></div>";
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_dateproduct__label sc-col-title" id="hidden_field_label_dateproduct_" style="<?php echo $sStyleHidden_dateproduct_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_product_cost_ = '';
    if (isset($this->nmgp_cmp_hidden['product_cost_']) && $this->nmgp_cmp_hidden['product_cost_'] == 'off') {
        $sStyleHidden_product_cost_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['product_cost_']) || $this->nmgp_cmp_hidden['product_cost_'] == 'on') {
        if (!isset($this->nm_new_label['product_cost_'])) {
            $this->nm_new_label['product_cost_'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . "";
        }
        $SC_Label = "" . $this->nm_new_label['product_cost_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_product_cost__label sc-col-title" id="hidden_field_label_product_cost_" style="<?php echo $sStyleHidden_product_cost_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_stock_ = '';
    if (isset($this->nmgp_cmp_hidden['stock_']) && $this->nmgp_cmp_hidden['stock_'] == 'off') {
        $sStyleHidden_stock_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['stock_']) || $this->nmgp_cmp_hidden['stock_'] == 'on') {
        if (!isset($this->nm_new_label['stock_'])) {
            $this->nm_new_label['stock_'] = "" . $this->Ini->Nm_lang['lang_product_fld_stock'] . "";
        }
        $SC_Label = "" . $this->nm_new_label['stock_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_stock__label sc-col-title" id="hidden_field_label_stock_" style="<?php echo $sStyleHidden_stock_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_product_value_ = '';
    if (isset($this->nmgp_cmp_hidden['product_value_']) && $this->nmgp_cmp_hidden['product_value_'] == 'off') {
        $sStyleHidden_product_value_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['product_value_']) || $this->nmgp_cmp_hidden['product_value_'] == 'on') {
        if (!isset($this->nm_new_label['product_value_'])) {
            $this->nm_new_label['product_value_'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_value'] . "";
        }
        $SC_Label = "" . $this->nm_new_label['product_value_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_product_value__label sc-col-title" id="hidden_field_label_product_value_" style="<?php echo $sStyleHidden_product_value_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_discount_ = '';
    if (isset($this->nmgp_cmp_hidden['discount_']) && $this->nmgp_cmp_hidden['discount_'] == 'off') {
        $sStyleHidden_discount_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['discount_']) || $this->nmgp_cmp_hidden['discount_'] == 'on') {
        if (!isset($this->nm_new_label['discount_'])) {
            $this->nm_new_label['discount_'] = "" . $this->Ini->Nm_lang['lang_product_fld_discount'] . "";
        }
        $SC_Label = "" . $this->nm_new_label['discount_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_discount__label sc-col-title" id="hidden_field_label_discount_" style="<?php echo $sStyleHidden_discount_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_poriva_ = '';
    if (isset($this->nmgp_cmp_hidden['poriva_']) && $this->nmgp_cmp_hidden['poriva_'] == 'off') {
        $sStyleHidden_poriva_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['poriva_']) || $this->nmgp_cmp_hidden['poriva_'] == 'on') {
        if (!isset($this->nm_new_label['poriva_'])) {
            $this->nm_new_label['poriva_'] = "Poriva";
        }
        $SC_Label = "" . $this->nm_new_label['poriva_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_poriva__label sc-col-title" id="hidden_field_label_poriva_" style="<?php echo $sStyleHidden_poriva_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_cuentaventa_ = '';
    if (isset($this->nmgp_cmp_hidden['cuentaventa_']) && $this->nmgp_cmp_hidden['cuentaventa_'] == 'off') {
        $sStyleHidden_cuentaventa_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['cuentaventa_']) || $this->nmgp_cmp_hidden['cuentaventa_'] == 'on') {
        if (!isset($this->nm_new_label['cuentaventa_'])) {
            $this->nm_new_label['cuentaventa_'] = "Cuentaventa";
        }
        $SC_Label = "" . $this->nm_new_label['cuentaventa_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_cuentaventa__label sc-col-title" id="hidden_field_label_cuentaventa_" style="<?php echo $sStyleHidden_cuentaventa_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_unidad_ = '';
    if (isset($this->nmgp_cmp_hidden['unidad_']) && $this->nmgp_cmp_hidden['unidad_'] == 'off') {
        $sStyleHidden_unidad_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['unidad_']) || $this->nmgp_cmp_hidden['unidad_'] == 'on') {
        if (!isset($this->nm_new_label['unidad_'])) {
            $this->nm_new_label['unidad_'] = "Unidad";
        }
        $SC_Label = "" . $this->nm_new_label['unidad_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_unidad__label sc-col-title" id="hidden_field_label_unidad_" style="<?php echo $sStyleHidden_unidad_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_tipoitem_ = '';
    if (isset($this->nmgp_cmp_hidden['tipoitem_']) && $this->nmgp_cmp_hidden['tipoitem_'] == 'off') {
        $sStyleHidden_tipoitem_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['tipoitem_']) || $this->nmgp_cmp_hidden['tipoitem_'] == 'on') {
        if (!isset($this->nm_new_label['tipoitem_'])) {
            $this->nm_new_label['tipoitem_'] = "Tipoitem";
        }
        $SC_Label = "" . $this->nm_new_label['tipoitem_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_tipoitem__label sc-col-title" id="hidden_field_label_tipoitem_" style="<?php echo $sStyleHidden_tipoitem_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_cuentacompra_ = '';
    if (isset($this->nmgp_cmp_hidden['cuentacompra_']) && $this->nmgp_cmp_hidden['cuentacompra_'] == 'off') {
        $sStyleHidden_cuentacompra_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['cuentacompra_']) || $this->nmgp_cmp_hidden['cuentacompra_'] == 'on') {
        if (!isset($this->nm_new_label['cuentacompra_'])) {
            $this->nm_new_label['cuentacompra_'] = "Cuentacompra";
        }
        $SC_Label = "" . $this->nm_new_label['cuentacompra_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_cuentacompra__label sc-col-title" id="hidden_field_label_cuentacompra_" style="<?php echo $sStyleHidden_cuentacompra_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_precioventa_ = '';
    if (isset($this->nmgp_cmp_hidden['precioventa_']) && $this->nmgp_cmp_hidden['precioventa_'] == 'off') {
        $sStyleHidden_precioventa_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['precioventa_']) || $this->nmgp_cmp_hidden['precioventa_'] == 'on') {
        if (!isset($this->nm_new_label['precioventa_'])) {
            $this->nm_new_label['precioventa_'] = "Precioventa";
        }
        $SC_Label = "" . $this->nm_new_label['precioventa_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_precioventa__label sc-col-title" id="hidden_field_label_precioventa_" style="<?php echo $sStyleHidden_precioventa_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_puntoventa_ = '';
    if (isset($this->nmgp_cmp_hidden['puntoventa_']) && $this->nmgp_cmp_hidden['puntoventa_'] == 'off') {
        $sStyleHidden_puntoventa_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['puntoventa_']) || $this->nmgp_cmp_hidden['puntoventa_'] == 'on') {
        if (!isset($this->nm_new_label['puntoventa_'])) {
            $this->nm_new_label['puntoventa_'] = "Puntoventa";
        }
        $SC_Label = "" . $this->nm_new_label['puntoventa_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_puntoventa__label sc-col-title" id="hidden_field_label_puntoventa_" style="<?php echo $sStyleHidden_puntoventa_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_id_status_ = '';
    if (isset($this->nmgp_cmp_hidden['id_status_']) && $this->nmgp_cmp_hidden['id_status_'] == 'off') {
        $sStyleHidden_id_status_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['id_status_']) || $this->nmgp_cmp_hidden['id_status_'] == 'on') {
        if (!isset($this->nm_new_label['id_status_'])) {
            $this->nm_new_label['id_status_'] = "" . $this->Ini->Nm_lang['lang_product_fld_id_status'] . "";
        }
        $SC_Label = "" . $this->nm_new_label['id_status_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_id_status__label sc-col-title" id="hidden_field_label_id_status_" style="<?php echo $sStyleHidden_id_status_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_image_ = '';
    if (isset($this->nmgp_cmp_hidden['image_']) && $this->nmgp_cmp_hidden['image_'] == 'off') {
        $sStyleHidden_image_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['image_']) || $this->nmgp_cmp_hidden['image_'] == 'on') {
        if (!isset($this->nm_new_label['image_'])) {
            $this->nm_new_label['image_'] = "" . $this->Ini->Nm_lang['lang_product_fld_image'] . "";
        }
        $SC_Label = "" . $this->nm_new_label['image_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_image__label sc-col-title" id="hidden_field_label_image_" style="<?php echo $sStyleHidden_image_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_entrada_ = '';
    if (isset($this->nmgp_cmp_hidden['entrada_']) && $this->nmgp_cmp_hidden['entrada_'] == 'off') {
        $sStyleHidden_entrada_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['entrada_']) || $this->nmgp_cmp_hidden['entrada_'] == 'on') {
        if (!isset($this->nm_new_label['entrada_'])) {
            $this->nm_new_label['entrada_'] = "Entrada";
        }
        $SC_Label = "" . $this->nm_new_label['entrada_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_entrada__label sc-col-title" id="hidden_field_label_entrada_" style="<?php echo $sStyleHidden_entrada_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_service_ = '';
    if (isset($this->nmgp_cmp_hidden['service_']) && $this->nmgp_cmp_hidden['service_'] == 'off') {
        $sStyleHidden_service_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['service_']) || $this->nmgp_cmp_hidden['service_'] == 'on') {
        if (!isset($this->nm_new_label['service_'])) {
            $this->nm_new_label['service_'] = "Service";
        }
        $SC_Label = "" . $this->nm_new_label['service_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_service__label sc-col-title" id="hidden_field_label_service_" style="<?php echo $sStyleHidden_service_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_kiosko_ = '';
    if (isset($this->nmgp_cmp_hidden['kiosko_']) && $this->nmgp_cmp_hidden['kiosko_'] == 'off') {
        $sStyleHidden_kiosko_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['kiosko_']) || $this->nmgp_cmp_hidden['kiosko_'] == 'on') {
        if (!isset($this->nm_new_label['kiosko_'])) {
            $this->nm_new_label['kiosko_'] = "Kiosko";
        }
        $SC_Label = "" . $this->nm_new_label['kiosko_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_kiosko__label sc-col-title" id="hidden_field_label_kiosko_" style="<?php echo $sStyleHidden_kiosko_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_jugador_ = '';
    if (isset($this->nmgp_cmp_hidden['jugador_']) && $this->nmgp_cmp_hidden['jugador_'] == 'off') {
        $sStyleHidden_jugador_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['jugador_']) || $this->nmgp_cmp_hidden['jugador_'] == 'on') {
        if (!isset($this->nm_new_label['jugador_'])) {
            $this->nm_new_label['jugador_'] = "Jugador";
        }
        $SC_Label = "" . $this->nm_new_label['jugador_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_jugador__label sc-col-title" id="hidden_field_label_jugador_" style="<?php echo $sStyleHidden_jugador_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_visitante_ = '';
    if (isset($this->nmgp_cmp_hidden['visitante_']) && $this->nmgp_cmp_hidden['visitante_'] == 'off') {
        $sStyleHidden_visitante_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['visitante_']) || $this->nmgp_cmp_hidden['visitante_'] == 'on') {
        if (!isset($this->nm_new_label['visitante_'])) {
            $this->nm_new_label['visitante_'] = "Visitante";
        }
        $SC_Label = "" . $this->nm_new_label['visitante_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_visitante__label sc-col-title" id="hidden_field_label_visitante_" style="<?php echo $sStyleHidden_visitante_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_minutos_ = '';
    if (isset($this->nmgp_cmp_hidden['minutos_']) && $this->nmgp_cmp_hidden['minutos_'] == 'off') {
        $sStyleHidden_minutos_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['minutos_']) || $this->nmgp_cmp_hidden['minutos_'] == 'on') {
        if (!isset($this->nm_new_label['minutos_'])) {
            $this->nm_new_label['minutos_'] = "Minutos";
        }
        $SC_Label = "" . $this->nm_new_label['minutos_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_minutos__label sc-col-title" id="hidden_field_label_minutos_" style="<?php echo $sStyleHidden_minutos_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_tarjeta_ = '';
    if (isset($this->nmgp_cmp_hidden['tarjeta_']) && $this->nmgp_cmp_hidden['tarjeta_'] == 'off') {
        $sStyleHidden_tarjeta_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['tarjeta_']) || $this->nmgp_cmp_hidden['tarjeta_'] == 'on') {
        if (!isset($this->nm_new_label['tarjeta_'])) {
            $this->nm_new_label['tarjeta_'] = "Tarjeta";
        }
        $SC_Label = "" . $this->nm_new_label['tarjeta_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_tarjeta__label sc-col-title" id="hidden_field_label_tarjeta_" style="<?php echo $sStyleHidden_tarjeta_; ?>" > <?php echo $label_final ?> </TD>
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
    $sStyleHidden_comida_ = '';
    if (isset($this->nmgp_cmp_hidden['comida_']) && $this->nmgp_cmp_hidden['comida_'] == 'off') {
        $sStyleHidden_comida_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['comida_']) || $this->nmgp_cmp_hidden['comida_'] == 'on') {
        if (!isset($this->nm_new_label['comida_'])) {
            $this->nm_new_label['comida_'] = "Comida";
        }
        $SC_Label = "" . $this->nm_new_label['comida_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_comida__label sc-col-title" id="hidden_field_label_comida_" style="<?php echo $sStyleHidden_comida_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_score_ = '';
    if (isset($this->nmgp_cmp_hidden['score_']) && $this->nmgp_cmp_hidden['score_'] == 'off') {
        $sStyleHidden_score_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['score_']) || $this->nmgp_cmp_hidden['score_'] == 'on') {
        if (!isset($this->nm_new_label['score_'])) {
            $this->nm_new_label['score_'] = "Score";
        }
        $SC_Label = "" . $this->nm_new_label['score_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_score__label sc-col-title" id="hidden_field_label_score_" style="<?php echo $sStyleHidden_score_; ?>" > <?php echo $label_final ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_product_edit_masivo);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_product_edit_masivo = $this->form_vert_form_product_edit_masivo;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_product_edit_masivo))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_product_edit_masivo as $sc_seq_vert => $sc_lixo)
   {
       $this->form_fixed_column_no = 0;
       $this->loadRecordState($sc_seq_vert);
       $this->id_product_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_product_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['product_name_'] = true;
           $this->nmgp_cmp_readonly['id_category_'] = true;
           $this->nmgp_cmp_readonly['product_code_'] = true;
           $this->nmgp_cmp_readonly['dateproduct_'] = true;
           $this->nmgp_cmp_readonly['product_cost_'] = true;
           $this->nmgp_cmp_readonly['stock_'] = true;
           $this->nmgp_cmp_readonly['product_value_'] = true;
           $this->nmgp_cmp_readonly['discount_'] = true;
           $this->nmgp_cmp_readonly['poriva_'] = true;
           $this->nmgp_cmp_readonly['cuentaventa_'] = true;
           $this->nmgp_cmp_readonly['unidad_'] = true;
           $this->nmgp_cmp_readonly['tipoitem_'] = true;
           $this->nmgp_cmp_readonly['cuentacompra_'] = true;
           $this->nmgp_cmp_readonly['precioventa_'] = true;
           $this->nmgp_cmp_readonly['puntoventa_'] = true;
           $this->nmgp_cmp_readonly['id_status_'] = true;
           $this->nmgp_cmp_readonly['image_'] = true;
           $this->nmgp_cmp_readonly['entrada_'] = true;
           $this->nmgp_cmp_readonly['service_'] = true;
           $this->nmgp_cmp_readonly['kiosko_'] = true;
           $this->nmgp_cmp_readonly['jugador_'] = true;
           $this->nmgp_cmp_readonly['visitante_'] = true;
           $this->nmgp_cmp_readonly['minutos_'] = true;
           $this->nmgp_cmp_readonly['tarjeta_'] = true;
           $this->nmgp_cmp_readonly['tokens_'] = true;
           $this->nmgp_cmp_readonly['comida_'] = true;
           $this->nmgp_cmp_readonly['score_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['product_name_']) || $this->nmgp_cmp_readonly['product_name_'] != "on") {$this->nmgp_cmp_readonly['product_name_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_category_']) || $this->nmgp_cmp_readonly['id_category_'] != "on") {$this->nmgp_cmp_readonly['id_category_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['product_code_']) || $this->nmgp_cmp_readonly['product_code_'] != "on") {$this->nmgp_cmp_readonly['product_code_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dateproduct_']) || $this->nmgp_cmp_readonly['dateproduct_'] != "on") {$this->nmgp_cmp_readonly['dateproduct_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['product_cost_']) || $this->nmgp_cmp_readonly['product_cost_'] != "on") {$this->nmgp_cmp_readonly['product_cost_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['stock_']) || $this->nmgp_cmp_readonly['stock_'] != "on") {$this->nmgp_cmp_readonly['stock_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['product_value_']) || $this->nmgp_cmp_readonly['product_value_'] != "on") {$this->nmgp_cmp_readonly['product_value_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['discount_']) || $this->nmgp_cmp_readonly['discount_'] != "on") {$this->nmgp_cmp_readonly['discount_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['poriva_']) || $this->nmgp_cmp_readonly['poriva_'] != "on") {$this->nmgp_cmp_readonly['poriva_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cuentaventa_']) || $this->nmgp_cmp_readonly['cuentaventa_'] != "on") {$this->nmgp_cmp_readonly['cuentaventa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['unidad_']) || $this->nmgp_cmp_readonly['unidad_'] != "on") {$this->nmgp_cmp_readonly['unidad_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipoitem_']) || $this->nmgp_cmp_readonly['tipoitem_'] != "on") {$this->nmgp_cmp_readonly['tipoitem_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cuentacompra_']) || $this->nmgp_cmp_readonly['cuentacompra_'] != "on") {$this->nmgp_cmp_readonly['cuentacompra_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['precioventa_']) || $this->nmgp_cmp_readonly['precioventa_'] != "on") {$this->nmgp_cmp_readonly['precioventa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['puntoventa_']) || $this->nmgp_cmp_readonly['puntoventa_'] != "on") {$this->nmgp_cmp_readonly['puntoventa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_status_']) || $this->nmgp_cmp_readonly['id_status_'] != "on") {$this->nmgp_cmp_readonly['id_status_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['image_']) || $this->nmgp_cmp_readonly['image_'] != "on") {$this->nmgp_cmp_readonly['image_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['entrada_']) || $this->nmgp_cmp_readonly['entrada_'] != "on") {$this->nmgp_cmp_readonly['entrada_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['service_']) || $this->nmgp_cmp_readonly['service_'] != "on") {$this->nmgp_cmp_readonly['service_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['kiosko_']) || $this->nmgp_cmp_readonly['kiosko_'] != "on") {$this->nmgp_cmp_readonly['kiosko_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['jugador_']) || $this->nmgp_cmp_readonly['jugador_'] != "on") {$this->nmgp_cmp_readonly['jugador_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['visitante_']) || $this->nmgp_cmp_readonly['visitante_'] != "on") {$this->nmgp_cmp_readonly['visitante_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['minutos_']) || $this->nmgp_cmp_readonly['minutos_'] != "on") {$this->nmgp_cmp_readonly['minutos_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tarjeta_']) || $this->nmgp_cmp_readonly['tarjeta_'] != "on") {$this->nmgp_cmp_readonly['tarjeta_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tokens_']) || $this->nmgp_cmp_readonly['tokens_'] != "on") {$this->nmgp_cmp_readonly['tokens_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['comida_']) || $this->nmgp_cmp_readonly['comida_'] != "on") {$this->nmgp_cmp_readonly['comida_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['score_']) || $this->nmgp_cmp_readonly['score_'] != "on") {$this->nmgp_cmp_readonly['score_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->product_name_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_name_']; 
       $product_name_ = $this->product_name_; 
       $sStyleHidden_product_name_ = '';
       if (isset($sCheckRead_product_name_))
       {
           unset($sCheckRead_product_name_);
       }
       if (isset($this->nmgp_cmp_readonly['product_name_']))
       {
           $sCheckRead_product_name_ = $this->nmgp_cmp_readonly['product_name_'];
       }
       if (isset($this->nmgp_cmp_hidden['product_name_']) && $this->nmgp_cmp_hidden['product_name_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['product_name_']);
           $sStyleHidden_product_name_ = 'display: none;';
       }
       $bTestReadOnly_product_name_ = true;
       $sStyleReadLab_product_name_ = 'display: none;';
       $sStyleReadInp_product_name_ = '';
       if (isset($this->nmgp_cmp_readonly['product_name_']) && $this->nmgp_cmp_readonly['product_name_'] == 'on')
       {
           $bTestReadOnly_product_name_ = false;
           unset($this->nmgp_cmp_readonly['product_name_']);
           $sStyleReadLab_product_name_ = '';
           $sStyleReadInp_product_name_ = 'display: none;';
       }
       $this->id_category_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_category_']; 
       $id_category_ = $this->id_category_; 
       $sStyleHidden_id_category_ = '';
       if (isset($sCheckRead_id_category_))
       {
           unset($sCheckRead_id_category_);
       }
       if (isset($this->nmgp_cmp_readonly['id_category_']))
       {
           $sCheckRead_id_category_ = $this->nmgp_cmp_readonly['id_category_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_category_']) && $this->nmgp_cmp_hidden['id_category_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_category_']);
           $sStyleHidden_id_category_ = 'display: none;';
       }
       $bTestReadOnly_id_category_ = true;
       $sStyleReadLab_id_category_ = 'display: none;';
       $sStyleReadInp_id_category_ = '';
       if (isset($this->nmgp_cmp_readonly['id_category_']) && $this->nmgp_cmp_readonly['id_category_'] == 'on')
       {
           $bTestReadOnly_id_category_ = false;
           unset($this->nmgp_cmp_readonly['id_category_']);
           $sStyleReadLab_id_category_ = '';
           $sStyleReadInp_id_category_ = 'display: none;';
       }
       $this->product_code_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_code_']; 
       $product_code_ = $this->product_code_; 
       $sStyleHidden_product_code_ = '';
       if (isset($sCheckRead_product_code_))
       {
           unset($sCheckRead_product_code_);
       }
       if (isset($this->nmgp_cmp_readonly['product_code_']))
       {
           $sCheckRead_product_code_ = $this->nmgp_cmp_readonly['product_code_'];
       }
       if (isset($this->nmgp_cmp_hidden['product_code_']) && $this->nmgp_cmp_hidden['product_code_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['product_code_']);
           $sStyleHidden_product_code_ = 'display: none;';
       }
       $bTestReadOnly_product_code_ = true;
       $sStyleReadLab_product_code_ = 'display: none;';
       $sStyleReadInp_product_code_ = '';
       if (isset($this->nmgp_cmp_readonly['product_code_']) && $this->nmgp_cmp_readonly['product_code_'] == 'on')
       {
           $bTestReadOnly_product_code_ = false;
           unset($this->nmgp_cmp_readonly['product_code_']);
           $sStyleReadLab_product_code_ = '';
           $sStyleReadInp_product_code_ = 'display: none;';
       }
       $this->dateproduct_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['dateproduct_'] . ' ' . $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['dateproduct__hora']; 
       $dateproduct_ = $this->dateproduct_; 
       $this->dateproduct__hora = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['dateproduct__hora']; 
       $dateproduct__hora = $this->dateproduct__hora; 
       $sStyleHidden_dateproduct_ = '';
       if (isset($sCheckRead_dateproduct_))
       {
           unset($sCheckRead_dateproduct_);
       }
       if (isset($this->nmgp_cmp_readonly['dateproduct_']))
       {
           $sCheckRead_dateproduct_ = $this->nmgp_cmp_readonly['dateproduct_'];
       }
       if (isset($this->nmgp_cmp_hidden['dateproduct_']) && $this->nmgp_cmp_hidden['dateproduct_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dateproduct_']);
           $sStyleHidden_dateproduct_ = 'display: none;';
       }
       $bTestReadOnly_dateproduct_ = true;
       $sStyleReadLab_dateproduct_ = 'display: none;';
       $sStyleReadInp_dateproduct_ = '';
       if (isset($this->nmgp_cmp_readonly['dateproduct_']) && $this->nmgp_cmp_readonly['dateproduct_'] == 'on')
       {
           $bTestReadOnly_dateproduct_ = false;
           unset($this->nmgp_cmp_readonly['dateproduct_']);
           $sStyleReadLab_dateproduct_ = '';
           $sStyleReadInp_dateproduct_ = 'display: none;';
       }
       $this->product_cost_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_cost_']; 
       $product_cost_ = $this->product_cost_; 
       $sStyleHidden_product_cost_ = '';
       if (isset($sCheckRead_product_cost_))
       {
           unset($sCheckRead_product_cost_);
       }
       if (isset($this->nmgp_cmp_readonly['product_cost_']))
       {
           $sCheckRead_product_cost_ = $this->nmgp_cmp_readonly['product_cost_'];
       }
       if (isset($this->nmgp_cmp_hidden['product_cost_']) && $this->nmgp_cmp_hidden['product_cost_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['product_cost_']);
           $sStyleHidden_product_cost_ = 'display: none;';
       }
       $bTestReadOnly_product_cost_ = true;
       $sStyleReadLab_product_cost_ = 'display: none;';
       $sStyleReadInp_product_cost_ = '';
       if (isset($this->nmgp_cmp_readonly['product_cost_']) && $this->nmgp_cmp_readonly['product_cost_'] == 'on')
       {
           $bTestReadOnly_product_cost_ = false;
           unset($this->nmgp_cmp_readonly['product_cost_']);
           $sStyleReadLab_product_cost_ = '';
           $sStyleReadInp_product_cost_ = 'display: none;';
       }
       $this->stock_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['stock_']; 
       $stock_ = $this->stock_; 
       $sStyleHidden_stock_ = '';
       if (isset($sCheckRead_stock_))
       {
           unset($sCheckRead_stock_);
       }
       if (isset($this->nmgp_cmp_readonly['stock_']))
       {
           $sCheckRead_stock_ = $this->nmgp_cmp_readonly['stock_'];
       }
       if (isset($this->nmgp_cmp_hidden['stock_']) && $this->nmgp_cmp_hidden['stock_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['stock_']);
           $sStyleHidden_stock_ = 'display: none;';
       }
       $bTestReadOnly_stock_ = true;
       $sStyleReadLab_stock_ = 'display: none;';
       $sStyleReadInp_stock_ = '';
       if (isset($this->nmgp_cmp_readonly['stock_']) && $this->nmgp_cmp_readonly['stock_'] == 'on')
       {
           $bTestReadOnly_stock_ = false;
           unset($this->nmgp_cmp_readonly['stock_']);
           $sStyleReadLab_stock_ = '';
           $sStyleReadInp_stock_ = 'display: none;';
       }
       $this->product_value_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['product_value_']; 
       $product_value_ = $this->product_value_; 
       $sStyleHidden_product_value_ = '';
       if (isset($sCheckRead_product_value_))
       {
           unset($sCheckRead_product_value_);
       }
       if (isset($this->nmgp_cmp_readonly['product_value_']))
       {
           $sCheckRead_product_value_ = $this->nmgp_cmp_readonly['product_value_'];
       }
       if (isset($this->nmgp_cmp_hidden['product_value_']) && $this->nmgp_cmp_hidden['product_value_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['product_value_']);
           $sStyleHidden_product_value_ = 'display: none;';
       }
       $bTestReadOnly_product_value_ = true;
       $sStyleReadLab_product_value_ = 'display: none;';
       $sStyleReadInp_product_value_ = '';
       if (isset($this->nmgp_cmp_readonly['product_value_']) && $this->nmgp_cmp_readonly['product_value_'] == 'on')
       {
           $bTestReadOnly_product_value_ = false;
           unset($this->nmgp_cmp_readonly['product_value_']);
           $sStyleReadLab_product_value_ = '';
           $sStyleReadInp_product_value_ = 'display: none;';
       }
       $this->discount_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['discount_']; 
       $discount_ = $this->discount_; 
       $sStyleHidden_discount_ = '';
       if (isset($sCheckRead_discount_))
       {
           unset($sCheckRead_discount_);
       }
       if (isset($this->nmgp_cmp_readonly['discount_']))
       {
           $sCheckRead_discount_ = $this->nmgp_cmp_readonly['discount_'];
       }
       if (isset($this->nmgp_cmp_hidden['discount_']) && $this->nmgp_cmp_hidden['discount_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['discount_']);
           $sStyleHidden_discount_ = 'display: none;';
       }
       $bTestReadOnly_discount_ = true;
       $sStyleReadLab_discount_ = 'display: none;';
       $sStyleReadInp_discount_ = '';
       if (isset($this->nmgp_cmp_readonly['discount_']) && $this->nmgp_cmp_readonly['discount_'] == 'on')
       {
           $bTestReadOnly_discount_ = false;
           unset($this->nmgp_cmp_readonly['discount_']);
           $sStyleReadLab_discount_ = '';
           $sStyleReadInp_discount_ = 'display: none;';
       }
       $this->poriva_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['poriva_']; 
       $poriva_ = $this->poriva_; 
       $sStyleHidden_poriva_ = '';
       if (isset($sCheckRead_poriva_))
       {
           unset($sCheckRead_poriva_);
       }
       if (isset($this->nmgp_cmp_readonly['poriva_']))
       {
           $sCheckRead_poriva_ = $this->nmgp_cmp_readonly['poriva_'];
       }
       if (isset($this->nmgp_cmp_hidden['poriva_']) && $this->nmgp_cmp_hidden['poriva_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['poriva_']);
           $sStyleHidden_poriva_ = 'display: none;';
       }
       $bTestReadOnly_poriva_ = true;
       $sStyleReadLab_poriva_ = 'display: none;';
       $sStyleReadInp_poriva_ = '';
       if (isset($this->nmgp_cmp_readonly['poriva_']) && $this->nmgp_cmp_readonly['poriva_'] == 'on')
       {
           $bTestReadOnly_poriva_ = false;
           unset($this->nmgp_cmp_readonly['poriva_']);
           $sStyleReadLab_poriva_ = '';
           $sStyleReadInp_poriva_ = 'display: none;';
       }
       $this->cuentaventa_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['cuentaventa_']; 
       $cuentaventa_ = $this->cuentaventa_; 
       $sStyleHidden_cuentaventa_ = '';
       if (isset($sCheckRead_cuentaventa_))
       {
           unset($sCheckRead_cuentaventa_);
       }
       if (isset($this->nmgp_cmp_readonly['cuentaventa_']))
       {
           $sCheckRead_cuentaventa_ = $this->nmgp_cmp_readonly['cuentaventa_'];
       }
       if (isset($this->nmgp_cmp_hidden['cuentaventa_']) && $this->nmgp_cmp_hidden['cuentaventa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cuentaventa_']);
           $sStyleHidden_cuentaventa_ = 'display: none;';
       }
       $bTestReadOnly_cuentaventa_ = true;
       $sStyleReadLab_cuentaventa_ = 'display: none;';
       $sStyleReadInp_cuentaventa_ = '';
       if (isset($this->nmgp_cmp_readonly['cuentaventa_']) && $this->nmgp_cmp_readonly['cuentaventa_'] == 'on')
       {
           $bTestReadOnly_cuentaventa_ = false;
           unset($this->nmgp_cmp_readonly['cuentaventa_']);
           $sStyleReadLab_cuentaventa_ = '';
           $sStyleReadInp_cuentaventa_ = 'display: none;';
       }
       $this->unidad_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['unidad_']; 
       $unidad_ = $this->unidad_; 
       $sStyleHidden_unidad_ = '';
       if (isset($sCheckRead_unidad_))
       {
           unset($sCheckRead_unidad_);
       }
       if (isset($this->nmgp_cmp_readonly['unidad_']))
       {
           $sCheckRead_unidad_ = $this->nmgp_cmp_readonly['unidad_'];
       }
       if (isset($this->nmgp_cmp_hidden['unidad_']) && $this->nmgp_cmp_hidden['unidad_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['unidad_']);
           $sStyleHidden_unidad_ = 'display: none;';
       }
       $bTestReadOnly_unidad_ = true;
       $sStyleReadLab_unidad_ = 'display: none;';
       $sStyleReadInp_unidad_ = '';
       if (isset($this->nmgp_cmp_readonly['unidad_']) && $this->nmgp_cmp_readonly['unidad_'] == 'on')
       {
           $bTestReadOnly_unidad_ = false;
           unset($this->nmgp_cmp_readonly['unidad_']);
           $sStyleReadLab_unidad_ = '';
           $sStyleReadInp_unidad_ = 'display: none;';
       }
       $this->tipoitem_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tipoitem_']; 
       $tipoitem_ = $this->tipoitem_; 
       $sStyleHidden_tipoitem_ = '';
       if (isset($sCheckRead_tipoitem_))
       {
           unset($sCheckRead_tipoitem_);
       }
       if (isset($this->nmgp_cmp_readonly['tipoitem_']))
       {
           $sCheckRead_tipoitem_ = $this->nmgp_cmp_readonly['tipoitem_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipoitem_']) && $this->nmgp_cmp_hidden['tipoitem_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipoitem_']);
           $sStyleHidden_tipoitem_ = 'display: none;';
       }
       $bTestReadOnly_tipoitem_ = true;
       $sStyleReadLab_tipoitem_ = 'display: none;';
       $sStyleReadInp_tipoitem_ = '';
       if (isset($this->nmgp_cmp_readonly['tipoitem_']) && $this->nmgp_cmp_readonly['tipoitem_'] == 'on')
       {
           $bTestReadOnly_tipoitem_ = false;
           unset($this->nmgp_cmp_readonly['tipoitem_']);
           $sStyleReadLab_tipoitem_ = '';
           $sStyleReadInp_tipoitem_ = 'display: none;';
       }
       $this->cuentacompra_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['cuentacompra_']; 
       $cuentacompra_ = $this->cuentacompra_; 
       $sStyleHidden_cuentacompra_ = '';
       if (isset($sCheckRead_cuentacompra_))
       {
           unset($sCheckRead_cuentacompra_);
       }
       if (isset($this->nmgp_cmp_readonly['cuentacompra_']))
       {
           $sCheckRead_cuentacompra_ = $this->nmgp_cmp_readonly['cuentacompra_'];
       }
       if (isset($this->nmgp_cmp_hidden['cuentacompra_']) && $this->nmgp_cmp_hidden['cuentacompra_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cuentacompra_']);
           $sStyleHidden_cuentacompra_ = 'display: none;';
       }
       $bTestReadOnly_cuentacompra_ = true;
       $sStyleReadLab_cuentacompra_ = 'display: none;';
       $sStyleReadInp_cuentacompra_ = '';
       if (isset($this->nmgp_cmp_readonly['cuentacompra_']) && $this->nmgp_cmp_readonly['cuentacompra_'] == 'on')
       {
           $bTestReadOnly_cuentacompra_ = false;
           unset($this->nmgp_cmp_readonly['cuentacompra_']);
           $sStyleReadLab_cuentacompra_ = '';
           $sStyleReadInp_cuentacompra_ = 'display: none;';
       }
       $this->precioventa_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['precioventa_']; 
       $precioventa_ = $this->precioventa_; 
       $sStyleHidden_precioventa_ = '';
       if (isset($sCheckRead_precioventa_))
       {
           unset($sCheckRead_precioventa_);
       }
       if (isset($this->nmgp_cmp_readonly['precioventa_']))
       {
           $sCheckRead_precioventa_ = $this->nmgp_cmp_readonly['precioventa_'];
       }
       if (isset($this->nmgp_cmp_hidden['precioventa_']) && $this->nmgp_cmp_hidden['precioventa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['precioventa_']);
           $sStyleHidden_precioventa_ = 'display: none;';
       }
       $bTestReadOnly_precioventa_ = true;
       $sStyleReadLab_precioventa_ = 'display: none;';
       $sStyleReadInp_precioventa_ = '';
       if (isset($this->nmgp_cmp_readonly['precioventa_']) && $this->nmgp_cmp_readonly['precioventa_'] == 'on')
       {
           $bTestReadOnly_precioventa_ = false;
           unset($this->nmgp_cmp_readonly['precioventa_']);
           $sStyleReadLab_precioventa_ = '';
           $sStyleReadInp_precioventa_ = 'display: none;';
       }
       $this->puntoventa_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['puntoventa_']; 
       $puntoventa_ = $this->puntoventa_; 
       $sStyleHidden_puntoventa_ = '';
       if (isset($sCheckRead_puntoventa_))
       {
           unset($sCheckRead_puntoventa_);
       }
       if (isset($this->nmgp_cmp_readonly['puntoventa_']))
       {
           $sCheckRead_puntoventa_ = $this->nmgp_cmp_readonly['puntoventa_'];
       }
       if (isset($this->nmgp_cmp_hidden['puntoventa_']) && $this->nmgp_cmp_hidden['puntoventa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['puntoventa_']);
           $sStyleHidden_puntoventa_ = 'display: none;';
       }
       $bTestReadOnly_puntoventa_ = true;
       $sStyleReadLab_puntoventa_ = 'display: none;';
       $sStyleReadInp_puntoventa_ = '';
       if (isset($this->nmgp_cmp_readonly['puntoventa_']) && $this->nmgp_cmp_readonly['puntoventa_'] == 'on')
       {
           $bTestReadOnly_puntoventa_ = false;
           unset($this->nmgp_cmp_readonly['puntoventa_']);
           $sStyleReadLab_puntoventa_ = '';
           $sStyleReadInp_puntoventa_ = 'display: none;';
       }
       $this->id_status_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['id_status_']; 
       $id_status_ = $this->id_status_; 
       $sStyleHidden_id_status_ = '';
       if (isset($sCheckRead_id_status_))
       {
           unset($sCheckRead_id_status_);
       }
       if (isset($this->nmgp_cmp_readonly['id_status_']))
       {
           $sCheckRead_id_status_ = $this->nmgp_cmp_readonly['id_status_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_status_']) && $this->nmgp_cmp_hidden['id_status_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_status_']);
           $sStyleHidden_id_status_ = 'display: none;';
       }
       $bTestReadOnly_id_status_ = true;
       $sStyleReadLab_id_status_ = 'display: none;';
       $sStyleReadInp_id_status_ = '';
       if (isset($this->nmgp_cmp_readonly['id_status_']) && $this->nmgp_cmp_readonly['id_status_'] == 'on')
       {
           $bTestReadOnly_id_status_ = false;
           unset($this->nmgp_cmp_readonly['id_status_']);
           $sStyleReadLab_id_status_ = '';
           $sStyleReadInp_id_status_ = 'display: none;';
       }
       $this->image_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['image_']; 
       $image_ = $this->image_; 
       $this->image__limpa = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['image__limpa']; 
       $image__limpa = $this->image__limpa; 
       $sStyleHidden_image_ = '';
       if (isset($sCheckRead_image_))
       {
           unset($sCheckRead_image_);
       }
       if (isset($this->nmgp_cmp_readonly['image_']))
       {
           $sCheckRead_image_ = $this->nmgp_cmp_readonly['image_'];
       }
       if (isset($this->nmgp_cmp_hidden['image_']) && $this->nmgp_cmp_hidden['image_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['image_']);
           $sStyleHidden_image_ = 'display: none;';
       }
       $bTestReadOnly_image_ = true;
       $sStyleReadLab_image_ = 'display: none;';
       $sStyleReadInp_image_ = '';
       if (isset($this->nmgp_cmp_readonly['image_']) && $this->nmgp_cmp_readonly['image_'] == 'on')
       {
           $bTestReadOnly_image_ = false;
           unset($this->nmgp_cmp_readonly['image_']);
           $sStyleReadLab_image_ = '';
           $sStyleReadInp_image_ = 'display: none;';
       }
       $this->entrada_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['entrada_']; 
       $entrada_ = $this->entrada_; 
       $sStyleHidden_entrada_ = '';
       if (isset($sCheckRead_entrada_))
       {
           unset($sCheckRead_entrada_);
       }
       if (isset($this->nmgp_cmp_readonly['entrada_']))
       {
           $sCheckRead_entrada_ = $this->nmgp_cmp_readonly['entrada_'];
       }
       if (isset($this->nmgp_cmp_hidden['entrada_']) && $this->nmgp_cmp_hidden['entrada_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['entrada_']);
           $sStyleHidden_entrada_ = 'display: none;';
       }
       $bTestReadOnly_entrada_ = true;
       $sStyleReadLab_entrada_ = 'display: none;';
       $sStyleReadInp_entrada_ = '';
       if (isset($this->nmgp_cmp_readonly['entrada_']) && $this->nmgp_cmp_readonly['entrada_'] == 'on')
       {
           $bTestReadOnly_entrada_ = false;
           unset($this->nmgp_cmp_readonly['entrada_']);
           $sStyleReadLab_entrada_ = '';
           $sStyleReadInp_entrada_ = 'display: none;';
       }
       $this->service_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['service_']; 
       $service_ = $this->service_; 
       $sStyleHidden_service_ = '';
       if (isset($sCheckRead_service_))
       {
           unset($sCheckRead_service_);
       }
       if (isset($this->nmgp_cmp_readonly['service_']))
       {
           $sCheckRead_service_ = $this->nmgp_cmp_readonly['service_'];
       }
       if (isset($this->nmgp_cmp_hidden['service_']) && $this->nmgp_cmp_hidden['service_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['service_']);
           $sStyleHidden_service_ = 'display: none;';
       }
       $bTestReadOnly_service_ = true;
       $sStyleReadLab_service_ = 'display: none;';
       $sStyleReadInp_service_ = '';
       if (isset($this->nmgp_cmp_readonly['service_']) && $this->nmgp_cmp_readonly['service_'] == 'on')
       {
           $bTestReadOnly_service_ = false;
           unset($this->nmgp_cmp_readonly['service_']);
           $sStyleReadLab_service_ = '';
           $sStyleReadInp_service_ = 'display: none;';
       }
       $this->kiosko_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['kiosko_']; 
       $kiosko_ = $this->kiosko_; 
       $sStyleHidden_kiosko_ = '';
       if (isset($sCheckRead_kiosko_))
       {
           unset($sCheckRead_kiosko_);
       }
       if (isset($this->nmgp_cmp_readonly['kiosko_']))
       {
           $sCheckRead_kiosko_ = $this->nmgp_cmp_readonly['kiosko_'];
       }
       if (isset($this->nmgp_cmp_hidden['kiosko_']) && $this->nmgp_cmp_hidden['kiosko_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['kiosko_']);
           $sStyleHidden_kiosko_ = 'display: none;';
       }
       $bTestReadOnly_kiosko_ = true;
       $sStyleReadLab_kiosko_ = 'display: none;';
       $sStyleReadInp_kiosko_ = '';
       if (isset($this->nmgp_cmp_readonly['kiosko_']) && $this->nmgp_cmp_readonly['kiosko_'] == 'on')
       {
           $bTestReadOnly_kiosko_ = false;
           unset($this->nmgp_cmp_readonly['kiosko_']);
           $sStyleReadLab_kiosko_ = '';
           $sStyleReadInp_kiosko_ = 'display: none;';
       }
       $this->jugador_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['jugador_']; 
       $jugador_ = $this->jugador_; 
       $sStyleHidden_jugador_ = '';
       if (isset($sCheckRead_jugador_))
       {
           unset($sCheckRead_jugador_);
       }
       if (isset($this->nmgp_cmp_readonly['jugador_']))
       {
           $sCheckRead_jugador_ = $this->nmgp_cmp_readonly['jugador_'];
       }
       if (isset($this->nmgp_cmp_hidden['jugador_']) && $this->nmgp_cmp_hidden['jugador_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['jugador_']);
           $sStyleHidden_jugador_ = 'display: none;';
       }
       $bTestReadOnly_jugador_ = true;
       $sStyleReadLab_jugador_ = 'display: none;';
       $sStyleReadInp_jugador_ = '';
       if (isset($this->nmgp_cmp_readonly['jugador_']) && $this->nmgp_cmp_readonly['jugador_'] == 'on')
       {
           $bTestReadOnly_jugador_ = false;
           unset($this->nmgp_cmp_readonly['jugador_']);
           $sStyleReadLab_jugador_ = '';
           $sStyleReadInp_jugador_ = 'display: none;';
       }
       $this->visitante_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['visitante_']; 
       $visitante_ = $this->visitante_; 
       $sStyleHidden_visitante_ = '';
       if (isset($sCheckRead_visitante_))
       {
           unset($sCheckRead_visitante_);
       }
       if (isset($this->nmgp_cmp_readonly['visitante_']))
       {
           $sCheckRead_visitante_ = $this->nmgp_cmp_readonly['visitante_'];
       }
       if (isset($this->nmgp_cmp_hidden['visitante_']) && $this->nmgp_cmp_hidden['visitante_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['visitante_']);
           $sStyleHidden_visitante_ = 'display: none;';
       }
       $bTestReadOnly_visitante_ = true;
       $sStyleReadLab_visitante_ = 'display: none;';
       $sStyleReadInp_visitante_ = '';
       if (isset($this->nmgp_cmp_readonly['visitante_']) && $this->nmgp_cmp_readonly['visitante_'] == 'on')
       {
           $bTestReadOnly_visitante_ = false;
           unset($this->nmgp_cmp_readonly['visitante_']);
           $sStyleReadLab_visitante_ = '';
           $sStyleReadInp_visitante_ = 'display: none;';
       }
       $this->minutos_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['minutos_']; 
       $minutos_ = $this->minutos_; 
       $sStyleHidden_minutos_ = '';
       if (isset($sCheckRead_minutos_))
       {
           unset($sCheckRead_minutos_);
       }
       if (isset($this->nmgp_cmp_readonly['minutos_']))
       {
           $sCheckRead_minutos_ = $this->nmgp_cmp_readonly['minutos_'];
       }
       if (isset($this->nmgp_cmp_hidden['minutos_']) && $this->nmgp_cmp_hidden['minutos_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['minutos_']);
           $sStyleHidden_minutos_ = 'display: none;';
       }
       $bTestReadOnly_minutos_ = true;
       $sStyleReadLab_minutos_ = 'display: none;';
       $sStyleReadInp_minutos_ = '';
       if (isset($this->nmgp_cmp_readonly['minutos_']) && $this->nmgp_cmp_readonly['minutos_'] == 'on')
       {
           $bTestReadOnly_minutos_ = false;
           unset($this->nmgp_cmp_readonly['minutos_']);
           $sStyleReadLab_minutos_ = '';
           $sStyleReadInp_minutos_ = 'display: none;';
       }
       $this->tarjeta_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tarjeta_']; 
       $tarjeta_ = $this->tarjeta_; 
       $sStyleHidden_tarjeta_ = '';
       if (isset($sCheckRead_tarjeta_))
       {
           unset($sCheckRead_tarjeta_);
       }
       if (isset($this->nmgp_cmp_readonly['tarjeta_']))
       {
           $sCheckRead_tarjeta_ = $this->nmgp_cmp_readonly['tarjeta_'];
       }
       if (isset($this->nmgp_cmp_hidden['tarjeta_']) && $this->nmgp_cmp_hidden['tarjeta_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tarjeta_']);
           $sStyleHidden_tarjeta_ = 'display: none;';
       }
       $bTestReadOnly_tarjeta_ = true;
       $sStyleReadLab_tarjeta_ = 'display: none;';
       $sStyleReadInp_tarjeta_ = '';
       if (isset($this->nmgp_cmp_readonly['tarjeta_']) && $this->nmgp_cmp_readonly['tarjeta_'] == 'on')
       {
           $bTestReadOnly_tarjeta_ = false;
           unset($this->nmgp_cmp_readonly['tarjeta_']);
           $sStyleReadLab_tarjeta_ = '';
           $sStyleReadInp_tarjeta_ = 'display: none;';
       }
       $this->tokens_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['tokens_']; 
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
       $this->comida_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['comida_']; 
       $comida_ = $this->comida_; 
       $sStyleHidden_comida_ = '';
       if (isset($sCheckRead_comida_))
       {
           unset($sCheckRead_comida_);
       }
       if (isset($this->nmgp_cmp_readonly['comida_']))
       {
           $sCheckRead_comida_ = $this->nmgp_cmp_readonly['comida_'];
       }
       if (isset($this->nmgp_cmp_hidden['comida_']) && $this->nmgp_cmp_hidden['comida_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['comida_']);
           $sStyleHidden_comida_ = 'display: none;';
       }
       $bTestReadOnly_comida_ = true;
       $sStyleReadLab_comida_ = 'display: none;';
       $sStyleReadInp_comida_ = '';
       if (isset($this->nmgp_cmp_readonly['comida_']) && $this->nmgp_cmp_readonly['comida_'] == 'on')
       {
           $bTestReadOnly_comida_ = false;
           unset($this->nmgp_cmp_readonly['comida_']);
           $sStyleReadLab_comida_ = '';
           $sStyleReadInp_comida_ = 'display: none;';
       }
       $this->score_ = $this->form_vert_form_product_edit_masivo[$sc_seq_vert]['score_']; 
       $score_ = $this->score_; 
       $sStyleHidden_score_ = '';
       if (isset($sCheckRead_score_))
       {
           unset($sCheckRead_score_);
       }
       if (isset($this->nmgp_cmp_readonly['score_']))
       {
           $sCheckRead_score_ = $this->nmgp_cmp_readonly['score_'];
       }
       if (isset($this->nmgp_cmp_hidden['score_']) && $this->nmgp_cmp_hidden['score_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['score_']);
           $sStyleHidden_score_ = 'display: none;';
       }
       $bTestReadOnly_score_ = true;
       $sStyleReadLab_score_ = 'display: none;';
       $sStyleReadInp_score_ = '';
       if (isset($this->nmgp_cmp_readonly['score_']) && $this->nmgp_cmp_readonly['score_'] == 'on')
       {
           $bTestReadOnly_score_ = false;
           unset($this->nmgp_cmp_readonly['score_']);
           $sStyleReadLab_score_ = '';
           $sStyleReadInp_score_ = 'display: none;';
       }

       if ($this->nmgp_opcao == "novo")
       { 
           $out_image_   = "";  
           $this->image_ = "";  
       } 
       else 
       { 
           $out_image_ = $this->image_;  
       } 
       if ($this->image_ != "" && $this->image_ != "none")   
       { 
           $out_image_ = $this->Ini->path_imag_temp . "/sc_image__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
           $_SESSION['scriptcase']['sc_num_img']++ ; 
           $arq_image_ = fopen($this->Ini->root . $out_image_, "w") ;  
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
           { 
               $nm_tmp = nm_conv_img_access(substr($this->image_, 0, 12));
               if (substr($this->image_, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
               { 
                   $this->image_ = nm_conv_img_access($this->image_);
               } 
           } 
           if (substr($this->image_, 0, 4) == "*nm*") 
           { 
               $this->image_ = substr($this->image_, 4) ; 
               $this->image_ = base64_decode($this->image_) ; 
           } 
           $img_pos_bm = strpos($this->image_, "BM") ; 
           if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
           { 
               $this->image_ = substr($this->image_, $img_pos_bm) ; 
           } 
           fwrite($arq_image_, $this->image_) ;  
           fclose($arq_image_) ;  
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_image_, true);
           $this->nmgp_return_img['image_'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['image_'][1] = $sc_obj_img->getWidth();
           $out1_image_ = $out_image_; 
           $out_image_ = $this->Ini->path_imag_temp . "/sc_" . "image__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
           $_SESSION['scriptcase']['sc_num_img']++ ; 
           if (!$this->Ini->Gd_missing)
           { 
               $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_image_, true);
               $sc_obj_img->setWidth(200);
               $sc_obj_img->setHeight(200);
               $sc_obj_img->setManterAspecto(true);
               $sc_obj_img->createImg($this->Ini->root . $out_image_);
           } 
           else 
           { 
               $out_image_ = $out1_image_;
           } 
       } 
       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?> class="sc-row" data-sc-row-number="<?php echo $sc_seq_vert; ?>">
<input type="hidden" name="image__ul_name<?php echo $sc_seq_vert; ?>" id="id_sc_field_image__ul_name<?php echo $sc_seq_vert; ?>" value="<?php echo $this->form_encode_input($this->image__ul_name);?>">
<input type="hidden" name="image__ul_type<?php echo $sc_seq_vert; ?>" id="id_sc_field_image__ul_type<?php echo $sc_seq_vert; ?>" value="<?php echo $this->form_encode_input($this->image__ul_type);?>">


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_product_edit_masivo_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_product_edit_masivo_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_product_edit_masivo_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_product_edit_masivo_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_product_edit_masivo_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_product_edit_masivo_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['product_name_']) && $this->nmgp_cmp_hidden['product_name_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="product_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_name_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_product_name__line" id="hidden_field_data_product_name_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_product_name_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_product_name__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_product_name_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["product_name_"]) &&  $this->nmgp_cmp_readonly["product_name_"] == "on") { 

 ?>
<input type="hidden" name="product_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_name_) . "\">" . $product_name_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_product_name_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-product_name_<?php echo $sc_seq_vert ?> css_product_name__line" style="<?php echo $sStyleReadLab_product_name_; ?>"><?php echo $this->form_format_readonly("product_name_", $this->form_encode_input($this->product_name_)); ?></span><span id="id_read_off_product_name_<?php echo $sc_seq_vert ?>" class="css_read_off_product_name_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_product_name_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_product_name__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_product_name_<?php echo $sc_seq_vert ?>" type=text name="product_name_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_name_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_product_name_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_product_name_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_category_']) && $this->nmgp_cmp_hidden['id_category_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_category_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_category_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_category__line" id="hidden_field_data_id_category_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_category_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_category__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_category_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_category_"]) &&  $this->nmgp_cmp_readonly["id_category_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'] = array(); 
    }

   $old_value_dateproduct_ = $this->dateproduct_;
   $old_value_dateproduct__hora = $this->dateproduct__hora;
   $old_value_product_cost_ = $this->product_cost_;
   $old_value_stock_ = $this->stock_;
   $old_value_product_value_ = $this->product_value_;
   $old_value_discount_ = $this->discount_;
   $old_value_poriva_ = $this->poriva_;
   $old_value_precioventa_ = $this->precioventa_;
   $old_value_minutos_ = $this->minutos_;
   $old_value_tokens_ = $this->tokens_;
   $old_value_score_ = $this->score_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct_ = $this->dateproduct_;
   $unformatted_value_dateproduct__hora = $this->dateproduct__hora;
   $unformatted_value_product_cost_ = $this->product_cost_;
   $unformatted_value_stock_ = $this->stock_;
   $unformatted_value_product_value_ = $this->product_value_;
   $unformatted_value_discount_ = $this->discount_;
   $unformatted_value_poriva_ = $this->poriva_;
   $unformatted_value_precioventa_ = $this->precioventa_;
   $unformatted_value_minutos_ = $this->minutos_;
   $unformatted_value_tokens_ = $this->tokens_;
   $unformatted_value_score_ = $this->score_;

   $nm_comando = "SELECT id_category, category  FROM category  ORDER BY category";

   $this->dateproduct_ = $old_value_dateproduct_;
   $this->dateproduct__hora = $old_value_dateproduct__hora;
   $this->product_cost_ = $old_value_product_cost_;
   $this->stock_ = $old_value_stock_;
   $this->product_value_ = $old_value_product_value_;
   $this->discount_ = $old_value_discount_;
   $this->poriva_ = $old_value_poriva_;
   $this->precioventa_ = $old_value_precioventa_;
   $this->minutos_ = $old_value_minutos_;
   $this->tokens_ = $old_value_tokens_;
   $this->score_ = $old_value_score_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_category_'][] = $rs->fields[0];
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
   $id_category__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_category__1))
          {
              foreach ($this->id_category__1 as $tmp_id_category_)
              {
                  if (trim($tmp_id_category_) === trim($cadaselect[1])) { $id_category__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_category_) === trim($cadaselect[1])) { $id_category__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_category_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_category_) . "\">" . $id_category__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_category_();
   $x = 0 ; 
   $id_category__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_category__1))
          {
              foreach ($this->id_category__1 as $tmp_id_category_)
              {
                  if (trim($tmp_id_category_) === trim($cadaselect[1])) { $id_category__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_category_) === trim($cadaselect[1])) { $id_category__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_category__look))
          {
              $id_category__look = $this->id_category_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_category_" . $sc_seq_vert . "\" class=\"css_id_category__line\" style=\"" .  $sStyleReadLab_id_category_ . "\">" . $this->form_format_readonly("id_category_", $this->form_encode_input($id_category__look)) . "</span><span id=\"id_read_off_id_category_" . $sc_seq_vert . "\" class=\"css_read_off_id_category_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_category_ . "\">";
   echo " <span id=\"idAjaxSelect_id_category_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_category__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_category_" . $sc_seq_vert . "\" name=\"id_category_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_category_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_category_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_category_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_category_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['product_code_']) && $this->nmgp_cmp_hidden['product_code_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="product_code_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_code_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_product_code__line" id="hidden_field_data_product_code_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_product_code_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_product_code__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_product_code_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["product_code_"]) &&  $this->nmgp_cmp_readonly["product_code_"] == "on") { 

 ?>
<input type="hidden" name="product_code_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_code_) . "\">" . $product_code_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_product_code_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-product_code_<?php echo $sc_seq_vert ?> css_product_code__line" style="<?php echo $sStyleReadLab_product_code_; ?>"><?php echo $this->form_format_readonly("product_code_", $this->form_encode_input($this->product_code_)); ?></span><span id="id_read_off_product_code_<?php echo $sc_seq_vert ?>" class="css_read_off_product_code_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_product_code_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_product_code__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_product_code_<?php echo $sc_seq_vert ?>" type=text name="product_code_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_code_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_product_code_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_product_code_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dateproduct_']) && $this->nmgp_cmp_hidden['dateproduct_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dateproduct_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dateproduct_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dateproduct__line" id="hidden_field_data_dateproduct_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dateproduct_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dateproduct__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="dateproduct_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dateproduct_); ?>"><span id="id_ajax_label_dateproduct_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($dateproduct_); ?></span>
<?php
$tmp_form_data = $this->field_config['dateproduct_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dateproduct_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dateproduct_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->dateproduct_ = $old_dt_dateproduct_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['product_cost_']) && $this->nmgp_cmp_hidden['product_cost_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="product_cost_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_cost_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_product_cost__line" id="hidden_field_data_product_cost_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_product_cost_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_product_cost__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_product_cost_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["product_cost_"]) &&  $this->nmgp_cmp_readonly["product_cost_"] == "on") { 

 ?>
<input type="hidden" name="product_cost_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_cost_) . "\">" . $product_cost_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_product_cost_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-product_cost_<?php echo $sc_seq_vert ?> css_product_cost__line" style="<?php echo $sStyleReadLab_product_cost_; ?>"><?php echo $this->form_format_readonly("product_cost_", $this->form_encode_input($this->product_cost_)); ?></span><span id="id_read_off_product_cost_<?php echo $sc_seq_vert ?>" class="css_read_off_product_cost_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_product_cost_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_product_cost__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_product_cost_<?php echo $sc_seq_vert ?>" type=text name="product_cost_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_cost_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['product_cost_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['product_cost_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['product_cost_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['product_cost_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_product_cost_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_product_cost_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['stock_']) && $this->nmgp_cmp_hidden['stock_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="stock_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stock_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_stock__line" id="hidden_field_data_stock_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_stock_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_stock__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_stock_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["stock_"]) &&  $this->nmgp_cmp_readonly["stock_"] == "on") { 

 ?>
<input type="hidden" name="stock_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stock_) . "\">" . $stock_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_stock_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-stock_<?php echo $sc_seq_vert ?> css_stock__line" style="<?php echo $sStyleReadLab_stock_; ?>"><?php echo $this->form_format_readonly("stock_", $this->form_encode_input($this->stock_)); ?></span><span id="id_read_off_stock_<?php echo $sc_seq_vert ?>" class="css_read_off_stock_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_stock_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_stock__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_stock_<?php echo $sc_seq_vert ?>" type=text name="stock_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stock_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['stock_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['stock_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['stock_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_stock_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_stock_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['product_value_']) && $this->nmgp_cmp_hidden['product_value_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="product_value_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_value_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_product_value__line" id="hidden_field_data_product_value_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_product_value_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_product_value__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_product_value_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["product_value_"]) &&  $this->nmgp_cmp_readonly["product_value_"] == "on") { 

 ?>
<input type="hidden" name="product_value_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_value_) . "\">" . $product_value_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_product_value_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-product_value_<?php echo $sc_seq_vert ?> css_product_value__line" style="<?php echo $sStyleReadLab_product_value_; ?>"><?php echo $this->form_format_readonly("product_value_", $this->form_encode_input($this->product_value_)); ?></span><span id="id_read_off_product_value_<?php echo $sc_seq_vert ?>" class="css_read_off_product_value_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_product_value_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_product_value__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_product_value_<?php echo $sc_seq_vert ?>" type=text name="product_value_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($product_value_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['product_value_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['product_value_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['product_value_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['product_value_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_product_value_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_product_value_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['discount_']) && $this->nmgp_cmp_hidden['discount_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="discount_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($discount_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_discount__line" id="hidden_field_data_discount_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_discount_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_discount__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_discount_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["discount_"]) &&  $this->nmgp_cmp_readonly["discount_"] == "on") { 

 ?>
<input type="hidden" name="discount_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($discount_) . "\">" . $discount_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_discount_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-discount_<?php echo $sc_seq_vert ?> css_discount__line" style="<?php echo $sStyleReadLab_discount_; ?>"><?php echo $this->form_format_readonly("discount_", $this->form_encode_input($this->discount_)); ?></span><span id="id_read_off_discount_<?php echo $sc_seq_vert ?>" class="css_read_off_discount_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_discount_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_discount__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_discount_<?php echo $sc_seq_vert ?>" type=text name="discount_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($discount_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['discount_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['discount_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['discount_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['discount_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_discount_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_discount_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['poriva_']) && $this->nmgp_cmp_hidden['poriva_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="poriva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($poriva_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_poriva__line" id="hidden_field_data_poriva_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_poriva_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_poriva__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_poriva_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["poriva_"]) &&  $this->nmgp_cmp_readonly["poriva_"] == "on") { 

 ?>
<input type="hidden" name="poriva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($poriva_) . "\">" . $poriva_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_poriva_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-poriva_<?php echo $sc_seq_vert ?> css_poriva__line" style="<?php echo $sStyleReadLab_poriva_; ?>"><?php echo $this->form_format_readonly("poriva_", $this->form_encode_input($this->poriva_)); ?></span><span id="id_read_off_poriva_<?php echo $sc_seq_vert ?>" class="css_read_off_poriva_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_poriva_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_poriva__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_poriva_<?php echo $sc_seq_vert ?>" type=text name="poriva_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($poriva_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['poriva_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['poriva_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['poriva_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['poriva_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_poriva_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_poriva_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cuentaventa_']) && $this->nmgp_cmp_hidden['cuentaventa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cuentaventa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cuentaventa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cuentaventa__line" id="hidden_field_data_cuentaventa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cuentaventa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cuentaventa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cuentaventa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cuentaventa_"]) &&  $this->nmgp_cmp_readonly["cuentaventa_"] == "on") { 

 ?>
<input type="hidden" name="cuentaventa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cuentaventa_) . "\">" . $cuentaventa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cuentaventa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cuentaventa_<?php echo $sc_seq_vert ?> css_cuentaventa__line" style="<?php echo $sStyleReadLab_cuentaventa_; ?>"><?php echo $this->form_format_readonly("cuentaventa_", $this->form_encode_input($this->cuentaventa_)); ?></span><span id="id_read_off_cuentaventa_<?php echo $sc_seq_vert ?>" class="css_read_off_cuentaventa_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cuentaventa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cuentaventa__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cuentaventa_<?php echo $sc_seq_vert ?>" type=text name="cuentaventa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cuentaventa_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cuentaventa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cuentaventa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['unidad_']) && $this->nmgp_cmp_hidden['unidad_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unidad_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_unidad__line" id="hidden_field_data_unidad_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_unidad_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_unidad__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_unidad_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unidad_"]) &&  $this->nmgp_cmp_readonly["unidad_"] == "on") { 

 ?>
<input type="hidden" name="unidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unidad_) . "\">" . $unidad_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_unidad_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-unidad_<?php echo $sc_seq_vert ?> css_unidad__line" style="<?php echo $sStyleReadLab_unidad_; ?>"><?php echo $this->form_format_readonly("unidad_", $this->form_encode_input($this->unidad_)); ?></span><span id="id_read_off_unidad_<?php echo $sc_seq_vert ?>" class="css_read_off_unidad_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unidad_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_unidad__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unidad_<?php echo $sc_seq_vert ?>" type=text name="unidad_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($unidad_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidad_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidad_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipoitem_']) && $this->nmgp_cmp_hidden['tipoitem_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipoitem_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipoitem_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipoitem__line" id="hidden_field_data_tipoitem_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipoitem_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipoitem__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipoitem_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipoitem_"]) &&  $this->nmgp_cmp_readonly["tipoitem_"] == "on") { 

 ?>
<input type="hidden" name="tipoitem_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipoitem_) . "\">" . $tipoitem_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipoitem_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tipoitem_<?php echo $sc_seq_vert ?> css_tipoitem__line" style="<?php echo $sStyleReadLab_tipoitem_; ?>"><?php echo $this->form_format_readonly("tipoitem_", $this->form_encode_input($this->tipoitem_)); ?></span><span id="id_read_off_tipoitem_<?php echo $sc_seq_vert ?>" class="css_read_off_tipoitem_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipoitem_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tipoitem__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipoitem_<?php echo $sc_seq_vert ?>" type=text name="tipoitem_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipoitem_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipoitem_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipoitem_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cuentacompra_']) && $this->nmgp_cmp_hidden['cuentacompra_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cuentacompra_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cuentacompra_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cuentacompra__line" id="hidden_field_data_cuentacompra_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cuentacompra_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cuentacompra__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cuentacompra_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cuentacompra_"]) &&  $this->nmgp_cmp_readonly["cuentacompra_"] == "on") { 

 ?>
<input type="hidden" name="cuentacompra_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cuentacompra_) . "\">" . $cuentacompra_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cuentacompra_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cuentacompra_<?php echo $sc_seq_vert ?> css_cuentacompra__line" style="<?php echo $sStyleReadLab_cuentacompra_; ?>"><?php echo $this->form_format_readonly("cuentacompra_", $this->form_encode_input($this->cuentacompra_)); ?></span><span id="id_read_off_cuentacompra_<?php echo $sc_seq_vert ?>" class="css_read_off_cuentacompra_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cuentacompra_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cuentacompra__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cuentacompra_<?php echo $sc_seq_vert ?>" type=text name="cuentacompra_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cuentacompra_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cuentacompra_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cuentacompra_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['precioventa_']) && $this->nmgp_cmp_hidden['precioventa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precioventa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($precioventa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_precioventa__line" id="hidden_field_data_precioventa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_precioventa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_precioventa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_precioventa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precioventa_"]) &&  $this->nmgp_cmp_readonly["precioventa_"] == "on") { 

 ?>
<input type="hidden" name="precioventa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($precioventa_) . "\">" . $precioventa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_precioventa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-precioventa_<?php echo $sc_seq_vert ?> css_precioventa__line" style="<?php echo $sStyleReadLab_precioventa_; ?>"><?php echo $this->form_format_readonly("precioventa_", $this->form_encode_input($this->precioventa_)); ?></span><span id="id_read_off_precioventa_<?php echo $sc_seq_vert ?>" class="css_read_off_precioventa_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precioventa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_precioventa__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precioventa_<?php echo $sc_seq_vert ?>" type=text name="precioventa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($precioventa_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 9, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precioventa_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precioventa_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precioventa_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precioventa_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precioventa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precioventa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['puntoventa_']) && $this->nmgp_cmp_hidden['puntoventa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="puntoventa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($puntoventa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_puntoventa__line" id="hidden_field_data_puntoventa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_puntoventa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_puntoventa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_puntoventa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["puntoventa_"]) &&  $this->nmgp_cmp_readonly["puntoventa_"] == "on") { 

 if ("1" == $this->puntoventa_) { $puntoventa__look = "SI";} 
 if ("0" == $this->puntoventa_) { $puntoventa__look = "NO";} 
?>
<input type="hidden" name="puntoventa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($puntoventa_) . "\">" . $puntoventa__look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->puntoventa_) { $puntoventa__look = "SI";} 
 if ("0" == $this->puntoventa_) { $puntoventa__look = "NO";} 
?>
<span id="id_read_on_puntoventa_<?php echo $sc_seq_vert ; ?>"  class="css_puntoventa__line" style="<?php echo $sStyleReadLab_puntoventa_; ?>"><?php echo $this->form_format_readonly("puntoventa_", $this->form_encode_input($puntoventa__look)); ?></span><span id="id_read_off_puntoventa_<?php echo $sc_seq_vert ; ?>" class="css_read_off_puntoventa_ css_puntoventa__line" style="<?php echo $sStyleReadInp_puntoventa_; ?>"><div id="idAjaxRadio_puntoventa_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_puntoventa__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_puntoventa__line"><?php $tempOptionId = "id-opt-puntoventa_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-puntoventa_ sc-ui-radio-puntoventa_<?php echo $sc_seq_vert ?>" type=radio name="puntoventa_<?php echo $sc_seq_vert ?>" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_puntoventa_'][] = '1'; ?>
<?php  if ("1" == $this->puntoventa_)  { echo " checked" ;} ?><?php  if (empty($this->puntoventa_)) { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_puntoventa__line"><?php $tempOptionId = "id-opt-puntoventa_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-puntoventa_ sc-ui-radio-puntoventa_<?php echo $sc_seq_vert ?>" type=radio name="puntoventa_<?php echo $sc_seq_vert ?>" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_puntoventa_'][] = '0'; ?>
<?php  if ("0" == $this->puntoventa_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_puntoventa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_puntoventa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['id_status_']) && $this->nmgp_cmp_hidden['id_status_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_status_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->id_status_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_id_status__line" id="hidden_field_data_id_status_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_status_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id_status__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_id_status_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_status_"]) &&  $this->nmgp_cmp_readonly["id_status_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'] = array(); 
    }

   $old_value_dateproduct_ = $this->dateproduct_;
   $old_value_dateproduct__hora = $this->dateproduct__hora;
   $old_value_product_cost_ = $this->product_cost_;
   $old_value_stock_ = $this->stock_;
   $old_value_product_value_ = $this->product_value_;
   $old_value_discount_ = $this->discount_;
   $old_value_poriva_ = $this->poriva_;
   $old_value_precioventa_ = $this->precioventa_;
   $old_value_minutos_ = $this->minutos_;
   $old_value_tokens_ = $this->tokens_;
   $old_value_score_ = $this->score_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct_ = $this->dateproduct_;
   $unformatted_value_dateproduct__hora = $this->dateproduct__hora;
   $unformatted_value_product_cost_ = $this->product_cost_;
   $unformatted_value_stock_ = $this->stock_;
   $unformatted_value_product_value_ = $this->product_value_;
   $unformatted_value_discount_ = $this->discount_;
   $unformatted_value_poriva_ = $this->poriva_;
   $unformatted_value_precioventa_ = $this->precioventa_;
   $unformatted_value_minutos_ = $this->minutos_;
   $unformatted_value_tokens_ = $this->tokens_;
   $unformatted_value_score_ = $this->score_;

   $nm_comando = "SELECT id_status, status  FROM status  ORDER BY status";

   $this->dateproduct_ = $old_value_dateproduct_;
   $this->dateproduct__hora = $old_value_dateproduct__hora;
   $this->product_cost_ = $old_value_product_cost_;
   $this->stock_ = $old_value_stock_;
   $this->product_value_ = $old_value_product_value_;
   $this->discount_ = $old_value_discount_;
   $this->poriva_ = $old_value_poriva_;
   $this->precioventa_ = $old_value_precioventa_;
   $this->minutos_ = $old_value_minutos_;
   $this->tokens_ = $old_value_tokens_;
   $this->score_ = $old_value_score_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_id_status_'][] = $rs->fields[0];
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
   $id_status__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_status__1))
          {
              foreach ($this->id_status__1 as $tmp_id_status_)
              {
                  if (trim($tmp_id_status_) === trim($cadaselect[1])) { $id_status__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_status_) === trim($cadaselect[1])) { $id_status__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_status_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_status_) . "\">" . $id_status__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_status_();
   $x = 0 ; 
   $id_status__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_status__1))
          {
              foreach ($this->id_status__1 as $tmp_id_status_)
              {
                  if (trim($tmp_id_status_) === trim($cadaselect[1])) { $id_status__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_status_) === trim($cadaselect[1])) { $id_status__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_status__look))
          {
              $id_status__look = $this->id_status_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_status_" . $sc_seq_vert . "\" class=\"css_id_status__line\" style=\"" .  $sStyleReadLab_id_status_ . "\">" . $this->form_format_readonly("id_status_", $this->form_encode_input($id_status__look)) . "</span><span id=\"id_read_off_id_status_" . $sc_seq_vert . "\" class=\"css_read_off_id_status_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_status_ . "\">";
   echo " <span id=\"idAjaxSelect_id_status_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_id_status__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_status_" . $sc_seq_vert . "\" name=\"id_status_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_status_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_status_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_status_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_status_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['image_']) && $this->nmgp_cmp_hidden['image_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="image_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($image_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_image__line" id="hidden_field_data_image_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_image_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_image__line" style="vertical-align: top;padding: 0px">
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_image_" . $sc_seq_vert . "" => $out1_image_); ?><script>var var_ajax_img_image_<?php echo $sc_seq_vert; ?> = '<?php echo $out1_image_; ?>';</script><input type="hidden" name="temp_out_image_" value="<?php echo $this->form_encode_input($out_image_); ?>" /><input type="hidden" name="temp_out1_image_" value="<?php echo $this->form_encode_input($out1_image_); ?>" /><?php if (!empty($out_image_)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_image_" . $sc_seq_vert . ", '" . $this->nmgp_return_img['image_'][0] . "', '" . $this->nmgp_return_img['image_'][1] . "')\"><img id=\"id_ajax_img_image_" . $sc_seq_vert . "\"  border=\"0\" src=\"$out_image_\"></a>"; } else {  echo "<img id=\"id_ajax_img_image_" . $sc_seq_vert . "\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly_image_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["image_"]) &&  $this->nmgp_cmp_readonly["image_"] == "on") { 

 ?>
<img id=\"image_<?php echo $sc_seq_vert ?><?php echo $sc_seq_vert; ?>_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="image_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($image_) . "\">" . $image_ . ""; ?>
<?php } else { ?>
<span id="id_read_off_image_<?php echo $sc_seq_vert ?>" class="css_read_off_image_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_image_; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-image_<?php echo $sc_seq_vert ?>" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOddMult css_image__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" type="file" name="image_<?php echo $sc_seq_vert ?>[]" id="id_sc_field_image_<?php echo $sc_seq_vert ?>" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "nm_check_insert(" . $sc_seq_vert . ");";
?>
<span id="chk_ajax_img_image_<?php echo $sc_seq_vert; ?>"<?php if ($this->nmgp_opcao == "novo" || empty($image_)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="image__limpa<?php echo $sc_seq_vert ?>" value="<?php echo $image__limpa . '" '; if ($image__limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="image_<?php echo $sc_seq_vert ?><?php echo $sc_seq_vert; ?>_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_image_<?php echo $sc_seq_vert; ?>" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_image_<?php echo $sc_seq_vert; ?>" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_image_<?php echo $sc_seq_vert; ?>" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_image_ ?>"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_image_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_image_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['entrada_']) && $this->nmgp_cmp_hidden['entrada_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="entrada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($entrada_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_entrada__line" id="hidden_field_data_entrada_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_entrada_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_entrada__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_entrada_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["entrada_"]) &&  $this->nmgp_cmp_readonly["entrada_"] == "on") { 

 if ("1" == $this->entrada_) { $entrada__look = "SI";} 
 if ("0" == $this->entrada_) { $entrada__look = "NO";} 
?>
<input type="hidden" name="entrada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($entrada_) . "\">" . $entrada__look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->entrada_) { $entrada__look = "SI";} 
 if ("0" == $this->entrada_) { $entrada__look = "NO";} 
?>
<span id="id_read_on_entrada_<?php echo $sc_seq_vert ; ?>"  class="css_entrada__line" style="<?php echo $sStyleReadLab_entrada_; ?>"><?php echo $this->form_format_readonly("entrada_", $this->form_encode_input($entrada__look)); ?></span><span id="id_read_off_entrada_<?php echo $sc_seq_vert ; ?>" class="css_read_off_entrada_ css_entrada__line" style="<?php echo $sStyleReadInp_entrada_; ?>"><div id="idAjaxRadio_entrada_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_entrada__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_entrada__line"><?php $tempOptionId = "id-opt-entrada_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-entrada_ sc-ui-radio-entrada_<?php echo $sc_seq_vert ?>" type=radio name="entrada_<?php echo $sc_seq_vert ?>" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_entrada_'][] = '1'; ?>
<?php  if ("1" == $this->entrada_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_entrada__line"><?php $tempOptionId = "id-opt-entrada_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-entrada_ sc-ui-radio-entrada_<?php echo $sc_seq_vert ?>" type=radio name="entrada_<?php echo $sc_seq_vert ?>" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_entrada_'][] = '0'; ?>
<?php  if ("0" == $this->entrada_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_entrada_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_entrada_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['service_']) && $this->nmgp_cmp_hidden['service_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="service_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($service_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_service__line" id="hidden_field_data_service_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_service_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_service__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_service_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["service_"]) &&  $this->nmgp_cmp_readonly["service_"] == "on") { 

 if ("1" == $this->service_) { $service__look = "SI";} 
 if ("0" == $this->service_) { $service__look = "NO";} 
?>
<input type="hidden" name="service_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($service_) . "\">" . $service__look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->service_) { $service__look = "SI";} 
 if ("0" == $this->service_) { $service__look = "NO";} 
?>
<span id="id_read_on_service_<?php echo $sc_seq_vert ; ?>"  class="css_service__line" style="<?php echo $sStyleReadLab_service_; ?>"><?php echo $this->form_format_readonly("service_", $this->form_encode_input($service__look)); ?></span><span id="id_read_off_service_<?php echo $sc_seq_vert ; ?>" class="css_read_off_service_ css_service__line" style="<?php echo $sStyleReadInp_service_; ?>"><div id="idAjaxRadio_service_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_service__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_service__line"><?php $tempOptionId = "id-opt-service_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-service_ sc-ui-radio-service_<?php echo $sc_seq_vert ?>" type=radio name="service_<?php echo $sc_seq_vert ?>" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_service_'][] = '1'; ?>
<?php  if ("1" == $this->service_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_service__line"><?php $tempOptionId = "id-opt-service_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-service_ sc-ui-radio-service_<?php echo $sc_seq_vert ?>" type=radio name="service_<?php echo $sc_seq_vert ?>" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_service_'][] = '0'; ?>
<?php  if ("0" == $this->service_)  { echo " checked" ;} ?><?php  if (empty($this->service_)) { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_service_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_service_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['kiosko_']) && $this->nmgp_cmp_hidden['kiosko_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kiosko_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kiosko_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_kiosko__line" id="hidden_field_data_kiosko_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_kiosko_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_kiosko__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_kiosko_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kiosko_"]) &&  $this->nmgp_cmp_readonly["kiosko_"] == "on") { 

 if ("1" == $this->kiosko_) { $kiosko__look = "SI";} 
 if ("0" == $this->kiosko_) { $kiosko__look = "NO";} 
?>
<input type="hidden" name="kiosko_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kiosko_) . "\">" . $kiosko__look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->kiosko_) { $kiosko__look = "SI";} 
 if ("0" == $this->kiosko_) { $kiosko__look = "NO";} 
?>
<span id="id_read_on_kiosko_<?php echo $sc_seq_vert ; ?>"  class="css_kiosko__line" style="<?php echo $sStyleReadLab_kiosko_; ?>"><?php echo $this->form_format_readonly("kiosko_", $this->form_encode_input($kiosko__look)); ?></span><span id="id_read_off_kiosko_<?php echo $sc_seq_vert ; ?>" class="css_read_off_kiosko_ css_kiosko__line" style="<?php echo $sStyleReadInp_kiosko_; ?>"><div id="idAjaxRadio_kiosko_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_kiosko__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_kiosko__line"><?php $tempOptionId = "id-opt-kiosko_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-kiosko_ sc-ui-radio-kiosko_<?php echo $sc_seq_vert ?>" type=radio name="kiosko_<?php echo $sc_seq_vert ?>" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_kiosko_'][] = '1'; ?>
<?php  if ("1" == $this->kiosko_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_kiosko__line"><?php $tempOptionId = "id-opt-kiosko_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-kiosko_ sc-ui-radio-kiosko_<?php echo $sc_seq_vert ?>" type=radio name="kiosko_<?php echo $sc_seq_vert ?>" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_kiosko_'][] = '0'; ?>
<?php  if ("0" == $this->kiosko_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kiosko_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kiosko_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['jugador_']) && $this->nmgp_cmp_hidden['jugador_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jugador_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jugador_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_jugador__line" id="hidden_field_data_jugador_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_jugador_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_jugador__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_jugador_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jugador_"]) &&  $this->nmgp_cmp_readonly["jugador_"] == "on") { 

 if ("1" == $this->jugador_) { $jugador__look = "SI";} 
 if ("0" == $this->jugador_) { $jugador__look = "NO";} 
?>
<input type="hidden" name="jugador_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jugador_) . "\">" . $jugador__look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->jugador_) { $jugador__look = "SI";} 
 if ("0" == $this->jugador_) { $jugador__look = "NO";} 
?>
<span id="id_read_on_jugador_<?php echo $sc_seq_vert ; ?>"  class="css_jugador__line" style="<?php echo $sStyleReadLab_jugador_; ?>"><?php echo $this->form_format_readonly("jugador_", $this->form_encode_input($jugador__look)); ?></span><span id="id_read_off_jugador_<?php echo $sc_seq_vert ; ?>" class="css_read_off_jugador_ css_jugador__line" style="<?php echo $sStyleReadInp_jugador_; ?>"><div id="idAjaxRadio_jugador_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_jugador__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_jugador__line"><?php $tempOptionId = "id-opt-jugador_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-jugador_ sc-ui-radio-jugador_<?php echo $sc_seq_vert ?>" type=radio name="jugador_<?php echo $sc_seq_vert ?>" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_jugador_'][] = '1'; ?>
<?php  if ("1" == $this->jugador_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_jugador__line"><?php $tempOptionId = "id-opt-jugador_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-jugador_ sc-ui-radio-jugador_<?php echo $sc_seq_vert ?>" type=radio name="jugador_<?php echo $sc_seq_vert ?>" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_jugador_'][] = '0'; ?>
<?php  if ("0" == $this->jugador_)  { echo " checked" ;} ?><?php  if (empty($this->jugador_)) { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jugador_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jugador_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['visitante_']) && $this->nmgp_cmp_hidden['visitante_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="visitante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($visitante_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_visitante__line" id="hidden_field_data_visitante_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_visitante_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_visitante__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_visitante_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["visitante_"]) &&  $this->nmgp_cmp_readonly["visitante_"] == "on") { 

 if ("1" == $this->visitante_) { $visitante__look = "SI";} 
 if ("0" == $this->visitante_) { $visitante__look = "NO";} 
?>
<input type="hidden" name="visitante_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($visitante_) . "\">" . $visitante__look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->visitante_) { $visitante__look = "SI";} 
 if ("0" == $this->visitante_) { $visitante__look = "NO";} 
?>
<span id="id_read_on_visitante_<?php echo $sc_seq_vert ; ?>"  class="css_visitante__line" style="<?php echo $sStyleReadLab_visitante_; ?>"><?php echo $this->form_format_readonly("visitante_", $this->form_encode_input($visitante__look)); ?></span><span id="id_read_off_visitante_<?php echo $sc_seq_vert ; ?>" class="css_read_off_visitante_ css_visitante__line" style="<?php echo $sStyleReadInp_visitante_; ?>"><div id="idAjaxRadio_visitante_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_visitante__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_visitante__line"><?php $tempOptionId = "id-opt-visitante_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-visitante_ sc-ui-radio-visitante_<?php echo $sc_seq_vert ?>" type=radio name="visitante_<?php echo $sc_seq_vert ?>" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_visitante_'][] = '1'; ?>
<?php  if ("1" == $this->visitante_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_visitante__line"><?php $tempOptionId = "id-opt-visitante_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-visitante_ sc-ui-radio-visitante_<?php echo $sc_seq_vert ?>" type=radio name="visitante_<?php echo $sc_seq_vert ?>" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_visitante_'][] = '0'; ?>
<?php  if ("0" == $this->visitante_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_visitante_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_visitante_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['minutos_']) && $this->nmgp_cmp_hidden['minutos_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="minutos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($minutos_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_minutos__line" id="hidden_field_data_minutos_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_minutos_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_minutos__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_minutos_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["minutos_"]) &&  $this->nmgp_cmp_readonly["minutos_"] == "on") { 

 ?>
<input type="hidden" name="minutos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($minutos_) . "\">" . $minutos_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_minutos_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-minutos_<?php echo $sc_seq_vert ?> css_minutos__line" style="<?php echo $sStyleReadLab_minutos_; ?>"><?php echo $this->form_format_readonly("minutos_", $this->form_encode_input($this->minutos_)); ?></span><span id="id_read_off_minutos_<?php echo $sc_seq_vert ?>" class="css_read_off_minutos_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_minutos_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_minutos__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_minutos_<?php echo $sc_seq_vert ?>" type=text name="minutos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($minutos_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['minutos_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['minutos_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['minutos_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_minutos_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_minutos_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tarjeta_']) && $this->nmgp_cmp_hidden['tarjeta_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarjeta_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tarjeta_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tarjeta__line" id="hidden_field_data_tarjeta_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tarjeta_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tarjeta__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tarjeta_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarjeta_"]) &&  $this->nmgp_cmp_readonly["tarjeta_"] == "on") { 

 if ("1" == $this->tarjeta_) { $tarjeta__look = "SI";} 
 if ("0" == $this->tarjeta_) { $tarjeta__look = "NO";} 
?>
<input type="hidden" name="tarjeta_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tarjeta_) . "\">" . $tarjeta__look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->tarjeta_) { $tarjeta__look = "SI";} 
 if ("0" == $this->tarjeta_) { $tarjeta__look = "NO";} 
?>
<span id="id_read_on_tarjeta_<?php echo $sc_seq_vert ; ?>"  class="css_tarjeta__line" style="<?php echo $sStyleReadLab_tarjeta_; ?>"><?php echo $this->form_format_readonly("tarjeta_", $this->form_encode_input($tarjeta__look)); ?></span><span id="id_read_off_tarjeta_<?php echo $sc_seq_vert ; ?>" class="css_read_off_tarjeta_ css_tarjeta__line" style="<?php echo $sStyleReadInp_tarjeta_; ?>"><div id="idAjaxRadio_tarjeta_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_tarjeta__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_tarjeta__line"><?php $tempOptionId = "id-opt-tarjeta_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-tarjeta_ sc-ui-radio-tarjeta_<?php echo $sc_seq_vert ?>" type=radio name="tarjeta_<?php echo $sc_seq_vert ?>" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_tarjeta_'][] = '1'; ?>
<?php  if ("1" == $this->tarjeta_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_tarjeta__line"><?php $tempOptionId = "id-opt-tarjeta_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-tarjeta_ sc-ui-radio-tarjeta_<?php echo $sc_seq_vert ?>" type=radio name="tarjeta_<?php echo $sc_seq_vert ?>" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_tarjeta_'][] = '0'; ?>
<?php  if ("0" == $this->tarjeta_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tarjeta_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tarjeta_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tokens_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tokens_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tokens_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tokens_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tokens_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['comida_']) && $this->nmgp_cmp_hidden['comida_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="comida_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($comida_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_comida__line" id="hidden_field_data_comida_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_comida_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_comida__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_comida_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["comida_"]) &&  $this->nmgp_cmp_readonly["comida_"] == "on") { 

 if ("1" == $this->comida_) { $comida__look = "SI";} 
 if ("0" == $this->comida_) { $comida__look = "NO";} 
?>
<input type="hidden" name="comida_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($comida_) . "\">" . $comida__look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->comida_) { $comida__look = "SI";} 
 if ("0" == $this->comida_) { $comida__look = "NO";} 
?>
<span id="id_read_on_comida_<?php echo $sc_seq_vert ; ?>"  class="css_comida__line" style="<?php echo $sStyleReadLab_comida_; ?>"><?php echo $this->form_format_readonly("comida_", $this->form_encode_input($comida__look)); ?></span><span id="id_read_off_comida_<?php echo $sc_seq_vert ; ?>" class="css_read_off_comida_ css_comida__line" style="<?php echo $sStyleReadInp_comida_; ?>"><div id="idAjaxRadio_comida_<?php echo $sc_seq_vert ; ?>" style="display: inline-block"  class="css_comida__line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_comida__line"><?php $tempOptionId = "id-opt-comida_" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-comida_ sc-ui-radio-comida_<?php echo $sc_seq_vert ?>" type=radio name="comida_<?php echo $sc_seq_vert ?>" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_comida_'][] = '1'; ?>
<?php  if ("1" == $this->comida_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOddMult css_comida__line"><?php $tempOptionId = "id-opt-comida_" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-comida_ sc-ui-radio-comida_<?php echo $sc_seq_vert ?>" type=radio name="comida_<?php echo $sc_seq_vert ?>" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['Lookup_comida_'][] = '0'; ?>
<?php  if ("0" == $this->comida_)  { echo " checked" ;} ?>  onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_comida_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_comida_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['score_']) && $this->nmgp_cmp_hidden['score_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="score_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($score_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_score__line" id="hidden_field_data_score_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_score_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_score__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_score_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["score_"]) &&  $this->nmgp_cmp_readonly["score_"] == "on") { 

 ?>
<input type="hidden" name="score_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($score_) . "\">" . $score_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_score_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-score_<?php echo $sc_seq_vert ?> css_score__line" style="<?php echo $sStyleReadLab_score_; ?>"><?php echo $this->form_format_readonly("score_", $this->form_encode_input($this->score_)); ?></span><span id="id_read_off_score_<?php echo $sc_seq_vert ?>" class="css_read_off_score_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_score_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_score__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_score_<?php echo $sc_seq_vert ?>" type=text name="score_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($score_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['score_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['score_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['score_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_score_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_score_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_product_name_))
       {
           $this->nmgp_cmp_readonly['product_name_'] = $sCheckRead_product_name_;
       }
       if ('display: none;' == $sStyleHidden_product_name_)
       {
           $this->nmgp_cmp_hidden['product_name_'] = 'off';
       }
       if (isset($sCheckRead_id_category_))
       {
           $this->nmgp_cmp_readonly['id_category_'] = $sCheckRead_id_category_;
       }
       if ('display: none;' == $sStyleHidden_id_category_)
       {
           $this->nmgp_cmp_hidden['id_category_'] = 'off';
       }
       if (isset($sCheckRead_product_code_))
       {
           $this->nmgp_cmp_readonly['product_code_'] = $sCheckRead_product_code_;
       }
       if ('display: none;' == $sStyleHidden_product_code_)
       {
           $this->nmgp_cmp_hidden['product_code_'] = 'off';
       }
       if (isset($sCheckRead_dateproduct_))
       {
           $this->nmgp_cmp_readonly['dateproduct_'] = $sCheckRead_dateproduct_;
       }
       if ('display: none;' == $sStyleHidden_dateproduct_)
       {
           $this->nmgp_cmp_hidden['dateproduct_'] = 'off';
       }
       if (isset($sCheckRead_product_cost_))
       {
           $this->nmgp_cmp_readonly['product_cost_'] = $sCheckRead_product_cost_;
       }
       if ('display: none;' == $sStyleHidden_product_cost_)
       {
           $this->nmgp_cmp_hidden['product_cost_'] = 'off';
       }
       if (isset($sCheckRead_stock_))
       {
           $this->nmgp_cmp_readonly['stock_'] = $sCheckRead_stock_;
       }
       if ('display: none;' == $sStyleHidden_stock_)
       {
           $this->nmgp_cmp_hidden['stock_'] = 'off';
       }
       if (isset($sCheckRead_product_value_))
       {
           $this->nmgp_cmp_readonly['product_value_'] = $sCheckRead_product_value_;
       }
       if ('display: none;' == $sStyleHidden_product_value_)
       {
           $this->nmgp_cmp_hidden['product_value_'] = 'off';
       }
       if (isset($sCheckRead_discount_))
       {
           $this->nmgp_cmp_readonly['discount_'] = $sCheckRead_discount_;
       }
       if ('display: none;' == $sStyleHidden_discount_)
       {
           $this->nmgp_cmp_hidden['discount_'] = 'off';
       }
       if (isset($sCheckRead_poriva_))
       {
           $this->nmgp_cmp_readonly['poriva_'] = $sCheckRead_poriva_;
       }
       if ('display: none;' == $sStyleHidden_poriva_)
       {
           $this->nmgp_cmp_hidden['poriva_'] = 'off';
       }
       if (isset($sCheckRead_cuentaventa_))
       {
           $this->nmgp_cmp_readonly['cuentaventa_'] = $sCheckRead_cuentaventa_;
       }
       if ('display: none;' == $sStyleHidden_cuentaventa_)
       {
           $this->nmgp_cmp_hidden['cuentaventa_'] = 'off';
       }
       if (isset($sCheckRead_unidad_))
       {
           $this->nmgp_cmp_readonly['unidad_'] = $sCheckRead_unidad_;
       }
       if ('display: none;' == $sStyleHidden_unidad_)
       {
           $this->nmgp_cmp_hidden['unidad_'] = 'off';
       }
       if (isset($sCheckRead_tipoitem_))
       {
           $this->nmgp_cmp_readonly['tipoitem_'] = $sCheckRead_tipoitem_;
       }
       if ('display: none;' == $sStyleHidden_tipoitem_)
       {
           $this->nmgp_cmp_hidden['tipoitem_'] = 'off';
       }
       if (isset($sCheckRead_cuentacompra_))
       {
           $this->nmgp_cmp_readonly['cuentacompra_'] = $sCheckRead_cuentacompra_;
       }
       if ('display: none;' == $sStyleHidden_cuentacompra_)
       {
           $this->nmgp_cmp_hidden['cuentacompra_'] = 'off';
       }
       if (isset($sCheckRead_precioventa_))
       {
           $this->nmgp_cmp_readonly['precioventa_'] = $sCheckRead_precioventa_;
       }
       if ('display: none;' == $sStyleHidden_precioventa_)
       {
           $this->nmgp_cmp_hidden['precioventa_'] = 'off';
       }
       if (isset($sCheckRead_puntoventa_))
       {
           $this->nmgp_cmp_readonly['puntoventa_'] = $sCheckRead_puntoventa_;
       }
       if ('display: none;' == $sStyleHidden_puntoventa_)
       {
           $this->nmgp_cmp_hidden['puntoventa_'] = 'off';
       }
       if (isset($sCheckRead_id_status_))
       {
           $this->nmgp_cmp_readonly['id_status_'] = $sCheckRead_id_status_;
       }
       if ('display: none;' == $sStyleHidden_id_status_)
       {
           $this->nmgp_cmp_hidden['id_status_'] = 'off';
       }
       if (isset($sCheckRead_image_))
       {
           $this->nmgp_cmp_readonly['image_'] = $sCheckRead_image_;
       }
       if ('display: none;' == $sStyleHidden_image_)
       {
           $this->nmgp_cmp_hidden['image_'] = 'off';
       }
       if (isset($sCheckRead_entrada_))
       {
           $this->nmgp_cmp_readonly['entrada_'] = $sCheckRead_entrada_;
       }
       if ('display: none;' == $sStyleHidden_entrada_)
       {
           $this->nmgp_cmp_hidden['entrada_'] = 'off';
       }
       if (isset($sCheckRead_service_))
       {
           $this->nmgp_cmp_readonly['service_'] = $sCheckRead_service_;
       }
       if ('display: none;' == $sStyleHidden_service_)
       {
           $this->nmgp_cmp_hidden['service_'] = 'off';
       }
       if (isset($sCheckRead_kiosko_))
       {
           $this->nmgp_cmp_readonly['kiosko_'] = $sCheckRead_kiosko_;
       }
       if ('display: none;' == $sStyleHidden_kiosko_)
       {
           $this->nmgp_cmp_hidden['kiosko_'] = 'off';
       }
       if (isset($sCheckRead_jugador_))
       {
           $this->nmgp_cmp_readonly['jugador_'] = $sCheckRead_jugador_;
       }
       if ('display: none;' == $sStyleHidden_jugador_)
       {
           $this->nmgp_cmp_hidden['jugador_'] = 'off';
       }
       if (isset($sCheckRead_visitante_))
       {
           $this->nmgp_cmp_readonly['visitante_'] = $sCheckRead_visitante_;
       }
       if ('display: none;' == $sStyleHidden_visitante_)
       {
           $this->nmgp_cmp_hidden['visitante_'] = 'off';
       }
       if (isset($sCheckRead_minutos_))
       {
           $this->nmgp_cmp_readonly['minutos_'] = $sCheckRead_minutos_;
       }
       if ('display: none;' == $sStyleHidden_minutos_)
       {
           $this->nmgp_cmp_hidden['minutos_'] = 'off';
       }
       if (isset($sCheckRead_tarjeta_))
       {
           $this->nmgp_cmp_readonly['tarjeta_'] = $sCheckRead_tarjeta_;
       }
       if ('display: none;' == $sStyleHidden_tarjeta_)
       {
           $this->nmgp_cmp_hidden['tarjeta_'] = 'off';
       }
       if (isset($sCheckRead_tokens_))
       {
           $this->nmgp_cmp_readonly['tokens_'] = $sCheckRead_tokens_;
       }
       if ('display: none;' == $sStyleHidden_tokens_)
       {
           $this->nmgp_cmp_hidden['tokens_'] = 'off';
       }
       if (isset($sCheckRead_comida_))
       {
           $this->nmgp_cmp_readonly['comida_'] = $sCheckRead_comida_;
       }
       if ('display: none;' == $sStyleHidden_comida_)
       {
           $this->nmgp_cmp_hidden['comida_'] = 'off';
       }
       if (isset($sCheckRead_score_))
       {
           $this->nmgp_cmp_readonly['score_'] = $sCheckRead_score_;
       }
       if ('display: none;' == $sStyleHidden_score_)
       {
           $this->nmgp_cmp_hidden['score_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_product_edit_masivo = $guarda_form_vert_form_product_edit_masivo;
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['birpara'];
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
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['first'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['back'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['forward'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['run_modal'])
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
  $nm_sc_blocos_da_pag = array(0,1,2);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_product_edit_masivo");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_product_edit_masivo");
 parent.scAjaxDetailHeight("form_product_edit_masivo", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_product_edit_masivo", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_product_edit_masivo", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['sc_modal'])
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
			do_ajax_form_product_edit_masivo_add_new_line(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_edit_masivo']['buttonStatus'] = $this->nmgp_botoes;
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
