<?php
   include_once('grid_customer_bk_session.php');
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
   $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_perfil']          = "conn_pos";
   $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_cache']      = "";
   $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_doc']        = "";
    //check publication with the prod
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
    $str_path_apl_url = $_SERVER['PHP_SELF'];
    $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
    $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class grid_customer_bk_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $Arr_result;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_google_fonts;
   var $str_schema_filter;
   var $Str_btn_filter;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $link_form_customer;
   var $link_grid_v_ele_reporte_facturas_cliente_cons;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
   var $nm_limite_lin_res;
   var $nm_limite_lin_res_prt;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_arr_db_extra_args = array();
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_ger_css_emb;
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_blocos  = array();
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_access;
   var $nm_bases_db2;
   var $nm_bases_ibase;
   var $nm_bases_informix;
   var $nm_bases_mssql;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_oracle;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $nm_bases_progress;
   var $sc_page;
   var $sc_lig_md5 = array();
   var $sc_lig_target = array();
   var $sc_export_ajax = false;
   var $sc_export_ajax_img = false;
   var $force_db_utf8 = true;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      if (!function_exists("sc_check_mobile"))
      {
          include_once("../_lib/lib/php/nm_check_mobile.php");
      }
          include_once("../_lib/lib/php/fix.php");
      $_SESSION['scriptcase']['proc_mobile'] = sc_check_mobile();
        if (isset($_GET['_sc_force_mobile'])) {
            $_SESSION['scriptcase']['force_mobile'] = 'Y' == $_GET['_sc_force_mobile'];
        }
        if (isset($_SESSION['scriptcase']['force_mobile'])) {
            $_SESSION['scriptcase']['proc_mobile'] = $_SESSION['scriptcase']['force_mobile'];
        }
      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
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
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "grid_customer_bk"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "pointofsales"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20211222"; 
      $this->nm_hr_criacao   = "125250"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = ""; 
      $this->nm_hr_ult_alt   = ""; 
      $this->Apl_paginacao   = "PARCIAL"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
// 
// 
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
      $this->sc_site_ssl     = $this->appIsSsl();
      $this->sc_protocolo    = $this->sc_site_ssl ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_doc'];
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
      if (!isset($_SESSION['scriptcase']['grid_customer_bk']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['grid_customer_bk']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['grid_customer_bk']['save_session']['data'] = '';
      } 
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
      $this->str_schema_filter = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->server_pdf      = $this->java_protocol . $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/grid_customer_bk';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $pos_path = strrpos($this->path_prod, "/");
      $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_chart_theme = $this->root . $this->path_link . "_lib/chart/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      $this->Cmp_Sql_Time     = array();
      if (isset($_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['grid_customer_bk']['actual_lang']) || $_SESSION['scriptcase']['grid_customer_bk']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['grid_customer_bk']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_pointofsales',$this->str_lang,'0','/');
      }
      if (!isset($_SESSION['scriptcase']['fusioncharts_new']))
      {
          $_SESSION['scriptcase']['fusioncharts_new'] = @is_dir($this->path_third . '/oem_fs');
      }
      if (!isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs');
      }
      if (isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $aTmpOS = $this->getRunningOS();
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs/' . $aTmpOS['os']);
      }
      if (!class_exists('Services_JSON'))
      {
          include_once("grid_customer_bk_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_Link_View'] = true;
          }
      }
            if (isset($_POST['nmgp_opcao']) && 'ajax_check_file' == $_POST['nmgp_opcao'] ){
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_REQUEST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

    $out1_img_cache = $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imag_temp'] . $file_name;
    $orig_img = $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imag_temp']. '/'.basename($_POST['AjaxCheckImg']);
    copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
    echo $orig_img . '_@@NM@@_';
    if(file_exists($out1_img_cache)){
        echo $out1_img_cache;
        exit;
    }

         include_once("../_lib/lib/php/nm_trata_img.php");
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
    if (!$_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['embutida'])
    {
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_add_grid_search")
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['grid_search_add']['cmp'] = $_POST['parm'];
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['grid_search_add']['seq'] = $_POST['seq'];
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['opcao'] = $_POST['origem'];
          $nmgp_opcao = $_POST['origem'];
      }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_ch_bi_dyn_search")
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dyn_search_ch_bi']['cmp'] = $_POST['field'];
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dyn_search_ch_bi']['opc'] = $_POST['parm'];
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['opcao'] = $_POST['origem'];
          $nmgp_opcao = $_POST['origem'];
      }
      if (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "ajax_aut_comp_dyn_search")
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dyn_search_aut_comp']['cmp'] = $_GET['field'];
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['opcao'] = $_GET['origem'];
          $nmgp_opcao = $_GET['origem'];
      }
    }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['ancor_save'] = $_POST['ancor_save'];
          $oJson = new Services_JSON();
          if ($_SESSION['scriptcase']['sem_session']) {
              unset($_SESSION['sc_session']);
          }
          exit;
      }
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
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_event" || $_POST['nmgp_opcao'] == "ajax_navigate"))
                  {
                      $this->Arr_result = array();
                      $this->Arr_result['redirInfo']['action']              = $nm_apl_dest;
                      $this->Arr_result['redirInfo']['target']              = $parms['T'];
                      $this->Arr_result['redirInfo']['metodo']              = "post";
                      $this->Arr_result['redirInfo']['script_case_init']    = $this->sc_page;
                      $oJson = new Services_JSON();
                      echo $oJson->encode($this->Arr_result);
                      exit;
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
      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin, $remove_border;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      $Tmp_apl_lig = "form_customer";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_customer_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_customer_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_customer_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_customer_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_customer"] = 'S';
          }
      }
      $this->sc_lig_target["A_@scinf_"] = '_self';
      $this->sc_lig_target["A_@scinf__@scinf_form_customer"] = '_self';
      $Tmp_apl_lig = "grid_v_ele_reporte_facturas_cliente";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/grid_v_ele_reporte_facturas_cliente_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/grid_v_ele_reporte_facturas_cliente_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_v_ele_reporte_facturas_cliente_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_v_ele_reporte_facturas_cliente_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["grid_v_ele_reporte_facturas_cliente"] = 'S';
          }
      }
      $this->sc_lig_target["C_@scinf_idcustomer"] = '_blank';
      $this->sc_lig_target["C_@scinf_idcustomer_@scinf_grid_v_ele_reporte_facturas_cliente"] = '_blank';
      if ($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["grid_customer_bk"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["grid_customer_bk"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
        global $link_compact_mode, $link_remove_margin, $link_remove_border;
        if (isset($link_compact_mode) && 'ok' == $link_compact_mode) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['link_info']['compact_mode'] = true;
        }
        if (isset($link_remove_margin) && 'ok' == $link_remove_margin) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['link_info']['remove_margin'] = true;
        }
        if (isset($link_remove_border) && 'ok' == $link_remove_border) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['link_info']['remove_border'] = true;
        }

      $this->link_form_customer =  $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_customer') . "/" ; 
      $this->link_grid_v_ele_reporte_facturas_cliente_cons =  $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('grid_v_ele_reporte_facturas_cliente') . "/" ; 
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
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
      $_SESSION['sc_session']['SC_download_violation'] = $this->Nm_lang['lang_errm_fnfd'];
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['redir']))
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
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
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
      $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:2px; background-color:#6FA895; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_default_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_group { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:0px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:grayscale(100%);  }";
          echo ".scButton_group:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:0px; background-color:#6FA895; filter: alpha(opacity=40); opacity:0.4; padding:7.8px 15px;margin:0px -5px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_group_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:0px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:none;  }";
          echo ".scButton_small { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:2px; background-color:#6FA895; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_small_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_sc_image_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->nm_ger_css_emb = true;
      $this->Control_Css    = "coo";
      $this->path_atual     = getcwd();
      $opsys = strtolower(php_uname());

      $this->nm_cont_lin           = 0;
      $this->nm_limite_lin         = 0;
      $this->nm_limite_lin_prt     = 0;
      $this->nm_limite_lin_res     = 0;
      $this->nm_limite_lin_res_prt = 0;
// 
      include_once($this->path_aplicacao . "grid_customer_bk_erro.class.php"); 
      $this->Erro = new grid_customer_bk_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('grid_customer_bk'); 
