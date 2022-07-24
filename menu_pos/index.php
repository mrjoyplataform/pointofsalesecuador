<?php
include_once('menu_pos_session.php');
@ini_set('session.cookie_httponly', 0);
@ini_set('session.use_only_cookies', 0);
@ini_set('session.cookie_secure', 0);
session_start();
if (!function_exists("sc_check_mobile"))
{
    include_once("../_lib/lib/php/nm_check_mobile.php");
}
$_SESSION['scriptcase']['device_mobile'] = sc_check_mobile();
if (!isset($_SESSION['scriptcase']['display_mobile']))
{
    $_SESSION['scriptcase']['display_mobile'] = true;
}
if ($_SESSION['scriptcase']['device_mobile'])
{
    if ($_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'out' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = false;
    }
    elseif (!$_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'in' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = true;
    }
}
    $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod']      = "";
    $_SESSION['scriptcase']['menu_pos']['glo_nm_perfil']         = "conn_pos";
    $_SESSION['scriptcase']['menu_pos']['glo_nm_path_imag_temp'] = "";
    $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo']      = "";
    //check publication with the prod
    $str_path_apl_url  = $_SERVER['PHP_SELF'];
    $str_path_apl_url  = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['menu_pos']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['menu_pos']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //end check publication with the prod

ob_start();

class menu_pos_class
{
  var $Db;

 function sc_Include($path, $tp, $name)
 {
     if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
     {
         include_once($path);
     }
 } // sc_Include

 function menu_pos_menu()
 {
    global $menu_pos_menuData, $nm_data_fixa;
     if (isset($_POST["nmgp_idioma"]))  
     { 
         $Temp_lang = explode(";" , $_POST["nmgp_idioma"]);  
         if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
          { 
             $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
         } 
         if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
         { 
             $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
         } 
     } 
   
     if (isset($_POST["nmgp_schema"]))  
     { 
         $_SESSION['scriptcase']['str_schema_all'] = $_POST["nmgp_schema"] . "/" . $_POST["nmgp_schema"];
     } 
   
           $nm_versao_sc  = "" ; 
           $_SESSION['scriptcase']['menu_pos']['contr_erro'] = 'off';
           $Campos_Mens_erro = "";
           $sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
           $NM_dir_atual = getcwd();
           if (empty($NM_dir_atual))
           {
               $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
               $str_path_sys          = str_replace("\\", '/', $str_path_sys);
           }
           else
           {
               $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
               $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
           }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
$this->sc_charset['UTF-8'] = 'utf-8';
$this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
$this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
$this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
$this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
$this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
$this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
$this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
$this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
$this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
$this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
$this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
$this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
$this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
$this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
$this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
$this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
$this->sc_charset['WINDOWS-1250'] = 'windows-1250';
$this->sc_charset['WINDOWS-1251'] = 'windows-1251';
$this->sc_charset['WINDOWS-1252'] = 'windows-1252';
$this->sc_charset['TIS-620'] = 'tis-620';
$this->sc_charset['WINDOWS-1253'] = 'windows-1253';
$this->sc_charset['WINDOWS-1254'] = 'windows-1254';
$this->sc_charset['WINDOWS-1255'] = 'windows-1255';
$this->sc_charset['WINDOWS-1256'] = 'windows-1256';
$this->sc_charset['WINDOWS-1257'] = 'windows-1257';
$this->sc_charset['KOI8-R'] = 'koi8-r';
$this->sc_charset['BIG-5'] = 'big5';
$this->sc_charset['EUC-CN'] = 'EUC-CN';
$this->sc_charset['GB18030'] = 'GB18030';
$this->sc_charset['GB2312'] = 'gb2312';
$this->sc_charset['EUC-JP'] = 'euc-jp';
$this->sc_charset['SJIS'] = 'shift-jis';
$this->sc_charset['EUC-KR'] = 'euc-kr';
$_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
$_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
$_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
$_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
$_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
$str_path_web   = $_SERVER['PHP_SELF'];
$str_path_web   = str_replace("\\", '/', $str_path_web);
$str_path_web   = str_replace('//', '/', $str_path_web);
$str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
$path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
$path_btn       = $str_root . $path_link . "_lib/buttons/";
$path_imag_cab  = $path_link . "_lib/img";
$this->force_mobile = false;
$this->menu_orientacao = 'vertical';
$this->path_botoes    = '../_lib/img';
$this->path_imag_apl  = $str_root . $path_link . "_lib/img";
$path_help      = $path_link . "_lib/webhelp/";
$path_libs      = $str_root . $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "menu_pos/img";
$this->path_css = $str_root . $path_link . "_lib/css/";
$_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['menu_pos']['glo_nm_path_imag_temp'];
$this->url_css = "../_lib/css/";
$path_lib_php   = $str_root . $path_link . "_lib/lib/php";
$menu_mobile_hide          = 'S';
$menu_mobile_inicial_state = 'aberto';
$menu_mobile_hide_onclick  = 'S';
$menutree_mobile_float     = 'S';
$menu_mobile_hide_icon     = 'N';
$menu_mobile_hide_icon_menu_position     = 'right';
$mobile_menu_mobile_hide          = 'S';
$mobile_menu_mobile_inicial_state = 'aberto';
$mobile_menu_mobile_hide_onclick  = 'S';
$mobile_menutree_mobile_float     = 'S';
$mobile_menu_mobile_hide_icon     = 'N';
$mobile_menu_mobile_hide_icon_menu_position     = 'right';

$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menu_pos');
if (isset($_SESSION['scriptcase']['user_logout']))
{
    foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
    {
        if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
        {
            unset($_SESSION['scriptcase']['user_logout'][$ind]);
            $nm_apl_dest = $parms['R'];
            $dir = explode("/", $nm_apl_dest);
            if (count($dir) == 1)
            {
                $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/";
            }
?>
            <html>
            <body>
            <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
            </form>
            <script>
             document.FRedirect.submit();
            </script>
            </body>
            </html>
<?php
            exit;
        }
    }
}
if (!defined("SC_ERROR_HANDLER"))
{
    define("SC_ERROR_HANDLER", 1);
    include_once(dirname(__FILE__) . "/menu_pos_erro.php");
}
include_once(dirname(__FILE__) . "/menu_pos_erro.class.php"); 
$this->Erro = new menu_pos_erro();
$str_path = substr($_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'], 0, strrpos($_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'], '/') + 1);
if (!is_file($str_root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
{
    unset($_SESSION['scriptcase']['nm_sc_retorno']);
    unset($_SESSION['scriptcase']['menu_pos']['glo_nm_conexao']);
}

/* Definiciones de las rutas */
$menu_pos_menuData         = array();
$menu_pos_menuData['path'] = array();
$menu_pos_menuData['url']  = array();
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $menu_pos_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $menu_pos_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $menu_pos_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $menu_pos_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$menu_pos_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$menu_pos_menuData['url']['web']   = str_replace("\\", '/', $menu_pos_menuData['url']['web']);
$menu_pos_menuData['path']['root'] = substr($menu_pos_menuData['path']['sys'],  0, -1 * strlen($menu_pos_menuData['url']['web']));
$menu_pos_menuData['path']['app']  = substr($menu_pos_menuData['path']['sys'],  0, strrpos($menu_pos_menuData['path']['sys'],  '/'));
$menu_pos_menuData['path']['link'] = substr($menu_pos_menuData['path']['app'],  0, strrpos($menu_pos_menuData['path']['app'],  '/'));
$menu_pos_menuData['path']['link'] = substr($menu_pos_menuData['path']['link'], 0, strrpos($menu_pos_menuData['path']['link'], '/')) . '/';
$menu_pos_menuData['path']['app'] .= '/';
$menu_pos_menuData['url']['app']   = substr($menu_pos_menuData['url']['web'],  0, strrpos($menu_pos_menuData['url']['web'],  '/'));
$menu_pos_menuData['url']['link']  = substr($menu_pos_menuData['url']['app'],  0, strrpos($menu_pos_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] == "S")
{
    $menu_pos_menuData['url']['link']  = substr($menu_pos_menuData['url']['link'], 0, strrpos($menu_pos_menuData['url']['link'], '/'));
}
$menu_pos_menuData['url']['link']  .= '/';
$menu_pos_menuData['url']['app']   .= '/';


$_SESSION['scriptcase']['menu_pos']['sc_apl_link'] = $menu_pos_menuData['url']['link'];

$nm_img_fun_menu = ""; 
if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
{
    $_SESSION['scriptcase']['str_lang'] = "es";
}
if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
{
    $_SESSION['scriptcase']['str_conf_reg'] = "es_us";
}
$this->str_lang        = $_SESSION['scriptcase']['str_lang'];
$this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
if (isset($_SESSION['scriptcase']['menu_pos']['session_timeout']['lang'])) {
    $this->str_lang = $_SESSION['scriptcase']['menu_pos']['session_timeout']['lang'];
}
elseif (!isset($_SESSION['scriptcase']['menu_pos']['actual_lang']) || $_SESSION['scriptcase']['menu_pos']['actual_lang'] != $this->str_lang) {
    $_SESSION['scriptcase']['menu_pos']['actual_lang'] = $this->str_lang;
    setcookie('sc_actual_lang_pointofsales',$this->str_lang,'0','/');
}
if (!function_exists("NM_is_utf8"))
{
   include_once("../_lib/lib/php/nm_utf8.php");
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('pointofsales');
if ($_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] == "S")
{
    $path_apls     = substr($path_apls, 0, strrpos($path_apls, '/'));
}
$path_apls     .= "/";
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
include("../_lib/lang/". $this->str_lang .".lang.php");
include("../_lib/css/" . $this->str_schema_all . "_menutab.php");
include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
if(isset($pagina_schemamenu) && !empty($pagina_schemamenu) && is_file("../_lib/menuicons/". $pagina_schemamenu .".php"))
{
    include("../_lib/menuicons/". $pagina_schemamenu .".php");
}
$this->img_sep_toolbar = trim($str_toolbar_separator);
include("../_lib/lang/config_region.php");
include("../_lib/lang/lang_config_region.php");
$this->regionalDefault();
$Str_btn_menu = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
$Str_btn_css  = trim($str_button) . "/" . trim($str_button) . ".css";
$this->css_menutab_active_close_icon    = trim($css_menutab_active_close_icon);
$this->css_menutab_inactive_close_icon  = trim($css_menutab_inactive_close_icon);
$this->breadcrumbline_separator  = trim($breadcrumbline_separator);
include($path_btn . $Str_btn_menu);
if (!function_exists("nmButtonOutput"))
{
   include_once("../_lib/lib/php/nm_gp_config_btn.php");
}
asort($this->Nm_lang_conf_region);
$this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
$this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
$this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
$this->nm_data = new nm_data("es");
include_once("menu_pos_toolbar.php");

$this->tab_grupo[0] = "pointofsales/";
if ($_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] != "S")
{
    $this->tab_grupo[0] = "";
}

     $_SESSION['scriptcase']['menu_atual'] = "menu_pos";
     $_SESSION['scriptcase']['menu_apls']['menu_pos'] = array();
     if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
     {
         foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
         {
             if (isset($_SESSION['scriptcase']['menu_pos']['glo_nm_conexao']) && $_SESSION['scriptcase']['menu_pos']['glo_nm_conexao'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menu_pos']['glo_nm_conexao'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menu_pos']['glo_nm_perfil']) && $_SESSION['scriptcase']['menu_pos']['glo_nm_perfil'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menu_pos']['glo_nm_perfil'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menu_pos']['glo_con_' . $NM_con_orig]))
             {
                 $_SESSION['scriptcase']['menu_pos']['glo_con_' . $NM_con_orig] = $NM_con_dest;
             }
         }
     }
