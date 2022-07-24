<?php

class grid_view_boletos_satisfaction_rtf
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
                   nm_limpa_str_grid_view_boletos_satisfaction($cadapar[1]);
                   nm_protect_num_grid_view_boletos_satisfaction($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_view_boletos_satisfaction']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_view_boletos_satisfaction_total.class.php"); 
      $this->Tot      = new grid_view_boletos_satisfaction_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_jugador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['tot_geral'][2];
              $this->sum_visitante = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['tot_geral'][3];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['SC_Ind_Groupby'] == "califica")
          {
              $this->avg_califica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['tot_geral'][2];
              $this->sum_califica = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['tot_geral'][3];
              $this->sum_jugador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['tot_geral'][4];
              $this->sum_visitante = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['tot_geral'][5];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_view_boletos_satisfaction']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_view_boletos_satisfaction";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_view_boletos_satisfaction.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_view_boletos_satisfaction']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_view_boletos_satisfaction']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_view_boletos_satisfaction']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha_califica = $Busca_temp['fecha_califica']; 
          $tmp_pos = strpos($this->fecha_califica, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_califica))
          {
              $this->fecha_califica = substr($this->fecha_califica, 0, $tmp_pos);
          }
          $this->fecha_califica_2 = $Busca_temp['fecha_califica_input_2']; 
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['fecha_califica'])) ? $this->New_label['fecha_califica'] : "Fecha Califica"; 
          if ($Cada_col == "fecha_califica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_registro'])) ? $this->New_label['fecha_registro'] : "Fecha Registro"; 
          if ($Cada_col == "fecha_registro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idproducto'])) ? $this->New_label['idproducto'] : "Idproducto"; 
          if ($Cada_col == "idproducto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['califica'])) ? $this->New_label['califica'] : "Califica"; 
          if ($Cada_col == "califica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
          if ($Cada_col == "cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idcliente'])) ? $this->New_label['idcliente'] : "Idcliente"; 
          if ($Cada_col == "idcliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : "Telefono"; 
          if ($Cada_col == "telefono" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cliente_email'])) ? $this->New_label['cliente_email'] : "Cliente Email"; 
          if ($Cada_col == "cliente_email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['serie'])) ? $this->New_label['serie'] : "Serie"; 
          if ($Cada_col == "serie" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_entrada'])) ? $this->New_label['fecha_entrada'] : "Fecha Entrada"; 
          if ($Cada_col == "fecha_entrada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_salida'])) ? $this->New_label['fecha_salida'] : "Fecha Salida"; 
          if ($Cada_col == "fecha_salida" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['entrada'])) ? $this->New_label['entrada'] : "Entrada"; 
          if ($Cada_col == "entrada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jugador'])) ? $this->New_label['jugador'] : "Jugador"; 
          if ($Cada_col == "jugador" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['visitante'])) ? $this->New_label['visitante'] : "Visitante"; 
          if ($Cada_col == "visitante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['qrboleto'])) ? $this->New_label['qrboleto'] : "Qrboleto"; 
          if ($Cada_col == "qrboleto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idsale'])) ? $this->New_label['idsale'] : "Idsale"; 
          if ($Cada_col == "idsale" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['nombre'])) ? $this->New_label['nombre'] : "Nombre"; 
          if ($Cada_col == "nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT str_replace (convert(char(10),fecha_califica,102), '.', '-') + ' ' + convert(char(8),fecha_califica,20), fecha_registro, idproducto, califica, cliente, idcliente, telefono, cliente_email, serie, str_replace (convert(char(10),fecha_entrada,102), '.', '-') + ' ' + convert(char(8),fecha_entrada,20), str_replace (convert(char(10),fecha_salida,102), '.', '-') + ' ' + convert(char(8),fecha_salida,20), entrada, jugador, visitante, qrboleto, idsale, estado, nombre from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT fecha_califica, fecha_registro, idproducto, califica, cliente, idcliente, telefono, cliente_email, serie, fecha_entrada, fecha_salida, entrada, jugador, visitante, qrboleto, idsale, estado, nombre from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT convert(char(23),fecha_califica,121), fecha_registro, idproducto, califica, cliente, idcliente, telefono, cliente_email, serie, convert(char(23),fecha_entrada,121), convert(char(23),fecha_salida,121), entrada, jugador, visitante, qrboleto, idsale, estado, nombre from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT fecha_califica, TO_DATE(TO_CHAR(fecha_registro, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idproducto, califica, cliente, idcliente, telefono, cliente_email, serie, fecha_entrada, fecha_salida, entrada, jugador, visitante, qrboleto, idsale, estado, nombre from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(fecha_califica, YEAR TO FRACTION), fecha_registro, idproducto, califica, cliente, idcliente, telefono, cliente_email, serie, EXTEND(fecha_entrada, YEAR TO FRACTION), EXTEND(fecha_salida, YEAR TO FRACTION), entrada, jugador, visitante, qrboleto, idsale, estado, nombre from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT fecha_califica, fecha_registro, idproducto, califica, cliente, idcliente, telefono, cliente_email, serie, fecha_entrada, fecha_salida, entrada, jugador, visitante, qrboleto, idsale, estado, nombre from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['order_grid'];
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
         $this->fecha_califica = $rs->fields[0] ;  
         $this->fecha_registro = $rs->fields[1] ;  
         $this->idproducto = $rs->fields[2] ;  
         $this->idproducto = (string)$this->idproducto;
         $this->califica = $rs->fields[3] ;  
         $this->califica = (string)$this->califica;
         $this->cliente = $rs->fields[4] ;  
         $this->idcliente = $rs->fields[5] ;  
         $this->telefono = $rs->fields[6] ;  
         $this->cliente_email = $rs->fields[7] ;  
         $this->serie = $rs->fields[8] ;  
         $this->fecha_entrada = $rs->fields[9] ;  
         $this->fecha_salida = $rs->fields[10] ;  
         $this->entrada = $rs->fields[11] ;  
         $this->entrada = (string)$this->entrada;
         $this->jugador = $rs->fields[12] ;  
         $this->jugador = (string)$this->jugador;
         $this->visitante = $rs->fields[13] ;  
         $this->visitante = (string)$this->visitante;
         $this->qrboleto = $rs->fields[14] ;  
         $this->idsale = $rs->fields[15] ;  
         $this->idsale = (string)$this->idsale;
         $this->estado = $rs->fields[16] ;  
         $this->estado = (string)$this->estado;
         $this->nombre = $rs->fields[17] ;  
         //----- lookup - idproducto
         $this->look_idproducto = $this->idproducto; 
         $this->Lookup->lookup_idproducto($this->look_idproducto, $this->idproducto) ; 
         $this->look_idproducto = ($this->look_idproducto == "&nbsp;") ? "" : $this->look_idproducto; 
         //----- lookup - califica
         $this->look_califica = $this->califica; 
         $this->Lookup->lookup_califica($this->look_califica, $this->califica) ; 
         $this->look_califica = ($this->look_califica == "&nbsp;") ? "" : $this->look_califica; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- fecha_califica
   function NM_export_fecha_califica()
   {
             if (substr($this->fecha_califica, 10, 1) == "-") 
             { 
                 $this->fecha_califica = substr($this->fecha_califica, 0, 10) . " " . substr($this->fecha_califica, 11);
             } 
             if (substr($this->fecha_califica, 13, 1) == ".") 
             { 
                $this->fecha_califica = substr($this->fecha_califica, 0, 13) . ":" . substr($this->fecha_califica, 14, 2) . ":" . substr($this->fecha_califica, 17);
             } 
             $conteudo_x =  $this->fecha_califica;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_califica, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecha_califica = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecha_califica = NM_charset_to_utf8($this->fecha_califica);
         $this->fecha_califica = str_replace('<', '&lt;', $this->fecha_califica);
         $this->fecha_califica = str_replace('>', '&gt;', $this->fecha_califica);
         $this->Texto_tag .= "<td>" . $this->fecha_califica . "</td>\r\n";
   }
   //----- fecha_registro
   function NM_export_fecha_registro()
   {
             if (substr($this->fecha_registro, 10, 1) == "-") 
             { 
                 $this->fecha_registro = substr($this->fecha_registro, 0, 10) . " " . substr($this->fecha_registro, 11);
             } 
             if (substr($this->fecha_registro, 13, 1) == ".") 
             { 
                $this->fecha_registro = substr($this->fecha_registro, 0, 13) . ":" . substr($this->fecha_registro, 14, 2) . ":" . substr($this->fecha_registro, 17);
             } 
             $conteudo_x =  $this->fecha_registro;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_registro, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecha_registro = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecha_registro = NM_charset_to_utf8($this->fecha_registro);
         $this->fecha_registro = str_replace('<', '&lt;', $this->fecha_registro);
         $this->fecha_registro = str_replace('>', '&gt;', $this->fecha_registro);
         $this->Texto_tag .= "<td>" . $this->fecha_registro . "</td>\r\n";
   }
   //----- idproducto
   function NM_export_idproducto()
   {
         nmgp_Form_Num_Val($this->look_idproducto, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idproducto = NM_charset_to_utf8($this->look_idproducto);
         $this->look_idproducto = str_replace('<', '&lt;', $this->look_idproducto);
         $this->look_idproducto = str_replace('>', '&gt;', $this->look_idproducto);
         $this->Texto_tag .= "<td>" . $this->look_idproducto . "</td>\r\n";
   }
   //----- califica
   function NM_export_califica()
   {
         nmgp_Form_Num_Val($this->look_califica, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_califica = NM_charset_to_utf8($this->look_califica);
         $this->look_califica = str_replace('<', '&lt;', $this->look_califica);
         $this->look_califica = str_replace('>', '&gt;', $this->look_califica);
         $this->Texto_tag .= "<td>" . $this->look_califica . "</td>\r\n";
   }
   //----- cliente
   function NM_export_cliente()
   {
         $this->cliente = html_entity_decode($this->cliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cliente = strip_tags($this->cliente);
         $this->cliente = NM_charset_to_utf8($this->cliente);
         $this->cliente = str_replace('<', '&lt;', $this->cliente);
         $this->cliente = str_replace('>', '&gt;', $this->cliente);
         $this->Texto_tag .= "<td>" . $this->cliente . "</td>\r\n";
   }
   //----- idcliente
   function NM_export_idcliente()
   {
         $this->idcliente = html_entity_decode($this->idcliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->idcliente = strip_tags($this->idcliente);
         $this->idcliente = NM_charset_to_utf8($this->idcliente);
         $this->idcliente = str_replace('<', '&lt;', $this->idcliente);
         $this->idcliente = str_replace('>', '&gt;', $this->idcliente);
         $this->Texto_tag .= "<td>" . $this->idcliente . "</td>\r\n";
   }
   //----- telefono
   function NM_export_telefono()
   {
         $this->telefono = html_entity_decode($this->telefono, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->telefono = strip_tags($this->telefono);
         $this->telefono = NM_charset_to_utf8($this->telefono);
         $this->telefono = str_replace('<', '&lt;', $this->telefono);
         $this->telefono = str_replace('>', '&gt;', $this->telefono);
         $this->Texto_tag .= "<td>" . $this->telefono . "</td>\r\n";
   }
   //----- cliente_email
   function NM_export_cliente_email()
   {
         $this->cliente_email = html_entity_decode($this->cliente_email, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cliente_email = strip_tags($this->cliente_email);
         $this->cliente_email = NM_charset_to_utf8($this->cliente_email);
         $this->cliente_email = str_replace('<', '&lt;', $this->cliente_email);
         $this->cliente_email = str_replace('>', '&gt;', $this->cliente_email);
         $this->Texto_tag .= "<td>" . $this->cliente_email . "</td>\r\n";
   }
   //----- serie
   function NM_export_serie()
   {
         $this->serie = html_entity_decode($this->serie, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->serie = strip_tags($this->serie);
         $this->serie = NM_charset_to_utf8($this->serie);
         $this->serie = str_replace('<', '&lt;', $this->serie);
         $this->serie = str_replace('>', '&gt;', $this->serie);
         $this->Texto_tag .= "<td>" . $this->serie . "</td>\r\n";
   }
   //----- fecha_entrada
   function NM_export_fecha_entrada()
   {
             if (substr($this->fecha_entrada, 10, 1) == "-") 
             { 
                 $this->fecha_entrada = substr($this->fecha_entrada, 0, 10) . " " . substr($this->fecha_entrada, 11);
             } 
             if (substr($this->fecha_entrada, 13, 1) == ".") 
             { 
                $this->fecha_entrada = substr($this->fecha_entrada, 0, 13) . ":" . substr($this->fecha_entrada, 14, 2) . ":" . substr($this->fecha_entrada, 17);
             } 
             $conteudo_x =  $this->fecha_entrada;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_entrada, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecha_entrada = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecha_entrada = NM_charset_to_utf8($this->fecha_entrada);
         $this->fecha_entrada = str_replace('<', '&lt;', $this->fecha_entrada);
         $this->fecha_entrada = str_replace('>', '&gt;', $this->fecha_entrada);
         $this->Texto_tag .= "<td>" . $this->fecha_entrada . "</td>\r\n";
   }
   //----- fecha_salida
   function NM_export_fecha_salida()
   {
             if (substr($this->fecha_salida, 10, 1) == "-") 
             { 
                 $this->fecha_salida = substr($this->fecha_salida, 0, 10) . " " . substr($this->fecha_salida, 11);
             } 
             if (substr($this->fecha_salida, 13, 1) == ".") 
             { 
                $this->fecha_salida = substr($this->fecha_salida, 0, 13) . ":" . substr($this->fecha_salida, 14, 2) . ":" . substr($this->fecha_salida, 17);
             } 
             $conteudo_x =  $this->fecha_salida;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_salida, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecha_salida = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecha_salida = NM_charset_to_utf8($this->fecha_salida);
         $this->fecha_salida = str_replace('<', '&lt;', $this->fecha_salida);
         $this->fecha_salida = str_replace('>', '&gt;', $this->fecha_salida);
         $this->Texto_tag .= "<td>" . $this->fecha_salida . "</td>\r\n";
   }
   //----- entrada
   function NM_export_entrada()
   {
             nmgp_Form_Num_Val($this->entrada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->entrada = NM_charset_to_utf8($this->entrada);
         $this->entrada = str_replace('<', '&lt;', $this->entrada);
         $this->entrada = str_replace('>', '&gt;', $this->entrada);
         $this->Texto_tag .= "<td>" . $this->entrada . "</td>\r\n";
   }
   //----- jugador
   function NM_export_jugador()
   {
             nmgp_Form_Num_Val($this->jugador, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->jugador = NM_charset_to_utf8($this->jugador);
         $this->jugador = str_replace('<', '&lt;', $this->jugador);
         $this->jugador = str_replace('>', '&gt;', $this->jugador);
         $this->Texto_tag .= "<td>" . $this->jugador . "</td>\r\n";
   }
   //----- visitante
   function NM_export_visitante()
   {
             nmgp_Form_Num_Val($this->visitante, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->visitante = NM_charset_to_utf8($this->visitante);
         $this->visitante = str_replace('<', '&lt;', $this->visitante);
         $this->visitante = str_replace('>', '&gt;', $this->visitante);
         $this->Texto_tag .= "<td>" . $this->visitante . "</td>\r\n";
   }
   //----- qrboleto
   function NM_export_qrboleto()
   {
         $this->qrboleto = html_entity_decode($this->qrboleto, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->qrboleto = strip_tags($this->qrboleto);
         $this->qrboleto = NM_charset_to_utf8($this->qrboleto);
         $this->qrboleto = str_replace('<', '&lt;', $this->qrboleto);
         $this->qrboleto = str_replace('>', '&gt;', $this->qrboleto);
         $this->Texto_tag .= "<td>" . $this->qrboleto . "</td>\r\n";
   }
   //----- idsale
   function NM_export_idsale()
   {
             nmgp_Form_Num_Val($this->idsale, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idsale = NM_charset_to_utf8($this->idsale);
         $this->idsale = str_replace('<', '&lt;', $this->idsale);
         $this->idsale = str_replace('>', '&gt;', $this->idsale);
         $this->Texto_tag .= "<td>" . $this->idsale . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_view_boletos_satisfaction'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> view_boletos_satisfaction :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_view_boletos_satisfaction_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_view_boletos_satisfaction"> 
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