// 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_fix.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("es");
      include("../_lib/css/" . $this->str_schema_all . "_grid.php");
      $this->Tree_img_col    = trim($str_tree_col);
      $this->Tree_img_exp    = trim($str_tree_exp);
      $this->scGridRefinedSearchExpandFAIcon    = trim($scGridRefinedSearchExpandFAIcon);
      $this->scGridRefinedSearchCollapseFAIcon    = trim($scGridRefinedSearchCollapseFAIcon);
      $this->Tree_img_type   = "kie";
      $_SESSION['scriptcase']['nmamd'] = array();
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->str_google_fonts= isset($str_google_fonts)?$str_google_fonts:'';
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->path_btn . $this->Str_btn_grid);
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      if (isset($_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scGridPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scGridBorder\">\r\n";
              $SS_cod_html .= "    <table class=\"scGridTabela\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scGridFieldOdd\"><td class=\"scGridFieldOddFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['grid_customer_bk']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && ((isset($_POST['nmgp_opcao']) && substr($_POST['nmgp_opcao'], 0, 5) == "ajax_") || (isset($_GET['nmgp_opcao']) && substr($_GET['nmgp_opcao'], 0, 5) == "ajax_")))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      $this->nm_bases_access     = array("access", "ado_access", "ace_access");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
      $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib", "azure_mssql", "azure_ado_mssql", "azure_adooledb_mssql", "azure_odbc_mssql", "azure_mssqlnative", "azure_pdo_sqlsrv", "azure_pdo_dblib", "googlecloud_mssql", "googlecloud_ado_mssql", "googlecloud_adooledb_mssql", "googlecloud_odbc_mssql", "googlecloud_mssqlnative", "googlecloud_pdo_sqlsrv", "googlecloud_pdo_dblib", "amazonrds_mssql", "amazonrds_ado_mssql", "amazonrds_adooledb_mssql", "amazonrds_odbc_mssql", "amazonrds_mssqlnative", "amazonrds_pdo_sqlsrv", "amazonrds_pdo_dblib");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle", "oraclecloud_oci8", "oraclecloud_oci805", "oraclecloud_oci8po", "oraclecloud_odbc_oracle", "oraclecloud_oracle", "oraclecloud_pdo_oracle", "amazonrds_oci8", "amazonrds_oci805", "amazonrds_oci8po", "amazonrds_odbc_oracle", "amazonrds_oracle", "amazonrds_pdo_oracle");
      $this->sqlite_version      = "old";
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_progress     = array("pdo_progress_odbc", "progress");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcBwDQX7HAN7HuJwDMBODkBOV5F/HMFGHQXGZ1BOZ1BeZMXGDMzGHArCHEXCHMJsDcBwDQFaDSrwD5B/DMvmVcFKV5BmVoBqD9BsZkFGHAvsD5BOHgvsHArsHEB3ZuB/HQJeDQFUHAN7HuB/HgvOVcFiV5FYHINUHQNwVINUHAN7HQJeHgveDkFeV5B7ZuXGHQXOZSFUD1BeHuXGDMNOV9FiV5FYHMJwHQBiZSBqD1rwHQFGHgrKDkBsH5FYVoX7D9JKDQX7D1BOV5FGDMBYV9BUHEF/HIF7HQXGZ1BOHAN7HuBOHgBOHEFKV5FqHMBODcXGDQFUHAvmVWXGDMzGZSrCV5FYHMJsDcFYZ1FGHAzGD5XGHgrKDkFeV5FqHIFGDcXGDQFaD1veHQJwDMrYV9FiH5FqDoJeD9JmZ1B/D1NaD5rqHgvsHArsHEXCHMX7DcXGZ9XGHABYHuJwHgvOZSrCV5X/VEraHQNmZSBODSNOHQJeHgBeHAFKV5B7ZuXGHQJeDuFaDSrwHQBODMzGVcFiV5FYHMX7HQXOZSBODSvmD5JeDMvCHEFKH5FYVoX7D9JKDQX7D1BOV5FGDMBYV9BUHEBmVErqHQNmZSBOD1NaD5XGHgNOHAFKV5FqHIBOHQJKZSBiDSN7HuF7DMvOZSJ3V5X/VoX7DcFYZ1BiHArYHuJsHgBYHEFKV5FqHIBqDcBiDuFaHIBeHuJeDMvOZSJ3H5FqDoJeD9JmZ1B/D1NaD5rqHgvsHArsHEXCHMJeDcXGDQFaHABYHuBqDMBOVcFiV5FYHMJsHQJmZ1BOHIBeHuFaHgNKDkFeV5B7ZuB/HQJKDQFUHAN7HuJwDMvOZSrCV5FYVoBiHQXOZ1FGHAvCD5XGHgvsHAFKH5FYVoX7D9JKDQX7D1BOV5FGDMBYV9BUHEF/HIJeHQXOZSBOHINKD5JeHgrKDkBsV5FqHIrqHQXsH9BiHABYHuX7DMNOVcFiV5FYVoBiDcNmZSBOHArKD5JwHgveDkFeV5FqHMFaHQFYZ9XGHAN7HuFUDMvsV9FiH5FqDoJeD9JmZ1B/D1NaD5rqHgvsHArsHEB3ZuJeHQXsZSBiDSrwHuNUDMBOZSJ3V5FYHMrqHQXGZ1FGHAzGZMJeHgBOHEFKV5FqHMB/HQNmDQB/HANOHuJwDMrYZSrCV5X/VEraHQBiZkFGD1zGD5XGHgNOHAFKH5FYVoX7D9JKDQX7D1BOV5FGDMBYV9BUHEF/HMF7HQBsH9BOHANOHuFGHgvsDkFeV5FqHIX7HQBiH9BiHANOHuJeDMzGZSJ3V5FYHMFaHQNwVINUDSrYHQBOHgNODkBsV5B7ZuB/HQXODQB/DSN7HQJsDMrYZSrCH5FqDoJeD9JmZ1B/D1NaD5rqHgvsHArsHEXCHIrqHQXODQFaD1veHQXGHgvOZSrCV5FYHMJsHQJmH9BqD1rwHQJsHgBeDkFeV5B7ZuBOHQXsDQFUD1veHQrqDMNOV9FiV5X/VoX7HQBsZ1X7HABYHuB/HgBYHAFKH5FYVoX7D9JKDQX7D1BOV5FGDMNaZSrCHEBmDoBiDcBwZ1FGDSrYV5BqDMrYHEFiV5FqZuB/D9XsDQJwD1veD5BqHuzGVcFKDuFqDoraDcBwZ1FGDSrYHQFUDErKDkBsDWF/DoraD9NwH9X7D1vOV5BiHuzGDkBODur/VoraD9BiH9B/Z1vmV5FGDMrYHEBUHEFqDoB/D9NmDuBOHAveV5FGHgvsVcBOV5BmVoFaD9BiZ1FaD1rwV5FaDMrYHEFiDWFqVoXGD9NmDQJsHIrKD5JwHuzGZSrCDWXCVoraDcJUVIraHArKZMB/DEBeHEFiDWFqVoFGDcJUDQJsHAN7V5JwHuzGZSrCDWXCDoJeD9JmZ1B/D1rwV5FaDEBOVkJGH5FYVoXGD9XsH9X7HINaD5NUHgNKDkBODuFqDoFGDcBqVIJwD1rwHQrqHgBYVkJ3H5FYHIFGDcXGDuFaHAN7HuBqDMrwV9BUHEFYHIraDcFYZkBiHAvCZMBOHgvCHEJqDWF/HMBODcBiDuBqHANOHQJsDMrwV9BUDurGVEX7DcNmZSBOHIveHQFUDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuFGDMvsVIBsDWF/HIX7HQBqZkFGZ1vOZMBqHgvCHEJqDWFqHMBOHQXOH9FUD1veHuXGDMrwV9BUHEFYVoBiHQBqZ1FGDSvmZMJeHgvCHArsDWB3ZuBODcBiDuBqHIrwHQJeHgNKDkBODuFqDoFGDcBqVIJwD1rwHQrqHgBYDkXKDurmZuBqHQNwZSBiHABYHQrqDMrwVcB/HEBmVEraDcNmZSBOHANOHuFaHgvCHArCDWr/HMBqHQXsH9BiD1BeHQBODMrwV9BUH5XKVoX7HQXOZ1BiHAvmD5JeDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuFGDMvsZSNiDWFYHMraHQXOVIJsHAvmZMBOHgvCHArsH5FYHIBiHQFYDuFaD1BeV5FaDMrwV9FeDuX7HIFUHQBiZSBOHIveHuX7HgvCHEJqDWX7HIFGHQFYH9BiDSN7HQJeHgNKDkBODuFqDoFGDcBqVIJwD1rwHQrqHgBYVkJqHEB7ZuBqDcXGH9BiHIBeHuJeDMrwV9BUDuX7HIF7HQBiZkFGHAvCZMBOHgvCHEJqDurmDoXGHQFYDuFaHAN7HuFUDMrwV9BUDuX7HIF7HQNwH9BOHINKZMJeDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuFGDMvsVIB/H5FqHMXGHQJmVINUD1rKHuB/HgvCHEJqH5FGZuBqHQXODQFUHAvmVWJsDMrwV9FeDuFqHIJsHQXOH9BOHAvCZMBqHgvCHArCH5BmZuJeHQBiZSFUD1BeHuBOHgNKDkBODuFqDoFGDcBqVIJwD1rwHQrqHgBYDkXKDWFqHMX7HQJeDuBqHAN7HuBqDMrwV9FeDWFYHMFUHQBqZ1X7HABYHQXGHgvCHArsDWFqHMJwDcXGDQB/DSN7HuJwDMrwV9BUHEX/VEFGHQBsZ1BOHANOHQJeDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuFGDMvsVIBsH5FqHIX7HQNmH9BODSrYHQJsHgvCHArCDWrGZuBqHQXsZSBiDSrwHuJwDMrwV9FeHEX7HINUDcFYVINUD1rKHuFaHgvCHEJqDWr/HIFGHQNmDuFaHIrwHurqHgNKDkBODuFqDoFGDcBqVIJwD1rwHQrqHgBYDkXKH5F/HIXGHQFYH9FUHArYHQBODMrwVcB/Dur/HMraHQXOZ1FGHABYHQFGHgvCHArCH5FYHMJsHQNmDQFaHIrwHuF7DMrwV9BUDur/HMF7HQXOZ1X7HAvmZMJeDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuFGDMvsVIB/HEF/HIXGHQBiZkFGHIrwHQF7HgvCHEJqDWBmDoXGDcXGDuFaHAN7HuF7DMrwVcB/DWJeHIrqHQBsZkBiHAvCD5XGHgvCHEJqDWr/HIX7DcXGDQB/HAN7HQFaHgNKDkBODuFqDoFGDcBqVIJwD1rwHuBqHgBYVkJqDuXKDoXGHQJKH9FUHANOHuFUDMrwV9FeDWFYHINUHQJmZSBqD1rKHuBOHgvCHArCDuFaHIB/DcXGZSFUHAveHQJsDMrwVcB/DWFYHMFaDcNmZSBOD1rKHQBODMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7VorqDcBqZ1FaD1rKV5XGDMNKDkBsV5FaZuBODcJeDQFGHAvmV5JwHuBYDkFCDuX7VEF7HQFYH9B/HIveZMB/DEBOHEXeDuX/DoB/D9NwZSX7D1BeV5BOHuvmVcFCDWXCVENUDcBqH9B/HABYD5JeDMzGHAFKV5XKDoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9B/HIveD5FaDErKZSJGH5F/DoFUHQJKDQX7HIBeD5BqHgrKVcBOV5F/VEF7DcBqZ1FaHAN7V5FaHgvCHArsDWFGZuB/HQXGDQFUHAvmVWJsDMvmVcFKV5BmVoBqD9BsZkFGHArKHuFUDMvCVkJqV5FaVoBiHQNmDQJsDSrwHuFGDMrYVcFKHEX7HMX7D9BiZ1FGDSBeHQX7DEBeHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMrwDkBODuX7VoX7D9JmZ1B/D1rKD5BiDMBYZSJGDWFqDoXGD9NmDQJsZ1rwD5F7HgrKVcFCDWJeVoJwDcBqZSB/DSBOV5FUDErKHEFiDuJeDoBOHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHMBiD9BsVIraD1rwV5X7HgBeHENiDWr/HMJsD9FYDQFUHIrKD5JsDMvsVcFCH5XCHMB/HQBsH9BqD1rKHQFUDEvsZSJGDWXCHMB/HQJeDQFaHAveD5NUHgNKDkBOV5FYHMBiDcJUZ1FaHArKD5BiDMBYVkJGDWr/DoB/D9XsH9FGDSN7D5JwDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5XGHgveHErsDWrGDoJeHQBiDQBqHINaV5BODMrYVcFeDWXCDoJsDcBwH9B/Z1rYHQJwHgNKHErCV5B7DoBOHQXODQX7DSBYHQJsHgrKVIBODWFaHMBOHQBiZkBiHArKV5X7HgBeHEFiV5B3DoF7D9XsDuFaHAveHQJsHuBYVcBODWFaDoJsDcBwZ1FGDSNOD5FaDErKZSXeH5FGDoNUHQJKDQFGDSBYV5FUHuNOVcFKDWFaHMBiD9BsVIraD1rwV5X7HgBeHErsHEB7VoBiHQBiDQNUZ1rKVWFU";
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_Meadow_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_Meadow_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "view_customers"; 
      }
   }

   function getRunningOS()
   {
       $aOSInfo = array();

       if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
       {
           $aOSInfo['os'] = 'win';
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
       {
           $aOSInfo['os'] = 'linux-i386';
           if(strpos(strtolower(php_uname()), 'x86_64') !== FALSE) 
            {
               $aOSInfo['os'] = 'linux-amd64';
            }
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
       {
           $aOSInfo['os'] = 'macos';
       }

       return $aOSInfo;
   }

   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao']) && $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_perfil']) && $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_customer_bk']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['grid_customer_bk']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao']))
      {
          if (!isset($_GET['nmgp_opcao']) || ('pdf' != $_GET['nmgp_opcao'] && 'pdf_res' != $_GET['nmgp_opcao'])) {
              ob_start();
          } else {
              @ini_set('zlib.output_compression',0);
              $bufferSize = @ini_get('output_buffering');
              if ('' != $bufferSize) {
                  $bufferSize = min($bufferSize * 10, 65536);
                  echo str_repeat('&nbsp;', $bufferSize);
              }
              
          }
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'pointofsales', 2, $this->force_db_utf8); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['embutida_init']) 
      {
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
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
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
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
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
      if (isset($_SESSION['scriptcase']['oracle_type']))
      {
          $this->nm_arr_db_extra_args['oracle_type'] = $_SESSION['scriptcase']['oracle_type']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->date_delim  = "";
          $this->date_delim1 = "";
      }
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:2px; background-color:#6FA895; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_default_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_group { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:0px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:grayscale(100%);  }";
          echo ".scButton_group:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:0px; background-color:#6FA895; filter: alpha(opacity=40); opacity:0.4; padding:7.8px 15px;margin:0px -5px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_group_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:0px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:none;  }";
          echo ".scButton_small { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:2px; background-color:#6FA895; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_small_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_sc_image_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
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
          if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
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
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_conexao'], $this->root . $this->path_prod, 'pointofsales', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_start();
          } 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
          $this->Ibase_version = "old";
          if ($ibase_version = $this->Db->Execute("SELECT RDB\$GET_CONTEXT('SYSTEM','ENGINE_VERSION') AS \"Version\" FROM RDB\$DATABASE"))
          {
              if (isset($ibase_version->fields[0]) && substr($ibase_version->fields[0], 0, 1) > 2) {$this->Ibase_version = "new";}
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
          $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_end_clean();
          } 
      } 
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
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
       eval ('set'.$this->Control_Css.$this->Tree_img_type.'("'.$this->nm_script_type.'SESSID_",base64_encode("'.$this->nm_script_by.'?".substr(md5(mt_rand()),8,16)),time()+86400);');
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_pos")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               $delim  = "#";
               $delim1 = "#";
           }
           if (isset($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
   function sc_Date_Protect($val_dt)
   {
       $dd = substr($val_dt, 8, 2);
       $mm = substr($val_dt, 5, 2);
       $yy = substr($val_dt, 0, 4);
       $hh = (strlen($val_dt) > 10) ? substr($val_dt, 10) : "";
       if ($mm > 12) {
           $mm = 12;
       }
       $dd_max = 31;
       if ($mm == '04' || $mm == '06' || $mm == '09' || $mm == 11) {
           $dd_max = 30;
       }
       if ($mm == '02') {
           $dd_max = ($yy % 4 == 0) ? 29 : 28;
       }
       if ($dd > $dd_max) {
           $dd = $dd_max;
       }
       return $yy . "-" . $mm . "-" . $dd . $hh;
   }
   function process_cond_bi(&$cond, &$data1, &$data2)
   {
      $Temp_sem = array('SU' => 0, 'MO' => 1, 'TU' => 2, 'WE' => 3, 'TH' => 4, 'FR' => 5, 'SA' => 6);

      $cond  = strtolower(substr($cond, 3));
      $data1 = "";
      $data2 = "";
      if ($cond == "tp")
      {
          $data1 = "        ";
          $data2 = "        ";
          return;
      }
      $Rcond = "bw";
      if ($cond == "hj")
      {
          $data1  = date('d');
          $data1 .= date('m');
          $data1 .= date('Y');
          $data2  = $data1;
          $Rcond  = "eq";
      }
      elseif ($cond == "ot")
      {
          $data1 = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 1, 0, 0));
          $data2 = $data1;
          $Rcond = "eq";
      }
      elseif ($cond == "am")
      {
          $data1 = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "+", 1, 0, 0));
          $data2 = $data1;
          $Rcond = "eq";
      }
      elseif ($cond == "u7")
      {
          $data1  = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 6, 0, 0));
          $data2  = date('dmY');
      }
      elseif ($cond == "p7" || $cond == "p3")
      {
          $incr   = ($cond == "p7") ? 6 : 29;
          $data2  = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "+", $incr, 0, 0));
          $data1  = date('dmY');
      }
      elseif ($cond == "sp" || $cond == "us")
      {
          $incr   = ($cond == "sp") ? 6 : 4;
          $Temps  = date('w') + 6;
          $data1  = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", $Temps, 0, 0));
          $data2  = $this->cond_bi_inv_date($this->nm_data->CalculaData($data1 , "ddmmaaaa", "+", $incr, 0, 0));
      }
      elseif ($cond == "ps" || $cond == "ss")
      {
          $incr   = ($cond == "ps") ? 4 : 6;
          $Temps  = (date('w') == 0) ? 1 : 8 - date('w');
          $data1  = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "+", $Temps, 0, 0));
          $data2  = $this->cond_bi_inv_date($this->nm_data->CalculaData($data1 , "ddmmaaaa", "+", $incr, 0, 0));
      }
      elseif ($cond == "mm" || $cond == "um")
      {
          $Temp_mes = date('m');
          $Temp_ano = date('Y');
          if ($cond == "um")
          {
              $Temp_mes--;
              if ($Temp_mes == 0)
              {
                  $Temp_mes = 12;
                  $Temp_ano--;
              }
              $Temp_dia = $this->cond_bi_dia_mes ($Temp_ano, $Temp_mes);
          }
          else
          {
              $Temp_dia = date('d');
          }
          $Temp_dia = (strlen($Temp_dia) == 1) ? "0" . $Temp_dia : $Temp_dia;
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data1  = "01";
          $data1 .= $Temp_mes;
          $data1 .= $Temp_ano;
          $data2  = $Temp_dia;
          $data2 .= $Temp_mes;
          $data2 .= $Temp_ano;
      }
      elseif ($cond == "pm")
      {
          $Temp_mes = date('m');
          $Temp_ano = date('Y');
          $Temp_mes++;
          if ($Temp_mes == 13)
          {
              $Temp_mes = 1;
              $Temp_ano++;
          }
          $Temp_dia = $this->cond_bi_dia_mes ($Temp_ano, $Temp_mes);
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data1  = "01";
          $data1 .= $Temp_mes;
          $data1 .= $Temp_ano;
          $data2  = $Temp_dia;
          $data2 .= $Temp_mes;
          $data2 .= $Temp_ano;
      }
      elseif ($cond == "cy")
      {
          $data1  = "01";
          $data1 .= "01";
          $data1 .= date('Y');
          $data2  = date('d');
          $data2 .= date('m');
          $data2 .= date('Y');
      }
      elseif ($cond == "ly")
      {
          $data1  = "01";
          $data1 .= "01";
          $data1 .= date('Y') - 1;
          $data2  = 31;
          $data2 .= 12;
          $data2 .= date('Y') - 1;
      }
      elseif ($cond == "yy" || $cond == "m3" || $cond == "m6" || $cond == "m18" || $cond == "m24")
      {
          $Temp_mes = date('m') - 1;
          $Temp_ano = date('Y');
          if ($Temp_mes == 0)
          {
              $Temp_mes = 12;
              $Temp_ano--;
          }
          $Temp_dia = $this->cond_bi_dia_mes ($Temp_ano, $Temp_mes);
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data2  = $Temp_dia;
          $data2 .= $Temp_mes;
          $data2 .= $Temp_ano;
          $incr   = ($cond == "yy") ? 12 : substr($cond, 1);
          $Temp   = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 0, $incr, 0));
          $data1  = "01";
          $data1 .= substr($Temp, 2);
      }
      elseif ($cond == "current_year")
      {
          $data1  = "0101" . date('Y');
          $data2  = "3112" . date('Y');
      }
      elseif ($cond == "next_year")
      {
          $data1  = "0101" . (date('Y') + 1);
          $data2  = "3112" . (date('Y') + 1);
      }
      elseif ($cond == "current_quarter_today")
      {
          $trim  = array('01'=>'01','02'=>'01','03'=>'01','04'=>'04','05'=>'04','06'=>'04','07'=>'07','08'=>'07','09'=>'07','10'=>'10','11'=>'10','12'=>'10');
          $mes   = date('m');
          $data1 = "01" . $trim[$mes] . date('Y');
          $data2 = date('dmY');
      }
      elseif ($cond == "current_quarter" || $cond == "last_quarter" || $cond == "next_quarter")
      {
          $trim    = array('1'=>'01','2'=>'04','3'=>'07','4'=>'10');
          $dia_mes = array('03'=>'31','06'=>'30','09'=>'30','12'=>'31');
          $ano     = date('Y');
          $mes     = date('m');
          $Q       = $this->nm_data->GetTrim($mes);
          if ($cond == "last_quarter")
          {
              $Q--;
              if ($Q == 0)
              {
                  $Q = 4;
                  $ano--;
              }
          }
          elseif ($cond == "next_quarter")
          {
              $Q++;
              if ($Q == 5)
              {
                  $Q = 1;
                  $ano++;
              }
          }
          $mes   = $trim[$Q];
          $data1 = "01" . $mes . $ano;
          $mes  += 2;
          $mes   = (strlen($mes) == 1) ? "0" . $mes : $mes;
          $data2 = $dia_mes[$mes] . $mes . $ano;
      }
      elseif ($cond == "last_1hr" || $cond == "last_6hr" || $cond == "last_12hr" || $cond == "last_24hr")
      {
          $Temp_inc = array('last_1hr' => 1, 'last_6hr' => 6, 'last_12hr' => 12, 'last_24hr' => 24);
          $temp      = date('dmYHis');
          $data2     = $temp;
          $hora      = (int) (substr($temp, 8, 2) - $Temp_inc[$cond]);
          if ($hora < 0)
          {
              $hora += 24;
              $hora  = (strlen($hora) == 1) ? "0" . $hora : $hora;
              $data1 = $this->cond_bi_inv_date($this->nm_data->CalculaData(substr($temp, 0, 8) , "ddmmaaaa", "-", 1, 0, 0)) . $hora . substr($temp, 10);
          }
          else
          {
              $hora  = (strlen($hora) == 1) ? "0" . $hora : $hora;
              $data1 = substr($temp, 0, 8) . $hora . substr($temp, 10);
          }
      }
      elseif ($cond == "next_1hr" || $cond == "next_6hr" || $cond == "next_12hr" || $cond == "next_24hr")
      {
          $Temp_inc = array('next_1hr' => 1, 'next_6hr' => 6, 'next_12hr' => 12, 'next_24hr' => 24);
          $temp      = date('dmYHis');
          $data1     = $temp;
          $hora      = (int) (substr($temp, 8, 2) + $Temp_inc[$cond]);
          if ($hora > 24)
          {
              $hora -= 24;
              $hora  = (strlen($hora) == 1) ? "0" . $hora : $hora;
              $data2 = $this->cond_bi_inv_date($this->nm_data->CalculaData(substr($temp, 0, 8) , "ddmmaaaa", "+", 1, 0, 0)) . $hora . substr($temp, 10);
          }
          else
          {
              if ($hora == 24)
              {
                  $hora = '00';
              }
              $hora  = (strlen($hora) == 1) ? "0" . $hora : $hora;
              $data2 = substr($temp, 0, 8) . $hora . substr($temp, 10);
          }
      }
      elseif ($cond == "este_mes_full")
      {
          $Temp_mes = date('m');
          $Temp_ano = date('Y');
          $Temp_dia = $this->cond_bi_dia_mes ($Temp_ano, $Temp_mes);
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data1    = "01" . $Temp_mes . $Temp_ano;
          $data2    = $Temp_dia . $Temp_mes . $Temp_ano;
      }
      elseif ($cond == "last_3_months_today" || $cond == "last_3_months_current")
      {
          $Temps = "01" . date('mY');
          $data1 = $this->cond_bi_inv_date($this->nm_data->CalculaData($Temps , "ddmmaaaa", "-", 0, 2, 0));
          if ($cond == "last_3_months_today")
          {
              $data2 = date('dmY');
          }
          else
          {
              $Temp_mes = date('m');
              $Temp_ano = date('Y');
              $Temp_dia = $this->cond_bi_dia_mes ($Temp_ano, $Temp_mes);
              $data2 = $Temp_dia . date('mY');
          }
      }
      elseif ($cond == "next_3_months_today" || $cond == "next_3_months_current")
      {
          if ($cond == "next_3_months_today")
          {
              $data1 = date('dmY');
          }
          else
          {
              $data1 = "01" . date('mY');
          }
          $Temp_data = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY'), "ddmmaaaa", "+", 0, 2, 0));
          $Temp_ano = substr($Temp_data, 4);
          $Temp_mes = substr($Temp_data, 2, 2);
          $Temp_dia = $this->cond_bi_dia_mes ($Temp_ano, $Temp_mes);
          $data2 = $Temp_dia . $Temp_mes . $Temp_ano;
      }
      elseif ($cond == "last_week" || $cond == "next_week")
      {
          $ini_sem   = 1;
          if (isset($_SESSION['scriptcase']['reg_conf']['date_week_ini']) && $_SESSION['scriptcase']['reg_conf']['date_week_ini'] != "")
          {
              $ini_sem = $Temp_sem[$_SESSION['scriptcase']['reg_conf']['date_week_ini']];
          }
          $dia = date('w');
          if ($cond == "last_week")
          {
              if ($dia > $ini_sem)
              {
                  $volta = ($dia - $ini_sem) + 7;
              }
              else
              {
                  $volta = 7 - ($ini_sem - $dia);
              }
              $dt1   = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY'), "ddmmaaaa", "-", $volta, 0, 0));
              $data1 = $dt1;
              $data2 = $this->cond_bi_inv_date($this->nm_data->CalculaData($dt1, "ddmmaaaa", "+", 6, 0, 0));
          }
          else
          {
              if ($dia > $ini_sem)
              {
                  $volta = 7 - ($dia - $ini_sem);
              }
              else
              {
                  $volta = $ini_sem - $dia;
              }
              $dt1   = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY'), "ddmmaaaa", "+", $volta, 0, 0));
              $data1 = $dt1;
              $data2 = $this->cond_bi_inv_date($this->nm_data->CalculaData($dt1, "ddmmaaaa", "+", 6, 0, 0));
          }
      }
      elseif ($cond == "current_week")
      {
          $ini_sem = 1;
          if (isset($_SESSION['scriptcase']['reg_conf']['date_week_ini']) && $_SESSION['scriptcase']['reg_conf']['date_week_ini'] != "")
          {
              $ini_sem = $Temp_sem[$_SESSION['scriptcase']['reg_conf']['date_week_ini']];
          }
          $dia = date('w');
          if ($dia == $ini_sem)
          {
              $data1 = date('dmY');
          }
          else
          {
              if ($dia > $ini_sem)
              {
                  $volta = $dia - $ini_sem;
              }
              else
              {
                  $volta = 7 - ($ini_sem - $dia);
              }
              $dt1   = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY'), "ddmmaaaa", "-", $volta, 0, 0));
              $data1 = $dt1;
          }
          $data2 = $this->cond_bi_inv_date($this->nm_data->CalculaData($data1, "ddmmaaaa", "+", 6, 0, 0));
      }
      elseif ($cond == "current_week_today")
      {
          $ini_sem = 1;
          if (isset($_SESSION['scriptcase']['reg_conf']['date_week_ini']) && $_SESSION['scriptcase']['reg_conf']['date_week_ini'] != "")
          {
              $ini_sem = $Temp_sem[$_SESSION['scriptcase']['reg_conf']['date_week_ini']];
          }
          $dia = date('w');
          if ($dia == $ini_sem)
          {
              $data1 = date('dmY');
              $data2 = date('dmY');
              $Rcond = "eq";
          }
          else
          {
              if ($dia > $ini_sem)
              {
                  $volta = $dia - $ini_sem;
              }
              else
              {
                  $volta = 7 - ($ini_sem - $dia);
              }
              $dt1   = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY'), "ddmmaaaa", "-", $volta, 0, 0));
              $data1 = $dt1;
              $data2 = date('dmY');
          }
      }
      elseif ($cond == "last_30_dias")
      {
          $data1 = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 31, 0, 0));
          $data2 = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 1, 0, 0));
      }
      elseif ($cond == "last_30_today" )
      {
          $data1 = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 30, 0, 0));
          $data2 = date('dmY');
      }
      elseif ($cond == "next_3_months" || $cond == "next_6_months" || $cond == "next_12_months" || $cond == "next_18_months" || $cond == "next_24_months")
      {
          $Temp_inc = array('next_3_months' => 3, 'next_6_months' => 6, 'next_12_months' => 12, 'next_18_months' => 18, 'next_24_months' => 24);
          $Temp_mes = date('m') + 1;
          $Temp_ano = date('Y');
          if ($Temp_mes == 13)
          {
              $Temp_mes = 1;
              $Temp_ano++;
          }
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data1    = "01" . $Temp_mes . $Temp_ano;
          $incr      = $Temp_inc[$cond];
          $Temp_data = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY'), "ddmmaaaa", "+", 0, $incr, 0));
          $Temp_ano  = substr($Temp_data, 4);
          $Temp_mes  = substr($Temp_data, 2, 2);
          $Temp_dia  = $this->cond_bi_dia_mes ($Temp_ano, $Temp_mes);
          $Temp_mes  = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data2     = $Temp_dia . $Temp_mes . $Temp_ano;
      }
      elseif (substr($cond, 0, 11) == "custom_yyyy")
      {
          $conf = explode("@@", $cond);
          $conf[2]--;
          if ($conf[1] == "next")
          {
              $tmp_vl[0] = date('Y');
              if ($conf[3] != "s")
              {
                  $tmp_vl[0]++;
              }
              $tmp_vl[1] = $tmp_vl[0] + $conf[2];
          }
          else
          {
              $tmp_vl[1] = date('Y');
              if ($conf[3] != "s")
              {
                  $tmp_vl[1]--;
              }
              $tmp_vl[0] = $tmp_vl[1] - $conf[2];
          }
          $data1 = "0101" . $tmp_vl[0];
          $data2 = "3112" . $tmp_vl[1];
      }
      elseif (substr($cond, 0, 9) == "custom_mm")
      {
          $conf = explode("@@", $cond);
          $conf[2]--;
          if ($conf[1] == "next")
          {
              $Temp_dia = "01";
              $Temp_mes = date('m');
              $Temp_ano = date('Y');
              if ($conf[3] != "s")
              {
                  $Temp_mes++;
                  if ($Temp_mes == 13)
                  {
                      $Temp_mes = 1;
                      $Temp_ano++;
                  }
              }
              $Temp_mes  = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
              $data1     = $Temp_dia . $Temp_mes . $Temp_ano;
              $Temp_data = $this->cond_bi_inv_date($this->nm_data->CalculaData($data1, "ddmmaaaa", "+", 0, $conf[2], 0));
              $Temp_ano  = substr($Temp_data, 4);
              $Temp_mes  = substr($Temp_data, 2, 2);
              $Temp_dia  = $this->cond_bi_dia_mes ($Temp_ano, $Temp_mes);
              $Temp_mes  = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
              $data2     = $Temp_dia . $Temp_mes . $Temp_ano;
          }
          else
          {
              $Temp_mes = date('m');
              $Temp_ano = date('Y');
              if ($conf[3] != "s")
              {
                  $Temp_mes--;
                  if ($Temp_mes == 0)
                  {
                      $Temp_mes = 12;
                      $Temp_ano--;
                  }
              }
              $Temp_dia  = $this->cond_bi_dia_mes ($Temp_ano, $Temp_mes);
              $Temp_mes  = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
              $data2     = $Temp_dia . $Temp_mes . $Temp_ano;
              $Temp_data = $this->cond_bi_inv_date($this->nm_data->CalculaData($data2, "ddmmaaaa", "-", 0, $conf[2], 0));
              $Temp_ano  = substr($Temp_data, 4);
              $Temp_mes  = substr($Temp_data, 2, 2);
              $Temp_dia  = "01";
              $Temp_mes  = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
              $data1     = $Temp_dia . $Temp_mes . $Temp_ano;
          }
      }
      elseif (substr($cond, 0, 9) == "custom_dd")
      {
          $conf = explode("@@", $cond);
          $conf[2]--;
          if ($conf[1] == "next")
          {
              if ($conf[3] == "s")
              {
                  $data1 = date('dmY');
              }
              else
              {
                  $data1 = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY'), "ddmmaaaa", "+", 1, 0, 0));
              }
              $data2 = $data1;
              if ($conf[2] >= 0)
              {
                  $data2 = $this->cond_bi_inv_date($this->nm_data->CalculaData($data1, "ddmmaaaa", "+", $conf[2], 0, 0));
              }
          }
          else
          {
              if ($conf[3] == "s")
              {
                  $data2 = date('dmY');
              }
              else
              {
                  $data2 = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('Y-m-d'), "aaaa-mm-dd", "-", 1, 0, 0));
              }
              $data1 = $data2;
              if ($conf[2] >= 0)
              {
                  $data1 = $this->cond_bi_inv_date($this->nm_data->CalculaData($data2, "ddmmaaaa", "-", $conf[2], 0, 0));
              }
          }
          if ($data1 == $data2)
          {
             $Rcond = "eq";
          }
      }
      elseif (substr($cond, 0, 9) == "custom_hh")
      {
          $conf  = explode("@@", $cond);
          $conf[2]--;
          $ddhh  = date('dmYHi');
          $hora  = date('H');
          $dias  = (int) ($conf[2] / 24);
          $horas = $conf[2] - ($dias * 24);
          if ($conf[1] == "next")
          {
              if ($conf[3] != "s")
              {
                  $hora++;
                  $horax = (strlen($hora) == 1) ? "0" . $hora : $hora;
                  $ddhh  =  substr($ddhh, 0, 8) . $horax . substr($ddhh, 10);
                  if ($hora == 24)
                  {
                      $hora = 0;
                      $dt1  = $this->cond_bi_inv_date($this->nm_data->CalculaData(substr($ddhh, 0, 8) , "ddmmaaaa", "+", 1, 0, 0));
                      $ddhh =  $dt1 . ' 00' .  substr($ddhh, 10);
                  }
              }
              $data1 = substr($ddhh, 0, 12) . '00';
              if ($dias > 0)
              {
                  $dt1  = $this->cond_bi_inv_date($this->nm_data->CalculaData(substr($ddhh, 0, 10) , "ddmmaaaa", "+", $dias, 0, 0));
                  $ddhh =  $dt1 . substr($ddhh, 8);
              }
              $hora += $horas;
              $horax = (strlen($hora) == 1) ? "0" . $hora : $hora;
              $ddhh  =  substr($ddhh, 0, 8) . $horax .  substr($ddhh, 10);
              if ($hora > 24)
              {
                  $hora = $hora - 24;
                  $dt1  = $this->cond_bi_inv_date($this->nm_data->CalculaData(substr($ddhh, 0, 8) , "ddmmaaaa", "+", 1, 0, 0));
                  $hora = (strlen($hora) == 1) ? "0" . $hora : $hora;
                  $ddhh =  $dt1 . $hora .  substr($ddhh, 10);
              }
              $data2 = substr($ddhh, 0, 11) . '59';
          }
          else
          {
              if ($conf[3] != "s")
              {
                  $hora--;
                  $horax = (strlen($hora) == 1) ? "0" . $hora : $hora;
                  $ddhh  =  substr($ddhh, 0, 8) . $horax .  substr($ddhh, 10);
                  if ($hora < 0)
                  {
                      $hora = 23;
                      $dt1  = $this->cond_bi_inv_date($this->nm_data->CalculaData(substr($ddhh, 0, 8) , "ddmmaaaa", "-", 1, 0, 0));
                      $ddhh =  $dt1 . $hora .  substr($ddhh, 10);
                  }
              }
              $data2 = substr($ddhh, 0, 11) . '59';
              if ($dias > 0)
              {
                  $dt1  = $this->cond_bi_inv_date($this->nm_data->CalculaData(substr($ddhh, 0, 8) , "ddmmaaaa", "-", $dias, 0, 0));
                  $ddhh =  $dt1 . substr($ddhh, 8);
              }
              $hora -= $horas;
              $horax = (strlen($hora) == 1) ? "0" . $hora : $hora;
              $ddhh  =  substr($ddhh, 0, 8) . $horax .  substr($ddhh, 10);
              if ($hora < 0)
              {
                  $hora = 24 + $hora;
                  $dt1  = $this->cond_bi_inv_date($this->nm_data->CalculaData(substr($ddhh, 0, 8) , "ddmmaaaa", "-", 1, 0, 0));
                  $hora = (strlen($hora) == 1) ? "0" . $hora : $hora;
                  $ddhh =  $dt1 . $hora .  substr($ddhh, 10);
              }
              $data1 = substr($ddhh, 0, 11) . '00';
          }
      }
      elseif (substr($cond, 0, 14) == "custom_quarter")
      {
          $tab_trim = array('1' => array('I' => '0101','F' => '3103'), '2' => array('I' => '0104','F' => '3006'), '3' => array('I' => '0107','F' => '3009'), '4' => array('I' => '0110','F' => '3112'));
          $conf = explode("@@", $cond);
          $conf[2]--;
          $ano  = date('Y');
          $mes  = date('m');
          $Q    = $this->nm_data->GetTrim($mes);
          $anos = (int) ($conf[2] / 4);
          $trim = $conf[2] - ($anos * 4);
          if ($conf[1] == "next")
          {
              if ($conf[3] != "s")
              {
                  $Q++;
                  if ($Q == 5)
                  {
                      $Q = 1;
                      $ano++;
                  }
              }
              $data1 = $tab_trim[$Q]['I'] . $ano;
              $ano += $anos;
              $Q   += $trim;
              if ($Q > 4)
              {
                  $Q = $Q - 4;
                  $ano++;
              }
              $data2 = $tab_trim[$Q]['F'] . $ano;
          }
          else
          {
              if ($conf[3] != "s")
              {
                  $Q--;
                  if ($Q == 0)
                  {
                      $Q = 4;
                      $ano--;
                  }
              }
              $data2 = $tab_trim[$Q]['F'] . $ano;
              $ano -= $anos;
              $Q   -= $trim;
              if ($Q < 1)
              {
                  $Q = $Q + 4;
                  $ano--;
              }
              $data1 = $tab_trim[$Q]['I'] . $ano;
          }
      }
      elseif (substr($cond, 0, 11) == "custom_week")
      {
          $conf = explode("@@", $cond);
          $Temp_sem  = array('SU' => 0, 'MO' => 1, 'TU' => 2, 'WE' => 3, 'TH' => 4, 'FR' => 5, 'SA' => 6);
          $ini_sem   = 1;
          if (isset($_SESSION['scriptcase']['reg_conf']['date_week_ini']) && $_SESSION['scriptcase']['reg_conf']['date_week_ini'] != "")
          {
              $ini_sem = $Temp_sem[$_SESSION['scriptcase']['reg_conf']['date_week_ini']];
          }
          $dia = date('w');
          if ($conf[1] == "next")
          {
              if ($dia > $ini_sem)
              {
                  $volta = 7 - ($dia - $ini_sem);
              }
              else
              {
                  $volta = $ini_sem - $dia;
              }
              $dt1 = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY'), "ddmmaaaa", "+", $volta, 0, 0));
              if ($conf[3] == "s")
              {
                  $dt1 = $this->cond_bi_inv_date($this->nm_data->CalculaData($dt1, "ddmmaaaa", "-", 7, 0, 0));
              }
              $incr = 6;
              if ($conf[2] > 0)
              {
                  $incr = (($conf[2] - 1) * 7) + 6;
              }
              $data1 = $dt1;
              $data2 = $this->cond_bi_inv_date($this->nm_data->CalculaData($dt1, "ddmmaaaa", "+", $incr, 0, 0));
          }
          else
          {
              if ($dia > $ini_sem)
              {
                  $volta = ($dia - $ini_sem) + 1;
              }
              else
              {
                  $volta = 8 - ($ini_sem - $dia);
              }
              $dt1 = $this->cond_bi_inv_date($this->nm_data->CalculaData(date('dmY'), "ddmmaaaa", "-", $volta, 0, 0));
              if ($conf[3] == "s")
              {
                  $dt1 = $this->cond_bi_inv_date($this->nm_data->CalculaData($dt1, "ddmmaaaa", "+", 7, 0, 0));
              }
              $incr = 6;
              if ($conf[2] > 0)
              {
                  $incr = (($conf[2] - 1) * 7) + 6;
              }
              $data2 = $dt1;
              $data1 = $this->cond_bi_inv_date($this->nm_data->CalculaData($dt1, "ddmmaaaa", "-", $incr, 0, 0));
          }
      }
      $cond = $Rcond;
   }
   function cond_bi_dia_mes ($Temp_ano, $Temp_mes)
   {
      $Temp_dia = 31;
      if ($Temp_mes == 4 || $Temp_mes == 6 || $Temp_mes == 9 || $Temp_mes == 11)
      {
          $Temp_dia = 30;
      }
      if ($Temp_mes == 2)
      {
          $Temp_dia = ($Temp_ano % 4 == 0) ? 29 : 28;
      }
      return $Temp_dia;
   }
   function cond_bi_inv_date ($Temp)
   {
       return substr($Temp, 8, 2) . substr($Temp, 5, 2) . substr($Temp, 0, 4);
   }
   function dyn_convert_date($val)
   {
       $val_ok = array();
       foreach ($val as $Part_date)
       {
           if (substr($Part_date, 0, 1) == "Y")
           {
               $val_ok['ano'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "M")
           {
               $val_ok['mes'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "D")
           {
               $val_ok['dia'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "H")
           {
               $val_ok['hor'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "I")
           {
               $val_ok['min'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "S")
           {
               $val_ok['seg'] = substr($Part_date, 2);
           }
       }
       return $val_ok;
   }
	function appIsSsl() {
		if (isset($_SERVER['HTTPS'])) {
			if ('on' == strtolower($_SERVER['HTTPS'])) {
				return true;
			}
			if ('1' == $_SERVER['HTTPS']) {
				return true;
			}
		}

		if (isset($_SERVER['REQUEST_SCHEME'])) {
			if ('https' == $_SERVER['REQUEST_SCHEME']) {
				return true;
			}
		}

		if (isset($_SERVER['SERVER_PORT'])) {
			if ('443' == $_SERVER['SERVER_PORT']) {
				return true;
			}
		}

		return false;
	}
   function Get_Gb_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['grid_customer_bk']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
   }

   function GB_date_format($val, $format, $prefix, $conf_region="S", $mask="")
   {
           return $val;
   }
   function Get_arg_groupby($val, $format)
   {
       return $val; 
   }
   function Get_format_dimension($ind_ini, $ind_qb, $campo, $rs, $conf_region="S", $mask="")
   {
       $retorno    = array();
       $format     = $this->Get_Gb_date_format($ind_qb, $campo);
       $Prefix_dat = $this->Get_Gb_prefix_date_format($ind_qb, $campo);
       if (empty($format) || $rs->fields[$ind_ini] == "")
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHIISS')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3,4");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3] . ":" . $rs->fields[$ind_ini + 4];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDD2')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMM')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'BIMONTHLY' || $format == 'QUARTER' || $format == 'FOURMONTHS' || $format == 'SEMIANNUAL' || $format == 'WEEK')
       {
           $temp            = (substr($rs->fields[$ind_ini], 0, 1) == 0) ? substr($rs->fields[$ind_ini], 1) : $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $Prefix_dat . $temp;
           return $retorno;
       }
       if ($format == 'DAYNAME'|| $format == 'YYYYDAYNAME')
       {
           if ($format == 'DAYNAME')
           {
               $retorno['orig'] = $rs->fields[$ind_ini];
               $ano             = "";
               $daynum          = $rs->fields[$ind_ini];
           }
           else
           {
               $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
               $ano             = " " . $rs->fields[$ind_ini];
               $daynum          = $rs->fields[$ind_ini + 1];
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
           {
               $daynum--;
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               $daynum = ($daynum == 6) ? 0 : $daynum + 1;
           }
           if ($daynum == 0) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_sund'] . $ano;
           }
           if ($daynum == 1) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_mond'] . $ano;
           }
           if ($daynum == 2) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_tued'] . $ano;
           }
           if ($daynum == 3) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_wend'] . $ano;
           }
           if ($daynum == 4) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_thud'] . $ano;
           }
           if ($daynum == 5) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_frid'] . $ano;
           }
           if ($daynum == 6) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_satd'] . $ano;
           }
           return $retorno;
       }
       if ($format == 'HH')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-00 " . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'DD')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'MM')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $temp            = $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-00 " . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'YYYYWEEK' || $format == 'YYYYBIMONTHLY' || $format == 'YYYYQUARTER' || $format == 'YYYYFOURMONTHS' || $format == 'YYYYSEMIANNUAL')
       {
           $temp            = (substr($rs->fields[$ind_ini + 1], 0, 1) == 0) ? substr($rs->fields[$ind_ini + 1], 1) : $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $Prefix_dat . $temp . " " . $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYHH' || $format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $rs->fields[$ind_ini] . $_SESSION['scriptcase']['reg_conf']['date_sep'] . $rs->fields[$ind_ini + 1];
           return $retorno;
       }
       elseif ($format == 'HHIISS')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1,2");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1] . ":" . $rs->fields[$ind_ini + 2];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'HHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       else
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
   }
   function Ajust_fields($ind_ini, &$rs, $parts)
   {
       $prep = explode(",", $parts);
       foreach ($prep as $ind)
       {
           $ind_ok = $ind_ini + $ind;
           $rs->fields[$ind_ok] = (int) $rs->fields[$ind_ok];
           if (strlen($rs->fields[$ind_ok]) == 1)
           {
               $rs->fields[$ind_ok] = "0" . $rs->fields[$ind_ok];
           }
       }
   }
   function Get_date_order_groupby($sql_def, $order, $format="", $order_old="")
   {
       $order      = " " . trim($order);
       $order_old .= (!empty($order_old)) ? ", " : "";
       return $order_old . $sql_def . $order;
   }
}
//===============================================================================
//
class grid_customer_bk_sub_css
{
   function __construct()
   {
      global $script_case_init;
      $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
      if ($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['SC_herda_css'] == "N")
      {
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css']['grid_customer_bk']    = $str_schema_all . "_grid.css";
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css_bw']['grid_customer_bk'] = $str_schema_all . "_grid_bw.css";
      }
   }
}
//
class grid_customer_bk_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
   var $NM_ajax_flag  = false;
   var $NM_ajax_opcao = '';
   var $grid;
   var $det;
   var $Res;
   var $Graf;
   var $pesq;
   var $pdf;
   var $xls;
   var $xml;
   var $json;
   var $csv;
   var $rtf;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
      $this->$modulo->arr_buttons = $this->arr_buttons;
   }
