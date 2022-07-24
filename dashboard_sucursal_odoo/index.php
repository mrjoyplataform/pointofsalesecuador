<?php

include_once('dashboard_sucursal_odoo_session.php');
@ini_set('session.cookie_httponly', 0);
@ini_set('session.use_only_cookies', 0);
@ini_set('session.cookie_secure', 0);
@session_start();

$_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_perfil']          = "conn_pos";
$_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_prod']       = "";
$_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_imagens']    = "";
$_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_imag_temp']  = "";
$_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_doc']        = "";
//check publication with the prod
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $str_path_sys = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys = str_replace("\\", '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$str_path_apl_url = $_SERVER['PHP_SELF'];
$str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
$str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
$str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
$str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
$str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
//check prod
if(empty($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_prod']))
{
    /*check prod*/$_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
}
//check img
if(empty($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_imagens']))
{
    /*check img*/$_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
}
//check tmp
if(empty($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_imag_temp']))
{
    /*check tmp*/$_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
}
//check doc
if(empty($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_doc']))
{
    /*check doc*/$_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
}
//end check publication with the prod
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('pointofsales');
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}

$Sc_lig_md5 = false;
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
if (!isset($_SERVER['HTTP_REFERER']) || (!isset($_POST['nmgp_opcao']) && !isset($_POST['script_case_init']) && !isset($_POST['nmgp_start']) && !isset($_GET['nmgp_opcao']) && !isset($_GET['script_case_init']) && !isset($_GET['nmgp_start'])))
{
    $Sem_Session = false;
}
if (!empty($_POST))
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
            if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
            {
                $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                $Sc_lig_md5 = true;
            }
            else
            {
                $_SESSION['sc_session']['SC_parm_violation'] = true;
            }
        }
        if (isset($sc_conv_var[$nmgp_var]))
        {
            $nmgp_var = $sc_conv_var[$nmgp_var];
        }
        elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
        {
            $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
        }
        nm_limpa_str_dashboard_sucursal_odoo($nmgp_val);
        $nmgp_val = NM_decode_input($nmgp_val);
        $$nmgp_var = $nmgp_val;
    }
}
if (!empty($_GET))
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
            if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
            {
                $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                $Sc_lig_md5 = true;
            }
            else
            {
                $_SESSION['sc_session']['SC_parm_violation'] = true;
            }
        }
        if (isset($sc_conv_var[$nmgp_var]))
        {
            $nmgp_var = $sc_conv_var[$nmgp_var];
        }
        elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
        {
            $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
        }
        nm_limpa_str_dashboard_sucursal_odoo($nmgp_val);
        $nmgp_val = NM_decode_input($nmgp_val);
        $$nmgp_var = $nmgp_val;
    }
}
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
    elseif (is_file($root . $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "dashboard_sucursal_odoo") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_pointofsales'])) {
            $_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_pointofsales'];
        }
    }
}
if (isset($nmgp_parms) && !empty($nmgp_parms) && !is_array($nmgp_parms))
{
    if (isset($_SESSION['nm_aba_bg_color']))
    {
        unset($_SESSION['nm_aba_bg_color']);
    }  
    $nmgp_parms = NM_decode_input($nmgp_parms);
    $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
    $todo  = explode("?@?", $todox);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       if (1 < sizeof($cadapar))
       {
           if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
           {
               $cadapar[0] = substr($cadapar[0], 11);
               $cadapar[1] = $_SESSION[$cadapar[1]];
           }
           nm_limpa_str_dashboard_sucursal_odoo($cadapar[1]);
           if (isset($sc_conv_var[$cadapar[0]]))
           {
               $cadapar[0] = $sc_conv_var[$cadapar[0]];
           }
           elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
           {
               $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
           }
           if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
           $Tmp_par   = $cadapar[0];
           $$Tmp_par = $cadapar[1];
       }
       $ix++;
    }
}
elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['dashboard_sucursal_odoo']['parms']))
{
    if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
    {
        $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['dashboard_sucursal_odoo']['parms']);
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
           $Tmp_par   = $cadapar[0];
           $$Tmp_par = $cadapar[1];
           $ix++;
        }
    }
}
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'])
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
        $_SESSION['scriptcase']['str_conf_reg']        = $Temp_lang[1];
    }
}

$dashboard_sucursal_odoo_control = new dashboard_sucursal_odoo_control();
$dashboard_sucursal_odoo_control->control();

class dashboard_sucursal_odoo_ini {

    var $nm_cod_apl;
    var $nm_nome_apl;
    var $nm_seguranca;
    var $nm_grupo;
    var $nm_grupo_versao;
    var $nm_autor;
    var $nm_versao_sc;
    var $nm_tp_lic_sc;
    var $nm_dt_criacao;
    var $nm_hr_criacao;
    var $nm_autor_alt;
    var $nm_dt_ult_alt;
    var $nm_hr_ult_alt;
    var $nm_timestamp;
    var $sc_site_ssl;
    var $sc_protocolo;
    var $path_prod;
    var $path_imagens;
    var $path_imag_temp;
    var $path_doc;
    var $server;
    var $root;
    var $path_aplicacao;
    var $path_embutida;
    var $path_link;
    var $path_libs;
    var $path_help;
    var $path_lang;
    var $path_lang_js;
    var $path_botoes;
    var $path_img_global;
    var $path_img_modelo;
    var $path_icones;
    var $path_imag_cab;
    var $path_adodb;
    var $url_lib;
    var $url_third;
    var $sc_page;
    var $str_lang;
    var $str_conf_reg;
    var $Nm_lang;
    var $Nm_lang_conf_region;
    var $display_as_mobile;
    var $force_db_utf8 = true;

    function init()
    {
        @ini_set('magic_quotes_runtime', 0);

        $this->sc_page = rand(2, 10000);
        if(isset($_POST['script_case_init']))
        {
            $this->sc_page = filter_input(INPUT_POST, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
        }
        elseif(isset($_GET['script_case_init']))
        {
            $this->sc_page = filter_input(INPUT_GET, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
        }
        $_SESSION['scriptcase']['sc_num_page'] = $this->sc_page;
        if (!isset($_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo'])) {
            $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo'] = array();
        }
        if (!isset($_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['embutida_form'])) {
            $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['embutida_form'] = false;
        }
        if (!isset($_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['embutida_proc'])) {
            $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['embutida_proc'] = false;
        }
        if (!isset($_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['iframe_menu'])) {
            $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['iframe_menu'] = false;
        }

        $this->nm_cod_apl      = "dashboard_sucursal_odoo";
        $this->nm_nome_apl     = "";
        $this->nm_seguranca    = "";
        $this->nm_grupo        = "pointofsales";
        $this->nm_grupo_versao = "1";
        $this->nm_autor        = "admin";
        $this->nm_versao_sc    = "v9";
        $this->nm_tp_lic_sc    = "ep_bronze";
        $this->nm_dt_criacao   = "20220117";
        $this->nm_hr_criacao   = "110244";
        $this->nm_autor_alt    = "admin";
        $this->nm_dt_ult_alt   = "20220510";
        $this->nm_hr_ult_alt   = "092817";
        list($NM_usec, $NM_sec) = explode(" ", microtime());
        $this->nm_timestamp  = (float) $NM_sec;

        $NM_dir_atual = getcwd();
        if (empty($NM_dir_atual))
        {
            $str_path_sys = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
            $str_path_sys = str_replace("\\", '/', $str_path_sys);
        }
        else
        {
            $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
            $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
        }

        //check publication with the prod
        $str_path_apl_url = $_SERVER['PHP_SELF'];
        $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
        $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
        $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
        $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
        $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);

        $this->sc_site_ssl    = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
        $this->sc_protocolo   = ($this->sc_site_ssl) ? 'https://' : 'http://';
        $this->sc_protocolo   = "";
        $this->path_prod      = $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_prod'];
        $this->path_imagens   = $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_imagens'];
        $this->path_imag_temp = $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_imag_temp'];
        $this->path_doc       = $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_path_doc'];

        $this->server = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
        if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
        {
            $this->server .= ":" . $_SERVER['SERVER_PORT'];
        }
        $this->server = "";

        $str_path_web          = $_SERVER['PHP_SELF'];
        $str_path_web          = str_replace("\\", '/', $str_path_web);
        $str_path_web          = str_replace('//', '/', $str_path_web);
        $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
        $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
        $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/dashboard_sucursal_odoo';
        $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
        $this->path_aplicacao .= '/';
        $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
        $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
        $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
        $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php/";
        $this->url_lib_js      = $this->path_link . "_lib/lib/js/";
        $this->path_help       = $this->path_link . "_lib/webhelp/";
        $this->path_lang       = "../_lib/lang/";
        $this->path_lang_js    = "../_lib/js/";
        $this->path_botoes     = $this->path_link . "_lib/img";
        $this->path_img_global = $this->path_link . "_lib/img";
        $this->path_img_modelo = $this->path_link . "_lib/img";
        $this->path_icones     = $this->path_link . "_lib/img";
        $this->path_imag_cab   = $this->path_link . "_lib/img";
        $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";

        $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
        $this->url_lib   = $this->path_link . '/_lib/';
        $this->url_third = $this->path_prod . '/third/';

        $this->str_lang     = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
        $this->str_conf_reg = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "es_us";
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

        if (isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['lang'])) {
            $this->str_lang = $_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['lang'];
        }
        elseif (!isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['actual_lang']) || $_SESSION['scriptcase']['dashboard_sucursal_odoo']['actual_lang'] != $this->str_lang) {
            $_SESSION['scriptcase']['dashboard_sucursal_odoo']['actual_lang'] = $this->str_lang;
            setcookie('sc_actual_lang_pointofsales',$this->str_lang,'0','/');
        }
        include($this->path_lang . $this->str_lang . ".lang.php");
        include($this->path_lang . "config_region.php");
        include($this->path_lang . "lang_config_region.php");

        $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data");
        $this->nm_data = new nm_data($this->str_lang);

        $_SESSION['scriptcase']['charset'] = "UTF-8";
        ini_set('default_charset', $_SESSION['scriptcase']['charset']);
        $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
        asort($this->Nm_lang_conf_region);
        foreach ($this->Nm_lang_conf_region as $ind => $dados)
        {
           if (isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
           {
               $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
           }
        }

        foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
        {
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && $this->isUtf8($dados))
            {
                $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
        }
        foreach ($this->Nm_lang as $ind => $dados)
        {
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && $this->isUtf8($ind))
            {
                $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
                $this->Nm_lang[$ind] = $dados;
            }
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && $this->isUtf8($dados))
            {
                $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
        }
        $_SESSION['scriptcase']['reg_conf']['html_dir'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'])) ? " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
        if (isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['redir'])) {
            $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">';
            $SS_cod_html .= "<HTML>\r\n";
            $SS_cod_html .= " <HEAD>\r\n";
            $SS_cod_html .= "  <TITLE></TITLE>\r\n";
            $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
            if ($_SESSION['scriptcase']['proc_mobile']) {
                $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
            }
            $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
            $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
            if ($_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['redir_tp'] == "R") {
                $SS_cod_html .= "  </HEAD>\r\n";
                $SS_cod_html .= "   <body>\r\n";
            }
            else {
                $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
                $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
                $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
                $SS_cod_html .= "           target=\"_self\">\r\n";
                $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['redir'] . "');\">\r\n";
                $SS_cod_html .= "     </form>\r\n";
                $SS_cod_html .= "    </td></tr></table>\r\n";
                $SS_cod_html .= "    </div></td></tr></table>\r\n";
            }
            $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
            if ($_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['redir_tp'] == "R") {
                $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']['redir'] . "');\r\n";
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
            unset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['session_timeout']);
            unset($_SESSION['sc_session']);
        }
        if (isset($SS_cod_html))
        {
            echo $SS_cod_html;
            exit;
        }
        if (isset($_SESSION['sc_session']['SC_parm_violation']))
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

