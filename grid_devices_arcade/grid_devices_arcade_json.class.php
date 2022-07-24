<?php

class grid_devices_arcade_json
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   function __construct()
   {
      $this->nm_data = new nm_data("es");
   }

   function monta_json()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Json_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $result_json = json_encode($this->Arr_result, JSON_UNESCAPED_UNICODE);
              if ($result_json == false)
              {
                  $oJson = new Services_JSON();
                  $result_json = $oJson->encode($this->Arr_result);
              }
              echo $result_json;
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['opcao'] = "";
      }
   }

   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
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
                   nm_limpa_str_grid_devices_arcade($cadapar[1]);
                   nm_protect_num_grid_devices_arcade($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_devices_arcade']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Json_use_label = true;
      $this->Json_format = false;
      $this->Tem_json_res = false;
      $this->Json_password = "";
      if (isset($_REQUEST['nm_json_label']) && !empty($_REQUEST['nm_json_label']))
      {
          $this->Json_use_label = ($_REQUEST['nm_json_label'] == "S") ? true : false;
      }
      if (isset($_REQUEST['nm_json_format']) && !empty($_REQUEST['nm_json_format']))
      {
          $this->Json_format = ($_REQUEST['nm_json_format'] == "S") ? true : false;
      }
      $this->Tem_json_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_json_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_devices_arcade/grid_devices_arcade_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_devices_arcade']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_return']);
          if ($this->Tem_json_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data = new nm_data("es");
      $this->Arquivo      = "sc_json";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_grid_devices_arcade.zip";
      $this->Arquivo     .= "_grid_devices_arcade";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "grid_devices_arcade.json";
      $this->Tit_zip      = "grid_devices_arcade.zip";
   }

   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_devices_arcade']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_devices_arcade']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_devices_arcade']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->typereader = $Busca_temp['typereader']; 
          $tmp_pos = strpos($this->typereader, "##@@");
          if ($tmp_pos !== false && !is_array($this->typereader))
          {
              $this->typereader = substr($this->typereader, 0, $tmp_pos);
          }
          $this->cod_device = $Busca_temp['cod_device']; 
          $tmp_pos = strpos($this->cod_device, "##@@");
          if ($tmp_pos !== false && !is_array($this->cod_device))
          {
              $this->cod_device = substr($this->cod_device, 0, $tmp_pos);
          }
          $this->cod_activo = $Busca_temp['cod_activo']; 
          $tmp_pos = strpos($this->cod_activo, "##@@");
          if ($tmp_pos !== false && !is_array($this->cod_activo))
          {
              $this->cod_activo = substr($this->cod_activo, 0, $tmp_pos);
          }
          $this->cod_grupo = $Busca_temp['cod_grupo']; 
          $tmp_pos = strpos($this->cod_grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->cod_grupo))
          {
              $this->cod_grupo = substr($this->cod_grupo, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, str_replace (convert(char(10),ult_fecha,102), '.', '-') + ' ' + convert(char(8),ult_fecha,20), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color, sound, points, speak, typereader, url_1, url_2, url_3, foto1, foto2, foto3 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, ult_fecha, valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color, sound, points, speak, typereader, url_1, url_2, url_3, foto1, foto2, foto3 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, convert(char(23),ult_fecha,121), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color, sound, points, speak, typereader, url_1, url_2, url_3, foto1, foto2, foto3 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, ult_fecha, valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, pin_relay1, pin_relay2, rfid_read, rfid_estado, TO_DATE(TO_CHAR(rfid_fecha, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color, sound, points, speak, typereader, url_1, url_2, url_3, foto1, foto2, foto3 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, EXTEND(ult_fecha, YEAR TO FRACTION), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color, sound, points, speak, typereader, url_1, url_2, url_3, foto1, foto2, foto3 from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT cod_device, cod_activo, cod_grupo, device_name, activa, estado, ult_rfid, ult_fecha, valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, ledstripe1, ledstripe2, ledstripe3, ledstripe4, lasteffect, color, sound, points, speak, typereader, url_1, url_2, url_3, foto1, foto2, foto3 from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $this->json_registro = array();
      $this->SC_seq_json   = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->cod_device = $rs->fields[0] ;  
         $this->cod_device = (string)$this->cod_device;
         $this->cod_activo = $rs->fields[1] ;  
         $this->cod_grupo = $rs->fields[2] ;  
         $this->device_name = $rs->fields[3] ;  
         $this->activa = $rs->fields[4] ;  
         $this->activa = (string)$this->activa;
         $this->estado = $rs->fields[5] ;  
         $this->estado = (string)$this->estado;
         $this->ult_rfid = $rs->fields[6] ;  
         $this->ult_fecha = $rs->fields[7] ;  
         $this->valor_default = $rs->fields[8] ;  
         $this->valor_default =  str_replace(",", ".", $this->valor_default);
         $this->valor_default = (string)$this->valor_default;
         $this->acepta_tiempo = $rs->fields[9] ;  
         $this->acepta_tiempo = (string)$this->acepta_tiempo;
         $this->acepta_tokens = $rs->fields[10] ;  
         $this->acepta_tokens = (string)$this->acepta_tokens;
         $this->dev_ip = $rs->fields[11] ;  
         $this->tipo_dev = $rs->fields[12] ;  
         $this->tipo_dev = (string)$this->tipo_dev;
         $this->direccion_torno = $rs->fields[13] ;  
         $this->direccion_torno = (string)$this->direccion_torno;
         $this->timeout_rfid = $rs->fields[14] ;  
         $this->timeout_rfid = (string)$this->timeout_rfid;
         $this->discapacitado = $rs->fields[15] ;  
         $this->discapacitado = (string)$this->discapacitado;
         $this->numcaja = $rs->fields[16] ;  
         $this->numcaja = (string)$this->numcaja;
         $this->empleado = $rs->fields[17] ;  
         $this->empleado = (string)$this->empleado;
         $this->tokens = $rs->fields[18] ;  
         $this->tokens =  str_replace(",", ".", $this->tokens);
         $this->tokens = (string)$this->tokens;
         $this->serialrfid = $rs->fields[19] ;  
         $this->bidireccion = $rs->fields[20] ;  
         $this->bidireccion = (string)$this->bidireccion;
         $this->cod_devicee = $rs->fields[21] ;  
         $this->cod_devicee = (string)$this->cod_devicee;
         $this->pin_relay1 = $rs->fields[22] ;  
         $this->pin_relay1 = (string)$this->pin_relay1;
         $this->pin_relay2 = $rs->fields[23] ;  
         $this->pin_relay2 = (string)$this->pin_relay2;
         $this->rfid_read = $rs->fields[24] ;  
         $this->rfid_estado = $rs->fields[25] ;  
         $this->rfid_estado = (string)$this->rfid_estado;
         $this->rfid_fecha = $rs->fields[26] ;  
         $this->url_accion = $rs->fields[27] ;  
         $this->url_atraccion = $rs->fields[28] ;  
         $this->uhfip = $rs->fields[29] ;  
         $this->url_reader = $rs->fields[30] ;  
         $this->cod_rfid900 = $rs->fields[31] ;  
         $this->mensaje = $rs->fields[32] ;  
         $this->tipolector = $rs->fields[33] ;  
         $this->url_accion_bg = $rs->fields[34] ;  
         $this->url_inicio = $rs->fields[35] ;  
         $this->ledstripe1 = $rs->fields[36] ;  
         $this->ledstripe2 = $rs->fields[37] ;  
         $this->ledstripe3 = $rs->fields[38] ;  
         $this->ledstripe4 = $rs->fields[39] ;  
         $this->lasteffect = $rs->fields[40] ;  
         $this->color = $rs->fields[41] ;  
         $this->sound = $rs->fields[42] ;  
         $this->points = $rs->fields[43] ;  
         $this->points = (string)$this->points;
         $this->speak = $rs->fields[44] ;  
         $this->typereader = $rs->fields[45] ;  
         $this->url_1 = $rs->fields[46] ;  
         $this->url_2 = $rs->fields[47] ;  
         $this->url_3 = $rs->fields[48] ;  
         $this->foto1 = $rs->fields[49] ;  
         $this->foto2 = $rs->fields[50] ;  
         $this->foto3 = $rs->fields[51] ;  
         $this->foto1 = "";
         $this->foto2 = "";
         $this->foto3 = "";
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->SC_seq_json++;
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['embutida'])
      { 
          $_SESSION['scriptcase']['export_return'] = $this->json_registro;
      }
      else
      { 
          $result_json = json_encode($this->json_registro, JSON_UNESCAPED_UNICODE);
          if ($result_json == false)
          {
              $oJson = new Services_JSON();
              $result_json = $oJson->encode($this->json_registro);
          }
          fwrite($json_f, $result_json);
          fclose($json_f);
          if ($this->Tem_json_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "grid_devices_arcade_res_json.class.php");
              $this->Res = new grid_devices_arcade_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_res_grid'] = true;
              $this->Res->monta_json();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Json_password != "" || $this->Tem_json_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Json_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Json_f, ' ')) ? " \"" . $this->Json_f . "\"" :  $this->Json_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
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
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Json_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_json_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_res_file']['json'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- cod_device
   function NM_export_cod_device()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->cod_device, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cod_device'])) ? $this->New_label['cod_device'] : "Cod Device"; 
         }
         else
         {
             $SC_Label = "cod_device"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cod_device;
   }
   //----- cod_activo
   function NM_export_cod_activo()
   {
         $this->cod_activo = NM_charset_to_utf8($this->cod_activo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cod_activo'])) ? $this->New_label['cod_activo'] : "Cod Activo"; 
         }
         else
         {
             $SC_Label = "cod_activo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cod_activo;
   }
   //----- cod_grupo
   function NM_export_cod_grupo()
   {
         $this->cod_grupo = NM_charset_to_utf8($this->cod_grupo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cod_grupo'])) ? $this->New_label['cod_grupo'] : "Cod Grupo"; 
         }
         else
         {
             $SC_Label = "cod_grupo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cod_grupo;
   }
   //----- device_name
   function NM_export_device_name()
   {
         $this->device_name = NM_charset_to_utf8($this->device_name);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['device_name'])) ? $this->New_label['device_name'] : "Device Name"; 
         }
         else
         {
             $SC_Label = "device_name"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->device_name;
   }
   //----- activa
   function NM_export_activa()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->activa, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['activa'])) ? $this->New_label['activa'] : "Activa"; 
         }
         else
         {
             $SC_Label = "activa"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->activa;
   }
   //----- estado
   function NM_export_estado()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->estado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
         }
         else
         {
             $SC_Label = "estado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->estado;
   }
   //----- ult_rfid
   function NM_export_ult_rfid()
   {
         $this->ult_rfid = NM_charset_to_utf8($this->ult_rfid);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ult_rfid'])) ? $this->New_label['ult_rfid'] : "Ult Rfid"; 
         }
         else
         {
             $SC_Label = "ult_rfid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ult_rfid;
   }
   //----- ult_fecha
   function NM_export_ult_fecha()
   {
         if ($this->Json_format)
         {
             if (substr($this->ult_fecha, 10, 1) == "-") 
             { 
                 $this->ult_fecha = substr($this->ult_fecha, 0, 10) . " " . substr($this->ult_fecha, 11);
             } 
             if (substr($this->ult_fecha, 13, 1) == ".") 
             { 
                $this->ult_fecha = substr($this->ult_fecha, 0, 13) . ":" . substr($this->ult_fecha, 14, 2) . ":" . substr($this->ult_fecha, 17);
             } 
             $conteudo_x =  $this->ult_fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->ult_fecha, "YYYY-MM-DD HH:II:SS  ");
                 $this->ult_fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ult_fecha'])) ? $this->New_label['ult_fecha'] : "Ult Fecha"; 
         }
         else
         {
             $SC_Label = "ult_fecha"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ult_fecha;
   }
   //----- valor_default
   function NM_export_valor_default()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->valor_default, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valor_default'])) ? $this->New_label['valor_default'] : "Valor Default"; 
         }
         else
         {
             $SC_Label = "valor_default"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valor_default;
   }
   //----- acepta_tiempo
   function NM_export_acepta_tiempo()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->acepta_tiempo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['acepta_tiempo'])) ? $this->New_label['acepta_tiempo'] : "Acepta Tiempo"; 
         }
         else
         {
             $SC_Label = "acepta_tiempo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->acepta_tiempo;
   }
   //----- acepta_tokens
   function NM_export_acepta_tokens()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->acepta_tokens, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['acepta_tokens'])) ? $this->New_label['acepta_tokens'] : "Acepta Tokens"; 
         }
         else
         {
             $SC_Label = "acepta_tokens"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->acepta_tokens;
   }
   //----- dev_ip
   function NM_export_dev_ip()
   {
         $this->dev_ip = NM_charset_to_utf8($this->dev_ip);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['dev_ip'])) ? $this->New_label['dev_ip'] : "Dev Ip"; 
         }
         else
         {
             $SC_Label = "dev_ip"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->dev_ip;
   }
   //----- tipo_dev
   function NM_export_tipo_dev()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tipo_dev, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tipo_dev'])) ? $this->New_label['tipo_dev'] : "Tipo Dev"; 
         }
         else
         {
             $SC_Label = "tipo_dev"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tipo_dev;
   }
   //----- direccion_torno
   function NM_export_direccion_torno()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->direccion_torno, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['direccion_torno'])) ? $this->New_label['direccion_torno'] : "Direccion Torno"; 
         }
         else
         {
             $SC_Label = "direccion_torno"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->direccion_torno;
   }
   //----- timeout_rfid
   function NM_export_timeout_rfid()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->timeout_rfid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['timeout_rfid'])) ? $this->New_label['timeout_rfid'] : "Timeout Rfid"; 
         }
         else
         {
             $SC_Label = "timeout_rfid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->timeout_rfid;
   }
   //----- discapacitado
   function NM_export_discapacitado()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->discapacitado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['discapacitado'])) ? $this->New_label['discapacitado'] : "Discapacitado"; 
         }
         else
         {
             $SC_Label = "discapacitado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->discapacitado;
   }
   //----- numcaja
   function NM_export_numcaja()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->numcaja, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['numcaja'])) ? $this->New_label['numcaja'] : "Numcaja"; 
         }
         else
         {
             $SC_Label = "numcaja"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->numcaja;
   }
   //----- empleado
   function NM_export_empleado()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->empleado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['empleado'])) ? $this->New_label['empleado'] : "Empleado"; 
         }
         else
         {
             $SC_Label = "empleado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->empleado;
   }
   //----- tokens
   function NM_export_tokens()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->tokens, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tokens'])) ? $this->New_label['tokens'] : "Tokens"; 
         }
         else
         {
             $SC_Label = "tokens"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tokens;
   }
   //----- serialrfid
   function NM_export_serialrfid()
   {
         $this->serialrfid = NM_charset_to_utf8($this->serialrfid);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['serialrfid'])) ? $this->New_label['serialrfid'] : "Serialrfid"; 
         }
         else
         {
             $SC_Label = "serialrfid"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->serialrfid;
   }
   //----- bidireccion
   function NM_export_bidireccion()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->bidireccion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['bidireccion'])) ? $this->New_label['bidireccion'] : "Bidireccion"; 
         }
         else
         {
             $SC_Label = "bidireccion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->bidireccion;
   }
   //----- cod_devicee
   function NM_export_cod_devicee()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->cod_devicee, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cod_devicee'])) ? $this->New_label['cod_devicee'] : "Cod Device E"; 
         }
         else
         {
             $SC_Label = "cod_devicee"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cod_devicee;
   }
   //----- pin_relay1
   function NM_export_pin_relay1()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->pin_relay1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pin_relay1'])) ? $this->New_label['pin_relay1'] : "Pin Relay 1"; 
         }
         else
         {
             $SC_Label = "pin_relay1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pin_relay1;
   }
   //----- pin_relay2
   function NM_export_pin_relay2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->pin_relay2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pin_relay2'])) ? $this->New_label['pin_relay2'] : "Pin Relay 2"; 
         }
         else
         {
             $SC_Label = "pin_relay2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pin_relay2;
   }
   //----- rfid_read
   function NM_export_rfid_read()
   {
         $this->rfid_read = NM_charset_to_utf8($this->rfid_read);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['rfid_read'])) ? $this->New_label['rfid_read'] : "Rfid Read"; 
         }
         else
         {
             $SC_Label = "rfid_read"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->rfid_read;
   }
   //----- rfid_estado
   function NM_export_rfid_estado()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->rfid_estado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['rfid_estado'])) ? $this->New_label['rfid_estado'] : "Rfid Estado"; 
         }
         else
         {
             $SC_Label = "rfid_estado"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->rfid_estado;
   }
   //----- rfid_fecha
   function NM_export_rfid_fecha()
   {
         if ($this->Json_format)
         {
             if (substr($this->rfid_fecha, 10, 1) == "-") 
             { 
                 $this->rfid_fecha = substr($this->rfid_fecha, 0, 10) . " " . substr($this->rfid_fecha, 11);
             } 
             if (substr($this->rfid_fecha, 13, 1) == ".") 
             { 
                $this->rfid_fecha = substr($this->rfid_fecha, 0, 13) . ":" . substr($this->rfid_fecha, 14, 2) . ":" . substr($this->rfid_fecha, 17);
             } 
             $conteudo_x =  $this->rfid_fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->rfid_fecha, "YYYY-MM-DD HH:II:SS  ");
                 $this->rfid_fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         }
         $this->rfid_fecha = NM_charset_to_utf8($this->rfid_fecha);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['rfid_fecha'])) ? $this->New_label['rfid_fecha'] : "Rfid Fecha"; 
         }
         else
         {
             $SC_Label = "rfid_fecha"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->rfid_fecha;
   }
   //----- url_accion
   function NM_export_url_accion()
   {
         $this->url_accion = NM_charset_to_utf8($this->url_accion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['url_accion'])) ? $this->New_label['url_accion'] : "Url Accion"; 
         }
         else
         {
             $SC_Label = "url_accion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->url_accion;
   }
   //----- url_atraccion
   function NM_export_url_atraccion()
   {
         $this->url_atraccion = NM_charset_to_utf8($this->url_atraccion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['url_atraccion'])) ? $this->New_label['url_atraccion'] : "Url Atraccion"; 
         }
         else
         {
             $SC_Label = "url_atraccion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->url_atraccion;
   }
   //----- uhfip
   function NM_export_uhfip()
   {
         $this->uhfip = NM_charset_to_utf8($this->uhfip);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['uhfip'])) ? $this->New_label['uhfip'] : "Uhfip"; 
         }
         else
         {
             $SC_Label = "uhfip"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->uhfip;
   }
   //----- url_reader
   function NM_export_url_reader()
   {
         $this->url_reader = NM_charset_to_utf8($this->url_reader);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['url_reader'])) ? $this->New_label['url_reader'] : "Url Reader"; 
         }
         else
         {
             $SC_Label = "url_reader"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->url_reader;
   }
   //----- cod_rfid900
   function NM_export_cod_rfid900()
   {
         $this->cod_rfid900 = NM_charset_to_utf8($this->cod_rfid900);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['cod_rfid900'])) ? $this->New_label['cod_rfid900'] : "Cod Rfid 900"; 
         }
         else
         {
             $SC_Label = "cod_rfid900"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->cod_rfid900;
   }
   //----- mensaje
   function NM_export_mensaje()
   {
         $this->mensaje = NM_charset_to_utf8($this->mensaje);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['mensaje'])) ? $this->New_label['mensaje'] : "Mensaje"; 
         }
         else
         {
             $SC_Label = "mensaje"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->mensaje;
   }
   //----- tipolector
   function NM_export_tipolector()
   {
         $this->tipolector = NM_charset_to_utf8($this->tipolector);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tipolector'])) ? $this->New_label['tipolector'] : "Tipolector"; 
         }
         else
         {
             $SC_Label = "tipolector"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tipolector;
   }
   //----- url_accion_bg
   function NM_export_url_accion_bg()
   {
         $this->url_accion_bg = NM_charset_to_utf8($this->url_accion_bg);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['url_accion_bg'])) ? $this->New_label['url_accion_bg'] : "Url Accion Bg"; 
         }
         else
         {
             $SC_Label = "url_accion_bg"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->url_accion_bg;
   }
   //----- url_inicio
   function NM_export_url_inicio()
   {
         $this->url_inicio = NM_charset_to_utf8($this->url_inicio);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['url_inicio'])) ? $this->New_label['url_inicio'] : "Url Inicio"; 
         }
         else
         {
             $SC_Label = "url_inicio"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->url_inicio;
   }
   //----- ledstripe1
   function NM_export_ledstripe1()
   {
         $this->ledstripe1 = NM_charset_to_utf8($this->ledstripe1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ledstripe1'])) ? $this->New_label['ledstripe1'] : "Ledstripe 1"; 
         }
         else
         {
             $SC_Label = "ledstripe1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ledstripe1;
   }
   //----- ledstripe2
   function NM_export_ledstripe2()
   {
         $this->ledstripe2 = NM_charset_to_utf8($this->ledstripe2);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ledstripe2'])) ? $this->New_label['ledstripe2'] : "Ledstripe 2"; 
         }
         else
         {
             $SC_Label = "ledstripe2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ledstripe2;
   }
   //----- ledstripe3
   function NM_export_ledstripe3()
   {
         $this->ledstripe3 = NM_charset_to_utf8($this->ledstripe3);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ledstripe3'])) ? $this->New_label['ledstripe3'] : "Ledstripe 3"; 
         }
         else
         {
             $SC_Label = "ledstripe3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ledstripe3;
   }
   //----- ledstripe4
   function NM_export_ledstripe4()
   {
         $this->ledstripe4 = NM_charset_to_utf8($this->ledstripe4);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ledstripe4'])) ? $this->New_label['ledstripe4'] : "Ledstripe 4"; 
         }
         else
         {
             $SC_Label = "ledstripe4"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ledstripe4;
   }
   //----- lasteffect
   function NM_export_lasteffect()
   {
         $this->lasteffect = NM_charset_to_utf8($this->lasteffect);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['lasteffect'])) ? $this->New_label['lasteffect'] : "Lasteffect"; 
         }
         else
         {
             $SC_Label = "lasteffect"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->lasteffect;
   }
   //----- color
   function NM_export_color()
   {
         $this->color = NM_charset_to_utf8($this->color);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['color'])) ? $this->New_label['color'] : "Color"; 
         }
         else
         {
             $SC_Label = "color"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->color;
   }
   //----- sound
   function NM_export_sound()
   {
         $this->sound = NM_charset_to_utf8($this->sound);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['sound'])) ? $this->New_label['sound'] : "Sound"; 
         }
         else
         {
             $SC_Label = "sound"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->sound;
   }
   //----- points
   function NM_export_points()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->points, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['points'])) ? $this->New_label['points'] : "Points"; 
         }
         else
         {
             $SC_Label = "points"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->points;
   }
   //----- speak
   function NM_export_speak()
   {
         $this->speak = NM_charset_to_utf8($this->speak);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['speak'])) ? $this->New_label['speak'] : "Speak"; 
         }
         else
         {
             $SC_Label = "speak"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->speak;
   }
   //----- typereader
   function NM_export_typereader()
   {
         $this->typereader = NM_charset_to_utf8($this->typereader);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['typereader'])) ? $this->New_label['typereader'] : "Typereader"; 
         }
         else
         {
             $SC_Label = "typereader"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->typereader;
   }
   //----- url_1
   function NM_export_url_1()
   {
         $this->url_1 = NM_charset_to_utf8($this->url_1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['url_1'])) ? $this->New_label['url_1'] : "Url 1"; 
         }
         else
         {
             $SC_Label = "url_1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->url_1;
   }
   //----- url_2
   function NM_export_url_2()
   {
         $this->url_2 = NM_charset_to_utf8($this->url_2);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['url_2'])) ? $this->New_label['url_2'] : "Url 2"; 
         }
         else
         {
             $SC_Label = "url_2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->url_2;
   }
   //----- url_3
   function NM_export_url_3()
   {
         $this->url_3 = NM_charset_to_utf8($this->url_3);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['url_3'])) ? $this->New_label['url_3'] : "Url 3"; 
         }
         else
         {
             $SC_Label = "url_3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->url_3;
   }
   //----- foto1
   function NM_export_foto1()
   {
         $this->foto1 = NM_charset_to_utf8($this->foto1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['foto1'])) ? $this->New_label['foto1'] : "Foto 1"; 
         }
         else
         {
             $SC_Label = "foto1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->foto1;
   }
   //----- foto2
   function NM_export_foto2()
   {
         $this->foto2 = NM_charset_to_utf8($this->foto2);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['foto2'])) ? $this->New_label['foto2'] : "Foto 2"; 
         }
         else
         {
             $SC_Label = "foto2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->foto2;
   }
   //----- foto3
   function NM_export_foto3()
   {
         $this->foto3 = NM_charset_to_utf8($this->foto3);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['foto3'])) ? $this->New_label['foto3'] : "Foto 3"; 
         }
         else
         {
             $SC_Label = "foto3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->foto3;
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
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> devices :: JSON</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
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
   <td class="scExportTitle" style="height: 25px">JSON</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_devices_arcade_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_devices_arcade"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_arcade']['json_return']); ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($tam_campo >= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
}

?>