//
//----- 
   function controle($linhas = 0)
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $nmgp_parms_pdf, $nmgp_graf_pdf, $nm_apl_dependente, $nmgp_navegator_print, $nmgp_tipo_print, $nmgp_cor_print, $nmgp_cor_word, $Det_use_pass_pdf, $Det_pdf_zip, $NMSC_conf_apl, $NM_contr_var_session, $NM_run_iframe, $SC_module_export, $nmgp_password,
             $glo_senha_protect, $nmgp_opcao, $nm_call_php, $rec, $nmgp_quant_linhas, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_ordem;

      $Parms_form_pdf = false;
      if (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_customer_bk']))
      { 
          $GLOBALS['nmgp_parms'] = $_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_customer_bk'];
          $Parms_form_pdf = true;
      } 
      if ($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'] || $Parms_form_pdf)
      { 
          if (!empty($GLOBALS['nmgp_parms'])) 
          { 
              $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
              $todo  = explode("?@?", $todox);
              foreach ($todo as $param)
              {
                   $cadapar = explode("?#?", $param);
                   if (1 < sizeof($cadapar))
                   {
                       if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                       {
                           $cadapar[0] = substr($cadapar[0], 11);
                           $cadapar[1] = $_SESSION[$cadapar[1]];
                       }
                       if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                       }
                       elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                       }
                       nm_limpa_str_grid_customer_bk($cadapar[1]);
                       nm_protect_num_grid_customer_bk($cadapar[0], $cadapar[1]);
                       if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                       $Tmp_par   = $cadapar[0];
                       $$Tmp_par = $cadapar[1];
                       if ($Tmp_par == "nmgp_opcao")
                       {
                           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] = $cadapar[1];
                       }
                   }
              }
          } 
      } 
      if ($Parms_form_pdf)
      { 
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_pdf'] = true;
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form'] = true;
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_full'] = false;
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_pai'] = "";
      } 
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      if (!$this->Ini || isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_ibase'])) 
      { 
          $this->Ini = new grid_customer_bk_ini(); 
          $this->Ini->init();
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_ibase'] = true;
      }
      $this->Ini->Proc_print      = false;
      $this->Ini->Export_det_zip  = false;
      $this->Ini->Export_html_zip = false;
      $this->Ini->Export_img_zip  = false;
      $this->Ini->Img_export_zip  = array();
      $this->Ini->Init_apl_lig = array();
      $this->List_apl_lig = array('grid_v_ele_reporte_facturas_cliente'=>array('type'=>'cons', 'lab'=>'grid_v_ele_reporte_facturas_cliente', 'hint'=>'', 'img_on'=>'', 'img_off'=>''));
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['emb_lig_aba'] = array();
      $this->Change_Menu = false;
      if ($nmgp_opcao != "ajax_navigate" && $nmgp_opcao != "ajax_detalhe" && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['sc_outra_jan'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['sc_modal']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['grid_customer_bk']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['grid_customer_bk'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          foreach ($this->List_apl_lig as $apl_name => $Lig_parms)
          {
              if (!isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name]))
              {
                  $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name] = rand(2, 10000);
              }
              $this->Ini->Init_apl_lig[$apl_name]['ini']     = "&script_case_init=" . $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name];
              $this->Ini->Init_apl_lig[$apl_name]['type']    = $Lig_parms['type'];
              $this->Ini->Init_apl_lig[$apl_name]['lab']     = $Lig_parms['lab'];
              $this->Ini->Init_apl_lig[$apl_name]['hint']    = $Lig_parms['hint'];
              $this->Ini->Init_apl_lig[$apl_name]['img_on']  = $Lig_parms['img_on'];
              $this->Ini->Init_apl_lig[$apl_name]['img_off'] = $Lig_parms['img_off'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['emb_lig_aba'] = $this->Ini->Init_apl_lig;
          }
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'] && $this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_customer_bk']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_customer_bk']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('grid_customer_bk') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_customer_bk']['label'] = "" . $this->Ini->Nm_lang['lang_othr_grid_title'] . " customer";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "grid_customer_bk")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
      {
          $this->Change_Menu = false;
      }
      $this->Db = $this->Ini->Db; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['nm_tpbanco'] = $this->Ini->nm_tpbanco;
      $this->nm_data = new nm_data("es");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
      { 
          include_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_erro.class.php"); 
      } 
      else 
      { 
          include_once($this->Ini->path_aplicacao . "grid_customer_bk_erro.class.php"); 
      } 
      $this->Erro      = new grid_customer_bk_erro();
      $this->Erro->Ini = $this->Ini;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_lookup.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "grid_customer_bk_lookup.class.php"); 
      } 
      $this->Lookup       = new grid_customer_bk_lookup();
      $this->Lookup->Db   = $this->Db;
      $this->Lookup->Ini  = $this->Ini;
      $this->Lookup->Erro = $this->Erro;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
      {
          $this->Ini->sc_Include($this->Ini->path_libs . "/nm_trata_saida.php", "C", "nm_trata_saida") ; 
          $nm_saida = new nm_trata_saida();
          $ajax_opc_print = false;
          if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_export")
          {
              $this->Ini->sc_export_ajax = true;
              $this->Ini->Arr_result     = array();
              $nmgp_opcao                = $_POST['export_opc'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = $nmgp_opcao;
              if ($nmgp_opcao == "print" || $nmgp_opcao == "res_print" || $nmgp_opcao == "det_print")
              {
                  $ajax_opc_print   = true;
                  $nm_arquivo_print = "/sc_grid_customer_bk_" . session_id();
                  $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_print . ".html");
                  $this->Ini->sc_export_ajax_img = true;
              }
              ob_start();
          }
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
      {
          $_SESSION['scriptcase']['saida_var'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['ajax_nav'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['scroll_navigate'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['scroll_navigate_reload'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['scroll_navigate_app'] = false;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['scroll_navigate_header_row']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['scroll_navigate_header_row'] = 1;
          }
          if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_navigate" || $_POST['nmgp_opcao'] == "ajax_detalhe"))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['ajax_nav'] = true;
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $this->Ini->Arr_result = array();
              $nmgp_opcao = $_POST['opc'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = $nmgp_opcao;
              if (isset($_POST['parm']) && $_POST['parm'] == "save_grid")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['save_grid'] = true;
              }
              if ($nmgp_opcao == "edit" && isset($_POST['parm']) && $_POST['parm'] == "fim")
              {
                  $rec = $_POST['parm'];
              }
              if ($nmgp_opcao == "rec" || $nmgp_opcao == "muda_rec_linhas")
              {
                  $rec = $_POST['parm'];
              }
              if ($nmgp_opcao == "muda_qt_linhas")
              {
                  $nmgp_quant_linhas  = strtolower($_POST['parm']);
              }
              if (($_POST['opc'] == "igual" || $_POST['opc'] == "resumo") && isset($_POST['parm']) && ($_POST['parm'] == "reload" || $_POST['parm'] == "breload"))
              {
                  $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['contr_total_geral'] = "NAO";
                  $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['contr_array_resumo'] = "NAO";
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['tot_geral']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['arr_total']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['pivot_group_by']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['pivot_x_axys']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['pivot_y_axys']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['pivot_fill']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['pivot_order']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['pivot_order_col']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['pivot_order_level']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['pivot_order_sort']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['pivot_tabular']);
              }
              if ($nmgp_opcao == "fast_search")
              {
                  $_POST['parm'] = str_replace("__NM_PLUS__", "+", $_POST['parm']);
                  $_POST['parm'] = str_replace("__NM_AMP__", "&", $_POST['parm']);
                  $_POST['parm'] = str_replace("__NM_PRC__", "%", $_POST['parm']);
                  $temp = explode("_SCQS_", $_POST['parm']);
                  $nmgp_fast_search      = (isset($temp[0])) ? $temp[0] : "";
                  $nmgp_cond_fast_search = (isset($temp[1])) ? $temp[1] : "";
                  $nmgp_arg_fast_search  = (isset($temp[2])) ? $temp[2] : "";
              }
              if ($nmgp_opcao == "ordem")
              {
                  $nmgp_ordem = $_POST['parm'];
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Gb_date_format'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Gb_date_format'] = array();
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_All_Groupby'] = array('sc_free_total' => 'grid');
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Groupby_hide'])) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Groupby_hide'] = array();
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Ind_Groupby'])) 
      { 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_All_Groupby'] as $Ind => $Tp)
          {
              if (!in_array($Ind, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Groupby_hide'])) 
              { 
                  break;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Ind_Groupby'] = $Ind;
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['Labels_GB'] = array();
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Ind_Groupby'] == "sc_free_total")
      {
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb'] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['all']['SC_Ind_Groupby'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['all']['SC_Gb_Free_cmp'] = array();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Ind_Groupby']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['all']['SC_Ind_Groupby'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Ind_Groupby'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Gb_Free_cmp']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['all']['SC_Gb_Free_cmp'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Gb_Free_cmp'];
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['res']['summarizing_fields_display'] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['res']['summarizing_fields_order']   = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['res']['summarizing_fields_control'] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['res']['pivot_x_axys']               = array();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['summarizing_fields_display']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['res']['summarizing_fields_display'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['summarizing_fields_display'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['summarizing_fields_order']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['res']['summarizing_fields_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['summarizing_fields_order'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['summarizing_fields_control']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['res']['summarizing_fields_control'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['summarizing_fields_control'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pivot_x_axys']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dados_orig_gb']['res']['pivot_x_axys'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pivot_x_axys'];
          }
      }
      $this->Ini->Apl_resumo  = "grid_customer_bk_resumo_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Ind_Groupby'] . ".class.php"; 
      $this->Ini->Apl_grafico = "grid_customer_bk_grafico_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Ind_Groupby'] . ".class.php"; 
      $_SESSION['sc_session']['path_third'] = $this->Ini->path_prod . "/third";
      $_SESSION['sc_session']['real_path_third'] = $this->Ini->path_third;
      $_SESSION['sc_session']['path_prod']  = $this->Ini->path_prod . "/third";
      $_SESSION['sc_session']['path_img']   = $this->Ini->path_img_global;
      $_SESSION['sc_session']['path_libs']  = $this->Ini->path_libs;
      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['xls_return']  = ($nmgp_opcao == "xls")  ? "volta_grid" : "resumo"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['csv_return']  = ($nmgp_opcao == "csv")  ? "volta_grid" : "resumo"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['xml_return']  = ($nmgp_opcao == "xml")  ? "volta_grid" : "resumo"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['json_return'] = ($nmgp_opcao == "json") ? "volta_grid" : "resumo"; 
      $this->Ini->SC_module_export = (isset($SC_module_export) && !empty($SC_module_export)) ? $SC_module_export : "grid,resume,chart"; 
      if (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'pdf')
      { 
          $this->Ini->SC_module_export = "grid,resume";
      }
      elseif (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'print')
      { 
          $this->Ini->SC_module_export = "grid,resume";
      }
      elseif (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'pdf_res')
      { 
          $this->Ini->SC_module_export = "grid,resume,chart";
      }
      elseif (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'res_print')
      { 
          $this->Ini->SC_module_export = "grid,resume,chart";
      }
      if (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'xls')
      { 
          $this->Ini->SC_module_export = "grid,resume";
      }
      elseif (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'xls_res')
      { 
          $this->Ini->SC_module_export = "grid,resume";
      }
      if ($nmgp_opcao == 'print' || $nmgp_opcao == 'res_print') {
          $this->Ini->Proc_print = true;
          if (!empty($nmgp_password)) {
              $this->Ini->Export_html_zip = true;
          }
          $_SESSION['scriptcase']['proc_mobile'] = false;
          if ($nmgp_opcao == 'print') {
              $this->ret_print = "volta_grid";
          }
          else {
              $this->ret_print = "resumo";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['print_return'] = $this->ret_print;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
      {
          if ($this->Ini->Export_html_zip)
          {
              $this->Ini->Export_img_zip = true;
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['html_name']))
              {
                  $nm_arquivo_html = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['html_name'];
              }
              elseif ($nmgp_opcao == 'print' && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)
              {
                  $nm_arquivo_html = "/sc_grid_customer_bk_" . session_id() . ".html";
              }
              else
              {
                  $nm_arquivo_html = "/sc_grid_customer_bk_res_" . session_id() . ".html";
              }
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html);
          }
      }
      if ($nmgp_opcao == "doc_word") {  
          $this->ret_word = "volta_grid";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_return'] = $this->ret_word;
          $_SESSION['scriptcase']['proc_mobile'] = false;
      }
      if ($nmgp_opcao == "doc_word_res") {  
          $this->ret_word = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_return'] = $this->ret_word;
          $_SESSION['scriptcase']['proc_mobile'] = false;
      }
      if ($nmgp_opcao == "doc_word_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "doc_word"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "doc_word"; 
      }
      elseif ($nmgp_opcao == "doc_word" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "doc_word_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "doc_word_res"; 
      }
      if ($nmgp_opcao == "xls_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "xls"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "xls"; 
      }
      elseif ($nmgp_opcao == "xls" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "xls_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "xls_res"; 
      }
      if ($nmgp_opcao == "csv_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "csv"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "csv"; 
      }
      elseif ($nmgp_opcao == "csv" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "csv_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "csv_res"; 
      }
      if ($nmgp_opcao == "xml_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "xml"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "xml"; 
      }
      elseif ($nmgp_opcao == "xml" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "xml_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "xml_res"; 
      }
      if ($nmgp_opcao == "json_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "json"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "json"; 
      }
      elseif ($nmgp_opcao == "json" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "json_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "json_res"; 
      }
      $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['skip_charts'] = (strpos(" " . $this->Ini->SC_module_export, "chart") !== false) ? false : true;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_det'] = false;
      if ($nmgp_opcao == 'pdf_det')
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_det'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = 'pdf';
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opc_pdf']['pdf_zip'] = (isset($Det_pdf_zip) && !empty($Det_pdf_zip)) ? $Det_pdf_zip : "N";
          if ($Det_use_pass_pdf != "__APL__")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['use_pass_pdf'] = $Det_use_pass_pdf;
          } 
          $nmgp_opcao = 'pdf';
      }
      if ($nmgp_opcao == 'pdf')
      { 
          if (strpos(" " . $this->Ini->SC_module_export, "grid") === false && (strpos(" " . $this->Ini->SC_module_export, "resume") !== false || strpos(" " . $this->Ini->SC_module_export, "chart") !== false))
          { 
              $nmgp_opcao = 'pdf_res';
          } 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_res'] = false;
      if ($nmgp_opcao == 'pdf_res')
      {
          if (strpos(" " . $this->Ini->SC_module_export, "grid") !== false)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = 'pdf';
              $nmgp_opcao = 'pdf';
          }
          else
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_res'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = 'pdf';
              $nmgp_opcao = 'pdf';
              $rRFP = fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp', "w");
              fwrite($rRFP, "PDF\n");
              fwrite($rRFP, "\n");
              fwrite($rRFP, "\n");
              fwrite($rRFP, "100\n");
              $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
              if (!NM_is_utf8($lang_protect))
              {
                  $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              fwrite($rRFP, 90 . "_#NM#_" . $lang_protect . "...\n");
              fclose($rRFP);
          }
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['conf_chart_level'] = "S";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida']      = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_grid']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_grid'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_init']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_init'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_label']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_label'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['cab_embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['cab_embutida'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_pdf']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_pdf'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_treeview']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida_treeview'] = false;
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['proc_pdf'] = (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'] && ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "pdf_res")) ? true : false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['proc_pdf']) {
          $_SESSION['scriptcase']['proc_mobile'] = false;
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['proc_pdf_vert'] = false;
      include("../_lib/css/" . $this->Ini->str_schema_all . "_grid.php");
      $this->Ini->Tree_img_col    = trim($str_tree_col);
      $this->Ini->Tree_img_exp    = trim($str_tree_exp);
      $this->Ini->scGridRefinedSearchExpandFAIcon    = trim($scGridRefinedSearchExpandFAIcon);
      $this->Ini->scGridRefinedSearchCollapseFAIcon    = trim($scGridRefinedSearchCollapseFAIcon);
      $this->Ini->str_chart_theme = (isset($str_chart_theme)?$str_chart_theme:'');
      $this->Ini->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Ini->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_expt_email_title'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_expt_email'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__envelope.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      $this->arr_buttons['group_group_1']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__export.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_expt_email_title'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_expt_email'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__envelope.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      $this->arr_buttons['group_group_1']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__export.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
      { 
      $this->Ini->Color_bg_ajax            = (!isset($str_ajax_bg)       || "" == trim($str_ajax_bg))         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax            = (!isset($str_ajax_border_c) || "" == trim($str_ajax_border_c))   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax            = (!isset($str_ajax_border_s) || "" == trim($str_ajax_border_s))   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax            = (!isset($str_ajax_border_w) || "" == trim($str_ajax_border_w))   ? ""     : $str_ajax_border_w;
      $this->Ini->Img_sep_grid             = "/" . trim($str_toolbar_separator);
      $this->Ini->grid_table_width         = (!isset($str_grid_table_width) || "" == trim($str_grid_table_width)) ? "" : $str_grid_table_width;
      $this->Ini->Label_sort_pos           = trim($str_label_sort_pos);
      $this->Ini->Label_sort               = trim($str_label_sort);
      $this->Ini->Label_sort_asc           = trim($str_label_sort_asc);
      $this->Ini->Label_sort_desc          = trim($str_label_sort_desc);
      $this->Ini->Label_summary_sort_pos   = trim($str_resume_label_sort_pos);
      $this->Ini->Label_summary_sort       = trim($str_resume_label_sort);
      $this->Ini->Label_summary_sort_asc   = trim($str_resume_label_sort_asc);
      $this->Ini->Label_summary_sort_desc  = trim($str_resume_label_sort_desc);
      $this->Ini->Sum_ico_line             = trim($sum_ico_line);
      $this->Ini->Sum_ico_column           = trim($sum_ico_column);
      $this->Ini->ajax_div_icon            = trim($ajax_div_icon);
      $this->Ini->Str_toolbarnav_separator = '/' . trim($str_toolbarnav_separator);
      $this->Ini->Img_qs_search            = '' != trim($img_qs_search)        ? trim($img_qs_search)        : 'scriptcase__NM__qs_lupa.png';
      $this->Ini->Img_qs_clean             = '' != trim($img_qs_clean)         ? trim($img_qs_clean)         : 'scriptcase__NM__qs_close.png';
      $this->Ini->Str_qs_image_padding     = '' != trim($str_qs_image_padding) ? trim($str_qs_image_padding) : '0';
      $this->Ini->App_div_tree_img_col     = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp     = trim($app_div_str_tree_exp);
      $this->Ini->refinedsearch_hide           = trim($refinedsearch_hide);
      $this->Ini->refinedsearch_show          = trim($refinedsearch_show);
      $this->Ini->refinedsearch_close          = trim($refinedsearch_close);
      $this->Ini->refinedsearch_values_separator          = trim($refinedsearch_values_separator);
      $this->Ini->refinedsearch_campo_close_icon          = trim($refinedsearch_campo_close_icon);
          $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput") ; 
          $_SESSION['scriptcase']['css_popup']                 = $this->Ini->str_schema_all . "_grid.css";
          $_SESSION['scriptcase']['css_popup_dir']             = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
          $_SESSION['scriptcase']['css_btn_popup']             = $this->Ini->Str_btn_css;
          $_SESSION['scriptcase']['str_google_fonts']          = $this->Ini->str_google_fonts;
          $_SESSION['scriptcase']['css_popup_tab']             = $this->Ini->str_schema_all . "_tab.css";
          $_SESSION['scriptcase']['css_popup_tab_dir']         = $this->Ini->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
          $_SESSION['scriptcase']['css_popup_div']             = $this->Ini->str_schema_all . "_appdiv.css";
          $_SESSION['scriptcase']['css_popup_div_dir']         = $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
          $_SESSION['scriptcase']['bg_btn_popup']['bok']       = nmButtonOutput($this->arr_buttons, "bok_appdiv", "processa();", "processa();", "bok", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['bsair']     = nmButtonOutput($this->arr_buttons, "bsair_appdiv", "window.close()", "window.close()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['btbremove'] = nmButtonOutput($this->arr_buttons, "bsair_appdiv", "self.parent.tb_remove()", "self.parent.tb_remove()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "idcustomer";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "nombre";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "correo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "celular";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "direccion";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "tipodoc";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "fechault";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "ult_fecha";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "numvisitas";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "totalventa";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'][] = "idinterno";
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['usr_cmp_sel']))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['usr_cmp_sel'] = array();
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['usr_cmp_sel']['idinterno'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['usr_cmp_sel_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['usr_cmp_sel'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_customer_bk']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_customer_bk']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['grid_customer_bk']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_page_process'] = $this->Ini->sc_page;
      } 
      $_SESSION['scriptcase']['sc_idioma_pivot']['es'] = array(
          'smry_ppup_titl'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_titl'],
          'smry_ppup_fild'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_fild'],
          'smry_ppup_posi'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi'],
          'smry_ppup_sort'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort'],
          'smry_ppup_posi_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_labl'],
          'smry_ppup_posi_data' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_data'],
          'smry_ppup_sort_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_labl'],
          'smry_ppup_sort_vlue' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_vlue'],
          'smry_ppup_chek_tabu' => $this->Ini->Nm_lang['lang_othr_smry_ppup_chek_tabu'],
      );
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'])
      { 
          $this->pdf_zip = (isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opc_pdf']['pdf_zip'])) ? $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opc_pdf']['pdf_zip'] : "N";
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['use_pass_pdf'] = "";
          $_SESSION['scriptcase']['sc_tp_pdf'] = "wkhtmltopdf";
          $_SESSION['scriptcase']['sc_idioma_pdf'] = array();
          $_SESSION['scriptcase']['sc_idioma_pdf']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_pdff_titl'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'tp_imp' => $this->Ini->Nm_lang['lang_pdff_type'], 'color' => $this->Ini->Nm_lang['lang_pdff_colr'], 'econm' => $this->Ini->Nm_lang['lang_pdff_bndw'], 'tp_pap' => $this->Ini->Nm_lang['lang_pdff_pper'], 'carta' => $this->Ini->Nm_lang['lang_pdff_letr'], 'oficio' => $this->Ini->Nm_lang['lang_pdff_legl'], 'customiz' => $this->Ini->Nm_lang['lang_pdff_cstm'], 'alt_papel' => $this->Ini->Nm_lang['lang_pdff_pper_hgth'], 'larg_papel' => $this->Ini->Nm_lang['lang_pdff_pper_wdth'], 'orient' => $this->Ini->Nm_lang['lang_pdff_pper_orie'], 'retrato' => $this->Ini->Nm_lang['lang_pdff_prtr'], 'paisag' => $this->Ini->Nm_lang['lang_pdff_lnds'], 'book' => $this->Ini->Nm_lang['lang_pdff_bkmk'], 'grafico' => $this->Ini->Nm_lang['lang_pdff_chrt'], 'largura' => $this->Ini->Nm_lang['lang_pdff_wdth'], 'fonte' => $this->Ini->Nm_lang['lang_pdff_font'], 'create' => $this->Ini->Nm_lang['lang_pdff_create'], 'sim' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'nao' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'chart_level' => $this->Ini->Nm_lang['lang_chart_level_groupby'], 'chart_level' => $this->Ini->Nm_lang['lang_chart_level_groupby'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'group_chart' => $this->Ini->Nm_lang['lang_pdff_group_chart'], 'pdf_res' => $this->Ini->Nm_lang['lang_app_xls_summry'], 'pdf_cons' => $this->Ini->Nm_lang['lang_app_xls_grid'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd'], 'page_break' => $this->Ini->Nm_lang['lang_groupby_break_page_pdf'], 'other_options' => $this->Ini->Nm_lang['lang_app_other_options'], 'label_group' => $this->Ini->Nm_lang['lang_pdf_below_groupby'], 'page_label' => $this->Ini->Nm_lang['lang_pdf_all_pages_title'], 'page_header' => $this->Ini->Nm_lang['lang_pdf_all_pages_header'], 'format_zip' => $this->Ini->Nm_lang['lang_export_pdf_zip'], 'cancela' => $this->Ini->Nm_lang['lang_pdff_cncl']);
      } 
      $_SESSION['scriptcase']['sc_idioma_graf_flash'] = array();
      $_SESSION['scriptcase']['sc_idioma_graf_flash']['es'] = array(
          'titulo' => $this->Ini->Nm_lang['lang_chrt_titl'],
          'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'],
          'tipo_g' => $this->Ini->Nm_lang['lang_chrt_type'],
          'tp_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars'],
          'tp_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie'],
          'tp_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line'],
          'tp_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area'],
          'tp_marcador' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks'],
          'tp_gauge' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug'],
          'tp_radar' => $this->Ini->Nm_lang['lang_flsh_chrt_radr'],
          'tp_polar' => $this->Ini->Nm_lang['lang_flsh_chrt_polr'],
          'tp_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_funl'],
          'tp_pyramid' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm'],
          'largura' => $this->Ini->Nm_lang['lang_chrt_wdth'],
          'altura' => $this->Ini->Nm_lang['lang_chrt_hgth'],
          'modo_gera' => $this->Ini->Nm_lang['lang_chrt_gtmd'],
          'sintetico' => $this->Ini->Nm_lang['lang_chrt_smzd'],
          'analitico' => $this->Ini->Nm_lang['lang_chrt_anlt'],
          'order' => $this->Ini->Nm_lang['lang_chrt_ordr'],
          'order_none' => $this->Ini->Nm_lang['lang_chrt_ordr_none'],
          'order_asc' => $this->Ini->Nm_lang['lang_chrt_ordr_asc'],
          'order_desc' => $this->Ini->Nm_lang['lang_chrt_ordr_desc'],
          'barra_orien' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_layo'],
          'barra_orien_horiz' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_horz'],
          'barra_orien_verti' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_vrtc'],
          'barra_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_shpe'],
          'barra_forma_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_bars'],
          'barra_forma_cilin' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cyld'],
          'barra_forma_cone' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cone'],
          'barra_forma_piram' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_pyrm'],
          'barra_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_dmns'],
          'barra_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_2ddm'],
          'barra_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ddm'],
          'barra_sobre' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ovr'],
          'barra_sobre_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_sobre_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'barra_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stck'],
          'barra_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stan'],
          'barra_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stay'],
          'barra_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stap'],
          'barra_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invr'],
          'barra_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invn'],
          'barra_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invi'],
          'barra_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srgr'],
          'barra_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srst'],
          'barra_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srbs'],
          'barra_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_funl'],
          'barra_funil_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_funil_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'pizza_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_shpe'],
          'pizza_forma_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fpie'],
          'pizza_forma_donut' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dnts'],
          'pizza_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dmns'],
          'pizza_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_2ddm'],
          'pizza_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_3ddm'],
          'pizza_orden' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_srtn'],
          'pizza_orden_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_nsrt'],
          'pizza_orden_ascen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_asrt'],
          'pizza_orden_desce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dsrt'],
          'pizza_explo' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_expl'],
          'pizza_explo_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dxpl'],
          'pizza_explo_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_axpl'],
          'pizza_explo_click' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_cxpl'],
          'pizza_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fval'],
          'pizza_valor_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlv'],
          'pizza_valor_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlp'],
          'linha_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_shpe'],
          'linha_forma_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line_line'],
          'linha_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_line_spln'],
          'linha_forma_degra' => $this->Ini->Nm_lang['lang_flsh_chrt_line_step'],
          'linha_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invr'],
          'linha_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invn'],
          'linha_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invi'],
          'linha_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srgr'],
          'linha_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srst'],
          'linha_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srbs'],
          'area_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_shpe'],
          'area_forma_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area_area'],
          'area_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_area_spln'],
          'area_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stak'],
          'area_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stan'],
          'area_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stay'],
          'area_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stap'],
          'area_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invr'],
          'area_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invn'],
          'area_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invi'],
          'area_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srgr'],
          'area_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srst'],
          'area_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srbs'],
          'marca_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invr'],
          'marca_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invn'],
          'marca_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invi'],
          'marca_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srgr'],
          'marca_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srst'],
          'marca_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srbs'],
          'gauge_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_shpe'],
          'gauge_forma_circular' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_circ'],
          'gauge_forma_semi' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_semi'],
          'pyram_slice' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_slic'],
          'pyram_slice_s' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcs'],
          'pyram_slice_n' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcn'],
      );
      if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_prt'] = array();
          $_SESSION['scriptcase']['sc_idioma_prt']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'modoimp' => $this->Ini->Nm_lang['lang_btns_mode_prnt_hint'], 'curr' => $this->Ini->Nm_lang['lang_othr_curr_page'], 'total' => $this->Ini->Nm_lang['lang_othr_full'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'pdf_res' => $this->Ini->Nm_lang['lang_app_xls_summry'], 'pdf_cons' => $this->Ini->Nm_lang['lang_app_xls_grid'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_word'] = array();
          $_SESSION['scriptcase']['sc_idioma_word']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_export_title'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_csv'] = array();
          $_SESSION['scriptcase']['sc_idioma_csv']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_app_csv_title'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'delim_line' => $this->Ini->Nm_lang['lang_app_csv_lin_separator'], 'delim_col' => $this->Ini->Nm_lang['lang_app_csv_col_separator'], 'delim_dados' => $this->Ini->Nm_lang['lang_app_csv_txt_separator'], 'label_csv' => $this->Ini->Nm_lang['lang_app_csv_grid_label'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_xml'] = array();
          $_SESSION['scriptcase']['sc_idioma_xml']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_export_title'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'xml_label' => $this->Ini->Nm_lang['lang_inherit_label'], 'xml_yes' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'xml_no' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'xml_format' => $this->Ini->Nm_lang['lang_xml_tag_attr'], 'xml_attr' => $this->Ini->Nm_lang['lang_xml_formt_attr'], 'xml_tag' => $this->Ini->Nm_lang['lang_xml_formt_tag'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_json'] = array();
          $_SESSION['scriptcase']['sc_idioma_json']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_export_title'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'json_label' => $this->Ini->Nm_lang['lang_inherit_label'], 'json_yes' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'json_no' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'json_format' => $this->Ini->Nm_lang['lang_format_value'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_xls'] = array();
          $_SESSION['scriptcase']['sc_idioma_xls']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_app_xls_title'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'tp_xls' => $this->Ini->Nm_lang['lang_app_xls_ext'], 'tot_xls' => $this->Ini->Nm_lang['lang_othr_export_excel_total'], 'xls_res' => $this->Ini->Nm_lang['lang_app_xls_summry'], 'xls_cons' => $this->Ini->Nm_lang['lang_app_xls_grid'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      $this->Ini->Gd_missing  = true;
      if (function_exists("getProdVersion"))
      {
          $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
      }
      if (function_exists("gd_info"))
      {
          $this->Ini->Gd_missing = false;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_Ind_Groupby'] == "sc_free_total") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['ordem_select']['nombre'] = 'asc'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['ordem_select']; 
          } 
      }
      if ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_orig'])) && !isset($_POST['reload_comb_chart']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "busca";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_customer_bk']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_customer_bk']['start'] == 'filter')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "grid")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "busca";
          }   
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] != "detalhe" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"])))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opc_liga'] = array();  
          if (isset($NMSC_conf_apl) && !empty($NMSC_conf_apl))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opc_liga'] = $NMSC_conf_apl;  
          }   
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opc_liga']['inicial']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opc_liga']['inicial'];
          }
      }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opc_liga']['paginacao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opc_liga']['paginacao']))
          { 
              $this->Ini->Apl_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opc_liga']['paginacao'];
          } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "busca")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "grid" ;  
      }   
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao_print']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao_print']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao_print'] = "inicio" ;  
      }   
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['print_all'] = false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "print")  
      { 
          if (strpos(" " . $this->Ini->SC_module_export, "grid") === false)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "res_print";
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "res_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao']     = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['print_all'] = true;
          if (strpos(" " . $this->Ini->SC_module_export, "grid") !== false)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "print";
              $nmgp_tipo_print = "RC";
          }
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['det_print'] = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "det_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao']     = "detalhe";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['det_print'] = "print";
          if (!empty($nmgp_password)) {
              $this->Ini->Export_det_zip = true;
          }
          if ($this->Ini->Export_det_zip)
          {
              $this->Ini->Export_img_zip = true;
              $nm_arquivo_html = "/sc_grid_customer_bk_det_" . session_id() . ".html";
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html);
          }
      } 
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'], 0, 7) == "grafico")  
      { 
          $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "pdf")
      { 
          $this->Ini->path_img_modelo = $this->Ini->path_img_modelo;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "fast_search")  
      { 
          $this->SC_fast_search($GLOBALS["nmgp_fast_search"], $GLOBALS["nmgp_cond_fast_search"], $GLOBALS["nmgp_arg_fast_search"]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq'])
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = 'igual';
          } 
          else 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['contr_array_resumo'] = "NAO";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['contr_total_geral']  = "NAO";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tot_geral']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = 'pesq';
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['orig_pesq'] = 'grid';
          } 
      } 
      $this->Ini->grid_search_change_fil = false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "grid_search" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "grid_search_res")
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "grid_search")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['orig_pesq'] = 'grid';
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "grid_search_res")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['orig_pesq'] = 'res';
          } 
          $this->SC_proc_grid_search($_POST['parm']);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['contr_array_resumo'] = "NAO";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['contr_total_geral']  = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tot_geral']);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = 'pesq';
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "grid_search_change_fil" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "grid_search_change_fil_res")
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "grid_search_change_fil")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['orig_pesq'] = 'grid';
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "grid_search_change_fil_res")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['orig_pesq'] = 'res';
          } 
          if (!$_SESSION['scriptcase']['proc_mobile']) 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_pesq.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_mobile_pesq.class.php"); 
          } 
          $this->pesq  = new grid_customer_bk_pesq();
          $this->prep_modulos("pesq");
          $this->pesq->NM_ajax_grid_fil = $_POST['parm'];
          $this->pesq->NM_ajax_flag     = true;
          $this->pesq->NM_ajax_opcao    = "ajax_grid_search_change_fil";
          $staus_fil = $this->pesq->monta_busca();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['contr_array_resumo'] = "NAO";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['contr_total_geral']  = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tot_geral']);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = 'pesq';
          $this->Ini->grid_search_change_fil = true;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == 'pesq' && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['orig_pesq']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['orig_pesq']))  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['orig_pesq'] == "res")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = 'resumo';
          } 
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['orig_pesq'] == "grid") 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = 'inicio';
          } 
      } 
