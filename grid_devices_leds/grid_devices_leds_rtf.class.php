<?php

class grid_devices_leds_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
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
                   nm_limpa_str_grid_devices_leds($cadapar[1]);
                   nm_protect_num_grid_devices_leds($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_devices_leds']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_devices_leds_total.class.php"); 
      $this->Tot      = new grid_devices_leds_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_devices_leds']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_devices_leds";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_devices_leds.rtf";
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_devices_leds']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_devices_leds']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_devices_leds']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->color = $Busca_temp['color']; 
          $tmp_pos = strpos($this->color, "##@@");
          if ($tmp_pos !== false && !is_array($this->color))
          {
              $this->color = substr($this->color, 0, $tmp_pos);
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['cod_device'])) ? $this->New_label['cod_device'] : "Cod Device"; 
          if ($Cada_col == "cod_device" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['device_name'])) ? $this->New_label['device_name'] : "Device Name"; 
          if ($Cada_col == "device_name" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ledstripe1'])) ? $this->New_label['ledstripe1'] : "Ledstripe 1"; 
          if ($Cada_col == "ledstripe1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ledstripe2'])) ? $this->New_label['ledstripe2'] : "Ledstripe 2"; 
          if ($Cada_col == "ledstripe2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ledstripe3'])) ? $this->New_label['ledstripe3'] : "Ledstripe 3"; 
          if ($Cada_col == "ledstripe3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ledstripe4'])) ? $this->New_label['ledstripe4'] : "Ledstripe 4"; 
          if ($Cada_col == "ledstripe4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['color'])) ? $this->New_label['color'] : "Color"; 
          if ($Cada_col == "color" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cod_activo'])) ? $this->New_label['cod_activo'] : "Cod Activo"; 
          if ($Cada_col == "cod_activo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cod_grupo'])) ? $this->New_label['cod_grupo'] : "Cod Grupo"; 
          if ($Cada_col == "cod_grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['activa'])) ? $this->New_label['activa'] : "Activa"; 
          if ($Cada_col == "activa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
          if ($Cada_col == "estado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ult_rfid'])) ? $this->New_label['ult_rfid'] : "Ult Rfid"; 
          if ($Cada_col == "ult_rfid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ult_fecha'])) ? $this->New_label['ult_fecha'] : "Ult Fecha"; 
          if ($Cada_col == "ult_fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_default'])) ? $this->New_label['valor_default'] : "Valor Default"; 
          if ($Cada_col == "valor_default" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['acepta_tiempo'])) ? $this->New_label['acepta_tiempo'] : "Acepta Tiempo"; 
          if ($Cada_col == "acepta_tiempo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['acepta_tokens'])) ? $this->New_label['acepta_tokens'] : "Acepta Tokens"; 
          if ($Cada_col == "acepta_tokens" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dev_ip'])) ? $this->New_label['dev_ip'] : "Dev Ip"; 
          if ($Cada_col == "dev_ip" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipo_dev'])) ? $this->New_label['tipo_dev'] : "Tipo Dev"; 
          if ($Cada_col == "tipo_dev" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direccion_torno'])) ? $this->New_label['direccion_torno'] : "Direccion Torno"; 
          if ($Cada_col == "direccion_torno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['timeout_rfid'])) ? $this->New_label['timeout_rfid'] : "Timeout Rfid"; 
          if ($Cada_col == "timeout_rfid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['discapacitado'])) ? $this->New_label['discapacitado'] : "Discapacitado"; 
          if ($Cada_col == "discapacitado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numcaja'])) ? $this->New_label['numcaja'] : "Numcaja"; 
          if ($Cada_col == "numcaja" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['empleado'])) ? $this->New_label['empleado'] : "Empleado"; 
          if ($Cada_col == "empleado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tokens'])) ? $this->New_label['tokens'] : "Tokens"; 
          if ($Cada_col == "tokens" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['serialrfid'])) ? $this->New_label['serialrfid'] : "Serialrfid"; 
          if ($Cada_col == "serialrfid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['bidireccion'])) ? $this->New_label['bidireccion'] : "Bidireccion"; 
          if ($Cada_col == "bidireccion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cod_devicee'])) ? $this->New_label['cod_devicee'] : "Cod Device E"; 
          if ($Cada_col == "cod_devicee" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['url_1'])) ? $this->New_label['url_1'] : "Url 1"; 
          if ($Cada_col == "url_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['url_2'])) ? $this->New_label['url_2'] : "Url 2"; 
          if ($Cada_col == "url_2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['url_3'])) ? $this->New_label['url_3'] : "Url 3"; 
          if ($Cada_col == "url_3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['foto1'])) ? $this->New_label['foto1'] : "Foto 1"; 
          if ($Cada_col == "foto1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['foto2'])) ? $this->New_label['foto2'] : "Foto 2"; 
          if ($Cada_col == "foto2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['foto3'])) ? $this->New_label['foto3'] : "Foto 3"; 
          if ($Cada_col == "foto3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pin_relay1'])) ? $this->New_label['pin_relay1'] : "Pin Relay 1"; 
          if ($Cada_col == "pin_relay1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pin_relay2'])) ? $this->New_label['pin_relay2'] : "Pin Relay 2"; 
          if ($Cada_col == "pin_relay2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rfid_read'])) ? $this->New_label['rfid_read'] : "Rfid Read"; 
          if ($Cada_col == "rfid_read" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rfid_estado'])) ? $this->New_label['rfid_estado'] : "Rfid Estado"; 
          if ($Cada_col == "rfid_estado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rfid_fecha'])) ? $this->New_label['rfid_fecha'] : "Rfid Fecha"; 
          if ($Cada_col == "rfid_fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['url_accion'])) ? $this->New_label['url_accion'] : "Url Accion"; 
          if ($Cada_col == "url_accion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['url_atraccion'])) ? $this->New_label['url_atraccion'] : "Url Atraccion"; 
          if ($Cada_col == "url_atraccion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['uhfip'])) ? $this->New_label['uhfip'] : "Uhfip"; 
          if ($Cada_col == "uhfip" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['url_reader'])) ? $this->New_label['url_reader'] : "Url Reader"; 
          if ($Cada_col == "url_reader" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cod_rfid900'])) ? $this->New_label['cod_rfid900'] : "Cod Rfid 900"; 
          if ($Cada_col == "cod_rfid900" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['mensaje'])) ? $this->New_label['mensaje'] : "Mensaje"; 
          if ($Cada_col == "mensaje" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipolector'])) ? $this->New_label['tipolector'] : "Tipolector"; 
          if ($Cada_col == "tipolector" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['url_accion_bg'])) ? $this->New_label['url_accion_bg'] : "Url Accion Bg"; 
          if ($Cada_col == "url_accion_bg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['url_inicio'])) ? $this->New_label['url_inicio'] : "Url Inicio"; 
          if ($Cada_col == "url_inicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['lasteffect'])) ? $this->New_label['lasteffect'] : "Lasteffect"; 
          if ($Cada_col == "lasteffect" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT cod_device, device_name, ledstripe1, ledstripe2, ledstripe3, ledstripe4, color, cod_activo, cod_grupo, activa, estado, ult_rfid, str_replace (convert(char(10),ult_fecha,102), '.', '-') + ' ' + convert(char(8),ult_fecha,20), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, lasteffect from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT cod_device, device_name, ledstripe1, ledstripe2, ledstripe3, ledstripe4, color, cod_activo, cod_grupo, activa, estado, ult_rfid, ult_fecha, valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, lasteffect from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT cod_device, device_name, ledstripe1, ledstripe2, ledstripe3, ledstripe4, color, cod_activo, cod_grupo, activa, estado, ult_rfid, convert(char(23),ult_fecha,121), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, lasteffect from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT cod_device, device_name, ledstripe1, ledstripe2, ledstripe3, ledstripe4, color, cod_activo, cod_grupo, activa, estado, ult_rfid, ult_fecha, valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, TO_DATE(TO_CHAR(rfid_fecha, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, lasteffect from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT cod_device, device_name, ledstripe1, ledstripe2, ledstripe3, ledstripe4, color, cod_activo, cod_grupo, activa, estado, ult_rfid, EXTEND(ult_fecha, YEAR TO FRACTION), valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, lasteffect from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT cod_device, device_name, ledstripe1, ledstripe2, ledstripe3, ledstripe4, color, cod_activo, cod_grupo, activa, estado, ult_rfid, ult_fecha, valor_default, acepta_tiempo, acepta_tokens, dev_ip, tipo_dev, direccion_torno, timeout_rfid, discapacitado, numcaja, empleado, tokens, serialrfid, bidireccion, cod_deviceE, url_1, url_2, url_3, foto1, foto2, foto3, pin_relay1, pin_relay2, rfid_read, rfid_estado, rfid_fecha, url_accion, url_atraccion, uhfip, url_reader, cod_rfid900, mensaje, tipolector, url_accion_bg, url_inicio, lasteffect from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['order_grid'];
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
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->cod_device = $rs->fields[0] ;  
         $this->cod_device = (string)$this->cod_device;
         $this->device_name = $rs->fields[1] ;  
         $this->ledstripe1 = $rs->fields[2] ;  
         $this->ledstripe2 = $rs->fields[3] ;  
         $this->ledstripe3 = $rs->fields[4] ;  
         $this->ledstripe4 = $rs->fields[5] ;  
         $this->color = $rs->fields[6] ;  
         $this->cod_activo = $rs->fields[7] ;  
         $this->cod_grupo = $rs->fields[8] ;  
         $this->activa = $rs->fields[9] ;  
         $this->activa = (string)$this->activa;
         $this->estado = $rs->fields[10] ;  
         $this->estado = (string)$this->estado;
         $this->ult_rfid = $rs->fields[11] ;  
         $this->ult_fecha = $rs->fields[12] ;  
         $this->valor_default = $rs->fields[13] ;  
         $this->valor_default =  str_replace(",", ".", $this->valor_default);
         $this->valor_default = (string)$this->valor_default;
         $this->acepta_tiempo = $rs->fields[14] ;  
         $this->acepta_tiempo = (string)$this->acepta_tiempo;
         $this->acepta_tokens = $rs->fields[15] ;  
         $this->acepta_tokens = (string)$this->acepta_tokens;
         $this->dev_ip = $rs->fields[16] ;  
         $this->tipo_dev = $rs->fields[17] ;  
         $this->tipo_dev = (string)$this->tipo_dev;
         $this->direccion_torno = $rs->fields[18] ;  
         $this->direccion_torno = (string)$this->direccion_torno;
         $this->timeout_rfid = $rs->fields[19] ;  
         $this->timeout_rfid = (string)$this->timeout_rfid;
         $this->discapacitado = $rs->fields[20] ;  
         $this->discapacitado = (string)$this->discapacitado;
         $this->numcaja = $rs->fields[21] ;  
         $this->numcaja = (string)$this->numcaja;
         $this->empleado = $rs->fields[22] ;  
         $this->empleado = (string)$this->empleado;
         $this->tokens = $rs->fields[23] ;  
         $this->tokens =  str_replace(",", ".", $this->tokens);
         $this->tokens = (string)$this->tokens;
         $this->serialrfid = $rs->fields[24] ;  
         $this->bidireccion = $rs->fields[25] ;  
         $this->bidireccion = (string)$this->bidireccion;
         $this->cod_devicee = $rs->fields[26] ;  
         $this->cod_devicee = (string)$this->cod_devicee;
         $this->url_1 = $rs->fields[27] ;  
         $this->url_2 = $rs->fields[28] ;  
         $this->url_3 = $rs->fields[29] ;  
         $this->foto1 = $rs->fields[30] ;  
         $this->foto2 = $rs->fields[31] ;  
         $this->foto3 = $rs->fields[32] ;  
         $this->pin_relay1 = $rs->fields[33] ;  
         $this->pin_relay1 = (string)$this->pin_relay1;
         $this->pin_relay2 = $rs->fields[34] ;  
         $this->pin_relay2 = (string)$this->pin_relay2;
         $this->rfid_read = $rs->fields[35] ;  
         $this->rfid_estado = $rs->fields[36] ;  
         $this->rfid_estado = (string)$this->rfid_estado;
         $this->rfid_fecha = $rs->fields[37] ;  
         $this->url_accion = $rs->fields[38] ;  
         $this->url_atraccion = $rs->fields[39] ;  
         $this->uhfip = $rs->fields[40] ;  
         $this->url_reader = $rs->fields[41] ;  
         $this->cod_rfid900 = $rs->fields[42] ;  
         $this->mensaje = $rs->fields[43] ;  
         $this->tipolector = $rs->fields[44] ;  
         $this->url_accion_bg = $rs->fields[45] ;  
         $this->url_inicio = $rs->fields[46] ;  
         $this->lasteffect = $rs->fields[47] ;  
         $this->foto1 = "";
         $this->foto2 = "";
         $this->foto3 = "";
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- cod_device
   function NM_export_cod_device()
   {
             nmgp_Form_Num_Val($this->cod_device, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->cod_device = NM_charset_to_utf8($this->cod_device);
         $this->cod_device = str_replace('<', '&lt;', $this->cod_device);
         $this->cod_device = str_replace('>', '&gt;', $this->cod_device);
         $this->Texto_tag .= "<td>" . $this->cod_device . "</td>\r\n";
   }
   //----- device_name
   function NM_export_device_name()
   {
         $this->device_name = html_entity_decode($this->device_name, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->device_name = strip_tags($this->device_name);
         $this->device_name = NM_charset_to_utf8($this->device_name);
         $this->device_name = str_replace('<', '&lt;', $this->device_name);
         $this->device_name = str_replace('>', '&gt;', $this->device_name);
         $this->Texto_tag .= "<td>" . $this->device_name . "</td>\r\n";
   }
   //----- ledstripe1
   function NM_export_ledstripe1()
   {
         $this->ledstripe1 = html_entity_decode($this->ledstripe1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ledstripe1 = strip_tags($this->ledstripe1);
         $this->ledstripe1 = NM_charset_to_utf8($this->ledstripe1);
         $this->ledstripe1 = str_replace('<', '&lt;', $this->ledstripe1);
         $this->ledstripe1 = str_replace('>', '&gt;', $this->ledstripe1);
         $this->Texto_tag .= "<td>" . $this->ledstripe1 . "</td>\r\n";
   }
   //----- ledstripe2
   function NM_export_ledstripe2()
   {
         $this->ledstripe2 = html_entity_decode($this->ledstripe2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ledstripe2 = strip_tags($this->ledstripe2);
         $this->ledstripe2 = NM_charset_to_utf8($this->ledstripe2);
         $this->ledstripe2 = str_replace('<', '&lt;', $this->ledstripe2);
         $this->ledstripe2 = str_replace('>', '&gt;', $this->ledstripe2);
         $this->Texto_tag .= "<td>" . $this->ledstripe2 . "</td>\r\n";
   }
   //----- ledstripe3
   function NM_export_ledstripe3()
   {
         $this->ledstripe3 = html_entity_decode($this->ledstripe3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ledstripe3 = strip_tags($this->ledstripe3);
         $this->ledstripe3 = NM_charset_to_utf8($this->ledstripe3);
         $this->ledstripe3 = str_replace('<', '&lt;', $this->ledstripe3);
         $this->ledstripe3 = str_replace('>', '&gt;', $this->ledstripe3);
         $this->Texto_tag .= "<td>" . $this->ledstripe3 . "</td>\r\n";
   }
   //----- ledstripe4
   function NM_export_ledstripe4()
   {
         $this->ledstripe4 = html_entity_decode($this->ledstripe4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ledstripe4 = strip_tags($this->ledstripe4);
         $this->ledstripe4 = NM_charset_to_utf8($this->ledstripe4);
         $this->ledstripe4 = str_replace('<', '&lt;', $this->ledstripe4);
         $this->ledstripe4 = str_replace('>', '&gt;', $this->ledstripe4);
         $this->Texto_tag .= "<td>" . $this->ledstripe4 . "</td>\r\n";
   }
   //----- color
   function NM_export_color()
   {
         $this->color = html_entity_decode($this->color, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->color = strip_tags($this->color);
         $this->color = NM_charset_to_utf8($this->color);
         $this->color = str_replace('<', '&lt;', $this->color);
         $this->color = str_replace('>', '&gt;', $this->color);
         $this->Texto_tag .= "<td>" . $this->color . "</td>\r\n";
   }
   //----- cod_activo
   function NM_export_cod_activo()
   {
         $this->cod_activo = html_entity_decode($this->cod_activo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cod_activo = strip_tags($this->cod_activo);
         $this->cod_activo = NM_charset_to_utf8($this->cod_activo);
         $this->cod_activo = str_replace('<', '&lt;', $this->cod_activo);
         $this->cod_activo = str_replace('>', '&gt;', $this->cod_activo);
         $this->Texto_tag .= "<td>" . $this->cod_activo . "</td>\r\n";
   }
   //----- cod_grupo
   function NM_export_cod_grupo()
   {
         $this->cod_grupo = html_entity_decode($this->cod_grupo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cod_grupo = strip_tags($this->cod_grupo);
         $this->cod_grupo = NM_charset_to_utf8($this->cod_grupo);
         $this->cod_grupo = str_replace('<', '&lt;', $this->cod_grupo);
         $this->cod_grupo = str_replace('>', '&gt;', $this->cod_grupo);
         $this->Texto_tag .= "<td>" . $this->cod_grupo . "</td>\r\n";
   }
   //----- activa
   function NM_export_activa()
   {
             nmgp_Form_Num_Val($this->activa, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->activa = NM_charset_to_utf8($this->activa);
         $this->activa = str_replace('<', '&lt;', $this->activa);
         $this->activa = str_replace('>', '&gt;', $this->activa);
         $this->Texto_tag .= "<td>" . $this->activa . "</td>\r\n";
   }
   //----- estado
   function NM_export_estado()
   {
             nmgp_Form_Num_Val($this->estado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->estado = NM_charset_to_utf8($this->estado);
         $this->estado = str_replace('<', '&lt;', $this->estado);
         $this->estado = str_replace('>', '&gt;', $this->estado);
         $this->Texto_tag .= "<td>" . $this->estado . "</td>\r\n";
   }
   //----- ult_rfid
   function NM_export_ult_rfid()
   {
         $this->ult_rfid = html_entity_decode($this->ult_rfid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ult_rfid = strip_tags($this->ult_rfid);
         $this->ult_rfid = NM_charset_to_utf8($this->ult_rfid);
         $this->ult_rfid = str_replace('<', '&lt;', $this->ult_rfid);
         $this->ult_rfid = str_replace('>', '&gt;', $this->ult_rfid);
         $this->Texto_tag .= "<td>" . $this->ult_rfid . "</td>\r\n";
   }
   //----- ult_fecha
   function NM_export_ult_fecha()
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
         $this->ult_fecha = NM_charset_to_utf8($this->ult_fecha);
         $this->ult_fecha = str_replace('<', '&lt;', $this->ult_fecha);
         $this->ult_fecha = str_replace('>', '&gt;', $this->ult_fecha);
         $this->Texto_tag .= "<td>" . $this->ult_fecha . "</td>\r\n";
   }
   //----- valor_default
   function NM_export_valor_default()
   {
             nmgp_Form_Num_Val($this->valor_default, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valor_default = NM_charset_to_utf8($this->valor_default);
         $this->valor_default = str_replace('<', '&lt;', $this->valor_default);
         $this->valor_default = str_replace('>', '&gt;', $this->valor_default);
         $this->Texto_tag .= "<td>" . $this->valor_default . "</td>\r\n";
   }
   //----- acepta_tiempo
   function NM_export_acepta_tiempo()
   {
             nmgp_Form_Num_Val($this->acepta_tiempo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->acepta_tiempo = NM_charset_to_utf8($this->acepta_tiempo);
         $this->acepta_tiempo = str_replace('<', '&lt;', $this->acepta_tiempo);
         $this->acepta_tiempo = str_replace('>', '&gt;', $this->acepta_tiempo);
         $this->Texto_tag .= "<td>" . $this->acepta_tiempo . "</td>\r\n";
   }
   //----- acepta_tokens
   function NM_export_acepta_tokens()
   {
             nmgp_Form_Num_Val($this->acepta_tokens, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->acepta_tokens = NM_charset_to_utf8($this->acepta_tokens);
         $this->acepta_tokens = str_replace('<', '&lt;', $this->acepta_tokens);
         $this->acepta_tokens = str_replace('>', '&gt;', $this->acepta_tokens);
         $this->Texto_tag .= "<td>" . $this->acepta_tokens . "</td>\r\n";
   }
   //----- dev_ip
   function NM_export_dev_ip()
   {
         $this->dev_ip = html_entity_decode($this->dev_ip, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dev_ip = strip_tags($this->dev_ip);
         $this->dev_ip = NM_charset_to_utf8($this->dev_ip);
         $this->dev_ip = str_replace('<', '&lt;', $this->dev_ip);
         $this->dev_ip = str_replace('>', '&gt;', $this->dev_ip);
         $this->Texto_tag .= "<td>" . $this->dev_ip . "</td>\r\n";
   }
   //----- tipo_dev
   function NM_export_tipo_dev()
   {
             nmgp_Form_Num_Val($this->tipo_dev, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->tipo_dev = NM_charset_to_utf8($this->tipo_dev);
         $this->tipo_dev = str_replace('<', '&lt;', $this->tipo_dev);
         $this->tipo_dev = str_replace('>', '&gt;', $this->tipo_dev);
         $this->Texto_tag .= "<td>" . $this->tipo_dev . "</td>\r\n";
   }
   //----- direccion_torno
   function NM_export_direccion_torno()
   {
             nmgp_Form_Num_Val($this->direccion_torno, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->direccion_torno = NM_charset_to_utf8($this->direccion_torno);
         $this->direccion_torno = str_replace('<', '&lt;', $this->direccion_torno);
         $this->direccion_torno = str_replace('>', '&gt;', $this->direccion_torno);
         $this->Texto_tag .= "<td>" . $this->direccion_torno . "</td>\r\n";
   }
   //----- timeout_rfid
   function NM_export_timeout_rfid()
   {
             nmgp_Form_Num_Val($this->timeout_rfid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->timeout_rfid = NM_charset_to_utf8($this->timeout_rfid);
         $this->timeout_rfid = str_replace('<', '&lt;', $this->timeout_rfid);
         $this->timeout_rfid = str_replace('>', '&gt;', $this->timeout_rfid);
         $this->Texto_tag .= "<td>" . $this->timeout_rfid . "</td>\r\n";
   }
   //----- discapacitado
   function NM_export_discapacitado()
   {
             nmgp_Form_Num_Val($this->discapacitado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->discapacitado = NM_charset_to_utf8($this->discapacitado);
         $this->discapacitado = str_replace('<', '&lt;', $this->discapacitado);
         $this->discapacitado = str_replace('>', '&gt;', $this->discapacitado);
         $this->Texto_tag .= "<td>" . $this->discapacitado . "</td>\r\n";
   }
   //----- numcaja
   function NM_export_numcaja()
   {
             nmgp_Form_Num_Val($this->numcaja, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->numcaja = NM_charset_to_utf8($this->numcaja);
         $this->numcaja = str_replace('<', '&lt;', $this->numcaja);
         $this->numcaja = str_replace('>', '&gt;', $this->numcaja);
         $this->Texto_tag .= "<td>" . $this->numcaja . "</td>\r\n";
   }
   //----- empleado
   function NM_export_empleado()
   {
             nmgp_Form_Num_Val($this->empleado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->empleado = NM_charset_to_utf8($this->empleado);
         $this->empleado = str_replace('<', '&lt;', $this->empleado);
         $this->empleado = str_replace('>', '&gt;', $this->empleado);
         $this->Texto_tag .= "<td>" . $this->empleado . "</td>\r\n";
   }
   //----- tokens
   function NM_export_tokens()
   {
             nmgp_Form_Num_Val($this->tokens, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->tokens = NM_charset_to_utf8($this->tokens);
         $this->tokens = str_replace('<', '&lt;', $this->tokens);
         $this->tokens = str_replace('>', '&gt;', $this->tokens);
         $this->Texto_tag .= "<td>" . $this->tokens . "</td>\r\n";
   }
   //----- serialrfid
   function NM_export_serialrfid()
   {
         $this->serialrfid = html_entity_decode($this->serialrfid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->serialrfid = strip_tags($this->serialrfid);
         $this->serialrfid = NM_charset_to_utf8($this->serialrfid);
         $this->serialrfid = str_replace('<', '&lt;', $this->serialrfid);
         $this->serialrfid = str_replace('>', '&gt;', $this->serialrfid);
         $this->Texto_tag .= "<td>" . $this->serialrfid . "</td>\r\n";
   }
   //----- bidireccion
   function NM_export_bidireccion()
   {
             nmgp_Form_Num_Val($this->bidireccion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->bidireccion = NM_charset_to_utf8($this->bidireccion);
         $this->bidireccion = str_replace('<', '&lt;', $this->bidireccion);
         $this->bidireccion = str_replace('>', '&gt;', $this->bidireccion);
         $this->Texto_tag .= "<td>" . $this->bidireccion . "</td>\r\n";
   }
   //----- cod_devicee
   function NM_export_cod_devicee()
   {
             nmgp_Form_Num_Val($this->cod_devicee, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->cod_devicee = NM_charset_to_utf8($this->cod_devicee);
         $this->cod_devicee = str_replace('<', '&lt;', $this->cod_devicee);
         $this->cod_devicee = str_replace('>', '&gt;', $this->cod_devicee);
         $this->Texto_tag .= "<td>" . $this->cod_devicee . "</td>\r\n";
   }
   //----- url_1
   function NM_export_url_1()
   {
         $this->url_1 = html_entity_decode($this->url_1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->url_1 = strip_tags($this->url_1);
         $this->url_1 = NM_charset_to_utf8($this->url_1);
         $this->url_1 = str_replace('<', '&lt;', $this->url_1);
         $this->url_1 = str_replace('>', '&gt;', $this->url_1);
         $this->Texto_tag .= "<td>" . $this->url_1 . "</td>\r\n";
   }
   //----- url_2
   function NM_export_url_2()
   {
         $this->url_2 = html_entity_decode($this->url_2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->url_2 = strip_tags($this->url_2);
         $this->url_2 = NM_charset_to_utf8($this->url_2);
         $this->url_2 = str_replace('<', '&lt;', $this->url_2);
         $this->url_2 = str_replace('>', '&gt;', $this->url_2);
         $this->Texto_tag .= "<td>" . $this->url_2 . "</td>\r\n";
   }
   //----- url_3
   function NM_export_url_3()
   {
         $this->url_3 = html_entity_decode($this->url_3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->url_3 = strip_tags($this->url_3);
         $this->url_3 = NM_charset_to_utf8($this->url_3);
         $this->url_3 = str_replace('<', '&lt;', $this->url_3);
         $this->url_3 = str_replace('>', '&gt;', $this->url_3);
         $this->Texto_tag .= "<td>" . $this->url_3 . "</td>\r\n";
   }
   //----- foto1
   function NM_export_foto1()
   {
         $this->foto1 = NM_charset_to_utf8($this->foto1);
         $this->foto1 = str_replace('<', '&lt;', $this->foto1);
         $this->foto1 = str_replace('>', '&gt;', $this->foto1);
         $this->Texto_tag .= "<td>" . $this->foto1 . "</td>\r\n";
   }
   //----- foto2
   function NM_export_foto2()
   {
         $this->foto2 = NM_charset_to_utf8($this->foto2);
         $this->foto2 = str_replace('<', '&lt;', $this->foto2);
         $this->foto2 = str_replace('>', '&gt;', $this->foto2);
         $this->Texto_tag .= "<td>" . $this->foto2 . "</td>\r\n";
   }
   //----- foto3
   function NM_export_foto3()
   {
         $this->foto3 = NM_charset_to_utf8($this->foto3);
         $this->foto3 = str_replace('<', '&lt;', $this->foto3);
         $this->foto3 = str_replace('>', '&gt;', $this->foto3);
         $this->Texto_tag .= "<td>" . $this->foto3 . "</td>\r\n";
   }
   //----- pin_relay1
   function NM_export_pin_relay1()
   {
             nmgp_Form_Num_Val($this->pin_relay1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->pin_relay1 = NM_charset_to_utf8($this->pin_relay1);
         $this->pin_relay1 = str_replace('<', '&lt;', $this->pin_relay1);
         $this->pin_relay1 = str_replace('>', '&gt;', $this->pin_relay1);
         $this->Texto_tag .= "<td>" . $this->pin_relay1 . "</td>\r\n";
   }
   //----- pin_relay2
   function NM_export_pin_relay2()
   {
             nmgp_Form_Num_Val($this->pin_relay2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->pin_relay2 = NM_charset_to_utf8($this->pin_relay2);
         $this->pin_relay2 = str_replace('<', '&lt;', $this->pin_relay2);
         $this->pin_relay2 = str_replace('>', '&gt;', $this->pin_relay2);
         $this->Texto_tag .= "<td>" . $this->pin_relay2 . "</td>\r\n";
   }
   //----- rfid_read
   function NM_export_rfid_read()
   {
         $this->rfid_read = html_entity_decode($this->rfid_read, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->rfid_read = strip_tags($this->rfid_read);
         $this->rfid_read = NM_charset_to_utf8($this->rfid_read);
         $this->rfid_read = str_replace('<', '&lt;', $this->rfid_read);
         $this->rfid_read = str_replace('>', '&gt;', $this->rfid_read);
         $this->Texto_tag .= "<td>" . $this->rfid_read . "</td>\r\n";
   }
   //----- rfid_estado
   function NM_export_rfid_estado()
   {
             nmgp_Form_Num_Val($this->rfid_estado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->rfid_estado = NM_charset_to_utf8($this->rfid_estado);
         $this->rfid_estado = str_replace('<', '&lt;', $this->rfid_estado);
         $this->rfid_estado = str_replace('>', '&gt;', $this->rfid_estado);
         $this->Texto_tag .= "<td>" . $this->rfid_estado . "</td>\r\n";
   }
   //----- rfid_fecha
   function NM_export_rfid_fecha()
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
         $this->rfid_fecha = NM_charset_to_utf8($this->rfid_fecha);
         $this->rfid_fecha = str_replace('<', '&lt;', $this->rfid_fecha);
         $this->rfid_fecha = str_replace('>', '&gt;', $this->rfid_fecha);
         $this->Texto_tag .= "<td>" . $this->rfid_fecha . "</td>\r\n";
   }
   //----- url_accion
   function NM_export_url_accion()
   {
         $this->url_accion = html_entity_decode($this->url_accion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->url_accion = strip_tags($this->url_accion);
         $this->url_accion = NM_charset_to_utf8($this->url_accion);
         $this->url_accion = str_replace('<', '&lt;', $this->url_accion);
         $this->url_accion = str_replace('>', '&gt;', $this->url_accion);
         $this->Texto_tag .= "<td>" . $this->url_accion . "</td>\r\n";
   }
   //----- url_atraccion
   function NM_export_url_atraccion()
   {
         $this->url_atraccion = html_entity_decode($this->url_atraccion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->url_atraccion = strip_tags($this->url_atraccion);
         $this->url_atraccion = NM_charset_to_utf8($this->url_atraccion);
         $this->url_atraccion = str_replace('<', '&lt;', $this->url_atraccion);
         $this->url_atraccion = str_replace('>', '&gt;', $this->url_atraccion);
         $this->Texto_tag .= "<td>" . $this->url_atraccion . "</td>\r\n";
   }
   //----- uhfip
   function NM_export_uhfip()
   {
         $this->uhfip = html_entity_decode($this->uhfip, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->uhfip = strip_tags($this->uhfip);
         $this->uhfip = NM_charset_to_utf8($this->uhfip);
         $this->uhfip = str_replace('<', '&lt;', $this->uhfip);
         $this->uhfip = str_replace('>', '&gt;', $this->uhfip);
         $this->Texto_tag .= "<td>" . $this->uhfip . "</td>\r\n";
   }
   //----- url_reader
   function NM_export_url_reader()
   {
         $this->url_reader = html_entity_decode($this->url_reader, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->url_reader = strip_tags($this->url_reader);
         $this->url_reader = NM_charset_to_utf8($this->url_reader);
         $this->url_reader = str_replace('<', '&lt;', $this->url_reader);
         $this->url_reader = str_replace('>', '&gt;', $this->url_reader);
         $this->Texto_tag .= "<td>" . $this->url_reader . "</td>\r\n";
   }
   //----- cod_rfid900
   function NM_export_cod_rfid900()
   {
         $this->cod_rfid900 = html_entity_decode($this->cod_rfid900, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cod_rfid900 = strip_tags($this->cod_rfid900);
         $this->cod_rfid900 = NM_charset_to_utf8($this->cod_rfid900);
         $this->cod_rfid900 = str_replace('<', '&lt;', $this->cod_rfid900);
         $this->cod_rfid900 = str_replace('>', '&gt;', $this->cod_rfid900);
         $this->Texto_tag .= "<td>" . $this->cod_rfid900 . "</td>\r\n";
   }
   //----- mensaje
   function NM_export_mensaje()
   {
         $this->mensaje = html_entity_decode($this->mensaje, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->mensaje = strip_tags($this->mensaje);
         $this->mensaje = NM_charset_to_utf8($this->mensaje);
         $this->mensaje = str_replace('<', '&lt;', $this->mensaje);
         $this->mensaje = str_replace('>', '&gt;', $this->mensaje);
         $this->Texto_tag .= "<td>" . $this->mensaje . "</td>\r\n";
   }
   //----- tipolector
   function NM_export_tipolector()
   {
         $this->tipolector = html_entity_decode($this->tipolector, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipolector = strip_tags($this->tipolector);
         $this->tipolector = NM_charset_to_utf8($this->tipolector);
         $this->tipolector = str_replace('<', '&lt;', $this->tipolector);
         $this->tipolector = str_replace('>', '&gt;', $this->tipolector);
         $this->Texto_tag .= "<td>" . $this->tipolector . "</td>\r\n";
   }
   //----- url_accion_bg
   function NM_export_url_accion_bg()
   {
         $this->url_accion_bg = html_entity_decode($this->url_accion_bg, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->url_accion_bg = strip_tags($this->url_accion_bg);
         $this->url_accion_bg = NM_charset_to_utf8($this->url_accion_bg);
         $this->url_accion_bg = str_replace('<', '&lt;', $this->url_accion_bg);
         $this->url_accion_bg = str_replace('>', '&gt;', $this->url_accion_bg);
         $this->Texto_tag .= "<td>" . $this->url_accion_bg . "</td>\r\n";
   }
   //----- url_inicio
   function NM_export_url_inicio()
   {
         $this->url_inicio = html_entity_decode($this->url_inicio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->url_inicio = strip_tags($this->url_inicio);
         $this->url_inicio = NM_charset_to_utf8($this->url_inicio);
         $this->url_inicio = str_replace('<', '&lt;', $this->url_inicio);
         $this->url_inicio = str_replace('>', '&gt;', $this->url_inicio);
         $this->Texto_tag .= "<td>" . $this->url_inicio . "</td>\r\n";
   }
   //----- lasteffect
   function NM_export_lasteffect()
   {
         $this->lasteffect = html_entity_decode($this->lasteffect, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->lasteffect = strip_tags($this->lasteffect);
         $this->lasteffect = NM_charset_to_utf8($this->lasteffect);
         $this->lasteffect = str_replace('<', '&lt;', $this->lasteffect);
         $this->lasteffect = str_replace('>', '&gt;', $this->lasteffect);
         $this->Texto_tag .= "<td>" . $this->lasteffect . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_devices_leds'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> devices :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_devices_leds_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_devices_leds"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
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