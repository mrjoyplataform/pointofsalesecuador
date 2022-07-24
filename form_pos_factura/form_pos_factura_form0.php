<?php
class form_pos_factura_form extends form_pos_factura_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " pos_factura"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " pos_factura"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['sc_redir_atualiz'] == 'ok')
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_pos_factura/form_pos_factura_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_pos_factura_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_pos_factura_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['link_info']['remove_border']) {
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
 include_once("form_pos_factura_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_pos_factura'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_pos_factura'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['fast_search'][2] : "";
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['new'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['insert'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['bcancelar'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "" . $buttonMacroDisabled . "", "", "");?>
 
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['empty_filter'] = true;
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
   <?php
    $sStyleHidden_numcaja_ = '';
    if (isset($this->nmgp_cmp_hidden['numcaja_']) && $this->nmgp_cmp_hidden['numcaja_'] == 'off') {
        $sStyleHidden_numcaja_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['numcaja_']) || $this->nmgp_cmp_hidden['numcaja_'] == 'on') {
        if (!isset($this->nm_new_label['numcaja_'])) {
            $this->nm_new_label['numcaja_'] = "Numcaja";
        }
        $SC_Label = "" . $this->nm_new_label['numcaja_']  . "";
        $label_fieldName = nl2br($SC_Label);

        // label & order
        $divLabelStyle = '; justify-content: left';
        $label_fieldName .= "&nbsp;<span class=\"scFormRequiredOddMult\">*</span>&nbsp;";
        $label_labelContent = $label_fieldName;
        $label_divLabel = "<div style=\"flex-grow: 1\">". $label_labelContent . "</div>";

        // controls
        $label_fixedColumn = '';
        $label_divControl = '<div style="display: flex; flex-wrap: nowrap; align-items: baseline">' . $label_chart . $label_fixedColumn . '</div>';

        // final label
        $label_final = '<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between; align-items: baseline">' . $label_divLabel . $label_divControl . '</div>';
        $classColFld = " sc-col-fld sc-col-fld-" . $this->form_fixed_column_no;
?>
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_numcaja__label sc-col-title" id="hidden_field_label_numcaja_" style="<?php echo $sStyleHidden_numcaja_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_serie_ = '';
    if (isset($this->nmgp_cmp_hidden['serie_']) && $this->nmgp_cmp_hidden['serie_'] == 'off') {
        $sStyleHidden_serie_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['serie_']) || $this->nmgp_cmp_hidden['serie_'] == 'on') {
        if (!isset($this->nm_new_label['serie_'])) {
            $this->nm_new_label['serie_'] = "Serie";
        }
        $SC_Label = "" . $this->nm_new_label['serie_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_serie__label sc-col-title" id="hidden_field_label_serie_" style="<?php echo $sStyleHidden_serie_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_numero_ = '';
    if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off') {
        $sStyleHidden_numero_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['numero_']) || $this->nmgp_cmp_hidden['numero_'] == 'on') {
        if (!isset($this->nm_new_label['numero_'])) {
            $this->nm_new_label['numero_'] = "Numero";
        }
        $SC_Label = "" . $this->nm_new_label['numero_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_numero__label sc-col-title" id="hidden_field_label_numero_" style="<?php echo $sStyleHidden_numero_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_prodentrega_ = '';
    if (isset($this->nmgp_cmp_hidden['prodentrega_']) && $this->nmgp_cmp_hidden['prodentrega_'] == 'off') {
        $sStyleHidden_prodentrega_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['prodentrega_']) || $this->nmgp_cmp_hidden['prodentrega_'] == 'on') {
        if (!isset($this->nm_new_label['prodentrega_'])) {
            $this->nm_new_label['prodentrega_'] = "Prodentrega";
        }
        $SC_Label = "" . $this->nm_new_label['prodentrega_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_prodentrega__label sc-col-title" id="hidden_field_label_prodentrega_" style="<?php echo $sStyleHidden_prodentrega_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_estab_ = '';
    if (isset($this->nmgp_cmp_hidden['estab_']) && $this->nmgp_cmp_hidden['estab_'] == 'off') {
        $sStyleHidden_estab_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['estab_']) || $this->nmgp_cmp_hidden['estab_'] == 'on') {
        if (!isset($this->nm_new_label['estab_'])) {
            $this->nm_new_label['estab_'] = "Estab";
        }
        $SC_Label = "" . $this->nm_new_label['estab_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_estab__label sc-col-title" id="hidden_field_label_estab_" style="<?php echo $sStyleHidden_estab_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_ptoemi_ = '';
    if (isset($this->nmgp_cmp_hidden['ptoemi_']) && $this->nmgp_cmp_hidden['ptoemi_'] == 'off') {
        $sStyleHidden_ptoemi_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['ptoemi_']) || $this->nmgp_cmp_hidden['ptoemi_'] == 'on') {
        if (!isset($this->nm_new_label['ptoemi_'])) {
            $this->nm_new_label['ptoemi_'] = "Pto Emi";
        }
        $SC_Label = "" . $this->nm_new_label['ptoemi_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_ptoemi__label sc-col-title" id="hidden_field_label_ptoemi_" style="<?php echo $sStyleHidden_ptoemi_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_direstablecimiento_ = '';
    if (isset($this->nmgp_cmp_hidden['direstablecimiento_']) && $this->nmgp_cmp_hidden['direstablecimiento_'] == 'off') {
        $sStyleHidden_direstablecimiento_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['direstablecimiento_']) || $this->nmgp_cmp_hidden['direstablecimiento_'] == 'on') {
        if (!isset($this->nm_new_label['direstablecimiento_'])) {
            $this->nm_new_label['direstablecimiento_'] = "Dir Establecimiento";
        }
        $SC_Label = "" . $this->nm_new_label['direstablecimiento_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_direstablecimiento__label sc-col-title" id="hidden_field_label_direstablecimiento_" style="<?php echo $sStyleHidden_direstablecimiento_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_tipoambiente_ = '';
    if (isset($this->nmgp_cmp_hidden['tipoambiente_']) && $this->nmgp_cmp_hidden['tipoambiente_'] == 'off') {
        $sStyleHidden_tipoambiente_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['tipoambiente_']) || $this->nmgp_cmp_hidden['tipoambiente_'] == 'on') {
        if (!isset($this->nm_new_label['tipoambiente_'])) {
            $this->nm_new_label['tipoambiente_'] = "Tipoambiente";
        }
        $SC_Label = "" . $this->nm_new_label['tipoambiente_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_tipoambiente__label sc-col-title" id="hidden_field_label_tipoambiente_" style="<?php echo $sStyleHidden_tipoambiente_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_tipoemision_ = '';
    if (isset($this->nmgp_cmp_hidden['tipoemision_']) && $this->nmgp_cmp_hidden['tipoemision_'] == 'off') {
        $sStyleHidden_tipoemision_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['tipoemision_']) || $this->nmgp_cmp_hidden['tipoemision_'] == 'on') {
        if (!isset($this->nm_new_label['tipoemision_'])) {
            $this->nm_new_label['tipoemision_'] = "Tipoemision";
        }
        $SC_Label = "" . $this->nm_new_label['tipoemision_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_tipoemision__label sc-col-title" id="hidden_field_label_tipoemision_" style="<?php echo $sStyleHidden_tipoemision_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_rucem_ = '';
    if (isset($this->nmgp_cmp_hidden['rucem_']) && $this->nmgp_cmp_hidden['rucem_'] == 'off') {
        $sStyleHidden_rucem_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['rucem_']) || $this->nmgp_cmp_hidden['rucem_'] == 'on') {
        if (!isset($this->nm_new_label['rucem_'])) {
            $this->nm_new_label['rucem_'] = "Rucem";
        }
        $SC_Label = "" . $this->nm_new_label['rucem_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_rucem__label sc-col-title" id="hidden_field_label_rucem_" style="<?php echo $sStyleHidden_rucem_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_dirmatriz_ = '';
    if (isset($this->nmgp_cmp_hidden['dirmatriz_']) && $this->nmgp_cmp_hidden['dirmatriz_'] == 'off') {
        $sStyleHidden_dirmatriz_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['dirmatriz_']) || $this->nmgp_cmp_hidden['dirmatriz_'] == 'on') {
        if (!isset($this->nm_new_label['dirmatriz_'])) {
            $this->nm_new_label['dirmatriz_'] = "Dir Matriz";
        }
        $SC_Label = "" . $this->nm_new_label['dirmatriz_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_dirmatriz__label sc-col-title" id="hidden_field_label_dirmatriz_" style="<?php echo $sStyleHidden_dirmatriz_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_nombrecomercial_ = '';
    if (isset($this->nmgp_cmp_hidden['nombrecomercial_']) && $this->nmgp_cmp_hidden['nombrecomercial_'] == 'off') {
        $sStyleHidden_nombrecomercial_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['nombrecomercial_']) || $this->nmgp_cmp_hidden['nombrecomercial_'] == 'on') {
        if (!isset($this->nm_new_label['nombrecomercial_'])) {
            $this->nm_new_label['nombrecomercial_'] = "Nombre Comercial";
        }
        $SC_Label = "" . $this->nm_new_label['nombrecomercial_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_nombrecomercial__label sc-col-title" id="hidden_field_label_nombrecomercial_" style="<?php echo $sStyleHidden_nombrecomercial_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_coddoc_ = '';
    if (isset($this->nmgp_cmp_hidden['coddoc_']) && $this->nmgp_cmp_hidden['coddoc_'] == 'off') {
        $sStyleHidden_coddoc_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['coddoc_']) || $this->nmgp_cmp_hidden['coddoc_'] == 'on') {
        if (!isset($this->nm_new_label['coddoc_'])) {
            $this->nm_new_label['coddoc_'] = "Cod Doc";
        }
        $SC_Label = "" . $this->nm_new_label['coddoc_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_coddoc__label sc-col-title" id="hidden_field_label_coddoc_" style="<?php echo $sStyleHidden_coddoc_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_razonsocial_ = '';
    if (isset($this->nmgp_cmp_hidden['razonsocial_']) && $this->nmgp_cmp_hidden['razonsocial_'] == 'off') {
        $sStyleHidden_razonsocial_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['razonsocial_']) || $this->nmgp_cmp_hidden['razonsocial_'] == 'on') {
        if (!isset($this->nm_new_label['razonsocial_'])) {
            $this->nm_new_label['razonsocial_'] = "Razon Social";
        }
        $SC_Label = "" . $this->nm_new_label['razonsocial_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_razonsocial__label sc-col-title" id="hidden_field_label_razonsocial_" style="<?php echo $sStyleHidden_razonsocial_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_rfid_estado_ = '';
    if (isset($this->nmgp_cmp_hidden['rfid_estado_']) && $this->nmgp_cmp_hidden['rfid_estado_'] == 'off') {
        $sStyleHidden_rfid_estado_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['rfid_estado_']) || $this->nmgp_cmp_hidden['rfid_estado_'] == 'on') {
        if (!isset($this->nm_new_label['rfid_estado_'])) {
            $this->nm_new_label['rfid_estado_'] = "Rfid Estado";
        }
        $SC_Label = "" . $this->nm_new_label['rfid_estado_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_rfid_estado__label sc-col-title" id="hidden_field_label_rfid_estado_" style="<?php echo $sStyleHidden_rfid_estado_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_rfid_fecha_ = '';
    if (isset($this->nmgp_cmp_hidden['rfid_fecha_']) && $this->nmgp_cmp_hidden['rfid_fecha_'] == 'off') {
        $sStyleHidden_rfid_fecha_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['rfid_fecha_']) || $this->nmgp_cmp_hidden['rfid_fecha_'] == 'on') {
        if (!isset($this->nm_new_label['rfid_fecha_'])) {
            $this->nm_new_label['rfid_fecha_'] = "Rfid Fecha";
        }
        $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['rfid_fecha_']['date_format']));
        $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
        $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
        $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
        $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
        $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
        $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
        $SC_Label = "" . $this->nm_new_label['rfid_fecha_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_rfid_fecha__label sc-col-title" id="hidden_field_label_rfid_fecha_" style="<?php echo $sStyleHidden_rfid_fecha_; ?>" > <?php echo $label_final ?> </TD>
   <?php
        $this->form_fixed_column_no++;
    }
?>

   <?php
    $sStyleHidden_rfid_read_ = '';
    if (isset($this->nmgp_cmp_hidden['rfid_read_']) && $this->nmgp_cmp_hidden['rfid_read_'] == 'off') {
        $sStyleHidden_rfid_read_ = 'display: none';
    }
    if (1 || !isset($this->nmgp_cmp_hidden['rfid_read_']) || $this->nmgp_cmp_hidden['rfid_read_'] == 'on') {
        if (!isset($this->nm_new_label['rfid_read_'])) {
            $this->nm_new_label['rfid_read_'] = "Rfid Read";
        }
        $SC_Label = "" . $this->nm_new_label['rfid_read_']  . "";
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
    <TD class="<?php echo $this->css_inherit_bg . ' ' ?>scFormLabelOddMult css_rfid_read__label sc-col-title" id="hidden_field_label_rfid_read_" style="<?php echo $sStyleHidden_rfid_read_; ?>" > <?php echo $label_final ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_pos_factura);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_pos_factura = $this->form_vert_form_pos_factura;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_pos_factura))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['numcaja_']))
           {
               $this->nmgp_cmp_readonly['numcaja_'] = 'on';
           }
   foreach ($this->form_vert_form_pos_factura as $sc_seq_vert => $sc_lixo)
   {
       $this->form_fixed_column_no = 0;
       $this->loadRecordState($sc_seq_vert);
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['numcaja_'] = true;
           $this->nmgp_cmp_readonly['serie_'] = true;
           $this->nmgp_cmp_readonly['numero_'] = true;
           $this->nmgp_cmp_readonly['prodentrega_'] = true;
           $this->nmgp_cmp_readonly['estab_'] = true;
           $this->nmgp_cmp_readonly['ptoemi_'] = true;
           $this->nmgp_cmp_readonly['direstablecimiento_'] = true;
           $this->nmgp_cmp_readonly['tipoambiente_'] = true;
           $this->nmgp_cmp_readonly['tipoemision_'] = true;
           $this->nmgp_cmp_readonly['rucem_'] = true;
           $this->nmgp_cmp_readonly['dirmatriz_'] = true;
           $this->nmgp_cmp_readonly['nombrecomercial_'] = true;
           $this->nmgp_cmp_readonly['coddoc_'] = true;
           $this->nmgp_cmp_readonly['razonsocial_'] = true;
           $this->nmgp_cmp_readonly['rfid_estado_'] = true;
           $this->nmgp_cmp_readonly['rfid_fecha_'] = true;
           $this->nmgp_cmp_readonly['rfid_read_'] = true;
           $this->nmgp_cmp_readonly['ult_rfid_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['numcaja_']) || $this->nmgp_cmp_readonly['numcaja_'] != "on") {$this->nmgp_cmp_readonly['numcaja_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['serie_']) || $this->nmgp_cmp_readonly['serie_'] != "on") {$this->nmgp_cmp_readonly['serie_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['numero_']) || $this->nmgp_cmp_readonly['numero_'] != "on") {$this->nmgp_cmp_readonly['numero_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['prodentrega_']) || $this->nmgp_cmp_readonly['prodentrega_'] != "on") {$this->nmgp_cmp_readonly['prodentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['estab_']) || $this->nmgp_cmp_readonly['estab_'] != "on") {$this->nmgp_cmp_readonly['estab_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ptoemi_']) || $this->nmgp_cmp_readonly['ptoemi_'] != "on") {$this->nmgp_cmp_readonly['ptoemi_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['direstablecimiento_']) || $this->nmgp_cmp_readonly['direstablecimiento_'] != "on") {$this->nmgp_cmp_readonly['direstablecimiento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipoambiente_']) || $this->nmgp_cmp_readonly['tipoambiente_'] != "on") {$this->nmgp_cmp_readonly['tipoambiente_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipoemision_']) || $this->nmgp_cmp_readonly['tipoemision_'] != "on") {$this->nmgp_cmp_readonly['tipoemision_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['rucem_']) || $this->nmgp_cmp_readonly['rucem_'] != "on") {$this->nmgp_cmp_readonly['rucem_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dirmatriz_']) || $this->nmgp_cmp_readonly['dirmatriz_'] != "on") {$this->nmgp_cmp_readonly['dirmatriz_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nombrecomercial_']) || $this->nmgp_cmp_readonly['nombrecomercial_'] != "on") {$this->nmgp_cmp_readonly['nombrecomercial_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['coddoc_']) || $this->nmgp_cmp_readonly['coddoc_'] != "on") {$this->nmgp_cmp_readonly['coddoc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['razonsocial_']) || $this->nmgp_cmp_readonly['razonsocial_'] != "on") {$this->nmgp_cmp_readonly['razonsocial_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['rfid_estado_']) || $this->nmgp_cmp_readonly['rfid_estado_'] != "on") {$this->nmgp_cmp_readonly['rfid_estado_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['rfid_fecha_']) || $this->nmgp_cmp_readonly['rfid_fecha_'] != "on") {$this->nmgp_cmp_readonly['rfid_fecha_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['rfid_read_']) || $this->nmgp_cmp_readonly['rfid_read_'] != "on") {$this->nmgp_cmp_readonly['rfid_read_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ult_rfid_']) || $this->nmgp_cmp_readonly['ult_rfid_'] != "on") {$this->nmgp_cmp_readonly['ult_rfid_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->numcaja_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['numcaja_']; 
       $numcaja_ = $this->numcaja_; 
       $sStyleHidden_numcaja_ = '';
       if (isset($sCheckRead_numcaja_))
       {
           unset($sCheckRead_numcaja_);
       }
       if (isset($this->nmgp_cmp_readonly['numcaja_']))
       {
           $sCheckRead_numcaja_ = $this->nmgp_cmp_readonly['numcaja_'];
       }
       if (isset($this->nmgp_cmp_hidden['numcaja_']) && $this->nmgp_cmp_hidden['numcaja_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['numcaja_']);
           $sStyleHidden_numcaja_ = 'display: none;';
       }
       $bTestReadOnly_numcaja_ = true;
       $sStyleReadLab_numcaja_ = 'display: none;';
       $sStyleReadInp_numcaja_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["numcaja_"]) &&  $this->nmgp_cmp_readonly["numcaja_"] == "on"))
       {
           $bTestReadOnly_numcaja_ = false;
           unset($this->nmgp_cmp_readonly['numcaja_']);
           $sStyleReadLab_numcaja_ = '';
           $sStyleReadInp_numcaja_ = 'display: none;';
       }
       $this->serie_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['serie_']; 
       $serie_ = $this->serie_; 
       $sStyleHidden_serie_ = '';
       if (isset($sCheckRead_serie_))
       {
           unset($sCheckRead_serie_);
       }
       if (isset($this->nmgp_cmp_readonly['serie_']))
       {
           $sCheckRead_serie_ = $this->nmgp_cmp_readonly['serie_'];
       }
       if (isset($this->nmgp_cmp_hidden['serie_']) && $this->nmgp_cmp_hidden['serie_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['serie_']);
           $sStyleHidden_serie_ = 'display: none;';
       }
       $bTestReadOnly_serie_ = true;
       $sStyleReadLab_serie_ = 'display: none;';
       $sStyleReadInp_serie_ = '';
       if (isset($this->nmgp_cmp_readonly['serie_']) && $this->nmgp_cmp_readonly['serie_'] == 'on')
       {
           $bTestReadOnly_serie_ = false;
           unset($this->nmgp_cmp_readonly['serie_']);
           $sStyleReadLab_serie_ = '';
           $sStyleReadInp_serie_ = 'display: none;';
       }
       $this->numero_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['numero_']; 
       $numero_ = $this->numero_; 
       $sStyleHidden_numero_ = '';
       if (isset($sCheckRead_numero_))
       {
           unset($sCheckRead_numero_);
       }
       if (isset($this->nmgp_cmp_readonly['numero_']))
       {
           $sCheckRead_numero_ = $this->nmgp_cmp_readonly['numero_'];
       }
       if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['numero_']);
           $sStyleHidden_numero_ = 'display: none;';
       }
       $bTestReadOnly_numero_ = true;
       $sStyleReadLab_numero_ = 'display: none;';
       $sStyleReadInp_numero_ = '';
       if (isset($this->nmgp_cmp_readonly['numero_']) && $this->nmgp_cmp_readonly['numero_'] == 'on')
       {
           $bTestReadOnly_numero_ = false;
           unset($this->nmgp_cmp_readonly['numero_']);
           $sStyleReadLab_numero_ = '';
           $sStyleReadInp_numero_ = 'display: none;';
       }
       $this->prodentrega_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['prodentrega_']; 
       $prodentrega_ = $this->prodentrega_; 
       $sStyleHidden_prodentrega_ = '';
       if (isset($sCheckRead_prodentrega_))
       {
           unset($sCheckRead_prodentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['prodentrega_']))
       {
           $sCheckRead_prodentrega_ = $this->nmgp_cmp_readonly['prodentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['prodentrega_']) && $this->nmgp_cmp_hidden['prodentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['prodentrega_']);
           $sStyleHidden_prodentrega_ = 'display: none;';
       }
       $bTestReadOnly_prodentrega_ = true;
       $sStyleReadLab_prodentrega_ = 'display: none;';
       $sStyleReadInp_prodentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['prodentrega_']) && $this->nmgp_cmp_readonly['prodentrega_'] == 'on')
       {
           $bTestReadOnly_prodentrega_ = false;
           unset($this->nmgp_cmp_readonly['prodentrega_']);
           $sStyleReadLab_prodentrega_ = '';
           $sStyleReadInp_prodentrega_ = 'display: none;';
       }
       $this->estab_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['estab_']; 
       $estab_ = $this->estab_; 
       $sStyleHidden_estab_ = '';
       if (isset($sCheckRead_estab_))
       {
           unset($sCheckRead_estab_);
       }
       if (isset($this->nmgp_cmp_readonly['estab_']))
       {
           $sCheckRead_estab_ = $this->nmgp_cmp_readonly['estab_'];
       }
       if (isset($this->nmgp_cmp_hidden['estab_']) && $this->nmgp_cmp_hidden['estab_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['estab_']);
           $sStyleHidden_estab_ = 'display: none;';
       }
       $bTestReadOnly_estab_ = true;
       $sStyleReadLab_estab_ = 'display: none;';
       $sStyleReadInp_estab_ = '';
       if (isset($this->nmgp_cmp_readonly['estab_']) && $this->nmgp_cmp_readonly['estab_'] == 'on')
       {
           $bTestReadOnly_estab_ = false;
           unset($this->nmgp_cmp_readonly['estab_']);
           $sStyleReadLab_estab_ = '';
           $sStyleReadInp_estab_ = 'display: none;';
       }
       $this->ptoemi_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['ptoemi_']; 
       $ptoemi_ = $this->ptoemi_; 
       $sStyleHidden_ptoemi_ = '';
       if (isset($sCheckRead_ptoemi_))
       {
           unset($sCheckRead_ptoemi_);
       }
       if (isset($this->nmgp_cmp_readonly['ptoemi_']))
       {
           $sCheckRead_ptoemi_ = $this->nmgp_cmp_readonly['ptoemi_'];
       }
       if (isset($this->nmgp_cmp_hidden['ptoemi_']) && $this->nmgp_cmp_hidden['ptoemi_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ptoemi_']);
           $sStyleHidden_ptoemi_ = 'display: none;';
       }
       $bTestReadOnly_ptoemi_ = true;
       $sStyleReadLab_ptoemi_ = 'display: none;';
       $sStyleReadInp_ptoemi_ = '';
       if (isset($this->nmgp_cmp_readonly['ptoemi_']) && $this->nmgp_cmp_readonly['ptoemi_'] == 'on')
       {
           $bTestReadOnly_ptoemi_ = false;
           unset($this->nmgp_cmp_readonly['ptoemi_']);
           $sStyleReadLab_ptoemi_ = '';
           $sStyleReadInp_ptoemi_ = 'display: none;';
       }
       $this->direstablecimiento_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['direstablecimiento_']; 
       $direstablecimiento_ = $this->direstablecimiento_; 
       $sStyleHidden_direstablecimiento_ = '';
       if (isset($sCheckRead_direstablecimiento_))
       {
           unset($sCheckRead_direstablecimiento_);
       }
       if (isset($this->nmgp_cmp_readonly['direstablecimiento_']))
       {
           $sCheckRead_direstablecimiento_ = $this->nmgp_cmp_readonly['direstablecimiento_'];
       }
       if (isset($this->nmgp_cmp_hidden['direstablecimiento_']) && $this->nmgp_cmp_hidden['direstablecimiento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['direstablecimiento_']);
           $sStyleHidden_direstablecimiento_ = 'display: none;';
       }
       $bTestReadOnly_direstablecimiento_ = true;
       $sStyleReadLab_direstablecimiento_ = 'display: none;';
       $sStyleReadInp_direstablecimiento_ = '';
       if (isset($this->nmgp_cmp_readonly['direstablecimiento_']) && $this->nmgp_cmp_readonly['direstablecimiento_'] == 'on')
       {
           $bTestReadOnly_direstablecimiento_ = false;
           unset($this->nmgp_cmp_readonly['direstablecimiento_']);
           $sStyleReadLab_direstablecimiento_ = '';
           $sStyleReadInp_direstablecimiento_ = 'display: none;';
       }
       $this->tipoambiente_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['tipoambiente_']; 
       $tipoambiente_ = $this->tipoambiente_; 
       $sStyleHidden_tipoambiente_ = '';
       if (isset($sCheckRead_tipoambiente_))
       {
           unset($sCheckRead_tipoambiente_);
       }
       if (isset($this->nmgp_cmp_readonly['tipoambiente_']))
       {
           $sCheckRead_tipoambiente_ = $this->nmgp_cmp_readonly['tipoambiente_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipoambiente_']) && $this->nmgp_cmp_hidden['tipoambiente_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipoambiente_']);
           $sStyleHidden_tipoambiente_ = 'display: none;';
       }
       $bTestReadOnly_tipoambiente_ = true;
       $sStyleReadLab_tipoambiente_ = 'display: none;';
       $sStyleReadInp_tipoambiente_ = '';
       if (isset($this->nmgp_cmp_readonly['tipoambiente_']) && $this->nmgp_cmp_readonly['tipoambiente_'] == 'on')
       {
           $bTestReadOnly_tipoambiente_ = false;
           unset($this->nmgp_cmp_readonly['tipoambiente_']);
           $sStyleReadLab_tipoambiente_ = '';
           $sStyleReadInp_tipoambiente_ = 'display: none;';
       }
       $this->tipoemision_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['tipoemision_']; 
       $tipoemision_ = $this->tipoemision_; 
       $sStyleHidden_tipoemision_ = '';
       if (isset($sCheckRead_tipoemision_))
       {
           unset($sCheckRead_tipoemision_);
       }
       if (isset($this->nmgp_cmp_readonly['tipoemision_']))
       {
           $sCheckRead_tipoemision_ = $this->nmgp_cmp_readonly['tipoemision_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipoemision_']) && $this->nmgp_cmp_hidden['tipoemision_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipoemision_']);
           $sStyleHidden_tipoemision_ = 'display: none;';
       }
       $bTestReadOnly_tipoemision_ = true;
       $sStyleReadLab_tipoemision_ = 'display: none;';
       $sStyleReadInp_tipoemision_ = '';
       if (isset($this->nmgp_cmp_readonly['tipoemision_']) && $this->nmgp_cmp_readonly['tipoemision_'] == 'on')
       {
           $bTestReadOnly_tipoemision_ = false;
           unset($this->nmgp_cmp_readonly['tipoemision_']);
           $sStyleReadLab_tipoemision_ = '';
           $sStyleReadInp_tipoemision_ = 'display: none;';
       }
       $this->rucem_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['rucem_']; 
       $rucem_ = $this->rucem_; 
       $sStyleHidden_rucem_ = '';
       if (isset($sCheckRead_rucem_))
       {
           unset($sCheckRead_rucem_);
       }
       if (isset($this->nmgp_cmp_readonly['rucem_']))
       {
           $sCheckRead_rucem_ = $this->nmgp_cmp_readonly['rucem_'];
       }
       if (isset($this->nmgp_cmp_hidden['rucem_']) && $this->nmgp_cmp_hidden['rucem_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['rucem_']);
           $sStyleHidden_rucem_ = 'display: none;';
       }
       $bTestReadOnly_rucem_ = true;
       $sStyleReadLab_rucem_ = 'display: none;';
       $sStyleReadInp_rucem_ = '';
       if (isset($this->nmgp_cmp_readonly['rucem_']) && $this->nmgp_cmp_readonly['rucem_'] == 'on')
       {
           $bTestReadOnly_rucem_ = false;
           unset($this->nmgp_cmp_readonly['rucem_']);
           $sStyleReadLab_rucem_ = '';
           $sStyleReadInp_rucem_ = 'display: none;';
       }
       $this->dirmatriz_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['dirmatriz_']; 
       $dirmatriz_ = $this->dirmatriz_; 
       $sStyleHidden_dirmatriz_ = '';
       if (isset($sCheckRead_dirmatriz_))
       {
           unset($sCheckRead_dirmatriz_);
       }
       if (isset($this->nmgp_cmp_readonly['dirmatriz_']))
       {
           $sCheckRead_dirmatriz_ = $this->nmgp_cmp_readonly['dirmatriz_'];
       }
       if (isset($this->nmgp_cmp_hidden['dirmatriz_']) && $this->nmgp_cmp_hidden['dirmatriz_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dirmatriz_']);
           $sStyleHidden_dirmatriz_ = 'display: none;';
       }
       $bTestReadOnly_dirmatriz_ = true;
       $sStyleReadLab_dirmatriz_ = 'display: none;';
       $sStyleReadInp_dirmatriz_ = '';
       if (isset($this->nmgp_cmp_readonly['dirmatriz_']) && $this->nmgp_cmp_readonly['dirmatriz_'] == 'on')
       {
           $bTestReadOnly_dirmatriz_ = false;
           unset($this->nmgp_cmp_readonly['dirmatriz_']);
           $sStyleReadLab_dirmatriz_ = '';
           $sStyleReadInp_dirmatriz_ = 'display: none;';
       }
       $this->nombrecomercial_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['nombrecomercial_']; 
       $nombrecomercial_ = $this->nombrecomercial_; 
       $sStyleHidden_nombrecomercial_ = '';
       if (isset($sCheckRead_nombrecomercial_))
       {
           unset($sCheckRead_nombrecomercial_);
       }
       if (isset($this->nmgp_cmp_readonly['nombrecomercial_']))
       {
           $sCheckRead_nombrecomercial_ = $this->nmgp_cmp_readonly['nombrecomercial_'];
       }
       if (isset($this->nmgp_cmp_hidden['nombrecomercial_']) && $this->nmgp_cmp_hidden['nombrecomercial_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nombrecomercial_']);
           $sStyleHidden_nombrecomercial_ = 'display: none;';
       }
       $bTestReadOnly_nombrecomercial_ = true;
       $sStyleReadLab_nombrecomercial_ = 'display: none;';
       $sStyleReadInp_nombrecomercial_ = '';
       if (isset($this->nmgp_cmp_readonly['nombrecomercial_']) && $this->nmgp_cmp_readonly['nombrecomercial_'] == 'on')
       {
           $bTestReadOnly_nombrecomercial_ = false;
           unset($this->nmgp_cmp_readonly['nombrecomercial_']);
           $sStyleReadLab_nombrecomercial_ = '';
           $sStyleReadInp_nombrecomercial_ = 'display: none;';
       }
       $this->coddoc_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['coddoc_']; 
       $coddoc_ = $this->coddoc_; 
       $sStyleHidden_coddoc_ = '';
       if (isset($sCheckRead_coddoc_))
       {
           unset($sCheckRead_coddoc_);
       }
       if (isset($this->nmgp_cmp_readonly['coddoc_']))
       {
           $sCheckRead_coddoc_ = $this->nmgp_cmp_readonly['coddoc_'];
       }
       if (isset($this->nmgp_cmp_hidden['coddoc_']) && $this->nmgp_cmp_hidden['coddoc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['coddoc_']);
           $sStyleHidden_coddoc_ = 'display: none;';
       }
       $bTestReadOnly_coddoc_ = true;
       $sStyleReadLab_coddoc_ = 'display: none;';
       $sStyleReadInp_coddoc_ = '';
       if (isset($this->nmgp_cmp_readonly['coddoc_']) && $this->nmgp_cmp_readonly['coddoc_'] == 'on')
       {
           $bTestReadOnly_coddoc_ = false;
           unset($this->nmgp_cmp_readonly['coddoc_']);
           $sStyleReadLab_coddoc_ = '';
           $sStyleReadInp_coddoc_ = 'display: none;';
       }
       $this->razonsocial_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['razonsocial_']; 
       $razonsocial_ = $this->razonsocial_; 
       $sStyleHidden_razonsocial_ = '';
       if (isset($sCheckRead_razonsocial_))
       {
           unset($sCheckRead_razonsocial_);
       }
       if (isset($this->nmgp_cmp_readonly['razonsocial_']))
       {
           $sCheckRead_razonsocial_ = $this->nmgp_cmp_readonly['razonsocial_'];
       }
       if (isset($this->nmgp_cmp_hidden['razonsocial_']) && $this->nmgp_cmp_hidden['razonsocial_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['razonsocial_']);
           $sStyleHidden_razonsocial_ = 'display: none;';
       }
       $bTestReadOnly_razonsocial_ = true;
       $sStyleReadLab_razonsocial_ = 'display: none;';
       $sStyleReadInp_razonsocial_ = '';
       if (isset($this->nmgp_cmp_readonly['razonsocial_']) && $this->nmgp_cmp_readonly['razonsocial_'] == 'on')
       {
           $bTestReadOnly_razonsocial_ = false;
           unset($this->nmgp_cmp_readonly['razonsocial_']);
           $sStyleReadLab_razonsocial_ = '';
           $sStyleReadInp_razonsocial_ = 'display: none;';
       }
       $this->rfid_estado_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['rfid_estado_']; 
       $rfid_estado_ = $this->rfid_estado_; 
       $sStyleHidden_rfid_estado_ = '';
       if (isset($sCheckRead_rfid_estado_))
       {
           unset($sCheckRead_rfid_estado_);
       }
       if (isset($this->nmgp_cmp_readonly['rfid_estado_']))
       {
           $sCheckRead_rfid_estado_ = $this->nmgp_cmp_readonly['rfid_estado_'];
       }
       if (isset($this->nmgp_cmp_hidden['rfid_estado_']) && $this->nmgp_cmp_hidden['rfid_estado_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['rfid_estado_']);
           $sStyleHidden_rfid_estado_ = 'display: none;';
       }
       $bTestReadOnly_rfid_estado_ = true;
       $sStyleReadLab_rfid_estado_ = 'display: none;';
       $sStyleReadInp_rfid_estado_ = '';
       if (isset($this->nmgp_cmp_readonly['rfid_estado_']) && $this->nmgp_cmp_readonly['rfid_estado_'] == 'on')
       {
           $bTestReadOnly_rfid_estado_ = false;
           unset($this->nmgp_cmp_readonly['rfid_estado_']);
           $sStyleReadLab_rfid_estado_ = '';
           $sStyleReadInp_rfid_estado_ = 'display: none;';
       }
       $this->rfid_fecha_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['rfid_fecha_'] . ' ' . $this->form_vert_form_pos_factura[$sc_seq_vert]['rfid_fecha__hora']; 
       $rfid_fecha_ = $this->rfid_fecha_; 
       $sStyleHidden_rfid_fecha_ = '';
       if (isset($sCheckRead_rfid_fecha_))
       {
           unset($sCheckRead_rfid_fecha_);
       }
       if (isset($this->nmgp_cmp_readonly['rfid_fecha_']))
       {
           $sCheckRead_rfid_fecha_ = $this->nmgp_cmp_readonly['rfid_fecha_'];
       }
       if (isset($this->nmgp_cmp_hidden['rfid_fecha_']) && $this->nmgp_cmp_hidden['rfid_fecha_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['rfid_fecha_']);
           $sStyleHidden_rfid_fecha_ = 'display: none;';
       }
       $bTestReadOnly_rfid_fecha_ = true;
       $sStyleReadLab_rfid_fecha_ = 'display: none;';
       $sStyleReadInp_rfid_fecha_ = '';
       if (isset($this->nmgp_cmp_readonly['rfid_fecha_']) && $this->nmgp_cmp_readonly['rfid_fecha_'] == 'on')
       {
           $bTestReadOnly_rfid_fecha_ = false;
           unset($this->nmgp_cmp_readonly['rfid_fecha_']);
           $sStyleReadLab_rfid_fecha_ = '';
           $sStyleReadInp_rfid_fecha_ = 'display: none;';
       }
       $this->rfid_read_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['rfid_read_']; 
       $rfid_read_ = $this->rfid_read_; 
       $sStyleHidden_rfid_read_ = '';
       if (isset($sCheckRead_rfid_read_))
       {
           unset($sCheckRead_rfid_read_);
       }
       if (isset($this->nmgp_cmp_readonly['rfid_read_']))
       {
           $sCheckRead_rfid_read_ = $this->nmgp_cmp_readonly['rfid_read_'];
       }
       if (isset($this->nmgp_cmp_hidden['rfid_read_']) && $this->nmgp_cmp_hidden['rfid_read_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['rfid_read_']);
           $sStyleHidden_rfid_read_ = 'display: none;';
       }
       $bTestReadOnly_rfid_read_ = true;
       $sStyleReadLab_rfid_read_ = 'display: none;';
       $sStyleReadInp_rfid_read_ = '';
       if (isset($this->nmgp_cmp_readonly['rfid_read_']) && $this->nmgp_cmp_readonly['rfid_read_'] == 'on')
       {
           $bTestReadOnly_rfid_read_ = false;
           unset($this->nmgp_cmp_readonly['rfid_read_']);
           $sStyleReadLab_rfid_read_ = '';
           $sStyleReadInp_rfid_read_ = 'display: none;';
       }
       $this->ult_rfid_ = $this->form_vert_form_pos_factura[$sc_seq_vert]['ult_rfid_']; 
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_pos_factura_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_pos_factura_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_pos_factura_add_new_line('S', " . $sc_seq_vert . ")", "do_ajax_form_pos_factura_add_new_line('S', " . $sc_seq_vert . ")", "sc_clone_line_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_pos_factura_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_pos_factura_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_pos_factura_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_pos_factura_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['numcaja_']) && $this->nmgp_cmp_hidden['numcaja_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numcaja_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numcaja_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_numcaja__line" id="hidden_field_data_numcaja_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_numcaja_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_numcaja__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_numcaja_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["numcaja_"]) &&  $this->nmgp_cmp_readonly["numcaja_"] == "on")) { 

 ?>
<input type="hidden" name="numcaja_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numcaja_) . "\"><span id=\"id_ajax_label_numcaja_" . $sc_seq_vert . "\">" . $numcaja_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_numcaja_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-numcaja_<?php echo $sc_seq_vert ?> css_numcaja__line" style="<?php echo $sStyleReadLab_numcaja_; ?>"><?php echo $this->form_format_readonly("numcaja_", $this->form_encode_input($this->numcaja_)); ?></span><span id="id_read_off_numcaja_<?php echo $sc_seq_vert ?>" class="css_read_off_numcaja_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numcaja_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_numcaja__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numcaja_<?php echo $sc_seq_vert ?>" type=text name="numcaja_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numcaja_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['numcaja_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['numcaja_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numcaja_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numcaja_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numcaja_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['serie_']) && $this->nmgp_cmp_hidden['serie_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="serie_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($serie_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_serie__line" id="hidden_field_data_serie_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_serie_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_serie__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_serie_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["serie_"]) &&  $this->nmgp_cmp_readonly["serie_"] == "on") { 

 ?>
<input type="hidden" name="serie_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($serie_) . "\">" . $serie_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_serie_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-serie_<?php echo $sc_seq_vert ?> css_serie__line" style="<?php echo $sStyleReadLab_serie_; ?>"><?php echo $this->form_format_readonly("serie_", $this->form_encode_input($this->serie_)); ?></span><span id="id_read_off_serie_<?php echo $sc_seq_vert ?>" class="css_read_off_serie_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_serie_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_serie__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_serie_<?php echo $sc_seq_vert ?>" type=text name="serie_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($serie_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_serie_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_serie_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_numero__line" id="hidden_field_data_numero_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_numero_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_numero__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_numero_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_"]) &&  $this->nmgp_cmp_readonly["numero_"] == "on") { 

 ?>
<input type="hidden" name="numero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_) . "\">" . $numero_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-numero_<?php echo $sc_seq_vert ?> css_numero__line" style="<?php echo $sStyleReadLab_numero_; ?>"><?php echo $this->form_format_readonly("numero_", $this->form_encode_input($this->numero_)); ?></span><span id="id_read_off_numero_<?php echo $sc_seq_vert ?>" class="css_read_off_numero_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_numero__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numero_<?php echo $sc_seq_vert ?>" type=text name="numero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['numero_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['numero_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numero_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['prodentrega_']) && $this->nmgp_cmp_hidden['prodentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="prodentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prodentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_prodentrega__line" id="hidden_field_data_prodentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_prodentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_prodentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_prodentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["prodentrega_"]) &&  $this->nmgp_cmp_readonly["prodentrega_"] == "on") { 

 ?>
<input type="hidden" name="prodentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prodentrega_) . "\">" . $prodentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_prodentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-prodentrega_<?php echo $sc_seq_vert ?> css_prodentrega__line" style="<?php echo $sStyleReadLab_prodentrega_; ?>"><?php echo $this->form_format_readonly("prodentrega_", $this->form_encode_input($this->prodentrega_)); ?></span><span id="id_read_off_prodentrega_<?php echo $sc_seq_vert ?>" class="css_read_off_prodentrega_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_prodentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_prodentrega__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_prodentrega_<?php echo $sc_seq_vert ?>" type=text name="prodentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($prodentrega_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['prodentrega_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['prodentrega_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['prodentrega_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_prodentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_prodentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['estab_']) && $this->nmgp_cmp_hidden['estab_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estab_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estab_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_estab__line" id="hidden_field_data_estab_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_estab_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_estab__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_estab_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estab_"]) &&  $this->nmgp_cmp_readonly["estab_"] == "on") { 

 ?>
<input type="hidden" name="estab_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estab_) . "\">" . $estab_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_estab_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-estab_<?php echo $sc_seq_vert ?> css_estab__line" style="<?php echo $sStyleReadLab_estab_; ?>"><?php echo $this->form_format_readonly("estab_", $this->form_encode_input($this->estab_)); ?></span><span id="id_read_off_estab_<?php echo $sc_seq_vert ?>" class="css_read_off_estab_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estab_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_estab__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_estab_<?php echo $sc_seq_vert ?>" type=text name="estab_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estab_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estab_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estab_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ptoemi_']) && $this->nmgp_cmp_hidden['ptoemi_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ptoemi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ptoemi_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ptoemi__line" id="hidden_field_data_ptoemi_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ptoemi_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ptoemi__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ptoemi_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ptoemi_"]) &&  $this->nmgp_cmp_readonly["ptoemi_"] == "on") { 

 ?>
<input type="hidden" name="ptoemi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ptoemi_) . "\">" . $ptoemi_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ptoemi_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ptoemi_<?php echo $sc_seq_vert ?> css_ptoemi__line" style="<?php echo $sStyleReadLab_ptoemi_; ?>"><?php echo $this->form_format_readonly("ptoemi_", $this->form_encode_input($this->ptoemi_)); ?></span><span id="id_read_off_ptoemi_<?php echo $sc_seq_vert ?>" class="css_read_off_ptoemi_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ptoemi_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ptoemi__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_ptoemi_<?php echo $sc_seq_vert ?>" type=text name="ptoemi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ptoemi_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=4"; } ?> maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ptoemi_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ptoemi_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['direstablecimiento_']) && $this->nmgp_cmp_hidden['direstablecimiento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="direstablecimiento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($direstablecimiento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_direstablecimiento__line" id="hidden_field_data_direstablecimiento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_direstablecimiento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_direstablecimiento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_direstablecimiento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["direstablecimiento_"]) &&  $this->nmgp_cmp_readonly["direstablecimiento_"] == "on") { 

 ?>
<input type="hidden" name="direstablecimiento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($direstablecimiento_) . "\">" . $direstablecimiento_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_direstablecimiento_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-direstablecimiento_<?php echo $sc_seq_vert ?> css_direstablecimiento__line" style="<?php echo $sStyleReadLab_direstablecimiento_; ?>"><?php echo $this->form_format_readonly("direstablecimiento_", $this->form_encode_input($this->direstablecimiento_)); ?></span><span id="id_read_off_direstablecimiento_<?php echo $sc_seq_vert ?>" class="css_read_off_direstablecimiento_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_direstablecimiento_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_direstablecimiento__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_direstablecimiento_<?php echo $sc_seq_vert ?>" type=text name="direstablecimiento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($direstablecimiento_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_direstablecimiento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_direstablecimiento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipoambiente_']) && $this->nmgp_cmp_hidden['tipoambiente_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipoambiente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipoambiente_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipoambiente__line" id="hidden_field_data_tipoambiente_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipoambiente_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipoambiente__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipoambiente_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipoambiente_"]) &&  $this->nmgp_cmp_readonly["tipoambiente_"] == "on") { 

 ?>
<input type="hidden" name="tipoambiente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipoambiente_) . "\">" . $tipoambiente_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipoambiente_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tipoambiente_<?php echo $sc_seq_vert ?> css_tipoambiente__line" style="<?php echo $sStyleReadLab_tipoambiente_; ?>"><?php echo $this->form_format_readonly("tipoambiente_", $this->form_encode_input($this->tipoambiente_)); ?></span><span id="id_read_off_tipoambiente_<?php echo $sc_seq_vert ?>" class="css_read_off_tipoambiente_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipoambiente_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tipoambiente__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipoambiente_<?php echo $sc_seq_vert ?>" type=text name="tipoambiente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipoambiente_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipoambiente_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipoambiente_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipoemision_']) && $this->nmgp_cmp_hidden['tipoemision_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipoemision_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipoemision_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipoemision__line" id="hidden_field_data_tipoemision_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipoemision_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipoemision__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipoemision_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipoemision_"]) &&  $this->nmgp_cmp_readonly["tipoemision_"] == "on") { 

 ?>
<input type="hidden" name="tipoemision_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipoemision_) . "\">" . $tipoemision_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipoemision_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tipoemision_<?php echo $sc_seq_vert ?> css_tipoemision__line" style="<?php echo $sStyleReadLab_tipoemision_; ?>"><?php echo $this->form_format_readonly("tipoemision_", $this->form_encode_input($this->tipoemision_)); ?></span><span id="id_read_off_tipoemision_<?php echo $sc_seq_vert ?>" class="css_read_off_tipoemision_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipoemision_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tipoemision__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipoemision_<?php echo $sc_seq_vert ?>" type=text name="tipoemision_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipoemision_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipoemision_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipoemision_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['rucem_']) && $this->nmgp_cmp_hidden['rucem_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rucem_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rucem_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_rucem__line" id="hidden_field_data_rucem_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_rucem_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_rucem__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_rucem_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rucem_"]) &&  $this->nmgp_cmp_readonly["rucem_"] == "on") { 

 ?>
<input type="hidden" name="rucem_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rucem_) . "\">" . $rucem_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_rucem_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-rucem_<?php echo $sc_seq_vert ?> css_rucem__line" style="<?php echo $sStyleReadLab_rucem_; ?>"><?php echo $this->form_format_readonly("rucem_", $this->form_encode_input($this->rucem_)); ?></span><span id="id_read_off_rucem_<?php echo $sc_seq_vert ?>" class="css_read_off_rucem_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rucem_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_rucem__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rucem_<?php echo $sc_seq_vert ?>" type=text name="rucem_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rucem_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rucem_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rucem_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dirmatriz_']) && $this->nmgp_cmp_hidden['dirmatriz_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dirmatriz_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dirmatriz_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dirmatriz__line" id="hidden_field_data_dirmatriz_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dirmatriz_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dirmatriz__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dirmatriz_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dirmatriz_"]) &&  $this->nmgp_cmp_readonly["dirmatriz_"] == "on") { 

 ?>
<input type="hidden" name="dirmatriz_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dirmatriz_) . "\">" . $dirmatriz_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dirmatriz_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dirmatriz_<?php echo $sc_seq_vert ?> css_dirmatriz__line" style="<?php echo $sStyleReadLab_dirmatriz_; ?>"><?php echo $this->form_format_readonly("dirmatriz_", $this->form_encode_input($this->dirmatriz_)); ?></span><span id="id_read_off_dirmatriz_<?php echo $sc_seq_vert ?>" class="css_read_off_dirmatriz_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dirmatriz_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dirmatriz__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_dirmatriz_<?php echo $sc_seq_vert ?>" type=text name="dirmatriz_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dirmatriz_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dirmatriz_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dirmatriz_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nombrecomercial_']) && $this->nmgp_cmp_hidden['nombrecomercial_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nombrecomercial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombrecomercial_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nombrecomercial__line" id="hidden_field_data_nombrecomercial_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nombrecomercial_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nombrecomercial__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nombrecomercial_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nombrecomercial_"]) &&  $this->nmgp_cmp_readonly["nombrecomercial_"] == "on") { 

 ?>
<input type="hidden" name="nombrecomercial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombrecomercial_) . "\">" . $nombrecomercial_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nombrecomercial_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nombrecomercial_<?php echo $sc_seq_vert ?> css_nombrecomercial__line" style="<?php echo $sStyleReadLab_nombrecomercial_; ?>"><?php echo $this->form_format_readonly("nombrecomercial_", $this->form_encode_input($this->nombrecomercial_)); ?></span><span id="id_read_off_nombrecomercial_<?php echo $sc_seq_vert ?>" class="css_read_off_nombrecomercial_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nombrecomercial_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nombrecomercial__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nombrecomercial_<?php echo $sc_seq_vert ?>" type=text name="nombrecomercial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nombrecomercial_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nombrecomercial_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nombrecomercial_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['coddoc_']) && $this->nmgp_cmp_hidden['coddoc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="coddoc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($coddoc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_coddoc__line" id="hidden_field_data_coddoc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_coddoc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_coddoc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_coddoc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["coddoc_"]) &&  $this->nmgp_cmp_readonly["coddoc_"] == "on") { 

 ?>
<input type="hidden" name="coddoc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($coddoc_) . "\">" . $coddoc_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_coddoc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-coddoc_<?php echo $sc_seq_vert ?> css_coddoc__line" style="<?php echo $sStyleReadLab_coddoc_; ?>"><?php echo $this->form_format_readonly("coddoc_", $this->form_encode_input($this->coddoc_)); ?></span><span id="id_read_off_coddoc_<?php echo $sc_seq_vert ?>" class="css_read_off_coddoc_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_coddoc_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_coddoc__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_coddoc_<?php echo $sc_seq_vert ?>" type=text name="coddoc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($coddoc_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=2"; } ?> maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_coddoc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_coddoc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['razonsocial_']) && $this->nmgp_cmp_hidden['razonsocial_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razonsocial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($razonsocial_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_razonsocial__line" id="hidden_field_data_razonsocial_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_razonsocial_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_razonsocial__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_razonsocial_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razonsocial_"]) &&  $this->nmgp_cmp_readonly["razonsocial_"] == "on") { 

 ?>
<input type="hidden" name="razonsocial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($razonsocial_) . "\">" . $razonsocial_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_razonsocial_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-razonsocial_<?php echo $sc_seq_vert ?> css_razonsocial__line" style="<?php echo $sStyleReadLab_razonsocial_; ?>"><?php echo $this->form_format_readonly("razonsocial_", $this->form_encode_input($this->razonsocial_)); ?></span><span id="id_read_off_razonsocial_<?php echo $sc_seq_vert ?>" class="css_read_off_razonsocial_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_razonsocial_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_razonsocial__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_razonsocial_<?php echo $sc_seq_vert ?>" type=text name="razonsocial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($razonsocial_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razonsocial_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razonsocial_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['rfid_estado_']) && $this->nmgp_cmp_hidden['rfid_estado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rfid_estado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rfid_estado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_rfid_estado__line" id="hidden_field_data_rfid_estado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_rfid_estado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_rfid_estado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_rfid_estado_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rfid_estado_"]) &&  $this->nmgp_cmp_readonly["rfid_estado_"] == "on") { 

 ?>
<input type="hidden" name="rfid_estado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rfid_estado_) . "\">" . $rfid_estado_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_rfid_estado_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-rfid_estado_<?php echo $sc_seq_vert ?> css_rfid_estado__line" style="<?php echo $sStyleReadLab_rfid_estado_; ?>"><?php echo $this->form_format_readonly("rfid_estado_", $this->form_encode_input($this->rfid_estado_)); ?></span><span id="id_read_off_rfid_estado_<?php echo $sc_seq_vert ?>" class="css_read_off_rfid_estado_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rfid_estado_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_rfid_estado__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rfid_estado_<?php echo $sc_seq_vert ?>" type=text name="rfid_estado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rfid_estado_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rfid_estado_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rfid_estado_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rfid_estado_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rfid_estado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rfid_estado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['rfid_fecha_']) && $this->nmgp_cmp_hidden['rfid_fecha_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rfid_fecha_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rfid_fecha_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_rfid_fecha__line" id="hidden_field_data_rfid_fecha_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_rfid_fecha_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_rfid_fecha__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_rfid_fecha_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rfid_fecha_"]) &&  $this->nmgp_cmp_readonly["rfid_fecha_"] == "on") { 

 ?>
<input type="hidden" name="rfid_fecha_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rfid_fecha_) . "\">" . $rfid_fecha_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_rfid_fecha_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-rfid_fecha_<?php echo $sc_seq_vert ?> css_rfid_fecha__line" style="<?php echo $sStyleReadLab_rfid_fecha_; ?>"><?php echo $this->form_format_readonly("rfid_fecha_", $this->form_encode_input($rfid_fecha_)); ?></span><span id="id_read_off_rfid_fecha_<?php echo $sc_seq_vert ?>" class="css_read_off_rfid_fecha_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rfid_fecha_; ?>"><?php
$tmp_form_data = $this->field_config['rfid_fecha_']['date_format'];
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

 <input class="sc-js-input scFormObjectOddMult css_rfid_fecha__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rfid_fecha_<?php echo $sc_seq_vert ?>" type=text name="rfid_fecha_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rfid_fecha_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['rfid_fecha_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['rfid_fecha_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['rfid_fecha_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rfid_fecha_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rfid_fecha_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->rfid_fecha_ = $old_dt_rfid_fecha_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['rfid_read_']) && $this->nmgp_cmp_hidden['rfid_read_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rfid_read_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rfid_read_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_rfid_read__line" id="hidden_field_data_rfid_read_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_rfid_read_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_rfid_read__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_rfid_read_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rfid_read_"]) &&  $this->nmgp_cmp_readonly["rfid_read_"] == "on") { 

 ?>
<input type="hidden" name="rfid_read_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rfid_read_) . "\">" . $rfid_read_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_rfid_read_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-rfid_read_<?php echo $sc_seq_vert ?> css_rfid_read__line" style="<?php echo $sStyleReadLab_rfid_read_; ?>"><?php echo $this->form_format_readonly("rfid_read_", $this->form_encode_input($this->rfid_read_)); ?></span><span id="id_read_off_rfid_read_<?php echo $sc_seq_vert ?>" class="css_read_off_rfid_read_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rfid_read_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_rfid_read__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rfid_read_<?php echo $sc_seq_vert ?>" type=text name="rfid_read_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rfid_read_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rfid_read_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rfid_read_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ult_rfid_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ult_rfid_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_numcaja_))
       {
           $this->nmgp_cmp_readonly['numcaja_'] = $sCheckRead_numcaja_;
       }
       if ('display: none;' == $sStyleHidden_numcaja_)
       {
           $this->nmgp_cmp_hidden['numcaja_'] = 'off';
       }
       if (isset($sCheckRead_serie_))
       {
           $this->nmgp_cmp_readonly['serie_'] = $sCheckRead_serie_;
       }
       if ('display: none;' == $sStyleHidden_serie_)
       {
           $this->nmgp_cmp_hidden['serie_'] = 'off';
       }
       if (isset($sCheckRead_numero_))
       {
           $this->nmgp_cmp_readonly['numero_'] = $sCheckRead_numero_;
       }
       if ('display: none;' == $sStyleHidden_numero_)
       {
           $this->nmgp_cmp_hidden['numero_'] = 'off';
       }
       if (isset($sCheckRead_prodentrega_))
       {
           $this->nmgp_cmp_readonly['prodentrega_'] = $sCheckRead_prodentrega_;
       }
       if ('display: none;' == $sStyleHidden_prodentrega_)
       {
           $this->nmgp_cmp_hidden['prodentrega_'] = 'off';
       }
       if (isset($sCheckRead_estab_))
       {
           $this->nmgp_cmp_readonly['estab_'] = $sCheckRead_estab_;
       }
       if ('display: none;' == $sStyleHidden_estab_)
       {
           $this->nmgp_cmp_hidden['estab_'] = 'off';
       }
       if (isset($sCheckRead_ptoemi_))
       {
           $this->nmgp_cmp_readonly['ptoemi_'] = $sCheckRead_ptoemi_;
       }
       if ('display: none;' == $sStyleHidden_ptoemi_)
       {
           $this->nmgp_cmp_hidden['ptoemi_'] = 'off';
       }
       if (isset($sCheckRead_direstablecimiento_))
       {
           $this->nmgp_cmp_readonly['direstablecimiento_'] = $sCheckRead_direstablecimiento_;
       }
       if ('display: none;' == $sStyleHidden_direstablecimiento_)
       {
           $this->nmgp_cmp_hidden['direstablecimiento_'] = 'off';
       }
       if (isset($sCheckRead_tipoambiente_))
       {
           $this->nmgp_cmp_readonly['tipoambiente_'] = $sCheckRead_tipoambiente_;
       }
       if ('display: none;' == $sStyleHidden_tipoambiente_)
       {
           $this->nmgp_cmp_hidden['tipoambiente_'] = 'off';
       }
       if (isset($sCheckRead_tipoemision_))
       {
           $this->nmgp_cmp_readonly['tipoemision_'] = $sCheckRead_tipoemision_;
       }
       if ('display: none;' == $sStyleHidden_tipoemision_)
       {
           $this->nmgp_cmp_hidden['tipoemision_'] = 'off';
       }
       if (isset($sCheckRead_rucem_))
       {
           $this->nmgp_cmp_readonly['rucem_'] = $sCheckRead_rucem_;
       }
       if ('display: none;' == $sStyleHidden_rucem_)
       {
           $this->nmgp_cmp_hidden['rucem_'] = 'off';
       }
       if (isset($sCheckRead_dirmatriz_))
       {
           $this->nmgp_cmp_readonly['dirmatriz_'] = $sCheckRead_dirmatriz_;
       }
       if ('display: none;' == $sStyleHidden_dirmatriz_)
       {
           $this->nmgp_cmp_hidden['dirmatriz_'] = 'off';
       }
       if (isset($sCheckRead_nombrecomercial_))
       {
           $this->nmgp_cmp_readonly['nombrecomercial_'] = $sCheckRead_nombrecomercial_;
       }
       if ('display: none;' == $sStyleHidden_nombrecomercial_)
       {
           $this->nmgp_cmp_hidden['nombrecomercial_'] = 'off';
       }
       if (isset($sCheckRead_coddoc_))
       {
           $this->nmgp_cmp_readonly['coddoc_'] = $sCheckRead_coddoc_;
       }
       if ('display: none;' == $sStyleHidden_coddoc_)
       {
           $this->nmgp_cmp_hidden['coddoc_'] = 'off';
       }
       if (isset($sCheckRead_razonsocial_))
       {
           $this->nmgp_cmp_readonly['razonsocial_'] = $sCheckRead_razonsocial_;
       }
       if ('display: none;' == $sStyleHidden_razonsocial_)
       {
           $this->nmgp_cmp_hidden['razonsocial_'] = 'off';
       }
       if (isset($sCheckRead_rfid_estado_))
       {
           $this->nmgp_cmp_readonly['rfid_estado_'] = $sCheckRead_rfid_estado_;
       }
       if ('display: none;' == $sStyleHidden_rfid_estado_)
       {
           $this->nmgp_cmp_hidden['rfid_estado_'] = 'off';
       }
       if (isset($sCheckRead_rfid_fecha_))
       {
           $this->nmgp_cmp_readonly['rfid_fecha_'] = $sCheckRead_rfid_fecha_;
       }
       if ('display: none;' == $sStyleHidden_rfid_fecha_)
       {
           $this->nmgp_cmp_hidden['rfid_fecha_'] = 'off';
       }
       if (isset($sCheckRead_rfid_read_))
       {
           $this->nmgp_cmp_readonly['rfid_read_'] = $sCheckRead_rfid_read_;
       }
       if ('display: none;' == $sStyleHidden_rfid_read_)
       {
           $this->nmgp_cmp_hidden['rfid_read_'] = 'off';
       }
       if (isset($sCheckRead_ult_rfid_))
       {
           $this->nmgp_cmp_readonly['ult_rfid_'] = $sCheckRead_ult_rfid_;
       }
       if ('display: none;' == $sStyleHidden_ult_rfid_)
       {
           $this->nmgp_cmp_hidden['ult_rfid_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_pos_factura = $guarda_form_vert_form_pos_factura;
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
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
$this->displayBottomToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['birpara'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['first'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['back'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['forward'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_pos_factura");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_pos_factura");
 parent.scAjaxDetailHeight("form_pos_factura", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_pos_factura", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_pos_factura", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['sc_modal'])
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
			do_ajax_form_pos_factura_add_new_line(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_pos_factura']['buttonStatus'] = $this->nmgp_botoes;
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