        if (!function_exists("mb_convert_encoding"))
        {
            echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
        }
        elseif (!function_exists("sc_convert_encoding"))
        {
            echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
        }
        $PHP_ver = str_replace(".", "", phpversion());
        if (substr($PHP_ver, 0, 3) < 434)
        {
            echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
        }

        if (file_exists($this->path_libs . "/ver.dat"))
        {
            $SC_ver = file($this->path_libs . "/ver.dat");
            $SC_ver = str_replace(".", "", $SC_ver[0]);
            if (substr($SC_ver, 0, 5) < 40015)
            {
                echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
            }
        }

        $this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
        include("../_lib/css/" . $this->str_schema_all . "_form.php");
        $this->Str_btn_form = trim($str_button);

        $this->regionalDefault();
        $this->loadFieldConfig();
        include_once($this->path_adodb . "/adodb.inc.php");
        $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod");
        $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib");
        perfil_lib($this->path_libs);
        if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
        {
            if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
            $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
        }
        $this->nm_bases_access     = array("access", "ado_access", "ace_access");
        $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
        $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
        $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
        $this->nm_bases_mssql      = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib", "azure_mssql", "azure_ado_mssql", "azure_adooledb_mssql", "azure_odbc_mssql", "azure_mssqlnative", "azure_pdo_sqlsrv", "azure_pdo_dblib", "googlecloud_mssql", "googlecloud_ado_mssql", "googlecloud_adooledb_mssql", "googlecloud_odbc_mssql", "googlecloud_mssqlnative", "googlecloud_pdo_sqlsrv", "googlecloud_pdo_dblib", "amazonrds_mssql", "amazonrds_ado_mssql", "amazonrds_adooledb_mssql", "amazonrds_odbc_mssql", "amazonrds_mssqlnative", "amazonrds_pdo_sqlsrv", "amazonrds_pdo_dblib");
        $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
        $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
        $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle", "oraclecloud_oci8", "oraclecloud_oci805", "oraclecloud_oci8po", "oraclecloud_odbc_oracle", "oraclecloud_oracle", "oraclecloud_pdo_oracle", "amazonrds_oci8", "amazonrds_oci805", "amazonrds_oci8po", "amazonrds_odbc_oracle", "amazonrds_oracle", "amazonrds_pdo_oracle");
        $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
        $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
        $this->nm_bases_vfp        = array("vfp");
        $this->nm_bases_odbc       = array("odbc");
        $this->nm_bases_progress   = array("progress", "pdo_progress_odbc");
        $this->prep_conect();
        $this->conectDB();
        $orig   = "Scriptcase";
        $evento = "access";
        $texto  = "";
        $delim  = "'";
        $delim1 = "'";
        if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_access))
        {
           $delim  = "#";
           $delim1 = "#";
        }
        if (isset($_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['SC_sep_date']))
        {
            $delim  = $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['SC_sep_date'];
            $delim1 = $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['SC_sep_date1'];
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
           $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, '$usr', 'dashboard_sucursal_odoo', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', '$texto')"; 
       } 
        elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_sqlite))
        {
            $comando = "INSERT INTO sc_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, '$usr', 'dashboard_sucursal_odoo', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento',  '$texto')";
        }
        else
        {
            $comando = "INSERT INTO sc_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, '$usr', 'dashboard_sucursal_odoo', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento',  '$texto')";
        }
        $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
        $rlog = $this->Db->Execute($comando);
        if ($rlog === false)
        {
            $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
            if ($this->NM_ajax_flag)
            {
                dashboard_sucursal_odoo_pack_ajax_response();
                exit;
            }
        }
        $this->Db->Close();
    } // init
   function prep_conect()
   {
      $con_devel             =  (isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao']) && $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_perfil']) && $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'pointofsales', 2, $this->force_db_utf8); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S");
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
// 
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      $this->nm_arr_db_extra_args = array(); 
      if (isset($_SESSION['scriptcase']['glo_use_ssl']))
      {
          $this->nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
      }
      if (isset($_SESSION['scriptcase']['oracle_type']))
      {
          $this->nm_arr_db_extra_args['oracle_type'] = $_SESSION['scriptcase']['oracle_type']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['sc_outra_jan'] != 'dashboard_sucursal_odoo')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <a id="sai" href="javascript: window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''"></a>

<?php
              } 
              else 
              { 
?>
                  <a id="sai" href="javascript: window.location='<?php echo $nm_url_saida ?>'" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''"></a>

<?php
              } 
          } 
          exit ;
      }

      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) && $this->force_db_utf8) {
          putenv('DB2CODEPAGE=1208');
      }

      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
  } 
// 
  function conectDB()
  {
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao'], $this->root . $this->path_prod, 'pointofsales', 1, $this->force_db_utf8); 
      } 
      else 
      { 
         if (!isset($this->nm_con_persistente))
         {
            $this->nm_con_persistente = 'N';
         }
         if (!isset($this->nm_con_db2))
         {
            $this->nm_con_db2 = '';
         }
         if (!isset($this->nm_database_encoding))
         {
            $this->nm_database_encoding = '';
         }
         if ($this->force_db_utf8)
         {
            $this->nm_database_encoding = 'utf8';
         }
         if (!isset($this->nm_arr_db_extra_args))
         {
            $this->nm_arr_db_extra_args = array();
         }
         $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding, $this->nm_arr_db_extra_args); 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
          $this->Db->Execute("set dateformat ymd");
          $this->Db->Execute("set quoted_identifier ON");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2))
      {
          $this->Db->fetchMode = ADODB_FETCH_NUM;
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['dashboard_sucursal_odoo']['decimal_db'] = "."; 
      } 
  }

  function setConnectionHash() {
    if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao'])) {
      list($connectionDbms, $connectionHost, $connectionUser, $connectionPassword, $connectionDatabase) = db_conect_devel($_SESSION['scriptcase']['dashboard_sucursal_odoo']['glo_nm_conexao'], $this->root . $this->path_prod, 'pointofsales', 1, $this->force_db_utf8);
    }
    else {
      $connectionDbms     = $this->nm_tpbanco;
      $connectionHost     = $this->nm_servidor;
      $connectionUser     = $this->nm_usuario;
      $connectionPassword = $this->nm_senha;
      $connectionDatabase = $this->nm_banco;
    }

    $this->connectionHash = "{$connectionDbms}_SC_" . md5("{$connectionHost}_SC_{$connectionUser}_SC_{$connectionPassword}_SC_{$connectionDatabase}");
  } // setConnectionHash

    function sc_Include($path, $tp, $name)
    {
        if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
        {
             include_once($path);
        }
    } // sc_Include
    function isUtf8($sStr)
    {
        $c=0; $b=0;
        $bits=0;
        $len=strlen($sStr);
        for($i=0; $i<$len; $i++){
            $c=ord($sStr[$i]);
            if($c > 128){
                if(($c >= 254)) return false;
                elseif($c >= 252) $bits=6;
                elseif($c >= 248) $bits=5;
                elseif($c >= 240) $bits=4;
                elseif($c >= 224) $bits=3;
                elseif($c >= 192) $bits=2;
                else return false;
                if(($i+$bits) > $len) return false;
                while($bits > 1){
                    $i++;
                    $b=ord($sStr[$i]);
                    if($b < 128 || $b > 191) return false;
                    $bits--;
                }
            }
        }
        return true;
    } // isUtf8
    function regionalDefault($sConfReg = '')
    {
        if ('' == $sConfReg)
        {
            $sConfReg = $this->str_conf_reg;
        }

        $_SESSION['scriptcase']['reg_conf']['date_format']           = (isset($this->Nm_conf_reg[$sConfReg]['data_format']))              ?  $this->Nm_conf_reg[$sConfReg]['data_format']                  : "ddmmyyyy";
        $_SESSION['scriptcase']['reg_conf']['date_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['data_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['data_sep']                     : "/";
        $_SESSION['scriptcase']['reg_conf']['date_week_ini']         = (isset($this->Nm_conf_reg[$sConfReg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$sConfReg]['prim_dia_sema']                : "SU";
        $_SESSION['scriptcase']['reg_conf']['time_format']           = (isset($this->Nm_conf_reg[$sConfReg]['hora_format']))              ?  $this->Nm_conf_reg[$sConfReg]['hora_format']                  : "hhiiss";
        $_SESSION['scriptcase']['reg_conf']['time_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['hora_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['hora_sep']                     : ":";
        $_SESSION['scriptcase']['reg_conf']['time_pos_ampm']         = (isset($this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']                : "right_without_space";
        $_SESSION['scriptcase']['reg_conf']['time_simb_am']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']              : "am";
        $_SESSION['scriptcase']['reg_conf']['time_simb_pm']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']              : "pm";
        $_SESSION['scriptcase']['reg_conf']['simb_neg']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$sConfReg]['num_sinal_neg']                : "-";
        $_SESSION['scriptcase']['reg_conf']['grup_num']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_agr']                  : ".";
        $_SESSION['scriptcase']['reg_conf']['dec_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_dec']                  : ",";
        $_SESSION['scriptcase']['reg_conf']['neg_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$sConfReg]['num_format_num_neg']           : 2;
        $_SESSION['scriptcase']['reg_conf']['monet_simb']            = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']            : "$";
        $_SESSION['scriptcase']['reg_conf']['monet_f_pos']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos']     : 3;
        $_SESSION['scriptcase']['reg_conf']['monet_f_neg']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg']     : 13;
        $_SESSION['scriptcase']['reg_conf']['grup_val']              = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']            : ".";
        $_SESSION['scriptcase']['reg_conf']['dec_val']               = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']            : ",";
        $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$sConfReg]['num_group_digit']))          ?  $this->Nm_conf_reg[$sConfReg]['num_group_digit']              : "1";
        $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']))    ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']        : "1";
        $_SESSION['scriptcase']['reg_conf']['html_dir']              = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] . "'" : "";
        $_SESSION['scriptcase']['reg_conf']['css_dir']               = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] : "LTR";
        if ('' == $_SESSION['scriptcase']['reg_conf']['num_group_digit'])
        {
            $_SESSION['scriptcase']['reg_conf']['num_group_digit'] = '1';
        }
        if ('' == $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'])
        {
            $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = '1';
        }
    } // regionalDefault

    function loadFieldConfig() {
        $this->field_config = array(
            'widget1_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget2_metric' => array(
                'symbol_grp' => '. ',
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => '',
                'symbol_mon' => '',
                'symbol_neg' => '-',
                'format_pos' => '',
                'format_neg' => '2',
                'newfmt_neg' => 'N:2',
            ),
            'widget3_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => '',
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget4_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => '',
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget5_metric' => array(
                'symbol_grp' => '',
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'],
                'symbol_dec' => '.',
                'symbol_mon' => '$',
                'symbol_neg' => '-',
                'format_pos' => '',
                'format_neg' => '',
                'newfmt_neg' => 'V:3:13',
            ),
            'widget6_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => '',
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget7_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_val'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_val'],
                'symbol_mon' => $_SESSION['scriptcase']['reg_conf']['monet_simb'],
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => $_SESSION['scriptcase']['reg_conf']['monet_f_pos'],
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['monet_f_neg'],
                'newfmt_neg' => '',
            ),
            'widget9_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget15_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget16_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget17_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
            'widget18_metric' => array(
                'symbol_grp' => $_SESSION['scriptcase']['reg_conf']['grup_num'],
                'symbol_fmt' => $_SESSION['scriptcase']['reg_conf']['num_group_digit'],
                'symbol_dec' => $_SESSION['scriptcase']['reg_conf']['dec_num'],
                'symbol_mon' => '',
                'symbol_neg' => $_SESSION['scriptcase']['reg_conf']['simb_neg'],
                'format_pos' => '',
                'format_neg' => $_SESSION['scriptcase']['reg_conf']['neg_num'],
                'newfmt_neg' => '',
            ),
        );
    } // loadFieldConfig


} // dashboard_sucursal_odoo_ini