//
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['prim_cons'] = false;  
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] != "detalhe" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"])))  
      { 
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['use_pass_pdf']);
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['prim_cons'] = true;  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_orig'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['cond_pesq']         = ""; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_filtro'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_grid']   = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_lookup'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca']      = array();
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['grid_pesq']         = array();
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['Grid_search']       = array();
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_fast']   = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['contr_total_geral'] = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['sc_total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tot_geral']);
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['contr_array_resumo'] = "NAO";
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_ant'];  
      $nm_flag_pdf   = true;
      $nm_vendo_pdf  = ("pdf" == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['graf_pdf'] = "S";
      if (isset($nmgp_graf_pdf) && !empty($nmgp_graf_pdf))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['graf_pdf'] = $nmgp_graf_pdf;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
      {
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            $nm_arquivo_htm_temp = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_customer_bk_html_" . session_id() . "_2.html";
            $nm_arquivo_pdf_base = "/sc_pdf_" . md5(date("Ymd") . "_" . session_id()) . "_grid_customer_bk.pdf";
            $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base;
            $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
            $nm_arquivo_de_saida = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_customer_bk_html_" . session_id() . ".html";
            $nm_url_de_saida = $this->Ini->server_pdf . $this->Ini->path_imag_temp . "/sc_grid_customer_bk_html_" . session_id() . ".html";
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida, $_SESSION['scriptcase']['charset']);
            }
            else
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida);
            }
         }
      }
