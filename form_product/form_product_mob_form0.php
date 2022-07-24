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
.css_read_off_dateproduct button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_ultfechaventa button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_product/form_product_mob_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_product_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['last'] : 'off'); ?>";
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

include_once('form_product_mob_jquery.php');

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
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_product_combo", "400");
    }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_product']['error_buffer']) && '' != $_SESSION['scriptcase']['form_product']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_product']['error_buffer'];
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
 include_once("form_product_mob_js0.php");
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
<form  name="F1" method="post" enctype="multipart/form-data" 
               action="form_product_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['insert_validation']; ?>">
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="id_product" value="<?php  echo $this->form_encode_input($this->id_product) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_product_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_product_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['fast_search'][2] : "";
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
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['copy']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['copy']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['copy']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['copy']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['copy'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "scBtnFn_sys_format_copy()", "scBtnFn_sys_format_copy()", "sc_b_clone_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + C)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-16';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-17';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['insert'];
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
        $buttonMacroDisabled = 'sc-unique-btn-18';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-19';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['update'];
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

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><input type="hidden" name="image_ul_name" id="id_sc_field_image_ul_name" value="<?php echo $this->form_encode_input($this->image_ul_name);?>">
<input type="hidden" name="image_ul_type" id="id_sc_field_image_ul_type" value="<?php echo $this->form_encode_input($this->image_ul_type);?>">
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['product_name']))
    {
        $this->nm_new_label['product_name'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_name'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $product_name = $this->product_name;
   $sStyleHidden_product_name = '';
   if (isset($this->nmgp_cmp_hidden['product_name']) && $this->nmgp_cmp_hidden['product_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['product_name']);
       $sStyleHidden_product_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_product_name = 'display: none;';
   $sStyleReadInp_product_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['product_name']) && $this->nmgp_cmp_readonly['product_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['product_name']);
       $sStyleReadLab_product_name = '';
       $sStyleReadInp_product_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['product_name']) && $this->nmgp_cmp_hidden['product_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="product_name" value="<?php echo $this->form_encode_input($product_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_product_name_line" id="hidden_field_data_product_name" style="<?php echo $sStyleHidden_product_name; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_product_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_product_name_label" style=""><span id="id_label_product_name"><?php echo $this->nm_new_label['product_name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['php_cmp_required']['product_name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['php_cmp_required']['product_name'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["product_name"]) &&  $this->nmgp_cmp_readonly["product_name"] == "on") { 

 ?>
<input type="hidden" name="product_name" value="<?php echo $this->form_encode_input($product_name) . "\">" . $product_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_product_name" class="sc-ui-readonly-product_name css_product_name_line" style="<?php echo $sStyleReadLab_product_name; ?>"><?php echo $this->form_format_readonly("product_name", $this->form_encode_input($this->product_name)); ?></span><span id="id_read_off_product_name" class="css_read_off_product_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_product_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_product_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_product_name" type=text name="product_name" value="<?php echo $this->form_encode_input($product_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_product_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_product_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_category']))
   {
       $this->nm_new_label['id_category'] = "" . $this->Ini->Nm_lang['lang_product_fld_id_category'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_category = $this->id_category;
   $sStyleHidden_id_category = '';
   if (isset($this->nmgp_cmp_hidden['id_category']) && $this->nmgp_cmp_hidden['id_category'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_category']);
       $sStyleHidden_id_category = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_category = 'display: none;';
   $sStyleReadInp_id_category = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_category']) && $this->nmgp_cmp_readonly['id_category'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_category']);
       $sStyleReadLab_id_category = '';
       $sStyleReadInp_id_category = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_category']) && $this->nmgp_cmp_hidden['id_category'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_category" value="<?php echo $this->form_encode_input($this->id_category) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_category_line" id="hidden_field_data_id_category" style="<?php echo $sStyleHidden_id_category; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_category_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_category_label" style=""><span id="id_label_id_category"><?php echo $this->nm_new_label['id_category']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['php_cmp_required']['id_category']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['php_cmp_required']['id_category'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_category"]) &&  $this->nmgp_cmp_readonly["id_category"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_category']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_category'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_category']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_category'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_category']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_category'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_category']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_category'] = array(); 
    }

   $old_value_dateproduct = $this->dateproduct;
   $old_value_dateproduct_hora = $this->dateproduct_hora;
   $old_value_product_cost = $this->product_cost;
   $old_value_stock = $this->stock;
   $old_value_poriva = $this->poriva;
   $old_value_product_value = $this->product_value;
   $old_value_discount = $this->discount;
   $old_value_precioventa = $this->precioventa;
   $old_value_orden = $this->orden;
   $old_value_minutos = $this->minutos;
   $old_value_tokens = $this->tokens;
   $old_value_score = $this->score;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct = $this->dateproduct;
   $unformatted_value_dateproduct_hora = $this->dateproduct_hora;
   $unformatted_value_product_cost = $this->product_cost;
   $unformatted_value_stock = $this->stock;
   $unformatted_value_poriva = $this->poriva;
   $unformatted_value_product_value = $this->product_value;
   $unformatted_value_discount = $this->discount;
   $unformatted_value_precioventa = $this->precioventa;
   $unformatted_value_orden = $this->orden;
   $unformatted_value_minutos = $this->minutos;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_score = $this->score;

   $nm_comando = "SELECT id_category, category  FROM category  ORDER BY category";

   $this->dateproduct = $old_value_dateproduct;
   $this->dateproduct_hora = $old_value_dateproduct_hora;
   $this->product_cost = $old_value_product_cost;
   $this->stock = $old_value_stock;
   $this->poriva = $old_value_poriva;
   $this->product_value = $old_value_product_value;
   $this->discount = $old_value_discount;
   $this->precioventa = $old_value_precioventa;
   $this->orden = $old_value_orden;
   $this->minutos = $old_value_minutos;
   $this->tokens = $old_value_tokens;
   $this->score = $old_value_score;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_category'][] = $rs->fields[0];
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
   $id_category_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_category_1))
          {
              foreach ($this->id_category_1 as $tmp_id_category)
              {
                  if (trim($tmp_id_category) === trim($cadaselect[1])) { $id_category_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_category) === trim($cadaselect[1])) { $id_category_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_category" value="<?php echo $this->form_encode_input($id_category) . "\">" . $id_category_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_category();
   $x = 0 ; 
   $id_category_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_category_1))
          {
              foreach ($this->id_category_1 as $tmp_id_category)
              {
                  if (trim($tmp_id_category) === trim($cadaselect[1])) { $id_category_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_category) === trim($cadaselect[1])) { $id_category_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_category_look))
          {
              $id_category_look = $this->id_category;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_category\" class=\"css_id_category_line\" style=\"" .  $sStyleReadLab_id_category . "\">" . $this->form_format_readonly("id_category", $this->form_encode_input($id_category_look)) . "</span><span id=\"id_read_off_id_category\" class=\"css_read_off_id_category" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_category . "\">";
   echo " <span id=\"idAjaxSelect_id_category\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_category_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_category\" name=\"id_category\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_category) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_category)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_category_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_category_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['product_code']))
    {
        $this->nm_new_label['product_code'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_code'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $product_code = $this->product_code;
   $sStyleHidden_product_code = '';
   if (isset($this->nmgp_cmp_hidden['product_code']) && $this->nmgp_cmp_hidden['product_code'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['product_code']);
       $sStyleHidden_product_code = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_product_code = 'display: none;';
   $sStyleReadInp_product_code = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['product_code']) && $this->nmgp_cmp_readonly['product_code'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['product_code']);
       $sStyleReadLab_product_code = '';
       $sStyleReadInp_product_code = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['product_code']) && $this->nmgp_cmp_hidden['product_code'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="product_code" value="<?php echo $this->form_encode_input($product_code) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_product_code_line" id="hidden_field_data_product_code" style="<?php echo $sStyleHidden_product_code; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_product_code_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_product_code_label" style=""><span id="id_label_product_code"><?php echo $this->nm_new_label['product_code']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['php_cmp_required']['product_code']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['php_cmp_required']['product_code'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["product_code"]) &&  $this->nmgp_cmp_readonly["product_code"] == "on") { 

 ?>
<input type="hidden" name="product_code" value="<?php echo $this->form_encode_input($product_code) . "\">" . $product_code . ""; ?>
<?php } else { ?>
<span id="id_read_on_product_code" class="sc-ui-readonly-product_code css_product_code_line" style="<?php echo $sStyleReadLab_product_code; ?>"><?php echo $this->form_format_readonly("product_code", $this->form_encode_input($this->product_code)); ?></span><span id="id_read_off_product_code" class="css_read_off_product_code<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_product_code; ?>">
 <input class="sc-js-input scFormObjectOdd css_product_code_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_product_code" type=text name="product_code" value="<?php echo $this->form_encode_input($product_code) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_product_code_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_product_code_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dateproduct']))
    {
        $this->nm_new_label['dateproduct'] = "" . $this->Ini->Nm_lang['lang_product_fld_dateproduct'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_dateproduct = $this->dateproduct;
   if (strlen($this->dateproduct_hora) > 8 ) {$this->dateproduct_hora = substr($this->dateproduct_hora, 0, 8);}
   $this->dateproduct .= ' ' . $this->dateproduct_hora;
   $this->dateproduct  = trim($this->dateproduct);
   $dateproduct = $this->dateproduct;
   $sStyleHidden_dateproduct = '';
   if (isset($this->nmgp_cmp_hidden['dateproduct']) && $this->nmgp_cmp_hidden['dateproduct'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dateproduct']);
       $sStyleHidden_dateproduct = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dateproduct = 'display: none;';
   $sStyleReadInp_dateproduct = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dateproduct']) && $this->nmgp_cmp_readonly['dateproduct'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dateproduct']);
       $sStyleReadLab_dateproduct = '';
       $sStyleReadInp_dateproduct = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dateproduct']) && $this->nmgp_cmp_hidden['dateproduct'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dateproduct" value="<?php echo $this->form_encode_input($dateproduct) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_dateproduct_line" id="hidden_field_data_dateproduct" style="<?php echo $sStyleHidden_dateproduct; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dateproduct_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_dateproduct_label" style=""><span id="id_label_dateproduct"><?php echo $this->nm_new_label['dateproduct']; ?></span></span><br><input type="hidden" name="dateproduct" value="<?php echo $this->form_encode_input($dateproduct); ?>"><span id="id_ajax_label_dateproduct"><?php echo nl2br($dateproduct); ?></span>
<?php
$tmp_form_data = $this->field_config['dateproduct']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dateproduct_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dateproduct_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->dateproduct = $old_dt_dateproduct;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['product_cost']))
    {
        $this->nm_new_label['product_cost'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_cost'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $product_cost = $this->product_cost;
   $sStyleHidden_product_cost = '';
   if (isset($this->nmgp_cmp_hidden['product_cost']) && $this->nmgp_cmp_hidden['product_cost'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['product_cost']);
       $sStyleHidden_product_cost = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_product_cost = 'display: none;';
   $sStyleReadInp_product_cost = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['product_cost']) && $this->nmgp_cmp_readonly['product_cost'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['product_cost']);
       $sStyleReadLab_product_cost = '';
       $sStyleReadInp_product_cost = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['product_cost']) && $this->nmgp_cmp_hidden['product_cost'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="product_cost" value="<?php echo $this->form_encode_input($product_cost) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_product_cost_line" id="hidden_field_data_product_cost" style="<?php echo $sStyleHidden_product_cost; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_product_cost_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_product_cost_label" style=""><span id="id_label_product_cost"><?php echo $this->nm_new_label['product_cost']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["product_cost"]) &&  $this->nmgp_cmp_readonly["product_cost"] == "on") { 

 ?>
<input type="hidden" name="product_cost" value="<?php echo $this->form_encode_input($product_cost) . "\">" . $product_cost . ""; ?>
<?php } else { ?>
<span id="id_read_on_product_cost" class="sc-ui-readonly-product_cost css_product_cost_line" style="<?php echo $sStyleReadLab_product_cost; ?>"><?php echo $this->form_format_readonly("product_cost", $this->form_encode_input($this->product_cost)); ?></span><span id="id_read_off_product_cost" class="css_read_off_product_cost<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_product_cost; ?>">
 <input class="sc-js-input scFormObjectOdd css_product_cost_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_product_cost" type=text name="product_cost" value="<?php echo $this->form_encode_input($product_cost) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['product_cost']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['product_cost']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['product_cost']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['product_cost']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_product_cost_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_product_cost_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['stock']))
    {
        $this->nm_new_label['stock'] = "" . $this->Ini->Nm_lang['lang_product_fld_stock'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $stock = $this->stock;
   $sStyleHidden_stock = '';
   if (isset($this->nmgp_cmp_hidden['stock']) && $this->nmgp_cmp_hidden['stock'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['stock']);
       $sStyleHidden_stock = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_stock = 'display: none;';
   $sStyleReadInp_stock = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['stock']) && $this->nmgp_cmp_readonly['stock'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['stock']);
       $sStyleReadLab_stock = '';
       $sStyleReadInp_stock = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['stock']) && $this->nmgp_cmp_hidden['stock'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="stock" value="<?php echo $this->form_encode_input($stock) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_stock_line" id="hidden_field_data_stock" style="<?php echo $sStyleHidden_stock; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_stock_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_stock_label" style=""><span id="id_label_stock"><?php echo $this->nm_new_label['stock']; ?></span></span><br><input type="hidden" name="stock" value="<?php echo $this->form_encode_input($stock); ?>"><span id="id_ajax_label_stock"><?php echo nl2br($stock); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_stock_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_stock_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['poriva']))
    {
        $this->nm_new_label['poriva'] = "Poriva";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $poriva = $this->poriva;
   $sStyleHidden_poriva = '';
   if (isset($this->nmgp_cmp_hidden['poriva']) && $this->nmgp_cmp_hidden['poriva'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['poriva']);
       $sStyleHidden_poriva = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_poriva = 'display: none;';
   $sStyleReadInp_poriva = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['poriva']) && $this->nmgp_cmp_readonly['poriva'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['poriva']);
       $sStyleReadLab_poriva = '';
       $sStyleReadInp_poriva = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['poriva']) && $this->nmgp_cmp_hidden['poriva'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="poriva" value="<?php echo $this->form_encode_input($poriva) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_poriva_line" id="hidden_field_data_poriva" style="<?php echo $sStyleHidden_poriva; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_poriva_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_poriva_label" style=""><span id="id_label_poriva"><?php echo $this->nm_new_label['poriva']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["poriva"]) &&  $this->nmgp_cmp_readonly["poriva"] == "on") { 

 ?>
<input type="hidden" name="poriva" value="<?php echo $this->form_encode_input($poriva) . "\">" . $poriva . ""; ?>
<?php } else { ?>
<span id="id_read_on_poriva" class="sc-ui-readonly-poriva css_poriva_line" style="<?php echo $sStyleReadLab_poriva; ?>"><?php echo $this->form_format_readonly("poriva", $this->form_encode_input($this->poriva)); ?></span><span id="id_read_off_poriva" class="css_read_off_poriva<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_poriva; ?>">
 <input class="sc-js-input scFormObjectOdd css_poriva_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_poriva" type=text name="poriva" value="<?php echo $this->form_encode_input($poriva) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['poriva']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['poriva']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['poriva']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['poriva']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_poriva_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_poriva_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['product_value']))
    {
        $this->nm_new_label['product_value'] = "" . $this->Ini->Nm_lang['lang_product_fld_product_value'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $product_value = $this->product_value;
   $sStyleHidden_product_value = '';
   if (isset($this->nmgp_cmp_hidden['product_value']) && $this->nmgp_cmp_hidden['product_value'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['product_value']);
       $sStyleHidden_product_value = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_product_value = 'display: none;';
   $sStyleReadInp_product_value = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['product_value']) && $this->nmgp_cmp_readonly['product_value'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['product_value']);
       $sStyleReadLab_product_value = '';
       $sStyleReadInp_product_value = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['product_value']) && $this->nmgp_cmp_hidden['product_value'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="product_value" value="<?php echo $this->form_encode_input($product_value) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_product_value_line" id="hidden_field_data_product_value" style="<?php echo $sStyleHidden_product_value; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_product_value_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_product_value_label" style=""><span id="id_label_product_value"><?php echo $this->nm_new_label['product_value']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["product_value"]) &&  $this->nmgp_cmp_readonly["product_value"] == "on") { 

 ?>
<input type="hidden" name="product_value" value="<?php echo $this->form_encode_input($product_value) . "\">" . $product_value . ""; ?>
<?php } else { ?>
<span id="id_read_on_product_value" class="sc-ui-readonly-product_value css_product_value_line" style="<?php echo $sStyleReadLab_product_value; ?>"><?php echo $this->form_format_readonly("product_value", $this->form_encode_input($this->product_value)); ?></span><span id="id_read_off_product_value" class="css_read_off_product_value<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_product_value; ?>">
 <input class="sc-js-input scFormObjectOdd css_product_value_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_product_value" type=text name="product_value" value="<?php echo $this->form_encode_input($product_value) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['product_value']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['product_value']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['product_value']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['product_value']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_product_value_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_product_value_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['discount']))
    {
        $this->nm_new_label['discount'] = "" . $this->Ini->Nm_lang['lang_product_fld_discount'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $discount = $this->discount;
   $sStyleHidden_discount = '';
   if (isset($this->nmgp_cmp_hidden['discount']) && $this->nmgp_cmp_hidden['discount'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['discount']);
       $sStyleHidden_discount = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_discount = 'display: none;';
   $sStyleReadInp_discount = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['discount']) && $this->nmgp_cmp_readonly['discount'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['discount']);
       $sStyleReadLab_discount = '';
       $sStyleReadInp_discount = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['discount']) && $this->nmgp_cmp_hidden['discount'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="discount" value="<?php echo $this->form_encode_input($discount) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_discount_line" id="hidden_field_data_discount" style="<?php echo $sStyleHidden_discount; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_discount_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_discount_label" style=""><span id="id_label_discount"><?php echo $this->nm_new_label['discount']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["discount"]) &&  $this->nmgp_cmp_readonly["discount"] == "on") { 

 ?>
<input type="hidden" name="discount" value="<?php echo $this->form_encode_input($discount) . "\">" . $discount . ""; ?>
<?php } else { ?>
<span id="id_read_on_discount" class="sc-ui-readonly-discount css_discount_line" style="<?php echo $sStyleReadLab_discount; ?>"><?php echo $this->form_format_readonly("discount", $this->form_encode_input($this->discount)); ?></span><span id="id_read_off_discount" class="css_read_off_discount<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_discount; ?>">
 <input class="sc-js-input scFormObjectOdd css_discount_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_discount" type=text name="discount" value="<?php echo $this->form_encode_input($discount) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['discount']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['discount']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['discount']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['discount']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_discount_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_discount_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precioventa']))
    {
        $this->nm_new_label['precioventa'] = "Precioventa subtotal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precioventa = $this->precioventa;
   $sStyleHidden_precioventa = '';
   if (isset($this->nmgp_cmp_hidden['precioventa']) && $this->nmgp_cmp_hidden['precioventa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precioventa']);
       $sStyleHidden_precioventa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precioventa = 'display: none;';
   $sStyleReadInp_precioventa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precioventa']) && $this->nmgp_cmp_readonly['precioventa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precioventa']);
       $sStyleReadLab_precioventa = '';
       $sStyleReadInp_precioventa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precioventa']) && $this->nmgp_cmp_hidden['precioventa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precioventa" value="<?php echo $this->form_encode_input($precioventa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_precioventa_line" id="hidden_field_data_precioventa" style="<?php echo $sStyleHidden_precioventa; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_precioventa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_precioventa_label" style=""><span id="id_label_precioventa"><?php echo $this->nm_new_label['precioventa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precioventa"]) &&  $this->nmgp_cmp_readonly["precioventa"] == "on") { 

 ?>
<input type="hidden" name="precioventa" value="<?php echo $this->form_encode_input($precioventa) . "\">" . $precioventa . ""; ?>
<?php } else { ?>
<span id="id_read_on_precioventa" class="sc-ui-readonly-precioventa css_precioventa_line" style="<?php echo $sStyleReadLab_precioventa; ?>"><?php echo $this->form_format_readonly("precioventa", $this->form_encode_input($this->precioventa)); ?></span><span id="id_read_off_precioventa" class="css_read_off_precioventa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_precioventa; ?>">
 <input class="sc-js-input scFormObjectOdd css_precioventa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_precioventa" type=text name="precioventa" value="<?php echo $this->form_encode_input($precioventa) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'decimal', maxLength: 19, precision: 9, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['precioventa']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['precioventa']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['precioventa']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['precioventa']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precioventa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precioventa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['puntoventa']))
    {
        $this->nm_new_label['puntoventa'] = "Puntoventa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $puntoventa = $this->puntoventa;
   $sStyleHidden_puntoventa = '';
   if (isset($this->nmgp_cmp_hidden['puntoventa']) && $this->nmgp_cmp_hidden['puntoventa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['puntoventa']);
       $sStyleHidden_puntoventa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_puntoventa = 'display: none;';
   $sStyleReadInp_puntoventa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['puntoventa']) && $this->nmgp_cmp_readonly['puntoventa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['puntoventa']);
       $sStyleReadLab_puntoventa = '';
       $sStyleReadInp_puntoventa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['puntoventa']) && $this->nmgp_cmp_hidden['puntoventa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="puntoventa" value="<?php echo $this->form_encode_input($puntoventa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_puntoventa_line" id="hidden_field_data_puntoventa" style="<?php echo $sStyleHidden_puntoventa; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_puntoventa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_puntoventa_label" style=""><span id="id_label_puntoventa"><?php echo $this->nm_new_label['puntoventa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["puntoventa"]) &&  $this->nmgp_cmp_readonly["puntoventa"] == "on") { 

 if ("1" == $this->puntoventa) { $puntoventa_look = "SI";} 
 if ("0" == $this->puntoventa) { $puntoventa_look = "NO";} 
?>
<input type="hidden" name="puntoventa" value="<?php echo $this->form_encode_input($puntoventa) . "\">" . $puntoventa_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->puntoventa) { $puntoventa_look = "SI";} 
 if ("0" == $this->puntoventa) { $puntoventa_look = "NO";} 
?>
<span id="id_read_on_puntoventa"  class="css_puntoventa_line" style="<?php echo $sStyleReadLab_puntoventa; ?>"><?php echo $this->form_format_readonly("puntoventa", $this->form_encode_input($puntoventa_look)); ?></span><span id="id_read_off_puntoventa" class="css_read_off_puntoventa css_puntoventa_line" style="<?php echo $sStyleReadInp_puntoventa; ?>"><div id="idAjaxRadio_puntoventa" style="display: inline-block"  class="css_puntoventa_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_puntoventa_line"><?php $tempOptionId = "id-opt-puntoventa" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-puntoventa sc-ui-radio-puntoventa" type=radio name="puntoventa" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_puntoventa'][] = '1'; ?>
<?php  if ("1" == $this->puntoventa)  { echo " checked" ;} ?><?php  if (empty($this->puntoventa)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_puntoventa_line"><?php $tempOptionId = "id-opt-puntoventa" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-puntoventa sc-ui-radio-puntoventa" type=radio name="puntoventa" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_puntoventa'][] = '0'; ?>
<?php  if ("0" == $this->puntoventa)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_puntoventa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_puntoventa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['kiosko']))
    {
        $this->nm_new_label['kiosko'] = "Kiosko";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kiosko = $this->kiosko;
   $sStyleHidden_kiosko = '';
   if (isset($this->nmgp_cmp_hidden['kiosko']) && $this->nmgp_cmp_hidden['kiosko'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kiosko']);
       $sStyleHidden_kiosko = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kiosko = 'display: none;';
   $sStyleReadInp_kiosko = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kiosko']) && $this->nmgp_cmp_readonly['kiosko'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kiosko']);
       $sStyleReadLab_kiosko = '';
       $sStyleReadInp_kiosko = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kiosko']) && $this->nmgp_cmp_hidden['kiosko'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="kiosko" value="<?php echo $this->form_encode_input($kiosko) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_kiosko_line" id="hidden_field_data_kiosko" style="<?php echo $sStyleHidden_kiosko; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kiosko_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_kiosko_label" style=""><span id="id_label_kiosko"><?php echo $this->nm_new_label['kiosko']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kiosko"]) &&  $this->nmgp_cmp_readonly["kiosko"] == "on") { 

 if ("1" == $this->kiosko) { $kiosko_look = "SI";} 
 if ("0" == $this->kiosko) { $kiosko_look = "NO";} 
?>
<input type="hidden" name="kiosko" value="<?php echo $this->form_encode_input($kiosko) . "\">" . $kiosko_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->kiosko) { $kiosko_look = "SI";} 
 if ("0" == $this->kiosko) { $kiosko_look = "NO";} 
?>
<span id="id_read_on_kiosko"  class="css_kiosko_line" style="<?php echo $sStyleReadLab_kiosko; ?>"><?php echo $this->form_format_readonly("kiosko", $this->form_encode_input($kiosko_look)); ?></span><span id="id_read_off_kiosko" class="css_read_off_kiosko css_kiosko_line" style="<?php echo $sStyleReadInp_kiosko; ?>"><div id="idAjaxRadio_kiosko" style="display: inline-block"  class="css_kiosko_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_kiosko_line"><?php $tempOptionId = "id-opt-kiosko" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-kiosko sc-ui-radio-kiosko" type=radio name="kiosko" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_kiosko'][] = '1'; ?>
<?php  if ("1" == $this->kiosko)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_kiosko_line"><?php $tempOptionId = "id-opt-kiosko" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-kiosko sc-ui-radio-kiosko" type=radio name="kiosko" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_kiosko'][] = '0'; ?>
<?php  if ("0" == $this->kiosko)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kiosko_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kiosko_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['orden']))
    {
        $this->nm_new_label['orden'] = "Orden";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $orden = $this->orden;
   $sStyleHidden_orden = '';
   if (isset($this->nmgp_cmp_hidden['orden']) && $this->nmgp_cmp_hidden['orden'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['orden']);
       $sStyleHidden_orden = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_orden = 'display: none;';
   $sStyleReadInp_orden = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['orden']) && $this->nmgp_cmp_readonly['orden'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['orden']);
       $sStyleReadLab_orden = '';
       $sStyleReadInp_orden = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['orden']) && $this->nmgp_cmp_hidden['orden'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="orden" value="<?php echo $this->form_encode_input($orden) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_orden_line" id="hidden_field_data_orden" style="<?php echo $sStyleHidden_orden; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_orden_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_orden_label" style=""><span id="id_label_orden"><?php echo $this->nm_new_label['orden']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["orden"]) &&  $this->nmgp_cmp_readonly["orden"] == "on") { 

 ?>
<input type="hidden" name="orden" value="<?php echo $this->form_encode_input($orden) . "\">" . $orden . ""; ?>
<?php } else { ?>
<span id="id_read_on_orden" class="sc-ui-readonly-orden css_orden_line" style="<?php echo $sStyleReadLab_orden; ?>"><?php echo $this->form_format_readonly("orden", $this->form_encode_input($this->orden)); ?></span><span id="id_read_off_orden" class="css_read_off_orden<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_orden; ?>">
 <input class="sc-js-input scFormObjectOdd css_orden_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_orden" type=text name="orden" value="<?php echo $this->form_encode_input($orden) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['orden']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['orden']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['orden']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_orden_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_orden_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['id_status']))
   {
       $this->nm_new_label['id_status'] = "" . $this->Ini->Nm_lang['lang_product_fld_id_status'] . "";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_status = $this->id_status;
   $sStyleHidden_id_status = '';
   if (isset($this->nmgp_cmp_hidden['id_status']) && $this->nmgp_cmp_hidden['id_status'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_status']);
       $sStyleHidden_id_status = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_status = 'display: none;';
   $sStyleReadInp_id_status = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['id_status']) && $this->nmgp_cmp_readonly['id_status'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_status']);
       $sStyleReadLab_id_status = '';
       $sStyleReadInp_id_status = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_status']) && $this->nmgp_cmp_hidden['id_status'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="id_status" value="<?php echo $this->form_encode_input($this->id_status) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_id_status_line" id="hidden_field_data_id_status" style="<?php echo $sStyleHidden_id_status; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_status_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_status_label" style=""><span id="id_label_id_status"><?php echo $this->nm_new_label['id_status']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["id_status"]) &&  $this->nmgp_cmp_readonly["id_status"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_status']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_status'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_status']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_status'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_status']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_status'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_status']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_status'] = array(); 
    }

   $old_value_dateproduct = $this->dateproduct;
   $old_value_dateproduct_hora = $this->dateproduct_hora;
   $old_value_product_cost = $this->product_cost;
   $old_value_stock = $this->stock;
   $old_value_poriva = $this->poriva;
   $old_value_product_value = $this->product_value;
   $old_value_discount = $this->discount;
   $old_value_precioventa = $this->precioventa;
   $old_value_orden = $this->orden;
   $old_value_minutos = $this->minutos;
   $old_value_tokens = $this->tokens;
   $old_value_score = $this->score;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct = $this->dateproduct;
   $unformatted_value_dateproduct_hora = $this->dateproduct_hora;
   $unformatted_value_product_cost = $this->product_cost;
   $unformatted_value_stock = $this->stock;
   $unformatted_value_poriva = $this->poriva;
   $unformatted_value_product_value = $this->product_value;
   $unformatted_value_discount = $this->discount;
   $unformatted_value_precioventa = $this->precioventa;
   $unformatted_value_orden = $this->orden;
   $unformatted_value_minutos = $this->minutos;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_score = $this->score;

   $nm_comando = "SELECT id_status, status  FROM status  ORDER BY status";

   $this->dateproduct = $old_value_dateproduct;
   $this->dateproduct_hora = $old_value_dateproduct_hora;
   $this->product_cost = $old_value_product_cost;
   $this->stock = $old_value_stock;
   $this->poriva = $old_value_poriva;
   $this->product_value = $old_value_product_value;
   $this->discount = $old_value_discount;
   $this->precioventa = $old_value_precioventa;
   $this->orden = $old_value_orden;
   $this->minutos = $old_value_minutos;
   $this->tokens = $old_value_tokens;
   $this->score = $old_value_score;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_id_status'][] = $rs->fields[0];
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
   $id_status_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_status_1))
          {
              foreach ($this->id_status_1 as $tmp_id_status)
              {
                  if (trim($tmp_id_status) === trim($cadaselect[1])) { $id_status_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_status) === trim($cadaselect[1])) { $id_status_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="id_status" value="<?php echo $this->form_encode_input($id_status) . "\">" . $id_status_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_id_status();
   $x = 0 ; 
   $id_status_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->id_status_1))
          {
              foreach ($this->id_status_1 as $tmp_id_status)
              {
                  if (trim($tmp_id_status) === trim($cadaselect[1])) { $id_status_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->id_status) === trim($cadaselect[1])) { $id_status_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($id_status_look))
          {
              $id_status_look = $this->id_status;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_id_status\" class=\"css_id_status_line\" style=\"" .  $sStyleReadLab_id_status . "\">" . $this->form_format_readonly("id_status", $this->form_encode_input($id_status_look)) . "</span><span id=\"id_read_off_id_status\" class=\"css_read_off_id_status" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_id_status . "\">";
   echo " <span id=\"idAjaxSelect_id_status\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_id_status_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_id_status\" name=\"id_status\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->id_status) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->id_status)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_status_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_status_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['cuentaventa']))
   {
       $this->nm_new_label['cuentaventa'] = "Cuentaventa";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cuentaventa = $this->cuentaventa;
   $sStyleHidden_cuentaventa = '';
   if (isset($this->nmgp_cmp_hidden['cuentaventa']) && $this->nmgp_cmp_hidden['cuentaventa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cuentaventa']);
       $sStyleHidden_cuentaventa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cuentaventa = 'display: none;';
   $sStyleReadInp_cuentaventa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cuentaventa']) && $this->nmgp_cmp_readonly['cuentaventa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cuentaventa']);
       $sStyleReadLab_cuentaventa = '';
       $sStyleReadInp_cuentaventa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cuentaventa']) && $this->nmgp_cmp_hidden['cuentaventa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="cuentaventa" value="<?php echo $this->form_encode_input($this->cuentaventa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cuentaventa_line" id="hidden_field_data_cuentaventa" style="<?php echo $sStyleHidden_cuentaventa; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cuentaventa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cuentaventa_label" style=""><span id="id_label_cuentaventa"><?php echo $this->nm_new_label['cuentaventa']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['php_cmp_required']['cuentaventa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['php_cmp_required']['cuentaventa'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cuentaventa"]) &&  $this->nmgp_cmp_readonly["cuentaventa"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_cuentaventa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_cuentaventa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_cuentaventa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_cuentaventa'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_cuentaventa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_cuentaventa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_cuentaventa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_cuentaventa'] = array(); 
    }

   $old_value_dateproduct = $this->dateproduct;
   $old_value_dateproduct_hora = $this->dateproduct_hora;
   $old_value_product_cost = $this->product_cost;
   $old_value_stock = $this->stock;
   $old_value_poriva = $this->poriva;
   $old_value_product_value = $this->product_value;
   $old_value_discount = $this->discount;
   $old_value_precioventa = $this->precioventa;
   $old_value_orden = $this->orden;
   $old_value_minutos = $this->minutos;
   $old_value_tokens = $this->tokens;
   $old_value_score = $this->score;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_dateproduct = $this->dateproduct;
   $unformatted_value_dateproduct_hora = $this->dateproduct_hora;
   $unformatted_value_product_cost = $this->product_cost;
   $unformatted_value_stock = $this->stock;
   $unformatted_value_poriva = $this->poriva;
   $unformatted_value_product_value = $this->product_value;
   $unformatted_value_discount = $this->discount;
   $unformatted_value_precioventa = $this->precioventa;
   $unformatted_value_orden = $this->orden;
   $unformatted_value_minutos = $this->minutos;
   $unformatted_value_tokens = $this->tokens;
   $unformatted_value_score = $this->score;

   $nm_comando = "SELECT codigo, descrip  FROM product_categoria  ORDER BY codigo";

   $this->dateproduct = $old_value_dateproduct;
   $this->dateproduct_hora = $old_value_dateproduct_hora;
   $this->product_cost = $old_value_product_cost;
   $this->stock = $old_value_stock;
   $this->poriva = $old_value_poriva;
   $this->product_value = $old_value_product_value;
   $this->discount = $old_value_discount;
   $this->precioventa = $old_value_precioventa;
   $this->orden = $old_value_orden;
   $this->minutos = $old_value_minutos;
   $this->tokens = $old_value_tokens;
   $this->score = $old_value_score;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[0] . " - " . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_cuentaventa'][] = $rs->fields[0];
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
   $cuentaventa_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->cuentaventa_1))
          {
              foreach ($this->cuentaventa_1 as $tmp_cuentaventa)
              {
                  if (trim($tmp_cuentaventa) === trim($cadaselect[1])) { $cuentaventa_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->cuentaventa) === trim($cadaselect[1])) { $cuentaventa_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="cuentaventa" value="<?php echo $this->form_encode_input($cuentaventa) . "\">" . $cuentaventa_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_cuentaventa();
   $x = 0 ; 
   $cuentaventa_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->cuentaventa_1))
          {
              foreach ($this->cuentaventa_1 as $tmp_cuentaventa)
              {
                  if (trim($tmp_cuentaventa) === trim($cadaselect[1])) { $cuentaventa_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->cuentaventa) === trim($cadaselect[1])) { $cuentaventa_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($cuentaventa_look))
          {
              $cuentaventa_look = $this->cuentaventa;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_cuentaventa\" class=\"css_cuentaventa_line\" style=\"" .  $sStyleReadLab_cuentaventa . "\">" . $this->form_format_readonly("cuentaventa", $this->form_encode_input($cuentaventa_look)) . "</span><span id=\"id_read_off_cuentaventa\" class=\"css_read_off_cuentaventa" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_cuentaventa . "\">";
   echo " <span id=\"idAjaxSelect_cuentaventa\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_cuentaventa_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_cuentaventa\" name=\"cuentaventa\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_cuentaventa'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->cuentaventa) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->cuentaventa)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cuentaventa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cuentaventa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['unidad']))
    {
        $this->nm_new_label['unidad'] = "Unidad";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unidad = $this->unidad;
   $sStyleHidden_unidad = '';
   if (isset($this->nmgp_cmp_hidden['unidad']) && $this->nmgp_cmp_hidden['unidad'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unidad']);
       $sStyleHidden_unidad = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unidad = 'display: none;';
   $sStyleReadInp_unidad = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unidad']) && $this->nmgp_cmp_readonly['unidad'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unidad']);
       $sStyleReadLab_unidad = '';
       $sStyleReadInp_unidad = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unidad']) && $this->nmgp_cmp_hidden['unidad'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="unidad" value="<?php echo $this->form_encode_input($unidad) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_unidad_line" id="hidden_field_data_unidad" style="<?php echo $sStyleHidden_unidad; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unidad_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_unidad_label" style=""><span id="id_label_unidad"><?php echo $this->nm_new_label['unidad']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unidad"]) &&  $this->nmgp_cmp_readonly["unidad"] == "on") { 

 ?>
<input type="hidden" name="unidad" value="<?php echo $this->form_encode_input($unidad) . "\">" . $unidad . ""; ?>
<?php } else { ?>
<span id="id_read_on_unidad" class="sc-ui-readonly-unidad css_unidad_line" style="<?php echo $sStyleReadLab_unidad; ?>"><?php echo $this->form_format_readonly("unidad", $this->form_encode_input($this->unidad)); ?></span><span id="id_read_off_unidad" class="css_read_off_unidad<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_unidad; ?>">
 <input class="sc-js-input scFormObjectOdd css_unidad_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_unidad" type=text name="unidad" value="<?php echo $this->form_encode_input($unidad) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unidad_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unidad_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cuentacompra']))
    {
        $this->nm_new_label['cuentacompra'] = "Cuentacompra";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cuentacompra = $this->cuentacompra;
   $sStyleHidden_cuentacompra = '';
   if (isset($this->nmgp_cmp_hidden['cuentacompra']) && $this->nmgp_cmp_hidden['cuentacompra'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cuentacompra']);
       $sStyleHidden_cuentacompra = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cuentacompra = 'display: none;';
   $sStyleReadInp_cuentacompra = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cuentacompra']) && $this->nmgp_cmp_readonly['cuentacompra'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cuentacompra']);
       $sStyleReadLab_cuentacompra = '';
       $sStyleReadInp_cuentacompra = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cuentacompra']) && $this->nmgp_cmp_hidden['cuentacompra'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cuentacompra" value="<?php echo $this->form_encode_input($cuentacompra) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cuentacompra_line" id="hidden_field_data_cuentacompra" style="<?php echo $sStyleHidden_cuentacompra; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cuentacompra_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cuentacompra_label" style=""><span id="id_label_cuentacompra"><?php echo $this->nm_new_label['cuentacompra']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cuentacompra"]) &&  $this->nmgp_cmp_readonly["cuentacompra"] == "on") { 

 ?>
<input type="hidden" name="cuentacompra" value="<?php echo $this->form_encode_input($cuentacompra) . "\">" . $cuentacompra . ""; ?>
<?php } else { ?>
<span id="id_read_on_cuentacompra" class="sc-ui-readonly-cuentacompra css_cuentacompra_line" style="<?php echo $sStyleReadLab_cuentacompra; ?>"><?php echo $this->form_format_readonly("cuentacompra", $this->form_encode_input($this->cuentacompra)); ?></span><span id="id_read_off_cuentacompra" class="css_read_off_cuentacompra<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cuentacompra; ?>">
 <input class="sc-js-input scFormObjectOdd css_cuentacompra_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cuentacompra" type=text name="cuentacompra" value="<?php echo $this->form_encode_input($cuentacompra) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cuentacompra_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cuentacompra_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_cuentacompra_dumb = ('' == $sStyleHidden_cuentacompra) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_cuentacompra_dumb" style="<?php echo $sStyleHidden_cuentacompra_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipoitem']))
    {
        $this->nm_new_label['tipoitem'] = "Tipoitem";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipoitem = $this->tipoitem;
   $sStyleHidden_tipoitem = '';
   if (isset($this->nmgp_cmp_hidden['tipoitem']) && $this->nmgp_cmp_hidden['tipoitem'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipoitem']);
       $sStyleHidden_tipoitem = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipoitem = 'display: none;';
   $sStyleReadInp_tipoitem = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipoitem']) && $this->nmgp_cmp_readonly['tipoitem'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipoitem']);
       $sStyleReadLab_tipoitem = '';
       $sStyleReadInp_tipoitem = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipoitem']) && $this->nmgp_cmp_hidden['tipoitem'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipoitem" value="<?php echo $this->form_encode_input($tipoitem) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipoitem_line" id="hidden_field_data_tipoitem" style="<?php echo $sStyleHidden_tipoitem; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipoitem_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipoitem"]) &&  $this->nmgp_cmp_readonly["tipoitem"] == "on") { 

 ?>
<input type="hidden" name="tipoitem" value="<?php echo $this->form_encode_input($tipoitem) . "\">" . $tipoitem . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipoitem" class="sc-ui-readonly-tipoitem css_tipoitem_line" style="<?php echo $sStyleReadLab_tipoitem; ?>"><?php echo $this->form_format_readonly("tipoitem", $this->form_encode_input($this->tipoitem)); ?></span><span id="id_read_off_tipoitem" class="css_read_off_tipoitem<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipoitem; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipoitem_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipoitem" type=text name="tipoitem" value="<?php echo $this->form_encode_input($tipoitem) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipoitem_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipoitem_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['image']))
    {
        $this->nm_new_label['image'] = "" . $this->Ini->Nm_lang['lang_product_fld_image'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $image = $this->image;
   $sStyleHidden_image = '';
   if (isset($this->nmgp_cmp_hidden['image']) && $this->nmgp_cmp_hidden['image'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['image']);
       $sStyleHidden_image = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_image = 'display: none;';
   $sStyleReadInp_image = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['image']) && $this->nmgp_cmp_readonly['image'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['image']);
       $sStyleReadLab_image = '';
       $sStyleReadInp_image = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['image']) && $this->nmgp_cmp_hidden['image'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="image" value="<?php echo $this->form_encode_input($image) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_image_line" id="hidden_field_data_image" style="<?php echo $sStyleHidden_image; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_image_line" style="vertical-align: top;padding: 0px">
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_image" => $out1_image); ?><script>var var_ajax_img_image = '<?php echo $out1_image; ?>';</script><input type="hidden" name="temp_out_image" value="<?php echo $this->form_encode_input($out_image); ?>" /><input type="hidden" name="temp_out1_image" value="<?php echo $this->form_encode_input($out1_image); ?>" /><?php if (!empty($out_image)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_image, '" . $this->nmgp_return_img['image'][0] . "', '" . $this->nmgp_return_img['image'][1] . "')\"><img id=\"id_ajax_img_image\"  border=\"0\" src=\"$out_image\"></a>"; } else {  echo "<img id=\"id_ajax_img_image\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["image"]) &&  $this->nmgp_cmp_readonly["image"] == "on") { 

 ?>
<img id=\"image_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="image" value="<?php echo $this->form_encode_input($image) . "\">" . $image . ""; ?>
<?php } else { ?>
<span id="id_read_off_image" class="css_read_off_image<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_image; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-image" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_image_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="image[]" id="id_sc_field_image" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_image"<?php if ($this->nmgp_opcao == "novo" || empty($image)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="image_limpa" value="<?php echo $image_limpa . '" '; if ($image_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="image_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_image" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_image" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_image_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_image_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_image_dumb = ('' == $sStyleHidden_image) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_image_dumb" style="<?php echo $sStyleHidden_image_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['service']))
    {
        $this->nm_new_label['service'] = "SERVICIO";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $service = $this->service;
   $sStyleHidden_service = '';
   if (isset($this->nmgp_cmp_hidden['service']) && $this->nmgp_cmp_hidden['service'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['service']);
       $sStyleHidden_service = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_service = 'display: none;';
   $sStyleReadInp_service = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['service']) && $this->nmgp_cmp_readonly['service'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['service']);
       $sStyleReadLab_service = '';
       $sStyleReadInp_service = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['service']) && $this->nmgp_cmp_hidden['service'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="service" value="<?php echo $this->form_encode_input($service) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_service_line" id="hidden_field_data_service" style="<?php echo $sStyleHidden_service; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_service_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_service_label" style=""><span id="id_label_service"><?php echo $this->nm_new_label['service']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["service"]) &&  $this->nmgp_cmp_readonly["service"] == "on") { 

 if ("1" == $this->service) { $service_look = "SI";} 
 if ("0" == $this->service) { $service_look = "NO";} 
?>
<input type="hidden" name="service" value="<?php echo $this->form_encode_input($service) . "\">" . $service_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->service) { $service_look = "SI";} 
 if ("0" == $this->service) { $service_look = "NO";} 
?>
<span id="id_read_on_service"  class="css_service_line" style="<?php echo $sStyleReadLab_service; ?>"><?php echo $this->form_format_readonly("service", $this->form_encode_input($service_look)); ?></span><span id="id_read_off_service" class="css_read_off_service css_service_line" style="<?php echo $sStyleReadInp_service; ?>"><div id="idAjaxRadio_service" style="display: inline-block"  class="css_service_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_service_line"><?php $tempOptionId = "id-opt-service" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-service sc-ui-radio-service" type=radio name="service" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_service'][] = '1'; ?>
<?php  if ("1" == $this->service)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_service_line"><?php $tempOptionId = "id-opt-service" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-service sc-ui-radio-service" type=radio name="service" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_service'][] = '0'; ?>
<?php  if ("0" == $this->service)  { echo " checked" ;} ?><?php  if (empty($this->service)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_service_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_service_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['jugador']))
    {
        $this->nm_new_label['jugador'] = "Jugador";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jugador = $this->jugador;
   $sStyleHidden_jugador = '';
   if (isset($this->nmgp_cmp_hidden['jugador']) && $this->nmgp_cmp_hidden['jugador'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jugador']);
       $sStyleHidden_jugador = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jugador = 'display: none;';
   $sStyleReadInp_jugador = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jugador']) && $this->nmgp_cmp_readonly['jugador'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jugador']);
       $sStyleReadLab_jugador = '';
       $sStyleReadInp_jugador = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jugador']) && $this->nmgp_cmp_hidden['jugador'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jugador" value="<?php echo $this->form_encode_input($jugador) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jugador_line" id="hidden_field_data_jugador" style="<?php echo $sStyleHidden_jugador; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jugador_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_jugador_label" style=""><span id="id_label_jugador"><?php echo $this->nm_new_label['jugador']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jugador"]) &&  $this->nmgp_cmp_readonly["jugador"] == "on") { 

 if ("1" == $this->jugador) { $jugador_look = "SI";} 
 if ("0" == $this->jugador) { $jugador_look = "NO";} 
?>
<input type="hidden" name="jugador" value="<?php echo $this->form_encode_input($jugador) . "\">" . $jugador_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->jugador) { $jugador_look = "SI";} 
 if ("0" == $this->jugador) { $jugador_look = "NO";} 
?>
<span id="id_read_on_jugador"  class="css_jugador_line" style="<?php echo $sStyleReadLab_jugador; ?>"><?php echo $this->form_format_readonly("jugador", $this->form_encode_input($jugador_look)); ?></span><span id="id_read_off_jugador" class="css_read_off_jugador css_jugador_line" style="<?php echo $sStyleReadInp_jugador; ?>"><div id="idAjaxRadio_jugador" style="display: inline-block"  class="css_jugador_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_jugador_line"><?php $tempOptionId = "id-opt-jugador" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-jugador sc-ui-radio-jugador" type=radio name="jugador" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_jugador'][] = '1'; ?>
<?php  if ("1" == $this->jugador)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_jugador_line"><?php $tempOptionId = "id-opt-jugador" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-jugador sc-ui-radio-jugador" type=radio name="jugador" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_jugador'][] = '0'; ?>
<?php  if ("0" == $this->jugador)  { echo " checked" ;} ?><?php  if (empty($this->jugador)) { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jugador_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jugador_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['entrada']))
    {
        $this->nm_new_label['entrada'] = "Entrada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $entrada = $this->entrada;
   $sStyleHidden_entrada = '';
   if (isset($this->nmgp_cmp_hidden['entrada']) && $this->nmgp_cmp_hidden['entrada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['entrada']);
       $sStyleHidden_entrada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_entrada = 'display: none;';
   $sStyleReadInp_entrada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['entrada']) && $this->nmgp_cmp_readonly['entrada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['entrada']);
       $sStyleReadLab_entrada = '';
       $sStyleReadInp_entrada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['entrada']) && $this->nmgp_cmp_hidden['entrada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="entrada" value="<?php echo $this->form_encode_input($entrada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_entrada_line" id="hidden_field_data_entrada" style="<?php echo $sStyleHidden_entrada; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_entrada_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_entrada_label" style=""><span id="id_label_entrada"><?php echo $this->nm_new_label['entrada']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["entrada"]) &&  $this->nmgp_cmp_readonly["entrada"] == "on") { 

 if ("1" == $this->entrada) { $entrada_look = "SI";} 
 if ("0" == $this->entrada) { $entrada_look = "NO";} 
?>
<input type="hidden" name="entrada" value="<?php echo $this->form_encode_input($entrada) . "\">" . $entrada_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->entrada) { $entrada_look = "SI";} 
 if ("0" == $this->entrada) { $entrada_look = "NO";} 
?>
<span id="id_read_on_entrada"  class="css_entrada_line" style="<?php echo $sStyleReadLab_entrada; ?>"><?php echo $this->form_format_readonly("entrada", $this->form_encode_input($entrada_look)); ?></span><span id="id_read_off_entrada" class="css_read_off_entrada css_entrada_line" style="<?php echo $sStyleReadInp_entrada; ?>"><div id="idAjaxRadio_entrada" style="display: inline-block"  class="css_entrada_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_entrada_line"><?php $tempOptionId = "id-opt-entrada" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-entrada sc-ui-radio-entrada" type=radio name="entrada" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_entrada'][] = '1'; ?>
<?php  if ("1" == $this->entrada)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_entrada_line"><?php $tempOptionId = "id-opt-entrada" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-entrada sc-ui-radio-entrada" type=radio name="entrada" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_entrada'][] = '0'; ?>
<?php  if ("0" == $this->entrada)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_entrada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_entrada_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['visitante']))
    {
        $this->nm_new_label['visitante'] = "Visitante";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $visitante = $this->visitante;
   $sStyleHidden_visitante = '';
   if (isset($this->nmgp_cmp_hidden['visitante']) && $this->nmgp_cmp_hidden['visitante'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['visitante']);
       $sStyleHidden_visitante = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_visitante = 'display: none;';
   $sStyleReadInp_visitante = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['visitante']) && $this->nmgp_cmp_readonly['visitante'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['visitante']);
       $sStyleReadLab_visitante = '';
       $sStyleReadInp_visitante = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['visitante']) && $this->nmgp_cmp_hidden['visitante'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="visitante" value="<?php echo $this->form_encode_input($visitante) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_visitante_line" id="hidden_field_data_visitante" style="<?php echo $sStyleHidden_visitante; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_visitante_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_visitante_label" style=""><span id="id_label_visitante"><?php echo $this->nm_new_label['visitante']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["visitante"]) &&  $this->nmgp_cmp_readonly["visitante"] == "on") { 

 if ("1" == $this->visitante) { $visitante_look = "SI";} 
 if ("0" == $this->visitante) { $visitante_look = "NO";} 
?>
<input type="hidden" name="visitante" value="<?php echo $this->form_encode_input($visitante) . "\">" . $visitante_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->visitante) { $visitante_look = "SI";} 
 if ("0" == $this->visitante) { $visitante_look = "NO";} 
?>
<span id="id_read_on_visitante"  class="css_visitante_line" style="<?php echo $sStyleReadLab_visitante; ?>"><?php echo $this->form_format_readonly("visitante", $this->form_encode_input($visitante_look)); ?></span><span id="id_read_off_visitante" class="css_read_off_visitante css_visitante_line" style="<?php echo $sStyleReadInp_visitante; ?>"><div id="idAjaxRadio_visitante" style="display: inline-block"  class="css_visitante_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_visitante_line"><?php $tempOptionId = "id-opt-visitante" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-visitante sc-ui-radio-visitante" type=radio name="visitante" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_visitante'][] = '1'; ?>
<?php  if ("1" == $this->visitante)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_visitante_line"><?php $tempOptionId = "id-opt-visitante" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-visitante sc-ui-radio-visitante" type=radio name="visitante" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_visitante'][] = '0'; ?>
<?php  if ("0" == $this->visitante)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_visitante_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_visitante_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['minutos']))
    {
        $this->nm_new_label['minutos'] = "Minutos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $minutos = $this->minutos;
   $sStyleHidden_minutos = '';
   if (isset($this->nmgp_cmp_hidden['minutos']) && $this->nmgp_cmp_hidden['minutos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['minutos']);
       $sStyleHidden_minutos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_minutos = 'display: none;';
   $sStyleReadInp_minutos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['minutos']) && $this->nmgp_cmp_readonly['minutos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['minutos']);
       $sStyleReadLab_minutos = '';
       $sStyleReadInp_minutos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['minutos']) && $this->nmgp_cmp_hidden['minutos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="minutos" value="<?php echo $this->form_encode_input($minutos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_minutos_line" id="hidden_field_data_minutos" style="<?php echo $sStyleHidden_minutos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_minutos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_minutos_label" style=""><span id="id_label_minutos"><?php echo $this->nm_new_label['minutos']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["minutos"]) &&  $this->nmgp_cmp_readonly["minutos"] == "on") { 

 ?>
<input type="hidden" name="minutos" value="<?php echo $this->form_encode_input($minutos) . "\">" . $minutos . ""; ?>
<?php } else { ?>
<span id="id_read_on_minutos" class="sc-ui-readonly-minutos css_minutos_line" style="<?php echo $sStyleReadLab_minutos; ?>"><?php echo $this->form_format_readonly("minutos", $this->form_encode_input($this->minutos)); ?></span><span id="id_read_off_minutos" class="css_read_off_minutos<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_minutos; ?>">
 <input class="sc-js-input scFormObjectOdd css_minutos_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_minutos" type=text name="minutos" value="<?php echo $this->form_encode_input($minutos) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['minutos']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['minutos']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['minutos']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_minutos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_minutos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tarjeta']))
    {
        $this->nm_new_label['tarjeta'] = "Tarjeta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tarjeta = $this->tarjeta;
   $sStyleHidden_tarjeta = '';
   if (isset($this->nmgp_cmp_hidden['tarjeta']) && $this->nmgp_cmp_hidden['tarjeta'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tarjeta']);
       $sStyleHidden_tarjeta = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tarjeta = 'display: none;';
   $sStyleReadInp_tarjeta = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tarjeta']) && $this->nmgp_cmp_readonly['tarjeta'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tarjeta']);
       $sStyleReadLab_tarjeta = '';
       $sStyleReadInp_tarjeta = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tarjeta']) && $this->nmgp_cmp_hidden['tarjeta'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tarjeta" value="<?php echo $this->form_encode_input($tarjeta) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tarjeta_line" id="hidden_field_data_tarjeta" style="<?php echo $sStyleHidden_tarjeta; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tarjeta_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tarjeta_label" style=""><span id="id_label_tarjeta"><?php echo $this->nm_new_label['tarjeta']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tarjeta"]) &&  $this->nmgp_cmp_readonly["tarjeta"] == "on") { 

 if ("1" == $this->tarjeta) { $tarjeta_look = "SI";} 
 if ("0" == $this->tarjeta) { $tarjeta_look = "NO";} 
?>
<input type="hidden" name="tarjeta" value="<?php echo $this->form_encode_input($tarjeta) . "\">" . $tarjeta_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->tarjeta) { $tarjeta_look = "SI";} 
 if ("0" == $this->tarjeta) { $tarjeta_look = "NO";} 
?>
<span id="id_read_on_tarjeta"  class="css_tarjeta_line" style="<?php echo $sStyleReadLab_tarjeta; ?>"><?php echo $this->form_format_readonly("tarjeta", $this->form_encode_input($tarjeta_look)); ?></span><span id="id_read_off_tarjeta" class="css_read_off_tarjeta css_tarjeta_line" style="<?php echo $sStyleReadInp_tarjeta; ?>"><div id="idAjaxRadio_tarjeta" style="display: inline-block"  class="css_tarjeta_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_tarjeta_line"><?php $tempOptionId = "id-opt-tarjeta" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-tarjeta sc-ui-radio-tarjeta" type=radio name="tarjeta" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_tarjeta'][] = '1'; ?>
<?php  if ("1" == $this->tarjeta)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_tarjeta_line"><?php $tempOptionId = "id-opt-tarjeta" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-tarjeta sc-ui-radio-tarjeta" type=radio name="tarjeta" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_tarjeta'][] = '0'; ?>
<?php  if ("0" == $this->tarjeta)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tarjeta_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tarjeta_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tokens']))
    {
        $this->nm_new_label['tokens'] = "Tokens";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tokens = $this->tokens;
   $sStyleHidden_tokens = '';
   if (isset($this->nmgp_cmp_hidden['tokens']) && $this->nmgp_cmp_hidden['tokens'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tokens']);
       $sStyleHidden_tokens = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tokens = 'display: none;';
   $sStyleReadInp_tokens = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tokens']) && $this->nmgp_cmp_readonly['tokens'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tokens']);
       $sStyleReadLab_tokens = '';
       $sStyleReadInp_tokens = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tokens']) && $this->nmgp_cmp_hidden['tokens'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tokens" value="<?php echo $this->form_encode_input($tokens) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tokens_line" id="hidden_field_data_tokens" style="<?php echo $sStyleHidden_tokens; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tokens_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tokens_label" style=""><span id="id_label_tokens"><?php echo $this->nm_new_label['tokens']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tokens"]) &&  $this->nmgp_cmp_readonly["tokens"] == "on") { 

 ?>
<input type="hidden" name="tokens" value="<?php echo $this->form_encode_input($tokens) . "\">" . $tokens . ""; ?>
<?php } else { ?>
<span id="id_read_on_tokens" class="sc-ui-readonly-tokens css_tokens_line" style="<?php echo $sStyleReadLab_tokens; ?>"><?php echo $this->form_format_readonly("tokens", $this->form_encode_input($this->tokens)); ?></span><span id="id_read_off_tokens" class="css_read_off_tokens<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tokens; ?>">
 <input class="sc-js-input scFormObjectOdd css_tokens_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tokens" type=text name="tokens" value="<?php echo $this->form_encode_input($tokens) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['tokens']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['tokens']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['tokens']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tokens_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tokens_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['comida']))
    {
        $this->nm_new_label['comida'] = "Comida";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $comida = $this->comida;
   $sStyleHidden_comida = '';
   if (isset($this->nmgp_cmp_hidden['comida']) && $this->nmgp_cmp_hidden['comida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['comida']);
       $sStyleHidden_comida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_comida = 'display: none;';
   $sStyleReadInp_comida = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['comida']) && $this->nmgp_cmp_readonly['comida'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['comida']);
       $sStyleReadLab_comida = '';
       $sStyleReadInp_comida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['comida']) && $this->nmgp_cmp_hidden['comida'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="comida" value="<?php echo $this->form_encode_input($comida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_comida_line" id="hidden_field_data_comida" style="<?php echo $sStyleHidden_comida; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_comida_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_comida_label" style=""><span id="id_label_comida"><?php echo $this->nm_new_label['comida']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["comida"]) &&  $this->nmgp_cmp_readonly["comida"] == "on") { 

 if ("1" == $this->comida) { $comida_look = "SI";} 
 if ("0" == $this->comida) { $comida_look = "NO";} 
?>
<input type="hidden" name="comida" value="<?php echo $this->form_encode_input($comida) . "\">" . $comida_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->comida) { $comida_look = "SI";} 
 if ("0" == $this->comida) { $comida_look = "NO";} 
?>
<span id="id_read_on_comida"  class="css_comida_line" style="<?php echo $sStyleReadLab_comida; ?>"><?php echo $this->form_format_readonly("comida", $this->form_encode_input($comida_look)); ?></span><span id="id_read_off_comida" class="css_read_off_comida css_comida_line" style="<?php echo $sStyleReadInp_comida; ?>"><div id="idAjaxRadio_comida" style="display: inline-block"  class="css_comida_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_comida_line"><?php $tempOptionId = "id-opt-comida" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-comida sc-ui-radio-comida" type=radio name="comida" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_comida'][] = '1'; ?>
<?php  if ("1" == $this->comida)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_comida_line"><?php $tempOptionId = "id-opt-comida" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-comida sc-ui-radio-comida" type=radio name="comida" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_comida'][] = '0'; ?>
<?php  if ("0" == $this->comida)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_comida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_comida_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['score']))
    {
        $this->nm_new_label['score'] = "Score";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $score = $this->score;
   $sStyleHidden_score = '';
   if (isset($this->nmgp_cmp_hidden['score']) && $this->nmgp_cmp_hidden['score'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['score']);
       $sStyleHidden_score = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_score = 'display: none;';
   $sStyleReadInp_score = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['score']) && $this->nmgp_cmp_readonly['score'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['score']);
       $sStyleReadLab_score = '';
       $sStyleReadInp_score = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['score']) && $this->nmgp_cmp_hidden['score'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="score" value="<?php echo $this->form_encode_input($score) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_score_line" id="hidden_field_data_score" style="<?php echo $sStyleHidden_score; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_score_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_score_label" style=""><span id="id_label_score"><?php echo $this->nm_new_label['score']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["score"]) &&  $this->nmgp_cmp_readonly["score"] == "on") { 

 ?>
<input type="hidden" name="score" value="<?php echo $this->form_encode_input($score) . "\">" . $score . ""; ?>
<?php } else { ?>
<span id="id_read_on_score" class="sc-ui-readonly-score css_score_line" style="<?php echo $sStyleReadLab_score; ?>"><?php echo $this->form_format_readonly("score", $this->form_encode_input($this->score)); ?></span><span id="id_read_off_score" class="css_read_off_score<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_score; ?>">
 <input class="sc-js-input scFormObjectOdd css_score_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_score" type=text name="score" value="<?php echo $this->form_encode_input($score) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['score']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['score']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['score']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_score_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_score_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_score_dumb = ('' == $sStyleHidden_score) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_score_dumb" style="<?php echo $sStyleHidden_score_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['combos_recetas']))
    {
        $this->nm_new_label['combos_recetas'] = "Combos_Recetas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $combos_recetas = $this->combos_recetas;
   $sStyleHidden_combos_recetas = '';
   if (isset($this->nmgp_cmp_hidden['combos_recetas']) && $this->nmgp_cmp_hidden['combos_recetas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['combos_recetas']);
       $sStyleHidden_combos_recetas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_combos_recetas = 'display: none;';
   $sStyleReadInp_combos_recetas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['combos_recetas']) && $this->nmgp_cmp_readonly['combos_recetas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['combos_recetas']);
       $sStyleReadLab_combos_recetas = '';
       $sStyleReadInp_combos_recetas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['combos_recetas']) && $this->nmgp_cmp_hidden['combos_recetas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="combos_recetas" value="<?php echo $this->form_encode_input($combos_recetas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_combos_recetas_line" id="hidden_field_data_combos_recetas" style="<?php echo $sStyleHidden_combos_recetas; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_combos_recetas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_combos_recetas_label" style=""><span id="id_label_combos_recetas"><?php echo $this->nm_new_label['combos_recetas']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Combos_Recetas'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Combos_Recetas'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Combos_Recetas'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['embutida_parms'] = "idprod*scin" . $this->nmgp_dados_form['id_product'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['foreign_key']['idproducto'] = $this->nmgp_dados_form['id_product'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['where_filter'] = "idproducto = " . $this->nmgp_dados_form['id_product'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['where_detal']  = "idproducto = " . $this->nmgp_dados_form['id_product'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_product_mob_empty.htm' : $this->Ini->link_form_product_combo_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=400';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init'] ]['form_product_combo'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_Combos_Recetas']) && 'nmsc_iframe_liga_form_product_combo_mob' != $this->Ini->sc_lig_target['C_@scinf_Combos_Recetas'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Combos_Recetas'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['form_product_combo_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Combos_Recetas'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_product_combo_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="400" width="100%" name="nmsc_iframe_liga_form_product_combo_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_combos_recetas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_combos_recetas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['clubmrjoy']))
    {
        $this->nm_new_label['clubmrjoy'] = "Clubmrjoy";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $clubmrjoy = $this->clubmrjoy;
   $sStyleHidden_clubmrjoy = '';
   if (isset($this->nmgp_cmp_hidden['clubmrjoy']) && $this->nmgp_cmp_hidden['clubmrjoy'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['clubmrjoy']);
       $sStyleHidden_clubmrjoy = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_clubmrjoy = 'display: none;';
   $sStyleReadInp_clubmrjoy = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['clubmrjoy']) && $this->nmgp_cmp_readonly['clubmrjoy'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['clubmrjoy']);
       $sStyleReadLab_clubmrjoy = '';
       $sStyleReadInp_clubmrjoy = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['clubmrjoy']) && $this->nmgp_cmp_hidden['clubmrjoy'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="clubmrjoy" value="<?php echo $this->form_encode_input($clubmrjoy) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_clubmrjoy_line" id="hidden_field_data_clubmrjoy" style="<?php echo $sStyleHidden_clubmrjoy; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_clubmrjoy_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_clubmrjoy_label" style=""><span id="id_label_clubmrjoy"><?php echo $this->nm_new_label['clubmrjoy']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["clubmrjoy"]) &&  $this->nmgp_cmp_readonly["clubmrjoy"] == "on") { 

 if ("1" == $this->clubmrjoy) { $clubmrjoy_look = "SI";} 
 if ("0" == $this->clubmrjoy) { $clubmrjoy_look = "NO";} 
?>
<input type="hidden" name="clubmrjoy" value="<?php echo $this->form_encode_input($clubmrjoy) . "\">" . $clubmrjoy_look . ""; ?>
<?php } else { ?>

<?php

 if ("1" == $this->clubmrjoy) { $clubmrjoy_look = "SI";} 
 if ("0" == $this->clubmrjoy) { $clubmrjoy_look = "NO";} 
?>
<span id="id_read_on_clubmrjoy"  class="css_clubmrjoy_line" style="<?php echo $sStyleReadLab_clubmrjoy; ?>"><?php echo $this->form_format_readonly("clubmrjoy", $this->form_encode_input($clubmrjoy_look)); ?></span><span id="id_read_off_clubmrjoy" class="css_read_off_clubmrjoy css_clubmrjoy_line" style="<?php echo $sStyleReadInp_clubmrjoy; ?>"><div id="idAjaxRadio_clubmrjoy" style="display: inline-block"  class="css_clubmrjoy_line">
<TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOdd css_clubmrjoy_line"><?php $tempOptionId = "id-opt-clubmrjoy" . $sc_seq_vert . "-1"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-clubmrjoy sc-ui-radio-clubmrjoy" type=radio name="clubmrjoy" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_clubmrjoy'][] = '1'; ?>
<?php  if ("1" == $this->clubmrjoy)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">SI</label></TD>
</TR>
<TR>
  <TD class="scFormDataFontOdd css_clubmrjoy_line"><?php $tempOptionId = "id-opt-clubmrjoy" . $sc_seq_vert . "-2"; ?>
    <input id="<?php echo $tempOptionId ?>"  class="sc-ui-radio-clubmrjoy sc-ui-radio-clubmrjoy" type=radio name="clubmrjoy" value="0"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['Lookup_clubmrjoy'][] = '0'; ?>
<?php  if ("0" == $this->clubmrjoy)  { echo " checked" ;} ?>  onClick="" ><label for="<?php echo $tempOptionId ?>">NO</label></TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_clubmrjoy_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_clubmrjoy_text"></span></td></tr></table></td></tr></table> </TD>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['birpara'];
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
        $buttonMacroDisabled = 'sc-unique-btn-25';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-26';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['back'];
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-27';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-28';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['btn_label']['last'];
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_product_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_product_mob");
 parent.scAjaxDetailHeight("form_product_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_product_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_product_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['sc_modal'])
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
	function scBtnFn_sys_format_copy() {
		if ($("#sc_b_clone_t.sc-unique-btn-1").length && $("#sc_b_clone_t.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_clone_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_move ('clone');
			 return;
		}
		if ($("#sc_b_clone_t.sc-unique-btn-15").length && $("#sc_b_clone_t.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_clone_t.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			nm_move ('clone');
			 return;
		}
	}
	function scBtnFn_sys_format_inc() {
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
		if ($("#sc_b_new_t.sc-unique-btn-16").length && $("#sc_b_new_t.sc-unique-btn-16").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-16").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-17").length && $("#sc_b_ins_t.sc-unique-btn-17").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-17").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-18").length && $("#sc_b_sai_t.sc-unique-btn-18").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-18").hasClass("disabled")) {
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
		if ($("#sc_b_upd_t.sc-unique-btn-19").length && $("#sc_b_upd_t.sc-unique-btn-19").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-19").hasClass("disabled")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_product_mob']['buttonStatus'] = $this->nmgp_botoes;
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