class dashboard_sucursal_odoo_control {

    var $Ini;

    function control()
    {
        $this->init();
        if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "refreshWidget")
        {
            $func = "getIndexContent_" . $_POST['wId'];
            $dat  = $this->$func();
            $Temp = ob_get_clean();
            $this->Arr_result = array();
            $this->Arr_result['setValue'][] = array('field' => 'id-div-iframe-' .  $_POST['seq'], 'value' => $dat);
            $oJson = new Services_JSON();
            echo $oJson->encode($this->Arr_result);
            exit;
        }
        if (isset($_GET['blank']) && 'Y' == $_GET['blank'])
        {
            $this->displayBlankPage();
        }
        else
        {
            $this->displayContainer();
        }
    } // control

    function init()
    {
        if (!class_exists('Services_JSON'))
        {
            include_once(dirname(__FILE__) . '/dashboard_sucursal_odoo_json.php');
        }
        if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "refreshWidget")
        {
            ob_start();
        }
        if (!$this->Ini)
        {
            $this->Ini = new dashboard_sucursal_odoo_ini();
            $this->Ini->init();
        }

        $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_data.class.php", "C", "nm_data");
        $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
        $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_functions.php", "", "");
        $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_api.php", "", "");
        $this->Ini->sc_Include($this->Ini->path_lib_php . "/fix.php", "", "");
        $this->nm_data = new nm_data($this->Ini->str_lang);

        $_SESSION['scriptcase']['sc_aba_iframe']['dashboard_sucursal_odoo'] = array(
        );

        $_SESSION['scriptcase']['dashboard_targets']['dashboard_sucursal_odoo'] = array();


        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo'] = array();

        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget1'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget2'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget3'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget4'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget5'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget6'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget7'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget9'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget15'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget16'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget17'] = rand(2, 10000);
        $_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo']['dbifrm_widget18'] = rand(2, 10000);

        $_SESSION['scriptcase']['dashboard_toolbar']['dashboard_sucursal_odoo'] = array();

        $_SESSION['scriptcase']['dashboard_toolbar']['dashboard_sucursal_odoo']['chart_sales'] = array(
            'form_update'     => true,
            'form_insert'     => true,
            'form_delete'     => true,
            'form_copy'       => true,
            'form_navigate'   => true,
            'form_navpage'    => true,
            'form_goto'       => true,
            'form_lineqty'    => true,
            'form_summary'    => true,
            'form_qsearch'    => true,
            'form_dynsearch'  => true,
            'form_reload'     => true,
            'grid_navigate'   => true,
            'grid_summary'    => true,
            'grid_qsearch'    => true,
            'grid_dynsearch'  => true,
            'grid_filter'     => true,
            'grid_sel_col'    => true,
            'grid_sort_col'   => true,
            'grid_goto'       => true,
            'grid_lineqty'    => true,
            'grid_navpage'    => true,
            'grid_pdf'        => true,
            'grid_xls'        => true,
            'grid_xml'        => true,
            'grid_csv'        => true,
            'grid_rtf'        => true,
            'grid_word'       => true,
            'grid_print'      => true,
            'grid_new'        => true,
            'grid_reload'     => true,
            'chart_sort'      => false,
            'chart_custom'    => false,
            'chart_bar'       => false,
            'chart_line'      => false,
            'chart_area'      => false,
            'chart_pizza'     => false,
            'chart_stack'     => false,
            'chart_combo'     => false,
            'chart_type'      => false,
            'chart_summary'   => false,
            'chart_pdf'       => false,
            'chart_print'     => false,
            'chart_word'      => false,
            'chart_xls'       => false,
            'chart_xml'       => false,
            'chart_csv'       => false,
            'chart_rtf'       => false,
            'chart_reload'    => false,
            'chart_imagem'    => false,
            'chart_dynsearch' => false,
            'chart_filter'    => false,
            'chart_conf'      => true,
            'chart_settings'  => true,
            'sel_groupby'     => true,
            'chart_detail'    => true,
        );
        $_SESSION['scriptcase']['dashboard_toolbar']['dashboard_sucursal_odoo']['chart_tarjetasmovim_odoo'] = array(
            'form_update'     => true,
            'form_insert'     => true,
            'form_delete'     => true,
            'form_copy'       => true,
            'form_navigate'   => true,
            'form_navpage'    => true,
            'form_goto'       => true,
            'form_lineqty'    => true,
            'form_summary'    => true,
            'form_qsearch'    => true,
            'form_dynsearch'  => true,
            'form_reload'     => true,
            'grid_navigate'   => true,
            'grid_summary'    => true,
            'grid_qsearch'    => true,
            'grid_dynsearch'  => true,
            'grid_filter'     => true,
            'grid_sel_col'    => true,
            'grid_sort_col'   => true,
            'grid_goto'       => true,
            'grid_lineqty'    => true,
            'grid_navpage'    => true,
            'grid_pdf'        => true,
            'grid_xls'        => true,
            'grid_xml'        => true,
            'grid_csv'        => true,
            'grid_rtf'        => true,
            'grid_word'       => true,
            'grid_print'      => true,
            'grid_new'        => true,
            'grid_reload'     => true,
            'chart_sort'      => false,
            'chart_custom'    => false,
            'chart_bar'       => false,
            'chart_line'      => false,
            'chart_area'      => false,
            'chart_pizza'     => false,
            'chart_stack'     => false,
            'chart_combo'     => false,
            'chart_type'      => false,
            'chart_summary'   => false,
            'chart_pdf'       => false,
            'chart_print'     => false,
            'chart_word'      => false,
            'chart_xls'       => false,
            'chart_xml'       => false,
            'chart_csv'       => false,
            'chart_rtf'       => false,
            'chart_reload'    => false,
            'chart_imagem'    => false,
            'chart_dynsearch' => false,
            'chart_filter'    => false,
            'chart_conf'      => true,
            'chart_settings'  => true,
            'sel_groupby'     => true,
            'chart_detail'    => true,
        );
    } // init

    function displayBlankPage()
    {
?>
<?php
        header("X-XSS-Protection: 1; mode=block");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
<?php
        if (!function_exists("sc_check_mobile"))
        {
            include_once("../_lib/lib/php/nm_check_mobile.php");
        }
        $this->display_as_mobile = sc_check_mobile();
        if($this->display_as_mobile)
        {
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
        }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>jquery_plugin/inettuts/sc_inettuts.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>bootstrap/css/bootstrap.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>gridstack.js-master/dist/gridstack.min.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="dashboard_sucursal_odoo_container_index.css" />
<?php
        global $str_widget_max, $str_widget_rest, $index_class_pos, $index_class_neg, $index_class_neu;
        include_once "../_lib/css/" . $this->Ini->str_schema_all . "_container.php";
        $this->Widget_max     = $str_widget_max;
        $this->Widget_rest    = $str_widget_rest;
        $this->index_icon_pos = $index_class_pos;
        $this->index_icon_neg = $index_class_neg;
        $this->index_icon_neu = $index_class_neu;
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
var scIframeSCInit = {};
<?php
        foreach ($_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo'] as $sIframe => $iSCInit) {
?>
scIframeSCInit["<?php echo $sIframe; ?>"] = "<?php echo $iSCInit; ?>";
<?php
        }
?>
</script>
</head>
<body class="scContainerPage">



</body>
</html>
<?php
    } // displayBlankPage

    function displayContainer()
    {
?>
<?php
        header("X-XSS-Protection: 1; mode=block");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
<?php
        if (!function_exists("sc_check_mobile"))
        {
            include_once("../_lib/lib/php/nm_check_mobile.php");
        }
        $this->display_as_mobile = sc_check_mobile();
        if($this->display_as_mobile)
        {
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
        }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>jquery_plugin/inettuts/sc_inettuts.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>bootstrap/css/bootstrap.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>gridstack.js-master/dist/gridstack.min.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="dashboard_sucursal_odoo_container_index.css" />
<?php
        global $str_widget_max, $str_widget_rest, $index_class_pos, $index_class_neg, $index_class_neu;
        include_once "../_lib/css/" . $this->Ini->str_schema_all . "_container.php";
        $this->Widget_max     = $str_widget_max;
        $this->Widget_rest    = $str_widget_rest;
        $this->index_icon_pos = $index_class_pos;
        $this->index_icon_neg = $index_class_neg;
        $this->index_icon_neu = $index_class_neu;
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
var scIframeSCInit = {};
<?php
        foreach ($_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo'] as $sIframe => $iSCInit) {
?>
scIframeSCInit["<?php echo $sIframe; ?>"] = "<?php echo $iSCInit; ?>";
<?php
        }
?>
</script>
</head>
<body class="scContainerPage">

        <style>
                .td_corner { width:3px; height:3px; }
        </style>
   <TABLE width="100%" class="scContainerHeader" cellpadding="0" cellspacing="0">
    <TR>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_te.gif" border="0px"   alt="" /></TD>
     <TD width="*" bgcolor="#000000"></TD>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_td.gif" border="0px"   alt="" /></TD>
    </TR>
    <TR>
     <TD  bgcolor="#000000"></TD>
     <TD style="padding: 0px">
      <TABLE style="padding: 2px; border-spacing: 1px; border-width: 0px;" width="100%" class="scContainerHeader">
       <TR align="center" class="scContainerHeaderFont">
        <TD>
         <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
          <TR align="center" valign="middle">
           <TD align="left" rowspan="2">
               
           </TD>
           <TD class="scContainerHeaderFont">
               
           </TD>
          </TR>
          <TR align="right" valign="middle">
           <TD class="scContainerHeaderFont">
               
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
   </TABLE>
<div class='grid-stack'>
                <div  class="grid-stack-item" data-gs-x="0" data-gs-y="12" data-gs-width="11" data-gs-height="7"  data-gs-no-resize="1" data-gs-no-move="0" id="id-father-0">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-0">
                        <div class="widget-head widget-is-moveable" style="display:">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('0');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Grafica Ventas" /></a>
                            <h3 class="scContainerTitle">Grafica Ventas</h3>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-' id="id-div-iframe-0"><iframe id="id-iframe-0" name="dbifrm_widget1" class="sc-iframe-widget" style="height: 100%; width: 100%; border: 0px" src="<?php echo $this->Ini->path_link . SC_dir_app_name('chart_sales'); ?>/?script_case_init=<?php echo $_SESSION["scriptcase"]["dashboard_scinit"]["dashboard_sucursal_odoo"]["dbifrm_widget1"] ?>&under_dashboard=1&dashboard_app=dashboard_sucursal_odoo&own_widget=dbifrm_widget1&compact_mode=0&remove_margin=0&remove_border=0"></iframe></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="0" data-gs-y="0" data-gs-width="3" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-1">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-1">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('1');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Clientes" /></a>
                            <h3 class="scContainerTitle">Clientes</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget2' style="height: 100%" id="id-div-iframe-1"><?php echo $this->getIndexContent_widget2(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="0" data-gs-y="4" data-gs-width="3" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-2">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-2">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('2');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Jugadores" /></a>
                            <h3 class="scContainerTitle">Jugadores</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget3' style="height: 100%" id="id-div-iframe-2"><?php echo $this->getIndexContent_widget3(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="3" data-gs-y="0" data-gs-width="3" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-3">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-3">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('3');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Visitantes" /></a>
                            <h3 class="scContainerTitle">Visitantes</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget4' style="height: 100%" id="id-div-iframe-3"><?php echo $this->getIndexContent_widget4(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="6" data-gs-y="0" data-gs-width="3" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-4">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-4">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('4');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Venta Total" /></a>
                            <h3 class="scContainerTitle">Venta Total</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget5' style="height: 100%" id="id-div-iframe-4"><?php echo $this->getIndexContent_widget5(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="6" data-gs-y="8" data-gs-width="3" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-5">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-5">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('5');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Transacciones" /></a>
                            <h3 class="scContainerTitle">Transacciones</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget6' style="height: 100%" id="id-div-iframe-5"><?php echo $this->getIndexContent_widget6(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="9" data-gs-y="0" data-gs-width="3" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-6">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-6">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('6');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Venta Promedio" /></a>
                            <h3 class="scContainerTitle">Venta Promedio</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget7' style="height: 100%" id="id-div-iframe-6"><?php echo $this->getIndexContent_widget7(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="0" data-gs-y="19" data-gs-width="11" data-gs-height="7"  data-gs-no-resize="1" data-gs-no-move="0" id="id-father-7">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-7">
                        <div class="widget-head widget-is-moveable" style="display:">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('7');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="MAQUINAS ARCADE" /></a>
                            <h3 class="scContainerTitle">MAQUINAS ARCADE</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-' id="id-div-iframe-7"><iframe id="id-iframe-7" name="dbifrm_widget9" class="sc-iframe-widget" style="height: 100%; width: 100%; border: 0px" src="<?php echo $this->Ini->path_link . SC_dir_app_name('chart_tarjetasmovim_odoo'); ?>/?script_case_init=<?php echo $_SESSION["scriptcase"]["dashboard_scinit"]["dashboard_sucursal_odoo"]["dbifrm_widget9"] ?>&under_dashboard=1&dashboard_app=dashboard_sucursal_odoo&own_widget=dbifrm_widget9&compact_mode=1&remove_margin=1&remove_border=1"></iframe></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="3" data-gs-y="8" data-gs-width="3" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-8">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-8">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('8');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Venta Mes" /></a>
                            <h3 class="scContainerTitle">Venta Mes</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget15' style="height: 100%" id="id-div-iframe-8"><?php echo $this->getIndexContent_widget15(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="3" data-gs-y="4" data-gs-width="3" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-9">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-9">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('9');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Clientes Mes" /></a>
                            <h3 class="scContainerTitle">Clientes Mes</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget16' style="height: 100%" id="id-div-iframe-9"><?php echo $this->getIndexContent_widget16(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="9" data-gs-y="4" data-gs-width="3" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-10">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-10">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('10');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Satisfecho" /></a>
                            <h3 class="scContainerTitle">Satisfecho</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget17' style="height: 100%" id="id-div-iframe-10"><?php echo $this->getIndexContent_widget17(); ?></div>
                    </div>
                </div>
                <div  class="grid-stack-item" data-gs-x="6" data-gs-y="4" data-gs-width="3" data-gs-height="4"  data-gs-no-resize="1" data-gs-no-move="1" id="id-father-11">
                    <div  class="grid-stack-item-content scContainerWidget" id="id-div-11">
                        <div class="widget-head" style="display:none">
                            <a href="#" class="collapse">COLLAPSE</a>
                            <a href="#" class="maximize" onclick="maximizeWidget('11');"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Widget_max; ?>" style="border: 0; float: left; margin-top: 3px" class="sc-widget-maximize" alt="Satisfecho Mes" /></a>
                            <h3 class="scContainerTitle">Satisfecho Mes</h3>
                            <a href="#" class="remove">CLOSE</a>
                            <a href="#" class="remove removeModal" style="display:none">CLOSE</a>
                        </div>
                        <div class='widget-content widget-content-title-none scContainerIndexMoldura scContainerIndexMoldura_widget18' style="height: 100%" id="id-div-iframe-11"><?php echo $this->getIndexContent_widget18(); ?></div>
                    </div>
                </div></div>
<div id="myModal" class="modal fade" role="dialog" style="margin:0px !important; padding:5px !important;">
  <div class="modal-dialog" style="width: 100%; height: 100%; margin:0px !important; padding:10px !important;">

        <div class="modal-content" style="width: 100%; padding:2px; height: 100%;">

        </div>

  </div>
</div>


<script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>jquery/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>lodash/lodash.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_third; ?>gridstack.js-master/dist/gridstack.all.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {

        var options = {
            float: false,
        };
        $('.grid-stack').gridstack(options);
    });

    var_widget_maximized = "";
    var_widget_old_height = "";
    function maximizeWidget(str_widget_id)
    {
        var_widget_maximized = str_widget_id;

        var widgetIframe = $("#id-div-" + var_widget_maximized).find("iframe"), srcTag = widgetIframe[0].contentWindow.location.href;

        $("#id-div-" + var_widget_maximized).detach().appendTo('.modal-content');

        var_widget_old_height = $("#id-div-" + var_widget_maximized).css('height');
        $("#id-div-" + var_widget_maximized).css('height', 'calc(100% - 15px)');

        $("#id-div-" + var_widget_maximized + " .collapse").toggle();
        $("#id-div-" + var_widget_maximized + " .maximize").toggle();
        $("#id-div-" + var_widget_maximized + " .remove").toggle();
        $("#id-div-" + var_widget_maximized + " .removeModal").show();

        widgetIframe = $("#id-div-" + var_widget_maximized).find("iframe");
        if (widgetIframe.length) {
            srcTag = addUrlParam(srcTag, "maximized", "1", $(widgetIframe[0]).attr("name"));
            $(widgetIframe[0]).attr("src", srcTag);
        }

        $('.modal').modal('show');
    }
    function minimizeWidget()
    {
        var widgetIframe = $("#id-div-" + var_widget_maximized).find("iframe"), srcTag = widgetIframe[0].contentWindow.location.href;

        $("#id-div-" + var_widget_maximized).detach().appendTo("#id-father-" + var_widget_maximized);

        $("#id-div-" + var_widget_maximized).css('height', '100%');

        $("#id-div-" + var_widget_maximized + " .collapse").toggle();
        $("#id-div-" + var_widget_maximized + " .maximize").toggle();
        $("#id-div-" + var_widget_maximized + " .remove").toggle();
        $("#id-div-" + var_widget_maximized + " .removeModal").hide();

        widgetIframe = $("#id-div-" + var_widget_maximized).find("iframe");
        if (widgetIframe.length) {
            srcTag = addUrlParam(srcTag, "maximized", "0", $(widgetIframe[0]).attr("name"));
            $(widgetIframe[0]).attr("src", srcTag);
        }

        $('.modal').modal('hide');
    }
    function addUrlParam(sUrl, sParam, sValue, sName) {
        var baseUrl, urlParams = [], objParams = {}, tmp, i;
        tmp = sUrl.split("?");
        baseUrl = tmp[0];
        if (tmp[1]) {
            urlParams = tmp[1].split("&");
        }
        for (i = 0; i < urlParams.length; i++) {
            tmp = urlParams[i].split("=");
            objParams[ tmp[0] ] = tmp[1] ? tmp[1] : "";
        }
        objParams["script_case_init"] = scIframeSCInit[sName];
        objParams[sParam] = sValue;
        urlParams = [];
        for (tmp in objParams) {
            urlParams.push(tmp + "=" + objParams[tmp]);
        }
        return baseUrl + "?" + urlParams.join("&");
    }

    $( ".collapse" ).click(function() {
        $(this).parent().parent().toggleClass( "collapsed" );
        if ($(this).parent().parent().hasClass("collapsed")) {
            var barHeight = $(this).parent().parent().parent().find(".widget-head").height();
            if (barHeight) {
                $(this).parent().parent().parent().css({
                    height: 0,
                    minHeight: (barHeight + 2) + "px"
                });
            }
        }
        else {
            $(this).parent().parent().parent().css({
                height: "",
                minHeight: ""
            });
        }
    });

    $( ".remove" ).not(".removeModal").click(function() {
        if (confirm("<?php echo $this->Ini->Nm_lang['lang_remove_container'] ?>")) {
            $('.grid-stack').data('gridstack').removeWidget($(this).parent().parent().parent());
        }
    });

    $( ".removeModal" ).click(function() {
        minimizeWidget();
    });

