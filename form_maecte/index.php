<?php
//
   if (!session_id())
   {
   include_once('form_maecte_session.php');
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
          include_once('form_maecte_mob.php');
          exit;
       }
   }

   $_SESSION['scriptcase']['form_maecte']['error_buffer'] = '';

   $_SESSION['scriptcase']['form_maecte']['glo_nm_perfil']          = "conn_erp";
   $_SESSION['scriptcase']['form_maecte']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_maecte']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_maecte']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_maecte']['glo_nm_path_cache']  = "";
   $_SESSION['scriptcase']['form_maecte']['glo_nm_path_doc']        = "";
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
   if(empty($_SESSION['scriptcase']['form_maecte']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['form_maecte']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check img
   if(empty($_SESSION['scriptcase']['form_maecte']['glo_nm_path_imagens']))
   {
           /*check img*/$_SESSION['scriptcase']['form_maecte']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['form_maecte']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['form_maecte']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //check cache
   if(empty($_SESSION['scriptcase']['form_maecte']['glo_nm_path_cache']))
   {
           /*check cache*/$_SESSION['scriptcase']['form_maecte']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
   }
   //check doc
   if(empty($_SESSION['scriptcase']['form_maecte']['glo_nm_path_doc']))
   {
           /*check doc*/$_SESSION['scriptcase']['form_maecte']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
   }
   //end check publication with the prod
//
class form_maecte_ini
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
   var $link_form_maecte_inline;
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
      $_SESSION['sc_session'][$this->sc_page]['form_maecte']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "form_maecte"; 
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
      $this->path_prod       = $_SESSION['scriptcase']['form_maecte']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_maecte']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_maecte']['glo_nm_path_imag_temp'];
      $this->path_cache      = $_SESSION['scriptcase']['form_maecte']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['form_maecte']['glo_nm_path_doc'];
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_maecte';
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
      if (isset($_SESSION['scriptcase']['form_maecte']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['form_maecte']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['form_maecte']['actual_lang']) || $_SESSION['scriptcase']['form_maecte']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['form_maecte']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_pointofsales',$this->str_lang,'0','/');
      }
      global $inicial_form_maecte;
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
                  if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_flag) && $inicial_form_maecte->contr_form_maecte->NM_ajax_flag)
                  {
                      $inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      form_maecte_pack_ajax_response();
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
          unset($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao']);
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
      if (isset($_SESSION['scriptcase']['form_maecte']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['form_maecte']['session_timeout']['redir_tp'] == "R") {
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
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['form_maecte']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['form_maecte']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['form_maecte']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['form_maecte']['session_timeout']);
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
          $inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir']['action']  = "./";
          $inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir']['target']  = "_self";
          $inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir']['metodo']  = "post";
          $inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
          form_maecte_pack_ajax_response();
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['form_maecte']['session_timeout']['redir']))
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
      $_SESSION['sc_session'][$this->sc_page]['form_maecte']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_maecte']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan'] != 'form_maecte')) 
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      $this->link_form_maecte_inline = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_maecte') . "/form_maecte_inline.php";
      if ($_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['form_maecte']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_maecte"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_maecte"] as $sTmpTargetLink => $sTmpTargetWidget)
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
            if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maecte']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['form_maecte']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['form_maecte']['link_info']['compact_mode'] = true;
        }
        if (isset($link_remove_margin) && 'ok' == $link_remove_margin) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maecte']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['form_maecte']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['form_maecte']['link_info']['remove_margin'] = true;
        }
        if (isset($link_remove_border) && 'ok' == $link_remove_border) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['form_maecte']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['form_maecte']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['form_maecte']['link_info']['remove_border'] = true;
        }

      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php");
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod");
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib");
      if(function_exists('set_php_timezone'))  set_php_timezone('form_maecte'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/fix.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_form_maecte, $NM_run_iframe;
      if ((isset($inicial_form_maecte->contr_form_maecte->NM_ajax_flag) && $inicial_form_maecte->contr_form_maecte->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['form_maecte']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['form_maecte']['embutida_call']) || $NM_run_iframe == 1)
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
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcJeDQFUD1vOVWJsHgrKVcBOV5FYVEBiHQBiZSB/HArYHQJsDEBeZSJGDuFaHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWFaHIF7HQBqVINUD1zGZMJeDMvCVkJ3DWX7HIJeHQXGDuFaDSvCVWJeDMvOVIB/HEX/VoX7HQFYZkBiDSvOZMBOHgNOZSJqDuFaHIFUHQXGDuFaHABYHQBODMvmDkBsDWJeHIraDcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeH9BiZ1BYHQB/DMBOVIBsV5FYHMJsHQFYZkFGHIrwHQFaHgNODkXKDuFaHMFaHQXGDuFaD1veHQNUDMvmV9BUDWJeHINUHQFYZkFGD1rwHuFUHgBOHErCHEXKZuB/DcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqZSBOHAN7HQBqHgNKHEJqDWFqDoJsHQXGDuBqD1vOV5BOHgvOVIB/HEFYHMFUHQFYZkBiDSvOZMJeHgrKZSJ3V5XCHIrqHQXGDQFUHIrKHQJsHgvOZSNiH5FqHIJsDcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeZ9XGHAvCV5BODMBOZSJqDWJeHIFUHQFYZ1BOHANOHQX7HgrKVkJ3H5X/DoXGHQXGDuBqHANOHQNUDMrYVcB/DWXKVEX7HQFYZ1BOHIBeHQJeHgvsHENiDWB3DoXGDcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqZSBqZ1NOHuFUHgBOHEJqHEFqHMJsHQXGDuFaD1veHuB/HgrwDkBsHEFGVErqHQFYZkBiHArYHQJsDMvCVkJqH5FGDoJeHQXGDQFUDSN7HuX7DMvmZSNiDWJeHIF7DcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeH9FUHANOHQJsHgvOVcBUH5FqHIraHQFYZkFGHIveHQraHgBOHArCDuJeHIBiHQXGDQFUDSN7V5FaDMBOVcXKHEBmVoX7HQFYZkFGDSNOHuFGHgNKVkJ3DuXKZuXGDcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqVINUHIveHQNUHgrKZSJ3H5F/HMFGHQXGDQFUHAN7HQFaDMvmV9BUHEFYHMJsHQFYZkFGDSBeHuBqHgNOVkJqH5FGZuBOHQXGDuBqHABYHQXGDMNOV9BUDWJeHIFUDcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBqHQJeH9FUHIrwHuFUHgrwVIB/DWJeHIX7HQFYZkFGHAvCD5XGHgBeVkJqDWXCHMB/HQXGDuFaHAvCVWJeDMvsVcB/DuX7HIXGHQFYZkBiD1zGZMB/DMveVkJ3HEB3ZuBODcJUZSX7HIBeD5BqHgvsZSJ3H5FqHIF7HQBqZSBqHINKZMB/HgBOHErCV5FqDoJsHQXGDuFaD1veHuF7DMvmDkBsDWFaHMJeHQFYZkBiHANOHQBiDMvCHENiDWr/HIFUHQXGDuBqHANOHuNUDMBOV9FeHEBmVEFGDcBwH9B/HIrwV5JeDMBYDkBsH5X/VoJsHQJwZ9JeDSvCV5BiDMzGVcBODWBmVoFaD9BsZ1FaHArYV5FGDEvsHEFiHEFqDoBOD9XsDQJsD1vOV5BiDMzGV9FeH5XCVoFGDcBwZ1F7HABYD5XGDMzGHAFKDWF/DoXGD9JKDQJsZ1rwVWXGHuNOZSrCDuB7VoFaD9XGZ1B/Z1BeZMFaDMrYHEFiH5FYDoraD9XsZ9JeHAveVWJwHuzGDkBOH5XKVoFaDcJUZ1B/DSrYZMB/DEBeHEFiDWFqDoJeDcJUDQJsZ1rwD5JeHgNKVcrsH5XCDoX7DcJUZ1B/Z1vOD5raDMzGVkXeV5FaDoJeDcJUDQJsHIBeD5BqHgvsDkBODWFYDoJsD9XOH9B/DSrYV5FUDMzGDkBsV5B3DoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQJmH9BqD1rwHQFaHgBOVkJqHEB7VoFGHQJeDuFaDSrwHuJwDMvOZSNiDuFGDoXGHQXGZ1FGHIrwHQJeHgveVkJ3HEB3VoFGHQJeDQBqHIrKV5FaHgvOVcFeH5B3VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQXsH9BiZ1vCVWBqDMBYV9BUDWBmDoXGDcFYZkFGHINaZMBqDMvCHENiDuXKVoFGHQJeDQFUDSvCVWBODMzGZSNiHEX/DoXGHQNwVINUHANOHQJeHgNKZSJ3DuX/DoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQBqZ1BiHIBeHuFaHgBOHEJqDWrGVoFGDcBiZ9XGHABYV5FaHgrwVIBsHEFGDoXGHQJmZSBqZ1rYHQraHgBeZSJ3V5B3VoFGHQXODuBqHANOHuX7DMrYZSNiH5B7VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQXODQFUHABYHQJwDMrYZSNiDuFGDoXGHQNmH9BqD1rKHuJsHgBeZSJqHEB3VoFGHQXsZSFUHArYHQBOHgvOVcXKH5B7DoXGHQXGZkFGD1rwHuFGHgrKVkJ3DuX/DoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiDcNmZkBiHIBeHQBqHgvsHENiDWB3VoFGHQXOZSBiZ1BYHQXGDMvmZSNiDuFGDoXGDcNmZ1BiD1rwHuJsHgBOVkJ3DuXKVoFGHQXOZSBiZ1zGVWXGHgvOVcBUHEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQFYZSBiD1BeHurqDMrYVcFeHEBmDoXGDcFYZkBiHIBOZMFaHgNODkXKH5BmVoFGHQNmDQB/D1veHQJwDMBOZSNiDWBmDoXGHQBsZ1BiHINKD5JeHgNOZSJqDurmDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQNwZ1BOHAvCZMJeHgNKVkJqHEB7VoFGHQXsDuFaHAvOVWBODMBOVcB/DurGDoXGHQNwZ1BOHABYHuFUDMveVkJqH5FGVoFGHQJeDuBqDSBYHuraHgrwVIB/HEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQJKZSBiZ1vCV5BqHgvOV9FeDWXKDoXGHQJmVINUHIBeHQNUHgrKZSJqH5FGVoFGHQNwZSBiDSN7HuJeDMrYVcFeHEFGDoXGHQXGZSBqD1rwHuBOHgBOZSJ3DWrGDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQNwZ1X7DSrYHuFGHgNOHArCV5B3VoFGDcBiDQB/HABYHuX7DMvmV9FeDWrmDoXGHQJmH9BOHArKHuBqHgBOZSJ3H5X/VoFGHQJeDQB/HIrwHuX7HgrwZSNiHEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsDcBiH9FUD1BeHQXGDMBYVcFeDurGDoXGHQXGZ1BiD1rwHQFaHgBOVkJ3H5X/VoFGHQFYH9BiHIBeHuraDMvOZSNiDWrmDoXGHQXGZSBqHAN7HuFUDMvCVkJqDWBmDoF7D9XsDQJsDSBYV5FGHgNKDkBsDuB7VEBiDcFYVIJsD1rwHQFGHgNOVkJ3DuXKVoFGHQXsDuFaDSN7HurqDMNOVcFeV5X/DoXGHQBsH9BOHArYHQBOHgNOHErCHEB3VoFGDcXGDuFaHAN7V5FaHgrwVcXKDuFGVoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQFYH9FaHANOD5NUDErKDkFeV5FaZuBqD9NmZSFGHINaV5JwHuvmVcrsH5XCDoXGD9BsZ1FUZ1BeD5JeDMBYZSJGDWr/VoXGD9NwDQJwD1veV5FGHgvsVcFCH5FqDoraHQFYVIJwD1rwV5FGDEBeHEXeH5X/DoF7D9NwZSX7D1BeV5raHuvmVcFKV5X7VoFGD9BiZ1X7Z1BeHQJsDEBOHEFiHEFqVoB/D9XsH9FGHIrwV5FUHuzGVIBOH5XKDoXGHQNmZkBiD1zGV5X7HgNODkXKH5F/HIJsD9XsZ9JeD1BeD5F7DMvmVcXKHEFYHIJsDcFYZSFaDSNOHuBqDMvCVkXeDWB3ZuFaHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoraDcJUZSB/Z1BeD5XGDEBOHEJqV5FaVoFGDcJeDQX7HABYV5FGHuBYVcFKH5XKDoJsD9XOZ1F7HIveD5BqHgBeHEFiV5B3DoF7D9XsDuFaHAveHuFaHuNOZSrCH5FqDoXGHQJmZ1X7HINKZMBODMvCVkJGH5F/VoFGHQBiH9BiZ1BYHuraHuBYV9FeDWFYHIX7HQXOZ1rqD1rKHQJwDEBODkFeH5FYVoFGHQJKDQJsHABYV5JeHgrYDkBODWJeVoX7D9BsH9B/Z1NOZMJwDMzGHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMvOZSNiDWB3VoX7HQNmVINUHAvsZMBOHgveHArsDWF/HIJsD9XsZ9JeD1BeD5F7DMvmVcFeDuX7DoraHQBiZ1FaDSrYV5B/DMvCHEJqDuFaDoBODcBiDQFUHIrwVWJeDMBODkFCH5XCHIraDcNmZSB/D1rwHQJwDEBODkFeH5FYVoFGHQJKDQFaDSN7VWJwHgvsVcBOV5BmVoFaHQXOZSB/Z1BeD5JeDMzGHAFKDWF/HIJwD9FYDQX7HArYD5rqHgvsV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgBYHAFKV5B3DoBO";
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_maecte']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan'] != 'form_maecte')) 
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
      $con_devel             =  (isset($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_maecte']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_maecte']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_maecte']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_maecte']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_maecte']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_maecte']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_maecte']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_maecte']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'pointofsales', 2, $this->force_db_utf8); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_maecte']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_maecte']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_maecte']['glo_nm_perfil'];
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
         $_SESSION['sc_session'][$this->sc_page]['form_maecte']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['form_maecte']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['form_maecte']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['form_maecte']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['form_maecte']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['form_maecte']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['form_maecte']['SC_sep_date1'];
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "maecte"; 
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
          if (!$_SESSION['sc_session'][$this->sc_page]['form_maecte']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['form_maecte']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['form_maecte']['sc_outra_jan'] != 'form_maecte')) 
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao'], $this->root . $this->path_prod, 'pointofsales', 1, $this->force_db_utf8); 
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
          $_SESSION['sc_session'][$this->sc_page]['form_maecte']['decimal_db'] = "."; 
      } 
  }

  function setConnectionHash() {
    if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao'])) {
      list($connectionDbms, $connectionHost, $connectionUser, $connectionPassword, $connectionDatabase) = db_conect_devel($_SESSION['scriptcase']['form_maecte']['glo_nm_conexao'], $this->root . $this->path_prod, 'pointofsales', 1, $this->force_db_utf8);
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['form_maecte']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['form_maecte']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['form_maecte']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['form_maecte']['SC_sep_date1'];
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
class form_maecte_edit
{
    var $contr_form_maecte;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("form_maecte_apl.php");
        $this->contr_form_maecte = new form_maecte_apl();
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
    $_SESSION['scriptcase']['form_maecte']['contr_erro'] = 'off';
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
             nm_limpa_str_form_maecte($nmgp_val);
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
             nm_limpa_str_form_maecte($nmgp_val);
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
        elseif (is_file($root . $_SESSION['scriptcase']['form_maecte']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt")) {
            $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['form_maecte']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt"));
        }
        if (isset($apl_def)) {
            if ($apl_def[0] != "form_maecte") {
                $_SESSION['scriptcase']['sem_session'] = true;
                if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                    $_SESSION['scriptcase']['form_maecte']['session_timeout']['redir'] = $apl_def[0];
                }
                else {
                    $_SESSION['scriptcase']['form_maecte']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
                }
                $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
                $_SESSION['scriptcase']['form_maecte']['session_timeout']['redir_tp'] = $Redir_tp;
            }
            if (isset($_COOKIE['sc_actual_lang_pointofsales'])) {
                $_SESSION['scriptcase']['form_maecte']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_pointofsales'];
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
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']) && !isset($_SESSION['scriptcase']['form_maecte']['session_timeout']['redir']))
    {
        if ('ajax_form_maecte_validate_codcte01' == $_POST['rs'])
        {
            $codcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_tipo_cliente' == $_POST['rs'])
        {
            $tipo_cliente = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_nacionalidad' == $_POST['rs'])
        {
            $id_nacionalidad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_nomcte01' == $_POST['rs'])
        {
            $nomcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_primer_nombre' == $_POST['rs'])
        {
            $primer_nombre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_segundo_nombre' == $_POST['rs'])
        {
            $segundo_nombre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_primer_apellido' == $_POST['rs'])
        {
            $primer_apellido = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_segundo_apellido' == $_POST['rs'])
        {
            $segundo_apellido = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cv1cte01' == $_POST['rs'])
        {
            $cv1cte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cv2cte01' == $_POST['rs'])
        {
            $cv2cte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_tipcte01' == $_POST['rs'])
        {
            $tipcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ofienccte01' == $_POST['rs'])
        {
            $ofienccte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_vendcte01' == $_POST['rs'])
        {
            $vendcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cobrcte01' == $_POST['rs'])
        {
            $cobrcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_loccte01' == $_POST['rs'])
        {
            $loccte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_dircte01' == $_POST['rs'])
        {
            $dircte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sector' == $_POST['rs'])
        {
            $sector = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_calle_principal' == $_POST['rs'])
        {
            $calle_principal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_no' == $_POST['rs'])
        {
            $no = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_calle_secundaria' == $_POST['rs'])
        {
            $calle_secundaria = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_pais' == $_POST['rs'])
        {
            $id_pais = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_provincia' == $_POST['rs'])
        {
            $id_provincia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_ciudad' == $_POST['rs'])
        {
            $id_ciudad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_canton' == $_POST['rs'])
        {
            $id_canton = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telcte01' == $_POST['rs'])
        {
            $telcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cascte01' == $_POST['rs'])
        {
            $cascte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ci_conyuge' == $_POST['rs'])
        {
            $ci_conyuge = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_conyuge_tipo_identidad' == $_POST['rs'])
        {
            $conyuge_tipo_identidad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_conyuge_primer_nombre' == $_POST['rs'])
        {
            $conyuge_primer_nombre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_conyuge_segundo_nombre' == $_POST['rs'])
        {
            $conyuge_segundo_nombre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_conyuge_primer_apellido' == $_POST['rs'])
        {
            $conyuge_primer_apellido = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_conyuge_segundo_apellido' == $_POST['rs'])
        {
            $conyuge_segundo_apellido = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_conyuge_profesion' == $_POST['rs'])
        {
            $conyuge_profesion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_tipo_documento' == $_POST['rs'])
        {
            $id_tipo_documento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_repleg01' == $_POST['rs'])
        {
            $repleg01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecing01' == $_POST['rs'])
        {
            $fecing01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_condpag01' == $_POST['rs'])
        {
            $condpag01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_desctocte01' == $_POST['rs'])
        {
            $desctocte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_limcred01' == $_POST['rs'])
        {
            $limcred01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_desppar01' == $_POST['rs'])
        {
            $desppar01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cheqpro01' == $_POST['rs'])
        {
            $cheqpro01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sdoeje01' == $_POST['rs'])
        {
            $sdoeje01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sdoant01' == $_POST['rs'])
        {
            $sdoant01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sdoact01' == $_POST['rs'])
        {
            $sdoact01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_acudbm01' == $_POST['rs'])
        {
            $acudbm01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_acucrm01' == $_POST['rs'])
        {
            $acucrm01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_acudbe01' == $_POST['rs'])
        {
            $acudbe01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_acucre01' == $_POST['rs'])
        {
            $acucre01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_comentcte01' == $_POST['rs'])
        {
            $comentcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_statuscte01' == $_POST['rs'])
        {
            $statuscte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_identcte01' == $_POST['rs'])
        {
            $identcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cordcte01' == $_POST['rs'])
        {
            $cordcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_limcant01' == $_POST['rs'])
        {
            $limcant01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_pagleg01' == $_POST['rs'])
        {
            $pagleg01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telcte01b' == $_POST['rs'])
        {
            $telcte01b = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telcte01c' == $_POST['rs'])
        {
            $telcte01c = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_emailcte01' == $_POST['rs'])
        {
            $emailcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_calle_principal_exterior' == $_POST['rs'])
        {
            $calle_principal_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_no_exterior' == $_POST['rs'])
        {
            $no_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_calle_secundaria_exterior' == $_POST['rs'])
        {
            $calle_secundaria_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_pais_exterior' == $_POST['rs'])
        {
            $id_pais_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_ciudad_exterior' == $_POST['rs'])
        {
            $id_ciudad_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_codigo_postal_exterior' == $_POST['rs'])
        {
            $codigo_postal_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sector_exterior' == $_POST['rs'])
        {
            $sector_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telefono_exterior' == $_POST['rs'])
        {
            $telefono_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_celular_exterior' == $_POST['rs'])
        {
            $celular_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_email_exterior' == $_POST['rs'])
        {
            $email_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_emailaltcte01' == $_POST['rs'])
        {
            $emailaltcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ctacgcte01' == $_POST['rs'])
        {
            $ctacgcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_obsercte01' == $_POST['rs'])
        {
            $obsercte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_totexceso01' == $_POST['rs'])
        {
            $totexceso01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_imagencte01' == $_POST['rs'])
        {
            $imagencte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_block' == $_POST['rs'])
        {
            $block = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_uid' == $_POST['rs'])
        {
            $uid = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ultimoacceso' == $_POST['rs'])
        {
            $ultimoacceso = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_idcli' == $_POST['rs'])
        {
            $idcli = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_catcte01' == $_POST['rs'])
        {
            $catcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_transferido' == $_POST['rs'])
        {
            $transferido = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_password' == $_POST['rs'])
        {
            $password = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_showroom' == $_POST['rs'])
        {
            $showroom = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_orden' == $_POST['rs'])
        {
            $orden = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_website' == $_POST['rs'])
        {
            $website = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_longitud01' == $_POST['rs'])
        {
            $longitud01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_latitud01' == $_POST['rs'])
        {
            $latitud01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_zoom01' == $_POST['rs'])
        {
            $zoom01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_acceder' == $_POST['rs'])
        {
            $acceder = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_coniva01' == $_POST['rs'])
        {
            $coniva01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_idemp01' == $_POST['rs'])
        {
            $idemp01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_codprov01' == $_POST['rs'])
        {
            $codprov01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_celular01' == $_POST['rs'])
        {
            $celular01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_dircliente01' == $_POST['rs'])
        {
            $dircliente01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_razcte01' == $_POST['rs'])
        {
            $razcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ruc01' == $_POST['rs'])
        {
            $ruc01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_timenegocio01' == $_POST['rs'])
        {
            $timenegocio01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_refbanc01' == $_POST['rs'])
        {
            $refbanc01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_refcom01' == $_POST['rs'])
        {
            $refcom01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_tarjcred01' == $_POST['rs'])
        {
            $tarjcred01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_firmaut01' == $_POST['rs'])
        {
            $firmaut01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_precte01' == $_POST['rs'])
        {
            $precte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cuotasven01' == $_POST['rs'])
        {
            $cuotasven01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_diasven01' == $_POST['rs'])
        {
            $diasven01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fechanace01' == $_POST['rs'])
        {
            $fechanace01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sexo01' == $_POST['rs'])
        {
            $sexo01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_estadocivil01' == $_POST['rs'])
        {
            $estadocivil01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_dirgestion01' == $_POST['rs'])
        {
            $dirgestion01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_numhijos01' == $_POST['rs'])
        {
            $numhijos01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_estsop01' == $_POST['rs'])
        {
            $estsop01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_notick01' == $_POST['rs'])
        {
            $notick01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_chequece' == $_POST['rs'])
        {
            $chequece = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_solcre' == $_POST['rs'])
        {
            $solcre = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_promocte01' == $_POST['rs'])
        {
            $promocte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_pagare01' == $_POST['rs'])
        {
            $pagare01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_valorpagare01' == $_POST['rs'])
        {
            $valorpagare01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_garante01' == $_POST['rs'])
        {
            $garante01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecvenp01' == $_POST['rs'])
        {
            $fecvenp01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ctacgant01' == $_POST['rs'])
        {
            $ctacgant01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_dsn' == $_POST['rs'])
        {
            $dsn = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_residente' == $_POST['rs'])
        {
            $residente = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_medio_contacto' == $_POST['rs'])
        {
            $medio_contacto = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_separacion_bienes' == $_POST['rs'])
        {
            $separacion_bienes = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_disolucion_conyugal' == $_POST['rs'])
        {
            $disolucion_conyugal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_capitulaciones' == $_POST['rs'])
        {
            $capitulaciones = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_numero_carga_familiar' == $_POST['rs'])
        {
            $numero_carga_familiar = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_nivel_educacion' == $_POST['rs'])
        {
            $nivel_educacion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_profesion' == $_POST['rs'])
        {
            $profesion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_envio_correspondencia' == $_POST['rs'])
        {
            $envio_correspondencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_nombre_arrendador' == $_POST['rs'])
        {
            $nombre_arrendador = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_apellido_arrendador' == $_POST['rs'])
        {
            $apellido_arrendador = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_vivienda' == $_POST['rs'])
        {
            $id_vivienda = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telefono_arrendador' == $_POST['rs'])
        {
            $telefono_arrendador = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_nombres_referencia' == $_POST['rs'])
        {
            $nombres_referencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_apellidos_referencia' == $_POST['rs'])
        {
            $apellidos_referencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_parentesco' == $_POST['rs'])
        {
            $parentesco = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_celular_ref' == $_POST['rs'])
        {
            $celular_ref = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telefono_convencional_ref' == $_POST['rs'])
        {
            $telefono_convencional_ref = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_ocupacion' == $_POST['rs'])
        {
            $id_ocupacion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecha_ingreso_empresa' == $_POST['rs'])
        {
            $fecha_ingreso_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_nombre_empresa' == $_POST['rs'])
        {
            $nombre_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ciudad_empresa' == $_POST['rs'])
        {
            $ciudad_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_provincia_empresa' == $_POST['rs'])
        {
            $provincia_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_direccion_empresa' == $_POST['rs'])
        {
            $direccion_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cargo_empresa' == $_POST['rs'])
        {
            $cargo_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telefono_empresa' == $_POST['rs'])
        {
            $telefono_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ext_empresa' == $_POST['rs'])
        {
            $ext_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_tipo_contrato_actividad' == $_POST['rs'])
        {
            $id_tipo_contrato_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_empresa_jubilo_actividad' == $_POST['rs'])
        {
            $empresa_jubilo_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecha_salida_empresa_actividad' == $_POST['rs'])
        {
            $fecha_salida_empresa_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cargo_salida_empresa_actividad' == $_POST['rs'])
        {
            $cargo_salida_empresa_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecha_inicio_actividad' == $_POST['rs'])
        {
            $fecha_inicio_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecha_ingreso_empresa_actividad' == $_POST['rs'])
        {
            $fecha_ingreso_empresa_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_nombre_empresa_actividad' == $_POST['rs'])
        {
            $nombre_empresa_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_institucion_actividad' == $_POST['rs'])
        {
            $institucion_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ciudad_actividad' == $_POST['rs'])
        {
            $ciudad_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_provincia_actividad' == $_POST['rs'])
        {
            $provincia_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_direccion_actividad' == $_POST['rs'])
        {
            $direccion_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_calle_principal_actividad' == $_POST['rs'])
        {
            $calle_principal_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_no_actividad' == $_POST['rs'])
        {
            $no_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_calle_secundaria_actividad' == $_POST['rs'])
        {
            $calle_secundaria_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sector_actividad' == $_POST['rs'])
        {
            $sector_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_pais_actividad' == $_POST['rs'])
        {
            $pais_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_actividad' == $_POST['rs'])
        {
            $actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telefono_actividad' == $_POST['rs'])
        {
            $telefono_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cargo_actividad' == $_POST['rs'])
        {
            $cargo_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ext_actividad' == $_POST['rs'])
        {
            $ext_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecha_ingreso_empresa_actividad2' == $_POST['rs'])
        {
            $fecha_ingreso_empresa_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_nombre_empresa_actividad2' == $_POST['rs'])
        {
            $nombre_empresa_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_institucion_actividad2' == $_POST['rs'])
        {
            $institucion_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ciudad_actividad2' == $_POST['rs'])
        {
            $ciudad_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_provincia_actividad2' == $_POST['rs'])
        {
            $provincia_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_direccion_actividad2' == $_POST['rs'])
        {
            $direccion_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_calle_principal_actividad2' == $_POST['rs'])
        {
            $calle_principal_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_no_actividad2' == $_POST['rs'])
        {
            $no_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_calle_secundaria_actividad2' == $_POST['rs'])
        {
            $calle_secundaria_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sector_actividad2' == $_POST['rs'])
        {
            $sector_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecha_salida_empresa_actividad2' == $_POST['rs'])
        {
            $fecha_salida_empresa_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecha_inicio_actividad2' == $_POST['rs'])
        {
            $fecha_inicio_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_actividad2' == $_POST['rs'])
        {
            $actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telefono_actividad2' == $_POST['rs'])
        {
            $telefono_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ext_actividad2' == $_POST['rs'])
        {
            $ext_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cargo_actividad2' == $_POST['rs'])
        {
            $cargo_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_tipo_contrato_actividad2' == $_POST['rs'])
        {
            $id_tipo_contrato_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_empresa_jubilo_actividad2' == $_POST['rs'])
        {
            $empresa_jubilo_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sueldo' == $_POST['rs'])
        {
            $sueldo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_arriendos' == $_POST['rs'])
        {
            $arriendos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_dividendo_utilidades_ultimo_ano' == $_POST['rs'])
        {
            $dividendo_utilidades_ultimo_ano = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_otros_ingresos' == $_POST['rs'])
        {
            $id_otros_ingresos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_arriendo_hipoteca' == $_POST['rs'])
        {
            $arriendo_hipoteca = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_prestamos' == $_POST['rs'])
        {
            $prestamos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_tarjetas_creditos' == $_POST['rs'])
        {
            $tarjetas_creditos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_gastos_familiares' == $_POST['rs'])
        {
            $gastos_familiares = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_otros_gastos' == $_POST['rs'])
        {
            $id_otros_gastos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_depositos_bancos' == $_POST['rs'])
        {
            $depositos_bancos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cuentas_documentos' == $_POST['rs'])
        {
            $cuentas_documentos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_mercaderias' == $_POST['rs'])
        {
            $mercaderias = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_maquinarias_vehiculos' == $_POST['rs'])
        {
            $maquinarias_vehiculos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_terrenos_edificios' == $_POST['rs'])
        {
            $terrenos_edificios = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_acciones_bonos_cedulas' == $_POST['rs'])
        {
            $acciones_bonos_cedulas = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_otros_activos' == $_POST['rs'])
        {
            $id_otros_activos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cuentas_por_pagar' == $_POST['rs'])
        {
            $cuentas_por_pagar = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_prestamos_banco_menos_ano' == $_POST['rs'])
        {
            $prestamos_banco_menos_ano = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_prestamos_banco_mas_ano' == $_POST['rs'])
        {
            $prestamos_banco_mas_ano = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_deudas_tarjetas_creditos' == $_POST['rs'])
        {
            $deudas_tarjetas_creditos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_otras_obligaciones' == $_POST['rs'])
        {
            $id_otras_obligaciones = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_deudor' == $_POST['rs'])
        {
            $deudor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_monto' == $_POST['rs'])
        {
            $monto = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_descripcion' == $_POST['rs'])
        {
            $descripcion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_placa' == $_POST['rs'])
        {
            $placa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_valor_maquinaria_vehiculo' == $_POST['rs'])
        {
            $valor_maquinaria_vehiculo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_a_nombre_de' == $_POST['rs'])
        {
            $a_nombre_de = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ubicacion' == $_POST['rs'])
        {
            $ubicacion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_valor_propiedad' == $_POST['rs'])
        {
            $valor_propiedad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_empresa' == $_POST['rs'])
        {
            $empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_valor_mercado' == $_POST['rs'])
        {
            $valor_mercado = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_institucion_bancaria' == $_POST['rs'])
        {
            $institucion_bancaria = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_monto_banco' == $_POST['rs'])
        {
            $monto_banco = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_institucion_finaciera' == $_POST['rs'])
        {
            $institucion_finaciera = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_monto_institucion_finaciera' == $_POST['rs'])
        {
            $monto_institucion_finaciera = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_cliente_juridico' == $_POST['rs'])
        {
            $id_cliente_juridico = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_nombre_completo_empresa' == $_POST['rs'])
        {
            $nombre_completo_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_es_empresa_extranjera' == $_POST['rs'])
        {
            $es_empresa_extranjera = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_pais_empresa' == $_POST['rs'])
        {
            $pais_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecha_constitucion_empresa' == $_POST['rs'])
        {
            $fecha_constitucion_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_oficina' == $_POST['rs'])
        {
            $id_oficina = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_tipo_actividad' == $_POST['rs'])
        {
            $id_tipo_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_especifique_otros' == $_POST['rs'])
        {
            $especifique_otros = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_direccion_correspondencia' == $_POST['rs'])
        {
            $direccion_correspondencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_calle_principal_correspondencia' == $_POST['rs'])
        {
            $calle_principal_correspondencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_no_correspondencia' == $_POST['rs'])
        {
            $no_correspondencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_calle_secundaria_correspondencia' == $_POST['rs'])
        {
            $calle_secundaria_correspondencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_ciudad_correspondencia' == $_POST['rs'])
        {
            $id_ciudad_correspondencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_nombre_empresa_solicitante' == $_POST['rs'])
        {
            $nombre_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cargo_empresa_solicitante' == $_POST['rs'])
        {
            $cargo_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_celular_empresa_solicitante' == $_POST['rs'])
        {
            $celular_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telefono_empresa_solicitante' == $_POST['rs'])
        {
            $telefono_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_mail_empresa_solicitante' == $_POST['rs'])
        {
            $mail_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_saldo_empresa_solicitante' == $_POST['rs'])
        {
            $saldo_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_nombre_referencia_comerciales' == $_POST['rs'])
        {
            $nombre_referencia_comerciales = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_fecha_compra' == $_POST['rs'])
        {
            $fecha_compra = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_telefono_referencia_comerciales' == $_POST['rs'])
        {
            $telefono_referencia_comerciales = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ventas' == $_POST['rs'])
        {
            $ventas = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_comisiones' == $_POST['rs'])
        {
            $comisiones = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_gastos_operativos' == $_POST['rs'])
        {
            $gastos_operativos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_gastos_administrativos' == $_POST['rs'])
        {
            $gastos_administrativos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_pago_cuotas_prestamo' == $_POST['rs'])
        {
            $pago_cuotas_prestamo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_funcionario' == $_POST['rs'])
        {
            $funcionario = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_funcionario_detalle' == $_POST['rs'])
        {
            $funcionario_detalle = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_miembro_politico' == $_POST['rs'])
        {
            $miembro_politico = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_miembro_politico_detalle' == $_POST['rs'])
        {
            $miembro_politico_detalle = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ejecutivo_gobierno' == $_POST['rs'])
        {
            $ejecutivo_gobierno = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_ejecutivo_gobierno_detalle' == $_POST['rs'])
        {
            $ejecutivo_gobierno_detalle = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_familiar_gobierno' == $_POST['rs'])
        {
            $familiar_gobierno = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_familiar_gobierno_detalle' == $_POST['rs'])
        {
            $familiar_gobierno_detalle = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_familiar_gobierno_detalle_quien' == $_POST['rs'])
        {
            $familiar_gobierno_detalle_quien = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_otros_ingresos' == $_POST['rs'])
        {
            $otros_ingresos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_otros_gastos' == $_POST['rs'])
        {
            $otros_gastos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_otros_activos' == $_POST['rs'])
        {
            $otros_activos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_otras_obligaciones' == $_POST['rs'])
        {
            $otras_obligaciones = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sector_direccion_empresa' == $_POST['rs'])
        {
            $sector_direccion_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_sector_direccion_empresa_correo' == $_POST['rs'])
        {
            $sector_direccion_empresa_correo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_extranjero_nombres_referencia' == $_POST['rs'])
        {
            $extranjero_nombres_referencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_extranjero_apellidos_referencia' == $_POST['rs'])
        {
            $extranjero_apellidos_referencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_extranjero_parentesco' == $_POST['rs'])
        {
            $extranjero_parentesco = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_extranjero_celular_ref' == $_POST['rs'])
        {
            $extranjero_celular_ref = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_extranjero_telefono_convencional_ref' == $_POST['rs'])
        {
            $extranjero_telefono_convencional_ref = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_cargo_representante_legal' == $_POST['rs'])
        {
            $cargo_representante_legal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_direccion_extranjero' == $_POST['rs'])
        {
            $direccion_extranjero = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_relacion_dependencia_principal' == $_POST['rs'])
        {
            $relacion_dependencia_principal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_correo_corporativo_principal' == $_POST['rs'])
        {
            $correo_corporativo_principal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_relacion_dependencia_secundaria' == $_POST['rs'])
        {
            $relacion_dependencia_secundaria = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_correo_corporativo_secundario' == $_POST['rs'])
        {
            $correo_corporativo_secundario = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_actividad_secundaria' == $_POST['rs'])
        {
            $actividad_secundaria = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_pais_empresa' == $_POST['rs'])
        {
            $id_pais_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_provincia_empresa' == $_POST['rs'])
        {
            $id_provincia_empresa = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_pais_correo' == $_POST['rs'])
        {
            $id_pais_correo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_provincia_correo' == $_POST['rs'])
        {
            $id_provincia_correo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_apellido_empresa_solicitante' == $_POST['rs'])
        {
            $apellido_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_pais_actividad2' == $_POST['rs'])
        {
            $pais_actividad2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_provincia_exterior' == $_POST['rs'])
        {
            $id_provincia_exterior = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_pais_independiente' == $_POST['rs'])
        {
            $pais_independiente = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_tipo_contrato_otros_actividad_principal' == $_POST['rs'])
        {
            $tipo_contrato_otros_actividad_principal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_actividadeconomica' == $_POST['rs'])
        {
            $actividadeconomica = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_clasesujeto' == $_POST['rs'])
        {
            $clasesujeto = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_provincia' == $_POST['rs'])
        {
            $provincia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_parroquia' == $_POST['rs'])
        {
            $parroquia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_canton' == $_POST['rs'])
        {
            $canton = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_demandajudicial' == $_POST['rs'])
        {
            $demandajudicial = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_vdemandajudicial' == $_POST['rs'])
        {
            $vdemandajudicial = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_carteracastigada' == $_POST['rs'])
        {
            $carteracastigada = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_vcarteracastigada' == $_POST['rs'])
        {
            $vcarteracastigada = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_accesoexterno01' == $_POST['rs'])
        {
            $accesoexterno01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_referencia' == $_POST['rs'])
        {
            $referencia = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_pais_empleado_dir_desempeno' == $_POST['rs'])
        {
            $id_pais_empleado_dir_desempeno = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_provincia_empleado_dir_desempeno' == $_POST['rs'])
        {
            $id_provincia_empleado_dir_desempeno = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_ciudad_empleado_dir_desempeno' == $_POST['rs'])
        {
            $id_ciudad_empleado_dir_desempeno = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_razon_social' == $_POST['rs'])
        {
            $razon_social = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_parterel01' == $_POST['rs'])
        {
            $parterel01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_origen_fondos' == $_POST['rs'])
        {
            $origen_fondos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_tipo_identificacion' == $_POST['rs'])
        {
            $tipo_identificacion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_validate_id_actividad' == $_POST['rs'])
        {
            $id_actividad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_maecte_submit_form' == $_POST['rs'])
        {
            $codcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $tipo_cliente = NM_utf8_urldecode($_POST['rsargs'][1]);
            $id_nacionalidad = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nomcte01 = NM_utf8_urldecode($_POST['rsargs'][3]);
            $primer_nombre = NM_utf8_urldecode($_POST['rsargs'][4]);
            $segundo_nombre = NM_utf8_urldecode($_POST['rsargs'][5]);
            $primer_apellido = NM_utf8_urldecode($_POST['rsargs'][6]);
            $segundo_apellido = NM_utf8_urldecode($_POST['rsargs'][7]);
            $cv1cte01 = NM_utf8_urldecode($_POST['rsargs'][8]);
            $cv2cte01 = NM_utf8_urldecode($_POST['rsargs'][9]);
            $tipcte01 = NM_utf8_urldecode($_POST['rsargs'][10]);
            $ofienccte01 = NM_utf8_urldecode($_POST['rsargs'][11]);
            $vendcte01 = NM_utf8_urldecode($_POST['rsargs'][12]);
            $cobrcte01 = NM_utf8_urldecode($_POST['rsargs'][13]);
            $loccte01 = NM_utf8_urldecode($_POST['rsargs'][14]);
            $dircte01 = NM_utf8_urldecode($_POST['rsargs'][15]);
            $sector = NM_utf8_urldecode($_POST['rsargs'][16]);
            $calle_principal = NM_utf8_urldecode($_POST['rsargs'][17]);
            $no = NM_utf8_urldecode($_POST['rsargs'][18]);
            $calle_secundaria = NM_utf8_urldecode($_POST['rsargs'][19]);
            $id_pais = NM_utf8_urldecode($_POST['rsargs'][20]);
            $id_provincia = NM_utf8_urldecode($_POST['rsargs'][21]);
            $id_ciudad = NM_utf8_urldecode($_POST['rsargs'][22]);
            $id_canton = NM_utf8_urldecode($_POST['rsargs'][23]);
            $telcte01 = NM_utf8_urldecode($_POST['rsargs'][24]);
            $cascte01 = NM_utf8_urldecode($_POST['rsargs'][25]);
            $ci_conyuge = NM_utf8_urldecode($_POST['rsargs'][26]);
            $conyuge_tipo_identidad = NM_utf8_urldecode($_POST['rsargs'][27]);
            $conyuge_primer_nombre = NM_utf8_urldecode($_POST['rsargs'][28]);
            $conyuge_segundo_nombre = NM_utf8_urldecode($_POST['rsargs'][29]);
            $conyuge_primer_apellido = NM_utf8_urldecode($_POST['rsargs'][30]);
            $conyuge_segundo_apellido = NM_utf8_urldecode($_POST['rsargs'][31]);
            $conyuge_profesion = NM_utf8_urldecode($_POST['rsargs'][32]);
            $id_tipo_documento = NM_utf8_urldecode($_POST['rsargs'][33]);
            $repleg01 = NM_utf8_urldecode($_POST['rsargs'][34]);
            $fecing01 = NM_utf8_urldecode($_POST['rsargs'][35]);
            $condpag01 = NM_utf8_urldecode($_POST['rsargs'][36]);
            $desctocte01 = NM_utf8_urldecode($_POST['rsargs'][37]);
            $limcred01 = NM_utf8_urldecode($_POST['rsargs'][38]);
            $desppar01 = NM_utf8_urldecode($_POST['rsargs'][39]);
            $cheqpro01 = NM_utf8_urldecode($_POST['rsargs'][40]);
            $sdoeje01 = NM_utf8_urldecode($_POST['rsargs'][41]);
            $sdoant01 = NM_utf8_urldecode($_POST['rsargs'][42]);
            $sdoact01 = NM_utf8_urldecode($_POST['rsargs'][43]);
            $acudbm01 = NM_utf8_urldecode($_POST['rsargs'][44]);
            $acucrm01 = NM_utf8_urldecode($_POST['rsargs'][45]);
            $acudbe01 = NM_utf8_urldecode($_POST['rsargs'][46]);
            $acucre01 = NM_utf8_urldecode($_POST['rsargs'][47]);
            $comentcte01 = NM_utf8_urldecode($_POST['rsargs'][48]);
            $statuscte01 = NM_utf8_urldecode($_POST['rsargs'][49]);
            $identcte01 = NM_utf8_urldecode($_POST['rsargs'][50]);
            $cordcte01 = NM_utf8_urldecode($_POST['rsargs'][51]);
            $limcant01 = NM_utf8_urldecode($_POST['rsargs'][52]);
            $pagleg01 = NM_utf8_urldecode($_POST['rsargs'][53]);
            $telcte01b = NM_utf8_urldecode($_POST['rsargs'][54]);
            $telcte01c = NM_utf8_urldecode($_POST['rsargs'][55]);
            $emailcte01 = NM_utf8_urldecode($_POST['rsargs'][56]);
            $calle_principal_exterior = NM_utf8_urldecode($_POST['rsargs'][57]);
            $no_exterior = NM_utf8_urldecode($_POST['rsargs'][58]);
            $calle_secundaria_exterior = NM_utf8_urldecode($_POST['rsargs'][59]);
            $id_pais_exterior = NM_utf8_urldecode($_POST['rsargs'][60]);
            $id_ciudad_exterior = NM_utf8_urldecode($_POST['rsargs'][61]);
            $codigo_postal_exterior = NM_utf8_urldecode($_POST['rsargs'][62]);
            $sector_exterior = NM_utf8_urldecode($_POST['rsargs'][63]);
            $telefono_exterior = NM_utf8_urldecode($_POST['rsargs'][64]);
            $celular_exterior = NM_utf8_urldecode($_POST['rsargs'][65]);
            $email_exterior = NM_utf8_urldecode($_POST['rsargs'][66]);
            $emailaltcte01 = NM_utf8_urldecode($_POST['rsargs'][67]);
            $ctacgcte01 = NM_utf8_urldecode($_POST['rsargs'][68]);
            $obsercte01 = NM_utf8_urldecode($_POST['rsargs'][69]);
            $totexceso01 = NM_utf8_urldecode($_POST['rsargs'][70]);
            $imagencte01 = NM_utf8_urldecode($_POST['rsargs'][71]);
            $block = NM_utf8_urldecode($_POST['rsargs'][72]);
            $uid = NM_utf8_urldecode($_POST['rsargs'][73]);
            $ultimoacceso = NM_utf8_urldecode($_POST['rsargs'][74]);
            $idcli = NM_utf8_urldecode($_POST['rsargs'][75]);
            $catcte01 = NM_utf8_urldecode($_POST['rsargs'][76]);
            $transferido = NM_utf8_urldecode($_POST['rsargs'][77]);
            $password = NM_utf8_urldecode($_POST['rsargs'][78]);
            $showroom = NM_utf8_urldecode($_POST['rsargs'][79]);
            $orden = NM_utf8_urldecode($_POST['rsargs'][80]);
            $website = NM_utf8_urldecode($_POST['rsargs'][81]);
            $longitud01 = NM_utf8_urldecode($_POST['rsargs'][82]);
            $latitud01 = NM_utf8_urldecode($_POST['rsargs'][83]);
            $zoom01 = NM_utf8_urldecode($_POST['rsargs'][84]);
            $acceder = NM_utf8_urldecode($_POST['rsargs'][85]);
            $coniva01 = NM_utf8_urldecode($_POST['rsargs'][86]);
            $idemp01 = NM_utf8_urldecode($_POST['rsargs'][87]);
            $codprov01 = NM_utf8_urldecode($_POST['rsargs'][88]);
            $celular01 = NM_utf8_urldecode($_POST['rsargs'][89]);
            $dircliente01 = NM_utf8_urldecode($_POST['rsargs'][90]);
            $razcte01 = NM_utf8_urldecode($_POST['rsargs'][91]);
            $ruc01 = NM_utf8_urldecode($_POST['rsargs'][92]);
            $timenegocio01 = NM_utf8_urldecode($_POST['rsargs'][93]);
            $refbanc01 = NM_utf8_urldecode($_POST['rsargs'][94]);
            $refcom01 = NM_utf8_urldecode($_POST['rsargs'][95]);
            $tarjcred01 = NM_utf8_urldecode($_POST['rsargs'][96]);
            $firmaut01 = NM_utf8_urldecode($_POST['rsargs'][97]);
            $precte01 = NM_utf8_urldecode($_POST['rsargs'][98]);
            $cuotasven01 = NM_utf8_urldecode($_POST['rsargs'][99]);
            $diasven01 = NM_utf8_urldecode($_POST['rsargs'][100]);
            $fechanace01 = NM_utf8_urldecode($_POST['rsargs'][101]);
            $sexo01 = NM_utf8_urldecode($_POST['rsargs'][102]);
            $estadocivil01 = NM_utf8_urldecode($_POST['rsargs'][103]);
            $dirgestion01 = NM_utf8_urldecode($_POST['rsargs'][104]);
            $numhijos01 = NM_utf8_urldecode($_POST['rsargs'][105]);
            $estsop01 = NM_utf8_urldecode($_POST['rsargs'][106]);
            $notick01 = NM_utf8_urldecode($_POST['rsargs'][107]);
            $chequece = NM_utf8_urldecode($_POST['rsargs'][108]);
            $solcre = NM_utf8_urldecode($_POST['rsargs'][109]);
            $promocte01 = NM_utf8_urldecode($_POST['rsargs'][110]);
            $pagare01 = NM_utf8_urldecode($_POST['rsargs'][111]);
            $valorpagare01 = NM_utf8_urldecode($_POST['rsargs'][112]);
            $garante01 = NM_utf8_urldecode($_POST['rsargs'][113]);
            $fecvenp01 = NM_utf8_urldecode($_POST['rsargs'][114]);
            $ctacgant01 = NM_utf8_urldecode($_POST['rsargs'][115]);
            $dsn = NM_utf8_urldecode($_POST['rsargs'][116]);
            $residente = NM_utf8_urldecode($_POST['rsargs'][117]);
            $medio_contacto = NM_utf8_urldecode($_POST['rsargs'][118]);
            $separacion_bienes = NM_utf8_urldecode($_POST['rsargs'][119]);
            $disolucion_conyugal = NM_utf8_urldecode($_POST['rsargs'][120]);
            $capitulaciones = NM_utf8_urldecode($_POST['rsargs'][121]);
            $numero_carga_familiar = NM_utf8_urldecode($_POST['rsargs'][122]);
            $nivel_educacion = NM_utf8_urldecode($_POST['rsargs'][123]);
            $profesion = NM_utf8_urldecode($_POST['rsargs'][124]);
            $envio_correspondencia = NM_utf8_urldecode($_POST['rsargs'][125]);
            $nombre_arrendador = NM_utf8_urldecode($_POST['rsargs'][126]);
            $apellido_arrendador = NM_utf8_urldecode($_POST['rsargs'][127]);
            $id_vivienda = NM_utf8_urldecode($_POST['rsargs'][128]);
            $telefono_arrendador = NM_utf8_urldecode($_POST['rsargs'][129]);
            $nombres_referencia = NM_utf8_urldecode($_POST['rsargs'][130]);
            $apellidos_referencia = NM_utf8_urldecode($_POST['rsargs'][131]);
            $parentesco = NM_utf8_urldecode($_POST['rsargs'][132]);
            $celular_ref = NM_utf8_urldecode($_POST['rsargs'][133]);
            $telefono_convencional_ref = NM_utf8_urldecode($_POST['rsargs'][134]);
            $id_ocupacion = NM_utf8_urldecode($_POST['rsargs'][135]);
            $fecha_ingreso_empresa = NM_utf8_urldecode($_POST['rsargs'][136]);
            $nombre_empresa = NM_utf8_urldecode($_POST['rsargs'][137]);
            $ciudad_empresa = NM_utf8_urldecode($_POST['rsargs'][138]);
            $provincia_empresa = NM_utf8_urldecode($_POST['rsargs'][139]);
            $direccion_empresa = NM_utf8_urldecode($_POST['rsargs'][140]);
            $cargo_empresa = NM_utf8_urldecode($_POST['rsargs'][141]);
            $telefono_empresa = NM_utf8_urldecode($_POST['rsargs'][142]);
            $ext_empresa = NM_utf8_urldecode($_POST['rsargs'][143]);
            $id_tipo_contrato_actividad = NM_utf8_urldecode($_POST['rsargs'][144]);
            $empresa_jubilo_actividad = NM_utf8_urldecode($_POST['rsargs'][145]);
            $fecha_salida_empresa_actividad = NM_utf8_urldecode($_POST['rsargs'][146]);
            $cargo_salida_empresa_actividad = NM_utf8_urldecode($_POST['rsargs'][147]);
            $fecha_inicio_actividad = NM_utf8_urldecode($_POST['rsargs'][148]);
            $fecha_ingreso_empresa_actividad = NM_utf8_urldecode($_POST['rsargs'][149]);
            $nombre_empresa_actividad = NM_utf8_urldecode($_POST['rsargs'][150]);
            $institucion_actividad = NM_utf8_urldecode($_POST['rsargs'][151]);
            $ciudad_actividad = NM_utf8_urldecode($_POST['rsargs'][152]);
            $provincia_actividad = NM_utf8_urldecode($_POST['rsargs'][153]);
            $direccion_actividad = NM_utf8_urldecode($_POST['rsargs'][154]);
            $calle_principal_actividad = NM_utf8_urldecode($_POST['rsargs'][155]);
            $no_actividad = NM_utf8_urldecode($_POST['rsargs'][156]);
            $calle_secundaria_actividad = NM_utf8_urldecode($_POST['rsargs'][157]);
            $sector_actividad = NM_utf8_urldecode($_POST['rsargs'][158]);
            $pais_actividad = NM_utf8_urldecode($_POST['rsargs'][159]);
            $actividad = NM_utf8_urldecode($_POST['rsargs'][160]);
            $telefono_actividad = NM_utf8_urldecode($_POST['rsargs'][161]);
            $cargo_actividad = NM_utf8_urldecode($_POST['rsargs'][162]);
            $ext_actividad = NM_utf8_urldecode($_POST['rsargs'][163]);
            $fecha_ingreso_empresa_actividad2 = NM_utf8_urldecode($_POST['rsargs'][164]);
            $nombre_empresa_actividad2 = NM_utf8_urldecode($_POST['rsargs'][165]);
            $institucion_actividad2 = NM_utf8_urldecode($_POST['rsargs'][166]);
            $ciudad_actividad2 = NM_utf8_urldecode($_POST['rsargs'][167]);
            $provincia_actividad2 = NM_utf8_urldecode($_POST['rsargs'][168]);
            $direccion_actividad2 = NM_utf8_urldecode($_POST['rsargs'][169]);
            $calle_principal_actividad2 = NM_utf8_urldecode($_POST['rsargs'][170]);
            $no_actividad2 = NM_utf8_urldecode($_POST['rsargs'][171]);
            $calle_secundaria_actividad2 = NM_utf8_urldecode($_POST['rsargs'][172]);
            $sector_actividad2 = NM_utf8_urldecode($_POST['rsargs'][173]);
            $fecha_salida_empresa_actividad2 = NM_utf8_urldecode($_POST['rsargs'][174]);
            $fecha_inicio_actividad2 = NM_utf8_urldecode($_POST['rsargs'][175]);
            $actividad2 = NM_utf8_urldecode($_POST['rsargs'][176]);
            $telefono_actividad2 = NM_utf8_urldecode($_POST['rsargs'][177]);
            $ext_actividad2 = NM_utf8_urldecode($_POST['rsargs'][178]);
            $cargo_actividad2 = NM_utf8_urldecode($_POST['rsargs'][179]);
            $id_tipo_contrato_actividad2 = NM_utf8_urldecode($_POST['rsargs'][180]);
            $empresa_jubilo_actividad2 = NM_utf8_urldecode($_POST['rsargs'][181]);
            $sueldo = NM_utf8_urldecode($_POST['rsargs'][182]);
            $arriendos = NM_utf8_urldecode($_POST['rsargs'][183]);
            $dividendo_utilidades_ultimo_ano = NM_utf8_urldecode($_POST['rsargs'][184]);
            $id_otros_ingresos = NM_utf8_urldecode($_POST['rsargs'][185]);
            $arriendo_hipoteca = NM_utf8_urldecode($_POST['rsargs'][186]);
            $prestamos = NM_utf8_urldecode($_POST['rsargs'][187]);
            $tarjetas_creditos = NM_utf8_urldecode($_POST['rsargs'][188]);
            $gastos_familiares = NM_utf8_urldecode($_POST['rsargs'][189]);
            $id_otros_gastos = NM_utf8_urldecode($_POST['rsargs'][190]);
            $depositos_bancos = NM_utf8_urldecode($_POST['rsargs'][191]);
            $cuentas_documentos = NM_utf8_urldecode($_POST['rsargs'][192]);
            $mercaderias = NM_utf8_urldecode($_POST['rsargs'][193]);
            $maquinarias_vehiculos = NM_utf8_urldecode($_POST['rsargs'][194]);
            $terrenos_edificios = NM_utf8_urldecode($_POST['rsargs'][195]);
            $acciones_bonos_cedulas = NM_utf8_urldecode($_POST['rsargs'][196]);
            $id_otros_activos = NM_utf8_urldecode($_POST['rsargs'][197]);
            $cuentas_por_pagar = NM_utf8_urldecode($_POST['rsargs'][198]);
            $prestamos_banco_menos_ano = NM_utf8_urldecode($_POST['rsargs'][199]);
            $prestamos_banco_mas_ano = NM_utf8_urldecode($_POST['rsargs'][200]);
            $deudas_tarjetas_creditos = NM_utf8_urldecode($_POST['rsargs'][201]);
            $id_otras_obligaciones = NM_utf8_urldecode($_POST['rsargs'][202]);
            $deudor = NM_utf8_urldecode($_POST['rsargs'][203]);
            $monto = NM_utf8_urldecode($_POST['rsargs'][204]);
            $descripcion = NM_utf8_urldecode($_POST['rsargs'][205]);
            $placa = NM_utf8_urldecode($_POST['rsargs'][206]);
            $valor_maquinaria_vehiculo = NM_utf8_urldecode($_POST['rsargs'][207]);
            $a_nombre_de = NM_utf8_urldecode($_POST['rsargs'][208]);
            $ubicacion = NM_utf8_urldecode($_POST['rsargs'][209]);
            $valor_propiedad = NM_utf8_urldecode($_POST['rsargs'][210]);
            $empresa = NM_utf8_urldecode($_POST['rsargs'][211]);
            $valor_mercado = NM_utf8_urldecode($_POST['rsargs'][212]);
            $institucion_bancaria = NM_utf8_urldecode($_POST['rsargs'][213]);
            $monto_banco = NM_utf8_urldecode($_POST['rsargs'][214]);
            $institucion_finaciera = NM_utf8_urldecode($_POST['rsargs'][215]);
            $monto_institucion_finaciera = NM_utf8_urldecode($_POST['rsargs'][216]);
            $id_cliente_juridico = NM_utf8_urldecode($_POST['rsargs'][217]);
            $nombre_completo_empresa = NM_utf8_urldecode($_POST['rsargs'][218]);
            $es_empresa_extranjera = NM_utf8_urldecode($_POST['rsargs'][219]);
            $pais_empresa = NM_utf8_urldecode($_POST['rsargs'][220]);
            $fecha_constitucion_empresa = NM_utf8_urldecode($_POST['rsargs'][221]);
            $id_oficina = NM_utf8_urldecode($_POST['rsargs'][222]);
            $id_tipo_actividad = NM_utf8_urldecode($_POST['rsargs'][223]);
            $especifique_otros = NM_utf8_urldecode($_POST['rsargs'][224]);
            $direccion_correspondencia = NM_utf8_urldecode($_POST['rsargs'][225]);
            $calle_principal_correspondencia = NM_utf8_urldecode($_POST['rsargs'][226]);
            $no_correspondencia = NM_utf8_urldecode($_POST['rsargs'][227]);
            $calle_secundaria_correspondencia = NM_utf8_urldecode($_POST['rsargs'][228]);
            $id_ciudad_correspondencia = NM_utf8_urldecode($_POST['rsargs'][229]);
            $nombre_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][230]);
            $cargo_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][231]);
            $celular_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][232]);
            $telefono_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][233]);
            $mail_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][234]);
            $saldo_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][235]);
            $nombre_referencia_comerciales = NM_utf8_urldecode($_POST['rsargs'][236]);
            $fecha_compra = NM_utf8_urldecode($_POST['rsargs'][237]);
            $telefono_referencia_comerciales = NM_utf8_urldecode($_POST['rsargs'][238]);
            $ventas = NM_utf8_urldecode($_POST['rsargs'][239]);
            $comisiones = NM_utf8_urldecode($_POST['rsargs'][240]);
            $gastos_operativos = NM_utf8_urldecode($_POST['rsargs'][241]);
            $gastos_administrativos = NM_utf8_urldecode($_POST['rsargs'][242]);
            $pago_cuotas_prestamo = NM_utf8_urldecode($_POST['rsargs'][243]);
            $funcionario = NM_utf8_urldecode($_POST['rsargs'][244]);
            $funcionario_detalle = NM_utf8_urldecode($_POST['rsargs'][245]);
            $miembro_politico = NM_utf8_urldecode($_POST['rsargs'][246]);
            $miembro_politico_detalle = NM_utf8_urldecode($_POST['rsargs'][247]);
            $ejecutivo_gobierno = NM_utf8_urldecode($_POST['rsargs'][248]);
            $ejecutivo_gobierno_detalle = NM_utf8_urldecode($_POST['rsargs'][249]);
            $familiar_gobierno = NM_utf8_urldecode($_POST['rsargs'][250]);
            $familiar_gobierno_detalle = NM_utf8_urldecode($_POST['rsargs'][251]);
            $familiar_gobierno_detalle_quien = NM_utf8_urldecode($_POST['rsargs'][252]);
            $otros_ingresos = NM_utf8_urldecode($_POST['rsargs'][253]);
            $otros_gastos = NM_utf8_urldecode($_POST['rsargs'][254]);
            $otros_activos = NM_utf8_urldecode($_POST['rsargs'][255]);
            $otras_obligaciones = NM_utf8_urldecode($_POST['rsargs'][256]);
            $sector_direccion_empresa = NM_utf8_urldecode($_POST['rsargs'][257]);
            $sector_direccion_empresa_correo = NM_utf8_urldecode($_POST['rsargs'][258]);
            $extranjero_nombres_referencia = NM_utf8_urldecode($_POST['rsargs'][259]);
            $extranjero_apellidos_referencia = NM_utf8_urldecode($_POST['rsargs'][260]);
            $extranjero_parentesco = NM_utf8_urldecode($_POST['rsargs'][261]);
            $extranjero_celular_ref = NM_utf8_urldecode($_POST['rsargs'][262]);
            $extranjero_telefono_convencional_ref = NM_utf8_urldecode($_POST['rsargs'][263]);
            $cargo_representante_legal = NM_utf8_urldecode($_POST['rsargs'][264]);
            $direccion_extranjero = NM_utf8_urldecode($_POST['rsargs'][265]);
            $relacion_dependencia_principal = NM_utf8_urldecode($_POST['rsargs'][266]);
            $correo_corporativo_principal = NM_utf8_urldecode($_POST['rsargs'][267]);
            $relacion_dependencia_secundaria = NM_utf8_urldecode($_POST['rsargs'][268]);
            $correo_corporativo_secundario = NM_utf8_urldecode($_POST['rsargs'][269]);
            $actividad_secundaria = NM_utf8_urldecode($_POST['rsargs'][270]);
            $id_pais_empresa = NM_utf8_urldecode($_POST['rsargs'][271]);
            $id_provincia_empresa = NM_utf8_urldecode($_POST['rsargs'][272]);
            $id_pais_correo = NM_utf8_urldecode($_POST['rsargs'][273]);
            $id_provincia_correo = NM_utf8_urldecode($_POST['rsargs'][274]);
            $apellido_empresa_solicitante = NM_utf8_urldecode($_POST['rsargs'][275]);
            $pais_actividad2 = NM_utf8_urldecode($_POST['rsargs'][276]);
            $id_provincia_exterior = NM_utf8_urldecode($_POST['rsargs'][277]);
            $pais_independiente = NM_utf8_urldecode($_POST['rsargs'][278]);
            $tipo_contrato_otros_actividad_principal = NM_utf8_urldecode($_POST['rsargs'][279]);
            $actividadeconomica = NM_utf8_urldecode($_POST['rsargs'][280]);
            $clasesujeto = NM_utf8_urldecode($_POST['rsargs'][281]);
            $provincia = NM_utf8_urldecode($_POST['rsargs'][282]);
            $parroquia = NM_utf8_urldecode($_POST['rsargs'][283]);
            $canton = NM_utf8_urldecode($_POST['rsargs'][284]);
            $demandajudicial = NM_utf8_urldecode($_POST['rsargs'][285]);
            $vdemandajudicial = NM_utf8_urldecode($_POST['rsargs'][286]);
            $carteracastigada = NM_utf8_urldecode($_POST['rsargs'][287]);
            $vcarteracastigada = NM_utf8_urldecode($_POST['rsargs'][288]);
            $accesoexterno01 = NM_utf8_urldecode($_POST['rsargs'][289]);
            $referencia = NM_utf8_urldecode($_POST['rsargs'][290]);
            $id_pais_empleado_dir_desempeno = NM_utf8_urldecode($_POST['rsargs'][291]);
            $id_provincia_empleado_dir_desempeno = NM_utf8_urldecode($_POST['rsargs'][292]);
            $id_ciudad_empleado_dir_desempeno = NM_utf8_urldecode($_POST['rsargs'][293]);
            $razon_social = NM_utf8_urldecode($_POST['rsargs'][294]);
            $parterel01 = NM_utf8_urldecode($_POST['rsargs'][295]);
            $origen_fondos = NM_utf8_urldecode($_POST['rsargs'][296]);
            $tipo_identificacion = NM_utf8_urldecode($_POST['rsargs'][297]);
            $id_actividad = NM_utf8_urldecode($_POST['rsargs'][298]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][299]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][300]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][301]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][302]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][303]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][304]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][305]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][306]);
        }
        if ('ajax_form_maecte_navigate_form' == $_POST['rs'])
        {
            $codcte01 = NM_utf8_urldecode($_POST['rsargs'][0]);
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
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_parms']);
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
               nm_limpa_str_form_maecte($cadapar[1]);
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
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_maecte']['parms']);
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
    if (isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_maecte']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['form_maecte']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_maecte";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_maecte' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_maecte')
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_modal'] = true;
            $nm_url_saida = "form_maecte_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan'] = true;
    }
    if (!isset($nm_apl_dependente)) {
        $nm_apl_dependente = 0;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/form_maecte/'))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['form_maecte']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/form_maecte_erro.php");
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
            $_SESSION['sc_session'][$script_case_init]['form_maecte']['opcao'] = $nmgp_opcao ; 
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_redirect_tp'] = "";
            $nm_url_saida = "form_maecte_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "form_maecte_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_maecte']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_maecte']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['form_maecte']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_maecte']['retorno_edit'] . "?script_case_init=" . $script_case_init;  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['form_maecte']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "form_maecte_fim.php"; 
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
        if (empty($_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['form_maecte']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_maecte']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_maecte']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init; 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_maecte']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['form_maecte']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_modal'] = true;
             $nm_url_saida = "form_maecte_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_maecte']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_form_maecte = new form_maecte_edit();
    $inicial_form_maecte->inicializa();

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/form_maecte_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/form_maecte_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_form_maecte_validate_codcte01");
    sajax_export("ajax_form_maecte_validate_tipo_cliente");
    sajax_export("ajax_form_maecte_validate_id_nacionalidad");
    sajax_export("ajax_form_maecte_validate_nomcte01");
    sajax_export("ajax_form_maecte_validate_primer_nombre");
    sajax_export("ajax_form_maecte_validate_segundo_nombre");
    sajax_export("ajax_form_maecte_validate_primer_apellido");
    sajax_export("ajax_form_maecte_validate_segundo_apellido");
    sajax_export("ajax_form_maecte_validate_cv1cte01");
    sajax_export("ajax_form_maecte_validate_cv2cte01");
    sajax_export("ajax_form_maecte_validate_tipcte01");
    sajax_export("ajax_form_maecte_validate_ofienccte01");
    sajax_export("ajax_form_maecte_validate_vendcte01");
    sajax_export("ajax_form_maecte_validate_cobrcte01");
    sajax_export("ajax_form_maecte_validate_loccte01");
    sajax_export("ajax_form_maecte_validate_dircte01");
    sajax_export("ajax_form_maecte_validate_sector");
    sajax_export("ajax_form_maecte_validate_calle_principal");
    sajax_export("ajax_form_maecte_validate_no");
    sajax_export("ajax_form_maecte_validate_calle_secundaria");
    sajax_export("ajax_form_maecte_validate_id_pais");
    sajax_export("ajax_form_maecte_validate_id_provincia");
    sajax_export("ajax_form_maecte_validate_id_ciudad");
    sajax_export("ajax_form_maecte_validate_id_canton");
    sajax_export("ajax_form_maecte_validate_telcte01");
    sajax_export("ajax_form_maecte_validate_cascte01");
    sajax_export("ajax_form_maecte_validate_ci_conyuge");
    sajax_export("ajax_form_maecte_validate_conyuge_tipo_identidad");
    sajax_export("ajax_form_maecte_validate_conyuge_primer_nombre");
    sajax_export("ajax_form_maecte_validate_conyuge_segundo_nombre");
    sajax_export("ajax_form_maecte_validate_conyuge_primer_apellido");
    sajax_export("ajax_form_maecte_validate_conyuge_segundo_apellido");
    sajax_export("ajax_form_maecte_validate_conyuge_profesion");
    sajax_export("ajax_form_maecte_validate_id_tipo_documento");
    sajax_export("ajax_form_maecte_validate_repleg01");
    sajax_export("ajax_form_maecte_validate_fecing01");
    sajax_export("ajax_form_maecte_validate_condpag01");
    sajax_export("ajax_form_maecte_validate_desctocte01");
    sajax_export("ajax_form_maecte_validate_limcred01");
    sajax_export("ajax_form_maecte_validate_desppar01");
    sajax_export("ajax_form_maecte_validate_cheqpro01");
    sajax_export("ajax_form_maecte_validate_sdoeje01");
    sajax_export("ajax_form_maecte_validate_sdoant01");
    sajax_export("ajax_form_maecte_validate_sdoact01");
    sajax_export("ajax_form_maecte_validate_acudbm01");
    sajax_export("ajax_form_maecte_validate_acucrm01");
    sajax_export("ajax_form_maecte_validate_acudbe01");
    sajax_export("ajax_form_maecte_validate_acucre01");
    sajax_export("ajax_form_maecte_validate_comentcte01");
    sajax_export("ajax_form_maecte_validate_statuscte01");
    sajax_export("ajax_form_maecte_validate_identcte01");
    sajax_export("ajax_form_maecte_validate_cordcte01");
    sajax_export("ajax_form_maecte_validate_limcant01");
    sajax_export("ajax_form_maecte_validate_pagleg01");
    sajax_export("ajax_form_maecte_validate_telcte01b");
    sajax_export("ajax_form_maecte_validate_telcte01c");
    sajax_export("ajax_form_maecte_validate_emailcte01");
    sajax_export("ajax_form_maecte_validate_calle_principal_exterior");
    sajax_export("ajax_form_maecte_validate_no_exterior");
    sajax_export("ajax_form_maecte_validate_calle_secundaria_exterior");
    sajax_export("ajax_form_maecte_validate_id_pais_exterior");
    sajax_export("ajax_form_maecte_validate_id_ciudad_exterior");
    sajax_export("ajax_form_maecte_validate_codigo_postal_exterior");
    sajax_export("ajax_form_maecte_validate_sector_exterior");
    sajax_export("ajax_form_maecte_validate_telefono_exterior");
    sajax_export("ajax_form_maecte_validate_celular_exterior");
    sajax_export("ajax_form_maecte_validate_email_exterior");
    sajax_export("ajax_form_maecte_validate_emailaltcte01");
    sajax_export("ajax_form_maecte_validate_ctacgcte01");
    sajax_export("ajax_form_maecte_validate_obsercte01");
    sajax_export("ajax_form_maecte_validate_totexceso01");
    sajax_export("ajax_form_maecte_validate_imagencte01");
    sajax_export("ajax_form_maecte_validate_block");
    sajax_export("ajax_form_maecte_validate_uid");
    sajax_export("ajax_form_maecte_validate_ultimoacceso");
    sajax_export("ajax_form_maecte_validate_idcli");
    sajax_export("ajax_form_maecte_validate_catcte01");
    sajax_export("ajax_form_maecte_validate_transferido");
    sajax_export("ajax_form_maecte_validate_password");
    sajax_export("ajax_form_maecte_validate_showroom");
    sajax_export("ajax_form_maecte_validate_orden");
    sajax_export("ajax_form_maecte_validate_website");
    sajax_export("ajax_form_maecte_validate_longitud01");
    sajax_export("ajax_form_maecte_validate_latitud01");
    sajax_export("ajax_form_maecte_validate_zoom01");
    sajax_export("ajax_form_maecte_validate_acceder");
    sajax_export("ajax_form_maecte_validate_coniva01");
    sajax_export("ajax_form_maecte_validate_idemp01");
    sajax_export("ajax_form_maecte_validate_codprov01");
    sajax_export("ajax_form_maecte_validate_celular01");
    sajax_export("ajax_form_maecte_validate_dircliente01");
    sajax_export("ajax_form_maecte_validate_razcte01");
    sajax_export("ajax_form_maecte_validate_ruc01");
    sajax_export("ajax_form_maecte_validate_timenegocio01");
    sajax_export("ajax_form_maecte_validate_refbanc01");
    sajax_export("ajax_form_maecte_validate_refcom01");
    sajax_export("ajax_form_maecte_validate_tarjcred01");
    sajax_export("ajax_form_maecte_validate_firmaut01");
    sajax_export("ajax_form_maecte_validate_precte01");
    sajax_export("ajax_form_maecte_validate_cuotasven01");
    sajax_export("ajax_form_maecte_validate_diasven01");
    sajax_export("ajax_form_maecte_validate_fechanace01");
    sajax_export("ajax_form_maecte_validate_sexo01");
    sajax_export("ajax_form_maecte_validate_estadocivil01");
    sajax_export("ajax_form_maecte_validate_dirgestion01");
    sajax_export("ajax_form_maecte_validate_numhijos01");
    sajax_export("ajax_form_maecte_validate_estsop01");
    sajax_export("ajax_form_maecte_validate_notick01");
    sajax_export("ajax_form_maecte_validate_chequece");
    sajax_export("ajax_form_maecte_validate_solcre");
    sajax_export("ajax_form_maecte_validate_promocte01");
    sajax_export("ajax_form_maecte_validate_pagare01");
    sajax_export("ajax_form_maecte_validate_valorpagare01");
    sajax_export("ajax_form_maecte_validate_garante01");
    sajax_export("ajax_form_maecte_validate_fecvenp01");
    sajax_export("ajax_form_maecte_validate_ctacgant01");
    sajax_export("ajax_form_maecte_validate_dsn");
    sajax_export("ajax_form_maecte_validate_residente");
    sajax_export("ajax_form_maecte_validate_medio_contacto");
    sajax_export("ajax_form_maecte_validate_separacion_bienes");
    sajax_export("ajax_form_maecte_validate_disolucion_conyugal");
    sajax_export("ajax_form_maecte_validate_capitulaciones");
    sajax_export("ajax_form_maecte_validate_numero_carga_familiar");
    sajax_export("ajax_form_maecte_validate_nivel_educacion");
    sajax_export("ajax_form_maecte_validate_profesion");
    sajax_export("ajax_form_maecte_validate_envio_correspondencia");
    sajax_export("ajax_form_maecte_validate_nombre_arrendador");
    sajax_export("ajax_form_maecte_validate_apellido_arrendador");
    sajax_export("ajax_form_maecte_validate_id_vivienda");
    sajax_export("ajax_form_maecte_validate_telefono_arrendador");
    sajax_export("ajax_form_maecte_validate_nombres_referencia");
    sajax_export("ajax_form_maecte_validate_apellidos_referencia");
    sajax_export("ajax_form_maecte_validate_parentesco");
    sajax_export("ajax_form_maecte_validate_celular_ref");
    sajax_export("ajax_form_maecte_validate_telefono_convencional_ref");
    sajax_export("ajax_form_maecte_validate_id_ocupacion");
    sajax_export("ajax_form_maecte_validate_fecha_ingreso_empresa");
    sajax_export("ajax_form_maecte_validate_nombre_empresa");
    sajax_export("ajax_form_maecte_validate_ciudad_empresa");
    sajax_export("ajax_form_maecte_validate_provincia_empresa");
    sajax_export("ajax_form_maecte_validate_direccion_empresa");
    sajax_export("ajax_form_maecte_validate_cargo_empresa");
    sajax_export("ajax_form_maecte_validate_telefono_empresa");
    sajax_export("ajax_form_maecte_validate_ext_empresa");
    sajax_export("ajax_form_maecte_validate_id_tipo_contrato_actividad");
    sajax_export("ajax_form_maecte_validate_empresa_jubilo_actividad");
    sajax_export("ajax_form_maecte_validate_fecha_salida_empresa_actividad");
    sajax_export("ajax_form_maecte_validate_cargo_salida_empresa_actividad");
    sajax_export("ajax_form_maecte_validate_fecha_inicio_actividad");
    sajax_export("ajax_form_maecte_validate_fecha_ingreso_empresa_actividad");
    sajax_export("ajax_form_maecte_validate_nombre_empresa_actividad");
    sajax_export("ajax_form_maecte_validate_institucion_actividad");
    sajax_export("ajax_form_maecte_validate_ciudad_actividad");
    sajax_export("ajax_form_maecte_validate_provincia_actividad");
    sajax_export("ajax_form_maecte_validate_direccion_actividad");
    sajax_export("ajax_form_maecte_validate_calle_principal_actividad");
    sajax_export("ajax_form_maecte_validate_no_actividad");
    sajax_export("ajax_form_maecte_validate_calle_secundaria_actividad");
    sajax_export("ajax_form_maecte_validate_sector_actividad");
    sajax_export("ajax_form_maecte_validate_pais_actividad");
    sajax_export("ajax_form_maecte_validate_actividad");
    sajax_export("ajax_form_maecte_validate_telefono_actividad");
    sajax_export("ajax_form_maecte_validate_cargo_actividad");
    sajax_export("ajax_form_maecte_validate_ext_actividad");
    sajax_export("ajax_form_maecte_validate_fecha_ingreso_empresa_actividad2");
    sajax_export("ajax_form_maecte_validate_nombre_empresa_actividad2");
    sajax_export("ajax_form_maecte_validate_institucion_actividad2");
    sajax_export("ajax_form_maecte_validate_ciudad_actividad2");
    sajax_export("ajax_form_maecte_validate_provincia_actividad2");
    sajax_export("ajax_form_maecte_validate_direccion_actividad2");
    sajax_export("ajax_form_maecte_validate_calle_principal_actividad2");
    sajax_export("ajax_form_maecte_validate_no_actividad2");
    sajax_export("ajax_form_maecte_validate_calle_secundaria_actividad2");
    sajax_export("ajax_form_maecte_validate_sector_actividad2");
    sajax_export("ajax_form_maecte_validate_fecha_salida_empresa_actividad2");
    sajax_export("ajax_form_maecte_validate_fecha_inicio_actividad2");
    sajax_export("ajax_form_maecte_validate_actividad2");
    sajax_export("ajax_form_maecte_validate_telefono_actividad2");
    sajax_export("ajax_form_maecte_validate_ext_actividad2");
    sajax_export("ajax_form_maecte_validate_cargo_actividad2");
    sajax_export("ajax_form_maecte_validate_id_tipo_contrato_actividad2");
    sajax_export("ajax_form_maecte_validate_empresa_jubilo_actividad2");
    sajax_export("ajax_form_maecte_validate_sueldo");
    sajax_export("ajax_form_maecte_validate_arriendos");
    sajax_export("ajax_form_maecte_validate_dividendo_utilidades_ultimo_ano");
    sajax_export("ajax_form_maecte_validate_id_otros_ingresos");
    sajax_export("ajax_form_maecte_validate_arriendo_hipoteca");
    sajax_export("ajax_form_maecte_validate_prestamos");
    sajax_export("ajax_form_maecte_validate_tarjetas_creditos");
    sajax_export("ajax_form_maecte_validate_gastos_familiares");
    sajax_export("ajax_form_maecte_validate_id_otros_gastos");
    sajax_export("ajax_form_maecte_validate_depositos_bancos");
    sajax_export("ajax_form_maecte_validate_cuentas_documentos");
    sajax_export("ajax_form_maecte_validate_mercaderias");
    sajax_export("ajax_form_maecte_validate_maquinarias_vehiculos");
    sajax_export("ajax_form_maecte_validate_terrenos_edificios");
    sajax_export("ajax_form_maecte_validate_acciones_bonos_cedulas");
    sajax_export("ajax_form_maecte_validate_id_otros_activos");
    sajax_export("ajax_form_maecte_validate_cuentas_por_pagar");
    sajax_export("ajax_form_maecte_validate_prestamos_banco_menos_ano");
    sajax_export("ajax_form_maecte_validate_prestamos_banco_mas_ano");
    sajax_export("ajax_form_maecte_validate_deudas_tarjetas_creditos");
    sajax_export("ajax_form_maecte_validate_id_otras_obligaciones");
    sajax_export("ajax_form_maecte_validate_deudor");
    sajax_export("ajax_form_maecte_validate_monto");
    sajax_export("ajax_form_maecte_validate_descripcion");
    sajax_export("ajax_form_maecte_validate_placa");
    sajax_export("ajax_form_maecte_validate_valor_maquinaria_vehiculo");
    sajax_export("ajax_form_maecte_validate_a_nombre_de");
    sajax_export("ajax_form_maecte_validate_ubicacion");
    sajax_export("ajax_form_maecte_validate_valor_propiedad");
    sajax_export("ajax_form_maecte_validate_empresa");
    sajax_export("ajax_form_maecte_validate_valor_mercado");
    sajax_export("ajax_form_maecte_validate_institucion_bancaria");
    sajax_export("ajax_form_maecte_validate_monto_banco");
    sajax_export("ajax_form_maecte_validate_institucion_finaciera");
    sajax_export("ajax_form_maecte_validate_monto_institucion_finaciera");
    sajax_export("ajax_form_maecte_validate_id_cliente_juridico");
    sajax_export("ajax_form_maecte_validate_nombre_completo_empresa");
    sajax_export("ajax_form_maecte_validate_es_empresa_extranjera");
    sajax_export("ajax_form_maecte_validate_pais_empresa");
    sajax_export("ajax_form_maecte_validate_fecha_constitucion_empresa");
    sajax_export("ajax_form_maecte_validate_id_oficina");
    sajax_export("ajax_form_maecte_validate_id_tipo_actividad");
    sajax_export("ajax_form_maecte_validate_especifique_otros");
    sajax_export("ajax_form_maecte_validate_direccion_correspondencia");
    sajax_export("ajax_form_maecte_validate_calle_principal_correspondencia");
    sajax_export("ajax_form_maecte_validate_no_correspondencia");
    sajax_export("ajax_form_maecte_validate_calle_secundaria_correspondencia");
    sajax_export("ajax_form_maecte_validate_id_ciudad_correspondencia");
    sajax_export("ajax_form_maecte_validate_nombre_empresa_solicitante");
    sajax_export("ajax_form_maecte_validate_cargo_empresa_solicitante");
    sajax_export("ajax_form_maecte_validate_celular_empresa_solicitante");
    sajax_export("ajax_form_maecte_validate_telefono_empresa_solicitante");
    sajax_export("ajax_form_maecte_validate_mail_empresa_solicitante");
    sajax_export("ajax_form_maecte_validate_saldo_empresa_solicitante");
    sajax_export("ajax_form_maecte_validate_nombre_referencia_comerciales");
    sajax_export("ajax_form_maecte_validate_fecha_compra");
    sajax_export("ajax_form_maecte_validate_telefono_referencia_comerciales");
    sajax_export("ajax_form_maecte_validate_ventas");
    sajax_export("ajax_form_maecte_validate_comisiones");
    sajax_export("ajax_form_maecte_validate_gastos_operativos");
    sajax_export("ajax_form_maecte_validate_gastos_administrativos");
    sajax_export("ajax_form_maecte_validate_pago_cuotas_prestamo");
    sajax_export("ajax_form_maecte_validate_funcionario");
    sajax_export("ajax_form_maecte_validate_funcionario_detalle");
    sajax_export("ajax_form_maecte_validate_miembro_politico");
    sajax_export("ajax_form_maecte_validate_miembro_politico_detalle");
    sajax_export("ajax_form_maecte_validate_ejecutivo_gobierno");
    sajax_export("ajax_form_maecte_validate_ejecutivo_gobierno_detalle");
    sajax_export("ajax_form_maecte_validate_familiar_gobierno");
    sajax_export("ajax_form_maecte_validate_familiar_gobierno_detalle");
    sajax_export("ajax_form_maecte_validate_familiar_gobierno_detalle_quien");
    sajax_export("ajax_form_maecte_validate_otros_ingresos");
    sajax_export("ajax_form_maecte_validate_otros_gastos");
    sajax_export("ajax_form_maecte_validate_otros_activos");
    sajax_export("ajax_form_maecte_validate_otras_obligaciones");
    sajax_export("ajax_form_maecte_validate_sector_direccion_empresa");
    sajax_export("ajax_form_maecte_validate_sector_direccion_empresa_correo");
    sajax_export("ajax_form_maecte_validate_extranjero_nombres_referencia");
    sajax_export("ajax_form_maecte_validate_extranjero_apellidos_referencia");
    sajax_export("ajax_form_maecte_validate_extranjero_parentesco");
    sajax_export("ajax_form_maecte_validate_extranjero_celular_ref");
    sajax_export("ajax_form_maecte_validate_extranjero_telefono_convencional_ref");
    sajax_export("ajax_form_maecte_validate_cargo_representante_legal");
    sajax_export("ajax_form_maecte_validate_direccion_extranjero");
    sajax_export("ajax_form_maecte_validate_relacion_dependencia_principal");
    sajax_export("ajax_form_maecte_validate_correo_corporativo_principal");
    sajax_export("ajax_form_maecte_validate_relacion_dependencia_secundaria");
    sajax_export("ajax_form_maecte_validate_correo_corporativo_secundario");
    sajax_export("ajax_form_maecte_validate_actividad_secundaria");
    sajax_export("ajax_form_maecte_validate_id_pais_empresa");
    sajax_export("ajax_form_maecte_validate_id_provincia_empresa");
    sajax_export("ajax_form_maecte_validate_id_pais_correo");
    sajax_export("ajax_form_maecte_validate_id_provincia_correo");
    sajax_export("ajax_form_maecte_validate_apellido_empresa_solicitante");
    sajax_export("ajax_form_maecte_validate_pais_actividad2");
    sajax_export("ajax_form_maecte_validate_id_provincia_exterior");
    sajax_export("ajax_form_maecte_validate_pais_independiente");
    sajax_export("ajax_form_maecte_validate_tipo_contrato_otros_actividad_principal");
    sajax_export("ajax_form_maecte_validate_actividadeconomica");
    sajax_export("ajax_form_maecte_validate_clasesujeto");
    sajax_export("ajax_form_maecte_validate_provincia");
    sajax_export("ajax_form_maecte_validate_parroquia");
    sajax_export("ajax_form_maecte_validate_canton");
    sajax_export("ajax_form_maecte_validate_demandajudicial");
    sajax_export("ajax_form_maecte_validate_vdemandajudicial");
    sajax_export("ajax_form_maecte_validate_carteracastigada");
    sajax_export("ajax_form_maecte_validate_vcarteracastigada");
    sajax_export("ajax_form_maecte_validate_accesoexterno01");
    sajax_export("ajax_form_maecte_validate_referencia");
    sajax_export("ajax_form_maecte_validate_id_pais_empleado_dir_desempeno");
    sajax_export("ajax_form_maecte_validate_id_provincia_empleado_dir_desempeno");
    sajax_export("ajax_form_maecte_validate_id_ciudad_empleado_dir_desempeno");
    sajax_export("ajax_form_maecte_validate_razon_social");
    sajax_export("ajax_form_maecte_validate_parterel01");
    sajax_export("ajax_form_maecte_validate_origen_fondos");
    sajax_export("ajax_form_maecte_validate_tipo_identificacion");
    sajax_export("ajax_form_maecte_validate_id_actividad");
    sajax_export("ajax_form_maecte_submit_form");
    sajax_export("ajax_form_maecte_navigate_form");
    sajax_handle_client_request();

    if (isset($_POST['wizard_action']) && 'change_step' == $_POST['wizard_action']) {
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'] = true;
        ob_start();
    }

    $inicial_form_maecte->contr_form_maecte->controle();
//
    function nm_limpa_str_form_maecte(&$str)
    {
    }

    function ajax_form_maecte_validate_codcte01($codcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_codcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'codcte01' => NM_utf8_urldecode($codcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_codcte01

    function ajax_form_maecte_validate_tipo_cliente($tipo_cliente, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_tipo_cliente';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'tipo_cliente' => NM_utf8_urldecode($tipo_cliente),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_tipo_cliente

    function ajax_form_maecte_validate_id_nacionalidad($id_nacionalidad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_nacionalidad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_nacionalidad' => NM_utf8_urldecode($id_nacionalidad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_nacionalidad

    function ajax_form_maecte_validate_nomcte01($nomcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_nomcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'nomcte01' => NM_utf8_urldecode($nomcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_nomcte01

    function ajax_form_maecte_validate_primer_nombre($primer_nombre, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_primer_nombre';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'primer_nombre' => NM_utf8_urldecode($primer_nombre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_primer_nombre

    function ajax_form_maecte_validate_segundo_nombre($segundo_nombre, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_segundo_nombre';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'segundo_nombre' => NM_utf8_urldecode($segundo_nombre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_segundo_nombre

    function ajax_form_maecte_validate_primer_apellido($primer_apellido, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_primer_apellido';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'primer_apellido' => NM_utf8_urldecode($primer_apellido),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_primer_apellido

    function ajax_form_maecte_validate_segundo_apellido($segundo_apellido, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_segundo_apellido';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'segundo_apellido' => NM_utf8_urldecode($segundo_apellido),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_segundo_apellido

    function ajax_form_maecte_validate_cv1cte01($cv1cte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cv1cte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cv1cte01' => NM_utf8_urldecode($cv1cte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cv1cte01

    function ajax_form_maecte_validate_cv2cte01($cv2cte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cv2cte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cv2cte01' => NM_utf8_urldecode($cv2cte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cv2cte01

    function ajax_form_maecte_validate_tipcte01($tipcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_tipcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'tipcte01' => NM_utf8_urldecode($tipcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_tipcte01

    function ajax_form_maecte_validate_ofienccte01($ofienccte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ofienccte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ofienccte01' => NM_utf8_urldecode($ofienccte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ofienccte01

    function ajax_form_maecte_validate_vendcte01($vendcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_vendcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'vendcte01' => NM_utf8_urldecode($vendcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_vendcte01

    function ajax_form_maecte_validate_cobrcte01($cobrcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cobrcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cobrcte01' => NM_utf8_urldecode($cobrcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cobrcte01

    function ajax_form_maecte_validate_loccte01($loccte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_loccte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'loccte01' => NM_utf8_urldecode($loccte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_loccte01

    function ajax_form_maecte_validate_dircte01($dircte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_dircte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'dircte01' => NM_utf8_urldecode($dircte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_dircte01

    function ajax_form_maecte_validate_sector($sector, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sector';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sector' => NM_utf8_urldecode($sector),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sector

    function ajax_form_maecte_validate_calle_principal($calle_principal, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_calle_principal';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'calle_principal' => NM_utf8_urldecode($calle_principal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_calle_principal

    function ajax_form_maecte_validate_no($no, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_no';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'no' => NM_utf8_urldecode($no),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_no

    function ajax_form_maecte_validate_calle_secundaria($calle_secundaria, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_calle_secundaria';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'calle_secundaria' => NM_utf8_urldecode($calle_secundaria),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_calle_secundaria

    function ajax_form_maecte_validate_id_pais($id_pais, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_pais';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_pais' => NM_utf8_urldecode($id_pais),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_pais

    function ajax_form_maecte_validate_id_provincia($id_provincia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_provincia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_provincia' => NM_utf8_urldecode($id_provincia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_provincia

    function ajax_form_maecte_validate_id_ciudad($id_ciudad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_ciudad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_ciudad' => NM_utf8_urldecode($id_ciudad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_ciudad

    function ajax_form_maecte_validate_id_canton($id_canton, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_canton';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_canton' => NM_utf8_urldecode($id_canton),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_canton

    function ajax_form_maecte_validate_telcte01($telcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telcte01' => NM_utf8_urldecode($telcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telcte01

    function ajax_form_maecte_validate_cascte01($cascte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cascte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cascte01' => NM_utf8_urldecode($cascte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cascte01

    function ajax_form_maecte_validate_ci_conyuge($ci_conyuge, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ci_conyuge';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ci_conyuge' => NM_utf8_urldecode($ci_conyuge),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ci_conyuge

    function ajax_form_maecte_validate_conyuge_tipo_identidad($conyuge_tipo_identidad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_conyuge_tipo_identidad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'conyuge_tipo_identidad' => NM_utf8_urldecode($conyuge_tipo_identidad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_conyuge_tipo_identidad

    function ajax_form_maecte_validate_conyuge_primer_nombre($conyuge_primer_nombre, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_conyuge_primer_nombre';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'conyuge_primer_nombre' => NM_utf8_urldecode($conyuge_primer_nombre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_conyuge_primer_nombre

    function ajax_form_maecte_validate_conyuge_segundo_nombre($conyuge_segundo_nombre, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_conyuge_segundo_nombre';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'conyuge_segundo_nombre' => NM_utf8_urldecode($conyuge_segundo_nombre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_conyuge_segundo_nombre

    function ajax_form_maecte_validate_conyuge_primer_apellido($conyuge_primer_apellido, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_conyuge_primer_apellido';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'conyuge_primer_apellido' => NM_utf8_urldecode($conyuge_primer_apellido),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_conyuge_primer_apellido

    function ajax_form_maecte_validate_conyuge_segundo_apellido($conyuge_segundo_apellido, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_conyuge_segundo_apellido';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'conyuge_segundo_apellido' => NM_utf8_urldecode($conyuge_segundo_apellido),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_conyuge_segundo_apellido

    function ajax_form_maecte_validate_conyuge_profesion($conyuge_profesion, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_conyuge_profesion';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'conyuge_profesion' => NM_utf8_urldecode($conyuge_profesion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_conyuge_profesion

    function ajax_form_maecte_validate_id_tipo_documento($id_tipo_documento, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_tipo_documento';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_tipo_documento' => NM_utf8_urldecode($id_tipo_documento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_tipo_documento

    function ajax_form_maecte_validate_repleg01($repleg01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_repleg01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'repleg01' => NM_utf8_urldecode($repleg01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_repleg01

    function ajax_form_maecte_validate_fecing01($fecing01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecing01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecing01' => NM_utf8_urldecode($fecing01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecing01

    function ajax_form_maecte_validate_condpag01($condpag01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_condpag01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'condpag01' => NM_utf8_urldecode($condpag01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_condpag01

    function ajax_form_maecte_validate_desctocte01($desctocte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_desctocte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'desctocte01' => NM_utf8_urldecode($desctocte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_desctocte01

    function ajax_form_maecte_validate_limcred01($limcred01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_limcred01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'limcred01' => NM_utf8_urldecode($limcred01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_limcred01

    function ajax_form_maecte_validate_desppar01($desppar01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_desppar01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'desppar01' => NM_utf8_urldecode($desppar01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_desppar01

    function ajax_form_maecte_validate_cheqpro01($cheqpro01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cheqpro01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cheqpro01' => NM_utf8_urldecode($cheqpro01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cheqpro01

    function ajax_form_maecte_validate_sdoeje01($sdoeje01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sdoeje01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sdoeje01' => NM_utf8_urldecode($sdoeje01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sdoeje01

    function ajax_form_maecte_validate_sdoant01($sdoant01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sdoant01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sdoant01' => NM_utf8_urldecode($sdoant01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sdoant01

    function ajax_form_maecte_validate_sdoact01($sdoact01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sdoact01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sdoact01' => NM_utf8_urldecode($sdoact01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sdoact01

    function ajax_form_maecte_validate_acudbm01($acudbm01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_acudbm01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'acudbm01' => NM_utf8_urldecode($acudbm01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_acudbm01

    function ajax_form_maecte_validate_acucrm01($acucrm01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_acucrm01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'acucrm01' => NM_utf8_urldecode($acucrm01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_acucrm01

    function ajax_form_maecte_validate_acudbe01($acudbe01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_acudbe01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'acudbe01' => NM_utf8_urldecode($acudbe01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_acudbe01

    function ajax_form_maecte_validate_acucre01($acucre01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_acucre01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'acucre01' => NM_utf8_urldecode($acucre01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_acucre01

    function ajax_form_maecte_validate_comentcte01($comentcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_comentcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'comentcte01' => NM_utf8_urldecode($comentcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_comentcte01

    function ajax_form_maecte_validate_statuscte01($statuscte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_statuscte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'statuscte01' => NM_utf8_urldecode($statuscte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_statuscte01

    function ajax_form_maecte_validate_identcte01($identcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_identcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'identcte01' => NM_utf8_urldecode($identcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_identcte01

    function ajax_form_maecte_validate_cordcte01($cordcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cordcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cordcte01' => NM_utf8_urldecode($cordcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cordcte01

    function ajax_form_maecte_validate_limcant01($limcant01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_limcant01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'limcant01' => NM_utf8_urldecode($limcant01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_limcant01

    function ajax_form_maecte_validate_pagleg01($pagleg01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_pagleg01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'pagleg01' => NM_utf8_urldecode($pagleg01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_pagleg01

    function ajax_form_maecte_validate_telcte01b($telcte01b, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telcte01b';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telcte01b' => NM_utf8_urldecode($telcte01b),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telcte01b

    function ajax_form_maecte_validate_telcte01c($telcte01c, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telcte01c';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telcte01c' => NM_utf8_urldecode($telcte01c),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telcte01c

    function ajax_form_maecte_validate_emailcte01($emailcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_emailcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'emailcte01' => NM_utf8_urldecode($emailcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_emailcte01

    function ajax_form_maecte_validate_calle_principal_exterior($calle_principal_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_calle_principal_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'calle_principal_exterior' => NM_utf8_urldecode($calle_principal_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_calle_principal_exterior

    function ajax_form_maecte_validate_no_exterior($no_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_no_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'no_exterior' => NM_utf8_urldecode($no_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_no_exterior

    function ajax_form_maecte_validate_calle_secundaria_exterior($calle_secundaria_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_calle_secundaria_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'calle_secundaria_exterior' => NM_utf8_urldecode($calle_secundaria_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_calle_secundaria_exterior

    function ajax_form_maecte_validate_id_pais_exterior($id_pais_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_pais_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_pais_exterior' => NM_utf8_urldecode($id_pais_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_pais_exterior

    function ajax_form_maecte_validate_id_ciudad_exterior($id_ciudad_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_ciudad_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_ciudad_exterior' => NM_utf8_urldecode($id_ciudad_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_ciudad_exterior

    function ajax_form_maecte_validate_codigo_postal_exterior($codigo_postal_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_codigo_postal_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'codigo_postal_exterior' => NM_utf8_urldecode($codigo_postal_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_codigo_postal_exterior

    function ajax_form_maecte_validate_sector_exterior($sector_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sector_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sector_exterior' => NM_utf8_urldecode($sector_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sector_exterior

    function ajax_form_maecte_validate_telefono_exterior($telefono_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telefono_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telefono_exterior' => NM_utf8_urldecode($telefono_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telefono_exterior

    function ajax_form_maecte_validate_celular_exterior($celular_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_celular_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'celular_exterior' => NM_utf8_urldecode($celular_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_celular_exterior

    function ajax_form_maecte_validate_email_exterior($email_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_email_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'email_exterior' => NM_utf8_urldecode($email_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_email_exterior

    function ajax_form_maecte_validate_emailaltcte01($emailaltcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_emailaltcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'emailaltcte01' => NM_utf8_urldecode($emailaltcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_emailaltcte01

    function ajax_form_maecte_validate_ctacgcte01($ctacgcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ctacgcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ctacgcte01' => NM_utf8_urldecode($ctacgcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ctacgcte01

    function ajax_form_maecte_validate_obsercte01($obsercte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_obsercte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'obsercte01' => NM_utf8_urldecode($obsercte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_obsercte01

    function ajax_form_maecte_validate_totexceso01($totexceso01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_totexceso01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'totexceso01' => NM_utf8_urldecode($totexceso01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_totexceso01

    function ajax_form_maecte_validate_imagencte01($imagencte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_imagencte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'imagencte01' => NM_utf8_urldecode($imagencte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_imagencte01

    function ajax_form_maecte_validate_block($block, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_block';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'block' => NM_utf8_urldecode($block),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_block

    function ajax_form_maecte_validate_uid($uid, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_uid';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'uid' => NM_utf8_urldecode($uid),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_uid

    function ajax_form_maecte_validate_ultimoacceso($ultimoacceso, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ultimoacceso';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ultimoacceso' => NM_utf8_urldecode($ultimoacceso),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ultimoacceso

    function ajax_form_maecte_validate_idcli($idcli, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_idcli';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'idcli' => NM_utf8_urldecode($idcli),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_idcli

    function ajax_form_maecte_validate_catcte01($catcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_catcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'catcte01' => NM_utf8_urldecode($catcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_catcte01

    function ajax_form_maecte_validate_transferido($transferido, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_transferido';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'transferido' => NM_utf8_urldecode($transferido),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_transferido

    function ajax_form_maecte_validate_password($password, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_password';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'password' => NM_utf8_urldecode($password),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_password

    function ajax_form_maecte_validate_showroom($showroom, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_showroom';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'showroom' => NM_utf8_urldecode($showroom),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_showroom

    function ajax_form_maecte_validate_orden($orden, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_orden';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'orden' => NM_utf8_urldecode($orden),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_orden

    function ajax_form_maecte_validate_website($website, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_website';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'website' => NM_utf8_urldecode($website),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_website

    function ajax_form_maecte_validate_longitud01($longitud01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_longitud01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'longitud01' => NM_utf8_urldecode($longitud01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_longitud01

    function ajax_form_maecte_validate_latitud01($latitud01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_latitud01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'latitud01' => NM_utf8_urldecode($latitud01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_latitud01

    function ajax_form_maecte_validate_zoom01($zoom01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_zoom01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'zoom01' => NM_utf8_urldecode($zoom01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_zoom01

    function ajax_form_maecte_validate_acceder($acceder, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_acceder';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'acceder' => NM_utf8_urldecode($acceder),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_acceder

    function ajax_form_maecte_validate_coniva01($coniva01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_coniva01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'coniva01' => NM_utf8_urldecode($coniva01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_coniva01

    function ajax_form_maecte_validate_idemp01($idemp01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_idemp01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'idemp01' => NM_utf8_urldecode($idemp01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_idemp01

    function ajax_form_maecte_validate_codprov01($codprov01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_codprov01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'codprov01' => NM_utf8_urldecode($codprov01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_codprov01

    function ajax_form_maecte_validate_celular01($celular01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_celular01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'celular01' => NM_utf8_urldecode($celular01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_celular01

    function ajax_form_maecte_validate_dircliente01($dircliente01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_dircliente01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'dircliente01' => NM_utf8_urldecode($dircliente01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_dircliente01

    function ajax_form_maecte_validate_razcte01($razcte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_razcte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'razcte01' => NM_utf8_urldecode($razcte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_razcte01

    function ajax_form_maecte_validate_ruc01($ruc01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ruc01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ruc01' => NM_utf8_urldecode($ruc01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ruc01

    function ajax_form_maecte_validate_timenegocio01($timenegocio01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_timenegocio01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'timenegocio01' => NM_utf8_urldecode($timenegocio01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_timenegocio01

    function ajax_form_maecte_validate_refbanc01($refbanc01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_refbanc01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'refbanc01' => NM_utf8_urldecode($refbanc01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_refbanc01

    function ajax_form_maecte_validate_refcom01($refcom01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_refcom01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'refcom01' => NM_utf8_urldecode($refcom01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_refcom01

    function ajax_form_maecte_validate_tarjcred01($tarjcred01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_tarjcred01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'tarjcred01' => NM_utf8_urldecode($tarjcred01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_tarjcred01

    function ajax_form_maecte_validate_firmaut01($firmaut01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_firmaut01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'firmaut01' => NM_utf8_urldecode($firmaut01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_firmaut01

    function ajax_form_maecte_validate_precte01($precte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_precte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'precte01' => NM_utf8_urldecode($precte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_precte01

    function ajax_form_maecte_validate_cuotasven01($cuotasven01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cuotasven01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cuotasven01' => NM_utf8_urldecode($cuotasven01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cuotasven01

    function ajax_form_maecte_validate_diasven01($diasven01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_diasven01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'diasven01' => NM_utf8_urldecode($diasven01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_diasven01

    function ajax_form_maecte_validate_fechanace01($fechanace01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fechanace01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fechanace01' => NM_utf8_urldecode($fechanace01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fechanace01

    function ajax_form_maecte_validate_sexo01($sexo01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sexo01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sexo01' => NM_utf8_urldecode($sexo01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sexo01

    function ajax_form_maecte_validate_estadocivil01($estadocivil01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_estadocivil01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'estadocivil01' => NM_utf8_urldecode($estadocivil01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_estadocivil01

    function ajax_form_maecte_validate_dirgestion01($dirgestion01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_dirgestion01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'dirgestion01' => NM_utf8_urldecode($dirgestion01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_dirgestion01

    function ajax_form_maecte_validate_numhijos01($numhijos01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_numhijos01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'numhijos01' => NM_utf8_urldecode($numhijos01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_numhijos01

    function ajax_form_maecte_validate_estsop01($estsop01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_estsop01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'estsop01' => NM_utf8_urldecode($estsop01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_estsop01

    function ajax_form_maecte_validate_notick01($notick01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_notick01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'notick01' => NM_utf8_urldecode($notick01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_notick01

    function ajax_form_maecte_validate_chequece($chequece, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_chequece';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'chequece' => NM_utf8_urldecode($chequece),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_chequece

    function ajax_form_maecte_validate_solcre($solcre, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_solcre';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'solcre' => NM_utf8_urldecode($solcre),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_solcre

    function ajax_form_maecte_validate_promocte01($promocte01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_promocte01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'promocte01' => NM_utf8_urldecode($promocte01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_promocte01

    function ajax_form_maecte_validate_pagare01($pagare01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_pagare01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'pagare01' => NM_utf8_urldecode($pagare01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_pagare01

    function ajax_form_maecte_validate_valorpagare01($valorpagare01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_valorpagare01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'valorpagare01' => NM_utf8_urldecode($valorpagare01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_valorpagare01

    function ajax_form_maecte_validate_garante01($garante01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_garante01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'garante01' => NM_utf8_urldecode($garante01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_garante01

    function ajax_form_maecte_validate_fecvenp01($fecvenp01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecvenp01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecvenp01' => NM_utf8_urldecode($fecvenp01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecvenp01

    function ajax_form_maecte_validate_ctacgant01($ctacgant01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ctacgant01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ctacgant01' => NM_utf8_urldecode($ctacgant01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ctacgant01

    function ajax_form_maecte_validate_dsn($dsn, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_dsn';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'dsn' => NM_utf8_urldecode($dsn),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_dsn

    function ajax_form_maecte_validate_residente($residente, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_residente';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'residente' => NM_utf8_urldecode($residente),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_residente

    function ajax_form_maecte_validate_medio_contacto($medio_contacto, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_medio_contacto';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'medio_contacto' => NM_utf8_urldecode($medio_contacto),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_medio_contacto

    function ajax_form_maecte_validate_separacion_bienes($separacion_bienes, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_separacion_bienes';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'separacion_bienes' => NM_utf8_urldecode($separacion_bienes),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_separacion_bienes

    function ajax_form_maecte_validate_disolucion_conyugal($disolucion_conyugal, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_disolucion_conyugal';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'disolucion_conyugal' => NM_utf8_urldecode($disolucion_conyugal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_disolucion_conyugal

    function ajax_form_maecte_validate_capitulaciones($capitulaciones, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_capitulaciones';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'capitulaciones' => NM_utf8_urldecode($capitulaciones),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_capitulaciones

    function ajax_form_maecte_validate_numero_carga_familiar($numero_carga_familiar, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_numero_carga_familiar';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'numero_carga_familiar' => NM_utf8_urldecode($numero_carga_familiar),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_numero_carga_familiar

    function ajax_form_maecte_validate_nivel_educacion($nivel_educacion, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_nivel_educacion';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'nivel_educacion' => NM_utf8_urldecode($nivel_educacion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_nivel_educacion

    function ajax_form_maecte_validate_profesion($profesion, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_profesion';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'profesion' => NM_utf8_urldecode($profesion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_profesion

    function ajax_form_maecte_validate_envio_correspondencia($envio_correspondencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_envio_correspondencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'envio_correspondencia' => NM_utf8_urldecode($envio_correspondencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_envio_correspondencia

    function ajax_form_maecte_validate_nombre_arrendador($nombre_arrendador, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_nombre_arrendador';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'nombre_arrendador' => NM_utf8_urldecode($nombre_arrendador),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_nombre_arrendador

    function ajax_form_maecte_validate_apellido_arrendador($apellido_arrendador, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_apellido_arrendador';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'apellido_arrendador' => NM_utf8_urldecode($apellido_arrendador),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_apellido_arrendador

    function ajax_form_maecte_validate_id_vivienda($id_vivienda, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_vivienda';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_vivienda' => NM_utf8_urldecode($id_vivienda),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_vivienda

    function ajax_form_maecte_validate_telefono_arrendador($telefono_arrendador, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telefono_arrendador';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telefono_arrendador' => NM_utf8_urldecode($telefono_arrendador),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telefono_arrendador

    function ajax_form_maecte_validate_nombres_referencia($nombres_referencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_nombres_referencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'nombres_referencia' => NM_utf8_urldecode($nombres_referencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_nombres_referencia

    function ajax_form_maecte_validate_apellidos_referencia($apellidos_referencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_apellidos_referencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'apellidos_referencia' => NM_utf8_urldecode($apellidos_referencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_apellidos_referencia

    function ajax_form_maecte_validate_parentesco($parentesco, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_parentesco';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'parentesco' => NM_utf8_urldecode($parentesco),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_parentesco

    function ajax_form_maecte_validate_celular_ref($celular_ref, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_celular_ref';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'celular_ref' => NM_utf8_urldecode($celular_ref),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_celular_ref

    function ajax_form_maecte_validate_telefono_convencional_ref($telefono_convencional_ref, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telefono_convencional_ref';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telefono_convencional_ref' => NM_utf8_urldecode($telefono_convencional_ref),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telefono_convencional_ref

    function ajax_form_maecte_validate_id_ocupacion($id_ocupacion, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_ocupacion';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_ocupacion' => NM_utf8_urldecode($id_ocupacion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_ocupacion

    function ajax_form_maecte_validate_fecha_ingreso_empresa($fecha_ingreso_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecha_ingreso_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecha_ingreso_empresa' => NM_utf8_urldecode($fecha_ingreso_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecha_ingreso_empresa

    function ajax_form_maecte_validate_nombre_empresa($nombre_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_nombre_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'nombre_empresa' => NM_utf8_urldecode($nombre_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_nombre_empresa

    function ajax_form_maecte_validate_ciudad_empresa($ciudad_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ciudad_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ciudad_empresa' => NM_utf8_urldecode($ciudad_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ciudad_empresa

    function ajax_form_maecte_validate_provincia_empresa($provincia_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_provincia_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'provincia_empresa' => NM_utf8_urldecode($provincia_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_provincia_empresa

    function ajax_form_maecte_validate_direccion_empresa($direccion_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_direccion_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'direccion_empresa' => NM_utf8_urldecode($direccion_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_direccion_empresa

    function ajax_form_maecte_validate_cargo_empresa($cargo_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cargo_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cargo_empresa' => NM_utf8_urldecode($cargo_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cargo_empresa

    function ajax_form_maecte_validate_telefono_empresa($telefono_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telefono_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telefono_empresa' => NM_utf8_urldecode($telefono_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telefono_empresa

    function ajax_form_maecte_validate_ext_empresa($ext_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ext_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ext_empresa' => NM_utf8_urldecode($ext_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ext_empresa

    function ajax_form_maecte_validate_id_tipo_contrato_actividad($id_tipo_contrato_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_tipo_contrato_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_tipo_contrato_actividad' => NM_utf8_urldecode($id_tipo_contrato_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_tipo_contrato_actividad

    function ajax_form_maecte_validate_empresa_jubilo_actividad($empresa_jubilo_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_empresa_jubilo_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'empresa_jubilo_actividad' => NM_utf8_urldecode($empresa_jubilo_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_empresa_jubilo_actividad

    function ajax_form_maecte_validate_fecha_salida_empresa_actividad($fecha_salida_empresa_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecha_salida_empresa_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecha_salida_empresa_actividad' => NM_utf8_urldecode($fecha_salida_empresa_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecha_salida_empresa_actividad

    function ajax_form_maecte_validate_cargo_salida_empresa_actividad($cargo_salida_empresa_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cargo_salida_empresa_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cargo_salida_empresa_actividad' => NM_utf8_urldecode($cargo_salida_empresa_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cargo_salida_empresa_actividad

    function ajax_form_maecte_validate_fecha_inicio_actividad($fecha_inicio_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecha_inicio_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecha_inicio_actividad' => NM_utf8_urldecode($fecha_inicio_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecha_inicio_actividad

    function ajax_form_maecte_validate_fecha_ingreso_empresa_actividad($fecha_ingreso_empresa_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecha_ingreso_empresa_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecha_ingreso_empresa_actividad' => NM_utf8_urldecode($fecha_ingreso_empresa_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecha_ingreso_empresa_actividad

    function ajax_form_maecte_validate_nombre_empresa_actividad($nombre_empresa_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_nombre_empresa_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'nombre_empresa_actividad' => NM_utf8_urldecode($nombre_empresa_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_nombre_empresa_actividad

    function ajax_form_maecte_validate_institucion_actividad($institucion_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_institucion_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'institucion_actividad' => NM_utf8_urldecode($institucion_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_institucion_actividad

    function ajax_form_maecte_validate_ciudad_actividad($ciudad_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ciudad_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ciudad_actividad' => NM_utf8_urldecode($ciudad_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ciudad_actividad

    function ajax_form_maecte_validate_provincia_actividad($provincia_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_provincia_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'provincia_actividad' => NM_utf8_urldecode($provincia_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_provincia_actividad

    function ajax_form_maecte_validate_direccion_actividad($direccion_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_direccion_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'direccion_actividad' => NM_utf8_urldecode($direccion_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_direccion_actividad

    function ajax_form_maecte_validate_calle_principal_actividad($calle_principal_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_calle_principal_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'calle_principal_actividad' => NM_utf8_urldecode($calle_principal_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_calle_principal_actividad

    function ajax_form_maecte_validate_no_actividad($no_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_no_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'no_actividad' => NM_utf8_urldecode($no_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_no_actividad

    function ajax_form_maecte_validate_calle_secundaria_actividad($calle_secundaria_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_calle_secundaria_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'calle_secundaria_actividad' => NM_utf8_urldecode($calle_secundaria_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_calle_secundaria_actividad

    function ajax_form_maecte_validate_sector_actividad($sector_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sector_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sector_actividad' => NM_utf8_urldecode($sector_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sector_actividad

    function ajax_form_maecte_validate_pais_actividad($pais_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_pais_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'pais_actividad' => NM_utf8_urldecode($pais_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_pais_actividad

    function ajax_form_maecte_validate_actividad($actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'actividad' => NM_utf8_urldecode($actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_actividad

    function ajax_form_maecte_validate_telefono_actividad($telefono_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telefono_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telefono_actividad' => NM_utf8_urldecode($telefono_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telefono_actividad

    function ajax_form_maecte_validate_cargo_actividad($cargo_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cargo_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cargo_actividad' => NM_utf8_urldecode($cargo_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cargo_actividad

    function ajax_form_maecte_validate_ext_actividad($ext_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ext_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ext_actividad' => NM_utf8_urldecode($ext_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ext_actividad

    function ajax_form_maecte_validate_fecha_ingreso_empresa_actividad2($fecha_ingreso_empresa_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecha_ingreso_empresa_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecha_ingreso_empresa_actividad2' => NM_utf8_urldecode($fecha_ingreso_empresa_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecha_ingreso_empresa_actividad2

    function ajax_form_maecte_validate_nombre_empresa_actividad2($nombre_empresa_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_nombre_empresa_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'nombre_empresa_actividad2' => NM_utf8_urldecode($nombre_empresa_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_nombre_empresa_actividad2

    function ajax_form_maecte_validate_institucion_actividad2($institucion_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_institucion_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'institucion_actividad2' => NM_utf8_urldecode($institucion_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_institucion_actividad2

    function ajax_form_maecte_validate_ciudad_actividad2($ciudad_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ciudad_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ciudad_actividad2' => NM_utf8_urldecode($ciudad_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ciudad_actividad2

    function ajax_form_maecte_validate_provincia_actividad2($provincia_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_provincia_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'provincia_actividad2' => NM_utf8_urldecode($provincia_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_provincia_actividad2

    function ajax_form_maecte_validate_direccion_actividad2($direccion_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_direccion_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'direccion_actividad2' => NM_utf8_urldecode($direccion_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_direccion_actividad2

    function ajax_form_maecte_validate_calle_principal_actividad2($calle_principal_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_calle_principal_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'calle_principal_actividad2' => NM_utf8_urldecode($calle_principal_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_calle_principal_actividad2

    function ajax_form_maecte_validate_no_actividad2($no_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_no_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'no_actividad2' => NM_utf8_urldecode($no_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_no_actividad2

    function ajax_form_maecte_validate_calle_secundaria_actividad2($calle_secundaria_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_calle_secundaria_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'calle_secundaria_actividad2' => NM_utf8_urldecode($calle_secundaria_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_calle_secundaria_actividad2

    function ajax_form_maecte_validate_sector_actividad2($sector_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sector_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sector_actividad2' => NM_utf8_urldecode($sector_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sector_actividad2

    function ajax_form_maecte_validate_fecha_salida_empresa_actividad2($fecha_salida_empresa_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecha_salida_empresa_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecha_salida_empresa_actividad2' => NM_utf8_urldecode($fecha_salida_empresa_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecha_salida_empresa_actividad2

    function ajax_form_maecte_validate_fecha_inicio_actividad2($fecha_inicio_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecha_inicio_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecha_inicio_actividad2' => NM_utf8_urldecode($fecha_inicio_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecha_inicio_actividad2

    function ajax_form_maecte_validate_actividad2($actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'actividad2' => NM_utf8_urldecode($actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_actividad2

    function ajax_form_maecte_validate_telefono_actividad2($telefono_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telefono_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telefono_actividad2' => NM_utf8_urldecode($telefono_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telefono_actividad2

    function ajax_form_maecte_validate_ext_actividad2($ext_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ext_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ext_actividad2' => NM_utf8_urldecode($ext_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ext_actividad2

    function ajax_form_maecte_validate_cargo_actividad2($cargo_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cargo_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cargo_actividad2' => NM_utf8_urldecode($cargo_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cargo_actividad2

    function ajax_form_maecte_validate_id_tipo_contrato_actividad2($id_tipo_contrato_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_tipo_contrato_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_tipo_contrato_actividad2' => NM_utf8_urldecode($id_tipo_contrato_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_tipo_contrato_actividad2

    function ajax_form_maecte_validate_empresa_jubilo_actividad2($empresa_jubilo_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_empresa_jubilo_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'empresa_jubilo_actividad2' => NM_utf8_urldecode($empresa_jubilo_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_empresa_jubilo_actividad2

    function ajax_form_maecte_validate_sueldo($sueldo, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sueldo';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sueldo' => NM_utf8_urldecode($sueldo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sueldo

    function ajax_form_maecte_validate_arriendos($arriendos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_arriendos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'arriendos' => NM_utf8_urldecode($arriendos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_arriendos

    function ajax_form_maecte_validate_dividendo_utilidades_ultimo_ano($dividendo_utilidades_ultimo_ano, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_dividendo_utilidades_ultimo_ano';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'dividendo_utilidades_ultimo_ano' => NM_utf8_urldecode($dividendo_utilidades_ultimo_ano),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_dividendo_utilidades_ultimo_ano

    function ajax_form_maecte_validate_id_otros_ingresos($id_otros_ingresos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_otros_ingresos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_otros_ingresos' => NM_utf8_urldecode($id_otros_ingresos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_otros_ingresos

    function ajax_form_maecte_validate_arriendo_hipoteca($arriendo_hipoteca, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_arriendo_hipoteca';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'arriendo_hipoteca' => NM_utf8_urldecode($arriendo_hipoteca),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_arriendo_hipoteca

    function ajax_form_maecte_validate_prestamos($prestamos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_prestamos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'prestamos' => NM_utf8_urldecode($prestamos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_prestamos

    function ajax_form_maecte_validate_tarjetas_creditos($tarjetas_creditos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_tarjetas_creditos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'tarjetas_creditos' => NM_utf8_urldecode($tarjetas_creditos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_tarjetas_creditos

    function ajax_form_maecte_validate_gastos_familiares($gastos_familiares, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_gastos_familiares';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'gastos_familiares' => NM_utf8_urldecode($gastos_familiares),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_gastos_familiares

    function ajax_form_maecte_validate_id_otros_gastos($id_otros_gastos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_otros_gastos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_otros_gastos' => NM_utf8_urldecode($id_otros_gastos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_otros_gastos

    function ajax_form_maecte_validate_depositos_bancos($depositos_bancos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_depositos_bancos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'depositos_bancos' => NM_utf8_urldecode($depositos_bancos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_depositos_bancos

    function ajax_form_maecte_validate_cuentas_documentos($cuentas_documentos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cuentas_documentos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cuentas_documentos' => NM_utf8_urldecode($cuentas_documentos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cuentas_documentos

    function ajax_form_maecte_validate_mercaderias($mercaderias, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_mercaderias';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'mercaderias' => NM_utf8_urldecode($mercaderias),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_mercaderias

    function ajax_form_maecte_validate_maquinarias_vehiculos($maquinarias_vehiculos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_maquinarias_vehiculos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'maquinarias_vehiculos' => NM_utf8_urldecode($maquinarias_vehiculos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_maquinarias_vehiculos

    function ajax_form_maecte_validate_terrenos_edificios($terrenos_edificios, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_terrenos_edificios';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'terrenos_edificios' => NM_utf8_urldecode($terrenos_edificios),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_terrenos_edificios

    function ajax_form_maecte_validate_acciones_bonos_cedulas($acciones_bonos_cedulas, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_acciones_bonos_cedulas';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'acciones_bonos_cedulas' => NM_utf8_urldecode($acciones_bonos_cedulas),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_acciones_bonos_cedulas

    function ajax_form_maecte_validate_id_otros_activos($id_otros_activos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_otros_activos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_otros_activos' => NM_utf8_urldecode($id_otros_activos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_otros_activos

    function ajax_form_maecte_validate_cuentas_por_pagar($cuentas_por_pagar, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cuentas_por_pagar';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cuentas_por_pagar' => NM_utf8_urldecode($cuentas_por_pagar),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cuentas_por_pagar

    function ajax_form_maecte_validate_prestamos_banco_menos_ano($prestamos_banco_menos_ano, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_prestamos_banco_menos_ano';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'prestamos_banco_menos_ano' => NM_utf8_urldecode($prestamos_banco_menos_ano),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_prestamos_banco_menos_ano

    function ajax_form_maecte_validate_prestamos_banco_mas_ano($prestamos_banco_mas_ano, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_prestamos_banco_mas_ano';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'prestamos_banco_mas_ano' => NM_utf8_urldecode($prestamos_banco_mas_ano),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_prestamos_banco_mas_ano

    function ajax_form_maecte_validate_deudas_tarjetas_creditos($deudas_tarjetas_creditos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_deudas_tarjetas_creditos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'deudas_tarjetas_creditos' => NM_utf8_urldecode($deudas_tarjetas_creditos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_deudas_tarjetas_creditos

    function ajax_form_maecte_validate_id_otras_obligaciones($id_otras_obligaciones, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_otras_obligaciones';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_otras_obligaciones' => NM_utf8_urldecode($id_otras_obligaciones),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_otras_obligaciones

    function ajax_form_maecte_validate_deudor($deudor, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_deudor';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'deudor' => NM_utf8_urldecode($deudor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_deudor

    function ajax_form_maecte_validate_monto($monto, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_monto';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'monto' => NM_utf8_urldecode($monto),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_monto

    function ajax_form_maecte_validate_descripcion($descripcion, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_descripcion';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'descripcion' => NM_utf8_urldecode($descripcion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_descripcion

    function ajax_form_maecte_validate_placa($placa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_placa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'placa' => NM_utf8_urldecode($placa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_placa

    function ajax_form_maecte_validate_valor_maquinaria_vehiculo($valor_maquinaria_vehiculo, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_valor_maquinaria_vehiculo';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'valor_maquinaria_vehiculo' => NM_utf8_urldecode($valor_maquinaria_vehiculo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_valor_maquinaria_vehiculo

    function ajax_form_maecte_validate_a_nombre_de($a_nombre_de, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_a_nombre_de';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'a_nombre_de' => NM_utf8_urldecode($a_nombre_de),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_a_nombre_de

    function ajax_form_maecte_validate_ubicacion($ubicacion, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ubicacion';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ubicacion' => NM_utf8_urldecode($ubicacion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ubicacion

    function ajax_form_maecte_validate_valor_propiedad($valor_propiedad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_valor_propiedad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'valor_propiedad' => NM_utf8_urldecode($valor_propiedad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_valor_propiedad

    function ajax_form_maecte_validate_empresa($empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'empresa' => NM_utf8_urldecode($empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_empresa

    function ajax_form_maecte_validate_valor_mercado($valor_mercado, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_valor_mercado';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'valor_mercado' => NM_utf8_urldecode($valor_mercado),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_valor_mercado

    function ajax_form_maecte_validate_institucion_bancaria($institucion_bancaria, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_institucion_bancaria';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'institucion_bancaria' => NM_utf8_urldecode($institucion_bancaria),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_institucion_bancaria

    function ajax_form_maecte_validate_monto_banco($monto_banco, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_monto_banco';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'monto_banco' => NM_utf8_urldecode($monto_banco),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_monto_banco

    function ajax_form_maecte_validate_institucion_finaciera($institucion_finaciera, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_institucion_finaciera';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'institucion_finaciera' => NM_utf8_urldecode($institucion_finaciera),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_institucion_finaciera

    function ajax_form_maecte_validate_monto_institucion_finaciera($monto_institucion_finaciera, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_monto_institucion_finaciera';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'monto_institucion_finaciera' => NM_utf8_urldecode($monto_institucion_finaciera),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_monto_institucion_finaciera

    function ajax_form_maecte_validate_id_cliente_juridico($id_cliente_juridico, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_cliente_juridico';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_cliente_juridico' => NM_utf8_urldecode($id_cliente_juridico),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_cliente_juridico

    function ajax_form_maecte_validate_nombre_completo_empresa($nombre_completo_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_nombre_completo_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'nombre_completo_empresa' => NM_utf8_urldecode($nombre_completo_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_nombre_completo_empresa

    function ajax_form_maecte_validate_es_empresa_extranjera($es_empresa_extranjera, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_es_empresa_extranjera';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'es_empresa_extranjera' => NM_utf8_urldecode($es_empresa_extranjera),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_es_empresa_extranjera

    function ajax_form_maecte_validate_pais_empresa($pais_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_pais_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'pais_empresa' => NM_utf8_urldecode($pais_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_pais_empresa

    function ajax_form_maecte_validate_fecha_constitucion_empresa($fecha_constitucion_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecha_constitucion_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecha_constitucion_empresa' => NM_utf8_urldecode($fecha_constitucion_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecha_constitucion_empresa

    function ajax_form_maecte_validate_id_oficina($id_oficina, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_oficina';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_oficina' => NM_utf8_urldecode($id_oficina),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_oficina

    function ajax_form_maecte_validate_id_tipo_actividad($id_tipo_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_tipo_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_tipo_actividad' => NM_utf8_urldecode($id_tipo_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_tipo_actividad

    function ajax_form_maecte_validate_especifique_otros($especifique_otros, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_especifique_otros';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'especifique_otros' => NM_utf8_urldecode($especifique_otros),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_especifique_otros

    function ajax_form_maecte_validate_direccion_correspondencia($direccion_correspondencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_direccion_correspondencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'direccion_correspondencia' => NM_utf8_urldecode($direccion_correspondencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_direccion_correspondencia

    function ajax_form_maecte_validate_calle_principal_correspondencia($calle_principal_correspondencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_calle_principal_correspondencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'calle_principal_correspondencia' => NM_utf8_urldecode($calle_principal_correspondencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_calle_principal_correspondencia

    function ajax_form_maecte_validate_no_correspondencia($no_correspondencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_no_correspondencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'no_correspondencia' => NM_utf8_urldecode($no_correspondencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_no_correspondencia

    function ajax_form_maecte_validate_calle_secundaria_correspondencia($calle_secundaria_correspondencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_calle_secundaria_correspondencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'calle_secundaria_correspondencia' => NM_utf8_urldecode($calle_secundaria_correspondencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_calle_secundaria_correspondencia

    function ajax_form_maecte_validate_id_ciudad_correspondencia($id_ciudad_correspondencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_ciudad_correspondencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_ciudad_correspondencia' => NM_utf8_urldecode($id_ciudad_correspondencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_ciudad_correspondencia

    function ajax_form_maecte_validate_nombre_empresa_solicitante($nombre_empresa_solicitante, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_nombre_empresa_solicitante';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'nombre_empresa_solicitante' => NM_utf8_urldecode($nombre_empresa_solicitante),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_nombre_empresa_solicitante

    function ajax_form_maecte_validate_cargo_empresa_solicitante($cargo_empresa_solicitante, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cargo_empresa_solicitante';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cargo_empresa_solicitante' => NM_utf8_urldecode($cargo_empresa_solicitante),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cargo_empresa_solicitante

    function ajax_form_maecte_validate_celular_empresa_solicitante($celular_empresa_solicitante, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_celular_empresa_solicitante';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'celular_empresa_solicitante' => NM_utf8_urldecode($celular_empresa_solicitante),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_celular_empresa_solicitante

    function ajax_form_maecte_validate_telefono_empresa_solicitante($telefono_empresa_solicitante, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telefono_empresa_solicitante';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telefono_empresa_solicitante' => NM_utf8_urldecode($telefono_empresa_solicitante),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telefono_empresa_solicitante

    function ajax_form_maecte_validate_mail_empresa_solicitante($mail_empresa_solicitante, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_mail_empresa_solicitante';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'mail_empresa_solicitante' => NM_utf8_urldecode($mail_empresa_solicitante),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_mail_empresa_solicitante

    function ajax_form_maecte_validate_saldo_empresa_solicitante($saldo_empresa_solicitante, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_saldo_empresa_solicitante';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'saldo_empresa_solicitante' => NM_utf8_urldecode($saldo_empresa_solicitante),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_saldo_empresa_solicitante

    function ajax_form_maecte_validate_nombre_referencia_comerciales($nombre_referencia_comerciales, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_nombre_referencia_comerciales';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'nombre_referencia_comerciales' => NM_utf8_urldecode($nombre_referencia_comerciales),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_nombre_referencia_comerciales

    function ajax_form_maecte_validate_fecha_compra($fecha_compra, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_fecha_compra';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'fecha_compra' => NM_utf8_urldecode($fecha_compra),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_fecha_compra

    function ajax_form_maecte_validate_telefono_referencia_comerciales($telefono_referencia_comerciales, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_telefono_referencia_comerciales';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'telefono_referencia_comerciales' => NM_utf8_urldecode($telefono_referencia_comerciales),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_telefono_referencia_comerciales

    function ajax_form_maecte_validate_ventas($ventas, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ventas';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ventas' => NM_utf8_urldecode($ventas),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ventas

    function ajax_form_maecte_validate_comisiones($comisiones, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_comisiones';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'comisiones' => NM_utf8_urldecode($comisiones),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_comisiones

    function ajax_form_maecte_validate_gastos_operativos($gastos_operativos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_gastos_operativos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'gastos_operativos' => NM_utf8_urldecode($gastos_operativos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_gastos_operativos

    function ajax_form_maecte_validate_gastos_administrativos($gastos_administrativos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_gastos_administrativos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'gastos_administrativos' => NM_utf8_urldecode($gastos_administrativos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_gastos_administrativos

    function ajax_form_maecte_validate_pago_cuotas_prestamo($pago_cuotas_prestamo, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_pago_cuotas_prestamo';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'pago_cuotas_prestamo' => NM_utf8_urldecode($pago_cuotas_prestamo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_pago_cuotas_prestamo

    function ajax_form_maecte_validate_funcionario($funcionario, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_funcionario';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'funcionario' => NM_utf8_urldecode($funcionario),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_funcionario

    function ajax_form_maecte_validate_funcionario_detalle($funcionario_detalle, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_funcionario_detalle';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'funcionario_detalle' => NM_utf8_urldecode($funcionario_detalle),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_funcionario_detalle

    function ajax_form_maecte_validate_miembro_politico($miembro_politico, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_miembro_politico';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'miembro_politico' => NM_utf8_urldecode($miembro_politico),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_miembro_politico

    function ajax_form_maecte_validate_miembro_politico_detalle($miembro_politico_detalle, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_miembro_politico_detalle';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'miembro_politico_detalle' => NM_utf8_urldecode($miembro_politico_detalle),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_miembro_politico_detalle

    function ajax_form_maecte_validate_ejecutivo_gobierno($ejecutivo_gobierno, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ejecutivo_gobierno';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ejecutivo_gobierno' => NM_utf8_urldecode($ejecutivo_gobierno),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ejecutivo_gobierno

    function ajax_form_maecte_validate_ejecutivo_gobierno_detalle($ejecutivo_gobierno_detalle, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_ejecutivo_gobierno_detalle';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'ejecutivo_gobierno_detalle' => NM_utf8_urldecode($ejecutivo_gobierno_detalle),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_ejecutivo_gobierno_detalle

    function ajax_form_maecte_validate_familiar_gobierno($familiar_gobierno, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_familiar_gobierno';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'familiar_gobierno' => NM_utf8_urldecode($familiar_gobierno),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_familiar_gobierno

    function ajax_form_maecte_validate_familiar_gobierno_detalle($familiar_gobierno_detalle, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_familiar_gobierno_detalle';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'familiar_gobierno_detalle' => NM_utf8_urldecode($familiar_gobierno_detalle),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_familiar_gobierno_detalle

    function ajax_form_maecte_validate_familiar_gobierno_detalle_quien($familiar_gobierno_detalle_quien, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_familiar_gobierno_detalle_quien';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'familiar_gobierno_detalle_quien' => NM_utf8_urldecode($familiar_gobierno_detalle_quien),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_familiar_gobierno_detalle_quien

    function ajax_form_maecte_validate_otros_ingresos($otros_ingresos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_otros_ingresos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'otros_ingresos' => NM_utf8_urldecode($otros_ingresos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_otros_ingresos

    function ajax_form_maecte_validate_otros_gastos($otros_gastos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_otros_gastos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'otros_gastos' => NM_utf8_urldecode($otros_gastos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_otros_gastos

    function ajax_form_maecte_validate_otros_activos($otros_activos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_otros_activos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'otros_activos' => NM_utf8_urldecode($otros_activos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_otros_activos

    function ajax_form_maecte_validate_otras_obligaciones($otras_obligaciones, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_otras_obligaciones';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'otras_obligaciones' => NM_utf8_urldecode($otras_obligaciones),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_otras_obligaciones

    function ajax_form_maecte_validate_sector_direccion_empresa($sector_direccion_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sector_direccion_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sector_direccion_empresa' => NM_utf8_urldecode($sector_direccion_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sector_direccion_empresa

    function ajax_form_maecte_validate_sector_direccion_empresa_correo($sector_direccion_empresa_correo, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_sector_direccion_empresa_correo';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'sector_direccion_empresa_correo' => NM_utf8_urldecode($sector_direccion_empresa_correo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_sector_direccion_empresa_correo

    function ajax_form_maecte_validate_extranjero_nombres_referencia($extranjero_nombres_referencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_extranjero_nombres_referencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'extranjero_nombres_referencia' => NM_utf8_urldecode($extranjero_nombres_referencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_extranjero_nombres_referencia

    function ajax_form_maecte_validate_extranjero_apellidos_referencia($extranjero_apellidos_referencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_extranjero_apellidos_referencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'extranjero_apellidos_referencia' => NM_utf8_urldecode($extranjero_apellidos_referencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_extranjero_apellidos_referencia

    function ajax_form_maecte_validate_extranjero_parentesco($extranjero_parentesco, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_extranjero_parentesco';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'extranjero_parentesco' => NM_utf8_urldecode($extranjero_parentesco),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_extranjero_parentesco

    function ajax_form_maecte_validate_extranjero_celular_ref($extranjero_celular_ref, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_extranjero_celular_ref';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'extranjero_celular_ref' => NM_utf8_urldecode($extranjero_celular_ref),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_extranjero_celular_ref

    function ajax_form_maecte_validate_extranjero_telefono_convencional_ref($extranjero_telefono_convencional_ref, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_extranjero_telefono_convencional_ref';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'extranjero_telefono_convencional_ref' => NM_utf8_urldecode($extranjero_telefono_convencional_ref),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_extranjero_telefono_convencional_ref

    function ajax_form_maecte_validate_cargo_representante_legal($cargo_representante_legal, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_cargo_representante_legal';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'cargo_representante_legal' => NM_utf8_urldecode($cargo_representante_legal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_cargo_representante_legal

    function ajax_form_maecte_validate_direccion_extranjero($direccion_extranjero, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_direccion_extranjero';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'direccion_extranjero' => NM_utf8_urldecode($direccion_extranjero),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_direccion_extranjero

    function ajax_form_maecte_validate_relacion_dependencia_principal($relacion_dependencia_principal, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_relacion_dependencia_principal';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'relacion_dependencia_principal' => NM_utf8_urldecode($relacion_dependencia_principal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_relacion_dependencia_principal

    function ajax_form_maecte_validate_correo_corporativo_principal($correo_corporativo_principal, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_correo_corporativo_principal';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'correo_corporativo_principal' => NM_utf8_urldecode($correo_corporativo_principal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_correo_corporativo_principal

    function ajax_form_maecte_validate_relacion_dependencia_secundaria($relacion_dependencia_secundaria, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_relacion_dependencia_secundaria';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'relacion_dependencia_secundaria' => NM_utf8_urldecode($relacion_dependencia_secundaria),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_relacion_dependencia_secundaria

    function ajax_form_maecte_validate_correo_corporativo_secundario($correo_corporativo_secundario, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_correo_corporativo_secundario';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'correo_corporativo_secundario' => NM_utf8_urldecode($correo_corporativo_secundario),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_correo_corporativo_secundario

    function ajax_form_maecte_validate_actividad_secundaria($actividad_secundaria, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_actividad_secundaria';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'actividad_secundaria' => NM_utf8_urldecode($actividad_secundaria),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_actividad_secundaria

    function ajax_form_maecte_validate_id_pais_empresa($id_pais_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_pais_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_pais_empresa' => NM_utf8_urldecode($id_pais_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_pais_empresa

    function ajax_form_maecte_validate_id_provincia_empresa($id_provincia_empresa, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_provincia_empresa';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_provincia_empresa' => NM_utf8_urldecode($id_provincia_empresa),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_provincia_empresa

    function ajax_form_maecte_validate_id_pais_correo($id_pais_correo, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_pais_correo';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_pais_correo' => NM_utf8_urldecode($id_pais_correo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_pais_correo

    function ajax_form_maecte_validate_id_provincia_correo($id_provincia_correo, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_provincia_correo';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_provincia_correo' => NM_utf8_urldecode($id_provincia_correo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_provincia_correo

    function ajax_form_maecte_validate_apellido_empresa_solicitante($apellido_empresa_solicitante, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_apellido_empresa_solicitante';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'apellido_empresa_solicitante' => NM_utf8_urldecode($apellido_empresa_solicitante),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_apellido_empresa_solicitante

    function ajax_form_maecte_validate_pais_actividad2($pais_actividad2, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_pais_actividad2';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'pais_actividad2' => NM_utf8_urldecode($pais_actividad2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_pais_actividad2

    function ajax_form_maecte_validate_id_provincia_exterior($id_provincia_exterior, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_provincia_exterior';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_provincia_exterior' => NM_utf8_urldecode($id_provincia_exterior),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_provincia_exterior

    function ajax_form_maecte_validate_pais_independiente($pais_independiente, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_pais_independiente';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'pais_independiente' => NM_utf8_urldecode($pais_independiente),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_pais_independiente

    function ajax_form_maecte_validate_tipo_contrato_otros_actividad_principal($tipo_contrato_otros_actividad_principal, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_tipo_contrato_otros_actividad_principal';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'tipo_contrato_otros_actividad_principal' => NM_utf8_urldecode($tipo_contrato_otros_actividad_principal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_tipo_contrato_otros_actividad_principal

    function ajax_form_maecte_validate_actividadeconomica($actividadeconomica, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_actividadeconomica';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'actividadeconomica' => NM_utf8_urldecode($actividadeconomica),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_actividadeconomica

    function ajax_form_maecte_validate_clasesujeto($clasesujeto, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_clasesujeto';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'clasesujeto' => NM_utf8_urldecode($clasesujeto),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_clasesujeto

    function ajax_form_maecte_validate_provincia($provincia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_provincia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'provincia' => NM_utf8_urldecode($provincia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_provincia

    function ajax_form_maecte_validate_parroquia($parroquia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_parroquia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'parroquia' => NM_utf8_urldecode($parroquia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_parroquia

    function ajax_form_maecte_validate_canton($canton, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_canton';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'canton' => NM_utf8_urldecode($canton),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_canton

    function ajax_form_maecte_validate_demandajudicial($demandajudicial, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_demandajudicial';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'demandajudicial' => NM_utf8_urldecode($demandajudicial),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_demandajudicial

    function ajax_form_maecte_validate_vdemandajudicial($vdemandajudicial, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_vdemandajudicial';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'vdemandajudicial' => NM_utf8_urldecode($vdemandajudicial),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_vdemandajudicial

    function ajax_form_maecte_validate_carteracastigada($carteracastigada, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_carteracastigada';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'carteracastigada' => NM_utf8_urldecode($carteracastigada),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_carteracastigada

    function ajax_form_maecte_validate_vcarteracastigada($vcarteracastigada, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_vcarteracastigada';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'vcarteracastigada' => NM_utf8_urldecode($vcarteracastigada),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_vcarteracastigada

    function ajax_form_maecte_validate_accesoexterno01($accesoexterno01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_accesoexterno01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'accesoexterno01' => NM_utf8_urldecode($accesoexterno01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_accesoexterno01

    function ajax_form_maecte_validate_referencia($referencia, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_referencia';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'referencia' => NM_utf8_urldecode($referencia),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_referencia

    function ajax_form_maecte_validate_id_pais_empleado_dir_desempeno($id_pais_empleado_dir_desempeno, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_pais_empleado_dir_desempeno';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_pais_empleado_dir_desempeno' => NM_utf8_urldecode($id_pais_empleado_dir_desempeno),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_pais_empleado_dir_desempeno

    function ajax_form_maecte_validate_id_provincia_empleado_dir_desempeno($id_provincia_empleado_dir_desempeno, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_provincia_empleado_dir_desempeno';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_provincia_empleado_dir_desempeno' => NM_utf8_urldecode($id_provincia_empleado_dir_desempeno),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_provincia_empleado_dir_desempeno

    function ajax_form_maecte_validate_id_ciudad_empleado_dir_desempeno($id_ciudad_empleado_dir_desempeno, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_ciudad_empleado_dir_desempeno';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_ciudad_empleado_dir_desempeno' => NM_utf8_urldecode($id_ciudad_empleado_dir_desempeno),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_ciudad_empleado_dir_desempeno

    function ajax_form_maecte_validate_razon_social($razon_social, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_razon_social';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'razon_social' => NM_utf8_urldecode($razon_social),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_razon_social

    function ajax_form_maecte_validate_parterel01($parterel01, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_parterel01';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'parterel01' => NM_utf8_urldecode($parterel01),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_parterel01

    function ajax_form_maecte_validate_origen_fondos($origen_fondos, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_origen_fondos';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'origen_fondos' => NM_utf8_urldecode($origen_fondos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_origen_fondos

    function ajax_form_maecte_validate_tipo_identificacion($tipo_identificacion, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_tipo_identificacion';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'tipo_identificacion' => NM_utf8_urldecode($tipo_identificacion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_tipo_identificacion

    function ajax_form_maecte_validate_id_actividad($id_actividad, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'validate_id_actividad';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'id_actividad' => NM_utf8_urldecode($id_actividad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_validate_id_actividad

    function ajax_form_maecte_submit_form($codcte01, $tipo_cliente, $id_nacionalidad, $nomcte01, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $cv1cte01, $cv2cte01, $tipcte01, $ofienccte01, $vendcte01, $cobrcte01, $loccte01, $dircte01, $sector, $calle_principal, $no, $calle_secundaria, $id_pais, $id_provincia, $id_ciudad, $id_canton, $telcte01, $cascte01, $ci_conyuge, $conyuge_tipo_identidad, $conyuge_primer_nombre, $conyuge_segundo_nombre, $conyuge_primer_apellido, $conyuge_segundo_apellido, $conyuge_profesion, $id_tipo_documento, $repleg01, $fecing01, $condpag01, $desctocte01, $limcred01, $desppar01, $cheqpro01, $sdoeje01, $sdoant01, $sdoact01, $acudbm01, $acucrm01, $acudbe01, $acucre01, $comentcte01, $statuscte01, $identcte01, $cordcte01, $limcant01, $pagleg01, $telcte01b, $telcte01c, $emailcte01, $calle_principal_exterior, $no_exterior, $calle_secundaria_exterior, $id_pais_exterior, $id_ciudad_exterior, $codigo_postal_exterior, $sector_exterior, $telefono_exterior, $celular_exterior, $email_exterior, $emailaltcte01, $ctacgcte01, $obsercte01, $totexceso01, $imagencte01, $block, $uid, $ultimoacceso, $idcli, $catcte01, $transferido, $password, $showroom, $orden, $website, $longitud01, $latitud01, $zoom01, $acceder, $coniva01, $idemp01, $codprov01, $celular01, $dircliente01, $razcte01, $ruc01, $timenegocio01, $refbanc01, $refcom01, $tarjcred01, $firmaut01, $precte01, $cuotasven01, $diasven01, $fechanace01, $sexo01, $estadocivil01, $dirgestion01, $numhijos01, $estsop01, $notick01, $chequece, $solcre, $promocte01, $pagare01, $valorpagare01, $garante01, $fecvenp01, $ctacgant01, $dsn, $residente, $medio_contacto, $separacion_bienes, $disolucion_conyugal, $capitulaciones, $numero_carga_familiar, $nivel_educacion, $profesion, $envio_correspondencia, $nombre_arrendador, $apellido_arrendador, $id_vivienda, $telefono_arrendador, $nombres_referencia, $apellidos_referencia, $parentesco, $celular_ref, $telefono_convencional_ref, $id_ocupacion, $fecha_ingreso_empresa, $nombre_empresa, $ciudad_empresa, $provincia_empresa, $direccion_empresa, $cargo_empresa, $telefono_empresa, $ext_empresa, $id_tipo_contrato_actividad, $empresa_jubilo_actividad, $fecha_salida_empresa_actividad, $cargo_salida_empresa_actividad, $fecha_inicio_actividad, $fecha_ingreso_empresa_actividad, $nombre_empresa_actividad, $institucion_actividad, $ciudad_actividad, $provincia_actividad, $direccion_actividad, $calle_principal_actividad, $no_actividad, $calle_secundaria_actividad, $sector_actividad, $pais_actividad, $actividad, $telefono_actividad, $cargo_actividad, $ext_actividad, $fecha_ingreso_empresa_actividad2, $nombre_empresa_actividad2, $institucion_actividad2, $ciudad_actividad2, $provincia_actividad2, $direccion_actividad2, $calle_principal_actividad2, $no_actividad2, $calle_secundaria_actividad2, $sector_actividad2, $fecha_salida_empresa_actividad2, $fecha_inicio_actividad2, $actividad2, $telefono_actividad2, $ext_actividad2, $cargo_actividad2, $id_tipo_contrato_actividad2, $empresa_jubilo_actividad2, $sueldo, $arriendos, $dividendo_utilidades_ultimo_ano, $id_otros_ingresos, $arriendo_hipoteca, $prestamos, $tarjetas_creditos, $gastos_familiares, $id_otros_gastos, $depositos_bancos, $cuentas_documentos, $mercaderias, $maquinarias_vehiculos, $terrenos_edificios, $acciones_bonos_cedulas, $id_otros_activos, $cuentas_por_pagar, $prestamos_banco_menos_ano, $prestamos_banco_mas_ano, $deudas_tarjetas_creditos, $id_otras_obligaciones, $deudor, $monto, $descripcion, $placa, $valor_maquinaria_vehiculo, $a_nombre_de, $ubicacion, $valor_propiedad, $empresa, $valor_mercado, $institucion_bancaria, $monto_banco, $institucion_finaciera, $monto_institucion_finaciera, $id_cliente_juridico, $nombre_completo_empresa, $es_empresa_extranjera, $pais_empresa, $fecha_constitucion_empresa, $id_oficina, $id_tipo_actividad, $especifique_otros, $direccion_correspondencia, $calle_principal_correspondencia, $no_correspondencia, $calle_secundaria_correspondencia, $id_ciudad_correspondencia, $nombre_empresa_solicitante, $cargo_empresa_solicitante, $celular_empresa_solicitante, $telefono_empresa_solicitante, $mail_empresa_solicitante, $saldo_empresa_solicitante, $nombre_referencia_comerciales, $fecha_compra, $telefono_referencia_comerciales, $ventas, $comisiones, $gastos_operativos, $gastos_administrativos, $pago_cuotas_prestamo, $funcionario, $funcionario_detalle, $miembro_politico, $miembro_politico_detalle, $ejecutivo_gobierno, $ejecutivo_gobierno_detalle, $familiar_gobierno, $familiar_gobierno_detalle, $familiar_gobierno_detalle_quien, $otros_ingresos, $otros_gastos, $otros_activos, $otras_obligaciones, $sector_direccion_empresa, $sector_direccion_empresa_correo, $extranjero_nombres_referencia, $extranjero_apellidos_referencia, $extranjero_parentesco, $extranjero_celular_ref, $extranjero_telefono_convencional_ref, $cargo_representante_legal, $direccion_extranjero, $relacion_dependencia_principal, $correo_corporativo_principal, $relacion_dependencia_secundaria, $correo_corporativo_secundario, $actividad_secundaria, $id_pais_empresa, $id_provincia_empresa, $id_pais_correo, $id_provincia_correo, $apellido_empresa_solicitante, $pais_actividad2, $id_provincia_exterior, $pais_independiente, $tipo_contrato_otros_actividad_principal, $actividadeconomica, $clasesujeto, $provincia, $parroquia, $canton, $demandajudicial, $vdemandajudicial, $carteracastigada, $vcarteracastigada, $accesoexterno01, $referencia, $id_pais_empleado_dir_desempeno, $id_provincia_empleado_dir_desempeno, $id_ciudad_empleado_dir_desempeno, $razon_social, $parterel01, $origen_fondos, $tipo_identificacion, $id_actividad, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'submit_form';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'codcte01' => NM_utf8_urldecode($codcte01),
                  'tipo_cliente' => NM_utf8_urldecode($tipo_cliente),
                  'id_nacionalidad' => NM_utf8_urldecode($id_nacionalidad),
                  'nomcte01' => NM_utf8_urldecode($nomcte01),
                  'primer_nombre' => NM_utf8_urldecode($primer_nombre),
                  'segundo_nombre' => NM_utf8_urldecode($segundo_nombre),
                  'primer_apellido' => NM_utf8_urldecode($primer_apellido),
                  'segundo_apellido' => NM_utf8_urldecode($segundo_apellido),
                  'cv1cte01' => NM_utf8_urldecode($cv1cte01),
                  'cv2cte01' => NM_utf8_urldecode($cv2cte01),
                  'tipcte01' => NM_utf8_urldecode($tipcte01),
                  'ofienccte01' => NM_utf8_urldecode($ofienccte01),
                  'vendcte01' => NM_utf8_urldecode($vendcte01),
                  'cobrcte01' => NM_utf8_urldecode($cobrcte01),
                  'loccte01' => NM_utf8_urldecode($loccte01),
                  'dircte01' => NM_utf8_urldecode($dircte01),
                  'sector' => NM_utf8_urldecode($sector),
                  'calle_principal' => NM_utf8_urldecode($calle_principal),
                  'no' => NM_utf8_urldecode($no),
                  'calle_secundaria' => NM_utf8_urldecode($calle_secundaria),
                  'id_pais' => NM_utf8_urldecode($id_pais),
                  'id_provincia' => NM_utf8_urldecode($id_provincia),
                  'id_ciudad' => NM_utf8_urldecode($id_ciudad),
                  'id_canton' => NM_utf8_urldecode($id_canton),
                  'telcte01' => NM_utf8_urldecode($telcte01),
                  'cascte01' => NM_utf8_urldecode($cascte01),
                  'ci_conyuge' => NM_utf8_urldecode($ci_conyuge),
                  'conyuge_tipo_identidad' => NM_utf8_urldecode($conyuge_tipo_identidad),
                  'conyuge_primer_nombre' => NM_utf8_urldecode($conyuge_primer_nombre),
                  'conyuge_segundo_nombre' => NM_utf8_urldecode($conyuge_segundo_nombre),
                  'conyuge_primer_apellido' => NM_utf8_urldecode($conyuge_primer_apellido),
                  'conyuge_segundo_apellido' => NM_utf8_urldecode($conyuge_segundo_apellido),
                  'conyuge_profesion' => NM_utf8_urldecode($conyuge_profesion),
                  'id_tipo_documento' => NM_utf8_urldecode($id_tipo_documento),
                  'repleg01' => NM_utf8_urldecode($repleg01),
                  'fecing01' => NM_utf8_urldecode($fecing01),
                  'condpag01' => NM_utf8_urldecode($condpag01),
                  'desctocte01' => NM_utf8_urldecode($desctocte01),
                  'limcred01' => NM_utf8_urldecode($limcred01),
                  'desppar01' => NM_utf8_urldecode($desppar01),
                  'cheqpro01' => NM_utf8_urldecode($cheqpro01),
                  'sdoeje01' => NM_utf8_urldecode($sdoeje01),
                  'sdoant01' => NM_utf8_urldecode($sdoant01),
                  'sdoact01' => NM_utf8_urldecode($sdoact01),
                  'acudbm01' => NM_utf8_urldecode($acudbm01),
                  'acucrm01' => NM_utf8_urldecode($acucrm01),
                  'acudbe01' => NM_utf8_urldecode($acudbe01),
                  'acucre01' => NM_utf8_urldecode($acucre01),
                  'comentcte01' => NM_utf8_urldecode($comentcte01),
                  'statuscte01' => NM_utf8_urldecode($statuscte01),
                  'identcte01' => NM_utf8_urldecode($identcte01),
                  'cordcte01' => NM_utf8_urldecode($cordcte01),
                  'limcant01' => NM_utf8_urldecode($limcant01),
                  'pagleg01' => NM_utf8_urldecode($pagleg01),
                  'telcte01b' => NM_utf8_urldecode($telcte01b),
                  'telcte01c' => NM_utf8_urldecode($telcte01c),
                  'emailcte01' => NM_utf8_urldecode($emailcte01),
                  'calle_principal_exterior' => NM_utf8_urldecode($calle_principal_exterior),
                  'no_exterior' => NM_utf8_urldecode($no_exterior),
                  'calle_secundaria_exterior' => NM_utf8_urldecode($calle_secundaria_exterior),
                  'id_pais_exterior' => NM_utf8_urldecode($id_pais_exterior),
                  'id_ciudad_exterior' => NM_utf8_urldecode($id_ciudad_exterior),
                  'codigo_postal_exterior' => NM_utf8_urldecode($codigo_postal_exterior),
                  'sector_exterior' => NM_utf8_urldecode($sector_exterior),
                  'telefono_exterior' => NM_utf8_urldecode($telefono_exterior),
                  'celular_exterior' => NM_utf8_urldecode($celular_exterior),
                  'email_exterior' => NM_utf8_urldecode($email_exterior),
                  'emailaltcte01' => NM_utf8_urldecode($emailaltcte01),
                  'ctacgcte01' => NM_utf8_urldecode($ctacgcte01),
                  'obsercte01' => NM_utf8_urldecode($obsercte01),
                  'totexceso01' => NM_utf8_urldecode($totexceso01),
                  'imagencte01' => NM_utf8_urldecode($imagencte01),
                  'block' => NM_utf8_urldecode($block),
                  'uid' => NM_utf8_urldecode($uid),
                  'ultimoacceso' => NM_utf8_urldecode($ultimoacceso),
                  'idcli' => NM_utf8_urldecode($idcli),
                  'catcte01' => NM_utf8_urldecode($catcte01),
                  'transferido' => NM_utf8_urldecode($transferido),
                  'password' => NM_utf8_urldecode($password),
                  'showroom' => NM_utf8_urldecode($showroom),
                  'orden' => NM_utf8_urldecode($orden),
                  'website' => NM_utf8_urldecode($website),
                  'longitud01' => NM_utf8_urldecode($longitud01),
                  'latitud01' => NM_utf8_urldecode($latitud01),
                  'zoom01' => NM_utf8_urldecode($zoom01),
                  'acceder' => NM_utf8_urldecode($acceder),
                  'coniva01' => NM_utf8_urldecode($coniva01),
                  'idemp01' => NM_utf8_urldecode($idemp01),
                  'codprov01' => NM_utf8_urldecode($codprov01),
                  'celular01' => NM_utf8_urldecode($celular01),
                  'dircliente01' => NM_utf8_urldecode($dircliente01),
                  'razcte01' => NM_utf8_urldecode($razcte01),
                  'ruc01' => NM_utf8_urldecode($ruc01),
                  'timenegocio01' => NM_utf8_urldecode($timenegocio01),
                  'refbanc01' => NM_utf8_urldecode($refbanc01),
                  'refcom01' => NM_utf8_urldecode($refcom01),
                  'tarjcred01' => NM_utf8_urldecode($tarjcred01),
                  'firmaut01' => NM_utf8_urldecode($firmaut01),
                  'precte01' => NM_utf8_urldecode($precte01),
                  'cuotasven01' => NM_utf8_urldecode($cuotasven01),
                  'diasven01' => NM_utf8_urldecode($diasven01),
                  'fechanace01' => NM_utf8_urldecode($fechanace01),
                  'sexo01' => NM_utf8_urldecode($sexo01),
                  'estadocivil01' => NM_utf8_urldecode($estadocivil01),
                  'dirgestion01' => NM_utf8_urldecode($dirgestion01),
                  'numhijos01' => NM_utf8_urldecode($numhijos01),
                  'estsop01' => NM_utf8_urldecode($estsop01),
                  'notick01' => NM_utf8_urldecode($notick01),
                  'chequece' => NM_utf8_urldecode($chequece),
                  'solcre' => NM_utf8_urldecode($solcre),
                  'promocte01' => NM_utf8_urldecode($promocte01),
                  'pagare01' => NM_utf8_urldecode($pagare01),
                  'valorpagare01' => NM_utf8_urldecode($valorpagare01),
                  'garante01' => NM_utf8_urldecode($garante01),
                  'fecvenp01' => NM_utf8_urldecode($fecvenp01),
                  'ctacgant01' => NM_utf8_urldecode($ctacgant01),
                  'dsn' => NM_utf8_urldecode($dsn),
                  'residente' => NM_utf8_urldecode($residente),
                  'medio_contacto' => NM_utf8_urldecode($medio_contacto),
                  'separacion_bienes' => NM_utf8_urldecode($separacion_bienes),
                  'disolucion_conyugal' => NM_utf8_urldecode($disolucion_conyugal),
                  'capitulaciones' => NM_utf8_urldecode($capitulaciones),
                  'numero_carga_familiar' => NM_utf8_urldecode($numero_carga_familiar),
                  'nivel_educacion' => NM_utf8_urldecode($nivel_educacion),
                  'profesion' => NM_utf8_urldecode($profesion),
                  'envio_correspondencia' => NM_utf8_urldecode($envio_correspondencia),
                  'nombre_arrendador' => NM_utf8_urldecode($nombre_arrendador),
                  'apellido_arrendador' => NM_utf8_urldecode($apellido_arrendador),
                  'id_vivienda' => NM_utf8_urldecode($id_vivienda),
                  'telefono_arrendador' => NM_utf8_urldecode($telefono_arrendador),
                  'nombres_referencia' => NM_utf8_urldecode($nombres_referencia),
                  'apellidos_referencia' => NM_utf8_urldecode($apellidos_referencia),
                  'parentesco' => NM_utf8_urldecode($parentesco),
                  'celular_ref' => NM_utf8_urldecode($celular_ref),
                  'telefono_convencional_ref' => NM_utf8_urldecode($telefono_convencional_ref),
                  'id_ocupacion' => NM_utf8_urldecode($id_ocupacion),
                  'fecha_ingreso_empresa' => NM_utf8_urldecode($fecha_ingreso_empresa),
                  'nombre_empresa' => NM_utf8_urldecode($nombre_empresa),
                  'ciudad_empresa' => NM_utf8_urldecode($ciudad_empresa),
                  'provincia_empresa' => NM_utf8_urldecode($provincia_empresa),
                  'direccion_empresa' => NM_utf8_urldecode($direccion_empresa),
                  'cargo_empresa' => NM_utf8_urldecode($cargo_empresa),
                  'telefono_empresa' => NM_utf8_urldecode($telefono_empresa),
                  'ext_empresa' => NM_utf8_urldecode($ext_empresa),
                  'id_tipo_contrato_actividad' => NM_utf8_urldecode($id_tipo_contrato_actividad),
                  'empresa_jubilo_actividad' => NM_utf8_urldecode($empresa_jubilo_actividad),
                  'fecha_salida_empresa_actividad' => NM_utf8_urldecode($fecha_salida_empresa_actividad),
                  'cargo_salida_empresa_actividad' => NM_utf8_urldecode($cargo_salida_empresa_actividad),
                  'fecha_inicio_actividad' => NM_utf8_urldecode($fecha_inicio_actividad),
                  'fecha_ingreso_empresa_actividad' => NM_utf8_urldecode($fecha_ingreso_empresa_actividad),
                  'nombre_empresa_actividad' => NM_utf8_urldecode($nombre_empresa_actividad),
                  'institucion_actividad' => NM_utf8_urldecode($institucion_actividad),
                  'ciudad_actividad' => NM_utf8_urldecode($ciudad_actividad),
                  'provincia_actividad' => NM_utf8_urldecode($provincia_actividad),
                  'direccion_actividad' => NM_utf8_urldecode($direccion_actividad),
                  'calle_principal_actividad' => NM_utf8_urldecode($calle_principal_actividad),
                  'no_actividad' => NM_utf8_urldecode($no_actividad),
                  'calle_secundaria_actividad' => NM_utf8_urldecode($calle_secundaria_actividad),
                  'sector_actividad' => NM_utf8_urldecode($sector_actividad),
                  'pais_actividad' => NM_utf8_urldecode($pais_actividad),
                  'actividad' => NM_utf8_urldecode($actividad),
                  'telefono_actividad' => NM_utf8_urldecode($telefono_actividad),
                  'cargo_actividad' => NM_utf8_urldecode($cargo_actividad),
                  'ext_actividad' => NM_utf8_urldecode($ext_actividad),
                  'fecha_ingreso_empresa_actividad2' => NM_utf8_urldecode($fecha_ingreso_empresa_actividad2),
                  'nombre_empresa_actividad2' => NM_utf8_urldecode($nombre_empresa_actividad2),
                  'institucion_actividad2' => NM_utf8_urldecode($institucion_actividad2),
                  'ciudad_actividad2' => NM_utf8_urldecode($ciudad_actividad2),
                  'provincia_actividad2' => NM_utf8_urldecode($provincia_actividad2),
                  'direccion_actividad2' => NM_utf8_urldecode($direccion_actividad2),
                  'calle_principal_actividad2' => NM_utf8_urldecode($calle_principal_actividad2),
                  'no_actividad2' => NM_utf8_urldecode($no_actividad2),
                  'calle_secundaria_actividad2' => NM_utf8_urldecode($calle_secundaria_actividad2),
                  'sector_actividad2' => NM_utf8_urldecode($sector_actividad2),
                  'fecha_salida_empresa_actividad2' => NM_utf8_urldecode($fecha_salida_empresa_actividad2),
                  'fecha_inicio_actividad2' => NM_utf8_urldecode($fecha_inicio_actividad2),
                  'actividad2' => NM_utf8_urldecode($actividad2),
                  'telefono_actividad2' => NM_utf8_urldecode($telefono_actividad2),
                  'ext_actividad2' => NM_utf8_urldecode($ext_actividad2),
                  'cargo_actividad2' => NM_utf8_urldecode($cargo_actividad2),
                  'id_tipo_contrato_actividad2' => NM_utf8_urldecode($id_tipo_contrato_actividad2),
                  'empresa_jubilo_actividad2' => NM_utf8_urldecode($empresa_jubilo_actividad2),
                  'sueldo' => NM_utf8_urldecode($sueldo),
                  'arriendos' => NM_utf8_urldecode($arriendos),
                  'dividendo_utilidades_ultimo_ano' => NM_utf8_urldecode($dividendo_utilidades_ultimo_ano),
                  'id_otros_ingresos' => NM_utf8_urldecode($id_otros_ingresos),
                  'arriendo_hipoteca' => NM_utf8_urldecode($arriendo_hipoteca),
                  'prestamos' => NM_utf8_urldecode($prestamos),
                  'tarjetas_creditos' => NM_utf8_urldecode($tarjetas_creditos),
                  'gastos_familiares' => NM_utf8_urldecode($gastos_familiares),
                  'id_otros_gastos' => NM_utf8_urldecode($id_otros_gastos),
                  'depositos_bancos' => NM_utf8_urldecode($depositos_bancos),
                  'cuentas_documentos' => NM_utf8_urldecode($cuentas_documentos),
                  'mercaderias' => NM_utf8_urldecode($mercaderias),
                  'maquinarias_vehiculos' => NM_utf8_urldecode($maquinarias_vehiculos),
                  'terrenos_edificios' => NM_utf8_urldecode($terrenos_edificios),
                  'acciones_bonos_cedulas' => NM_utf8_urldecode($acciones_bonos_cedulas),
                  'id_otros_activos' => NM_utf8_urldecode($id_otros_activos),
                  'cuentas_por_pagar' => NM_utf8_urldecode($cuentas_por_pagar),
                  'prestamos_banco_menos_ano' => NM_utf8_urldecode($prestamos_banco_menos_ano),
                  'prestamos_banco_mas_ano' => NM_utf8_urldecode($prestamos_banco_mas_ano),
                  'deudas_tarjetas_creditos' => NM_utf8_urldecode($deudas_tarjetas_creditos),
                  'id_otras_obligaciones' => NM_utf8_urldecode($id_otras_obligaciones),
                  'deudor' => NM_utf8_urldecode($deudor),
                  'monto' => NM_utf8_urldecode($monto),
                  'descripcion' => NM_utf8_urldecode($descripcion),
                  'placa' => NM_utf8_urldecode($placa),
                  'valor_maquinaria_vehiculo' => NM_utf8_urldecode($valor_maquinaria_vehiculo),
                  'a_nombre_de' => NM_utf8_urldecode($a_nombre_de),
                  'ubicacion' => NM_utf8_urldecode($ubicacion),
                  'valor_propiedad' => NM_utf8_urldecode($valor_propiedad),
                  'empresa' => NM_utf8_urldecode($empresa),
                  'valor_mercado' => NM_utf8_urldecode($valor_mercado),
                  'institucion_bancaria' => NM_utf8_urldecode($institucion_bancaria),
                  'monto_banco' => NM_utf8_urldecode($monto_banco),
                  'institucion_finaciera' => NM_utf8_urldecode($institucion_finaciera),
                  'monto_institucion_finaciera' => NM_utf8_urldecode($monto_institucion_finaciera),
                  'id_cliente_juridico' => NM_utf8_urldecode($id_cliente_juridico),
                  'nombre_completo_empresa' => NM_utf8_urldecode($nombre_completo_empresa),
                  'es_empresa_extranjera' => NM_utf8_urldecode($es_empresa_extranjera),
                  'pais_empresa' => NM_utf8_urldecode($pais_empresa),
                  'fecha_constitucion_empresa' => NM_utf8_urldecode($fecha_constitucion_empresa),
                  'id_oficina' => NM_utf8_urldecode($id_oficina),
                  'id_tipo_actividad' => NM_utf8_urldecode($id_tipo_actividad),
                  'especifique_otros' => NM_utf8_urldecode($especifique_otros),
                  'direccion_correspondencia' => NM_utf8_urldecode($direccion_correspondencia),
                  'calle_principal_correspondencia' => NM_utf8_urldecode($calle_principal_correspondencia),
                  'no_correspondencia' => NM_utf8_urldecode($no_correspondencia),
                  'calle_secundaria_correspondencia' => NM_utf8_urldecode($calle_secundaria_correspondencia),
                  'id_ciudad_correspondencia' => NM_utf8_urldecode($id_ciudad_correspondencia),
                  'nombre_empresa_solicitante' => NM_utf8_urldecode($nombre_empresa_solicitante),
                  'cargo_empresa_solicitante' => NM_utf8_urldecode($cargo_empresa_solicitante),
                  'celular_empresa_solicitante' => NM_utf8_urldecode($celular_empresa_solicitante),
                  'telefono_empresa_solicitante' => NM_utf8_urldecode($telefono_empresa_solicitante),
                  'mail_empresa_solicitante' => NM_utf8_urldecode($mail_empresa_solicitante),
                  'saldo_empresa_solicitante' => NM_utf8_urldecode($saldo_empresa_solicitante),
                  'nombre_referencia_comerciales' => NM_utf8_urldecode($nombre_referencia_comerciales),
                  'fecha_compra' => NM_utf8_urldecode($fecha_compra),
                  'telefono_referencia_comerciales' => NM_utf8_urldecode($telefono_referencia_comerciales),
                  'ventas' => NM_utf8_urldecode($ventas),
                  'comisiones' => NM_utf8_urldecode($comisiones),
                  'gastos_operativos' => NM_utf8_urldecode($gastos_operativos),
                  'gastos_administrativos' => NM_utf8_urldecode($gastos_administrativos),
                  'pago_cuotas_prestamo' => NM_utf8_urldecode($pago_cuotas_prestamo),
                  'funcionario' => NM_utf8_urldecode($funcionario),
                  'funcionario_detalle' => NM_utf8_urldecode($funcionario_detalle),
                  'miembro_politico' => NM_utf8_urldecode($miembro_politico),
                  'miembro_politico_detalle' => NM_utf8_urldecode($miembro_politico_detalle),
                  'ejecutivo_gobierno' => NM_utf8_urldecode($ejecutivo_gobierno),
                  'ejecutivo_gobierno_detalle' => NM_utf8_urldecode($ejecutivo_gobierno_detalle),
                  'familiar_gobierno' => NM_utf8_urldecode($familiar_gobierno),
                  'familiar_gobierno_detalle' => NM_utf8_urldecode($familiar_gobierno_detalle),
                  'familiar_gobierno_detalle_quien' => NM_utf8_urldecode($familiar_gobierno_detalle_quien),
                  'otros_ingresos' => NM_utf8_urldecode($otros_ingresos),
                  'otros_gastos' => NM_utf8_urldecode($otros_gastos),
                  'otros_activos' => NM_utf8_urldecode($otros_activos),
                  'otras_obligaciones' => NM_utf8_urldecode($otras_obligaciones),
                  'sector_direccion_empresa' => NM_utf8_urldecode($sector_direccion_empresa),
                  'sector_direccion_empresa_correo' => NM_utf8_urldecode($sector_direccion_empresa_correo),
                  'extranjero_nombres_referencia' => NM_utf8_urldecode($extranjero_nombres_referencia),
                  'extranjero_apellidos_referencia' => NM_utf8_urldecode($extranjero_apellidos_referencia),
                  'extranjero_parentesco' => NM_utf8_urldecode($extranjero_parentesco),
                  'extranjero_celular_ref' => NM_utf8_urldecode($extranjero_celular_ref),
                  'extranjero_telefono_convencional_ref' => NM_utf8_urldecode($extranjero_telefono_convencional_ref),
                  'cargo_representante_legal' => NM_utf8_urldecode($cargo_representante_legal),
                  'direccion_extranjero' => NM_utf8_urldecode($direccion_extranjero),
                  'relacion_dependencia_principal' => NM_utf8_urldecode($relacion_dependencia_principal),
                  'correo_corporativo_principal' => NM_utf8_urldecode($correo_corporativo_principal),
                  'relacion_dependencia_secundaria' => NM_utf8_urldecode($relacion_dependencia_secundaria),
                  'correo_corporativo_secundario' => NM_utf8_urldecode($correo_corporativo_secundario),
                  'actividad_secundaria' => NM_utf8_urldecode($actividad_secundaria),
                  'id_pais_empresa' => NM_utf8_urldecode($id_pais_empresa),
                  'id_provincia_empresa' => NM_utf8_urldecode($id_provincia_empresa),
                  'id_pais_correo' => NM_utf8_urldecode($id_pais_correo),
                  'id_provincia_correo' => NM_utf8_urldecode($id_provincia_correo),
                  'apellido_empresa_solicitante' => NM_utf8_urldecode($apellido_empresa_solicitante),
                  'pais_actividad2' => NM_utf8_urldecode($pais_actividad2),
                  'id_provincia_exterior' => NM_utf8_urldecode($id_provincia_exterior),
                  'pais_independiente' => NM_utf8_urldecode($pais_independiente),
                  'tipo_contrato_otros_actividad_principal' => NM_utf8_urldecode($tipo_contrato_otros_actividad_principal),
                  'actividadeconomica' => NM_utf8_urldecode($actividadeconomica),
                  'clasesujeto' => NM_utf8_urldecode($clasesujeto),
                  'provincia' => NM_utf8_urldecode($provincia),
                  'parroquia' => NM_utf8_urldecode($parroquia),
                  'canton' => NM_utf8_urldecode($canton),
                  'demandajudicial' => NM_utf8_urldecode($demandajudicial),
                  'vdemandajudicial' => NM_utf8_urldecode($vdemandajudicial),
                  'carteracastigada' => NM_utf8_urldecode($carteracastigada),
                  'vcarteracastigada' => NM_utf8_urldecode($vcarteracastigada),
                  'accesoexterno01' => NM_utf8_urldecode($accesoexterno01),
                  'referencia' => NM_utf8_urldecode($referencia),
                  'id_pais_empleado_dir_desempeno' => NM_utf8_urldecode($id_pais_empleado_dir_desempeno),
                  'id_provincia_empleado_dir_desempeno' => NM_utf8_urldecode($id_provincia_empleado_dir_desempeno),
                  'id_ciudad_empleado_dir_desempeno' => NM_utf8_urldecode($id_ciudad_empleado_dir_desempeno),
                  'razon_social' => NM_utf8_urldecode($razon_social),
                  'parterel01' => NM_utf8_urldecode($parterel01),
                  'origen_fondos' => NM_utf8_urldecode($origen_fondos),
                  'tipo_identificacion' => NM_utf8_urldecode($tipo_identificacion),
                  'id_actividad' => NM_utf8_urldecode($id_actividad),
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
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_submit_form

    function ajax_form_maecte_navigate_form($codcte01, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_maecte;
        //register_shutdown_function("form_maecte_pack_ajax_response");
        $inicial_form_maecte->contr_form_maecte->NM_ajax_flag          = true;
        $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao         = 'navigate_form';
        $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param'] = array(
                  'codcte01' => NM_utf8_urldecode($codcte01),
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
        if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_maecte->contr_form_maecte->controle();
        exit;
    } // ajax_navigate_form


   function form_maecte_pack_ajax_response()
   {
      global $inicial_form_maecte;
      $aResp = array();

      if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['wizard']))
      {
          $aResp['wizard'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['wizard'];
      }
      if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            form_maecte_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            form_maecte_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            form_maecte_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            form_maecte_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = form_maecte_pack_protect_string($inicial_form_maecte->contr_form_maecte->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            form_maecte_pack_ajax_ok($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['focus']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['focus'];
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['closeLine']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['clearUpload']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['btnDisabled']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['btnDisabled'])
         {
            form_maecte_pack_btn_disabled($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['btnLabel']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['btnLabel'])
         {
            form_maecte_pack_btn_label($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['varList']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['varList']))
         {
            form_maecte_pack_var_list($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['masterValue']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['masterValue'])
         {
            form_maecte_pack_master_value($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxAlert']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxAlert'])
         {
            form_maecte_pack_ajax_alert($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage'])
         {
            form_maecte_pack_ajax_message($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxJavascript']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxJavascript'])
         {
            form_maecte_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir']))
         {
            form_maecte_pack_ajax_redir($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['redirExit']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['redirExit']))
         {
            form_maecte_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['blockDisplay']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['blockDisplay']))
         {
            form_maecte_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['fieldDisplay']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['fieldDisplay']))
         {
            form_maecte_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['buttonDisplay']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['buttonDisplay']))
         {
            $inicial_form_maecte->contr_form_maecte->NM_ajax_info['buttonDisplay'] = $inicial_form_maecte->contr_form_maecte->nmgp_botoes;
            form_maecte_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['buttonDisplayVert']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['buttonDisplayVert']))
         {
            form_maecte_pack_ajax_button_display_vert($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['fieldLabel']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['fieldLabel']))
         {
            form_maecte_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['readOnly']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['readOnly']))
         {
            form_maecte_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['navStatus']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['navStatus']))
         {
            form_maecte_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['navSummary']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['navSummary']))
         {
            form_maecte_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['navPage']))
         {
            form_maecte_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['btnVars']) && !empty($inicial_form_maecte->contr_form_maecte->NM_ajax_info['btnVars']))
         {
            form_maecte_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['quickSearchRes']) && $inicial_form_maecte->contr_form_maecte->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['event_field']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['event_field'])
         {
            $aResp['eventField'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['event_field'];
         }
         else
         {
            $aResp['eventField'] = '__SC_NO_FIELD';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output']) && $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = form_maecte_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
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
   } // form_maecte_pack_ajax_response

   function form_maecte_pack_calendar_reload(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['calendarReload'] = 'OK';
   } // form_maecte_pack_calendar_reload

   function form_maecte_pack_ajax_errors(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['errList'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_form_maecte' == $sField)
         {
             $aMsg = form_maecte_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_form_maecte' != $sField)
                       ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => form_maecte_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // form_maecte_pack_ajax_errors

   function form_maecte_pack_ajax_remove_erros($aErrors)
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
   } // form_maecte_pack_ajax_remove_erros

   function form_maecte_pack_ajax_ok(&$aResp)
   {
      global $inicial_form_maecte;
      $iNumLinha = (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => form_maecte_pack_protect_string($inicial_form_maecte->contr_form_maecte->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // form_maecte_pack_ajax_ok

   function form_maecte_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_form_maecte;
      $iNumLinha = (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['fldList'] as $sField => $aData)
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
            $aField['imgFile'] = form_maecte_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = form_maecte_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = form_maecte_pack_protect_string($aData['imgLink']);
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
            $aField['docLink'] = form_maecte_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = form_maecte_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['docReadonly']))
         {
            $aField['docReadonly'] = form_maecte_pack_protect_string($aData['docReadonly']);
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
            $aField['imgHtml'] = form_maecte_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = form_maecte_pack_protect_string($aData['mulHtml']);
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
               $aValue['label'] = form_maecte_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? form_maecte_pack_protect_string($sValue) : $sValue;
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
                     $aField['optList'][] = array('value' => form_maecte_pack_protect_string($sOpt),
                                                  'label' => form_maecte_pack_protect_string($sLabel));
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
   } // form_maecte_pack_ajax_set_fields

   function form_maecte_pack_ajax_redir(&$aResp)
   {
      global $inicial_form_maecte;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['redir'][$sTag];
         }
      }
   } // form_maecte_pack_ajax_redir

   function form_maecte_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_form_maecte;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // form_maecte_pack_ajax_redir_exit

   function form_maecte_pack_var_list(&$aResp)
   {
      global $inicial_form_maecte;
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['varList'] as $varData)
      {
         $aResp['varList'][] = array('index' => key($varData),
                                      'value' => current($varData));
      }
   } // form_maecte_pack_var_list

   function form_maecte_pack_master_value(&$aResp)
   {
      global $inicial_form_maecte;
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // form_maecte_pack_master_value

   function form_maecte_pack_btn_disabled(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['btnDisabled'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['btnDisabled'] as $btnName => $btnStatus) {
        $aResp['btnDisabled'][$btnName] = $btnStatus;
      }
   } // form_maecte_pack_ajax_alert

   function form_maecte_pack_btn_label(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['btnLabel'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['btnLabel'] as $btnName => $btnLabel) {
        $aResp['btnLabel'][$btnName] = $btnLabel;
      }
   } // form_maecte_pack_ajax_alert

   function form_maecte_pack_ajax_alert(&$aResp)
   {
      global $inicial_form_maecte;
// PHP 8.0
      if (!isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxAlert']['message'])) {
          $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxAlert']['message'] = '';
      }
      if (!isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxAlert']['params'])) {
          $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxAlert']['params'] = '';
      }
//---
      $aResp['ajaxAlert'] = array('message' => $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxAlert']['message'], 'params' =>  $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxAlert']['params']);
   } // form_maecte_pack_ajax_alert

   function form_maecte_pack_ajax_message(&$aResp)
   {
      global $inicial_form_maecte;
// PHP 8.0
      if (!isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['message'])) {
          $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['message'] = '';
      }
      if (!isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['title'])) {
          $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['title'] = '';
      }
//---
      $aResp['ajaxMessage'] = array('message'      => form_maecte_pack_protect_string($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => form_maecte_pack_protect_string($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'toast'        => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['toast'])        ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['toast']        : 'N',
                                    'toast_pos'    => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['toast_pos'])    ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['toast_pos']    : '',
                                    'type'         => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['type'])         ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['type']         : '',
                                    'redir_target' => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // form_maecte_pack_ajax_message

   function form_maecte_pack_ajax_javascript(&$aResp)
   {
      global $inicial_form_maecte;
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // form_maecte_pack_ajax_javascript

   function form_maecte_pack_ajax_block_display(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // form_maecte_pack_ajax_block_display

   function form_maecte_pack_ajax_field_display(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_maecte_pack_ajax_field_display

   function form_maecte_pack_ajax_button_display(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // form_maecte_pack_ajax_button_display

   function form_maecte_pack_ajax_button_display_vert(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['buttonDisplayVert'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['buttonDisplayVert'] as $aButtonData)
      {
        $aResp['buttonDisplayVert'][] = $aButtonData;
      }
   } // form_maecte_pack_ajax_button_display

   function form_maecte_pack_ajax_field_label(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, form_maecte_pack_protect_string($sFieldLabel));
      }
   } // form_maecte_pack_ajax_field_label

   function form_maecte_pack_ajax_readonly(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['readOnly'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_maecte_pack_ajax_readonly

   function form_maecte_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['navStatus'] = array();
      if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['navStatus']['ret']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_form_maecte->contr_form_maecte->NM_ajax_info['navStatus']['ava']) && '' != $inicial_form_maecte->contr_form_maecte->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['navStatus']['ava'];
      }
   } // form_maecte_pack_ajax_nav_status

   function form_maecte_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['navSummary']['reg_tot'];
   } // form_maecte_pack_ajax_nav_Summary

   function form_maecte_pack_ajax_navPage(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['navPage'] = $inicial_form_maecte->contr_form_maecte->NM_ajax_info['navPage'];
   } // form_maecte_pack_ajax_navPage


   function form_maecte_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_form_maecte;
      $aResp['btnVars'] = array();
      foreach ($inicial_form_maecte->contr_form_maecte->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, form_maecte_pack_protect_string($sBtnValue));
      }
   } // form_maecte_pack_ajax_btn_vars

   function form_maecte_pack_protect_string($sString)
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
   } // form_maecte_pack_protect_string
?>
