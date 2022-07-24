<?php
//
   if (!session_id())
   {
   include_once('form_maeemp_session.php');
           include_once("../_lib/lib/php/fix.php");
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
       if (!function_exists("sc_check_mobile"))
       {
           include_once("../_lib/lib/php/nm_check_mobile.php");
       }
       $_SESSION['scriptcase']['device_mobile'] = sc_check_mobile();
       $_SESSION['scriptcase']['proc_mobile']   = $_SESSION['scriptcase']['device_mobile'];
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
        if (isset($_GET['_sc_force_mobile'])) {
            $_SESSION['scriptcase']['force_mobile'] = 'Y' == $_GET['_sc_force_mobile'];
        }
        if (isset($_SESSION['scriptcase']['force_mobile'])) {
            if ($_SESSION['scriptcase']['force_mobile']) {
                $_SESSION['scriptcase']['device_mobile'] = true;
            }
            $_SESSION['scriptcase']['display_mobile'] = $_SESSION['scriptcase']['force_mobile'];
        }
       if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
       {
          include_once('form_maeemp_mob.php');
          exit;
       }
   }

   $_SESSION['scriptcase']['form_maeemp']['error_buffer'] = '';

   $_SESSION['scriptcase']['form_maeemp']['glo_nm_perfil']          = "conn_erp";
   $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_cache']  = "";
   $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_doc']        = "";
   $NM_dir_atual = getcwd();
   if (empty($NM_dir_atual))
   {
       $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
       $str_path_sys  = str_replace("\\", '/', $str_path_sys);
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
   //check prod
   if(empty($_SESSION['scriptcase']['form_maeemp']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['form_maeemp']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check img
   if(empty($_SESSION['scriptcase']['form_maeemp']['glo_nm_path_imagens']))
   {
           /*check img*/$_SESSION['scriptcase']['form_maeemp']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['form_maeemp']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['form_maeemp']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //check cache
   if(empty($_SESSION['scriptcase']['form_maeemp']['glo_nm_path_cache']))
   {
           /*check cache*/$_SESSION['scriptcase']['form_maeemp']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
   }
   //check doc
   if(empty($_SESSION['scriptcase']['form_maeemp']['glo_nm_path_doc']))
   {
           /*check doc*/$_SESSION['scriptcase']['form_maeemp']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
   }
   //end check publication with the prod
//
class form_maeemp_ini
{
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
   var $cor_bg_table;
   var $border_grid;
   var $cor_bg_grid;
   var $cor_cab_grid;
   var $cor_borda;
   var $cor_txt_cab_grid;
   var $cab_fonte_tipo;
   var $cab_fonte_tamanho;
   var $rod_fonte_tipo;
   var $rod_fonte_tamanho;
   var $cor_rod_grid;
   var $cor_txt_rod_grid;
   var $cor_barra_nav;
   var $cor_titulo;
   var $cor_txt_titulo;
   var $titulo_fonte_tipo;
   var $titulo_fonte_tamanho;
   var $cor_grid_impar;
   var $cor_grid_par;
   var $cor_txt_grid;
   var $texto_fonte_tipo;
   var $texto_fonte_tamanho;
   var $cor_lin_grupo;
   var $cor_txt_grupo;
   var $grupo_fonte_tipo;
   var $grupo_fonte_tamanho;
   var $cor_lin_sub_tot;
   var $cor_txt_sub_tot;
   var $sub_tot_fonte_tipo;
   var $sub_tot_fonte_tamanho;
   var $cor_lin_tot;
   var $cor_txt_tot;
   var $tot_fonte_tipo;
   var $tot_fonte_tamanho;
   var $cor_link_cab;
   var $cor_link_dados;
   var $img_fun_pag;
   var $img_fun_cab;
   var $img_fun_rod;
   var $img_fun_tit;
   var $img_fun_gru;
   var $img_fun_tot;
   var $img_fun_sub;
   var $img_fun_imp;
   var $img_fun_par;
   var $root;
   var $server;
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
   var $str_schema_all;
   var $str_google_fonts;
   var $str_conf_reg;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $link_form_maeemp_inline;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
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
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_pages   = array();
   var $nm_page_names     = array();
   var $nm_page_blocks    = array();
   var $nm_block_page     = array();
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
   var $sc_lig_iframe = array();
   var $force_db_utf8 = true;
//
   function init()
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init;

      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
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
      $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "form_maeemp"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "pointofsales"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake"; 
      $this->nm_script_type  = "PHP"; 
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20220125"; 
      $this->nm_hr_criacao   = "175102"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20220503"; 
      $this->nm_hr_ult_alt   = "193514"; 
      list($NM_usec, $NM_sec) = explode(" ", microtime()); 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0"; 
// 
      $this->border_grid           = ""; 
      $this->cor_bg_grid           = ""; 
      $this->cor_bg_table          = ""; 
      $this->cor_borda             = ""; 
      $this->cor_cab_grid          = ""; 
      $this->cor_txt_pag           = ""; 
      $this->cor_link_pag          = ""; 
      $this->pag_fonte_tipo        = ""; 
      $this->pag_fonte_tamanho     = ""; 
      $this->cor_txt_cab_grid      = ""; 
      $this->cab_fonte_tipo        = ""; 
      $this->cab_fonte_tamanho     = ""; 
      $this->rod_fonte_tipo        = ""; 
      $this->rod_fonte_tamanho     = ""; 
      $this->cor_rod_grid          = ""; 
      $this->cor_txt_rod_grid      = ""; 
      $this->cor_barra_nav         = ""; 
      $this->cor_titulo            = ""; 
      $this->cor_txt_titulo        = ""; 
      $this->titulo_fonte_tipo     = ""; 
      $this->titulo_fonte_tamanho  = ""; 
      $this->cor_grid_impar        = ""; 
      $this->cor_grid_par          = ""; 
      $this->cor_txt_grid          = ""; 
      $this->texto_fonte_tipo      = ""; 
      $this->texto_fonte_tamanho   = ""; 
      $this->cor_lin_grupo         = ""; 
      $this->cor_txt_grupo         = ""; 
      $this->grupo_fonte_tipo      = ""; 
      $this->grupo_fonte_tamanho   = ""; 
      $this->cor_lin_sub_tot       = ""; 
      $this->cor_txt_sub_tot       = ""; 
      $this->sub_tot_fonte_tipo    = ""; 
      $this->sub_tot_fonte_tamanho = ""; 
      $this->cor_lin_tot           = ""; 
      $this->cor_txt_tot           = ""; 
      $this->tot_fonte_tipo        = ""; 
      $this->tot_fonte_tamanho     = ""; 
      $this->cor_link_cab          = ""; 
      $this->cor_link_dados        = ""; 
      $this->img_fun_pag           = ""; 
      $this->img_fun_cab           = ""; 
      $this->img_fun_rod           = ""; 
      $this->img_fun_tit           = ""; 
      $this->img_fun_gru           = ""; 
      $this->img_fun_tot           = ""; 
      $this->img_fun_sub           = ""; 
      $this->img_fun_imp           = ""; 
      $this->img_fun_par           = ""; 
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
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
// 
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->path_prod       = $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_imag_temp'];
      $this->path_cache      = $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_doc'];
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
      $this->str_schema_all  = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
      $this->str_google_fonts  = isset($str_google_fonts)?$str_google_fonts:'';
      $this->server          = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->server_pdf      = $this->sc_protocolo . $this->server;
      $this->server          = "";
      $this->sc_protocolo    = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_maeemp';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php/";
      $this->url_lib_js      = $this->path_link . "_lib/lib/js/";
      $this->url_lib         = $this->path_link . '/_lib/';
      $this->url_third       = $this->path_prod . '/third/';
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";

      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      if (isset($_SESSION['scriptcase']['form_maeemp']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['form_maeemp']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['form_maeemp']['actual_lang']) || $_SESSION['scriptcase']['form_maeemp']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['form_maeemp']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_pointofsales',$this->str_lang,'0','/');
      }
      global $inicial_form_maeemp;
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag) && $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag)
                  {
                      $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      form_maeemp_pack_ajax_response();
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
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1); 
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      $_SESSION['scriptcase']['charset'] = "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];

      asort($this->Nm_lang_conf_region);
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
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
      if (isset($_SESSION['scriptcase']['form_maeemp']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['form_maeemp']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_form.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scFormPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scFormBorder\">\r\n";
              $SS_cod_html .= "    <table width='100%' cellspacing=0 cellpadding=0><tr><td class=\"scFormDataOdd\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['form_maeemp']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['form_maeemp']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['form_maeemp']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['form_maeemp']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_dyn_refresh_field" || $_POST['nmgp_opcao'] == "ajax_add_dyn_search" || $_POST['nmgp_opcao'] == "ajax_ch_bi_dyn_search"))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html) && isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
      {
          $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir']['action']  = "./";
          $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir']['target']  = "_self";
          $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir']['metodo']  = "post";
          $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
          form_maeemp_pack_ajax_response();
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['form_maeemp']['session_timeout']['redir']))
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
      if (-1 != version_compare(phpversion(), '5.0.0'))
      {
         $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph5/src";
      }
      else
      {
          $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph4/src";
      }
      $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      $_SESSION['scriptcase']['nm_root_cep']  = $this->root; 
      $_SESSION['scriptcase']['nm_path_cep']  = $this->path_cep; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_maeemp']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan'] != 'form_maeemp')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $opsys = strtolower(php_uname());

      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin, $remove_border;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      $this->link_form_maeemp_inline = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_maeemp') . "/form_maeemp_inline.php";
      if ($_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_maeemp"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_maeemp"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      if (isset($this->sc_lig_iframe[$this->sc_lig_target[$sTmpTargetLink]]))
                      {
                          $this->sc_lig_iframe[$this->sc_lig_target[$sTmpTargetLink]] = $sTmpTargetWidget;
                      }
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
        global $link_compact_mode, $link_remove_margin, $link_remove_border; 
        if (isset($link_compact_mode) && 'ok' == $link_compact_mode) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maeemp']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['link_info']['compact_mode'] = true;
        }
        if (isset($link_remove_margin) && 'ok' == $link_remove_margin) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maeemp']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['link_info']['remove_margin'] = true;
        }
        if (isset($link_remove_border) && 'ok' == $link_remove_border) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maeemp']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['link_info']['remove_border'] = true;
        }

      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php");
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod");
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib");
      if(function_exists('set_php_timezone'))  set_php_timezone('form_maeemp'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/fix.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_form_maeemp, $NM_run_iframe;
      if ((isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag) && $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['form_maeemp']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['embutida_call']) || $NM_run_iframe == 1)
      {
           $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      }
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']) || empty($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1; 
      } 
      $this->Export_img_zip = false;;
      $this->Img_export_zip  = array();
      $this->regionalDefault();
      $this->sc_tem_trans_banco = false;
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
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcBiDQX7HABYHuX7HuBYV9BUH5XCVoFGDcFYH9FaD1rKHuFUHgBeHEFiV5B3DoF7D9XsDuFaHANKV5BODMvmVcFKV5BmVoBqD9BsZkFGHArKZMJwHgNKHArCDWFqVoJsD9XsH9FUHABYHQBOHuvmDkBsDWXCDoJsDcBwH9B/Z1rYHQJwDMzGHEJGDWF/DoFUDcJeH9FGHANOV5JwHuNOVIFCHEF/DoraHQJmZ1F7Z1vmD5rqDEBOHArCDWBmDoB/DcBwH9X7Z1rwV5BOHuNOVcB/V5X7DoXGDcBqZ1B/HArYV5FaDEBOHEJGDWBmVoBiD9NwDQJsHIrKV5JeDMvmVcFKV5BmVoBqD9BsZkFGHArKV5JsDEBeHEBUHEFqDorqHQXODQFGHANOD5NUHgvsVcBODWFYVoBOHQBsZ1FaHArKHuXGDMveHEBUH5F/VoBiHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHIF7HQBqVINUD1zGZMJeDMvCVkJ3DWX7HIJeHQXGDuFaDSvCVWJeDMvOVIB/HEX/VoX7HQFYZkBiDSvOZMBOHgNOZSJqDuFaHIFUHQXGDuFaHABYHQBODMvmDkBsDWJeHIraDcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeH9BiZ1BYHQB/DMBOVIBsV5FYHMJsHQFYZkFGHIrwHQFaHgNODkXKDuFaHMFaHQXGDuFaD1veHQNUDMvmV9BUDWJeHINUHQFYZkFGD1rwHuFUHgBOHErCHEXKZuB/DcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqZSBOHAN7HQBqHgNKHEJqDWFqDoJsHQXGDuBqD1vOV5BOHgvOVIB/HEFYHMFUHQFYZkBiDSvOZMJeHgrKZSJ3V5XCHIrqHQXGDQFUHIrKHQJsHgvOZSNiH5FqHIJsDcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeZ9XGHAvCV5BODMBOZSJqDWJeHIFUHQFYZ1BOHANOHQX7HgrKVkJ3H5X/DoXGHQXGDuBqHANOHQNUDMrYVcB/DWXKVEX7HQFYZ1BOHIBeHQJeHgvsHENiDWB3DoXGDcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqZSBqZ1NOHuFUHgBOHEJqHEFqHMJsHQXGDuFaD1veHuB/HgrwDkBsHEFGVErqHQFYZkBiHArYHQJsDMvCVkJqH5FGDoJeHQXGDQFUDSN7HuX7DMvmZSNiDWJeHIF7DcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeH9FUHANOHQJsHgvOVcBUH5FqHIraHQFYZkFGHIveHQraHgBOHArCDuJeHIBiHQXGDQFUDSN7V5FaDMBOVcXKHEBmVoX7HQFYZkFGDSNOHuFGHgNKVkJ3DuXKZuXGDcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqVINUHIveHQNUHgrKZSJ3H5F/HMFGHQXGDQFUHAN7HQFaDMvmV9BUHEFYHMJsHQFYZkFGDSBeHuBqHgNOVkJqH5FGZuBOHQXGDuBqHABYHQXGDMNOV9BUDWJeHIFUDcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeH9FUHIrwHuFUHgrwVIB/DWJeHIX7HQFYZkFGHAvCD5XGHgBeVkJqDWXCHMB/HQXGDuFaHAvCVWJeDMvsVcB/DuX7HIXGHQFYZkBiD1zGZMB/DMveVkJ3HEB3ZuBODcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqZSBqHINKZMB/HgBOHErCV5FqDoJsHQXGDuFaD1veHuF7DMvmDkBsDWFaHMJeHQFYZkBiHANOHQBiDMvCHENiDWr/HIFUHQXGDuBqHANOHuNUDMBOV9FeHEBmVEFGDcBwH9B/HIrwV5JeDMBYDkBsH5X/VoJsHQJwZ9JeDSvCV5BiDMzGVcBODWBmVoFaD9BsZ1FaHArYV5FGDEvsHEFiHEFqDoBOD9XsDQJsD1vOV5BiDMzGV9FeH5XCVoFGDcBwZ1F7HABYD5XGDMzGHAFKDWF/DoXGD9JKDQJsZ1rwVWXGHuNOZSrCDuB7VoFaD9XGZ1B/Z1BeZMFaDMrYHEFiH5FYDoraD9XsZ9JeHAveVWJwHuzGDkBOH5XKVoFaDcJUZ1B/DSrYZMB/DEBeHEFiDWFqDoJeDcJUDQJsZ1rwD5JeHgNKVcrsH5XCDoX7DcJUZ1B/Z1vOD5raDMzGVkXeV5FaDoJeDcJUDQJsHIBeD5BqHgvsDkBODWFYDoJsD9XOH9B/DSrYV5FUDMzGDkBsV5B3DoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQJmH9BqD1rwHQFaHgBOVkJqHEB7VoFGHQJeDuFaDSrwHuJwDMvOZSNiDuFGDoXGHQXGZ1FGHIrwHQJeHgveVkJ3HEB3VoFGHQJeDQBqHIrKV5FaHgvOVcFeH5B3VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQXsH9BiZ1vCVWBqDMBYV9BUDWBmDoXGDcFYZkFGHINaZMBqDMvCHENiDuXKVoFGHQJeDQFUDSvCVWBODMzGZSNiHEX/DoXGHQNwVINUHANOHQJeHgNKZSJ3DuX/DoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQBqZ1BiHIBeHuFaHgBOHEJqDWrGVoFGDcBiZ9XGHABYV5FaHgrwVIBsHEFGDoXGHQJmZSBqZ1rYHQraHgBeZSJ3V5B3VoFGHQXODuBqHANOHuX7DMrYZSNiH5B7VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQXODQFUHABYHQJwDMrYZSNiDuFGDoXGHQNmH9BqD1rKHuJsHgBeZSJqHEB3VoFGHQXsZSFUHArYHQBOHgvOVcXKH5B7DoXGHQXGZkFGD1rwHuFGHgrKVkJ3DuX/DoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiDcNmZkBiHIBeHQBqHgvsHENiDWB3VoFGHQXOZSBiZ1BYHQXGDMvmZSNiDuFGDoXGDcNmZ1BiD1rwHuJsHgBOVkJ3DuXKVoFGHQXOZSBiZ1zGVWXGHgvOVcBUHEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQFYZSBiD1BeHurqDMrYVcFeHEBmDoXGDcFYZkBiHIBOZMFaHgNODkXKH5BmVoFGHQNmDQB/D1veHQJwDMBOZSNiDWBmDoXGHQBsZ1BiHINKD5JeHgNOZSJqDurmDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQNwZ1BOHAvCZMJeHgNKVkJqHEB7VoFGHQXsDuFaHAvOVWBODMBOVcB/DurGDoXGHQNwZ1BOHABYHuFUDMveVkJqH5FGVoFGHQJeDuBqDSBYHuraHgrwVIB/HEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQJKZSBiZ1vCV5BqHgvOV9FeDWXKDoXGHQJmVINUHIBeHQNUHgrKZSJqH5FGVoFGHQNwZSBiDSN7HuJeDMrYVcFeHEFGDoXGHQXGZSBqD1rwHuBOHgBOZSJ3DWrGDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQNwZ1X7DSrYHuFGHgNOHArCV5B3VoFGDcBiDQB/HABYHuX7DMvmV9FeDWrmDoXGHQJmH9BOHArKHuBqHgBOZSJ3H5X/VoFGHQJeDQB/HIrwHuX7HgrwZSNiHEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsDcBiH9FUD1BeHQXGDMBYVcFeDurGDoXGHQXGZ1BiD1rwHQFaHgBOVkJ3H5X/VoFGHQFYH9BiHIBeHuraDMvOZSNiDWrmDoXGHQXGZSBqHAN7HuFUDMvCVkJqDWBmDoF7D9XsDQJsDSBYV5FGHgNKDkBsDuB7VEBiDcFYVIJsD1rwHQFGHgNOVkJ3DuXKVoFGHQXsDuFaDSN7HurqDMNOVcFeV5X/DoXGHQBsH9BOHArYHQBOHgNOHErCHEB3VoFGDcXGDuFaHAN7V5FaHgrwVcXKDuFGVoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQFYH9FaHANOD5NUDErKDkFeV5FaZuBqD9NmZSFGHINaV5JwHuvmVcrsH5XCDoXGD9BsZ1FUZ1BeD5JeDMBYZSJGDWr/VoXGD9NwDQJwD1veV5FGHgvsVcFCH5FqDoraHQFYVIJwD1rwV5FGDEBeHEXeH5X/DoF7D9NwZSX7D1BeV5raHuvmVcFKV5X7VoFGD9BiZ1X7Z1BeHQJsDEBOHEFiHEFqVoB/D9XsH9FGHIrwV5FUHuzGVIBOH5XKDoXGHQNmZkBiD1zGV5X7HgNODkXKH5F/HIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWrmVorqHQNmVINUHAvCD5BqHgNKDkB/DWFGDoBOHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHIF7DcNmZ1B/HIveHuXGHgBYHErsH5F/DoBqD9NmDuFaHIrKV5FUDMBOZSNiDWXCHMBiD9BsVIraD1rwV5X7HgBeHErCHEXCZuB/DcJeDQX7Z1vCV5BiDMzGVIBOV5X7VoFGDcJUZkFUHArKHQJsDENOHEXeDWX7VoX7DcJeDuFaHAveD5NUHgNKDkBOV5FYHMBiHQBqZkFUZ1vmD5Bq";
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_maeemp']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan'] != 'form_maeemp')) 
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
   }
   function prep_conect()
   {
      $con_devel             =  (isset($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_maeemp']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_maeemp']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_maeemp']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_maeemp']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_maeemp']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'pointofsales', 2, $this->force_db_utf8); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_maeemp']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_maeemp']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_maeemp']['glo_nm_perfil'];
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
         $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['SC_sep_date1'];
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "maeemp"; 
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
          if (!$_SESSION['sc_session'][$this->sc_page]['form_maeemp']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['form_maeemp']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['sc_outra_jan'] != 'form_maeemp')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao'], $this->root . $this->path_prod, 'pointofsales', 1, $this->force_db_utf8); 
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
          $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['decimal_db'] = "."; 
      } 
  }

  function setConnectionHash() {
    if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao'])) {
      list($connectionDbms, $connectionHost, $connectionUser, $connectionPassword, $connectionDatabase) = db_conect_devel($_SESSION['scriptcase']['form_maeemp']['glo_nm_conexao'], $this->root . $this->path_prod, 'pointofsales', 1, $this->force_db_utf8);
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
// 

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
   }
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_erp")
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['form_maeemp']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['form_maeemp']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['form_maeemp']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
}
//===============================================================================
class form_maeemp_edit
{
    var $contr_form_maeemp;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("form_maeemp_apl.php");
        $this->contr_form_maeemp = new form_maeemp_apl();
    }
}
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}
ob_start();
//
//----------------  
//
    $_SESSION['scriptcase']['form_maeemp']['contr_erro'] = 'off';
    if (!function_exists("NM_is_utf8"))
    {
        include_once("../_lib/lib/php/nm_utf8.php");
    }
    if (!function_exists("SC_dir_app_ini"))
    {
        include_once("../_lib/lib/php/nm_ctrl_app_name.php");
    }
    SC_dir_app_ini('pointofsales');
    $sc_conv_var = array();
    if (!empty($_FILES))
    {
        foreach ($_FILES as $nmgp_campo => $nmgp_valores)
        {
             if (isset($sc_conv_var[$nmgp_campo]))
             {
                 $nmgp_campo = $sc_conv_var[$nmgp_campo];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_campo)]))
             {
                 $nmgp_campo = $sc_conv_var[strtolower($nmgp_campo)];
             }
             $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
             $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
             $$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
             $$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
             $$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
        }
    }
    $Sc_lig_md5 = false;
    $Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
    $_SESSION['scriptcase']['sem_session'] = false;
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
             nm_limpa_str_form_maeemp($nmgp_val);
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
             nm_limpa_str_form_maeemp($nmgp_val);
             $nmgp_val = NM_decode_input($nmgp_val);
             $$nmgp_var = $nmgp_val;
        }
    }
    if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($_POST['rs']) && !isset($nmgp_start) ))
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
        elseif (is_file($root . $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt")) {
            $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['form_maeemp']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt"));
        }
        if (isset($apl_def)) {
            if ($apl_def[0] != "form_maeemp") {
                $_SESSION['scriptcase']['sem_session'] = true;
                if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                    $_SESSION['scriptcase']['form_maeemp']['session_timeout']['redir'] = $apl_def[0];
                }
                else {
                    $_SESSION['scriptcase']['form_maeemp']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
                }
                $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
                $_SESSION['scriptcase']['form_maeemp']['session_timeout']['redir_tp'] = $Redir_tp;
            }
            if (isset($_COOKIE['sc_actual_lang_pointofsales'])) {
                $_SESSION['scriptcase']['form_maeemp']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_pointofsales'];
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
    if (isset($SC_where_pdf) && !empty($SC_where_pdf))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']) && !isset($_SESSION['scriptcase']['form_maeemp']['session_timeout']['redir']))
    {
        if ('ajax_form_maeemp_validate_rp01noemp' == $_POST['rs'])
        {
            $rp01noemp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01division' == $_POST['rs'])
        {
            $rp01division = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01depto' == $_POST['rs'])
        {
            $rp01depto = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01seccion' == $_POST['rs'])
        {
            $rp01seccion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01noemp1' == $_POST['rs'])
        {
            $rp01noemp1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01nombreemp' == $_POST['rs'])
        {
            $rp01nombreemp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01categoria' == $_POST['rs'])
        {
            $rp01categoria = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01turno' == $_POST['rs'])
        {
            $rp01turno = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01statusemp' == $_POST['rs'])
        {
            $rp01statusemp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechastatus' == $_POST['rs'])
        {
            $rp01fechastatus = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01causaretiro' == $_POST['rs'])
        {
            $rp01causaretiro = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01direccion' == $_POST['rs'])
        {
            $rp01direccion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01telefono' == $_POST['rs'])
        {
            $rp01telefono = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01lugarnacimiento' == $_POST['rs'])
        {
            $rp01lugarnacimiento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechanacimiento' == $_POST['rs'])
        {
            $rp01fechanacimiento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01nacionalidad' == $_POST['rs'])
        {
            $rp01nacionalidad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01cedula' == $_POST['rs'])
        {
            $rp01cedula = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01noiess' == $_POST['rs'])
        {
            $rp01noiess = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexo' == $_POST['rs'])
        {
            $rp01sexo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01nolibreta' == $_POST['rs'])
        {
            $rp01nolibreta = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01profesion' == $_POST['rs'])
        {
            $rp01profesion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechaingreso' == $_POST['rs'])
        {
            $rp01fechaingreso = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechareingreso' == $_POST['rs'])
        {
            $rp01fechareingreso = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01cargo' == $_POST['rs'])
        {
            $rp01cargo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01estadocivil' == $_POST['rs'])
        {
            $rp01estadocivil = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01rebajaxcasado' == $_POST['rs'])
        {
            $rp01rebajaxcasado = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01nombreconyuge' == $_POST['rs'])
        {
            $rp01nombreconyuge = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01nombrepadre' == $_POST['rs'])
        {
            $rp01nombrepadre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01nombremadre' == $_POST['rs'])
        {
            $rp01nombremadre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01nohijos' == $_POST['rs'])
        {
            $rp01nohijos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechahijos0' == $_POST['rs'])
        {
            $rp01fechahijos0 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexohijos0' == $_POST['rs'])
        {
            $rp01sexohijos0 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechahijos1' == $_POST['rs'])
        {
            $rp01fechahijos1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexohijos1' == $_POST['rs'])
        {
            $rp01sexohijos1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechahijos2' == $_POST['rs'])
        {
            $rp01fechahijos2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexohijos2' == $_POST['rs'])
        {
            $rp01sexohijos2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechahijos3' == $_POST['rs'])
        {
            $rp01fechahijos3 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexohijos3' == $_POST['rs'])
        {
            $rp01sexohijos3 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechahijos4' == $_POST['rs'])
        {
            $rp01fechahijos4 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexohijos4' == $_POST['rs'])
        {
            $rp01sexohijos4 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechahijos5' == $_POST['rs'])
        {
            $rp01fechahijos5 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexohijos5' == $_POST['rs'])
        {
            $rp01sexohijos5 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechahijos6' == $_POST['rs'])
        {
            $rp01fechahijos6 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexohijos6' == $_POST['rs'])
        {
            $rp01sexohijos6 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechahijos7' == $_POST['rs'])
        {
            $rp01fechahijos7 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexohijos7' == $_POST['rs'])
        {
            $rp01sexohijos7 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechahijos8' == $_POST['rs'])
        {
            $rp01fechahijos8 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexohijos8' == $_POST['rs'])
        {
            $rp01sexohijos8 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechahijos9' == $_POST['rs'])
        {
            $rp01fechahijos9 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sexohijos9' == $_POST['rs'])
        {
            $rp01sexohijos9 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01cargaspadres' == $_POST['rs'])
        {
            $rp01cargaspadres = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01otrascargas' == $_POST['rs'])
        {
            $rp01otrascargas = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01formapago' == $_POST['rs'])
        {
            $rp01formapago = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01nobancoemp' == $_POST['rs'])
        {
            $rp01nobancoemp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01ctabancoemp' == $_POST['rs'])
        {
            $rp01ctabancoemp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01tipoctabco' == $_POST['rs'])
        {
            $rp01tipoctabco = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechaultvacacion' == $_POST['rs'])
        {
            $rp01fechaultvacacion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01aporte' == $_POST['rs'])
        {
            $rp01aporte = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01socio' == $_POST['rs'])
        {
            $rp01socio = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01transporte' == $_POST['rs'])
        {
            $rp01transporte = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01recibeporc' == $_POST['rs'])
        {
            $rp01recibeporc = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sueldoanterior' == $_POST['rs'])
        {
            $rp01sueldoanterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sueldosalario' == $_POST['rs'])
        {
            $rp01sueldosalario = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fecmodsdosal' == $_POST['rs'])
        {
            $rp01fecmodsdosal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fecmodficha' == $_POST['rs'])
        {
            $rp01fecmodficha = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01faltasinjust' == $_POST['rs'])
        {
            $rp01faltasinjust = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01ingresos1er' == $_POST['rs'])
        {
            $rp01ingresos1er = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01basesocialvalor' == $_POST['rs'])
        {
            $rp01basesocialvalor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01basesocialtiempo' == $_POST['rs'])
        {
            $rp01basesocialtiempo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp0114vopagoacum' == $_POST['rs'])
        {
            $rp0114vopagoacum = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp0115vopagoacum' == $_POST['rs'])
        {
            $rp0115vopagoacum = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01cverrorliq' == $_POST['rs'])
        {
            $rp01cverrorliq = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01porcentliq' == $_POST['rs'])
        {
            $rp01porcentliq = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01tiposangre' == $_POST['rs'])
        {
            $rp01tiposangre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01ingresos2do' == $_POST['rs'])
        {
            $rp01ingresos2do = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01provdiremp' == $_POST['rs'])
        {
            $rp01provdiremp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01cantondiremp' == $_POST['rs'])
        {
            $rp01cantondiremp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01ciudaddiremp' == $_POST['rs'])
        {
            $rp01ciudaddiremp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01codocupacion' == $_POST['rs'])
        {
            $rp01codocupacion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_uid' == $_POST['rs'])
        {
            $uid = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_block' == $_POST['rs'])
        {
            $block = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_ultimoacceso' == $_POST['rs'])
        {
            $ultimoacceso = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01foto' == $_POST['rs'])
        {
            $rp01foto = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01ctacontable' == $_POST['rs'])
        {
            $rp01ctacontable = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01email' == $_POST['rs'])
        {
            $rp01email = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01passwd' == $_POST['rs'])
        {
            $rp01passwd = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01huella' == $_POST['rs'])
        {
            $rp01huella = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01recibefr' == $_POST['rs'])
        {
            $rp01recibefr = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01recibedt' == $_POST['rs'])
        {
            $rp01recibedt = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01recibedc' == $_POST['rs'])
        {
            $rp01recibedc = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01uid' == $_POST['rs'])
        {
            $rp01uid = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01fechauid' == $_POST['rs'])
        {
            $rp01fechauid = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01obs' == $_POST['rs'])
        {
            $rp01obs = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01cauliq' == $_POST['rs'])
        {
            $rp01cauliq = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01discapacidad' == $_POST['rs'])
        {
            $rp01discapacidad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01conadis' == $_POST['rs'])
        {
            $rp01conadis = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01tpdiscapacidad' == $_POST['rs'])
        {
            $rp01tpdiscapacidad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01prdiscapacidad' == $_POST['rs'])
        {
            $rp01prdiscapacidad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01freserva' == $_POST['rs'])
        {
            $rp01freserva = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01codsectorial' == $_POST['rs'])
        {
            $rp01codsectorial = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_anticipoporvalor' == $_POST['rs'])
        {
            $anticipoporvalor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_tipidret' == $_POST['rs'])
        {
            $tipidret = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_residenciatrab' == $_POST['rs'])
        {
            $residenciatrab = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_paisresidencia' == $_POST['rs'])
        {
            $paisresidencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_aplicaconvenio' == $_POST['rs'])
        {
            $aplicaconvenio = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_tipotrabajdiscap' == $_POST['rs'])
        {
            $tipotrabajdiscap = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_porcentajediscap' == $_POST['rs'])
        {
            $porcentajediscap = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_tipiddiscap' == $_POST['rs'])
        {
            $tipiddiscap = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_iddiscap' == $_POST['rs'])
        {
            $iddiscap = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01varias_secciones' == $_POST['rs'])
        {
            $rp01varias_secciones = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01cc' == $_POST['rs'])
        {
            $rp01cc = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01observacion' == $_POST['rs'])
        {
            $rp01observacion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01iessconyugue' == $_POST['rs'])
        {
            $rp01iessconyugue = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01tiporefrigerio' == $_POST['rs'])
        {
            $rp01tiporefrigerio = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_idiomas' == $_POST['rs'])
        {
            $idiomas = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_emergencias' == $_POST['rs'])
        {
            $emergencias = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01tipojornada' == $_POST['rs'])
        {
            $rp01tipojornada = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01numero_horas' == $_POST['rs'])
        {
            $rp01numero_horas = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01emailpersonal' == $_POST['rs'])
        {
            $rp01emailpersonal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01supervisadopor' == $_POST['rs'])
        {
            $rp01supervisadopor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01zonaderiesgo' == $_POST['rs'])
        {
            $rp01zonaderiesgo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01refpersnom1' == $_POST['rs'])
        {
            $rp01refpersnom1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01refpersparen1' == $_POST['rs'])
        {
            $rp01refpersparen1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01refperstel1' == $_POST['rs'])
        {
            $rp01refperstel1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01refpersnom2' == $_POST['rs'])
        {
            $rp01refpersnom2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01refpersparen2' == $_POST['rs'])
        {
            $rp01refpersparen2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01refperstel2' == $_POST['rs'])
        {
            $rp01refperstel2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01tipovivienda' == $_POST['rs'])
        {
            $rp01tipovivienda = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01serviciosbasicos' == $_POST['rs'])
        {
            $rp01serviciosbasicos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01viviendadetalle' == $_POST['rs'])
        {
            $rp01viviendadetalle = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01dormitorios' == $_POST['rs'])
        {
            $rp01dormitorios = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01sala' == $_POST['rs'])
        {
            $rp01sala = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01comedor' == $_POST['rs'])
        {
            $rp01comedor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01banos' == $_POST['rs'])
        {
            $rp01banos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01estudiosrealizados' == $_POST['rs'])
        {
            $rp01estudiosrealizados = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01ruta1' == $_POST['rs'])
        {
            $rp01ruta1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01ruta2' == $_POST['rs'])
        {
            $rp01ruta2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01ruta3' == $_POST['rs'])
        {
            $rp01ruta3 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_validate_rp01actividadesextras' == $_POST['rs'])
        {
            $rp01actividadesextras = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maeemp_submit_form' == $_POST['rs'])
        {
            $rp01noemp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $rp01division = NM_utf8_urldecode($_POST['rsargs'][1]);
            $rp01depto = NM_utf8_urldecode($_POST['rsargs'][2]);
            $rp01seccion = NM_utf8_urldecode($_POST['rsargs'][3]);
            $rp01noemp1 = NM_utf8_urldecode($_POST['rsargs'][4]);
            $rp01nombreemp = NM_utf8_urldecode($_POST['rsargs'][5]);
            $rp01categoria = NM_utf8_urldecode($_POST['rsargs'][6]);
            $rp01turno = NM_utf8_urldecode($_POST['rsargs'][7]);
            $rp01statusemp = NM_utf8_urldecode($_POST['rsargs'][8]);
            $rp01fechastatus = NM_utf8_urldecode($_POST['rsargs'][9]);
            $rp01causaretiro = NM_utf8_urldecode($_POST['rsargs'][10]);
            $rp01direccion = NM_utf8_urldecode($_POST['rsargs'][11]);
            $rp01telefono = NM_utf8_urldecode($_POST['rsargs'][12]);
            $rp01lugarnacimiento = NM_utf8_urldecode($_POST['rsargs'][13]);
            $rp01fechanacimiento = NM_utf8_urldecode($_POST['rsargs'][14]);
            $rp01nacionalidad = NM_utf8_urldecode($_POST['rsargs'][15]);
            $rp01cedula = NM_utf8_urldecode($_POST['rsargs'][16]);
            $rp01noiess = NM_utf8_urldecode($_POST['rsargs'][17]);
            $rp01sexo = NM_utf8_urldecode($_POST['rsargs'][18]);
            $rp01nolibreta = NM_utf8_urldecode($_POST['rsargs'][19]);
            $rp01profesion = NM_utf8_urldecode($_POST['rsargs'][20]);
            $rp01fechaingreso = NM_utf8_urldecode($_POST['rsargs'][21]);
            $rp01fechareingreso = NM_utf8_urldecode($_POST['rsargs'][22]);
            $rp01cargo = NM_utf8_urldecode($_POST['rsargs'][23]);
            $rp01estadocivil = NM_utf8_urldecode($_POST['rsargs'][24]);
            $rp01rebajaxcasado = NM_utf8_urldecode($_POST['rsargs'][25]);
            $rp01nombreconyuge = NM_utf8_urldecode($_POST['rsargs'][26]);
            $rp01nombrepadre = NM_utf8_urldecode($_POST['rsargs'][27]);
            $rp01nombremadre = NM_utf8_urldecode($_POST['rsargs'][28]);
            $rp01nohijos = NM_utf8_urldecode($_POST['rsargs'][29]);
            $rp01fechahijos0 = NM_utf8_urldecode($_POST['rsargs'][30]);
            $rp01sexohijos0 = NM_utf8_urldecode($_POST['rsargs'][31]);
            $rp01fechahijos1 = NM_utf8_urldecode($_POST['rsargs'][32]);
            $rp01sexohijos1 = NM_utf8_urldecode($_POST['rsargs'][33]);
            $rp01fechahijos2 = NM_utf8_urldecode($_POST['rsargs'][34]);
            $rp01sexohijos2 = NM_utf8_urldecode($_POST['rsargs'][35]);
            $rp01fechahijos3 = NM_utf8_urldecode($_POST['rsargs'][36]);
            $rp01sexohijos3 = NM_utf8_urldecode($_POST['rsargs'][37]);
            $rp01fechahijos4 = NM_utf8_urldecode($_POST['rsargs'][38]);
            $rp01sexohijos4 = NM_utf8_urldecode($_POST['rsargs'][39]);
            $rp01fechahijos5 = NM_utf8_urldecode($_POST['rsargs'][40]);
            $rp01sexohijos5 = NM_utf8_urldecode($_POST['rsargs'][41]);
            $rp01fechahijos6 = NM_utf8_urldecode($_POST['rsargs'][42]);
            $rp01sexohijos6 = NM_utf8_urldecode($_POST['rsargs'][43]);
            $rp01fechahijos7 = NM_utf8_urldecode($_POST['rsargs'][44]);
            $rp01sexohijos7 = NM_utf8_urldecode($_POST['rsargs'][45]);
            $rp01fechahijos8 = NM_utf8_urldecode($_POST['rsargs'][46]);
            $rp01sexohijos8 = NM_utf8_urldecode($_POST['rsargs'][47]);
            $rp01fechahijos9 = NM_utf8_urldecode($_POST['rsargs'][48]);
            $rp01sexohijos9 = NM_utf8_urldecode($_POST['rsargs'][49]);
            $rp01cargaspadres = NM_utf8_urldecode($_POST['rsargs'][50]);
            $rp01otrascargas = NM_utf8_urldecode($_POST['rsargs'][51]);
            $rp01formapago = NM_utf8_urldecode($_POST['rsargs'][52]);
            $rp01nobancoemp = NM_utf8_urldecode($_POST['rsargs'][53]);
            $rp01ctabancoemp = NM_utf8_urldecode($_POST['rsargs'][54]);
            $rp01tipoctabco = NM_utf8_urldecode($_POST['rsargs'][55]);
            $rp01fechaultvacacion = NM_utf8_urldecode($_POST['rsargs'][56]);
            $rp01aporte = NM_utf8_urldecode($_POST['rsargs'][57]);
            $rp01socio = NM_utf8_urldecode($_POST['rsargs'][58]);
            $rp01transporte = NM_utf8_urldecode($_POST['rsargs'][59]);
            $rp01recibeporc = NM_utf8_urldecode($_POST['rsargs'][60]);
            $rp01sueldoanterior = NM_utf8_urldecode($_POST['rsargs'][61]);
            $rp01sueldosalario = NM_utf8_urldecode($_POST['rsargs'][62]);
            $rp01fecmodsdosal = NM_utf8_urldecode($_POST['rsargs'][63]);
            $rp01fecmodficha = NM_utf8_urldecode($_POST['rsargs'][64]);
            $rp01faltasinjust = NM_utf8_urldecode($_POST['rsargs'][65]);
            $rp01ingresos1er = NM_utf8_urldecode($_POST['rsargs'][66]);
            $rp01basesocialvalor = NM_utf8_urldecode($_POST['rsargs'][67]);
            $rp01basesocialtiempo = NM_utf8_urldecode($_POST['rsargs'][68]);
            $rp0114vopagoacum = NM_utf8_urldecode($_POST['rsargs'][69]);
            $rp0115vopagoacum = NM_utf8_urldecode($_POST['rsargs'][70]);
            $rp01cverrorliq = NM_utf8_urldecode($_POST['rsargs'][71]);
            $rp01porcentliq = NM_utf8_urldecode($_POST['rsargs'][72]);
            $rp01tiposangre = NM_utf8_urldecode($_POST['rsargs'][73]);
            $rp01ingresos2do = NM_utf8_urldecode($_POST['rsargs'][74]);
            $rp01provdiremp = NM_utf8_urldecode($_POST['rsargs'][75]);
            $rp01cantondiremp = NM_utf8_urldecode($_POST['rsargs'][76]);
            $rp01ciudaddiremp = NM_utf8_urldecode($_POST['rsargs'][77]);
            $rp01codocupacion = NM_utf8_urldecode($_POST['rsargs'][78]);
            $uid = NM_utf8_urldecode($_POST['rsargs'][79]);
            $block = NM_utf8_urldecode($_POST['rsargs'][80]);
            $ultimoacceso = NM_utf8_urldecode($_POST['rsargs'][81]);
            $rp01foto = NM_utf8_urldecode($_POST['rsargs'][82]);
            $rp01ctacontable = NM_utf8_urldecode($_POST['rsargs'][83]);
            $rp01email = NM_utf8_urldecode($_POST['rsargs'][84]);
            $rp01passwd = NM_utf8_urldecode($_POST['rsargs'][85]);
            $rp01huella = NM_utf8_urldecode($_POST['rsargs'][86]);
            $rp01recibefr = NM_utf8_urldecode($_POST['rsargs'][87]);
            $rp01recibedt = NM_utf8_urldecode($_POST['rsargs'][88]);
            $rp01recibedc = NM_utf8_urldecode($_POST['rsargs'][89]);
            $rp01uid = NM_utf8_urldecode($_POST['rsargs'][90]);
            $rp01fechauid = NM_utf8_urldecode($_POST['rsargs'][91]);
            $rp01obs = NM_utf8_urldecode($_POST['rsargs'][92]);
            $rp01cauliq = NM_utf8_urldecode($_POST['rsargs'][93]);
            $rp01discapacidad = NM_utf8_urldecode($_POST['rsargs'][94]);
            $rp01conadis = NM_utf8_urldecode($_POST['rsargs'][95]);
            $rp01tpdiscapacidad = NM_utf8_urldecode($_POST['rsargs'][96]);
            $rp01prdiscapacidad = NM_utf8_urldecode($_POST['rsargs'][97]);
            $rp01freserva = NM_utf8_urldecode($_POST['rsargs'][98]);
            $rp01codsectorial = NM_utf8_urldecode($_POST['rsargs'][99]);
            $anticipoporvalor = NM_utf8_urldecode($_POST['rsargs'][100]);
            $tipidret = NM_utf8_urldecode($_POST['rsargs'][101]);
            $residenciatrab = NM_utf8_urldecode($_POST['rsargs'][102]);
            $paisresidencia = NM_utf8_urldecode($_POST['rsargs'][103]);
            $aplicaconvenio = NM_utf8_urldecode($_POST['rsargs'][104]);
            $tipotrabajdiscap = NM_utf8_urldecode($_POST['rsargs'][105]);
            $porcentajediscap = NM_utf8_urldecode($_POST['rsargs'][106]);
            $tipiddiscap = NM_utf8_urldecode($_POST['rsargs'][107]);
            $iddiscap = NM_utf8_urldecode($_POST['rsargs'][108]);
            $rp01varias_secciones = NM_utf8_urldecode($_POST['rsargs'][109]);
            $rp01cc = NM_utf8_urldecode($_POST['rsargs'][110]);
            $rp01observacion = NM_utf8_urldecode($_POST['rsargs'][111]);
            $rp01iessconyugue = NM_utf8_urldecode($_POST['rsargs'][112]);
            $rp01tiporefrigerio = NM_utf8_urldecode($_POST['rsargs'][113]);
            $idiomas = NM_utf8_urldecode($_POST['rsargs'][114]);
            $emergencias = NM_utf8_urldecode($_POST['rsargs'][115]);
            $rp01tipojornada = NM_utf8_urldecode($_POST['rsargs'][116]);
            $rp01numero_horas = NM_utf8_urldecode($_POST['rsargs'][117]);
            $rp01emailpersonal = NM_utf8_urldecode($_POST['rsargs'][118]);
            $rp01supervisadopor = NM_utf8_urldecode($_POST['rsargs'][119]);
            $rp01zonaderiesgo = NM_utf8_urldecode($_POST['rsargs'][120]);
            $rp01refpersnom1 = NM_utf8_urldecode($_POST['rsargs'][121]);
            $rp01refpersparen1 = NM_utf8_urldecode($_POST['rsargs'][122]);
            $rp01refperstel1 = NM_utf8_urldecode($_POST['rsargs'][123]);
            $rp01refpersnom2 = NM_utf8_urldecode($_POST['rsargs'][124]);
            $rp01refpersparen2 = NM_utf8_urldecode($_POST['rsargs'][125]);
            $rp01refperstel2 = NM_utf8_urldecode($_POST['rsargs'][126]);
            $rp01tipovivienda = NM_utf8_urldecode($_POST['rsargs'][127]);
            $rp01serviciosbasicos = NM_utf8_urldecode($_POST['rsargs'][128]);
            $rp01viviendadetalle = NM_utf8_urldecode($_POST['rsargs'][129]);
            $rp01dormitorios = NM_utf8_urldecode($_POST['rsargs'][130]);
            $rp01sala = NM_utf8_urldecode($_POST['rsargs'][131]);
            $rp01comedor = NM_utf8_urldecode($_POST['rsargs'][132]);
            $rp01banos = NM_utf8_urldecode($_POST['rsargs'][133]);
            $rp01estudiosrealizados = NM_utf8_urldecode($_POST['rsargs'][134]);
            $rp01ruta1 = NM_utf8_urldecode($_POST['rsargs'][135]);
            $rp01ruta2 = NM_utf8_urldecode($_POST['rsargs'][136]);
            $rp01ruta3 = NM_utf8_urldecode($_POST['rsargs'][137]);
            $rp01actividadesextras = NM_utf8_urldecode($_POST['rsargs'][138]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][139]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][140]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][141]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][142]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][143]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][144]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][145]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][146]);
        }
        if ('ajax_form_maeemp_navigate_form' == $_POST['rs'])
        {
            $rp01noemp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_fast_search = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nmgp_cond_fast_search = NM_utf8_urldecode($_POST['rsargs'][5]);
            $nmgp_arg_fast_search = NM_utf8_urldecode($_POST['rsargs'][6]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][7]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][8]);
        }
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
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_parms']);
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
               nm_limpa_str_form_maeemp($cadapar[1]);
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
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_maeemp']['parms']);
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
    if (isset($script_case_init) && $script_case_init != preg_replace('/[^0-9.]/', '', $script_case_init))
    {
        unset($script_case_init);
    }
    if (!isset($script_case_init) || empty($script_case_init) || is_array($script_case_init))
    {
        $script_case_init = rand(2, 10000);
    }
    $salva_run = "N";
    $salva_iframe = false;
    if (isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_maeemp']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe']);
    }
    if (isset($nm_run_menu) && $nm_run_menu == 1)
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_maeemp";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_maeemp' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
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
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_maeemp')
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_modal'] = true;
            $nm_url_saida = "form_maeemp_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan'] = true;
    }
    if (!isset($nm_apl_dependente)) {
        $nm_apl_dependente = 0;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/form_maeemp/'))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['form_maeemp']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/form_maeemp_erro.php");
    $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Konqueror") ;
    if (is_int($nm_browser))   
    {
        $nm_browser = "Konqueror"; 
    } 
    else  
    {
        $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Opera") ;
        if (is_int($nm_browser))   
        {
            $nm_browser = "Opera"; 
        }
    } 
    $_SESSION['scriptcase']['change_regional_old'] = '';
    $_SESSION['scriptcase']['change_regional_new'] = '';
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_lang_t" || $nmgp_opcao == "change_lang_b" || $nmgp_opcao == "change_lang_f" || $nmgp_opcao == "force_lang"))  
    {
        $Temp_lang = $nmgp_opcao == "force_lang" ? explode(";" , $nmgp_idioma) : explode(";" , $nmgp_idioma_novo);  
        if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
        { 
            $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
        } 
        if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
        { 
            $_SESSION['scriptcase']['change_regional_old'] = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "es_us";
            $_SESSION['scriptcase']['str_conf_reg']        = $Temp_lang[1];
            $_SESSION['scriptcase']['change_regional_new'] = $_SESSION['scriptcase']['str_conf_reg'];
        } 
        $nmgp_opcao = $nmgp_opcao == "force_lang" ? "inicio" : "igual";
    } 
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_schema_t" || $nmgp_opcao == "change_schema_b" || $nmgp_opcao == "change_schema_f"))  
    {
        if ($nmgp_opcao == "change_schema_t")  
        {
            $nmgp_schema = $nmgp_schema_t . "/" . $nmgp_schema_t;  
        } 
        elseif ($nmgp_opcao == "change_schema_b")  
        {
            $nmgp_schema = $nmgp_schema_b . "/" . $nmgp_schema_b;  
        } 
        else 
        {
            $nmgp_schema = $nmgp_schema_f . "/" . $nmgp_schema_f;  
        } 
        $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
        $nmgp_opcao = "recarga";  
    } 
    if (!empty($nmgp_opcao) && $nmgp_opcao == "lookup")  
    {
        $nm_opc_lookup = $nmgp_opcao;
    }
    elseif (!empty($nmgp_opcao) && $nmgp_opcao == "formphp")  
    {
        $nm_opc_form_php = $nmgp_opcao;
    }
    else
    {
        if (!empty($nmgp_opcao))  
        {
            $_SESSION['sc_session'][$script_case_init]['form_maeemp']['opcao'] = $nmgp_opcao ; 
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_redirect_tp'] = "";
            $nm_url_saida = "form_maeemp_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "form_maeemp_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_maeemp']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_maeemp']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['form_maeemp']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_maeemp']['retorno_edit'] . "?script_case_init=" . $script_case_init;  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['form_maeemp']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "form_maeemp_fim.php"; 
                $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
                if ($nm_apl_dependente == 1) 
                { 
                    $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
                } 
                if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
                { 
                    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['scriptcase']['nm_sc_retorno']; 
                } 
            } 
        }
        if (empty($_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['form_maeemp']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_maeemp']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_maeemp']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init; 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maeemp']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['form_maeemp']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_modal'] = true;
             $nm_url_saida = "form_maeemp_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_maeemp']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_form_maeemp = new form_maeemp_edit();
    $inicial_form_maeemp->inicializa();

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/form_maeemp_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/form_maeemp_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_form_maeemp_validate_rp01noemp");
    sajax_export("ajax_form_maeemp_validate_rp01division");
    sajax_export("ajax_form_maeemp_validate_rp01depto");
    sajax_export("ajax_form_maeemp_validate_rp01seccion");
    sajax_export("ajax_form_maeemp_validate_rp01noemp1");
    sajax_export("ajax_form_maeemp_validate_rp01nombreemp");
    sajax_export("ajax_form_maeemp_validate_rp01categoria");
    sajax_export("ajax_form_maeemp_validate_rp01turno");
    sajax_export("ajax_form_maeemp_validate_rp01statusemp");
    sajax_export("ajax_form_maeemp_validate_rp01fechastatus");
    sajax_export("ajax_form_maeemp_validate_rp01causaretiro");
    sajax_export("ajax_form_maeemp_validate_rp01direccion");
    sajax_export("ajax_form_maeemp_validate_rp01telefono");
    sajax_export("ajax_form_maeemp_validate_rp01lugarnacimiento");
    sajax_export("ajax_form_maeemp_validate_rp01fechanacimiento");
    sajax_export("ajax_form_maeemp_validate_rp01nacionalidad");
    sajax_export("ajax_form_maeemp_validate_rp01cedula");
    sajax_export("ajax_form_maeemp_validate_rp01noiess");
    sajax_export("ajax_form_maeemp_validate_rp01sexo");
    sajax_export("ajax_form_maeemp_validate_rp01nolibreta");
    sajax_export("ajax_form_maeemp_validate_rp01profesion");
    sajax_export("ajax_form_maeemp_validate_rp01fechaingreso");
    sajax_export("ajax_form_maeemp_validate_rp01fechareingreso");
    sajax_export("ajax_form_maeemp_validate_rp01cargo");
    sajax_export("ajax_form_maeemp_validate_rp01estadocivil");
    sajax_export("ajax_form_maeemp_validate_rp01rebajaxcasado");
    sajax_export("ajax_form_maeemp_validate_rp01nombreconyuge");
    sajax_export("ajax_form_maeemp_validate_rp01nombrepadre");
    sajax_export("ajax_form_maeemp_validate_rp01nombremadre");
    sajax_export("ajax_form_maeemp_validate_rp01nohijos");
    sajax_export("ajax_form_maeemp_validate_rp01fechahijos0");
    sajax_export("ajax_form_maeemp_validate_rp01sexohijos0");
    sajax_export("ajax_form_maeemp_validate_rp01fechahijos1");
    sajax_export("ajax_form_maeemp_validate_rp01sexohijos1");
    sajax_export("ajax_form_maeemp_validate_rp01fechahijos2");
    sajax_export("ajax_form_maeemp_validate_rp01sexohijos2");
    sajax_export("ajax_form_maeemp_validate_rp01fechahijos3");
    sajax_export("ajax_form_maeemp_validate_rp01sexohijos3");
    sajax_export("ajax_form_maeemp_validate_rp01fechahijos4");
    sajax_export("ajax_form_maeemp_validate_rp01sexohijos4");
    sajax_export("ajax_form_maeemp_validate_rp01fechahijos5");
    sajax_export("ajax_form_maeemp_validate_rp01sexohijos5");
    sajax_export("ajax_form_maeemp_validate_rp01fechahijos6");
    sajax_export("ajax_form_maeemp_validate_rp01sexohijos6");
    sajax_export("ajax_form_maeemp_validate_rp01fechahijos7");
    sajax_export("ajax_form_maeemp_validate_rp01sexohijos7");
    sajax_export("ajax_form_maeemp_validate_rp01fechahijos8");
    sajax_export("ajax_form_maeemp_validate_rp01sexohijos8");
    sajax_export("ajax_form_maeemp_validate_rp01fechahijos9");
    sajax_export("ajax_form_maeemp_validate_rp01sexohijos9");
    sajax_export("ajax_form_maeemp_validate_rp01cargaspadres");
    sajax_export("ajax_form_maeemp_validate_rp01otrascargas");
    sajax_export("ajax_form_maeemp_validate_rp01formapago");
    sajax_export("ajax_form_maeemp_validate_rp01nobancoemp");
    sajax_export("ajax_form_maeemp_validate_rp01ctabancoemp");
    sajax_export("ajax_form_maeemp_validate_rp01tipoctabco");
    sajax_export("ajax_form_maeemp_validate_rp01fechaultvacacion");
    sajax_export("ajax_form_maeemp_validate_rp01aporte");
    sajax_export("ajax_form_maeemp_validate_rp01socio");
    sajax_export("ajax_form_maeemp_validate_rp01transporte");
    sajax_export("ajax_form_maeemp_validate_rp01recibeporc");
    sajax_export("ajax_form_maeemp_validate_rp01sueldoanterior");
    sajax_export("ajax_form_maeemp_validate_rp01sueldosalario");
    sajax_export("ajax_form_maeemp_validate_rp01fecmodsdosal");
    sajax_export("ajax_form_maeemp_validate_rp01fecmodficha");
    sajax_export("ajax_form_maeemp_validate_rp01faltasinjust");
    sajax_export("ajax_form_maeemp_validate_rp01ingresos1er");
    sajax_export("ajax_form_maeemp_validate_rp01basesocialvalor");
    sajax_export("ajax_form_maeemp_validate_rp01basesocialtiempo");
    sajax_export("ajax_form_maeemp_validate_rp0114vopagoacum");
    sajax_export("ajax_form_maeemp_validate_rp0115vopagoacum");
    sajax_export("ajax_form_maeemp_validate_rp01cverrorliq");
    sajax_export("ajax_form_maeemp_validate_rp01porcentliq");
    sajax_export("ajax_form_maeemp_validate_rp01tiposangre");
    sajax_export("ajax_form_maeemp_validate_rp01ingresos2do");
    sajax_export("ajax_form_maeemp_validate_rp01provdiremp");
    sajax_export("ajax_form_maeemp_validate_rp01cantondiremp");
    sajax_export("ajax_form_maeemp_validate_rp01ciudaddiremp");
    sajax_export("ajax_form_maeemp_validate_rp01codocupacion");
    sajax_export("ajax_form_maeemp_validate_uid");
    sajax_export("ajax_form_maeemp_validate_block");
    sajax_export("ajax_form_maeemp_validate_ultimoacceso");
    sajax_export("ajax_form_maeemp_validate_rp01foto");
    sajax_export("ajax_form_maeemp_validate_rp01ctacontable");
    sajax_export("ajax_form_maeemp_validate_rp01email");
    sajax_export("ajax_form_maeemp_validate_rp01passwd");
    sajax_export("ajax_form_maeemp_validate_rp01huella");
    sajax_export("ajax_form_maeemp_validate_rp01recibefr");
    sajax_export("ajax_form_maeemp_validate_rp01recibedt");
    sajax_export("ajax_form_maeemp_validate_rp01recibedc");
    sajax_export("ajax_form_maeemp_validate_rp01uid");
    sajax_export("ajax_form_maeemp_validate_rp01fechauid");
    sajax_export("ajax_form_maeemp_validate_rp01obs");
    sajax_export("ajax_form_maeemp_validate_rp01cauliq");
    sajax_export("ajax_form_maeemp_validate_rp01discapacidad");
    sajax_export("ajax_form_maeemp_validate_rp01conadis");
    sajax_export("ajax_form_maeemp_validate_rp01tpdiscapacidad");
    sajax_export("ajax_form_maeemp_validate_rp01prdiscapacidad");
    sajax_export("ajax_form_maeemp_validate_rp01freserva");
    sajax_export("ajax_form_maeemp_validate_rp01codsectorial");
    sajax_export("ajax_form_maeemp_validate_anticipoporvalor");
    sajax_export("ajax_form_maeemp_validate_tipidret");
    sajax_export("ajax_form_maeemp_validate_residenciatrab");
    sajax_export("ajax_form_maeemp_validate_paisresidencia");
    sajax_export("ajax_form_maeemp_validate_aplicaconvenio");
    sajax_export("ajax_form_maeemp_validate_tipotrabajdiscap");
    sajax_export("ajax_form_maeemp_validate_porcentajediscap");
    sajax_export("ajax_form_maeemp_validate_tipiddiscap");
    sajax_export("ajax_form_maeemp_validate_iddiscap");
    sajax_export("ajax_form_maeemp_validate_rp01varias_secciones");
    sajax_export("ajax_form_maeemp_validate_rp01cc");
    sajax_export("ajax_form_maeemp_validate_rp01observacion");
    sajax_export("ajax_form_maeemp_validate_rp01iessconyugue");
    sajax_export("ajax_form_maeemp_validate_rp01tiporefrigerio");
    sajax_export("ajax_form_maeemp_validate_idiomas");
    sajax_export("ajax_form_maeemp_validate_emergencias");
    sajax_export("ajax_form_maeemp_validate_rp01tipojornada");
    sajax_export("ajax_form_maeemp_validate_rp01numero_horas");
    sajax_export("ajax_form_maeemp_validate_rp01emailpersonal");
    sajax_export("ajax_form_maeemp_validate_rp01supervisadopor");
    sajax_export("ajax_form_maeemp_validate_rp01zonaderiesgo");
    sajax_export("ajax_form_maeemp_validate_rp01refpersnom1");
    sajax_export("ajax_form_maeemp_validate_rp01refpersparen1");
    sajax_export("ajax_form_maeemp_validate_rp01refperstel1");
    sajax_export("ajax_form_maeemp_validate_rp01refpersnom2");
    sajax_export("ajax_form_maeemp_validate_rp01refpersparen2");
    sajax_export("ajax_form_maeemp_validate_rp01refperstel2");
    sajax_export("ajax_form_maeemp_validate_rp01tipovivienda");
    sajax_export("ajax_form_maeemp_validate_rp01serviciosbasicos");
    sajax_export("ajax_form_maeemp_validate_rp01viviendadetalle");
    sajax_export("ajax_form_maeemp_validate_rp01dormitorios");
    sajax_export("ajax_form_maeemp_validate_rp01sala");
    sajax_export("ajax_form_maeemp_validate_rp01comedor");
    sajax_export("ajax_form_maeemp_validate_rp01banos");
    sajax_export("ajax_form_maeemp_validate_rp01estudiosrealizados");
    sajax_export("ajax_form_maeemp_validate_rp01ruta1");
    sajax_export("ajax_form_maeemp_validate_rp01ruta2");
    sajax_export("ajax_form_maeemp_validate_rp01ruta3");
    sajax_export("ajax_form_maeemp_validate_rp01actividadesextras");
    sajax_export("ajax_form_maeemp_submit_form");
    sajax_export("ajax_form_maeemp_navigate_form");
    sajax_handle_client_request();

    if (isset($_POST['wizard_action']) && 'change_step' == $_POST['wizard_action']) {
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'] = true;
        ob_start();
    }

    $inicial_form_maeemp->contr_form_maeemp->controle();
//
    function nm_limpa_str_form_maeemp(&$str)
    {
    }

    function ajax_form_maeemp_validate_rp01noemp($rp01noemp, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01noemp';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01noemp' => NM_utf8_urldecode($rp01noemp),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01noemp

    function ajax_form_maeemp_validate_rp01division($rp01division, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01division';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01division' => NM_utf8_urldecode($rp01division),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01division

    function ajax_form_maeemp_validate_rp01depto($rp01depto, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01depto';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01depto' => NM_utf8_urldecode($rp01depto),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01depto

    function ajax_form_maeemp_validate_rp01seccion($rp01seccion, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01seccion';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01seccion' => NM_utf8_urldecode($rp01seccion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01seccion

    function ajax_form_maeemp_validate_rp01noemp1($rp01noemp1, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01noemp1';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01noemp1' => NM_utf8_urldecode($rp01noemp1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01noemp1

    function ajax_form_maeemp_validate_rp01nombreemp($rp01nombreemp, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01nombreemp';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01nombreemp' => NM_utf8_urldecode($rp01nombreemp),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01nombreemp

    function ajax_form_maeemp_validate_rp01categoria($rp01categoria, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01categoria';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01categoria' => NM_utf8_urldecode($rp01categoria),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01categoria

    function ajax_form_maeemp_validate_rp01turno($rp01turno, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01turno';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01turno' => NM_utf8_urldecode($rp01turno),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01turno

    function ajax_form_maeemp_validate_rp01statusemp($rp01statusemp, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01statusemp';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01statusemp' => NM_utf8_urldecode($rp01statusemp),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01statusemp

    function ajax_form_maeemp_validate_rp01fechastatus($rp01fechastatus, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechastatus';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechastatus' => NM_utf8_urldecode($rp01fechastatus),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechastatus

    function ajax_form_maeemp_validate_rp01causaretiro($rp01causaretiro, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01causaretiro';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01causaretiro' => NM_utf8_urldecode($rp01causaretiro),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01causaretiro

    function ajax_form_maeemp_validate_rp01direccion($rp01direccion, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01direccion';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01direccion' => NM_utf8_urldecode($rp01direccion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01direccion

    function ajax_form_maeemp_validate_rp01telefono($rp01telefono, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01telefono';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01telefono' => NM_utf8_urldecode($rp01telefono),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01telefono

    function ajax_form_maeemp_validate_rp01lugarnacimiento($rp01lugarnacimiento, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01lugarnacimiento';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01lugarnacimiento' => NM_utf8_urldecode($rp01lugarnacimiento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01lugarnacimiento

    function ajax_form_maeemp_validate_rp01fechanacimiento($rp01fechanacimiento, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechanacimiento';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechanacimiento' => NM_utf8_urldecode($rp01fechanacimiento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechanacimiento

    function ajax_form_maeemp_validate_rp01nacionalidad($rp01nacionalidad, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01nacionalidad';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01nacionalidad' => NM_utf8_urldecode($rp01nacionalidad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01nacionalidad

    function ajax_form_maeemp_validate_rp01cedula($rp01cedula, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01cedula';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01cedula' => NM_utf8_urldecode($rp01cedula),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01cedula

    function ajax_form_maeemp_validate_rp01noiess($rp01noiess, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01noiess';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01noiess' => NM_utf8_urldecode($rp01noiess),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01noiess

    function ajax_form_maeemp_validate_rp01sexo($rp01sexo, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexo';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexo' => NM_utf8_urldecode($rp01sexo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexo

    function ajax_form_maeemp_validate_rp01nolibreta($rp01nolibreta, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01nolibreta';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01nolibreta' => NM_utf8_urldecode($rp01nolibreta),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01nolibreta

    function ajax_form_maeemp_validate_rp01profesion($rp01profesion, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01profesion';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01profesion' => NM_utf8_urldecode($rp01profesion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01profesion

    function ajax_form_maeemp_validate_rp01fechaingreso($rp01fechaingreso, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechaingreso';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechaingreso' => NM_utf8_urldecode($rp01fechaingreso),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechaingreso

    function ajax_form_maeemp_validate_rp01fechareingreso($rp01fechareingreso, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechareingreso';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechareingreso' => NM_utf8_urldecode($rp01fechareingreso),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechareingreso

    function ajax_form_maeemp_validate_rp01cargo($rp01cargo, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01cargo';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01cargo' => NM_utf8_urldecode($rp01cargo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01cargo

    function ajax_form_maeemp_validate_rp01estadocivil($rp01estadocivil, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01estadocivil';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01estadocivil' => NM_utf8_urldecode($rp01estadocivil),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01estadocivil

    function ajax_form_maeemp_validate_rp01rebajaxcasado($rp01rebajaxcasado, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01rebajaxcasado';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01rebajaxcasado' => NM_utf8_urldecode($rp01rebajaxcasado),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01rebajaxcasado

    function ajax_form_maeemp_validate_rp01nombreconyuge($rp01nombreconyuge, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01nombreconyuge';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01nombreconyuge' => NM_utf8_urldecode($rp01nombreconyuge),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01nombreconyuge

    function ajax_form_maeemp_validate_rp01nombrepadre($rp01nombrepadre, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01nombrepadre';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01nombrepadre' => NM_utf8_urldecode($rp01nombrepadre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01nombrepadre

    function ajax_form_maeemp_validate_rp01nombremadre($rp01nombremadre, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01nombremadre';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01nombremadre' => NM_utf8_urldecode($rp01nombremadre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01nombremadre

    function ajax_form_maeemp_validate_rp01nohijos($rp01nohijos, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01nohijos';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01nohijos' => NM_utf8_urldecode($rp01nohijos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01nohijos

    function ajax_form_maeemp_validate_rp01fechahijos0($rp01fechahijos0, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechahijos0';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechahijos0' => NM_utf8_urldecode($rp01fechahijos0),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechahijos0

    function ajax_form_maeemp_validate_rp01sexohijos0($rp01sexohijos0, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexohijos0';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexohijos0' => NM_utf8_urldecode($rp01sexohijos0),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexohijos0

    function ajax_form_maeemp_validate_rp01fechahijos1($rp01fechahijos1, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechahijos1';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechahijos1' => NM_utf8_urldecode($rp01fechahijos1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechahijos1

    function ajax_form_maeemp_validate_rp01sexohijos1($rp01sexohijos1, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexohijos1';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexohijos1' => NM_utf8_urldecode($rp01sexohijos1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexohijos1

    function ajax_form_maeemp_validate_rp01fechahijos2($rp01fechahijos2, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechahijos2';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechahijos2' => NM_utf8_urldecode($rp01fechahijos2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechahijos2

    function ajax_form_maeemp_validate_rp01sexohijos2($rp01sexohijos2, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexohijos2';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexohijos2' => NM_utf8_urldecode($rp01sexohijos2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexohijos2

    function ajax_form_maeemp_validate_rp01fechahijos3($rp01fechahijos3, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechahijos3';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechahijos3' => NM_utf8_urldecode($rp01fechahijos3),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechahijos3

    function ajax_form_maeemp_validate_rp01sexohijos3($rp01sexohijos3, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexohijos3';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexohijos3' => NM_utf8_urldecode($rp01sexohijos3),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexohijos3

    function ajax_form_maeemp_validate_rp01fechahijos4($rp01fechahijos4, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechahijos4';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechahijos4' => NM_utf8_urldecode($rp01fechahijos4),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechahijos4

    function ajax_form_maeemp_validate_rp01sexohijos4($rp01sexohijos4, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexohijos4';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexohijos4' => NM_utf8_urldecode($rp01sexohijos4),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexohijos4

    function ajax_form_maeemp_validate_rp01fechahijos5($rp01fechahijos5, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechahijos5';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechahijos5' => NM_utf8_urldecode($rp01fechahijos5),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechahijos5

    function ajax_form_maeemp_validate_rp01sexohijos5($rp01sexohijos5, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexohijos5';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexohijos5' => NM_utf8_urldecode($rp01sexohijos5),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexohijos5

    function ajax_form_maeemp_validate_rp01fechahijos6($rp01fechahijos6, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechahijos6';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechahijos6' => NM_utf8_urldecode($rp01fechahijos6),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechahijos6

    function ajax_form_maeemp_validate_rp01sexohijos6($rp01sexohijos6, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexohijos6';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexohijos6' => NM_utf8_urldecode($rp01sexohijos6),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexohijos6

    function ajax_form_maeemp_validate_rp01fechahijos7($rp01fechahijos7, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechahijos7';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechahijos7' => NM_utf8_urldecode($rp01fechahijos7),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechahijos7

    function ajax_form_maeemp_validate_rp01sexohijos7($rp01sexohijos7, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexohijos7';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexohijos7' => NM_utf8_urldecode($rp01sexohijos7),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexohijos7

    function ajax_form_maeemp_validate_rp01fechahijos8($rp01fechahijos8, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechahijos8';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechahijos8' => NM_utf8_urldecode($rp01fechahijos8),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechahijos8

    function ajax_form_maeemp_validate_rp01sexohijos8($rp01sexohijos8, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexohijos8';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexohijos8' => NM_utf8_urldecode($rp01sexohijos8),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexohijos8

    function ajax_form_maeemp_validate_rp01fechahijos9($rp01fechahijos9, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechahijos9';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechahijos9' => NM_utf8_urldecode($rp01fechahijos9),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechahijos9

    function ajax_form_maeemp_validate_rp01sexohijos9($rp01sexohijos9, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sexohijos9';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sexohijos9' => NM_utf8_urldecode($rp01sexohijos9),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sexohijos9

    function ajax_form_maeemp_validate_rp01cargaspadres($rp01cargaspadres, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01cargaspadres';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01cargaspadres' => NM_utf8_urldecode($rp01cargaspadres),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01cargaspadres

    function ajax_form_maeemp_validate_rp01otrascargas($rp01otrascargas, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01otrascargas';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01otrascargas' => NM_utf8_urldecode($rp01otrascargas),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01otrascargas

    function ajax_form_maeemp_validate_rp01formapago($rp01formapago, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01formapago';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01formapago' => NM_utf8_urldecode($rp01formapago),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01formapago

    function ajax_form_maeemp_validate_rp01nobancoemp($rp01nobancoemp, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01nobancoemp';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01nobancoemp' => NM_utf8_urldecode($rp01nobancoemp),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01nobancoemp

    function ajax_form_maeemp_validate_rp01ctabancoemp($rp01ctabancoemp, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01ctabancoemp';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01ctabancoemp' => NM_utf8_urldecode($rp01ctabancoemp),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01ctabancoemp

    function ajax_form_maeemp_validate_rp01tipoctabco($rp01tipoctabco, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01tipoctabco';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01tipoctabco' => NM_utf8_urldecode($rp01tipoctabco),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01tipoctabco

    function ajax_form_maeemp_validate_rp01fechaultvacacion($rp01fechaultvacacion, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechaultvacacion';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechaultvacacion' => NM_utf8_urldecode($rp01fechaultvacacion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechaultvacacion

    function ajax_form_maeemp_validate_rp01aporte($rp01aporte, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01aporte';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01aporte' => NM_utf8_urldecode($rp01aporte),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01aporte

    function ajax_form_maeemp_validate_rp01socio($rp01socio, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01socio';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01socio' => NM_utf8_urldecode($rp01socio),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01socio

    function ajax_form_maeemp_validate_rp01transporte($rp01transporte, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01transporte';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01transporte' => NM_utf8_urldecode($rp01transporte),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01transporte

    function ajax_form_maeemp_validate_rp01recibeporc($rp01recibeporc, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01recibeporc';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01recibeporc' => NM_utf8_urldecode($rp01recibeporc),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01recibeporc

    function ajax_form_maeemp_validate_rp01sueldoanterior($rp01sueldoanterior, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sueldoanterior';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sueldoanterior' => NM_utf8_urldecode($rp01sueldoanterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sueldoanterior

    function ajax_form_maeemp_validate_rp01sueldosalario($rp01sueldosalario, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sueldosalario';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sueldosalario' => NM_utf8_urldecode($rp01sueldosalario),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sueldosalario

    function ajax_form_maeemp_validate_rp01fecmodsdosal($rp01fecmodsdosal, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fecmodsdosal';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fecmodsdosal' => NM_utf8_urldecode($rp01fecmodsdosal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fecmodsdosal

    function ajax_form_maeemp_validate_rp01fecmodficha($rp01fecmodficha, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fecmodficha';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fecmodficha' => NM_utf8_urldecode($rp01fecmodficha),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fecmodficha

    function ajax_form_maeemp_validate_rp01faltasinjust($rp01faltasinjust, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01faltasinjust';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01faltasinjust' => NM_utf8_urldecode($rp01faltasinjust),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01faltasinjust

    function ajax_form_maeemp_validate_rp01ingresos1er($rp01ingresos1er, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01ingresos1er';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01ingresos1er' => NM_utf8_urldecode($rp01ingresos1er),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01ingresos1er

    function ajax_form_maeemp_validate_rp01basesocialvalor($rp01basesocialvalor, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01basesocialvalor';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01basesocialvalor' => NM_utf8_urldecode($rp01basesocialvalor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01basesocialvalor

    function ajax_form_maeemp_validate_rp01basesocialtiempo($rp01basesocialtiempo, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01basesocialtiempo';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01basesocialtiempo' => NM_utf8_urldecode($rp01basesocialtiempo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01basesocialtiempo

    function ajax_form_maeemp_validate_rp0114vopagoacum($rp0114vopagoacum, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp0114vopagoacum';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp0114vopagoacum' => NM_utf8_urldecode($rp0114vopagoacum),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp0114vopagoacum

    function ajax_form_maeemp_validate_rp0115vopagoacum($rp0115vopagoacum, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp0115vopagoacum';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp0115vopagoacum' => NM_utf8_urldecode($rp0115vopagoacum),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp0115vopagoacum

    function ajax_form_maeemp_validate_rp01cverrorliq($rp01cverrorliq, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01cverrorliq';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01cverrorliq' => NM_utf8_urldecode($rp01cverrorliq),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01cverrorliq

    function ajax_form_maeemp_validate_rp01porcentliq($rp01porcentliq, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01porcentliq';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01porcentliq' => NM_utf8_urldecode($rp01porcentliq),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01porcentliq

    function ajax_form_maeemp_validate_rp01tiposangre($rp01tiposangre, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01tiposangre';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01tiposangre' => NM_utf8_urldecode($rp01tiposangre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01tiposangre

    function ajax_form_maeemp_validate_rp01ingresos2do($rp01ingresos2do, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01ingresos2do';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01ingresos2do' => NM_utf8_urldecode($rp01ingresos2do),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01ingresos2do

    function ajax_form_maeemp_validate_rp01provdiremp($rp01provdiremp, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01provdiremp';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01provdiremp' => NM_utf8_urldecode($rp01provdiremp),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01provdiremp

    function ajax_form_maeemp_validate_rp01cantondiremp($rp01cantondiremp, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01cantondiremp';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01cantondiremp' => NM_utf8_urldecode($rp01cantondiremp),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01cantondiremp

    function ajax_form_maeemp_validate_rp01ciudaddiremp($rp01ciudaddiremp, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01ciudaddiremp';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01ciudaddiremp' => NM_utf8_urldecode($rp01ciudaddiremp),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01ciudaddiremp

    function ajax_form_maeemp_validate_rp01codocupacion($rp01codocupacion, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01codocupacion';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01codocupacion' => NM_utf8_urldecode($rp01codocupacion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01codocupacion

    function ajax_form_maeemp_validate_uid($uid, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_uid';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'uid' => NM_utf8_urldecode($uid),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_uid

    function ajax_form_maeemp_validate_block($block, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_block';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'block' => NM_utf8_urldecode($block),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_block

    function ajax_form_maeemp_validate_ultimoacceso($ultimoacceso, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_ultimoacceso';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'ultimoacceso' => NM_utf8_urldecode($ultimoacceso),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_ultimoacceso

    function ajax_form_maeemp_validate_rp01foto($rp01foto, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01foto';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01foto' => NM_utf8_urldecode($rp01foto),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01foto

    function ajax_form_maeemp_validate_rp01ctacontable($rp01ctacontable, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01ctacontable';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01ctacontable' => NM_utf8_urldecode($rp01ctacontable),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01ctacontable

    function ajax_form_maeemp_validate_rp01email($rp01email, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01email';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01email' => NM_utf8_urldecode($rp01email),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01email

    function ajax_form_maeemp_validate_rp01passwd($rp01passwd, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01passwd';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01passwd' => NM_utf8_urldecode($rp01passwd),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01passwd

    function ajax_form_maeemp_validate_rp01huella($rp01huella, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01huella';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01huella' => NM_utf8_urldecode($rp01huella),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01huella

    function ajax_form_maeemp_validate_rp01recibefr($rp01recibefr, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01recibefr';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01recibefr' => NM_utf8_urldecode($rp01recibefr),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01recibefr

    function ajax_form_maeemp_validate_rp01recibedt($rp01recibedt, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01recibedt';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01recibedt' => NM_utf8_urldecode($rp01recibedt),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01recibedt

    function ajax_form_maeemp_validate_rp01recibedc($rp01recibedc, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01recibedc';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01recibedc' => NM_utf8_urldecode($rp01recibedc),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01recibedc

    function ajax_form_maeemp_validate_rp01uid($rp01uid, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01uid';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01uid' => NM_utf8_urldecode($rp01uid),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01uid

    function ajax_form_maeemp_validate_rp01fechauid($rp01fechauid, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01fechauid';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01fechauid' => NM_utf8_urldecode($rp01fechauid),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01fechauid

    function ajax_form_maeemp_validate_rp01obs($rp01obs, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01obs';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01obs' => NM_utf8_urldecode($rp01obs),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01obs

    function ajax_form_maeemp_validate_rp01cauliq($rp01cauliq, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01cauliq';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01cauliq' => NM_utf8_urldecode($rp01cauliq),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01cauliq

    function ajax_form_maeemp_validate_rp01discapacidad($rp01discapacidad, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01discapacidad';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01discapacidad' => NM_utf8_urldecode($rp01discapacidad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01discapacidad

    function ajax_form_maeemp_validate_rp01conadis($rp01conadis, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01conadis';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01conadis' => NM_utf8_urldecode($rp01conadis),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01conadis

    function ajax_form_maeemp_validate_rp01tpdiscapacidad($rp01tpdiscapacidad, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01tpdiscapacidad';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01tpdiscapacidad' => NM_utf8_urldecode($rp01tpdiscapacidad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01tpdiscapacidad

    function ajax_form_maeemp_validate_rp01prdiscapacidad($rp01prdiscapacidad, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01prdiscapacidad';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01prdiscapacidad' => NM_utf8_urldecode($rp01prdiscapacidad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01prdiscapacidad

    function ajax_form_maeemp_validate_rp01freserva($rp01freserva, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01freserva';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01freserva' => NM_utf8_urldecode($rp01freserva),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01freserva

    function ajax_form_maeemp_validate_rp01codsectorial($rp01codsectorial, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01codsectorial';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01codsectorial' => NM_utf8_urldecode($rp01codsectorial),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01codsectorial

    function ajax_form_maeemp_validate_anticipoporvalor($anticipoporvalor, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_anticipoporvalor';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'anticipoporvalor' => NM_utf8_urldecode($anticipoporvalor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_anticipoporvalor

    function ajax_form_maeemp_validate_tipidret($tipidret, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_tipidret';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'tipidret' => NM_utf8_urldecode($tipidret),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_tipidret

    function ajax_form_maeemp_validate_residenciatrab($residenciatrab, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_residenciatrab';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'residenciatrab' => NM_utf8_urldecode($residenciatrab),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_residenciatrab

    function ajax_form_maeemp_validate_paisresidencia($paisresidencia, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_paisresidencia';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'paisresidencia' => NM_utf8_urldecode($paisresidencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_paisresidencia

    function ajax_form_maeemp_validate_aplicaconvenio($aplicaconvenio, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_aplicaconvenio';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'aplicaconvenio' => NM_utf8_urldecode($aplicaconvenio),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_aplicaconvenio

    function ajax_form_maeemp_validate_tipotrabajdiscap($tipotrabajdiscap, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_tipotrabajdiscap';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'tipotrabajdiscap' => NM_utf8_urldecode($tipotrabajdiscap),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_tipotrabajdiscap

    function ajax_form_maeemp_validate_porcentajediscap($porcentajediscap, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_porcentajediscap';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'porcentajediscap' => NM_utf8_urldecode($porcentajediscap),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_porcentajediscap

    function ajax_form_maeemp_validate_tipiddiscap($tipiddiscap, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_tipiddiscap';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'tipiddiscap' => NM_utf8_urldecode($tipiddiscap),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_tipiddiscap

    function ajax_form_maeemp_validate_iddiscap($iddiscap, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_iddiscap';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'iddiscap' => NM_utf8_urldecode($iddiscap),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_iddiscap

    function ajax_form_maeemp_validate_rp01varias_secciones($rp01varias_secciones, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01varias_secciones';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01varias_secciones' => NM_utf8_urldecode($rp01varias_secciones),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01varias_secciones

    function ajax_form_maeemp_validate_rp01cc($rp01cc, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01cc';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01cc' => NM_utf8_urldecode($rp01cc),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01cc

    function ajax_form_maeemp_validate_rp01observacion($rp01observacion, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01observacion';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01observacion' => NM_utf8_urldecode($rp01observacion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01observacion

    function ajax_form_maeemp_validate_rp01iessconyugue($rp01iessconyugue, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01iessconyugue';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01iessconyugue' => NM_utf8_urldecode($rp01iessconyugue),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01iessconyugue

    function ajax_form_maeemp_validate_rp01tiporefrigerio($rp01tiporefrigerio, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01tiporefrigerio';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01tiporefrigerio' => NM_utf8_urldecode($rp01tiporefrigerio),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01tiporefrigerio

    function ajax_form_maeemp_validate_idiomas($idiomas, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_idiomas';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'idiomas' => NM_utf8_urldecode($idiomas),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_idiomas

    function ajax_form_maeemp_validate_emergencias($emergencias, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_emergencias';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'emergencias' => NM_utf8_urldecode($emergencias),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_emergencias

    function ajax_form_maeemp_validate_rp01tipojornada($rp01tipojornada, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01tipojornada';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01tipojornada' => NM_utf8_urldecode($rp01tipojornada),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01tipojornada

    function ajax_form_maeemp_validate_rp01numero_horas($rp01numero_horas, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01numero_horas';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01numero_horas' => NM_utf8_urldecode($rp01numero_horas),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01numero_horas

    function ajax_form_maeemp_validate_rp01emailpersonal($rp01emailpersonal, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01emailpersonal';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01emailpersonal' => NM_utf8_urldecode($rp01emailpersonal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01emailpersonal

    function ajax_form_maeemp_validate_rp01supervisadopor($rp01supervisadopor, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01supervisadopor';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01supervisadopor' => NM_utf8_urldecode($rp01supervisadopor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01supervisadopor

    function ajax_form_maeemp_validate_rp01zonaderiesgo($rp01zonaderiesgo, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01zonaderiesgo';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01zonaderiesgo' => NM_utf8_urldecode($rp01zonaderiesgo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01zonaderiesgo

    function ajax_form_maeemp_validate_rp01refpersnom1($rp01refpersnom1, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01refpersnom1';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01refpersnom1' => NM_utf8_urldecode($rp01refpersnom1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01refpersnom1

    function ajax_form_maeemp_validate_rp01refpersparen1($rp01refpersparen1, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01refpersparen1';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01refpersparen1' => NM_utf8_urldecode($rp01refpersparen1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01refpersparen1

    function ajax_form_maeemp_validate_rp01refperstel1($rp01refperstel1, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01refperstel1';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01refperstel1' => NM_utf8_urldecode($rp01refperstel1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01refperstel1

    function ajax_form_maeemp_validate_rp01refpersnom2($rp01refpersnom2, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01refpersnom2';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01refpersnom2' => NM_utf8_urldecode($rp01refpersnom2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01refpersnom2

    function ajax_form_maeemp_validate_rp01refpersparen2($rp01refpersparen2, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01refpersparen2';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01refpersparen2' => NM_utf8_urldecode($rp01refpersparen2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01refpersparen2

    function ajax_form_maeemp_validate_rp01refperstel2($rp01refperstel2, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01refperstel2';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01refperstel2' => NM_utf8_urldecode($rp01refperstel2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01refperstel2

    function ajax_form_maeemp_validate_rp01tipovivienda($rp01tipovivienda, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01tipovivienda';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01tipovivienda' => NM_utf8_urldecode($rp01tipovivienda),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01tipovivienda

    function ajax_form_maeemp_validate_rp01serviciosbasicos($rp01serviciosbasicos, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01serviciosbasicos';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01serviciosbasicos' => NM_utf8_urldecode($rp01serviciosbasicos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01serviciosbasicos

    function ajax_form_maeemp_validate_rp01viviendadetalle($rp01viviendadetalle, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01viviendadetalle';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01viviendadetalle' => NM_utf8_urldecode($rp01viviendadetalle),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01viviendadetalle

    function ajax_form_maeemp_validate_rp01dormitorios($rp01dormitorios, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01dormitorios';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01dormitorios' => NM_utf8_urldecode($rp01dormitorios),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01dormitorios

    function ajax_form_maeemp_validate_rp01sala($rp01sala, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01sala';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01sala' => NM_utf8_urldecode($rp01sala),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01sala

    function ajax_form_maeemp_validate_rp01comedor($rp01comedor, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01comedor';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01comedor' => NM_utf8_urldecode($rp01comedor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01comedor

    function ajax_form_maeemp_validate_rp01banos($rp01banos, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01banos';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01banos' => NM_utf8_urldecode($rp01banos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01banos

    function ajax_form_maeemp_validate_rp01estudiosrealizados($rp01estudiosrealizados, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01estudiosrealizados';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01estudiosrealizados' => NM_utf8_urldecode($rp01estudiosrealizados),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01estudiosrealizados

    function ajax_form_maeemp_validate_rp01ruta1($rp01ruta1, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01ruta1';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01ruta1' => NM_utf8_urldecode($rp01ruta1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01ruta1

    function ajax_form_maeemp_validate_rp01ruta2($rp01ruta2, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01ruta2';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01ruta2' => NM_utf8_urldecode($rp01ruta2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01ruta2

    function ajax_form_maeemp_validate_rp01ruta3($rp01ruta3, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01ruta3';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01ruta3' => NM_utf8_urldecode($rp01ruta3),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01ruta3

    function ajax_form_maeemp_validate_rp01actividadesextras($rp01actividadesextras, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'validate_rp01actividadesextras';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01actividadesextras' => NM_utf8_urldecode($rp01actividadesextras),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_validate_rp01actividadesextras

    function ajax_form_maeemp_submit_form($rp01noemp, $rp01division, $rp01depto, $rp01seccion, $rp01noemp1, $rp01nombreemp, $rp01categoria, $rp01turno, $rp01statusemp, $rp01fechastatus, $rp01causaretiro, $rp01direccion, $rp01telefono, $rp01lugarnacimiento, $rp01fechanacimiento, $rp01nacionalidad, $rp01cedula, $rp01noiess, $rp01sexo, $rp01nolibreta, $rp01profesion, $rp01fechaingreso, $rp01fechareingreso, $rp01cargo, $rp01estadocivil, $rp01rebajaxcasado, $rp01nombreconyuge, $rp01nombrepadre, $rp01nombremadre, $rp01nohijos, $rp01fechahijos0, $rp01sexohijos0, $rp01fechahijos1, $rp01sexohijos1, $rp01fechahijos2, $rp01sexohijos2, $rp01fechahijos3, $rp01sexohijos3, $rp01fechahijos4, $rp01sexohijos4, $rp01fechahijos5, $rp01sexohijos5, $rp01fechahijos6, $rp01sexohijos6, $rp01fechahijos7, $rp01sexohijos7, $rp01fechahijos8, $rp01sexohijos8, $rp01fechahijos9, $rp01sexohijos9, $rp01cargaspadres, $rp01otrascargas, $rp01formapago, $rp01nobancoemp, $rp01ctabancoemp, $rp01tipoctabco, $rp01fechaultvacacion, $rp01aporte, $rp01socio, $rp01transporte, $rp01recibeporc, $rp01sueldoanterior, $rp01sueldosalario, $rp01fecmodsdosal, $rp01fecmodficha, $rp01faltasinjust, $rp01ingresos1er, $rp01basesocialvalor, $rp01basesocialtiempo, $rp0114vopagoacum, $rp0115vopagoacum, $rp01cverrorliq, $rp01porcentliq, $rp01tiposangre, $rp01ingresos2do, $rp01provdiremp, $rp01cantondiremp, $rp01ciudaddiremp, $rp01codocupacion, $uid, $block, $ultimoacceso, $rp01foto, $rp01ctacontable, $rp01email, $rp01passwd, $rp01huella, $rp01recibefr, $rp01recibedt, $rp01recibedc, $rp01uid, $rp01fechauid, $rp01obs, $rp01cauliq, $rp01discapacidad, $rp01conadis, $rp01tpdiscapacidad, $rp01prdiscapacidad, $rp01freserva, $rp01codsectorial, $anticipoporvalor, $tipidret, $residenciatrab, $paisresidencia, $aplicaconvenio, $tipotrabajdiscap, $porcentajediscap, $tipiddiscap, $iddiscap, $rp01varias_secciones, $rp01cc, $rp01observacion, $rp01iessconyugue, $rp01tiporefrigerio, $idiomas, $emergencias, $rp01tipojornada, $rp01numero_horas, $rp01emailpersonal, $rp01supervisadopor, $rp01zonaderiesgo, $rp01refpersnom1, $rp01refpersparen1, $rp01refperstel1, $rp01refpersnom2, $rp01refpersparen2, $rp01refperstel2, $rp01tipovivienda, $rp01serviciosbasicos, $rp01viviendadetalle, $rp01dormitorios, $rp01sala, $rp01comedor, $rp01banos, $rp01estudiosrealizados, $rp01ruta1, $rp01ruta2, $rp01ruta3, $rp01actividadesextras, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'submit_form';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01noemp' => NM_utf8_urldecode($rp01noemp),
                  'rp01division' => NM_utf8_urldecode($rp01division),
                  'rp01depto' => NM_utf8_urldecode($rp01depto),
                  'rp01seccion' => NM_utf8_urldecode($rp01seccion),
                  'rp01noemp1' => NM_utf8_urldecode($rp01noemp1),
                  'rp01nombreemp' => NM_utf8_urldecode($rp01nombreemp),
                  'rp01categoria' => NM_utf8_urldecode($rp01categoria),
                  'rp01turno' => NM_utf8_urldecode($rp01turno),
                  'rp01statusemp' => NM_utf8_urldecode($rp01statusemp),
                  'rp01fechastatus' => NM_utf8_urldecode($rp01fechastatus),
                  'rp01causaretiro' => NM_utf8_urldecode($rp01causaretiro),
                  'rp01direccion' => NM_utf8_urldecode($rp01direccion),
                  'rp01telefono' => NM_utf8_urldecode($rp01telefono),
                  'rp01lugarnacimiento' => NM_utf8_urldecode($rp01lugarnacimiento),
                  'rp01fechanacimiento' => NM_utf8_urldecode($rp01fechanacimiento),
                  'rp01nacionalidad' => NM_utf8_urldecode($rp01nacionalidad),
                  'rp01cedula' => NM_utf8_urldecode($rp01cedula),
                  'rp01noiess' => NM_utf8_urldecode($rp01noiess),
                  'rp01sexo' => NM_utf8_urldecode($rp01sexo),
                  'rp01nolibreta' => NM_utf8_urldecode($rp01nolibreta),
                  'rp01profesion' => NM_utf8_urldecode($rp01profesion),
                  'rp01fechaingreso' => NM_utf8_urldecode($rp01fechaingreso),
                  'rp01fechareingreso' => NM_utf8_urldecode($rp01fechareingreso),
                  'rp01cargo' => NM_utf8_urldecode($rp01cargo),
                  'rp01estadocivil' => NM_utf8_urldecode($rp01estadocivil),
                  'rp01rebajaxcasado' => NM_utf8_urldecode($rp01rebajaxcasado),
                  'rp01nombreconyuge' => NM_utf8_urldecode($rp01nombreconyuge),
                  'rp01nombrepadre' => NM_utf8_urldecode($rp01nombrepadre),
                  'rp01nombremadre' => NM_utf8_urldecode($rp01nombremadre),
                  'rp01nohijos' => NM_utf8_urldecode($rp01nohijos),
                  'rp01fechahijos0' => NM_utf8_urldecode($rp01fechahijos0),
                  'rp01sexohijos0' => NM_utf8_urldecode($rp01sexohijos0),
                  'rp01fechahijos1' => NM_utf8_urldecode($rp01fechahijos1),
                  'rp01sexohijos1' => NM_utf8_urldecode($rp01sexohijos1),
                  'rp01fechahijos2' => NM_utf8_urldecode($rp01fechahijos2),
                  'rp01sexohijos2' => NM_utf8_urldecode($rp01sexohijos2),
                  'rp01fechahijos3' => NM_utf8_urldecode($rp01fechahijos3),
                  'rp01sexohijos3' => NM_utf8_urldecode($rp01sexohijos3),
                  'rp01fechahijos4' => NM_utf8_urldecode($rp01fechahijos4),
                  'rp01sexohijos4' => NM_utf8_urldecode($rp01sexohijos4),
                  'rp01fechahijos5' => NM_utf8_urldecode($rp01fechahijos5),
                  'rp01sexohijos5' => NM_utf8_urldecode($rp01sexohijos5),
                  'rp01fechahijos6' => NM_utf8_urldecode($rp01fechahijos6),
                  'rp01sexohijos6' => NM_utf8_urldecode($rp01sexohijos6),
                  'rp01fechahijos7' => NM_utf8_urldecode($rp01fechahijos7),
                  'rp01sexohijos7' => NM_utf8_urldecode($rp01sexohijos7),
                  'rp01fechahijos8' => NM_utf8_urldecode($rp01fechahijos8),
                  'rp01sexohijos8' => NM_utf8_urldecode($rp01sexohijos8),
                  'rp01fechahijos9' => NM_utf8_urldecode($rp01fechahijos9),
                  'rp01sexohijos9' => NM_utf8_urldecode($rp01sexohijos9),
                  'rp01cargaspadres' => NM_utf8_urldecode($rp01cargaspadres),
                  'rp01otrascargas' => NM_utf8_urldecode($rp01otrascargas),
                  'rp01formapago' => NM_utf8_urldecode($rp01formapago),
                  'rp01nobancoemp' => NM_utf8_urldecode($rp01nobancoemp),
                  'rp01ctabancoemp' => NM_utf8_urldecode($rp01ctabancoemp),
                  'rp01tipoctabco' => NM_utf8_urldecode($rp01tipoctabco),
                  'rp01fechaultvacacion' => NM_utf8_urldecode($rp01fechaultvacacion),
                  'rp01aporte' => NM_utf8_urldecode($rp01aporte),
                  'rp01socio' => NM_utf8_urldecode($rp01socio),
                  'rp01transporte' => NM_utf8_urldecode($rp01transporte),
                  'rp01recibeporc' => NM_utf8_urldecode($rp01recibeporc),
                  'rp01sueldoanterior' => NM_utf8_urldecode($rp01sueldoanterior),
                  'rp01sueldosalario' => NM_utf8_urldecode($rp01sueldosalario),
                  'rp01fecmodsdosal' => NM_utf8_urldecode($rp01fecmodsdosal),
                  'rp01fecmodficha' => NM_utf8_urldecode($rp01fecmodficha),
                  'rp01faltasinjust' => NM_utf8_urldecode($rp01faltasinjust),
                  'rp01ingresos1er' => NM_utf8_urldecode($rp01ingresos1er),
                  'rp01basesocialvalor' => NM_utf8_urldecode($rp01basesocialvalor),
                  'rp01basesocialtiempo' => NM_utf8_urldecode($rp01basesocialtiempo),
                  'rp0114vopagoacum' => NM_utf8_urldecode($rp0114vopagoacum),
                  'rp0115vopagoacum' => NM_utf8_urldecode($rp0115vopagoacum),
                  'rp01cverrorliq' => NM_utf8_urldecode($rp01cverrorliq),
                  'rp01porcentliq' => NM_utf8_urldecode($rp01porcentliq),
                  'rp01tiposangre' => NM_utf8_urldecode($rp01tiposangre),
                  'rp01ingresos2do' => NM_utf8_urldecode($rp01ingresos2do),
                  'rp01provdiremp' => NM_utf8_urldecode($rp01provdiremp),
                  'rp01cantondiremp' => NM_utf8_urldecode($rp01cantondiremp),
                  'rp01ciudaddiremp' => NM_utf8_urldecode($rp01ciudaddiremp),
                  'rp01codocupacion' => NM_utf8_urldecode($rp01codocupacion),
                  'uid' => NM_utf8_urldecode($uid),
                  'block' => NM_utf8_urldecode($block),
                  'ultimoacceso' => NM_utf8_urldecode($ultimoacceso),
                  'rp01foto' => NM_utf8_urldecode($rp01foto),
                  'rp01ctacontable' => NM_utf8_urldecode($rp01ctacontable),
                  'rp01email' => NM_utf8_urldecode($rp01email),
                  'rp01passwd' => NM_utf8_urldecode($rp01passwd),
                  'rp01huella' => NM_utf8_urldecode($rp01huella),
                  'rp01recibefr' => NM_utf8_urldecode($rp01recibefr),
                  'rp01recibedt' => NM_utf8_urldecode($rp01recibedt),
                  'rp01recibedc' => NM_utf8_urldecode($rp01recibedc),
                  'rp01uid' => NM_utf8_urldecode($rp01uid),
                  'rp01fechauid' => NM_utf8_urldecode($rp01fechauid),
                  'rp01obs' => NM_utf8_urldecode($rp01obs),
                  'rp01cauliq' => NM_utf8_urldecode($rp01cauliq),
                  'rp01discapacidad' => NM_utf8_urldecode($rp01discapacidad),
                  'rp01conadis' => NM_utf8_urldecode($rp01conadis),
                  'rp01tpdiscapacidad' => NM_utf8_urldecode($rp01tpdiscapacidad),
                  'rp01prdiscapacidad' => NM_utf8_urldecode($rp01prdiscapacidad),
                  'rp01freserva' => NM_utf8_urldecode($rp01freserva),
                  'rp01codsectorial' => NM_utf8_urldecode($rp01codsectorial),
                  'anticipoporvalor' => NM_utf8_urldecode($anticipoporvalor),
                  'tipidret' => NM_utf8_urldecode($tipidret),
                  'residenciatrab' => NM_utf8_urldecode($residenciatrab),
                  'paisresidencia' => NM_utf8_urldecode($paisresidencia),
                  'aplicaconvenio' => NM_utf8_urldecode($aplicaconvenio),
                  'tipotrabajdiscap' => NM_utf8_urldecode($tipotrabajdiscap),
                  'porcentajediscap' => NM_utf8_urldecode($porcentajediscap),
                  'tipiddiscap' => NM_utf8_urldecode($tipiddiscap),
                  'iddiscap' => NM_utf8_urldecode($iddiscap),
                  'rp01varias_secciones' => NM_utf8_urldecode($rp01varias_secciones),
                  'rp01cc' => NM_utf8_urldecode($rp01cc),
                  'rp01observacion' => NM_utf8_urldecode($rp01observacion),
                  'rp01iessconyugue' => NM_utf8_urldecode($rp01iessconyugue),
                  'rp01tiporefrigerio' => NM_utf8_urldecode($rp01tiporefrigerio),
                  'idiomas' => NM_utf8_urldecode($idiomas),
                  'emergencias' => NM_utf8_urldecode($emergencias),
                  'rp01tipojornada' => NM_utf8_urldecode($rp01tipojornada),
                  'rp01numero_horas' => NM_utf8_urldecode($rp01numero_horas),
                  'rp01emailpersonal' => NM_utf8_urldecode($rp01emailpersonal),
                  'rp01supervisadopor' => NM_utf8_urldecode($rp01supervisadopor),
                  'rp01zonaderiesgo' => NM_utf8_urldecode($rp01zonaderiesgo),
                  'rp01refpersnom1' => NM_utf8_urldecode($rp01refpersnom1),
                  'rp01refpersparen1' => NM_utf8_urldecode($rp01refpersparen1),
                  'rp01refperstel1' => NM_utf8_urldecode($rp01refperstel1),
                  'rp01refpersnom2' => NM_utf8_urldecode($rp01refpersnom2),
                  'rp01refpersparen2' => NM_utf8_urldecode($rp01refpersparen2),
                  'rp01refperstel2' => NM_utf8_urldecode($rp01refperstel2),
                  'rp01tipovivienda' => NM_utf8_urldecode($rp01tipovivienda),
                  'rp01serviciosbasicos' => NM_utf8_urldecode($rp01serviciosbasicos),
                  'rp01viviendadetalle' => NM_utf8_urldecode($rp01viviendadetalle),
                  'rp01dormitorios' => NM_utf8_urldecode($rp01dormitorios),
                  'rp01sala' => NM_utf8_urldecode($rp01sala),
                  'rp01comedor' => NM_utf8_urldecode($rp01comedor),
                  'rp01banos' => NM_utf8_urldecode($rp01banos),
                  'rp01estudiosrealizados' => NM_utf8_urldecode($rp01estudiosrealizados),
                  'rp01ruta1' => NM_utf8_urldecode($rp01ruta1),
                  'rp01ruta2' => NM_utf8_urldecode($rp01ruta2),
                  'rp01ruta3' => NM_utf8_urldecode($rp01ruta3),
                  'rp01actividadesextras' => NM_utf8_urldecode($rp01actividadesextras),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_url_saida' => NM_utf8_urldecode($nmgp_url_saida),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ancora' => NM_utf8_urldecode($nmgp_ancora),
                  'nmgp_num_form' => NM_utf8_urldecode($nmgp_num_form),
                  'nmgp_parms' => NM_utf8_urldecode($nmgp_parms),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'csrf_token' => NM_utf8_urldecode($csrf_token),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_submit_form

    function ajax_form_maeemp_navigate_form($rp01noemp, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_maeemp;
        //register_shutdown_function("form_maeemp_pack_ajax_response");
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_flag          = true;
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao         = 'navigate_form';
        $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param'] = array(
                  'rp01noemp' => NM_utf8_urldecode($rp01noemp),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_fast_search' => NM_utf8_urldecode($nmgp_fast_search),
                  'nmgp_cond_fast_search' => NM_utf8_urldecode($nmgp_cond_fast_search),
                  'nmgp_arg_fast_search' => NM_utf8_urldecode($nmgp_arg_fast_search),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maeemp->contr_form_maeemp->controle();
        exit;
    } // ajax_navigate_form


   function form_maeemp_pack_ajax_response()
   {
      global $inicial_form_maeemp;
      $aResp = array();

      if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['wizard']))
      {
          $aResp['wizard'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['wizard'];
      }
      if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            form_maeemp_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            form_maeemp_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            form_maeemp_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            form_maeemp_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = form_maeemp_pack_protect_string($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            form_maeemp_pack_ajax_ok($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['focus']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['focus'];
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['closeLine']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['clearUpload']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['btnDisabled']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['btnDisabled'])
         {
            form_maeemp_pack_btn_disabled($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['btnLabel']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['btnLabel'])
         {
            form_maeemp_pack_btn_label($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['varList']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['varList']))
         {
            form_maeemp_pack_var_list($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['masterValue']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['masterValue'])
         {
            form_maeemp_pack_master_value($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxAlert']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxAlert'])
         {
            form_maeemp_pack_ajax_alert($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage'])
         {
            form_maeemp_pack_ajax_message($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxJavascript']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxJavascript'])
         {
            form_maeemp_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir']))
         {
            form_maeemp_pack_ajax_redir($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redirExit']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redirExit']))
         {
            form_maeemp_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['blockDisplay']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['blockDisplay']))
         {
            form_maeemp_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['fieldDisplay']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['fieldDisplay']))
         {
            form_maeemp_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['buttonDisplay']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['buttonDisplay']))
         {
            $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['buttonDisplay'] = $inicial_form_maeemp->contr_form_maeemp->nmgp_botoes;
            form_maeemp_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['buttonDisplayVert']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['buttonDisplayVert']))
         {
            form_maeemp_pack_ajax_button_display_vert($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['fieldLabel']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['fieldLabel']))
         {
            form_maeemp_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['readOnly']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['readOnly']))
         {
            form_maeemp_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navStatus']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navStatus']))
         {
            form_maeemp_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navSummary']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navSummary']))
         {
            form_maeemp_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navPage']))
         {
            form_maeemp_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['btnVars']) && !empty($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['btnVars']))
         {
            form_maeemp_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['quickSearchRes']) && $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['event_field']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['event_field'])
         {
            $aResp['eventField'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['event_field'];
         }
         else
         {
            $aResp['eventField'] = '__SC_NO_FIELD';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output']) && $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = form_maeemp_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
               ob_end_clean();
            }
         }
      }
      if (is_array($aResp))
      {
          if (isset($aResp['wizard'])) {
              echo json_encode($aResp);
          }
          else {
              $oJson = new Services_JSON();
              echo "var res = " . trim(sajax_get_js_repr($oJson->encode($aResp))) . "; res;";
          }
      }
      else
      {
          echo "var res = " . trim(sajax_get_js_repr($aResp)) . "; res;";
      }
      exit;
   } // form_maeemp_pack_ajax_response

   function form_maeemp_pack_calendar_reload(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['calendarReload'] = 'OK';
   } // form_maeemp_pack_calendar_reload

   function form_maeemp_pack_ajax_errors(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['errList'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_form_maeemp' == $sField)
         {
             $aMsg = form_maeemp_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_form_maeemp' != $sField)
                       ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => form_maeemp_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // form_maeemp_pack_ajax_errors

   function form_maeemp_pack_ajax_remove_erros($aErrors)
   {
       $aNewErrors = array();
       if (!empty($aErrors))
       {
           $sErrorMsgs = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), implode('<br />', $aErrors));
           $aErrorMsgs = explode('<BR>', $sErrorMsgs);
           foreach ($aErrorMsgs as $sErrorMsg)
           {
               $sErrorMsg = trim($sErrorMsg);
               if ('' != $sErrorMsg && !in_array($sErrorMsg, $aNewErrors))
               {
                   $aNewErrors[] = $sErrorMsg;
               }
           }
       }
       return $aNewErrors;
   } // form_maeemp_pack_ajax_remove_erros

   function form_maeemp_pack_ajax_ok(&$aResp)
   {
      global $inicial_form_maeemp;
      $iNumLinha = (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => form_maeemp_pack_protect_string($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // form_maeemp_pack_ajax_ok

   function form_maeemp_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_form_maeemp;
      $iNumLinha = (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['fldList'] as $sField => $aData)
      {
         $aField = array();
         if (isset($aData['colNum']))
         {
            $aField['colNum'] = $aData['colNum'];
         }
         if (isset($aData['row']))
         {
            $aField['row'] = $aData['row'];
         }
         if (isset($aData['imgFile']))
         {
            $aField['imgFile'] = form_maeemp_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = form_maeemp_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = form_maeemp_pack_protect_string($aData['imgLink']);
         }
         if (isset($aData['keepImg']))
         {
            $aField['keepImg'] = $aData['keepImg'];
         }
         if (isset($aData['hideName']))
         {
            $aField['hideName'] = $aData['hideName'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = form_maeemp_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = form_maeemp_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['docReadonly']))
         {
            $aField['docReadonly'] = form_maeemp_pack_protect_string($aData['docReadonly']);
         }
         if (isset($aData['keyVal']))
         {
            $aField['keyVal'] = $aData['keyVal'];
         }
         if (isset($aData['optComp']))
         {
            $aField['optComp'] = $aData['optComp'];
         }
         if (isset($aData['optClass']))
         {
            $aField['optClass'] = $aData['optClass'];
         }
         if (isset($aData['optMulti']))
         {
            $aField['optMulti'] = $aData['optMulti'];
         }
         if (isset($aData['switch']))
         {
            $aField['switch'] = $aData['switch'];
         }
         if (isset($aData['lookupCons']))
         {
            $aField['lookupCons'] = $aData['lookupCons'];
         }
         if (isset($aData['imgHtml']))
         {
            $aField['imgHtml'] = form_maeemp_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = form_maeemp_pack_protect_string($aData['mulHtml']);
         }
         if (isset($aData['updInnerHtml']))
         {
            $aField['updInnerHtml'] = $aData['updInnerHtml'];
         }
         if (isset($aData['htmComp']))
         {
            $aField['htmComp'] = str_replace("'", '__AS__', str_replace('"', '__AD__', $aData['htmComp']));
         }
         $aField['fldName']  = $sField;
         $aField['fldType']  = $aData['type'];
         $aField['numLinha'] = $iNumLinha;
         $aField['valList']  = array();
         foreach ($aData['valList'] as $iIndex => $sValue)
         {
            $aValue = array();
            if (isset($aData['labList'][$iIndex]))
            {
               $aValue['label'] = form_maeemp_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? form_maeemp_pack_protect_string($sValue) : $sValue;
            $aField['valList'][] = $aValue;
         }
         foreach ($aField['valList'] as $iIndex => $aFieldData)
         {
             if ("null" == $aFieldData['value'])
             {
                 $aField['valList'][$iIndex]['value'] = '';
             }
         }
         if (isset($aData['optList']) && false !== $aData['optList'])
         {
            if (is_array($aData['optList']))
            {
               $aField['optList'] = array();
               foreach ($aData['optList'] as $aOptList)
               {
                  foreach ($aOptList as $sValue => $sLabel)
                  {
                     $sOpt = ($sValue !== $sLabel) ? $sValue : $sLabel;
                     $aField['optList'][] = array('value' => form_maeemp_pack_protect_string($sOpt),
                                                  'label' => form_maeemp_pack_protect_string($sLabel));
                  }
               }
            }
            else
            {
               $aField['optList'] = $aData['optList'];
            }
         }
         $aResp['fldList'][] = $aField;
      }
   } // form_maeemp_pack_ajax_set_fields

   function form_maeemp_pack_ajax_redir(&$aResp)
   {
      global $inicial_form_maeemp;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redir'][$sTag];
         }
      }
   } // form_maeemp_pack_ajax_redir

   function form_maeemp_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_form_maeemp;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // form_maeemp_pack_ajax_redir_exit

   function form_maeemp_pack_var_list(&$aResp)
   {
      global $inicial_form_maeemp;
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['varList'] as $varData)
      {
         $aResp['varList'][] = array('index' => key($varData),
                                      'value' => current($varData));
      }
   } // form_maeemp_pack_var_list

   function form_maeemp_pack_master_value(&$aResp)
   {
      global $inicial_form_maeemp;
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // form_maeemp_pack_master_value

   function form_maeemp_pack_btn_disabled(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['btnDisabled'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['btnDisabled'] as $btnName => $btnStatus) {
        $aResp['btnDisabled'][$btnName] = $btnStatus;
      }
   } // form_maeemp_pack_ajax_alert

   function form_maeemp_pack_btn_label(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['btnLabel'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['btnLabel'] as $btnName => $btnLabel) {
        $aResp['btnLabel'][$btnName] = $btnLabel;
      }
   } // form_maeemp_pack_ajax_alert

   function form_maeemp_pack_ajax_alert(&$aResp)
   {
      global $inicial_form_maeemp;
// PHP 8.0
      if (!isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxAlert']['message'])) {
          $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxAlert']['message'] = '';
      }
      if (!isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxAlert']['params'])) {
          $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxAlert']['params'] = '';
      }
//---
      $aResp['ajaxAlert'] = array('message' => $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxAlert']['message'], 'params' =>  $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxAlert']['params']);
   } // form_maeemp_pack_ajax_alert

   function form_maeemp_pack_ajax_message(&$aResp)
   {
      global $inicial_form_maeemp;
// PHP 8.0
      if (!isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['message'])) {
          $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['message'] = '';
      }
      if (!isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['title'])) {
          $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['title'] = '';
      }
//---
      $aResp['ajaxMessage'] = array('message'      => form_maeemp_pack_protect_string($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => form_maeemp_pack_protect_string($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'toast'        => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['toast'])        ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['toast']        : 'N',
                                    'toast_pos'    => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['toast_pos'])    ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['toast_pos']    : '',
                                    'type'         => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['type'])         ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['type']         : '',
                                    'redir_target' => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // form_maeemp_pack_ajax_message

   function form_maeemp_pack_ajax_javascript(&$aResp)
   {
      global $inicial_form_maeemp;
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // form_maeemp_pack_ajax_javascript

   function form_maeemp_pack_ajax_block_display(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // form_maeemp_pack_ajax_block_display

   function form_maeemp_pack_ajax_field_display(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_maeemp_pack_ajax_field_display

   function form_maeemp_pack_ajax_button_display(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // form_maeemp_pack_ajax_button_display

   function form_maeemp_pack_ajax_button_display_vert(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['buttonDisplayVert'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['buttonDisplayVert'] as $aButtonData)
      {
        $aResp['buttonDisplayVert'][] = $aButtonData;
      }
   } // form_maeemp_pack_ajax_button_display

   function form_maeemp_pack_ajax_field_label(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, form_maeemp_pack_protect_string($sFieldLabel));
      }
   } // form_maeemp_pack_ajax_field_label

   function form_maeemp_pack_ajax_readonly(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['readOnly'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_maeemp_pack_ajax_readonly

   function form_maeemp_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['navStatus'] = array();
      if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navStatus']['ret']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navStatus']['ava']) && '' != $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navStatus']['ava'];
      }
   } // form_maeemp_pack_ajax_nav_status

   function form_maeemp_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navSummary']['reg_tot'];
   } // form_maeemp_pack_ajax_nav_Summary

   function form_maeemp_pack_ajax_navPage(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['navPage'] = $inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['navPage'];
   } // form_maeemp_pack_ajax_navPage


   function form_maeemp_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_form_maeemp;
      $aResp['btnVars'] = array();
      foreach ($inicial_form_maeemp->contr_form_maeemp->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, form_maeemp_pack_protect_string($sBtnValue));
      }
   } // form_maeemp_pack_ajax_btn_vars

   function form_maeemp_pack_protect_string($sString)
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
/*             return htmlentities($sString, ENT_COMPAT, $_SESSION['scriptcase']['charset']); */
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
   } // form_maeemp_pack_protect_string
?>