//----------------------------------->
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "doc_word_res")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['print_navigator'] = "Microsoft Internet Explorer";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['print_all'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['doc_word']  = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao']     = "resumo";
          $_SESSION['scriptcase']['saida_word'] = true;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_name']))
          {
              $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_name'], ".");
              if ($Pos === false) {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_name'] .= ".doc";
              }
              $nm_arquivo_doc_word = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_name'];
          }
          else
          {
              $nm_arquivo_doc_word = "/sc_grid_customer_bk_res_" . session_id() . ".doc";
          }
          $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $this->Ini->nm_limite_lin_res_prt = 0;
          $GLOBALS['nmgp_cor_print']        = "CO";
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "xls")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_xls.class.php"); 
          } 
          $this->xls  = new grid_customer_bk_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "xls_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_res_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_res_xls.class.php"); 
          } 
          $this->xls  = new grid_customer_bk_res_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "xml")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_xml.class.php"); 
          } 
          $this->xml  = new grid_customer_bk_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "xml_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_res_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_res_xml.class.php"); 
          } 
          $this->xml  = new grid_customer_bk_res_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "json")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_json.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_json.class.php"); 
          } 
          $this->json  = new grid_customer_bk_json();
          $this->prep_modulos("json");
          $this->json->monta_json();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "csv")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_csv.class.php"); 
          } 
          $this->csv  = new grid_customer_bk_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "csv_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_res_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_res_csv.class.php"); 
          } 
          $this->csv  = new grid_customer_bk_res_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "rtf")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_rtf.class.php"); 
          } 
          $this->rtf  = new grid_customer_bk_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "rtf_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_res_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_res_rtf.class.php"); 
          } 
          $this->rtf  = new grid_customer_bk_res_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'], 0, 7) == "grafico")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . " . grid_customer_bk . /" . $this->Ini->Apl_grafico); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
          } 
          $this->Graf  = new grid_customer_bk_grafico();
          $this->prep_modulos("Graf");
          if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'], 7, 1) == "_")  
          { 
              $this->Graf->grafico_col(substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'], 8));
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "grid";
          }
          else
          { 
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dashboard_refresh_after_chart'])) {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dashboard_refresh_after_chart'];
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['dashboard_refresh_after_chart']);
              }
              else {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] = "grid";
              }
              $this->Graf->monta_grafico();
          }
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "busca")  
      { 
          if (!$_SESSION['scriptcase']['proc_mobile']) 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_pesq.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_customer_bk_mobile_pesq.class.php"); 
          } 
          $this->pesq  = new grid_customer_bk_pesq();
          $this->prep_modulos("pesq");
          $this->pesq->NM_ajax_flag    = $this->NM_ajax_flag;
          $this->pesq->NM_ajax_opcao   = $this->NM_ajax_opcao;
          $this->pesq->monta_busca();
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "resumo")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_customer_bk/" . $this->Ini->Apl_resumo); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          } 
          $this->Res = new grid_customer_bk_resumo("out");
          $this->prep_modulos("Res");
          $this->Res->monta_resumo();
      }
      else 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "print" && $nmgp_tipo_print == "RC")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['print_navigator'] = $nmgp_navegator_print;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao']     = "pdf";
              $GLOBALS['nmgp_tipo_pdf'] = strtolower($nmgp_cor_print);
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "doc_word")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['print_navigator'] = "Microsoft Internet Explorer";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['doc_word']  = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao']     = "pdf";
              $_SESSION['scriptcase']['saida_word'] = true;
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_name']))
              {
                  $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_name'], ".");
                  if ($Pos === false) {
                      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_name'] .= ".doc";
                  }
                  $nm_arquivo_doc_word =  "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_name'];
              }
              else
              {
                  $nm_arquivo_doc_word = "/sc_grid_customer_bk_" . session_id() . ".doc";
              }
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
              $this->Ini->nm_limite_lin_prt = 0;
              $GLOBALS['nmgp_tipo_pdf'] = "CO";
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] == "detalhe" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_det'])  
          { 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
              { 
                  require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_det.class.php"); 
              } 
              else 
              { 
                  require_once($this->Ini->path_aplicacao . "grid_customer_bk_det.class.php"); 
              } 
              $this->det  = new grid_customer_bk_det();
              $this->prep_modulos("det");
              $this->det->monta_det();
          } 
          else  
          { 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
              { 
                  require_once($this->Ini->path_embutida . "grid_customer_bk/grid_customer_bk_grid.class.php"); 
              } 
              else 
              { 
                  require_once($this->Ini->path_aplicacao . "grid_customer_bk_grid.class.php"); 
              } 
              $this->grid  = new grid_customer_bk_grid();
              $this->prep_modulos("grid");
              $this->grid->monta_grid($linhas);
          } 
      }   