$_SESSION['scriptcase']['charset'] = "UTF-8";
ini_set('default_charset', $_SESSION['scriptcase']['charset']);
$_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
foreach ($this->Nm_lang as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
    {
        $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
        $this->Nm_lang[$ind] = $dados;
    }
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
{
    $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
}
if (isset($_SESSION['scriptcase']['menu_pos']['session_timeout']['redir'])) {
    $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
';
    $SS_cod_html .= "<HTML>\r\n";
    $SS_cod_html .= " <HEAD>\r\n";
    $SS_cod_html .= "  <TITLE></TITLE>\r\n";
    $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
    if ($_SESSION['scriptcase']['proc_mobile']) {
        $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
    }
    $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
    $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
    if ($_SESSION['scriptcase']['menu_pos']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body>\r\n";
    }
    else {
        $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH.css\"/>\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body class=\"scMenuHPage\">\r\n";
        $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div>\r\n";
        $SS_cod_html .= "    <table class=\"scMenuHTable\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scMenuHHeader\"><td class=\"scMenuHHeaderFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
        $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
        $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
        $SS_cod_html .= "           target=\"_self\">\r\n";
        $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['menu_pos']['session_timeout']['redir'] . "');\">\r\n";
        $SS_cod_html .= "     </form>\r\n";
        $SS_cod_html .= "    </td></tr></table>\r\n";
        $SS_cod_html .= "    </div></td></tr></table>\r\n";
    }
    $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
    if ($_SESSION['scriptcase']['menu_pos']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['menu_pos']['session_timeout']['redir'] . "');\r\n";
    }
    $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
    $SS_cod_html .= "      {\r\n";
    $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
    $SS_cod_html .= "         {\r\n";
    $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
    $SS_cod_html .= "         }\r\n";
    $SS_cod_html .= "         else\r\n";
    $SS_cod_html .= "         {\r\n";
    $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
    $SS_cod_html .= "             {\r\n";
    $SS_cod_html .= "                 window.close();\r\n";
    $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
    $SS_cod_html .= "             }\r\n";
    $SS_cod_html .= "             else\r\n";
    $SS_cod_html .= "             {\r\n";
    $SS_cod_html .= "                 window.location = url_redir;\r\n";
    $SS_cod_html .= "             }\r\n";
    $SS_cod_html .= "         }\r\n";
    $SS_cod_html .= "      }\r\n";
    $SS_cod_html .= "    </script>\r\n";
    $SS_cod_html .= " </body>\r\n";
    $SS_cod_html .= "</HTML>\r\n";
    unset($_SESSION['scriptcase']['menu_pos']['session_timeout']);
    unset($_SESSION['sc_session']);
}
if (isset($SS_cod_html))
{
    echo $SS_cod_html;
    exit;
}
$_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
$_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
$_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
if (is_dir($path_img_old))
{
    $Res_dir_img = @opendir($path_img_old);
    if ($Res_dir_img)
    {
        while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
        {
           $Str_arquivo = "/" . $Str_arquivo;
           if (@is_file($path_img_old . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_img_old . $Str_arquivo)
           {
               @unlink($path_img_old . $Str_arquivo);
           }
        }
    }
    @closedir($Res_dir_img);
    rmdir($path_img_old);
}
//
if (isset($_GET) && !empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (isset($_POST) && !empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($nmgp_start) ))
{
    $_SESSION['sc_session']['SC_parm_violation'] = true;
}
if (isset($script_case_init))
{
    $_SESSION['sc_session'][1]['menu_pos']['init'] = $script_case_init;
}
else
if (!isset($_SESSION['sc_session'][1]['menu_pos']['init']))
{
    $_SESSION['sc_session'][1]['menu_pos']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['menu_pos']['init'];
if (isset($nmgp_parms) && !empty($nmgp_parms)) 
{ 
    $nmgp_parms = NM_decode_input($nmgp_parms);
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
    $todo  = explode("?@?", $todox);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
       {
           $cadapar[0] = substr($cadapar[0], 11);
           $cadapar[1] = $_SESSION[$cadapar[1]];
       }
        if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
       $Tmp_par   = $cadapar[0];;
       $$Tmp_par = $cadapar[1];
       $_SESSION[$cadapar[0]] = $cadapar[1];
       $ix++;
     }
} 
if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['menu_pos']['session_timeout']['redir']))
{
    unset($_SESSION['sc_session']['SC_parm_violation']);
    echo "<html>";
    echo "<body>";
    echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
    echo "<tr>";
    echo "   <td align=\"center\">";
    echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
    echo "   </b></td>";
    echo " </tr>";
    echo "</table>";
    echo "</body>";
    echo "</html>";
    exit;
}
$nm_url_saida = "";
if (isset($nmgp_url_saida))
{
    $nm_url_saida = $nmgp_url_saida;
    if (isset($script_case_init))
    {
        $nm_url_saida .= "?script_case_init=" . NM_encode_input($script_case_init);
    }
}
if (isset($_POST["nmgp_idioma"]) || isset($_POST["nmgp_schema"]))  
{ 
    $nm_url_saida = $_SESSION['scriptcase']['sc_saida_menu_pos'];
}
elseif (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_menu_pos'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_menu_pos'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
$this->str_schema_all = $STR_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['menu_pos'] = "on";
} 
if (!isset($_SESSION['scriptcase']['menu_pos']['session_timeout']['redir']) && (!isset($_SESSION['scriptcase']['sc_apl_seg']['menu_pos']) || $_SESSION['scriptcase']['sc_apl_seg']['menu_pos'] != "on"))
{ 
    $NM_Mens_Erro = $this->Nm_lang['lang_errm_unth_user'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

    <HTML>
     <HEAD>
      <TITLE></TITLE>
     <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
      <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>      <META http-equiv="Pragma" content="no-cache"/>
      <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
     </HEAD>
     <body>
       <table align="center" class="scGridBorder"><tr><td style="padding: 0">
       <table style="width: 100%" class="scGridTabela"><tr class="scGridFieldOdd"><td class="scGridFieldOddFont" style="padding: 15px 30px; text-align: center">
        <?php echo $NM_Mens_Erro; ?>
        <br />
        <form name="Fseg" method="post" target="_self">
         <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($script_case_init) ?>"/> 
         <input type="button" name="sc_sai_seg" value="OK" onclick="nm_saida()"> 
        </form> 
       </td></tr></table>
       </td></tr></table>
<?php
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']))
              {
?>
<br /><br /><br />
<table align="center" class="scGridBorder" style="width: 450px"><tr><td style="padding: 0">
 <table style="width: 100%" class="scGridTabela">
  <tr class="scGridFieldOdd">
   <td class="scGridFieldOddFont" style="padding: 15px 30px">
    <?php echo $this->Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
              }
?>
     </body>
     <?php
     if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true') || (isset($_SESSION['scriptcase']['sc_outra_jan']) && ($_SESSION['scriptcase']['sc_outra_jan'] == 'menutree' || $_SESSION['scriptcase']['sc_outra_jan'] == 'menu')))
     {
       $saida_final = 'window.close();';
     }
     else
     {
       $saida_final = 'history.back();';
     }
     ?>
    <script type="text/javascript">
      function nm_saida()
      {
<?php 
             echo $saida_final;
?> 
      }
     </script> 
<?php
    exit;
} 
$this->sc_Include($path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
include_once($path_adodb . "/adodb.inc.php"); 
$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menu_pos'); 
perfil_lib($path_libs);
if (!isset($_SESSION['sc_session'][1]['SC_Check_Perfil']))
{
    if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($path_libs, $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod']);
    $_SESSION['sc_session'][1]['SC_Check_Perfil'] = true;
}
$nm_falta_var    = ""; 
$nm_falta_var_db = ""; 
if (isset($_SESSION['scriptcase']['menu_pos']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['menu_pos']['glo_nm_conexao']))
{
    db_conect_devel($_SESSION['scriptcase']['menu_pos']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'], 'pointofsales', 2); 
}
if (isset($_SESSION['scriptcase']['menu_pos']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['menu_pos']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['menu_pos']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "");
    if (empty($_SESSION['scriptcase']['glo_senha_protect']))
    {
        $nm_falta_var .= "Perfil=" . $_SESSION['scriptcase']['glo_perfil'] . "; ";
    }
}
if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
{
    $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
    if (strlen($SC_temp) == 2)
    {
       $_SESSION['scriptcase']['menu_pos']['SC_sep_date']  = substr($SC_temp, 0, 1); 
       $_SESSION['scriptcase']['menu_pos']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
   }
   else
    {
       $_SESSION['scriptcase']['menu_pos']['SC_sep_date']  = $SC_temp; 
       $_SESSION['scriptcase']['menu_pos']['SC_sep_date1'] = $SC_temp; 
   }
}
if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
{
    $nm_falta_var_db .= "glo_tpbanco; ";
}
else
{
    $nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
}
if (!isset($_SESSION['scriptcase']['glo_servidor']))
{
    $nm_falta_var_db .= "glo_servidor; ";
}
else
{
    $nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
}
if (!isset($_SESSION['scriptcase']['glo_banco']))
{
    $nm_falta_var_db .= "glo_banco; ";
}
else
{
    $nm_banco = $_SESSION['scriptcase']['glo_banco']; 
}
if (!isset($_SESSION['scriptcase']['glo_usuario']))
{
    $nm_falta_var_db .= "glo_usuario; ";
}
else
{
    $nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
}
if (!isset($_SESSION['scriptcase']['glo_senha']))
{
    $nm_falta_var_db .= "glo_senha; ";
}
else
{
    $nm_senha = $_SESSION['scriptcase']['glo_senha']; 
}
$nm_con_db2 = array();
$nm_database_encoding = "";
if (isset($_SESSION['scriptcase']['glo_database_encoding']))
{
    $nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
}
$nm_arr_db_extra_args = array();
if (isset($_SESSION['scriptcase']['glo_use_ssl']))
{
    $nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
{
    $nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
{
    $nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
{
    $nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
{
    $nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
{
    $nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
{
    $nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
{
    $nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
{
    $nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
{
    $nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
{
    $nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
}
if (isset($_SESSION['scriptcase']['oracle_type']))
{
    $nm_arr_db_extra_args['oracle_type'] = $_SESSION['scriptcase']['oracle_type']; 
}
$nm_con_persistente = "";
$nm_con_use_schema  = "";
if (isset($_SESSION['scriptcase']['glo_use_persistent']))
{
    $nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
}
if (isset($_SESSION['scriptcase']['glo_use_schema']))
{
    $nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
}
if (!empty($nm_falta_var) || !empty($nm_falta_var_db))
{
    if (empty($nm_falta_var_db))
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
        echo "  " . $nm_falta_var;
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    else
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font>";
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    if (isset($_SESSION['scriptcase']['nm_ret_exec']) && '' != $_SESSION['scriptcase']['nm_ret_exec'])
    { 
        if (isset($_SESSION['sc_session'][1]['menu_pos']['sc_outra_jan']) && $_SESSION['sc_session'][1]['menu_pos']['sc_outra_jan'])
        {
            echo "<a href='javascript:window.close()'><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
        else 
        { 
            echo "<a href='" . $_SESSION['scriptcase']['nm_ret_exec'] . "><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
    } 
    exit ;
} 
if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
{
    $nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
{
    $nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
}
$sc_tem_trans_banco = false;
$this->nm_bases_access    = array("access", "ado_access", "ace_access");
$this->nm_bases_db2       = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
$this->nm_bases_ibase     = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
$this->nm_bases_informix  = array("informix", "informix72", "pdo_informix");
$this->nm_bases_mssql     = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib", "azure_mssql", "azure_ado_mssql", "azure_adooledb_mssql", "azure_odbc_mssql", "azure_mssqlnative", "azure_pdo_sqlsrv", "azure_pdo_dblib", "googlecloud_mssql", "googlecloud_ado_mssql", "googlecloud_adooledb_mssql", "googlecloud_odbc_mssql", "googlecloud_mssqlnative", "googlecloud_pdo_sqlsrv", "googlecloud_pdo_dblib", "amazonrds_mssql", "amazonrds_ado_mssql", "amazonrds_adooledb_mssql", "amazonrds_odbc_mssql", "amazonrds_mssqlnative", "amazonrds_pdo_sqlsrv", "amazonrds_pdo_dblib");
$this->nm_bases_mysql     = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
$this->nm_bases_postgres  = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
$this->nm_bases_oracle    = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle", "oraclecloud_oci8", "oraclecloud_oci805", "oraclecloud_oci8po", "oraclecloud_odbc_oracle", "oraclecloud_oracle", "oraclecloud_pdo_oracle", "amazonrds_oci8", "amazonrds_oci805", "amazonrds_oci8po", "amazonrds_odbc_oracle", "amazonrds_oracle", "amazonrds_pdo_oracle");
$this->nm_bases_sqlite    = array("sqlite", "sqlite3", "pdosqlite");
$this->nm_bases_sybase    = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
$this->nm_bases_vfp       = array("vfp");
$this->nm_bases_odbc      = array("odbc");
$this->nm_bases_progress  = array("pdo_progress_odbc", "progress");
$_SESSION['scriptcase']['sc_num_page'] = 1;
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcBiDQX7HABYVWJwHuNOV9FeV5FGVoF7D9BiVINUD1rKHQBiHgrKVkXeH5FYHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWFaHIF7HQBqVINUD1zGZMJeDMvCVkJ3DWX7HIJeHQXGDuFaDSvCVWJeDMvOVIB/HEX/VoX7HQFYZkBiDSvOZMBOHgNOZSJqDuFaHIFUHQXGDuFaHABYHQBODMvmDkBsDWJeHIraDcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeH9BiZ1BYHQB/DMBOVIBsV5FYHMJsHQFYZkFGHIrwHQFaHgNODkXKDuFaHMFaHQXGDuFaD1veHQNUDMvmV9BUDWJeHINUHQFYZkFGD1rwHuFUHgBOHErCHEXKZuB/DcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqZSBOHAN7HQBqHgNKHEJqDWFqDoJsHQXGDuBqD1vOV5BOHgvOVIB/HEFYHMFUHQFYZkBiDSvOZMJeHgrKZSJ3V5XCHIrqHQXGDQFUHIrKHQJsHgvOZSNiH5FqHIJsDcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeZ9XGHAvCV5BODMBOZSJqDWJeHIFUHQFYZ1BOHANOHQX7HgrKVkJ3H5X/DoXGHQXGDuBqHANOHQNUDMrYVcB/DWXKVEX7HQFYZ1BOHIBeHQJeHgvsHENiDWB3DoXGDcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqZSBqZ1NOHuFUHgBOHEJqHEFqHMJsHQXGDuFaD1veHuB/HgrwDkBsHEFGVErqHQFYZkBiHArYHQJsDMvCVkJqH5FGDoJeHQXGDQFUDSN7HuX7DMvmZSNiDWJeHIF7DcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeH9FUHANOHQJsHgvOVcBUH5FqHIraHQFYZkFGHIveHQraHgBOHArCDuJeHIBiHQXGDQFUDSN7V5FaDMBOVcXKHEBmVoX7HQFYZkFGDSNOHuFGHgNKVkJ3DuXKZuXGDcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqVINUHIveHQNUHgrKZSJ3H5F/HMFGHQXGDQFUHAN7HQFaDMvmV9BUHEFYHMJsHQFYZkFGDSBeHuBqHgNOVkJqH5FGZuBOHQXGDuBqHABYHQXGDMNOV9BUDWJeHIFUDcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeH9FUHIrwHuFUHgrwVIB/DWJeHIX7HQFYZkFGHAvCD5XGHgBeVkJqDWXCHMB/HQXGDuFaHAvCVWJeDMvsVcB/DuX7HIXGHQFYZkBiD1zGZMB/DMveVkJ3HEB3ZuBODcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqZSBqHINKZMB/HgBOHErCV5FqDoJsHQXGDuFaD1veHuF7DMvmDkBsDWFaHMJeHQFYZkBiHANOHQBiDMvCHENiDWr/HIFUHQXGDuBqHANOHuNUDMBOV9FeHEBmVEFGDcBwH9B/HIrwV5JeDMBYDkBsH5X/VoJsHQJwZ9JeDSvCV5BiDMzGVcBODWBmVoFaD9BsZ1FaHArYV5FGDEvsHEFiHEFqDoBOD9XsDQJsD1vOV5BiDMzGV9FeH5XCVoFGDcBwZ1F7HABYD5XGDMzGHAFKDWF/DoXGD9JKDQJsZ1rwVWXGHuNOZSrCDuB7VoFaD9XGZ1B/Z1BeZMFaDMrYHEFiH5FYDoraD9XsZ9JeHAveVWJwHuzGDkBOH5XKVoFaDcJUZ1B/DSrYZMB/DEBeHEFiDWFqDoJeDcJUDQJsZ1rwD5JeHgNKVcrsH5XCDoX7DcJUZ1B/Z1vOD5raDMzGVkXeV5FaDoJeDcJUDQJsHIBeD5BqHgvsDkBODWFYDoJsD9XOH9B/DSrYV5FUDMzGDkBsV5B3DoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQJmH9BqD1rwHQFaHgBOVkJqHEB7VoFGHQJeDuFaDSrwHuJwDMvOZSNiDuFGDoXGHQXGZ1FGHIrwHQJeHgveVkJ3HEB3VoFGHQJeDQBqHIrKV5FaHgvOVcFeH5B3VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQXsH9BiZ1vCVWBqDMBYV9BUDWBmDoXGDcFYZkFGHINaZMBqDMvCHENiDuXKVoFGHQJeDQFUDSvCVWBODMzGZSNiHEX/DoXGHQNwVINUHANOHQJeHgNKZSJ3DuX/DoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQBqZ1BiHIBeHuFaHgBOHEJqDWrGVoFGDcBiZ9XGHABYV5FaHgrwVIBsHEFGDoXGHQJmZSBqZ1rYHQraHgBeZSJ3V5B3VoFGHQXODuBqHANOHuX7DMrYZSNiH5B7VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQXODQFUHABYHQJwDMrYZSNiDuFGDoXGHQNmH9BqD1rKHuJsHgBeZSJqHEB3VoFGHQXsZSFUHArYHQBOHgvOVcXKH5B7DoXGHQXGZkFGD1rwHuFGHgrKVkJ3DuX/DoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiDcNmZkBiHIBeHQBqHgvsHENiDWB3VoFGHQXOZSBiZ1BYHQXGDMvmZSNiDuFGDoXGDcNmZ1BiD1rwHuJsHgBOVkJ3DuXKVoFGHQXOZSBiZ1zGVWXGHgvOVcBUHEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQFYZSBiD1BeHurqDMrYVcFeHEBmDoXGDcFYZkBiHIBOZMFaHgNODkXKH5BmVoFGHQNmDQB/D1veHQJwDMBOZSNiDWBmDoXGHQBsZ1BiHINKD5JeHgNOZSJqDurmDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQNwZ1BOHAvCZMJeHgNKVkJqHEB7VoFGHQXsDuFaHAvOVWBODMBOVcB/DurGDoXGHQNwZ1BOHABYHuFUDMveVkJqH5FGVoFGHQJeDuBqDSBYHuraHgrwVIB/HEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQJKZSBiZ1vCV5BqHgvOV9FeDWXKDoXGHQJmVINUHIBeHQNUHgrKZSJqH5FGVoFGHQNwZSBiDSN7HuJeDMrYVcFeHEFGDoXGHQXGZSBqD1rwHuBOHgBOZSJ3DWrGDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQNwZ1X7DSrYHuFGHgNOHArCV5B3VoFGDcBiDQB/HABYHuX7DMvmV9FeDWrmDoXGHQJmH9BOHArKHuBqHgBOZSJ3H5X/VoFGHQJeDQB/HIrwHuX7HgrwZSNiHEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsDcBiH9FUD1BeHQXGDMBYVcFeDurGDoXGHQXGZ1BiD1rwHQFaHgBOVkJ3H5X/VoFGHQFYH9BiHIBeHuraDMvOZSNiDWrmDoXGHQXGZSBqHAN7HuFUDMvCVkJqDWBmDoF7D9XsDQJsDSBYV5FGHgNKDkBsDuB7VEBiDcFYVIJsD1rwHQFGHgNOVkJ3DuXKVoFGHQXsDuFaDSN7HurqDMNOVcFeV5X/DoXGHQBsH9BOHArYHQBOHgNOHErCHEB3VoFGDcXGDuFaHAN7V5FaHgrwVcXKDuFGVoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQFYH9FaHANOD5NUDErKDkFeV5FaZuBqD9NmZSFGHINaV5JwHuvmVcrsH5XCDoXGD9BsZ1FUZ1BeD5JeDMBYZSJGDWr/VoXGD9NwDQJwD1veV5FGHgvsVcFCH5FqDoraHQFYVIJwD1rwV5FGDEBeHEXeH5X/DoF7D9NwZSX7D1BeV5raHuvmVcFKV5X7VoFGD9BiZ1X7Z1BeHQJsDEBOHEFiHEFqVoB/D9XsH9FGHIrwV5FUHuzGVIBOH5XKDoXGHQNmZkBiD1zGV5X7HgNODkXKH5F/HIJsD9XsZ9JeD1BeD5F7DMvmVcFKV5X/VENUDcFYZkFGHANOHQrqHgrKZSJqHEXCHIXGHQNmZSBiDSN7V5FaDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5FaDEBOHEXeDWFqVoBiD9NmDQFUZ1rwV5JeHuNODkFCH5B7DoJsD9XOZ1F7HIveD5BqHgBeHEFiV5B3DoF7D9XsDuFaHAveHurqDMvOV9BUDWXKVoF7HQBsVIJsHAzGD5BOHgveHEJqHEB7DoBqHQBiDuBqHAN7HurqDMvOVIB/H5XKVEraHQJmZ1F7Z1vmD5rqDEBOHArCDWBmVoFGD9FYDQFaHArYVWJeHuzGVcFeDWFYHIrqHQBsZ1F7HAN7HuJeDEvsVkXeHEXCHIJsD9XsZ9JeD1BeD5F7DMvmVcFKDWFYVorqDcNwH9B/HAN7D5XGDEBOZSXeV5XCZuJsDcBwDuFaHAveD5NUHgNKDkBOV5FYHMBiHQNmVINUHAvsD5XGHgveDkXKDWBmZuBqHQBiZ9XGD1veHuFaHuNOZSrCH5FqDoXGHQJmZ1X7HArKHQBiDEBOHErCV5FqDoraD9NwDQBqHANKV5JeHgvOVcB/DWF/HIBiHQXOH9BqHArKV5FUDMrYZSXeV5FqHIJsHQNwH9FGHABYV5FUHuNOZSrCDWXCHINUD9BsH9FaD1rwV5FaDMrYHErCDWX7ZuXGDcJeDQX7HIBeV5FUDMvmVcFKV5BmVoBqD9BsZkFGHAvsZMJeHgvCDkXKDWBmZura";
 $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['menu_pos']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['menu_pos']['glo_nm_conexao']))
{ 
   $this->Db = db_conect_devel($_SESSION['scriptcase']['menu_pos']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'], 'pointofsales'); 
} 
else 
{ 
   $this->Db = db_conect($nm_tpbanco, $nm_servidor, $nm_usuario, $nm_senha, $nm_banco, $glo_senha_protect, "S", $nm_con_persistente, $nm_con_db2, $nm_database_encoding, $nm_arr_db_extra_args); 
} 
$this->nm_tpbanco = $nm_tpbanco; 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_ibase) && function_exists('ibase_timefmt'))
{
    ibase_timefmt('%Y-%m-%d %H:%M:%S');
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_sybase))
{
   $this->Db->fetchMode = ADODB_FETCH_BOTH;
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_db2))
{
   $this->Db->fetchMode = ADODB_FETCH_NUM;
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_mssql))
{
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_oracle))
{
   $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
   $_SESSION['sc_session'][$this->Ini->sc_page]['menu_pos']['decimal_db'] = ".";
} 
//
$this->NM_gera_log_insert("Scriptcase", "access");
/* Dados do menu em sessao */
$_SESSION['nm_menu'] = array('prod' => $str_root . $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'] . '/third/COOLjsMenu/',
                              'url' => $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod'] . '/third/COOLjsMenu/');

if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == "true") || (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'menu_pos'))
{
    $_SESSION['sc_session'][1]['menu_pos']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
    $_SESSION['scriptcase']['sc_saida_menu_pos'] = "javascript:window.close()";
}
/* Menú de configuración de las variables */
$menu_pos_menuData['iframe'] = TRUE;

if (!isset($_SESSION['scriptcase']['sc_apl_seg']))
{
    $_SESSION['scriptcase']['sc_apl_seg'] = array();
}
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("chart_sales") . "/chart_sales_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['chart_sales']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['chart_sales'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['chart_sales'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard") . "/dashboard_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_pos_factura") . "/form_pos_factura_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_pos_factura']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_pos_factura'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_pos_factura'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_empleados") . "/grid_empleados_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_empleados']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_empleados'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_empleados'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_kioskos") . "/form_kioskos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_kioskos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_kioskos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_kioskos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_turnos_reporte") . "/grid_turnos_reporte_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_turnos_reporte']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_turnos_reporte'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_turnos_reporte'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pays_type") . "/grid_pays_type_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pays_type']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_pays_type'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_pays_type'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_status") . "/form_status_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_status']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_status'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_status'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_customer") . "/grid_customer_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_customer']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_customer'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_customer'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_customer_clubmrjoy") . "/grid_customer_clubmrjoy_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_customer_clubmrjoy']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_customer_clubmrjoy'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_customer_clubmrjoy'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_v_ele_reporte_facturas") . "/grid_v_ele_reporte_facturas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_v_ele_reporte_facturas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_v_ele_reporte_facturas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_v_ele_reporte_facturas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_sales") . "/grid_sales_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_sales'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_sales'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_sales_detail_reporte") . "/grid_sales_detail_reporte_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_sales_detail_reporte_categoria") . "/grid_sales_detail_reporte_categoria_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte_categoria']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte_categoria'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte_categoria'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("chart_sales") . "/chart_sales_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['chart_sales']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['chart_sales'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['chart_sales'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("chart_view_sales_detail_group_todo") . "/chart_view_sales_detail_group_todo_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['chart_view_sales_detail_group_todo']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['chart_view_sales_detail_group_todo'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['chart_view_sales_detail_group_todo'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_ele_parametros") . "/form_ele_parametros_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_ele_parametros']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_ele_parametros'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_ele_parametros'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_promedio_satisfaccion") . "/grid_promedio_satisfaccion_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_promedio_satisfaccion']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_promedio_satisfaccion'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_promedio_satisfaccion'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_view_boletos_satisfaction") . "/grid_view_boletos_satisfaction_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_satisfaction']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_satisfaction'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_satisfaction'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_boletos_califica") . "/form_boletos_califica_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_boletos_califica']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_boletos_califica'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_boletos_califica'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_product") . "/grid_product_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_product']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_product'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_product'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_saldos_kardex_fix") . "/grid_saldos_kardex_fix_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_saldos_kardex_fix']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_saldos_kardex_fix'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_saldos_kardex_fix'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_supplier") . "/grid_supplier_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_supplier']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_supplier'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_supplier'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_purchase") . "/grid_purchase_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_purchase']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_purchase'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_purchase'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_product_listado") . "/grid_product_listado_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_product_listado']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_product_listado'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_product_listado'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_view_movim_inventario") . "/grid_view_movim_inventario_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_view_movim_inventario']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_view_movim_inventario'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_view_movim_inventario'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_category") . "/form_category_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_category']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_category'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_category'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_view_boletos_pendientes_salida") . "/grid_view_boletos_pendientes_salida_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_pendientes_salida']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_pendientes_salida'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_pendientes_salida'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_sales_pdf_reimpresion") . "/grid_sales_pdf_reimpresion_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_pdf_reimpresion']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_sales_pdf_reimpresion'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_sales_pdf_reimpresion'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_readtarjeta_arcade_consulta") . "/control_readtarjeta_arcade_consulta_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_readtarjeta_arcade_consulta']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_readtarjeta_arcade_consulta'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_readtarjeta_arcade_consulta'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_devices_arcade_multi") . "/form_devices_arcade_multi_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_devices_arcade_multi']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_devices_arcade_multi'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_devices_arcade_multi'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_read_tarjeta_rfid_decimal") . "/control_read_tarjeta_rfid_decimal_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_read_tarjeta_rfid_decimal']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_read_tarjeta_rfid_decimal'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_read_tarjeta_rfid_decimal'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tarjetasmovim") . "/grid_tarjetasmovim_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tarjetasmovim']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tarjetasmovim'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_tarjetasmovim'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_torno_entrada_admin") . "/control_torno_entrada_admin_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_torno_entrada_admin']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_torno_entrada_admin'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_torno_entrada_admin'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_torno_salida_admin") . "/control_torno_salida_admin_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_torno_salida_admin']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_torno_salida_admin'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_torno_salida_admin'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_movimtorno") . "/grid_movimtorno_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_movimtorno']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_movimtorno'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_movimtorno'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_Login") . "/sec_app_Login_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_grid_sec_users") . "/sec_app_grid_sec_users_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_grid_sec_apps") . "/sec_app_grid_sec_apps_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_apps']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_apps'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_apps'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_grid_sec_groups") . "/sec_app_grid_sec_groups_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_groups']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_groups'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_groups'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_grid_sec_users_groups") . "/sec_app_grid_sec_users_groups_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users_groups']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users_groups'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users_groups'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_search_sec_groups") . "/sec_app_search_sec_groups_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_search_sec_groups']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_search_sec_groups'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_search_sec_groups'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_sync_apps") . "/sec_app_sync_apps_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_sync_apps']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_sync_apps'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_sync_apps'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_add_2fa") . "/sec_app_add_2fa_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_add_2fa']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_add_2fa'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_add_2fa'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_settings") . "/sec_app_settings_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_settings']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_settings'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_settings'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_change_pswd") . "/sec_app_change_pswd_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_change_pswd']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_change_pswd'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_change_pswd'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sec_app_Login") . "/sec_app_Login_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login'] = "on";
} 
/* Elementos de menú */

