<?php
//
   if (!session_id())
   {
   include_once('form_maepro_mob_session.php');
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
       if (!$_SESSION['scriptcase']['display_mobile'])
       {
          include_once('form_maepro.php');
          exit;
       }
   }

   $_SESSION['scriptcase']['form_maepro']['error_buffer'] = '';

   $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_perfil']          = "conn_erp";
   $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_cache']  = "";
   $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_doc']        = "";
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
   if(empty($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check img
   if(empty($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_imagens']))
   {
           /*check img*/$_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //check cache
   if(empty($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_cache']))
   {
           /*check cache*/$_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
   }
   //check doc
   if(empty($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_doc']))
   {
           /*check doc*/$_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
   }
   //end check publication with the prod
//
class form_maepro_mob_ini
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
      $_SESSION['sc_session'][$this->sc_page]['form_maepro']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "form_maepro"; 
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
      $this->nm_hr_criacao   = "175103"; 
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
      $this->path_prod       = $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_imag_temp'];
      $this->path_cache      = $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_path_doc'];
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_maepro';
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
      if (isset($_SESSION['scriptcase']['form_maepro_mob']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['form_maepro_mob']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['form_maepro_mob']['actual_lang']) || $_SESSION['scriptcase']['form_maepro_mob']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['form_maepro_mob']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_pointofsales',$this->str_lang,'0','/');
      }
      global $inicial_form_maepro_mob;
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
                  if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag) && $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag)
                  {
                      $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      form_maepro_mob_pack_ajax_response();
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
          unset($_SESSION['scriptcase']['form_maepro']['glo_nm_conexao']);
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
      if (isset($_SESSION['scriptcase']['form_maepro_mob']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['form_maepro_mob']['session_timeout']['redir_tp'] == "R") {
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
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['form_maepro_mob']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['form_maepro_mob']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['form_maepro_mob']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['form_maepro_mob']['session_timeout']);
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
          $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir']['action']  = "form_maepro_mob.php";
          $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir']['target']  = "_self";
          $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir']['metodo']  = "post";
          $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
          form_maepro_mob_pack_ajax_response();
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['form_maepro_mob']['session_timeout']['redir']))
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
      $_SESSION['sc_session'][$this->sc_page]['form_maepro']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan'] != 'form_maepro_mob')) 
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_maepro_mob"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_maepro_mob"] as $sTmpTargetLink => $sTmpTargetWidget)
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
            if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['link_info']['compact_mode'] = true;
        }
        if (isset($link_remove_margin) && 'ok' == $link_remove_margin) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['link_info']['remove_margin'] = true;
        }
        if (isset($link_remove_border) && 'ok' == $link_remove_border) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['link_info']['remove_border'] = true;
        }

      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php");
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod");
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib");
      if(function_exists('set_php_timezone'))  set_php_timezone('form_maepro_mob'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/fix.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_form_maepro_mob, $NM_run_iframe;
      if ((isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag) && $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['embutida_call']) || $NM_run_iframe == 1)
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
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQXOZSBiD1BOV5BOHgrwVIBOHEX7VoB/HQNwZ1B/HIrwHQJwDEBODkFeH5FYVoFGHQJKDQBqHANOHuFaHuNOZSrCH5FqDoXGHQJmZ1rqHANOV5XGHgNKVkJGHEFqHIBqHQBiDuFaHAN7D5FaDMvmVcFKV5BmVoBqD9BsZkFGHArKV5FaDErKHENiV5FaDorqD9NwH9X7Z1rwD5NUHuBOVIBODWFYHMBiD9BsVIraD1rwV5X7HgBeHEFKV5FaVoBOD9XsZSFGHANOD5F7HgrYDkBOV5FYVoB/DcJUZ1FaHArKD5XGDEBOZSJqV5FaVoFGD9XsZSX7HAvmD5NUHuzGVcFKDur/VorqHQJmZ1F7Z1vmD5rqDEBOHArCDWBmDoJeD9JKH9BiZ1N7HQBODMrYVcXKH5XKVEX7HQXGVIJsDSrYZMB/DMBYHEJqHEXCZuFaHQBiZSBiDSN7V5FaDMvmVcFKV5BmVoBqD9BsZkFGHArKHuBOHgBYDkXKH5FGZuXGDcXGH9BiHArYHuBODMrwV9FeHEBmVErqHQNmZSBODSvOD5XGHgvCHArsHEB7ZuBqHQFYZSFUHIrwHuraDMrwV9FeDWFYHIX7HQJmH9BqHAN7HuFaDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHQXGDMvsVIBsV5FYHIFUHQXGZSBqZ1rYHQFUHgvCHArCDuFYHIB/HQFYZ9XGHIrwHQJsDMrwV9FeH5XCHIJsHQJmZkBiHAN7HuB/HgvCHArCH5FYHMBiHQXsDQFaDSNaVWJwHgNKDkBODuFqDoFGDcBqVIJwD1rwHuBOHgBYVkJqDWr/HIBOHQXODQFUHABYV5FaDMrwV9BUH5XKVoX7DcNmZSBODSrYHQJsHgvCHArsHEB7ZuXGHQNwZSBiZ1N7HuX7DMrwVcB/Dur/HINUDcNmVINUD1rwHuFUDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHQXGDMvsZSNiDWBmVoX7HQXGVIJsHAN7HuJsHgvCHEJqDWXCHIFGHQNwH9BiD1BOV5BqDMrwV9BUDWJeHIJsHQNwZ1BOHAzGZMXGHgvCHEJqDuFaHIXGHQNmDQB/HAvCV5BqHgNKDkBODuFqDoFGDcBqVIJwD1rwHuBOHgBYVkJ3V5XCHMBiHQXsDQFUDSBYHQFaDMrwV9FeH5XCHMFUDcFYH9BqDSBOZMBqHgvCHArsDWFqHIJwDcXGH9FUD1vOV5BODMrwVcB/HEF/HMBOHQJmVINUHAN7HuBODMrYZSXeDuFYVoXGDcJeZ9rqD1BeHQXGDMvsVIB/DWJeHINUDcNmZ1BiD1rwHuFaHgvCHArCDuJeHINUHQXsDuFaHIrKHuNUDMrwVcB/HEF/VoBiHQXGZ1X7DSvmD5XGHgvCHArCHEXCHMX7HQXOH9BiHINaVWBqHgNKDkBODuFqDoFGDcBqVIJwD1rwHuBOHgBYDkXKDuJeHIraHQNwZSBiD1veHQF7DMrwVcB/DWF/HIBiHQJmZkBiDSrYHQFUHgvCHArCHEFaHMBOHQFYH9FUD1vOVWJeDMrwV9BUDWFYHIF7HQBsZkBiHAN7HuJsDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHQXGDMvsVIB/DuX7HMB/DcFYZSBOHAN7HuXGHgvCHArCDWrGDoJeHQJKH9FUHAN7HQJwDMrwV9FeDWBmVErqHQBqZ1BOHIBeHuX7HgvCHArsH5FGZuFaDcBiH9BiDSvCVWJeHgNKDkBODuFqDoFGDcBqVIJwD1rwHuBOHgBYVkJ3DurmZuFaHQXsDQFaZ1BYV5FaDMrwV9FeH5XCHMXGHQJmH9BqHABYHQFGHgvCHArsDWXCHIFUDcXGDQB/HANOHuraDMrwV9BUDWJeHMJsHQXGZkFGDSvmZMJeDMrYZSXeDuFYVoXGDcJeZ9rqD1BOD5FaDMNaZSrCHEBmVoFaHQXOZ1B/HAvmD5raDEBOHEJGDWFqVoX7D9NmDQJsDSBYV5JeHuNOVcFKH5XKVoFaHQXOZkFGD1rKD5JeDMrYHEFiDWX7DoJeDcBwDuBOHAveV5BqHuvmVcFKV5X7VEF7D9BsVIraHINaD5raDENOHEXeV5FaZuB/DcJUDQJsD1BeV5FUHuNOZSrCDWXCVEraD9XOH9B/D1zGD5raDMzGHEXeHEFqZuFaD9JKDQJsHABYV5BOHgNKVcFKV5X7DorqDcBwZ1rqD1rKV5XGDMzGHEXeV5B7DoNUDcBwH9X7Z1rwV5BOHgNKVcFKDuFqDoFGDcBqH9B/HArYV5FUDErKZSXeHEFqVoBiDcBwZ9rqZ1vCV5FGHuNOVcFKHEFYVoBqDcBwH9BqDSvOZMJwHgBeZSJ3H5FYHIB/HQXsH9FUDSzGD5F7DMvsV9FeHEX7HMraHQNmVINUHIBOV5X7HgNOHErCDuFYHIXGHQBiH9BiDSvCD5F7DMvsVcBUDur/VoBiDcNmZ1FGD1vsD5rqDEBOHEFiHEFqDoF7DcJUZSBiDSzGVWFaDMNOVIBsV5BmVEFGHQBiZkBiHAvmV5X7DMvCHArCDuX/ZuBODcXGDQB/HINaD5F7DMvsVcB/HEBmVEX7HQXOVINUDSvOV5X7HgNKDkXKDWXCHIXGHQXOZSBiHIBOV5FGHuNOVcFKHEFYVoBqDcBwH9BqDSvOZMJwHgBYHErsDuFaHMB/HQXsDQFUHAvmD5F7HgvOZSNiDWFYVoBiDcFYZSBqDSBOV5X7HgBeVkJ3V5FqHINUHQJKZSBiZ1vCD5F7DMrYV9BUDWJeHMBOHQNwVINUD1NaD5rqDEBOHEFiHEFqDoF7DcJUZSBiDSzGVWFaDMrYVcB/DWFYHIraHQNwVINUHIBOV5X7HgveZSJ3H5F/HMJwHQJKZSFUDSvCD5F7DMNODkB/DWFaHIX7DcNmZ1X7D1NaV5X7HgNOHArCH5FYHMX7HQNwH9BiHIBOV5FGHuNOVcFKHEFYVoBqDcBwH9BqDSvOZMJwDMveHArsDuFaHIBOHQNmDQB/HAvCD5F7DMrYDkBsV5FYHIF7HQJmVINUHIBOV5X7DMveHErsH5FYHMJwHQXsH9BiHINaD5F7DMrYDkBsV5X/VEF7DcNmZ1BiDSvOD5rqDEBOHEFiHEFqDoF7DcJUZSBiDSzGVWFaDMBODkBsH5FqHMJeHQNwZ1FGDSvmV5X7DMvCHArsDuXKZuB/HQFYZ9XGD1NKD5F7DMBYVcXKH5XCHIraHQXGVINUHAvmV5X7HgBOHErsDurmDoXGHQFYZSFUHIvsV5FGHuNOVcFKHEFYVoBqDcBwH9BqDSvOZMJwHgNKHEJqDWrGZuXGHQXOH9FUDSzGD5F7DMNOV9FeDWXKVEX7HQXGZ1BOHINKV5X7HgNKHEJqDWX7HMBiDcBiH9FUD1vOD5F7DMvsV9BUHEFYHMJwDcFYZSBODSvOD5rqDEBOHEFiHEFqDoF7DcJUZSBiDSzGVWFaDMvmDkBsV5BmVoFGDcNmZkFGHAzGV5X7HgBeDkXKDuFaHIraHQNwZSFUD1vOD5F7DMzGDkBsHEF/HMrqHQNwZ1FGDSBOV5X7HgNOVkJ3H5FYHMBqHQXsZSBiHAvmV5FGHuNOVcFKHEFYVoBqDcBwH9BqDSvOZMJwHgNKHENiHEFqHMX7HQFYDuFaZ1vCD5F7HgvOVcXKDWFYHMBOHQJmZkFGHAvCV5X7HgBeZSJqDWF/HMBOHQXsZSBiD1BOD5F7DMvsVcXKDuX7HMBODcFYVINUDSvOD5rqDEBOHEFiHEFqDoF7DcJUZSBiDSzGVWFaHgvOVIB/H5FqHIF7HQBiZ1FGHINKV5X7HgNOHErsH5FYHIB/HQXsH9BiD1BOD5F7DMBOVIBsDuFqHMJwHQNmVINUHAvCV5X7HgNOVkJ3DWr/HMBiDcXGH9FUHANKV5FGHuNOVcFKHEFYVoBqDcBwH9BqHINaZMJwDMvCDkB/H5FYHIX7HQFYH9BiHINaD5F7DMNOV9FeHEF/HMJeHQBsZ1FGZ1vOV5X7HgBOZSJqDWFqHIBqHQFYDQFaDSvCD5F7HgrwV9FeDWF/VoBiDcFYZ1X7HIBOD5rqDEBOHEFiHEFqDoF7DcJUZSFGD1BeV5FGHgrYDkFCDWXCVoB/D9BiZ1F7HIveD5BiHgvCZSJGDWXCDoraD9NwZ9JeZ1rwVWXGHuBYDkFCDuFGVoraD9JmZ1rqD1rKV5X7DEBOHEFKV5FaDoXGDcJeZSFGHANOD5BqHuzGVcrsH5XCVoBqDcBqZ1FaD1rwV5FaHgvCDkBsH5FYVoX7D9JKDQX7D1BOV5FGHuzGDkBOH5FqVoJwD9JmZ1F7Z1BeD5JeDEvsHENiV5FaHIJwD9XsDQJsDSBYD5JwHuNOVIFCDuX7VoB/D9XOZSB/D1zGV5X7HgveHArsH5FGVoFGHQFYZ9XGD1veHuFaHuNOZSrCH5FqDoXGHQJmZ1BiHAvCD5BqHgveDkXKDWrGDoBOHQXOZ9F7HAvOV5JeDMvmVcFKV5BmVoBqD9BsZkFGHArKHQraHgrKVkJGDWXCZuJsD9NmZSFGHIrKHQJsHuBYVcrsHEF/HMXGHQNwZ1BiHAzGZMFaDMvCZSJGDWF/HIJsD9XsZ9JeD1BeD5F7DMvmVcFeHEF/VEraDcBqZ1B/Z1vmD5raHgrKVkXeV5FaDoXGDcBwDuBOHAveHuB/HuBOVcBODWFaDoJeDcBqZkFGHArKV5FUDMrYZSXeV5FqHIJsHQJeDuBOZ1vCV5Je";
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan'] != 'form_maepro_mob')) 
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
      $con_devel             =  (isset($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_maepro_mob']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_maepro_mob']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'pointofsales', 2, $this->force_db_utf8); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_maepro_mob']['glo_nm_perfil'];
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
         $_SESSION['sc_session'][$this->sc_page]['form_maepro']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['form_maepro']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['form_maepro']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['form_maepro']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['form_maepro']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['form_maepro']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['form_maepro']['SC_sep_date1'];
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "maepro"; 
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
          if (!$_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['sc_outra_jan'] != 'form_maepro_mob')) 
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao'], $this->root . $this->path_prod, 'pointofsales', 1, $this->force_db_utf8); 
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
          $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['decimal_db'] = "."; 
      } 
  }

  function setConnectionHash() {
    if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao'])) {
      list($connectionDbms, $connectionHost, $connectionUser, $connectionPassword, $connectionDatabase) = db_conect_devel($_SESSION['scriptcase']['form_maepro_mob']['glo_nm_conexao'], $this->root . $this->path_prod, 'pointofsales', 1, $this->force_db_utf8);
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['form_maepro_mob']['SC_sep_date1'];
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
class form_maepro_mob_edit
{
    var $contr_form_maepro_mob;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("form_maepro_mob_apl.php");
        $this->contr_form_maepro_mob = new form_maepro_mob_apl();
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
    $_SESSION['scriptcase']['form_maepro_mob']['contr_erro'] = 'off';
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
             nm_limpa_str_form_maepro_mob($nmgp_val);
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
             nm_limpa_str_form_maepro_mob($nmgp_val);
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
        elseif (is_file($root . $_SESSION['scriptcase']['form_maepro']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt")) {
            $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['form_maepro']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt"));
        }
        if (isset($apl_def)) {
            if ($apl_def[0] != "form_maepro") {
                $_SESSION['scriptcase']['sem_session'] = true;
                if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                    $_SESSION['scriptcase']['form_maepro']['session_timeout']['redir'] = $apl_def[0];
                }
                else {
                    $_SESSION['scriptcase']['form_maepro']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
                }
                $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
                $_SESSION['scriptcase']['form_maepro']['session_timeout']['redir_tp'] = $Redir_tp;
            }
            if (isset($_COOKIE['sc_actual_lang_pointofsales'])) {
                $_SESSION['scriptcase']['form_maepro']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_pointofsales'];
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
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']) && !isset($_SESSION['scriptcase']['form_maepro_mob']['session_timeout']['redir']))
    {
        if ('ajax_form_maepro_mob_validate_codprod01' == $_POST['rs'])
        {
            $codprod01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_desprod01' == $_POST['rs'])
        {
            $desprod01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_cve101' == $_POST['rs'])
        {
            $cve101 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_cve201' == $_POST['rs'])
        {
            $cve201 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_unidmed01' == $_POST['rs'])
        {
            $unidmed01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_cantmin01' == $_POST['rs'])
        {
            $cantmin01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_cantact01' == $_POST['rs'])
        {
            $cantact01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valact01' == $_POST['rs'])
        {
            $valact01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_exipromo01' == $_POST['rs'])
        {
            $exipromo01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precuni01' == $_POST['rs'])
        {
            $precuni01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_pedpend01' == $_POST['rs'])
        {
            $pedpend01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_orden01' == $_POST['rs'])
        {
            $orden01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_refer01' == $_POST['rs'])
        {
            $refer01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_canentm01' == $_POST['rs'])
        {
            $canentm01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valentm01' == $_POST['rs'])
        {
            $valentm01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_cansalm01' == $_POST['rs'])
        {
            $cansalm01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valsalm01' == $_POST['rs'])
        {
            $valsalm01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_canenta01' == $_POST['rs'])
        {
            $canenta01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valenta01' == $_POST['rs'])
        {
            $valenta01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_cansala01' == $_POST['rs'])
        {
            $cansala01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valsala01' == $_POST['rs'])
        {
            $valsala01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_fecape01' == $_POST['rs'])
        {
            $fecape01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_fecult01' == $_POST['rs'])
        {
            $fecult01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_fecvta01' == $_POST['rs'])
        {
            $fecvta01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_ubic01' == $_POST['rs'])
        {
            $ubic01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precvta01' == $_POST['rs'])
        {
            $precvta01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto101' == $_POST['rs'])
        {
            $descto101 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio201' == $_POST['rs'])
        {
            $precio201 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto201' == $_POST['rs'])
        {
            $descto201 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio301' == $_POST['rs'])
        {
            $precio301 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto301' == $_POST['rs'])
        {
            $descto301 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_canvtam01' == $_POST['rs'])
        {
            $canvtam01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valvtam01' == $_POST['rs'])
        {
            $valvtam01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_cosvtam01' == $_POST['rs'])
        {
            $cosvtam01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_canvtaa01' == $_POST['rs'])
        {
            $canvtaa01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valvtaa01' == $_POST['rs'])
        {
            $valvtaa01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_cosvtaa01' == $_POST['rs'])
        {
            $cosvtaa01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_prod1alt01' == $_POST['rs'])
        {
            $prod1alt01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_prod2alt01' == $_POST['rs'])
        {
            $prod2alt01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_proved101' == $_POST['rs'])
        {
            $proved101 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_proved201' == $_POST['rs'])
        {
            $proved201 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_med101' == $_POST['rs'])
        {
            $med101 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_med201' == $_POST['rs'])
        {
            $med201 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_med301' == $_POST['rs'])
        {
            $med301 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_factor01' == $_POST['rs'])
        {
            $factor01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_cvserie01' == $_POST['rs'])
        {
            $cvserie01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_ctain101' == $_POST['rs'])
        {
            $ctain101 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_ctain201' == $_POST['rs'])
        {
            $ctain201 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_ctain301' == $_POST['rs'])
        {
            $ctain301 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_porciva01' == $_POST['rs'])
        {
            $porciva01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_prodsinsdo01' == $_POST['rs'])
        {
            $prodsinsdo01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_sinprec01' == $_POST['rs'])
        {
            $sinprec01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_fotoprod01' == $_POST['rs'])
        {
            $fotoprod01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_detprod01' == $_POST['rs'])
        {
            $detprod01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_block' == $_POST['rs'])
        {
            $block = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_uid' == $_POST['rs'])
        {
            $uid = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_ultimoacceso' == $_POST['rs'])
        {
            $ultimoacceso = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_idpro' == $_POST['rs'])
        {
            $idpro = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_catprod01' == $_POST['rs'])
        {
            $catprod01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_med401' == $_POST['rs'])
        {
            $med401 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_med501' == $_POST['rs'])
        {
            $med501 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_prodconmed01' == $_POST['rs'])
        {
            $prodconmed01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_factorpeso01' == $_POST['rs'])
        {
            $factorpeso01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_codbar01' == $_POST['rs'])
        {
            $codbar01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_unifrac01' == $_POST['rs'])
        {
            $unifrac01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_calidad01' == $_POST['rs'])
        {
            $calidad01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_color01' == $_POST['rs'])
        {
            $color01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_material01' == $_POST['rs'])
        {
            $material01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_talla01' == $_POST['rs'])
        {
            $talla01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_compuesto01' == $_POST['rs'])
        {
            $compuesto01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_catalt01' == $_POST['rs'])
        {
            $catalt01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precfob01' == $_POST['rs'])
        {
            $precfob01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio401' == $_POST['rs'])
        {
            $precio401 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto401' == $_POST['rs'])
        {
            $descto401 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_porigen01' == $_POST['rs'])
        {
            $porigen01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_rin01' == $_POST['rs'])
        {
            $rin01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_marca01' == $_POST['rs'])
        {
            $marca01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_alto01' == $_POST['rs'])
        {
            $alto01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_ancho01' == $_POST['rs'])
        {
            $ancho01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_tipoletra01' == $_POST['rs'])
        {
            $tipoletra01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_indcarga01' == $_POST['rs'])
        {
            $indcarga01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_indveloc01' == $_POST['rs'])
        {
            $indveloc01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_pr01' == $_POST['rs'])
        {
            $pr01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_dis01' == $_POST['rs'])
        {
            $dis01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_tipocons01' == $_POST['rs'])
        {
            $tipocons01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precateg01' == $_POST['rs'])
        {
            $precateg01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_tipprod01' == $_POST['rs'])
        {
            $tipprod01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_conversion01' == $_POST['rs'])
        {
            $conversion01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valhom01' == $_POST['rs'])
        {
            $valhom01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_ctain401' == $_POST['rs'])
        {
            $ctain401 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valhom02' == $_POST['rs'])
        {
            $valhom02 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valhom03' == $_POST['rs'])
        {
            $valhom03 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_valhom04' == $_POST['rs'])
        {
            $valhom04 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_statuspro01' == $_POST['rs'])
        {
            $statuspro01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_parara01' == $_POST['rs'])
        {
            $parara01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_prodequiv01' == $_POST['rs'])
        {
            $prodequiv01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_regalia01' == $_POST['rs'])
        {
            $regalia01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio501' == $_POST['rs'])
        {
            $precio501 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto501' == $_POST['rs'])
        {
            $descto501 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio601' == $_POST['rs'])
        {
            $precio601 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto601' == $_POST['rs'])
        {
            $descto601 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio701' == $_POST['rs'])
        {
            $precio701 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto701' == $_POST['rs'])
        {
            $descto701 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio801' == $_POST['rs'])
        {
            $precio801 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto801' == $_POST['rs'])
        {
            $descto801 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio901' == $_POST['rs'])
        {
            $precio901 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto901' == $_POST['rs'])
        {
            $descto901 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio1001' == $_POST['rs'])
        {
            $precio1001 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto1001' == $_POST['rs'])
        {
            $descto1001 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio1101' == $_POST['rs'])
        {
            $precio1101 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto1101' == $_POST['rs'])
        {
            $descto1101 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_precio1201' == $_POST['rs'])
        {
            $precio1201 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_descto1201' == $_POST['rs'])
        {
            $descto1201 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_submarca01' == $_POST['rs'])
        {
            $submarca01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_modelo01' == $_POST['rs'])
        {
            $modelo01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_clasific01' == $_POST['rs'])
        {
            $clasific01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_codbarempaque01' == $_POST['rs'])
        {
            $codbarempaque01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_unidadempaque01' == $_POST['rs'])
        {
            $unidadempaque01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_dimensionempaque01' == $_POST['rs'])
        {
            $dimensionempaque01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_link01' == $_POST['rs'])
        {
            $link01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_desprod201' == $_POST['rs'])
        {
            $desprod201 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_desprod301' == $_POST['rs'])
        {
            $desprod301 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_coefprd01' == $_POST['rs'])
        {
            $coefprd01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_infor01' == $_POST['rs'])
        {
            $infor01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_infor03' == $_POST['rs'])
        {
            $infor03 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_infor05' == $_POST['rs'])
        {
            $infor05 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_infor07' == $_POST['rs'])
        {
            $infor07 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_porcenrenta' == $_POST['rs'])
        {
            $porcenrenta = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_peso' == $_POST['rs'])
        {
            $peso = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_consignado' == $_POST['rs'])
        {
            $consignado = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_cant_consignado' == $_POST['rs'])
        {
            $cant_consignado = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_baseimpexe01' == $_POST['rs'])
        {
            $baseimpexe01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_peso01' == $_POST['rs'])
        {
            $peso01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_prodrel01' == $_POST['rs'])
        {
            $prodrel01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_infor02' == $_POST['rs'])
        {
            $infor02 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_infor04' == $_POST['rs'])
        {
            $infor04 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_infor06' == $_POST['rs'])
        {
            $infor06 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_infor08' == $_POST['rs'])
        {
            $infor08 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_porcicevta01' == $_POST['rs'])
        {
            $porcicevta01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_porcicecpra01' == $_POST['rs'])
        {
            $porcicecpra01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_porcptdaranc01' == $_POST['rs'])
        {
            $porcptdaranc01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_validate_ordimp01' == $_POST['rs'])
        {
            $ordimp01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maepro_mob_submit_form' == $_POST['rs'])
        {
            $codprod01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $desprod01 = NM_utf8_urldecode($_POST['rsargs'][1]);
            $cve101 = NM_utf8_urldecode($_POST['rsargs'][2]);
            $cve201 = NM_utf8_urldecode($_POST['rsargs'][3]);
            $unidmed01 = NM_utf8_urldecode($_POST['rsargs'][4]);
            $cantmin01 = NM_utf8_urldecode($_POST['rsargs'][5]);
            $cantact01 = NM_utf8_urldecode($_POST['rsargs'][6]);
            $valact01 = NM_utf8_urldecode($_POST['rsargs'][7]);
            $exipromo01 = NM_utf8_urldecode($_POST['rsargs'][8]);
            $precuni01 = NM_utf8_urldecode($_POST['rsargs'][9]);
            $pedpend01 = NM_utf8_urldecode($_POST['rsargs'][10]);
            $orden01 = NM_utf8_urldecode($_POST['rsargs'][11]);
            $refer01 = NM_utf8_urldecode($_POST['rsargs'][12]);
            $canentm01 = NM_utf8_urldecode($_POST['rsargs'][13]);
            $valentm01 = NM_utf8_urldecode($_POST['rsargs'][14]);
            $cansalm01 = NM_utf8_urldecode($_POST['rsargs'][15]);
            $valsalm01 = NM_utf8_urldecode($_POST['rsargs'][16]);
            $canenta01 = NM_utf8_urldecode($_POST['rsargs'][17]);
            $valenta01 = NM_utf8_urldecode($_POST['rsargs'][18]);
            $cansala01 = NM_utf8_urldecode($_POST['rsargs'][19]);
            $valsala01 = NM_utf8_urldecode($_POST['rsargs'][20]);
            $fecape01 = NM_utf8_urldecode($_POST['rsargs'][21]);
            $fecult01 = NM_utf8_urldecode($_POST['rsargs'][22]);
            $fecvta01 = NM_utf8_urldecode($_POST['rsargs'][23]);
            $ubic01 = NM_utf8_urldecode($_POST['rsargs'][24]);
            $precvta01 = NM_utf8_urldecode($_POST['rsargs'][25]);
            $descto101 = NM_utf8_urldecode($_POST['rsargs'][26]);
            $precio201 = NM_utf8_urldecode($_POST['rsargs'][27]);
            $descto201 = NM_utf8_urldecode($_POST['rsargs'][28]);
            $precio301 = NM_utf8_urldecode($_POST['rsargs'][29]);
            $descto301 = NM_utf8_urldecode($_POST['rsargs'][30]);
            $canvtam01 = NM_utf8_urldecode($_POST['rsargs'][31]);
            $valvtam01 = NM_utf8_urldecode($_POST['rsargs'][32]);
            $cosvtam01 = NM_utf8_urldecode($_POST['rsargs'][33]);
            $canvtaa01 = NM_utf8_urldecode($_POST['rsargs'][34]);
            $valvtaa01 = NM_utf8_urldecode($_POST['rsargs'][35]);
            $cosvtaa01 = NM_utf8_urldecode($_POST['rsargs'][36]);
            $prod1alt01 = NM_utf8_urldecode($_POST['rsargs'][37]);
            $prod2alt01 = NM_utf8_urldecode($_POST['rsargs'][38]);
            $proved101 = NM_utf8_urldecode($_POST['rsargs'][39]);
            $proved201 = NM_utf8_urldecode($_POST['rsargs'][40]);
            $med101 = NM_utf8_urldecode($_POST['rsargs'][41]);
            $med201 = NM_utf8_urldecode($_POST['rsargs'][42]);
            $med301 = NM_utf8_urldecode($_POST['rsargs'][43]);
            $factor01 = NM_utf8_urldecode($_POST['rsargs'][44]);
            $cvserie01 = NM_utf8_urldecode($_POST['rsargs'][45]);
            $ctain101 = NM_utf8_urldecode($_POST['rsargs'][46]);
            $ctain201 = NM_utf8_urldecode($_POST['rsargs'][47]);
            $ctain301 = NM_utf8_urldecode($_POST['rsargs'][48]);
            $porciva01 = NM_utf8_urldecode($_POST['rsargs'][49]);
            $prodsinsdo01 = NM_utf8_urldecode($_POST['rsargs'][50]);
            $sinprec01 = NM_utf8_urldecode($_POST['rsargs'][51]);
            $fotoprod01 = NM_utf8_urldecode($_POST['rsargs'][52]);
            $detprod01 = NM_utf8_urldecode($_POST['rsargs'][53]);
            $block = NM_utf8_urldecode($_POST['rsargs'][54]);
            $uid = NM_utf8_urldecode($_POST['rsargs'][55]);
            $ultimoacceso = NM_utf8_urldecode($_POST['rsargs'][56]);
            $idpro = NM_utf8_urldecode($_POST['rsargs'][57]);
            $catprod01 = NM_utf8_urldecode($_POST['rsargs'][58]);
            $med401 = NM_utf8_urldecode($_POST['rsargs'][59]);
            $med501 = NM_utf8_urldecode($_POST['rsargs'][60]);
            $prodconmed01 = NM_utf8_urldecode($_POST['rsargs'][61]);
            $factorpeso01 = NM_utf8_urldecode($_POST['rsargs'][62]);
            $codbar01 = NM_utf8_urldecode($_POST['rsargs'][63]);
            $unifrac01 = NM_utf8_urldecode($_POST['rsargs'][64]);
            $calidad01 = NM_utf8_urldecode($_POST['rsargs'][65]);
            $color01 = NM_utf8_urldecode($_POST['rsargs'][66]);
            $material01 = NM_utf8_urldecode($_POST['rsargs'][67]);
            $talla01 = NM_utf8_urldecode($_POST['rsargs'][68]);
            $compuesto01 = NM_utf8_urldecode($_POST['rsargs'][69]);
            $catalt01 = NM_utf8_urldecode($_POST['rsargs'][70]);
            $precfob01 = NM_utf8_urldecode($_POST['rsargs'][71]);
            $precio401 = NM_utf8_urldecode($_POST['rsargs'][72]);
            $descto401 = NM_utf8_urldecode($_POST['rsargs'][73]);
            $porigen01 = NM_utf8_urldecode($_POST['rsargs'][74]);
            $rin01 = NM_utf8_urldecode($_POST['rsargs'][75]);
            $marca01 = NM_utf8_urldecode($_POST['rsargs'][76]);
            $alto01 = NM_utf8_urldecode($_POST['rsargs'][77]);
            $ancho01 = NM_utf8_urldecode($_POST['rsargs'][78]);
            $tipoletra01 = NM_utf8_urldecode($_POST['rsargs'][79]);
            $indcarga01 = NM_utf8_urldecode($_POST['rsargs'][80]);
            $indveloc01 = NM_utf8_urldecode($_POST['rsargs'][81]);
            $pr01 = NM_utf8_urldecode($_POST['rsargs'][82]);
            $dis01 = NM_utf8_urldecode($_POST['rsargs'][83]);
            $tipocons01 = NM_utf8_urldecode($_POST['rsargs'][84]);
            $precateg01 = NM_utf8_urldecode($_POST['rsargs'][85]);
            $tipprod01 = NM_utf8_urldecode($_POST['rsargs'][86]);
            $conversion01 = NM_utf8_urldecode($_POST['rsargs'][87]);
            $valhom01 = NM_utf8_urldecode($_POST['rsargs'][88]);
            $ctain401 = NM_utf8_urldecode($_POST['rsargs'][89]);
            $valhom02 = NM_utf8_urldecode($_POST['rsargs'][90]);
            $valhom03 = NM_utf8_urldecode($_POST['rsargs'][91]);
            $valhom04 = NM_utf8_urldecode($_POST['rsargs'][92]);
            $statuspro01 = NM_utf8_urldecode($_POST['rsargs'][93]);
            $parara01 = NM_utf8_urldecode($_POST['rsargs'][94]);
            $prodequiv01 = NM_utf8_urldecode($_POST['rsargs'][95]);
            $regalia01 = NM_utf8_urldecode($_POST['rsargs'][96]);
            $precio501 = NM_utf8_urldecode($_POST['rsargs'][97]);
            $descto501 = NM_utf8_urldecode($_POST['rsargs'][98]);
            $precio601 = NM_utf8_urldecode($_POST['rsargs'][99]);
            $descto601 = NM_utf8_urldecode($_POST['rsargs'][100]);
            $precio701 = NM_utf8_urldecode($_POST['rsargs'][101]);
            $descto701 = NM_utf8_urldecode($_POST['rsargs'][102]);
            $precio801 = NM_utf8_urldecode($_POST['rsargs'][103]);
            $descto801 = NM_utf8_urldecode($_POST['rsargs'][104]);
            $precio901 = NM_utf8_urldecode($_POST['rsargs'][105]);
            $descto901 = NM_utf8_urldecode($_POST['rsargs'][106]);
            $precio1001 = NM_utf8_urldecode($_POST['rsargs'][107]);
            $descto1001 = NM_utf8_urldecode($_POST['rsargs'][108]);
            $precio1101 = NM_utf8_urldecode($_POST['rsargs'][109]);
            $descto1101 = NM_utf8_urldecode($_POST['rsargs'][110]);
            $precio1201 = NM_utf8_urldecode($_POST['rsargs'][111]);
            $descto1201 = NM_utf8_urldecode($_POST['rsargs'][112]);
            $submarca01 = NM_utf8_urldecode($_POST['rsargs'][113]);
            $modelo01 = NM_utf8_urldecode($_POST['rsargs'][114]);
            $clasific01 = NM_utf8_urldecode($_POST['rsargs'][115]);
            $codbarempaque01 = NM_utf8_urldecode($_POST['rsargs'][116]);
            $unidadempaque01 = NM_utf8_urldecode($_POST['rsargs'][117]);
            $dimensionempaque01 = NM_utf8_urldecode($_POST['rsargs'][118]);
            $link01 = NM_utf8_urldecode($_POST['rsargs'][119]);
            $desprod201 = NM_utf8_urldecode($_POST['rsargs'][120]);
            $desprod301 = NM_utf8_urldecode($_POST['rsargs'][121]);
            $coefprd01 = NM_utf8_urldecode($_POST['rsargs'][122]);
            $infor01 = NM_utf8_urldecode($_POST['rsargs'][123]);
            $infor03 = NM_utf8_urldecode($_POST['rsargs'][124]);
            $infor05 = NM_utf8_urldecode($_POST['rsargs'][125]);
            $infor07 = NM_utf8_urldecode($_POST['rsargs'][126]);
            $porcenrenta = NM_utf8_urldecode($_POST['rsargs'][127]);
            $peso = NM_utf8_urldecode($_POST['rsargs'][128]);
            $consignado = NM_utf8_urldecode($_POST['rsargs'][129]);
            $cant_consignado = NM_utf8_urldecode($_POST['rsargs'][130]);
            $baseimpexe01 = NM_utf8_urldecode($_POST['rsargs'][131]);
            $peso01 = NM_utf8_urldecode($_POST['rsargs'][132]);
            $prodrel01 = NM_utf8_urldecode($_POST['rsargs'][133]);
            $infor02 = NM_utf8_urldecode($_POST['rsargs'][134]);
            $infor04 = NM_utf8_urldecode($_POST['rsargs'][135]);
            $infor06 = NM_utf8_urldecode($_POST['rsargs'][136]);
            $infor08 = NM_utf8_urldecode($_POST['rsargs'][137]);
            $porcicevta01 = NM_utf8_urldecode($_POST['rsargs'][138]);
            $porcicecpra01 = NM_utf8_urldecode($_POST['rsargs'][139]);
            $porcptdaranc01 = NM_utf8_urldecode($_POST['rsargs'][140]);
            $ordimp01 = NM_utf8_urldecode($_POST['rsargs'][141]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][142]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][143]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][144]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][145]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][146]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][147]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][148]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][149]);
        }
        if ('ajax_form_maepro_mob_navigate_form' == $_POST['rs'])
        {
            $codprod01 = NM_utf8_urldecode($_POST['rsargs'][0]);
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
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_parms']);
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
               nm_limpa_str_form_maepro_mob($cadapar[1]);
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
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['parms']);
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
    if (isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_maepro_mob";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_maepro_mob' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['form_maepro']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_maepro_mob')
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_modal'] = true;
            $nm_url_saida = "form_maepro_mob_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan'] = true;
    }
    if (!isset($nm_apl_dependente)) {
        $nm_apl_dependente = 0;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/form_maepro/'))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/form_maepro_mob_erro.php");
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
            $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['opcao'] = $nmgp_opcao ; 
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_redirect_tp'] = "";
            $nm_url_saida = "form_maepro_mob_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "form_maepro_mob_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['retorno_edit'] . "?script_case_init=" . $script_case_init;  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "form_maepro_mob_fim.php"; 
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
        if (empty($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init; 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_modal'] = true;
             $nm_url_saida = "form_maepro_mob_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_maepro_mob']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_form_maepro_mob = new form_maepro_mob_edit();
    $inicial_form_maepro_mob->inicializa();

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/form_maepro_mob_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/form_maepro_mob_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_form_maepro_mob_validate_codprod01");
    sajax_export("ajax_form_maepro_mob_validate_desprod01");
    sajax_export("ajax_form_maepro_mob_validate_cve101");
    sajax_export("ajax_form_maepro_mob_validate_cve201");
    sajax_export("ajax_form_maepro_mob_validate_unidmed01");
    sajax_export("ajax_form_maepro_mob_validate_cantmin01");
    sajax_export("ajax_form_maepro_mob_validate_cantact01");
    sajax_export("ajax_form_maepro_mob_validate_valact01");
    sajax_export("ajax_form_maepro_mob_validate_exipromo01");
    sajax_export("ajax_form_maepro_mob_validate_precuni01");
    sajax_export("ajax_form_maepro_mob_validate_pedpend01");
    sajax_export("ajax_form_maepro_mob_validate_orden01");
    sajax_export("ajax_form_maepro_mob_validate_refer01");
    sajax_export("ajax_form_maepro_mob_validate_canentm01");
    sajax_export("ajax_form_maepro_mob_validate_valentm01");
    sajax_export("ajax_form_maepro_mob_validate_cansalm01");
    sajax_export("ajax_form_maepro_mob_validate_valsalm01");
    sajax_export("ajax_form_maepro_mob_validate_canenta01");
    sajax_export("ajax_form_maepro_mob_validate_valenta01");
    sajax_export("ajax_form_maepro_mob_validate_cansala01");
    sajax_export("ajax_form_maepro_mob_validate_valsala01");
    sajax_export("ajax_form_maepro_mob_validate_fecape01");
    sajax_export("ajax_form_maepro_mob_validate_fecult01");
    sajax_export("ajax_form_maepro_mob_validate_fecvta01");
    sajax_export("ajax_form_maepro_mob_validate_ubic01");
    sajax_export("ajax_form_maepro_mob_validate_precvta01");
    sajax_export("ajax_form_maepro_mob_validate_descto101");
    sajax_export("ajax_form_maepro_mob_validate_precio201");
    sajax_export("ajax_form_maepro_mob_validate_descto201");
    sajax_export("ajax_form_maepro_mob_validate_precio301");
    sajax_export("ajax_form_maepro_mob_validate_descto301");
    sajax_export("ajax_form_maepro_mob_validate_canvtam01");
    sajax_export("ajax_form_maepro_mob_validate_valvtam01");
    sajax_export("ajax_form_maepro_mob_validate_cosvtam01");
    sajax_export("ajax_form_maepro_mob_validate_canvtaa01");
    sajax_export("ajax_form_maepro_mob_validate_valvtaa01");
    sajax_export("ajax_form_maepro_mob_validate_cosvtaa01");
    sajax_export("ajax_form_maepro_mob_validate_prod1alt01");
    sajax_export("ajax_form_maepro_mob_validate_prod2alt01");
    sajax_export("ajax_form_maepro_mob_validate_proved101");
    sajax_export("ajax_form_maepro_mob_validate_proved201");
    sajax_export("ajax_form_maepro_mob_validate_med101");
    sajax_export("ajax_form_maepro_mob_validate_med201");
    sajax_export("ajax_form_maepro_mob_validate_med301");
    sajax_export("ajax_form_maepro_mob_validate_factor01");
    sajax_export("ajax_form_maepro_mob_validate_cvserie01");
    sajax_export("ajax_form_maepro_mob_validate_ctain101");
    sajax_export("ajax_form_maepro_mob_validate_ctain201");
    sajax_export("ajax_form_maepro_mob_validate_ctain301");
    sajax_export("ajax_form_maepro_mob_validate_porciva01");
    sajax_export("ajax_form_maepro_mob_validate_prodsinsdo01");
    sajax_export("ajax_form_maepro_mob_validate_sinprec01");
    sajax_export("ajax_form_maepro_mob_validate_fotoprod01");
    sajax_export("ajax_form_maepro_mob_validate_detprod01");
    sajax_export("ajax_form_maepro_mob_validate_block");
    sajax_export("ajax_form_maepro_mob_validate_uid");
    sajax_export("ajax_form_maepro_mob_validate_ultimoacceso");
    sajax_export("ajax_form_maepro_mob_validate_idpro");
    sajax_export("ajax_form_maepro_mob_validate_catprod01");
    sajax_export("ajax_form_maepro_mob_validate_med401");
    sajax_export("ajax_form_maepro_mob_validate_med501");
    sajax_export("ajax_form_maepro_mob_validate_prodconmed01");
    sajax_export("ajax_form_maepro_mob_validate_factorpeso01");
    sajax_export("ajax_form_maepro_mob_validate_codbar01");
    sajax_export("ajax_form_maepro_mob_validate_unifrac01");
    sajax_export("ajax_form_maepro_mob_validate_calidad01");
    sajax_export("ajax_form_maepro_mob_validate_color01");
    sajax_export("ajax_form_maepro_mob_validate_material01");
    sajax_export("ajax_form_maepro_mob_validate_talla01");
    sajax_export("ajax_form_maepro_mob_validate_compuesto01");
    sajax_export("ajax_form_maepro_mob_validate_catalt01");
    sajax_export("ajax_form_maepro_mob_validate_precfob01");
    sajax_export("ajax_form_maepro_mob_validate_precio401");
    sajax_export("ajax_form_maepro_mob_validate_descto401");
    sajax_export("ajax_form_maepro_mob_validate_porigen01");
    sajax_export("ajax_form_maepro_mob_validate_rin01");
    sajax_export("ajax_form_maepro_mob_validate_marca01");
    sajax_export("ajax_form_maepro_mob_validate_alto01");
    sajax_export("ajax_form_maepro_mob_validate_ancho01");
    sajax_export("ajax_form_maepro_mob_validate_tipoletra01");
    sajax_export("ajax_form_maepro_mob_validate_indcarga01");
    sajax_export("ajax_form_maepro_mob_validate_indveloc01");
    sajax_export("ajax_form_maepro_mob_validate_pr01");
    sajax_export("ajax_form_maepro_mob_validate_dis01");
    sajax_export("ajax_form_maepro_mob_validate_tipocons01");
    sajax_export("ajax_form_maepro_mob_validate_precateg01");
    sajax_export("ajax_form_maepro_mob_validate_tipprod01");
    sajax_export("ajax_form_maepro_mob_validate_conversion01");
    sajax_export("ajax_form_maepro_mob_validate_valhom01");
    sajax_export("ajax_form_maepro_mob_validate_ctain401");
    sajax_export("ajax_form_maepro_mob_validate_valhom02");
    sajax_export("ajax_form_maepro_mob_validate_valhom03");
    sajax_export("ajax_form_maepro_mob_validate_valhom04");
    sajax_export("ajax_form_maepro_mob_validate_statuspro01");
    sajax_export("ajax_form_maepro_mob_validate_parara01");
    sajax_export("ajax_form_maepro_mob_validate_prodequiv01");
    sajax_export("ajax_form_maepro_mob_validate_regalia01");
    sajax_export("ajax_form_maepro_mob_validate_precio501");
    sajax_export("ajax_form_maepro_mob_validate_descto501");
    sajax_export("ajax_form_maepro_mob_validate_precio601");
    sajax_export("ajax_form_maepro_mob_validate_descto601");
    sajax_export("ajax_form_maepro_mob_validate_precio701");
    sajax_export("ajax_form_maepro_mob_validate_descto701");
    sajax_export("ajax_form_maepro_mob_validate_precio801");
    sajax_export("ajax_form_maepro_mob_validate_descto801");
    sajax_export("ajax_form_maepro_mob_validate_precio901");
    sajax_export("ajax_form_maepro_mob_validate_descto901");
    sajax_export("ajax_form_maepro_mob_validate_precio1001");
    sajax_export("ajax_form_maepro_mob_validate_descto1001");
    sajax_export("ajax_form_maepro_mob_validate_precio1101");
    sajax_export("ajax_form_maepro_mob_validate_descto1101");
    sajax_export("ajax_form_maepro_mob_validate_precio1201");
    sajax_export("ajax_form_maepro_mob_validate_descto1201");
    sajax_export("ajax_form_maepro_mob_validate_submarca01");
    sajax_export("ajax_form_maepro_mob_validate_modelo01");
    sajax_export("ajax_form_maepro_mob_validate_clasific01");
    sajax_export("ajax_form_maepro_mob_validate_codbarempaque01");
    sajax_export("ajax_form_maepro_mob_validate_unidadempaque01");
    sajax_export("ajax_form_maepro_mob_validate_dimensionempaque01");
    sajax_export("ajax_form_maepro_mob_validate_link01");
    sajax_export("ajax_form_maepro_mob_validate_desprod201");
    sajax_export("ajax_form_maepro_mob_validate_desprod301");
    sajax_export("ajax_form_maepro_mob_validate_coefprd01");
    sajax_export("ajax_form_maepro_mob_validate_infor01");
    sajax_export("ajax_form_maepro_mob_validate_infor03");
    sajax_export("ajax_form_maepro_mob_validate_infor05");
    sajax_export("ajax_form_maepro_mob_validate_infor07");
    sajax_export("ajax_form_maepro_mob_validate_porcenrenta");
    sajax_export("ajax_form_maepro_mob_validate_peso");
    sajax_export("ajax_form_maepro_mob_validate_consignado");
    sajax_export("ajax_form_maepro_mob_validate_cant_consignado");
    sajax_export("ajax_form_maepro_mob_validate_baseimpexe01");
    sajax_export("ajax_form_maepro_mob_validate_peso01");
    sajax_export("ajax_form_maepro_mob_validate_prodrel01");
    sajax_export("ajax_form_maepro_mob_validate_infor02");
    sajax_export("ajax_form_maepro_mob_validate_infor04");
    sajax_export("ajax_form_maepro_mob_validate_infor06");
    sajax_export("ajax_form_maepro_mob_validate_infor08");
    sajax_export("ajax_form_maepro_mob_validate_porcicevta01");
    sajax_export("ajax_form_maepro_mob_validate_porcicecpra01");
    sajax_export("ajax_form_maepro_mob_validate_porcptdaranc01");
    sajax_export("ajax_form_maepro_mob_validate_ordimp01");
    sajax_export("ajax_form_maepro_mob_submit_form");
    sajax_export("ajax_form_maepro_mob_navigate_form");
    sajax_handle_client_request();

    if (isset($_POST['wizard_action']) && 'change_step' == $_POST['wizard_action']) {
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'] = true;
        ob_start();
    }

    $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
//
    function nm_limpa_str_form_maepro_mob(&$str)
    {
    }

    function ajax_form_maepro_mob_validate_codprod01($codprod01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_codprod01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'codprod01' => NM_utf8_urldecode($codprod01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_codprod01

    function ajax_form_maepro_mob_validate_desprod01($desprod01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_desprod01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'desprod01' => NM_utf8_urldecode($desprod01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_desprod01

    function ajax_form_maepro_mob_validate_cve101($cve101, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_cve101';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'cve101' => NM_utf8_urldecode($cve101),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_cve101

    function ajax_form_maepro_mob_validate_cve201($cve201, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_cve201';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'cve201' => NM_utf8_urldecode($cve201),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_cve201

    function ajax_form_maepro_mob_validate_unidmed01($unidmed01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_unidmed01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'unidmed01' => NM_utf8_urldecode($unidmed01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_unidmed01

    function ajax_form_maepro_mob_validate_cantmin01($cantmin01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_cantmin01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'cantmin01' => NM_utf8_urldecode($cantmin01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_cantmin01

    function ajax_form_maepro_mob_validate_cantact01($cantact01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_cantact01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'cantact01' => NM_utf8_urldecode($cantact01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_cantact01

    function ajax_form_maepro_mob_validate_valact01($valact01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valact01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valact01' => NM_utf8_urldecode($valact01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valact01

    function ajax_form_maepro_mob_validate_exipromo01($exipromo01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_exipromo01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'exipromo01' => NM_utf8_urldecode($exipromo01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_exipromo01

    function ajax_form_maepro_mob_validate_precuni01($precuni01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precuni01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precuni01' => NM_utf8_urldecode($precuni01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precuni01

    function ajax_form_maepro_mob_validate_pedpend01($pedpend01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_pedpend01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'pedpend01' => NM_utf8_urldecode($pedpend01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_pedpend01

    function ajax_form_maepro_mob_validate_orden01($orden01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_orden01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'orden01' => NM_utf8_urldecode($orden01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_orden01

    function ajax_form_maepro_mob_validate_refer01($refer01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_refer01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'refer01' => NM_utf8_urldecode($refer01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_refer01

    function ajax_form_maepro_mob_validate_canentm01($canentm01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_canentm01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'canentm01' => NM_utf8_urldecode($canentm01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_canentm01

    function ajax_form_maepro_mob_validate_valentm01($valentm01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valentm01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valentm01' => NM_utf8_urldecode($valentm01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valentm01

    function ajax_form_maepro_mob_validate_cansalm01($cansalm01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_cansalm01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'cansalm01' => NM_utf8_urldecode($cansalm01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_cansalm01

    function ajax_form_maepro_mob_validate_valsalm01($valsalm01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valsalm01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valsalm01' => NM_utf8_urldecode($valsalm01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valsalm01

    function ajax_form_maepro_mob_validate_canenta01($canenta01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_canenta01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'canenta01' => NM_utf8_urldecode($canenta01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_canenta01

    function ajax_form_maepro_mob_validate_valenta01($valenta01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valenta01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valenta01' => NM_utf8_urldecode($valenta01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valenta01

    function ajax_form_maepro_mob_validate_cansala01($cansala01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_cansala01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'cansala01' => NM_utf8_urldecode($cansala01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_cansala01

    function ajax_form_maepro_mob_validate_valsala01($valsala01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valsala01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valsala01' => NM_utf8_urldecode($valsala01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valsala01

    function ajax_form_maepro_mob_validate_fecape01($fecape01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_fecape01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'fecape01' => NM_utf8_urldecode($fecape01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_fecape01

    function ajax_form_maepro_mob_validate_fecult01($fecult01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_fecult01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'fecult01' => NM_utf8_urldecode($fecult01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_fecult01

    function ajax_form_maepro_mob_validate_fecvta01($fecvta01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_fecvta01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'fecvta01' => NM_utf8_urldecode($fecvta01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_fecvta01

    function ajax_form_maepro_mob_validate_ubic01($ubic01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_ubic01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'ubic01' => NM_utf8_urldecode($ubic01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_ubic01

    function ajax_form_maepro_mob_validate_precvta01($precvta01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precvta01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precvta01' => NM_utf8_urldecode($precvta01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precvta01

    function ajax_form_maepro_mob_validate_descto101($descto101, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto101';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto101' => NM_utf8_urldecode($descto101),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto101

    function ajax_form_maepro_mob_validate_precio201($precio201, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio201';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio201' => NM_utf8_urldecode($precio201),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio201

    function ajax_form_maepro_mob_validate_descto201($descto201, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto201';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto201' => NM_utf8_urldecode($descto201),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto201

    function ajax_form_maepro_mob_validate_precio301($precio301, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio301';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio301' => NM_utf8_urldecode($precio301),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio301

    function ajax_form_maepro_mob_validate_descto301($descto301, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto301';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto301' => NM_utf8_urldecode($descto301),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto301

    function ajax_form_maepro_mob_validate_canvtam01($canvtam01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_canvtam01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'canvtam01' => NM_utf8_urldecode($canvtam01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_canvtam01

    function ajax_form_maepro_mob_validate_valvtam01($valvtam01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valvtam01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valvtam01' => NM_utf8_urldecode($valvtam01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valvtam01

    function ajax_form_maepro_mob_validate_cosvtam01($cosvtam01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_cosvtam01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'cosvtam01' => NM_utf8_urldecode($cosvtam01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_cosvtam01

    function ajax_form_maepro_mob_validate_canvtaa01($canvtaa01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_canvtaa01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'canvtaa01' => NM_utf8_urldecode($canvtaa01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_canvtaa01

    function ajax_form_maepro_mob_validate_valvtaa01($valvtaa01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valvtaa01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valvtaa01' => NM_utf8_urldecode($valvtaa01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valvtaa01

    function ajax_form_maepro_mob_validate_cosvtaa01($cosvtaa01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_cosvtaa01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'cosvtaa01' => NM_utf8_urldecode($cosvtaa01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_cosvtaa01

    function ajax_form_maepro_mob_validate_prod1alt01($prod1alt01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_prod1alt01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'prod1alt01' => NM_utf8_urldecode($prod1alt01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_prod1alt01

    function ajax_form_maepro_mob_validate_prod2alt01($prod2alt01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_prod2alt01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'prod2alt01' => NM_utf8_urldecode($prod2alt01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_prod2alt01

    function ajax_form_maepro_mob_validate_proved101($proved101, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_proved101';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'proved101' => NM_utf8_urldecode($proved101),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_proved101

    function ajax_form_maepro_mob_validate_proved201($proved201, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_proved201';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'proved201' => NM_utf8_urldecode($proved201),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_proved201

    function ajax_form_maepro_mob_validate_med101($med101, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_med101';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'med101' => NM_utf8_urldecode($med101),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_med101

    function ajax_form_maepro_mob_validate_med201($med201, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_med201';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'med201' => NM_utf8_urldecode($med201),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_med201

    function ajax_form_maepro_mob_validate_med301($med301, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_med301';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'med301' => NM_utf8_urldecode($med301),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_med301

    function ajax_form_maepro_mob_validate_factor01($factor01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_factor01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'factor01' => NM_utf8_urldecode($factor01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_factor01

    function ajax_form_maepro_mob_validate_cvserie01($cvserie01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_cvserie01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'cvserie01' => NM_utf8_urldecode($cvserie01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_cvserie01

    function ajax_form_maepro_mob_validate_ctain101($ctain101, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_ctain101';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'ctain101' => NM_utf8_urldecode($ctain101),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_ctain101

    function ajax_form_maepro_mob_validate_ctain201($ctain201, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_ctain201';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'ctain201' => NM_utf8_urldecode($ctain201),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_ctain201

    function ajax_form_maepro_mob_validate_ctain301($ctain301, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_ctain301';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'ctain301' => NM_utf8_urldecode($ctain301),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_ctain301

    function ajax_form_maepro_mob_validate_porciva01($porciva01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_porciva01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'porciva01' => NM_utf8_urldecode($porciva01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_porciva01

    function ajax_form_maepro_mob_validate_prodsinsdo01($prodsinsdo01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_prodsinsdo01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'prodsinsdo01' => NM_utf8_urldecode($prodsinsdo01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_prodsinsdo01

    function ajax_form_maepro_mob_validate_sinprec01($sinprec01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_sinprec01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'sinprec01' => NM_utf8_urldecode($sinprec01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_sinprec01

    function ajax_form_maepro_mob_validate_fotoprod01($fotoprod01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_fotoprod01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'fotoprod01' => NM_utf8_urldecode($fotoprod01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_fotoprod01

    function ajax_form_maepro_mob_validate_detprod01($detprod01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_detprod01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'detprod01' => NM_utf8_urldecode($detprod01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_detprod01

    function ajax_form_maepro_mob_validate_block($block, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_block';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'block' => NM_utf8_urldecode($block),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_block

    function ajax_form_maepro_mob_validate_uid($uid, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_uid';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'uid' => NM_utf8_urldecode($uid),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_uid

    function ajax_form_maepro_mob_validate_ultimoacceso($ultimoacceso, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_ultimoacceso';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'ultimoacceso' => NM_utf8_urldecode($ultimoacceso),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_ultimoacceso

    function ajax_form_maepro_mob_validate_idpro($idpro, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_idpro';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'idpro' => NM_utf8_urldecode($idpro),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_idpro

    function ajax_form_maepro_mob_validate_catprod01($catprod01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_catprod01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'catprod01' => NM_utf8_urldecode($catprod01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_catprod01

    function ajax_form_maepro_mob_validate_med401($med401, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_med401';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'med401' => NM_utf8_urldecode($med401),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_med401

    function ajax_form_maepro_mob_validate_med501($med501, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_med501';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'med501' => NM_utf8_urldecode($med501),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_med501

    function ajax_form_maepro_mob_validate_prodconmed01($prodconmed01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_prodconmed01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'prodconmed01' => NM_utf8_urldecode($prodconmed01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_prodconmed01

    function ajax_form_maepro_mob_validate_factorpeso01($factorpeso01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_factorpeso01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'factorpeso01' => NM_utf8_urldecode($factorpeso01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_factorpeso01

    function ajax_form_maepro_mob_validate_codbar01($codbar01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_codbar01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'codbar01' => NM_utf8_urldecode($codbar01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_codbar01

    function ajax_form_maepro_mob_validate_unifrac01($unifrac01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_unifrac01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'unifrac01' => NM_utf8_urldecode($unifrac01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_unifrac01

    function ajax_form_maepro_mob_validate_calidad01($calidad01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_calidad01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'calidad01' => NM_utf8_urldecode($calidad01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_calidad01

    function ajax_form_maepro_mob_validate_color01($color01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_color01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'color01' => NM_utf8_urldecode($color01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_color01

    function ajax_form_maepro_mob_validate_material01($material01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_material01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'material01' => NM_utf8_urldecode($material01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_material01

    function ajax_form_maepro_mob_validate_talla01($talla01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_talla01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'talla01' => NM_utf8_urldecode($talla01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_talla01

    function ajax_form_maepro_mob_validate_compuesto01($compuesto01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_compuesto01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'compuesto01' => NM_utf8_urldecode($compuesto01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_compuesto01

    function ajax_form_maepro_mob_validate_catalt01($catalt01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_catalt01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'catalt01' => NM_utf8_urldecode($catalt01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_catalt01

    function ajax_form_maepro_mob_validate_precfob01($precfob01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precfob01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precfob01' => NM_utf8_urldecode($precfob01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precfob01

    function ajax_form_maepro_mob_validate_precio401($precio401, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio401';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio401' => NM_utf8_urldecode($precio401),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio401

    function ajax_form_maepro_mob_validate_descto401($descto401, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto401';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto401' => NM_utf8_urldecode($descto401),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto401

    function ajax_form_maepro_mob_validate_porigen01($porigen01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_porigen01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'porigen01' => NM_utf8_urldecode($porigen01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_porigen01

    function ajax_form_maepro_mob_validate_rin01($rin01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_rin01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'rin01' => NM_utf8_urldecode($rin01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_rin01

    function ajax_form_maepro_mob_validate_marca01($marca01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_marca01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'marca01' => NM_utf8_urldecode($marca01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_marca01

    function ajax_form_maepro_mob_validate_alto01($alto01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_alto01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'alto01' => NM_utf8_urldecode($alto01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_alto01

    function ajax_form_maepro_mob_validate_ancho01($ancho01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_ancho01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'ancho01' => NM_utf8_urldecode($ancho01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_ancho01

    function ajax_form_maepro_mob_validate_tipoletra01($tipoletra01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_tipoletra01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'tipoletra01' => NM_utf8_urldecode($tipoletra01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_tipoletra01

    function ajax_form_maepro_mob_validate_indcarga01($indcarga01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_indcarga01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'indcarga01' => NM_utf8_urldecode($indcarga01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_indcarga01

    function ajax_form_maepro_mob_validate_indveloc01($indveloc01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_indveloc01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'indveloc01' => NM_utf8_urldecode($indveloc01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_indveloc01

    function ajax_form_maepro_mob_validate_pr01($pr01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_pr01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'pr01' => NM_utf8_urldecode($pr01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_pr01

    function ajax_form_maepro_mob_validate_dis01($dis01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_dis01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'dis01' => NM_utf8_urldecode($dis01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_dis01

    function ajax_form_maepro_mob_validate_tipocons01($tipocons01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_tipocons01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'tipocons01' => NM_utf8_urldecode($tipocons01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_tipocons01

    function ajax_form_maepro_mob_validate_precateg01($precateg01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precateg01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precateg01' => NM_utf8_urldecode($precateg01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precateg01

    function ajax_form_maepro_mob_validate_tipprod01($tipprod01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_tipprod01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'tipprod01' => NM_utf8_urldecode($tipprod01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_tipprod01

    function ajax_form_maepro_mob_validate_conversion01($conversion01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_conversion01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'conversion01' => NM_utf8_urldecode($conversion01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_conversion01

    function ajax_form_maepro_mob_validate_valhom01($valhom01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valhom01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valhom01' => NM_utf8_urldecode($valhom01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valhom01

    function ajax_form_maepro_mob_validate_ctain401($ctain401, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_ctain401';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'ctain401' => NM_utf8_urldecode($ctain401),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_ctain401

    function ajax_form_maepro_mob_validate_valhom02($valhom02, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valhom02';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valhom02' => NM_utf8_urldecode($valhom02),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valhom02

    function ajax_form_maepro_mob_validate_valhom03($valhom03, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valhom03';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valhom03' => NM_utf8_urldecode($valhom03),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valhom03

    function ajax_form_maepro_mob_validate_valhom04($valhom04, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_valhom04';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'valhom04' => NM_utf8_urldecode($valhom04),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_valhom04

    function ajax_form_maepro_mob_validate_statuspro01($statuspro01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_statuspro01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'statuspro01' => NM_utf8_urldecode($statuspro01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_statuspro01

    function ajax_form_maepro_mob_validate_parara01($parara01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_parara01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'parara01' => NM_utf8_urldecode($parara01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_parara01

    function ajax_form_maepro_mob_validate_prodequiv01($prodequiv01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_prodequiv01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'prodequiv01' => NM_utf8_urldecode($prodequiv01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_prodequiv01

    function ajax_form_maepro_mob_validate_regalia01($regalia01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_regalia01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'regalia01' => NM_utf8_urldecode($regalia01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_regalia01

    function ajax_form_maepro_mob_validate_precio501($precio501, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio501';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio501' => NM_utf8_urldecode($precio501),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio501

    function ajax_form_maepro_mob_validate_descto501($descto501, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto501';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto501' => NM_utf8_urldecode($descto501),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto501

    function ajax_form_maepro_mob_validate_precio601($precio601, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio601';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio601' => NM_utf8_urldecode($precio601),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio601

    function ajax_form_maepro_mob_validate_descto601($descto601, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto601';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto601' => NM_utf8_urldecode($descto601),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto601

    function ajax_form_maepro_mob_validate_precio701($precio701, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio701';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio701' => NM_utf8_urldecode($precio701),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio701

    function ajax_form_maepro_mob_validate_descto701($descto701, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto701';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto701' => NM_utf8_urldecode($descto701),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto701

    function ajax_form_maepro_mob_validate_precio801($precio801, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio801';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio801' => NM_utf8_urldecode($precio801),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio801

    function ajax_form_maepro_mob_validate_descto801($descto801, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto801';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto801' => NM_utf8_urldecode($descto801),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto801

    function ajax_form_maepro_mob_validate_precio901($precio901, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio901';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio901' => NM_utf8_urldecode($precio901),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio901

    function ajax_form_maepro_mob_validate_descto901($descto901, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto901';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto901' => NM_utf8_urldecode($descto901),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto901

    function ajax_form_maepro_mob_validate_precio1001($precio1001, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio1001';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio1001' => NM_utf8_urldecode($precio1001),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio1001

    function ajax_form_maepro_mob_validate_descto1001($descto1001, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto1001';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto1001' => NM_utf8_urldecode($descto1001),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto1001

    function ajax_form_maepro_mob_validate_precio1101($precio1101, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio1101';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio1101' => NM_utf8_urldecode($precio1101),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio1101

    function ajax_form_maepro_mob_validate_descto1101($descto1101, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto1101';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto1101' => NM_utf8_urldecode($descto1101),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto1101

    function ajax_form_maepro_mob_validate_precio1201($precio1201, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_precio1201';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'precio1201' => NM_utf8_urldecode($precio1201),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_precio1201

    function ajax_form_maepro_mob_validate_descto1201($descto1201, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_descto1201';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'descto1201' => NM_utf8_urldecode($descto1201),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_descto1201

    function ajax_form_maepro_mob_validate_submarca01($submarca01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_submarca01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'submarca01' => NM_utf8_urldecode($submarca01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_submarca01

    function ajax_form_maepro_mob_validate_modelo01($modelo01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_modelo01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'modelo01' => NM_utf8_urldecode($modelo01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_modelo01

    function ajax_form_maepro_mob_validate_clasific01($clasific01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_clasific01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'clasific01' => NM_utf8_urldecode($clasific01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_clasific01

    function ajax_form_maepro_mob_validate_codbarempaque01($codbarempaque01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_codbarempaque01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'codbarempaque01' => NM_utf8_urldecode($codbarempaque01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_codbarempaque01

    function ajax_form_maepro_mob_validate_unidadempaque01($unidadempaque01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_unidadempaque01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'unidadempaque01' => NM_utf8_urldecode($unidadempaque01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_unidadempaque01

    function ajax_form_maepro_mob_validate_dimensionempaque01($dimensionempaque01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_dimensionempaque01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'dimensionempaque01' => NM_utf8_urldecode($dimensionempaque01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_dimensionempaque01

    function ajax_form_maepro_mob_validate_link01($link01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_link01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'link01' => NM_utf8_urldecode($link01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_link01

    function ajax_form_maepro_mob_validate_desprod201($desprod201, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_desprod201';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'desprod201' => NM_utf8_urldecode($desprod201),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_desprod201

    function ajax_form_maepro_mob_validate_desprod301($desprod301, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_desprod301';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'desprod301' => NM_utf8_urldecode($desprod301),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_desprod301

    function ajax_form_maepro_mob_validate_coefprd01($coefprd01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_coefprd01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'coefprd01' => NM_utf8_urldecode($coefprd01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_coefprd01

    function ajax_form_maepro_mob_validate_infor01($infor01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_infor01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'infor01' => NM_utf8_urldecode($infor01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_infor01

    function ajax_form_maepro_mob_validate_infor03($infor03, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_infor03';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'infor03' => NM_utf8_urldecode($infor03),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_infor03

    function ajax_form_maepro_mob_validate_infor05($infor05, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_infor05';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'infor05' => NM_utf8_urldecode($infor05),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_infor05

    function ajax_form_maepro_mob_validate_infor07($infor07, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_infor07';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'infor07' => NM_utf8_urldecode($infor07),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_infor07

    function ajax_form_maepro_mob_validate_porcenrenta($porcenrenta, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_porcenrenta';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'porcenrenta' => NM_utf8_urldecode($porcenrenta),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_porcenrenta

    function ajax_form_maepro_mob_validate_peso($peso, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_peso';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'peso' => NM_utf8_urldecode($peso),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_peso

    function ajax_form_maepro_mob_validate_consignado($consignado, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_consignado';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'consignado' => NM_utf8_urldecode($consignado),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_consignado

    function ajax_form_maepro_mob_validate_cant_consignado($cant_consignado, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_cant_consignado';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'cant_consignado' => NM_utf8_urldecode($cant_consignado),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_cant_consignado

    function ajax_form_maepro_mob_validate_baseimpexe01($baseimpexe01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_baseimpexe01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'baseimpexe01' => NM_utf8_urldecode($baseimpexe01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_baseimpexe01

    function ajax_form_maepro_mob_validate_peso01($peso01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_peso01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'peso01' => NM_utf8_urldecode($peso01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_peso01

    function ajax_form_maepro_mob_validate_prodrel01($prodrel01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_prodrel01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'prodrel01' => NM_utf8_urldecode($prodrel01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_prodrel01

    function ajax_form_maepro_mob_validate_infor02($infor02, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_infor02';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'infor02' => NM_utf8_urldecode($infor02),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_infor02

    function ajax_form_maepro_mob_validate_infor04($infor04, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_infor04';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'infor04' => NM_utf8_urldecode($infor04),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_infor04

    function ajax_form_maepro_mob_validate_infor06($infor06, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_infor06';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'infor06' => NM_utf8_urldecode($infor06),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_infor06

    function ajax_form_maepro_mob_validate_infor08($infor08, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_infor08';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'infor08' => NM_utf8_urldecode($infor08),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_infor08

    function ajax_form_maepro_mob_validate_porcicevta01($porcicevta01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_porcicevta01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'porcicevta01' => NM_utf8_urldecode($porcicevta01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_porcicevta01

    function ajax_form_maepro_mob_validate_porcicecpra01($porcicecpra01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_porcicecpra01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'porcicecpra01' => NM_utf8_urldecode($porcicecpra01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_porcicecpra01

    function ajax_form_maepro_mob_validate_porcptdaranc01($porcptdaranc01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_porcptdaranc01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'porcptdaranc01' => NM_utf8_urldecode($porcptdaranc01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_porcptdaranc01

    function ajax_form_maepro_mob_validate_ordimp01($ordimp01, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'validate_ordimp01';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'ordimp01' => NM_utf8_urldecode($ordimp01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_validate_ordimp01

    function ajax_form_maepro_mob_submit_form($codprod01, $desprod01, $cve101, $cve201, $unidmed01, $cantmin01, $cantact01, $valact01, $exipromo01, $precuni01, $pedpend01, $orden01, $refer01, $canentm01, $valentm01, $cansalm01, $valsalm01, $canenta01, $valenta01, $cansala01, $valsala01, $fecape01, $fecult01, $fecvta01, $ubic01, $precvta01, $descto101, $precio201, $descto201, $precio301, $descto301, $canvtam01, $valvtam01, $cosvtam01, $canvtaa01, $valvtaa01, $cosvtaa01, $prod1alt01, $prod2alt01, $proved101, $proved201, $med101, $med201, $med301, $factor01, $cvserie01, $ctain101, $ctain201, $ctain301, $porciva01, $prodsinsdo01, $sinprec01, $fotoprod01, $detprod01, $block, $uid, $ultimoacceso, $idpro, $catprod01, $med401, $med501, $prodconmed01, $factorpeso01, $codbar01, $unifrac01, $calidad01, $color01, $material01, $talla01, $compuesto01, $catalt01, $precfob01, $precio401, $descto401, $porigen01, $rin01, $marca01, $alto01, $ancho01, $tipoletra01, $indcarga01, $indveloc01, $pr01, $dis01, $tipocons01, $precateg01, $tipprod01, $conversion01, $valhom01, $ctain401, $valhom02, $valhom03, $valhom04, $statuspro01, $parara01, $prodequiv01, $regalia01, $precio501, $descto501, $precio601, $descto601, $precio701, $descto701, $precio801, $descto801, $precio901, $descto901, $precio1001, $descto1001, $precio1101, $descto1101, $precio1201, $descto1201, $submarca01, $modelo01, $clasific01, $codbarempaque01, $unidadempaque01, $dimensionempaque01, $link01, $desprod201, $desprod301, $coefprd01, $infor01, $infor03, $infor05, $infor07, $porcenrenta, $peso, $consignado, $cant_consignado, $baseimpexe01, $peso01, $prodrel01, $infor02, $infor04, $infor06, $infor08, $porcicevta01, $porcicecpra01, $porcptdaranc01, $ordimp01, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'submit_form';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'codprod01' => NM_utf8_urldecode($codprod01),
                  'desprod01' => NM_utf8_urldecode($desprod01),
                  'cve101' => NM_utf8_urldecode($cve101),
                  'cve201' => NM_utf8_urldecode($cve201),
                  'unidmed01' => NM_utf8_urldecode($unidmed01),
                  'cantmin01' => NM_utf8_urldecode($cantmin01),
                  'cantact01' => NM_utf8_urldecode($cantact01),
                  'valact01' => NM_utf8_urldecode($valact01),
                  'exipromo01' => NM_utf8_urldecode($exipromo01),
                  'precuni01' => NM_utf8_urldecode($precuni01),
                  'pedpend01' => NM_utf8_urldecode($pedpend01),
                  'orden01' => NM_utf8_urldecode($orden01),
                  'refer01' => NM_utf8_urldecode($refer01),
                  'canentm01' => NM_utf8_urldecode($canentm01),
                  'valentm01' => NM_utf8_urldecode($valentm01),
                  'cansalm01' => NM_utf8_urldecode($cansalm01),
                  'valsalm01' => NM_utf8_urldecode($valsalm01),
                  'canenta01' => NM_utf8_urldecode($canenta01),
                  'valenta01' => NM_utf8_urldecode($valenta01),
                  'cansala01' => NM_utf8_urldecode($cansala01),
                  'valsala01' => NM_utf8_urldecode($valsala01),
                  'fecape01' => NM_utf8_urldecode($fecape01),
                  'fecult01' => NM_utf8_urldecode($fecult01),
                  'fecvta01' => NM_utf8_urldecode($fecvta01),
                  'ubic01' => NM_utf8_urldecode($ubic01),
                  'precvta01' => NM_utf8_urldecode($precvta01),
                  'descto101' => NM_utf8_urldecode($descto101),
                  'precio201' => NM_utf8_urldecode($precio201),
                  'descto201' => NM_utf8_urldecode($descto201),
                  'precio301' => NM_utf8_urldecode($precio301),
                  'descto301' => NM_utf8_urldecode($descto301),
                  'canvtam01' => NM_utf8_urldecode($canvtam01),
                  'valvtam01' => NM_utf8_urldecode($valvtam01),
                  'cosvtam01' => NM_utf8_urldecode($cosvtam01),
                  'canvtaa01' => NM_utf8_urldecode($canvtaa01),
                  'valvtaa01' => NM_utf8_urldecode($valvtaa01),
                  'cosvtaa01' => NM_utf8_urldecode($cosvtaa01),
                  'prod1alt01' => NM_utf8_urldecode($prod1alt01),
                  'prod2alt01' => NM_utf8_urldecode($prod2alt01),
                  'proved101' => NM_utf8_urldecode($proved101),
                  'proved201' => NM_utf8_urldecode($proved201),
                  'med101' => NM_utf8_urldecode($med101),
                  'med201' => NM_utf8_urldecode($med201),
                  'med301' => NM_utf8_urldecode($med301),
                  'factor01' => NM_utf8_urldecode($factor01),
                  'cvserie01' => NM_utf8_urldecode($cvserie01),
                  'ctain101' => NM_utf8_urldecode($ctain101),
                  'ctain201' => NM_utf8_urldecode($ctain201),
                  'ctain301' => NM_utf8_urldecode($ctain301),
                  'porciva01' => NM_utf8_urldecode($porciva01),
                  'prodsinsdo01' => NM_utf8_urldecode($prodsinsdo01),
                  'sinprec01' => NM_utf8_urldecode($sinprec01),
                  'fotoprod01' => NM_utf8_urldecode($fotoprod01),
                  'detprod01' => NM_utf8_urldecode($detprod01),
                  'block' => NM_utf8_urldecode($block),
                  'uid' => NM_utf8_urldecode($uid),
                  'ultimoacceso' => NM_utf8_urldecode($ultimoacceso),
                  'idpro' => NM_utf8_urldecode($idpro),
                  'catprod01' => NM_utf8_urldecode($catprod01),
                  'med401' => NM_utf8_urldecode($med401),
                  'med501' => NM_utf8_urldecode($med501),
                  'prodconmed01' => NM_utf8_urldecode($prodconmed01),
                  'factorpeso01' => NM_utf8_urldecode($factorpeso01),
                  'codbar01' => NM_utf8_urldecode($codbar01),
                  'unifrac01' => NM_utf8_urldecode($unifrac01),
                  'calidad01' => NM_utf8_urldecode($calidad01),
                  'color01' => NM_utf8_urldecode($color01),
                  'material01' => NM_utf8_urldecode($material01),
                  'talla01' => NM_utf8_urldecode($talla01),
                  'compuesto01' => NM_utf8_urldecode($compuesto01),
                  'catalt01' => NM_utf8_urldecode($catalt01),
                  'precfob01' => NM_utf8_urldecode($precfob01),
                  'precio401' => NM_utf8_urldecode($precio401),
                  'descto401' => NM_utf8_urldecode($descto401),
                  'porigen01' => NM_utf8_urldecode($porigen01),
                  'rin01' => NM_utf8_urldecode($rin01),
                  'marca01' => NM_utf8_urldecode($marca01),
                  'alto01' => NM_utf8_urldecode($alto01),
                  'ancho01' => NM_utf8_urldecode($ancho01),
                  'tipoletra01' => NM_utf8_urldecode($tipoletra01),
                  'indcarga01' => NM_utf8_urldecode($indcarga01),
                  'indveloc01' => NM_utf8_urldecode($indveloc01),
                  'pr01' => NM_utf8_urldecode($pr01),
                  'dis01' => NM_utf8_urldecode($dis01),
                  'tipocons01' => NM_utf8_urldecode($tipocons01),
                  'precateg01' => NM_utf8_urldecode($precateg01),
                  'tipprod01' => NM_utf8_urldecode($tipprod01),
                  'conversion01' => NM_utf8_urldecode($conversion01),
                  'valhom01' => NM_utf8_urldecode($valhom01),
                  'ctain401' => NM_utf8_urldecode($ctain401),
                  'valhom02' => NM_utf8_urldecode($valhom02),
                  'valhom03' => NM_utf8_urldecode($valhom03),
                  'valhom04' => NM_utf8_urldecode($valhom04),
                  'statuspro01' => NM_utf8_urldecode($statuspro01),
                  'parara01' => NM_utf8_urldecode($parara01),
                  'prodequiv01' => NM_utf8_urldecode($prodequiv01),
                  'regalia01' => NM_utf8_urldecode($regalia01),
                  'precio501' => NM_utf8_urldecode($precio501),
                  'descto501' => NM_utf8_urldecode($descto501),
                  'precio601' => NM_utf8_urldecode($precio601),
                  'descto601' => NM_utf8_urldecode($descto601),
                  'precio701' => NM_utf8_urldecode($precio701),
                  'descto701' => NM_utf8_urldecode($descto701),
                  'precio801' => NM_utf8_urldecode($precio801),
                  'descto801' => NM_utf8_urldecode($descto801),
                  'precio901' => NM_utf8_urldecode($precio901),
                  'descto901' => NM_utf8_urldecode($descto901),
                  'precio1001' => NM_utf8_urldecode($precio1001),
                  'descto1001' => NM_utf8_urldecode($descto1001),
                  'precio1101' => NM_utf8_urldecode($precio1101),
                  'descto1101' => NM_utf8_urldecode($descto1101),
                  'precio1201' => NM_utf8_urldecode($precio1201),
                  'descto1201' => NM_utf8_urldecode($descto1201),
                  'submarca01' => NM_utf8_urldecode($submarca01),
                  'modelo01' => NM_utf8_urldecode($modelo01),
                  'clasific01' => NM_utf8_urldecode($clasific01),
                  'codbarempaque01' => NM_utf8_urldecode($codbarempaque01),
                  'unidadempaque01' => NM_utf8_urldecode($unidadempaque01),
                  'dimensionempaque01' => NM_utf8_urldecode($dimensionempaque01),
                  'link01' => NM_utf8_urldecode($link01),
                  'desprod201' => NM_utf8_urldecode($desprod201),
                  'desprod301' => NM_utf8_urldecode($desprod301),
                  'coefprd01' => NM_utf8_urldecode($coefprd01),
                  'infor01' => NM_utf8_urldecode($infor01),
                  'infor03' => NM_utf8_urldecode($infor03),
                  'infor05' => NM_utf8_urldecode($infor05),
                  'infor07' => NM_utf8_urldecode($infor07),
                  'porcenrenta' => NM_utf8_urldecode($porcenrenta),
                  'peso' => NM_utf8_urldecode($peso),
                  'consignado' => NM_utf8_urldecode($consignado),
                  'cant_consignado' => NM_utf8_urldecode($cant_consignado),
                  'baseimpexe01' => NM_utf8_urldecode($baseimpexe01),
                  'peso01' => NM_utf8_urldecode($peso01),
                  'prodrel01' => NM_utf8_urldecode($prodrel01),
                  'infor02' => NM_utf8_urldecode($infor02),
                  'infor04' => NM_utf8_urldecode($infor04),
                  'infor06' => NM_utf8_urldecode($infor06),
                  'infor08' => NM_utf8_urldecode($infor08),
                  'porcicevta01' => NM_utf8_urldecode($porcicevta01),
                  'porcicecpra01' => NM_utf8_urldecode($porcicecpra01),
                  'porcptdaranc01' => NM_utf8_urldecode($porcptdaranc01),
                  'ordimp01' => NM_utf8_urldecode($ordimp01),
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
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_submit_form

    function ajax_form_maepro_mob_navigate_form($codprod01, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_maepro_mob;
        //register_shutdown_function("form_maepro_mob_pack_ajax_response");
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_flag          = true;
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao         = 'navigate_form';
        $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param'] = array(
                  'codprod01' => NM_utf8_urldecode($codprod01),
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
        if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maepro_mob->contr_form_maepro_mob->controle();
        exit;
    } // ajax_navigate_form


   function form_maepro_mob_pack_ajax_response()
   {
      global $inicial_form_maepro_mob;
      $aResp = array();

      if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['wizard']))
      {
          $aResp['wizard'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['wizard'];
      }
      if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            form_maepro_mob_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            form_maepro_mob_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            form_maepro_mob_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            form_maepro_mob_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = form_maepro_mob_pack_protect_string($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            form_maepro_mob_pack_ajax_ok($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['focus']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['focus'];
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['closeLine']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['clearUpload']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['btnDisabled']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['btnDisabled'])
         {
            form_maepro_mob_pack_btn_disabled($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['btnLabel']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['btnLabel'])
         {
            form_maepro_mob_pack_btn_label($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['varList']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['varList']))
         {
            form_maepro_mob_pack_var_list($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['masterValue']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['masterValue'])
         {
            form_maepro_mob_pack_master_value($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxAlert']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxAlert'])
         {
            form_maepro_mob_pack_ajax_alert($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage'])
         {
            form_maepro_mob_pack_ajax_message($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxJavascript']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxJavascript'])
         {
            form_maepro_mob_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir']))
         {
            form_maepro_mob_pack_ajax_redir($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redirExit']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redirExit']))
         {
            form_maepro_mob_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['blockDisplay']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['blockDisplay']))
         {
            form_maepro_mob_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['fieldDisplay']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['fieldDisplay']))
         {
            form_maepro_mob_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['buttonDisplay']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['buttonDisplay']))
         {
            $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['buttonDisplay'] = $inicial_form_maepro_mob->contr_form_maepro_mob->nmgp_botoes;
            form_maepro_mob_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['buttonDisplayVert']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['buttonDisplayVert']))
         {
            form_maepro_mob_pack_ajax_button_display_vert($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['fieldLabel']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['fieldLabel']))
         {
            form_maepro_mob_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['readOnly']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['readOnly']))
         {
            form_maepro_mob_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navStatus']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navStatus']))
         {
            form_maepro_mob_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navSummary']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navSummary']))
         {
            form_maepro_mob_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navPage']))
         {
            form_maepro_mob_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['btnVars']) && !empty($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['btnVars']))
         {
            form_maepro_mob_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['quickSearchRes']) && $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['event_field']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['event_field'])
         {
            $aResp['eventField'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['event_field'];
         }
         else
         {
            $aResp['eventField'] = '__SC_NO_FIELD';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output']) && $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = form_maepro_mob_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
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
   } // form_maepro_mob_pack_ajax_response

   function form_maepro_mob_pack_calendar_reload(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['calendarReload'] = 'OK';
   } // form_maepro_mob_pack_calendar_reload

   function form_maepro_mob_pack_ajax_errors(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['errList'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_form_maepro_mob' == $sField)
         {
             $aMsg = form_maepro_mob_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_form_maepro_mob' != $sField)
                       ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => form_maepro_mob_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // form_maepro_mob_pack_ajax_errors

   function form_maepro_mob_pack_ajax_remove_erros($aErrors)
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
   } // form_maepro_mob_pack_ajax_remove_erros

   function form_maepro_mob_pack_ajax_ok(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $iNumLinha = (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => form_maepro_mob_pack_protect_string($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // form_maepro_mob_pack_ajax_ok

   function form_maepro_mob_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $iNumLinha = (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['fldList'] as $sField => $aData)
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
            $aField['imgFile'] = form_maepro_mob_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = form_maepro_mob_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = form_maepro_mob_pack_protect_string($aData['imgLink']);
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
            $aField['docLink'] = form_maepro_mob_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = form_maepro_mob_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['docReadonly']))
         {
            $aField['docReadonly'] = form_maepro_mob_pack_protect_string($aData['docReadonly']);
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
            $aField['imgHtml'] = form_maepro_mob_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = form_maepro_mob_pack_protect_string($aData['mulHtml']);
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
               $aValue['label'] = form_maepro_mob_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? form_maepro_mob_pack_protect_string($sValue) : $sValue;
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
                     $aField['optList'][] = array('value' => form_maepro_mob_pack_protect_string($sOpt),
                                                  'label' => form_maepro_mob_pack_protect_string($sLabel));
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
   } // form_maepro_mob_pack_ajax_set_fields

   function form_maepro_mob_pack_ajax_redir(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redir'][$sTag];
         }
      }
   } // form_maepro_mob_pack_ajax_redir

   function form_maepro_mob_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // form_maepro_mob_pack_ajax_redir_exit

   function form_maepro_mob_pack_var_list(&$aResp)
   {
      global $inicial_form_maepro_mob;
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['varList'] as $varData)
      {
         $aResp['varList'][] = array('index' => key($varData),
                                      'value' => current($varData));
      }
   } // form_maepro_mob_pack_var_list

   function form_maepro_mob_pack_master_value(&$aResp)
   {
      global $inicial_form_maepro_mob;
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // form_maepro_mob_pack_master_value

   function form_maepro_mob_pack_btn_disabled(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['btnDisabled'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['btnDisabled'] as $btnName => $btnStatus) {
        $aResp['btnDisabled'][$btnName] = $btnStatus;
      }
   } // form_maepro_mob_pack_ajax_alert

   function form_maepro_mob_pack_btn_label(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['btnLabel'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['btnLabel'] as $btnName => $btnLabel) {
        $aResp['btnLabel'][$btnName] = $btnLabel;
      }
   } // form_maepro_mob_pack_ajax_alert

   function form_maepro_mob_pack_ajax_alert(&$aResp)
   {
      global $inicial_form_maepro_mob;
// PHP 8.0
      if (!isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxAlert']['message'])) {
          $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxAlert']['message'] = '';
      }
      if (!isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxAlert']['params'])) {
          $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxAlert']['params'] = '';
      }
//---
      $aResp['ajaxAlert'] = array('message' => $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxAlert']['message'], 'params' =>  $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxAlert']['params']);
   } // form_maepro_mob_pack_ajax_alert

   function form_maepro_mob_pack_ajax_message(&$aResp)
   {
      global $inicial_form_maepro_mob;
// PHP 8.0
      if (!isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['message'])) {
          $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['message'] = '';
      }
      if (!isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['title'])) {
          $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['title'] = '';
      }
//---
      $aResp['ajaxMessage'] = array('message'      => form_maepro_mob_pack_protect_string($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => form_maepro_mob_pack_protect_string($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'toast'        => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['toast'])        ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['toast']        : 'N',
                                    'toast_pos'    => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['toast_pos'])    ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['toast_pos']    : '',
                                    'type'         => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['type'])         ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['type']         : '',
                                    'redir_target' => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // form_maepro_mob_pack_ajax_message

   function form_maepro_mob_pack_ajax_javascript(&$aResp)
   {
      global $inicial_form_maepro_mob;
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // form_maepro_mob_pack_ajax_javascript

   function form_maepro_mob_pack_ajax_block_display(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // form_maepro_mob_pack_ajax_block_display

   function form_maepro_mob_pack_ajax_field_display(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_maepro_mob_pack_ajax_field_display

   function form_maepro_mob_pack_ajax_button_display(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // form_maepro_mob_pack_ajax_button_display

   function form_maepro_mob_pack_ajax_button_display_vert(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['buttonDisplayVert'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['buttonDisplayVert'] as $aButtonData)
      {
        $aResp['buttonDisplayVert'][] = $aButtonData;
      }
   } // form_maepro_mob_pack_ajax_button_display

   function form_maepro_mob_pack_ajax_field_label(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, form_maepro_mob_pack_protect_string($sFieldLabel));
      }
   } // form_maepro_mob_pack_ajax_field_label

   function form_maepro_mob_pack_ajax_readonly(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['readOnly'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_maepro_mob_pack_ajax_readonly

   function form_maepro_mob_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['navStatus'] = array();
      if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navStatus']['ret']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navStatus']['ava']) && '' != $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navStatus']['ava'];
      }
   } // form_maepro_mob_pack_ajax_nav_status

   function form_maepro_mob_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navSummary']['reg_tot'];
   } // form_maepro_mob_pack_ajax_nav_Summary

   function form_maepro_mob_pack_ajax_navPage(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['navPage'] = $inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['navPage'];
   } // form_maepro_mob_pack_ajax_navPage


   function form_maepro_mob_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_form_maepro_mob;
      $aResp['btnVars'] = array();
      foreach ($inicial_form_maepro_mob->contr_form_maepro_mob->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, form_maepro_mob_pack_protect_string($sBtnValue));
      }
   } // form_maepro_mob_pack_ajax_btn_vars

   function form_maepro_mob_pack_protect_string($sString)
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
   } // form_maepro_mob_pack_protect_string
?>