//--- 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'])
      {
           $this->Db->Close(); 
      }
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['embutida'])
      {
         $nm_saida->finaliza();
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['ajax_nav'])
         {
             $Temp = ob_get_clean();
             if ($Temp !== false && trim($Temp) != "")
             {
                 $this->Ini->Arr_result['htmOutput'] = $Temp;
             }
             if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['opcao'] != "ajax_detalhe")  
             {
                 $this->Ini->Arr_result['setVar'][] = array('var' => 'scQtReg', 'value' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['qt_reg_grid']);
             }
             $_SESSION['scriptcase']['saida_var'] = false;
             $oJson = new Services_JSON();
             echo $oJson->encode($this->Ini->Arr_result);
             exit;
         }
            if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['export_sel_columns']['field_order']))
            {
                $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['export_sel_columns']['field_order'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['export_sel_columns']['field_order']);
            }
            if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['export_sel_columns']['usr_cmp_sel']))
            {
                $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['export_sel_columns']['usr_cmp_sel'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['export_sel_columns']['usr_cmp_sel']);
            }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['doc_word'])
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_file'] = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
             $this->html_doc_word($nm_arquivo_doc_word, $nmgp_password);
         }
         if ($this->Ini->Export_html_zip)
         {
             $this->html_export_print($nm_arquivo_html, $nmgp_password);
         }
         if ($this->Ini->Export_det_zip)
         {
             $this->det_export_print($nm_arquivo_html, $nmgp_password);
         }
         if ($ajax_opc_print)
         {
             $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_print . ".html");
             $this->Arr_result['title_export'] = NM_charset_to_utf8($nm_arquivo_print);
             $Temp = ob_get_clean();
             if ($Temp !== false && trim($Temp) != "")
             {
                 $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
             }
             $oJson = new Services_JSON();
             echo $oJson->encode($this->Arr_result);
             exit;
        }
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            if (isset($nmgp_parms_pdf) && !empty($nmgp_parms_pdf))
            {
                $str_pd4ml    = $nmgp_parms_pdf;
            }
            else
            {
                $str_pd4ml    = " --page-size Letter --orientation Portrait";
            }
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_res'])
            { 
                $str_pd4ml .= " --outline-depth 0";
            }
            if (!$this->Ini->sc_export_ajax && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
                    if (!NM_is_utf8($lang_protect))
                    {
                        $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                    }
                    grid_customer_bk_pdf_progress_call($this->grid->progress_tot . "_#NM#_" . $this->grid->progress_tot . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
                    fwrite($this->grid->progress_fp, ($this->grid->progress_tot) . "_#NM#_" . $lang_protect . "...\n");
                    fclose($this->grid->progress_fp);
                }
            }
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_name']))
            {
                $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_name'], ".");
                if ($Pos === false) {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_name'] .= ".pdf";
                }
                if ('/' == substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_name'], 0, 1)) {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_name'] = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_name'], 1);
                }
                $nm_arquivo_pdf_serv = $this->Ini->root .  $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_name'];
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_name'];
                $nm_arquivo_pdf_base = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_name'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_name']);
            }
            $arq_pdf_out  = (FALSE !== strpos($nm_arquivo_pdf_serv, ' ')) ? " \"" . $nm_arquivo_pdf_serv . "\"" :  $nm_arquivo_pdf_serv;
            $arq_pdf_in   = (FALSE !== strpos($nm_url_de_saida, ' '))     ? " \"" . $nm_url_de_saida . "\""     :  $nm_url_de_saida;
            if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
            {
                $dir_qpdf = "/qpdf/win/bin";
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
            {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    $dir_qpdf = "/qpdf/linux-i386";
                }
                else
                {
                    $dir_qpdf = "/qpdf/linux-amd64";
                }
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
            {
                $dir_qpdf = "/qpdf/osx";
            }
            if ($this->pdf_zip == "S")
            {
                $arq_pdf_final = str_replace(".pdf", ".zip", $arq_pdf_out);
            }
            elseif (is_dir($this->Ini->path_third . $dir_qpdf) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['use_pass_pdf']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['use_pass_pdf']))
            {
                $arq_pdf_final = $arq_pdf_out;
                $arq_pdf_out   = str_replace(".pdf", "_wk.pdf", $arq_pdf_out);
            }
            $Win_autentication = "";
            if (isset($_SESSION['sc_pdf_usr']) && !empty($_SESSION['sc_pdf_usr']))
            {
                $_SESSION['sc_iis_usr'] = $_SESSION['sc_pdf_usr'];
            }
            if (isset($_SESSION['sc_iis_usr']) && !empty($_SESSION['sc_iis_usr']))
            {
                $Win_autentication .= " --username " . $_SESSION['sc_iis_usr'];
            }
            if (isset($_SESSION['sc_pdf_pw']) && !empty($_SESSION['sc_pdf_pw']))
            {
                $_SESSION['sc_iis_pw'] = $_SESSION['sc_pdf_pw'];
            }
            if (isset($_SESSION['sc_iis_pw']) && !empty($_SESSION['sc_iis_pw']))
            {
                $Win_autentication .= " --password " . $_SESSION['sc_iis_pw'];
            }
            if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/win");
                $str_execcmd2 = 'wkhtmltopdf ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]"';
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
            {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    if (FALSE !== strpos(php_uname(), 'Debian 4.19')) 
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/buster");
                    }
                    elseif (FALSE !== strpos(php_uname(), 'Debian 4.9')) 
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/stretch");
                    }
                    else
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/linux-i386");
                    }
                    $str_execcmd2 = './wkhtmltopdf-i386 ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]"';
                }
                else
                {
                    if (FALSE !== strpos(php_uname(), 'Debian 4.19')) 
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/buster");
                    }
                    elseif (FALSE !== strpos(php_uname(), 'Debian 4.9')) 
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/stretch");
                    }
                    elseif (FALSE !== strpos(strtolower(php_uname()), '.el8.') || FALSE !== strpos(strtolower(php_uname()), '.el8_5.')) 
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/centos8");
                    }
                    else
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/linux-amd64");
                    }
                    $str_execcmd2 = './wkhtmltopdf-amd64 ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]"';
                }
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/osx/Contents/MacOS");
                $str_execcmd2 = './wkhtmltopdf ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]"';
            }

            if (!isset($_SESSION['scriptcase']['phantomjs_charts']) || !$_SESSION['scriptcase']['phantomjs_charts'])
            {
                $str_execcmd2 .= ' --javascript-delay ' . 2000;
            }

            $str_execcmd2 .= ' ' . $arq_pdf_in . ' ' . $arq_pdf_out;

            $arr_execcmd = array();
            $str_execcmd = $str_execcmd2;
            exec($str_execcmd2);
            $str_cmd_qpdf = "";
            $str_zip      = "";
            if ($this->pdf_zip == "S")
            {
                $pdf_pass = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['use_pass_pdf'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['use_pass_pdf'] : "";
                $opt_pass = (!empty($pdf_pass)) ? " -p" : "";
                if (is_file($arq_pdf_final)) {
                    unlink($arq_pdf_final);
                }
                if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                {
                    chdir($this->Ini->path_third . "/zip/windows");
                    $str_zip = "zip.exe" . strtoupper($opt_pass) . " -j " . $pdf_pass . " " . $arq_pdf_final . " " . $arq_pdf_out;
                }
                elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                {
                      if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                      {
                          chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                      }
                      else
                      {
                          chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                      }
                      $str_zip = "./7za" . $opt_pass . $pdf_pass . " a " . $arq_pdf_final . " " . $arq_pdf_out;
                }
                elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                {
                    chdir($this->Ini->path_third . "/zip/mac/bin");
                    $str_zip = "./7za" . $opt_pass . $pdf_pass . " a " . $arq_pdf_final . " " . $arq_pdf_out;
                }
                if (!empty($str_zip)) {
                    exec($str_zip);
                }
                if (is_file($arq_pdf_final)) 
                {
                    unlink($arq_pdf_out);
                }
            }
            elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['use_pass_pdf']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['use_pass_pdf']))
            {
                if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                {
                    $dir_qpdf = "/qpdf/win/bin";
                    $str_cmd_qpdf = "qpdf.exe ";
                }
                elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                {
                    if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                    {
                        $dir_qpdf = "/qpdf/linux-i386";
                        $str_cmd_qpdf = "./qpdf-linux-x86 ";
                    }
                    else
                    {
                        $dir_qpdf = "/qpdf/linux-amd64";
                        $str_cmd_qpdf = "./qpdf-linux-amd64 ";
                    }
                }
                elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                {
                    $dir_qpdf = "/qpdf/osx";
                    $str_cmd_qpdf = "./qpdf-darwin-x86 ";
                }
                if (is_dir($this->Ini->path_third . $dir_qpdf)) 
                {
                    chdir($this->Ini->path_third . $dir_qpdf);
                    $pdf_pass  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['use_pass_pdf'];
                    $str_cmd_qpdf .= "--encrypt " . $pdf_pass . " " . $pdf_pass . " 256 -- " . $arq_pdf_out . " " . $arq_pdf_final;
                    exec($str_cmd_qpdf);
                    if (is_file($arq_pdf_final)) 
                    {
                        unlink($arq_pdf_out);
                    }
                }
            }
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['contr_array_resumo'] = '';
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['contr_total_geral']  = '';
            // ----- PDF log
            $fp = @fopen($this->Ini->root . $this->Ini->path_imag_temp . str_replace(array(".pdf",".zip"), array("",""), $nm_arquivo_pdf_base) . '.log', 'w');
            if ($fp)
            {
                @fwrite($fp, $str_execcmd . "\r\n\r\n");
                @fwrite($fp, implode("\r\n", $arr_execcmd));
                @fwrite($fp, $str_cmd_qpdf . "\r\n\r\n");
                @fwrite($fp, $str_zip . "\r\n\r\n");
                @fclose($fp);
            }
            if ($this->Ini->sc_export_ajax)
            {
                $this->Arr_result['file_export']  = NM_charset_to_utf8($nm_arquivo_pdf_serv);
                $this->Arr_result['title_export'] = NM_charset_to_utf8(substr($nm_arquivo_pdf_base, 1));
                $Temp = ob_get_clean();
                if ($Temp !== false && trim($Temp) != "")
                {
                    $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
                }
                $oJson = new Services_JSON();
                echo $oJson->encode($this->Arr_result);
                exit;
            }
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
               $_SESSION['scriptcase']['charset_html'] = (isset($this->Ini->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->Ini->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $this->grid->progress_fp = fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp', 'a');
                    if ($this->grid->progress_fp)
                    {
                         $lang_protect = $this->Ini->Nm_lang['lang_pdff_fnsh'];
                         if (!NM_is_utf8($lang_protect))
                         {
                             $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                          }
                        grid_customer_bk_pdf_progress_call($this->grid->progress_tot . "_#NM#_" . ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
                        grid_customer_bk_pdf_progress_call("off\n", $this->Ini->Nm_lang);
                        fwrite($this->grid->progress_fp, ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n");
                        fwrite($this->grid->progress_fp, "off\n");
                        fclose($this->grid->progress_fp);
                    }
                }
            }
unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_file']);
if (is_file($nm_arquivo_pdf_serv))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_file'] = $nm_arquivo_pdf_serv;
}
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['pdf_det'])
{
    if ($this->pdf_zip == "S")
    {
        $nm_arquivo_pdf_url = str_replace(".pdf", ".zip", $nm_arquivo_pdf_url);
    }
    $this->html_pdf_detalhe($nm_arquivo_pdf_url);
    return;
}
$NM_volta  = "volta_grid";
$NM_target = "_parent";
if ($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['pdf_res'])
{
  $NM_volta  = "resumo";
  $NM_target = "_self";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> customer :: PDF</TITLE>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php 
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
 ?> 
 <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
 <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY>
<?php echo $this->Ini->Ajax_result_set ?>
<table class="scGridTabela" valign="top"><tr class="scGridFieldOddVert"><td>
<?php
}
                    $rRFP = fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp', "w");
                    fwrite($rRFP, "PDF\n");
                    fwrite($rRFP, "\n");
                    fwrite($rRFP, "\n");
                    fwrite($rRFP, "100\n");
                    fwrite($rRFP, 1 . "_#NM#_" . $this->Ini->Nm_lang['lang_pdff_gnrt'] . "...\n");
                    fwrite($rRFP, 100 . "_#NM#_" . $this->Ini->Nm_lang['lang_pdff_fnsh'] . "...\n");
                    fwrite($rRFP, "off\n");
                    fclose($rRFP);
