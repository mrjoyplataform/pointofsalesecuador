<?php

class grid_xml_compras_hdr_pendientes_rtf
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
                   nm_limpa_str_grid_xml_compras_hdr_pendientes($cadapar[1]);
                   nm_protect_num_grid_xml_compras_hdr_pendientes($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_xml_compras_hdr_pendientes']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gidfile)) 
      {
          $_SESSION['gidfile'] = $gidfile;
          nm_limpa_str_grid_xml_compras_hdr_pendientes($_SESSION["gidfile"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_xml_compras_hdr_pendientes_total.class.php"); 
      $this->Tot      = new grid_xml_compras_hdr_pendientes_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['SC_Ind_Groupby'] == "identificacionComprador")
          {
              $this->sum_totalsinimpuestos = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['tot_geral'][2];
              $this->sum_importetotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['tot_geral'][3];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_xml_compras_hdr_pendientes']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_xml_compras_hdr_pendientes";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_xml_compras_hdr_pendientes.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_xml_compras_hdr_pendientes']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_xml_compras_hdr_pendientes']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_xml_compras_hdr_pendientes']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->nombrecomercial = $Busca_temp['nombrecomercial']; 
          $tmp_pos = strpos($this->nombrecomercial, "##@@");
          if ($tmp_pos !== false && !is_array($this->nombrecomercial))
          {
              $this->nombrecomercial = substr($this->nombrecomercial, 0, $tmp_pos);
          }
          $this->ambiente = $Busca_temp['ambiente']; 
          $tmp_pos = strpos($this->ambiente, "##@@");
          if ($tmp_pos !== false && !is_array($this->ambiente))
          {
              $this->ambiente = substr($this->ambiente, 0, $tmp_pos);
          }
          $this->tipoemision = $Busca_temp['tipoemision']; 
          $tmp_pos = strpos($this->tipoemision, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipoemision))
          {
              $this->tipoemision = substr($this->tipoemision, 0, $tmp_pos);
          }
          $this->razonsocial = $Busca_temp['razonsocial']; 
          $tmp_pos = strpos($this->razonsocial, "##@@");
          if ($tmp_pos !== false && !is_array($this->razonsocial))
          {
              $this->razonsocial = substr($this->razonsocial, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['tipodoc'])) ? $this->New_label['tipodoc'] : "Tipodoc"; 
          if ($Cada_col == "tipodoc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Documento"; 
          if ($Cada_col == "documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codigobarras'])) ? $this->New_label['codigobarras'] : ""; 
          if ($Cada_col == "codigobarras" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['claveacceso'])) ? $this->New_label['claveacceso'] : "Clave Acceso"; 
          if ($Cada_col == "claveacceso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['totalsinimpuestos'])) ? $this->New_label['totalsinimpuestos'] : "Total Sin Impuestos"; 
          if ($Cada_col == "totalsinimpuestos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['importetotal'])) ? $this->New_label['importetotal'] : "Importe Total"; 
          if ($Cada_col == "importetotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ruc'])) ? $this->New_label['ruc'] : "Ruc"; 
          if ($Cada_col == "ruc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['razonsocial'])) ? $this->New_label['razonsocial'] : "Razon Social"; 
          if ($Cada_col == "razonsocial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechaemision'])) ? $this->New_label['fechaemision'] : "Fecha Emision"; 
          if ($Cada_col == "fechaemision" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dirmatriz'])) ? $this->New_label['dirmatriz'] : "Dir Matriz"; 
          if ($Cada_col == "dirmatriz" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idfile'])) ? $this->New_label['idfile'] : "Idfile"; 
          if ($Cada_col == "idfile" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['txtline'])) ? $this->New_label['txtline'] : "Txtline"; 
          if ($Cada_col == "txtline" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ambiente'])) ? $this->New_label['ambiente'] : "Ambiente"; 
          if ($Cada_col == "ambiente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipoemision'])) ? $this->New_label['tipoemision'] : "Tipo Emision"; 
          if ($Cada_col == "tipoemision" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombrecomercial'])) ? $this->New_label['nombrecomercial'] : "Nombre Comercial"; 
          if ($Cada_col == "nombrecomercial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['coddoc'])) ? $this->New_label['coddoc'] : "Cod Doc"; 
          if ($Cada_col == "coddoc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estab'])) ? $this->New_label['estab'] : "Estab"; 
          if ($Cada_col == "estab" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ptoemi'])) ? $this->New_label['ptoemi'] : "Pto Emi"; 
          if ($Cada_col == "ptoemi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['secuencial'])) ? $this->New_label['secuencial'] : "Secuencial"; 
          if ($Cada_col == "secuencial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direstablecimiento'])) ? $this->New_label['direstablecimiento'] : "Dir Establecimiento"; 
          if ($Cada_col == "direstablecimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['obligadocontabilidad'])) ? $this->New_label['obligadocontabilidad'] : "Obligado Contabilidad"; 
          if ($Cada_col == "obligadocontabilidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipoidentificacioncomprador'])) ? $this->New_label['tipoidentificacioncomprador'] : "Tipo Identificacion Comprador"; 
          if ($Cada_col == "tipoidentificacioncomprador" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['razonsocialcomprador'])) ? $this->New_label['razonsocialcomprador'] : "Razon Social Comprador"; 
          if ($Cada_col == "razonsocialcomprador" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['identificacioncomprador'])) ? $this->New_label['identificacioncomprador'] : "Identificacion Comprador"; 
          if ($Cada_col == "identificacioncomprador" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['totaldescuento'])) ? $this->New_label['totaldescuento'] : "Total Descuento"; 
          if ($Cada_col == "totaldescuento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['totalconimpuestos'])) ? $this->New_label['totalconimpuestos'] : "Total Con Impuestos"; 
          if ($Cada_col == "totalconimpuestos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['propina'])) ? $this->New_label['propina'] : "Propina"; 
          if ($Cada_col == "propina" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['moneda'])) ? $this->New_label['moneda'] : "Moneda"; 
          if ($Cada_col == "moneda" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecharegistro'])) ? $this->New_label['fecharegistro'] : "Fecharegistro"; 
          if ($Cada_col == "fecharegistro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT tipodoc, concat(estab,'-',ptoEmi,'-',secuencial) as documento, claveAcceso as codigobarras, claveAcceso, totalSinImpuestos, importeTotal, ruc, razonSocial, str_replace (convert(char(10),fechaEmision,102), '.', '-') + ' ' + convert(char(8),fechaEmision,20), dirMatriz, idfile, estado, txtline, ambiente, tipoEmision, nombreComercial, codDoc, estab, ptoEmi, secuencial, dirEstablecimiento, obligadoContabilidad, tipoIdentificacionComprador, razonSocialComprador, identificacionComprador, totalDescuento, totalConImpuestos, propina, moneda, fecharegistro from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tipodoc, concat(estab,'-',ptoEmi,'-',secuencial) as documento, claveAcceso as codigobarras, claveAcceso, totalSinImpuestos, importeTotal, ruc, razonSocial, fechaEmision, dirMatriz, idfile, estado, txtline, ambiente, tipoEmision, nombreComercial, codDoc, estab, ptoEmi, secuencial, dirEstablecimiento, obligadoContabilidad, tipoIdentificacionComprador, razonSocialComprador, identificacionComprador, totalDescuento, totalConImpuestos, propina, moneda, fecharegistro from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT tipodoc, concat(estab,'-',ptoEmi,'-',secuencial) as documento, claveAcceso as codigobarras, claveAcceso, totalSinImpuestos, importeTotal, ruc, razonSocial, convert(char(23),fechaEmision,121), dirMatriz, idfile, estado, txtline, ambiente, tipoEmision, nombreComercial, codDoc, estab, ptoEmi, secuencial, dirEstablecimiento, obligadoContabilidad, tipoIdentificacionComprador, razonSocialComprador, identificacionComprador, totalDescuento, totalConImpuestos, propina, moneda, fecharegistro from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tipodoc, concat(estab,'-',ptoEmi,'-',secuencial) as documento, claveAcceso as codigobarras, claveAcceso, totalSinImpuestos, importeTotal, ruc, razonSocial, fechaEmision, dirMatriz, idfile, estado, txtline, ambiente, tipoEmision, nombreComercial, codDoc, estab, ptoEmi, secuencial, dirEstablecimiento, obligadoContabilidad, tipoIdentificacionComprador, razonSocialComprador, identificacionComprador, totalDescuento, totalConImpuestos, propina, moneda, TO_DATE(TO_CHAR(fecharegistro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss') from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT tipodoc, concat(estab,'-',ptoEmi,'-',secuencial) as documento, claveAcceso as codigobarras, claveAcceso, totalSinImpuestos, importeTotal, ruc, razonSocial, EXTEND(fechaEmision, YEAR TO DAY), dirMatriz, idfile, estado, txtline, ambiente, tipoEmision, nombreComercial, codDoc, estab, ptoEmi, secuencial, dirEstablecimiento, obligadoContabilidad, tipoIdentificacionComprador, razonSocialComprador, identificacionComprador, totalDescuento, totalConImpuestos, propina, moneda, fecharegistro from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT tipodoc, concat(estab,'-',ptoEmi,'-',secuencial) as documento, claveAcceso as codigobarras, claveAcceso, totalSinImpuestos, importeTotal, ruc, razonSocial, fechaEmision, dirMatriz, idfile, estado, txtline, ambiente, tipoEmision, nombreComercial, codDoc, estab, ptoEmi, secuencial, dirEstablecimiento, obligadoContabilidad, tipoIdentificacionComprador, razonSocialComprador, identificacionComprador, totalDescuento, totalConImpuestos, propina, moneda, fecharegistro from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['order_grid'];
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
         $this->tipodoc = $rs->fields[0] ;  
         $this->documento = $rs->fields[1] ;  
         $this->codigobarras = $rs->fields[2] ;  
         $this->claveacceso = $rs->fields[3] ;  
         $this->totalsinimpuestos = $rs->fields[4] ;  
         $this->totalsinimpuestos =  str_replace(",", ".", $this->totalsinimpuestos);
         $this->totalsinimpuestos = (string)$this->totalsinimpuestos;
         $this->importetotal = $rs->fields[5] ;  
         $this->importetotal =  str_replace(",", ".", $this->importetotal);
         $this->importetotal = (string)$this->importetotal;
         $this->ruc = $rs->fields[6] ;  
         $this->razonsocial = $rs->fields[7] ;  
         $this->fechaemision = $rs->fields[8] ;  
         $this->dirmatriz = $rs->fields[9] ;  
         $this->idfile = $rs->fields[10] ;  
         $this->idfile = (string)$this->idfile;
         $this->estado = $rs->fields[11] ;  
         $this->estado = (string)$this->estado;
         $this->txtline = $rs->fields[12] ;  
         $this->ambiente = $rs->fields[13] ;  
         $this->tipoemision = $rs->fields[14] ;  
         $this->nombrecomercial = $rs->fields[15] ;  
         $this->coddoc = $rs->fields[16] ;  
         $this->estab = $rs->fields[17] ;  
         $this->ptoemi = $rs->fields[18] ;  
         $this->secuencial = $rs->fields[19] ;  
         $this->direstablecimiento = $rs->fields[20] ;  
         $this->obligadocontabilidad = $rs->fields[21] ;  
         $this->tipoidentificacioncomprador = $rs->fields[22] ;  
         $this->razonsocialcomprador = $rs->fields[23] ;  
         $this->identificacioncomprador = $rs->fields[24] ;  
         $this->totaldescuento = $rs->fields[25] ;  
         $this->totaldescuento =  str_replace(",", ".", $this->totaldescuento);
         $this->totaldescuento = (string)$this->totaldescuento;
         $this->totalconimpuestos = $rs->fields[26] ;  
         $this->totalconimpuestos =  str_replace(",", ".", $this->totalconimpuestos);
         $this->totalconimpuestos = (string)$this->totalconimpuestos;
         $this->propina = $rs->fields[27] ;  
         $this->propina =  str_replace(",", ".", $this->propina);
         $this->propina = (string)$this->propina;
         $this->moneda = $rs->fields[28] ;  
         $this->fecharegistro = $rs->fields[29] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- tipodoc
   function NM_export_tipodoc()
   {
         $this->tipodoc = html_entity_decode($this->tipodoc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipodoc = strip_tags($this->tipodoc);
         $this->tipodoc = NM_charset_to_utf8($this->tipodoc);
         $this->tipodoc = str_replace('<', '&lt;', $this->tipodoc);
         $this->tipodoc = str_replace('>', '&gt;', $this->tipodoc);
         $this->Texto_tag .= "<td>" . $this->tipodoc . "</td>\r\n";
   }
   //----- documento
   function NM_export_documento()
   {
         $this->documento = html_entity_decode($this->documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->documento = strip_tags($this->documento);
         $this->documento = NM_charset_to_utf8($this->documento);
         $this->documento = str_replace('<', '&lt;', $this->documento);
         $this->documento = str_replace('>', '&gt;', $this->documento);
         $this->Texto_tag .= "<td>" . $this->documento . "</td>\r\n";
   }
   //----- codigobarras
   function NM_export_codigobarras()
   {
         $this->codigobarras = NM_charset_to_utf8($this->codigobarras);
         $this->codigobarras = str_replace('<', '&lt;', $this->codigobarras);
         $this->codigobarras = str_replace('>', '&gt;', $this->codigobarras);
         $this->Texto_tag .= "<td>" . $this->codigobarras . "</td>\r\n";
   }
   //----- claveacceso
   function NM_export_claveacceso()
   {
         $this->claveacceso = html_entity_decode($this->claveacceso, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->claveacceso = strip_tags($this->claveacceso);
         $this->claveacceso = NM_charset_to_utf8($this->claveacceso);
         $this->claveacceso = str_replace('<', '&lt;', $this->claveacceso);
         $this->claveacceso = str_replace('>', '&gt;', $this->claveacceso);
         $this->Texto_tag .= "<td>" . $this->claveacceso . "</td>\r\n";
   }
   //----- totalsinimpuestos
   function NM_export_totalsinimpuestos()
   {
             nmgp_Form_Num_Val($this->totalsinimpuestos, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->totalsinimpuestos = NM_charset_to_utf8($this->totalsinimpuestos);
         $this->totalsinimpuestos = str_replace('<', '&lt;', $this->totalsinimpuestos);
         $this->totalsinimpuestos = str_replace('>', '&gt;', $this->totalsinimpuestos);
         $this->Texto_tag .= "<td>" . $this->totalsinimpuestos . "</td>\r\n";
   }
   //----- importetotal
   function NM_export_importetotal()
   {
             nmgp_Form_Num_Val($this->importetotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->importetotal = NM_charset_to_utf8($this->importetotal);
         $this->importetotal = str_replace('<', '&lt;', $this->importetotal);
         $this->importetotal = str_replace('>', '&gt;', $this->importetotal);
         $this->Texto_tag .= "<td>" . $this->importetotal . "</td>\r\n";
   }
   //----- ruc
   function NM_export_ruc()
   {
         $this->ruc = html_entity_decode($this->ruc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ruc = strip_tags($this->ruc);
         $this->ruc = NM_charset_to_utf8($this->ruc);
         $this->ruc = str_replace('<', '&lt;', $this->ruc);
         $this->ruc = str_replace('>', '&gt;', $this->ruc);
         $this->Texto_tag .= "<td>" . $this->ruc . "</td>\r\n";
   }
   //----- razonsocial
   function NM_export_razonsocial()
   {
         $this->razonsocial = html_entity_decode($this->razonsocial, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->razonsocial = strip_tags($this->razonsocial);
         $this->razonsocial = NM_charset_to_utf8($this->razonsocial);
         $this->razonsocial = str_replace('<', '&lt;', $this->razonsocial);
         $this->razonsocial = str_replace('>', '&gt;', $this->razonsocial);
         $this->Texto_tag .= "<td>" . $this->razonsocial . "</td>\r\n";
   }
   //----- fechaemision
   function NM_export_fechaemision()
   {
             $conteudo_x =  $this->fechaemision;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaemision, "YYYY-MM-DD  ");
                 $this->fechaemision = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fechaemision = NM_charset_to_utf8($this->fechaemision);
         $this->fechaemision = str_replace('<', '&lt;', $this->fechaemision);
         $this->fechaemision = str_replace('>', '&gt;', $this->fechaemision);
         $this->Texto_tag .= "<td>" . $this->fechaemision . "</td>\r\n";
   }
   //----- dirmatriz
   function NM_export_dirmatriz()
   {
         $this->dirmatriz = html_entity_decode($this->dirmatriz, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->dirmatriz = strip_tags($this->dirmatriz);
         $this->dirmatriz = NM_charset_to_utf8($this->dirmatriz);
         $this->dirmatriz = str_replace('<', '&lt;', $this->dirmatriz);
         $this->dirmatriz = str_replace('>', '&gt;', $this->dirmatriz);
         $this->Texto_tag .= "<td>" . $this->dirmatriz . "</td>\r\n";
   }
   //----- idfile
   function NM_export_idfile()
   {
             nmgp_Form_Num_Val($this->idfile, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idfile = NM_charset_to_utf8($this->idfile);
         $this->idfile = str_replace('<', '&lt;', $this->idfile);
         $this->idfile = str_replace('>', '&gt;', $this->idfile);
         $this->Texto_tag .= "<td>" . $this->idfile . "</td>\r\n";
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
   //----- txtline
   function NM_export_txtline()
   {
         $this->txtline = html_entity_decode($this->txtline, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->txtline = strip_tags($this->txtline);
         $this->txtline = NM_charset_to_utf8($this->txtline);
         $this->txtline = str_replace('<', '&lt;', $this->txtline);
         $this->txtline = str_replace('>', '&gt;', $this->txtline);
         $this->Texto_tag .= "<td>" . $this->txtline . "</td>\r\n";
   }
   //----- ambiente
   function NM_export_ambiente()
   {
         $this->ambiente = html_entity_decode($this->ambiente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ambiente = strip_tags($this->ambiente);
         $this->ambiente = NM_charset_to_utf8($this->ambiente);
         $this->ambiente = str_replace('<', '&lt;', $this->ambiente);
         $this->ambiente = str_replace('>', '&gt;', $this->ambiente);
         $this->Texto_tag .= "<td>" . $this->ambiente . "</td>\r\n";
   }
   //----- tipoemision
   function NM_export_tipoemision()
   {
         $this->tipoemision = html_entity_decode($this->tipoemision, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipoemision = strip_tags($this->tipoemision);
         $this->tipoemision = NM_charset_to_utf8($this->tipoemision);
         $this->tipoemision = str_replace('<', '&lt;', $this->tipoemision);
         $this->tipoemision = str_replace('>', '&gt;', $this->tipoemision);
         $this->Texto_tag .= "<td>" . $this->tipoemision . "</td>\r\n";
   }
   //----- nombrecomercial
   function NM_export_nombrecomercial()
   {
         $this->nombrecomercial = html_entity_decode($this->nombrecomercial, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombrecomercial = strip_tags($this->nombrecomercial);
         $this->nombrecomercial = NM_charset_to_utf8($this->nombrecomercial);
         $this->nombrecomercial = str_replace('<', '&lt;', $this->nombrecomercial);
         $this->nombrecomercial = str_replace('>', '&gt;', $this->nombrecomercial);
         $this->Texto_tag .= "<td>" . $this->nombrecomercial . "</td>\r\n";
   }
   //----- coddoc
   function NM_export_coddoc()
   {
         $this->coddoc = html_entity_decode($this->coddoc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->coddoc = strip_tags($this->coddoc);
         $this->coddoc = NM_charset_to_utf8($this->coddoc);
         $this->coddoc = str_replace('<', '&lt;', $this->coddoc);
         $this->coddoc = str_replace('>', '&gt;', $this->coddoc);
         $this->Texto_tag .= "<td>" . $this->coddoc . "</td>\r\n";
   }
   //----- estab
   function NM_export_estab()
   {
         $this->estab = html_entity_decode($this->estab, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->estab = strip_tags($this->estab);
         $this->estab = NM_charset_to_utf8($this->estab);
         $this->estab = str_replace('<', '&lt;', $this->estab);
         $this->estab = str_replace('>', '&gt;', $this->estab);
         $this->Texto_tag .= "<td>" . $this->estab . "</td>\r\n";
   }
   //----- ptoemi
   function NM_export_ptoemi()
   {
         $this->ptoemi = html_entity_decode($this->ptoemi, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ptoemi = strip_tags($this->ptoemi);
         $this->ptoemi = NM_charset_to_utf8($this->ptoemi);
         $this->ptoemi = str_replace('<', '&lt;', $this->ptoemi);
         $this->ptoemi = str_replace('>', '&gt;', $this->ptoemi);
         $this->Texto_tag .= "<td>" . $this->ptoemi . "</td>\r\n";
   }
   //----- secuencial
   function NM_export_secuencial()
   {
         $this->secuencial = html_entity_decode($this->secuencial, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->secuencial = strip_tags($this->secuencial);
         $this->secuencial = NM_charset_to_utf8($this->secuencial);
         $this->secuencial = str_replace('<', '&lt;', $this->secuencial);
         $this->secuencial = str_replace('>', '&gt;', $this->secuencial);
         $this->Texto_tag .= "<td>" . $this->secuencial . "</td>\r\n";
   }
   //----- direstablecimiento
   function NM_export_direstablecimiento()
   {
         $this->direstablecimiento = html_entity_decode($this->direstablecimiento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->direstablecimiento = strip_tags($this->direstablecimiento);
         $this->direstablecimiento = NM_charset_to_utf8($this->direstablecimiento);
         $this->direstablecimiento = str_replace('<', '&lt;', $this->direstablecimiento);
         $this->direstablecimiento = str_replace('>', '&gt;', $this->direstablecimiento);
         $this->Texto_tag .= "<td>" . $this->direstablecimiento . "</td>\r\n";
   }
   //----- obligadocontabilidad
   function NM_export_obligadocontabilidad()
   {
         $this->obligadocontabilidad = html_entity_decode($this->obligadocontabilidad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->obligadocontabilidad = strip_tags($this->obligadocontabilidad);
         $this->obligadocontabilidad = NM_charset_to_utf8($this->obligadocontabilidad);
         $this->obligadocontabilidad = str_replace('<', '&lt;', $this->obligadocontabilidad);
         $this->obligadocontabilidad = str_replace('>', '&gt;', $this->obligadocontabilidad);
         $this->Texto_tag .= "<td>" . $this->obligadocontabilidad . "</td>\r\n";
   }
   //----- tipoidentificacioncomprador
   function NM_export_tipoidentificacioncomprador()
   {
         $this->tipoidentificacioncomprador = html_entity_decode($this->tipoidentificacioncomprador, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipoidentificacioncomprador = strip_tags($this->tipoidentificacioncomprador);
         $this->tipoidentificacioncomprador = NM_charset_to_utf8($this->tipoidentificacioncomprador);
         $this->tipoidentificacioncomprador = str_replace('<', '&lt;', $this->tipoidentificacioncomprador);
         $this->tipoidentificacioncomprador = str_replace('>', '&gt;', $this->tipoidentificacioncomprador);
         $this->Texto_tag .= "<td>" . $this->tipoidentificacioncomprador . "</td>\r\n";
   }
   //----- razonsocialcomprador
   function NM_export_razonsocialcomprador()
   {
         $this->razonsocialcomprador = html_entity_decode($this->razonsocialcomprador, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->razonsocialcomprador = strip_tags($this->razonsocialcomprador);
         $this->razonsocialcomprador = NM_charset_to_utf8($this->razonsocialcomprador);
         $this->razonsocialcomprador = str_replace('<', '&lt;', $this->razonsocialcomprador);
         $this->razonsocialcomprador = str_replace('>', '&gt;', $this->razonsocialcomprador);
         $this->Texto_tag .= "<td>" . $this->razonsocialcomprador . "</td>\r\n";
   }
   //----- identificacioncomprador
   function NM_export_identificacioncomprador()
   {
         $this->identificacioncomprador = html_entity_decode($this->identificacioncomprador, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->identificacioncomprador = strip_tags($this->identificacioncomprador);
         $this->identificacioncomprador = NM_charset_to_utf8($this->identificacioncomprador);
         $this->identificacioncomprador = str_replace('<', '&lt;', $this->identificacioncomprador);
         $this->identificacioncomprador = str_replace('>', '&gt;', $this->identificacioncomprador);
         $this->Texto_tag .= "<td>" . $this->identificacioncomprador . "</td>\r\n";
   }
   //----- totaldescuento
   function NM_export_totaldescuento()
   {
             nmgp_Form_Num_Val($this->totaldescuento, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->totaldescuento = NM_charset_to_utf8($this->totaldescuento);
         $this->totaldescuento = str_replace('<', '&lt;', $this->totaldescuento);
         $this->totaldescuento = str_replace('>', '&gt;', $this->totaldescuento);
         $this->Texto_tag .= "<td>" . $this->totaldescuento . "</td>\r\n";
   }
   //----- totalconimpuestos
   function NM_export_totalconimpuestos()
   {
             nmgp_Form_Num_Val($this->totalconimpuestos, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->totalconimpuestos = NM_charset_to_utf8($this->totalconimpuestos);
         $this->totalconimpuestos = str_replace('<', '&lt;', $this->totalconimpuestos);
         $this->totalconimpuestos = str_replace('>', '&gt;', $this->totalconimpuestos);
         $this->Texto_tag .= "<td>" . $this->totalconimpuestos . "</td>\r\n";
   }
   //----- propina
   function NM_export_propina()
   {
             nmgp_Form_Num_Val($this->propina, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->propina = NM_charset_to_utf8($this->propina);
         $this->propina = str_replace('<', '&lt;', $this->propina);
         $this->propina = str_replace('>', '&gt;', $this->propina);
         $this->Texto_tag .= "<td>" . $this->propina . "</td>\r\n";
   }
   //----- moneda
   function NM_export_moneda()
   {
         $this->moneda = html_entity_decode($this->moneda, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->moneda = strip_tags($this->moneda);
         $this->moneda = NM_charset_to_utf8($this->moneda);
         $this->moneda = str_replace('<', '&lt;', $this->moneda);
         $this->moneda = str_replace('>', '&gt;', $this->moneda);
         $this->Texto_tag .= "<td>" . $this->moneda . "</td>\r\n";
   }
   //----- fecharegistro
   function NM_export_fecharegistro()
   {
             if (substr($this->fecharegistro, 10, 1) == "-") 
             { 
                 $this->fecharegistro = substr($this->fecharegistro, 0, 10) . " " . substr($this->fecharegistro, 11);
             } 
             if (substr($this->fecharegistro, 13, 1) == ".") 
             { 
                $this->fecharegistro = substr($this->fecharegistro, 0, 13) . ":" . substr($this->fecharegistro, 14, 2) . ":" . substr($this->fecharegistro, 17);
             } 
             $conteudo_x =  $this->fecharegistro;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecharegistro, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecharegistro = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecharegistro = NM_charset_to_utf8($this->fecharegistro);
         $this->fecharegistro = str_replace('<', '&lt;', $this->fecharegistro);
         $this->fecharegistro = str_replace('>', '&gt;', $this->fecharegistro);
         $this->Texto_tag .= "<td>" . $this->fecharegistro . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_xml_compras_hdr_pendientes'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> xml_compras_hdr :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_xml_compras_hdr_pendientes_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_xml_compras_hdr_pendientes"> 
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
function eliminar_acentos($cadena)
{
$_SESSION['scriptcase']['grid_xml_compras_hdr_pendientes']['contr_erro'] = 'on';
  
		
		$cadena = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$cadena
		);

		$cadena = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$cadena );

		$cadena = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$cadena );

		$cadena = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$cadena );

		$cadena = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$cadena );

		$cadena = str_replace(
		array('Ñ', 'ñ', 'Ç', 'ç'),
		array('N', 'n', 'C', 'c'),
		$cadena
		);
		
		return $cadena;
	


$_SESSION['scriptcase']['grid_xml_compras_hdr_pendientes']['contr_erro'] = 'off';
}
}

?>