</script>
<script type="text/javascript">
$( document ).ready(function() {
    $('.sc-iframe-widget').each(function() {
        if ($(this).attr('alt')) {
            var wId  = $(this).attr('id'),
            wSrc = $(this).attr('src'),
            wRef = parseInt($(this).attr('alt')) * 1000;
            setTimeout(function() { refreshWidget(wId, wSrc, wRef); }, wRef);
        }
    });
});
function refreshWidget(wId, wSrc, wRef)
{
     document.getElementById(wId).contentWindow.location = wSrc;
     setTimeout(function() { refreshWidget(wId, wSrc, wRef); }, wRef);
}
</script>
<script type="text/javascript">
 $( document ).ready(function() {
    setTimeout(function() { refreshWidgetIndex('widget2', '1', 10000); }, 10000);
    setTimeout(function() { refreshWidgetIndex('widget3', '2', 10000); }, 10000);
    setTimeout(function() { refreshWidgetIndex('widget4', '3', 10000); }, 10000);
    setTimeout(function() { refreshWidgetIndex('widget5', '4', 10000); }, 10000);
    setTimeout(function() { refreshWidgetIndex('widget6', '5', 10000); }, 10000);
    setTimeout(function() { refreshWidgetIndex('widget7', '6', 10000); }, 10000);
 });
 function refreshWidgetIndex(wId, seq, wRef)
 {    $.ajax({
      type: "POST",
      url: 'dashboard_sucursal_odoo.php',
      data: "nmgp_opcao=refreshWidget&script_case_init=<?php echo $this->Ini->sc_page ?>&wId=" + wId + "&seq=" + seq
     })
     .done(function(jsonNavigate) {
        var i, oResp;
        json_err_crtl = 1;
        Tst_integrid = jsonNavigate.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            alert (jsonNavigate);
            return;
        }
        eval("oResp = " + jsonNavigate);
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
            $("#" + oResp["setValue"][i]["field"]).html(oResp["setValue"][i]["value"]);
          }
        }
        setTimeout(function() { refreshWidgetIndex(wId, seq, wRef); }, wRef);    });
 }