$sOutputBuffer = ob_get_contents();
ob_end_clean();

 $nm_var_lab[0] = "Dashboard";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[0]))
{
    $nm_var_lab[0] = sc_convert_encoding($nm_var_lab[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[1] = "Puntos de venta";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[1]))
{
    $nm_var_lab[1] = sc_convert_encoding($nm_var_lab[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[2] = "Configuracion cajas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[2]))
{
    $nm_var_lab[2] = sc_convert_encoding($nm_var_lab[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[3] = "Personal";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[3]))
{
    $nm_var_lab[3] = sc_convert_encoding($nm_var_lab[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[4] = "Kioskos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[4]))
{
    $nm_var_lab[4] = sc_convert_encoding($nm_var_lab[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[5] = "Cierres de caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[5]))
{
    $nm_var_lab[5] = sc_convert_encoding($nm_var_lab[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[6] = "Formas de pago";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[6]))
{
    $nm_var_lab[6] = sc_convert_encoding($nm_var_lab[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[7] = "Facturacion";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[7]))
{
    $nm_var_lab[7] = sc_convert_encoding($nm_var_lab[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[8] = "Clientes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[8]))
{
    $nm_var_lab[8] = sc_convert_encoding($nm_var_lab[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[9] = "Club Mr. Joy";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[9]))
{
    $nm_var_lab[9] = sc_convert_encoding($nm_var_lab[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[10] = "Reporte Facturas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[10]))
{
    $nm_var_lab[10] = sc_convert_encoding($nm_var_lab[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[11] = "Resumen de ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[11]))
{
    $nm_var_lab[11] = sc_convert_encoding($nm_var_lab[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[12] = "Detalle de ventas por producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[12]))
{
    $nm_var_lab[12] = sc_convert_encoding($nm_var_lab[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[13] = "Detalle de Ventas por Categoria";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[13]))
{
    $nm_var_lab[13] = sc_convert_encoding($nm_var_lab[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[14] = "Gráfica de ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[14]))
{
    $nm_var_lab[14] = sc_convert_encoding($nm_var_lab[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[15] = "Gráfica de ventas por categoria y producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[15]))
{
    $nm_var_lab[15] = sc_convert_encoding($nm_var_lab[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[16] = "Parametros factura electronica (proveedor)";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[16]))
{
    $nm_var_lab[16] = sc_convert_encoding($nm_var_lab[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[17] = "Satisfacción del cliente";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[17]))
{
    $nm_var_lab[17] = sc_convert_encoding($nm_var_lab[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[18] = "Promedio de satiscacción por producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[18]))
{
    $nm_var_lab[18] = sc_convert_encoding($nm_var_lab[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[19] = "Detalle de satisfacción";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[19]))
{
    $nm_var_lab[19] = sc_convert_encoding($nm_var_lab[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[20] = "Tabla de valoración";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[20]))
{
    $nm_var_lab[20] = sc_convert_encoding($nm_var_lab[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[21] = "Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[21]))
{
    $nm_var_lab[21] = sc_convert_encoding($nm_var_lab[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[22] = "Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[22]))
{
    $nm_var_lab[22] = sc_convert_encoding($nm_var_lab[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[23] = "Reconstruccion de saldos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[23]))
{
    $nm_var_lab[23] = sc_convert_encoding($nm_var_lab[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[24] = "Combos / Recetas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[24]))
{
    $nm_var_lab[24] = sc_convert_encoding($nm_var_lab[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[25] = "Proveedores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[25]))
{
    $nm_var_lab[25] = sc_convert_encoding($nm_var_lab[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[26] = "Ingresar compra";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[26]))
{
    $nm_var_lab[26] = sc_convert_encoding($nm_var_lab[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[27] = "Listado de productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[27]))
{
    $nm_var_lab[27] = sc_convert_encoding($nm_var_lab[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[28] = "Kardex";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[28]))
{
    $nm_var_lab[28] = sc_convert_encoding($nm_var_lab[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[29] = "Boletos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[29]))
{
    $nm_var_lab[29] = sc_convert_encoding($nm_var_lab[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[30] = "Reimpresion";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[30]))
{
    $nm_var_lab[30] = sc_convert_encoding($nm_var_lab[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[31] = "Arcade";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[31]))
{
    $nm_var_lab[31] = sc_convert_encoding($nm_var_lab[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[32] = "Consulta - Cambio Tarjeta";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[32]))
{
    $nm_var_lab[32] = sc_convert_encoding($nm_var_lab[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[33] = "Maquinas Arcade";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[33]))
{
    $nm_var_lab[33] = sc_convert_encoding($nm_var_lab[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[34] = "Ingreso de tarjetas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[34]))
{
    $nm_var_lab[34] = sc_convert_encoding($nm_var_lab[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[35] = "Movimientos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[35]))
{
    $nm_var_lab[35] = sc_convert_encoding($nm_var_lab[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[36] = "Tokens";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[36]))
{
    $nm_var_lab[36] = sc_convert_encoding($nm_var_lab[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[37] = "Dispositvos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[37]))
{
    $nm_var_lab[37] = sc_convert_encoding($nm_var_lab[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[38] = "Tornos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[38]))
{
    $nm_var_lab[38] = sc_convert_encoding($nm_var_lab[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[39] = "Apertura torno Entrada";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[39]))
{
    $nm_var_lab[39] = sc_convert_encoding($nm_var_lab[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[40] = "Apertura torno Salida";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[40]))
{
    $nm_var_lab[40] = sc_convert_encoding($nm_var_lab[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[41] = "Movimientos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[41]))
{
    $nm_var_lab[41] = sc_convert_encoding($nm_var_lab[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[0] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[0]))
{
    $nm_var_hint[0] = sc_convert_encoding($nm_var_hint[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[1] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[1]))
{
    $nm_var_hint[1] = sc_convert_encoding($nm_var_hint[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[2] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[2]))
{
    $nm_var_hint[2] = sc_convert_encoding($nm_var_hint[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[3] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[3]))
{
    $nm_var_hint[3] = sc_convert_encoding($nm_var_hint[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[4] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[4]))
{
    $nm_var_hint[4] = sc_convert_encoding($nm_var_hint[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[5] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[5]))
{
    $nm_var_hint[5] = sc_convert_encoding($nm_var_hint[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[6] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[6]))
{
    $nm_var_hint[6] = sc_convert_encoding($nm_var_hint[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[7] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[7]))
{
    $nm_var_hint[7] = sc_convert_encoding($nm_var_hint[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[8] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[8]))
{
    $nm_var_hint[8] = sc_convert_encoding($nm_var_hint[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[9] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[9]))
{
    $nm_var_hint[9] = sc_convert_encoding($nm_var_hint[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[10] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[10]))
{
    $nm_var_hint[10] = sc_convert_encoding($nm_var_hint[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[11] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[11]))
{
    $nm_var_hint[11] = sc_convert_encoding($nm_var_hint[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[12] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[12]))
{
    $nm_var_hint[12] = sc_convert_encoding($nm_var_hint[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[13] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[13]))
{
    $nm_var_hint[13] = sc_convert_encoding($nm_var_hint[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[14] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[14]))
{
    $nm_var_hint[14] = sc_convert_encoding($nm_var_hint[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[15] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[15]))
{
    $nm_var_hint[15] = sc_convert_encoding($nm_var_hint[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[16] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[16]))
{
    $nm_var_hint[16] = sc_convert_encoding($nm_var_hint[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[17] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[17]))
{
    $nm_var_hint[17] = sc_convert_encoding($nm_var_hint[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[18] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[18]))
{
    $nm_var_hint[18] = sc_convert_encoding($nm_var_hint[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[19] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[19]))
{
    $nm_var_hint[19] = sc_convert_encoding($nm_var_hint[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[20] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[20]))
{
    $nm_var_hint[20] = sc_convert_encoding($nm_var_hint[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[21] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[21]))
{
    $nm_var_hint[21] = sc_convert_encoding($nm_var_hint[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[22] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[22]))
{
    $nm_var_hint[22] = sc_convert_encoding($nm_var_hint[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[23] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[23]))
{
    $nm_var_hint[23] = sc_convert_encoding($nm_var_hint[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[24] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[24]))
{
    $nm_var_hint[24] = sc_convert_encoding($nm_var_hint[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[25] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[25]))
{
    $nm_var_hint[25] = sc_convert_encoding($nm_var_hint[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[26] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[26]))
{
    $nm_var_hint[26] = sc_convert_encoding($nm_var_hint[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[27] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[27]))
{
    $nm_var_hint[27] = sc_convert_encoding($nm_var_hint[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[28] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[28]))
{
    $nm_var_hint[28] = sc_convert_encoding($nm_var_hint[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[29] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[29]))
{
    $nm_var_hint[29] = sc_convert_encoding($nm_var_hint[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[30] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[30]))
{
    $nm_var_hint[30] = sc_convert_encoding($nm_var_hint[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[31] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[31]))
{
    $nm_var_hint[31] = sc_convert_encoding($nm_var_hint[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[32] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[32]))
{
    $nm_var_hint[32] = sc_convert_encoding($nm_var_hint[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[33] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[33]))
{
    $nm_var_hint[33] = sc_convert_encoding($nm_var_hint[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[34] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[34]))
{
    $nm_var_hint[34] = sc_convert_encoding($nm_var_hint[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[35] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[35]))
{
    $nm_var_hint[35] = sc_convert_encoding($nm_var_hint[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[36] = "Ingresa las tarjetas RFID al sistema";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[36]))
{
    $nm_var_hint[36] = sc_convert_encoding($nm_var_hint[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[37] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[37]))
{
    $nm_var_hint[37] = sc_convert_encoding($nm_var_hint[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[38] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[38]))
{
    $nm_var_hint[38] = sc_convert_encoding($nm_var_hint[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[39] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[39]))
{
    $nm_var_hint[39] = sc_convert_encoding($nm_var_hint[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[40] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[40]))
{
    $nm_var_hint[40] = sc_convert_encoding($nm_var_hint[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[41] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[41]))
{
    $nm_var_hint[41] = sc_convert_encoding($nm_var_hint[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[42] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[42]))
{
    $nm_var_hint[42] = sc_convert_encoding($nm_var_hint[42], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[43] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[43]))
{
    $nm_var_hint[43] = sc_convert_encoding($nm_var_hint[43], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[44] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[44]))
{
    $nm_var_hint[44] = sc_convert_encoding($nm_var_hint[44], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[45] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[45]))
{
    $nm_var_hint[45] = sc_convert_encoding($nm_var_hint[45], $_SESSION['scriptcase']['charset'], "UTF-8");
}
$saida_apl = $_SESSION['scriptcase']['sc_saida_menu_pos'];
if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) == "on")
{
    $menu_pos_menuData['data'] .= "item_57|.|" . $nm_var_lab[0] . "|menu_pos_form_php.php?sc_item_menu=item_57&sc_apl_menu=dashboard&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[0] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_57|.|" . $nm_var_lab[0] . "||||_self|disabled\n";
}
$menu_pos_menuData['data'] .= "item_14|.|" . $nm_var_lab[1] . "||" . $nm_var_hint[1] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_pos_factura']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_pos_factura']) == "on")
{
    $menu_pos_menuData['data'] .= "item_15|..|" . $nm_var_lab[2] . "|menu_pos_form_php.php?sc_item_menu=item_15&sc_apl_menu=form_pos_factura&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[2] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_15|..|" . $nm_var_lab[2] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_empleados']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_empleados']) == "on")
{
    $menu_pos_menuData['data'] .= "item_28|..|" . $nm_var_lab[3] . "|menu_pos_form_php.php?sc_item_menu=item_28&sc_apl_menu=grid_empleados&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[3] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_28|..|" . $nm_var_lab[3] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_kioskos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_kioskos']) == "on")
{
    $menu_pos_menuData['data'] .= "item_29|..|" . $nm_var_lab[4] . "|menu_pos_form_php.php?sc_item_menu=item_29&sc_apl_menu=form_kioskos&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[4] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_29|..|" . $nm_var_lab[4] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_turnos_reporte']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_turnos_reporte']) == "on")
{
    $menu_pos_menuData['data'] .= "item_31|..|" . $nm_var_lab[5] . "|menu_pos_form_php.php?sc_item_menu=item_31&sc_apl_menu=grid_turnos_reporte&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[5] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_31|..|" . $nm_var_lab[5] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pays_type']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pays_type']) == "on")
{
    $menu_pos_menuData['data'] .= "item_11|..|" . $nm_var_lab[6] . "|menu_pos_form_php.php?sc_item_menu=item_11&sc_apl_menu=grid_pays_type&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[6] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_11|..|" . $nm_var_lab[6] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_status']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_status']) == "on")
{
    $menu_pos_menuData['data'] .= "item_5|..|" . $this->Nm_lang['lang_tbl_status'] . "|menu_pos_form_php.php?sc_item_menu=item_5&sc_apl_menu=form_status&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[7] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_5|..|" . $this->Nm_lang['lang_tbl_status'] . "||||_self|disabled\n";
}
$menu_pos_menuData['data'] .= "item_30|.|" . $nm_var_lab[7] . "||" . $nm_var_hint[8] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_customer']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_customer']) == "on")
{
    $menu_pos_menuData['data'] .= "item_20|..|" . $nm_var_lab[8] . "|menu_pos_form_php.php?sc_item_menu=item_20&sc_apl_menu=grid_customer&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[9] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_20|..|" . $nm_var_lab[8] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_customer_clubmrjoy']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_customer_clubmrjoy']) == "on")
{
    $menu_pos_menuData['data'] .= "item_68|..|" . $nm_var_lab[9] . "|menu_pos_form_php.php?sc_item_menu=item_68&sc_apl_menu=grid_customer_clubmrjoy&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[10] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_68|..|" . $nm_var_lab[9] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_v_ele_reporte_facturas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_v_ele_reporte_facturas']) == "on")
{
    $menu_pos_menuData['data'] .= "item_46|..|" . $nm_var_lab[10] . "|menu_pos_form_php.php?sc_item_menu=item_46&sc_apl_menu=grid_v_ele_reporte_facturas&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[11] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_46|..|" . $nm_var_lab[10] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sales']) == "on")
{
    $menu_pos_menuData['data'] .= "item_10|..|" . $nm_var_lab[11] . "|menu_pos_form_php.php?sc_item_menu=item_10&sc_apl_menu=grid_sales&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[12] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_10|..|" . $nm_var_lab[11] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte']) == "on")
{
    $menu_pos_menuData['data'] .= "item_45|..|" . $nm_var_lab[12] . "|menu_pos_form_php.php?sc_item_menu=item_45&sc_apl_menu=grid_sales_detail_reporte&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[13] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_45|..|" . $nm_var_lab[12] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte_categoria']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte_categoria']) == "on")
{
    $menu_pos_menuData['data'] .= "item_59|..|" . $nm_var_lab[13] . "|menu_pos_form_php.php?sc_item_menu=item_59&sc_apl_menu=grid_sales_detail_reporte_categoria&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[14] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_59|..|" . $nm_var_lab[13] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['chart_sales']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['chart_sales']) == "on")
{
    $menu_pos_menuData['data'] .= "item_19|..|" . $nm_var_lab[14] . "|menu_pos_form_php.php?sc_item_menu=item_19&sc_apl_menu=chart_sales&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[15] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_19|..|" . $nm_var_lab[14] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['chart_view_sales_detail_group_todo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['chart_view_sales_detail_group_todo']) == "on")
{
    $menu_pos_menuData['data'] .= "item_60|..|" . $nm_var_lab[15] . "|menu_pos_form_php.php?sc_item_menu=item_60&sc_apl_menu=chart_view_sales_detail_group_todo&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[16] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_60|..|" . $nm_var_lab[15] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_ele_parametros']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_ele_parametros']) == "on")
{
    $menu_pos_menuData['data'] .= "item_48|..|" . $nm_var_lab[16] . "|menu_pos_form_php.php?sc_item_menu=item_48&sc_apl_menu=form_ele_parametros&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[17] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_48|..|" . $nm_var_lab[16] . "||||_self|disabled\n";
}
$menu_pos_menuData['data'] .= "item_61|.|" . $nm_var_lab[17] . "||" . $nm_var_hint[18] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_promedio_satisfaccion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_promedio_satisfaccion']) == "on")
{
    $menu_pos_menuData['data'] .= "item_63|..|" . $nm_var_lab[18] . "|menu_pos_form_php.php?sc_item_menu=item_63&sc_apl_menu=grid_promedio_satisfaccion&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[19] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_63|..|" . $nm_var_lab[18] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_satisfaction']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_satisfaction']) == "on")
{
    $menu_pos_menuData['data'] .= "item_65|..|" . $nm_var_lab[19] . "|menu_pos_form_php.php?sc_item_menu=item_65&sc_apl_menu=grid_view_boletos_satisfaction&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[20] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_65|..|" . $nm_var_lab[19] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_boletos_califica']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_boletos_califica']) == "on")
{
    $menu_pos_menuData['data'] .= "item_62|..|" . $nm_var_lab[20] . "|menu_pos_form_php.php?sc_item_menu=item_62&sc_apl_menu=form_boletos_califica&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[21] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_62|..|" . $nm_var_lab[20] . "||||_self|disabled\n";
}
$menu_pos_menuData['data'] .= "item_12|.|" . $nm_var_lab[21] . "||" . $nm_var_hint[22] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_product']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_product']) == "on")
{
    $menu_pos_menuData['data'] .= "item_3|..|" . $nm_var_lab[22] . "|menu_pos_form_php.php?sc_item_menu=item_3&sc_apl_menu=grid_product&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[23] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_3|..|" . $nm_var_lab[22] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_saldos_kardex_fix']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_saldos_kardex_fix']) == "on")
{
    $menu_pos_menuData['data'] .= "item_67|..|" . $nm_var_lab[23] . "|menu_pos_form_php.php?sc_item_menu=item_67&sc_apl_menu=grid_saldos_kardex_fix&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[24] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_67|..|" . $nm_var_lab[23] . "||||_self|disabled\n";
}
$menu_pos_menuData['data'] .= "item_51|..|" . $nm_var_lab[24] . "||" . $nm_var_hint[25] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_supplier']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_supplier']) == "on")
{
    $menu_pos_menuData['data'] .= "item_2|..|" . $nm_var_lab[25] . "|menu_pos_form_php.php?sc_item_menu=item_2&sc_apl_menu=grid_supplier&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[26] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_2|..|" . $nm_var_lab[25] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_purchase']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_purchase']) == "on")
{
    $menu_pos_menuData['data'] .= "item_6|..|" . $nm_var_lab[26] . "|menu_pos_form_php.php?sc_item_menu=item_6&sc_apl_menu=grid_purchase&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[27] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_6|..|" . $nm_var_lab[26] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_product_listado']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_product_listado']) == "on")
{
    $menu_pos_menuData['data'] .= "item_52|..|" . $nm_var_lab[27] . "|menu_pos_form_php.php?sc_item_menu=item_52&sc_apl_menu=grid_product_listado&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[28] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_52|..|" . $nm_var_lab[27] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_view_movim_inventario']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_view_movim_inventario']) == "on")
{
    $menu_pos_menuData['data'] .= "item_13|..|" . $nm_var_lab[28] . "|menu_pos_form_php.php?sc_item_menu=item_13&sc_apl_menu=grid_view_movim_inventario&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[29] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_13|..|" . $nm_var_lab[28] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_category']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_category']) == "on")
{
    $menu_pos_menuData['data'] .= "item_4|..|" . $this->Nm_lang['lang_tbl_category'] . "|menu_pos_form_php.php?sc_item_menu=item_4&sc_apl_menu=form_category&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[30] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_4|..|" . $this->Nm_lang['lang_tbl_category'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_pendientes_salida']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_pendientes_salida']) == "on")
{
    $menu_pos_menuData['data'] .= "item_21|.|" . $nm_var_lab[29] . "|menu_pos_form_php.php?sc_item_menu=item_21&sc_apl_menu=grid_view_boletos_pendientes_salida&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[31] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_21|.|" . $nm_var_lab[29] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_pdf_reimpresion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_pdf_reimpresion']) == "on")
{
    $menu_pos_menuData['data'] .= "item_66|..|" . $nm_var_lab[30] . "|menu_pos_form_php.php?sc_item_menu=item_66&sc_apl_menu=grid_sales_pdf_reimpresion&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[32] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_66|..|" . $nm_var_lab[30] . "||||_self|disabled\n";
}
$menu_pos_menuData['data'] .= "item_23|.|" . $nm_var_lab[31] . "||" . $nm_var_hint[33] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_readtarjeta_arcade_consulta']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_readtarjeta_arcade_consulta']) == "on")
{
    $menu_pos_menuData['data'] .= "item_56|..|" . $nm_var_lab[32] . "|menu_pos_form_php.php?sc_item_menu=item_56&sc_apl_menu=control_readtarjeta_arcade_consulta&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[34] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_56|..|" . $nm_var_lab[32] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_devices_arcade_multi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_devices_arcade_multi']) == "on")
{
    $menu_pos_menuData['data'] .= "item_25|..|" . $nm_var_lab[33] . "|menu_pos_form_php.php?sc_item_menu=item_25&sc_apl_menu=form_devices_arcade_multi&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[35] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_25|..|" . $nm_var_lab[33] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_read_tarjeta_rfid_decimal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_read_tarjeta_rfid_decimal']) == "on")
{
    $menu_pos_menuData['data'] .= "item_24|..|" . $nm_var_lab[34] . "|menu_pos_form_php.php?sc_item_menu=item_24&sc_apl_menu=control_read_tarjeta_rfid_decimal&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[36] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_24|..|" . $nm_var_lab[34] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tarjetasmovim']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tarjetasmovim']) == "on")
{
    $menu_pos_menuData['data'] .= "item_26|..|" . $nm_var_lab[35] . "|menu_pos_form_php.php?sc_item_menu=item_26&sc_apl_menu=grid_tarjetasmovim&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[37] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_26|..|" . $nm_var_lab[35] . "||||_self|disabled\n";
}
$menu_pos_menuData['data'] .= "item_27|..|" . $nm_var_lab[36] . "||" . $nm_var_hint[38] . "||_self|\n";
$menu_pos_menuData['data'] .= "item_17|.|" . $nm_var_lab[37] . "||" . $nm_var_hint[39] . "||_self|\n";
$menu_pos_menuData['data'] .= "item_53|.|" . $nm_var_lab[38] . "||" . $nm_var_hint[40] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_torno_entrada_admin']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_torno_entrada_admin']) == "on")
{
    $menu_pos_menuData['data'] .= "item_54|..|" . $nm_var_lab[39] . "|menu_pos_form_php.php?sc_item_menu=item_54&sc_apl_menu=control_torno_entrada_admin&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[41] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_54|..|" . $nm_var_lab[39] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_torno_salida_admin']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_torno_salida_admin']) == "on")
{
    $menu_pos_menuData['data'] .= "item_55|..|" . $nm_var_lab[40] . "|menu_pos_form_php.php?sc_item_menu=item_55&sc_apl_menu=control_torno_salida_admin&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[42] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_55|..|" . $nm_var_lab[40] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_movimtorno']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_movimtorno']) == "on")
{
    $menu_pos_menuData['data'] .= "item_58|..|" . $nm_var_lab[41] . "|menu_pos_form_php.php?sc_item_menu=item_58&sc_apl_menu=grid_movimtorno&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[43] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_58|..|" . $nm_var_lab[41] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login']) == "on")
{
    $menu_pos_menuData['data'] .= "item_9|.|" . $this->Nm_lang['lang_exit'] . "|menu_pos_form_php.php?sc_item_menu=item_9&sc_apl_menu=sec_app_Login&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[44] . "||" . $this->menu_pos_target('_parent') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_9|.|" . $this->Nm_lang['lang_exit'] . "||||_parent|disabled\n";
}
$menu_pos_menuData['data'] .= "item_32|.|" . $this->Nm_lang['lang_menu_security'] . "||" . $this->Nm_lang['lang_menu_security'] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users']) == "on")
{
    $menu_pos_menuData['data'] .= "item_33|..|" . $this->Nm_lang['lang_list_users'] . "|menu_pos_form_php.php?sc_item_menu=item_33&sc_apl_menu=sec_app_grid_sec_users&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_users'] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_33|..|" . $this->Nm_lang['lang_list_users'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_apps']) == "on")
{
    $menu_pos_menuData['data'] .= "item_34|..|" . $this->Nm_lang['lang_list_apps'] . "|menu_pos_form_php.php?sc_item_menu=item_34&sc_apl_menu=sec_app_grid_sec_apps&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_apps'] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_34|..|" . $this->Nm_lang['lang_list_apps'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_groups']) == "on")
{
    $menu_pos_menuData['data'] .= "item_35|..|" . $this->Nm_lang['lang_list_groups'] . "|menu_pos_form_php.php?sc_item_menu=item_35&sc_apl_menu=sec_app_grid_sec_groups&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_groups'] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_35|..|" . $this->Nm_lang['lang_list_groups'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users_groups']) == "on")
{
    $menu_pos_menuData['data'] .= "item_42|..|" . $this->Nm_lang['lang_list_users_x_groups'] . "|menu_pos_form_php.php?sc_item_menu=item_42&sc_apl_menu=sec_app_grid_sec_users_groups&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_users_x_groups'] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_42|..|" . $this->Nm_lang['lang_list_users_x_groups'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_search_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_search_sec_groups']) == "on")
{
    $menu_pos_menuData['data'] .= "item_36|..|" . $this->Nm_lang['lang_list_apps_x_groups'] . "|menu_pos_form_php.php?sc_item_menu=item_36&sc_apl_menu=sec_app_search_sec_groups&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_apps_x_groups'] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_36|..|" . $this->Nm_lang['lang_list_apps_x_groups'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_sync_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_sync_apps']) == "on")
{
    $menu_pos_menuData['data'] .= "item_37|..|" . $this->Nm_lang['lang_list_sync_apps'] . "|menu_pos_form_php.php?sc_item_menu=item_37&sc_apl_menu=sec_app_sync_apps&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_sync_apps'] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_37|..|" . $this->Nm_lang['lang_list_sync_apps'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_add_2fa']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_add_2fa']) == "on")
{
    $menu_pos_menuData['data'] .= "item_43|..|" . $this->Nm_lang['lang_2fa'] . "|menu_pos_form_php.php?sc_item_menu=item_43&sc_apl_menu=sec_app_add_2fa&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_2fa'] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_43|..|" . $this->Nm_lang['lang_2fa'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_settings']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_settings']) == "on")
{
    $menu_pos_menuData['data'] .= "item_44|..|" . $this->Nm_lang['lang_settings'] . "|menu_pos_form_php.php?sc_item_menu=item_44&sc_apl_menu=sec_app_settings&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[45] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_44|..|" . $this->Nm_lang['lang_settings'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_change_pswd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_change_pswd']) == "on")
{
    $menu_pos_menuData['data'] .= "item_38|..|" . $this->Nm_lang['lang_change_pswd'] . "|menu_pos_form_php.php?sc_item_menu=item_38&sc_apl_menu=sec_app_change_pswd&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_change_pswd'] . "||" . $this->menu_pos_target('_self') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_38|..|" . $this->Nm_lang['lang_change_pswd'] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login']) == "on")
{
    $menu_pos_menuData['data'] .= "item_39|..|" . $this->Nm_lang['lang_exit'] . "|menu_pos_form_php.php?sc_item_menu=item_39&sc_apl_menu=sec_app_Login&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_exit'] . "||" . $this->menu_pos_target('_parent') . "|" . "\n";
}
else
{
    $menu_pos_menuData['data'] .= "item_39|..|" . $this->Nm_lang['lang_exit'] . "||||_parent|disabled\n";
}
if(isset($_SESSION['scriptcase']['force_menu_orientacao']) && !empty($_SESSION['scriptcase']['force_menu_orientacao']))
{
    $this->menu_orientacao = $_SESSION['scriptcase']['force_menu_orientacao'];
}
elseif($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $this->menu_orientacao = 'vertical';
    $this->mobile_menu_toolbar = '';
}

$menu_pos_menuData['data'] = array();
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_57&sc_apl_menu=dashboard&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['container']['active']))
    {
        $icon_aba = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['container']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['container']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[0] . "",
        'level'    => "0",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[0] . "",
        'id'       => "item_57",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_57",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-home",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_pos_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[1] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[1] . "",
    'id'       => "item_14",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_14",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-dollar-sign",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_15&sc_apl_menu=form_pos_factura&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_pos_factura']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_pos_factura']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[2] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[2] . "",
        'id'       => "item_15",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_15",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_28&sc_apl_menu=grid_empleados&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_empleados']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_empleados']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[3] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[3] . "",
        'id'       => "item_28",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_28",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-fingerprint",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_29&sc_apl_menu=form_kioskos&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_kioskos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_kioskos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[4] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[4] . "",
        'id'       => "item_29",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_29",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-robot",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_31&sc_apl_menu=grid_turnos_reporte&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_turnos_reporte']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_turnos_reporte']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[5] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[5] . "",
        'id'       => "item_31",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_31",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-closed-captioning",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_11&sc_apl_menu=grid_pays_type&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pays_type']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pays_type']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[6] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[6] . "",
        'id'       => "item_11",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_11",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fab fa-bitcoin",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_5&sc_apl_menu=form_status&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_status']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_status']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_tbl_status'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[7] . "",
        'id'       => "item_5",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_5",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-braille",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_pos_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[7] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[8] . "",
    'id'       => "item_30",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_30",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-file-invoice",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_20&sc_apl_menu=grid_customer&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_customer']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_customer']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[8] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[9] . "",
        'id'       => "item_20",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_20",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-user",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_68&sc_apl_menu=grid_customer_clubmrjoy&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_customer_clubmrjoy']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_customer_clubmrjoy']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[9] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[10] . "",
        'id'       => "item_68",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_68",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_46&sc_apl_menu=grid_v_ele_reporte_facturas&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_v_ele_reporte_facturas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_v_ele_reporte_facturas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[10] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[11] . "",
        'id'       => "item_46",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_46",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-align-justify",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_10&sc_apl_menu=grid_sales&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sales']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[11] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[12] . "",
        'id'       => "item_10",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_10",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-chart-bar",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_45&sc_apl_menu=grid_sales_detail_reporte&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[12] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[13] . "",
        'id'       => "item_45",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_45",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "far fa-chart-bar",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_59&sc_apl_menu=grid_sales_detail_reporte_categoria&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte_categoria']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_detail_reporte_categoria']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[13] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[14] . "",
        'id'       => "item_59",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_59",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_19&sc_apl_menu=chart_sales&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['chart_sales']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['chart_sales']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['chart']['active']))
    {
        $icon_aba = $arr_menuicons['chart']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['chart']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['chart']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[14] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[15] . "",
        'id'       => "item_19",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_19",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-chart-bar",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_60&sc_apl_menu=chart_view_sales_detail_group_todo&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['chart_view_sales_detail_group_todo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['chart_view_sales_detail_group_todo']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['chart']['active']))
    {
        $icon_aba = $arr_menuicons['chart']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['chart']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['chart']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[15] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[16] . "",
        'id'       => "item_60",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_60",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_48&sc_apl_menu=form_ele_parametros&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_ele_parametros']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_ele_parametros']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[16] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[17] . "",
        'id'       => "item_48",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_48",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_pos_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[17] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[18] . "",
    'id'       => "item_61",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_61",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "far fa-smile",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_63&sc_apl_menu=grid_promedio_satisfaccion&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_promedio_satisfaccion']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_promedio_satisfaccion']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[18] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[19] . "",
        'id'       => "item_63",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_63",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_65&sc_apl_menu=grid_view_boletos_satisfaction&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_satisfaction']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_satisfaction']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[19] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[20] . "",
        'id'       => "item_65",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_65",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_62&sc_apl_menu=form_boletos_califica&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_boletos_califica']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_boletos_califica']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[20] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[21] . "",
        'id'       => "item_62",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_62",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_pos_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[21] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[22] . "",
    'id'       => "item_12",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_12",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-warehouse",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_3&sc_apl_menu=grid_product&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_product']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_product']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[22] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[23] . "",
        'id'       => "item_3",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_3",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fab fa-product-hunt",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_67&sc_apl_menu=grid_saldos_kardex_fix&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_saldos_kardex_fix']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_saldos_kardex_fix']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[23] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[24] . "",
        'id'       => "item_67",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_67",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_pos_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[24] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[25] . "",
    'id'       => "item_51",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_51",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_2&sc_apl_menu=grid_supplier&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_supplier']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_supplier']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[25] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[26] . "",
        'id'       => "item_2",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_2",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-dolly-flatbed",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_6&sc_apl_menu=grid_purchase&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_purchase']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_purchase']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[26] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[27] . "",
        'id'       => "item_6",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_6",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cart-plus",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_52&sc_apl_menu=grid_product_listado&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_product_listado']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_product_listado']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[27] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[28] . "",
        'id'       => "item_52",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_52",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-align-justify",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_13&sc_apl_menu=grid_view_movim_inventario&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_view_movim_inventario']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_view_movim_inventario']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[28] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[29] . "",
        'id'       => "item_13",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_13",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-truck-moving",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_4&sc_apl_menu=form_category&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_category']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_category']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_tbl_category'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[30] . "",
        'id'       => "item_4",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_4",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-boxes",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_21&sc_apl_menu=grid_view_boletos_pendientes_salida&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_pendientes_salida']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_view_boletos_pendientes_salida']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[29] . "",
        'level'    => "0",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[31] . "",
        'id'       => "item_21",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_21",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-ticket-alt",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_66&sc_apl_menu=grid_sales_pdf_reimpresion&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_pdf_reimpresion']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sales_pdf_reimpresion']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[30] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[32] . "",
        'id'       => "item_66",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_66",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_pos_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[31] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[33] . "",
    'id'       => "item_23",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_23",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fab fa-penny-arcade",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_56&sc_apl_menu=control_readtarjeta_arcade_consulta&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_readtarjeta_arcade_consulta']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_readtarjeta_arcade_consulta']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[32] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[34] . "",
        'id'       => "item_56",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_56",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "far fa-credit-card",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_25&sc_apl_menu=form_devices_arcade_multi&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_devices_arcade_multi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_devices_arcade_multi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[33] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[35] . "",
        'id'       => "item_25",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_25",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fab fa-fantasy-flight-games",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_24&sc_apl_menu=control_read_tarjeta_rfid_decimal&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_read_tarjeta_rfid_decimal']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_read_tarjeta_rfid_decimal']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[34] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[36] . "",
        'id'       => "item_24",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_24",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "far fa-credit-card",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_26&sc_apl_menu=grid_tarjetasmovim&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tarjetasmovim']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tarjetasmovim']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[35] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[37] . "",
        'id'       => "item_26",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_26",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "far fa-chart-bar",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_pos_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[36] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[38] . "",
    'id'       => "item_27",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_27",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-coins",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_pos_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[37] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[39] . "",
    'id'       => "item_17",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_17",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-microchip",
    'icon_color'     => "#d3313c",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_pos_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[38] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[40] . "",
    'id'       => "item_53",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_53",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_54&sc_apl_menu=control_torno_entrada_admin&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_torno_entrada_admin']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_torno_entrada_admin']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[39] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[41] . "",
        'id'       => "item_54",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_54",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_55&sc_apl_menu=control_torno_salida_admin&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_torno_salida_admin']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_torno_salida_admin']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[40] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[42] . "",
        'id'       => "item_55",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_55",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_58&sc_apl_menu=grid_movimtorno&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_movimtorno']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_movimtorno']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[41] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[43] . "",
        'id'       => "item_58",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_58",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_9&sc_apl_menu=sec_app_Login&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_exit'] . "",
        'level'    => "0",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[44] . "",
        'id'       => "item_9",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_parent') . "\"",
        'sc_id'    => "item_9",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-sign-out-alt",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_pos_menuData['data'][] = array(
    'label'    => "" . $this->Nm_lang['lang_menu_security'] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $this->Nm_lang['lang_menu_security'] . "",
    'id'       => "item_32",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_32",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_33&sc_apl_menu=sec_app_grid_sec_users&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_users'] . "",
        'id'       => "item_33",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_33",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_34&sc_apl_menu=sec_app_grid_sec_apps&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_apps']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_apps']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_apps'] . "",
        'id'       => "item_34",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_34",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_35&sc_apl_menu=sec_app_grid_sec_groups&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_groups'] . "",
        'id'       => "item_35",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_35",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_42&sc_apl_menu=sec_app_grid_sec_users_groups&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_grid_sec_users_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users_x_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_users_x_groups'] . "",
        'id'       => "item_42",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_42",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_36&sc_apl_menu=sec_app_search_sec_groups&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_search_sec_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_search_sec_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['filter']['active']))
    {
        $icon_aba = $arr_menuicons['filter']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['filter']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['filter']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'id'       => "item_36",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_36",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_37&sc_apl_menu=sec_app_sync_apps&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_sync_apps']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_sync_apps']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'id'       => "item_37",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_37",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_43&sc_apl_menu=sec_app_add_2fa&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_add_2fa']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_add_2fa']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_2fa'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_2fa'] . "",
        'id'       => "item_43",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_43",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_44&sc_apl_menu=sec_app_settings&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_settings']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_settings']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_settings'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[45] . "",
        'id'       => "item_44",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_44",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_38&sc_apl_menu=sec_app_change_pswd&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_change_pswd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_change_pswd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'id'       => "item_38",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_self') . "\"",
        'sc_id'    => "item_38",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_pos_form_php.php?sc_item_menu=item_39&sc_apl_menu=sec_app_Login&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['sec_app_Login']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_pos_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_exit'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_exit'] . "",
        'id'       => "item_39",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_pos_target('_parent') . "\"",
        'sc_id'    => "item_39",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );

if (isset($_SESSION['scriptcase']['sc_def_menu']['menu_pos']))
{
    $arr_menu_usu = $this->nm_arr_menu_recursiv($_SESSION['scriptcase']['sc_def_menu']['menu_pos']);
    $this->nm_gera_menus($str_menu_usu, $arr_menu_usu, 1, 'menu_pos');
    $menu_pos_menuData['data'] = $str_menu_usu;
}
if (is_file("menu_pos_help.txt"))
{
    $Arq_WebHelp = file("menu_pos_help.txt"); 
    if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
    {
        $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
        $Tmp = explode(";", $Arq_WebHelp[0]); 
        foreach ($Tmp as $Cada_help)
        {
            $Tmp1 = explode(":", $Cada_help); 
            if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "menu" && is_file($str_root . $path_help . $Tmp1[1]))
            {
                $str_disabled = "N";
                $str_link = "" . $path_help . $Tmp1[1] . "";
                $str_icon = "";
                $icon_aba = "";
                $icon_aba_inactive = "";
                if(empty($icon_aba) && isset($arr_menuicons['']['active']))
                {
                    $icon_aba = $arr_menuicons['']['active'];
                }
                if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
                {
                    $icon_aba_inactive = $arr_menuicons['']['inactive'];
                }
                $menu_pos_menuData['data'][] = array(
                    'label'    => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'level'    => "0",
                    'link'     => $str_link,
                    'hint'     => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'id'       => "item_Help",
                    'icon'     => $str_icon,
                    'icon_aba' => $icon_aba,
                    'icon_aba_inactive' => $icon_aba_inactive,
                    'target'   => "" . $this->menu_pos_target('_blank') . "",
                    'sc_id'    => "item_Help",
                    'disabled' => $str_disabled,
                    'display'     => "text",
                    'display_position'=> "",
                    'icon_fa'     => "",
                    'icon_color'     => "",
                    'icon_color_hover'     => "",
                    'icon_color_disabled'     => "",
                );
            }
        }
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_del']['menu_pos']) && !empty($_SESSION['scriptcase']['sc_menu_del']['menu_pos']))
{
    $nivel = 0;
    $exclui_menu = false;
    foreach ($menu_pos_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_del']['menu_pos']))
       {
          $nivel = $cada_menu['level'];
          $exclui_menu = true;
          unset($menu_pos_menuData['data'][$i_menu]);
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < $cada_menu['level']))
       {
          unset($menu_pos_menuData['data'][$i_menu]);
       }
       else
       {
          $exclui_menu = false;
       }
    }
    $Temp_menu = array();
    foreach ($menu_pos_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $menu_pos_menuData['data'] = $Temp_menu;
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['menu_pos']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['menu_pos']))
{
    $disable_menu = false;
    foreach ($menu_pos_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_disable']['menu_pos']))
       {
          $nivel = $cada_menu['level'];
          $disable_menu = true;
          $menu_pos_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < $cada_menu['level'])
       { 
          $menu_pos_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
       }
    }
}

/* Cabecera HTML */
if ($menu_pos_menuData['iframe'])
{
    $menu_pos_menuData['height'] = '100%';
    header("X-XSS-Protection: 1; mode=block");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> style="height: 100%">
<head>
 <title>menu_pos</title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <?php
 if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
 {
  ?>
   <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
  <?php
 }
 ?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <?php 
 if(isset($str_google_fonts) && !empty($str_google_fonts)) 
 { 
     ?> 
     <link rel="stylesheet" type="text/css" href="<?php echo $str_google_fonts ?>" /> 
     <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_btngrp.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_btngrp.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_btngrp.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menutab.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menutab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_menuH.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_menuH.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $Str_btn_css ?>" /> 
 <link rel="stylesheet" href="<?php echo $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod']; ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../_lib/css/_menuTheme/sys_Android_NovoGTPlan_v6_<?php echo ($this->menu_orientacao!='vertical')?'hor':'vert'; ?>_<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir']; ?>.css<?php if (@is_file($this->path_css . '_menuTheme/' . "sys_Android_NovoGTPlan_v6" . '_' . (($this->menu_orientacao!='vertical')?'hor':'vert') . '.css')) { echo '?scp=' . md5($this->path_css . '_menuTheme/' . "sys_Android_NovoGTPlan_v6" . '_' . (($this->menu_orientacao=='horizontal')?'hor':'vert') . '.css'); } ?>" />
<style>
   .scTabText {
   }   #item_17 .icon_fa{ color: #d3313c  !important}
    <?php
        if(isset($_SESSION['scriptcase']['sc_def_menu']) && !empty($_SESSION['scriptcase']['sc_def_menu']))
        {
            foreach($_SESSION['scriptcase']['sc_def_menu'] as $arr_menus)
            {
              foreach($arr_menus as $id => $arr_item)
              {
                  if(isset($arr_item['icon_color']) && !empty($arr_item['icon_color']))
                  {
                      echo "   #" . $id . " .icon_fa{ color: ". $arr_item['icon_color'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . " i{ color:". $arr_item['icon_color'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_hover']) && !empty($arr_item['icon_color_hover']))
                  {
                      echo "   #" . $id . ":hover .icon_fa{ color: ". $arr_item['icon_color_hover'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ":hover i{ color:". $arr_item['icon_color_hover'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_disabled']) && !empty($arr_item['icon_color_disabled']))
                  {
                      echo "   #" . $id . ".scdisabledmain .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      echo "   #" . $id . ".scdisabledsub .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ".scTabInactive i{ color:". $arr_item['icon_color_disabled'] ."  !important}
";
                      }
                  }
              }
            }
        }
    ?>
</style>
<script type="text/javascript">
<?php

if ($this->menu_orientacao=='horizontal')
{
 ?>
 var is_menu_vertical = false;
 <?php
}
else
{
 ?>
 var is_menu_vertical = true;
 <?php
}
?>
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
</head>
<body style="height: 100%" scroll="no" class='scMenuHPage'>
<?php

if ('' != $sOutputBuffer)
{
    echo $sOutputBuffer;
}

    $NM_scr_iframe = (isset($_POST['hid_scr_iframe'])) ? $_POST['hid_scr_iframe'] : "";   
?> 
<span style="display:none"> 
   <form name="Nm_frm_change_lang_locale" method="post">
           <input type="hidden" name="hid_scr_iframe">
           <input type="hidden" name="nmgp_idioma">
   </form>
</span> 
<script type="text/javascript">
   function Nm_change_lang_locale()
   {
           var str_location = document.getElementById('iframe_menu_pos').contentWindow.location.toString();
           if (str_location.indexOf('script_case_init') == -1)
           {
                   document.Nm_frm_change_lang_locale.hid_scr_iframe.value = str_location + (str_location.indexOf('?') > -1 ? '&' : '?') + 'script_case_init=1';
           }
           else
           {
                   document.Nm_frm_change_lang_locale.hid_scr_iframe.value = str_location;
           }
           document.Nm_frm_change_lang_locale.nmgp_idioma.value = document.getElementById("id_nmgp_idioma").value; 
           document.Nm_frm_change_lang_locale.submit();
   }
</script>
<?php 
}
else
{
    $menu_pos_menuData['height'] = '30px';
}

/* Archivos JS */
?>
<script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../_lib/lib/js/menu_structure.js"></script>
<script  type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/jquery.contextmenu.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_contextmenu.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_contextmenu.css'); } ?>" /> 
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_sweetalert.css" />
<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonText  = $this->Nm_lang['lang_btns_cfrm'];
$cancelButtonText   = $this->Nm_lang['lang_btns_cncl'];
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
    $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
    $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
    $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
    $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
    $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
    $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
    $confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
    $cancelButtonFAPos = 'text_right';
}
?>
<script type="text/javascript">
  var scSweetAlertConfirmButton = "<?php echo $confirmButtonClass ?>";
  var scSweetAlertCancelButton = "<?php echo $cancelButtonClass ?>";
  var scSweetAlertConfirmButtonText = "<?php echo $confirmButtonText ?>";
  var scSweetAlertCancelButtonText = "<?php echo $cancelButtonText ?>";
  var scSweetAlertConfirmButtonFA = "<?php echo $confirmButtonFA ?>";
  var scSweetAlertCancelButtonFA = "<?php echo $cancelButtonFA ?>";
  var scSweetAlertConfirmButtonFAPos = "<?php echo $confirmButtonFAPos ?>";
  var scSweetAlertCancelButtonFAPos = "<?php echo $cancelButtonFAPos ?>";
</script>
<script type="text/javascript" src="menu_pos_message.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
$(function() {
<?php
if (count($this->nm_mens_alert)) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
?>
       scJs_alert('<?php echo $mensagem ?>', <?php echo $jsonParams ?>);
<?php
       }
   }
}
?>
});
</script>
<?php
$_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Nm_lang['lang_mnth_janu'],
                                  $this->Nm_lang['lang_mnth_febr'],
                                  $this->Nm_lang['lang_mnth_marc'],
                                  $this->Nm_lang['lang_mnth_apri'],
                                  $this->Nm_lang['lang_mnth_mayy'],
                                  $this->Nm_lang['lang_mnth_june'],
                                  $this->Nm_lang['lang_mnth_july'],
                                  $this->Nm_lang['lang_mnth_augu'],
                                  $this->Nm_lang['lang_mnth_sept'],
                                  $this->Nm_lang['lang_mnth_octo'],
                                  $this->Nm_lang['lang_mnth_nove'],
                                  $this->Nm_lang['lang_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Nm_lang['lang_shrt_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Nm_lang['lang_days_sund'],
                                  $this->Nm_lang['lang_days_mond'],
                                  $this->Nm_lang['lang_days_tued'],
                                  $this->Nm_lang['lang_days_wend'],
                                  $this->Nm_lang['lang_days_thud'],
                                  $this->Nm_lang['lang_days_frid'],
                                  $this->Nm_lang['lang_days_satd']);
$_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_days_sund'],
                                  $this->Nm_lang['lang_shrt_days_mond'],
                                  $this->Nm_lang['lang_shrt_days_tued'],
                                  $this->Nm_lang['lang_shrt_days_wend'],
                                  $this->Nm_lang['lang_shrt_days_thud'],
                                  $this->Nm_lang['lang_shrt_days_frid'],
                                  $this->Nm_lang['lang_shrt_days_satd']);
$Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
$Lim   = strlen($Str_date);
$Ult   = "";
$Arr_D = array();
for ($I = 0; $I < $Lim; $I++)
{
    $Char = substr($Str_date, $I, 1);
    if ($Char != $Ult)
    {
        $Arr_D[] = $Char;
    }
    $Ult = $Char;
}
$Prim = true;
$Str  = "";
foreach ($Arr_D as $Cada_d)
{
    $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
    $Str .= $Cada_d;
    $Prim = false;
}
$Str = str_replace("a", "Y", $Str);
$Str = str_replace("y", "Y", $Str);
$nm_data_fixa = date($Str); 
?>
<?php
if($this->menu_orientacao=='vertical')
{
  $qtd_col = 2;
  if(is_array($bg_line_degrade) && count($bg_line_degrade)>0)
  {
      $qtd_col = $qtd_col + count($bg_line_degrade);
  }
  $larg_table = "100%";
  $col_span   = ' colspan="'. $qtd_col .'"';
}
else
{
  $larg_table = "100%";
  $col_span   = "";
}
$strAlign = 'align=\'left\'';
?>
<?php
$str_bmenu = nmButtonOutput($this->arr_buttons, "bmenu", "showMenu();", "showMenu();", "bmenu", "", "" . $this->Nm_lang['lang_btns_menu'] . "", "position:absolute; top:0px; left:0px; z-index:102;", "absmiddle", "", "0px", $this->path_botoes, "", "" . $this->Nm_lang['lang_btns_menu_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $menu_mobile_hide          = $mobile_menu_mobile_hide;
    $menu_mobile_inicial_state = $mobile_menu_mobile_inicial_state;
    $menu_mobile_hide_onclick  = $mobile_menu_mobile_hide_onclick;
    $menutree_mobile_float     = $mobile_menutree_mobile_float;
    $menu_mobile_hide_icon     = $mobile_menu_mobile_hide_icon;
    $menu_mobile_hide_icon_menu_position     = $mobile_menu_mobile_hide_icon_menu_position;
}
if($menu_mobile_hide == 'S')
{
    if($menu_mobile_inicial_state =='escondido')
    {
            $str_menu_display="hide";
            $str_btn_display="show";
    }
    else
    {
        $str_menu_display="show";
        $str_btn_display="hide";
    }
    if($menu_mobile_hide_icon != 'S')
    {
        $str_btn_display="show";
    }
?>
<script>
    $( document ).ready(function() {
        $('#bmenu').<?php echo $str_btn_display; ?>();
        $('#idMenuCell').<?php echo $str_menu_display; ?>();
        $('#id_toolbar').<?php echo $str_menu_display; ?>();
        <?php
                    if($this->menu_orientacao != 'vertical')
                    {
                        if($menu_mobile_hide_icon == 'N')
                        {
                        ?>
                            $("#idDivMenu").css("padding-left", $('#bmenu').outerWidth());
                        <?php
                        }
                    }
                    else
                    {
                        if($menu_mobile_hide_icon == 'N')
                        {
                        ?>
                            $("#idMenuToolbar").css("padding-left", $('#bmenu').outerWidth());
                        <?php
                        }
                    }
                    if($menutree_mobile_float == 'S')
                    {
                    ?>
                    str_html_menu    = $('#idMenuCell').html();
                    str_html_toolbar = '';
                    if($('#idMenuToolbar').length)
                    {
                      str_html_toolbar = $('#idMenuToolbar').html();
                    }
                    $('#idMenuCell').remove();
                    $('#idMenuToolbar').remove();
                    $( 'body' ).prepend( "<div id='idMenuFLoat' style='height:0px;'><div id='idMenuCell' style='position:absolute; z-index: 101'>"+ str_html_menu + "</div><div id='id_toolbar' style='position:absolute; z-index: 100;'>" + str_html_toolbar +"</div></div>" );
                    <?php
                    if($this->menu_orientacao == 'vertical')
                    {
                        ?>
                            $("#idMenuCell").css("padding-top", $('#bmenu').outerHeight());
                            $("#idMenuCell").css("left", '0px');
                            $("#id_toolbar").css("padding-left", $('#bmenu').outerWidth());
                            $("#id_toolbar").css("display", 'flex');
                        <?php
                        if($menu_mobile_hide_icon == 'S')
                        {
                        ?>
                            $("#id_toolbar").css("padding-left", '0px');
                        <?php
                        }
                        ?>
                        if($( '#id_toolbar' ).width() < 1  || $( '#id_toolbar' ).width() > $( window ).width())
                        {
                            $('#id_toolbar').css('display', 'block');
                            $('#id_toolbar').css('padding-left', $('#idMenuCell').outerWidth());
                            <?php
                            if($menu_mobile_hide_icon == 'S')
                            {
                            ?>
                                $("#id_toolbar").css("padding-top", '0px');
                            <?php
                            }
                        ?>
                        }
                        <?php
                    }
                    else
                    {
                        ?>
                            $("#id_toolbar").css("top", $('#idMenuCell').outerHeight());
                            <?php
                            if($menu_mobile_hide_icon == 'S')
                            {
                            ?>
                                $("#id_toolbar").css("padding-left", '0px');
                            <?php
                            }
                    }
                    if($menu_mobile_inicial_state =='escondido')
                    {
                        ?>
                            $("#idMenuCell").hide();
                            $("#id_toolbar").hide();
                        <?php
                    }
                }
           ?>
    });
    function showMenu()
    {
      if (!$('#idMenuCell').is(':visible')) { $('body').append('<div class="menu-outclick-overlay" style="height: 100vh; width: 100vw; position: fixed; z-index: 90; top: 0; left: 0;" ></div>');}
      $('.menu-outclick-overlay').on('click', function () {HideMenu();});
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').hide();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
  setTimeout(function(){ scToggleOverflow(); }, 600);
      <?php
      }
      ?>
    }
    function HideMenu()
    {
      $('.menu-outclick-overlay').remove();
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').show();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
  setTimeout(function(){ scToggleOverflow(); }, 600);
      <?php
      }
      ?>
    }
</script>
<?php
echo $str_bmenu;
}
?>
<script>
$(document).ready(function() {
});
        $( document ).ready(function() {
            $.contextMenu({
                selector:'#contrl_abas > li',
                leftButton: true,
                callback: function(key, options)
                {
                        switch(key)
                        {
                            case 'close':
                                contextMenuCloseTab($(this).attr('id'));
                            break;

                            case 'closeall':
                                contextMenuCloseAllTabs();
                            break;

                            case 'closeothers':
                                contextMenuCloseOthersTabs($(this).attr('id'));
                            break;

                            case 'closeright':
                                contextMenuCloseRight($(this).attr('id'));
                            break;

                            case 'closeleft':
                                contextMenuCloseLeft($(this).attr('id'));
                            break;
                        }
                    },
                items: {
                        "close": {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_close']); ?>'},
                        "closeall": {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeall']); ?>'},
                        "closeothers" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeothers']); ?>'},
                        "closeright" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeright']); ?>'},
                        "closeleft" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeleft']); ?>'},
                    }
            });
        });

        function contextMenuCloseAllTabs()
        {
            $( "#contrl_abas li" ).each(function( index ) {
                contextMenuCloseTab($( this ).attr('id'));
            });
        }

        function contextMenuCloseTab(str_id)
        {
            if(str_id.indexOf('aba_td_') >= 0)
            {
                str_id = str_id.substr(7);
            }
            del_aba_td( str_id );
        }

        function contextMenuCloseRight(str_id)
        {
            bol_start_del = false;
            $( "#contrl_abas li" ).each(function( index ) {

                if(bol_start_del)
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }

                if(str_id == $( this ).attr('id'))
                {
                    bol_start_del = true;
                }
            });
        }


        function contextMenuCloseLeft(str_id)
        {
            $( "#contrl_abas li" ).each(function( index ) {

                if(str_id == $( this ).attr('id'))
                {
                     return false;
                }
                else
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }
            });
        }

        function contextMenuCloseOthersTabs(str_id)
        {
            $( "#contrl_abas li" ).each(function( index ) {
                if(str_id != $( this ).attr('id'))
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }
            });
        }

function expandMenu()
{
    $('#idMenuHeader').hide();
    $('#<?php echo ($this->menu_orientacao=='vertical')?'idMenuCell':'idMenuLine'; ?>').hide();
    $('#id_toolbar').hide();
    $('#id_expand').hide();
    $('#id_collapse').show();
}

function collapseMenu()
{
    $('#idMenuHeader').show();
    $('#<?php echo ($this->menu_orientacao=='vertical')?'idMenuCell':'idMenuLine'; ?>').show();
    $('#id_toolbar').show();
    $('#id_expand').show();
    $('#id_collapse').hide();
}
Iframe_atual = "menu_pos_iframe";
function writeFastMenu(arr_link)
{
    var link_ok = "";
    for (i = 0; i < arr_link.length; i++) 
    {
        if (link_ok != "")
        {
            link_ok += "<img src='<?php echo $path_imag_cab . "/" . $this->breadcrumbline_separator; ?>'>";
        }
        link_ok += arr_link[i].replace(/#NMIframe#/g, Iframe_atual);
    }
    document.getElementById('links_apls_itens').innerHTML = link_ok;
    document.getElementById('links_apls').style.display = '';
}
function clearFastMenu()
{
    document.getElementById('links_apls_itens').innerHTML = '';
    document.getElementById('links_apls').style.display = 'none';
}
Tab_iframes         = new Array();
Tab_labels          = new Array();
Tab_hints           = new Array();
Tab_icons           = new Array();
Tab_icons_inactive  = new Array();
Tab_abas            = new Array();
Tab_refresh         = new Array();
Tab_icon_fa         = new Array();
Tab_icon_fa_inactive= new Array();
Tab_display         = new Array();
Tab_display_position= new Array();
Tab_links          = new Array();
var scScrollInterval = divOverflow = false;
Tab_ico_def        = new Array();
Tab_ico_ina_def    = new Array();
<?php
 foreach ($arr_menuicons as $tp => $icon)
 {
    echo "Tab_ico_def['$tp']     = '" . $icon['active'] . "';\r\n";
    echo "Tab_ico_ina_def['$tp'] = '" . $icon['inactive'] . "';\r\n";
 }
?>
Aba_atual    = "";
<?php
 $seq = 0;
echo "Tab_iframes[" . $seq . "] = \"menu_pos\";\r\n";
echo "Tab_labels['menu_pos'] = \"\";\r\n";
echo "Tab_hints['menu_pos'] = \"\";\r\n";
echo "Tab_abas['menu_pos']   = \"none\";\r\n";
echo "Tab_refresh['menu_pos']   = \"\";\r\n";
echo "Tab_icons['menu_pos'] = \"scriptcase__NM__ico__NM__sc_menu_home_e.png\";\r\n";
echo "Tab_icons_inactive['menu_pos'] = \"scriptcase__NM__ico__NM__sc_menu_home_d.png\";\r\n";
echo "Tab_icon_fa['menu_pos']   = \"\";\r\n";
echo "Tab_icon_fa_inactive['menu_pos']   = \"\";\r\n";
echo "Tab_display['menu_pos']   = \"\";\r\n";
echo "Tab_display_position['menu_pos']   = \"\";\r\n";
echo "Tab_links['menu_pos']   = \"\";\r\n";
         $seq++;
 if(isset($menu_pos_menuData['data']) && !empty($menu_pos_menuData['data']))
 {
   foreach ($menu_pos_menuData['data'] as $ind => $dados_menu)
   {
     if ($dados_menu['link'] != "#")
     {
         if(empty($dados_menu['hint']))
         {
             $dados_menu['hint'] = $dados_menu['label'];
         }
         echo "Tab_iframes[" . $seq . "] = \"" . $dados_menu['id'] . "\";\r\n";
         echo "Tab_labels['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['label']) . "\";\r\n";
         echo "Tab_hints['" . $dados_menu['id'] . "'] = \"" . strip_tags(str_replace('"', '\"', $dados_menu['hint'])) . "\";\r\n";
         echo "Tab_abas['" . $dados_menu['id'] . "']   = \"none\";\r\n";
         echo "Tab_refresh['" . $dados_menu['id'] . "']   = \"\";\r\n";
         echo "Tab_icons['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba'] . "\";\r\n";
         echo "Tab_icons_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba_inactive'] . "\";\r\n";
         echo "Tab_icon_fa['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_icon_fa_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_display['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display'] . "\";\r\n";
         echo "Tab_display_position['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display_position'] . "\";\r\n";
         echo "Tab_links['" . $dados_menu['id'] . "']   = \"\";\r\n";
         $seq++;
     }
   }
 }
 if(isset($menu_pos_menuData['data_vertical']) && !empty($menu_pos_menuData['data_vertical']))
 {
   foreach ($menu_pos_menuData['data_vertical'] as $ind => $dados_menu)
   {
     if ($dados_menu['link'] != "#")
     {
         if(empty($dados_menu['hint']))
         {
             $dados_menu['hint'] = $dados_menu['label'];
         }
         echo "Tab_iframes[" . $seq . "] = \"" . $dados_menu['id'] . "\";\r\n";
         echo "Tab_labels['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['label']) . "\";\r\n";
         echo "Tab_hints['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['hint']) . "\";\r\n";
         echo "Tab_abas['" . $dados_menu['id'] . "']   = \"none\";\r\n";
         echo "Tab_refresh['" . $dados_menu['id'] . "']   = \"\";\r\n";
         echo "Tab_icons['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba'] . "\";\r\n";
         echo "Tab_icons_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba_inactive'] . "\";\r\n";
         echo "Tab_icon_fa['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_icon_fa_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_display['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display'] . "\";\r\n";
         echo "Tab_display_position['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display_position'] . "\";\r\n";
         echo "Tab_links['" . $dados_menu['id'] . "']   = \"\";\r\n";
         $seq++;
     }
   }
 }
?>
Qtd_apls = <?php echo $seq ?>;
function createIframe(str_id, str_label, str_hint, str_img_on, str_img_off, str_link, tp_apl)
{
    apl_exist = false;
    Tab_icons[str_id] = str_img_on;
    Tab_icons_inactive[str_id] = str_img_off;
    Tab_refresh[str_id] = "";
    if (tp_apl == null || tp_apl == '')
    {
        tp_apl = 'others';
    }
    if (Tab_icons[str_id] == '')
    {
        Tab_icons[str_id] = Tab_ico_def[tp_apl];
    }
    if (Tab_icons_inactive[str_id] == '')
    {
        Tab_icons_inactive[str_id] = Tab_ico_ina_def[tp_apl];
    }
    for (i = 0; i < Qtd_apls; i++)
    {
        if (Tab_iframes[i] == str_id) {
            apl_exist = true;
        }
    }
    if (apl_exist)
    {
        if (Tab_abas[str_id] != 'show') {
            createAba(str_id);
        }
        var iframe = document.getElementById('iframe_' + str_id);
        iframe.src = str_link;
        mudaIframe(str_id);
        return;
    }
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    iframe.id = 'iframe_' + str_id;
    iframe.name = 'menu_pos_' + str_id + '_iframe';
    iframe.src = str_link;
    $('#Iframe_control').append(iframe);
    $('#iframe_' + str_id).addClass( 'scMenuIframe');
    Tab_iframes[Qtd_apls] = str_id;
    Tab_labels[str_id] = str_label;
    Tab_hints[str_id] = str_hint;
    Tab_abas[str_id]   = 'none';
    Tab_links[str_id]   = '';
    Qtd_apls++;
    createAba(str_id);
    mudaIframe(str_id);
}
function createAba(str_id)
{
    var tmp = "";
    var html_icon = "";
        html_icon = "<div style='display:inline-block;'>";
        str_icon = Tab_icons[str_id];
        if(str_icon=='')
        {
            str_icon = 'scriptcase__NM__ico__NM__sc_menu_others_e.png';
        }
        if(str_icon != '')
        {
            html_icon += "<img id='aba_td_" + str_id + "_icon_active' src='<?php echo $this->path_botoes; ?>/"+ str_icon +"' align='absmiddle' class='scTabIcon'>";
        }
        str_icon = Tab_icons_inactive[str_id];
        if(str_icon=='')
        {
            str_icon = 'scriptcase__NM__ico__NM__sc_menu_others_d.png';
        }
        if(str_icon != '')
        {
            html_icon += "<img id='aba_td_" + str_id + "_icon_inactive' src='<?php echo $this->path_botoes; ?>/"+ str_icon +"' align='absmiddle' class='scTabIcon' style='display:none;'>";
        }
        html_icon += "</div>";
    if(Tab_display[ str_id ] == 'text_fontawesomeicon' || Tab_display[ str_id ] == 'only_fontawesomeicon')
    {
        html_icon = "<i id='aba_td_" + str_id + "_icon_active' class='"+ Tab_icon_fa[str_id] +"' style='vertical-align:middle;padding: 0px 4px; display:none;'></i>";
        html_icon += "<i id='aba_td_" + str_id + "_icon_inactive' class='"+ Tab_icon_fa_inactive[str_id] +"' style='vertical-align:middle;padding: 0px 4px;'></i>";
    }
    tmp  = "<li onclick=\"mudaIframe('" + str_id + "');\" id='aba_td_" + str_id + "' style='cursor:pointer' class='lslide scTabActive' title=\"" + Tab_hints[str_id] + "\">";
    if(Tab_display_position[ str_id ] != 'img_right')
    {
        tmp += html_icon;
    }
    var home_style="";
    if(str_id === 'menu_pos'){ home_style=";padding-left:4px;min-height:14px;"; }
    tmp += "<div id='aba_td_txt_" + str_id + "' style='display:inline-block;cursor:pointer"+home_style+"' class='scTabText' >";
    tmp += Tab_labels[str_id];
    if(Tab_display_position[ str_id ] == 'img_right')
    {
        tmp += html_icon;
    }
    tmp += "</div>";
    tmp += "<div id='aba_td_3_" + str_id + "' style='display:none;'>...</div>";
if(str_id !== 'menu_pos'){
    tmp += "<div style='display:inline-block;'>";
    tmp += "    <img id='aba_td_img_" + str_id + "' src='<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' onclick=\"event.stopPropagation(); del_aba_td('" + str_id + "'); \" align='absmiddle' class='scTabCloseIcon' style='cursor:pointer; z-index:9999;'>";
    tmp += "</div>";
}
    tmp += "</li>";
    $('#contrl_abas').append(tmp);
    Tab_abas[str_id] = 'show';
}
function mudaIframe(str_id)
{
    $('#iframe_menu_pos').hide();
    if (Aba_atual != "")
    {
        Tab_links[Aba_atual] = document.getElementById('links_apls_itens').innerHTML;
        document.getElementById('links_apls_itens').innerHTML = '';
        $('#links_apls').hide();
    }
    if (str_id != "" && Tab_links[str_id] != "")
    {
        document.getElementById('links_apls_itens').innerHTML = Tab_links[str_id];
        $('#links_apls').show();
    }
    if (str_id == "")
    {
        $('#iframe_menu_pos').show();
        $('#iframe_' + Aba_atual).prop('src', '');
        $('#links_abas').hide();
        $('#id_links_abas').hide();
    }
    else
    {
        $('#aba_td_' + Aba_atual).removeClass( 'scTabActive' );
        $('#aba_td_' + Aba_atual).addClass( 'scTabInactive' );
        $('#aba_td_' + Aba_atual+'_icon_active').hide();
        $('#aba_td_' + Aba_atual+'_icon_inactive').show();
        $('#aba_td_img_' + Aba_atual).prop( 'src', '<?php echo $this->path_botoes . "/" . $this->css_menutab_inactive_close_icon; ?>' );
    }
    for (i = 0; i < Tab_iframes.length; i++) 
    {
        if (Tab_iframes[i] == str_id) 
        {
            if($('#iframe_' + Tab_iframes[i]).length < 1)
            {
                $('#Iframe_control').append('<iframe id="iframe_'+ Tab_iframes[i] +'" name="menu_pos_'+ Tab_iframes[i] +'_iframe" frameborder="0" class="scMenuIframe" style="display: none; width: 100%; height: 100%;" src=""></iframe>');
            }
            $('#iframe_' + Tab_iframes[i]).show();
            Aba_atual    = str_id;
            $('#aba_td_' + Aba_atual).removeClass( 'scTabInactive' );
            $('#aba_td_' + Aba_atual).addClass( 'scTabActive' );
            $('#aba_td_' + Aba_atual+'_icon_active').show();
            $('#aba_td_' + Aba_atual+'_icon_inactive').hide();
            $('#aba_td_img_' + Aba_atual).prop( 'src', '<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' );
            if (Tab_iframes[i] != 'menu_pos') 
            {
                Iframe_atual = "menu_pos_" + Tab_iframes[i] + '_iframe';
            }
            $('#iframe_' + Tab_iframes[i]).contents().find('body').css('width', '');
            $('#iframe_' + Tab_iframes[i])[0].contentWindow.focus();
        } else {
            $('#iframe_' + Tab_iframes[i]).hide();
        }
    }
    if (Tab_refresh[str_id] == 'S' && typeof document.getElementById('iframe_' + str_id).contentWindow.nm_move === 'function')
    {
        Tab_refresh[str_id] = '';
        document.getElementById('iframe_' + str_id).contentWindow.nm_move('igual');
    }
}
function del_aba_td(str_id)
{
    if(str_id === 'menu_pos') { return false; }
    $('#aba_td_' + str_id).remove();
    Tab_abas[str_id] = 'none';
    $('#iframe_' + str_id).prop('src', '');
    Tab_links[str_id] = "";
    if (Aba_atual == str_id)
    {
        str_id = "";
        for (i = 0; i < Tab_iframes.length; i++) 
        {
            if (Tab_abas[Tab_iframes[i]] == 'show' && Tab_refresh[Tab_iframes[i]] == 'S')
            {
                str_id = Tab_iframes[i];
            }
        }
        if (str_id == "")
        {
            for (i = 0; i < Tab_iframes.length; i++) 
            {
                if (Tab_abas[Tab_iframes[i]] == 'show')
                {
                    str_id = Tab_iframes[i];
                }
            }
        }
        if (str_id == "" && Aba_atual != "menu_pos")
        {
            document.getElementById('iframe_menu_pos').click();
        }
        else
        {
            mudaIframe(str_id);
        }
    }
  scToggleOverflow();
}
$( document ).ready(function() { scToggleOverflow() });
function scToggleOverflow()
{
    $('.scTabScroll').hide();
    $('#div_contrl_abas').removeClass('div-overflow');
    $('#contrl_abas').width('');

    tabsWidth = 0;
    if($('.scMenuTTable').length)
    {
        tabsWidth = $('#contrl_abas').outerWidth();
        windowWidth = $('#contrl_abas').closest('.ui-layout-pane').outerWidth();
    }
    else
    {
        tabsWidth = $('#contrl_abas').outerWidth();
        windowWidth = $( window ).outerWidth();
    }

    if(windowWidth < tabsWidth)
    {
        $('.scTabScroll').show();
        $('#div_contrl_abas').addClass('div-overflow');
        $('#contrl_abas').width((windowWidth - $('#id_links_abas').outerWidth()));
    }
}

function scTabScroll(axis) {
  if (axis == 'stop') {
      clearInterval(scScrollInterval);
      return;
  }
  if (axis == 'left') {
      scScrollInterval = setInterval("$('#div_contrl_abas').scrollLeft($('#div_contrl_abas').scrollLeft() - 3)", 2);
  } else {
      scScrollInterval = setInterval("$('#div_contrl_abas').scrollLeft($('#div_contrl_abas').scrollLeft() + 3)", 2);
  }
}
        function checkSubMenuPosition(str_id)
        {
            submenu = $('#' + str_id + '.menu__link').next('ul');
            if(submenu.length)
            {
                if(submenu.offset().left + submenu.outerWidth() > $('#main_menu_table').width())
                {
                    submenu.css('margin-left', ( $('#main_menu_table').width() - submenu.offset().left - submenu.outerWidth() - 10 ));
                }
           }
        }function openMenuItem(str_id)
{
  str_target_sv = "";
  if (str_id != "iframe_menu_pos")
  {
      str_target_sv = str_id + "_iframe";
      str_id        = str_id.replace("menu_pos_","");
  }
    if($('#Iframe_control').length && $('#' + str_id).parent().length < 0)
    {
        $('#Iframe_control').append('<iframe id="iframe_btn_1" name="menu_btn_1_iframe" frameborder="0" class="scMenuIframe" style="display: none;" src=""></iframe>');
    }
  if($('#' + str_id).parent().length)
  {
      if(!$('#' + str_id).parent().hasClass('menu__item--active'))
      {
        $('#' + str_id).closest('ul').find('li').removeClass('menu__item--active');
      }
       $('#' + str_id).parent().toggleClass('menu__item--active');
  }
  str_link   = $('#' + str_id).attr('item-href');
  str_target = $('#' + str_id).attr('item-target');
  if (typeof str_link !== typeof undefined && str_link !== false) {
    str_id = str_id.replace('iframe_menu_pos', 'menu_pos');
    if (str_target == "menu_pos_iframe" && str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        str_target = (str_target_sv != "") ? str_target_sv : str_target;
        mudaIframe(str_id);
        $('#links_abas').css('display','');
        $('#id_links_abas').css('display','');
        if (Tab_abas[str_id] != 'show')
        {
            createAba(str_id);
      scToggleOverflow();
        }
    }
    //test link type
    if (str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        if (str_link.substring(0, 11) == 'javascript:')
        {
            eval(str_link.substring(11));
        }
        else if (str_link != '#' && str_target != '_parent')
        {
            window.open(str_link, str_target);
        }
        else if (str_link != '#' && str_target == '_parent')
        {
            document.location = str_link;
        }
        <?php
        if ($menu_mobile_hide == 'S' && $menu_mobile_hide_onclick == 'S')
        {
        ?>
            HideMenu();
        <?php
        }
        ?>
    }
    if(str_target != '_blank' && $('#iframe_menu_pos').length)
        $('#iframe_menu_pos')[0].contentWindow.focus();
  }
}
</script>
<div id='div_lang_theme' style='height:20px;text-align:right;'>
<?php
        $tst_conf_reg = $this->str_lang . ";" . $this->str_conf_reg; 
?>
  <select class="css_toolbar_obj" style="vertical-align: middle;" id="id_nmgp_idioma" onChange="Nm_change_lang_locale()" >
<?php
      foreach ($this->Nm_lang_conf_region as $cada_idioma => $cada_descr)
      {
         $obj_sel = ($tst_conf_reg == $cada_idioma) ? " selected" : "";
?>
           <option value="<?php echo NM_encode_input($cada_idioma); ?>" <?php echo $obj_sel; ?>><?php echo $cada_descr; ?></option>
<?php
      }
?>
  </select>
</div>

    <?php
    if(isset($expand_icon) && !empty($expand_icon) && isset($collapse_icon) && !empty($collapse_icon))
    {
      ?>
        <a href='#' onclick='expandMenu();' id='id_expand' class='scMenuExpand' style=''><img src='<?php echo $path_imag_cab . '/' . $expand_icon; ?>' border=0 /></a>
        <a href='#' onclick='collapseMenu();' id='id_collapse' class='scMenuCollapse' style=''><img src='<?php echo $path_imag_cab . '/' . $collapse_icon; ?>' border=0 /></a>
      <?php
    }
    ?>
<?php
$fixMainMenuPosition = ($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])) ? '' : '; position: absolute';
?>
<table id="main_menu_table" <?php echo $strAlign; ?> style="border-collapse: collapse; border-width: 0px; height:calc(100% - 20px);; width: <?php echo $larg_table; ?><?php echo $fixMainMenuPosition; ?>" cellpadding=0 cellspacing=0>
  <tr id='idMenuHeader'>
    <td style="padding: 0px" valign="top" <?php echo $col_span; ?>>
        <style>
                .td_corner { width:3px; height:3px; }
        </style>
   <TABLE width="100%" class="scMenuHHeader" cellpadding="0" cellspacing="0">
    <TR>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_te.gif" border="0px"   alt="" /></TD>
     <TD width="*" bgcolor="#000000"></TD>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_td.gif" border="0px"   alt="" /></TD>
    </TR>
    <TR>
     <TD  bgcolor="#000000"></TD>
     <TD style="padding: 0px">
      <TABLE style="padding: 2px; border-spacing: 1px; border-width: 0px;" width="100%" class="scMenuHHeader">
       <TR align="center" class="scMenuHHeaderFont">
        <TD>
         <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
          <TR align="center" valign="middle">
           <TD align="left" rowspan="2">
               
           </TD>
           <TD class="scMenuHHeaderFont">
               
           </TD>
          </TR>
          <TR align="right" valign="middle">
           <TD class="scMenuHHeaderFont">
               
           </TD>
          </TR>
         </TABLE>
        </TD>
       </TR>
      </TABLE>
     </TD>
     <TD  bgcolor="#000000"></TD>
    </TR>
    <TR>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_be.gif" border="0px"   alt="" /></TD>
     <TD width="*" bgcolor="#000000"></TD>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_bd.gif" border="0px"   alt="" /></TD>
    </TR>
   </TABLE>    </td>
  </tr>
<?php echo ($this->menu_orientacao=='vertical')?$this->nm_show_toolbarmenu($col_span, $saida_apl, $menu_pos_menuData, $path_imag_cab):''; ?>  <tr class="scMenuHTableCss scMenuLine" id='idMenuLine'>
  <?php
  if($this->menu_orientacao != 'vertical')
  {
    ?>
      <td <?php echo $strAlign; ?> valign="top" style="width:100%; height:30;padding: 0px;" id='idMenuCell'>
    <?php
  }
  else
  {
    ?>
      <td <?php echo $strAlign; ?> valign="top" style="vertical-align:top;" id='idMenuCell'>
    <?php
  }
  ?>
<div id="scScrollFix" style="height: 1px"></div>
<script type="text/javascript">
function fnScrollFix() {
 if($('#css3menu1 li').length > 0)
 {
     var txt = document.getElementById("scScrollFix").innerHTML;
     if ("&nbsp;" == txt) { txt = "&nbsp;&nbsp;"; } else { txt = "&nbsp;"; }
     document.getElementById("scScrollFix").innerHTML = txt;
 }
 setTimeout("fnScrollFix()", 1000);
}
setTimeout("fnScrollFix()", 1000);
</script>
<div id="idDivMenu">
<?php
  if($this->menu_orientacao != 'horizontal')    
  {    
    ?>    
<table style='width:100%' cellspacing='0' cellpadding='0'><tr>
    <?php    
  }    
  else    
  {    
    ?>    
<table style='<?php echo ($menutree_mobile_float == 'S' && ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))?'':'width:100%'; ?>' cellspacing='0' cellpadding='0'><tr>
    <?php    
  }    
echo $this->menu_pos_escreveMenu($menu_pos_menuData['data'], $path_imag_cab, $strAlign);
?></tr></table>
</div>
<?php
/* Control de iframe */
if ($menu_pos_menuData['iframe'])
{
?>
    </td>
<?php
if($this->menu_orientacao != 'vertical')
{
?>
  </tr>
<?php echo $this->nm_show_toolbarmenu('', $saida_apl, $menu_pos_menuData, $path_imag_cab); ?><?php echo $this->nm_gera_degrade(1, $bg_line_degrade, $path_imag_cab); ?>  <tr>
        <td id="links_abas" style="display: none;">
          <script>     function isMobile() {
        var check = false;
        (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
        return check;
    }
    $(document).ready(function () {
        if (!$('#idMenuHeader').length && $('#idMenuFLoat').length) {
            $('#id_links_abas').css('padding-top', $('#bmenu').outerHeight() + 'px');
        }
    })</script>
          <div id="id_links_abas" style="display: none; " class='scTabLine'>
            <div class='scTabScroll left' style='float:left;display:none;' onmousedown='scTabScroll("left");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div class='scTabScroll right' style='float:right;display:none;'onmousedown='scTabScroll("right");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div id='div_contrl_abas' class='scTabCtrl' style='overflow:hidden;white-space: nowrap;'>
              <ul id='contrl_abas' style='margin:0px; padding:0px; display: inline-block;'></ul>
            </div>
          </div>
        </td>
        </tr><tr>
        <td id="links_apls" style="display: none;">
            <div id="links_apls_itens" class='scMenuBreadcrumbLine'></div>
        </td>
        </tr><tr>
<?php
}
else
{
    echo $this->nm_gera_degrade(2, $bg_line_degrade, $path_imag_cab);
}
?>
<?php
if($this->menu_orientacao != 'vertical')
{
?>
    <td id="Iframe_control_td" style="border-width: 1px; height: 100%; padding: 0px;vertical-align:top;text-align:center;">
<?php
}
else
{
?>
    <td id='id_iframe_td' style="border-width: 1px; width: 100%; height: 100%; padding: 0px">
      <table cellspacing=0 cellpadding=0 width='100%' height='100%'>
        <tr>
        <td id="links_abas" style="display: none;">
          <script>     function isMobile() {
        var check = false;
        (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
        return check;
    }
    $(document).ready(function () {
        if (!$('#idMenuHeader').length && $('#idMenuFLoat').length) {
            $('#id_links_abas').css('padding-top', $('#bmenu').outerHeight() + 'px');
        }
    })</script>
          <div id="id_links_abas" style="display: none; " class='scTabLine'>
            <div class='scTabScroll left' style='float:left;display:none;' onmousedown='scTabScroll("left");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div class='scTabScroll right' style='float:right;display:none;'onmousedown='scTabScroll("right");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div id='div_contrl_abas' class='scTabCtrl' style='overflow:hidden;white-space: nowrap;'>
              <ul id='contrl_abas' style='margin:0px; padding:0px; display: inline-block;'></ul>
            </div>
          </div>
        </td>
        </tr><tr>
        <td id="links_apls" style="display: none;">
            <div id="links_apls_itens" class='scMenuBreadcrumbLine'></div>
        </td>
        </tr><tr>
        <td width='100%' height='100%' style='vertical-align:top;text-align:center;'>
<?php
}
?>
    <div id="Iframe_control" style='width:100%; height:100%; margin:0px; padding:0px;'>
<?php
$link_default = "";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['chart_sales']) && $_SESSION['scriptcase']['sc_apl_seg']['chart_sales'] == "on") 
{ 
    $SCR  = "";
    $link_default = " onclick=\"openMenuItem('iframe_menu_pos');\" item-href=\"menu_pos_form_php.php?sc_item_menu=menu_pos&sc_apl_menu=chart_sales&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . "\"  item-target=\"menu_pos_iframe\"";
} 
else
{ 
    $SCR  = ($NM_scr_iframe != "" ? $NM_scr_iframe : "menu_pos_pag_ini.php");
} 
?>
      <iframe id="iframe_menu_pos" name="menu_pos_iframe" frameborder="0" class="scMenuIframe" style="width: 100%; height: 100%;"  src="<?php echo $SCR; ?>" <?php echo $link_default ?>></iframe>
<?php
}
?></div></td>
  </tr>
<?php
  if($this->menu_orientacao=='vertical')
  {
  ?>
</table>
</td>
</tr>
  <?php
  }
?>
</table>
</body>
</html>
<?php

if (isset($link_default) && !empty($link_default))
{
    echo "<script>";
    echo "   document.getElementById('iframe_menu_pos').click()";
    echo "</script>";
}

}

/* Control de Target */
function menu_pos_escreveMenu($arr_menu, $path_imag_cab = '', $strAlign = '')
{
    global $nm_data_fixa;
    $last      = '';
    $itemClass = ' topfirst';
    $subSize   = 2;
    $subCount  = array();
    $tabSpace  = 1;
    $intMult   = 2;
    $aMenuItemList = array();
    foreach ($arr_menu as $ind => $resto)
    {
        $aMenuItemList[] = $resto;
    }
?>
<td <?php echo $strAlign; ?>>
  <div class='mainmenu menu--horizontal'>
      <div class='menu__toggle'>
          <span></span>
          <span></span>
          <span></span>
      </div>
      <div class='menu__container '>
        <ul id="css3menu1" class="topmenu menu__list" style="<?php echo ($this->menu_orientacao=='vertical')?'width:100%;':''; ?>" >
        <?php
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if (0 == $aMenuItemList[$i]['level']) {
                    $last = $aMenuItemList[$i]['id'];
                }
            }
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if ($last == $aMenuItemList[$i]['id']) {
                    $itemClass = ' toplast';
                }
                $htmlClass = '';
                $hasChildrens = false;
                if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level']) {
                    $hasChildrens = true;
                }
                if (0 == $aMenuItemList[$i]['level']) {
                    $htmlClass = 'topmenu' . $itemClass;
                    if ($hasChildrens) {
                        $htmlClass .= ' toproot';
                    }
                }
                else
                {
                    $htmlClass .= ' menu__item--withsubmenu';
                }
                ?>
                <li class='menu__item <?php echo $htmlClass; ?>'>
                <?php
                if ('' != $aMenuItemList[$i]['icon'] && file_exists($this->path_imag_apl . "/" . $aMenuItemList[$i]['icon'])) {
                    $iconHtml = '../_lib/img/' . $aMenuItemList[$i]['icon'];
                }
                else {
                    $iconHtml = '';
                }
                $sDisabledClass = '';
                if ('Y' == $aMenuItemList[$i]['disabled']) {
                    $aMenuItemList[$i]['link']   = '#';
                    $aMenuItemList[$i]['target'] = '';
                    $sDisabledClass               = 0 == $aMenuItemList[$i]['level'] ? ' scdisabledmain' : ' scdisabledsub';
                }
                if (empty($aMenuItemList[$i]['link'])) {
                    $aMenuItemList[$i]['link']   = '#';
                }
                $str_item = "<i class='menu__icon fas'></i>";
                if ($hasChildrens) {
                    $str_item .= "<span>";
                }
                if($aMenuItemList[$i]['display'] == 'only_img' && $iconHtml != '')
                {
                    $str_item .= '<img src=' . $iconHtml . ' border="0" />';
                }
                elseif($aMenuItemList[$i]['display'] == 'text_img' || empty($aMenuItemList[$i]['display']))
                {
                    $str_image = '';
                    $str_image_right = '';
                    if($iconHtml != '')
                    {
                        $str_image = '<img src="' . $iconHtml . '" border="0" />';
                        $str_image_right = '<img src="' . $iconHtml . '" border="0" style="margin-left: 10px; margin-right: 0px;" />';
                    }
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= $str_image . $aMenuItemList[$i]['label'];
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] . $str_image_right;
                    }
                }
                elseif($aMenuItemList[$i]['display'] == 'only_fontawesomeicon')
                {
                    $str_item .= "<i class='icon_fa menu__icon ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                }
                elseif($aMenuItemList[$i]['display'] == 'text_fontawesomeicon')
                {
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= "<i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i> ". $aMenuItemList[$i]['label'] ."";
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] ." <i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                    }
                }
                else
                {
                    $str_item .= $aMenuItemList[$i]['label'];
                }
                if ($hasChildrens) {
                    $str_item .= "</span>";
                }
                ?>
                    <a href="javascript:" <?php if ($hasChildrens){ ?>onmouseover="checkSubMenuPosition('<?php echo $aMenuItemList[$i]['id']; ?>');" <?php } ?> onclick="openMenuItem('menu_pos_<?php echo $aMenuItemList[$i]['id']; ?>');" item-href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>" <?php echo $aMenuItemList[$i]['target']; ?> class='menu__link <?php echo $sDisabledClass; ?>'><?php echo $str_item; ?></a>
                <?php
                if ($hasChildrens) {
                ?>
                    <ul class='menu__submenu' style=''>
                    <?php
                }
                else {
                ?>
                <?php
                }
                if (($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == $aMenuItemList[$i + 1]['level']) || 
                    ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == 0)) {
                    ?>
                    <?php echo str_repeat(' ', $tabSpace * $intMult); ?></li>
                    <?php
                    if (0 != $subSize && 0 < $aMenuItemList[$i]['level']) {
                        if (!isset($subCount[ $aMenuItemList[$i]['level'] ])) {
                            $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                        }
                        $subCount[ $aMenuItemList[$i]['level'] ]++;
                    }
                    if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level'] - $aMenuItemList[$i + 1]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    if ($subSize == $subCount[ $aMenuItemList[$i]['level'] ]) {
                        $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                    }
                }
                $itemClass = '';
            }
        ?>
        </ul>
      </div>
  </div>
</td>
<?php
}
function menu_pos_target($str_target)
{
    global $menu_pos_menuData;
    if ('_blank' == $str_target)
    {
        return '_blank';
    }
    elseif ('_parent' == $str_target)
    {
        return '_parent';
    }
    elseif ($menu_pos_menuData['iframe'])
    {
        return 'menu_pos_iframe';
    }
    else
    {
        return $str_target;
    }
}

function nm_show_toolbarmenu($col_span, $saida_apl, $menu_pos_menuData, $path_imag_cab)
{
    if(!empty($this->mobile_menu_toolbar) && ($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])))
    {
        return;
    }
}

   function nm_prot_aspas($str_item)
   {
       return str_replace('"', '\"', $str_item);
   }

   function nm_gera_menus(&$str_line_ret, $arr_menu_usu, $int_level, $nome_aplicacao)
   {
       global $menu_pos_menuData; 
       foreach ($arr_menu_usu as $arr_item)
       {
           $str_line   = array();
           $str_line['label']    = $this->nm_prot_aspas($arr_item['label']);
           $str_line['level']    = $int_level - 1;
           $str_line['link']     = "";
           $nome_apl = $arr_item['link'];
           $pos = strrpos($nome_apl, "/");
           if ($pos !== false)
           {
               $nome_apl = substr($nome_apl, $pos + 1);
           }
           if ('' != $arr_item['link'])
           {
               if ($arr_item['target'] == '_parent')
               {
                    $str_line['link'] = "menu_pos_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . ""; 
               }
               else
               {
                    $str_line['link'] = "menu_pos_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menu_pos_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_pos']['glo_nm_usa_grupo'] . ""; 
               }
           }
           elseif ($arr_item['target'] == '_parent')
           {
           }
           $str_line['hint']     = ('' != $arr_item['hint']) ? $this->nm_prot_aspas($arr_item['hint']) : '';
           $str_line['id']       = $arr_item['id'];
           $str_line['icon']     = ('' != $arr_item['icon_on']) ? $arr_item['icon_on'] : '';
           $str_line['icon_aba'] = (isset($arr_item['icon_aba']) && '' != $arr_item['icon_aba']) ? $arr_item['icon_aba'] : '';
           $str_line['icon_aba_inactive'] = (isset($arr_item['icon_aba_inactive']) && '' != $arr_item['icon_aba_inactive']) ? $arr_item['icon_aba_inactive'] : '';
           $str_line['display'] = (isset($arr_item['display'])) ? $arr_item['display'] : 'text_img';
           $str_line['display_position'] = (isset($arr_item['display_position'])) ? $arr_item['display_position'] : 'text_right';
           $str_line['icon_fa'] = (isset($arr_item['icon_fa'])) ? $arr_item['icon_fa'] : '';
           $str_line['icon_color'] = (isset($arr_item['icon_color'])) ? $arr_item['icon_color'] : '';
           $str_line['icon_color_hover'] = (isset($arr_item['icon_color_hover'])) ? $arr_item['icon_color_hover'] : '';
           $str_line['icon_color_disabled'] = (isset($arr_item['icon_color_disabled'])) ? $arr_item['icon_color_disabled'] : '';
           if ('' == $arr_item['link'] && $arr_item['target'] == '_parent')
           {
               $str_line['target'] = '_parent';
           }
           else
           {
                $str_line['target'] = ('' != $arr_item['target'] && '' != $arr_item['link']) ?  $this->menu_pos_target( $arr_item['target']) : "_self"; 
           }
           $str_line['target']   = ' item-target="' . $str_line['target']  . '" ';
           $str_line['sc_id']    = $arr_item['id'];
           $str_line['disabled'] = "N";
           $str_line_ret[] = $str_line;
           if (!empty($arr_item['menu_itens']))
           {
               $this->nm_gera_menus($str_line_ret, $arr_item['menu_itens'], $int_level + 1, $nome_aplicacao);
           }
       }
   }

   function nm_arr_menu_recursiv($arr, $id_pai = '')
   {
         $arr_return = array();
         foreach ($arr as $id_menu => $arr_menu)
         {
             if ($id_pai == $arr_menu['pai']) 
             {
                 $arr_return[] = array('label'      => $arr_menu['label'],
                                        'link'       => $arr_menu['link'],
                                        'target'     => $arr_menu['target'],
                                        'icon_on'    => $arr_menu['icon'],
                                        'icon_aba'   => $arr_menu['icon_aba'],
                                        'icon_aba_inactive'   => $arr_menu['icon_aba_inactive'],
                                        'hint'       => $arr_menu['hint'],
                                        'id'         => $id_menu,
                                        'menu_itens' => $this->nm_arr_menu_recursiv($arr, $id_menu),
                                        'display'      => $arr_menu['display'],
                                        'display_position' => $arr_menu['display_position'],
                                        'icon_fa'      => $arr_menu['icon_fa'],
                                        'icon_color'      => $arr_menu['icon_color'],
                                        'icon_color_hover'      => $arr_menu['icon_color_hover'],
                                        'icon_color_disabled'      => $arr_menu['icon_color_disabled'],
                                        );
             }
         }
         return $arr_return;
   }
   //1 horizontal
   //2 vertical
   function nm_gera_degrade($menu_opc, $bg_line_degrade, $path_imag_cab)
   {
       $str_retorno = "";
       //have bg color degrade
       if(!empty($bg_line_degrade) && count($bg_line_degrade)>0)
       {
           if($menu_opc == 1)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<tr style=\"height:1px; padding: 0px;\">\r\n";
                       $str_retorno .= "  <td style=\"height:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\"><img src='". $path_imag_cab ."/transparent.png' border=\"0\" style=\"height:1px;\"></td>\r\n";
                       $str_retorno .= "</tr>\r\n";
                   }
               }
           }
           elseif($menu_opc == 2)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<td style=\"width:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\">\r\n";
                       $str_retorno .= "<img src='" . $path_imag_cab . "/transparent.png' border=\"0\" style=\"width:1px;\">\r\n";
                       $str_retorno .= "</td>\r\n";
                   }
               }
           }
       }
       return $str_retorno;
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['menu_pos']['sc_init'][$apl_menu] = rand(2, 10000);
        $_SESSION['sc_session'][$_SESSION['scriptcase']['menu_pos']['sc_init'][$apl_menu]] = array();
        return  $_SESSION['scriptcase']['menu_pos']['sc_init'][$apl_menu];
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
//
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $delim  = "'";
       $delim1 = "'";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_access))
       {
           $delim  = "#";
           $delim1 = "#";
       }
       if (isset($_SESSION['scriptcase']['menu_pos']['SC_sep_date']) && !empty($_SESSION['scriptcase']['menu_pos']['SC_sep_date']))
       {
           $delim  = $_SESSION['scriptcase']['menu_pos']['SC_sep_date'];
           $delim1 = $_SESSION['scriptcase']['menu_pos']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_sqlsrv' || strtolower($_SESSION['scriptcase']['glo_tpbanco']) == 'pdo_dblib')
       { 
           $dt  = $delim . date('Ymd H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_access))
       { 
           $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_informix))
       { 
           $dt  = "EXTEND(" . $dt . ", YEAR TO FRACTION)";
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_access))
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'menu_pos', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'menu_pos', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'menu_pos', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
       }
   }

}
if (isset($_POST['nmgp_start'])) {$nmgp_start = $_POST['nmgp_start'];} 
if (isset($_GET['nmgp_start']))  {$nmgp_start = $_GET['nmgp_start'];} 
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual)) {
    $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys  = str_replace("\\", '/', $str_path_sys);
}
else {
    $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$str_path_web    = $_SERVER['PHP_SELF'];
$str_path_web    = str_replace("\\", '/', $str_path_web);
$str_path_web    = str_replace('//', '/', $str_path_web);
$path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
$root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
    if (isset($_COOKIE['sc_apl_default_pointofsales'])) {
        $apl_def = explode(",", $_COOKIE['sc_apl_default_pointofsales']);
    }
    elseif (is_file($root . $_SESSION['scriptcase']['menu_pos']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['menu_pos']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "menu_pos") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['menu_pos']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['menu_pos']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['menu_pos']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_pointofsales'])) {
            $_SESSION['scriptcase']['menu_pos']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_pointofsales'];
        }
    }
}
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang")
    {
        $nmgp_opcao  = $_POST['nmgp_opcao'];
        $nmgp_idioma = $_POST['nmgp_idioma'];
    }
    else
    {
        $nmgp_opcao  = $_GET['nmgp_opcao'];
        $nmgp_idioma = $_GET['nmgp_idioma'];
    }
    $Temp_lang = explode(";" , $nmgp_idioma);
    if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))
    {
        $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
    }
    if (isset($Temp_lang[1]) && !empty($Temp_lang[1]))
    {
        $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
    }
}
$contr_menu_pos = new menu_pos_class;
$contr_menu_pos->menu_pos_menu();

?>