$downloadFileName = "grid_customer_bk.pdf";
if ($this->pdf_zip == 'S') {
    $nm_arquivo_pdf_serv = str_replace('.pdf', '.zip', $nm_arquivo_pdf_serv);
    $nm_arquivo_pdf_url = str_replace('.pdf', '.zip', $nm_arquivo_pdf_url);
    $downloadFileName = str_replace('.pdf', '.zip', $downloadFileName);
}
if (!is_file($nm_arquivo_pdf_serv))
{
?>
  <br><b><?php echo $this->Ini->Nm_lang['lang_pdff_errg']; ?></b></td></tr></table>
<script type="text/javascript">
if (window.parent && typeof window.parent.displayErrorPdf === "function") {
    window.parent.displayErrorPdf("<?php echo $this->Ini->Nm_lang['lang_pdff_errg']; ?>");
}
</script>
<?php
}
else
{
?>
<?php echo $this->Ini->Nm_lang['lang_pdff_file_loct']; ?>
<BR>
<A href="<?php echo $nm_arquivo_pdf_url; ?>" target="_blank" class="scGridPageLink"><B><?php echo $nm_arquivo_pdf_url; ?></B></A>.
<BR>
<?php echo $this->Ini->Nm_lang['lang_pdff_clck_mesg']; ?>
</td></tr></table>
<script type="text/javascript">
if (window.parent && typeof window.parent.updateGeneratedPdfFile === "function") {
    window.parent.updateGeneratedPdfFile("<?php echo $nm_arquivo_pdf_url; ?>");
}
</script>
<?php
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][md5("newpdf_" . $downloadFileName)][0] = $nm_arquivo_pdf_url;
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][md5("newpdf_" . $downloadFileName)][1] = $downloadFileName;
}
   echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "sc_b_sai", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<FORM name="F0" method=post action="./" target="<?php echo $NM_target; ?>"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($NM_volta); ?>"> 
</FORM>
</td></tr></table>
</BODY>
</HTML>
<?php
         }
      }
   } 
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
  function close_emb()
  {
      if ($this->Db)
      {
          $this->Db->Close(); 
      }
  }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode("_VLS_", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          $tmp_cmd = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_fast'] = "";
          if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_orig'])) 
          {
              $tmp_cmd = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_orig']; 
          }
          if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_filtro'])) 
          {
              if (!empty($tmp_cmd)) 
              {
                  $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_filtro'] . ")"; 
              }
              else
              {
                  $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_filtro'] . ")"; 
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq'] = $tmp_cmd;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['fast_search']);
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "idcustomer", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nombre", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "correo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "celular", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "idinterno", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "direccion", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipodoc", $arg_search, $data_search);
          }
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_fast'] = $comando;
      $tmp_cmd = "";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_orig'])) 
      {
          $tmp_cmd = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_orig']; 
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_filtro'])) 
      {
          if (!empty($tmp_cmd)) 
          {
              $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_filtro'] . ")"; 
          }
          else
          {
              $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq_filtro'] . ")"; 
          }
      }
      if (!empty($tmp_cmd)) 
      {
          $comando = $tmp_cmd . " and (" . $comando . ")"; 
      }
      else
      {
          $comando = " where (" . $comando . ")"; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['where_pesq'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['fast_search'][0] = $in_fields;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['fast_search'][2] = $sv_data;
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "numvisitas";$nm_numeric[] = "totalventa";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
      if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
      {
          $nome      = "CAST ($nome AS TEXT)";
          $nm_aspas  = "'";
          $nm_aspas1 = "'";
      }
      if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nome      = "CAST ($nome AS TEXT)";
          $nm_aspas  = "'";
          $nm_aspas1 = "'";
      }
      if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
      {
          $nome      = "CAST ($nome AS VARCHAR)";
          $nm_aspas  = "'";
          $nm_aspas1 = "'";
      }
      if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
      {
          $nome      = "CAST ($nome AS VARCHAR(255))";
          $nm_aspas  = "'";
          $nm_aspas1 = "'";
      }
      $Nm_datas["ult_fecha"] = "datetime";$Nm_datas["fechault"] = "datetime";
      if (isset($Nm_datas[$nome]))
      {
          for ($x = 0; $x < strlen($campo); $x++)
          {
              $tst = substr($campo, $x, 1);
              if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
              {
                  return;
              }
          }
      }
      if (isset($Nm_datas[$campo_join]) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
         $nm_aspas  = "#";
         $nm_aspas1 = "#";
      }
      if (isset($Nm_datas[$campo_join]) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_sep_date']))
      {
          $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_sep_date'];
          $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['SC_sep_date1'];
      }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not" . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_proc_grid_search($Parms)
   {
       $ix     = 0;
       $fields = array();
       $busca  = array();
       $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
       if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($Parms))
       {
           $Parms = NM_conv_charset($Parms, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $tmp    = explode("_FDYN_", $Parms);
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tmp_busca'] = array();
       foreach ($tmp as $cada_f)
       {
           $dats = explode("_DYN_", $cada_f);
           if ($dats[1] == "del_grid_search_all")
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['grid_pesq'] as $ind => $dados)
               {
                   $this->proc_del_grid_search($ind, true);
               }
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['grid_pesq']);
               continue;
           }
           if ($dats[1] == "del_grid_search")
           {
               $this->proc_del_grid_search($dats[0], false);
               continue;
           }
           $fields[$ix]['field']  = $dats[0];
           $fields[$ix]['cond']   = $dats[1];
           $sep_in                 = explode("_VLS3_", $dats[2]);
           if (isset($sep_in[1]))
           {
               $fields[$ix]['vls'][2][0] = $sep_in[1];
               $dats[2] = $sep_in[0];
           }
           $sep_bw                 = explode("_VLS2_", $dats[2]);
           $fields[$ix]['vls'][0] = explode("_VLS_",  $sep_bw[0]);
           $fields[$ix]['vls'][1] = isset($sep_bw[1]) ? explode("_VLS_",  $sep_bw[1]) : "";
           $val_sv = array();
           foreach ($fields[$ix]['vls'] as $i => $dados)
           {
               if (is_array($dados))
               {
                   foreach ($dados as $ind => $str)
                   {
                       $str = NM_charset_decode($str);
                       $tmp_pos = strpos($str, "##@@");
                       if ($tmp_pos === false)
                       {
                          $val_sv[$i][] = $str;
                       }
                       else
                       {
                         $val_sv[$i][] = substr($str, 0, $tmp_pos);
                       }
                   }
               }
               else
               {
                   $dados = NM_charset_decode($dados);
                   $tmp_pos = strpos($dados, "##@@");
                   if ($tmp_pos === false)
                   {
                      $val_sv[$i] = $dados;
                   }
                   else
                   {
                      $val_sv[$i] = substr($dados, 0, $tmp_pos);
                   }
               }
           }
           if (!isset($busca[$dats[0]]))
           {
               $busca[$dats[0]] = $dats[1];
               if ($dats[0] == "fechault")
               {
                   $cond = $dats[1];
                   if (substr($cond, 0, 3) == "bi_")
                   {
                       $this->Ini->process_cond_bi($cond, $BI_data1, $BI_data2);
                       $val['ano'] = substr($BI_data1, 4, 4);
                       $val['mes'] = substr($BI_data1, 2, 2);
                       $val['dia'] = substr($BI_data1, 0, 2);
                       if (strlen($BI_data1) > 8)
                       {
                           $val['hor'] = substr($BI_data1, 8, 2);
                           $val['min'] = substr($BI_data1, 10, 2);
                           $val['seg'] = substr($BI_data1, 12, 2);
                       }
                       $val1 = array();
                       if ($cond == "bw")
                       {
                           $val1['ano'] = substr($BI_data2, 4, 4);
                           $val1['mes'] = substr($BI_data2, 2, 2);
                           $val1['dia'] = substr($BI_data2, 0, 2);
                           if (strlen($BI_data2) > 8)
                           {
                               $val1['hor'] = substr($BI_data2, 8, 2);
                               $val1['min'] = substr($BI_data2, 10, 2);
                               $val1['seg'] = substr($BI_data2, 12, 2);
                           }
                       }
                   }
                   else
                   {
                       $val = $this->Ini->dyn_convert_date($fields[$ix]['vls'][0]);
                       $val1 = $this->Ini->dyn_convert_date($fields[$ix]['vls'][1]);
                   }
                   foreach ($val as $tp => $vl)
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tmp_busca'][$dats[0] . '_' . $tp] = $vl;
                   }
                   if (!empty($val1))
                   {
                       foreach ($val1 as $tp => $vl)
                       {
                          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tmp_busca'][$dats[0] . '_input_2_' . $tp] = $vl;
                       }
                   }
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tmp_busca'][$dats[0]] = (isset($fields[$ix]['vls'][0])) ? $fields[$ix]['vls'][0][0] : "";
                   if (isset($fields[$ix]['vls'][1]))
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tmp_busca'][$dats[0] . '_input_2'] = $fields[$ix]['vls'][1][0];
                   }
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tmp_busca'][$dats[0] . '_cond'] = $dats[1];
           }
           $ix++;
      }
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tmp_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tmp_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['tmp_busca'] as $ind => $dados)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$ind] = $dados;
      }
      if (!$_SESSION['scriptcase']['proc_mobile']) 
      { 
          require_once($this->Ini->path_aplicacao . "grid_customer_bk_pesq.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "grid_customer_bk_mobile_pesq.class.php"); 
      } 
      $this->pesq  = new grid_customer_bk_pesq();
      $this->prep_modulos("pesq");
      $this->pesq->NM_ajax_flag  = true;
      $this->pesq->NM_ajax_opcao = "ajax_grid_search";
      $this->pesq->monta_busca();
   }
   function proc_del_grid_search($cmp_del, $del_all)
   {
      if (in_array($cmp_del, array('fechault')))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del . "_dia"] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del . "_mes"] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del . "_ano"] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del . "_input_2_dia"] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del . "_input_2_mes"] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del . "_input_2_ano"] = "";
      }
      elseif (is_array($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del]))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del . "_input_2"] = array();
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del . "_input_2"] = "";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['campos_busca'][$cmp_del . "_cond"] = "";
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['grid_pesq'][$cmp_del]);
   }
  function html_doc_word($nm_arquivo_doc_word, $nmgp_password)
  {
      global $nm_url_saida;
      $Word_password = "";
      if ($this->Ini->Export_zip || $Word_password != "")
      { 
          $Parm_pass  = ($Word_password != "") ? " -p" : "";
          $Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_file'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_file'], ".");
          if ($Pos !== false) {
              $Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_file'], 0, $Pos);
          }
          $Arq_zip .= ".zip";
          $Arq_doc = $nm_arquivo_doc_word;
          $Pos = strrpos($nm_arquivo_doc_word, ".");
          if ($Pos !== false) {
              $Arq_doc = substr($nm_arquivo_doc_word, 0, $Pos);
          }
          $Arq_doc  .= ".zip";
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_file'], ' ')) ? " \"" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_file'] . "\"" :  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_file'];
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Word_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Word_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Word_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
              $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Word_password . " " . $Zip_f . " " . $cada_img_zip;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  $str_zip = "./7za " . $Parm_pass . $Word_password . " a " . $Zip_f . " " . $cada_img_zip;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  $str_zip = "./7za " . $Parm_pass . $Word_password . " a " . $Zip_f . " " . $cada_img_zip;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
           }
           if (is_file($Arq_zip)) {
               unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_file']);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_file'] = $Arq_zip;
               $nm_arquivo_doc_word = $Arq_doc;
          } 
      } 
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk']['word_file']);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($nm_arquivo_doc_word);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      if (strpos(" " . $this->Ini->SC_module_export, "grid") !== false || strpos(" " . $this->Ini->SC_module_export, "resume") !== false)
      {
          $path_doc_md5 = md5($this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][$path_doc_md5][1] = substr($nm_arquivo_doc_word, 1);
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
              $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->pb->setProgressbarMessage($Mens_bar);
          $this->pb->setDownloadLink($this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $this->pb->setDownloadMd5($path_doc_md5);
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($this->ret_word);
          $this->pb->completed();
          return;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> customer :: Doc</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
   <link rel="stylesheet" type="text/css" href="../_lib/lib/css/nm_export_mobile.css" /> 
<?php
}
$path_doc_md5 = md5($this->Ini->path_imag_temp . $nm_arquivo_doc_word);
$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
$_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][$path_doc_md5][1] = substr($nm_arquivo_doc_word, 1);
?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">WORD</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . $nm_arquivo_doc_word ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_customer_bk_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_customer_bk"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($this->ret_word) ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
  }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      global $nm_url_saida;
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Arq_zip   = $Arq_base;
          $Pos = strrpos($Arq_base, ".");
          if ($Pos !== false) {
              $Arq_zip = substr($Arq_base, 0, $Pos);
          }
          $Arq_zip .= ".zip";
          $Arq_htm  = $nm_arquivo_html;
          $Pos = strrpos($nm_arquivo_html, ".");
          if ($Pos !== false) {
              $Arq_htm = substr($nm_arquivo_html, 0, $Pos);
          }
          $Arq_htm  .= ".zip";
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/" . $this->Ini->Label_sort;
           $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/" . $this->Ini->Label_sort_desc;
           $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/" . $this->Ini->Label_sort_asc;
           $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/" . $this->Ini->Label_summary_sort_desc;
           $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/" . $this->Ini->Label_summary_sort_asc;
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
               $nm_arquivo_html = $Arq_htm;
           } 
          $path_doc_md5 = md5($this->Ini->path_imag_temp . $nm_arquivo_html);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_html;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][$path_doc_md5][1] = substr($nm_arquivo_html, 1);
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
              $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->pb->setProgressbarMessage($Mens_bar);
          $this->pb->setDownloadLink($this->Ini->path_imag_temp . $nm_arquivo_html);
          $this->pb->setDownloadMd5($path_doc_md5);
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($this->ret_print);
          $this->pb->completed();
          return;
  }
  function html_pdf_detalhe($nm_arquivo_pdf_det)
  {
      $_SESSION['scriptcase']['proc_mobile'] = sc_check_mobile();
        if (isset($_GET['_sc_force_mobile'])) {
            $_SESSION['scriptcase']['force_mobile'] = 'Y' == $_GET['_sc_force_mobile'];
        }
        if (isset($_SESSION['scriptcase']['force_mobile'])) {
            $_SESSION['scriptcase']['proc_mobile'] = $_SESSION['scriptcase']['force_mobile'];
        }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> customer :: Doc</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
   <link rel="stylesheet" type="text/css" href="../_lib/lib/css/nm_export_mobile.css" /> 
<?php
}
 $path_doc_md5 = md5($nm_arquivo_pdf_det);
 $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][$path_doc_md5][0] = $nm_arquivo_pdf_det;
 $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][$path_doc_md5][1] = "grid_customer_bk_det.pdf";
?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PDF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  NM_encode_input($nm_arquivo_pdf_det) ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_customer_bk_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_customer_bk"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="detalhe"> 
</FORM> 
</BODY>
</HTML>
<?php
  }
  function det_export_print($nm_arquivo_html, $nmgp_password)
  {
      global $nm_url_saida;
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Arq_zip   = $Arq_base;
          $Pos = strrpos($Arq_base, ".");
          if ($Pos !== false) {
              $Arq_zip = substr($Arq_base, 0, $Pos);
          }
          $Arq_zip .= ".zip";
          $Arq_htm  = $nm_arquivo_html;
          $Pos = strrpos($nm_arquivo_html, ".");
          if ($Pos !== false) {
              $Arq_htm = substr($nm_arquivo_html, 0, $Pos);
          }
          $Arq_htm  .= ".zip";
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
               $nm_arquivo_html = $Arq_htm;
           } 
          $path_doc_md5 = md5($this->Ini->path_imag_temp . $nm_arquivo_html);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_html;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_bk'][$path_doc_md5][1] = substr($nm_arquivo_html, 1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> customer :: Doc</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
   <link rel="stylesheet" type="text/css" href="../_lib/lib/css/nm_export_mobile.css" /> 