</script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>

</body>
</html>
<?php
    } // displayContainer

    function NM_encode_input($str)
    {
        $aRep = array(
                      '&#059;' => ';',
                      '&lt;' => '<',
                      '&gt;' => '>',
                      '&quot;' => '"',
                      '&#039;' => "'",
                      '&#040;' => '(',
                      '&#041;' => ')',
                     );
        $str = str_replace('<br>', '__SC_BREAK_LINE__', $str);
        $str = str_replace('<br />', '__SC_BREAK_LINE__', $str);
        $str = str_replace('&nbsp;', '__SC_SPACE_CHAR__', $str);
        $str = str_replace('&', '__SC_AMP_CHAR__', $str);
        $str = str_replace(array_values($aRep), array_keys($aRep), $str);
        $str = str_replace('__SC_AMP_CHAR__', '&amp;', $str);
        $str = str_replace('__SC_BREAK_LINE__', '<br />', $str);
        $str = str_replace('__SC_SPACE_CHAR__', '&nbsp;', $str);
        return $str;
    }
    function displayPassword()
    {
        global $nm_parms_senha, $script_case_init;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">


<HTML>
    <HEAD>
        <TITLE></TITLE>
        <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />

        <?php
        if (isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
        {
        ?>
           <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <?php
        }
        ?>
        <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
        <META http-equiv="Pragma" content="no-cache" />
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
        <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form; ?>/<?php echo $this->Ini->Str_btn_form; ?>.css" />
        <?php
        if(isset($_SESSION['scriptcase']['str_google_fonts']) && !empty($_SESSION['scriptcase']['str_google_fonts']))
        {
        ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['str_google_fonts']; ?>" />
        <?php
        }
        ?>
    </HEAD>
    <body class="scGridPage">
        <form name="Fsenha" method="post" action="./">
            <div style="text-align:center;">
                <div class="scFormBorder" style="display:inline-block; padding:1px;">
                    <div  class='scFormTable' style='display: flex'>
                        <div class='scFormLabelOdd'  style='display: inline-block'>
                            <?php echo $this->Ini->Nm_lang['lang_errm_type_pswd']; ?>
                        </div>
                        <div class='scFormDataOdd'  style='display: inline-block'>
                            <?php
                            foreach ($nm_parms_senha as $nm_nome_parm => $nm_val_parm)
                            {
                            ?>
                               <input type="hidden"   name="<?php echo $nm_nome_parm ?>" value="<?php echo NM_encode_input($nm_val_parm) ?>"/>
                            <?php
                            }
                            ?>
                           <input type="hidden"   name="script_case_init" value="<?php echo NM_encode_input($script_case_init) ?>"/>
                           <input type="hidden"   name="script_case_ref" value="<?php echo isset($_SERVER['HTTP_REFERER']) ? NM_encode_input($_SERVER['HTTP_REFERER']) : ""; ?>"/>
                           <input type="password" name="script_case_senha" value="" class="scFormObjectOdd" size=32 required />
                        </div>
                    </div>
                    <div class='scFormToolbar'>
                        <input type="submit" class="scButton_default" name="sc_sai_senha" value="OK">
                    </div>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            document.Fsenha.script_case_senha.focus();
        </script>
    </body>
</html><?php
        exit;
    } // displayPassword

    function displayAccessError()
    {
?>
<?php
        header("X-XSS-Protection: 1; mode=block");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
<?php
        if (!function_exists("sc_check_mobile"))
        {
            include_once("../_lib/lib/php/nm_check_mobile.php");
        }
        $this->display_as_mobile = sc_check_mobile();
        if($this->display_as_mobile)
        {
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
        }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>jquery_plugin/inettuts/sc_inettuts.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>bootstrap/css/bootstrap.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->url_third; ?>gridstack.js-master/dist/gridstack.min.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_container<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="dashboard_sucursal_odoo_container_index.css" />
<?php
        global $str_widget_max, $str_widget_rest, $index_class_pos, $index_class_neg, $index_class_neu;
        include_once "../_lib/css/" . $this->Ini->str_schema_all . "_container.php";
        $this->Widget_max     = $str_widget_max;
        $this->Widget_rest    = $str_widget_rest;
        $this->index_icon_pos = $index_class_pos;
        $this->index_icon_neg = $index_class_neg;
        $this->index_icon_neu = $index_class_neu;
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
var scIframeSCInit = {};
<?php
        foreach ($_SESSION['scriptcase']['dashboard_scinit']['dashboard_sucursal_odoo'] as $sIframe => $iSCInit) {
?>
scIframeSCInit["<?php echo $sIframe; ?>"] = "<?php echo $iSCInit; ?>";
<?php
        }
?>
</script>
</head>
<body class="scContainerPage">

<br />
<table align="center" class="scGridBorder"><tr><td style="padding: 0">
 <table style="width: 100%" class="scGridTabela">
  <tr class="scGridFieldOdd">
   <td class="scGridFieldOddFont" style="padding: 15px 30px">
    <?php echo $this->Ini->Nm_lang['lang_errm_unth_user']; ?>
   </td>
  </tr>
 </table>
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
    <?php echo $this->Ini->Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
        }
?>

</body>
</html>
<?php
        exit;
    } // displayAccessError

    function dateDefaultFormat()
    {
        if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
        {
            $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
            $sDate = str_replace('mm',   'm', $sDate);
            $sDate = str_replace('dd',   'd', $sDate);
            return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
        }
        elseif ('en_us' == $this->Ini->str_lang)
        {
            return 'm/d/Y';
        }
        else
        {
            return 'd/m/Y';
        }
    } // dateDefaultFormat

    function getIndexContent_widget2() {
        $bResult = $this->getIndexContentData_widget2();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget2();
        }
    } // getIndexContent_widget2

    function getIndexContentData_widget2() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT SUM(clientes), YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') FROM view_boletos_total GROUP BY YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') ORDER BY YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT SUM(\"clientes\"), CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) FROM view_boletos_total GROUP BY CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT SUM(\"clientes\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) FROM view_boletos_total GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT SUM(\"clientes\"), CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"fecha\"), 'FM00')) FROM view_boletos_total GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"fecha\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT SUM(`clientes`), CONCAT(YEAR(`fecha`), '-', LPAD(MONTH(`fecha`), 2, '0')) FROM view_boletos_total GROUP BY 2 ORDER BY CONCAT(YEAR(`fecha`), '-', LPAD(MONTH(`fecha`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT SUM(`clientes`), strftime('%Y', `fecha`) || '-' || strftime('%m', `fecha`) FROM view_boletos_total GROUP BY 2 ORDER BY strftime('%Y', `fecha`) || '-' || strftime('%m', `fecha`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT SUM(\"clientes\"), EXTRACT(YEAR FROM \"fecha\") || '-' || LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0') FROM view_boletos_total GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"fecha\") || '-' || LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT SUM(clientes), CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) FROM view_boletos_total GROUP BY CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT SUM(clientes), CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) FROM view_boletos_total GROUP BY CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT SUM(clientes), YEAR(fecha) || '-' || LPAD(MONTH(fecha), 2, '0') FROM view_boletos_total GROUP BY 2 ORDER BY YEAR(fecha) || '-' || LPAD(MONTH(fecha), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT SUM(clientes), YYYYMM(fecha) FROM view_boletos_total GROUP BY 2 ORDER BY YYYYMM(fecha) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget2($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget2($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget2($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget2($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget2($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget2($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget2

    function getIndexContentHtml_widget2() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = ': ';
        $this->indexData['new_metric_value'] = '<span class="' . $this->indexData['new_metric_class'] . ' ' . $this->indexData['new_metric_class'] . '_widget2">' . $this->indexData['new_metric_formatted'] . '</span>';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget2"><img src="{$this->Ini->path_imag_cab}/sys__NM__btn__NM__icono_persona.png" /><br />Clientes Total</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget2">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget2"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget2">{$this->indexData['percentage_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget2">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget2">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget2

    function formatIndexDimension_widget2($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget2

    function formatIndexMetric_widget2($value) {
        $suffix = '';

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget2_metric']['symbol_grp'], $this->Ini->field_config['widget2_metric']['symbol_dec'], '0', 'N', $this->Ini->field_config['widget2_metric']['format_neg'], $this->Ini->field_config['widget2_metric']['symbol_mon'], $this->Ini->field_config['widget2_metric']['newfmt_neg'], $this->Ini->field_config['widget2_metric']['symbol_neg'], $this->Ini->field_config['widget2_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget2

    function getIndexContent_widget3() {
        $bResult = $this->getIndexContentData_widget3();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget3();
        }
    } // getIndexContent_widget3

    function getIndexContentData_widget3() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT SUM(jugadores), YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') FROM view_boletos_total GROUP BY YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') ORDER BY YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT SUM(\"jugadores\"), CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) FROM view_boletos_total GROUP BY CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT SUM(\"jugadores\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) FROM view_boletos_total GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT SUM(\"jugadores\"), CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"fecha\"), 'FM00')) FROM view_boletos_total GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"fecha\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT SUM(`jugadores`), CONCAT(YEAR(`fecha`), '-', LPAD(MONTH(`fecha`), 2, '0')) FROM view_boletos_total GROUP BY 2 ORDER BY CONCAT(YEAR(`fecha`), '-', LPAD(MONTH(`fecha`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT SUM(`jugadores`), strftime('%Y', `fecha`) || '-' || strftime('%m', `fecha`) FROM view_boletos_total GROUP BY 2 ORDER BY strftime('%Y', `fecha`) || '-' || strftime('%m', `fecha`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT SUM(\"jugadores\"), EXTRACT(YEAR FROM \"fecha\") || '-' || LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0') FROM view_boletos_total GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"fecha\") || '-' || LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT SUM(jugadores), CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) FROM view_boletos_total GROUP BY CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT SUM(jugadores), CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) FROM view_boletos_total GROUP BY CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT SUM(jugadores), YEAR(fecha) || '-' || LPAD(MONTH(fecha), 2, '0') FROM view_boletos_total GROUP BY 2 ORDER BY YEAR(fecha) || '-' || LPAD(MONTH(fecha), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT SUM(jugadores), YYYYMM(fecha) FROM view_boletos_total GROUP BY 2 ORDER BY YYYYMM(fecha) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget3($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget3($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget3($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget3($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget3($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget3($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget3

    function getIndexContentHtml_widget3() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = ': ';
        $this->indexData['new_metric_value'] = '<span class="' . $this->indexData['new_metric_class'] . ' ' . $this->indexData['new_metric_class'] . '_widget3">' . $this->indexData['new_metric_formatted'] . '</span>';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget3"><img src="{$this->Ini->path_imag_cab}/sys__NM__btn__NM__icono_persona.png" /><br />Jugadores</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget3">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget3"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget3">{$this->indexData['percentage_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget3">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget3">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget3

    function formatIndexDimension_widget3($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget3

    function formatIndexMetric_widget3($value) {
        $suffix = '';

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget3_metric']['symbol_grp'], $this->Ini->field_config['widget3_metric']['symbol_dec'], '0', 'N', $this->Ini->field_config['widget3_metric']['format_neg'], $this->Ini->field_config['widget3_metric']['symbol_mon'], $this->Ini->field_config['widget3_metric']['newfmt_neg'], $this->Ini->field_config['widget3_metric']['symbol_neg'], $this->Ini->field_config['widget3_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget3

    function getIndexContent_widget4() {
        $bResult = $this->getIndexContentData_widget4();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget4();
        }
    } // getIndexContent_widget4

    function getIndexContentData_widget4() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT SUM(visitantes), YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') FROM view_boletos_total GROUP BY YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') ORDER BY YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT SUM(\"visitantes\"), CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) FROM view_boletos_total GROUP BY CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT SUM(\"visitantes\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) FROM view_boletos_total GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT SUM(\"visitantes\"), CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"fecha\"), 'FM00')) FROM view_boletos_total GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"fecha\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT SUM(`visitantes`), CONCAT(YEAR(`fecha`), '-', LPAD(MONTH(`fecha`), 2, '0')) FROM view_boletos_total GROUP BY 2 ORDER BY CONCAT(YEAR(`fecha`), '-', LPAD(MONTH(`fecha`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT SUM(`visitantes`), strftime('%Y', `fecha`) || '-' || strftime('%m', `fecha`) FROM view_boletos_total GROUP BY 2 ORDER BY strftime('%Y', `fecha`) || '-' || strftime('%m', `fecha`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT SUM(\"visitantes\"), EXTRACT(YEAR FROM \"fecha\") || '-' || LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0') FROM view_boletos_total GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"fecha\") || '-' || LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT SUM(visitantes), CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) FROM view_boletos_total GROUP BY CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT SUM(visitantes), CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) FROM view_boletos_total GROUP BY CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT SUM(visitantes), YEAR(fecha) || '-' || LPAD(MONTH(fecha), 2, '0') FROM view_boletos_total GROUP BY 2 ORDER BY YEAR(fecha) || '-' || LPAD(MONTH(fecha), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT SUM(visitantes), YYYYMM(fecha) FROM view_boletos_total GROUP BY 2 ORDER BY YYYYMM(fecha) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget4($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget4($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget4($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget4($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget4($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget4($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget4

    function getIndexContentHtml_widget4() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = ': ';
        $this->indexData['new_metric_value'] = '<span class="' . $this->indexData['new_metric_class'] . ' ' . $this->indexData['new_metric_class'] . '_widget4">' . $this->indexData['new_metric_formatted'] . '</span>';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget4"><img src="{$this->Ini->path_imag_cab}/sys__NM__btn__NM__icono_persona.png" /><br />Visitantes</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget4">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget4"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget4">{$this->indexData['percentage_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget4">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget4">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget4

    function formatIndexDimension_widget4($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget4

    function formatIndexMetric_widget4($value) {
        $suffix = '';

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget4_metric']['symbol_grp'], $this->Ini->field_config['widget4_metric']['symbol_dec'], '0', 'N', $this->Ini->field_config['widget4_metric']['format_neg'], $this->Ini->field_config['widget4_metric']['symbol_mon'], $this->Ini->field_config['widget4_metric']['newfmt_neg'], $this->Ini->field_config['widget4_metric']['symbol_neg'], $this->Ini->field_config['widget4_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget4

    function getIndexContent_widget5() {
        $bResult = $this->getIndexContentData_widget5();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget5();
        }
    } // getIndexContent_widget5

    function getIndexContentData_widget5() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT SUM(totalSinImpuestos), YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') FROM sales GROUP BY YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') ORDER BY YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT SUM(\"totalSinImpuestos\"), CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) FROM sales GROUP BY CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT SUM(\"totalSinImpuestos\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) FROM sales GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT SUM(\"totalSinImpuestos\"), CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"datesales\"), 'FM00')) FROM sales GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"datesales\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT SUM(`totalSinImpuestos`), CONCAT(YEAR(`datesales`), '-', LPAD(MONTH(`datesales`), 2, '0')) FROM sales GROUP BY 2 ORDER BY CONCAT(YEAR(`datesales`), '-', LPAD(MONTH(`datesales`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT SUM(`totalSinImpuestos`), strftime('%Y', `datesales`) || '-' || strftime('%m', `datesales`) FROM sales GROUP BY 2 ORDER BY strftime('%Y', `datesales`) || '-' || strftime('%m', `datesales`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT SUM(\"totalSinImpuestos\"), EXTRACT(YEAR FROM \"datesales\") || '-' || LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0') FROM sales GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"datesales\") || '-' || LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT SUM(totalSinImpuestos), CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) FROM sales GROUP BY CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT SUM(totalSinImpuestos), CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) FROM sales GROUP BY CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT SUM(totalSinImpuestos), YEAR(datesales) || '-' || LPAD(MONTH(datesales), 2, '0') FROM sales GROUP BY 2 ORDER BY YEAR(datesales) || '-' || LPAD(MONTH(datesales), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT SUM(totalSinImpuestos), YYYYMM(datesales) FROM sales GROUP BY 2 ORDER BY YYYYMM(datesales) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget5($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget5($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget5($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget5($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget5($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget5($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget5

    function getIndexContentHtml_widget5() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = ': ';
        $this->indexData['new_metric_value'] = '<span class="' . $this->indexData['new_metric_class'] . ' ' . $this->indexData['new_metric_class'] . '_widget5">' . $this->indexData['new_metric_formatted'] . '</span>';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget5"><img src="{$this->Ini->path_imag_cab}/grp__NM__ico__NM__money.png" /><br />Venta Total</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget5">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget5"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget5">{$this->indexData['percentage_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget5">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget5">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget5

    function formatIndexDimension_widget5($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget5

    function formatIndexMetric_widget5($value) {
        $suffix = '';

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget5_metric']['symbol_grp'], $this->Ini->field_config['widget5_metric']['symbol_dec'], '2', 'S', $this->Ini->field_config['widget5_metric']['format_neg'], $this->Ini->field_config['widget5_metric']['symbol_mon'], $this->Ini->field_config['widget5_metric']['newfmt_neg'], $this->Ini->field_config['widget5_metric']['symbol_neg'], $this->Ini->field_config['widget5_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget5

    function getIndexContent_widget6() {
        $bResult = $this->getIndexContentData_widget6();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget6();
        }
    } // getIndexContent_widget6

    function getIndexContentData_widget6() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT COUNT(id_sales), YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') FROM sales GROUP BY YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') ORDER BY YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT COUNT(\"id_sales\"), CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) FROM sales GROUP BY CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT COUNT(\"id_sales\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) FROM sales GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT COUNT(\"id_sales\"), CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"datesales\"), 'FM00')) FROM sales GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"datesales\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT COUNT(`id_sales`), CONCAT(YEAR(`datesales`), '-', LPAD(MONTH(`datesales`), 2, '0')) FROM sales GROUP BY 2 ORDER BY CONCAT(YEAR(`datesales`), '-', LPAD(MONTH(`datesales`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT COUNT(`id_sales`), strftime('%Y', `datesales`) || '-' || strftime('%m', `datesales`) FROM sales GROUP BY 2 ORDER BY strftime('%Y', `datesales`) || '-' || strftime('%m', `datesales`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT COUNT(\"id_sales\"), EXTRACT(YEAR FROM \"datesales\") || '-' || LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0') FROM sales GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"datesales\") || '-' || LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT COUNT(id_sales), CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) FROM sales GROUP BY CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT COUNT(id_sales), CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) FROM sales GROUP BY CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT COUNT(id_sales), YEAR(datesales) || '-' || LPAD(MONTH(datesales), 2, '0') FROM sales GROUP BY 2 ORDER BY YEAR(datesales) || '-' || LPAD(MONTH(datesales), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT COUNT(id_sales), YYYYMM(datesales) FROM sales GROUP BY 2 ORDER BY YYYYMM(datesales) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget6($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget6($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget6($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget6($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget6($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget6($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget6

    function getIndexContentHtml_widget6() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = ': ';
        $this->indexData['new_metric_value'] = '<span class="' . $this->indexData['new_metric_class'] . ' ' . $this->indexData['new_metric_class'] . '_widget6">' . $this->indexData['new_metric_formatted'] . '</span>';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget6"><img src="{$this->Ini->path_imag_cab}/grp__NM__ico__NM__money.png" /><br />Número Transacciones</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget6">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget6"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget6">{$this->indexData['percentage_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget6">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget6">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget6

    function formatIndexDimension_widget6($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget6

    function formatIndexMetric_widget6($value) {
        $suffix = '';

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget6_metric']['symbol_grp'], $this->Ini->field_config['widget6_metric']['symbol_dec'], '0', 'S', $this->Ini->field_config['widget6_metric']['format_neg'], $this->Ini->field_config['widget6_metric']['symbol_mon'], $this->Ini->field_config['widget6_metric']['newfmt_neg'], $this->Ini->field_config['widget6_metric']['symbol_neg'], $this->Ini->field_config['widget6_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget6

    function getIndexContent_widget7() {
        $bResult = $this->getIndexContentData_widget7();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget7();
        }
    } // getIndexContent_widget7

    function getIndexContentData_widget7() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT AVG(totalSinImpuestos), YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') FROM sales GROUP BY YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') ORDER BY YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT AVG(\"totalSinImpuestos\"), CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) FROM sales GROUP BY CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT AVG(\"totalSinImpuestos\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) FROM sales GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT AVG(\"totalSinImpuestos\"), CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"datesales\"), 'FM00')) FROM sales GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"datesales\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT AVG(`totalSinImpuestos`), CONCAT(YEAR(`datesales`), '-', LPAD(MONTH(`datesales`), 2, '0')) FROM sales GROUP BY 2 ORDER BY CONCAT(YEAR(`datesales`), '-', LPAD(MONTH(`datesales`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT AVG(`totalSinImpuestos`), strftime('%Y', `datesales`) || '-' || strftime('%m', `datesales`) FROM sales GROUP BY 2 ORDER BY strftime('%Y', `datesales`) || '-' || strftime('%m', `datesales`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT AVG(\"totalSinImpuestos\"), EXTRACT(YEAR FROM \"datesales\") || '-' || LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0') FROM sales GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"datesales\") || '-' || LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT AVG(totalSinImpuestos), CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) FROM sales GROUP BY CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT AVG(totalSinImpuestos), CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) FROM sales GROUP BY CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT AVG(totalSinImpuestos), YEAR(datesales) || '-' || LPAD(MONTH(datesales), 2, '0') FROM sales GROUP BY 2 ORDER BY YEAR(datesales) || '-' || LPAD(MONTH(datesales), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT AVG(totalSinImpuestos), YYYYMM(datesales) FROM sales GROUP BY 2 ORDER BY YYYYMM(datesales) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget7($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget7($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget7($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget7($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget7($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget7($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget7

    function getIndexContentHtml_widget7() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = ': ';
        $this->indexData['new_metric_value'] = '<span class="' . $this->indexData['new_metric_class'] . ' ' . $this->indexData['new_metric_class'] . '_widget7">' . $this->indexData['new_metric_formatted'] . '</span>';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget7"><img src="{$this->Ini->path_imag_cab}/grp__NM__ico__NM__money.png" /><br />Prom./.Trans</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget7">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget7"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget7">{$this->indexData['percentage_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget7">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget7">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget7

    function formatIndexDimension_widget7($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget7

    function formatIndexMetric_widget7($value) {
        $suffix = '';

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget7_metric']['symbol_grp'], $this->Ini->field_config['widget7_metric']['symbol_dec'], '2', 'S', $this->Ini->field_config['widget7_metric']['format_neg'], $this->Ini->field_config['widget7_metric']['symbol_mon'], $this->Ini->field_config['widget7_metric']['newfmt_neg'], $this->Ini->field_config['widget7_metric']['symbol_neg'], $this->Ini->field_config['widget7_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget7

    function getIndexContent_widget15() {
        $bResult = $this->getIndexContentData_widget15();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget15();
        }
    } // getIndexContent_widget15

    function getIndexContentData_widget15() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT SUM(total), YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') FROM sales GROUP BY YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') ORDER BY YEAR(datesales) & '-' & FORMAT(MONTH(datesales), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT SUM(\"total\"), CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) FROM sales GROUP BY CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"datesales\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"datesales\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT SUM(\"total\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) FROM sales GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-'), LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT SUM(\"total\"), CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"datesales\"), 'FM00')) FROM sales GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"datesales\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"datesales\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT SUM(`total`), CONCAT(YEAR(`datesales`), '-', LPAD(MONTH(`datesales`), 2, '0')) FROM sales GROUP BY 2 ORDER BY CONCAT(YEAR(`datesales`), '-', LPAD(MONTH(`datesales`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT SUM(`total`), strftime('%Y', `datesales`) || '-' || strftime('%m', `datesales`) FROM sales GROUP BY 2 ORDER BY strftime('%Y', `datesales`) || '-' || strftime('%m', `datesales`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT SUM(\"total\"), EXTRACT(YEAR FROM \"datesales\") || '-' || LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0') FROM sales GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"datesales\") || '-' || LPAD(EXTRACT(MONTH FROM \"datesales\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT SUM(total), CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) FROM sales GROUP BY CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(datesales), '-'), LPAD(MONTH(datesales), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT SUM(total), CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) FROM sales GROUP BY CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(datesales) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(datesales) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT SUM(total), YEAR(datesales) || '-' || LPAD(MONTH(datesales), 2, '0') FROM sales GROUP BY 2 ORDER BY YEAR(datesales) || '-' || LPAD(MONTH(datesales), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT SUM(total), YYYYMM(datesales) FROM sales GROUP BY 2 ORDER BY YYYYMM(datesales) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget15($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget15($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget15($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget15($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget15($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget15($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget15

    function getIndexContentHtml_widget15() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = ': ';
        $this->indexData['new_metric_value'] = '<span class="' . $this->indexData['new_metric_class'] . ' ' . $this->indexData['new_metric_class'] . '_widget15">' . $this->indexData['new_metric_formatted'] . '</span>';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget15">Venta Mes</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget15">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget15"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget15">{$this->indexData['percentage_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget15">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget15">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget15

    function formatIndexDimension_widget15($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget15

    function formatIndexMetric_widget15($value) {
        $suffix = '';
		$isNegative = false;

		if ('-' == substr($value, 0, 1)) {
			$value      = substr($value, 1);
			$isNegative = true;
		}

        $this->scaleValue($value, $suffix);

		if ($isNegative) {
			$value = '-' . $value;
		}

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget15_metric']['symbol_grp'], $this->Ini->field_config['widget15_metric']['symbol_dec'], '2', 'S', $this->Ini->field_config['widget15_metric']['format_neg'], $this->Ini->field_config['widget15_metric']['symbol_mon'], $this->Ini->field_config['widget15_metric']['newfmt_neg'], $this->Ini->field_config['widget15_metric']['symbol_neg'], $this->Ini->field_config['widget15_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget15

    function getIndexContent_widget16() {
        $bResult = $this->getIndexContentData_widget16();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget16();
        }
    } // getIndexContent_widget16

    function getIndexContentData_widget16() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT SUM(clientes), YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') FROM view_boletos_total GROUP BY YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') ORDER BY YEAR(fecha) & '-' & FORMAT(MONTH(fecha), '00') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT SUM(\"clientes\"), CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) FROM view_boletos_total GROUP BY CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(\"fecha\") AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(\"fecha\") AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT SUM(\"clientes\"), CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) FROM view_boletos_total GROUP BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) ORDER BY CONCAT(CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-'), LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT SUM(\"clientes\"), CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"fecha\"), 'FM00')) FROM view_boletos_total GROUP BY 2 ORDER BY CONCAT(EXTRACT(YEAR FROM \"fecha\"), '-', TO_CHAR(EXTRACT(MONTH FROM \"fecha\"), 'FM00')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT SUM(`clientes`), CONCAT(YEAR(`fecha`), '-', LPAD(MONTH(`fecha`), 2, '0')) FROM view_boletos_total GROUP BY 2 ORDER BY CONCAT(YEAR(`fecha`), '-', LPAD(MONTH(`fecha`), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT SUM(`clientes`), strftime('%Y', `fecha`) || '-' || strftime('%m', `fecha`) FROM view_boletos_total GROUP BY 2 ORDER BY strftime('%Y', `fecha`) || '-' || strftime('%m', `fecha`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT SUM(\"clientes\"), EXTRACT(YEAR FROM \"fecha\") || '-' || LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0') FROM view_boletos_total GROUP BY 2 ORDER BY EXTRACT(YEAR FROM \"fecha\") || '-' || LPAD(EXTRACT(MONTH FROM \"fecha\"), 2, '0') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT SUM(clientes), CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) FROM view_boletos_total GROUP BY CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) ORDER BY CONCAT(CONCAT(YEAR(fecha), '-'), LPAD(MONTH(fecha), 2, '0')) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT SUM(clientes), CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) FROM view_boletos_total GROUP BY CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) ORDER BY CAST(YEAR(fecha) AS VARCHAR(4)) + '-' + RIGHT('0' + CAST(MONTH(fecha) AS VARCHAR(2)), 2) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT SUM(clientes), YEAR(fecha) || '-' || LPAD(MONTH(fecha), 2, '0') FROM view_boletos_total GROUP BY 2 ORDER BY YEAR(fecha) || '-' || LPAD(MONTH(fecha), 2, '0') DESC";
        }
        else 
        {
            $sSql = "SELECT SUM(clientes), YYYYMM(fecha) FROM view_boletos_total GROUP BY 2 ORDER BY YYYYMM(fecha) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget16($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget16($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget16($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget16($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget16($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget16($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget16

    function getIndexContentHtml_widget16() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = ': ';
        $this->indexData['new_metric_value'] = '<span class="' . $this->indexData['new_metric_class'] . ' ' . $this->indexData['new_metric_class'] . '_widget16">' . $this->indexData['new_metric_formatted'] . '</span>';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget16">Clientes Mes%</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget16">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget16"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget16">{$this->indexData['percentage_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget16">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget16">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget16

    function formatIndexDimension_widget16($value) {
        $parts = explode('-', $value);

        if (2 != count($parts)) {
            return $value;
        }

        $glue = ' ';

        if (1 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $parts[1]) {
            $parts[1] = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        $value = $parts[1] . $glue . $parts[0];

        return $value;
    } // formatIndexDimension_widget16

    function formatIndexMetric_widget16($value) {
        $suffix = '';
		$isNegative = false;

		if ('-' == substr($value, 0, 1)) {
			$value      = substr($value, 1);
			$isNegative = true;
		}

        $this->scaleValue($value, $suffix);

		if ($isNegative) {
			$value = '-' . $value;
		}

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget16_metric']['symbol_grp'], $this->Ini->field_config['widget16_metric']['symbol_dec'], '2', 'S', $this->Ini->field_config['widget16_metric']['format_neg'], $this->Ini->field_config['widget16_metric']['symbol_mon'], $this->Ini->field_config['widget16_metric']['newfmt_neg'], $this->Ini->field_config['widget16_metric']['symbol_neg'], $this->Ini->field_config['widget16_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget16

    function getIndexContent_widget17() {
        $bResult = $this->getIndexContentData_widget17();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget17();
        }
    } // getIndexContent_widget17

    function getIndexContentData_widget17() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT AVG(califica), DATEPART('ww', fecha_registro) FROM view_boletos_satisfaction GROUP BY DATEPART('ww', fecha_registro) ORDER BY DATEPART('ww', fecha_registro) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT AVG(\"califica\"), DATEPART(WEEK, \"fecha_registro\") FROM view_boletos_satisfaction GROUP BY DATEPART(WEEK, \"fecha_registro\") ORDER BY DATEPART(WEEK, \"fecha_registro\") DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT AVG(\"califica\"), TO_CHAR(TO_DATE(\"fecha_registro\", 'yyyy-mm-dd hh24:mi:ss'), 'WW') FROM view_boletos_satisfaction GROUP BY TO_CHAR(TO_DATE(\"fecha_registro\", 'yyyy-mm-dd hh24:mi:ss'), 'WW') ORDER BY TO_CHAR(TO_DATE(\"fecha_registro\", 'yyyy-mm-dd hh24:mi:ss'), 'WW') DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT AVG(\"califica\"), EXTRACT(WEEK FROM \"fecha_registro\") FROM view_boletos_satisfaction GROUP BY 2 ORDER BY EXTRACT(WEEK FROM \"fecha_registro\") DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT AVG(`califica`), WEEKOFYEAR(`fecha_registro`) FROM view_boletos_satisfaction GROUP BY 2 ORDER BY WEEKOFYEAR(`fecha_registro`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT AVG(`califica`), CAST((strftime('%W', `fecha_registro`) + 1) AS INTEGER) FROM view_boletos_satisfaction GROUP BY 2 ORDER BY CAST((strftime('%W', `fecha_registro`) + 1) AS INTEGER) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT AVG(\"califica\"), EXTRACT(WEEK FROM \"fecha_registro\") FROM view_boletos_satisfaction GROUP BY 2 ORDER BY EXTRACT(WEEK FROM \"fecha_registro\") DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT AVG(califica), WEEK(fecha_registro) FROM view_boletos_satisfaction GROUP BY WEEK(fecha_registro) ORDER BY WEEK(fecha_registro) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT AVG(califica), DATEPART(WEEK, fecha_registro) FROM view_boletos_satisfaction GROUP BY DATEPART(WEEK, fecha_registro) ORDER BY DATEPART(WEEK, fecha_registro) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT AVG(califica), CAST(1 + (((CAST(fecha_registro AS DATE) - MDY(1, 1, YEAR(fecha_registro))) +  WEEKDAY(MDY(1, 1, YEAR(fecha_registro)))) / 7) as INT) FROM view_boletos_satisfaction GROUP BY 2 ORDER BY CAST(1 + (((CAST(fecha_registro AS DATE) - MDY(1, 1, YEAR(fecha_registro))) +  WEEKDAY(MDY(1, 1, YEAR(fecha_registro)))) / 7) as INT) DESC";
        }
        else 
        {
            $sSql = "SELECT AVG(califica), WEEK(fecha_registro) FROM view_boletos_satisfaction GROUP BY 2 ORDER BY WEEK(fecha_registro) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget17($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget17($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget17($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget17($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget17($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget17($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget17

    function getIndexContentHtml_widget17() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = ': ';
        $this->indexData['new_metric_value'] = '<span class="' . $this->indexData['new_metric_class'] . ' ' . $this->indexData['new_metric_class'] . '_widget17">' . $this->indexData['new_metric_formatted'] . '</span>';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget17"><img src="{$this->Ini->path_imag_cab}/sys__NM__btn__NM__icono_smile.png" /><br />Promedio Satisfaccion Semana</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget17">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget17"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget17">{$this->indexData['percentage_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget17">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget17">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget17

    function formatIndexDimension_widget17($value) {
        $value = "{$this->Ini->Nm_lang['lang_othr_valueWEEK']}{$value}";

        return $value;
    } // formatIndexDimension_widget17

    function formatIndexMetric_widget17($value) {
        $suffix = '';
		$isNegative = false;

		if ('-' == substr($value, 0, 1)) {
			$value      = substr($value, 1);
			$isNegative = true;
		}

        $this->scaleValue($value, $suffix);

		if ($isNegative) {
			$value = '-' . $value;
		}

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget17_metric']['symbol_grp'], $this->Ini->field_config['widget17_metric']['symbol_dec'], '2', 'S', $this->Ini->field_config['widget17_metric']['format_neg'], $this->Ini->field_config['widget17_metric']['symbol_mon'], $this->Ini->field_config['widget17_metric']['newfmt_neg'], $this->Ini->field_config['widget17_metric']['symbol_neg'], $this->Ini->field_config['widget17_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget17

    function getIndexContent_widget18() {
        $bResult = $this->getIndexContentData_widget18();

        if (true !== $bResult) {
            return $bResult;
        }
        else {
            return $this->getIndexContentHtml_widget18();
        }
    } // getIndexContent_widget18

    function getIndexContentData_widget18() {
        if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
        {
            $sSql = "SELECT AVG(califica), MONTH(fecha_registro) FROM view_boletos_satisfaction GROUP BY MONTH(fecha_registro) ORDER BY MONTH(fecha_registro) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
        {
            $sSql = "SELECT AVG(\"califica\"), MONTH(\"fecha_registro\") FROM view_boletos_satisfaction GROUP BY MONTH(\"fecha_registro\") ORDER BY MONTH(\"fecha_registro\") DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
        {
            $sSql = "SELECT AVG(\"califica\"), EXTRACT(MONTH FROM \"fecha_registro\") FROM view_boletos_satisfaction GROUP BY EXTRACT(MONTH FROM \"fecha_registro\") ORDER BY EXTRACT(MONTH FROM \"fecha_registro\") DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
        {
            $sSql = "SELECT AVG(\"califica\"), EXTRACT(MONTH FROM \"fecha_registro\") FROM view_boletos_satisfaction GROUP BY 2 ORDER BY EXTRACT(MONTH FROM \"fecha_registro\") DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
        {
            $sSql = "SELECT AVG(`califica`), MONTH(`fecha_registro`) FROM view_boletos_satisfaction GROUP BY 2 ORDER BY MONTH(`fecha_registro`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
        {
            $sSql = "SELECT AVG(`califica`), strftime('%m', `fecha_registro`) FROM view_boletos_satisfaction GROUP BY 2 ORDER BY strftime('%m', `fecha_registro`) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
        {
            $sSql = "SELECT AVG(\"califica\"), EXTRACT(MONTH FROM \"fecha_registro\") FROM view_boletos_satisfaction GROUP BY 2 ORDER BY EXTRACT(MONTH FROM \"fecha_registro\") DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
        {
            $sSql = "SELECT AVG(califica), MONTH(fecha_registro) FROM view_boletos_satisfaction GROUP BY MONTH(fecha_registro) ORDER BY MONTH(fecha_registro) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
        {
            $sSql = "SELECT AVG(califica), MONTH(fecha_registro) FROM view_boletos_satisfaction GROUP BY MONTH(fecha_registro) ORDER BY MONTH(fecha_registro) DESC";
        }
        elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
        {
            $sSql = "SELECT AVG(califica), MONTH(fecha_registro) FROM view_boletos_satisfaction GROUP BY 2 ORDER BY MONTH(fecha_registro) DESC";
        }
        else 
        {
            $sSql = "SELECT AVG(califica), MM(fecha_registro) FROM view_boletos_satisfaction GROUP BY 2 ORDER BY MM(fecha_registro) DESC";
        }

        $oRs = $this->Ini->Db->SelectLimit($sSql, 2);

        if (false === $oRs) {
            return $this->Ini->Nm_lang['lang_errm_dber'] . ' (' . $this->Ini->Db->ErrorMsg() . ')';
        }
        elseif ($oRs->EOF) {
            $oRs->Close();

            return $this->Ini->Nm_lang['lang_errm_empt'];
        }

        $this->indexData['new_metric']    = $oRs->fields[0];
        $this->indexData['new_dimension'] = $this->formatIndexDimension_widget18($oRs->fields[1]);

        $oRs->MoveNext();
        if ($oRs->EOF) {
            $this->indexData['has_old_data'] = false;
        }
        else {
            $this->indexData['has_old_data']  = true;
            $this->indexData['old_metric']    = $oRs->fields[0];
            $this->indexData['old_dimension'] = $this->formatIndexDimension_widget18($oRs->fields[1]);
        }

        $oRs->Close();

        if ($this->indexData['has_old_data']) {
            $this->indexData['difference'] = $this->indexData['new_metric'] - $this->indexData['old_metric'];
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['percentage'] = ($this->indexData['difference'] / $this->indexData['old_metric']) * 100;
            }
            else {
                $this->indexData['percentage'] = $this->indexData['difference'];
            }

            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget18($this->indexData['new_metric']);
            $this->indexData['old_metric_formatted'] = $this->formatIndexMetric_widget18($this->indexData['old_metric']);
            $this->indexData['difference_formatted'] = $this->formatIndexMetric_widget18($this->indexData['difference']);
            $this->indexData['percentage_formatted'] = sprintf('%.2f', $this->indexData['percentage']) . '%';
        }
        else {
            $this->indexData['new_metric_formatted'] = $this->formatIndexMetric_widget18($this->indexData['new_metric']);
            $this->indexData['difference_formatted'] = $this->indexData['new_metric_formatted'];
            $this->indexData['percentage_formatted'] = $this->indexData['new_metric_formatted'];
        }

        return true;
    } // getIndexContentData_widget18

    function getIndexContentHtml_widget18() {
        if ($this->indexData['has_old_data']) {
            if ($this->indexData['new_metric'] > $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_pos ? 'glyphicon-triangle-top' : $this->index_icon_pos) . ' scContainerIndexPosIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < $this->indexData['old_metric']) {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neg ? 'glyphicon-triangle-bottom' : $this->index_icon_neg) . ' scContainerIndexNegIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['icon']        = '<span class="glyphicon ' . ('' == $this->index_icon_neu ? 'glyphicon-minus' : $this->index_icon_neu) . ' scContainerIndexNeuIcon" aria-hidden="true"></span>';
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }
        else {
            $this->indexData['icon'] = '';

            if ($this->indexData['new_metric'] > 0) {
                $this->indexData['index_class'] = 'scContainerIndexPosText';
            }
            elseif ($this->indexData['new_metric'] < 0) {
                $this->indexData['index_class'] = 'scContainerIndexNegText';
            }
            else {
                $this->indexData['index_class'] = 'scContainerIndexNeuText';
            }
        }

        if ($this->indexData['new_metric'] > 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricPos';
        }
        elseif ($this->indexData['new_metric'] < 0) {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeg';
        }
        else {
            $this->indexData['new_metric_class'] = 'scContainerIndexMetricNeu';
        }

        $this->indexData['new_metric_sep']   = ': ';
        $this->indexData['new_metric_value'] = '<span class="' . $this->indexData['new_metric_class'] . ' ' . $this->indexData['new_metric_class'] . '_widget18">' . $this->indexData['new_metric_formatted'] . '</span>';

        $html = <<<IDXHTML
<div style="text-align: center; padding-top: 15px">
    <div style="display: inline-block">
        <div class="clearfix"><span style="" class="scContainerIndexTitle scContainerIndexTitle_widget18"><img src="{$this->Ini->path_imag_cab}/sys__NM__btn__NM__icono_smile.png" /><br />Promedio Satisfeccion Mes</span></div>
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget18">{$this->indexData['new_dimension']}{$this->indexData['new_metric_sep']}</span>{$this->indexData['new_metric_value']}</span></div>
        <div class="clearfix"><span class="{$this->indexData['index_class']}Size {$this->indexData['index_class']}Size_widget18"><span class="{$this->indexData['index_class']} {$this->indexData['index_class']}_widget18">{$this->indexData['percentage_formatted']}</span> {$this->indexData['icon']}</span></div>

IDXHTML;

        if ($this->indexData['has_old_data']) {
            if ($this->indexData['old_metric'] > 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricPos';
            }
            elseif ($this->indexData['old_metric'] < 0) {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeg';
            }
            else {
                $this->indexData['old_metric_class'] = 'scContainerIndexMetricNeu';
            }

            $html .= <<<IDXHTML
        <div class="clearfix"><span style="float: right"><span class="scContainerIndexDimension scContainerIndexDimension_widget18">{$this->indexData['old_dimension']}:</span> <span class="{$this->indexData['old_metric_class']} {$this->indexData['old_metric_class']}_widget18">{$this->indexData['old_metric_formatted']}</span></span></div>

IDXHTML;
        }

        $html .= <<<IDXHTML
    </div>
</div>

IDXHTML;

        return $html;
    } // getIndexContentHtml_widget18

    function formatIndexDimension_widget18($value) {
        if (1 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_janu'];
        }
        elseif (2 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_febr'];
        }
        elseif (3 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_marc'];
        }
        elseif (4 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_apri'];
        }
        elseif (5 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_mayy'];
        }
        elseif (6 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_june'];
        }
        elseif (7 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_july'];
        }
        elseif (8 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_augu'];
        }
        elseif (9 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_sept'];
        }
        elseif (10 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_octo'];
        }
        elseif (11 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_nove'];
        }
        elseif (12 == $value) {
            $value = $this->Ini->Nm_lang['lang_mnth_dece'];
        }

        return $value;
    } // formatIndexDimension_widget18

    function formatIndexMetric_widget18($value) {
        $suffix = '';
		$isNegative = false;

		if ('-' == substr($value, 0, 1)) {
			$value      = substr($value, 1);
			$isNegative = true;
		}

        $this->scaleValue($value, $suffix);

		if ($isNegative) {
			$value = '-' . $value;
		}

        nmgp_Form_Num_Val($value, $this->Ini->field_config['widget18_metric']['symbol_grp'], $this->Ini->field_config['widget18_metric']['symbol_dec'], '2', 'S', $this->Ini->field_config['widget18_metric']['format_neg'], $this->Ini->field_config['widget18_metric']['symbol_mon'], $this->Ini->field_config['widget18_metric']['newfmt_neg'], $this->Ini->field_config['widget18_metric']['symbol_neg'], $this->Ini->field_config['widget18_metric']['symbol_fmt']);

        return $value . $suffix;
    } // formatIndexMetric_widget18

    function scaleValue(&$value, &$suffix) {
        if (1000 <= $value) {
            $value /= 1000;
            $suffix = ' K';
        }

        if (1000 <= $value) {
            $value /= 1000;
            $suffix = ' M';
        }

        if (1000 <= $value) {
            $value /= 1000;
            $suffix = ' B';
        }
    } // scaleValue

} // dashboard_sucursal_odoo_control

function nm_limpa_str_dashboard_sucursal_odoo(&$str)
{
}

?>
