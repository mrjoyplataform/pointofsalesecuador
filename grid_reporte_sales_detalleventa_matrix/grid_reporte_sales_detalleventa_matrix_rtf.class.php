<?php

class grid_reporte_sales_detalleventa_matrix_rtf
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
                   nm_limpa_str_grid_reporte_sales_detalleventa_matrix($cadapar[1]);
                   nm_protect_num_grid_reporte_sales_detalleventa_matrix($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_reporte_sales_detalleventa_matrix']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_reporte_sales_detalleventa_matrix_total.class.php"); 
      $this->Tot      = new grid_reporte_sales_detalleventa_matrix_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_quantity = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][2];
              $this->sum_item_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][3];
              $this->sum_valor_siniva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][4];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['SC_Ind_Groupby'] == "datesales_sucursal_cuentaventa_producto")
          {
              $this->sum_quantity = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][2];
              $this->sum_valor_siniva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['tot_geral'][3];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_reporte_sales_detalleventa_matrix']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_reporte_sales_detalleventa_matrix";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_reporte_sales_detalleventa_matrix.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_sales_detalleventa_matrix']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_sales_detalleventa_matrix']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_sales_detalleventa_matrix']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->datesales = $Busca_temp['datesales']; 
          $tmp_pos = strpos($this->datesales, "##@@");
          if ($tmp_pos !== false && !is_array($this->datesales))
          {
              $this->datesales = substr($this->datesales, 0, $tmp_pos);
          }
          $this->datesales_2 = $Busca_temp['datesales_input_2']; 
          $this->sucursal = $Busca_temp['sucursal']; 
          $tmp_pos = strpos($this->sucursal, "##@@");
          if ($tmp_pos !== false && !is_array($this->sucursal))
          {
              $this->sucursal = substr($this->sucursal, 0, $tmp_pos);
          }
          $this->cuentaventa = $Busca_temp['cuentaventa']; 
          $tmp_pos = strpos($this->cuentaventa, "##@@");
          if ($tmp_pos !== false && !is_array($this->cuentaventa))
          {
              $this->cuentaventa = substr($this->cuentaventa, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['id_sales_detail'])) ? $this->New_label['id_sales_detail'] : "Id Sales Detail"; 
          if ($Cada_col == "id_sales_detail" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['unit_cost'])) ? $this->New_label['unit_cost'] : "Unit Cost"; 
          if ($Cada_col == "unit_cost" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['unit_value'])) ? $this->New_label['unit_value'] : "Unit Value"; 
          if ($Cada_col == "unit_value" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['quantity'])) ? $this->New_label['quantity'] : "Quantity"; 
          if ($Cada_col == "quantity" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['discount'])) ? $this->New_label['discount'] : "Discount"; 
          if ($Cada_col == "discount" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['item_total'])) ? $this->New_label['item_total'] : "Item Total"; 
          if ($Cada_col == "item_total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_product'])) ? $this->New_label['id_product'] : "Id Product"; 
          if ($Cada_col == "id_product" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['uniqueidtrans'])) ? $this->New_label['uniqueidtrans'] : "Uniqueidtrans"; 
          if ($Cada_col == "uniqueidtrans" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechatrans'])) ? $this->New_label['fechatrans'] : "Fechatrans"; 
          if ($Cada_col == "fechatrans" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_siniva'])) ? $this->New_label['valor_siniva'] : "Valor Siniva"; 
          if ($Cada_col == "valor_siniva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_unitario'])) ? $this->New_label['valor_unitario'] : "Valor Unitario"; 
          if ($Cada_col == "valor_unitario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codproducto'])) ? $this->New_label['codproducto'] : "Codproducto"; 
          if ($Cada_col == "codproducto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['producto'])) ? $this->New_label['producto'] : "Producto"; 
          if ($Cada_col == "producto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['tarjeta'])) ? $this->New_label['tarjeta'] : "Tarjeta"; 
          if ($Cada_col == "tarjeta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['minutos'])) ? $this->New_label['minutos'] : "Minutos"; 
          if ($Cada_col == "minutos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['comida'])) ? $this->New_label['comida'] : "Comida"; 
          if ($Cada_col == "comida" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cuentaventa'])) ? $this->New_label['cuentaventa'] : "Cuentaventa"; 
          if ($Cada_col == "cuentaventa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sucursal'])) ? $this->New_label['sucursal'] : "Sucursal"; 
          if ($Cada_col == "sucursal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_sales'])) ? $this->New_label['id_sales'] : "Id Sales"; 
          if ($Cada_col == "id_sales" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sales_price'])) ? $this->New_label['sales_price'] : "Sales Price"; 
          if ($Cada_col == "sales_price" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sales_discount'])) ? $this->New_label['sales_discount'] : "Sales Discount"; 
          if ($Cada_col == "sales_discount" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['datesales'])) ? $this->New_label['datesales'] : "Datesales"; 
          if ($Cada_col == "datesales" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_status'])) ? $this->New_label['id_status'] : "Id Status"; 
          if ($Cada_col == "id_status" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idcaja'])) ? $this->New_label['idcaja'] : "Idcaja"; 
          if ($Cada_col == "idcaja" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
          if ($Cada_col == "cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : "Telefono"; 
          if ($Cada_col == "telefono" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['factura'])) ? $this->New_label['factura'] : "Factura"; 
          if ($Cada_col == "factura" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['clave_acceso'])) ? $this->New_label['clave_acceso'] : "Clave Acceso"; 
          if ($Cada_col == "clave_acceso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['enviosri'])) ? $this->New_label['enviosri'] : "Enviosri"; 
          if ($Cada_col == "enviosri" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechaenvio'])) ? $this->New_label['fechaenvio'] : "Fechaenvio"; 
          if ($Cada_col == "fechaenvio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
          if ($Cada_col == "estado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechaid'])) ? $this->New_label['fechaid'] : "Fechaid"; 
          if ($Cada_col == "fechaid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['importe_recibido'])) ? $this->New_label['importe_recibido'] : "Importe Recibido"; 
          if ($Cada_col == "importe_recibido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codigoid'])) ? $this->New_label['codigoid'] : "Codigoid"; 
          if ($Cada_col == "codigoid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['totaldescuento'])) ? $this->New_label['totaldescuento'] : "Total Descuento"; 
          if ($Cada_col == "totaldescuento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['baseimponible'])) ? $this->New_label['baseimponible'] : "Base Imponible"; 
          if ($Cada_col == "baseimponible" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Valoriva"; 
          if ($Cada_col == "valoriva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['idpago'])) ? $this->New_label['idpago'] : "Idpago"; 
          if ($Cada_col == "idpago" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['totalpago'])) ? $this->New_label['totalpago'] : "Totalpago"; 
          if ($Cada_col == "totalpago" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['idempleado'])) ? $this->New_label['idempleado'] : "Idempleado"; 
          if ($Cada_col == "idempleado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idturno'])) ? $this->New_label['idturno'] : "Idturno"; 
          if ($Cada_col == "idturno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codpago_sri'])) ? $this->New_label['codpago_sri'] : "Codpago Sri"; 
          if ($Cada_col == "codpago_sri" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imprime'])) ? $this->New_label['imprime'] : "Imprime"; 
          if ($Cada_col == "imprime" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['comprobante'])) ? $this->New_label['comprobante'] : "Comprobante"; 
          if ($Cada_col == "comprobante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT id_sales_detail, unit_cost, unit_value, quantity, discount, item_total, id_product, uniqueidtrans, fechatrans, valor_siniva, valor_unitario, codproducto, producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, cuentaventa, sucursal, id_sales, sales_price, sales_discount, total, str_replace (convert(char(10),datesales,102), '.', '-') + ' ' + convert(char(8),datesales,20), id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, str_replace (convert(char(10),fechaenvio,102), '.', '-') + ' ' + convert(char(8),fechaenvio,20), uniqueid, estado, fechaid, importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, codpago_sri, imprime, comprobante from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id_sales_detail, unit_cost, unit_value, quantity, discount, item_total, id_product, uniqueidtrans, fechatrans, valor_siniva, valor_unitario, codproducto, producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, cuentaventa, sucursal, id_sales, sales_price, sales_discount, total, datesales, id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, fechaenvio, uniqueid, estado, fechaid, importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, codpago_sri, imprime, comprobante from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT id_sales_detail, unit_cost, unit_value, quantity, discount, item_total, id_product, uniqueidtrans, fechatrans, valor_siniva, valor_unitario, codproducto, producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, cuentaventa, sucursal, id_sales, sales_price, sales_discount, total, convert(char(23),datesales,121), id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, convert(char(23),fechaenvio,121), uniqueid, estado, fechaid, importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, codpago_sri, imprime, comprobante from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT id_sales_detail, unit_cost, unit_value, quantity, discount, item_total, id_product, uniqueidtrans, TO_DATE(TO_CHAR(fechatrans, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), valor_siniva, valor_unitario, codproducto, producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, cuentaventa, sucursal, id_sales, sales_price, sales_discount, total, datesales, id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, fechaenvio, uniqueid, estado, TO_DATE(TO_CHAR(fechaid, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, codpago_sri, imprime, comprobante from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT id_sales_detail, unit_cost, unit_value, quantity, discount, item_total, id_product, uniqueidtrans, fechatrans, valor_siniva, valor_unitario, codproducto, producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, cuentaventa, sucursal, id_sales, sales_price, sales_discount, total, EXTEND(datesales, YEAR TO FRACTION), id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, EXTEND(fechaenvio, YEAR TO FRACTION), uniqueid, estado, fechaid, importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, codpago_sri, imprime, comprobante from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id_sales_detail, unit_cost, unit_value, quantity, discount, item_total, id_product, uniqueidtrans, fechatrans, valor_siniva, valor_unitario, codproducto, producto, entrada, jugador, visitante, tarjeta, tokens, minutos, comida, cuentaventa, sucursal, id_sales, sales_price, sales_discount, total, datesales, id_status, idcaja, idcliente, cliente, direccion, telefono, factura, serie, clave_acceso, enviosri, fechaenvio, uniqueid, estado, fechaid, importe_recibido, codigoid, totalSinImpuestos, totalDescuento, baseImponible, valoriva, importeTotal, idpago, totalpago, cliente_email, idempleado, idturno, codpago_sri, imprime, comprobante from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['order_grid'];
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
         $this->id_sales_detail = $rs->fields[0] ;  
         $this->id_sales_detail = (string)$this->id_sales_detail;
         $this->unit_cost = $rs->fields[1] ;  
         $this->unit_cost =  str_replace(",", ".", $this->unit_cost);
         $this->unit_cost = (string)$this->unit_cost;
         $this->unit_value = $rs->fields[2] ;  
         $this->unit_value =  str_replace(",", ".", $this->unit_value);
         $this->unit_value = (string)$this->unit_value;
         $this->quantity = $rs->fields[3] ;  
         $this->quantity = (string)$this->quantity;
         $this->discount = $rs->fields[4] ;  
         $this->discount =  str_replace(",", ".", $this->discount);
         $this->discount = (string)$this->discount;
         $this->item_total = $rs->fields[5] ;  
         $this->item_total =  str_replace(",", ".", $this->item_total);
         $this->item_total = (string)$this->item_total;
         $this->id_product = $rs->fields[6] ;  
         $this->id_product = (string)$this->id_product;
         $this->uniqueidtrans = $rs->fields[7] ;  
         $this->fechatrans = $rs->fields[8] ;  
         $this->valor_siniva = $rs->fields[9] ;  
         $this->valor_siniva = (string)$this->valor_siniva;
         $this->valor_unitario = $rs->fields[10] ;  
         $this->valor_unitario = (string)$this->valor_unitario;
         $this->codproducto = $rs->fields[11] ;  
         $this->producto = $rs->fields[12] ;  
         $this->entrada = $rs->fields[13] ;  
         $this->entrada = (string)$this->entrada;
         $this->jugador = $rs->fields[14] ;  
         $this->jugador = (string)$this->jugador;
         $this->visitante = $rs->fields[15] ;  
         $this->visitante = (string)$this->visitante;
         $this->tarjeta = $rs->fields[16] ;  
         $this->tarjeta = (string)$this->tarjeta;
         $this->tokens = $rs->fields[17] ;  
         $this->tokens = (string)$this->tokens;
         $this->minutos = $rs->fields[18] ;  
         $this->minutos = (string)$this->minutos;
         $this->comida = $rs->fields[19] ;  
         $this->comida = (string)$this->comida;
         $this->cuentaventa = $rs->fields[20] ;  
         $this->sucursal = $rs->fields[21] ;  
         $this->id_sales = $rs->fields[22] ;  
         $this->id_sales = (string)$this->id_sales;
         $this->sales_price = $rs->fields[23] ;  
         $this->sales_price =  str_replace(",", ".", $this->sales_price);
         $this->sales_price = (string)$this->sales_price;
         $this->sales_discount = $rs->fields[24] ;  
         $this->sales_discount =  str_replace(",", ".", $this->sales_discount);
         $this->sales_discount = (string)$this->sales_discount;
         $this->total = $rs->fields[25] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (string)$this->total;
         $this->datesales = $rs->fields[26] ;  
         $this->id_status = $rs->fields[27] ;  
         $this->id_status = (string)$this->id_status;
         $this->idcaja = $rs->fields[28] ;  
         $this->idcaja = (string)$this->idcaja;
         $this->idcliente = $rs->fields[29] ;  
         $this->cliente = $rs->fields[30] ;  
         $this->direccion = $rs->fields[31] ;  
         $this->telefono = $rs->fields[32] ;  
         $this->factura = $rs->fields[33] ;  
         $this->factura = (string)$this->factura;
         $this->serie = $rs->fields[34] ;  
         $this->clave_acceso = $rs->fields[35] ;  
         $this->enviosri = $rs->fields[36] ;  
         $this->enviosri = (string)$this->enviosri;
         $this->fechaenvio = $rs->fields[37] ;  
         $this->uniqueid = $rs->fields[38] ;  
         $this->estado = $rs->fields[39] ;  
         $this->estado = (string)$this->estado;
         $this->fechaid = $rs->fields[40] ;  
         $this->importe_recibido = $rs->fields[41] ;  
         $this->importe_recibido =  str_replace(",", ".", $this->importe_recibido);
         $this->importe_recibido = (string)$this->importe_recibido;
         $this->codigoid = $rs->fields[42] ;  
         $this->totalsinimpuestos = $rs->fields[43] ;  
         $this->totalsinimpuestos = (string)$this->totalsinimpuestos;
         $this->totaldescuento = $rs->fields[44] ;  
         $this->totaldescuento =  str_replace(",", ".", $this->totaldescuento);
         $this->totaldescuento = (string)$this->totaldescuento;
         $this->baseimponible = $rs->fields[45] ;  
         $this->baseimponible = (string)$this->baseimponible;
         $this->valoriva = $rs->fields[46] ;  
         $this->valoriva = (string)$this->valoriva;
         $this->importetotal = $rs->fields[47] ;  
         $this->importetotal =  str_replace(",", ".", $this->importetotal);
         $this->importetotal = (string)$this->importetotal;
         $this->idpago = $rs->fields[48] ;  
         $this->idpago = (string)$this->idpago;
         $this->totalpago = $rs->fields[49] ;  
         $this->totalpago =  str_replace(",", ".", $this->totalpago);
         $this->totalpago = (string)$this->totalpago;
         $this->cliente_email = $rs->fields[50] ;  
         $this->idempleado = $rs->fields[51] ;  
         $this->idturno = $rs->fields[52] ;  
         $this->idturno = (string)$this->idturno;
         $this->codpago_sri = $rs->fields[53] ;  
         $this->imprime = $rs->fields[54] ;  
         $this->imprime = (string)$this->imprime;
         $this->comprobante = $rs->fields[55] ;  
         //----- lookup - cuentaventa
         $this->look_cuentaventa = $this->cuentaventa; 
         $this->Lookup->lookup_cuentaventa($this->look_cuentaventa, $this->cuentaventa) ; 
         $this->look_cuentaventa = ($this->look_cuentaventa == "&nbsp;") ? "" : $this->look_cuentaventa; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- id_sales_detail
   function NM_export_id_sales_detail()
   {
             nmgp_Form_Num_Val($this->id_sales_detail, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->id_sales_detail = NM_charset_to_utf8($this->id_sales_detail);
         $this->id_sales_detail = str_replace('<', '&lt;', $this->id_sales_detail);
         $this->id_sales_detail = str_replace('>', '&gt;', $this->id_sales_detail);
         $this->Texto_tag .= "<td>" . $this->id_sales_detail . "</td>\r\n";
   }
   //----- unit_cost
   function NM_export_unit_cost()
   {
             nmgp_Form_Num_Val($this->unit_cost, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->unit_cost = NM_charset_to_utf8($this->unit_cost);
         $this->unit_cost = str_replace('<', '&lt;', $this->unit_cost);
         $this->unit_cost = str_replace('>', '&gt;', $this->unit_cost);
         $this->Texto_tag .= "<td>" . $this->unit_cost . "</td>\r\n";
   }
   //----- unit_value
   function NM_export_unit_value()
   {
             nmgp_Form_Num_Val($this->unit_value, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->unit_value = NM_charset_to_utf8($this->unit_value);
         $this->unit_value = str_replace('<', '&lt;', $this->unit_value);
         $this->unit_value = str_replace('>', '&gt;', $this->unit_value);
         $this->Texto_tag .= "<td>" . $this->unit_value . "</td>\r\n";
   }
   //----- quantity
   function NM_export_quantity()
   {
             nmgp_Form_Num_Val($this->quantity, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->quantity = NM_charset_to_utf8($this->quantity);
         $this->quantity = str_replace('<', '&lt;', $this->quantity);
         $this->quantity = str_replace('>', '&gt;', $this->quantity);
         $this->Texto_tag .= "<td>" . $this->quantity . "</td>\r\n";
   }
   //----- discount
   function NM_export_discount()
   {
             nmgp_Form_Num_Val($this->discount, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->discount = NM_charset_to_utf8($this->discount);
         $this->discount = str_replace('<', '&lt;', $this->discount);
         $this->discount = str_replace('>', '&gt;', $this->discount);
         $this->Texto_tag .= "<td>" . $this->discount . "</td>\r\n";
   }
   //----- item_total
   function NM_export_item_total()
   {
             nmgp_Form_Num_Val($this->item_total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->item_total = NM_charset_to_utf8($this->item_total);
         $this->item_total = str_replace('<', '&lt;', $this->item_total);
         $this->item_total = str_replace('>', '&gt;', $this->item_total);
         $this->Texto_tag .= "<td>" . $this->item_total . "</td>\r\n";
   }
   //----- id_product
   function NM_export_id_product()
   {
             nmgp_Form_Num_Val($this->id_product, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->id_product = NM_charset_to_utf8($this->id_product);
         $this->id_product = str_replace('<', '&lt;', $this->id_product);
         $this->id_product = str_replace('>', '&gt;', $this->id_product);
         $this->Texto_tag .= "<td>" . $this->id_product . "</td>\r\n";
   }
   //----- uniqueidtrans
   function NM_export_uniqueidtrans()
   {
         $this->uniqueidtrans = html_entity_decode($this->uniqueidtrans, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->uniqueidtrans = strip_tags($this->uniqueidtrans);
         $this->uniqueidtrans = NM_charset_to_utf8($this->uniqueidtrans);
         $this->uniqueidtrans = str_replace('<', '&lt;', $this->uniqueidtrans);
         $this->uniqueidtrans = str_replace('>', '&gt;', $this->uniqueidtrans);
         $this->Texto_tag .= "<td>" . $this->uniqueidtrans . "</td>\r\n";
   }
   //----- fechatrans
   function NM_export_fechatrans()
   {
             if (substr($this->fechatrans, 10, 1) == "-") 
             { 
                 $this->fechatrans = substr($this->fechatrans, 0, 10) . " " . substr($this->fechatrans, 11);
             } 
             if (substr($this->fechatrans, 13, 1) == ".") 
             { 
                $this->fechatrans = substr($this->fechatrans, 0, 13) . ":" . substr($this->fechatrans, 14, 2) . ":" . substr($this->fechatrans, 17);
             } 
             $conteudo_x =  $this->fechatrans;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechatrans, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechatrans = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fechatrans = NM_charset_to_utf8($this->fechatrans);
         $this->fechatrans = str_replace('<', '&lt;', $this->fechatrans);
         $this->fechatrans = str_replace('>', '&gt;', $this->fechatrans);
         $this->Texto_tag .= "<td>" . $this->fechatrans . "</td>\r\n";
   }
   //----- valor_siniva
   function NM_export_valor_siniva()
   {
             nmgp_Form_Num_Val($this->valor_siniva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->valor_siniva = NM_charset_to_utf8($this->valor_siniva);
         $this->valor_siniva = str_replace('<', '&lt;', $this->valor_siniva);
         $this->valor_siniva = str_replace('>', '&gt;', $this->valor_siniva);
         $this->Texto_tag .= "<td>" . $this->valor_siniva . "</td>\r\n";
   }
   //----- valor_unitario
   function NM_export_valor_unitario()
   {
             nmgp_Form_Num_Val($this->valor_unitario, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->valor_unitario = NM_charset_to_utf8($this->valor_unitario);
         $this->valor_unitario = str_replace('<', '&lt;', $this->valor_unitario);
         $this->valor_unitario = str_replace('>', '&gt;', $this->valor_unitario);
         $this->Texto_tag .= "<td>" . $this->valor_unitario . "</td>\r\n";
   }
   //----- codproducto
   function NM_export_codproducto()
   {
         $this->codproducto = html_entity_decode($this->codproducto, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codproducto = strip_tags($this->codproducto);
         $this->codproducto = NM_charset_to_utf8($this->codproducto);
         $this->codproducto = str_replace('<', '&lt;', $this->codproducto);
         $this->codproducto = str_replace('>', '&gt;', $this->codproducto);
         $this->Texto_tag .= "<td>" . $this->codproducto . "</td>\r\n";
   }
   //----- producto
   function NM_export_producto()
   {
         $this->producto = html_entity_decode($this->producto, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->producto = strip_tags($this->producto);
         $this->producto = NM_charset_to_utf8($this->producto);
         $this->producto = str_replace('<', '&lt;', $this->producto);
         $this->producto = str_replace('>', '&gt;', $this->producto);
         $this->Texto_tag .= "<td>" . $this->producto . "</td>\r\n";
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
   //----- tarjeta
   function NM_export_tarjeta()
   {
             nmgp_Form_Num_Val($this->tarjeta, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->tarjeta = NM_charset_to_utf8($this->tarjeta);
         $this->tarjeta = str_replace('<', '&lt;', $this->tarjeta);
         $this->tarjeta = str_replace('>', '&gt;', $this->tarjeta);
         $this->Texto_tag .= "<td>" . $this->tarjeta . "</td>\r\n";
   }
   //----- tokens
   function NM_export_tokens()
   {
             nmgp_Form_Num_Val($this->tokens, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->tokens = NM_charset_to_utf8($this->tokens);
         $this->tokens = str_replace('<', '&lt;', $this->tokens);
         $this->tokens = str_replace('>', '&gt;', $this->tokens);
         $this->Texto_tag .= "<td>" . $this->tokens . "</td>\r\n";
   }
   //----- minutos
   function NM_export_minutos()
   {
             nmgp_Form_Num_Val($this->minutos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->minutos = NM_charset_to_utf8($this->minutos);
         $this->minutos = str_replace('<', '&lt;', $this->minutos);
         $this->minutos = str_replace('>', '&gt;', $this->minutos);
         $this->Texto_tag .= "<td>" . $this->minutos . "</td>\r\n";
   }
   //----- comida
   function NM_export_comida()
   {
             nmgp_Form_Num_Val($this->comida, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->comida = NM_charset_to_utf8($this->comida);
         $this->comida = str_replace('<', '&lt;', $this->comida);
         $this->comida = str_replace('>', '&gt;', $this->comida);
         $this->Texto_tag .= "<td>" . $this->comida . "</td>\r\n";
   }
   //----- cuentaventa
   function NM_export_cuentaventa()
   {
         $this->look_cuentaventa = html_entity_decode($this->look_cuentaventa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_cuentaventa = strip_tags($this->look_cuentaventa);
         $this->look_cuentaventa = NM_charset_to_utf8($this->look_cuentaventa);
         $this->look_cuentaventa = str_replace('<', '&lt;', $this->look_cuentaventa);
         $this->look_cuentaventa = str_replace('>', '&gt;', $this->look_cuentaventa);
         $this->Texto_tag .= "<td>" . $this->look_cuentaventa . "</td>\r\n";
   }
   //----- sucursal
   function NM_export_sucursal()
   {
         $this->sucursal = html_entity_decode($this->sucursal, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sucursal = strip_tags($this->sucursal);
         $this->sucursal = NM_charset_to_utf8($this->sucursal);
         $this->sucursal = str_replace('<', '&lt;', $this->sucursal);
         $this->sucursal = str_replace('>', '&gt;', $this->sucursal);
         $this->Texto_tag .= "<td>" . $this->sucursal . "</td>\r\n";
   }
   //----- id_sales
   function NM_export_id_sales()
   {
             nmgp_Form_Num_Val($this->id_sales, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->id_sales = NM_charset_to_utf8($this->id_sales);
         $this->id_sales = str_replace('<', '&lt;', $this->id_sales);
         $this->id_sales = str_replace('>', '&gt;', $this->id_sales);
         $this->Texto_tag .= "<td>" . $this->id_sales . "</td>\r\n";
   }
   //----- sales_price
   function NM_export_sales_price()
   {
             nmgp_Form_Num_Val($this->sales_price, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->sales_price = NM_charset_to_utf8($this->sales_price);
         $this->sales_price = str_replace('<', '&lt;', $this->sales_price);
         $this->sales_price = str_replace('>', '&gt;', $this->sales_price);
         $this->Texto_tag .= "<td>" . $this->sales_price . "</td>\r\n";
   }
   //----- sales_discount
   function NM_export_sales_discount()
   {
             nmgp_Form_Num_Val($this->sales_discount, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->sales_discount = NM_charset_to_utf8($this->sales_discount);
         $this->sales_discount = str_replace('<', '&lt;', $this->sales_discount);
         $this->sales_discount = str_replace('>', '&gt;', $this->sales_discount);
         $this->Texto_tag .= "<td>" . $this->sales_discount . "</td>\r\n";
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->total = NM_charset_to_utf8($this->total);
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
   }
   //----- datesales
   function NM_export_datesales()
   {
             if (substr($this->datesales, 10, 1) == "-") 
             { 
                 $this->datesales = substr($this->datesales, 0, 10) . " " . substr($this->datesales, 11);
             } 
             if (substr($this->datesales, 13, 1) == ".") 
             { 
                $this->datesales = substr($this->datesales, 0, 13) . ":" . substr($this->datesales, 14, 2) . ":" . substr($this->datesales, 17);
             } 
             $conteudo_x =  $this->datesales;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->datesales, "YYYY-MM-DD HH:II:SS  ");
                 $this->datesales = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->datesales = NM_charset_to_utf8($this->datesales);
         $this->datesales = str_replace('<', '&lt;', $this->datesales);
         $this->datesales = str_replace('>', '&gt;', $this->datesales);
         $this->Texto_tag .= "<td>" . $this->datesales . "</td>\r\n";
   }
   //----- id_status
   function NM_export_id_status()
   {
             nmgp_Form_Num_Val($this->id_status, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->id_status = NM_charset_to_utf8($this->id_status);
         $this->id_status = str_replace('<', '&lt;', $this->id_status);
         $this->id_status = str_replace('>', '&gt;', $this->id_status);
         $this->Texto_tag .= "<td>" . $this->id_status . "</td>\r\n";
   }
   //----- idcaja
   function NM_export_idcaja()
   {
             nmgp_Form_Num_Val($this->idcaja, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idcaja = NM_charset_to_utf8($this->idcaja);
         $this->idcaja = str_replace('<', '&lt;', $this->idcaja);
         $this->idcaja = str_replace('>', '&gt;', $this->idcaja);
         $this->Texto_tag .= "<td>" . $this->idcaja . "</td>\r\n";
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
   //----- factura
   function NM_export_factura()
   {
             nmgp_Form_Num_Val($this->factura, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->factura = NM_charset_to_utf8($this->factura);
         $this->factura = str_replace('<', '&lt;', $this->factura);
         $this->factura = str_replace('>', '&gt;', $this->factura);
         $this->Texto_tag .= "<td>" . $this->factura . "</td>\r\n";
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
   //----- clave_acceso
   function NM_export_clave_acceso()
   {
         $this->clave_acceso = html_entity_decode($this->clave_acceso, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->clave_acceso = strip_tags($this->clave_acceso);
         $this->clave_acceso = NM_charset_to_utf8($this->clave_acceso);
         $this->clave_acceso = str_replace('<', '&lt;', $this->clave_acceso);
         $this->clave_acceso = str_replace('>', '&gt;', $this->clave_acceso);
         $this->Texto_tag .= "<td>" . $this->clave_acceso . "</td>\r\n";
   }
   //----- enviosri
   function NM_export_enviosri()
   {
             nmgp_Form_Num_Val($this->enviosri, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->enviosri = NM_charset_to_utf8($this->enviosri);
         $this->enviosri = str_replace('<', '&lt;', $this->enviosri);
         $this->enviosri = str_replace('>', '&gt;', $this->enviosri);
         $this->Texto_tag .= "<td>" . $this->enviosri . "</td>\r\n";
   }
   //----- fechaenvio
   function NM_export_fechaenvio()
   {
             if (substr($this->fechaenvio, 10, 1) == "-") 
             { 
                 $this->fechaenvio = substr($this->fechaenvio, 0, 10) . " " . substr($this->fechaenvio, 11);
             } 
             if (substr($this->fechaenvio, 13, 1) == ".") 
             { 
                $this->fechaenvio = substr($this->fechaenvio, 0, 13) . ":" . substr($this->fechaenvio, 14, 2) . ":" . substr($this->fechaenvio, 17);
             } 
             $conteudo_x =  $this->fechaenvio;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaenvio, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechaenvio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fechaenvio = NM_charset_to_utf8($this->fechaenvio);
         $this->fechaenvio = str_replace('<', '&lt;', $this->fechaenvio);
         $this->fechaenvio = str_replace('>', '&gt;', $this->fechaenvio);
         $this->Texto_tag .= "<td>" . $this->fechaenvio . "</td>\r\n";
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
   //----- estado
   function NM_export_estado()
   {
             nmgp_Form_Num_Val($this->estado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->estado = NM_charset_to_utf8($this->estado);
         $this->estado = str_replace('<', '&lt;', $this->estado);
         $this->estado = str_replace('>', '&gt;', $this->estado);
         $this->Texto_tag .= "<td>" . $this->estado . "</td>\r\n";
   }
   //----- fechaid
   function NM_export_fechaid()
   {
             if (substr($this->fechaid, 10, 1) == "-") 
             { 
                 $this->fechaid = substr($this->fechaid, 0, 10) . " " . substr($this->fechaid, 11);
             } 
             if (substr($this->fechaid, 13, 1) == ".") 
             { 
                $this->fechaid = substr($this->fechaid, 0, 13) . ":" . substr($this->fechaid, 14, 2) . ":" . substr($this->fechaid, 17);
             } 
             $conteudo_x =  $this->fechaid;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaid, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechaid = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fechaid = NM_charset_to_utf8($this->fechaid);
         $this->fechaid = str_replace('<', '&lt;', $this->fechaid);
         $this->fechaid = str_replace('>', '&gt;', $this->fechaid);
         $this->Texto_tag .= "<td>" . $this->fechaid . "</td>\r\n";
   }
   //----- importe_recibido
   function NM_export_importe_recibido()
   {
             nmgp_Form_Num_Val($this->importe_recibido, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->importe_recibido = NM_charset_to_utf8($this->importe_recibido);
         $this->importe_recibido = str_replace('<', '&lt;', $this->importe_recibido);
         $this->importe_recibido = str_replace('>', '&gt;', $this->importe_recibido);
         $this->Texto_tag .= "<td>" . $this->importe_recibido . "</td>\r\n";
   }
   //----- codigoid
   function NM_export_codigoid()
   {
         $this->codigoid = html_entity_decode($this->codigoid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codigoid = strip_tags($this->codigoid);
         $this->codigoid = NM_charset_to_utf8($this->codigoid);
         $this->codigoid = str_replace('<', '&lt;', $this->codigoid);
         $this->codigoid = str_replace('>', '&gt;', $this->codigoid);
         $this->Texto_tag .= "<td>" . $this->codigoid . "</td>\r\n";
   }
   //----- totalsinimpuestos
   function NM_export_totalsinimpuestos()
   {
             nmgp_Form_Num_Val($this->totalsinimpuestos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->totalsinimpuestos = NM_charset_to_utf8($this->totalsinimpuestos);
         $this->totalsinimpuestos = str_replace('<', '&lt;', $this->totalsinimpuestos);
         $this->totalsinimpuestos = str_replace('>', '&gt;', $this->totalsinimpuestos);
         $this->Texto_tag .= "<td>" . $this->totalsinimpuestos . "</td>\r\n";
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
   //----- baseimponible
   function NM_export_baseimponible()
   {
             nmgp_Form_Num_Val($this->baseimponible, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->baseimponible = NM_charset_to_utf8($this->baseimponible);
         $this->baseimponible = str_replace('<', '&lt;', $this->baseimponible);
         $this->baseimponible = str_replace('>', '&gt;', $this->baseimponible);
         $this->Texto_tag .= "<td>" . $this->baseimponible . "</td>\r\n";
   }
   //----- valoriva
   function NM_export_valoriva()
   {
             nmgp_Form_Num_Val($this->valoriva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "4", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->valoriva = NM_charset_to_utf8($this->valoriva);
         $this->valoriva = str_replace('<', '&lt;', $this->valoriva);
         $this->valoriva = str_replace('>', '&gt;', $this->valoriva);
         $this->Texto_tag .= "<td>" . $this->valoriva . "</td>\r\n";
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
   //----- idpago
   function NM_export_idpago()
   {
             nmgp_Form_Num_Val($this->idpago, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idpago = NM_charset_to_utf8($this->idpago);
         $this->idpago = str_replace('<', '&lt;', $this->idpago);
         $this->idpago = str_replace('>', '&gt;', $this->idpago);
         $this->Texto_tag .= "<td>" . $this->idpago . "</td>\r\n";
   }
   //----- totalpago
   function NM_export_totalpago()
   {
             nmgp_Form_Num_Val($this->totalpago, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->totalpago = NM_charset_to_utf8($this->totalpago);
         $this->totalpago = str_replace('<', '&lt;', $this->totalpago);
         $this->totalpago = str_replace('>', '&gt;', $this->totalpago);
         $this->Texto_tag .= "<td>" . $this->totalpago . "</td>\r\n";
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
   //----- idempleado
   function NM_export_idempleado()
   {
         $this->idempleado = html_entity_decode($this->idempleado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->idempleado = strip_tags($this->idempleado);
         $this->idempleado = NM_charset_to_utf8($this->idempleado);
         $this->idempleado = str_replace('<', '&lt;', $this->idempleado);
         $this->idempleado = str_replace('>', '&gt;', $this->idempleado);
         $this->Texto_tag .= "<td>" . $this->idempleado . "</td>\r\n";
   }
   //----- idturno
   function NM_export_idturno()
   {
             nmgp_Form_Num_Val($this->idturno, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idturno = NM_charset_to_utf8($this->idturno);
         $this->idturno = str_replace('<', '&lt;', $this->idturno);
         $this->idturno = str_replace('>', '&gt;', $this->idturno);
         $this->Texto_tag .= "<td>" . $this->idturno . "</td>\r\n";
   }
   //----- codpago_sri
   function NM_export_codpago_sri()
   {
         $this->codpago_sri = html_entity_decode($this->codpago_sri, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codpago_sri = strip_tags($this->codpago_sri);
         $this->codpago_sri = NM_charset_to_utf8($this->codpago_sri);
         $this->codpago_sri = str_replace('<', '&lt;', $this->codpago_sri);
         $this->codpago_sri = str_replace('>', '&gt;', $this->codpago_sri);
         $this->Texto_tag .= "<td>" . $this->codpago_sri . "</td>\r\n";
   }
   //----- imprime
   function NM_export_imprime()
   {
             nmgp_Form_Num_Val($this->imprime, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->imprime = NM_charset_to_utf8($this->imprime);
         $this->imprime = str_replace('<', '&lt;', $this->imprime);
         $this->imprime = str_replace('>', '&gt;', $this->imprime);
         $this->Texto_tag .= "<td>" . $this->imprime . "</td>\r\n";
   }
   //----- comprobante
   function NM_export_comprobante()
   {
         $this->comprobante = html_entity_decode($this->comprobante, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->comprobante = strip_tags($this->comprobante);
         $this->comprobante = NM_charset_to_utf8($this->comprobante);
         $this->comprobante = str_replace('<', '&lt;', $this->comprobante);
         $this->comprobante = str_replace('>', '&gt;', $this->comprobante);
         $this->Texto_tag .= "<td>" . $this->comprobante . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_sales_detalleventa_matrix'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> reporte_sales :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_reporte_sales_detalleventa_matrix_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_reporte_sales_detalleventa_matrix"> 
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