<?php
}
?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px"><?php echo $this->Ini->Nm_lang['lang_othr_detl_titl'] ?></td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->Ini->path_imag_temp . $nm_arquivo_html ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_customer_bk_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_customer_bk"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="detalhe"> 
</FORM> 
</BODY>
</HTML>
<?php
  }
} 
// 
//======= =========================
   if (isset($_SESSION['scriptcase']['grid_customer_bk']['sc_process_barr'])) {
       return;
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
   $_SESSION['scriptcase']['grid_customer_bk']['contr_erro'] = 'off';
   $sc_conv_var = array();
   $Sc_lig_md5 = false;
   $Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
   $_SESSION['scriptcase']['sem_session'] = false;
   if (!empty($_POST))
   {
       if (isset($_POST['parm']))
       {
           $_POST['parm'] = str_replace("__NM_PLUS__", "+", $_POST['parm']);
           $_POST['parm'] = str_replace("__NM_AMP__", "&", $_POST['parm']);
           $_POST['parm'] = str_replace("__NM_PRC__", "%", $_POST['parm']);
       }
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            $nmgp_val = str_replace("__NM_PLUS__", "+", $nmgp_val);
            $nmgp_val = str_replace("__NM_AMP__", "&", $nmgp_val);
            $nmgp_val = str_replace("__NM_PRC__", "%", $nmgp_val);
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
             if ($nmgp_var == "nmgp_parms_where" && substr($nmgp_val, 0, 8) == "@SC_par@")
             {
                 $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]];
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
            nm_limpa_str_grid_customer_bk($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            nm_protect_num_grid_customer_bk($nmgp_var, $nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       if (isset($_GET['parm']))
       {
           $_GET['parm'] = str_replace("__NM_PLUS__", "+", $_GET['parm']);
           $_GET['parm'] = str_replace("__NM_AMP__", "&", $_GET['parm']);
           $_GET['parm'] = str_replace("__NM_PRC__", "%", $_GET['parm']);
       }
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            $nmgp_val = str_replace("__NM_PLUS__", "+", $nmgp_val);
            $nmgp_val = str_replace("__NM_AMP__", "&", $nmgp_val);
            $nmgp_val = str_replace("__NM_PRC__", "%", $nmgp_val);
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
             if ($nmgp_var == "nmgp_parms_where" && substr($nmgp_val, 0, 8) == "@SC_par@")
             {
                 $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]];
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
            nm_limpa_str_grid_customer_bk($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            nm_protect_num_grid_customer_bk($nmgp_var, $nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!isset($_SERVER['HTTP_REFERER']) && !isset($nmgp_parms) && !isset($script_case_init) && !isset($nmgp_start))
   {
       $Sem_Session = false;
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
       elseif (is_file($root . $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['grid_customer_bk']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "grid_customer_bk") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_pointofsales'])) {
               $_SESSION['scriptcase']['grid_customer_bk']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_pointofsales'];
           }
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
   {
       $nmgp_parms = "";
   }
   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_pai']))
   {
       $apl_pai = $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_pai'];
       if (isset($_SESSION['sc_session'][$script_case_init][$apl_pai]['embutida_filho']))
       {
           foreach ($_SESSION['sc_session'][$script_case_init][$apl_pai]['embutida_filho'] as $init_filho)
           {
               if (isset($_SESSION['sc_session'][$init_filho]['grid_customer_bk']['master_pai']) && $_SESSION['sc_session'][$init_filho]['grid_customer_bk']['master_pai'] == $script_case_init)
               {
                   $script_case_init = $init_filho;
                   break;
               }
           }
       }
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form']) && $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form'] && !isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['master_pai']))
   {
       $SC_init_ant = $script_case_init;
       $script_case_init = rand(2, 10000);
       if (isset($_SESSION['sc_session'][$SC_init_ant]['grid_customer_bk']['embutida_pai']))
       {
           $_SESSION['sc_session'][$SC_init_ant][$_SESSION['sc_session'][$SC_init_ant]['grid_customer_bk']['embutida_pai']]['embutida_filho'][] = $script_case_init;
       }
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['master_pai'] = $SC_init_ant;
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['master_pai']))
   {
       $SC_init_ant = $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['master_pai'];
       if (!isset($_SESSION['sc_session'][$SC_init_ant]['grid_customer_bk']['embutida_form_parms']))
       {
           $_SESSION['sc_session'][$SC_init_ant]['grid_customer_bk']['embutida_form_parms'] = "";
       }
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_parms'] = $_SESSION['sc_session'][$SC_init_ant]['grid_customer_bk']['embutida_form_parms'];
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form'] = true;
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_full'] = (isset($_SESSION['sc_session'][$SC_init_ant]['grid_customer_bk']['embutida_form_full'])) ? $_SESSION['sc_session'][$SC_init_ant]['grid_customer_bk']['embutida_form_full'] : false;
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['reg_start'] = "";
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] = "inicio";
       unset($_SESSION['sc_session'][$SC_init_ant]['grid_customer_bk']['embutida_form']);
       unset($_SESSION['sc_session'][$SC_init_ant]['grid_customer_bk']['embutida_form_parms']);
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_parms'])) 
   {
       if (!empty($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_parms'])) 
       {
           $nmgp_parms = $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_parms'];
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_parms'] = "";
       }
   }
   elseif (isset($script_case_init))
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form']);
       unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_full']);
       unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_parms']);
   }
   if (!isset($nmgp_opcao) || !isset($script_case_init) || ((!isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida']) && $nmgp_opcao != "formphp"))
   { 
       if (!empty($nmgp_parms)) 
       { 
           $nmgp_parms = NM_decode_input($nmgp_parms);
           $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
           $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
           $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
           $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
           $todo  = explode("?@?", $todox);
           foreach ($todo as $param)
           {
                $cadapar = explode("?#?", $param);
                if (1 < sizeof($cadapar))
                {
                    if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                    {
                        $cadapar[0] = substr($cadapar[0], 11);
                        $cadapar[1] = $_SESSION[$cadapar[1]];
                    }
                    if (isset($sc_conv_var[$cadapar[0]]))
                    {
                        $cadapar[0] = $sc_conv_var[$cadapar[0]];
                    }
                    elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
                    {
                        $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
                    }
                    nm_limpa_str_grid_customer_bk($cadapar[1]);
                    nm_protect_num_grid_customer_bk($cadapar[0], $cadapar[1]);
                    if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                    $Tmp_par   = $cadapar[0];
                    $$Tmp_par = $cadapar[1];
                }
           }
           $NMSC_conf_apl = array();
           if (isset($NMSC_inicial))
           {
               $NMSC_conf_apl['inicial'] = $NMSC_inicial;
           }
           if (isset($NMSC_rows))
           {
               $NMSC_conf_apl['rows'] = $NMSC_rows;
           }
           if (isset($NMSC_cols))
           {
               $NMSC_conf_apl['cols'] = $NMSC_cols;
           }
           if (isset($NMSC_paginacao))
           {
               $NMSC_conf_apl['paginacao'] = $NMSC_paginacao;
           }
           if (isset($NMSC_cab))
           {
               $NMSC_conf_apl['cab'] = $NMSC_cab;
           }
           if (isset($NMSC_nav))
           {
               $NMSC_conf_apl['nav'] = $NMSC_nav;
           }
           if (isset($NM_run_iframe) && $NM_run_iframe == 1) 
           { 
               unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']);
               $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['b_sair'] = false;
           }   
       } 
   } 
   $ini_embutida = "";
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida']) && $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'])
   {
       $nmgp_outra_jan = "";
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (isset($GLOBALS["script_case_init"]) && !empty($GLOBALS["script_case_init"]))
   {
       $ini_embutida = $GLOBALS["script_case_init"];
        if (!isset($_SESSION['sc_session'][$ini_embutida]['grid_customer_bk']['embutida']))
        { 
           $_SESSION['sc_session'][$ini_embutida]['grid_customer_bk']['embutida'] = false;
        }
        if (!$_SESSION['sc_session'][$ini_embutida]['grid_customer_bk']['embutida'])
        { 
           $script_case_init = $ini_embutida;
        }
   }
   if (isset($_SESSION['scriptcase']['grid_customer_bk']['protect_modal']) && !empty($_SESSION['scriptcase']['grid_customer_bk']['protect_modal']))
   {
       $script_case_init = $_SESSION['scriptcase']['grid_customer_bk']['protect_modal'];
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_emb    = false;
   $salva_iframe = false;
   $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['doc_word'] = false;
   $_SESSION['scriptcase']['saida_word'] = false;
   if (!isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['skip_charts']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['skip_charts'] = false;
   }
   if (isset($_REQUEST['sc_create_charts']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['skip_charts'] = 'N' == $_REQUEST['sc_create_charts'];
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['iframe_menu']);
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida']))
   {
       $salva_emb = $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1 && !$salva_emb)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "grid_customer_bk";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'grid_customer_bk' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['iframe_menu'] = $salva_iframe;
   }
   $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'] = $salva_emb;

   if (!isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '/grid_customer_bk/'))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['initialize'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['initialize'] = false;
   }
   if ($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['initialize'])
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['tot_geral']);
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['contr_total_geral'] = "NAO";
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($nmgp_opcao) && $nmgp_opcao == "busca" && isset($nmgp_orig_pesq))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['orig_pesq'] = $nmgp_orig_pesq;
   }
   if (!isset($nmgp_opcao) || empty($nmgp_opcao) || $nmgp_opcao == "grid" && (!isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['b_sair'])))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['b_sair'] = true;
   }
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'grid_customer_bk')
   {
       $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/grid_customer_bk_erro.php");
   }
   $salva_tp_saida  = (isset($_SESSION['scriptcase']['sc_tp_saida']))  ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
   $salva_url_saida  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
   if (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_customer_bk']))
   { 
       return;
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'] && $nmgp_opcao != "formphp")
   { 
       if ($nmgp_opcao == "change_lang" || $nmgp_opcao == "change_lang_res" || $nmgp_opcao == "change_lang_fil" || $nmgp_opcao == "force_lang")  
       { 
           if ($nmgp_opcao == "change_lang_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_lang_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_change_lang'] = true;
           unset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['tot_geral']);
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['contr_total_geral'] = "NAO";
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
       if ($nmgp_opcao == "change_schema" || $nmgp_opcao == "change_schema_fil" || $nmgp_opcao == "change_schema_res")  
       { 
           if ($nmgp_opcao == "change_schema_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_schema_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           $nmgp_schema = $nmgp_schema . "/" . $nmgp_schema;  
           $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['num_css'] = rand(0, 1000);
       } 
       if ($nmgp_opcao == "volta_grid")  
       { 
           $nmgp_opcao = "igual";  
       }   
       if (!empty($nmgp_opcao))  
       { 
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] = $nmgp_opcao ;  
       }   
       if ($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] == "detalhe" && isset($nmgp_chave_det))  
       { 
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['chave_det'] = $nmgp_chave_det;
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['cmp_acum']  = $nmgp_parm_acum;
       }   
       if (isset($Sc_seq_det))  
       { 
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['Sc_seq_det'] = $Sc_seq_det;
       } 
       if (!isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['mostra_edit'])) 
       {
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['mostra_edit'] = "S";
       }
       if (isset($nmgp_lig_edit_lapis)) 
       {
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['mostra_edit'] = $nmgp_lig_edit_lapis;
           unset($GLOBALS["nmgp_lig_edit_lapis"]) ;  
           if (isset($_SESSION['nmgp_lig_edit_lapis'])) 
           {
               unset($_SESSION['nmgp_lig_edit_lapis']);
           }
       }
       if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
       {
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan'] = true;
       }
       $nm_saida = "";
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['volta_redirect_apl']) && !empty($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['volta_redirect_apl']))
       {
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['volta_redirect_apl']; 
           $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['volta_redirect_tp']; 
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['volta_redirect_apl'] = "";
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['volta_redirect_tp'] = "";
           $nm_url_saida = "grid_customer_bk_fim.php"; 
       
       }
       elseif (substr($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] != "pdf" ) 
       {
           if (isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan'])
           {
               if ($nmgp_url_saida == "modal")
               {
                   $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_modal'] = true;
               }
               $nm_url_saida = "grid_customer_bk_fim.php"; 
           }
           else
           {
               $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
               $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida);
               if (!empty($nmgp_url_saida)) 
               { 
                   $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['retorno_cons'] = $nmgp_url_saida ; 
               } 
               if (!empty($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['retorno_cons'])) 
               { 
                   $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['retorno_cons']  . "?script_case_init=" . NM_encode_input($script_case_init);  
                   $nm_apl_dependente = 1 ; 
               } 
               if (!empty($nm_url_saida)) 
               { 
                   $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida ; 
               } 
               $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
               $nm_url_saida = "grid_customer_bk_fim.php"; 
               $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
               if ($nm_apl_dependente == 1) 
               { 
                   $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
               } 
           } 
       }
// 
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && substr($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] != "pdf" ) 
       { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['scriptcase']['nm_sc_retorno']; 
            $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['menu_desenv'] = true;   
       } 
       if (isset($nmgp_parms_ret)) 
       {
           $todo = explode(",", $nmgp_parms_ret);
           if (isset($sc_conv_var[$todo[2]]))
           {
               $todo[2] = $sc_conv_var[$todo[2]];
           }
           elseif (isset($sc_conv_var[strtolower($todo[2])]))
           {
               $todo[2] = $sc_conv_var[strtolower($todo[2])];
           }
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['form_psq_ret']  = $todo[0];
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['campo_psq_ret'] = $todo[1];
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['dado_psq_ret']  = $todo[2];
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['js_apos_busca'] = $nm_evt_ret_busca;
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opc_psq'] = true;   
           if (isset($nmgp_iframe_ret)) {
               $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['iframe_ret_cap'] = $nmgp_iframe_ret;
           }
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['psq_edit'] = 'N';   
           if (isset($nmgp_perm_edit)) {
               $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['psq_edit'] = $nmgp_perm_edit;
           }
       } 
       elseif (!isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opc_psq']))
       {
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opc_psq']  = false;   
           $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['psq_edit'] = 'N';   
       } 
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form']) && $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form'])
       {
           if (!isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_full']) || !$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida_form_full'])
           {
               $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['mostra_edit'] = "N";   
           } 
           $_SESSION['scriptcase']['sc_tp_saida']  = $salva_tp_saida;
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $salva_url_saida;
       } 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['sc_outra_jan'])
       {
           $nm_apl_dependente = 0;
       }
       $contr_grid_customer_bk = new grid_customer_bk_apl();

      if ('ajax_autocomp' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] = "busca";
          $contr_grid_customer_bk->NM_ajax_flag = true;
          $contr_grid_customer_bk->NM_ajax_opcao = $NM_ajax_opcao;
      }
      if ('ajax_ch_bi_search' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] = "busca";
          $contr_grid_customer_bk->NM_ajax_flag = true;
          $contr_grid_customer_bk->NM_ajax_opcao = "ajax_ch_bi_search";
      }
      if ('ajax_filter_save' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] = "busca";
          $contr_grid_customer_bk->NM_ajax_flag = true;
          $contr_grid_customer_bk->NM_ajax_opcao = "ajax_filter_save";
      }
      if ('ajax_filter_delete' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] = "busca";
          $contr_grid_customer_bk->NM_ajax_flag = true;
          $contr_grid_customer_bk->NM_ajax_opcao = "ajax_filter_delete";
      }
      if ('ajax_filter_select' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['opcao'] = "busca";
          $contr_grid_customer_bk->NM_ajax_flag = true;
          $contr_grid_customer_bk->NM_ajax_opcao = "ajax_filter_select";
      }
       $contr_grid_customer_bk->controle();
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['grid_customer_bk']['embutida'] && $nmgp_opcao == "formphp")
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       $contr_grid_customer_bk = new grid_customer_bk_apl();
       $contr_grid_customer_bk->controle();
   } 
//
   function nm_limpa_str_grid_customer_bk(&$str)
   {
   }
   function nm_protect_num_grid_customer_bk($name, &$val)
   {
       if (empty($val))
       {
          return;
       }
       $Nm_numeric = array();
       $Nm_numeric[] = "numvisitas";
       $Nm_numeric[] = "totalventa";
       if (in_array($name, $Nm_numeric))
       {
           if (is_array($val))
           {
               foreach ($val as $cada_val)
               {
                  $tmp_pos = strpos($cada_val, "##@@");
                  if ($tmp_pos !== false)
                   {
                      $cada_val = substr($cada_val, 0, $tmp_pos);
                  }
                  for ($x = 0; $x < strlen($cada_val); $x++)
                  {
                      if (($cada_val[$x] < 0 || $cada_val[$x] > 9) && $cada_val[$x] != "."  && $cada_val[$x] != "," && $cada_val[$x] != "-")
                      {
                          $val = array();
                          return;
                      }
                   }
               }
               return;
           }
           $cada_val = $val;
           $tmp_pos = strpos($cada_val, "##@@");
           if ($tmp_pos !== false)
            {
               $cada_val = substr($cada_val, 0, $tmp_pos);
           }
           for ($x = 0; $x < strlen($cada_val); $x++)
           {
               if (($cada_val[$x] < 0 || $cada_val[$x] > 9) && $cada_val[$x] != "."  && $cada_val[$x] != "," && $cada_val[$x] != "-")
               {
                   $val = 0;
                   return;
               }
           }
       }
   }
   function grid_customer_bk_pack_protect_string($sString)
   {
      $sString = (string) $sString;
      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
             return sc_htmlentities($sString);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   }

    function grid_customer_bk_pdf_progress_call($message, $Nm_lang, $flushBuffer = false) {
        $message = trim($message);
        if ('off' == $message)
        {
            $bol_end = TRUE;
        }
        elseif (false !== strpos($message, 'HDOC_#NM#_'))
        {
            $bol_end    = FALSE;
            $arr_partes = explode('_#NM#_', $message);
            if (4 == sizeof($arr_partes))
            {
                $int_size = $arr_partes[0];
                $str_msg  = ('F' == $arr_partes[2]) ? $Nm_lang['lang_pdff_frmt_page']  : $Nm_lang['lang_pdff_wrtg'];
                $str_msg .= $arr_partes[2];
                $int_step = ('F' == $arr_partes[2]) ? floor($int_size * 0.9) : floor($int_size * 0.95);
            }
            else
            {
                $bol_load = FALSE;
            }
        }
        else
        {
            $bol_end    = FALSE;
            $arr_partes = explode('_#NM#_', $message);
            if (3 == sizeof($arr_partes))
            {
                $int_size = $arr_partes[0];
                $int_step = $arr_partes[1];
                $str_msg  = $arr_partes[2];
            }
            else
            {
                $bol_load = FALSE;
            }
        }
        $return_message = $int_size . '!#!' . $int_step . '!#!' . ($bol_end ? '1' : '0') . '!#!' . ($bol_end ? $Nm_lang['lang_pdff_fnsh'] : $str_msg);
?>
<script type="text/javascript">
if (window.parent && typeof window.parent.updateProgressBar === "function") {
    window.parent.updateProgressBar("<?php echo trim($return_message); ?>");
}
</script>
<?php
        if ($flushBuffer) {
            $bufferSize = @ini_get('output_buffering');
            if ('' != $bufferSize) {
                echo str_repeat('&nbsp;', $bufferSize * 5);
            }
        }
        flush();
    }

?>
