<?php

class grid_customer_clubmrjoy_afiliacion_rtf
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
                   nm_limpa_str_grid_customer_clubmrjoy_afiliacion($cadapar[1]);
                   nm_protect_num_grid_customer_clubmrjoy_afiliacion($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_customer_clubmrjoy_afiliacion']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_customer_clubmrjoy_afiliacion_total.class.php"); 
      $this->Tot      = new grid_customer_clubmrjoy_afiliacion_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_customer_clubmrjoy_afiliacion']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_customer_clubmrjoy_afiliacion";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_customer_clubmrjoy_afiliacion.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_customer_clubmrjoy_afiliacion']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_customer_clubmrjoy_afiliacion']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_customer_clubmrjoy_afiliacion']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha3 = $Busca_temp['fecha3']; 
          $tmp_pos = strpos($this->fecha3, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha3))
          {
              $this->fecha3 = substr($this->fecha3, 0, $tmp_pos);
          }
          $this->idreg = $Busca_temp['idreg']; 
          $tmp_pos = strpos($this->idreg, "##@@");
          if ($tmp_pos !== false && !is_array($this->idreg))
          {
              $this->idreg = substr($this->idreg, 0, $tmp_pos);
          }
          $this->idcustomer = $Busca_temp['idcustomer']; 
          $tmp_pos = strpos($this->idcustomer, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcustomer))
          {
              $this->idcustomer = substr($this->idcustomer, 0, $tmp_pos);
          }
          $this->nombre = $Busca_temp['nombre']; 
          $tmp_pos = strpos($this->nombre, "##@@");
          if ($tmp_pos !== false && !is_array($this->nombre))
          {
              $this->nombre = substr($this->nombre, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['idreg'])) ? $this->New_label['idreg'] : "Idreg"; 
          if ($Cada_col == "idreg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idcustomer'])) ? $this->New_label['idcustomer'] : "Idcustomer"; 
          if ($Cada_col == "idcustomer" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre'])) ? $this->New_label['nombre'] : "Nombre"; 
          if ($Cada_col == "nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['correo'])) ? $this->New_label['correo'] : "Correo"; 
          if ($Cada_col == "correo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['celular'])) ? $this->New_label['celular'] : "Celular"; 
          if ($Cada_col == "celular" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idinterno'])) ? $this->New_label['idinterno'] : "Idinterno"; 
          if ($Cada_col == "idinterno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "Direccion"; 
          if ($Cada_col == "direccion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipodoc'])) ? $this->New_label['tipodoc'] : "Tipodoc"; 
          if ($Cada_col == "tipodoc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['local_centro'])) ? $this->New_label['local_centro'] : "Local Centro"; 
          if ($Cada_col == "local_centro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['afiliado_desde'])) ? $this->New_label['afiliado_desde'] : "Afiliado Desde"; 
          if ($Cada_col == "afiliado_desde" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sector'])) ? $this->New_label['sector'] : "Sector"; 
          if ($Cada_col == "sector" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['uniqueid'])) ? $this->New_label['uniqueid'] : "Uniqueid"; 
          if ($Cada_col == "uniqueid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ciudad'])) ? $this->New_label['ciudad'] : "Ciudad"; 
          if ($Cada_col == "ciudad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pais'])) ? $this->New_label['pais'] : "Pais"; 
          if ($Cada_col == "pais" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha1'])) ? $this->New_label['fecha1'] : "Fecha 1"; 
          if ($Cada_col == "fecha1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha2'])) ? $this->New_label['fecha2'] : "Fecha 2"; 
          if ($Cada_col == "fecha2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha3'])) ? $this->New_label['fecha3'] : "Fecha 3"; 
          if ($Cada_col == "fecha3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cliente_tipo'])) ? $this->New_label['cliente_tipo'] : "Cliente Tipo"; 
          if ($Cada_col == "cliente_tipo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT idreg, idcustomer, nombre, correo, celular, idinterno, direccion, tipodoc, ult_fecha, local_centro, str_replace (convert(char(10),afiliado_desde,102), '.', '-') + ' ' + convert(char(8),afiliado_desde,20), sector, estado, uniqueid, ciudad, pais, fecha1, fecha2, fecha3, cliente_tipo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idreg, idcustomer, nombre, correo, celular, idinterno, direccion, tipodoc, ult_fecha, local_centro, afiliado_desde, sector, estado, uniqueid, ciudad, pais, fecha1, fecha2, fecha3, cliente_tipo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT idreg, idcustomer, nombre, correo, celular, idinterno, direccion, tipodoc, ult_fecha, local_centro, convert(char(23),afiliado_desde,121), sector, estado, uniqueid, ciudad, pais, fecha1, fecha2, fecha3, cliente_tipo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idreg, idcustomer, nombre, correo, celular, idinterno, direccion, tipodoc, ult_fecha, local_centro, afiliado_desde, sector, estado, uniqueid, ciudad, pais, fecha1, fecha2, fecha3, cliente_tipo from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idreg, idcustomer, nombre, correo, celular, idinterno, direccion, tipodoc, ult_fecha, local_centro, EXTEND(afiliado_desde, YEAR TO DAY), sector, estado, uniqueid, ciudad, pais, fecha1, fecha2, fecha3, cliente_tipo from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idreg, idcustomer, nombre, correo, celular, idinterno, direccion, tipodoc, ult_fecha, local_centro, afiliado_desde, sector, estado, uniqueid, ciudad, pais, fecha1, fecha2, fecha3, cliente_tipo from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['order_grid'];
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
         $this->idreg = $rs->fields[0] ;  
         $this->idreg = (string)$this->idreg;
         $this->idcustomer = $rs->fields[1] ;  
         $this->nombre = $rs->fields[2] ;  
         $this->correo = $rs->fields[3] ;  
         $this->celular = $rs->fields[4] ;  
         $this->idinterno = $rs->fields[5] ;  
         $this->direccion = $rs->fields[6] ;  
         $this->tipodoc = $rs->fields[7] ;  
         $this->ult_fecha = $rs->fields[8] ;  
         $this->local_centro = $rs->fields[9] ;  
         $this->afiliado_desde = $rs->fields[10] ;  
         $this->sector = $rs->fields[11] ;  
         $this->estado = $rs->fields[12] ;  
         $this->estado = (string)$this->estado;
         $this->uniqueid = $rs->fields[13] ;  
         $this->ciudad = $rs->fields[14] ;  
         $this->pais = $rs->fields[15] ;  
         $this->fecha1 = $rs->fields[16] ;  
         $this->fecha2 = $rs->fields[17] ;  
         $this->fecha3 = $rs->fields[18] ;  
         $this->cliente_tipo = $rs->fields[19] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- idreg
   function NM_export_idreg()
   {
             nmgp_Form_Num_Val($this->idreg, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idreg = NM_charset_to_utf8($this->idreg);
         $this->idreg = str_replace('<', '&lt;', $this->idreg);
         $this->idreg = str_replace('>', '&gt;', $this->idreg);
         $this->Texto_tag .= "<td>" . $this->idreg . "</td>\r\n";
   }
   //----- idcustomer
   function NM_export_idcustomer()
   {
         $this->idcustomer = html_entity_decode($this->idcustomer, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->idcustomer = strip_tags($this->idcustomer);
         $this->idcustomer = NM_charset_to_utf8($this->idcustomer);
         $this->idcustomer = str_replace('<', '&lt;', $this->idcustomer);
         $this->idcustomer = str_replace('>', '&gt;', $this->idcustomer);
         $this->Texto_tag .= "<td>" . $this->idcustomer . "</td>\r\n";
   }
   //----- nombre
   function NM_export_nombre()
   {
         $this->nombre = html_entity_decode($this->nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre = strip_tags($this->nombre);
         $this->nombre = NM_charset_to_utf8($this->nombre);
         $this->nombre = str_replace('<', '&lt;', $this->nombre);
         $this->nombre = str_replace('>', '&gt;', $this->nombre);
         $this->Texto_tag .= "<td>" . $this->nombre . "</td>\r\n";
   }
   //----- correo
   function NM_export_correo()
   {
         $this->correo = html_entity_decode($this->correo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->correo = strip_tags($this->correo);
         $this->correo = NM_charset_to_utf8($this->correo);
         $this->correo = str_replace('<', '&lt;', $this->correo);
         $this->correo = str_replace('>', '&gt;', $this->correo);
         $this->Texto_tag .= "<td>" . $this->correo . "</td>\r\n";
   }
   //----- celular
   function NM_export_celular()
   {
         $this->celular = html_entity_decode($this->celular, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->celular = strip_tags($this->celular);
         $this->celular = NM_charset_to_utf8($this->celular);
         $this->celular = str_replace('<', '&lt;', $this->celular);
         $this->celular = str_replace('>', '&gt;', $this->celular);
         $this->Texto_tag .= "<td>" . $this->celular . "</td>\r\n";
   }
   //----- idinterno
   function NM_export_idinterno()
   {
         $this->idinterno = html_entity_decode($this->idinterno, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->idinterno = strip_tags($this->idinterno);
         $this->idinterno = NM_charset_to_utf8($this->idinterno);
         $this->idinterno = str_replace('<', '&lt;', $this->idinterno);
         $this->idinterno = str_replace('>', '&gt;', $this->idinterno);
         $this->Texto_tag .= "<td>" . $this->idinterno . "</td>\r\n";
   }
   //----- direccion
   function NM_export_direccion()
   {
         $this->direccion = html_entity_decode($this->direccion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->direccion = strip_tags($this->direccion);
         $this->direccion = NM_charset_to_utf8($this->direccion);
         $this->direccion = str_replace('<', '&lt;', $this->direccion);
         $this->direccion = str_replace('>', '&gt;', $this->direccion);
         $this->Texto_tag .= "<td>" . $this->direccion . "</td>\r\n";
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
   //----- ult_fecha
   function NM_export_ult_fecha()
   {
         $this->ult_fecha = html_entity_decode($this->ult_fecha, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ult_fecha = strip_tags($this->ult_fecha);
         $this->ult_fecha = NM_charset_to_utf8($this->ult_fecha);
         $this->ult_fecha = str_replace('<', '&lt;', $this->ult_fecha);
         $this->ult_fecha = str_replace('>', '&gt;', $this->ult_fecha);
         $this->Texto_tag .= "<td>" . $this->ult_fecha . "</td>\r\n";
   }
   //----- local_centro
   function NM_export_local_centro()
   {
         $this->local_centro = html_entity_decode($this->local_centro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->local_centro = strip_tags($this->local_centro);
         $this->local_centro = NM_charset_to_utf8($this->local_centro);
         $this->local_centro = str_replace('<', '&lt;', $this->local_centro);
         $this->local_centro = str_replace('>', '&gt;', $this->local_centro);
         $this->Texto_tag .= "<td>" . $this->local_centro . "</td>\r\n";
   }
   //----- afiliado_desde
   function NM_export_afiliado_desde()
   {
             $conteudo_x =  $this->afiliado_desde;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->afiliado_desde, "YYYY-MM-DD  ");
                 $this->afiliado_desde = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->afiliado_desde = NM_charset_to_utf8($this->afiliado_desde);
         $this->afiliado_desde = str_replace('<', '&lt;', $this->afiliado_desde);
         $this->afiliado_desde = str_replace('>', '&gt;', $this->afiliado_desde);
         $this->Texto_tag .= "<td>" . $this->afiliado_desde . "</td>\r\n";
   }
   //----- sector
   function NM_export_sector()
   {
         $this->sector = html_entity_decode($this->sector, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sector = strip_tags($this->sector);
         $this->sector = NM_charset_to_utf8($this->sector);
         $this->sector = str_replace('<', '&lt;', $this->sector);
         $this->sector = str_replace('>', '&gt;', $this->sector);
         $this->Texto_tag .= "<td>" . $this->sector . "</td>\r\n";
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
   //----- uniqueid
   function NM_export_uniqueid()
   {
         $this->uniqueid = html_entity_decode($this->uniqueid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->uniqueid = strip_tags($this->uniqueid);
         $this->uniqueid = NM_charset_to_utf8($this->uniqueid);
         $this->uniqueid = str_replace('<', '&lt;', $this->uniqueid);
         $this->uniqueid = str_replace('>', '&gt;', $this->uniqueid);
         $this->Texto_tag .= "<td>" . $this->uniqueid . "</td>\r\n";
   }
   //----- ciudad
   function NM_export_ciudad()
   {
         $this->ciudad = html_entity_decode($this->ciudad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ciudad = strip_tags($this->ciudad);
         $this->ciudad = NM_charset_to_utf8($this->ciudad);
         $this->ciudad = str_replace('<', '&lt;', $this->ciudad);
         $this->ciudad = str_replace('>', '&gt;', $this->ciudad);
         $this->Texto_tag .= "<td>" . $this->ciudad . "</td>\r\n";
   }
   //----- pais
   function NM_export_pais()
   {
         $this->pais = html_entity_decode($this->pais, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pais = strip_tags($this->pais);
         $this->pais = NM_charset_to_utf8($this->pais);
         $this->pais = str_replace('<', '&lt;', $this->pais);
         $this->pais = str_replace('>', '&gt;', $this->pais);
         $this->Texto_tag .= "<td>" . $this->pais . "</td>\r\n";
   }
   //----- fecha1
   function NM_export_fecha1()
   {
         $this->fecha1 = html_entity_decode($this->fecha1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fecha1 = strip_tags($this->fecha1);
         $this->fecha1 = NM_charset_to_utf8($this->fecha1);
         $this->fecha1 = str_replace('<', '&lt;', $this->fecha1);
         $this->fecha1 = str_replace('>', '&gt;', $this->fecha1);
         $this->Texto_tag .= "<td>" . $this->fecha1 . "</td>\r\n";
   }
   //----- fecha2
   function NM_export_fecha2()
   {
         $this->fecha2 = html_entity_decode($this->fecha2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fecha2 = strip_tags($this->fecha2);
         $this->fecha2 = NM_charset_to_utf8($this->fecha2);
         $this->fecha2 = str_replace('<', '&lt;', $this->fecha2);
         $this->fecha2 = str_replace('>', '&gt;', $this->fecha2);
         $this->Texto_tag .= "<td>" . $this->fecha2 . "</td>\r\n";
   }
   //----- fecha3
   function NM_export_fecha3()
   {
         $this->fecha3 = html_entity_decode($this->fecha3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fecha3 = strip_tags($this->fecha3);
         $this->fecha3 = NM_charset_to_utf8($this->fecha3);
         $this->fecha3 = str_replace('<', '&lt;', $this->fecha3);
         $this->fecha3 = str_replace('>', '&gt;', $this->fecha3);
         $this->Texto_tag .= "<td>" . $this->fecha3 . "</td>\r\n";
   }
   //----- cliente_tipo
   function NM_export_cliente_tipo()
   {
         $this->cliente_tipo = html_entity_decode($this->cliente_tipo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cliente_tipo = strip_tags($this->cliente_tipo);
         $this->cliente_tipo = NM_charset_to_utf8($this->cliente_tipo);
         $this->cliente_tipo = str_replace('<', '&lt;', $this->cliente_tipo);
         $this->cliente_tipo = str_replace('>', '&gt;', $this->cliente_tipo);
         $this->Texto_tag .= "<td>" . $this->cliente_tipo . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_customer_clubmrjoy_afiliacion'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> customer_clubmrjoy :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_customer_clubmrjoy_afiliacion_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_customer_clubmrjoy_afiliacion"> 
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
